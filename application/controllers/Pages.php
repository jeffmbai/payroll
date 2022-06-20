<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->data['system'] = 'PoS';
    }


    public function logout(){
        $this->session->sess_destroy();
        redirect('pages/signin', 'refresh');
     }
    
     public function logout2(){
        $this->session->sess_destroy();
        $this->data['page'] = 'pos_login';
        $this->load->view('pos_login', $this->data);
 	}


    public function register() {
        $this->load->view('register');
    }

    public function signin() {
        #first destroy all sessions
         #var_dump($this->session->all_userdata()); exit();
        $this->session->sess_destroy();
        $this->data['page'] = 'Login';
        if( !$this->check() ) {
            $this->session->set_flashdata('alert', '<span class="text text-danger">Your licence has expired. Contact 0739698964 for assistance. </span>');
        }
        $this->load->view('signin', $this->data);
    }

     /*** Start POS Login ***/
     public function pos_signin() {
        $this->session->sess_destroy();
        $this->data['page'] = 'pos_login';
        $this->load->view('pos_login', $this->data);
    }
    /*** End POS Login ***/ 

    public function activate() {
        $this->data['page'] = 'Activate';
        if( !isset($_POST['code']) || !isset($_POST['activate']) ) {
            //load page
            $this->load->view('signin2', $this->data);
        } else {
            //
            $code = $_POST['code'];
            //password_verify($data['password'], $rw->password)

            $get = $this->db->select('*')->from('tlj')->where('id',1)->get()->row();
            if(password_verify($code, $get->column_two)) {
                //then update the active col
                $serial = password_hash(`wmic bios get serialnumber 2>&1`, PASSWORD_DEFAULT);

                $code3 = password_hash('0', PASSWORD_DEFAULT);
                $this->db->query("UPDATE tlj SET column_one = '$serial', column_three = '$code3' ");

                $this->session->set_flashdata('alert', '<span class="text text-success">System successfully activated.</span>');
                redirect(site_url('pages/activate'));
            } else {
                //fire error
                $this->session->set_flashdata('alert', '<span class="text text-danger">Wrong activation code. </span>');
                redirect(site_url('pages/activate'));
            }
        }
        
    }

    public function activate_days () {
        $this->data['page'] = 'Activate';
        //activate days
        if(isset($_POST['submit'])) {
            //update
            $days = trim($this->input->post('period'));
            $expiry_date = date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$days.' days'));
            $upd = $this->db->query(" UPDATE tlj SET column_six = '$expiry_date', column_seven = '$days' ");
            if($upd) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Information Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sys/index'));
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
                redirect(site_url('sys/index'));
            }
        } else {
            redirect($this->session->userdata('referred_from'));
        }
    }

}











