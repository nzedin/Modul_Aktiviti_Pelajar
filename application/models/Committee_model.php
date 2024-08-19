<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Committee_model extends CI_Model {
   
    public function get_committee($table)
    {

        $this->db->select('COMMITTEE.*, CATEGORYROLE.CATEGORYROLE AS CATEGORYROLE_NAME');
        $this->db->from($table);
        $this->db->join('CATEGORYROLE', 'CATEGORYROLE.CATEGORYROLEID = COMMITTEE.CATEGORYROLEID');
        return $this->db->get();
      
    }
    
    public function get_categoryrole($table)
    {

        return $this->db->get($table);
    }

    public function is_committee_exists($committee, $categoryRoleID)
    {
        $this->db->where('COMMITTEE', $committee);
        $this->db->where('CATEGORYROLEID', $categoryRoleID);
        $query = $this->db->get('COMMITTEE');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_edit_exist($committee, $categoryRoleID, $excludeCommitteeID)
    {
        $this->db->where('COMMITTEE', $committee);
        $this->db->where('CATEGORYROLEID', $categoryRoleID);
        
        $this->db->where('COMMITTEEID !=', $excludeCommitteeID);
        $query = $this->db->get('COMMITTEE');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }



    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
     }

     public function update_data($data,$table)
     {
        $this->db->where('COMMITTEEID',$data['COMMITTEEID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }

     public function selectRole() {
        $this->db->select('COMMITTEE.*, CATEGORYROLE.*');
        $this->db->from('COMMITTEE');
        $this->db->join('CATEGORYROLE', 'CATEGORYROLE.CATEGORYROLEID = COMMITTEE.CATEGORYROLEID');
        return $this->db->get();        
    }

    public function has_dependent_records($committeeID) {
        $this->db->where('COMMITTEEID', $committeeID);
        $query = $this->db->get('KEPIMPINAN');
    
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    public function has_dependent_record($committeeID) {
        $this->db->where('POSITIONMPP', $committeeID);
        $query = $this->db->get('MPP');
    
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }
}