<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Setup_model extends CI_Model {
   
    public function get_admin($table)
    {
        $this->db->select('ADMIN.*, STAFF.*');
        $this->db->from($table);
        $this->db->join('STAFF', 'STAFF.STAFFID = ADMIN.STAFFID');
        return $this->db->get();
    }

    public function selectStaff($table) {
        $this->db->order_by('STAFFID', 'ASC');
        return $this->db->get($table); 
    }

    public function staffOption($staffID)
    {
        return $this->db->get_where('STAFF', array('STAFFID' => $staffID))->row();
    }

    public function insert_data($data,$table)
    {
       $this->db->insert($table,$data);
    }

    public function is_admin_exist($staffID)
    {
        $this->db->where('STAFFID', $staffID);
        $query = $this->db->get('ADMIN');
        
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
         $this->db->select('PARAMETERSURAT.*, STAFF.*');
         $this->db->from($table);
         $this->db->join('STAFF', 'STAFF.STAFFID = PARAMETERSURAT.STAFFID');
         return $this->db->get();
     }

     public function is_parameter_exist($bagiPihak)
     {
         $this->db->where('BAGIPIHAK', $bagiPihak);
         $query = $this->db->get('PARAMETERSURAT');
         
         if ($query->num_rows() > 0) {
             return true;
         } else {
             return false;
         }
     }

     public function selectAdmin($table) {
        $this->db->order_by('ADMINID', 'ASC');
        return $this->db->get($table); 
    }

    public function update_data($data,$table)
    {
       $this->db->where('PARAMETERID',$data['PARAMETERID']);
       $this->db->update($table,$data);
    }

    public function is_editparameter_exist($staffID, $bagiPihak, $status)
    {
        $this->db->where('STAFFID', $staffID);
        $this->db->where('BAGIPIHAK', $bagiPihak);
        $this->db->where('STATUS', $status);
        $query = $this->db->get('PARAMETERSURAT');
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}       