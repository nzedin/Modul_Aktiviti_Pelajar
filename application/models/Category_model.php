<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Category_model extends CI_Model {
   
    public function get_category($table)
    {

        return $this->db->get($table);
    }
    
    public function is_category_exists($category)
    {
        $this->db->where('CATEGORY', $category);
        $query = $this->db->get('CATEGORY');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function is_edit_exists($category, $categoryID)
    {
        $this->db->where('CATEGORY', $category);
        $this->db->where('CATEGORYID !=', $categoryID);
        $query = $this->db->get('CATEGORY');

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
        $this->db->where('CATEGORYID',$data['CATEGORYID']);
        $this->db->update($table,$data);
     }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }
}