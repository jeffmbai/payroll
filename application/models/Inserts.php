<?php

class Inserts extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function insert_data($table, $data)
    {
        //insert data function  
        if($this->db->insert($table, $data)) return true;
        else return false;
    }

    public function update_data($table, $data, $condition)
    {
        //update data in the table
        if($this->db->update($table, $data, $condition)) return true;
        else return false;
    }

    public function delete_task($table, $taskID)
    {
        //delete user task
        if($this->db->delete($table, array('ct_id' => $taskID))) return true;
        else return false;
    }

}










