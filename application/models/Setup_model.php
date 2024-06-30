<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Setup_model extends CI_Model {
   
    public function get_admin($table)
    {
        $this->db->select('admin.*, staff.*');
        $this->db->from($table);
        $this->db->join('staff', 'staff.staffID = admin.staffID');
        return $this->db->get();
    }

    public function selectStaff($table) {
        $this->db->order_by('staffID', 'ASC');
        return $this->db->get($table); 
    }

    public function staffOption($staffID)
    {
        return $this->db->get_where('staff', array('staffID' => $staffID))->row();
    }

    public function insert_data($data,$table)
    {
       $this->db->insert($table,$data);
    }

    public function is_admin_exist($staffID)
    {
        $this->db->where('staffID', $staffID);
        $query = $this->db->get('admin');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

     public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }

     public function get_parameter($table)
     {
         $this->db->select('parametersurat.*, staff.*');
         $this->db->from($table);
         $this->db->join('staff', 'staff.staffID = parametersurat.staffID');
         return $this->db->get();
     }

     public function is_parameter_exist($bagiPihak)
     {
         $this->db->where('bagiPihak', $bagiPihak);
         $query = $this->db->get('parametersurat');
         
         if ($query->num_rows() > 0) {
             return true;
         } else {
             return false;
         }
     }

     public function selectAdmin($table) {
        $this->db->order_by('adminID', 'ASC');
        return $this->db->get($table); 
    }

    public function update_data($data,$table)
    {
       $this->db->where('parameterID',$data['parameterID']);
       $this->db->update($table,$data);
    }

    public function is_editparameter_exist($bagiPihak, $status)
    {
        $this->db->where('bagiPihak', $bagiPihak);
        $this->db->where('status', $status);
        $query = $this->db->get('parametersurat');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}       