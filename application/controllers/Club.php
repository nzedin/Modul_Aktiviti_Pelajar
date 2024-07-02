<?php
defined("BASEPATH") OR exit("No direct script access allowed");


class Club extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('club_model');
        $this->load->model('category_model');
        $this->load->model('login_model');
        $this->load->model('mpp_model');
        $this->load->model('committee_model');
        $this->load->library("email");
        $this->load->model('laporan_model');
      
    }
    public function index($warga)
    {
        $data['club'] = $this->club_model->get_club('club')->result();
        $data['advisor'] = $this->club_model->selectStaff('staff')->result();
        $data['category'] = $this->club_model->selectCategory('category')->result();
        $data['title'] = 'Badan Pelajar';
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
        $this->load->view('list/club', $data);
        $this->load->view('templates/footer');
    }

    public function club($warga)
    {
        $data['advisor'] = $this->club_model->selectStaff('staff')->result();
        $data['category'] = $this->club_model->selectCategory('category')->result();
        $data['title'] = 'Badan Pelajar';
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
        $this->load->view('form/insertClub', $data);
        $this->load->view('templates/footer');
    }

    public function kepimpinan($warga, $clubID)
    {
        $data['kepimpinan'] = $this->club_model->get_kepimpinan($clubID, 'kepimpinan')->result();
        $data['clubID'] = $this->club_model->get_club_by_id($clubID)->row();
        $data['student'] = $this->mpp_model->get_student('student')->result();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        
        $data['warga'] = $warga;
        $wargaID = $this->session->userdata('wargaID');
        if ($warga == 'staff') {
            $data['staff'] = $this->login_model->get_warga($wargaID, 'staff');
            $data['title'] = 'Kepimpinan Badan Pelajar';
            $data['title2'] = 'Daftar Kepimpinan';
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
            $data['title'] = 'Ahli Badan Pelajar';
            $data['student'] = $this->login_model->get_warga($wargaID, 'student');

        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('list/kepimpinan', $data);
        $this->load->view('templates/footer');
    }

    public function clubmembers($warga)
    {
        //$data['kepimpinan'] = $this->club_model->get_kepimpinan($clubID, 'kepimpinan')->result();
        //$data['clubID'] = $this->club_model->get_club_by_id($clubID)->row();
        //$data['student'] = $this->mpp_model->get_student('student')->result();
        //$data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['title'] = 'Daftar Ahli Badan Pelajar';
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
        $data['club'] = $this->club_model->get_club_by_student('club',$wargaID)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidenav', $data);
        $this->load->view('president/ahlikelab', $data);
        $this->load->view('templates/footer');
    }

    public function showlist($warga)
    {
        $clubID = $this->input->post('clubID');
        
        $this->kepimpinan($warga, $clubID);
    }

    public function tambahkepimpinan($warga, $clubID)
    {
        $data['clubID'] = $this->club_model->get_club_by_id($clubID)->row();
        $data['studentSelect'] = $this->mpp_model->get_student('student')->result();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['title'] = 'Kepimpinan Badan Pelajar';
        $data['title2'] = 'Daftar Kepimpinan';
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
        $this->load->view('form/daftarkepimpinan', $data);
        $this->load->view('templates/footer');
    }

    public function profile( $type, $warga, $clubID) {
        $data['kepimpinan'] = $this->club_model->get_kepimpinan($clubID, 'kepimpinan')->result();
        $data['profile'] = $this->club_model->get_profile($clubID);
        $data['clubID'] = $this->club_model->get_club_by_id($clubID)->row();
        $data['title'] = 'Maklumat Badan Pelajar';
        $data['type'] = $type;
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
        $this->load->view('profileview/profileinfo', $data);
        $this->load->view('templates/footer');
        
    }

    public function printPage($mppID) {
        $data['profile'] = $this->mpp_model->get_profile($mppID);
        $data['title'] = 'Print Profile';
        $this->load->view('profileview/print', $data);
    
    }

    public function addclub($warga){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
           $this->club($warga);
        } else {

            $clubName = $this->input->post('clubName');
            $shortName = $this->input->post('shortName');
            $advisor2 = $this->input->post('advisor2');
            $logo = $this->input->post('logo');

            if  ($this->club_model->is_club_exists($clubName)){
            $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data telah wujud!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            } else {

                $data = array(
                    'establishDate'=> $this->input->post('establishDate'),
                    'refNo'=> $this->input->post('refNo'),
                    'clubName'=> $this->input->post('clubName'),
                    'shortName'=> !empty($shortName) ? $shortName : NULL,
                    'category'=> $this->input->post('category'),
                    'logo'=> !empty($logo) ? $logo : NULL,
                    'advisor1'=> $this->input->post('advisor1'),
                    'advisor2'=> !empty($advisor2) ? $advisor2 : NULL,
                    'objective'=> $this->input->post('objective')

                );
                $this->club_model->insert_data($data, 'club');
                $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
            }
            redirect('club/index/'.$warga);
        }
    }

    public function addkepimpinan($warga, $clubID){
     
            $studentID = $this->input->post('studentID');
            $clubID = $this->input->post('clubID');
            
            if  ($this->club_model->is_student_exists($studentID,$clubID)){

            $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Matrik pelajar telah wujud!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            
            } else {

                $data = array(
                    'clubID'=> $this->input->post('clubID'),
                    'studentID'=> $this->input->post('studentID'),
                    'committeeID'=> $this->input->post('committeeID'),
                    'status'=> $this->input->post('status'),
                );
                $this->club_model->insert_kepimpinan($data, 'kepimpinan');

                $committeeID = $this->input->post('committeeID');
                $status = $this->input->post('status');
                $sendEmailResult = $this->laporan_model->get_studentEmail($studentID)->result();
                $clubNameResult = $this->laporan_model->get_clubName($clubID)->result();
                $committeeNameResult = $this->laporan_model->get_committeeName($committeeID)->result();

                $sendEmail = [];
                foreach ($sendEmailResult as $row) {
                    $sendEmail[] = $row->studentEmail;
                }

                $committeeName = '';
                if (!empty($committeeNameResult)) {
                    $committeeName = $committeeNameResult[0]->committee;
                }

                $clubName = '';
                if (!empty($clubNameResult)) {
                    $clubName = ucwords($clubNameResult[0]->clubName); 
                }

                if ((strcasecmp($committeeName, "Presiden") == 0) && strcasecmp($status, "AKTIF") == 0) {
        
                    $config = array (
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.gmail.com',
                        'smtp_timeout' => 30,
                        'smtp_port' => 465,
                        'smtp_user' => 'zulkaedahnur@gmail.com', 
                        'smtp_pass' => 'jkuviswjxemxkmce',
                        'charset' => 'utf-8',
                        'mailtype' => 'html',
                        'newline' => '\r\n'
                    );
                    $this->email->initialize($config);
        
                    $this->email->set_newline("\r\n");
                    $this->email->set_crlf("\r\n");
        
                    $this->email->from('zulkaedahnur@gmail.com', 'Hal Ehwal Pelajar & Alumni');
                    $this->email->to($sendEmail);
        
                    $this->email->subject('Perlantikan Presiden Badan Pelajar');
                    $this->email->message('
                        Assalamualaikum dan Salam Sejahtera <br><br> 
                        Saudara/i, <br><br> 
                        <u><b>Perlantikan Presiden Bagi Badan Pelajar '. $clubName .' </b></u><br><br>
                        Saudara/i telah didaftarkan sebagai presiden bagi kelab berikut di dalam sistem aktiviti pelajar.');

                    $this->email->send();

        
                }

                $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
            }
            redirect('club/kepimpinan/'.$warga.'/'.$clubID);
        
    }
    
    public function _rules(){
       $this->form_validation->set_rules('establishDate', 'Tarikh Penubuhan', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('refNo', 'No. Rujukan', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('clubName', 'Nama Badan Pelajar', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('category', 'Kategori Badan Pelajar', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('advisor1', 'Penasihat 1', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
       $this->form_validation->set_rules('objective', 'Objektif Badan Pelajar', 'required', array(
        'required'=>'%s Mandatory!'
       )) ;
    }

    public function getStaff1() {
        $advisor1 = $this->input->post('advisor1');
        $staff = $this->club_model->staffOption($advisor1); 
    
        $response = array(
            'staffName' => $staff->staffName,
        );
    
        echo json_encode($response);
    }

    public function getStaff2() {
        $advisor2 = $this->input->post('advisor2');
        $staff = $this->club_model->staffOption($advisor2); 
    
        $response = array(
            'staffName' => $staff->staffName,
        );
    
        echo json_encode($response);
    }

    public function editclub($warga, $clubID){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
           $this->club($warga);
        } else {

            $clubName = $this->input->post('clubName');
            $shortName = $this->input->post('shortName');
            $advisor2 = $this->input->post('advisor2');
            $logo = $this->input->post('logo');

            if  ($this->club_model->is_edit_exists($clubName, $clubID)){
            $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data telah wujud!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            } else {
                $data = array(
                    'clubID'=>$clubID,
                    'establishDate'=> $this->input->post('establishDate'),
                    'refNo'=> $this->input->post('refNo'),
                    'clubName'=> $this->input->post('clubName'),
                    'shortName'=> !empty($shortName) ? $shortName : NULL,
                    'category'=> $this->input->post('category'),
                    'logo'=> !empty($logo) ? $logo : NULL,
                    'advisor1'=> $this->input->post('advisor1'),
                    'advisor2'=> !empty($advisor2) ? $advisor2 : NULL,
                    'objective'=> $this->input->post('objective')
                );

                $this->club_model->update_data($data, 'club');
                $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berjaya Dikemaskini!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            }
            
            redirect('club/index/'.$warga);  
        }
    }

    public function editkepimpinan($warga, $kepimpinanID){
        $clubID = $this->input->post('clubID');
          $data = array(
                'kepimpinanID'=>$kepimpinanID,
                'clubID'=> $this->input->post('clubID'),
                'studentID'=> $this->input->post('studentID'),
                'committeeID'=> $this->input->post('committeeID'),
                'status'=> $this->input->post('status'),
            );
            $this->club_model->update_kepimpinan($data, 'kepimpinan');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dikemaskini!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
        
        redirect('club/kepimpinan/'.$warga.'/'.$clubID);
        
    }

    public function deleteclub($warga, $clubID){
        $where = array('clubID' => $clubID);

            $this->club_model->delete_club($where, 'club');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('club/index/'.$warga);
    }

    public function deletekepimpinan($warga, $clubID, $kepimpinanID){
        $where = array('kepimpinanID' => $kepimpinanID);

            $this->club_model->delete_data($where, 'kepimpinan');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('club/kepimpinan/'.$warga.'/'.$clubID);
    }

    public function semak_keahlian($page,$warga)
    {
        $data['club'] = $this->club_model->selectClub('club')->result();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['title'] = 'Semak Keahlian';
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
        $this->load->view('list/semak_keahlian', $data);
        $this->load->view('templates/footer');

        
    }

    public function daftar_jawatankuasa($page,$warga, $clubID)
    {
        $data['clubID'] = $this->club_model->get_club_by_id($clubID)->row();
        $data['studentSelect'] = $this->mpp_model->get_student('student')->result();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['title'] = 'Semak Keahlian';
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
        $this->load->view('list/semak_keahlian', $data);
        $this->load->view('templates/footer');

    }

    
    public function tambah_jawatankuasa($warga, $clubID){
     

        $studentID = $this->input->post('studentID');
        $clubID = $this->input->post('clubID');

            if  ($this->club_model->is_student_exists($studentID,$clubID)){

        $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Matrik pelajar telah wujud!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        
        } else {

            $data = array(
                'clubID'=> $this->input->post('clubID'),
                'studentID'=> $this->input->post('studentID'),
                'committeeID'=> $this->input->post('committeeID'),
                'status'=> $this->input->post('status'),
            );
            $this->club_model->insert_kepimpinan($data, 'kepimpinan');

            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berjaya Disimpan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
        }
        redirect('club/badan_pelajar/senarai_jawatankuasa/'.$warga.'/'.$clubID);
    
    }
    public function carian_badan_pelajar($page, $warga)
    {
        $clubID = $this->input->post('clubID');
        $data['jawatankuasa'] = $this->club_model->get_kepimpinan($clubID, 'kepimpinan')->result();
        $data['clubID'] = $this->club_model->get_club_by_id($clubID)->row();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['title'] = 'Semak Keahlian';
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
        $this->load->view('list/semak_keahlian', $data);
        $this->load->view('templates/footer');
    }
    
    public function badan_pelajar($page, $warga, $clubID)
    {
        $data['jawatankuasa'] = $this->club_model->get_kepimpinan($clubID, 'kepimpinan')->result();
        $data['clubID'] = $this->club_model->get_club_by_id($clubID)->row();
        $data['committee'] = $this->committee_model->selectRole('committee')->result();
        $data['title'] = 'Semak Keahlian';
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
        $this->load->view('list/semak_keahlian', $data);
        $this->load->view('templates/footer');
    }


    public function delete_jawatankuasa($warga, $clubID, $kepimpinanID){
        $where = array('kepimpinanID' => $kepimpinanID);

            $this->club_model->delete_data($where, 'kepimpinan');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('club/badan_pelajar/senarai_jawatankuasa/'.$warga.'/'.$clubID);
    }


    public function edit_jawatankuasa($warga, $kepimpinanID){
        $clubID = $this->input->post('clubID');
        $data = array(
                'kepimpinanID'=>$kepimpinanID,
                'clubID'=> $this->input->post('clubID'),
                'studentID'=> $this->input->post('studentID'),
                'committeeID'=> $this->input->post('committeeID'),
                'status'=> $this->input->post('status'),
            );
            $this->club_model->update_kepimpinan($data, 'kepimpinan');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dikemaskini!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
        
            redirect('club/badan_pelajar/senarai_jawatankuasa/'.$warga.'/'.$clubID);
        
    }
   
}