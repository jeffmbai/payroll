<?php

class Budgeting_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function budgets() {
        return $this->db->select('
                        a.*, 
                        b.fiscal_year_name,
                        c.account_name, c.account_code,
                        d.first_name, d.second_name, d.last_name
                    ')
                    ->from('budgeting as a')
                    ->join('fiscal_years as b','a.fiscal_year_id = b.fiscal_year_id')
                    ->join('accounts as c','a.account_id = c.account_id')
                    ->join('employees as d','a.staff_id = d.employee_id','left')
                    ->where("a.fiscal_year_id = '$_SESSION[fsid]' AND a.term_id = '$_SESSION[tmid]' ")
                    ->get()->result();
    }

    public function budget($id) {
        return $this->db->select('
                        a.*, 
                        b.fiscal_year_name,
                        c.account_name, c.account_code,
                        d.first_name, d.second_name, d.last_name
                    ')
                    ->from('budgeting as a')
                    ->join('fiscal_years as b','a.fiscal_year_id = b.fiscal_year_id')
                    ->join('accounts as c','a.account_id = c.account_id')
                    ->join('employees as d','a.staff_id = d.employee_id','left')
                    ->where('a.budget_id',$id)
                    ->get()->row();
    }

    

}




