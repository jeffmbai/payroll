<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stations extends MY_Controller {

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
            $this->load->model('Inserts');
            $this->load->model('Deletes');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }


    /*** Start Index ***/
    public function index() {
        $this->data['page'] = 'Stations'; 

        $this->session->set_userdata('referred_from', current_url());

        $this->data['orgs'] = $this->Organization->organizations(); 
        $this->data['categories'] = $this->Majorselects->all_categories(); 
        
        if($_SESSION['superuser'] == 1) {
            $this->data['stations'] = $this->Stations_Model->all_stations(); 

            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/station/stations', $this->data);
            $this->load->view('inc/footer');
        } elseif($_SESSION['superuser'] != 1 && $_SESSION['userrole'] == 1) {
            $this->data['stations'] = $this->Stations_Model->select_org_stations($_SESSION['orgid']); 

            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/station/stations', $this->data);
            $this->load->view('inc/footer');
        }

    }
    /*** End Index ***/

    public function add_station () {
        #add_station
        $this->data['page'] = 'Stations'; 
        
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "station_name"      => trim($this->input->post('station_name')),
            "org_id"            => trim($this->input->post('org')),
            "category_id"       => trim($this->input->post('station_category')),
            "primary_phone"     => trim($this->input->post('primary_phone')),
            "secondary_phone"   => trim($this->input->post('secondary_phone')),
            "other_phone"       => trim($this->input->post('other_phone')),
            "primary_email"     => trim($this->input->post('primary_email')),
            "secondary_email"   => trim($this->input->post('secondary_email')),
            "other_email"       => trim($this->input->post('other_email')),
            "latitude"          => trim($this->input->post('latitude')),
            "longitude"         => trim($this->input->post('longitude')),
            "active"            => $active,
            "narrative"         => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('stations', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('stations/index'),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('stations/index'),'refresh');
        }
    }

    public function update_station ($id) {
        #update_station
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "station_name"      => trim($this->input->post('station_name')),
            "org_id"            => trim($this->input->post('org')),
            "category_id"       => trim($this->input->post('station_category')),
            "primary_phone"     => trim($this->input->post('primary_phone')),
            "secondary_phone"   => trim($this->input->post('secondary_phone')),
            "other_phone"       => trim($this->input->post('other_phone')),
            "primary_email"     => trim($this->input->post('primary_email')),
            "secondary_email"   => trim($this->input->post('secondary_email')),
            "other_email"       => trim($this->input->post('other_email')),
            "latitude"          => trim($this->input->post('latitude')),
            "longitude"         => trim($this->input->post('longitude')),
            "active"            => $active,
            "narrative"         => trim($this->input->post('narrative'))
        );
        $condition = array(
            "station_id"     => $id
        );
        if($this->Inserts->update_data('stations', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Information Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('stations/index'),'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('stations/index'),'refresh');
        }
    }

    public function delete($id) {
        #delete station
        $form_data = array(
            "station_id"   => $id
        );

        if($this->Deletes->delete_data('stations', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function org_stations () {
        #get org stations
        $data['stations'] = $this->Stations_Model->select_org_stations($_POST['data']);
        echo "<option value=''> Select Station </option>";
        foreach ($data['stations'] as $station) {
            ?>
            <option value="<?php echo $station->station_id;?>">  <?php echo $station->station_name;?>  </option>
            <?php
        }
    }



}