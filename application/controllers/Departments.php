<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends MY_Controller {

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
            $this->load->model('Departments_Model');
            $this->load->model('Users_Model');
            $this->load->model('Majorselects');
            $this->load->model('Inserts');
            $this->load->model('Deletes');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }


    /*** Start Index ***/
    public function index() {

        $this->data['page'] = 'Department'; 

        $this->data['orgs'] = $this->Organization->organizations(); 
        $this->data['stations'] = $this->Stations_Model->all_stations(); 
        $this->data['departments'] = $this->Departments_Model->all_departments(); 

        if($_SESSION['superuser'] == 1) {
            $this->data['stations'] = $this->Stations_Model->all_stations(); 
        } elseif($_SESSION['superuser'] != 1 && $_SESSION['userrole'] == 1) {
            $this->data['stations'] = $this->Stations_Model->select_org_stations($_SESSION['orgid']); 
        }
        
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/departments/departments', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/

    public function add_department () {
        #add_department
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "department_name"   => trim($this->input->post('department_name')),
            "station_id"        => trim($this->input->post('station')),
            "org_id"            => trim($this->input->post('org')),
            "active"            => $active,
            "narrative"         => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('departments', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/index'),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/index'),'refresh');
        }
    }

    public function update_department ($id) {
        #update_department
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "department_name"   => trim($this->input->post('department_name')),
            "station_id"        => trim($this->input->post('station')),
            "org_id"            => trim($this->input->post('org')),
            "active"            => $active,
            "narrative"         => trim($this->input->post('narrative'))
        );
        $condition = array(
            "department_id"     => $id
        );
        if($this->Inserts->update_data('departments', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Information Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/index'),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/index'),'refresh');
        }
    }

    public function delete($id) {
        #delete department
        $form_data = array(
            "department_id"   => $id
        );

        if($this->Deletes->delete_data('departments', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/index'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/index'));
        }
    }

    public function sub_departments ($id) {
        #sub department
        $this->data['page'] = 'Sub-department'; 

        $this->data['orgs'] = $this->Organization->organizations(); 
        $this->data['stations'] = $this->Stations_Model->all_stations(); 
        $this->data['department'] = $this->Departments_Model->department($id);
        $this->data['sub_departments'] = $this->Departments_Model->sub_departments($id);
        
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/departments/sub_departments', $this->data);
        $this->load->view('inc/footer');
    }  

    public function add_sub_department ($dep_id, $org_id) {
        #add_sub_department
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "sub_department_name"   => trim($this->input->post('sub_department_name')),
            "department_id"         => $dep_id,
            "org_id"                => $org_id,
            "active"                => $active,
            "narrative"             => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('sub_departments', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/sub_departments/'.$dep_id),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/sub_departments/'.$dep_id),'refresh');
        }
    }

    public function update_sub_department ($sub_dep_id, $dep_id) {
        #edit_sub_department
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "sub_department_name"   => trim($this->input->post('sub_department_name')),
            "active"                => $active,
            "narrative"             => trim($this->input->post('narrative'))
        );
        $condition = array("sub_department_id"   => $sub_dep_id);

        if($this->Inserts->update_data('sub_departments', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/sub_departments/'.$dep_id),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/sub_departments/'.$dep_id),'refresh');
        }
    }

    public function delete_sub_department($sub_dep_id, $dep_id) {
        #delete sub department
        $form_data = array("sub_department_id"   => $sub_dep_id);

        if($this->Deletes->delete_data('sub_departments', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/sub_departments/'.$dep_id));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/sub_departments/'.$dep_id));
        }
    }

    public function departmental_heads ($dep_id) {

        $this->data['page'] = 'Department Heads';

        #departmental heads
        $this->data['departmental_heads'] = $this->Departments_Model->departmental_heads($dep_id, null); 
        $this->data['department'] = $this->Departments_Model->department($dep_id);
        $this->data['all_entitys'] = $this->Users_Model->all_entitys(); 
        
        if($_SESSION['superuser'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/departments/departmental_heads', $this->data);
            $this->load->view('inc/footer');
        }
    }

    public function add_departmental_head ($dep_id) {
        #add_departmental_head
        $active = $this->input->post('current');
        if($active == '') $active = 0;
        $form_data = array(
            "entity_id"         => $this->input->post('entity_id'),
            "department_id"     => $dep_id,
            "from_date"         => $this->input->post('date_from'),
            "to_date"           => $this->input->post('date_to'),
            "current"           => $active
        );

        if($this->Inserts->insert_data('departmental_heads', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/departmental_heads/'.$dep_id),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/departmental_heads/'.$dep_id),'refresh');
        }
    } 

    public function update_head ($dep_head_id, $dep_id) {
        #update_head
        $active = $this->input->post('current');
        if($active == '') $active = 0;
        $form_data = array(
            "entity_id"         => $this->input->post('entity_id'),
            "from_date"         => $this->input->post('date_from'),
            "to_date"           => $this->input->post('date_to'),
            "current"           => $active
        );

        $condition = array("departmental_head_id"   => $dep_head_id);

        if($this->Inserts->update_data('departmental_heads', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/departmental_heads/'.$dep_id),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('departments/departmental_heads/'.$dep_id),'refresh');
        }
    }




    public function station_departments () {
        #get stations departments
        $data['departments'] = $this->Departments_Model->select_station_departments($_POST['data']);
        echo "<option value=''> Select Department </option>";
        foreach ($data['departments'] as $department) {
            ?>
            <option value="<?php echo $department->department_id;?>">  <?php echo $department->department_name;?>  </option>
            <?php
        }
    }
    
    public function department_sub_departments () {
        #get department sub departments
        $data['sub_departments'] = $this->Departments_Model->select_sub_department($_POST['data']);
        echo "<option value=''> Select Sub Department </option>";
        foreach ($data['sub_departments'] as $sdepartment) {
            ?>
            <option value="<?php echo $sdepartment->sub_department_id;?>">  <?php echo $sdepartment->sub_department_name;?>  </option>
            <?php
        }
    }

    public function departments_subdepartments () {
        #get stations departments & sub_departments
        $data['sub_departments'] = $this->Departments_Model->department_subdepartment($_POST['data']);
        $control_department = null;
        $conn = null;
        foreach ($data['sub_departments'] as $sub_department) {
            if ($control_department !== $sub_department->department_name) {
                $control_department = $sub_department->department_name;
                $conn .= '<optgroup label="' . $control_department . '">';
            }
            $conn .= '<option value="' . $sub_department->sub_department_id . '"> ' . $sub_department->sub_department_name . ' </option>';
        }
        $conn .= '</optgroup>';
        echo $conn;
    }








}