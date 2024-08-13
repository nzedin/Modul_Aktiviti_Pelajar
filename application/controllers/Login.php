<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $data['title'] = 'Login Modul Aktiviti Pelajar';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/login');
    }

    public function profile($warga)
    {
        $data['title'] = 'Maklumat Peribadi';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            if ($this->login_model->ahli_kelab($wargaID) && $this->login_model->pengarah_program($wargaID)) {
                $data['student_type'] = "both";
            }
            else if ($this->login_model->ahli_kelab($wargaID)) {
                $data['student_type'] = "member";
            }
            else if ($this->login_model->pengarah_program($wargaID)){
                $data['student_type'] = "programdirector";
            } else {
                $message = $this->session->set_flashdata('reminder', '<div class="text-small text-danger" role="alert">
                Pelajar tidak dibenarkan akses! </div>');
                redirect('login', $message);
            }

            $data['student'] = $this->login_model->get_warga($wargaID, 'student');

        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('templates/profile', $data);
        $this->load->view('templates/footer');
    }



    public function login() {
        $this->load->library('encryption');
        
        $wargaID = $this->input->post('wargaID');
        $password = $this->input->post('password');
        $warga = $this->input->post('warga');
        $key = 'hepa123'; 
        
        $encrypted_password = $this->encryption->encrypt($password, array('key' => $key));
        
        if ($this->login_model->get_login($wargaID, $encrypted_password, $warga)) {
            $this->session->set_userdata('wargaID', $wargaID);
            // $this->session->mark_as_temp('wargaID', 3600);
    
            $this->profile($warga);
            
        } else {
            $message = $this->session->set_flashdata('reminder', '<div class="text-small text-danger" role="alert">
                User ID or password incorrect! </div>');
            redirect('login', $message);
        }
    }
    
    
    public function _rules(){
       $this->form_validation->set_rules('staffID', 'User ID', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('password', 'Password', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       
    }
       
   
    public function logout()
    {
        // destroy the user's session
        $this->session->sess_destroy();

        // redirect to the homepage
        redirect('login');
    }
    
   
}