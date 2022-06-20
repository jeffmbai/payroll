<?php

class Debt_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    ##Total debts start
    public function total_debts () {
        $query = $this->db->query('SELECT SUM(paying_balance) AS total_debts FROM orders WHERE transaction_type_id = 1 OR transaction_type_id =3');
        return $query->result();
        #return $this->db->last_query();
    }
    ##Total debts end
    ##Total credits start
    public function total_credits () {
        $query = $this->db->query('SELECT SUM(paying_balance) AS total_credits FROM orders WHERE transaction_type_id = 2 OR transaction_type_id =4');
        return $query->result();
        #return $this->db->last_query();
    }
    ##Total credits end

    ##Total payments start
    public function total_payments () {
        $query = $this->db->query('SELECT SUM(payment_amount) AS total_payments FROM order_payments');
        return $query->result();
        #return $this->db->last_query();
    }
    ##Total payments end

    ### Entitys with debts start
    public function entity_with_debts ($from_date = null, $to_date = null) {
        $this->db->select ('
            a.*, SUM(a.paying_balance) AS total_balance, SUM(a.net_amount) AS total_net_amount,
            b.firstname, b.secondname, b.lastname, b.phone, b.email           
        ');
        $this->db->from('orders as a');
        $this->db->join('entitys as b', 'b.entity_id = a.customer_supplier_id');

        if($from_date != null && $to_date != null)
            $this->db->where(" date_time BETWEEN '$from_date' AND '$to_date' ");

        $this->db->where(" a.paying_balance > 0 AND a.transaction_type_id IN (1,3) ");
        $this->db->group_by('a.customer_supplier_id');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function customer_debt ($userid) {
        $this->db->select ('
            a.*,
            b.firstname, b.secondname, b.lastname, b.phone, b.email           
        ');
        $this->db->from('orders as a');
        $this->db->join('entitys as b', 'b.entity_id = a.customer_supplier_id');
        $this->db->where(" a.paying_balance > 0 AND a.transaction_type_id IN (1,3) ");
        $this->db->where(" a.customer_supplier_id = '$userid' ");
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ### Entitys with debts end

    

}




