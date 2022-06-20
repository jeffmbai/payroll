<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends MY_Controller {

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
            $this->load->model('Users_Model');
            $this->load->model('Accounting_Model', 'accounting');
            $this->load->model('Student_Model', 'student');
            
            $this->data['active_user'] = $this->Majorselects->get_user();

            // $this->load->library('csvimport'); //old method to import
            $this->load->library('excel'); //new method to import
        }
    }

    public function account_types () {
        $this->permission_check('accounts_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Account Types';

        //$this->data['all_items'] = $this->Majorselects->all_items();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/account_types', $this->data);
        $this->load->view('inc/footer');
    }

    public function accounts () {
        $this->permission_check('accounts_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Accounts';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/accounts', $this->data);
        $this->load->view('inc/footer');
    }

    public function add_account() {
        $this->permission_check('accounts_add');
        //register account
        $active = false;
        if(isset($_POST['active'])) $active = true;
        $form_data = array(
            "org_id" => $_SESSION['orgid'],
            "account_type_id" => $this->input->post('account_type_id'),
            "subaccount_type_id" => $this->input->post('subaccount_type_id'),            
            "account_code" => $this->input->post('account_code'),
            "account_name" => $this->input->post('account_name'),
            "opening_balance" => $this->input->post('opening_balance'),
            "is_key" => $this->input->post('is_key'),
            // "is_votehead" => $this->input->post('is_votehead'),
            // "is_studentaccount" => $this->input->post('is_studentaccount'),            
            // "student_id" => $this->input->post('student_id'),          
            "other_category" => $this->input->post('other_category'),
            "active" => $active,
            "narrative" => $this->input->post('narrative'),
            "created_by" => $_SESSION['userid'],
        );
        if($this->db->insert('accounts', $form_data)) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "add_account",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'accounts',
                'source_id' => $this->db->insert_id(),
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

    }

    public function update_account() {
        $this->permission_check('accounts_edit');    
        //update account
        $active = false;
        if(isset($_POST['active'])) $active = true;
        $form_data = array(
            "account_type_id" => $this->input->post('account_type_id'),
            "subaccount_type_id" => $this->input->post('subaccount_type_id'),     
            "account_code" => $this->input->post('account_code'),
            "account_name" => $this->input->post('account_name'),
            "opening_balance" => $this->input->post('opening_balance'),
            "other_category" => $this->input->post('other_category'),
            "is_key" => $this->input->post('is_key'),
            "active" => $active,
            "narrative" => $this->input->post('narrative')
        );
        if($this->db->update('accounts', $form_data, array("account_id"=>$_POST['account_id']))) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "update_account",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'accounts',
                'source_id' => $_POST['account_id'],
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

    }

    public function toa_account () {
        $this->permission_check('accounts_delete');  
        $id = $_POST['data'];
        $deleteData = $this->db->where('account_id',$id)->get('accounts')->row();

        if($this->db->delete('accounts', array('account_id'=>$id))){

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_account",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'accounts',
                'source_id' => $id,
                'narrative' => json_encode($deleteData),
                'task' => json_encode($deleteData),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Account deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            echo 'success';
        }else {
            echo 'error';
        }
    }

    public function get_account() {
        $exceptions = array(300001,600003); // default accounts

        $id = $_POST['data'];
        $data = $this->db->where('account_id', $id)->get('accounts')->row();
        $accounttypes = $subaccounttypes = $students = $checked = $checked2 = $checked3 = $votehead1 = $votehead2 = null;
        if($data->active == 1) $checked = 'checked';
        if($data->is_studentaccount == 1) $checked2 = 'checked'; else $checked3 = 'checked';
        if($data->is_votehead == 1) $votehead1 = 'checked'; else $votehead2 = 'checked';

        $accounttype = $this->db->get('account_types')->result(); //get account types
        foreach($accounttype as $act){
            $selected = null;
            if($act->account_type_id == $data->account_type_id) $selected = 'selected';
            $accounttypes .= '<option value="'.$act->account_type_id.'"  '.$selected.'  > '.$act->account_type_name.' </option>';
        }

        $subaccounttype = $this->db->get('subaccount_types')->result(); //ge sub-account types
        foreach($subaccounttype as $sact){
            $selected = null;
            if($sact->subaccount_type_id == $data->subaccount_type_id) $selected = 'selected';
            $subaccounttypes .= '<option value="'.$sact->subaccount_type_id.'" '.$selected.' > '.$sact->subaccount_type_name.' </option>';
        }

        ($data->is_key == 1) ? $iskey_y = 'checked' : $iskey_y = '';
        ($data->is_key == 0) ? $iskey_n = 'checked' : $iskey_n = '';

        $resp = '
            <form method="post" action="'.site_url('accounting/update_account').'">
                <input type="hidden" readonly name="account_id" value="'.$data->account_id.'" />
                <div class="row">
                    <div clcass="col-md-4 col-sm-6 col-xs-12">
                        <label for="">Account Type <span class="text text-danger">*</span> </label>
                        <select name="account_type_id" onchange="get_subaccounts2(this)" class="select2 form-control" required >
                            <option>Select account type</option>
                            '.$accounttypes.'
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label for="">Sub-Account Type </label>
                        <select name="subaccount_type_id" id="subaccount_type_id2" onchange="" class="select2 form-control" >
                            '.$subaccounttypes.'
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label for="">Account Code <span class="text text-danger">*</span> </label>
                        <input type="text" name="account_code" class="form-control" value="'.$data->account_code.'"  '.( in_array($data->account_code, $exceptions) ? 'readonly' : '').'  required />
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label for="">Account Name <span class="text text-danger">*</span> </label>
                        <input type="text" name="account_name" class="form-control" value="'.$data->account_name.'" required />
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label for="">Opening Balance <span class="text text-danger">*</span> </label>
                        <input type="number" step="0.01" name="opening_balance" class="form-control" value="'.$data->opening_balance.'" required />
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label> Is Key Account <i class="text-danger">*</i></label>
                        <p>
                            <label>Yes <input type="radio" value="1" ' . $iskey_y . ' name="is_key"></label>
                            <label>No <input type="radio" value="0" ' . $iskey_n . ' name="is_key"></label>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label> Active </label>
                        <p>
                            <input type="checkbox" value="true" name="active" '.$checked.' >
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 studs">
                        <label for="">Account category </label>
                        <select name="other_category" id="other_category" class="select2 form-control" >
                            <option value="">~Select option~</option>
                            <option value="CA" '.($data->other_category == "CA" ? 'selected' : '').' >Current Assets</option>
                            <option value="NCA" '.($data->other_category == "NCA" ? 'selected' : '').' >Non-current Assets</option>
                            <option value="CL" '.($data->other_category == "CL" ? 'selected' : '').' >Current Liabities</option>
                            <option value="NCL" '.($data->other_category == "NCL" ? 'selected' : '').' >Non-current Liabities</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Narrative </label>
                        <textarea name="narrative" id="" class="form-control">'.$data->narrative.'</textarea>
                    </div>
                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </div>
            </form>
        ';

        echo $resp;
    }
    
    public function add_subaccoutype() {
        $this->permission_check('accounts_add');  
        $form_data = array(
            "org_id" => $this->input->post('org_id'),
            "account_type_id" => $this->input->post('account_type_id'),
            "subaccount_type_code" => $this->input->post('subaccount_type_code'),
            "subaccount_type_name" => $this->input->post('subaccount_type_name'),
            "is_paymentmode" =>  $this->input->post('is_paymentmode'),
            "narrative" => $this->input->post('narrative')
        );
        if($this->db->insert('subaccount_types', $form_data)) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "add_subaccount",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'subaccount_types',
                'source_id' => $this->db->insert_id(),
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End
            
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_subaccoutype() {
        $this->permission_check('accounts_edit');  
        $id = $_POST['id'];
        $form_data = array(
            "org_id" => $this->input->post('org_id'),
            "account_type_id" => $this->input->post('account_type_id'),
            "subaccount_type_code" => $this->input->post('subaccount_type_code'),
            "is_paymentmode" =>  $this->input->post('is_paymentmode'),
            "subaccount_type_name" => $this->input->post('subaccount_type_name'),
            "narrative" => $this->input->post('narrative')
        );
        if($this->db->update('subaccount_types', $form_data, array('subaccount_type_id'=>$id))) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "update_subaccount",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'subaccount_types',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_subaccounttype($id) {
        $this->permission_check('accounts_delete');  
        $form_data = $this->db->where("subaccount_type_id = '$id'")->get('subaccount_types')->row();
        if($this->db->query(" DELETE FROM subaccount_types WHERE subaccount_type_id = '$id' ") ) {

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_subaccount",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'subaccount_types',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function get_subaccount_types() {
        $id = $_POST['data'];
        $data = $this->db->where('account_type_id', $id)->get('subaccount_types')->result();
        $subaccounttypes = '<option value="">~Select sub-account type~</option>';
        //echo $this->db->last_query();

        foreach($data as $act){
            $selected = null;
            $subaccounttypes .= '<option value="'.$act->subaccount_type_id.'"  '.$selected.'  > '.$act->subaccount_type_name.' </option>';
        }
        echo $subaccounttypes;
    }

    public function account_balances () {
        $this->permission_check('account_balances');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Account Balances';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/account_balances', $this->data);
        $this->load->view('inc/footer');
    }

    public function account_ledger ($code) {
        $this->permission_check('account_ledger');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Account Ledger Statements';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/account_ledger_statements', $this->data);
        $this->load->view('inc/footer');
    }

    public function account_statement_pdf($code) {
        $this->data['page'] = 'Account Ledger Statements';
        $this->data['account'] = $this->db->where('account_code',$code)->get('vw_accounts')->row();

        $this->load->library('pdf');
        $html = $this->load->view('reports/account_statement_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'account_statement_'.date('d-m-Y'), false);
    }
    public function account_statement_popup($code) {
        $this->data['page'] = 'Account Ledger Statements';
        $this->data['account'] = $this->db->where('account_code',$code)->get('vw_accounts')->row();

        $html = $this->load->view('reports/account_statement_pdf', $this->data);
    }
    public function account_statement_xls($code) {
        $this->data['page'] = 'Account Ledger Statements';
        $account = $this->db->where('account_code',$code)->get('vw_accounts')->row();

        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename='.$account->account_name.'-statement.csv');

        echo "DATE, DETAILS, IN, OUT, BALANCE".PHP_EOL;

        $crdrs = $this->db->select('a.*, b.account_code, b.account_name')
                                        ->from('vouchers as a')
                                        ->join('accounts as b','a.account_id = b.account_id')
                                        ->where("a.account_id = '$account->account_id'")
                                        ->order_by('a.transaction_date', 'asc')
                                        // ->order_by('a.transaction_date', 'desc')
                                        ->get()->result();
        $total_cr = $total_dr = 0;

        $difference = 0;
        
        foreach($crdrs as $dt) {
            $cr = $dr  = 0;
            $refs = $narrs = null;
            if($dt->voucher_type == 'dr') $dr = $dt->voucher_amount; else $dr = 0;
            if($dt->voucher_type == 'cr') $cr = $dt->voucher_amount; else $cr = 0;
            $total_cr += $cr;
            $total_dr += $dr;
            $difference += $dr - $cr;
            $account_name = null;
            $student_name = null;

            if($cr == 0 && $dr == 0) continue;

            if($dt->table_name == 'payments') {
                $res1 = $this->db->where('payment_id',$dt->table_id)->get($dt->table_name)->row();
                if($res1) {
                    $refs = $res1->reference;
                    $narrs = $res1->narrative;
                    // $this->db->where(" table_id = '$dt->table_id' AND table_name = 'payments' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                }
            } elseif($dt->table_name == 'income_payments') {
                $res2 = $this->db->where('income_payment_id',$dt->table_id)->get($dt->table_name)->row();
                if($res2) {
                    $refs = $res2->reference;
                    $narrs = $res2->narrative;
                    // $this->db->where(" table_id = '$dt->table_id' AND table_name = '$dt->table_name' ")->update('vouchers',array('transaction_date'=>$res1->payment_date));
                }
            } elseif($dt->account_type_id == 4 && $dt->subaccount_type_id == 4) {
                $account = $this->db->select('a.*, b.account_name')->from('vouchers as a')
                        ->join('accounts as b','a.account_id = b.account_id')
                        ->where("a.account_type_id = 1 AND a.voucher_code = '$dt->voucher_code' ")
                        ->get()->row();
                
                if(isset($account->account_name)) $account_name = $account->account_name;
            }  
            if($dt->account_code == '500004' && $dt->table_name == 'orders') { // uniform sales2
                $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                if(isset($account->account_name)) $account_name = $account->account_name;
            }
            if($dt->account_code == 'INTV01' && $dt->table_name == 'income_payments') { // interview
                $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                if(isset($account->account_name)) $account_name = $account->account_name;
            }
            if($dt->account_code == '500003' && $dt->table_name == 'income_payments') { // bread sales
                $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                if(isset($account->account_name)) $account_name = $account->account_name;
            }
            if($dt->account_code == '500002' && $dt->table_name == 'income_payments') { // bus hire
                $account = $this->db->select('a.account_id, b.account_name')->from('vouchers as a')->join('accounts as b','a.account_id = b.account_id')->where("a.voucher_code = '$dt->voucher_code' AND a.account_type_id = '1'")->get()->row();
                if(isset($account->account_name)) $account_name = $account->account_name;
            }
            if($dt->account_type_id == 1 && $dt->table_name == 'orders') { // uniform_sales
                // $get
                
            }
            
            $TDATE = date('d-m-Y', strtotime($dt->transaction_date));
            $TDESC = $dt->narrative.' '.$narrs.' '.$refs.' ~ '.$student_name.' '.$account_name.' '.$dt->voucher_code;
            echo $TDATE . ", " . $TDESC . ", " . $dr . ", " . $cr . ", " . $difference . " ".PHP_EOL;
        }

        echo " , TOTAL , " . $total_dr . ", " . $total_cr . ", " . $difference . " ".PHP_EOL;

    }

    public function cash_flow () {
        $this->permission_check('freports_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Cash Flow';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/cash_flow', $this->data);
        $this->load->view('inc/footer');
    }

    public function trial_balance () {
        $this->permission_check('freports_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Trial Balance';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/trial_balance', $this->data);
        $this->load->view('inc/footer');
    }

    /** Balance Sheet Start */
    public function balance_sheet () {
        $this->permission_check('freports_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Balance Sheet';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/balance_sheet1', $this->data);
        $this->load->view('inc/footer');
    }
    public function balance_sheet_pdf () {
        $this->permission_check('freports_view');
        if(isset($_POST['sheet_date'])) {
            $sheet_date = $_POST['sheet_date'];
            $_SESSION['sheet_date'] = $sheet_date;
        }
        if(!isset($_SESSION['sheet_date'])) {
            redirect(site_url('accounting/balance_sheet'));
        }

        $this->data['page'] = 'Balance Sheet';

        $this->load->library('pdf');
        $html = $this->load->view('reports/balance_sheet', $this->data, true);
        $this->pdf->createPDF($html, 'balance_sheet', false);
    }
    public function get_balance_sheet() {
        $sheet_date = $_POST['sheet_date'];
    }
    /** Balance Sheet END */

    /**
     * Profit & Loss Start
     */
    public function profit_and_loss () {
        $this->permission_check('freports_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Profit and Loss';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/profit_and_loss1', $this->data);
        $this->load->view('inc/footer');
    }
    public function profit_and_loss_pdf () {
        $this->permission_check('freports_view');
        $this->data['page'] = 'Profit and Loss';

        if(isset($_POST['from_date']) && isset($_POST['to_date'])) {
            $fromdate = $_POST['from_date'];
            $todate = $_POST['to_date'];
            $_SESSION['fromdate'] = $fromdate;
            $_SESSION['todate'] = $todate;
        }
        if(!isset($_SESSION['fromdate']) && !isset($_SESSION['todate'])) {
            redirect(site_url('accounting/profit_and_loss'));
        }

        $this->data['page'] = 'Profit and Loss';

        $this->data['expenses'] = $this->accounting->profit_loss($fromdate, $todate, 3, 'dr');
        // $incomes = $this->accounting->profit_loss($fromdate, $todate, 4, 'dr');
        // $incomes = $this->accounting->incomes1($fromdate, $todate, 4, 'dr');
        $this->data['incomes'] = $this->accounting->incomes1($fromdate, $todate, 4, 'cr'); // proposed by kioko on 4/6/2021 to be amounts to be received and not amounts received
        // $incomes1 = $this->accounting->incomes1($fromdate, $todate, 4, 'dr');
       
        // get all the arrears
        
        // $total_income += ($fee_payable - $arrears);
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/profit_and_loss', $this->data, true);
        $this->pdf->createPDF($html, 'profit_and_loss', false);
    }
    public function get_profit_loss () {
        //var_dump($_POST);  //2021-04-06  YYYY-mm-dd
        $fromdate = trim($_POST['from_date']);
        $todate = trim($_POST['to_date']);
        $incomes = array();
        
        $expenses = $this->accounting->profit_loss($fromdate, $todate, 3, 'dr');
        $incomes = $this->accounting->incomes1($fromdate, $todate, 4, 'cr'); // proposed by kioko on 4/6/2021 to be amounts to be received and not amounts received
        $incomes2 = $this->accounting->incomes2($fromdate, $todate, 4, 'cr');

        $total_expense = $total_income = $difference = 0;

        ?>
            <tr>
                <th>INCOME</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                foreach($incomes as $income) {
                    $total_income += $income->total_amount;
                    ?>
                    <tr>
                        <td></td>
                        <!-- <td><?=$income->subaccount_type_name?></td> -->
                        <td><a href="<?php echo site_url('accounting/account_ledger/'.$income->account_code);?>"><?=$income->account_name?></a></td>
                        <td><?=number_format($income->total_amount, 2)?></td>
                    </tr>
                    <?php
                }
            ?>
            <tr>
                <th>Total Income</th>
                <th></th>
                <th><?=number_format($total_income, 2)?></th>
            </tr>


            <tr>
                <th>EXPENSES</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                foreach($expenses as $expense) {
                    $total_expense += $expense->total_amount;
                    ?>
                    <tr>
                        <td></td>
                        <!-- <td><?=$expense->subaccount_type_name?></td> -->
                        <td><a href="<?php echo site_url('accounting/account_ledger/'.$expense->account_code);?>"><?=$expense->account_name?></a></td>
                        <td><?=number_format($expense->total_amount, 2)?></td>
                    </tr>
                    <?php
                }
            ?>
            <tr>
                <th>Total Expense</th>
                <th></th>
                <th><?=number_format($total_expense, 2)?></th>
            </tr>

            <?php
                $difference = $total_income - $total_expense;
                $info = null;
                if($difference >= 0) $info = 'NET Profit';
                else $info = 'NET Loss';
            ?>
            <tr> <td style="height: 15px;" colspan="3"></td> </tr>
            <tr>
                <th><?=$info?></th>
                <th></th>
                <th>
                    <u>
                        <?php
                            if($difference >= 0) echo '<span class="text-success"> '.number_format($difference, 2).' </span>';
                            else echo '<span class="text-danger"> '.number_format(abs($difference), 2).' </span>';
                        ?>
                    </u>
                </th>
            </tr>
        <?php
    }
    /**
     * Profit & Loss End */      
    
     /**
      * General Ledger Start
      */
    public function general_ledger () {
        $this->permission_check('account_ledger');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'General Ledger';

        $this->data['general_ledger'] = $this->accounting->general_ledger();
        
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('accounting/general_ledger', $this->data);
        $this->load->view('inc/footer');
    }
    /**
     * General Ledger End
     */

     /**
      * Supplier Statements Start
      */
    public function supplier_statements () {
        $this->permission_check('account_ledger');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Supplier Statements';

        $this->data['suppliers'] = $this->db->where('system_role',3)->get('entitys')->result();
        
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/supplier_statements', $this->data);
        $this->load->view('inc/footer');
    }
    public function get_supplier_statement () {
        $this->data['page'] = 'Supplier Statements';

        $supplier_id = $_POST['supplier_id'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        // 800001 : purchase account

        //get statements
        $balance_brought_forward = 0;
        $balance_brought_forward = $this->accounting->balance_brought_forward ($from_date, '800001', $supplier_id);
        $statements = $this->accounting->account_statements ($from_date, $to_date, '800001', $supplier_id);
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


        $statements = $this->accounting->account_statements ($from_date, $to_date, '800001', $supplier_id);
        if(count($statements) < 1) {
            echo '<tr> <td><span class="text-warning">No data available</span></td> </tr>';
            exit();
        }

        $total_cr = $total_dr = 0;
        // $difference = $account->opening_balance;
        foreach($statements as $dt) {
            $cr = $dr = 0;
            if($dt->voucher_type == 'dr') $dr = $dt->voucher_amount; else $dr = 0;
            if($dt->voucher_type == 'cr') $cr = $dt->voucher_amount; else $cr = 0;
            $total_cr += $cr;
            $total_dr += $dr;
            $difference += $dr - $cr;
            ?>
                <tr>
                    <td><?=date('d-m-Y', strtotime($dt->transaction_date));?></td>
                    <td><?=$dt->voucher_code;?></td>
                    <td><?=$dt->narrative;?></td>
                    <th><?php if($dt->voucher_type == 'dr') echo number_format($dt->voucher_amount, 2);?></th>
                    <th><?php if($dt->voucher_type == 'cr') echo number_format($dt->voucher_amount, 2);?></th>
                    <td><?=number_format($difference, 2);?></td>
                </tr>
            <?php
        }
        // get footer of the data
        ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th>Total dr: <?=number_format($total_dr,2);?></th>
                <th>Total cr: <?=number_format($total_cr,2);?></th>
                <th>Balance: <?=number_format($difference, 2);?></th>
            </tr>
        <?php
    }
    public function get_supplier_statement_pdf () {
        $this->permission_check('account_ledger');
        $this->data['page'] = 'Supplier Statements';

        $supplier_id = $_POST['supplier_id'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        if($supplier_id == '' || $from_date == '' || $to_date == '') {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Fill in the mandator fields. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('accounting/supplier_statements'));
        }

        //get statements
        $statements = $this->accounting->account_statements ($from_date, $to_date, '800001', $supplier_id);
        if(count($statements) < 1) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! No data available. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('accounting/supplier_statements'));
        }

        //set session for the time range
        $_SESSION['fromdate'] = $from_date;
        $_SESSION['todate'] = $to_date;

        $this->data['from_date'] = $from_date;
        $this->data['to_date'] = $to_date;

        $this->data['statements'] = $statements;
        $this->data['account'] = '800001';
        $this->data['acc'] = $this->db->where('entity_id', $supplier_id)->get('entitys')->row();
        $this->data['supplier'] = $this->db->where('entity_id',$supplier_id)->get('entitys')->row();

        $this->load->library('pdf');
        $html = $this->load->view('reports/supplier_statement_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'supplier_statement_'.$this->data['supplier']->firstname, false);

    }
    /**
     * Supplier Statements End
     */


    /**
     * Supplier Balances End
     */
    public function supplier_balances () {
        $this->permission_check('account_ledger');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Supplier Balances';

        $this->data['suppliers'] = $this->db->where('system_role',3)->get('entitys')->result();
        
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/supplier_balances', $this->data);
        $this->load->view('inc/footer');
    }
    public function supplier_balances_pdf () {
        $this->permission_check('account_ledger');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Supplier Balances';

        $this->data['suppliers'] = $this->db->where('system_role',3)->get('entitys')->result();

        $this->load->library('pdf');
        $html = $this->load->view('reports/supplier_balances_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'supplier_balances_rpt', false);
    }
    public function supplier_balances_excel () {
        $this->permission_check('account_balances');
        // export supplier balances to csv/excel
        $suppliers = $this->db->where('system_role',3)->get('entitys')->result();

        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=supplier_balances_rpt.csv');
        echo "Name, Phone, TT. Amount, Amount Paid, Amount Due".PHP_EOL;

        foreach($suppliers as $tbd) {
            // Get voucher cr/dr
            $total_cr = $this->db->where(" account_code = '800001' AND customer_supplier_id = '$tbd->entity_id' AND voucher_type = 'cr' ")->select_sum('voucher_amount')->get('vw_general_ledger')->row('voucher_amount');
            $total_dr = $this->db->where(" account_id = '800001' AND customer_supplier_id = '$tbd->entity_id' AND voucher_type = 'dr' ")->select_sum('voucher_amount')->get('vw_general_ledger')->row('voucher_amount');
            $total_due = $total_cr - $total_dr;

            $name = $tbd->firstname.' '.$tbd->secondname.' '.$tbd->lastname;
            echo $name.','.$tbd->phone.','.$total_cr.','.$total_dr.','.$total_due.''.PHP_EOL;
           
        }

    }
    /**
     * Supplier Balances End
     */

    // Account balances start
    public function account_balances_pdf() {
        $this->permission_check('account_balances');
        $this->data['page'] = 'Account Balances';

        $this->load->library('pdf');
        $html = $this->load->view('reports/account_balances_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'account_balances_'.date('d-M-Y'), false);
    }
    // Account balances end


    /**
     * Fee Statement start
     */
    public function get_fee_statement () {
        $this->permission_check('account_ledger');
        $this->data['page'] = 'Fee Statements';

        $student_id = $_POST['student_id'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        //get student account
        $admission_no = $this->db->where('student_id',$student_id)->get('students')->row('admission_no');
        $acc = $this->db->where("account_code",$admission_no)->get('accounts')->row();
        if(!isset($acc->account_code)) {
            //no account available
            echo '<tr> <td><span class="text-warning">Account not available</span></td> </tr>';
            exit();
        }

        //get statements
        $statements = $this->accounting->account_statements ($from_date, $to_date, $acc->account_id);
        if(count($statements) < 1) {
            echo '<tr> <td><span class="text-warning">No data available</span></td> </tr>';
            exit();
        }

        $total_cr = $total_dr = 0;
        // $difference = $account->opening_balance;
        $difference = 0;
        foreach($statements as $dt) {
            $cr = $dr = 0;
            if($dt->voucher_type == 'dr') $dr = $dt->voucher_amount; else $dr = 0;
            if($dt->voucher_type == 'cr') $cr = $dt->voucher_amount; else $cr = 0;
            $total_cr += $cr;
            $total_dr += $dr;
            $difference += $dr - $cr;

            $account = $this->db->select('a.*, b.account_name')->from('vouchers as a')
                        ->join('accounts as b','a.account_id = b.account_id')
                        ->where("a.account_type_id = 1 AND a.voucher_code = '$dt->voucher_code' ")
                        ->get()->row();
            $account_name = null;
            if(isset($account->account_name)) $account_name = $account->account_name;

            ?>
                <tr>
                    <td><?=$dt->transaction_date;?></td>
                    <td><?=$dt->voucher_code;?></td>
                    <td><?=$dt->narrative.' ~ '.$dt->voucher_code.', '.$account_name;?></td>
                    <th><?php if($dt->voucher_type == 'dr') echo number_format($dt->voucher_amount, 2);?></th>
                    <th><?php if($dt->voucher_type == 'cr') echo number_format($dt->voucher_amount, 2);?></th>
                    <td><?=number_format($difference, 2);?></td>
                </tr>
            <?php
        }
        // get footer of the data
        ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th>Total dr: <?=number_format($total_dr,2);?></th>
                <th>Total cr: <?=number_format($total_cr,2);?></th>
                <th>Balance: <?=number_format($difference, 2);?></th>
            </tr>
        <?php
    }
    public function get_fee_statement_pdf () {
        $this->permission_check('account_ledger');
        $this->data['page'] = 'Fee Statements';

        $student_id = $_POST['student_id'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];

        if($student_id == '' || $from_date == '' || $to_date == '') {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Fill in the mandator fields. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('fees/fee_statements'));
        }

        //get student account
        $student = $this->student->this_student($student_id);
        $acc = $this->db->where("account_code",$student->admission_no)->get('accounts')->row();
        if(!isset($acc->account_code)) {
            //no account available
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Account not available. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('fees/fee_statements'));
        }

        //get statements
        $statements = $this->accounting->account_statements ($from_date, $to_date, $acc->account_id);
        if(count($statements) < 1) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! No data available. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('fees/fee_statements'));
        }

        //set session for the time range
        $_SESSION['fromdate'] = $from_date;
        $_SESSION['todate'] = $to_date;

        $this->data['statements'] = $statements;
        $this->data['account'] = $acc;
        $this->data['student'] = $student;

        $this->load->library('pdf');
        $html = $this->load->view('reports/fee_statement_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'fee_statement_'.$acc->account_code, false);

    }
     /**
      * Fee Statements end
      */

    /** Start voucher delete process */
    public function toa_voucher() {
        $id = $_POST['data'];
        $voucher = $this->db->where('voucher_id',$id)->get('vouchers')->row();
        if(count($voucher) < 1 ) {
            echo 'failed'; exit();            
        }

        #Trail Start
        date_default_timezone_set('Africa/Nairobi');
        $trail = array(
            'event_name' => "delete_voucher",
            'operator' => $_SESSION['userid'],
            'username' => $_SESSION['username'],
            'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
            'source' => 'accounts',
            'source_id' => $voucher->voucher_id,
            'narrative' => json_encode($voucher),
            'task' => json_encode($voucher),
            "start_time" => date('Y-m-d H:m:s')
        );
        $this->db->insert('sys_logs', $trail);
        //Trail End


        if($voucher->table_name = 'payments') { // delete expense payments
            $expenseid = $this->db->where('payment_id',$voucher->table_id)->get('payments')->row('expense_id');
            $this->db->where('expense_id',$expenseid)->delete('expenses');
            $this->db->where('voucher_code',$voucher->voucher_code)->delete('vouchers');
            echo 'success'; exit();
        } elseif($voucher->table_name = 'income_payments') { // delete income payments
            $incomeid = $this->db->where('income_id',$voucher->table_id)->get('income_payments')->row('income_id');
            $this->db->where('income_id',$incomeid)->delete('incomes');
            $this->db->where('voucher_code',$voucher->voucher_code)->delete('vouchers');
            echo 'success'; exit();
        } else {
            echo 'failed'; exit();
        }
    }
    /** End voucher delete process */



}



