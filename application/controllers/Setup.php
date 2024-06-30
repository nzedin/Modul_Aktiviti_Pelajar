<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Setup extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('setup_model');
        $this->load->model('login_model');
    }
    public function index($page, $warga)
    {
        $data['admin'] = $this->setup_model->get_admin('admin')->result();
        $data['title'] = 'Setup Admin';
        $data['warga'] = $warga;
        $data['page'] = $page;
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
        $this->load->view('list/setup_Admin', $data);
        $this->load->view('templates/footer');
    }

    public function setup_admin($page, $warga)
    {
        $data['admin'] = $this->setup_model->selectStaff('staff')->result();
        $data['title'] = 'Setup Admin';
        $data['warga'] = $warga;
        $data['page'] = $page;
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
        $this->load->view('list/setup_Admin', $data);
        $this->load->view('templates/footer');
    }

    
    public function getStaff() {
        $staffID = $this->input->post('staffID');
        $staff = $this->setup_model->staffOption($staffID); 
    
        $response = array(
            'staffName' => $staff->staffName,
        );
    
        echo json_encode($response);
    }

    public function daftar_admin($warga){

            $staffID = $this->input->post('staffID');
    
            if ($this->setup_model->is_admin_exist($staffID)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'staffID' => $staffID,
                );
                $this->setup_model->insert_data($data, 'admin');
    
                $this->session->set_flashdata('reminder', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            }
            
            redirect('setup/index/senarai_admin/'.$warga);
        
    }

    public function delete_admin($warga, $staffID){
        $where = array('staffID' => $staffID);

            $this->setup_model->delete_data($where, 'admin');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('setup/index/senarai_admin/'.$warga);
    }
    
    public function setup_parameter_surat($page, $warga)
    {
        $data['parameter'] = $this->setup_model->get_parameter('parametersurat')->result();
        $data['admin'] = $this->setup_model->selectAdmin('admin')->result();
        $data['title'] = 'Setup Parameter Surat';
        $data['warga'] = $warga;
        $data['page'] = $page;
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
        $this->load->view('list/setup_Parameter_Surat', $data);
        $this->load->view('templates/footer');
    }

    public function delete_parameter($warga, $parameterID){
        $where = array('parameterID' => $parameterID);

            $this->setup_model->delete_data($where, 'parametersurat');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('setup/setup_parameter_surat/senarai_parameter_surat/'.$warga);
    }

    public function daftar_parameter($warga){

        $staffID = $this->input->post('staffID');
        $bagiPihak = $this->input->post('bagiPihak');
        $status = $this->input->post('status');

        if ($this->setup_model->is_parameter_exist($bagiPihak)) {
            $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data telah wujud!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        } else {
            $data = array(
                'staffID' => $staffID,
                'bagiPihak' => $bagiPihak,
                'status' => $status,

            );
            $this->setup_model->insert_data($data, 'parametersurat');

            $this->session->set_flashdata('reminder', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berjaya Disimpan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
        
        redirect('setup/setup_parameter_surat/senarai_parameter_surat/'.$warga);
    
}


public function getAdmin() {
    $staffID = $this->input->post('staffID');
    $staff = $this->setup_model->staffOption($staffID); 

    $response = array(
        'staffName' => $staff->staffName,
        'staffPosition' => $staff->staffPosition,
    );

    echo json_encode($response);
}

public function edit_parameter($warga, $parameterID){

    $staffID = $this->input->post('staffID');
    $bagiPihak = $this->input->post('bagiPihak');
    $status = $this->input->post('status');

        if ($this->setup_model->is_editparameter_exist($bagiPihak, $status)) {
            $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data telah wujud!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        } else {
        $data = array(
            'parameterID'=>$parameterID,
            'staffID' => $staffID,
            'bagiPihak' => $bagiPihak,
            'status' => $status,
        );

        $this->setup_model->update_data($data, 'parametersurat');
        $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berjaya Dikemaskini!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
    }
    redirect('setup/setup_parameter_surat/senarai_parameter_surat/'.$warga);

    
}
    
}