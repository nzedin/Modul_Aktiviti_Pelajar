<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Category extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('login_model');

    }
    public function index($warga)
    {
        $data['categories'] = $this->category_model->get_category('CATEGORY')->result();
        $data['title'] = 'Kategori Badan Pelajar';
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
        $this->load->view('list/category',$data);
        $this->load->view('templates/footer');
    }

    public function category($warga)
    {
        $data['category'] = $this->category_model->get_category('CATEGORY')->result();
        $data['title'] = 'Kategori Badan Pelajar';
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
        $this->load->view('form/insertcategory');
        $this->load->view('templates/footer');
    }

    public function addcategory($warga){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
           $this->category($warga);
        } else {
            $category = $this->input->post('category');
            $descCategory = $this->input->post('descCategory');
    
            if ($this->category_model->is_category_exists($category)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'CATEGORY' => $category,
                    'DESCCATEGORY' => $descCategory
                );
                $this->category_model->insert_data($data, 'CATEGORY');
    
                $this->session->set_flashdata('reminder', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            }
            
            redirect('category/index/'.$warga);
        }
    }

    public function _rules(){
       $this->form_validation->set_rules('category', 'Kategori Badan Pelajar', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       
    }

    public function editcategory($warga, $categoryID){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->index($warga);
        } else {

            $category = $this->input->post('category');
            $descCategory = $this->input->post('descCategory');

            if ($this->category_model->is_edit_exists($category, $categoryID)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
            $data = array(
                'CATEGORYID'=>$categoryID,
                'CATEGORY'=> $this->input->post('category'),
                'DESCCATEGORY' => $descCategory
            );

            $this->category_model->update_data($data, 'CATEGORY');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dikemaskini!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
        }
        redirect('category/index/'.$warga);

        }
    }

    public function deletecategory($warga, $categoryID){
        $where = array('CATEGORYID' => $categoryID);

            $this->category_model->delete_data($where, 'CATEGORY');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('category/index/'.$warga);
    }
}