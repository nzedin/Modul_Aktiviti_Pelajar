<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Kehadiran_model extends CI_Model {
   

    public function get_program($table, $studentID) {

        $this->db->select([
            'PROGRAM.PROGRAMID',
            'PROGRAM.PROGRAMNAME',
            'PROGRAM.STARTDATE',
            'PROGRAM.ENDDATE',
            'PROGRAM.CLUBID',
            'PROGRAM.PROGRAMCATEGORYID',
            'PROGRAM.PENGARAHPROG',
            'PROGRAM.PROGRAMLOCATION',
            'PROGRAM.STATEID',
            'PROGRAM.PROGRAMQUOTA',
            'PROGRAM.TYPEPROGRAM',
            'CLUB.CLUBNAME',
            'PROGRAMCATEGORY.PROGRAMCATEGORYNAME',
            'STATE.STATENAME',
            'COUNT(CASE WHEN PENYERTAAN.PADAM = 0 THEN 1 END) AS BILANGAN_PENYERTAAN'
        ]);
        $this->db->from($table);
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID');
        $this->db->join('PROGRAMCATEGORY', 'PROGRAMCATEGORY.PROGRAMCATEGORYID = PROGRAM.PROGRAMCATEGORYID');
        $this->db->join('STATE', 'STATE.STATEID = PROGRAM.STATEID');
        $this->db->join('PENYERTAAN', 'PENYERTAAN.PROGRAMID = PROGRAM.PROGRAMID', 'left');
        $this->db->where('PROGRAM.PENGARAHPROG', $studentID);
        $this->db->group_by([
            'PROGRAM.PROGRAMID',
            'PROGRAM.PROGRAMNAME',
            'PROGRAM.STARTDATE',
            'PROGRAM.ENDDATE',
            'PROGRAM.CLUBID',
            'PROGRAM.PROGRAMCATEGORYID',
            'PROGRAM.PENGARAHPROG',
            'PROGRAM.PROGRAMLOCATION',
            'PROGRAM.STATEID',
            'PROGRAM.PROGRAMQUOTA',
            'PROGRAM.TYPEPROGRAM',
            'CLUB.CLUBNAME',
            'PROGRAMCATEGORY.PROGRAMCATEGORYNAME',
            'STATE.STATENAME'
        ]);
    
        return $this->db->get();
    }
    
    

    public function get_kehadiran($programID,$table)
    {
        $this->db->select('KEHADIRAN.*, PROGRAM.*, STUDENT.*');
        $this->db->from($table);
        $this->db->join('PROGRAM', 'PROGRAM.PROGRAMID = KEHADIRAN.PROGRAMID');
        $this->db->join('STUDENT', 'STUDENT.STUDENTID = KEHADIRAN.STUDENTID'); 
        $this->db->where('KEHADIRAN.PROGRAMID', $programID);
        $this->db->where('KEHADIRAN.PADAM', 0);

        return $this->db->get();
    }

    public function get_penyertaan($programID,$table)
    {
        $this->db->select('PENYERTAAN.*, PROGRAM.*, STUDENT.*');
        $this->db->from($table);
        $this->db->join('PROGRAM', 'PROGRAM.PROGRAMID = PENYERTAAN.PROGRAMID');
        $this->db->join('STUDENT', 'STUDENT.STUDENTID = PENYERTAAN.STUDENTID'); 
        $this->db->where('PENYERTAAN.PROGRAMID', $programID);
        $this->db->where('PENYERTAAN.PADAM', 0);

        return $this->db->get();
    }
    
    public function get_program_by_id($programID)
    {
        $this->db->select('PROGRAM.*');
        $this->db->from('PROGRAM');
        $this->db->where('PROGRAMID', $programID);
        
        return $this->db->get();
    }

    public function is_student_exists($studentID,$programID)
    {
        $this->db->where('STUDENTID', $studentID);
        $this->db->where('PROGRAMID', $programID);
        $this->db->where('PADAM', 0);
        $query = $this->db->get('KEHADIRAN');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_student_register($studentID,$programID)
    {
        $this->db->where('STUDENTID', $studentID);
        $this->db->where('PROGRAMID', $programID);
        $this->db->where('PADAM', 0);
        $query = $this->db->get('PENYERTAAN');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_student_umt($studentID,$password)
    {
        
            $this->db->where('STUDENTID', $studentID);
            $this->db->where('ENCRYPTED_PASSWORD', $password);
            $query = $this->db->get('STUDENT');
        
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
        $this->db->where('PROGRAMID', $programID);
        $this->db->where('PADAM', 0);
        $currentCount = $this->db->count_all_results('PENYERTAAN');
        
        // Get the quota for the program
        $this->db->select('PROGRAMQUOTA');
        $this->db->where('PROGRAMID', $programID);
        $quota = $this->db->get('PROGRAM')->row()->PROGRAMQUOTA;
    
        // Check if the current count exceeds the quota
        return $currentCount >= $quota;
    }

    public function deletekehadiran($checkboxData){
        foreach ($checkboxData as $data) {
            $kehadiranID = $data['KEHADIRANID'];
            $padam = $data['PADAM'];
        
                $this->db->set('PADAM', $padam);
                $this->db->where('KEHADIRANID', $kehadiranID);
                $this->db->update('KEHADIRAN');
        }
    }

    public function deletepenyertaan($checkboxData){
        foreach ($checkboxData as $data) {
            $penyertaanID = $data['PENYERTAANID'];
            $padam = $data['PADAM'];
        
                $this->db->set('PADAM', $padam);
                $this->db->where('PENYERTAANID', $penyertaanID);
                $this->db->update('PENYERTAAN');
        }
    }

    public function get_student_by_id($studentID)
    {
        $this->db->select('STUDENT.STUDENTNAME, STUDENT.STUDENTID');
        $this->db->from('STUDENT');
        $this->db->where('STUDENTID', $studentID);
       
        return $this->db->get();
    
    }
}