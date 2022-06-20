<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Budget extends MY_Controller {

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
            $this->load->model('Budget_Model');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

    #Budget start
    public function index() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['fiscal_years'] = $this->Majorselects->fiscal_years();
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['budgets'] = $this->Budget_Model->budgets();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('budget/index', $this->data);
        $this->load->view('inc/footer');

    } 
    public function add_budget() {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"                => trim($this->input->post('org_id')),
            "fiscal_year_id"        => trim($this->input->post('fiscal_year_id')),
            "budget_type"           => trim($this->input->post('budget_type')),
            "budget_total_amount"   => trim($this->input->post('budget_total_amount')),
            "budget_code"           => trim($this->input->post('budget_code')),
            "narrative"             => trim($this->input->post('narrative')),
            "active"                => $active
        );
        if($this->Inserts->insert_data('budget', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/index', 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/index', 'refresh');
        }
    }
    public function update_budget ($id) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"                => trim($this->input->post('org_id')),
            "fiscal_year_id"        => trim($this->input->post('fiscal_year_id')),
            "budget_type"           => trim($this->input->post('budget_type')),
            "budget_total_amount"   => trim($this->input->post('budget_total_amount')),
            "budget_code"           => trim($this->input->post('budget_code')),
            "narrative"             => trim($this->input->post('narrative')),
            "active"                => $active
        );
        $condition = array(
            "budget_id"     => $id
        );
        if($this->Inserts->update_data('budget', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/index', 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/index', 'refresh');
        }
    }
    public function delete($id){
        $data = array( "budget_id" => $id );
        if($this->Deletes->delete_data('budget', $data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/index', 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/index', 'refresh');
        }
    }
    
    #budget end


    #budget breakdown start
    public function budget_breakdown ($id) {
        $this->data['this_budget'] = $this->Budget_Model->this_budget($id);
        $this->data['vote_heads'] = $this->School_Model->vote_heads();
        $this->data['budget_breakdown'] = $this->Budget_Model->budget_breakdown($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('budget/budget_breakdown', $this->data);
        $this->load->view('inc/footer');
    }
    public function add_budget_breakdown($id) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "budget_id"             => $id,
            "vote_head_id"          => trim($this->input->post('vote_head_id')),
            "budget_amount"         => trim($this->input->post('budget_amount')),
            "narrative"             => trim($this->input->post('narrative')),
            "active"                => $active
        );
        if($this->Inserts->insert_data('budget_breakdown', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/budget_breakdown/'.$id, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/budget_breakdown/'.$id, 'refresh');
        }
    }
    public function update_budget_breakdown ($breakdownID, $budgetID) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "vote_head_id"          => trim($this->input->post('vote_head_id')),
            "budget_amount"         => trim($this->input->post('budget_amount')),
            "narrative"             => trim($this->input->post('narrative')),
            "active"                => $active
        );
        $condition = array( "budget_breakdown_id" => $breakdownID );
        if($this->Inserts->update_data('budget_breakdown', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/budget_breakdown/'.$budgetID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/budget_breakdown/'.$budgetID, 'refresh');
        }
    }
    public function delete_breakdown ($breakdownID, $budgetID) {
        $data = array( "budget_breakdown_id" => $breakdownID );
        if($this->Deletes->delete_data('budget_breakdown', $data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/budget_breakdown/'.$budgetID, 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect('budget/budget_breakdown/'.$budgetID, 'refresh');
        }
    }
    #budget breakdown end







}