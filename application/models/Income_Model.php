<?php

class Income_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function all_incomes() {
        $resp = $this->db->select('a.*, b.account_name, c.status_name, d.department_name')
                ->from('incomes as a')
                ->join('accounts as b','a.account_id = b.account_id')
                ->join('status as c','a.status_id = c.status_id','left')
                ->join('departments as d','a.department_id = d.department_id','left')
                ->get()->result();
        return $resp;
    }

    public function this_income($id) {
        $resp = $this->db->select('a.*, b.account_name, c.status_name,
                        d.firstname, d.secondname, d.lastname, d.id_passport, d.phone, d.email, e.department_name')
                ->from('incomes as a')
                ->join('accounts as b','a.account_id = b.account_id')
                ->join('status as c','a.status_id = c.status_id','left')
                ->join('entitys as d','a.created_by = d.entity_id','left')
                ->join('departments as e','a.department_id = e.department_id','left')
                ->where('a.income_id', $id)
                ->get()->row();
        return $resp;
    }

    public function this_payment ($id) {
        $this->db->select ('
            income_payments.*,
            
            accounts.account_name, accounts.account_code,
            subaccount_types.subaccount_type_name, subaccount_types.subaccount_type_code,
            
            incomes.income_id, incomes.org_id, incomes.account_id as income_account_id,
            incomes.status_id, incomes.income_amount, incomes.narrative, incomes.income_date,

            orgs.org_name, orgs.address, orgs.currency_id, orgs.country_id,
            currencies.currency_code,
            countries.name,

            status.status_name,

            entitys.entity_name, entitys.firstname, entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport
            
            FROM income_payments
        ', FALSE);
        $this->db->join('accounts', 'accounts.account_id = income_payments.account_id');
        $this->db->join('subaccount_types', 'subaccount_types.subaccount_type_id = income_payments.subaccount_type_id', 'left');
        $this->db->join('incomes', 'income_payments.income_id = incomes.income_id');
        $this->db->join('status', 'status.status_id = incomes.status_id','left');
        $this->db->join('orgs', 'orgs.org_id = incomes.org_id');
        $this->db->join('countries', 'countries.country_id = orgs.country_id', 'LEFT');
        $this->db->join('currencies', 'currencies.currency_id = orgs.currency_id', 'LEFT');
        //$this->db->join('expense_types', 'expense_types.expense_type_id = incomes.expense_type_id');
        // $this->db->join('vote_heads', 'vote_heads.vote_head_id = incomes.vote_head_id', 'left');
        $this->db->join('entitys', 'entitys.entity_id = income_payments.entity_id');

        $this->db->where('income_payments.income_payment_id', $id);
        $result = $this->db->get();
        return $result->row();
        #return $this->db->last_query();
    }
    


    

}




