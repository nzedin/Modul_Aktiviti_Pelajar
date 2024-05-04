<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Laporan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('club_model');
        $this->load->model('laporan_model');
        $this->load->model('login_model');
        
    }
    public function index($warga, $studentID)
    {
        $data['laporan'] = $this->laporan_model->get_laporan('laporan', $studentID)->result();
        $data['title'] = 'Laporan Program';
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
        $this->load->view('pengarah_program/laporanPelajar', $data);
        $this->load->view('templates/footer');
    }

    public function laporanProgram($warga, $laporanID){
        
        $data['laporanID'] = $this->laporan_model->get_laporan_byid($laporanID)->result();
        $data['title'] = 'Laporan Program';
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
        $this->load->view('pengarah_program/laporanProgram', $data);
        $this->load->view('templates/footer');
    }

}