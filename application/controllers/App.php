<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        $this->load->model('Cases_Model');
        $this->load->model('App_Model');
        $this->load->model('Mailing');
        $this->load->model('Stations_Model');
        $this->load->model('Organization');
        $this->load->model('Majorselects');
        $this->load->model('Users_Model');
        $this->load->model('Inserts');
        $this->load->model('Deletes');
        $this->load->model('Auth_model');
        $this->load->model('Email');
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

    public function api ($action) {
        #the api gateway for all actions in the app
        $req = file_get_contents('php://input');
        if($req) {
            #
            if($action == null || empty($action)) {
                #wrong url error
                $resp = array("code" => "505", "message" => "URL_ERROR", "data" => null);
                echo json_encode($resp);
            }
            switch ($action) {
                case 1: #movement
                    if($this->entity_movement($req)){
                        $resp = array("code" => "100", "message" => "Success. Locations added", "data" => null);
                        echo json_encode($resp); exit();
                    } else {
                        $resp = array("code" => "500", "message" => "Sorry. Failed!", "data" => null);
                        echo json_encode($resp); exit();
                    }
                    break;
                    
                default:
                    #wrong url error
                    $resp = array("code" => "000", "message" => "HAPPY!!!", "data" => "");
                    echo json_encode($resp); exit();
            }
        } else{
            #must do a post
            $resp = array("code" => "505", "message" => "URL_ERROR", "data" => null);
            echo json_encode($resp);
        }
        
    }

    public function u_signin(){
        //signin authentication
        $req = file_get_contents('php://input');
        if($req) {
            $logins = json_decode($req);
            $username = $logins->username;
            $password = $logins->pwd;

            $signindata = array(
                'username'      =>$username,
                'password'      =>$password
            );

            $resp = null;

            #Send login data to authenticate and get response
            if($userdata = $this->Auth_model->can_login($signindata)) {
                if($userdata == 200) {
                    #email not verified. verify email account
                    $resp = array("code" => "200", "message" => "Verify your email first", "data" => null);
                    echo json_encode($resp); 
                    exit();
                }
                elseif($userdata == 400) {
                    #Wrong password
                    $resp = array("code" => "400", "message" => "wrong username or password", "data" => null);
                    echo json_encode($resp);
                    exit();
                }
                elseif($userdata == 300) {
                    #User does not exist
                    $resp = array("code" => "300", "message" => "user does not exist", "data" => null);
                    echo json_encode($resp);
                    exit();
                }
                else {
                    #signin successfull
                    $resp = array("code" => "100", "message" => "login successfull", "data" => $userdata);
                    echo json_encode($resp);
                    exit();
                }

            } else {
                #something went wrong
                $resp = array("code" => "500", "message" => "Sorry. Failed!", "data" => null);
                echo json_encode($resp);
                exit();
            }
        } else{
            #must do a post
            $resp = array("code" => "505", "message" => "URL_ERROR", "data" => null);
            echo json_encode($resp);
            exit();
        }

    }


    public function u_signup() {
        #gets the redirect link depending on the user carrying out this function
        $req = file_get_contents('php://input');
        if($req) {
            $signups = json_decode($req);

            $firstname  = $signups->firstname;
            $secondname = $signups->secondname;
            $lastname   = $signups->lastname;
            $email      = $signups->email;
            $id_passport= $signups->id_passport;
            $phone      = $signups->phone;
            $dob        = $signups->dob;
            $gender     = $signups->gender;
            $password   = $signups->password;

            $personalData  = null;

            #generate activation code
            $permitted_chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $user_code          =  substr(str_shuffle($permitted_chars), 0, 50);
            #encrypt code
            $code = password_hash($user_code, PASSWORD_DEFAULT);
            #site url
            $s_url = site_url('pages/email_verification/?e=');   
            $url_code = $s_url.''.$code;
            $activation_code = array(
                "activation_code" => $code
            );
            #encrypt password
            $password_encrypt   =   password_hash($password, PASSWORD_DEFAULT);

            $personal_info = array(
                "entity_name"               =>  "Citizen",
                "firstname"                 =>  $firstname,
                "secondname"                =>  $secondname,
                "lastname"                  =>  $lastname,
                "email"                     =>  $email,
                "id_passport"               =>  $id_passport,
                "phone"                     =>  $phone,
                "dob"                       =>  $dob,
                "gender"                    =>  $gender,
                "active"                    =>  1,  #true
                "status_id"                 =>  1,  #default
                "system_role"               =>  2,  #citizen
                "org_id"                    =>  1,  #default
                "sub_department_id"         =>  1,  #default
                "activation_code"           =>  $code,
                "password"                  =>  $password_encrypt,
                "contact_person_name1"      =>  null,
                "contact_person_phone1"     =>  null,
                "contact_person_email1"     =>  null,
                "contact_person_address1"   =>  null,
                "contact_person_name2"      =>  null,
                "contact_person_phone2"     =>  null,
                "contact_person_email2"     =>  null,
                "contact_person_address2"   =>  null
            );
            #check if user exists
            if($this->Auth_model->user_exist($email, $phone, $id_passport)){
                $resp = array("code" => "201", "message" => "User already exist", "data" => null);
                echo json_encode($resp); 
                exit();
            }
            if($this->Auth_model->insert_data('entitys', $personal_info)) {
                #get entity_data
                $userdata = $this->App_Model->specific_entity(null, $email);
                foreach($userdata as $ui) $userid = $ui->entity_id;
                #call verification_mail()
                // if($this->verification_mail($url_code, $email, $password, $userid, 'entitys')) {
                //     #email sent
                //     $resp = array("code" => "100", "message" => "Signup Success", "data" => $userdata);
                //     echo json_encode($resp); 
                //     exit();
                // } else {
                //     #email not sent
                //     $resp = array("code" => "100", "message" => "Signup Success, though Email Verification Send Failed.", "data" => $userdata);
                //     echo json_encode($resp); 
                //     exit();
                // }
                $resp = array("code" => "100", "message" => "Signup Success, though Email Verification Send Failed.", "data" => $userdata);
                echo json_encode($resp); 
                exit();
            }
            else {
                #data entry on registration failed
                $resp = array("code" => "500", "message" => "Sorry. Failed!", "data" => null);
                echo json_encode($resp); 
                exit();
            }
        } else{
            #must do a post
            $resp = array("code" => "505", "message" => "URL_ERROR", "data" => null);
            echo json_encode($resp); 
            exit();
        }

    }

    public function entity_movement($data) {
        #store movements
        $dt = json_decode($data);

        $userid = $dt->entity_id;
        $insert = "INSERT INTO movement_records (entity_id, org_id, latitude, longitude, date_time) VALUES ";
        #return $dt->points;
        $arr_length = count($dt->points);
        $x = 0;
        foreach($dt->points as $d) {
            $x++;
            if($x == $arr_length) {
                #don't attach the comma
                $insert .= "('".$userid."',1,'".$d->lat."','".$d->long."','".$d->time."')";
            } else {
                #attach comma
                $insert .= "('".$userid."',1,'".$d->lat."','".$d->long."','".$d->time."'),";
            }            
        }
        if($this->db->query($insert)) {
            return true;
        } else {
            return false;
        }
    }














    public function verification_mail($url_code, $email, $password, $userid, $table) {
        #send email verification for new registration
        $subject = "Account Details and Email Verification - KOMESHA CORONA";
        $body  = "You account has been successfully created with the Ministry of Kenya.<br>
                 You have received this email because you have an account created with us. If you are not aware 
                of this, then please ignore this email. You can click or copy and paste, into your browser, the link below to activate your account.<br><br>";
        $body .=$url_code.'<br>';
        $body .="<p><b>You account details include</b> </p>";
        $body .="<p><b>Username: </b>". $email ." </p> ";
        $body .="<p><b>Password: </b>". $password ." </p> ";
        $body .="<h5>Thank you</h5>";
        $body .="<small>For support, contact us via: ps@health.go.ke | +254-20-2717077 | Afya House, Cathedral Road, P.O. Box:30016–00100, Nairobi, Kenya. </small>";

        if($this->Mailing->send_email($email, $subject, $body)){
            #insert data into database
            $email_data = array(
                "org_id"            => 0,
                "sys_email_id"      => 1,
                "table_id"          => $userid,
                "table_name"        => $table,
                "emailed"           => true,
                "email_recipient"   => $email,
                "email_cc"          => null,
                "email_subject"     => $subject,
                "email_body"        => $body
            );
            $this->Inserts->insert_data('sys_emailed', $email_data);
            #echo Email Sent
            return true;
        }
        else {
            #insert data into database
            $email_data = array(
                "org_id"            => 0,
                "sys_email_id"      => 1,
                "table_id"          => $userid,
                "table_name"        => $table,
                "emailed"           => false,
                "email_recipient"   => $email,
                "email_cc"          => null,
                "email_subject"     => $subject,
                "email_body"        => $body
            );
            $this->Inserts->insert_data('sys_emailed', $email_data);
            #echo "Email NOT Sent";
            return false;
        }
    }

    



}