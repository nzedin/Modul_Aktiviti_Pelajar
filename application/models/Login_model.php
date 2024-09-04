<?php
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_login($wargaID, $password, $warga) {
        if ($warga == 'staff') {
            $this->db->where('STAFFID', $wargaID);
            $this->db->where('ENCRYPTEDPASSWORD', $password); 
            $query = $this->db->get('STAFF');
        } else {
            $this->db->where('STUDENTID', $wargaID);
            $this->db->where('ENCRYPTED_PASSWORD', $password); 
            $query = $this->db->get('STUDENT');
        }
    
        return $query->num_rows() > 0;
    }
    

    public function get_warga($wargaID, $table)
    {
        if ($table == 'STAFF'){
            $this->db->where('STAFFID', $wargaID);
            $this->db->select('*');
            $this->db->from('STAFF');
            $this->db->where('STAFFID', $wargaID);
            $query = $this->db->get();
        } else {
            $this->db->where('STUDENTID', $wargaID);
            $this->db->select('*');
            $this->db->from('STUDENT');
            $this->db->where('STUDENTID', $wargaID);
            $query = $this->db->get();
        }
        
        return $query->row();
    }

    public function ahli_kelab($studentID)
{
    $this->db->select('KEPIMPINAN.*, STUDENT.*, COMMITTEE.*, CATEGORYROLE.*');
    $this->db->from('KEPIMPINAN');
    $this->db->join('STUDENT', 'STUDENT.STUDENTID = KEPIMPINAN.STUDENTID'); 
    $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = KEPIMPINAN.COMMITTEEID');
    $this->db->join('CATEGORYROLE', 'COMMITTEE.CATEGORYROLEID = CATEGORYROLE.CATEGORYROLEID');
    $this->db->where("(UPPER(COMMITTEE.COMMITTEE) = 'PRESIDEN' OR UPPER(COMMITTEE.COMMITTEE) = 'SETIAUSAHA')");
    $this->db->where("(UPPER(CATEGORYROLE.CATEGORYROLE) = 'BADAN PELAJAR' OR UPPER(CATEGORYROLE.CATEGORYROLE) = 'CLUB')");
    $this->db->where('KEPIMPINAN.STUDENTID', $studentID);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return true; 
    } else {
        return false; 
    }
}

    public function pengarah_program($studentID)
    {
        $this->db->where('PENGARAHPROG', $studentID);
        $query = $this->db->get('PROGRAM');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        // destroy the user's session
        $this->session->sess_destroy();

        // redirect to the homepage
        redirect(base_url());
    }
}