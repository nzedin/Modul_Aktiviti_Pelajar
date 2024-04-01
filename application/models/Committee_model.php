<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Committee_model extends CI_Model {
   
    public function get_committee($table)
    {

        $this->db->select('committee.*, categoryrole.categoryrole as categoryrole_name');
        $this->db->from($table);
        $this->db->join('categoryrole', 'categoryrole.categoryRoleID = committee.categoryRoleID');
        return $this->db->get();
      
    }
    
    public function get_categoryrole($table)
    {

        return $this->db->get($table);
    }

    public function is_committee_exists($committee, $categoryRoleID)
    {
        $this->db->where('committee', $committee);
        $this->db->where('categoryRoleID', $categoryRoleID);
        $query = $this->db->get('committee');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_edit_exist($committee, $categoryRoleID, $excludeCommitteeID)
    {
        $this->db->where('committee', $committee);
        $this->db->where('categoryRoleID', $categoryRoleID);
        
        $this->db->where('committeeID !=', $excludeCommitteeID);
        $query = $this->db->get('committee');
        
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
        $this->db->where('committeeID',$data['committeeID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }

     public function selectRole() {
        $this->db->select('committee.*, categoryrole.*');
        $this->db->from('committee');
        $this->db->join('categoryrole', 'categoryrole.categoryRoleID = committee.categoryRoleID');
        return $this->db->get();        
    }
}