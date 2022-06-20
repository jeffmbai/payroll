<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailing extends CI_Model
{
    //send email model
    public function send_email($to, $subject, $body) {

        
        $this->load->config('email');
		$this->load->library('email');
		$from = $this->config->item('smtp_user');
		$fromName = $this->config->item('smtp_from_name');

        $this->email->from($from, $fromName);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($body);
        #Send mail
        if($this->email->send())
            return true;
        else
            // echo show_error($this->email->print_debugger());
            return false;
    }

    
}
