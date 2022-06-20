<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Model
{
    //send email controller
    public function send_mail($email, $fname, $link) {

        $from = $this->config->item('smtp_user');
        $to = $email;
        $subject = "Email Verification | Crush of Champions";
        $message = 'Hello '.$fname.',<br> Thank you for registering with us. Click the link below to activate your account.<br>
                    '.$link.'<br><br>
                    Thank you.';

        $this->email->set_newline("\r\n");

        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        //Send mail
        if($this->email->send()) return true;
        else return false;
    }
}
