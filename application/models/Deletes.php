<?php

class Deletes extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function delete_data($table, $data)
    {
        #Delete data from database
        #All we need is the id passed and table name
        if($this->db->delete($table, $data)) return true;
        else return false;
    }

}










