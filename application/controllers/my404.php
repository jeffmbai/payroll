<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class my404 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('error_404');//loading the error page
    }

}











