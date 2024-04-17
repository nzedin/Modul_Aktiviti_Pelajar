<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Mpp extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mpp_model');
        $this->load->model('committee_model');
        $this->load->model('login_model');
    }
    public function index($warga)
    {
        $data['sesi'] = $this->mpp_model->selectSesi();
        $data['mpp'] = $this->mpp_model->get_mpp('mpp')->result();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['title'] = 'Majlis Perwakilan Pelajar';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('list/mpp', $data);
        $this->load->view('templates/footer');
    }

    public function mpp($warga)
    {
        $data['student'] = $this->mpp_model->get_student('student')->result();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['sesi'] = $this->mpp_model->selectSesi();
        $data['title'] = 'Pelantikan MPP';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('form/insertMpp');
        $this->load->view('templates/footer');
    }

    public function profile($warga, $type, $mppID) {
        $data['profile'] = $this->mpp_model->get_profile($mppID);
        $data['title'] = 'Profile Pelajar MPP';
        $data['type'] = $type;
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('profileview/profileinfo', $data);
        $this->load->view('templates/footer');
        
    }

    public function printPage($mppID) {
        $data['profile'] = $this->mpp_model->get_profile($mppID);
        $data['title'] = 'Print Profile';
        $this->load->view('profileview/print', $data);
    
    }

    public function addmpp($warga){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
           $this->mpp($warga);
        } else {

            $studentID = $this->input->post('studentID');
            
            if  ($this->mpp_model->is_mpp_exists($studentID)){
            $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data telah wujud!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            } else {

                $data = array(
                    'studentID'=> $this->input->post('studentID'),
                    'session'=> $this->input->post('session'),
                    'positionMpp'=> $this->input->post('positionMpp'),
                    'status'=> $this->input->post('status'),
                    'adminMPP'=> $this->input->post('adminMPP') == '1' ? 1 : 0,
                );
                $this->mpp_model->insert_data($data, 'mpp');
                $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
            }
            redirect('mpp/index/'.$warga);
        }
    }
    public function _rules(){
       $this->form_validation->set_rules('studentID', 'ID Pelajar', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('session', 'Sesi Pelantikan', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('positionMpp', 'Jawatan MPP', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('status', 'Status Pelajar', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
    }

    public function getinfo() {
        $studentID = $this->input->post('studentID');
        $studentInfo = $this->mpp_model->studentopt($studentID); 
    
        $response = array(
            'studentName' => $studentInfo->studentName,
            'program' => $studentInfo->program,
            'semester' => $studentInfo->semester,
            'studentEmail' => $studentInfo->studentEmail
        );
    
        echo json_encode($response);
    }

    public function editmpp($warga, $mppID){

            $data = array(
                'mppID'=>$mppID,
                'studentID'=> $this->input->post('studentID'),
                'session'=> $this->input->post('session'),
                'positionMpp'=> $this->input->post('positionMpp'),
                'status' => $this->input->post('status'),
                'adminMPP' => $this->input->post('adminMPP') == '1' ? 1 : 0,
            );

            $this->mpp_model->update_data($data, 'mpp');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dikemaskini!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('mpp/index/'.$warga);
    }

    public function deletempp($warga, $mppID){
        $where = array('mppID' => $mppID);

            $this->mpp_model->delete_data($where, 'mpp');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('mpp/index/'.$warga);
    }

    public function adminmpp($warga) {
        $checkboxData = $this->input->post('checkboxData');
        if (!empty($checkboxData)) {
            $this->mpp_model->adminmpp($checkboxData);
        }
        redirect('mpp/index/'.$warga);
    }   
    
}