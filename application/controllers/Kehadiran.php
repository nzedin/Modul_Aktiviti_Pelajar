<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Kehadiran extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('club_model');
        $this->load->model('kehadiran_model');
        $this->load->model('login_model');
        $this->load->model('mpp_model');
        
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

    public function kehadiranPeserta($warga, $programID)
    {
        $data['kehadiran'] = $this->kehadiran_model->get_kehadiran($programID, 'kehadiran')->result();
        $data['studentID'] = $this->mpp_model->get_student('student')->result();
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'Kehadiran Peserta';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('pengarah_program/kehadiranPeserta', $data);
        $this->load->view('templates/footer');
    }

    public function logmasuk($programID)
    {
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'eKehadiran';
        $this->load->view('pengarah_program/loginkehadiran', $data);
    }

    public function qrcode($warga,$programID)
    {
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'QR Kehadiran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('pengarah_program/QRcode', $data);
        $this->load->view('templates/footer');
    }

    public function login($studentID, $message = '')
    {
        $data['message'] = $message;
        $data['student'] = $this->kehadiran_model->get_student_by_id($studentID)->row();
        $data['title'] = 'eKehadiran';
        $this->load->view('pengarah_program/loginmessage', $data);
    }

    public function tambahkehadiran($warga, $programID){
     
        $studentID = $this->input->post('studentID');
        $programID = $this->input->post('programID');

        if  ($this->kehadiran_model->is_student_exists($studentID,$programID)){

        $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Matrik pelajar telah wujud!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        
        } else {

            $data = array(
                'studentID'=> $this->input->post('studentID'),
                'programID'=> $this->input->post('programID')
            );
            $this->kehadiran_model->insert_kehadiran($data, 'kehadiran');

            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berjaya Disimpan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
        }
        redirect('kehadiran/kehadiranPeserta/'.$warga.'/'.$programID);
    
    }

    public function deleteatt($warga, $programID) {
        $checkboxData = $this->input->post('checkboxData');
        if (!empty($checkboxData)) {
            $this->kehadiran_model->deletekehadiran($checkboxData);
        }
        redirect('kehadiran/kehadiranPeserta/'.$warga.'/'.$programID);
    }   

    public function scanner(){
     
        $studentID = $this->input->post('studentID');
        $programID = $this->input->post('programID');

        if  ($this->kehadiran_model->is_student_exists($studentID,$programID)){

            $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check" aria-hidden="true">  <b>OK</b></i><br>Pengesahan Kehadiran Berjaya!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>';
    
        
        } else {

            $data = array(
                'studentID'=> $this->input->post('studentID'),
                'programID'=> $this->input->post('programID')
            );
            $this->kehadiran_model->insert_kehadiran($data, 'kehadiran');

            $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check" aria-hidden="true">  <b>OK</b></i><br>Pengesahan Kehadiran Berjaya!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>';
    
        }

        $this->login($studentID, $message);
    
    }
}
