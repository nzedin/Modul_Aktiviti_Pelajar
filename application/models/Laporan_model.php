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

    public function get_lateReason($table) {

        $this->db->select('laporan.*, program.*, state.*, club.*');
        $this->db->from($table);
        $this->db->join('program', 'laporan.programID = program.programID','left');
        $this->db->join('state', 'state.stateID = program.stateID','left');
        $this->db->join('club', 'club.clubID = program.clubID','left');
        $this->db->where_in('laporan.statusApproval', [2, 3, 4]);

        return $this->db->get();
    }

    public function get_reportApproval($table) {

        $this->db->select('laporan.*, program.*, state.*, club.*');
        $this->db->from($table);
        $this->db->join('program', 'laporan.programID = program.programID','left');
        $this->db->join('state', 'state.stateID = program.stateID','left');
        $this->db->join('club', 'club.clubID = program.clubID','left');
        $this->db->where_in('laporan.statusApproval', [2, 3, 4]);
        
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

    public function get_laporan_byid($laporanID)
    {
        $this->db->select('laporan.*, program.*, club.*, program.programID');
        $this->db->from('laporan');
        $this->db->join('program', 'laporan.programID = program.programID', 'left');
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->where('laporan.laporanID', $laporanID);
        
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

    public function get_transcript($studentID)
    {
        $this->db->select('studentID, studentName');
        $this->db->from('student');
        $this->db->where('studentID', $studentID);
        
        return $this->db->get();
    }

}