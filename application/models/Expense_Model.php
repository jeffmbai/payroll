<?php

class Expense_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function expense_types () {
        #expense types
        $this->db->from('expense_types');
        $result = $this->db->get();
        return $result->result();
    }

    public function all_expenses () {
        //all expenses
        $this->db->select ('
            expenses.*,
            orgs.org_name, orgs.address, orgs.currency_id, orgs.country_id,
            
            status.status_name,

            departments.department_name,

            accounts.account_name, accounts.account_code,

            entitys.entity_name, entitys.firstname, entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport
            
            FROM expenses
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = expenses.org_id');
        $this->db->join('status', 'status.status_id = expenses.status_id');
        $this->db->join('departments', 'departments.department_id = expenses.department_id','left');
        $this->db->join('accounts', 'expenses.account_id = accounts.account_id');
        $this->db->join('entitys', 'entitys.entity_id = expenses.entity_id');
        $this->db->order_by('expenses.expense_date ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function expense_details ($id) {
        // expense details
        $this->db->select ('
            expenses.*,
            
            orgs.org_name, orgs.address, orgs.currency_id, orgs.country_id,
            currencies.currency_code,
            countries.name,
            
            status.status_name,

            departments.department_name,

            accounts.account_name, accounts.account_code,
                        
            entitys.entity_name, entitys.firstname, entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport, entitys.email,

            (SELECT SUM(payment_amount) FROM payments WHERE expense_id = expenses.expense_id) AS paid_amount
            
            FROM expenses
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = expenses.org_id');
        $this->db->join('countries', 'countries.country_id = orgs.country_id', 'LEFT');
        $this->db->join('currencies', 'currencies.currency_id = orgs.currency_id', 'LEFT');
        $this->db->join('departments', 'departments.department_id = expenses.department_id','left');
        $this->db->join('status', 'status.status_id = expenses.status_id');
        $this->db->join('accounts', 'expenses.account_id = accounts.account_id');
        $this->db->join('entitys', 'entitys.entity_id = expenses.entity_id');
        $this->db->where('expenses.expense_id', $id);
        $result = $this->db->get();
        return $result->row();
    }

    public function unsettled_expenses () {
        //unsettled expenses
        $this->db->select ('
            expenses.expense_id, expenses.org_id, expenses.expense_type_id, expenses.vote_head_id,
            expenses.entity_id, expenses.status_id, expenses.expense_amount, expenses.active, expenses.narrative, 
            expenses.paid_to, expenses.expense_balance,
            expenses.expense_date, expenses.date_modified, expenses.time_stamp,
            
            orgs.org_name, orgs.address, orgs.currency_id, orgs.country_id,
            currencies.currency_code,
            countries.name,
            
            status.status_name,

            departments.department_name,

            expense_types.expense_type_name,
                        
            entitys.entity_name, entitys.firstname, entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport
            
            FROM expenses
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = expenses.org_id');
        $this->db->join('countries', 'countries.country_id = orgs.country_id', 'LEFT');
        $this->db->join('currencies', 'currencies.currency_id = orgs.currency_id', 'LEFT');
        $this->db->join('departments', 'departments.department_id = expenses.department_id','left');
        $this->db->join('status', 'status.status_id = expenses.status_id');
        $this->db->join('expense_types', 'expense_types.expense_type_id = expenses.expense_type_id');
        $this->db->join('entitys', 'entitys.entity_id = expenses.entity_id');
        $this->db->where('expenses.expense_balance > 0');
        $this->db->order_by('expenses.expense_date ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function payments () {
        //all payments
        $this->db->select ('
            payments.payment_id, payments.expense_id, payments.payment_mode_id, payments.payment_amount, 
            payments.payment_date, payments.check_no, payments.active, payments.narrative, 
            payments.date_modified, payments.time_stamp,
            
            payment_modes.payment_mode_name,
            
            expenses.vote_head_id, expenses.status_id, expenses.expense_amount, expenses.expense_balance,
            expenses.paid_to,

            status.status_name
            
            FROM payments
        ', FALSE);
        $this->db->join('payment_modes', 'payment_modes.payment_mode_id = payments.payment_id', 'left');
        $this->db->join('expenses', 'payments.expense_id = expenses.expense_id');
        $this->db->join('status', 'status.status_id = expenses.status_id','left');
        $this->db->order_by('payments.payment_date DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function this_payments ($id) {
        //all payments
        $this->db->select ('
            payments.*,
            
            accounts.account_name, accounts.account_code,
            subaccount_types.subaccount_type_name, subaccount_types.subaccount_type_code,
            
            expenses.expense_id, expenses.org_id, expenses.account_id as expense_account_id, expenses.vote_head_id,
            expenses.entity_id, expenses.status_id, expenses.expense_amount, expenses.active, expenses.narrative, 
            expenses.paid_to, expenses.expense_balance, expenses.expense_date,

            orgs.org_name, orgs.address, orgs.currency_id, orgs.country_id,
            currencies.currency_code,
            countries.name,

            status.status_name,

            entitys.entity_name, entitys.firstname, entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport
            
            FROM payments
        ', FALSE);
        $this->db->join('accounts', 'accounts.account_id = payments.account_id');
        $this->db->join('subaccount_types', 'subaccount_types.subaccount_type_id = payments.subaccount_type_id', 'left');
        $this->db->join('expenses', 'payments.expense_id = expenses.expense_id');
        $this->db->join('status', 'status.status_id = expenses.status_id','left');
        $this->db->join('orgs', 'orgs.org_id = expenses.org_id');
        $this->db->join('countries', 'countries.country_id = orgs.country_id', 'LEFT');
        $this->db->join('currencies', 'currencies.currency_id = orgs.currency_id', 'LEFT');
        // $this->db->join('expense_types', 'expense_types.expense_type_id = expenses.expense_type_id');
        // $this->db->join('vote_heads', 'vote_heads.vote_head_id = expenses.vote_head_id', 'left');
        $this->db->join('entitys', 'entitys.entity_id = expenses.entity_id');

        $this->db->where('payments.payment_id', $id);
        $result = $this->db->get();
        return $result->row();
        #return $this->db->last_query();
    }

    public function expense_payments ($expenseID) {
        //expense payments
        $this->db->select ('
            payments.*,
            
            accounts.account_name, accounts.account_code,
            subaccount_types.subaccount_type_name, subaccount_types.subaccount_type_code,
            
            expenses.vote_head_id, expenses.status_id, expenses.expense_amount, expenses.expense_balance,
            expenses.paid_to,

            status.status_name
            
            FROM payments
        ', FALSE);
        $this->db->join('accounts', 'accounts.account_id = payments.account_id');
        $this->db->join('subaccount_types', 'subaccount_types.subaccount_type_id = payments.subaccount_type_id', 'left');
        $this->db->join('expenses', 'payments.expense_id = expenses.expense_id');
        $this->db->join('status', 'status.status_id = expenses.status_id','left');
        $this->db->where('expenses.expense_id', $expenseID);
        $this->db->order_by('payments.payment_date DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }

    // Accounting Section Start
    public function general_expenses () {
        $info = $this->db->select('*, SUM(voucher_amount) as expense_amount
        ')
        ->from('vw_general_ledger')
        ->where("account_type_id = 3 AND voucher_type = 'dr' ")
        ->group_by('account_id')
        ->get()->result();
        // return $this->db->last_query();
        return $info;
    } 
    // Accounting Section End
    


}




