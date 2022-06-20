<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller {

   public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload() {
            $config['upload_path']   = './uploads/attachments/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt|xls';
            $config['max_size']      = 500;
            $config['max_width']     = 2000;
            $config['max_height']    = 1800;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_form', $error);
            }

            else {
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('upload_form', $data);
            }
        }

}











