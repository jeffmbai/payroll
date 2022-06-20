<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backups extends MY_Controller {

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
            $this->load->model('Deletes');
            $this->load->model('Stocks_Model');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

    /*** Start Index ***/
    public function index() {
        $this->data['page'] = 'Backups';  
        $this->permission_check('backup_view'); 
        
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_orgs'] = $this->Majorselects->all_orgs();

        if($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('backups/index', $this->data);
            $this->load->view('inc/footer');
        }

        date_default_timezone_set('Africa/Nairobi');
    }
    /*** End Index ***/  

    public function new_backup () {
        $this->permission_check('backup_add'); 

        $db_name1 = 'backup-on-'. date("Y-m-d-H-i-s") .'.sql';
        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';

        $this->load->dbutil();
        $config = array(     
            'format'      => 'zip',             
            'filename'    => $db_name1
        );

        $backup =& $this->dbutil->backup($config); 
        
        $save = './database/backups/'.$db_name;

        //insert into database
        $this->db->insert('db_backups', array("backup_name" => $db_name));
        $lastID = $this->db->insert_id();

        $this->load->helper('file');
        write_file($save, $backup); 
        $this->load->helper('download');
        //force_download($db_name, $backup);

        $trail = array(
            'event_name' => "add_backup",
            'operator' => $_SESSION['userid'],
            'username' => $_SESSION['username'],
            'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
            'source' => 'db_backups',
            'source_id' => $lastID,
            'narrative' => json_encode(array("backup_name" => $db_name)),
            'task' => json_encode(array("backup_name" => $db_name)),
            "start_time" => date('Y-m-d H:m:s')
        );
        $this->db->insert('sys_logs', $trail);

        $this->session->set_flashdata('alert', '<div class="alert alert-success">Backup created.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect(site_url('backups/index'));

    }

    public function delete($id) {
        $this->permission_check('backup_delete'); 

        $file = $this->db->where('id', $id)->get('db_backups')->row();
        $delete = $this->db->query("DELETE FROM db_backups WHERE id = '$id' ");
        if($delete) {

            unlink('./database/backups/' . $file->backup_name);

            $trail = array(
                'event_name' => "delete_backup",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'db_backups',
                'source_id' => $id,
                'narrative' => json_encode($file),
                'task' => json_encode($file),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);


            $this->session->set_flashdata('alert', '<div class="alert alert-success">Backup deleted.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Deletion failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    



    

    



}