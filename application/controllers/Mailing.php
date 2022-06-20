<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailing extends MY_Controller
{
    //send email controller
    public function send_mail() {

        $from = $this->config->item('smtp_user');
        $to = "onyangoreaggan@gmail.com";
        $subject = "Greetings";
        $message = "This is a test Message";

        $this->email->set_newline("\r\n");
        
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        //Send mail
        if($this->email->send())
            //$this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
            echo "Email Sent Successfully";
        else
            //$this->session->set_flashdata("email_sent","You have encountered an error");
            //$this->load->view('contact_email_form');
            echo show_error($this->email->print_debugger());
    }
}
