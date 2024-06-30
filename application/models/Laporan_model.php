<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Laporan_model extends CI_Model {
   

    public function get_laporan($table, $studentID) {

        $this->db->select('program.*, club.*, laporan.*, program.programID');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('laporan', 'laporan.programID = program.programID','left');
        $this->db->where('program.pengarahProg', $studentID);
        $this->db->where('program.endDate <', 'CURDATE()', false);
        
        return $this->db->get();
    }

    public function get_all_program($table) {

        $this->db->select('program.*, club.*, state.*, laporan.*');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('state', 'state.stateID = program.stateID','left');
        $this->db->join('laporan', 'laporan.programID = program.programID','left');
        
        return $this->db->get();
    }

    public function get_all_record($table) {

        $this->db->select('program.*, club.*, state.*, laporan.*, student.*, programcategory.*, DATEDIFF(program.endDate, program.startDate) AS period,
            (laporan.bantuanKewanganHEPA + laporan.danaTabungAmanah) as total');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('state', 'state.stateID = program.stateID','left');
        $this->db->join('laporan', 'laporan.programID = program.programID','left');
        $this->db->join('student', 'student.studentID = program.pengarahProg', 'left');
        $this->db->join('programcategory', 'programcategory.programCategoryID = program.programCategoryID', 'left');
        $this->db->where('laporan.statusApproval', 3);

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
        $this->db->select('student.*, COALESCE(committee.committee, "Ahli Aktif") as committee, kepimpinan.*, student.studentID');
        $this->db->from('student');
        $this->db->join('kepimpinan', 'kepimpinan.studentID = student.studentID', 'left');
        $this->db->join('committee', 'committee.committeeID = kepimpinan.committeeID', 'left');
        $this->db->where('student.studentID', $studentID);
        
        $query = $this->db->get();
        return $query;
    }

    public function get_student_transcript($studentID)
    {
        // Get student basic information
        $student_info = $this->db->select('*')
                                 ->from('student')
                                 ->where('studentID', $studentID)
                                 ->get()
                                 ->row();
    
        // Get student transcript details
        $this->db->select('
            student.studentID,
            student.studentName,
            COALESCE(club.clubName, "Tiada") as club,
            COALESCE(committee.committee, "Tiada") as committee,
            COALESCE(categoryrole.categoryrole, "Tiada") as categoryrole,
            COALESCE(committee.merit, "0") as merit
        ');
        $this->db->from('student');
        $this->db->join('kepimpinan', 'kepimpinan.studentID = student.studentID', 'left');
        $this->db->join('committee', 'committee.committeeID = kepimpinan.committeeID', 'left');
        $this->db->join('categoryrole', 'categoryrole.categoryRoleID = committee.categoryRoleID', 'left');
        $this->db->join('club', 'club.clubID = kepimpinan.clubID', 'left');
        $this->db->where('student.studentID', $studentID);
    
        $transcript = $this->db->get()->result();
    
        return ['student_info' => $student_info, 'transcript' => $transcript];
    }

    public function get_monthly_record($table, $date) {
        $this->db->select('program.*, club.*, state.*, laporan.*, student.*, programcategory.*, DATEDIFF(program.endDate, program.startDate) AS period,
            (laporan.bantuanKewanganHEPA + laporan.danaTabungAmanah) as total');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = program.clubID');
        $this->db->join('state', 'state.stateID = program.stateID', 'left');
        $this->db->join('laporan', 'laporan.programID = program.programID', 'left');
        $this->db->join('student', 'student.studentID = program.pengarahProg', 'left');
        $this->db->join('programcategory', 'programcategory.programCategoryID = program.programCategoryID', 'left');
        $this->db->where('laporan.statusApproval', 3);
        $this->db->where("DATE_FORMAT(laporan.dateSubmission, '%Y-%m') =", $date);
    
        return $this->db->get();
    }
    
    
    
}