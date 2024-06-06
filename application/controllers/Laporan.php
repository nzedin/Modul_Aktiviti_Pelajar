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
        $data['laporan'] = $this->laporan_model->get_laporan('program', $studentID)->result();
        $data['error']= $this->laporan_model->get_laporan('program', $studentID)->result();
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

    public function laporanProgram($warga, $programID){
        
        $data['program'] = $this->laporan_model->get_byid($programID)->row();
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

    public function saveReport($programID){

            $laporanID = $this->input->post('laporanID');
            $programID = $this->input->post('programID');
            $programUmt = $this->input->post('programUmt');
            $programLuar = $this->input->post('programLuar');
            $pencapaian = $this->input->post('pencapaian');
            $syor = $this->input->post('syor');
            $objektif = $this->input->post('objektif');
            $bantuanKewanganHEPA = $this->input->post('bantuanKewanganHEPA');
            $danaTabungAmanah = $this->input->post('danaTabungAmanah');
            $kelulusanKenderaan = $this->input->post('kelulusanKenderaan');
            $kelulusanSijil = $this->input->post('kelulusanSijil');
            $lainLainKelulusan = $this->input->post('lainLainKelulusan');
            $status = $this->input->post('status');
            $sebabLewat = $this->input->post('sebabLewat');
            
            if ($this->laporan_model->is_report_exist($laporanID)) {
                $data = array(
                    'laporanID' => $laporanID,
                    'programID' => $programID,
                    'programUmt' => $programUmt,
                    'programLuar' => $programLuar,
                    'pencapaian' => $pencapaian,
                    'syor' => $syor,
                    'objektif' => $objektif,
                    'bantuanKewanganHEPA' => $bantuanKewanganHEPA,
                    'danaTabungAmanah' => $danaTabungAmanah,
                    'kelulusanKenderaan' => $kelulusanKenderaan,
                    'kelulusanSijil' => $kelulusanSijil,
                    'lainLainKelulusan' => $lainLainKelulusan,
                    'statusApproval' => $status,
                    'sebabLewat' => $sebabLewat
    
                );

                $this->laporan_model->update_report($data, 'laporan');
                
            } else {

            $data = array(
                'programID' => $programID,
                'programUmt' => $programUmt,
                'programLuar' => $programLuar,
                'pencapaian' => $pencapaian,
                'syor' => $syor,
                'objektif' => $objektif,
                'bantuanKewanganHEPA' => $bantuanKewanganHEPA,
                'danaTabungAmanah' => $danaTabungAmanah,
                'kelulusanKenderaan' => $kelulusanKenderaan,
                'kelulusanSijil' => $kelulusanSijil,
                'lainLainKelulusan' => $lainLainKelulusan,
                'statusApproval' => $status

            );

            $this->laporan_model->insert_report($data, 'laporan');
            
            }
        
            $response = array('success' => true);
            echo json_encode($response);  exit;
    }



    public function submit_Report($warga, $programID){
            
        $data['program'] = $this->laporan_model->get_byid($programID)->row();
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
        $this->load->view('pengarah_program/reportReview', $data);
        $this->load->view('templates/footer');
    }

    public function student_transcript($warga)
    {
        $data['title'] = 'Transkrip Pelajar';
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
        $this->load->view('form/transkrip', $data);
        $this->load->view('templates/footer');
    }


}