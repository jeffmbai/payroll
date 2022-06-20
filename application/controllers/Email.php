<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    //send email controller
    public function coc($code) {
        //get code from url
    //echo "Code : ".$code;
       //loop through db matching the code
       $this->load->model('Auth_model');
       $result = $this->Auth_model->email_verification($code);
       if($result == 1){
           echo "<script> alert('Email verified successfully.'); </script>";
           redirect('pages/index');
       }
       else if($result == 2){
           echo "<script> alert('Sorry! Email verification failed.'); </script>";
           redirect('pages/index');
       }
       else if($result == 3){
           $msg = "Email already verified. Please login to your account.";
           redirect('pages/index?msg='.$msg);
       }
    }
}
