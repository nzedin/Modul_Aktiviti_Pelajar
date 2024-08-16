<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Categoryrole extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('categoryrole_model');
        $this->load->model('login_model');

    }
    public function index($warga)
    {
        $data['categoryrole'] = $this->categoryrole_model->get_categoryrole('CATEGORYROLE')->result();
        $data['title'] = 'Kategori Jawatankuasa';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'STAFF');
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

            $data['student'] = $this->login_model->get_warga($wargaID, 'STUDENT');

        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('list/categoryrole');
        $this->load->view('templates/footer');
    }

    public function categoryrole($warga)
    {
        $data['categoryrole'] = $this->categoryrole_model->get_categoryrole('CATEGORYROLE')->result();
        $data['title'] = 'Kategori Jawatankuasa';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'STAFF');
        }else {
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

            $data['student'] = $this->login_model->get_warga($wargaID, 'STUDENT');

        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('form/insertcategoryrole');
        $this->load->view('templates/footer');
    }

    public function addcategoryrole($warga){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
           $this->categoryrole($warga);
        } else {
            $categoryrole = $this->input->post('catrole');
    
            if ($this->categoryrole_model->is_categoryrole_exists($categoryrole)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'CATEGORYROLE' => $categoryrole,
                );
                $this->categoryrole_model->insert_data('CATEGORYROLE', $data);
    
                $this->session->set_flashdata('reminder', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            }
            
            redirect('categoryrole/index/'.$warga);
        }
    }

    public function _rules(){
       $this->form_validation->set_rules('catrole', 'Kategori Jawatankuasa', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       
    }

    public function editcategoryrole($warga, $categoryRoleID){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->index($warga);
        } else {
            $categoryrole = $this->input->post('catrole');

            if ($this->categoryrole_model->is_categoryrole_exists($categoryrole)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'CATEGORYROLEID'=>$categoryRoleID,
                    'CATEGORYROLE'=> $this->input->post('catrole'),
                );

                $this->categoryrole_model->update_data($data, 'CATEGORYROLE');
                $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berjaya Dikemaskini!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            }
            redirect('categoryrole/index/'.$warga);

        }
    }

    public function deletecategoryrole($warga, $categoryRoleID){
        if ($this->categoryrole_model->has_dependent_records($categoryRoleID)) {
            $this->session->set_flashdata('reminder','<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            Rekod tidak boleh dipadam kerana ia dirujuk dalam rekod Jawatankuasa.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
        } else {
            $where = array('CATEGORYROLEID' => $categoryRoleID);
            $this->categoryrole_model->delete_data($where, 'CATEGORYROLE');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berjaya Dipadam!</div>');
        }
    
        redirect('categoryrole/index/'.$warga);
    }
}