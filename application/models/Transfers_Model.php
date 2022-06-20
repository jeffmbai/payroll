<?php

class Transfers_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    ##Total debts start
    public function total_debts () {
        $query = $this->db->query('SELECT SUM(paying_balance) AS total_debts FROM orders');
        return $query->result();
        #return $this->db->last_query();
    }
    ##Total debts end

    ##Total payments start
    public function total_payments () {
        $query = $this->db->query('SELECT SUM(payment_amount) AS total_payments FROM order_payments');
        return $query->result();
        #return $this->db->last_query();
    }
    ##Total payments end

    ### Entitys with debts start
    public function entity_with_debts () {
        $this->db->select ('
            customer_supplier_id, SUM(paid_amount) AS total_paid, SUM(paying_balance) AS total_debt,
            entitys.firstname, entitys.secondname, entitys.lastname, entitys.phone, entitys.email, entitys.id_passport, entitys.entity_address,
            orgs.org_name
            
            FROM orders
        ', FALSE);
        $this->db->join('entitys', 'entitys.entity_id = orders.customer_supplier_id');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id', 'left');
        $this->db->where("paying_balance > 0 ");
        $this->db->group_by('customer_supplier_id');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ### Entitys with debts end

    

}




