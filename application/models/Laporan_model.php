<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Laporan_model extends CI_Model {
   

    public function get_laporan($table, $studentID) {

        $this->db->select('PROGRAM.*, CLUB.*, LAPORAN.*, PROGRAM.PROGRAMID');
        $this->db->from($table);
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID');
        $this->db->join('LAPORAN', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID','left');
        $this->db->where('PROGRAM.PENGARAHPROG', $studentID);
        $this->db->where('PROGRAM.ENDDATE <', 'CURDATE()', false);
        
        return $this->db->get();
    }

    public function get_all_program($table) {

        $this->db->select('PROGRAM.*, CLUB.*, STATE.*, LAPORAN.*,PROGRAM.PROGRAMID');
        $this->db->from($table);
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID');
        $this->db->join('STATE', 'STATE.STATEID = PROGRAM.STATEID','LEFT');
        $this->db->join('LAPORAN', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID','LEFT');
        
        return $this->db->get();
    }

    public function get_all_record($table)
    {
        $this->db->select('
            PROGRAM.*, 
            CLUB.*, 
            STATE.*, 
            LAPORAN.*, 
            STUDENT.*, 
            PROGRAMCATEGORY.*, 
            (PROGRAM.ENDDATE - PROGRAM.STARTDATE) AS PERIOD, 
            (LAPORAN.BANTUANKEWANGANHEPA + LAPORAN.DANATABUNGAMANAH) AS TOTAL
        ');
        $this->db->from($table);
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID');
        $this->db->join('STATE', 'STATE.STATEID = PROGRAM.STATEID', 'left');
        $this->db->join('LAPORAN', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID', 'left');
        $this->db->join('STUDENT', 'STUDENT.STUDENTID = PROGRAM.PENGARAHPROG', 'left');
        $this->db->join('PROGRAMCATEGORY', 'PROGRAMCATEGORY.PROGRAMCATEGORYID = PROGRAM.PROGRAMCATEGORYID', 'left');
        $this->db->where('LAPORAN.STATUSAPPROVAL', 3);

        return $this->db->get();
    }


    public function get_lateReason($table) {

        $this->db->select('LAPORAN.*, PROGRAM.*, STATE.*, CLUB.*');
        $this->db->from($table);
        $this->db->join('PROGRAM', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID','left');
        $this->db->join('STATE', 'STATE.STATEID = PROGRAM.STATEID','left');
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID','left');
        $this->db->where_in('LAPORAN.STATUSAPPROVAL', [2, 3, 4]);

        return $this->db->get();
    }

    public function get_reportApproval($table) {

        $this->db->select('LAPORAN.*, PROGRAM.*, STATE.*, CLUB.*');
        $this->db->from($table);
        $this->db->join('PROGRAM', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID','left');
        $this->db->join('STATE', 'STATE.STATEID = PROGRAM.STATEID','left');
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID','left');
        $this->db->where_in('LAPORAN.STATUSAPPROVAL', [2, 3, 4]);
        
        return $this->db->get();
    }

    public function get_byid($programID)
    {
        $this->db->select('PROGRAM.*, CLUB.*, LAPORAN.*, PROGRAM.PROGRAMID');
        $this->db->from('PROGRAM');
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID');
        $this->db->join('LAPORAN', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID', 'left');
        $this->db->where('PROGRAM.PROGRAMID', $programID);
        
        return $this->db->get();
    }

    public function get_laporan_byid($laporanID)
    {
        $this->db->select('LAPORAN.*, PROGRAM.*, CLUB.*, PROGRAM.PROGRAMID');
        $this->db->from('LAPORAN');
        $this->db->join('PROGRAM', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID', 'left');
        $this->db->join('CLUB', 'CLUB.CLUBID = PROGRAM.CLUBID');
        $this->db->where('LAPORAN.LAPORANID', $laporanID);
        
        return $this->db->get();
    }

    public function insert_report($data,$table)
    {
        $this->db->insert($table,$data);   
    }

    public function update_report($data,$table)
     {
        $this->db->where('LAPORANID',$data['LAPORANID']);
        $this->db->update($table,$data);
     }

     public function is_report_exist($laporanID)
    {
        $this->db->where('LAPORANID', $laporanID);
        $query = $this->db->get('LAPORAN');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function get_transcript($studentID)
    {
        $this->db->select('STUDENT.*, COALESCE(COMMITTEE.COMMITTEE, \'AHLI AKTIF\') AS COMMITTEE, KEPIMPINAN.*, STUDENT.STUDENTID');
        $this->db->from('STUDENT');
        $this->db->join('KEPIMPINAN', 'KEPIMPINAN.STUDENTID = STUDENT.STUDENTID', 'left');
        $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = KEPIMPINAN.COMMITTEEID', 'left');
        $this->db->where('STUDENT.STUDENTID', $studentID);
    
        $query = $this->db->get();
        return $query;
    }
    

    public function get_student_transcript($studentID)
{
    // Get student basic information
    $student_info = $this->db->select('*')
                             ->from('STUDENT')
                             ->where('STUDENTID', $studentID)
                             ->get()
                             ->row();

    // Get student transcript details
    $this->db->select('
        STUDENT.STUDENTID,
        STUDENT.STUDENTNAME,
        COALESCE(CLUB.CLUBNAME, \'Tiada\') AS CLUB,
        COALESCE(COMMITTEE.COMMITTEE, \'Tiada\') AS COMMITTEE,
        COALESCE(CATEGORYROLE.CATEGORYROLE, \'Tiada\') AS CATEGORYROLE,
        COALESCE(COMMITTEE.MERIT, 0) AS MERIT
    ');
    $this->db->from('STUDENT');
    $this->db->join('KEPIMPINAN', 'KEPIMPINAN.STUDENTID = STUDENT.STUDENTID', 'left');
    $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = KEPIMPINAN.COMMITTEEID', 'left');
    $this->db->join('CATEGORYROLE', 'CATEGORYROLE.CATEGORYROLEID = COMMITTEE.CATEGORYROLEID', 'left');
    $this->db->join('CLUB', 'CLUB.CLUBID = KEPIMPINAN.CLUBID', 'left');
    $this->db->where('STUDENT.STUDENTID', $studentID);

    $transcript = $this->db->get()->result();

    // Get MPP transcript details
    $this->db->select('
        MPP.STUDENTID,
        STUDENT.STUDENTNAME,
        COALESCE(COMMITTEE.COMMITTEE, \'Tiada\') AS COMMITTEE,
        COALESCE(CATEGORYROLE.CATEGORYROLE, \'Tiada\') AS CATEGORYROLE,
        COALESCE(COMMITTEE.MERIT, 0) AS MERIT
    ');
    $this->db->from('MPP');
    $this->db->join('STUDENT', 'MPP.STUDENTID = STUDENT.STUDENTID', 'left');
    $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = MPP.POSITIONMPP', 'left');
    $this->db->join('CATEGORYROLE', 'CATEGORYROLE.CATEGORYROLEID = COMMITTEE.CATEGORYROLEID', 'left');
    $this->db->where('STUDENT.STUDENTID', $studentID);

    $transcriptMPP = $this->db->get()->result();

    return ['student_info' => $student_info, 'transcript' => $transcript, 'transcriptMPP' => $transcriptMPP];
}




    
    public function get_studentEmail($studentID) {

        $this->db->select('STUDENTEMAIL');
        $this->db->from('STUDENT');
        $this->db->where('STUDENTID', $studentID);
        
        return $this->db->get();
    }
    
    public function get_programName($programID) {

        $this->db->select('PROGRAMNAME');
        $this->db->from('PROGRAM');
        $this->db->where('PROGRAMID', $programID);
        
        return $this->db->get();
    }

    public function get_clubName($clubID) {

        $this->db->select('CLUBNAME');
        $this->db->from('CLUB');
        $this->db->where('CLUBID', $clubID);
        
        return $this->db->get();
    }

    public function get_committeeName($committeeID) {

        $this->db->select('COMMITTEE');
        $this->db->from('COMMITTEE');
        $this->db->where('COMMITTEEID', $committeeID);
        
        return $this->db->get();
    }

    public function get_report_by_id($laporanID)
    {
        $this->db->select('LAPORAN.*, PROGRAM.PROGRAMNAME');
        $this->db->from('LAPORAN');
        $this->db->join('PROGRAM', 'LAPORAN.PROGRAMID = PROGRAM.PROGRAMID', 'left');
        $this->db->where('LAPORANID', $laporanID);
        
        return $this->db->get();
    }



   

    
}