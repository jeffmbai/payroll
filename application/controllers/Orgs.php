<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orgs extends MY_Controller {

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
            $this->load->model('Majorselects');
            $this->load->model('Inserts');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }


    /*** Start Index ***/
    public function index() {
        $this->data['page'] = 'Organization';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['org'] = $this->Organization->org();        
        $this->data['countries'] = $this->Majorselects->all_countries();
        $this->data['currencies'] = $this->Majorselects->all_currencies();

        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/organizations/all_orgs', $this->data);
            $this->load->view('inc/footer');
        }

    }
    /*** End Index ***/


}