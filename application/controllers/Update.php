<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends MY_Controller {
    function __construct()
    {
        parent::__construct();

        $this->load->model('Inserts');
        $this->load->model('Majorselects');
        $this->load->model('Deletes');
    }





    public function change_password () {
        #change user's password
        $password = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');
        if($password != $cpassword) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Password does not match. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        $password = password_hash($cpassword, PASSWORD_DEFAULT);
        $data = array(
            "password"  => $password
        );
        $condition = array(
            "user_id"     => $_SESSION['userid']
        );
        if($this->Inserts->update_data('users', $data, $condition)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Password Successfully Changed. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function add_product () {
        #add seller product
        $file = $_FILES["coverimage"]["name"];      #get the file name

        $config['upload_path']   = './images/cover-images/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']      = 500;
        $config['max_width']     = 600;
        $config['max_height']    = 600;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if ( ! $this->upload->do_upload('coverimage'))  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            redirect($this->session->userdata('referred_from'));
        }
        else $coverimage = array('upload_data' => $this->upload->data());

        $data = array("cover_image" => $file );
        $form_data = array(
            "item_id"           => $this->input->post('itemid'),
            "entity_id"         => $_SESSION['userid'],
            "standard_price"    => trim($this->input->post('oldprice')),
            "new_price"         => trim($this->input->post('newprice')),
            "stock_number"      => trim($this->input->post('stocknumber')),
            "specification"     => trim($this->input->post('specification')),
            "description"       => trim($this->input->post('description')),
            "active"            => $this->input->post('showhide'),
            "cover_image"       => $file
        );

        if($this->Inserts->insert_data('shop_items', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Product successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

    }


    public function org($id, $indu) {
        #update org/industry
        #update org/industry
        $file1 = null; $file2 = null;
        if($indu == 1) {
            #this is industry and not org
            #upload the images
            $file1 = $_FILES["pimage"]["name"];      #get the file name
            $file2 = $_FILES["simage"]["name"];      #get the file name

            $config['upload_path']   = './images/industry_images/';
            $config['allowed_types'] = 'jpeg|JPG|jpg|png';
            $config['max_size']      = 800;
            $config['max_width']     = 800;
            $config['max_height']    = 800;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($file1 != null){
                #upload file1
                if ( !$this->upload->do_upload('pimage'))  {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                    redirect($this->session->userdata('referred_from'));
                }
                else $data1 = array('upload_data' => $this->upload->data());
            }
            else {
               $file1 = $this->input->post('temp_image1');
            }

            if($file2 != null){
                #upload file1
                if ( !$this->upload->do_upload('simage'))  {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                    redirect($this->session->userdata('referred_from'));
                }
                else $data2 = array('upload_data' => $this->upload->data());
            }
            else {
               $file2 = $this->input->post('temp_image2');
            }
        }

        if($this->input->post('active') != null) $active = $this->input->post('active');
        else $active = 0;
        $form_data = array (
            "org_name"              => $this->input->post('orgname'),
            "is_industry"           => $indu,
            "primary_cover_image"   => $file1,
            "secondary_cover_image" => $file2,
            "narrative"             => $this->input->post('narrative'),
            "active"                => $active
        );
        $condition = array(
            "org_id"   => $id
        );
        if($this->Inserts->update_data('orgs', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function category ($id) {
        #update org/industry
        $file = null;
        if($indu == 1) {
            #upload the images
            $file = $_FILES["image"]["name"];      #get the file name

            $config['upload_path']   = './images/category_images/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']      = 500;
            $config['max_width']     = 600;
            $config['max_height']    = 600;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($file != null){
                #upload file
                if ( !$this->upload->do_upload('image'))  {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                    redirect($this->session->userdata('referred_from'));
                }
                else $data1 = array('upload_data' => $this->upload->data());
            }
            else {
               $file = $this->input->post('temp_image');
            }

        }

        if($this->input->post('active') != null) $active = $this->input->post('active');
        else $active = 0;
        $form_data = array (
            "org_id"        => 0,
            "industry_id"   => $this->input->post('industry'),
            "category_name" => $this->input->post('category'),
            "category_image"=> $file,
            "narrative"     => $this->input->post('narrative'),
            "active"        => $active
        );
        $condition = array(
            "category_id"   => $id
        );
        if($this->Inserts->update_data('categories', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Category successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function item ($id) {
        #add category
        $file = $_FILES["image"]["name"];      #get the file name
        if($file == null) {
            #if no file uploaded
            $file = $this->input->post('temp_image');
        }
        else{
            #upload image
            $config['upload_path']   = './images/cover-images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 500;
            $config['max_width']     = 600;
            $config['max_height']    = 600;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('image'))  {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                redirect($this->session->userdata('referred_from'));
            }
            else $data2 = array('upload_data' => $this->upload->data());
        }

       $form_data = array(
            "item_id"           => $this->input->post('itemid'),
            "entity_id"         => $_SESSION['userid'],
            "standard_price"    => trim($this->input->post('oldprice')),
            "new_price"         => trim($this->input->post('newprice')),
            "stock_number"      => trim($this->input->post('stocknumber')),
            "specification"     => trim($this->input->post('specification')),
            "description"       => trim($this->input->post('description')),
            "active"            => $this->input->post('active'),
            "cover_image"       => $file
        );

        if($this->Inserts->insert_data('shop_items', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Product successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }


    public function my_product ($id) {
        #update seller product

        $file = $_FILES["image"]["name"];      #get the file name
        if($file == null) {
            #if no file uploaded
            $file = $this->input->post('temp_image');
        }
        else{
            #upload image
            $config['upload_path']   = './images/cover-images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 500;
            $config['max_width']     = 600;
            $config['max_height']    = 600;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('image'))  {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                #redirect($this->session->userdata('referred_from'));
                redirect(site_url('sys/my_product_details/'.$id));
            }
            else $data2 = array('upload_data' => $this->upload->data());
        }

        $data = array("cover_image" => $file );
        $form_data = array(
            "item_id"           => $this->input->post('itemid'),
            "standard_price"    => trim($this->input->post('oldprice')),
            "new_price"         => trim($this->input->post('newprice')),
            "stock_number"      => trim($this->input->post('stocknumber')),
            "specification"     => trim($this->input->post('specification')),
            "description"       => trim($this->input->post('description')),
            "active"            => $this->input->post('active'),
            "cover_image"       => $file
        );

        $condition = array(
            "shop_item_id" => $id
        );

        if($this->Inserts->update_data('shop_items', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Product successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/my_product_details/'.$id));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            #redirect($this->session->userdata('referred_from'));
            redirect(site_url('sys/my_product_details/'.$id));
        }

    }

    public function shop_item_approval ($id) {
        #approval for shop item to be displayed on the front-end site
        $status = $this->input->post('approval');
        $msg = null;

        if($status == 5) $msg = 'approved';
        elseif($status == 4) $msg = 'pending';
        elseif($status == 3) $msg = 'cancelled';

        $form_data = array(
            "status_id"     => $status
        );
        $condition = array (
            "shop_item_id"  => $id
        );
        if($this->Inserts->update_data('shop_items', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Shop item '.$msg.' <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/product_details/'.$id));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/product_details/'.$id));
        }
    }























    public function change_profile_image () {
        #change user's profile image
        $file = $_FILES["image"]["name"];      #get the file name

        $config['upload_path']   = './uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 500;
        $config['max_width']     = 600;
        $config['max_height']    = 600;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image'))  {
            $this->session->set_flashdata('msg2', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
            redirect($this->session->userdata('referred_from'));
        }
        else $data2 = array('upload_data' => $this->upload->data());

        $data = array("profile_image" => $file );
        $condition = array("user_id" => $_SESSION['userid']);

        if($this->Inserts->update_data('users', $data, $condition)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Profile Image Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function add_user_experience () {
        #user add and / submit experience
        #get end date if not set
        $end_date = null;
        if($this->input->post('end_date') != '') $end_date = $this->input->post('end_date');

        $data = array(
            "user_id"               => $_SESSION['userid'],
            "organization_name"     => $this->input->post('organization'),
            "position"              => $this->input->post('position'),
            "start_date"            => $this->input->post('start_date'),
            "end_date"              => $end_date,
            "current_job"           => $this->input->post('current_job'),
            "description"           => $this->input->post('description')
        );

        #var_dump($data);   exit();

        if($this->Inserts->insert_data('job_experiences', $data)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information Successfully Saved. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function update_user_experience () {
        #update user experience data: that is existing in the database
        #get end date if not set
        $end_date = null;
        if($this->input->post('end_date') != '') $end_date = $this->input->post('end_date');

        $data = array(
            "organization_name"     => $this->input->post('organization'),
            "position"              => $this->input->post('position'),
            "start_date"            => $this->input->post('start_date'),
            "end_date"              => $this->input->post('end_date'),
            "current_job"           => $this->input->post('current_job'),
            "description"           => $this->input->post('description')
        );
        $condition = array(
            "je_id"       => $this->input->post('expe_code')
        );
       # var_dump($data);
       # var_dump($condition); exit();
        if($this->Inserts->update_data('job_experiences', $data, $condition)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information Successfully Saved. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function add_user_reference () {
        #add user reference / referee(s)
        $data = array(
            "user_id"               => $_SESSION['userid'],
            "title_id"              => $this->input->post('title'),
            "fname"                 => $this->input->post('fname'),
            "sname"                 => $this->input->post('sname'),
            "lname"                 => $this->input->post('lname'),
            "email_one"             => $this->input->post('email1'),
            "email_two"             => $this->input->post('email2'),
            "organization"          => $this->input->post('organization'),
            "relationship"          => $this->input->post('relationship'),
            "phone_one"             => $this->input->post('phone1'),
            "phone_two"             => $this->input->post('phone2'),
            "address_one"           => $this->input->post('address1'),
            "address_two"           => $this->input->post('address2')
        );
        if($this->Inserts->insert_data('referees', $data)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information Successfully Saved. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_user_reference () {
        #update user's referee
        $data = array(
            "title_id"              => $this->input->post('title'),
            "fname"                 => $this->input->post('fname'),
            "sname"                 => $this->input->post('sname'),
            "lname"                 => $this->input->post('lname'),
            "email_one"             => $this->input->post('email1'),
            "email_two"             => $this->input->post('email2'),
            "organization"          => $this->input->post('organization'),
            "relationship"          => $this->input->post('relationship'),
            "phone_one"             => $this->input->post('phone1'),
            "phone_two"             => $this->input->post('phone2'),
            "address_one"           => $this->input->post('address1'),
            "address_two"           => $this->input->post('address2')
        );
        $condition = array(
            "ref_id"              => $this->input->post('ref_code'),
            "user_id"             => $_SESSION['userid']
        );
        if($this->Inserts->update_data('referees', $data, $condition)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information Successfully Saved. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function add_user_document () {
#var_dump($_POST); exit();
        #add user document
        $file = $_FILES["my_file"]["name"];      #get the file name
        $data = array(
            "user_id"               => $_SESSION['userid'],
            "doc_type_id"           => $this->input->post('doc_type'),
            "doc"                   => $file,
            "description"           => $this->input->post('description')
        );

        $config['upload_path']   = './uploads/attachments/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt|xls';
        $config['max_size']      = 500;
        $config['max_width']     = 2000;
        $config['max_height']    = 1800;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('my_file')) $data2 = array('error' => $this->upload->display_errors());
        else $data3 = array('upload_data' => $this->upload->data());


        if($this->Inserts->insert_data('profile_documents', $data)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information Successfully Saved. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_user_document () {
        #update user's document/ attachement
        $data = array(
            "doc_type_id"         => $this->input->post('doc_type'),
            "description"         => $this->input->post('description')
        );
        $condition = array(
            "doc_id"              => $this->input->post('doc_code'),
            "user_id"             => $_SESSION['userid']
        );
        if($this->Inserts->update_data('profile_documents', $data, $condition)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information Successfully Saved. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    #################
    ### User profile ends
    ################


    public function send_review_request() {
        #get the data posted form competition stage objectives page.
        #gives the user opportunity to request for review on the given stage after completion
        $file = $_FILES["doc"]["name"];      #get the file name

        $config['upload_path']   = './uploads/stage_documents/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt|xls';
        $config['max_size']      = 500;
        $config['max_width']     = 2000;
        $config['max_height']    = 1800;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('doc')) $data2 = array('error' => $this->upload->display_errors());
        else $data3 = array('upload_data' => $this->upload->data());

        $data = array(
            "stage_id"         => $this->input->post('stageID'),
            "doc"              => $file,
            "competitor_id"    => $_SESSION['userid'],
            "status_id"        => 3,
            "description"      => $this->input->post('description')
        );

        if($this->Inserts->insert_data('competitor_stage_clearance', $data)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information successfully sent. You work will be reviewed and feedback sent later on. Thank you for participating in this stage. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }


    #################
    ### Competitor Judge Awards
    ################

    public function award_competitor () {
        #get judge award form and submit to the db
        #this entails score(s) per stage(s)
        $data = array(
            "competitor_id"         => $this->input->post('competitor'),
            "judge_id"              => $_SESSION['userid'],
            "competition_stage_id"  => $this->input->post('stage'),
            "score"                 => $this->input->post('score'),
            "score_comment"         => $this->input->post('remarks'),
            "status_id"             => 1
        );

        if($this->Inserts->insert_data('score_per_stage', $data)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Score Successfully Awarded. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }

    }

    public function award_update () {
        #updates the scores and comments of the judge to a competitor
        $data = array(
            "score"                 => $this->input->post('score'),
            "score_comment"         => $this->input->post('remarks')
        );
        $condition = array(
            "score_id"              => $this->input->post('score_id')
        );
        if($this->Inserts->update_data('score_per_stage', $data, $condition)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Scores Successfully Updated. Thank you. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    #################
    ### Competitor Judge Awards
    ################



    #################
    ### Competition Sponsorship
    ################

    public function competition_sponsorship () {
        #gives the user opportunity to request for review on the given stage after completion
        $file = $_FILES["attachment"]["name"];      #get the file name

        $config['upload_path']   = './uploads/sponsorship/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|docx|ppt|xls';
        $config['max_size']      = 500;
        $config['max_width']     = 2000;
        $config['max_height']    = 1800;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('attachment')) $this->session->set_flashdata('msg2',$this->upload->display_errors());
        else $data3 = array('upload_data' => $this->upload->data());

        $data = array(
            "competition_id"         => $this->input->post('comp_id'),
            "stakeholder_id"         => $_SESSION['userid'],
            "sponsorship_mode"       => $this->input->post('s_mode'),
            "sponsorship_worth"      => $this->input->post('s_worth'),
            "attachment"             => $file,
            "status_id"              => 3,
            "description"            => $this->input->post('description')
        );

        if($this->Inserts->insert_data('competition_sponsorship', $data)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Information successfully sent. Thank you for your support. We will engage you shortly. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('Coc/sponsor_competition'), 'refresh');
        }
        else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later.</div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    #################
    ### Competition Sponsorship
    ################





}

?>