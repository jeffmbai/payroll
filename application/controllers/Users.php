<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

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
            $this->load->model('Stations_Model');
            $this->load->model('Organization');
            $this->load->model('Majorselects');
            $this->load->model('Users_Model');
            $this->load->model('Inserts');
            $this->load->model('Deletes');
            $this->load->model('Auth_model');
            $this->load->model('Email');
            $this->load->model('Mailing');
            $this->load->model('Business_Model');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }


    /*** Start Index ***/
    public function index() {

        $this->data['page'] = 'Users';

        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Organization->organizations();
        //$this->data['all_users'] = $this->Users_Model->all_entitys();
        $this->data['all_users'] = $this->Users_Model->sys_users();        
        $this->data['stations'] = $this->Majorselects->stations();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/users/users', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/

    public function profile ($id) {
        #user profile
        $this->data['page'] = 'User Profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Organization->organizations();
        $this->data['all_users'] = $this->Users_Model->all_entitys();
        $this->data['this_user'] = $this->Users_Model->entity($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/users/user_profile', $this->data);
        $this->load->view('inc/footer');
    }

    public function delete($id) {
        //delete user
        if($this->db->delete('entitys',array("entity_id"=>$id))) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">User account deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('users/index'));
        }
        else {
            #data entry on registration failed
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Deletion failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('users/index'));
        }
    }

    ##User roles
    public function roles () {
        $this->data['page'] = 'User Roles';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['system_roles'] = $this->Majorselects->system_roles();

        if($_SESSION['superuser'] == 1) {
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/roles/index', $this->data);
            $this->load->view('inc/footer');
        }
    }
    ##customers start
    public function customers () {
        $this->data['page'] = 'Customers';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['business_users'] = $this->Users_Model->business_users(4);

        #var_dump($this->data['business_users']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/users/customers', $this->data);
        $this->load->view('inc/footer');
    }
    ##customers end

    ##suppliers start
    public function suppliers () {
        $this->data['page'] = 'Suppliers';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['business_users'] = $this->Users_Model->business_users(3);

        #var_dump($this->data['business_users']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/users/suppliers', $this->data);
        $this->load->view('inc/footer');
    }
    ##suppliers end


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
                "sub_department_id"=>  trim($this->input->post('sub_department')),
                "password"         =>  password_hash('jtl', PASSWORD_DEFAULT)
            );

            if($this->Auth_model->user_exist($form_data['email'], $form_data['phone'], $form_data['id_passport'])){
                $this->session->set_flashdata('alert', '<div class="alert alert-warning">User already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
            else {
                #insert data into db
                #data is already in session
                if($this->Auth_model->insert_user($form_data)) {
                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Account successfully created. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect(site_url('users/index'));
                }
                else {
                    #data entry on registration failed
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Registration failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect(site_url('users/index'));
                }

            }

        }
        else{
            #echo "Data Not Submitted";
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Data Not Submitted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('users/index'));
        }

    }

    public function add_supplier_customer ($role) {
        $email = trim($this->input->post('email'));
        $phone = trim($this->input->post('phone'));
        $id_passport = trim($this->input->post('id_passport'));
        $form_data = array(
            "firstname"        =>  trim($this->input->post('firstname')),
            "secondname"       =>  trim($this->input->post('secondname')),
            "lastname"         =>  trim($this->input->post('lastname')),
            "email"            =>  $email,
            "id_passport"      =>  $id_passport,
            "phone"            =>  $phone,
            "active"           =>  1,
            "super_user"       =>  0,
            "system_role"      =>  $role,
            "org_id"           =>  $_SESSION['orgid'],
            "sub_department_id"=>  1,
            "password"         =>  password_hash('jtl', PASSWORD_DEFAULT)
        );

        #check if user exists
        if($this->Auth_model->user_exist($email, $phone, $id_passport)){
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">User already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        if($this->Auth_model->insert_data('entitys', $form_data)) {
            #success
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Registration successful. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            #data entry on registration failed
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Registration failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function update_supplier_customer ($id) {
        $email = trim($this->input->post('email'));
        $phone = trim($this->input->post('phone'));
        $id_passport = trim($this->input->post('id_passport'));
        $form_data = array(
            "firstname"        =>  trim($this->input->post('firstname')),
            "secondname"       =>  trim($this->input->post('secondname')),
            "lastname"         =>  trim($this->input->post('lastname')),
            "email"            =>  $email,
            "id_passport"      =>  $id_passport,
            "phone"            =>  $phone
        );
        $condition = array ("entity_id" => $id);

        if($this->Inserts->update_data('entitys', $form_data, $condition)) {
            #success
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Details successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            #data entry on registration failed
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Process failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function register_user() {
        #gets the redirect link depending on the user carrying out this function
        $personalData  = null;
        $attachmentName = null;
        $attachmentPath = null;
        $userid = null;

        #generate activation code
        $permitted_chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $user_code          =  substr(str_shuffle($permitted_chars), 0, 50);
        $password           =  substr($user_code, 0, 6);
        $password_encrypt   =   password_hash($password, PASSWORD_DEFAULT);
        #encrypt code
        $code = password_hash($user_code, PASSWORD_DEFAULT);
        #site url
        $s_url = site_url('pages/email_verification/?e=');   
        $url_code = $s_url.''.$code;
        $activation_code = array(
            "activation_code" => $code
        );

        if($_GET['u'] == 'ncse-a') {
            #adding new patient/case
            $redirect_link = site_url('cases/new_case');
            #get patientID/ entityID
            $userid = $this->input->post('patient');
            $personal_info = array(
                "entity_id"    => $userid
            );
            #var_dump($_POST); exit();
        }
        elseif($_GET['u'] == 'ncse-b') {
            #registration one new case
            $redirect_link = site_url('cases/new_case');
            $user  = trim($this->input->post('system_role'));
            $email = trim($this->input->post('email'));
            $phone = trim($this->input->post('phone'));
            $id_passport = trim($this->input->post('id_passport'));
            if($user == 1) $entityname = 'System';
            if($user == 2) $entityname = 'Citizen';

            $personal_info = array(
                "entity_name"               =>  $entityname,
                "firstname"                 =>  trim($this->input->post('firstname')),
                "secondname"                =>  trim($this->input->post('secondname')),
                "lastname"                  =>  trim($this->input->post('lastname')),
                "email"                     =>  $email,
                "id_passport"               =>  $id_passport,
                "phone"                     =>  $phone,
                "dob"                       =>  trim($this->input->post('dob')),
                "gender"                    =>  trim($this->input->post('gender')),
                "active"                    =>  $this->input->post('active'),
                "status_id"                 =>  1,  #default
                "system_role"               =>  $user,
                "org_id"                    =>  1,
                "sub_department_id"         =>  1,
                "activation_code"           =>  $code,
                "password"                  =>  $password_encrypt,
                "contact_person_name1"      => trim($this->input->post('contact_person_name1')),
                "contact_person_phone1"     => trim($this->input->post('contact_person_phone1')),
                "contact_person_email1"     => trim($this->input->post('contact_person_email1')),
                "contact_person_address1"   => trim($this->input->post('contact_person_address1')),
                "contact_person_name2"      => trim($this->input->post('contact_person_name2')),
                "contact_person_phone2"     => trim($this->input->post('contact_person_phone2')),
                "contact_person_email2"     => trim($this->input->post('contact_person_email2')),
                "contact_person_address2"   => trim($this->input->post('contact_person_address2'))
            );
            #check if user exists
            if($this->Auth_model->user_exist($email, $phone, $id_passport)){
                $this->session->set_flashdata('alert', '<div class="alert alert-warning">User already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, 'refresh');
            }
            if($this->Auth_model->insert_data('entitys', $personal_info)) {
                #get userid
                $_SESSION['username'] = $email;
                foreach($this->Majorselects->get_user() as $ui) $userid = $ui->entity_id;
                #call verification_mail()
                $this->verification_mail($url_code, $email, $password, $userid, 'entitys');
            }
            else {
                #data entry on registration failed
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Registration failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, 'refresh');
            }
        }
        elseif($_GET['u'] == 'nusr-a') {
            #new user
            $redirect_link = site_url('users/index');
            $user  = trim($this->input->post('system_role'));
            $email = trim($this->input->post('email'));
            $phone = trim($this->input->post('phone'));
            $id_passport = trim($this->input->post('id_passport'));
            $entityname = null;
            if($user == 1) $entityname = 'System';
            if($user == 2) $entityname = 'Citizen';

            $pin1    = '0123456789';
            $pin2    =  substr(str_shuffle($pin1), 0, 50);
            $pin3    =  substr($pin2, 0, 4);

            $personal_info = array(
                "entity_name"               =>  $entityname,
                "pin"                       =>  $pin3,
                "firstname"                 =>  trim($this->input->post('firstname')),
                "secondname"                =>  trim($this->input->post('secondname')),
                "lastname"                  =>  trim($this->input->post('lastname')),
                "email"                     =>  $email,
                "id_passport"               =>  $id_passport,
                "phone"                     =>  $phone,
                "dob"                       =>  trim($this->input->post('dob')),
                "gender"                    =>  trim($this->input->post('gender')),
                "active"                    =>  $this->input->post('active'),
                "status_id"                 =>  1,
                "system_role"               =>  $user,
                "org_id"                    =>  trim($this->input->post('org')),
                "sub_department_id"         =>  trim($this->input->post('sub_department')),
                "activation_code"           =>  $code,
                "password"                  =>  $password_encrypt
                // "contact_person_name1"      => trim($this->input->post('contact_person_name1')),
                // "contact_person_phone1"     => trim($this->input->post('contact_person_phone1')),
                // "contact_person_email1"     => trim($this->input->post('contact_person_email1')),
                // "contact_person_address1"   => trim($this->input->post('contact_person_address1')),
                // "contact_person_name2"      => trim($this->input->post('contact_person_name2')),
                // "contact_person_phone2"     => trim($this->input->post('contact_person_phone2')),
                // "contact_person_email2"     => trim($this->input->post('contact_person_email2')),
                // "contact_person_address2"   => trim($this->input->post('contact_person_address2'))
            );
            #check if user exists
            if($this->Auth_model->user_exist($email, $phone, $id_passport)){
                $this->session->set_flashdata('alert', '<div class="alert alert-warning">User already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, 'refresh');
            }
            if($this->db->insert('entitys', $personal_info)) {
                #get userid
                //$_SESSION['username'] = $email;
                $userid = $this->db->insert_id();
                //foreach($this->Majorselects->get_user() as $ui) $userid = $ui->entity_id;
                #call verification_mail()
                $this->verification_mail($url_code, $email, $password, $userid, 'entitys');

                $this->session->set_flashdata('alert', '<div class="alert alert-success">User successfully created. Thank you. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, 'refresh');
            }
            else {
                #data entry on registration failed
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Registration failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, 'refresh');
            }
        }
        
        if($_GET['u'] == 'ncse-a' || $_GET['u'] == 'ncse-b') {
            #this should be adding a patient 
            #get the attachment
            $attachment = $_FILES["attachment"]["name"];
            $config['upload_path']   = './assets/files/patient_attachments/';
            $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx|jpg|png';
            $config['max_size']      = 1000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('attachment'))  {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'  <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, "refresh");
            }
            else {
                $upload_data     =   $this->upload->data();      #returns upload data
                $attachmentName  =   $upload_data['file_name'];  #get the file name
                $attachmentPath  =   $upload_data['full_path'];  #get the full path of the uploaded file
            }

            $patient_info = array(
                "org_id"            => 1,
                "station_id"        => trim($this->input->post('station')),
                "entity_id"         => $userid,
                "status_id"         => trim($this->input->post('status')),
                "initial_status"    => trim($this->input->post('status')),
                "start_date"        => trim($this->input->post('start_date')),
                "end_date"          => trim($this->input->post('end_date')),
                "created_by"        => $_SESSION['userid'],
                "active"            => trim($this->input->post('active')),
                "attachment_name"   => $attachmentName,
                "attachment_path"   => $attachmentPath,
                "narrative"         => trim($this->input->post('narrative'))
            );
            if($this->Inserts->insert_data('patients', $patient_info)) {
                #success
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Patient has been created reported and/or added successfully. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, 'refresh');
            }
            else {
                #data entry on registration failed
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Registration failed. Please try again or contact your administrator. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($redirect_link, 'refresh');
            }

        }
        
        
    print_r($data);

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



    public function user_info_update ($id) {
        #update user's basic information
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
                "system_role"      =>  $this->input->post('system_role'),
                "org_id"           =>  $this->input->post('org'),
                "sub_department_id"=>  $this->input->post('sub_department'),
                "password"         =>  password_hash('jtl', PASSWORD_DEFAULT)
            );
            $condition = array(
                "entity_id"     => $id
            );
        if($this->Inserts->update_data('entitys', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Information Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('users/profile/'.$id));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect(site_url('users/profile/'.$id));
        }
    }

    public function update_user_picture ($id) {
        #update user profile picture
        $file = $_FILES["profile_picture"]["name"];      #get the file name

        $config['upload_path']   = './assets/images/profile/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 400;
        $config['max_width']     = 400;
        $config['max_height']    = 400;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ( ! $this->upload->do_upload('profile_picture'))  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            redirect(site_url('users/profile/'.$id));
        }
        else $profile_picture = array('upload_data' => $this->upload->data());

        $form_data = array(
            "profile_picture" => $file
        );
        $condition = array(
            "entity_id"     => $id
        );
        if($this->Inserts->update_data('entitys', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Profile Picture Changed Successfully.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('users/profile/'.$id));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect(site_url('users/profile/'.$id));
        }
    }

    public function subdepartment_employees () {
        #get subdepartment_employees
        $subdepartmentID = $_POST['data'];
        $data['subdepartment_employees'] = $this->Users_Model->all_entitys();
        foreach ($data['subdepartment_employees'] as $entity) {
            if($subdepartmentID == $entity->sub_department_id) {
                ?>
                <option value="<?php echo $entity->entity_id;?>">  <?php echo $entity->firstname.' '.$entity->secondname.' '.$entity->lastname;?>  </option>
                <?php
            }
        }
    }

    #change user password
    public function change_password () {
        if(isset($_POST['change'])) {
            $password = trim($_POST['password']);
            $cpassword = trim($_POST['cpassword']);
            if($password != $cpassword) {
                //password does not match
                $this->session->set_flashdata('alert', '<div class="alert alert-warning">Password does not match. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            } else {
                //change password
                $form_data = array( "password" =>  password_hash($password, PASSWORD_DEFAULT) );
                $condition = array( "entity_id" => $_POST['userid'] );
                if($this->Inserts->update_data('entitys', $form_data, $condition)){
                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Password successfully changed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect($this->session->userdata('referred_from'));
                }
                else {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
                    redirect($this->session->userdata('referred_from'));
                }

            }
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Operation failed. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    #change_pin user
    public function change_pin () {
        if(isset($_POST['change'])) {
            $pin = trim($_POST['pin']);
                //change pin
                $form_data = array( "pin" =>  $pin );
                $condition = array( "entity_id" => $_POST['userid'] );
                if($this->Inserts->update_data('entitys', $form_data, $condition)){
                    $this->session->set_flashdata('alert', '<div class="alert alert-success">Pin successfully changed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                    redirect($this->session->userdata('referred_from'));
                }
                else {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
                    redirect($this->session->userdata('referred_from'));
                }
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Operation failed. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }


}