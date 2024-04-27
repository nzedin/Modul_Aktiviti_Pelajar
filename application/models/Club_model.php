<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Club_model extends CI_Model {
   
    public function get_club($table)
    {
        $this->db->select('club.*, staff1.staffID AS advisor1_id, staff1.staffName AS advisor1_name, staff2.staffID AS advisor2_id, staff2.staffName AS advisor2_name, category.*');
        $this->db->from($table);
        $this->db->join('staff AS staff1', 'staff1.staffID = club.advisor1');
        $this->db->join('staff AS staff2', 'staff2.staffID = club.advisor2', 'left'); 
        $this->db->join('category', 'category.categoryID = club.category');

        return $this->db->get();

    }

    public function get_club_by_student($table, $studentID)
    {
        $this->db->select('club.*, kepimpinan.*');
        $this->db->from($table);
        $this->db->join('kepimpinan', 'club.clubID = kepimpinan.clubID');
        $this->db->where('kepimpinan.studentID', $studentID);

        return $this->db->get();

    }

    public function get_kepimpinan($clubID,$table)
    {
        $this->db->select('kepimpinan.*, club.*, student.*, committee.*');
        $this->db->from($table);
        $this->db->join('club', 'club.clubID = kepimpinan.clubID');
        $this->db->join('student', 'student.studentID = kepimpinan.studentID'); 
        $this->db->join('committee', 'committee.committeeID = kepimpinan.committeeID');
        $this->db->where('kepimpinan.clubID', $clubID);

        return $this->db->get();
    }

    public function get_club_by_id($clubID)
    {
        $this->db->select('club.*');
        $this->db->from('club');
        $this->db->where('clubID', $clubID);
        
        return $this->db->get();
    }

    public function get_student_by_id($studentID)
    {
        $this->db->select('student.studentEmail');
        $this->db->from('student');
        
        $this->db->where('studentID', $studentID);

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
            // Check if the logo_data is set in the $data array
        if (isset($data['logo'])) {
            // If logo_data is set, we don't need to fetch it from $_FILES
            $logo_data = $data['logo'];
            unset($data['logo_data']); // Remove logo_data from the $data array as it's not a column in the table
        } elseif (!empty($_FILES['logo']['tmp_name'])) {
            // If logo_data is not set, fetch it from $_FILES
            $logo_data = file_get_contents($_FILES['logo']['tmp_name']);
        }

        // Assign logo_data to $data
        $data['logo'] = $logo_data;

       $this->db->insert($table,$data);
    }

    public function insert_kepimpinan($data,$table)
    {
       $this->db->insert($table,$data);
    }

    public function is_club_exists($clubName)
    {
        $this->db->where('clubName', $clubName);
        $query = $this->db->get('club');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_edit_exists($clubName, $clubID)
    {
        $this->db->where('clubName', $clubName);
        $this->db->where('clubID !=', $clubID);
        $query = $this->db->get('club');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_student_exists($studentID,$clubID)
    {
        $this->db->where('studentID', $studentID);
        $this->db->where('clubID', $clubID);
        $query = $this->db->get('kepimpinan');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     public function update_data($data,$table)
     {

         // Check if the logo_data is set in the $data array
         if (isset($data['logo'])) {
            // If logo_data is set, we don't need to fetch it from $_FILES
            $logo_data = $data['logo'];
            unset($data['logo_data']); // Remove logo_data from the $data array as it's not a column in the table
        } elseif (!empty($_FILES['logo']['tmp_name'])) {
            // If logo_data is not set, fetch it from $_FILES
            $logo_data = file_get_contents($_FILES['logo']['tmp_name']);
        }

        // Assign logo_data to $data
        $data['logo'] = $logo_data;

        $this->db->where('clubID',$data['clubID']);
        $this->db->update($table,$data);
     }

     public function update_kepimpinan($data,$table)
     {
        $this->db->where('kepimpinanID',$data['kepimpinanID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }

     public function delete_club($where,$table){
        if ($table === 'club') {
            $clubID = $where['clubID'];
    
            $this->db->where('clubID', $clubID);
            $this->db->delete('kepimpinan');
        }
    
        $this->db->where($where);
        $this->db->delete($table);
     }
    
     public function get_profile($clubID) {
        $this->db->select('club.*, staff1.staffID AS advisor1_id, staff1.staffName AS advisor1_name, staff2.staffID AS advisor2_id, staff2.staffName AS advisor2_name, category.*, kepimpinan.*, student.*, committee.*');
        $this->db->from('club');
        $this->db->join('staff AS staff1', 'staff1.staffID = club.advisor1');
        $this->db->join('staff AS staff2', 'staff2.staffID = club.advisor2', 'left'); 
        $this->db->join('category', 'category.categoryID = club.category');
        $this->db->join('kepimpinan', 'club.clubID = kepimpinan.clubID', 'left');
        $this->db->join('student', 'student.studentID = kepimpinan.studentID', 'left'); 
        $this->db->join('committee', 'committee.committeeID = kepimpinan.committeeID', 'left');
        $this->db->where('club.clubID', $clubID);
        $query = $this->db->get();
    
        return $query->row();
    }
    


    public function selectCategory($table) {
        $this->db->order_by('category', 'ASC');
        return $this->db->get($table); 
    }
    
    public function selectStaff($table) {
        $this->db->order_by('staffID', 'ASC');
        return $this->db->get($table); 
    }

    public function staffOption($staffID)
    {
        return $this->db->get_where('staff', array('staffID' => $staffID))->row();
    }
    
}