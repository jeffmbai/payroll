<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

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
            $this->load->model('Staff_Model');
            $this->load->model('Departments_Model');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

    #Staff start
    public function index() {
        $this->permission_check('staff_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Staff';

        $this->data['departments'] = $this->Departments_Model->all_departments();
        $this->data['staff'] = $this->Staff_Model->staff();
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['designations'] = $this->Majorselects->designations();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('staff/index', $this->data);
        $this->load->view('inc/footer');

    } 

    public function profile($id) {
        $this->permission_check('staff_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Staff Profile';

        $this->data['departments'] = $this->Departments_Model->all_departments();
        $this->data['staff'] = $this->Staff_Model->staff_profile($id);
        $this->data['staff_allowances'] = $this->Staff_Model->staff_allowances($id);
        $this->data['staff_deductibles'] = $this->Staff_Model->staff_deductibles($id);
        $this->data['bank_details'] = $this->Staff_Model->staff_bank_accounts($id);
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['designations'] = $this->Majorselects->designations();
        $this->data['allowances'] = $this->Majorselects->allowances();
        $this->data['deductibles'] = $this->Majorselects->deductibles();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('staff/profile', $this->data);
        $this->load->view('inc/footer');

    } 

    public function archive_staff() {
        $this->permission_check('archivestaff_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Archive Staff List';

        $this->data['staff'] = $this->Staff_Model->archive_staff();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('staff/archive_staff', $this->data);
        $this->load->view('inc/footer');
    }

    public function add_staff() {
        $this->permission_check('staff_add');
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"         => trim($this->input->post('org_id')),
            "department_id"  => trim($this->input->post('department_id')),
            "designation_id" => trim($this->input->post('designation_id')),
            "first_name"     => trim($this->input->post('first_name')),
            "second_name"    => trim($this->input->post('second_name')),
            "last_name"      => trim($this->input->post('last_name')),
            "id_number"      => trim($this->input->post('id_number')),
            "dob"            => trim($this->input->post('dob')),
            "gender"         => trim($this->input->post('gender')),
            "email"          => trim($this->input->post('email')),
            "primary_phone"  => trim($this->input->post('primary_phone')),
            "secondary_phone"=> trim($this->input->post('secondary_phone')),
            "address"        => trim($this->input->post('address')),

            "employment_number" => trim($this->input->post('employment_number')),
            "kra_pin"           => trim($this->input->post('kra_pin')),
            "nssf"              => trim($this->input->post('nssf')),
            "nhif"              => trim($this->input->post('nhif')),
            "job_grade"         => trim($this->input->post('job_grade')),
            "joining_date"      => trim($this->input->post('joining_date')),
            "leaving_date"      => trim($this->input->post('leaving_date')),
            "marital_status"    => trim($this->input->post('marital_status')),
            "disability"        => trim($this->input->post('disability')),
            "basic_salary"      => trim($this->input->post('basic_salary')),

            "paye"      => trim($this->input->post('paye')),
            "nssf_amount"      => trim($this->input->post('nssf_amount')),
            "nhif_amount"      => trim($this->input->post('nhif_amount')),
            "tax_relief_amount"      => trim($this->input->post('tax_relief_amount')),
            "insurance_relief_amount"      => trim($this->input->post('insurance_relief_amount')),
            
            "narrative"      => trim($this->input->post('narrative')),
            "active"         => $active
        );
        if($this->Inserts->insert_data('employees', $form_data)){

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "add_staff",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'employee',
                'source_id' => $this->db->insert_id(),
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('staff/profile/'.$this->db->insert_id()), 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/index', 'refresh');
        }
    }

    public function update_staff ($id) {
        $this->permission_check('staff_edit');
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"         => trim($this->input->post('org_id')),
            "department_id"  => trim($this->input->post('department_id')),
            "designation_id" => trim($this->input->post('designation_id')),
            "first_name"     => trim($this->input->post('first_name')),
            "second_name"    => trim($this->input->post('second_name')),
            "last_name"      => trim($this->input->post('last_name')),
            "id_number"      => trim($this->input->post('id_number')),
            "dob"            => trim($this->input->post('dob')),
            "gender"         => trim($this->input->post('gender')),
            "email"          => trim($this->input->post('email')),
            "primary_phone"  => trim($this->input->post('primary_phone')),
            "secondary_phone"=> trim($this->input->post('secondary_phone')),
            "address"        => trim($this->input->post('address')),
            "employment_number" => trim($this->input->post('employment_number')),
            "kra_pin"           => trim($this->input->post('kra_pin')),
            "nssf"              => trim($this->input->post('nssf')),
            "nhif"              => trim($this->input->post('nhif')),
            "job_grade"         => trim($this->input->post('job_grade')),
            "joining_date"      => trim($this->input->post('joining_date')),
            "leaving_date"      => trim($this->input->post('leaving_date')),
            "marital_status"    => trim($this->input->post('marital_status')),
            "disability"        => trim($this->input->post('disability')),
            "basic_salary"      => trim($this->input->post('basic_salary')),
            "narrative"         => trim($this->input->post('narrative')),

            "paye"      => trim($this->input->post('paye')),
            "nssf_amount"      => trim($this->input->post('nssf_amount')),
            "nhif_amount"      => trim($this->input->post('nhif_amount')),
            "tax_relief_amount"      => trim($this->input->post('tax_relief_amount')),
            "insurance_relief_amount"      => trim($this->input->post('insurance_relief_amount')),

            "active"            => $active
        );
        $condition = array(
            "employee_id"  => $id
        );
        if($this->Inserts->update_data('employees', $form_data, $condition)){

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "update_staff",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'employee',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End


            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('staff/profile/'.$id), 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('staff/profile/'.$id), 'refresh');
        }
    }

    public function delete_staff($id){
        $this->permission_check('staff_delete');

        $data = array( "employee_id" => $id );
        $form_data = $this->db->where('employee_id',$id)->get('employees')->row();
        if($this->Deletes->delete_data('employees', $data)){

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_staff",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'employee',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End


            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/index', 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/index', 'refresh');
        }
    }
    #staff end


    #staff allowance start
    public function add_allowance($staffID) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "employee_id"       => $staffID,
            "allowance_id"      => trim($this->input->post('allowance_id')),
            "allowance_amount"  => trim($this->input->post('allowance_amount')),
            "is_one_time"       => trim($this->input->post('is_one_time')),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );
        if($this->Inserts->insert_data('employee_allowances', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_allowance($staffID, $allowanceID) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "allowance_id"      => trim($this->input->post('allowance_id')),
            "allowance_amount"  => trim($this->input->post('allowance_amount')),
            "is_one_time"       => trim($this->input->post('is_one_time')),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );
        $condition = array(
            "employee_allowance_id" => $allowanceID
        );
        if($this->Inserts->update_data('employee_allowances', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
    }
    public function delete_allowance($staffID, $allowanceID){
        $data = array( "employee_allowance_id" => $allowanceID );
        if($this->Deletes->delete_data('employee_allowances', $data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
    }
    #staff allowance end

    #staff deductible start
    public function add_deductible($staffID) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "employee_id"        => $staffID,
            "deductible_id"      => trim($this->input->post('deductible_id')),
            "deductible_amount"  => trim($this->input->post('deductible_amount')),
            "is_one_time"        => trim($this->input->post('is_one_time')),
            "narrative"          => trim($this->input->post('narrative')),
            "active"             => $active
        );
        if($this->Inserts->insert_data('employee_deductibles', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_deductible($staffID, $deductibleID) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "deductible_id"      => trim($this->input->post('deductible_id')),
            "deductible_amount"  => trim($this->input->post('deductible_amount')),
            "is_one_time"        => trim($this->input->post('is_one_time')),
            "narrative"          => trim($this->input->post('narrative')),
            "active"             => $active
        );
        $condition = array(
            "employee_deductible_id" => $deductibleID
        );
        if($this->Inserts->update_data('employee_deductibles', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
    }
    public function delete_deductible($staffID, $deductibleID){
        $data = array( "employee_deductible_id" => $deductibleID );
        if($this->Deletes->delete_data('employee_deductibles', $data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
    }
    #staff deductible end

    #staff bank details start
    public function add_bank($staffID) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "employee_id"       => $staffID,
            "bank_name"         => trim($this->input->post('bank_name')),
            "branch_name"       => trim($this->input->post('branch_name')),
            "branch_code"       => trim($this->input->post('branch_code')),
            "account_number"    => trim($this->input->post('account_number')),
            "active"            => $active
        );
        if($this->Inserts->insert_data('employee_bank_details', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_bank($staffID, $bankID) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "bank_name"         => trim($this->input->post('bank_name')),
            "branch_name"       => trim($this->input->post('branch_name')),
            "branch_code"       => trim($this->input->post('branch_code')),
            "account_number"    => trim($this->input->post('account_number')),
            "active"            => $active
        );
        $condition = array(
            "employee_bank_detail_id" => $bankID
        );
        if($this->Inserts->update_data('employee_bank_details', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
    }
    public function delete_bank($staffID, $bankID){
        $data = array( "employee_bank_detail_id" => $bankID );
        if($this->Deletes->delete_data('employee_bank_details', $data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('staff/profile/'.$staffID, 'refresh');
        }
    }
    #staff bank details end


   
    #=========================Reports Start====================>>>>>>>>>>>>>>><<<<<<<<<<<<<<
    public function staff_report () {
        $this->data['staff'] = $this->Staff_Model->staff();

        $this->load->library('pdf');
        $html = $this->load->view('reports/staff', $this->data, true);
        $this->pdf->createPDF($html, 'staff', false, 'A4', 'landscape');
    }

    #=========================Reports End====================>>>>>>>>>>>>>>><<<<<<<<<<<<<<

    






}