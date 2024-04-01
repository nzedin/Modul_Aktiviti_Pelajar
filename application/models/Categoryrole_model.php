<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Categoryrole_model extends CI_Model {
   
    public function get_categoryrole($table)
    {

        return $this->db->get($table);
    }
    
    public function is_categoryrole_exists($categoryrole)
    {
        $this->db->where('categoryrole', $categoryrole);
        $query = $this->db->get('categoryrole');

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
        $this->db->where('categoryRoleID',$data['categoryRoleID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }

     public function has_dependent_records($categoryRoleID) {
        $this->db->where('categoryRoleID', $categoryRoleID);
        $query = $this->db->get('committee');
    
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }
}