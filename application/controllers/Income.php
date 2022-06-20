<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends MY_Controller {

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
            $this->load->model('Deletes');
            $this->load->model('School_Model');
            $this->load->model('Student_Model');
            $this->load->model('Income_Model', 'income');

            $this->load->library('csvimport'); //old method to import
            $this->load->library('excel'); //new method to import
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

    public function index() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Income';

        $this->data['incomes'] = $this->income->all_incomes();
        $this->data['status'] = $this->db->get('status')->result();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('income/incomes', $this->data);
        $this->load->view('inc/footer');
    } 

    public function income_details($id) {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Income Details';

        $this->data['income'] = $this->income->this_income($id);

        if(!$this->data['income']) exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('income/income_details', $this->data);
        $this->load->view('inc/footer');
    }

    public function new_income() {
        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis');

        $statusid = $this->input->post('status');
        $income_amount = $this->input->post('income_amount');
        $accountid = $this->input->post('account_id');
        $income_date = $this->input->post('income_date');

        $form_data = array (
            'org_id' => $this->input->post('org'),
            'account_id' => $accountid,
            'status_id' => $statusid,
            'reference' => $reference,
            'income_amount' => $income_amount,
            'department_id' => $this->input->post('department_id'),
            'income_date' => $this->input->post('income_date'),
            'customer_name' => $this->input->post('customer_name'),
            'narrative' => $this->input->post('narrative'),
            'active' => $this->input->post('active'),
            'created_by' => $_SESSION['userid']
        );

        if($this->db->insert('incomes', $form_data)) {
            $lastID = $this->db->insert_id();            

            // if($statusid == 1 || $statusid == 2) { // if complete/approved do the accounting posting 
                $account = $this->db->where('account_id',$accountid)->get('accounts')->row();
                // JOURNAL ENTRY START
                $insert_drcr = array( //credit this account to be paid
                        "org_id"=> $_SESSION['orgid'],
                        "account_id"=> $account->account_id,
                        "account_code"=> $account->account_code,
                        "account_type_id"=> $account->account_type_id,
                        "subaccount_type_id"=> $account->subaccount_type_id,
                        "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                        "term_id"=> $_SESSION['termid'],
                        //"student_id"=> $student_id,            
                        "table_id"=> $lastID,            
                        "table_name"=> 'incomes',            
                        "voucher_code"=> $reference,
                        "reference"=> $reference,
                        "voucher_amount"=> $income_amount,
                        "voucher_type"  => 'cr',
                        "transaction_date"=> $income_date,
                        "created_by"=> $_SESSION['userid'],
                        "approved_by"=> '',
                        "narrative"=> 'Sales ' . $_POST['customer_name']
                    );
                if($this->db->insert('vouchers', $insert_drcr)) {

                    #Trail Start
                    $trail = array(
                        'event_name' => "new_income",
                        'operator' => $_SESSION['userid'],
                        'username' => $_SESSION['username'],
                        'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                        'source' => 'incomes',
                        'source_id' => $lastID,
                        'narrative' => json_encode($form_data),
                        'task' => json_encode($insert_drcr),
                        "start_time" => date('Y-m-d H:m:s')
                    );
                    $this->db->insert('sys_logs', $trail);
                    //Trail End

                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Success!!! Transaction complete<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    // redirect($this->session->userdata('referred_from'));
                    redirect(site_url('income/income_details/'.$lastID));
                } else {
                    $this->db->where('income_id',$lastID)->delete('incomes'); //delete the initial transaction
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect($this->session->userdata('referred_from'));
                }
                // JOURNAL ENTRY END
            // } else {
            //     $this->session->set_flashdata('alert', '<div class="alert alert-success">Success!!! Transaction complete<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            //     redirect(site_url('income/income_details/'.$lastID));
            // }
            
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

    }

    public function update_income($id) {
        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis');

        $income = $this->db->where('income_id',$id)->get('incomes')->row();

        $statusid = $this->input->post('status');
        $income_amount = $this->input->post('income_amount');
        $accountid = $this->input->post('account_id');

        $form_data = array (
            'org_id' => $this->input->post('org'),
            'account_id' => $accountid,
            'status_id' => $statusid,
            'income_amount' => $income_amount,
            'income_date' => $this->input->post('income_date'),
            'department_id' => $this->input->post('department_id'),
            'customer_name' => $this->input->post('customer_name'),
            'narrative' => $this->input->post('narrative'),
            'active' => $this->input->post('active'),
            'created_by' => $_SESSION['userid']
        );

        if($this->db->update('incomes', $form_data, array('income_id' => $id))) {

            if(($income->status_id != $statusid) && ($statusid == 1 || $statusid == 2)) { // if complete/approved do the accounting posting 
                $account = $this->db->where('account_id',$accountid)->get('accounts')->row();

                // confirm if voucher income exist
                $some_cond = array(
                        "table_id"=> $id,            
                        "table_name"=> 'incomes',    
                        "reference"=> $income->reference,
                );
                $confirm = $this->db->where($some_cond)
                            ->get('vouchers')->num_rows();


                if($confirm > 0) {

                    #Trail Start
                    $trail = array(
                        'event_name' => "update_income",
                        'operator' => $_SESSION['userid'],
                        'username' => $_SESSION['username'],
                        'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                        'source' => 'incomes',
                        'source_id' => $id,
                        'narrative' => json_encode($form_data),
                        'task' => json_encode($form_data),
                        "start_time" => date('Y-m-d H:m:s')
                    );
                    $this->db->insert('sys_logs', $trail);
                    //Trail End

                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Success!!! Transaction complete<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect(site_url('income/income_details/' . $id),'refresh');
                }

                // JOURNAL ENTRY START
                $insert_drcr = array( //credit this account to be paid
                        "org_id"=> $_SESSION['orgid'],
                        "account_id"=> $account->account_id,
                        "account_code"=> $account->account_code,
                        "account_type_id"=> $account->account_type_id,
                        "subaccount_type_id"=> $account->subaccount_type_id,
                        "fiscal_year_id"=> $_SESSION['fiscalyearid'],
                        "term_id"=> $_SESSION['termid'],
                        //"student_id"=> $student_id,            
                        "table_id"=> $id,            
                        "table_name"=> 'incomes',            
                        "voucher_code"=> $reference,
                        "reference"=> $income->reference,
                        "voucher_amount"=> $income_amount,
                        "voucher_type"  => 'cr',
                        "transaction_date"=> date('Y-m-d'),
                        "created_by"=> $_SESSION['userid'],
                        "approved_by"=> $_SESSION['userid'],
                        "narrative"=> 'Income amount'
                    );
                if($this->db->insert('vouchers', $insert_drcr)) {

                    #Trail Start
                    $trail = array(
                        'event_name' => "update_income",
                        'operator' => $_SESSION['userid'],
                        'username' => $_SESSION['username'],
                        'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                        'source' => 'incomes',
                        'source_id' => $id,
                        'narrative' => json_encode($form_data),
                        'task' => json_encode($insert_drcr),
                        "start_time" => date('Y-m-d H:m:s')
                    );
                    $this->db->insert('sys_logs', $trail);
                    //Trail End

                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Success!!! Transaction complete<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    // redirect($this->session->userdata('referred_from'));
                    redirect(site_url('income/income_details/' . $id),'refresh');
                } else {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    // redirect($this->session->userdata('referred_from'));
                    redirect(site_url('income/income_details/' . $id),'refresh');
                }
                // JOURNAL ENTRY END
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Success!!! Transaction complete<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('income/income_details/' . $id),'refresh');
            }
            
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('income/income_details/' . $id),'refresh');
        }

    }

    public function invoice($id) {

        $this->data['page'] = 'Income Invoice';

        $this->data['income'] = $this->income->this_income($id);
        $this->load->view('income/income_invoice', $this->data);
    }

    public function new_payment () {
        #new_payment
        date_default_timezone_set('Africa/Nairobi');
        $reference = date('YmdHis');

        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $incomeID = $this->input->post('income_id');
        $paymentAmount = $this->input->post('payment_amount');
        $account_id = $this->input->post('account_id');
        $subaccount_type_id = $this->input->post('subaccount_type_id');
        $reference2 = $this->input->post('reference');
        $payment_date = $this->input->post('payment_date');

        #get the income details 
        $incomeAmount = 0;
        $incomeBalance = 0;
        $income = $this->db->where('income_id',$incomeID)->get('incomes')->row();
        $income_acc = $this->db->where('account_id',$income->account_id)->get('accounts')->row();

        // $reference = $income->reference;

        $paid = $this->db->select("SUM(payment_amount) as total_paid")->from('income_payments')->where('income_id',$incomeID)->get()->row();
        $incomeBalance = $income->income_amount - $paid->total_paid;

        if($paymentAmount > $incomeBalance) {
            #error: the paying amount is more than income balance.
            $this->session->set_flashdata('alert', '<div class="alert alert-warning"><span class="fa fa-warning"></span> Payment amount exceeds the income balance (Shs '.number_format($incomeBalance, 2).') <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            #redirect(site_url('income/payments'), 'refresh');
            redirect($this->session->userdata('referred_from'));
        } else {
            $bal = $incomeBalance - $paymentAmount;
        
            $form_data = array(
                "income_id"        => $incomeID,
                "subaccount_type_id"=> $subaccount_type_id,
                "account_id"        => $account_id,
                "payment_amount"    => $paymentAmount,
                "payment_date"      => $payment_date,
                "reference"         => $reference2,
                "bill_no"           => $reference,
                "narrative"         => trim($this->input->post('narrative')),
                "paid_by"           => trim($this->input->post('paid_by')),
                "active"            => $active,
                "entity_id"         => $_SESSION['userid'],
                "is_paid"           => 1
            );
    
            if($this->db->insert('income_payments', $form_data)){
                $lastid = $this->db->insert_id();
                /** Accounting Start */
                //get fiscal year
                // $payment_year = date("Y",strtotime($payment_date));
                $payment_year = $_SESSION['fiscalyearname'];
                $fiscal_year_id = $_SESSION['fiscalyearid'];
                $account = $this->db->where('account_id',$account_id)->get('accounts')->row();

                /**
                 * debit income accounts and assets(banks/cash/mpesa)
                **/
                $insert_drcr = array (
                    array(  //dr paying account(payment mode) 
                        "org_id"=> $_SESSION['orgid'],
                        "account_id"=> $account->account_id,
                        "account_code"=> $account->account_code,
                        "account_type_id"=> $account->account_type_id,
                        "subaccount_type_id"=> $account->subaccount_type_id,
                        "fiscal_year_id"=> $fiscal_year_id,
                        "term_id"=> $_SESSION['termid'],
                        "table_id"=> $lastid,            
                        "table_name"=> 'income_payments',            
                        "voucher_code"=> $reference,
                        "reference"=> $reference2,
                        "voucher_amount"=> $paymentAmount,
                        "voucher_type"  => 'dr',
                        "transaction_date"=> $payment_date,
                        "created_by"=> $_SESSION['userid'],
                        "approved_by"=> '',
                        "narrative"=> 'Income Payment ' . $this->input->post('narrative')
                    ),
                    array(  //dr initial income account to reduce balance 
                        "org_id"=> $_SESSION['orgid'],
                        "account_id"=> $income_acc->account_id,
                        "account_code"=> $income_acc->account_code,
                        "account_type_id"=> $income_acc->account_type_id,
                        "subaccount_type_id"=> $income_acc->subaccount_type_id,
                        "fiscal_year_id"=> $fiscal_year_id,
                        "term_id"=> $_SESSION['termid'],
                        "table_id"=> $lastid,            
                        "table_name"=> 'income_payments',            
                        "voucher_code"=> $reference,
                        "reference"=> $reference2,
                        "voucher_amount"=> $paymentAmount,
                        "voucher_type"  => 'dr',
                        "transaction_date"=> $payment_date,
                        "created_by"=> $_SESSION['userid'],
                        "approved_by"=> '',
                        "narrative"=> 'Income Payment ' . $income_acc->account_name . ' ' . $_POST['narrative']
                    ),
                );
                
                if(!$this->db->insert_batch('vouchers', $insert_drcr)) {
                    // delete initial payment
                    $this->db->delete('income_payments', array("income_payment_id" => $lastid));

                    $this->session->set_flashdata('alert', '<div class="alert alert-warning">Account CR failed. Try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect('income/income_details/'.$incomeID, 'refresh');
                }
                /** Accounting End */

                #Trail Start
                $trail = array(
                    'event_name' => "income_payment",
                    'operator' => $_SESSION['userid'],
                    'username' => $_SESSION['username'],
                    'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                    'source' => 'income_payments',
                    'source_id' => $lastid,
                    'narrative' => json_encode($form_data),
                    'task' => json_encode($insert_drcr),
                    "start_time" => date('Y-m-d H:m:s')
                );
                $this->db->insert('sys_logs', $trail);
                //Trail End

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect('income/income_details/'.$incomeID, 'refresh');
            }
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect('income/income_details/'.$incomeID, 'refresh');
            }
        }

    }

    public function print_payment($id) {
        $this->data['payment'] = $this->income->this_payment($id); #expense payment

        $this->load->library('pdf');
        $html = $this->load->view('reports/income_receipt', $this->data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }

    public function print_payment2($id) {
        $this->data['payment'] = $this->income->this_payment($id); #expense payment

        $this->load->view('income/income_receipt', $this->data);
    }

    public function delete($id) {
        // delete income voucher
        $this->db->delete('vouchers', array("table_id"=>$id, "table_name"=>'incomes'));

        // payments
        $payments = $this->db->where("income_id",$id)->get('income_payments')->result();
        foreach($payments as $dt1){
            $this->db->delete('vouchers', array("table_id"=>$dt1->income_payment_id, "table_name"=>'income_payments'));
        }

        // delete payments
        $this->db->delete('income_payments', array("income_id"=>$id));

        // delete income 
        $this->db->delete('incomes', array("income_id"=>$id));

        $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));

    }
    




}