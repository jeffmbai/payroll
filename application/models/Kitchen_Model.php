<?php

class Kitchen_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function index () {
    }

}