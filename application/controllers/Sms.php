<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sms extends MY_Controller {

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
            $this->load->model('Organization');
            $this->load->model('Inserts');
            $this->load->model('Users_Model');
            $this->load->model('Sms_Model','sms');
            
            $this->data['active_user'] = $this->Majorselects->get_user();

            if(!isset($_SESSION['loggedin'])) {
                #get the details of this user
                $log_details = $this->log_details();
                $this->Inserts->insert_data("sys_logs", $log_details);
                $_SESSION['loggedin'] = 'true';
            }

            $credit = $this->db->where('id',1)->get('sms_credit')->row();
            $this->data['credo'] = $credit->credit_balance;

        }
    }

    function log_details(){
        $dt = '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }';
        $data = array(
            "event_name"=> "login",
            "computer"  => $dt,
            "operator"  => $_SESSION['userid'],
            "start_time"=> date('Y-m-d H:m:s')
        );
        return $data;
    }
    

    public function index() {
        //$this->permission_check('dashboard_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'SMS';

        $this->data['sent'] = $this->sms->sent_messages();
        $this->data['outbox'] = $this->sms->outbox_messages();

        $this->data['count_sent'] = $this->db->where('sent',1)->get('sms')->num_rows();
        $this->data['count_outbox'] = $this->db->where('sent',0)->get('sms')->num_rows();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('sms/index', $this->data);
        $this->load->view('inc/footer');

    }

    public function topup() {
        if($_SESSION['userid'] == 1) {
            $amount = $_POST['amount'];
            if($this->db->query( "UPDATE sms_credit SET credit_balance = credit_balance + $amount ") ) {
                $running_balance = $this->db->where('id',1)->get('sms_credit')->row('credit_balance');
                
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Success! Credo imeingia. '. $running_balance .' <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sms/index'));
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sms/index'));
            }
        } 
    }

    public function all_sentsms_ajax () {     
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $sentSMS = $this->sms->sentsms_datatable($_GET);
        $sent_count = $this->sms->sentsms_count();

        $data = array();
        $i = $start;
        foreach($sentSMS as $dt) {
            $i++;

            $action = null;

            if($this->permission_check('sms_edit')){
                $action .= '<a href="'.site_url('sms/tuma_tena/'.$dt->sms_id).'" class="btn btn-xs btn-rgp" ><i class="fa fa-paper-plane"></i></a>';
            }
            if($this->permission_check('stock_delete')){
                $action .= '<a href="'.site_url('sms/delete/'.$dt->sms_id).'" class="btn btn-xs btn-rgd" ><i class="fa fa-trash"></i></a>';
            }
                                        
            $data[] = array(
                // $dt->admission_no.': '.$dt->first_name.' '.$dt->second_name.' '.$dt->last_name,
                $dt->phone,
                $dt->message,
                $dt->time_stamp,
                $action
             );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $sent_count,
            "recordsFiltered" => $sent_count,
            "data" => $data
          );
        echo json_encode($output);
        exit();
    }

    public function all_outboxsms_ajax () {     
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $outboxSMS = $this->sms->outboxsms_datatable($_GET);
        $outbox_count = $this->sms->outbox_count();

        $data = array();
        $i = $start;
        foreach($outboxSMS as $dt) {
            $i++;

            $action = null;

            if($this->permission_check('sms_edit')){
                $action .= '<a href="'.site_url('sms/tuma_tena/'.$dt->sms_id).'" class="btn btn-xs btn-rgp" ><i class="fa fa-paper-plane"></i></a>';
            }
            if($this->permission_check('stock_delete')){
                $action .= '<a href="'.site_url('sms/delete/'.$dt->sms_id).'" class="btn btn-xs btn-rgd" ><i class="fa fa-trash"></i></a>';
            }
                                        
            $data[] = array(
                // $dt->admission_no.': '.$dt->first_name.' '.$dt->second_name.' '.$dt->last_name,
                $dt->phone,
                $dt->message,
                $dt->time_stamp,
                $action
             );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $outbox_count,
            "recordsFiltered" => $outbox_count,
            "data" => $data
          );
        echo json_encode($output);
        exit();
    }

    public function test_sms () {
        $this->sms->send('0707866136', 'Hello world');
        echo 'Message Sent Successfully';
        var_dump($_POST);
    }

    public function testsms2 () {
        $this->sms->send_new('0707866136', 'Hello world');
        echo 'Message Sent Successfully';
        // var_dump($_POST);
    }

    /* Templates Start */
    public function templates() {
        //$this->permission_check('dashboard_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'SMS Templates';

        $this->data['templates'] = $this->sms->templates();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('sms/templates', $this->data);
        $this->load->view('inc/footer');

    }
    public function add_template() {
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        $form_data = array(
            "template_name"      => trim($this->input->post('template_name')),
            "org_id"         => $this->input->post('org_id'),
            "narrative"      => trim($this->input->post('narrative')),
            "active"         => $active
        );
        if($this->db->insert('sms_templates', $form_data)){

            //#Trail Start
            $trail = array(
                'event_name' => "add_smstemplate",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'sms_templates',
                'source_id' => $this->db->insert_id(),
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Template successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_template() {
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        $form_data = array(
            "template_name"  => trim($this->input->post('template_name')),
            "org_id"         => $this->input->post('org_id'),
            "narrative"      => trim($this->input->post('narrative')),
            "active"         => $active
        );
        if($this->db->update('sms_templates', $form_data, array("template_id"=>$_POST['template_id']) )){

            //#Trail Start
            $trail = array(
                'event_name' => "update_smstemplate",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'sms_templates',
                'source_id' => $_POST['template_id'],
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Template successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_template ($id) {
        $form_data = $this->db->where('template_id',$id)->get('sms_templates')->row();

        //delete template
        $delete = $this->db->query("DELETE FROM sms_templates WHERE template_id = '$id' ");
        if($delete) {

            //#Trail Start
            $trail = array(
                'event_name' => "delete_smstemplate",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'sms_templates',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sms/templates'));
        }else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sms/templates'));
        }
    }
    /* Templates End */




    public function get_template () {
        $data = $_POST['data'];
        $dt = $this->db->from('sms_templates')->where('template_id', $data)->get()->row();

        if(isset($dt->template_name) || $dt->template_name != null) {
            $dat = array (
                "resp" => '1',
                "message" => 'Success',
                "template_id" => $dt->template_id,
                "template_name" => $dt->template_name,
                "org_id" => $dt->org_id,
                "active" => $dt->active,
                "narrative" => $dt->narrative
            );
            $slots = json_encode($dat);
        } else {
            $slots = '{ "resp" : "0", "message" : "Data does not exist" }';
        }
        echo $slots;  
    }

    public function get_clients() {
        $id = $_POST['data'];
        $students = $this->db->where('org_id',$id)->get('students')->result();
        foreach($students as $dt) echo '<option value="'.$dt->student_id.'"> '.$dt->admission_no.' '.$dt->first_name.' '.$dt->second_name.' </option>';
    }

    public function tuma () {
        $permitted_chars = '0123456789AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';
        $code = substr(str_shuffle($permitted_chars), 0, 10);
        $sms_data = array();
        $length = count($_POST['student_id']);

        $sent = 0;
        // if($this->data['credo'] > 1) $sent = 1;

        $query1 = 'INSERT INTO sms (org_id, code, table_id, entity_id, template_id, table_name, phone, message, sent ) VALUES ';

        if($length < 1){
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Select clients <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sms/index'));
        }

        $narrative = $this->db->where('template_id', $_POST['template_id'])->get('sms_templates')->row('narrative');
        $phones = '';
        $template_id = $_POST['template_id'];
        $y = 0;

        if(in_array('all', $_POST['student_id'])) {
            // get all students
            $students = $this->db->where('active',1)->get('students')->result();
            $length = count($students);
            foreach($students as $stud){
                $y++;
                $studentid = $stud->student_id;
                $phone = $stud->preferred_contact_phone;
                $query1 .= "('$_POST[org_id]', '$code', '$studentid', '$_SESSION[userid]', '$_POST[template_id]', 'students', '$phone', '$narrative', '$sent' )";
    
                $phones .= $phone;
                if($y != $length) {
                    $query1 .= ',';
                    $phones .= ',';
                } 
                //array_push($phones, $phone);            
            }

        } else {
            for($x = 0; $x < $length; $x++){
                $y++;
                $id2 = $this->db->where('student_id',$_POST['student_id'][$x])->get('students')->row();
                $studentid = $id2->student_id;
                $phone = $id2->preferred_contact_phone;
                $query1 .= "('$_POST[org_id]', '$code', '$studentid', '$_SESSION[userid]', '$_POST[template_id]', 'students', '$phone', '$narrative', '$sent' )";
    
                $phones .= $phone;
                if($y != $length) {
                    $query1 .= ',';
                    $phones .= ',';
                } 
                //array_push($phones, $phone);            
            }
        }

        
        

        //insert data
        if($this->db->query($query1)) {

            if($sent == 1) {
                //send sms
                // $this->sms->send($phones, $narrative);
                // //mark status as sent
                // $this->db->update('sms', array("sent"=>1), array("code"=>$code));

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Success. SMS processing initiated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sms/index'));
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-warning">Warning. Insufficient airtime. Kindly recharge your account and the messages will automatically be sent. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sms/index'));
            }

            
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sms/index'));
        }

        echo $query1;
    }
    
    public function tuma_tena ($id) {
        $details = $this->db->where('sms_id', $id)->get('sms')->row();

        if($this->data['credo'] <= 2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-failed">Insufficient credo to send the sms. Kindly recharge your account. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sms/index'));
        }

        $send = $this->sms->send($details->phone, $details->message);
        //echo $send;

        //#Trail Start
        $trail = array(
            'event_name' => "resend_sms",
            'operator' => $_SESSION['userid'],
            'username' => $_SESSION['username'],
            'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
            'source' => 'sms',
            'source_id' => $id,
            'narrative' => json_encode($details),
            'task' => json_encode($details),
            "start_time" => date('Y-m-d H:m:s')
        );
        $this->db->insert('sys_logs', $trail);
        //Trail End
        
        $this->db->update('sms', array("sent"=>1), array("sms_id"=>$id));
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Sent successfully. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect(site_url('sms/index'));
    }

    public function delete ($id) {
        $form_data = $this->db->where('sms_id',$id)->get('sms')->row();

        //delete sms
        $delete = $this->db->query("DELETE FROM sms WHERE sms_id = '$id' ");
        if($delete) {

            //#Trail Start
            $trail = array(
                'event_name' => "delete_sms",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'sms',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">SMS successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sms/index'));
        }else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sms/index'));
        }
    }

    public function feebalance($id) {
        $adm = $this->db->where('student_id',$id)->get('students')->row('admission_no');
        //get the fee balance and send the sms to the relevant person
        $total_cr = $this->db->where("account_code = '$adm' AND voucher_type = 'cr' AND voucher_code <> '20210503000000' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
        $total_dr = $this->db->where("account_code = '$adm' AND voucher_type = 'dr' AND voucher_code <> '20210503000000' ")->select_sum('voucher_amount')->get('vouchers')->row('voucher_amount');
        $total_due = $total_cr - $total_dr;

        $stud = $this->db->where('admission_no',$adm)->get('students')->row();
        $orgname = $this->db->where('org_id',$_SESSION['orgid'])->get('orgs')->row('org_name');

        $smsmessage = 'School fee balance for ADM' . $stud->admission_no . ' ' . $stud->first_name . ' ' . $stud->second_name . ' ' . $stud->last_name . ' is Ksh' . number_format($total_due,2) . '. Always pay fee in time. ' . $orgname;
        $phone = $stud->preferred_contact_phone;
        $sent = 0;
        if($this->data['credo'] > 1) $sent = 1;

        $sms_data = array(
            "org_id" => $_SESSION['orgid'],
            "entity_id" => $_SESSION['userid'],
            "template_id" => 1,
            "table_id" => $stud->student_id,
            "table_name" => 'students',
            "code" => null,
            "phone" => $phone,
            "message" => $smsmessage,
            "sent" => $sent,
            "narrative" => 'Fee Balance',
        );
        $this->db->insert('sms',$sms_data);

        //#Trail Start
        $trail = array(
            'event_name' => "feebalance_sms",
            'operator' => $_SESSION['userid'],
            'username' => $_SESSION['username'],
            'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
            'source' => 'sms',
            'source_id' => $this->db->insert_id(),
            'narrative' => json_encode($sms_data),
            'task' => json_encode($sms_data),
            "start_time" => date('Y-m-d H:m:s')
        );
        $this->db->insert('sys_logs', $trail);
        //Trail End

        // $this->sms->send($phone, $smsmessage); // sends the sms automatically
        if($sent == 1) {
            $this->sms->send($phone, $smsmessage); // sends the sms automatically
            echo '<div class=""> <p style="color: green;"> Success! Fee balance sent successfully.</p>
                <p><a href="'.site_url('fees/fee_balances').'"><button>Go back!</button></a></p>
                </div>';
        } else {
            // no credit
            echo '<div class=""> <p style="color: red;"> Failed! Recharge your airtime and the sms will automatically be resend.</p>
                </div>';
        }
    }




}