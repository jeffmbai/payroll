<?php

class Accounting_Model extends CI_Model
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

    /**  Profit & Loss Start */
    public function profit_loss ($fromdate, $todate, $accounttype, $vouchertype) {
        $query = $this->db->select('
                            a.account_id, a.subaccount_type_id, SUM(a.voucher_amount) as total_amount,
                            b.account_name, b.account_code,
                            c.subaccount_type_name, c.subaccount_type_code
                        ')
                        ->from('vouchers AS a')
                        ->join('accounts AS b', 'a.account_id = b.account_id')
                        ->join('subaccount_types AS c', 'a.subaccount_type_id = c.subaccount_type_id')
                        // ->where("a.account_type_id = '$accounttype' AND a.voucher_type = '$vouchertype' AND (a.transaction_date BETWEEN '$fromdate' AND '$todate') ")
                        ->where("a.account_type_id = '$accounttype' AND a.voucher_type = '$vouchertype' AND (a.transaction_date BETWEEN '$fromdate' AND '$todate') ")
                        // ->group_by('a.subaccount_type_id, a.account_type_id')
                        ->group_by('a.account_id')
                        ->get()->result();
        return $query;
        // return $this->db->last_query();
    }
    public function incomes1 ($fromdate, $todate, $accounttype, $type) { //for general income
        $query = $this->db->select('
                            a.account_id, a.subaccount_type_id, SUM(a.voucher_amount) as total_amount,
                            b.account_name, b.account_code,
                            c.subaccount_type_name, c.subaccount_type_code
                        ')
                        ->from('vouchers AS a')
                        ->join('accounts AS b', 'a.account_id = b.account_id')
                        ->join('subaccount_types AS c', 'a.subaccount_type_id = c.subaccount_type_id')
                        ->where("a.account_type_id = '$accounttype' AND b.is_votehead = 0 AND a.voucher_type = '$type' AND b.is_studentaccount = 0 AND (a.transaction_date BETWEEN '$fromdate' AND '$todate') ")
                        ->group_by('a.account_id')
                        ->get()->result();
        return $query;
    }
    public function incomes2 ($fromdate, $todate, $accounttype, $type) { // income from fee alone
        $query = $this->db->select("
                            a.account_id, a.subaccount_type_id, SUM(a.voucher_amount) as total_amount,
                            b.account_code,
                            case 
                                when b.account_name is null then 'Fee payment one' 
                                else 'Fee payment two' 
                            end as account_name,
                            c.subaccount_type_name, c.subaccount_type_code
                        ")
                        ->from('vouchers AS a')
                        ->join('accounts AS b', 'a.account_id = b.account_id')
                        ->join('subaccount_types AS c', 'a.subaccount_type_id = c.subaccount_type_id')
                        ->where("a.account_type_id = '$accounttype' AND b.is_votehead = 0 AND a.voucher_type = '$type' AND b.is_studentaccount = 1 AND (a.transaction_date BETWEEN '$fromdate' AND '$todate') ")
                        // ->group_by('a.account_id')
                        ->group_by('a.account_type_id') // group by the account_type_id
                        ->get()->result();
        return $query;
    }
    /** Profit & Loss End */

    /** General Ledger Start */
    public function general_ledger () {
        return $this->db->get('vw_general_ledger')->result();
    }
    /** General Ledger End */

    /**  Account Statements Start */
    public function balance_brought_forward ($uptodate, $accountcode, $supplierid = null) {
        $ttcr = $this->db
                        ->select(' SUM(voucher_amount) as total_cr ')
                        ->where("account_code = '$accountcode' AND (transaction_date < '$uptodate') AND voucher_type = 'cr' ")
                        ->where(" customer_supplier_id = '$supplierid' ")
                        ->get('vw_general_ledger')->row('total_cr');
        $ttdr = $this->db
                        ->select(' SUM(voucher_amount) as total_cr ')
                        ->where("account_code = '$accountcode' AND (transaction_date < '$uptodate') AND voucher_type = 'dr' ")
                        ->where(" customer_supplier_id = '$supplierid' ")
                        ->get('vw_general_ledger')->row('total_cr');
        return $ttdr - $ttcr;
    }

    public function account_statements ($fromdate, $todate, $accountcode, $supplierid = null) {
        $query = $this->db
                        ->where("account_code = '$accountcode' AND (transaction_date BETWEEN '$fromdate' AND '$todate') ")
                        ->where(" customer_supplier_id = '$supplierid' ")
                        ->order_by('transaction_date','asc')
                        ->get('vw_general_ledger')->result();
        return $query;
    }
    /**  Account Statements End */


    

}




