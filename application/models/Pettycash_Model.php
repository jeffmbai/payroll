<?php

class Pettycash_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    #get budgets start
    public function my_pettycash() {
        return $this->db->select ('a.*, b.status_name, c.account_name, d.department_name')
                ->from('petty_cash as a')
                ->join('status as b','a.status_id = b.status_id')
                ->join('accounts as c','a.account_id = c.account_id')
                ->join('departments as d','a.department_id = d.department_id')
                
                ->where("a.entity_id = '$_SESSION[userid]' ")
                ->get()->result();
    }

    public function all_pettycash() {
        return $this->db->select ('a.*, b.status_name, c.account_name, d.department_name, e.firstname, e.secondname, e.lastname, e.phone, e.id_passport, e.email')
                ->from('petty_cash as a')
                ->join('status as b','a.status_id = b.status_id')
                ->join('accounts as c','a.account_id = c.account_id')
                ->join('departments as d','a.department_id = d.department_id')
                ->join('entitys as e','a.entity_id = e.entity_id')
                ->get()->result();
    }

    public function this_pettycash($id) {
        return $this->db->select ('a.*, b.status_name, c.account_name, d.department_name, e.firstname, e.secondname, e.lastname, e.phone, e.id_passport, e.email')
                ->from('petty_cash as a')
                ->join('status as b','a.status_id = b.status_id')
                ->join('accounts as c','a.account_id = c.account_id')
                ->join('departments as d','a.department_id = d.department_id')
                ->join('entitys as e','a.entity_id = e.entity_id')
                ->where('a.id', $id)
                ->get()->row();
    }
    
    #get budgets End





}




