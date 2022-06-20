<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('Email');
    }

    public function signin_auth(){
        //signin authentication
        $signindata = array(
            'username'      =>$this->input->post('username'),
            'password'      =>$this->input->post('password')
        );

        #Send login data to authenticate and get response
        $userdata = $this->Auth_model->can_login($signindata);

        if($userdata == 200) {
           #email not verified. verify email account
           $this->session->set_flashdata('alert', '<div class="alert alert-warning">Verify your email first. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
           redirect(site_url('pages/signin'));
       }
       elseif($userdata == 400) {
           #Wrong password
           $this->session->set_flashdata('alert', '<div class="alert alert-danger">Wrong username or password.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
           redirect(site_url('pages/signin'));
       }
       elseif($userdata == 300) {
            #User does not exist
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">User does not exist. Please create an <a href="'.site_url('pages/register').'">account</a>.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pages/signin'));
       }
       else {
           #signin successfull
           //but check for licence. Only SA can be able to login
           if($this->check()) {
                $this->session->set_userdata($userdata);
                redirect(site_url('sys/index'));
           } else {
                if($userdata['userid'] == 1) {
                    $this->session->set_userdata($userdata);

                    $_SESSION['login'] = '<script>
                            $(function() {
                                success_sound();
                            });
                        </script>';

                    redirect(site_url('sys/index'));
                }
                else {
                    redirect( site_url('pages/signin') );
                }
           }
       }

    }

    public function pos_auth(){
        //signin authentication
        $signindata = trim($this->input->post('pin'));
        $wapi = $this->input->post('wapi');

        #Send login data to authenticate and get response
        $userdata = $this->Auth_model->can_login_pin($signindata);

        if($userdata == 200) {
            #email not verified. verify email account
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">Verify your email first. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pages/signin'));
        }
        elseif($userdata == 400) {
            #Wrong password
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Wrong username or password.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pages/signin'));
        }
        elseif($userdata == 300) {
             #User does not exist
             $this->session->set_flashdata('alert', '<div class="alert alert-warning">User does not exist. Please create an <a href="'.site_url('pages/register').'">account</a>.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
             redirect(site_url('pages/signin'));
        }
        else {
            #signin successfull
            //but check for licence. Only SA can be able to login
            if($this->check()) {
                 $this->session->set_userdata($userdata);
                 if($wapi == 1) {
                    #go to hotel
                    $_SESSION['wapi'] = '1';
                    redirect(site_url('posale/home'));
                } elseif($wapi == 2) {
                    #go to bar
                    $_SESSION['wapi'] = '2';
                    redirect(site_url('posale/bar'));
                }

            } else {
                 if($userdata['userid'] == 1) {
                     $this->session->set_userdata($userdata);
 
                     $_SESSION['login'] = '<script>
                            $(function() {
                                success_sound();
                            });
                        </script>';
 
                    if($wapi == 1) {
                        #go to hotel
                        $_SESSION['wapi'] = '1';
                        redirect(site_url('posale/home'));
                    } elseif($wapi == 2) {
                        #go to bar
                        $_SESSION['wapi'] = '2';
                        redirect(site_url('posale/bar'));
                    }
                 }
                 else {
                     redirect( site_url('posale/pos_signin') );
                 }
            }
        }
        

    }


    public function personal_info () {
        #personal_information

        if($_POST){
            $password =  trim($this->input->post('password'));
            $cpassword =  trim($this->input->post('cpassword'));
             if($password != $cpassword) {
                #password does not match
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Password does not match.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('pages/register'), 'refresh');
            }
            $form_data = array(
                "entity_name"       =>  'Seller',
                "first_name"        =>  trim($this->input->post('fname')),
                "second_name"       =>  trim($this->input->post('sname')),
                "last_name"         =>  trim($this->input->post('lname')),
                "email"             =>  trim($this->input->post('email')),
                "id_passport"       =>  trim($this->input->post('id_passport')),
                "phone"             =>  trim($this->input->post('pphone')),
                "dob"               =>  trim($this->input->post('dob')),
                "address_one"       =>  trim($this->input->post('paddress')),
                "gender"            =>  trim($this->input->post('gender')),
                "status_id"         =>  0,
                "system_role"       =>  1,
                "password"          =>  $password
            );

            $this->session->set_userdata($form_data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Personal information saved temporarily. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pages/register'), 'refresh');

        }
        else{
            #echo "Data Not Submitted";
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Data Not Submitted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('pages/register'), 'refresh');
        }
    }
         
    public function register () {
        #submit registration data

        if($_POST){
            #generate activation code
            $permitted_chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $user_code          =  substr(str_shuffle($permitted_chars), 0, 50);

            $active = trim($this->input->post('active'));
            if($active == '') $active = 0;
            $super_user = trim($this->input->post('super_user'));
            if($super_user == '') $super_user = 0;

            $form_data = array(
                "firstname"        =>  trim($this->input->post('firstname')),
                "secondname"       =>  trim($this->input->post('secondname')),
                "lastname"         =>  trim($this->input->post('lastname')),
                "email"            =>  trim($this->input->post('email')),
                "id_passport"      =>  trim($this->input->post('id_passport')),
                "phone"            =>  trim($this->input->post('phone')),
                "dob"              =>  trim($this->input->post('dob')),
                "gender"           =>  trim($this->input->post('gender')),
                "active"           =>  $active,
                "super_user"       =>  $super_user,
                "system_role"      =>  trim($this->input->post('system_role')),
                "org_id"           =>  trim($this->input->post('org')),
                "password"         =>  password_hash('jtl', PASSWORD_DEFAULT)
            );

    #var_dump($form_data); exit();

            if($this->Auth_model->user_exist($form_data['email'], $form_data['phone'], $form_data['id_passport'])){
                $this->session->set_flashdata('alert', '<div class="alert alert-warning">User already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
            else {
                #insert data into db
                #data is already in session
                if($this->Auth_model->insert_user($form_data)) {
                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Account successfully created. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect($this->session->userdata('referred_from'));
                }
                else {
                    #data entry on registration failed
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Registration failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect($this->session->userdata('referred_from'));
                }

            }

        }
        else{
            #echo "Data Not Submitted";
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Data Not Submitted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

    }



    public function resend_link() {

        if($this->Email->send_mail($this->session->userdata('useremail'), $this->session->userdata('firstname'), $this->session->userdata('verificationlik'))) {
            #email sent successfully
            #redirect to login
            $data = "Registration successful, verify your email";
            redirect(site_url('pages/index?msg='.$data));
            #should unset this session data
        }
        else {
            #contact us for support
            $this->session->unset_userdata('useremail'); $this->session->unset_userdata('firstname'); $this->session->unset_userdata('verificationlik');
            $data = "Sorry!!! Please contact our support team to help you in activate your CoC account";
            redirect(site_url('pages/index?msg='.$data));
        }
    }

    

}











