<?php

class Data_Import extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function insert ($data) {
        #bulk import/insert of data into the database
        $this->db->insert_batch('items_two', $data);
        #$this->db->insert_batch('items', $data);
    }

}




