<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Laporan_model extends CI_Model {
   

    public function get_laporan($table, $studentID) {

        $this->db->select('program.*, club.*, laporan.*, program.programID');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('laporan', 'laporan.programID = program.programID','left');
        $this->db->where('program.pengarahProg', $studentID);

        
        return $this->db->get();
    }

    public function get_byid($programID)
    {
        $this->db->select('program.*, club.*, laporan.*, program.programID');
        $this->db->from('program');
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('laporan', 'laporan.programID = program.programID', 'left');
        $this->db->where('program.programID', $programID);
        
        return $this->db->get();
    }

    public function insert_report($data,$table)
    {
        $this->db->insert($table,$data);   
    }

    public function update_report($data,$table)
     {
        $this->db->where('laporanID',$data['laporanID']);
        $this->db->update($table,$data);
     }

     public function is_report_exist($laporanID)
    {
        $this->db->where('laporanID', $laporanID);
        $query = $this->db->get('laporan');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}