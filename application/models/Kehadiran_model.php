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
        $this->db->order_by('program.programDate', 'ASC');

        return $this->db->get();
    }

}