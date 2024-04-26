<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Kehadiran_model extends CI_Model {
   

    public function get_program($table, $studentID) {

        $this->db->select('program.*, programcategory.*, state.*, club.*');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('programcategory', 'programcategory.programCategoryID = program.programCategoryID');
        $this->db->join('state', 'state.stateID = program.stateID');
        $this->db->where('pengarahProg', $studentID);
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

    public function deletekehadiran($checkboxData){
        foreach ($checkboxData as $data) {
            $kehadiranID = $data['kehadiranID'];
            $padam = $data['padam'];
        
                $this->db->set('padam', $padam);
                $this->db->where('kehadiranID', $kehadiranID);
                $this->db->update('kehadiran');
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