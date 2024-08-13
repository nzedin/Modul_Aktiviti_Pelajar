<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Mpp_model extends CI_Model {
   
    public function get_mpp($table)
    {
        $this->db->select('MPP.*, STUDENT.*, COMMITTEE.COMMITTEE');
        $this->db->from($table);
        $this->db->join('STUDENT', 'STUDENT.STUDENTID = MPP.STUDENTID');
        $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = MPP.POSITIONMPP');
        return $this->db->get();
    }
    public function get_student($table)
    {
        return $this->db->get($table);
    }

    public function studentopt($studentID)
    {
        return $this->db->get_where('STUDENT', array('STUDENTID' => $studentID))->row();
    }

    public function insert_data($data,$table)
    {
       $this->db->insert($table,$data);
    }

    public function is_mpp_exists($studentID)
    {
        $this->db->where('STUDENTID', $studentID);
        $query = $this->db->get('MPP');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     public function update_data($data,$table)
     {
        $this->db->where('MPPID',$data['MPPID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }
    
    public function get_profile($mppID) {

        $this->db->where('MPPID', $mppID);
        $this->db->selecT('MPP.*, STUDENT.*, COMMITTEE.*');
        $this->db->from('MPP');
        $this->db->join('STUDENT', 'STUDENT.STUDENTID = MPP.STUDENTID');
        $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = MPP.POSITIONMPP');
        $query = $this->db->get();

        return $query->row();
    }

    public function adminmpp($checkboxData) {
        foreach ($checkboxData as $data) {
            $mppID = $data['MPPID'];
            $adminMPP = $data['ADMINMPP'];
    
            $this->db->set('ADMINMPP', $adminMPP);
            $this->db->where('MPPID', $mppID);
            $this->db->update('MPP');
        }
    }
    public function selectSesi() {
        $this->db->distinct(); 
        $this->db->select('SESI');
        $this->db->order_by('SESI', 'ASC');
        $query = $this->db->get('STUDENT'); 
    
        return $query->result(); 
    }
    
}