<?php

class System_Roles extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }


    public function all_roles () {
        return $this->db->order_by('role_name ASC')->get('roles')->result();
    }







}










