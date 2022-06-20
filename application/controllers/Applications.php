<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applications extends MY_Controller
{

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        if (!isset($_SESSION['userrole']) || !isset($_SESSION['username'])) {
            //session is not set. cancel back to login page
            redirect(site_url('pages/logout'));
        } else {
            #echo "Success";
            $this->role = $_SESSION['userrole'];
            $this->username = $this->session->userdata('username');

            $this->load->model('Majorselects');
            $this->load->model('Mailing');
            $this->load->model('Applications_Model','applications');

            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

    public function new()
    {
        $this->permission_check('general');

        $this->session->set_userdata('referred_from', current_url());
        if(isset($_SESSION['page'])) unset($_SESSION['page']);

        $this->data['page'] = 'New Application';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('applications/new', $this->data);
        $this->load->view('inc/footer');
    }
    public function list()
    {
        $this->permission_check('general');

        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Applications';

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('applications/list', $this->data);
        $this->load->view('inc/footer');
    }
    public function profile($id)
    {
        $this->permission_check('general');

        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Applicant Profile';
        $this->data['applicant'] = $this->db->select('a.*, b.status_name, c.course_code, c.course_name')
                                    ->from('applicants as a')
                                    ->join('status as b', 'a.status_id = b.status_id')
                                    ->join('courses as c', 'a.course_id = c.course_id')
                                    ->where('a.applicant_id', $this->decryptStringArray($id, 2))
                                    ->get()->row();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('applications/profile', $this->data);
        $this->load->view('inc/footer');
    }
    public function add () {

        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $reference = substr(str_shuffle($permitted_chars), 0, 10);

        $passportphoto = 'default.png';

        $id_passport = $_POST['id_passport'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $error = $success = null;
        if(isset($_SESSION['page'])) {
            $error = site_url('applications/register');
            $success = site_url('applications/success');
        } else {
            $error = site_url('applications/new');
            $success = site_url('applications/list');
        }

        //  find if exist
        if($this->db->where('id_passport',$id_passport)->get('applicants')->row()) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! A similar ID/Passport number already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect(site_url('applications/new'));
            echo redirect($error);
        }
        if($this->db->where('email',$email)->get('applicants')->row()) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! A similar email already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect(site_url('applications/new'));
            echo $error;
        }
        if($this->db->where('mobile',$mobile)->get('applicants')->row()) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! A similar mobile already exist. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect(site_url('applications/new'));
            echo redirect($error);
        }

        $form_data = array(
            "reference" => $reference,
            "application_date" => date('Y-m-d'),
            "first_name" => trim($_POST['first_name']),
            "middle_name" => trim($_POST['middle_name']),
            "last_name" => trim($_POST['last_name']),
            "address" => trim($_POST['address']),
            "dob" => trim($_POST['dob']),
            "marital_status" => trim($_POST['marital_status']),
            "email" => trim($_POST['email']),
            "mobile" => trim($_POST['mobile']),
            "country_id" => trim($_POST['country_id']),
            "id_passport" => trim($_POST['id_passport']),
            "gender" => trim($_POST['gender']),
            "sending_organization" => trim($_POST['sending_organization']),
            "in_chritian_ministry" => trim($_POST['in_chritian_ministry']),
            "time_ministery" => (isset($_POST['time_ministery'])) ? $_POST['time_ministery'] : null,
            "position_narrative" => trim($_POST['position_narrative']),
            "referrer" => trim($_POST['referrer']),
            "course_id" => trim($_POST['course_id']),
            "status_id" => 3,
            "essay" => trim($_POST['essay']),
            "passport_photo" => $passportphoto
        );

        if($this->db->insert('applicants', $form_data)){
            $insertID = $this->db->insert_id();

            $other_forms = array();

            // affiliations
            $affiliation_name = $_POST['affiliation_name'];
            $aff_length = count($affiliation_name);
            $aff_array = array();
            if(count($aff_array) > 0) {
                for($x=0; $x < $aff_length; $x++){
                    if( $_POST['affiliation_name'][$x] != null || $_POST['affiliation_name'][$x] != '' ){
                        $aff_array[] = array(
                            'applicant_id' => $insertID,
                            'affiliation_name' => $_POST['affiliation_name'][$x],
                            'affiliation_date' => $_POST['affiliation_date'][$x],
                        );
                    }
                }
                $this->db->insert_batch('affiliations', $aff_array);
                $other_forms['affiliations'] = $aff_array;
            } 

            // education_background
            $institution_name = $_POST['institution_name'];
            $ins_length = count($institution_name);
            $ins_array = array();
            
            if(count($ins_array) > 0) {
                for($x=0; $x < $ins_length; $x++){
                    if( $_POST['institution_name'][$x] != null || $_POST['institution_name'][$x] != '' ){
                        $ins_array[] = array(
                            'applicant_id' => $insertID,
                            'institution_name' => $_POST['institution_name'][$x],
                            'institution_level' => $_POST['institution_level'][$x],
                            'from_date' => $_POST['from_date'][$x],
                            'to_date' => $_POST['to_date'][$x],
                            'grade' => $_POST['grade'][$x],
                            'certificate_awarded' => $_POST['certificate_awarded'][$x],
                        );
                    }
                }
                $this->db->insert_batch('education_background', $ins_array);
                $other_forms['education_background'] = $ins_array;
            }
           
            // attach passport only if exist
            $file = $_FILES["passport_photo"]["name"];      #get the file name
            if ($file != '') {
                #if a file is uploaded
                $config['upload_path']   = './assets/images/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                // $config['max_size']      = 500;
                // $config['max_width']     = 500;
                // $config['max_height']    = 500;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('passport_photo')) {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                    // redirect(site_url('applications/new'));
                    echo $error;
                } else {
                    $upload_data = $this->upload->data();      #returns upload data
                    $passportphoto = $upload_data['file_name'];  #get the file name
                    $attachmentPath = $upload_data['full_path'];  #get the full path of the uploaded file

                    $this->db->update('applicants', array("passport_photo" => $passportphoto), array("applicant_id" => $insertID));
                }
            } 

            // attached files upload
            $att_array = array();
            $count = count($_FILES['files']['name']);
            // echo 'Files: ' . $count . '<br/>';
            // echo 'Docs: ' . count($_POST['document_name']) . '<br/>';
            for($i=0;$i<$count;$i++){
                if(!empty($_FILES['files']['name'][$i])){
      
                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];  
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];      
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];      
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];      
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];  
        
                    $config['upload_path']   = './assets/documents/';
                    $config['allowed_types'] = 'pdf|png|jpeg';
                    $config['max_size']      = 500;
                    $config['file_name'] = $_FILES['files']['name'][$i];

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('file')) {
                        var_dump($this->upload->display_errors());
                    } else {
                        $upload_data = $this->upload->data();  
                        $filename = $upload_data['file_name']; 
                        $filepath = 'assets/documents/' . $filename;

                        $att_array[] = array(
                            "type_id" => $_POST['type_id'][$i],
                            "document_name" => $_POST['document_name'][$i],
                            "entity_id" => $_SESSION['userid'],
                            "table_name" => 'applicants',
                            "table_id" => $insertID,
                            "attachment" => $filename,
                            "file_path" => $filepath,
                            "narrative" => $_POST['narrative'][$i]
                        );
                    }

      
                } 
            }
            if(count($att_array) > 0) {
                $this->db->insert_batch('documents', $att_array);
                $other_forms['documents'] = $att_array;
            }

            #Trail Start
            $trail = array(
                'event_name' => "add_applicant",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'applicants',
                'source_id' => $insertID,
                'task' => json_encode($form_data),
                'narrative' => json_encode($other_forms),                
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $course_name = $this->db->where('course_id', $_POST['course_id'])->get('courses')->row('course_name');
            // Email to student
            $subject1 = 'CMTLI Application - ' . $reference;
            $body1 = 'Dear '.$_POST['first_name'].',
                        <br/>
                        <p>Your application for '. $course_name .' has been received. We will review and get back to you. </p> 
                        <p>
                            Regards,
                            <br/>
                            CMTLI Kenya    
                        </p> 
                    ';
            $this->Mailing->send_email($_POST['email'], $subject1, $body1);
            // Email to team
            $subject2 = 'New Application - ' . $reference;
            $body2 = '  <p>New application made</p>
                        <p>
                            Reference: '.$reference.' <br/>
                            Name: '.$_POST['first_name'].' '.$_POST['last_name'].' <br/>
                            Course: '.$course_name.' <br/>
                        </p> 
                    ';
            $this->Mailing->send_email('ronyango@jiwanitech.com', $subject2, $body2);

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect(site_url('applications/list'));
            echo redirect($success);
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            // redirect(site_url('applications/new'));
            echo redirect($error);
        }
    }

    public function test_file() {
        if(isset($_POST['upload'])) {
            $count = count($_FILES['files']['name']);
            for($i=0;$i<$count;$i++){
                if(!empty($_FILES['files']['name'][$i])){
      
                    $_FILES['file']['name'] = $_FILES['files']['name'][$i];  
                    $_FILES['file']['type'] = $_FILES['files']['type'][$i];      
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];      
                    $_FILES['file']['error'] = $_FILES['files']['error'][$i];      
                    $_FILES['file']['size'] = $_FILES['files']['size'][$i];  
        
                    $config['upload_path']   = './assets/documents/';
                    $config['allowed_types'] = 'pdf|png|jpeg';
                    $config['max_size']      = 500;
                    $config['file_name'] = $_FILES['files']['name'][$i];

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('file')) {
                        var_dump($this->upload->display_errors());
                    } else {
                        $upload_data = $this->upload->data();  
                        $filename = $upload_data['file_name']; 
                        echo $filename;
                    }

      
                } else {
                    echo 'empty';
                }
            }
        } else {
            if(unlink('./assets/countries.sql')) {
                echo 'Yes';
            } else echo 'Nope';

            // $this->load->view('testing', $this->data);
        }
    }

    public function update_biodata($id) {
        $form_data = array(
            "first_name" => trim($_POST['first_name']),
            "middle_name" => trim($_POST['middle_name']),
            "last_name" => trim($_POST['last_name']),
            "address" => trim($_POST['address']),
            "dob" => trim($_POST['dob']),
            "marital_status" => trim($_POST['marital_status']),
            "email" => trim($_POST['email']),
            "mobile" => trim($_POST['mobile']),
            "country_id" => trim($_POST['country_id']),
            "id_passport" => trim($_POST['id_passport']),
            "gender" => trim($_POST['gender']),
            "sending_organization" => trim($_POST['sending_organization']),
            "in_chritian_ministry" => trim($_POST['in_chritian_ministry']),
            "time_ministery" => (isset($_POST['time_ministery'])) ? $_POST['time_ministery'] : null,
            "position_narrative" => trim($_POST['position_narrative']),
            "referrer" => trim($_POST['referrer']),
            "course_id" => trim($_POST['course_id'])
        );

        $id2 = $this->decryptStringArray($id, 2);
        if($this->db->update('applicants', $form_data, array("applicant_id" => $id2))) {
            
            #Trail Start
            $trail = array(
                'event_name' => "update_applicant",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'applicants',
                'source_id' => $id2,
                'narrative' => json_encode($form_data),
                'task' => json_encode($form_data),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        }
    }
    public function update_affiliations($id) {
        $id2 = $this->decryptStringArray($id, 2);

        // delete initials
        $this->db->delete('affiliations', array('applicant_id'=>$id2));

        // affiliations
        $affiliation_name = $_POST['affiliation_name'];
        $aff_length = count($affiliation_name);
        $aff_array = array();
        for($x=0; $x < $aff_length; $x++){
            if( $_POST['affiliation_name'][$x] != null || $_POST['affiliation_name'][$x] != '' ){
                $aff_array[] = array(
                    'applicant_id' => $id2,
                    'affiliation_name' => $_POST['affiliation_name'][$x],
                    'affiliation_date' => $_POST['affiliation_date'][$x],
                );
            }
        }
        if($this->db->insert_batch('affiliations', $aff_array)) {
            #Trail Start
            $trail = array(
                'event_name' => "update_applicant",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'applicants',
                'source_id' => $id2,
                'narrative' => json_encode($aff_array),
                'task' => json_encode($aff_array),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        }
    }
    public function update_education($id) {
        $id2 = $this->decryptStringArray($id, 2);

        // delete initials
        $this->db->delete('education_background', array('applicant_id'=>$id2));

        // education_background
        $institution_name = $_POST['institution_name'];
        $ins_length = count($institution_name);
        $ins_array = array();
        for($x=0; $x < $ins_length; $x++){
            if( $_POST['institution_name'][$x] != null || $_POST['institution_name'][$x] != '' ){
                $ins_array[] = array(
                    'applicant_id' => $id2,
                    'institution_name' => $_POST['institution_name'][$x],
                    'institution_level' => $_POST['institution_level'][$x],
                    'from_date' => $_POST['from_date'][$x],
                    'to_date' => $_POST['to_date'][$x],
                    'grade' => $_POST['grade'][$x],
                    'certificate_awarded' => $_POST['certificate_awarded'][$x],
                );
            }
        }
        if($this->db->insert_batch('education_background', $ins_array)) {
            #Trail Start
            $trail = array(
                'event_name' => "update_applicant",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'applicants',
                'source_id' => $id2,
                'narrative' => json_encode($ins_array),
                'task' => json_encode($ins_array),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        }
    }
    public function update_essay($id) {
        $id2 = $this->decryptStringArray($id, 2);

        if($this->db->update('applicants', array('essay'=>$_POST['essay']), array('applicant_id'=>$id2))) {
            #Trail Start
            $trail = array(
                'event_name' => "update_applicant",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'applicants',
                'source_id' => $id2,
                'narrative' => json_encode($_POST['essay']),
                'task' => json_encode($_POST['essay']),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        }
    }
    public function update_files($id) {
        $id2 = $this->decryptStringArray($id, 2);

        // delete initials
        $this->db->delete('documents', array('table_id'=>$id2, 'table_name'=>'applicants'));

        // attached files upload
        $att_array = array();
        $count = count($_POST['document_name']);
        echo 'Files: '. count($_FILES['files']['name']);
        echo 'Names: '. $count;
        for($i=0;$i<$count;$i++){
            if(!empty($_FILES['files']['name'][$i])){
  
                $_FILES['file']['name'] = $_FILES['files']['name'][$i];  
                $_FILES['file']['type'] = $_FILES['files']['type'][$i];      
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];      
                $_FILES['file']['error'] = $_FILES['files']['error'][$i];      
                $_FILES['file']['size'] = $_FILES['files']['size'][$i];  
    
                $config['upload_path']   = './assets/documents/';
                $config['allowed_types'] = 'pdf|png|jpeg';
                $config['max_size']      = 500;
                $config['file_name'] = $_FILES['files']['name'][$i];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('file')) {
                    var_dump($this->upload->display_errors());
                } else {
                    $upload_data = $this->upload->data();  
                    $filename = $upload_data['file_name']; 
                    $filepath = 'assets/documents/' . $filename;

                    // delete the old file
                    if(isset($_POST['files2'][$i])) {
                        unlink('./assets/documents/' . $_POST['files2'][$i]);
                    }

                    $att_array[] = array(
                        "type_id" => $_POST['type_id'][$i],
                        "document_name" => $_POST['document_name'][$i],
                        "entity_id" => $_SESSION['userid'],
                        "table_name" => 'applicants',
                        "table_id" => $id2,
                        "attachment" => $filename,
                        "file_path" => $filepath,
                        "narrative" => $_POST['narrative'][$i]
                    );
                }
            } else {
                $att_array[] = array(
                    "type_id" => $_POST['type_id'][$i],
                    "document_name" => $_POST['document_name'][$i],
                    "entity_id" => $_SESSION['userid'],
                    "table_name" => 'applicants',
                    "table_id" => $id2,
                    "attachment" => (isset($_POST['files2'][$i])) ? $_POST['files2'][$i] : null,
                    "file_path" => 'assets/documents/' . (isset($_POST['files2'][$i])) ? $_POST['files2'][$i] : null,
                    "narrative" => $_POST['narrative'][$i]
                );
            }
        }
        
        if($this->db->insert_batch('documents', $att_array)) {
            #Trail Start
            $trail = array(
                'event_name' => "update_applicant",
                'operator' => $_SESSION['userid'],
                'username' => $_SESSION['username'],
                'computer' => '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }',
                'source' => 'applicants',
                'source_id' => $id2,
                'narrative' => json_encode($att_array),
                'task' => json_encode($att_array),
                "start_time" => date('Y-m-d H:m:s')
            );
            $this->db->insert('sys_logs', $trail);
            //Trail End

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Data successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('applications/profile/' . $id));
        }
    }

    public function admit_student () {
        $id = $_POST['applicant_id'];
        $status_id = $_POST['status_id'];
        $status_name = $this->db->where('status_id', $status_id)->get('status')->row('status_name');

        $id2 = $this->decryptStringArray($id, 2);
        
        $dt = $this->db->where('applicant_id',$id2)->get('applicants')->row();
        $course = $this->db->where('course_id',$dt->course_id)->get('courses')->row(); // get course code

        if($status_id == 1 || $status_id == 2) {
            //register 
            $check = $this->db->where("upi = '$dt->reference' ")->get('students')->num_rows();
            if($check > 0) {
                $this->session->set_flashdata('alert', '<div class="alert alert-warning">Applicant already registered as student <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('applications/profile/' . $id));
            } else {
                // register this new student

                $form_data = array(
                    "admission_no" => $dt->reference,
                    "upi" => $dt->reference,
                    "first_name" => $dt->first_name,
                    "second_name" => $dt->middle_name,
                    "last_name" => $dt->last_name,
                    "phone" => $dt->mobile,
                    "email" => $dt->email,
                    "dob" => $dt->dob,
                    "gender" => $dt->gender,
                    "marital_status" => $dt->marital_status,
                    "registration_date" => date('Y-m-d'),
                    "gender" => $dt->gender,
                    "id_passport" => $dt->id_passport,
                    "country_id" => $dt->country_id,
                    "course_id" => $dt->course_id,
                    "department_id" => $course->department_id,
                    "faculty_id" => $course->faculty_id,
                    "student_image" => $dt->passport_photo,
                );
                if($this->db->insert('students', $form_data)) {
                    $insertID = $this->db->insert_id();

                    $fdata = array(
                        "student_id" => $insertID,
                        "year_name" => date('Y'),
                        "course_id" => $dt->course_id
                    );
                    $this->db->insert('course_year_log', $fdata);
                    $countIDs = $this->db->where(array('year_name'=>date('Y'), 'course_id'=>$dt->course_id))->get('course_year_log')->num_rows();

                    // generate admission no
                    $yr = date('y'); // get year
                    // get the last admission 
                    $admission_no = strtoupper($course->course_code).'/'.str_pad($yr, 3, '0', STR_PAD_LEFT).'/'.str_pad($countIDs, 3, '0', STR_PAD_LEFT);
                    
                    // update the admission no
                    if(!$this->db->update('students', array('admission_no'=>$admission_no), array('student_id'=>$insertID))){
                        // delete and revert the status
                        $this->db->delete('students', array('student_id'=>$insertID));
                        $this->db->update('applicants', array('status_id'=>3), array('applicant_id'=>$dt->applicant_id));

                        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! The registration process failed! Try again later or contact the administrator for support. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                        redirect(site_url('applications/profile/' . $id));
                    } else {
                        $this->db->update('applicants', array('status_id'=>$status_id), array('applicant_id'=>$dt->applicant_id));

                        // send email
                        $subject1 = 'CMTLI Application - ' . $dt->reference;
                        $body1 = 'Dear '.$dt->first_name.',
                                    <br/>
                                    <p>Your application for '. $course->course_name .' has been successful. Your admission number is '.$admission_no.'. </p> 
                                    <p>
                                        Regards,
                                        <br/>
                                        CMTLI Kenya    
                                    </p> 
                                ';
                        $this->Mailing->send_email($dt->email, $subject1, $body1);
                        
                        $this->session->set_flashdata('alert', '<div class="alert alert-success">Student successfully registered. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                        redirect(site_url('applications/profile/' . $id));
                    }
                }
            }
        } else {
            // update status
            if($this->db->update('applicants', array('status_id'=>$status_id), array('applicant_id'=>$id2) )) {

                // send email
                $subject1 = 'CMTLI Application - ' . $dt->reference;
                $body1 = 'Dear '.$dt->first_name.',
                            <br/>
                            <p>Your application for '. $course->course_name .' has been '.$status_name.'. </p> 
                            <p>
                                Regards,
                                <br/>
                                CMTLI Kenya    
                            </p> 
                        ';
                $this->Mailing->send_email($dt->email, $subject1, $body1);

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Status successfully updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('applications/profile/' . $id));
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('applications/profile/' . $id));
            }
        }
        
    }

    public function confirm_availability () {
        if(isset($_POST['id_passport'])) {
            if($this->db->where("id_passport LIKE '%$_POST[id_passport]%' ")->get('applicants')->row()) {
                echo '<small style="color: red">ID/Passport already used *</small>';
            } else {
                echo '<small style="color: green"><i class="fa fa-check"></i></small>';
            }
        } elseif (isset($_POST['mobile'])) {
            if($this->db->where("mobile LIKE '%$_POST[mobile]%' ")->get('applicants')->row()) {
                echo '<small style="color: red">Mobile already used *</small>';
            } else {
                echo '<small style="color: green"><i class="fa fa-check"></i></small>';
            }
        } elseif (isset($_POST['email'])) {
            if($this->db->where("email LIKE '%$_POST[email]%' ")->get('applicants')->row()) {
                echo '<small style="color: red">Email already used *</small>';
            } else {
                echo '<small style="color: green"><i class="fa fa-check"></i></small>';
            }
        } else {
            echo '<small style="color: orangered">This field is mandatory *</small>';
        }
    }

    public function read_document ($id) {
        $id2 = $this->decryptStringArray($id, 2);
        $this->data['page'] = 'Read Document';
        $this->data['doc'] = $this->db->where('document_id', $id2)->get('documents')->row();

        $this->load->view('read_document', $this->data);
    }
    
}
