<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Kehadiran_model extends CI_Model {
   

    public function get_program($table, $studentID) {

        $this->db->select('program.*, programcategory.*, state.*, club.*, COUNT(CASE WHEN penyertaan.padam = 0 THEN 1 END) AS bilangan_penyertaan');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('programcategory', 'programcategory.programCategoryID = program.programCategoryID');
        $this->db->join('state', 'state.stateID = program.stateID');
        $this->db->join('penyertaan', 'penyertaan.programID = program.programID', 'left');
        $this->db->where('pengarahProg', $studentID);
        $this->db->group_by('program.programID');
        $this->db->order_by('program.startDate', 'ASC');

        return $this->db->get();
    }

    public function get_kehadiran($programID,$table)
    {
        $this->db->select('kehadiran.*, program.*, student.*');
        $this->db->from($table);
        $this->db->join('program', 'program.programID = kehadiran.programID');
        $this->db->join('student', 'student.studentID = kehadiran.studentID'); 
        $this->db->where('kehadiran.programID', $programID);
        $this->db->where('kehadiran.padam' , 0);

        return $this->db->get();
    }

    public function get_penyertaan($programID,$table)
    {
        $this->db->select('penyertaan.*, program.*, student.*');
        $this->db->from($table);
        $this->db->join('program', 'program.programID = penyertaan.programID');
        $this->db->join('student', 'student.studentID = penyertaan.studentID'); 
        $this->db->where('penyertaan.programID', $programID);
        $this->db->where('penyertaan.padam', 0);

        return $this->db->get();
    }
    
    public function get_program_by_id($programID)
    {
        $this->db->select('program.*');
        $this->db->from('program');
        $this->db->where('programID', $programID);
        
        return $this->db->get();
    }

    public function is_student_exists($studentID,$programID)
    {
        $this->db->where('studentID', $studentID);
        $this->db->where('programID', $programID);
        $this->db->where('padam', 0);
        $query = $this->db->get('kehadiran');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_student_register($studentID,$programID)
    {
        $this->db->where('studentID', $studentID);
        $this->db->where('programID', $programID);
        $this->db->where('padam', 0);
        $query = $this->db->get('penyertaan');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_student_umt($studentID,$password)
    {
        
            $this->db->where('studentID', $studentID);
            $this->db->where('studentPassword', $password);
            $query = $this->db->get('student');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_kehadiran($data,$table)
    {
       $this->db->insert($table,$data);
    }

    public function is_quota_exceeded($programID) {
        // Get the current count of registrations for the program where padam = 0
        $this->db->where('programID', $programID);
        $this->db->where('padam', 0);
        $currentCount = $this->db->count_all_results('penyertaan');
        
        // Get the quota for the program
        $this->db->select('programQuota');
        $this->db->where('programID', $programID);
        $quota = $this->db->get('program')->row()->programQuota;
    
        // Check if the current count exceeds the quota
        return $currentCount >= $quota;
    }

    public function deletekehadiran($checkboxData){
        foreach ($checkboxData as $data) {
            $kehadiranID = $data['kehadiranID'];
            $padam = $data['padam'];
        
                $this->db->set('padam', $padam);
                $this->db->where('kehadiranID', $kehadiranID);
                $this->db->update('kehadiran');
        }
    }

    public function deletepenyertaan($checkboxData){
        foreach ($checkboxData as $data) {
            $penyertaanID = $data['penyertaanID'];
            $padam = $data['padam'];
        
                $this->db->set('padam', $padam);
                $this->db->where('penyertaanID', $penyertaanID);
                $this->db->update('penyertaan');
        }
    }

    public function get_student_by_id($studentID)
    {
        $this->db->select('student.studentName, student.studentID');
        $this->db->from('student');
        $this->db->where('studentID', $studentID);
       
        return $this->db->get();
    
    }
}