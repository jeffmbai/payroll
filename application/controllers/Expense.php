<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends MY_Controller {

    public $role;
    public $username;
    var $data;

    function __construct() {
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
            $this->load->model('Deletes');
            $this->load->model('Expense_Model');
            $this->load->model('School_Model');
            $this->load->model('Accounting_Model','accounting');
            
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

    /*** Start Index ***/
    public function home() {
        $this->permission_check('expense_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Expense';

        $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['all_orgs'] = $this->Majorselects->all_orgs();
        $this->data['status'] = $this->Majorselects->status();
        //$this->data['expense_types'] = $this->Expense_Model->expense_types();
        $this->data['all_expenses'] = $this->Expense_Model->all_expenses();
        // $this->data['vote_heads'] = $this->School_Model->vote_heads();
        $this->data['departments'] = $this->db->get('departments')->result();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('expense/expenses', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/  

    public function expense_details($id) {
        $this->permission_check('expense_view');
        $this->data['page'] = 'Expense Details';

        $this->session->set_userdata('referred_from', current_url());

        $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['all_orgs'] = $this->Majorselects->all_orgs();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['expense_types'] = $this->Expense_Model->expense_types();
        $this->data['expense_details'] = $this->Expense_Model->expense_details($id);

        $this->data['payments'] = $this->Expense_Model->expense_payments($id); #expense payments

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('expense/expense_details', $this->data);
        $this->load->view('inc/footer');
    }

    public function payment_voucher($id) {
        $this->permission_check('expense_view');
        $this->data['page'] = 'Payment Voucher';

        $this->data['dt'] = $this->Expense_Model->expense_details($id);

        $this->data['payment'] = $this->Expense_Model->expense_payments($id); #expense payments

        $this->load->view('expense/payment_voucher', $this->data);
    }


    public function new_expense () {
        $this->permission_check('expense_add');
        #new expense
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis');

        // $vhead = $this->db->where('vote_head_id',$_POST['vote_head_id'])->get('vote_heads')->row();
        $vheadCode = null;
        // if($vhead->vote_head_code) $vheadCode = $vhead->vote_head_code;

        $form_data = array(
            "reference"         => $reference,
            "org_id"            => $this->input->post('org'),
            "vote_head_id"      => $this->input->post('vote_head_id'),
            "vote_head_code"    => $vheadCode,
            "department_id"     => $this->input->post('department_id'),
            "account_id"        => $this->input->post('account_id'),
            "paid_to"           => $this->input->post('paid_to'),
            "expense_balance"   => trim($this->input->post('expense_amount')), #get the expense amount to be the balance
            "entity_id"         => $_SESSION['userid'],
            "status_id"         => $this->input->post('status'),
            "expense_amount"    => trim($this->input->post('expense_amount')),
            "expense_date"      => $this->input->post('expense_date'),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );

        if($this->db->insert('expenses', $form_data)){
            $insertID = $this->db->insert_id();

            $expense_acc = $this->db->where("account_id", $_POST['account_id'])->get('accounts')->row();

            $drcr = array( //cr expense account
                "org_id"=> $_SESSION['orgid'],
                "account_id"=> $expense_acc->account_id,
                "account_code"=> $expense_acc->account_code,
                "account_type_id"=> $expense_acc->account_type_id,
                "subaccount_type_id"=> $expense_acc->subaccount_type_id,
                "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                "term_id"=> $_SESSION['termid'],
                //"student_id"=> $student_id,   
                "table_id"=> $insertID,            
                "table_name"=> 'expenses',          
                "voucher_code"=> $reference,
                "voucher_amount"=> trim($this->input->post('expense_amount')),
                "voucher_type"  => 'cr',
                "transaction_date"=> $this->input->post('expense_date'),
                "created_by"=> $_SESSION['userid'],
                "approved_by"=> '',
                "narrative"=> 'New expense: ' . trim($this->input->post('narrative')),
            );
            
            if($this->db->insert('vouchers', $drcr)) {
                
                #Trail Start
                $trail = array(
                    'event_name' => "add_expense",
                    'operator' => $_SESSION['userid'],
                    'username' => $_SESSION['username'],
                    'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                    'source' => 'expenses',
                    'source_id' => $insertID,
                    'narrative' => json_encode($form_data),
                    'task' => json_encode($drcr),
                    "start_time" => date('Y-m-d H:m:s')
                );
                $this->db->insert('sys_logs', $trail);
                //Trail End

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Expense successfully raised. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('expense/expense_details/' . $insertID));

            } else {
                // delete expense
                $this->db->delete('expenses', array("expense_id" => $insertID));

                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('expense/home'));
            }

        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function update_expense ($id) {
        $this->permission_check('expense_edit');
        #new expense
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        // $vhead = $this->db->where('vote_head_id',$_POST['vote_head_id'])->get('vote_heads')->row();
        $vheadCode = null;
        // if($vhead) $vheadCode = $vhead->vote_head_code;

        $expense = $this->db->where("expense_id", $id)->get('expenses')->row();

        $payments = $this->db->where('expense_id',$id)->get('payments')->num_rows();
        if($payments > 0) {
            // you cannot update expense with payments already made
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">Failed! You cannot update expenses when payments have already been initiated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

        $form_data = array(
            "org_id"            => $this->input->post('org'),
            "vote_head_id"      => $this->input->post('vote_head_id'),
            "vote_head_code"    => $vheadCode,
            "account_id"        => $this->input->post('account_id'),
            "department_id"     => $this->input->post('department_id'),
            "paid_to"           => $this->input->post('paid_to'),
            "expense_balance"   => trim($this->input->post('expense_amount')), #get the expense amount to be the balance
            "entity_id"         => $_SESSION['userid'],
            "status_id"         => $this->input->post('status'),
            "expense_amount"    => trim($this->input->post('expense_amount')),
            "expense_date"      => $this->input->post('expense_date'),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );

        $condition = array(
            "expense_id" => $id
        );

        if($this->db->update('expenses', $form_data, $condition)){

            $expense_acc = $this->db->where("account_id", $_POST['account_id'])->get('accounts')->row();
            // update the voucher details too
            $voucher = array(
                "account_id"=> $expense_acc->account_id,
                "account_code"=> $expense_acc->account_code,
                "account_type_id"=> $expense_acc->account_type_id,
                "subaccount_type_id"=> $expense_acc->subaccount_type_id,
                "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                "voucher_amount"=> trim($this->input->post('expense_amount')),
                "transaction_date"=> $this->input->post('expense_date'),
                "created_by"=> $_SESSION['userid'],
                "approved_by"=> '',
                "narrative"=> 'New expense: ' . trim($this->input->post('narrative')),
            );
            $cond = array(
                "table_name" => "expenses",
                "table_id" => $id,
            );
            $this->db->update('vouchers', $voucher, $cond);

            #Trail Start
            $trail = array(
                'event_name' => "udpdate_expense",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'expenses',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('expense/expense_details/' . $id));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('expense/expense_details/' . $id));
        }
    }

    public function delete($id) {
        $this->permission_check('expense_delete');
        #delete expense
        $form_data = array(
            "expense_id"   => $id
        );

        if($this->Deletes->delete_data('expenses', $form_data)){
            // delete from vouchers too
            $this->db->delete( 'vouchers', array("table_id" => $id, "table_name" => 'expenses') );

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('expense/home'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('expense/home'));
        }
    }


    ##===================PAYMENTS START============================
    public function payments () {
        $this->permission_check('expense_view');
        #make new payment on an expense
        $this->session->set_userdata('referred_from', current_url());

        $this->data['unsettled_expenses'] = $this->Expense_Model->unsettled_expenses();
        $this->data['payments'] = $this->Expense_Model->payments();
        $this->data['payment_modes'] = $this->Majorselects->payment_modes();

        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('expense/expense_payments', $this->data);
            $this->load->view('inc/footer');
        }
    }
    public function new_payment () {
        $this->permission_check('expense_add');
        #new_payment
        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis');

        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $expenseID = $this->input->post('expense_id');
        $paymentAmount = $this->input->post('payment_amount');
        $account_id = $this->input->post('account_id');
        $subaccount_type_id = $this->input->post('subaccount_type_id');
        $check_no = $this->input->post('check_no');
        $payment_date = $this->input->post('payment_date');

        #get the expense details 
        $expenseAmount = 0;
        $expenseBalance = 0;
        $expense = $this->db->where('expense_id',$expenseID)->get('expenses')->row();
        $expense_acc = $this->db->where('account_id',$expense->account_id)->get('accounts')->row();
        $expenseAmount = $expense->expense_amount;
        $expenseBalance = $expense->expense_balance;
        $narrative = $this->input->post('narrative');

        if($paymentAmount > $expenseBalance) {
            #error: the paying amount is more than expense balance.
            $this->session->set_flashdata('alert', '<div class="alert alert-warning"><span class="fa fa-warning"></span> Payment amount exceeds the expense balance (Shs '.number_format($expenseBalance, 2).') <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            #redirect(site_url('expense/payments'), 'refresh');
            redirect($this->session->userdata('referred_from'));
        } else {
            $bal = $expenseBalance - $paymentAmount;
            
            $this->db->cache_delete_all();
            $this->db->where('expense_id', $expenseID);
            $this->db->set('expense_balance', $bal, FALSE);
            $this->db->update('expenses'); 

            $form_data = array(
                "expense_id"        => $expenseID,
                "subaccount_type_id"=> $subaccount_type_id,
                "account_id"        => $account_id,
                "payment_amount"    => $paymentAmount,
                "reference"         => $reference,
                "payment_date"      => $payment_date,
                "check_no"          => $check_no,
                "created_by"        => $_SESSION['userid'],
                "narrative"         => trim($this->input->post('narrative')),
                "active"            => $active
            );
    
            if($this->db->insert('payments', $form_data)){
                $lastid = $this->db->insert_id();
                /** Accounting Start */
                //get fiscal year
                $payment_year = date("Y",strtotime($payment_date));
                $fiscal_year_id = $this->db->where('fiscal_year_name',$payment_year)->get('fiscal_years')->row('fiscal_year_id');
                $account = $this->db->where('account_id',$account_id)->get('accounts')->row();

                /**
                 * credit school bank/mpesa/cash accounts &vote head accounts
                 * debit expense accounts
                **/
                $insert_cr1 = array(  //cr paying account(payment mode) 
                    "org_id"=> $_SESSION['orgid'],
                    "account_id"=> $account->account_id,
                    "account_code"=> $account->account_code,
                    "account_type_id"=> $account->account_type_id,
                    "subaccount_type_id"=> $account->subaccount_type_id,
                    "fiscal_year_id"=> $fiscal_year_id,
                    "term_id"=> $_SESSION['termid'],
                    "table_id"=> $lastid,            
                    "table_name"=> 'payments',            
                    "voucher_code"=> $reference,
                    "voucher_amount"=> $paymentAmount,
                    "voucher_type"  => 'cr',
                    "transaction_date"=> $payment_date,
                    "created_by"=> $_SESSION['userid'],
                    "approved_by"=> '',
                    "narrative"=> 'Expense Payment '.$narrative,
                );

                $insertcr1 = $this->db->insert('vouchers', $insert_cr1);
                if(!$insert_cr1) {
                    //terminate
                    $this->session->set_flashdata('alert', '<div class="alert alert-warning">Account CR failed. Try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect('expense/expense_details/'.$expenseID, 'refresh');
                }

                if($expense->vote_head_code != null || $expense->vote_head_code != 0) {
                    $votehead_acc = $this->db->where('account_code',$expense->vote_head_code)->get('accounts')->row();
                    $insert_cr2 = array(  //cr vote head from which this money is withdrawn
                        "org_id"=> $_SESSION['orgid'],
                        "account_id"=> $votehead_acc->account_id,
                        "account_code"=> $votehead_acc->account_code,
                        "account_type_id"=> $votehead_acc->account_type_id,
                        "subaccount_type_id"=> $votehead_acc->subaccount_type_id,
                        "fiscal_year_id"=> $fiscal_year_id,
                        "term_id"=> $_SESSION['termid'],
                        "table_id"=> $lastid,            
                        "table_name"=> 'payments',            
                        "voucher_code"=> $reference,
                        "voucher_amount"=> $paymentAmount,
                        "voucher_type"  => 'cr',
                        "transaction_date"=> $payment_date,
                        "created_by"=> $_SESSION['userid'],
                        "approved_by"=> '',
                        "narrative"=> 'Expense VH Payment '.$narrative,
                    );

                    $insertcr2 = $this->db->insert('vouchers', $insert_cr2);
                    if(!$insert_cr2) {
                        //terminate
                        $this->session->set_flashdata('alert', '<div class="alert alert-warning">Account CR failed. Try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                        redirect('expense/expense_details/'.$expenseID, 'refresh');
                    }
                
                }
                
                $insert_dr = array( //dr expense account
                    "org_id"=> $_SESSION['orgid'],
                    "account_id"=> $expense->account_id, //expense type account
                    "account_code"=> $expense_acc->account_code,
                    "account_type_id"=> $expense_acc->account_type_id,
                    "subaccount_type_id"=> $expense_acc->subaccount_type_id,
                    "fiscal_year_id"=> $fiscal_year_id,
                    "term_id"=> $_SESSION['termid'],
                    //"student_id"=> $student_id,   
                    "table_id"=> $lastid,            
                    "table_name"=> 'payments',          
                    "voucher_code"=> $reference,
                    "voucher_amount"=> $paymentAmount,
                    "voucher_type"  => 'dr',
                    "transaction_date"=> $payment_date,
                    "created_by"=> $_SESSION['userid'],
                    "approved_by"=> '',
                    "narrative"=> 'Expense Payment '.$narrative,
                );
                
                $insertdr = $this->db->insert('vouchers', $insert_dr);
                if(!$insert_dr) {
                    //terminate
                    $this->db->where('voucher_id',$this->db->insert_id())->delete('vouchers'); //delete the above inserted CR
                    $this->session->set_flashdata('alert', '<div class="alert alert-warning">Account DR failed. Try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect('expense/expense_details/'.$expenseID, 'refresh');
                }
                /** Accounting End */

                #Trail Start
                date_default_timezone_set('Africa/Nairobi');
                $trail = array(
                    'event_name' => "expense_payment",
                    'operator' => $_SESSION['userid'],
                    'username' => $_SESSION['username'],
                    'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                    'source' => 'payments',
                    'source_id' => $lastid,
                    'narrative' => json_encode($form_data),
                    'task' => json_encode($form_data),
                    "start_time" => date('Y-m-d H:m:s')
                );
                $this->db->insert('sys_logs', $trail);
                //Trail End

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
        }

    }

    public function update_payment ($id) {
        $this->permission_check('expense_edit');
        #update_payment
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $expenseID = $this->input->post('expense_id');
        $paymentAmount = $this->input->post('payment_amount');

        #get the expense details 
        $expenseAmount = 0;
        $expenseBalance = 0;
        $query1 = $this->db->query("SELECT expense_amount, expense_balance FROM expenses WHERE expense_id = ".$expenseID." ");
        foreach($query1->result() as $q1) {
            $expenseAmount = $q1->expense_amount;
            $expenseBalance = $q1->expense_balance;
        break;
        }
        #get payment
        $expenseID = 0;
        $oldPaymentAmount = 0;
        $getPayment = $this->db->query('SELECT expense_id, payment_amount FROM payments WHERE payment_id = '.$id);
        foreach($getPayment->result() as $rs) {
            $expenseID = $rs->expense_id;
            $oldPaymentAmount = $rs->payment_amount;
        }

        $ctrlPayment = 0;
        if($oldPaymentAmount == $paymentAmount) {
            #no update on payment amount
            $ctrlPayment = 0;
        } else{
            #payment added(+ve value) or reduced(-ve value)
            $ctrlPayment = $paymentAmount - $oldPaymentAmount;
        }

        if($ctrlPayment > $expenseBalance) {
            #error: the paying amount is more than expense balance.
            $this->session->set_flashdata('alert', '<div class="alert alert-warning"><span class="fa fa-warning"></span> Payment amount exceeds the expense balance (Shs '.number_format($expenseBalance, 2).') <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else {
            $bal = $expenseBalance - $ctrlPayment;
            
            $this->db->cache_delete_all();
            $this->db->where('expense_id', $expenseID);
            $this->db->set('expense_balance', $bal, FALSE);
            $this->db->update('expenses'); 

            $form_data = array(
                "expense_id"        => $expenseID,
                "payment_mode_id"   => $this->input->post('payment_mode_id'),
                "payment_amount"    => $paymentAmount,
                "payment_date"      => $this->input->post('payment_date'),
                "check_no"          => $this->input->post('check_no'),
                "narrative"         => trim($this->input->post('narrative')),
                "active"            => $active
            );
            $condition = array( "payment_id" => $id );
    
            if($this->Inserts->update_data('payments', $form_data, $condition)){
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
        }

    }

    public function delete_payment($id) {
        $this->permission_check('expense_delete');
        #delete payment
        $expenseID = 0;
        $paymentAmount = 0;

        $getPayment = $this->db->where('payment_id',$id)->get('payments')->row();
        $getExpense = $this->db->where('expense_id',$getPayment->expense_id)->get('expenses')->row();
        $expenseID = $getPayment->expense_id;
        $paymentAmount = $getPayment->payment_amount;
        
        if($this->db->delete('payments', array( "payment_id" => $id ))) {
            // delete transactions from the vouchers
            if($getPayment->reference != null) $this->db->delete('vouchers', array("voucher_code" => $getPayment->reference));

            //update the expense balance appropriately
            $bal = $paymentAmount + $getExpense->expense_balance;
            if($bal <= $getExpense->expense_amount) $this->db->query('UPDATE expenses SET expense_balance = '.$paymentAmount.' WHERE expense_id = '.$expenseID);

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_expense_payments",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'payments',
                'source_id' => $id,
                'narrative' => json_encode($getPayment),
                'task' => json_encode($getPayment),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('expense/expense_details/'.$expenseID));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Error 200: Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('expense/expense_details/'.$expenseID));
        }
    }
    ##===================PAYMENTS END============================





    ###################============================================

    public function print_payment ($id) {
        $this->permission_check('expense_view');
        $this->data['payment'] = $this->Expense_Model->this_payments($id); #expense payment

        $this->load->library('pdf');
        $html = $this->load->view('reports/payment_invoice', $this->data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

    public function general_expenses () {
        $this->permission_check('expense_view');
        $this->data['page'] = 'General Expenses';

        $this->session->set_userdata('referred_from', current_url());

        $this->data['expenses'] = $this->Expense_Model->general_expenses(); 

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/general_expenses', $this->data);
        $this->load->view('inc/footer');
    }



    

    



}