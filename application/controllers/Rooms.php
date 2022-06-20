<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends MY_Controller {

    public $role;
    public $username;
    var $data;

    function __construct()
    {
        parent::__construct();

        if( !isset($_SESSION['userrole']) || !isset($_SESSION['username']) ){
            //session is not set. cancel back to login page
            redirect(site_url('pages/logout'));
        }
        else{
            #echo "Success";
            $this->role = $_SESSION['userrole'];
            $this->username = $this->session->userdata('username');
            
            $this->load->model('Majorselects');
            $this->load->model('Inserts');
            $this->load->model('Deletes');
            $this->load->model('Business_Model');
            $this->load->model('Room_Model');
            $this->load->model('Users_Model');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

     public function logout(){
        $this->session->sess_destroy();
        redirect('pages/signin', 'refresh');
 	}

    public function signin(){
        redirect('pages/signin', 'refresh');
    }

    public function register(){
        redirect('pages/register', 'refresh');
    }

    /*** Start Index ***/
    public function home() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_items'] = $this->Majorselects->all_items();

        $this->load->view('inc/admin_header', $this->data);
        #$this->load->view('pos/pos', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/ 

    ##room types start
    public function room_types() {
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'Room Types';

        $this->data['room_types'] = $this->Room_Model->room_types();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('rooms/room_types', $this->data);
        $this->load->view('inc/footer');

    }
    ##room types end
    
    ##CRUD room_types
    public function add_room_type() {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array (
            "org_id"            => $_SESSION['orgid'],
            "room_type_name"    => $this->input->post("room_type_name"),
            "active"            => $active,
            "narrative"         => $this->input->post("narrative")
        );
        if($this->Inserts->insert_data('room_types',$form_data)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Success.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Transaction Failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_room_type($id) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array (
            "org_id"            => $_SESSION['orgid'],
            "room_type_name"      => $this->input->post("room_type_name"),
            "active"            => $active,
            "narrative"         => $this->input->post("narrative")
        );
        $condition = array("room_type_id" => $id);

        if($this->Inserts->update_data('room_types',$form_data,$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_room_type($id) {
        $condition = array ( "room_type_id" => $id );

        if($this->Deletes->delete_data('room_types',$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    ##rooms start
    public function room() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Rooms';

        $this->data['room_types'] = $this->Room_Model->room_types();
        $this->data['rooms'] = $this->Room_Model->rooms();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('rooms/rooms', $this->data);
        $this->load->view('inc/footer');
    }
    public function book_room() {
        $this->data['page'] = 'Book Room';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['room_types'] = $this->Room_Model->room_types();
        $this->data['rooms'] = $this->Room_Model->rooms();

        if($_SESSION['userrole'] == 2) { #waiter
            $this->load->view('inc/pos_header', $this->data);
            $this->load->view('rooms/book_room', $this->data);
            $this->load->view('inc/footer');
        } else { #any other. The system will filter
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('rooms/book_room', $this->data);
            $this->load->view('inc/footer');
        }
        

    }
    ##CRUD rooms
    public function add_room() {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array (
            "org_id"            => $_SESSION['orgid'],
            "room_name"         => $this->input->post("room_name"),
            "room_type_id"      => $this->input->post("room_type_id"),
            "room_rate"         => $this->input->post("room_rate"),
            "active"            => $active,
            "narrative"         => $this->input->post("narrative")
        );
        if($this->Inserts->insert_data('rooms',$form_data)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Success.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Transaction Failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_room($id) {
        $active = $this->input->post('active');
        if($active == '') $active = 0;
        $form_data = array (
            "org_id"            => $_SESSION['orgid'],
            "room_name"         => $this->input->post("room_name"),
            "room_type_id"      => $this->input->post("room_type_id"),
            "room_rate"         => $this->input->post("room_rate"),
            "active"            => $active,
            "narrative"         => $this->input->post("narrative")
        );
        $condition = array("room_id" => $id);

        if($this->Inserts->update_data('rooms',$form_data,$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_room($id) {
        $condition = array ( "room_id" => $id );

        if($this->Deletes->delete_data('rooms',$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    ##rooms end

    ## Book room start
    public function place_order () {
        #get the person making the order

        $resp = null;
        $lastID = null;
        $message = null;

        $paidStatus = 0; #defult is: not paid
        $transactionType = trim($this->input->post('transaction_type_id'));
        if($transactionType == 1) $paidStatus = 1;

        $eating_table_id = null;
        if($transactionType == 1 || $transactionType == 3) $eating_table_id = $this->input->post('eating_table_id');

        #generate the code
        $day = date('d');
        $permitted_chars    = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_code        =  substr(str_shuffle($permitted_chars), 0, 10);
        #get last order id
        $data['last_order'] = $this->Majorselects->last_order();
        $last_order = null;
        foreach($data['last_order'] as $lh_id) $last_order = $lh_id->order_id;

        $code = 'P' . $day. 'B' . $last_order . $random_code;

        $code = substr($code, 0, 10); #get the final code to a string of 10 characters
        #End of code generation

        $customer_supplier_id = 0; //walk-in customer by default

        $phone = trim($this->input->post('customer_phone'));
        $name = trim($this->input->post('customer_name'));
        $email = trim($this->input->post('customer_email'));
        $id_passport = trim($this->input->post('id_passport'));
        //verify if customer is already registered
        $slct = "SELECT entity_id FROM entitys WHERE phone = '$phone' OR email = '$email' OR id_passport = '$id_passport'";
        $select = $this->db->query($slct);

        $verifyCount = 0;
        foreach($select->result() AS $res) {
            $customer_supplier_id = $res->entity_id;
            $verifyCount++;
        }
        if($verifyCount < 1) {
            //register this new user/customer then get their entity_id
            $fname = null;
            $sname = null;
            $str1 = (explode(" ",$name));
            $fname = $str1[0];
            $sname = $str1[1];
            $regiterCustomer = $this->db->query(" INSERT INTO entitys (firstname, secondname, email, phone, id_passport, org_id, sub_department_id, system_role)
                    VALUES ('$fname', '$sname', '$email', '$phone', $id_passport, '$_SESSION[orgid]', 1, 4) ");
            if(!$regiterCustomer){
                $resp = $this->db->error(); 
                echo '{ "resp" : "0", "message" : "'.$resp.'" }';
                exit();
            } else {
                //get last row id
                $customer_supplier_id = $this->db->insert_id(); 
            }
        }    

        $form_data = array(
            "bill_no"             => $code,
            "org_id"              => $_SESSION['orgid'],
            "entity_id"           => $_SESSION['userid'],
            #"transaction_type_id" => $transactionType,
            "transaction_type_id" => 5, #room booking
            "customer_supplier_id"=> $customer_supplier_id,
            "eating_table_id"     => $eating_table_id,
            #"customer_supplier_id"=> trim($this->input->post('cutomer_supplier_id')),
            "tax_charge"          => $this->input->post('itemstax'),
            "date_time"           => $this->input->post('date_time'),
            "payment_mode_id"     => $this->input->post('payment_mode_id'),
            "paid_amount"         => $this->input->post('paid_amount'),
            "paying_balance"      => $this->input->post('paying_balance'),
            "change_return"       => $this->input->post('change_return'),
            "net_amount"          => $this->input->post('total'),
            "from_date"           => $this->input->post('from_date'),
            "to_date"             => $this->input->post('to_date'),
            "narrative"           => $this->input->post('narrative'),
            "paid_status"         => $paidStatus
        );

        if($this->Inserts->insert_data('orders',$form_data)) {
            #get the order id
            $lastID = $this->db->insert_id(); #get last inserted id in order table

            $data['order_id'] = $this->Majorselects->order_id($code);
            foreach($data['order_id'] as $nlh_id) $order_id = $nlh_id->order_id;
            
            $arrLength = COUNT($_POST['item']);
            for($lp = 0; $lp < $arrLength; $lp++) {
                $order_id = $order_id;
                $room_id  = $_POST['item'][$lp];
                $tax      = $_POST['tax'][$lp];
                $room_rate     = $_POST['rate'][$lp];
                $amount   = $_POST['amount'][$lp];
                $query="INSERT INTO rooms_booked (order_id, room_id, tax, room_rate, amount)
                        VALUES ('$order_id','$room_id','$tax','$room_rate','$amount')";

                    if(!$this->db->query($query)) {
                        #first delete the initial header inserted
                        $delete1 = array( "reference" => $code );
                        $delete2 = array( "order_id" => $order_id );
                        $this->Deletes->delete_data('orders', $delete1);
                        $this->Deletes->delete_data('order_items', $delete2);
                        $resp = 3;
                        $message = 'Sorry!!! The transaction has failed. Please try again.';
                    break;
                    } 
    
                }
            
            #generate the receipt
            #$this->pos_receipt($order_id);

            #$this->session->set_flashdata('alert', '<div class="alert alert-success">Transaction Completed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            #redirect($this->session->userdata('referred_from'));

            //if the transaction did not break at any point then this was a successful transaction
            if($resp != 3) {
                $resp = 1;
                $message = 'Transaction Completed';
            }
            
        }
        else {
            #order not created
            #$this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Order not created. Please try again. Thank you.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            #redirect($this->session->userdata('referred_from'));
            $resp = 2;
            $message = 'Sorry!!! Order not created. Please try again. Thank you.';
        }
        
        echo '{ "resp" : "'.$resp.'", "message" : "'.$message.'", "last_id" : "'.$lastID.'" }';
    }
    ## Book room end

    public function receipt ($orderID) {
        $this->my_data['order_profile'] = $this->Majorselects->order_profile($orderID);
        $this->my_data['rooms_booked'] = $this->Room_Model->rooms_booked($orderID);

        #var_dump($this->my_data); exit();

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            "order_items"  => $this->my_data['rooms_booked']
        );
        $this->load->view('rooms/receipt', $merger);
    }

    public function invoice ($id) {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['order_header'] = $this->Majorselects->order_profile($id);

        $this->data['rooms_booked'] = $this->Room_Model->rooms_booked($id);

        $this->load->view('rooms/invoice', $this->data);
    }

    public function bookings () {
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'Bookings';

        //$this->data['orders'] = $this->Room_Model->orders();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('rooms/bookings', $this->data);
        $this->load->view('inc/footer');
    }
    public function all_bookings () {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $bookings = $this->Room_Model->orders();
        
        $data = array();
        foreach($bookings as $r) {
            // $narrative = $r->narrative;
            // $active = ($r->active == 1 ? "True" : "False");
            if($r->paid_status == 1) $paid = 'Paid';
            elseif($r->paid_status == 0) $paid = 'Pending';
            elseif($r->paid_status == 2) $paid = 'Cancelled';

            $url = site_url('rooms/receipt/'.$r->order_id);
            $action = "window.open('".$url."','receipt','width=400')";

            $action2 = null;
            if($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) {
                $action2 = '<div class="dropdown">
                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="'.site_url('rooms/booking_details/'.$r->order_id).'">View</a></li>
                        <li><a href="#" onclick="'.$action.'" >Print</a></li>
                        <li><a href="'.site_url('rooms/delete_booking/'.$r->order_id).'"> Delete</a></li>
                    </ul>
                </div> ';
              }

            $data[] = array(
                  $r->bill_no,
                  $r->customer_supplier_name,
                  //$r->eating_table_name,
                  $r->date_time,
                  //$r->transaction_type_name,
                  $r->from_date.' <b>to</b> '.$r->to_date,
                  $r->net_amount,
                  $r->paid_amount,
                  $r->paying_balance,
                  $paid,
                  //$narrative,
                  //$active,
                  $action2
                  
                  
             );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($bookings),
            "recordsFiltered" => count($bookings),
            "data" => $data
          );
        echo json_encode($output);
        exit();
    }

    public function booking_details ($id) {
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'booking_details';

        $this->data['page'] = 'Booking Details';

        $this->data['order_header'] = $this->Majorselects->order_profile($id);
        $this->data['rooms_booked'] = $this->Room_Model->rooms_booked($id);

        // echo $this->data['order_header'];
        // exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('rooms/booking_profile', $this->data);
        $this->load->view('inc/footer');
    }




    public function activate_room($id) {
        $form_data = array( "active" => 1);
        $condition = array( "room_id" => $id);
        if($this->Inserts->update_data('rooms',$form_data,$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function deactivate_room($id) {
        $form_data = array( "active" => 0);
        $condition = array( "room_id" => $id);
        if($this->Inserts->update_data('rooms',$form_data,$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function delete_booking($id) {
        $q1 = $this->db->query("DELETE FROM rooms_booked WHERE order_id = '$id' ");
        if($q1) {
            $q2 = $this->db->query("DELETE FROM orders WHERE order_id = '$id' ");
            if($q2) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            } else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Deletion failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($this->session->userdata('referred_from'));
            }
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Deletion failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }







}
