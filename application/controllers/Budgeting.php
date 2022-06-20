<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Budgeting extends MY_Controller {

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
            $this->load->model('Accounting_Model', 'accounting');
            $this->load->model('Budgeting_Model', 'budgeting');
            
            $this->data['active_user'] = $this->Majorselects->get_user();

            // $this->load->library('csvimport'); //old method to import
            $this->load->library('excel'); //new method to import
        }
    }

    public function home () {
        $this->permission_check('budget_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Budgeting';

        if(!isset($_SESSION['fsid']) || !isset($_SESSION['tmid'])) {
            $_SESSION['fsid'] = $_SESSION['fiscalyearid'];
            $_SESSION['tmid'] = $_SESSION['termid'];
        }

        $this->data['fiscal_years'] = $this->db->get('fiscal_years')->result();
        $this->data['year_months'] = $this->db->get('year_months')->result();
        $this->data['accounts'] = $this->db->where("account_type_id = 3 AND active = 1")->get('vw_accounts')->result();
        $this->data['budgets'] = $this->budgeting->budgets();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('budgeting/home', $this->data);
        $this->load->view('inc/footer');
    }

    public function get_budgets() {
        $_SESSION['fsid'] = $_POST['fsid'];
        $_SESSION['tmid'] = $_POST['tmid'];
        echo 'Success';
    }

    public function get_budget() {
        $id = $_POST['data'];
        $dt = $this->db->where('budget_id',$id)->get('budgeting')->row();

        $fiscal_years = $this->db->get('fiscal_years')->result();
        $year_months = $this->db->get('year_months')->result();
        $accounts = $this->db->where("account_type_id = 3 AND active = 1")->get('vw_accounts')->result();

        ?>
            <form action="<?php echo site_url('budgeting/update_budget/' . $dt->budget_id );?>" method="post">
                
                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <label for="">Budget Name <span class="text text-danger">*</span> </label>
                        <input type="text" name="budget_name" class="form-control" value="<?=$dt->budget_name?>" required />
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="">Person Responsible</label>
                        <select name="staff_id" class="select2 form-control" >
                            <option value=""> ~Select Staff~ </option>
                            <?php
                                $staffs = $this->db->where('active',1)->get('employees')->result();
                                foreach($staffs as $staff) {
                                    ?>
                                    <option value="<?=$staff->employee_id;?>" <?php if($staff->empoyee_id == $dt->staff_id) echo 'selected';?> > <?=$staff->last_name .' '.$staff->second_name.' '.$staff->first_name;?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <label for="">Budget Year <span class="text text-danger">*</span> </label>
                        <select class="form-control" name="fiscal_year_id" required >
                            <?php
                                foreach($fiscal_years as $fy) {
                                    ?>
                                        <option value="<?=$fy->fiscal_year_id?>"  <?php if($fy->fiscal_year_id == $dt->fiscal_year_id) echo 'selected';?>  > <?=$fy->fiscal_year_name?> </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="">Account Affected <span class="text text-danger">*</span> </label>
                        <select class="select2 form-control" name="account_id" required >
                            <?php
                                foreach($accounts as $acc) {
                                    ?>
                                        <option value="<?=$acc->account_id?>"  <?php if($acc->account_id == $dt->account_id) echo 'selected';?>  > <?=$acc->account_name?> </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <label for="">Term <span class="text text-danger">*</span> </label>
                        <select class="form-control" name="term_id" required >
                            <option value="1" <?php if($dt->term_id == 1) echo 'selected';?> >Term one</option>
                            <option value="2" <?php if($dt->term_id == 2) echo 'selected';?> >Term two</option>
                            <option value="3" <?php if($dt->term_id == 3) echo 'selected';?> >Term three</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label for="">Budget Amount <span class="text text-danger">*</span> </label>
                        <input type="text" name="budget_amount" class="form-control" value="<?=$dt->budget_amount?>" required />
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <label> Active </label>
                        <p>
                            <input type="checkbox" class="flat" value="1" name="active" <?php if($dt->active == 1) echo 'checked';?> >
                        </p>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <label for="">Narrative </label>
                        <textarea name="narrative" class="form-control" ><?=$dt->narrative?></textarea>
                    </div>

                    <div class="col-md-12" style="padding-top: 15px; margin-top: 15px;">
                        <button type="Submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                    </div>

                </div>
            </form>
        <?php

    }

    public function add_budget () {
        $this->permission_check('budget_add');

        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"                => $_SESSION['orgid'],
            "fiscal_year_id"        => trim($this->input->post('fiscal_year_id')),
            "term_id"               => trim($this->input->post('term_id')),
            "staff_id"              => trim($this->input->post('staff_id')),
            "account_id"            => trim($this->input->post('account_id')),
            "budget_name"           => trim($this->input->post('budget_name')),
            "budget_amount"         => trim($this->input->post('budget_amount')),
            "narrative"             => trim($this->input->post('narrative')),
            "active"                => $active
        );
        if($this->db->insert('budgeting', $form_data)){

            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "add_budget",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'budgeting',
                'source_id' => $this->db->insert_id(),
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Budget successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budgeting/home', 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budgeting/home', 'refresh');
        }
    }

    public function update_budget ($id) {
        $this->permission_check('budget_edit');

        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"                => $_SESSION['orgid'],
            "fiscal_year_id"        => trim($this->input->post('fiscal_year_id')),
            "term_id"               => trim($this->input->post('term_id')),
            "staff_id"              => trim($this->input->post('staff_id')),
            "account_id"            => trim($this->input->post('account_id')),
            "budget_name"           => trim($this->input->post('budget_name')),
            "budget_amount"         => trim($this->input->post('budget_amount')),
            "narrative"             => trim($this->input->post('narrative')),
            "active"                => $active
        );
        
        if($this->db->update('budgeting', $form_data, array("budget_id" => $id) )){
            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "update_budget",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'budgeting',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Budget successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budgeting/home', 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budgeting/home', 'refresh');
        }
    }

    public function delete_budget() {
        $id = $_POST['data'];
        $resp = array("resp"=>0, "message"=>"Action prohibited");

        $form_data = $this->db->where('budget_id',$id)->get('budgeting')->row();
        if($this->db->delete("budgeting", array("budget_id"=>$id))) {
            #Trail Start
            date_default_timezone_set('Africa/Nairobi');
            $trail = array(
                'event_name' => "delete_budget",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'budgeting',
                'source_id' => $id,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $resp = array("resp"=>1, "message"=>"Success! Budget deleted.");

            // $this->session->set_flashdata('alert', '<div class="alert alert-success">Success! Budget deleted.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect(site_url('budgeting/home'));
        } else {
            // $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect(site_url('budgeting/home'));
            $resp = array("resp"=>0, "message"=>"Failed! Try again later.");
        }
        echo json_encode($resp);
    }

    public function budget_journals ($id) {
        $this->data['page'] = "Budget Journals View";

        $dt = $this->budgeting->budget($id);
        $this->data['budget'] = $dt;
        $this->data['journals'] = $this->db->where("account_id = '$dt->account_id' AND voucher_type = 'dr' AND term_id = '$_SESSION[termid]' AND fiscal_year_id = '$dt->fiscal_year_id' ")->get('vouchers')->result();
        $this->load->view('budgeting/budgeting_journals', $this->data);
    }

    public function print () {
        $this->data['page'] = "Budget Print View";

        $dt = $this->budgeting->budgets();
        $this->data['budgets'] = $dt;
        $this->load->view('budgeting/budgeting_print', $this->data);
    }
    


    


}



