<?php
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_login($wargaID, $encrypted_password, $warga) {
        if ($warga == 'staff') {
            $this->db->where('staffID', $wargaID);
            $this->db->where('encryptedpassword', $encrypted_password); 
            $query = $this->db->get('staff');
        } else {
            $this->db->where('studentID', $wargaID);
            $this->db->where('encrypted_password', $encrypted_password); 
            $query = $this->db->get('student');
        }
    
        return $query->num_rows() > 0;
    }
    

    public function get_warga($wargaID, $table)
    {
        if ($table == 'staff'){
            $this->db->where('staffID', $wargaID);
            $this->db->select('*');
            $this->db->from('staff');
            $this->db->where('staffID', $wargaID);
            $query = $this->db->get();
        } else {
            $this->db->where('studentID', $wargaID);
            $this->db->select('*');
            $this->db->from('student');
            $this->db->where('studentID', $wargaID);
            $query = $this->db->get();
        }
        
        return $query->row();
    }

    public function ahli_kelab($studentID)
{
    $this->db->select('kepimpinan.*, student.*, committee.*, categoryrole.*');
    $this->db->from('kepimpinan');
    $this->db->join('student', 'student.studentID = kepimpinan.studentID'); 
    $this->db->join('committee', 'committee.committeeID = kepimpinan.committeeID');
    $this->db->join('categoryrole', 'committee.categoryRoleID = categoryrole.categoryRoleID');
    $this->db->where("(committee = 'presiden' OR committee = 'Presiden' OR committee = 'Setiausaha' OR committee = 'setiausaha')");
    $this->db->where("(categoryrole = 'Badan Pelajar' OR categoryrole = 'badan pelajar' OR categoryrole = 'Club' OR categoryrole = 'club')" );
    $this->db->where('kepimpinan.studentID', $studentID);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return true; 
    } else {
        return false; 
    }
}

    public function pengarah_program($studentID)
    {
        $this->db->where('pengarahProg', $studentID);
        $query = $this->db->get('program');
        
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