<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Mpp_model extends CI_Model {
   
    public function get_mpp($table)
    {
        $this->db->select('mpp.*, student.*, committee.committee');
        $this->db->from($table);
        $this->db->join('student', 'student.studentID = mpp.studentID');
        $this->db->join('committee', 'committee.committeeID = mpp.positionMPP');
        return $this->db->get();
    }
    public function get_student($table)
    {
        return $this->db->get($table);
    }

    public function studentopt($studentID)
    {
        return $this->db->get_where('student', array('studentID' => $studentID))->row();
    }

    public function insert_data($data,$table)
    {
       $this->db->insert($table,$data);
    }

    public function is_mpp_exists($studentID)
    {
        $this->db->where('studentID', $studentID);
        $query = $this->db->get('mpp');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     public function update_data($data,$table)
     {
        $this->db->where('mppID',$data['mppID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }
    
    public function get_profile($mppID) {

        $this->db->where('mppID', $mppID);
        $this->db->select('mpp.*, student.*, committee.*');
        $this->db->from('mpp');
        $this->db->join('student', 'student.studentID = mpp.studentID');
        $this->db->join('committee', 'committee.committeeID = mpp.positionMpp');
        $query = $this->db->get();

        return $query->row();
    }

    public function adminmpp($checkboxData) {
        foreach ($checkboxData as $data) {
            $mppID = $data['mppID'];
            $adminMPP = $data['adminMPP'];
    
            $this->db->set('adminMPP', $adminMPP);
            $this->db->where('mppID', $mppID);
            $this->db->update('mpp');
        }
    }
    public function selectSesi() {
        $this->db->distinct(); 
        $this->db->select('sesi');
        $this->db->order_by('sesi', 'ASC');
        $query = $this->db->get('student'); 
    
        return $query->result(); 
    }
    
}