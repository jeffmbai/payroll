<?php

class Systemvalidations extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
    }

    public function register_validation($register_data)
    {
        $this->form_validation->set_rule('fname', 'First name', 'required|trim');

        if($this->form_validation->run()){
            //true
        }
        else{
            //false
        }
    }
}