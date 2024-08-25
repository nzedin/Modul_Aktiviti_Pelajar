<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Club_model extends CI_Model {
   
   
    public function get_club($table)
    {
        $this->db->select('CLUB.*, STAFF1.STAFFID AS ADVISOR1_ID, STAFF1.STAFFNAME AS ADVISOR1_NAME, STAFF2.STAFFID AS ADVISOR2_ID, STAFF2.STAFFNAME AS ADVISOR2_NAME, CATEGORY.*');
        $this->db->from($table . ' CLUB');
        $this->db->join('STAFF STAFF1', 'STAFF1.STAFFID = CLUB.ADVISOR1');
        $this->db->join('STAFF STAFF2', 'STAFF2.STAFFID = CLUB.ADVISOR2', 'left'); 
        $this->db->join('CATEGORY', 'CATEGORY.CATEGORYID = CLUB.CATEGORY');

        return $this->db->get();
    }
    
    public function get_club_by_student($table, $studentID)
    {
        $this->db->select('CLUB.*, KEPIMPINAN.*');
        $this->db->from($table);
        $this->db->join('KEPIMPINAN', 'CLUB.CLUBID = KEPIMPINAN.CLUBID');
        $this->db->where('KEPIMPINAN.STUDENTID', $studentID);

        return $this->db->get();

    }

    public function get_kepimpinan($clubID,$table)
    {
        $this->db->select('KEPIMPINAN.*, CLUB.*, STUDENT.*, COMMITTEE.*');
        $this->db->from($table);
        $this->db->join('CLUB', 'CLUB.CLUBID = KEPIMPINAN.CLUBID');
        $this->db->join('STUDENT', 'STUDENT.STUDENTID = KEPIMPINAN.STUDENTID'); 
        $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = KEPIMPINAN.COMMITTEEID');
        $this->db->where('KEPIMPINAN.CLUBID', $clubID);

        return $this->db->get();
    }

    public function get_club_by_id($clubID)
    {
        $this->db->select('CLUB.*');
        $this->db->from('CLUB');
        $this->db->where('CLUBID', $clubID);
        
        return $this->db->get();
    }

    public function get_student_by_id($studentID)
    {
        $this->db->select('STUDENT.STUDENTEMAIL');
        $this->db->from('STUDENT');
        
        $this->db->where('STUDENTID', $studentID);

        $query = $this->db->get();

        if ($query->num_rows() === 1) {
            return $query->row()->studentEmail;
        }

        return false;
    }

    public function get_student($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data,$table)
    {

       $this->db->insert($table,$data);
    }

    public function insert_kepimpinan($data,$table)
    {
       $this->db->insert($table,$data);
    }

    public function is_club_exists($clubName)
    {
        $this->db->where('CLUBNAME', $clubName);
        $query = $this->db->get('CLUB');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_edit_exists($clubName, $clubID)
    {
        $this->db->where('CLUBNAME', $clubName);
        $this->db->where('CLUBID !=', $clubID);
        $query = $this->db->get('CLUB');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_student_exists($studentID,$clubID)
    {
        $this->db->where('STUDENTID', $studentID);
        $this->db->where('CLUBID', $clubID);
        $query = $this->db->get('KEPIMPINAN');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     public function update_data($data,$table)
     {

        $this->db->where('CLUBID',$data['CLUBID']);
        $this->db->update($table,$data);
     }

     public function update_kepimpinan($data,$table)
     {
        $this->db->where('KEPIMPINANID',$data['KEPIMPINANID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }

     public function delete_club($where,$table){
        if ($table === 'CLUB') {
            $clubID = $where['CLUBID'];
    
            $this->db->where('CLUBID', $clubID);
            $this->db->delete('KEPIMPINAN');
        }
    
        $this->db->where($where);
        $this->db->delete($table);
     }
    
     public function get_profile($clubID) {
        $this->db->select('CLUB.*, STAFF1.STAFFID AS ADVISOR1_ID, STAFF1.STAFFNAME AS ADVISOR1_NAME, STAFF2.STAFFID AS ADVISOR2_ID, STAFF2.STAFFNAME AS ADVISOR2_NAME, CATEGORY.*, KEPIMPINAN.*, STUDENT.*, COMMITTEE.*');
        $this->db->from('CLUB');
        $this->db->join('STAFF STAFF1', 'STAFF1.STAFFID = CLUB.ADVISOR1');
        $this->db->join('STAFF STAFF2', 'STAFF2.STAFFID = CLUB.ADVISOR2', 'left'); 
        $this->db->join('CATEGORY', 'CATEGORY.CATEGORYID = CLUB.CATEGORY');
        $this->db->join('KEPIMPINAN', 'CLUB.CLUBID = KEPIMPINAN.CLUBID', 'left');
        $this->db->join('STUDENT', 'STUDENT.STUDENTID = KEPIMPINAN.STUDENTID', 'left'); 
        $this->db->join('COMMITTEE', 'COMMITTEE.COMMITTEEID = KEPIMPINAN.COMMITTEEID', 'left');
        $this->db->where('CLUB.CLUBID', $clubID);
        $query = $this->db->get();
    
        return $query->row();
    }
    
    public function selectCategory() {
        $this->db->order_by('CATEGORY', 'ASC');
        return $this->db->get('CATEGORY'); 
    }
    
    public function selectStaff($table) {
        $this->db->order_by('STAFFID', 'ASC');
        return $this->db->get($table); 
    }

    public function staffOption($staffID)
    {
        return $this->db->get_where('STAFF', array('STAFFID' => $staffID))->row();
    }

    public function selectClub($table) {
        $this->db->order_by('CLUBNAME', 'ASC');
        return $this->db->get($table); 
    }
    
}