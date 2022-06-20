<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posale extends MY_Controller {

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        if( !isset($_SESSION['userrole']) || !isset($_SESSION['username']) ){
            //session is not set. cancel back to login page
            redirect(site_url('pages/pos_signin'));
        }
        else{
            #echo "Success";
            $this->role = $_SESSION['userrole'];
            $this->username = $this->session->userdata('username');
            
            $this->load->model('Majorselects');
            $this->load->model('Business_Model');
            $this->load->model('Users_Model');
            $this->load->model('Inserts');
            
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
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Dashboard';

        if(!isset($_SESSION['shop_id']))
            $_SESSION['shop_id'] = $this->db->where("default_sp", 'yes')->get("orgs")->row('org_id');

        $this->data['all_items'] = $this->Business_Model->all_items();
        $this->data['payment_modes'] = $this->db->where("is_paymentmode", 1)->get('vw_accounts')->result();
        $this->data['buyers'] = $this->Users_Model->business_users(4);
        $this->data['eating_tables'] = $this->Majorselects->all_eating_tables();

        //get the pos mode
        $pos = $this->db->where("org_id", $_SESSION['orgid'])->get("orgs")->row('pos_mode');        

        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/pos_header', $this->data);
            if($pos ==1) $this->load->view('business/pos_desktop', $this->data);
            else $this->load->view('business/pos', $this->data);
            $this->load->view('inc/footer');
        }
        else {
            #other users
            $this->load->view('inc/pos_header', $this->data);
            if($pos ==1) $this->load->view('business/pos_desktop', $this->data);
            else $this->load->view('business/pos', $this->data);
            $this->load->view('inc/footer');
        }

    }
    /*** End Index ***/ 

    public function sale_edit($id) {
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'Edit Sale ' . '#'.$id ;
        
        if(!isset($_SESSION['shop_id']))
            $_SESSION['shop_id'] = $this->db->where("default_sp", 'yes')->get("orgs")->row('org_id');

        $this->data['all_items'] = $this->Business_Model->all_items();
        $this->data['payment_modes'] = $this->db->where("is_paymentmode", 1)->get('vw_accounts')->result();
        $this->data['buyers'] = $this->Users_Model->business_users(4);
        $this->data['eating_tables'] = $this->Majorselects->all_eating_tables();

        $this->data['order_profile'] = $this->Majorselects->order_profile($id);
        $this->data['order_items'] = $this->Majorselects->order_items($id);

        $this->data['order_payments'] = $this->Business_Model->order_payments($id);

        $this->load->view('inc/pos_header', $this->data);
        $this->load->view('business/edit_pos', $this->data);
        $this->load->view('inc/footer');
    }

    /* Bar Start */
    public function bar() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'dashboard';

        $this->data['all_items'] = $this->Business_Model->all_items();
        $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['buyers'] = $this->Users_Model->business_users(4);
        $this->data['eating_tables'] = $this->Majorselects->all_eating_tables();

        $this->load->view('inc/pos_header', $this->data);
        $this->load->view('business/bar', $this->data);
        $this->load->view('inc/footer');

    }
    /* Bar End */

    


    public function receipt () {
         $this->load->library('pdf');
         $html = $this->load->view('reports/test', true);
         $this->pdf->createPDF($html, 'mypdf', false);
         $this->pdf->createPDF($html, 'mypdf');
    }



}
