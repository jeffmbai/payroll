<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Systemroles extends MY_Controller {

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
            $this->load->model('System_Roles');
            $this->load->model('Majorselects');
            $this->load->model('Inserts');
            $this->load->model('Deletes');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }


    /*** Start Index ***/
    public function index() {
        //$this->permission_check('roles_view');

        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'System Roles'; 

        $this->data['roles'] = $this->System_Roles->all_roles();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/pewa/index', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/

    public function new_role () {
        //new role
        $this->permission_check('roles_add');
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'System Roles'; 

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/pewa/add_role', $this->data);
        $this->load->view('inc/footer');
    }

    public function edit_role ($id) {
        //edit role
        $id = $this->decryptStringArray($id); 

        $this->permission_check('roles_edit');
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'Edit Role'; 

        $this->data['role'] = $this->db->where('role_id', $id)->get('roles')->row(); 
        // echo $this->db->last_query();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/pewa/edit_role', $this->data);
        $this->load->view('inc/footer');
    }
    public function update_role ($id) {
        //update role
        $active = $this->input->post('active');
        if($active == '' || $active == null) $active = false;
        else $active = true;

        $perms = array();
        if(isset($_POST['permission'])) {
            foreach($_POST['permission'] as $key => $value) {
                //echo "$key is at $value".'<br/>';
                array_push($perms, $key);
            }
            $form_data = array(
                "role_name"       => trim($this->input->post('role_name')),
                "active"          => $active,
                "permission"      => json_encode($perms),
                "narrative"       => trim($this->input->post('narrative'))
            );
        } else {
            $form_data = array(
                "role_name"       => trim($this->input->post('role_name')),
                "active"          => $active,
                "narrative"       => trim($this->input->post('narrative'))
            );
        }          
        
        $condition = array ( "role_id" => $id);

        if($this->db->update('roles', $form_data, $condition)){

            //log trail start
            $trail_data = $form_data;
            $trail = array(
                'event_name' => "update_role",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'roles',
                'source_id' => $id,
                'narrative' => json_encode($trail_data),
                'task' => json_encode($trail_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //log trail end

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Role successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('systemroles/edit_role/'.$this->encryptStringArray($id)),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('systemroles/edit_role/'.$this->encryptStringArray($id)),'refresh');
        }
    }

    public function add_role () {
        #add_role
        $perms = array();
        $rolename = trim($this->input->post('role_name'));
        //find if role exists
        $qry = $this->db->where('role_name',$rolename)->get('roles')->num_rows();
        if($qry > 0) {
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">Sorry!!! Role With the similar name exists. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('systemroles/index'),'refresh');
        }

        $active = $this->input->post('active');
        if($active == '') $active = false;
        else $active = true;

        $perms = array();
        if(isset($_POST['permission'])) {
            foreach($_POST['permission'] as $key => $value) {
                //echo "$key is at $value".'<br/>';
                array_push($perms, $key);
            }
            $form_data = array(
                "role_name"       => trim($this->input->post('role_name')),
                "active"          => $active,
                "permission"      => json_encode($perms),
                "narrative"       => trim($this->input->post('narrative'))
            );
        } else {
            $form_data = array(
                "role_name"       => trim($this->input->post('role_name')),
                "active"          => $active,
                "narrative"       => trim($this->input->post('narrative'))
            );
        }  

        if($this->Inserts->insert_data('roles', $form_data)){

            //log trail start
            $trail_data = $form_data;
            $trail = array(
                'event_name' => "add_role",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'roles',
                'source_id' => $this->db->insert_id(),
                'narrative' => json_encode($trail_data),
                'task' => json_encode($trail_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //log trail end

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Role successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('systemroles/index'),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('systemroles/index'),'refresh');
        }
    }

    public function delete($id) {
        #delete role
        $id = $this->decryptStringArray($id);
        
        $this->permission_check('roles_delete');
        $form_data = array("role_id" => $id);
        $delete_data = $this->db->where('role_id',$id)->get('roles')->row();

        if($this->Deletes->delete_data('roles', $form_data)){

            //log trail start
            $trail_data = $delete_data;
            $trail = array(
                'event_name' => "delete_role",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'roles',
                'source_id' => $id,
                'narrative' => json_encode($trail_data),
                'task' => json_encode($trail_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //log trail end


            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('systemroles/index'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('systemroles/index'));
        }
    }








}