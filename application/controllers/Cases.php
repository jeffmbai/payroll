<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {

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
            $this->load->model('Cases_Model');
            $this->load->model('Stations_Model');
            $this->load->model('Organization');
            $this->load->model('Majorselects');
            $this->load->model('Users_Model');
            $this->load->model('Inserts');
            $this->load->model('Deletes');
            $this->load->model('Auth_model');
            $this->load->model('Email');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }


    /*** Start Index ***/
    public function index() {

        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Organization->organizations();
        $this->data['all_users'] = $this->Users_Model->all_entitys();
        $this->data['stations'] = $this->Majorselects->stations();

#var_dump($this->data['all_users']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/users/users', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/

    /*** Start New Case ***/
    public function new_case() {

        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Organization->organizations();
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/new_case', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End New Case ***/

    /*** Start +ve Cases ***/
    public function positive() {
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();
        $this->data['positive_cases'] = $this->Cases_Model->patient_cases(1);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/+ve_cases', $this->data);
        $this->load->view('inc/footer');
    }
    /*** End +ve Cases ***/
    /*** Start -ve Cases ***/
    public function negative() {
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();
        $this->data['negative_cases'] = $this->Cases_Model->patient_cases(2);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/-ve_cases', $this->data);
        $this->load->view('inc/footer');
    }
    /*** End -ve Cases ***/
    /*** Start isolation Cases ***/
    public function isolation() {
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();
        $this->data['isolation'] = $this->Cases_Model->patient_cases(3);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/isolation', $this->data);
        $this->load->view('inc/footer');
    }
    /*** End isolation Cases ***/
    /*** Start quarantine Cases ***/
    public function quarantine() {
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();
        $this->data['quarantine'] = $this->Cases_Model->patient_cases(5);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/quarantine', $this->data);
        $this->load->view('inc/footer');
    }
    /*** End quarantine Cases ***/
    /*** Start sample test Cases ***/
    public function sample_test() {
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();
        $this->data['sample_test'] = $this->Cases_Model->patient_cases(4);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/sample_test', $this->data);
        $this->load->view('inc/footer');
    }
    /*** End sample test Cases ***/
    /*** Start Survivor Cases ***/
    public function survivors() {
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();
        $this->data['survivors'] = $this->Cases_Model->patient_cases(6);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/survivors', $this->data);
        $this->load->view('inc/footer');
    }
    /*** End Survivor Cases ***/
    /*** End deaths Cases ***/
    public function deaths() {
        $this->data['stations'] = $this->Majorselects->stations();
        $this->data['status'] = $this->Majorselects->status();
        $this->data['all_cases'] = $this->Cases_Model->all_cases();
        $this->data['deaths'] = $this->Cases_Model->patient_cases(4);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/deaths', $this->data);
        $this->load->view('inc/footer');
    }
    /*** End deaths Cases ***/

    public function case_profile ($case_id) {
        #case profile
        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Organization->organizations();
        $this->data['case_profile'] = $this->Cases_Model->case_profile($case_id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('cases/case_profile', $this->data);
        $this->load->view('inc/footer');
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
                "sub_department_id"=>  trim($this->input->post('sub_department')),
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


}