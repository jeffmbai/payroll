<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submitform extends MY_Controller {

    var $my_data;

    function __construct()
    {
        parent::__construct();

        $this->load->model('Inserts');
        $this->load->model('Majorselects');
        #$this->load->model('Pos_Model');
        $this->load->model('Deletes');
    }


    public function pos_mode () {
        $qry = $this->db->query("UPDATE orgs SET pos_mode = '$_POST[pos_mode]' WHERE org_id = '$_SESSION[orgid]' ");
        if($qry) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Information Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }


    #################
    ### User profile starts
    ################

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
                "system_role"      =>  trim($this->input->post('system_role')),
                "org_id"           =>  trim($this->input->post('store')),
                "password"         =>  password_hash('jtl', PASSWORD_DEFAULT)
            );
            $condition = array(
                "entity_id"     => $id
            );
        if($this->Inserts->update_data('entitys', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Information Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
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
            redirect($this->session->userdata('referred_from'));
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
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    /* User Profile Ends */

       /* Fiscal Year Start */
   public function add_fiscal_year () {
    $active = $this->input->post('active');
    if($active == '') $active = 0;
    $form_data = array(
        "org_id"            => trim($this->input->post('org_id')),
        "fiscal_year_name"  => trim($this->input->post('fiscal_year_name')),
        "start_date"        => trim($this->input->post('start_date')),
        "end_date"          => trim($this->input->post('end_date')),
        "active"            => $active,
        "narrative"         => trim($this->input->post('narrative'))
    );

    if($this->Inserts->insert_data('fiscal_years', $form_data)){
        $insertID = $this->db->insert_id();
        if($active == 1) $this->db->query("UPDATE fiscal_years SET active =0 WHERE fiscal_year_id <> '$insertID'"); //make the rest of the fiscal years inactive

        $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
    else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
}
public function update_fiscal_year ($id) {
    #update fiscal year
    $active = $this->input->post('active');
    if($active == '') $active = 0;
    $form_data = array(
        "org_id"            => trim($this->input->post('org_id')),
        "fiscal_year_name"  => trim($this->input->post('fiscal_year_name')),
        "start_date"        => trim($this->input->post('start_date')),
        "end_date"          => trim($this->input->post('end_date')),
        "active"            => $active,
        "narrative"         => trim($this->input->post('narrative'))
    );
    $condition = array("fiscal_year_id" => $id );
    if($this->Inserts->update_data('fiscal_years', $form_data, $condition)){
        if($active == 1) $this->db->query("UPDATE fiscal_years SET active =0 WHERE fiscal_year_id <> '$id'"); //make the rest of the fiscal years inactive

        $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
    else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
}
/* Fiscal Year End */

    /* Attribute Start */
    public function add_attribute () {
        #add_attribute
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "attribute_name" => trim($this->input->post('attribute_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('attributes', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Attribute successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_attribute ($id) {
        #add_attribute
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "attribute_name" => trim($this->input->post('attribute_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array(
            "attribute_id"     => $id
        );
        if($this->Inserts->update_data('attributes', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    /* Attribute End */

   /* Brand Start */
   public function add_brand () {
        #add_brand
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "brand_name"     => trim($this->input->post('brand_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('brands', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_brand ($id) {
        #update_brand
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "brand_name"     => trim($this->input->post('brand_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array( "brand_id" => $id );
        if($this->Inserts->update_data('brands', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
   /* Brand End */

    /* Color Start */
    public function add_color () {
        $form_data = array( "color_name" => trim($this->input->post('color_name')) );

        if($this->Inserts->insert_data('colors', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_color ($id) {
        $form_data = array( "color_name"     => trim($this->input->post('color_name')), );
        $condition = array( "color_id" => $id );
        if($this->Inserts->update_data('colors', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_color ($id) {
        $condition = array( "color_id" => $id );
        if($this->Deletes->delete_data('colors', $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
   /* Color End */

   /* Eating Table Start */
   public function add_eating_table () {
    #add Eating Table
    $active = $this->input->post('active');
    if($active == '') $active = 0;
    $form_data = array(
        "org_id"            => trim($this->input->post('org_id')),
        "eating_table_name" => trim($this->input->post('eating_table_name')),
        "active"            => $active,
        "narrative"         => trim($this->input->post('narrative'))
    );

    if($this->Inserts->insert_data('eating_tables', $form_data)){
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
    else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
}
public function update_eating_table ($id) {
    #update Eating Table
    $active = $this->input->post('active');
    if($active == '') $active = 0;
    $form_data = array(
        "org_id"            => trim($this->input->post('org_id')),
        "eating_table_name" => trim($this->input->post('eating_table_name')),
        "active"            => $active,
        "narrative"         => trim($this->input->post('narrative'))
    );
    $condition = array( "eating_table_id" => $id );
    if($this->Inserts->update_data('eating_tables', $form_data, $condition)){
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
    else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
}
/* Eating Table End */

   /* Brand Model Start */
   public function add_brand_model() {
       #add brand-model
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"         => trim($this->input->post('org_id')),
            "brand_id"       => trim($this->input->post('brand_id')),
            "model_name"     => trim($this->input->post('model_name')),
            "reorder_level"  => trim($this->input->post('reorder_level')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('brand_models', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        
   }
   public function update_brand_model ($id) {
       #update update_brand_model
       $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "org_id"         => trim($this->input->post('org_id')),
            "brand_id"       => trim($this->input->post('brand_id')),
            "model_name"     => trim($this->input->post('model_name')),
            "reorder_level"  => trim($this->input->post('reorder_level')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array( "brand_model_id" => $id );

        if($this->Inserts->update_data('brand_models', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
   }
   /* Brand Model End */

   /* Package Types start */
   public function add_package_type() {
    #add package type
     $active = $this->input->post('active');
     if($active == '') $active = 0;
     $form_data = array(
         "package_type_name"    => trim($this->input->post('package_type_name')),
         "active"         => $active,
         "narrative"      => trim($this->input->post('narrative'))
     );

     if($this->Inserts->insert_data('package_types', $form_data)){
         $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
         redirect($this->session->userdata('referred_from'));
     }
     else {
         $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
         redirect($this->session->userdata('referred_from'));
     }
}
public function update_package_type ($id) {
    #update update_brand_model
    $active = $this->input->post('active');
     if($active == '') $active = 0;
     $form_data = array(
        "package_type_name"    => trim($this->input->post('package_type_name')),
        "active"         => $active,
        "narrative"      => trim($this->input->post('narrative'))
     );
     $condition = array ("package_type_id" => $id);

     if($this->Inserts->update_data('package_types', $form_data, $condition)){
         $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
         redirect($this->session->userdata('referred_from'));
     }
     else {
         $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
         redirect($this->session->userdata('referred_from'));
     }
}
   /* Package Types end */

   /* Unit Start */
   public function add_unit () {
        #add_unit
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "unit_name"     => trim($this->input->post('unit_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('units', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_unit ($id) {
        #update_unit
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "unit_name"     => trim($this->input->post('unit_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array(
            "unit_id"     => $id
        );
        if($this->Inserts->update_data('units', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
   /* Unit End */

   /* Country Start */
   public function add_country () {
        #country
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "name"           => trim($this->input->post('country_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('countries', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_country ($id) {
        #update country
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "name"           => trim($this->input->post('country_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array(
            "country_id"     => $id
        );
        if($this->Inserts->update_data('countries', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
   /* Country End */

   /* Currency Start */
   public function add_currency () {
        #currency
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "currency_code"  => trim($this->input->post('currency_code')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('currencies', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_currency ($id) {
        #update currency
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "currency_code"  => trim($this->input->post('currency_code')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array(
            "currency_id"     => $id
        );
        if($this->Inserts->update_data('currencies', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
   /* Currency End */

   /* Tax Types Start */
   public function add_tax_type () {
        #tax_type
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "tax_type_name"  => trim($this->input->post('tax_type')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('tax_types', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_tax_type ($id) {
        #update tax_type
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "tax_type_name"  => trim($this->input->post('tax_type')),
            "tax_rate"       => trim($this->input->post('tax_rate')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array(
            "tax_type_id"     => $id
        );
        if($this->Inserts->update_data('tax_types', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
   /* Tax Types End */

   /* Category Start */
   public function add_category () {
        #category
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "cat_name"       => trim($this->input->post('cat_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );

        if($this->Inserts->insert_data('categories', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_category ($id) {
        #update category
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array(
            "cat_name"       => trim($this->input->post('cat_name')),
            "active"         => $active,
            "narrative"      => trim($this->input->post('narrative'))
        );
        $condition = array(
            "cat_id"     => $id
        );
        if($this->Inserts->update_data('categories', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
   /* Category End */

   /* Orgs Start */
   public function add_org_main() {
        #add org
        if($this->input->post('active') != null) $active = $this->input->post('active');
        else $active = 0;
        $form_data = array (
            "org_name"          => trim($this->input->post('name')),
            "address"           => trim($this->input->post('address')),
            "email"             => trim($this->input->post('email')),
            "phone"             => trim($this->input->post('phone')),
            "country_id"        => $this->input->post('country'),
            "currency_id"       => $this->input->post('currency'),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active,
        );
        if($this->db->insert('orgs', $form_data)){
            $orgid = $this->db->insert_id(); //get org_id
            //insert a default station
            $this->db->query("INSERT INTO stations (org_id, station_name) VALUES ('$orgid','Default')");
            $statid = $this->db->insert_id(); //get station_id
            //create a default department
            $this->db->query("INSERT INTO departments (org_id, station_id, department_name) VALUES ('$orgid','$statid', 'Default')");
            $depid = $this->db->insert_id(); //get department_id
            //create a default sub_department
            $this->db->query("INSERT INTO sub_departments (org_id, department_id, sub_department_name) VALUES ('$orgid','$depid', 'Default')");

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function add_org() {
        #add org/ store
        $parent_org = null;
        if(isset($_POST['org_id'])) {
            $parent_org = $_POST['org_id'];
        }

        if($this->input->post('active') != null) $active = $this->input->post('active');
        else $active = 0;
        $form_data = array (
            "parent_org"        => $parent_org,
            "org_name"          => trim($this->input->post('name')),
            "address"           => trim($this->input->post('address')),
            "email"             => trim($this->input->post('email')),
            "phone"             => trim($this->input->post('phone')),
            "country_id"        => $this->input->post('country'),
            "currency_id"       => $this->input->post('currency'),
            "narrative"         => trim($this->input->post('narrative')),
            "default_sp"        => $_POST['default_sp'],
            "active"            => $active
        );
        if($this->Inserts->insert_data('orgs', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_org($id) {
        #update org/ store
        $parent_org = null;
        if(isset($_POST['org_id'])) {
            $parent_org = $_POST['org_id'];
        }

        $default_sp = $_POST['default_sp'];
        if($default_sp == 'yes') {
            // make the rest of the stores inactive
            $this->db->update('orgs', array('default_sp'=>'no'));
        }

        if($this->input->post('active') != null) $active = $this->input->post('active');
        else $active = 0;
        $form_data = array (
            "parent_org"        => $parent_org,
            "org_name"          => trim($this->input->post('name')),
            "address"           => trim($this->input->post('address')),
            "box_number"        => trim($this->input->post('box_number')),
            "email"             => trim($this->input->post('email')),
            "phone"             => trim($this->input->post('phone')),
            "country_id"        => $this->input->post('country'),
            "currency_id"       => $this->input->post('currency'),
            "narrative"         => trim($this->input->post('narrative')),
            "mpesa_details"     => $this->input->post('mpesa_details'),
            "default_sp"        => $_POST['default_sp'],
            "pos_mode"          => $_POST['pos_mode'],
            "kra_pin"           => $_POST['kra_pin'],
            "vat_no"            => $_POST['vat_no'],
            "organization_type" => $_POST['organization_type'],
            "active"            => $active
        );
        $condition = array( "org_id" => $id );
        if($this->db->update('orgs', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    /* Orgs End */

   /* Item Start */
    public function add_item () {
        #add seller product
        $file = $_FILES["image"]["name"];      #get the file name
        if($file != '') {
            #if a file is uploaded
            $config['upload_path']   = './assets/images/items/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']      = 1024;
            $config['max_width']     = 1000;
            $config['max_height']    = 1000;
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('image'))  {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'  <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
            else {
                $upload_data     =   $this->upload->data();      #returns upload data
                $file            =   $upload_data['file_name'];  #get the file name
                $attachmentPath  =   $upload_data['full_path'];  #get the full path of the uploaded file
            }
        }
        else {
            #asign image default image
            $file = 'default.png';
        }

        $active = $this->input->post('active');
        if($active == '') $active = 0;

        #for sale
        $for_sale = $this->input->post('for_sale');
        if($for_sale == '') $for_sale = 0;

        #for purchase
        $for_purchase = $this->input->post('for_purchase');
        if($for_purchase == '') $for_purchase = 0;

        $form_data = array(
            "item_name"      => trim($this->input->post('itemname')),
            "org_id"         => $this->input->post('org_id'),
            // "category_id"    => json_encode($this->input->post('category_id')),
            "category_id"    => $this->input->post('category_id'),
            "unit_id"        => trim($this->input->post('unit_id')),
            "brand_id"       => trim($this->input->post('brand_id')),
            #"brand_model_id" => trim($this->input->post('brand_model_id')),
            "attribute_id"   => json_encode($this->input->post('attribute_id')),
            "tax_type_id"    => trim($this->input->post('tax_type_id')),
            #"package_type_id"=> trim($this->input->post('package_type_id')),
            #"model_year"     => trim($this->input->post('model_year')),
            #"ship_number"    => trim($this->input->post('ship_number')),
            "buying_price"   => trim($this->input->post('buying_price')),
            "marked_price"   => trim($this->input->post('marked_price')),
            #"imei_one"       => trim($this->input->post('imei_one')),
            #"imei_two"       => trim($this->input->post('imei_two')),
            #"capacity"       => trim($this->input->post('capacity')),
            "color_id"        => trim($this->input->post('color_id')),
            "barcode"        => trim($this->input->post('barcode')),
            "image"          => $file,
            "for_sale"       => trim($this->input->post('for_sale')),
            "for_purchase"   => trim($this->input->post('for_purchase')),
            "for_bar"        => trim($this->input->post('for_bar')),
            "narrative"      => trim($this->input->post('narrative')),
            "availability"   => trim($this->input->post('availability')),
            "available_qty"  => trim($this->input->post('available_qty')),
            "reorder_level"  => trim($this->input->post('reorder_level')),
            "active"         => $active
        );

        if($this->db->insert('items', $form_data)){
            $barcode = 'PROD_';
            $insertID = $this->db->insert_id();
            $barcode = 'PROD_'.str_pad($insertID, 4, '0', STR_PAD_LEFT); 
            $this->db->update('items', array('barcode'=>$barcode), array('item_id'=>$insertID));

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Product successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect($this->session->userdata('referred_from'));
            redirect(site_url('sys/items'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_item ($id) {
        #update seller item/product

        $active = $this->input->post('active');
        if($active == '') $active = 0;

        $form_data = array(
            "item_name"      => trim($this->input->post('itemname')),
            "org_id"         => $this->input->post('org_id'),
            // "category_id"    => json_encode($this->input->post('category_id')),
            "category_id"    => $this->input->post('category_id'),
            "unit_id"        => trim($this->input->post('unit_id')),
            "brand_id"       => trim($this->input->post('brand_id')),
            #"brand_model_id" => trim($this->input->post('brand_model_id')),
            "attribute_id"   => json_encode($this->input->post('attribute_id')),
            "tax_type_id"    => trim($this->input->post('tax_type_id')),
            #"package_type_id"=> trim($this->input->post('package_type_id')),
            #"model_year"     => trim($this->input->post('model_year')),
            #"ship_number"    => trim($this->input->post('ship_number')),
            "buying_price"   => trim($this->input->post('buying_price')),
            "marked_price"   => trim($this->input->post('marked_price')),
            "for_sale"       => trim($this->input->post('for_sale')),
            "for_purchase"   => trim($this->input->post('for_purchase')),
            "for_bar"        => trim($this->input->post('for_bar')),
            #"imei_one"       => trim($this->input->post('imei_one')),
            #"imei_two"       => trim($this->input->post('imei_two')),
            #"capacity"       => trim($this->input->post('capacity')),
            "color_id"        => trim($this->input->post('color_id')),
            "barcode"        => trim($this->input->post('barcode')),
            "narrative"      => trim($this->input->post('narrative')),
            "availability"   => trim($this->input->post('availability')),
            "available_qty"  => trim($this->input->post('available_qty')),
            "reorder_level"  => trim($this->input->post('reorder_level')),
            "active"         => $active
        );
        $condition = array( "item_id" => $id );
        if($this->Inserts->update_data('items', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Item successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_store_qty () {
        //update the item store qty
        $item_id = $_POST['item_id'];
        $item_store_id = $_POST['item_store_id'];
        $available_qty = $_POST['available_qty'];
        if( $this->db->update( "items_store",array("available_qty"=>$available_qty), array("item_store_id"=>$item_store_id) ) ) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Success! Item store quantity updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/item_profile/'.$item_id));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/item_profile/'.$item_id));
        }
    }
    public function delete_store_item($item_id, $item_store_id) {
        if($this->db->delete( "items_store", array("item_store_id"=>$item_store_id) )) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Store item deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/item_profile/'.$item_id));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/item_profile/'.$item_id));
        }
    }
    public function update_item_image ($id) {
        #update item profile picture
        $file = $_FILES["image"]["name"];      #get the file name

        $config['upload_path']   = './assets/images/items/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 1000;
        $config['max_width']     = 1000;
        $config['max_height']    = 1000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image'))  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'  <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $upload_data     =   $this->upload->data();      #returns upload data
            $file            =   $upload_data['file_name'];  #get the file name
            $attachmentPath  =   $upload_data['full_path'];  #get the full path of the uploaded file
        }

        $form_data = array( "image" => $file );
        $condition = array( "item_id" => $id );
        if($this->Inserts->update_data('items', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Profile Picture Changed Successfully.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

     /* Item End */

    /* Order Start */
    function new_order() {
        #get the person making the order
        $supplierID = null;
        $transactionType = 1; #default is cash sale
        $paidStatus = 0; #defult is: not paid

        if(isset($_GET['od'])){
            if($_GET['od'] == 2) {
                #cashier making order
                $transactionType = 1;
                $paidStatus = 1;
            } elseif($_GET['od'] == 3) {
                #supplier order
            } elseif($_GET['od'] == 3) {
                #buyer order
            }
        }

        #generate the code
        $day = date('d');
        $permitted_chars    = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_code        =  substr(str_shuffle($permitted_chars), 0, 10);
        #get last order id
        $data['last_order'] = $this->Majorselects->last_order();
        $last_order = null;
        foreach($data['last_order'] as $lh_id) $last_order = $lh_id->order_id;

        $code = 'J' . $day. 'I' . $last_order . $random_code;

        $code = substr($code, 0, 10); #get the final code to a string of 10 characters
        #End of code generation

        $form_data = array(
            "bill_no"             => $code,
            "org_id"              => $_SESSION['orgid'],
            "entity_id"           => $_SESSION['userid'],
            "transaction_type_id" => $transactionType,
            "supplier_id"         => $supplierID,
            "customer_name"       => trim($this->input->post('customername')),
            "customer_phone"      => trim($this->input->post('customerphone')),
            "customer_address"    => trim($this->input->post('customeraddress')),
            "tax_charge"          => $this->input->post('itemstax'),
            "date_time"           => date('Y-m-d'),
            "net_amount"          => $this->input->post('total'),
            "paid_status"         => $paidStatus
        );

#var_dump($form_data); exit();

        if($this->Inserts->insert_data('orders',$form_data)) {
            #get the order id
            $data['order_id'] = $this->Majorselects->order_id($code);
            foreach($data['order_id'] as $nlh_id) $order_id = $nlh_id->order_id;
            $arrLength = COUNT($_POST['item']);

            for($lp = 0; $lp < $arrLength; $lp++) {
                $order_id = $order_id;
                $item_id  = $_POST['item'][$lp];
                $qty      = $_POST['qty'][$lp];
                $tax      = $_POST['tax'][$lp];
                $rate     = $_POST['rate'][$lp];
                $amount   = $_POST['amount'][$lp];
                $query="insert into order_items (order_id, item_id, qty, tax_id, rate, amount)
                        values ('$order_id','$item_id','$qty','$tax','$rate','$amount')";

                    if(!$this->db->query($query)) {
                        #first delete the initial header inserted
                        $delete1 = array(
                            "reference" => $code
                        );
                        $delete2 = array(
                            "order_id" => $order_id
                        );
                        $this->Deletes->delete_data('orders', $delete1);
                        $this->Deletes->delete_data('order_items', $delete2);
                        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! The transaction has failed. Please try again.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                        redirect($this->session->userdata('referred_from'));
                    }

                }
            
            #generate the receipt
            #$this->pos_receipt($order_id);

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Transaction Completed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/trans/'.$order_id), 'refresh');
        }
        else {
            #order not created
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Order not created. Please try again. Thank you.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

    }

    function update_order($order_id) {
        if($_POST) var_dump($_POST);

        $form_data = array(
            "customer_name"       => trim($this->input->post('customername')),
            "customer_phone"      => trim($this->input->post('customerphone')),
            "customer_address"    => trim($this->input->post('customeraddress')),
            "tax_charge"          => $this->input->post('itemstax'),
            "net_amount"          => $this->input->post('total'),
            "paid_status"         => $this->input->post('order_status'),
            "entity_id"           => $_SESSION['userid']
        );

#var_dump($form_data);
        $condition1 = array(
            "order_id"  => $order_id
        );
        if($this->Inserts->update_data('orders',$form_data, $condition1)) {
            #delete order items then insert new onces. This helps in updating the exact number of order items
            $delete="DELETE FROM order_items WHERE order_id = '$order_id' ";
            if(!$this->db->query($delete)) {
                #order items not updated
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Order items not updated. Please try again. Thank you. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }

            $arrLength = COUNT($_POST['item']);

            for($lp = 0; $lp < $arrLength; $lp++) {
                $order_id = $order_id;
                $item_id  = $_POST['item'][$lp];
                $qty      = $_POST['qty'][$lp];
                $tax      = $_POST['tax'][$lp];
                $rate     = $_POST['rate'][$lp];
                $amount   = $_POST['amount'][$lp];
                $query="INSERT INTO order_items (order_id, item_id, qty, tax_id, rate, amount)
                        VALUES ('$order_id','$item_id','$qty','$tax','$rate','$amount')";

                    if(!$this->db->query($query)) {
                        #first delete the initial header inserted
                        $delete1 = array(
                            "reference" => $code
                        );
                        $delete2 = array(
                            "order_id" => $order_id
                        );
                        $this->Deletes->delete_data('orders', $delete1);
                        $this->Deletes->delete_data('order_items', $delete2);
                        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! The transaction has failed. Please try again. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                        redirect($this->session->userdata('referred_from'));
                    }

                #update stock qty if status is paid
                $update_stock = "UPDATE items SET availability = availability - '$qty' WHERE item_id = '$item_id' ";
                if($this->input->post('order_status') == 1) $this->db->query($update_stock);

                }

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Order Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            #order not created
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Order not created. Please try again. Thank you. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

    }

    /* Order END */


    /* Store Start */
    public function move_stock() {
        #move stock from store to store
        var_dump($_POST);
        $from_org = $this->input->post('org_id1');
        $to_org = $this->input->post('org_id2');
        $item_id1 = $this->input->post('item_id1');
        $item_id2 = $this->input->post('item_id2');
        $availability = $this->input->post('availability');
        #subtract from items from first the add to
        $query1 = "UPDATE items SET availability = availability - '$availability'
                    WHERE item_id = '$item_id1' AND org_id = '$from_org' ";
        $query2 = "UPDATE items SET availability = availability + '$availability'
                    WHERE item_id = '$item_id2' AND org_id = '$to_org' ";
        if($this->db->query($query1)){
            if($this->db->query($query2)) {
                # successful
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Stock successfully transfered/moved.</div>');
                redirect($this->session->userdata('referred_from'));
            }
            else {
                #roleback transaction first
                $query1 = "UPDATE items SET availability = availability + '$availability'
                            WHERE item_id = '$item_id1' AND org_id = '$from_org' ";
                $this->db->query($query1);
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Transfer process two failed. Please try again. Thank you.</div>');
                redirect($this->session->userdata('referred_from'));
            }

        }
        else {
            #failed
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Transfer  process one failed. Please try again. Thank you.</div>');
            redirect($this->session->userdata('referred_from'));
        }

    }
    /* Store END */


    public function pos_receipt ($id) {
        $this->my_data['order_profile'] = $this->Majorselects->order_profile($id);
        $this->my_data['order_items'] = $this->Majorselects->order_items($id);

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            "order_items"  => $this->my_data['order_items']
        );

    #var_dump($this->my_data['order_items']); exit();
        
        $this->load->library('pdf');
        $html = $this->load->view('reports/pos_receipt', $merger, true);
        $this->pdf->createPDF($html, 'mypdf', false);
        $this->pdf->createPDF($html, 'mypdf');
   }



   #===========================================================================================
   #
   #
   #
   #==========================================ROLES============================================
   public function add_role () {
    $active = $this->input->post('active');
    if($active == '') $active = 0;
    $form_data = array(
        "role_name"     => trim($this->input->post('role_name')),
        "active"        => $active
    );

    if($this->Inserts->insert_data('roles', $form_data)){
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
    else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
   }
   public function update_role ($id) {
    $active = $this->input->post('active');
    if($active == '') $active = 0;
    $form_data = array(
        "role_name"     => trim($this->input->post('role_name')),
        "active"        => $active
    );
    $condition = array( "role_id" => $id );

    if($this->Inserts->update_data('roles', $form_data, $condition)){
        $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
    else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
        redirect($this->session->userdata('referred_from'));
    }
    
   }







}
