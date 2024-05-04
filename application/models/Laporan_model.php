<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Laporan_model extends CI_Model {
   

    public function get_laporan($table, $studentID) {

        $this->db->select('laporan.*, program.*, club.*');
        $this->db->from($table);
        $this->db->join('program', 'laporan.programID = program.programID');
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->where('program.pengarahProg', $studentID);

        return $this->db->get();
    }

    public function get_laporan_byid($laporanID)
    {
        $this->db->select('laporan.*, program.*, club.*');
        $this->db->from('laporan');
        $this->db->join('program', 'laporan.programID = program.programID');
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->where('laporanID', $laporanID);
        
        return $this->db->get();
    }
}