<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        $this->role = $_SESSION['userrole'];
        $this->username = $this->session->userdata('username');
        if( !isset($_SESSION['userrole']) || !isset($_SESSION['username']) ){
            //session is not set. cancel back to login page
            redirect(site_url('pages/logout'));
        }
        else{
            #echo "Success";
            $this->load->model('Organization');
            $this->load->model('Users_Model');
            $this->load->model('Stations_Model');
            $this->load->model('Majorselects');
            $this->load->model('Inserts');
            $this->load->model('Loan_Model');
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }


    /*** Start Index ***/
    public function index() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['orgs'] = $this->Organization->organizations();        
        $this->data['countries'] = $this->Majorselects->all_countries();
        $this->data['currencies'] = $this->Majorselects->all_currencies();
        $this->data['loans'] = $this->Loan_Model->loans();

        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/loan/loans', $this->data);
            $this->load->view('inc/footer');
        }

    }
    /*** End Index ***/

    public function new_loan () {
        #loan by admin
        $this->session->set_userdata('referred_from', current_url());

        $this->data['stations'] = $this->Stations_Model->all_stations();        
        $this->data['currencies'] = $this->Majorselects->all_currencies();
        $this->data['loan_type_category'] = $this->Loan_Model->loan_type_category();

        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/loan/new_loan', $this->data);
            $this->load->view('inc/footer');
        }
    }

    public function loan_details ($loanID) {
        #loan details
        $this->session->set_userdata('referred_from', current_url());

        $this->data['stations'] = $this->Stations_Model->all_stations();        
        $this->data['currencies'] = $this->Majorselects->all_currencies();
        $this->data['loan_type_category'] = $this->Loan_Model->loan_type_category();
        $this->data['individual_loans'] = $this->Loan_Model->individual_loans(null, $loanID);
        
        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/loan/loan_details', $this->data);
            $this->load->view('inc/footer');
        }
    }

    public function suspended_staff () {
        #loan details
        $this->session->set_userdata('referred_from', current_url());

        $this->data['orgs'] = $this->Organization->organizations();        
        $this->data['countries'] = $this->Majorselects->all_countries();
        $this->data['currencies'] = $this->Majorselects->all_currencies();
        $this->data['loans'] = $this->Loan_Model->loans();

        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/loan/suspended_staff', $this->data);
            $this->load->view('inc/footer');
        }
    }

    public function staff_loan_history ($staffID, $loanID) {
        #loan details
        $this->session->set_userdata('referred_from', current_url());

        $this->data['orgs'] = $this->Organization->organizations();        
        $this->data['countries'] = $this->Majorselects->all_countries();
        $this->data['currencies'] = $this->Majorselects->all_currencies();
        $this->data['entity'] = $this->Users_Model->entity($staffID);
        $this->data['individual_loans'] = $this->Loan_Model->individual_loans($staffID, null);
        $this->data['entity_total_loan'] = $this->Loan_Model->entity_total_loan($staffID);
        $this->data['entity_paid_loan'] = $this->Loan_Model->entity_paid_loan($staffID);
        $this->data['entity_unpaid_loan'] = $this->Loan_Model->entity_unpaid_loan($staffID);
        $this->data['entity_pending_loan'] = $this->Loan_Model->entity_pending_loan($staffID);

        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/loan/staff_loan_history', $this->data);
            $this->load->view('inc/footer');
        }
    }

    public function apply_loan () {
        #applying for a new loan
        $attachment = $_FILES["attachment"]["name"];      #get the file name
        $entity_id  = trim($this->input->post('sdemployee')); #get entity_id applying for loan

        $config['upload_path']   = './assets/files/loan_attachments/';
        $config['allowed_types'] = '|jpg|pdf|doc|docx|ppt|pptx';
        $config['max_size']      = 0;
       # $config['max_width']     = 800;
       # $config['max_height']    = 800;
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($attachment != '') {
            #upload attachment
            if (! $this->upload->do_upload('attachment'))  {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                redirect(site_url('loan/new_loan'));
            }
            else {
                $upload_data = $this->upload->data();              #returns upload data
                $file_name   =   $upload_data['file_name'];          #get the file name
                $file_path =   $upload_data['full_path'];   #get the full path of the uploaded file
            }
        }
        else {
            $file_name = null;
            $file_path = null;
            $attachment = null;
        }
        
        $form_data = array(
            "entity_id"              =>  $entity_id,
            "loan_type_category_id"  =>  trim($this->input->post('loan_type_category')),
            "currency_id"            =>  trim($this->input->post('currency')),
            "reference"              =>  trim($this->input->post('reference')),
            "release_date"           =>  trim($this->input->post('release_date')),
            "maturity_date"          =>  trim($this->input->post('maturity_date')),
            "principal"              =>  trim($this->input->post('applied_amount')),
            "applied_amount"         =>  trim($this->input->post('applied_amount')),
            "balance"                =>  trim($this->input->post('balance')),
            "loan_duration_type"     =>  trim($this->input->post('loan_duration_type')),
            "loan_duration"          =>  trim($this->input->post('loan_duration')),
            "repayment_cycle"        =>  trim($this->input->post('repayment_cycle')),
            "attachment"             =>  $file_name,
            "attachment_path"        =>  $file_path,
            "attachment_orginal_name"=>  $attachment,
            "loan_status"            => 'open',
            "narrative"              =>  trim($this->input->post('narrative'))
        );

        #get if user have unpaid loan
        $this->data['user_loans'] = $this->Loan_Model->individual_loans($entity_id, null);
        $arr_length = count($this->data['user_loans']);
        $cnt = 0;
        foreach($this->data['user_loans'] as $loans) {
            if($loans->loan_status == 'fully_paid') $cnt++; #loan fully paid
            $name = $loans->loanee_name;
            $org_id = $loans->org_id;
        }

        #echo "Arr: ".$arr_length."</br>";
        #echo "Count: ".$cnt."</br>";
        #var_dump($this->data['user_loans']); exit();

        if($cnt != $arr_length) {
            #notify to settle loan first: some loans haven't been settled
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Please settle the pending loans first for '.$name.'. Thank you. </div>');
            redirect(site_url('loan/new_loan'));
        }
        
        #create a new loan item
        if($this->Inserts->insert_data('loans', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Loan successfully applied. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('loan/new_loan'),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('loan/new_loan'),'refresh');
        }
    }
    


}