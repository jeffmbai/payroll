<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debts extends MY_Controller {

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
            $this->load->model('Debt_Model');
            
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
        $this->data['page'] = 'Debts';   
        $this->session->set_userdata('referred_from', current_url());
        
        $from_date = date('d/m/Y');
        $to_date = date('d/m/Y');

        if(isset($_POST['from_date']) && isset($_POST['to_date'])) {
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];
        }

        $this->data['from_date'] = $from_date;
        $this->data['to_date'] = $to_date;

        $this->data['entity_with_debts'] = $this->Debt_Model->entity_with_debts($from_date, $to_date);          

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('debts/home', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/ 

}
