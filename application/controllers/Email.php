<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Email extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library("email");
        $this->load->model('laporan_model');

    }


    public function send_email($studentID, $programID) {
        $sendEmailResult = $this->laporan_model->get_studentEmail($studentID)->result();
        $progNameResult = $this->laporan_model->get_programName($programID)->result();

        // Extract email addresses
        $sendEmail = [];
        foreach ($sendEmailResult as $row) {
            $sendEmail[] = $row->studentEmail;
        }
        $programName = '';
        if (!empty($progNameResult)) {
            $programName = $progNameResult[0]->programName;
        }

        $config = array (
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_timeout' => 30,
            'smtp_port' => 465,
          //  'smtp_user' => 'nzed215@gmail.com', 
          //  'smtp_pass' => 'kcbcvvefbimreihd',
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

        $this->email->subject('Notis Kelewatan Penghantaran Laporan Aktiviti');
        $this->email->message('
            Assalamualaikum dan Salam Sejahtera <br><br> 
            Saudara/i, <br><br> 
            <u><b>Kelewatan Muat Naik Laporan Aktiviti '. $programName .' </b></u><br><br>
            Anda diminta mengambil tindakan segera mengisi maklumat laporan tamat program. <br><br>
            Harap Maklum.');

        if ($this->email->send()) {
            echo "<script>
                    alert('Email Berjaya Dihantar!');
                    window.location.href = '" . base_url('laporan/report_reminder/staff') . "';
                  </script>";
        } else {
            $debugger = json_encode($this->email->print_debugger());
            echo "<script>
                    alert($debugger);
                    window.location.href = '" . base_url('laporan/report_reminder/staff') . "';
                  </script>";
        }
    }

   
}