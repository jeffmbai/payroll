<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        if( !isset($_SESSION['userrole']) || !isset($_SESSION['username']) ){
            //session is not set. cancel back to login page
            redirect(site_url('pages/logout'));
        }
        else{
            #echo "Success";
            $this->role = $_SESSION['userrole'];
            $this->username = $this->session->userdata('username');
            
            $this->load->model('Majorselects');
            $this->load->model('Inserts');
            $this->load->model('Business_Model');
            $this->load->model('Users_Model');
            $this->load->model('Accounting_Model', 'accounting');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

     public function logout(){
        $this->session->sess_destroy();
        redirect('pages/signin', 'refresh');
 	}

    public function signin(){
        redirect('pages/signin', 'refresh');
    }

    public function register(){
        redirect('pages/register', 'refresh');
    }

    
    ##customers start
    public function customers () {  
        $this->data['page'] = 'Customers';  
        $this->session->set_userdata('referred_from', current_url());

        $this->data['business_users'] = $this->Users_Model->business_users(4);

        #var_dump($this->data['business_users']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/customers', $this->data);
        $this->load->view('inc/footer');
    }
    ##customers end

    ##suppliers start
    public function suppliers () {
        $this->data['page'] = 'Suppliers';  
        $this->session->set_userdata('referred_from', current_url());

        $this->data['business_users'] = $this->Users_Model->business_users(3);

        #var_dump($this->data['business_users']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/suppliers', $this->data);
        $this->load->view('inc/footer');
    }
    ##suppliers end

    ## My Close Day Start
    public function my_close_day() {
        //get the staff/cashier close day report
        $this->data['page'] = 'my_close_day';

        $dayDate = date('Y-m-d');  
        $yesterdayDate = date('Y-m-d',strtotime("-1 days"));
        
        $this->data['my_close_day'] = $this->Business_Model->my_close_day($dayDate);
        $this->data['yesterday_close_day'] = $this->Business_Model->my_close_day($yesterdayDate);
        $this->data['my_close_day_detailed'] = $this->Business_Model->my_close_day_detailed($dayDate);
        
        if($_SESSION['superuser'] == 1) {
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('reports/my_close_day', $this->data);
            $this->load->view('inc/footer');
        } else {
            $this->load->view('inc/pos_header', $this->data);
            $this->load->view('reports/my_close_day', $this->data);
            $this->load->view('inc/footer');
        }
        
    }
    ##My Close Day End

    ##Last days sales start
    public function last_days () {
        $this->data['last_days'] = $this->Business_Model->last_days();

        $arr_length = count($this->data['last_days']);
        $jsonHeader = "[";
        $jsonData = "[";
        $x = 0;
        foreach( $this->data['last_days'] as $thisdt) {

            if( ($x+1) == $arr_length) $jsonHeader .= "'".$thisdt->date_time."'";
            else $jsonHeader .= "'".$thisdt->date_time."',";

            if( ($x+1) == $arr_length) $jsonData .= "'".$thisdt->net_amount."'";
            else $jsonData .= "'".$thisdt->net_amount."',";

            $x++;
        } 
        $jsonData .= "]";
        $jsonHeader .= "]";

        echo '{ "jsonheader" : "'.$jsonHeader.'", "jsondata" : "'.$jsonData.'" }';
    }
    ##Last days sales end

    ## Sales Agents Start
    public function agentsales() {
        //get the staff/cashier close day report
        $this->data['page'] = 'Agent Sales Summary';
        
        $this->data['all_users'] = $this->Majorselects->entity_with_roles(2);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/agentsales', $this->data);
        $this->load->view('inc/footer');
        
    }
    ## Sales Agents End

    ##Agent Orders Start
    public function agent_orders ($agentID) {
        $this->data['page'] = 'Agent orders';  
        $this->session->set_userdata('referred_from', current_url());

        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');

        if(isset($_POST['from_date']) && isset($_POST['to_date'])) {
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];
        }

        $this->data['from_date'] = $from_date;
        $this->data['to_date'] = $to_date;

        $this->data['agent_orders'] = $this->Business_Model->agent_orders($agentID, $from_date, $to_date);
        $this->data['agent_debt'] = $this->Business_Model->agent_debt($agentID, $from_date, $to_date);
        $this->data['this_user'] = $this->Majorselects->entitys($agentID);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/agent_orders', $this->data);
        $this->load->view('inc/footer');
    }
    ##Agent Orders End

    // Account Reports Start
    public function account_statements() {
        $this->permission_check('account_ledger');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Account Statements';

        $this->data['accounts'] = $this->db->get('vw_accounts')->result();
        
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/account_statements', $this->data);
        $this->load->view('inc/footer');
    }
    public function get_account_statement () {
        $this->data['page'] = 'Account Statements';

        $account_code = $_POST['account_code'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        //get supplier account
        $acc = $this->db->where("account_code = '$account_code'")->get('accounts')->row();
        if(!isset($acc->account_code)) {
            //no account available
            echo '<tr> <td><span class="text-warning">Account not available</span></td> </tr>';
            exit();
        }

        //get statements
        $balance_brought_forward = 0;
        $balance_brought_forward = $this->accounting->balance_brought_forward ($from_date, $acc->account_id);
        $statements = $this->accounting->account_statements ($from_date, $to_date, $acc->account_id);
        if(count($statements) < 1) {
            echo '<tr> <td><span class="text-warning">No data available</span></td> </tr>';
            exit();
        }

        $total_cr = $total_dr = 0;
        // $difference = $account->opening_balance;
        $difference = 0;
        if($balance_brought_forward != null || $balance_brought_forward != '') $difference = $balance_brought_forward; // get the carry forward here

        ?>
            <tr>
                <td><?=date('d-m-Y', strtotime($from_date));?></td>
                <td></td>
                <td>Balance Brought Forward</td>
                <th></th>
                <th></th>
                <td><?=number_format($difference, 2);?></td>
            </tr>
        <?php

        foreach($statements as $dt) {

            if($dt->voucher_amount == 0) continue;

            $cr = $dr = 0;
            if($dt->voucher_type == 'dr') $dr = $dt->voucher_amount; else $dr = 0;
            if($dt->voucher_type == 'cr') $cr = $dt->voucher_amount; else $cr = 0;
            $total_cr += $cr;
            $total_dr += $dr;
            $difference += $dr - $cr;

            $studs = null;
            if(isset($dt->student_id)) {
                $stud = $this->db->select('admission_no, first_name, second_name, last_name')->from('students')->where('student_id',$dt->student_id)->get()->row();
                $studs = '<i>('.$stud->admission_no.' '.$stud->first_name.' '.$stud->second_name.' '.$stud->last_name.')</i>';
            }

            ?>
                <tr>
                    <td><?=date('d-m-Y', strtotime($dt->transaction_date));?></td>
                    <td class="rg-bd-lft"><?=$dt->voucher_code;?></td>
                    <td class="rg-bd-lft"><?=$dt->narrative.' '.$studs;?></td>
                    <th class="rg-bd-lft"><?php if($dt->voucher_type == 'dr') echo number_format($dt->voucher_amount, 2);?></th>
                    <th class="rg-bd-lft"><?php if($dt->voucher_type == 'cr') echo number_format($dt->voucher_amount, 2);?></th>
                    <td class="rg-bd-lft"><?=number_format($difference, 2);?></td>
                </tr>
            <?php
        }
        // get footer of the data
        ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th>Total IN: <?=number_format($total_dr,2);?></th>
                <th>Total OUT: <?=number_format($total_cr,2);?></th>
                <th>Balance: <?=number_format($difference, 2);?></th>
            </tr>
        <?php
    }
    public function get_account_statement_pdf () {
        $this->permission_check('account_ledger');
        $this->data['page'] = 'Account Statements';

        $format = $_POST['download_format'];
                
        $account_code = $_POST['account_code'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        if($account_code == '' || $from_date == '' || $to_date == '') {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Fill in the mandator fields. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('reports/account_statements'));
        }
        //get supplier account
        $acc = $this->db->where("account_code = '$account_code'")->get('accounts')->row();
        if(!isset($acc->account_code)) {
            //no account available
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Account not available. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('reports/account_statements'));
        }

        //get statements
        $balance_brought_forward = 0;
        $balance_brought_forward = $this->accounting->balance_brought_forward ($from_date, $acc->account_id);
        $statements = $this->accounting->account_statements ($from_date, $to_date, $acc->account_id);
        if(count($statements) < 1) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! No data available. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('reports/account_statements'));
        }

        $this->data['balance_brought_forward'] = $balance_brought_forward;

        //set session for the time range
        $_SESSION['fromdate'] = $from_date;
        $_SESSION['todate'] = $to_date;

        $crdrs = $this->db->select('a.*, b.account_code, b.account_name')
                                ->from('vouchers as a')
                                ->join('accounts as b','a.account_id = b.account_id')
                                ->where("a.account_id = '$acc->account_id' AND transaction_date >= '$from_date' AND transaction_date <= '$to_date' AND voucher_amount <> 0 ")
                                ->order_by('a.transaction_date', 'asc')
                                ->get()->result();
        $this->data['crdrs'] = $crdrs;                            

        $this->data['statements'] = $statements;
        $this->data['account'] = $acc;

        if($format == 'pdf') {
            // generate pdf
            $this->load->library('pdf');
            $html = $this->load->view('reports/account2_statement_pdf', $this->data, true);
            $this->pdf->createPDF($html, 'account_statement_'.$acc->account_code, false);
        } elseif($format == 'xls') {
            // generate csv
            header('Content-type: text/csv');
            header('Content-disposition: attachment;filename='.$acc->account_name.'-statement.csv');

            echo $acc->account_name . " STATEMENT".PHP_EOL;
            echo "FROM " . $from_date . " TO " . $to_date . " ".PHP_EOL;

            $total_cr = $total_dr = 0;
            // $difference = $account->opening_balance;
            $difference = 0;
            if($balance_brought_forward != null || $balance_brought_forward != '') $difference = $balance_brought_forward; // get the carry forward here

            echo "Balance Brought Forward; " . $difference . " ".PHP_EOL;

            echo "DATE; DETAILS; IN; OUT; BALANCE".PHP_EOL;

            foreach($crdrs as $dt) {
                $cr = $dr  = 0;
                $refs = $narrs = null;
                if($dt->voucher_type == 'dr') $dr = $dt->voucher_amount; else $dr = 0;
                if($dt->voucher_type == 'cr') $cr = $dt->voucher_amount; else $cr = 0;
                $total_cr += $cr;
                $total_dr += $dr;
                $difference += $dr - $cr;

                if($dt->table_name == 'payments') {
                    $res1 = $this->db->where('payment_id',$dt->table_id)->get($dt->table_name)->row();
                    if(count($res1) > 0) {
                        $refs = $res1->reference;
                        $narrs = $res1->narrative;
                        // $this->db->where(" table_id = '$dt->table_id' AND table_name = 'payments' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                    }
                } elseif($dt->table_name == 'income_payments') {
                    $res2 = $this->db->where('income_payment_id',$dt->table_id)->get($dt->table_name)->row();
                    if(count($res2) > 0) {
                        $refs = $res2->reference;
                        $narrs = $res2->narrative;
                        // $this->db->where(" table_id = '$dt->table_id' AND table_name = '$dt->table_name' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                    }
                    
                }

                $studs = null;
                if(isset($dt->student_id)) {
                    $stud = $this->db->select('admission_no, first_name, second_name, last_name')->from('students')->where('student_id',$dt->student_id)->get()->row();
                    $studs = $stud->admission_no.' '.$stud->first_name.' '.$stud->second_name.' '.$stud->last_name;
                }
                
                $accDescr = $dt->narrative.' '.$narrs.' '.$refs.' ~ '.$dt->voucher_code.' '.$studs;
                echo date('d-m-Y', strtotime($dt->transaction_date)) . "; " . $accDescr . "; " . $dr . "; " . $cr . "; " . $difference . " ".PHP_EOL;
            }

            echo " ; TOTAL; " . $total_dr . "; " . $total_cr . "; " . $difference . " ".PHP_EOL;

        }
        

    }

    public function today_fee_payments_pdf () {
        $this->session->set_userdata('referred_from', current_url());

        $thisdate = date('Y-m-d');

        if($_POST['thisdate'] != null || $_POST['thisdate'] != '') {
            $thisdate = $_POST['thisdate'];
        }

        $this->data['page'] = $thisdate.' Fee Payments';

        $this->data['fee_payments'] = $this->reports->today_fee_payment($thisdate);
        $this->data['thisdate'] = $thisdate;
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/today/fee_payments', $this->data, true);
        $this->pdf->createPDF($html, 'fee_payment'.$thisdate, false);
    }

    public function today_income_generators_pdf () {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = date('d-m-Y').' Revenue Generators';

        $this->data['incomes'] = $this->reports->today_income();
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/today/income_generators', $this->data, true);
        $this->pdf->createPDF($html, 'income_generators'.date('d-m-Y'), false);
    }

    public function today_expense_generators_pdf () {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = date('d-m-Y').' Expense Payments';

        $this->data['expenses'] = $this->reports->today_expenses();
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/today/expense_payments', $this->data, true);
        $this->pdf->createPDF($html, 'expense_payments'.date('d-m-Y'), false);
    }

    public function supplier_balances_excel () {
        // export supplier balances to csv/excel
        $suppliers = $this->db->where('system_role',3)->get('entitys')->result();

        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=supplier_balances_rpt.csv');
        echo "Account Code, Name, Phone, TT. Amount, Amount Paid, Amount Due".PHP_EOL;

        foreach($suppliers as $tbd) {
            //get account informarion
            $supp = $this->db->where("subaccount_type_id = 5 AND table_id = '$tbd->entity_id' AND table_name = 'entitys' ")->get('accounts')->row();
            if(count($supp) < 1) continue; // this nmeans we didn't find this supplier's account

            // Get voucher cr/dr
            $total_cr = $this->db->where(" account_id = '$supp->account_id' AND voucher_type = 'cr' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
            $total_dr = $this->db->where(" account_id = '$supp->account_id' AND voucher_type = 'dr' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
            $total_due = $total_cr - $total_dr;

            $name = $tbd->firstname.' '.$tbd->secondname.' '.$tbd->lastname;
            echo $supp->account_code.','.$name.','.$tbd->phone.','.$total_cr.','.$total_dr.','.$total_due.''.PHP_EOL;
           
        }

    }
    // Account Reports End



}
