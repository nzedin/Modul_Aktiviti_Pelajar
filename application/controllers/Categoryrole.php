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
        $data['categoryrole'] = $this->categoryrole_model->get_categoryrole('categoryrole')->result();
        $data['title'] = 'Kategori Jawatankuasa';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('list/categoryrole');
        $this->load->view('templates/footer');
    }

    public function categoryrole($warga)
    {
        $data['categoryrole'] = $this->categoryrole_model->get_categoryrole('categoryrole')->result();
        $data['title'] = 'Kategori Jawatankuasa';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
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
            $categoryrole = $this->input->post('categoryrole');
    
            if ($this->categoryrole_model->is_categoryrole_exists($categoryrole)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'categoryrole' => $categoryrole,
                );
                $this->categoryrole_model->insert_data($data, 'categoryrole');
    
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
       $this->form_validation->set_rules('categoryrole', 'Kategori Jawatankuasa', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       
    }

    public function editcategoryrole($warga, $categoryRoleID){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->index($warga);
        } else {
            $categoryrole = $this->input->post('categoryrole');

            if ($this->categoryrole_model->is_categoryrole_exists($categoryrole)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'categoryRoleID'=>$categoryRoleID,
                    'categoryrole'=> $this->input->post('categoryrole'),
                );

                $this->categoryrole_model->update_data($data, 'categoryrole');
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
            $where = array('categoryRoleID' => $categoryRoleID);
            $this->categoryrole_model->delete_data($where, 'categoryrole');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berjaya Dipadam!</div>');
        }
    
        redirect('categoryrole/index/'.$warga);
    }
}