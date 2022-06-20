<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends MY_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->model('Inserts');
        $this->load->model('Majorselects');
        $this->load->model('Deletes');
    }

    public function org($id) {
        #delete org/industry
        $form_data = array(
            "org_id"   => $id
        );

        if($this->Deletes->delete_data('orgs', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function country($id) {
        #delete country
        $form_data = array(
            "country_id"   => $id
        );

        if($this->Deletes->delete_data('countries', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function role($id) {
        #delete role
        $form_data = array( "role_id" => $id );

        if($this->Deletes->delete_data('roles', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function unit($id) {
        #delete unit
        $form_data = array(
            "unit_id"   => $id
        );

        if($this->Deletes->delete_data('units', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function attribute($id) {
        #delete attribute
        if($this->Deletes->delete_data('attributes', array("attribute_id" => $id))){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function currency($id) {
        #delete currency
        $form_data = array( "currency_id"   => $id );

        if($this->Deletes->delete_data('currencies', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function tax_type($id) {
        #delete tax_type
        $form_data = array(
            "tax_type_id"   => $id
        );

        if($this->Deletes->delete_data('tax_types', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function eating_table($id) {
        #delete eating_table
        $form_data = array( "eating_table_id" => $id );

        if($this->Deletes->delete_data('eating_tables', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function category($id) {
        $form_data = array(
            "cat_id"   => $id
        );

        if($this->Deletes->delete_data('categories', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Category deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function package_type($id) {
        $form_data = array( "package_type_id" => $id );

        if($this->Deletes->delete_data('package_types', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Package type deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function brand($id) {
        $form_data = array( "brand_id"   => $id );

        if($this->Deletes->delete_data('brands', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Brand deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    

    public function brand_model($id) {
        $form_data = array( "brand_model_id"   => $id );

        if($this->Deletes->delete_data('brand_models', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Model deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function item($id) {
        $form_data = array(
            "item_id"   => $id
        );

        if($this->Deletes->delete_data('items', $form_data)){
            #delete image in repository
            $img['img_name'] = $this->Majorselects->this_item($id);
            foreach ($img_name as $image) $image_name = $image->image;
            unlink('http://localhost:8080/store/assets/images/items' . $image_name);
            
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Item deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function order($id) {
        $form_data = array("order_id" => $id);
        #delete order items first
        if(!$this->Deletes->delete_data('order_items', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Error in deleting order items. Please try again. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        #delete order items now
        if($this->Deletes->delete_data('orders', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Order deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function shop_item($id) {
        $form_data = array(
            "shop_item_id"  => $id
        );
        #delete shop_item_images
        $this->Deletes->delete_data('item_images', $form_data);

        if($this->Deletes->delete_data('shop_items', $form_data) ){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Shop Item deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function item_image($id, $name) {
        $form_data = array(
            "image_id"   => $id
        );

      #  var_dump($this->session->all_userdata());  exit();

        if($this->Deletes->delete_data('item_images', $form_data)){
            #unlink(FCPATH.'uploads/' . $name);
            unlink('http://localhost:8080/ecom-backend/images/item_images/' . $name);
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Item deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            #redirect($this->session->userdata('referred_from'), 'refresh');
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'), 'refresh');
        }
    }



}

?>