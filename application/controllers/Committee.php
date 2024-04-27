    <?php
    defined("BASEPATH") OR exit("No direct script access allowed");

    class Committee extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('committee_model');
            $this->load->model('login_model');

        }
    public function index($warga)
    {
        $data['committee'] = $this->committee_model->get_committee('committee')->result();
        $data['categoryrole'] = $this->committee_model->get_categoryrole('categoryrole')->result();
        $data['title'] = 'Jawatankuasa';
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
        $this->load->view('list/committee');
        $this->load->view('templates/footer');
    }

    public function committee($warga)
    {
      
        $data['categoryrole'] = $this->committee_model->get_categoryrole('categoryrole')->result();
        $data['title'] = 'Jawatankuasa';
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
        $this->load->view('form/insertcommittee');
        $this->load->view('templates/footer');
    }

    public function addcommittee($warga){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
           $this->committee($warga);
        } else {
            $committee = $this->input->post('committee');
            $categoryRoleID = $this->input->post('categoryRoleID');
    
            if  ($this->committee_model->is_committee_exists($committee, $categoryRoleID)){
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'committee' => $this->input->post('committee'),
                    'merit' => $this->input->post('merit'),
                    'categoryRoleID' => $this->input->post('categoryRoleID'),
                );
                $this->committee_model->insert_data($data, 'committee');
    
                $this->session->set_flashdata('reminder', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            }
            
            redirect('committee/index/'.$warga);
        }
    }

    public function editcommittee($warga, $committeeID){
        $this->_rules();

        if ($this->form_validation->run() == FALSE){
            $this->index($warga);
        } else {
            $committee = $this->input->post('committee');
            $categoryRoleID = $this->input->post('categoryRoleID');
    
            if ($this->committee_model->is_edit_exist($committee, $categoryRoleID, $committeeID)) {
                $this->session->set_flashdata('reminder', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data telah wujud!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            } else {
                $data = array(
                    'committeeID'=>$committeeID,
                    'committee' => $this->input->post('committee'),
                    'merit' => $this->input->post('merit'),
                    'categoryRoleID' => $this->input->post('categoryRoleID'),
                );
            
                $this->committee_model->update_data($data, 'committee');
                $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berjaya Dikemaskini!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button></div>');
            }
            
            
            redirect('committee/index/'.$warga);
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('committee', 'Nama Jawatan', 'required', array(
         'required'=>'%s Mandatory!'
        )) ;
        $this->form_validation->set_rules('merit', 'Merit', 'required', array(
         'required'=>'%s Mandatory!'
        )) ;
        $this->form_validation->set_rules('categoryRoleID', 'Kategori Jawatan', 'required', array(
         'required'=>'%s Mandatory!'
        )) ;
        
     }

    public function deletecommittee($warga, $committeeID){
        $where = array('committeeID' => $committeeID);

            $this->committee_model->delete_data($where, 'committee');
            $this->session->set_flashdata('reminder','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berjaya Dipadam!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button></div>');
            
            redirect('committee/index/'.$warga);
    }
}