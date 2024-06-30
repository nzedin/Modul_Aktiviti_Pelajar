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

    public function laporanProgramID($warga, $laporanID){
        
        $data['program'] = $this->laporan_model->get_laporan_byid($laporanID)->row();
        $data['title'] = 'Kelulusan Laporan Program';
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
            $lainLainKelulusan = $this->input->post('lainLainKelulusan');
            $status = $this->input->post('status');
            $sebabLewat = $this->input->post('sebabLewat');
            $dateSubmission = $this->input->post('dateSubmission');
            
            if ($this->laporan_model->is_report_exist($laporanID)) {
                $data = array(
                    'laporanID' => $laporanID,
                    'programID' => $programID,
                    'programUmt' => $programUmt,
                    'programLuar' => $programLuar,
                    'pencapaian' => $pencapaian,
                    'syor' => $syor,
                    'objektif' => $objektif,
                    'lainLainKelulusan' => $lainLainKelulusan,
                    'statusApproval' => $status,
                    'sebabLewat' => $sebabLewat,
                    'dateSubmission' => $dateSubmission
    
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
                'lainLainKelulusan' => $lainLainKelulusan,
                'statusApproval' => $status,
                'sebabLewat' => $sebabLewat,
                'dateSubmission' => $dateSubmission

            );

            $this->laporan_model->insert_report($data, 'laporan');
            
            }
        
            $response = array('success' => true);
            echo json_encode($response);  exit;
    }

    public function update_Approval($laporanID){

        $laporanID = $this->input->post('laporanID');
        $bantuanKewanganHEPA = $this->input->post('bantuanKewanganHEPA');
        $danaTabungAmanah = $this->input->post('danaTabungAmanah');
        $kelulusanKenderaan = $this->input->post('kelulusanKenderaan');
        $kelulusanSijil = $this->input->post('kelulusanSijil');
        $comment = $this->input->post('comment');
        $status = $this->input->post('status');

        if ($this->laporan_model->is_report_exist($laporanID)) {
            $data = array(
                'laporanID' => $laporanID,
                'bantuanKewanganHEPA' => $bantuanKewanganHEPA,
                'danaTabungAmanah' => $danaTabungAmanah,
                'kelulusanKenderaan' => $kelulusanKenderaan,
                'kelulusanSijil' => $kelulusanSijil,
                'comment' => $comment,
                'statusApproval' => $status

            );

            $this->laporan_model->update_report($data, 'laporan');
            
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

    public function search_transcript()
    {
        $studentID = $this->input->post('studentID');
        
        $result = $this->laporan_model->get_transcript($studentID);
        
        if ($result->num_rows() > 0) {
            $data = array();
            $uniqueStudentIDs = array();
            foreach ($result->result() as $row) {
                if (!in_array($row->studentID, $uniqueStudentIDs)) {
                    $committee = !empty($row->kepimpinanID) ? $row->committee : 'Ahli Aktif';
                    
                    $data[] = array(
                        'studentID' => $row->studentID,
                        'studentName' => $row->studentName,
                        'committee' => $committee,
                    );
                    $uniqueStudentIDs[] = $row->studentID;
                }
            }
            echo json_encode($data);
        } else {
            echo json_encode(array());
        }
    }

    public function curricular_transcript($studentID)
    {
        $data = $this->laporan_model->get_student_transcript($studentID);
        $data['title'] = 'Transkrip Kokurikulum';
        
        $this->load->view('templates/header', $data);
        $this->load->view('form/transkrip_kokurikulum', $data);

        
    }
    
    public function late_Reasons($warga)
    {
        $data['laporan'] = $this->laporan_model->get_lateReason('laporan')->result();
        $data['title'] = 'Sebab Kelewatan Laporan';
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
        $this->load->view('list/lateReport', $data);
        $this->load->view('templates/footer');
    }

    public function report_submission_list($warga)
    {
        $data['laporan'] = $this->laporan_model->get_reportApproval('laporan')->result();
        $data['title'] = 'Kelulusan Laporan';
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
        $this->load->view('list/laporan_Pelajar', $data);
        $this->load->view('templates/footer');
    }

    public function print_Report($programID){
            
        $data['program'] = $this->laporan_model->get_byid($programID)->row();
        $data['title'] = 'Laporan Program';
        
        $this->load->view('form/print_Report', $data);
    }

    public function report_reminder($warga)
    {
        $data['laporan'] = $this->laporan_model->get_all_program('program')->result();
        $data['title'] = 'Peringatan Laporan';
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
        $this->load->view('list/report_Reminder', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_admin($warga)
    {
        $data['laporan'] = $this->laporan_model->get_all_record('program')->result();
        $data['title'] = 'Rekod Laporan';
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
        $this->load->view('list/laporan_Admin', $data);
        $this->load->view('templates/footer');
    }

    public function statistic($warga, $date) {
        $data['laporan'] = $this->laporan_model->get_monthly_record('program', $date)->result();
        $data['title'] = 'Statistik Bulanan';
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
        } else {
            if ($this->login_model->ahli_kelab($wargaID) && $this->login_model->pengarah_program($wargaID)) {
                $data['student_type'] = "both";
            } else if ($this->login_model->ahli_kelab($wargaID)) {
                $data['student_type'] = "member";
            } else if ($this->login_model->pengarah_program($wargaID)) {
                $data['student_type'] = "programdirector";
            } else {
                $message = $this->session->set_flashdata('reminder', '<div class="text-small text-danger" role="alert">
                Pelajar tidak dibenarkan akses! </div>');
                redirect('login', $message);
            }
    
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');
        }
        $data['json_laporan'] = json_encode($data['laporan']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('list/statistic_Report', $data);
        $this->load->view('templates/footer');
    }
    
}