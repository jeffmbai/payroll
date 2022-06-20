<?php

class Auth_model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function get_all_users()
    {
        $users = $this->db->get('users');
        return $users->result();
    }

    public function user_exist($email, $phone, $idpassport){
        $this->db->where("email = '$email' OR phone = '$phone' OR id_passport = '$idpassport' ");
        $rows = $this->db->get('entitys');
        if($rows -> num_rows() > 0){
            //true
            return true;
        }
        else{
            //false
            return false;
        }
    }

    public function can_login($data){
        $this->db->where("email = '$data[username]'");
        $rows = $this->db->get('entitys');
        if($rows -> num_rows() > 0){
            #user exist
             foreach ($rows->result() as $rw)
            {
                //check account status
                if($rw->active == 1){
                    //verify password
                    if(password_verify($data['password'], $rw->password)){
                        //user auth successful
                        //return array of role and username
                        $fiscalyear = $this->db->where('active',1)->get('fiscal_years')->row();
                        $termid = $this->db->where('active',1)->get('terms')->row('term_id');
                        $org = $this->db->where('org_id',1)->get('orgs')->row();
                        $userdata = array(
                            "userrole"      =>  $rw->system_role,
                            "username"      =>  $rw->email,
                            "userid"        =>  $rw->entity_id,
                            "orgid"         =>  $rw->org_id,
                            "firstname"     =>  $rw->firstname,
                            "secondname"    =>  $rw->secondname,
                            "lastname"      =>  $rw->lastname,
                            "phone"         =>  $rw->phone,
                            "email"         =>  $rw->email,
                            "id_passport"   =>  $rw->id_passport,
                            "dob"           =>  $rw->dob,
                            "profile_picture"=>  $rw->profile_picture,
                            "superuser"     =>  $rw->super_user,
                            'fiscalyearid'  =>  $fiscalyear->fiscal_year_id,
                            'termid'        =>  $termid,
                            'fiscalyearname'=>  $fiscalyear->fiscal_year_name,
                            'organizationtype'=>  $org->organization_type,
                        );
                         
                        return $userdata;
                    }
                    else{
                        #authentication failed
                        return 400;
                    }
                }
                elseif($rw->active != 1){
                    //email not verified
                    return 200;
                }
            }
        }
        else{
            //user does not exist
            return 300;
        }
    }

    public function can_login_pin($data){
        $this->db->where("pin = '$data'");
        $rows = $this->db->get('entitys');
        if($rows -> num_rows() > 0){
            #user exist
             foreach ($rows->result() as $rw)
            {
                //check account status
                if($rw->active == 1){
                    //user auth successful
                    //return array of role and username
                    $fiscalyear = $this->db->where('active',1)->get('fiscal_years')->row();
                    $termid = $this->db->where('active',1)->get('terms')->row('term_id');
                    $org = $this->db->where('org_id',1)->get('orgs')->row();
                    $userdata = array(
                        "userrole"      =>  $rw->system_role,
                        "username"      =>  $rw->email,
                        "userid"        =>  $rw->entity_id,
                        "orgid"         =>  $rw->org_id,
                        "firstname"     =>  $rw->firstname,
                        "secondname"    =>  $rw->secondname,
                        "lastname"      =>  $rw->lastname,
                        "phone"         =>  $rw->phone,
                        "email"         =>  $rw->email,
                        "id_passport"   =>  $rw->id_passport,
                        "dob"           =>  $rw->dob,
                        "profile_picture"=>  $rw->profile_picture,
                        "superuser"     =>  $rw->super_user,
                        'fiscalyearid'  =>  $fiscalyear->fiscal_year_id,
                        'termid'        =>  $termid,
                        'fiscalyearname'=>  $fiscalyear->fiscal_year_name,
                        'organizationtype'=>  $org->organization_type,
                    );
                        
                    return $userdata;
                }
                elseif($rw->active != 1){
                    //email not verified
                    return 200;
                }
            }
        }
        else{
            //user does not exist
            return 300;
        }
    }

    public function email_verification($user_code){
//echo $user_code."<br>";
        $this->db->where("user_code = '$user_code'  AND account_status = '3' ");
        $rows = $this->db->get('users');
        if($rows -> num_rows() > 0){
            //activate account
            $data = array(
                    'account_status' => 1
                );
            $this->db->where('user_code', $user_code);
            $query = $this->db->update('users', $data);
            if($query){
                //echo "<script> alert('Account activated successfully'); </script>";
                //return true;
                return 1;
            }
            else{
                //return false;
                return 2;
            }
        }
        else{
            //false
            //echo "Email already activated";
            //return false;
            return 3;
        }
    }

    public function insert_user($form_data)
    {
        if($this->db->insert('entitys', $form_data)){
            return true;
        }
        else {
            return false;
        }

    }

    public function insert_data($table, $data)
    {
        //insert data function
        if($this->db->insert($table, $data)){
            return true;
        }
        else {
            return false;
        }
    }
}










