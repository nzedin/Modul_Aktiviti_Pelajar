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
        $data['title'] = 'Pendaftaran dan Kehadiran';
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
        $this->load->view('pengarah_program/kehadiran', $data);
        $this->load->view('templates/footer');
    }

    public function kehadiranPeserta($warga, $programID)
    {
        $data['kehadiran'] = $this->kehadiran_model->get_kehadiran($programID, 'kehadiran')->result();
        $data['penyertaan'] = $this->kehadiran_model->get_penyertaan($programID, 'penyertaan')->result();
        $data['studentID'] = $this->mpp_model->get_student('student')->result();
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'Kehadiran Peserta';
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
        $this->load->view('pengarah_program/kehadiranPeserta', $data);
        $this->load->view('templates/footer');
    }

    public function pendaftaranPeserta($warga, $programID)
    {
        $data['penyertaan'] = $this->kehadiran_model->get_penyertaan($programID, 'penyertaan')->result();
        $data['studentID'] = $this->mpp_model->get_student('student')->result();
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'Pendaftaran Peserta';
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
        $this->load->view('pengarah_program/pendaftaranPeserta', $data);
        $this->load->view('templates/footer');
    }

    public function logmasuk($programID)
    {
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'eKehadiran';
        $this->load->view('pengarah_program/loginkehadiran', $data);
    }

    public function logmasukpendaftaran($programID)
    {
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'ePendaftaran';
        $this->load->view('pengarah_program/loginkehadiran', $data);
    }

    public function qrcode($warga,$programID)
    {
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
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'QR Kehadiran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('pengarah_program/QRcode', $data);
        $this->load->view('templates/footer');
    }

    public function qrregistration($warga,$programID)
    {
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
        $data['programID'] = $this->kehadiran_model->get_program_by_id($programID)->row();
        $data['title'] = 'QR Pendaftaran';
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

    public function loginregister($studentID, $message = '')
    {
        $data['message'] = $message;
        $data['student'] = $this->kehadiran_model->get_student_by_id($studentID)->row();
        $data['title'] = 'ePendaftaran';
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
                    Kehadiran Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
            }

            redirect('kehadiran/kehadiranPeserta/'.$warga.'/'.$programID);
       
    }

    public function tambahpenyertaan($warga, $programID){
     
        $studentID = $this->input->post('studentID');
        $programID = $this->input->post('programID');
        
            if  ($this->kehadiran_model->is_student_register($studentID,$programID)){

            $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Matrik pelajar telah wujud!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            
            } else {

                if ($this->kehadiran_model->is_quota_exceeded($programID)) {
                    $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Kuota penyertaan telah melebihi maksimum!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                } else {
                    $data = array(
                        'studentID'=> $this->input->post('studentID'),
                        'programID'=> $this->input->post('programID')
                    );
                    $this->kehadiran_model->insert_kehadiran($data, 'penyertaan');

                    $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Pendaftaran Berjaya Disimpan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></div>');

                }
            }

            redirect('kehadiran/pendaftaranPeserta/'.$warga.'/'.$programID);
       
    }

    public function deleteatt($warga, $programID) {
        $checkboxData = $this->input->post('checkboxData');
        if (!empty($checkboxData)) {
            $this->kehadiran_model->deletekehadiran($checkboxData);
        }
        redirect('kehadiran/kehadiranPeserta/'.$warga.'/'.$programID);
    }  
    
    public function deletepenyertaan($warga, $programID) {
        $checkboxData = $this->input->post('checkboxData');
        if (!empty($checkboxData)) {
            $this->kehadiran_model->deletepenyertaan($checkboxData);
        }

        redirect('kehadiran/pendaftaranPeserta/'.$warga.'/'.$programID);
    }  

    public function scanner(){
     
        $studentID = $this->input->post('studentID');
        $programID = $this->input->post('programID');
        $password = $this->input->post('password');
        
        if  ($this->kehadiran_model->is_student_umt($studentID, $password)){


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
        }else{
            $this->session->set_flashdata('reminder','<div style="color:red;" class="alert" role="alert">
                    Username or Password is incorrect!
                    </div>');

            redirect('kehadiran/logmasuk/'.$programID);
        }
    
    }

    public function qscanner(){
     
        $studentID = $this->input->post('studentID');
        $programID = $this->input->post('programID');
        $password = $this->input->post('password');
        
        if  ($this->kehadiran_model->is_student_umt($studentID, $password)){


            if  ($this->kehadiran_model->is_student_register($studentID,$programID)){

                $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fa-check" aria-hidden="true">  <b>OK</b></i><br>Pendaftaran Penyertaan Berjaya!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>';
        
            
            } else {
                if ($this->kehadiran_model->is_quota_exceeded($programID)) {
                    $message =  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true">  <b>Pendaftaran Tidak Berjaya</b></i><br>Kuota penyertaan telah melebihi maksimum!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                } else {

                    $data = array(
                        'studentID'=> $this->input->post('studentID'),
                        'programID'=> $this->input->post('programID')
                    );
                    $this->kehadiran_model->insert_kehadiran($data, 'penyertaan');

                    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check" aria-hidden="true">  <b>OK</b></i><br>Pendaftaran Penyertaan Berjaya!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>';
                }
        
            }

            $this->loginregister($studentID, $message);
        }else{
            $this->session->set_flashdata('reminder','<div style="color:red;" class="alert" role="alert">
                    Username or Password is incorrect!
                    </div>');

            redirect('kehadiran/logmasukpendaftaran/'.$programID);
        }
    
    }
}
