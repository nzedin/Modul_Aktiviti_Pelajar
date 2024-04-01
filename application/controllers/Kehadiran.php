<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Kehadiran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('club_model');
        $this->load->model('kehadiran_model');
        $this->load->model('login_model');
        
    }
    public function index($warga, $studentID)
    {
        $data['list'] = $this->kehadiran_model->get_program('program', $studentID)->result();
        $data['title'] = 'Kehadiran';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('pengarah_program/kehadiran', $data);
        $this->load->view('templates/footer');
    }

}