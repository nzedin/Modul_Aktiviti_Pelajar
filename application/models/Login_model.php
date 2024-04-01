<?php
class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_login($wargaID, $password, $warga) {
        
        if ($warga == 'staff'){
            $this->db->where('staffID', $wargaID);
            $this->db->where('password', $password);
            $query = $this->db->get('staff');
        } else {
            $this->db->where('studentID', $wargaID);
            $this->db->where('studentPassword', $password);
            $query = $this->db->get('student');
        }
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
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

    public function logout()
    {
        // destroy the user's session
        $this->session->sess_destroy();

        // redirect to the homepage
        redirect(base_url());
    }
}