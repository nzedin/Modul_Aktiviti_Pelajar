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

        return $this->db->get();
    }
    
    public function get_program_by_id($programID)
    {
        $this->db->select('program.*');
        $this->db->from('program');
        $this->db->where('programID', $programID);
        
        return $this->db->get();
    }
}