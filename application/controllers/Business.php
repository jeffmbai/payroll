<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends MY_Controller {

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
            $this->load->model('Business_Model');
            $this->load->model('Users_Model');
            $this->load->model('Sms_Model','sms');
            $this->load->model('Debt_Model','debt');
            
            $this->data['active_user'] = $this->Majorselects->get_user();

            date_default_timezone_set('Africa/Nairobi');
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
    
    /** Sales Start */
    public function sales () {
        $this->data['page'] = 'Sales';
        $this->session->set_userdata('referred_from', current_url());

        //$this->data['sales'] = $this->Business_Model->sales();  //user datatables below

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/sales', $this->data);
        $this->load->view('inc/footer');
    }
    public function all_sales () {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $sales = $this->Business_Model->sales();
        
        $data = array();
        foreach($sales as $r) {
            // $narrative = $r->narrative;
            // $active = ($r->active == 1 ? "True" : "False");
            if($r->paid_status == 1) $paid = 'Paid';
            elseif($r->paid_status == 0) $paid = 'Pending';
            elseif($r->paid_status == 2) $paid = 'Cancelled';

            $url = site_url('business/sales_receipt/'.$r->order_id);
            //$action = "window.open('".$url."','receipt','width=400')";
            $action = "window.open('".$url."','receipt','width=350')";
            $discount = 0;
            if($r->discount != null || $r->discount != '') $discount = $r->discount;

            $data[] = array(
                '<a href="'.site_url('business/sale_profile/'.$r->order_id).'"> '.$r->bill_no.' </a>',
                $r->customer_supplier_name,
                $r->eating_table_name,
                $r->date_time,
                $r->transaction_type_name,
                number_format((float)$r->net_amount, 2),
                number_format((float)$r->paid_amount, 2),
                number_format((float)$r->paying_balance, 2),
                number_format((float)$discount, 2),
                $paid,
                //$narrative,
                //$active,
                '<div class="dropdown">
                    <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu p-2">
                        <li><a href="'.site_url('posale/sale_edit/'.$r->order_id).'"> Edit</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="'.site_url('business/sale_profile/'.$r->order_id).'"> View</a></li>
                        <li><a href="'.site_url('business/sale_invoice/'.$r->order_id).'"> Invoice</a></li>
                        <li><a href="'.site_url('business/sale_delivery_note/'.$r->order_id).'">Delivery Note</a></li>
                        <li><a href="#" onclick="'.$action.'" > Print</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="'.site_url('delete/order/'.$r->order_id).'"> Delete</a></li>
                    </ul>
                </div> '
             );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($sales),
            "recordsFiltered" => count($sales),
            "data" => $data
          );
        echo json_encode($output);
        exit();
    }

    public function sale_profile ($orderID) {
        $this->data['page'] = 'Sale Profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['order_payments'] = $this->Business_Model->order_payments($orderID);

        $this->data['all_items'] = $this->Business_Model->all_items();
        $this->data['payment_modes'] = $this->db->where("is_paymentmode", 1)->get('vw_accounts')->result();
        $this->data['buyers'] = $this->Users_Model->business_users(4);
        
        $this->data['order_header'] = $this->Majorselects->order_profile($orderID);
        $this->data['order_items'] = $this->Majorselects->order_items($orderID);
        
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/sale_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /** Sales End */

    /** New Sale Start */
    public function new_sale () {
        $this->data['page'] = 'New Sale';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_items'] = $this->Business_Model->all_items();
        $this->data['payment_modes'] = $this->db->where("is_paymentmode", 1)->get('vw_accounts')->result();
        $this->data['eating_tables'] = $this->Majorselects->all_eating_tables();
        $this->data['buyers'] = $this->Users_Model->business_users(4);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/new_sale', $this->data);
        $this->load->view('inc/footer');
    }
    /** New Sale End */
    
    
    /** New Purchase Start */
    public function new_purchase () {
        $this->data['page'] = 'New Purchase';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['buyers'] = $this->Users_Model->business_users(3);
        
        $this->data['brands'] = $this->Majorselects->all_brands();
        // $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['all_attributes'] = $this->Majorselects->all_attributes();
        $this->data['all_tax_types'] = $this->Majorselects->all_tax_types();
        $this->data['all_units'] = $this->Majorselects->all_units();
        $this->data['all_items'] = $this->Business_Model->sale_purchase('purchase');

        $this->data['payment_modes'] = $this->db->where("is_paymentmode", 1)->get('vw_accounts')->result();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/new_purchase', $this->data);
        $this->load->view('inc/footer');
    }
    /** New Purchase End */

     /** Payments Start */
     public function payments () {
        $this->data['page'] = 'payments';
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'Payments';

        $this->data['payments'] = $this->Business_Model->payments();
        #var_dump($this->data['payments']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/payments', $this->data);
        $this->load->view('inc/footer');
    }
    /** Payments End */

    /* Purchase Start */
    public function purchases () {
        $this->data['page'] = 'purchases';
        $this->session->set_userdata('referred_from', current_url());

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/purchases', $this->data);
        $this->load->view('inc/footer');
    }
    public function all_purchases () {     
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $purchases = $this->Business_Model->purchases();
                
        $data = array();
        foreach($purchases as $r) {
            // $narrative = $r->narrative;
            // $active = ($r->active == 1 ? "True" : "False");
            if($r->paid_status == 1) $paid = 'Paid';
            elseif($r->paid_status == 0) $paid = 'Pending';
            elseif($r->paid_status == 2) $paid = 'Cancelled';

            $paid_amount = 0;
            $paid_amount = $this->db->select_sum('payment_amount')->where('order_id', $r->order_id)->get('order_payments')->row('payment_amount');

            $url = site_url('business/sales_receipt/'.$r->order_id);
            $action = "window.open('".$url."','receipt','width=400')";

            $data[] = array(
                '<a href="'.site_url('business/purchase_profile/'.$r->order_id).'"> '.$r->bill_no.' </a>',
                $r->customer_supplier_name,
                //$r->eating_table_name,
                date('d-m-Y', strtotime($r->date_time)),
                $r->transaction_type_name,
                number_format($r->net_amount, 2),
                number_format($paid_amount,2),
                number_format($r->paying_balance, 2),
                $paid,
                //$narrative,
                //$active,
                '
                    <div class="dropdown">
                        <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu p-2">
                            <li><a href="'.site_url('business/purchase_profile/'.$r->order_id).'">View</a></li>
                            <li><a href="#" onclick="'.$action.'" >Print</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="'.site_url('delete/order/'.$r->order_id).'"> Delete</a></li>
                        </ul>
                    </div> 
                '
             );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($purchases),
            "recordsFiltered" => count($purchases),
            "data" => $data
          );
        echo json_encode($output);
        exit();
    }
    public function purchase_profile ($orderID) {
        $this->data['page'] = 'Purchase Profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['order_profile'] = $this->Majorselects->order_profile($orderID);
        $this->data['order_items'] = $this->Majorselects->order_items($orderID);

        $this->data['order_payments'] = $this->Business_Model->order_payments($orderID);

        $this->data['all_items'] = $this->Business_Model->all_items();
        $this->data['payment_modes'] = $this->db->where("is_paymentmode", 1)->get('vw_accounts')->result();
        $this->data['buyers'] = $this->Users_Model->business_users(3);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/purchase_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Purchase End */
    /** Cash Purchase Start */
    public function cash_purchase () {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['brands_models'] = $this->Majorselects->brands_models();
        $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['buyers'] = $this->Users_Model->business_users(4);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/cash_purchase', $this->data);
        $this->load->view('inc/footer');
    }
    /** Cash Purchase End */
    /** Credit Purchase Start */
    public function credit_purchase () {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['brands_models'] = $this->Majorselects->brands_models();
        $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['buyers'] = $this->Users_Model->business_users(4);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/credit_purchase', $this->data);
        $this->load->view('inc/footer');
    }
    /** Credit Purchase End */
    #===========================================================================


    ##request items start
    public function item_request () {
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'Item Request';

        $this->data['item_request_list'] = $this->Business_Model->item_request_list();
        $this->data['orgs'] = $this->Majorselects->all_orgs();

        if($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) {
            $this->data['all_items'] = $this->Business_Model->sale_purchase('all');

            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('business/item_request', $this->data);
            $this->load->view('inc/footer');
        }
        else {
            $this->data['all_items'] = $this->Business_Model->sale_purchase('bar');

            $this->load->view('inc/pos_header', $this->data);
            $this->load->view('business/item_request', $this->data);
            $this->load->view('inc/footer');
        }
        
    }
    ##request items end
    public function add_item_request() {
        $itemd = $this->db->where('item_store_id', $_POST['item_store_id'])->get('items_store')->row();

        $form_data = array (
            "entity_id"         => $_SESSION['userid'],
            "item_store_id"     => $this->input->post("item_store_id"),
            "item_id"           => $itemd->item_id,
            "store_id"          => $itemd->store_id,
            "qty"               => $this->input->post("qty"),
            "request_date"      => $this->input->post("request_date"),
            "active"            => 0,
            "narrative"         => $this->input->post("narrative")
        );
        if($this->Inserts->insert_data('item_requests',$form_data)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Request successfully made.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Item request failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_item_request($id) {
        $form_data = array (
            "entity_id"         => $_SESSION['userid'],
            "item_id"           => $this->input->post("item_id"),
            "qty"               => $this->input->post("qty"),
            "request_date"      => $this->input->post("request_date"),
            "active"            => 0,
            "narrative"         => $this->input->post("narrative")
        );
        $condition = array("item_request_id" => $id);

        if($this->Inserts->update_data('item_requests',$form_data,$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function approve_item_request($id) {
        $form_data = array (
            "active" => 1,
            "approver_id" => $_SESSION['userid']
        );
        $condition = array("item_request_id" => $id);

        if($this->Inserts->update_data('item_requests',$form_data,$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully approved. You can move the stock now below.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            //redirect($this->session->userdata('referred_from'));
            redirect(site_url('business/item_request'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_itemrequest ($id) {
        if($this->db->query("DELETE FROM item_requests WHERE item_request_id = '$id' ")) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Deletion failed. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    #===========================================================================


    ## Place order start
    public function place_order () {

        $resp = null;
        $lastID = null;
        $message = null;

        // purchase /sale order type
        $order_type = $_POST['order_type'];

        date_default_timezone_set('Africa/Nairobi');
        $paidStatus = 0; #defult is: not paid
        $transactionType = trim($this->input->post('transaction_type_id'));
        $payment_mode_id = (isset($_POST['payment_mode_id'])) ? $_POST['payment_mode_id'] : null;
        $other_reference = $this->input->post('reference');
        $tt_tax = $this->input->post('itemstax');
        $paid_amount = $this->input->post('paid_amount');
        $total_order = $this->input->post('total');
        $paying_balance = $this->input->post('paying_balance');

        // if($transactionType == 1) $paidStatus = 1;
        if(($total_order - $paid_amount) <= 0) {
            $paidStatus = 0;
        }

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

        $code = 'J' . $day. 'T' . $last_order . $random_code;

        $code = substr($code, 0, 10); #get the final code to a string of 10 characters
        #End of code generation

        $customer_supplier_id = 0; //walk-in customer by default

        $phone=$email=$name=null;
        if(isset($_POST['customer_name']) || isset($_POST['customer_phone']) || isset($_POST['customer_email'])) {
            $phone = trim($this->input->post('customer_phone'));
            $name = trim($this->input->post('customer_name'));
            $email = trim($this->input->post('customer_email'));
        }        

        if($this->input->post('cutomer_supplier_id') != 0) {
            //assign the ID appropriately
            $customer_supplier_id = trim($this->input->post('cutomer_supplier_id'));
        } elseif(isset($_POST['customer_name']) || isset($_POST['customer_phone']) || isset($_POST['customer_email'])) {
            //verify if customer is already registered
        
            $select = $this->db->where("phone = '$phone' OR email = '$email'")->get('entitys');
            if($select->num_rows() == 0) {
                //register this new user/customer then get their entity_id
                $fname = null;
                $sname = null;

                if($name != '' && $phone != '' && $email != '') {
                    $str1 = (explode(" ",$name));
                    $fname = $str1[0];
                    $sname = ($str1[1]) ? $str1[1] : '';
                    $regiterCustomer = $this->db->query(" INSERT INTO entitys (firstname, secondname, email, phone, org_id, sub_department_id, system_role)
                            VALUES ('$fname', '$sname', '$email', '$phone', '$_SESSION[orgid]', 1, 4) ");
                    if(!$regiterCustomer){
                        $resp = $this->db->error(); 
                        echo '{ "resp" : "0", "message" : "'.$resp.'" }';
                        exit();
                    } else {
                        //get last row id
                        $customer_supplier_id = $this->db->insert_id();
                    }
                } else {
                    $customer_supplier_id = 0;
                }
                
            } else {
                $customer_supplier_id = $select->row('entity_id');
            }
        } elseif($this->input->post('cutomer_supplier_id') == null) {
            $customer_supplier_id = 0;
        } else {
            $customer_supplier_id = 0;
        }

        $form_data = array(
            "bill_no"             => $code,
            "org_id"              => $this->input->post('store_id'), //defaulrt
            "entity_id"           => $_SESSION['userid'],
            "transaction_type_id" => $transactionType,
            "customer_supplier_id"=> $customer_supplier_id,
            "eating_table_id"     => $eating_table_id,
            "tax_charge"          => $tt_tax,
            "service_charge"      => 0,
            "reference"           => $other_reference,
            "date_time"           => date('Y-m-d'),
            "payment_mode_id"     => $payment_mode_id,
            "paid_amount"         => $paid_amount,
            "paying_balance"      => $this->input->post('paying_balance'),
            "change_return"       => $this->input->post('change_return'),
            "discount"            => $this->input->post('discount'),
            "net_amount"          => $total_order,
            "paid_status"         => $paidStatus
        );

        $tt_buying_price = 0;
        if($this->db->insert('orders',$form_data)) {
            $lastID = $this->db->insert_id();
            $order_id = $lastID;

            if($paying_balance > 0) {
                // mark the table as inactive/booked to avoid rebooking before the bill is cleared
                $this->db->update('eating_tables', array('active' => 0), array('eating_table_id' => $eating_table_id));
            }
            
            $arrLength = COUNT($_POST['item']);
            $order_data = array();
            for($lp = 0; $lp < $arrLength; $lp++) {

                $order_data[] = array(
                    "order_id" => $order_id,
                    "store_id" => $_POST['store_id'],
                    "transaction_type_id" => $transactionType,
                    "item_id" => $_POST['item'][$lp],

                    "qty" => $_POST['qty'][$lp],
                    "tax_id" => $_POST['tax'][$lp],
                    "buying_price" => (isset($_POST['buying_price'][$lp])) ? $_POST['buying_price'][$lp] : $_POST['rate'][$lp],
                    "rate" => $_POST['rate'][$lp],
                    "amount" => $_POST['amount'][$lp],

                    "entity_id" => $_SESSION['userid']
                );

                $tt_buying_price += $_POST['amount'][$lp];
                    
            }

            if($this->db->insert_batch('order_items',$order_data)) {
                $resp = 1;
                $message = 'Transaction Completed';
            } else {
                // delete the transactions
                $cond = array( "order_id" => $order_id );
                $this->db->delete('orders', $cond);
                $this->db->delete('order_items', $cond);
                $resp = 3;
                $message = json_encode($this->db->error());
            }   
            
            $thisDate = date('Y-m-d');

            // accounting start  *************************************
            $credit_vouchers = array();

            $Inventory = $this->db->where('account_code', '500001')->get('accounts')->row();

            if($order_type == 'purchase') {
                // Raise the transaction if purchase
                $Purchase_Tax_Receivable = $this->db->where('account_code', '500003')->get('accounts')->row(); //dr
                $Purchases	= $this->db->where('account_code', '800001')->get('accounts')->row(); //dr
                $Purchase_payable = $this->db->where('account_code', '600001')->get('accounts')->row(); //cr

                $credit_vouchers[] = array( // dr inventory
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Inventory->account_id,
                    "account_code"          => $Inventory->account_code,
                    "account_type_id"       => $Inventory->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $tt_buying_price,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Purchase: '.$code,
                );
                $credit_vouchers[] = array( // dr Purchases
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Purchases->account_id,
                    "account_code"          => $Purchases->account_code,
                    "account_type_id"       => $Purchases->account_type_id,
                    "subaccount_type_id"    => $Purchases->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $tt_buying_price,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Purchase: '.$code,
                );
                $credit_vouchers[] = array( // cr Purchase_payable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Purchase_payable->account_id,
                    "account_code"          => $Purchase_payable->account_code,
                    "account_type_id"       => $Purchase_payable->account_type_id,
                    "subaccount_type_id"    => $Purchase_payable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $tt_buying_price,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Purchase: '.$code,
                );
                $this->db->insert_batch('vouchers', $credit_vouchers);
            } elseif($order_type == 'sale') {
                // Raise the transaction if sale
                $Sales	= $this->db->where('account_code', '700001')->get('accounts')->row(); //cr
                $Sales_receivable = $this->db->where('account_code', '500002')->get('accounts')->row(); //dr
                $Sales_tax_payable = $this->db->where('account_code', '600003')->get('accounts')->row(); //cr

                $credit_vouchers[] = array( // cr inventory
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Inventory->account_id,
                    "account_code"          => $Inventory->account_code,
                    "account_type_id"       => $Inventory->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $tt_buying_price,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Sale: '.$code,
                );
                $credit_vouchers[] = array( // cr Sales
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales->account_id,
                    "account_code"          => $Sales->account_code,
                    "account_type_id"       => $Sales->account_type_id,
                    "subaccount_type_id"    => $Sales->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $tt_buying_price,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Sale: '.$code,
                );
                $credit_vouchers[] = array( // dr Sales_receivable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales_receivable->account_id,
                    "account_code"          => $Sales_receivable->account_code,
                    "account_type_id"       => $Sales_receivable->account_type_id,
                    "subaccount_type_id"    => $Sales_receivable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $tt_buying_price,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Sale: '.$code,
                );
                if($tt_tax > 0) {
                    // only apply if there exist tax
                    $credit_vouchers[] = array( // cr Sales_tax_payable
                        "org_id"                => $_SESSION['orgid'],
                        "account_id"            => $Sales_tax_payable->account_id,
                        "account_code"          => $Sales_tax_payable->account_code,
                        "account_type_id"       => $Sales_tax_payable->account_type_id,
                        "subaccount_type_id"    => $Sales_tax_payable->subaccount_type_id,
                        "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                        "customer_supplier_id"  => $customer_supplier_id,
                        "table_id"              => $order_id,            
                        "table_name"            => 'orders',           
                        "voucher_code"          => $code,
                        "reference"             => $other_reference,
                        "voucher_amount"        => $tt_tax,
                        "voucher_type"          => 'cr',
                        "transaction_date"      => $thisDate,
                        "created_by"            => $_SESSION['userid'],
                        "approved_by"           => '',
                        "narrative"             => 'New Sale: '.$code,
                    );
                }
                
                $this->db->insert_batch('vouchers', $credit_vouchers);
            }

            // if payment is done, then record the transaction
            if($paid_amount > 0 && $payment_mode_id != null) {
                $sale_vouchers = array();
                $Paying_Account = $this->db->where('account_id', $payment_mode_id)->get('accounts')->row(); // receiving/expensing account

                // post this to order_payments table
                $order_payments = array (
                    "entity_id"             => $_SESSION['userid'],
                    "order_id"              => $order_id,
                    "account_id"            => $payment_mode_id,
                    "payment_amount"        => $paid_amount,
                    "payment_date"          => $thisDate,
                    "transaction_code"      => $code,
                    "other_reference"       => $other_reference,
                    "bank_account_number"   => '',
                    "check_number"          => '',
                    "check_maturity_date"   => '',
                    "paid_by"               => $customer_supplier_id,
                    "narrative"             => ($order_type == 'purchase') ? 'Purchase payment; cash.' : 'Sale payment; cash.'
                );
                if($this->db->insert('order_payments', $order_payments)) {
                    $payment_id = $this->db->insert_id();

                    if($order_type == 'purchase') {
                        // now do the dr cr
                        if($Paying_Account):
                        $sale_vouchers[] = array( // cr Paying_Account
                            "org_id"                => $_SESSION['orgid'],
                            "account_id"            => $Paying_Account->account_id,
                            "account_code"          => $Paying_Account->account_code,
                            "account_type_id"       => $Paying_Account->account_type_id,
                            "subaccount_type_id"    => $Inventory->subaccount_type_id,
                            "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                            "customer_supplier_id"  => $customer_supplier_id,
                            "table_id"              => $payment_id,            
                            "table_name"            => 'order_payments',           
                            "voucher_code"          => $code,
                            "reference"             => $other_reference,
                            "voucher_amount"        => $paid_amount,
                            "voucher_type"          => 'cr',
                            "transaction_date"      => $thisDate,
                            "created_by"            => $_SESSION['userid'],
                            "approved_by"           => '',
                            "narrative"             => 'New Purchase Payment: '.$code,
                        );
                        endif;
                        $sale_vouchers[] = array( // cr Purchases
                            "org_id"                => $_SESSION['orgid'],
                            "account_id"            => $Purchases->account_id,
                            "account_code"          => $Purchases->account_code,
                            "account_type_id"       => $Purchases->account_type_id,
                            "subaccount_type_id"    => $Purchases->subaccount_type_id,
                            "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                            "customer_supplier_id"  => $customer_supplier_id,
                            "table_id"              => $payment_id,            
                            "table_name"            => 'order_payments',           
                            "voucher_code"          => $code,
                            "reference"             => $other_reference,
                            "voucher_amount"        => $paid_amount,
                            "voucher_type"          => 'cr',
                            "transaction_date"      => $thisDate,
                            "created_by"            => $_SESSION['userid'],
                            "approved_by"           => '',
                            "narrative"             => 'New Purchase Payment: '.$code,
                        );
                        $sale_vouchers[] = array( // dr Purchase_payable
                            "org_id"                => $_SESSION['orgid'],
                            "account_id"            => $Purchase_payable->account_id,
                            "account_code"          => $Purchase_payable->account_code,
                            "account_type_id"       => $Purchase_payable->account_type_id,
                            "subaccount_type_id"    => $Purchase_payable->subaccount_type_id,
                            "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                            "customer_supplier_id"  => $customer_supplier_id,
                            "table_id"              => $payment_id,            
                            "table_name"            => 'order_payments',           
                            "voucher_code"          => $code,
                            "reference"             => $other_reference,
                            "voucher_amount"        => $paid_amount,
                            "voucher_type"          => 'dr',
                            "transaction_date"      => $thisDate,
                            "created_by"            => $_SESSION['userid'],
                            "approved_by"           => '',
                            "narrative"             => 'New Purchase Payment: '.$code,
                        );
                    } elseif($order_type == 'sale') {
                        if($Paying_Account):
                        $sale_vouchers[] = array( // dr Paying_Account
                            "org_id"                => $_SESSION['orgid'],
                            "account_id"            => $Paying_Account->account_id,
                            "account_code"          => $Paying_Account->account_code,
                            "account_type_id"       => $Paying_Account->account_type_id,
                            "subaccount_type_id"    => $Inventory->subaccount_type_id,
                            "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                            "customer_supplier_id"  => $customer_supplier_id,
                            "table_id"              => $payment_id,            
                            "table_name"            => 'order_payments',           
                            "voucher_code"          => $code,
                            "reference"             => $other_reference,
                            "voucher_amount"        => $paid_amount,
                            "voucher_type"          => 'dr',
                            "transaction_date"      => $thisDate,
                            "created_by"            => $_SESSION['userid'],
                            "approved_by"           => '',
                            "narrative"             => 'New Sale Payment: '.$code,
                        );
                        endif;
                        $sale_vouchers[] = array( // dr Sales
                            "org_id"                => $_SESSION['orgid'],
                            "account_id"            => $Sales->account_id,
                            "account_code"          => $Sales->account_code,
                            "account_type_id"       => $Sales->account_type_id,
                            "subaccount_type_id"    => $Sales->subaccount_type_id,
                            "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                            "customer_supplier_id"  => $customer_supplier_id,
                            "table_id"              => $order_id,            
                            "table_name"            => 'orders',           
                            "voucher_code"          => $code,
                            "reference"             => $other_reference,
                            "voucher_amount"        => $tt_buying_price,
                            "voucher_type"          => 'dr',
                            "transaction_date"      => $thisDate,
                            "created_by"            => $_SESSION['userid'],
                            "approved_by"           => '',
                            "narrative"             => 'New Sale: '.$code,
                        );
                        $sale_vouchers[] = array( // cr Sales_receivable
                            "org_id"                => $_SESSION['orgid'],
                            "account_id"            => $Sales_receivable->account_id,
                            "account_code"          => $Sales_receivable->account_code,
                            "account_type_id"       => $Sales_receivable->account_type_id,
                            "subaccount_type_id"    => $Sales_receivable->subaccount_type_id,
                            "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                            "customer_supplier_id"  => $customer_supplier_id,
                            "table_id"              => $order_id,            
                            "table_name"            => 'orders',           
                            "voucher_code"          => $code,
                            "reference"             => $other_reference,
                            "voucher_amount"        => $tt_buying_price,
                            "voucher_type"          => 'cr',
                            "transaction_date"      => $thisDate,
                            "created_by"            => $_SESSION['userid'],
                            "approved_by"           => '',
                            "narrative"             => 'New Sale: '.$code,
                        );
                    }
                    
                    $this->db->insert_batch('vouchers', $sale_vouchers);
                } else {
                    // payment not received
                }
            }

            if($customer_supplier_id != 0) {
                // send sms only if not walk-in
                $phone = $this->db->where('entity_id', $customer_supplier_id)->get('entitys')->row('phone');
                $sent = 0;
                $smsmessage = null;
                if($order_type == 'purchase') {
                    $smsmessage = $code . '. Purchase has been made successfully.';
                } elseif($order_type == 'sale') {
                    $diff_x = $total_order - $paid_amount;
                    $smsmessage = $code . '. Order amount '.$total_order.', balance ' . $diff_x;
                }
                
                // if($this->data['credo'] > 0) 
                $sent = 1;
                $sms_data = array(
                    "org_id" => $_SESSION['orgid'],
                    "entity_id" => $_SESSION['userid'],
                    "template_id" => 1,
                    "table_id" => $order_id,
                    "table_name" => 'orders',
                    "code" => $code,
                    "phone" => $phone,
                    "message" => $smsmessage,
                    "sent" => $sent,
                    "narrative" => $order_type,
                );
                $this->db->insert('sms',$sms_data);
                if($sent == 1) $this->sms->send($phone, $smsmessage); // sends the sms automatically

            }
            // accounting end *************************************            
            
        }
        else {
            #order not created
            $resp = 2;
            $message = json_encode($this->db->error());
            //$message = json_encode($this->db->last_query());
        }
        
        echo '{ "resp" : "'.$resp.'", "message" : "'.$message.'", "last_id" : "'.$lastID.'" }';
    }
    ## Place order end

    ## Update sale order start
    public function update_sale_order ($id) {

        $resp = null;
        $lastID = null;
        $message = null;        

        $order = $this->db->where('order_id', $id)->get('orders')->row();

        date_default_timezone_set('Africa/Nairobi');

        $tt_tax = $this->input->post('itemstax');
        $total_order = $this->input->post('total');
        $initial_order_value = $order->net_amount;

        $eating_table_id = $this->input->post('eating_table_id');
        $code = $order->bill_no;
        $other_reference = $order->reference;
        $customer_supplier_id = $order->customer_supplier_id;   
        
        $total_paid = 0;
        $total_paid = $this->db->select_sum('payment_amount')->where('order_id', $id)->get('order_payments')->row('payment_amount');

        $paying_balance = $total_order - $total_paid;

        $form_data = array(
            "bill_no"             => $code,
            "org_id"              => $order->org_id, //defaulrt
            "entity_id"           => $_SESSION['userid'],
            "customer_supplier_id"=> $customer_supplier_id,
            "eating_table_id"     => $eating_table_id,
            "tax_charge"          => $tt_tax,
            "service_charge"      => 0,
            "paying_balance"      => $paying_balance,
            // "change_return"       => $this->input->post('change_return'),
            // "discount"            => $this->input->post('discount'),
            "net_amount"          => $total_order,
            "narrative"           => 'Editted',
        );

        $tt_buying_price = 0;
        if($this->db->update('orders',$form_data, array('order_id' => $id))) {
            $order_id = $id;

            // delete initial order items
            // $this->db->delete('order_items', array('order_id'=>$id));
            // just add these new items
            
            $arrLength = COUNT($_POST['item']);
            $order_data = array();
            for($lp = 0; $lp < $arrLength; $lp++) {

                // skip if old items
                if($_POST['is_editted'][$lp] == 0) continue;

                // assing session new print_session
                $_SESSION['print_session'] = $_POST['print_session'][$lp];

                $order_data[] = array(
                    "order_id" => $order_id,
                    "store_id" => $order->org_id,
                    "transaction_type_id" => $order->transaction_type_id,
                    "item_id" => $_POST['item'][$lp],

                    "qty" => $_POST['qty'][$lp],
                    "tax_id" => $_POST['tax'][$lp],
                    "buying_price" => (isset($_POST['buying_price'][$lp])) ? $_POST['buying_price'][$lp] : $_POST['rate'][$lp],
                    "rate" => $_POST['rate'][$lp],
                    "amount" => $_POST['amount'][$lp],

                    "is_editted" => $_POST['is_editted'][$lp],
                    "print_session" => $_POST['print_session'][$lp],
                    "entity_id" => $_SESSION['userid'],
                );

                $tt_buying_price += $_POST['amount'][$lp];
                    
            }

            if($this->db->insert_batch('order_items',$order_data)) {
                $resp = 1;
                $message = 'Transaction Completed';
            } else {
                // delete the transactions
                $cond = array( "order_id" => $order_id );
                $this->db->delete('orders', $cond);
                $this->db->delete('order_items', $cond);
                $resp = 3;
                $message = json_encode($this->db->error());
            }   
            
            $thisDate = date('Y-m-d');

            // accounting start  *************************************
            $total_order = $this->input->post('total');
            $initial_order_value = $order->net_amount;
            $order_difference = $total_order - $initial_order_value;

            $credit_vouchers = array();

            $Inventory = $this->db->where('account_code', '500001')->get('accounts')->row();
            $Sales	= $this->db->where('account_code', '700001')->get('accounts')->row(); //cr
            $Sales_receivable = $this->db->where('account_code', '500002')->get('accounts')->row(); //dr
            $Sales_tax_payable = $this->db->where('account_code', '600003')->get('accounts')->row(); //cr

            if($order_difference == 0) {
                // do not do the journals
            } elseif($order_difference > 0) {
                // do journals of with the increased order value(+ve and straight forward)
                $credit_vouchers[] = array( // cr inventory
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Inventory->account_id,
                    "account_code"          => $Inventory->account_code,
                    "account_type_id"       => $Inventory->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $order_difference,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Editted Sale: '.$code,
                );
                $credit_vouchers[] = array( // cr Sales
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales->account_id,
                    "account_code"          => $Sales->account_code,
                    "account_type_id"       => $Sales->account_type_id,
                    "subaccount_type_id"    => $Sales->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $order_difference,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Editted Sale: '.$code,
                );
                $credit_vouchers[] = array( // dr Sales_receivable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales_receivable->account_id,
                    "account_code"          => $Sales_receivable->account_code,
                    "account_type_id"       => $Sales_receivable->account_type_id,
                    "subaccount_type_id"    => $Sales_receivable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => $order_difference,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Editted Sale: '.$code,
                );
                
            } elseif($order_difference < 0) {
                // do journals of with the reduced order value(-ve and reverse)
                $credit_vouchers[] = array( // dr inventory
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Inventory->account_id,
                    "account_code"          => $Inventory->account_code,
                    "account_type_id"       => $Inventory->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => -1 * $order_difference,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Editted Sale: '.$code,
                );
                $credit_vouchers[] = array( // dr Sales
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales->account_id,
                    "account_code"          => $Sales->account_code,
                    "account_type_id"       => $Sales->account_type_id,
                    "subaccount_type_id"    => $Sales->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "voucher_code"          => $code,
                    "reference"             => $other_reference,
                    "voucher_amount"        => -1 * $order_difference,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Editted Sale: '.$code,
                );
                $credit_vouchers[] = array( // cr Sales_receivable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales_receivable->account_id,
                    "account_code"          => $Sales_receivable->account_code,
                    "account_type_id"       => $Sales_receivable->account_type_id,
                    "subaccount_type_id"    => $Sales_receivable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $customer_supplier_id,
                    "table_id"              => $order_id,            
                    "table_name"            => 'orders',           
                    "reference"             => $other_reference,
                    "voucher_amount"        => -1 * $order_difference,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Editted Sale: '.$code,
                );

            }

            // now submit
            if(count($credit_vouchers) > 0)
                $this->db->insert_batch('vouchers', $credit_vouchers);

            // accounting end *************************************   
            
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Order Successfuly Updated.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            
        }
        else {
            #order not created
            $resp = 2;
            $message = json_encode($this->db->error());
            //$message = json_encode($this->db->last_query());
        }
        
        echo '{ "resp" : "'.$resp.'", "message" : "'.$message.'", "last_id" : "'.$lastID.'" }';
    }
    ## Update sale order end

    ## Create Invoice start
    public function create_invoice () {
        #get the person making the order

        $resp = null;
        $lastID = null;
        $message = null;

        $paidStatus = trim($this->input->post('paidStatus'));
        $transactionType = 5;

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

        if($this->input->post('cutomer_supplier_id') !== null) {
            //assign the ID appropriately
            $customer_supplier_id = trim($this->input->post('cutomer_supplier_id'));
        }

        $form_data = array(
            "bill_no"             => $code,
            "org_id"              => $_SESSION['orgid'],
            "entity_id"           => $_SESSION['userid'],
            "transaction_type_id" => $transactionType,
            "customer_supplier_id"=> $customer_supplier_id,
            #"customer_supplier_id"=> trim($this->input->post('cutomer_supplier_id')),
            #"tax_charge"          => $this->input->post('itemstax'),
            "date_time"           => $this->input->post('date_time'),
            "payment_due"         => $this->input->post('payment_due'),
            "payment_mode_id"     => $this->input->post('payment_mode_id'),
            "paid_amount"         => $this->input->post('paid_amount'),
            "paying_balance"      => $this->input->post('paying_balance'),
            #"change_return"       => $this->input->post('change_return'),
            #"net_amount"          => $this->input->post('total'),
            "net_amount"          => $this->input->post('paid_amount'),
            "narrative"           => $this->input->post('narrative'),
            "paid_status"         => $paidStatus
        );

        if($this->Inserts->insert_data('orders',$form_data)) {
            #get the order id
            $lastID = $this->db->insert_id(); #get last inserted id in order table

            $resp = 1;
            $message = 'Transaction Completed';            
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
    ## Create Invoice end

    ## Update order start 
    public function update_order ($id) {
        #get the person updating the order

        ##var_dump($_POST); exit();

        $resp = null;
        $lastID = null;
        $message = null;

        $paidStatus = 0; #defult is: not paid
        $transactionType = trim($this->input->post('transaction_type_id'));
        if($transactionType == 1) $paidStatus = 1;

        $form_data = array(
            "entity_id"           => $_SESSION['userid'],
            "transaction_type_id" => $transactionType,
            "customer_supplier_id"=> trim($this->input->post('cutomer_supplier_id')),
            "tax_charge"          => $this->input->post('itemstax'),
            "date_time"           => $this->input->post('date_time'),
            "payment_mode_id"     => $this->input->post('payment_mode_id'),
            "paid_amount"         => $this->input->post('paid_amount'),
            "paying_balance"      => $this->input->post('paying_balance'),
            "change_return"       => $this->input->post('change_return'),
            "discount"            => $this->input->post('discount'),
            "net_amount"          => $this->input->post('total'),
            "paid_status"         => $paidStatus
        );

        $condition = array( "order_id" => $id );

        if($this->Inserts->update_data('orders',$form_data, $condition)) {
            #get the order id
            $order_id = $id;
            $arrLength = COUNT($_POST['item']);
            
            if($transactionType == 1 || $transactionType == 3) {
                #delete all items then readd them again into the table
                $this->db->query("DELETE FROM order_items WHERE order_id = $id");

                #cash/credit sales
                for($lp = 0; $lp < $arrLength; $lp++) {
                    $order_id = $order_id;
                    $item_id  = $_POST['item'][$lp];
                    $qty      = $_POST['qty'][$lp];
                    $tax      = $_POST['tax'][$lp];
                    $rate     = $_POST['rate'][$lp];
                    $amount   = $_POST['amount'][$lp];
                    $query="INSERT INTO order_items (order_id, item_id, qty, tax_id, rate, amount)
                            VALUES ('$id','$item_id','$qty','$tax','$rate','$amount')";
    
                        if(!$this->db->query($query)) {
                            #first delete the initial header inserted
                            $delete1 = array( "order_id" => $id );
                            $this->Deletes->delete_data('orders', $delete1);
                            $this->Deletes->delete_data('order_items', $delete1);
                            #$this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! The transaction has failed. Please try again.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                            #redirect($this->session->userdata('referred_from'));
                            $resp = 3;
                            $message = 'Sorry!!! The transaction has failed. Please try again.';
                        break;
                        }
    
                }
            } elseif($transactionType == 2 || $transactionType == 4) {
                #delete all items then readd them again into the table
                //$deleteOrderItems = "DELETE FROM order_purchases WHERE order_id = $id";
                $this->db->query("DELETE FROM order_items WHERE order_id = $id");
                
                #cash/credit purchase
                for($lp = 0; $lp < $arrLength; $lp++) {
                    $order_id = $order_id;
                    $item_id  = $_POST['item'][$lp];
                    $qty      = $_POST['qty'][$lp];
                    $tax      = $_POST['tax'][$lp];
                    $rate     = $_POST['rate'][$lp];
                    $amount   = $_POST['amount'][$lp];
                    $query="INSERT INTO order_items (order_id, item_id, qty, tax_id, rate, amount)
                            VALUES ('$id','$item_id','$qty','$tax','$rate','$amount')";
                
                        if(!$this->db->query($query)) {
                            #first delete the initial header inserted
                            $delete1 = array( "order_id" => $id );
                            $this->Deletes->delete_data('orders', $delete1);
                            $this->Deletes->delete_data('order_purchases', $delete1);
                            #$this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! The transaction has failed. Please try again.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                            #redirect($this->session->userdata('referred_from'));
                            $resp = 3;
                            $message = 'Sorry!!! The transaction has failed. Please try again.';
                        break;
                        }
    
                }
            }
            
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
    ## Update order end 

    public function print_voucher ($id) {
        $this->data['payment'] = $this->Business_Model->payment_details($id);

        $this->load->view('reports/order_payment_voucher', $this->data);
   }
    #====================================================================================
    

    ## Item Return Start

    /** Purchase Sale Return Start */
    public function item_return () {
        #purhased/sales items that needs to be returned
        $this->permission_check('returns_view');
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Item Return';

        $this->data['item_returned'] = $this->Business_Model->item_returned();
        $this->data['item_status'] = $this->Majorselects->item_status();

        if($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) {
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('business/item_return', $this->data);
            $this->load->view('inc/footer');
        } else {
            $this->load->view('inc/pos_header', $this->data);
            $this->load->view('business/item_return', $this->data);
            $this->load->view('inc/footer');
        }
    }
    public function add_return() {
        $this->permission_check('returns_add');
        
        $entityid = $storeid = $return_condition = $item_status_id = $qty = $itemid = null;
        $qty = $_POST['qty'];
        $order_id = $_POST['order_id'];
        $return_condition = $_POST['return_condition'];
        $item_status_id = $this->input->post("item_status_id");
        $orderitemid = $this->input->post("order_item_id");

        $order = $this->db->where('order_id', $order_id)->get('orders')->row();
        $orderitem = $this->db->where('order_item_id', $orderitemid)->get('order_items')->row();

        $entityid = $order->entity_id;
        $storeid = $order->org_id;
        $itemid = $orderitem->item_id;

        if($qty > $orderitem->qty) {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Quantity exceeds the ordered quantity.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }

        $day = date('d');
        $permitted_chars    = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_code        =  substr(str_shuffle($permitted_chars), 0, 10);
        $code = 'J' . $day. 'T' . $random_code;

        $balance_qty = $orderitem->qty - $qty;

        $form_data = array (
            "reference"         => $code,
            "entity_id"         => $entityid,
            "item_id"           => $itemid,
            "item_status_id"    => $item_status_id,

            "store_id"          => $storeid,
            "order_id"          => $order_id,
            "order_item_id"     => $this->input->post("order_item_id"),
            "created_by"        => $_SESSION['userid'],
            "return_condition"  => $return_condition,
            "return_date"       => date('Y-m-d'),
            "qty"               => $qty,

            "active"            => 1,
            "narrative"         => $this->input->post("narrative")
        );
        if($this->db->insert('item_returned',$form_data)) {
            $return_id = $this->db->insert_id();

            if($return_condition == 'Good') {
                // update the item qty depending on the transaction type
                if($order->transaction_type_id == 1 || $order->transaction_type_id == 3) {
                    // Sale: Increase stock
                    $this->db->query("UPDATE items_store SET available_qty = available_qty + $qty WHERE store_id = '$storeid' AND item_id = '$itemid' ");
                } elseif($order->transaction_type_id == 2 || $order->transaction_type_id == 4) {
                    // Purchase: Decrease stock
                    $this->db->query("UPDATE items_store SET available_qty = available_qty - $qty WHERE store_id = '$storeid' AND item_id = '$itemid' ");
                }

                // reduce the qty from order_items            
                $this->db->query("UPDATE order_items SET qty_returned = $qty, qty = $balance_qty, amount = (rate  * $balance_qty) WHERE order_item_id = '$_POST[order_item_id]' AND item_id = '$itemid' ");
                // now do the voucher balancing;
                $this->return_accounting ($order_id, $return_id);
            }
            
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Transaction Completed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Transaction Failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function return_accounting ($order_id, $return_id) {
        // accounting start  *************************************
        $return = $this->db->where('item_return_id', $return_id)->get('item_returned')->row();

        $order = $this->db->where('order_id', $order_id)->get('orders')->row();
        $order_items = $this->db->where('order_id', $order_id)->get('order_items')->row();
        $transaction_type_id = $order->transaction_type_id;

        $total_order = $this->db->select_sum('amount')->where('order_id', $order_id)->get('order_items')->row('amount');

        $initial_order_value = $order->net_amount;
        $order_difference = $total_order - $initial_order_value;

        $credit_vouchers = array();

        $thisDate = date('Y-m-d');
        $code = $return->reference;

        $Inventory = $this->db->where('account_code', '500001')->get('accounts')->row();

        if($transaction_type_id == 1 || $transaction_type_id == 3) {
            // cash/credit purchase
            $Sales	= $this->db->where('account_code', '700001')->get('accounts')->row(); //cr
            $Sales_receivable = $this->db->where('account_code', '500002')->get('accounts')->row(); //dr
            $Sales_tax_payable = $this->db->where('account_code', '600003')->get('accounts')->row(); //cr

            if($order_difference == 0) {
                // do not do the journals
            } elseif($order_difference > 0) {
                // do journals of with the increased order value(+ve and straight forward)
                $credit_vouchers[] = array( // cr inventory
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Inventory->account_id,
                    "account_code"          => $Inventory->account_code,
                    "account_type_id"       => $Inventory->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order_id->customer_supplier_id,
                    "table_id"              => $return_id,            
                    "table_name"            => 'item_returned',           
                    "voucher_code"          => $code,
                    "reference"             => $order->bill_no,
                    "voucher_amount"        => $order_difference,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Returned Sale: '.$code,
                );
                $credit_vouchers[] = array( // cr Sales
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales->account_id,
                    "account_code"          => $Sales->account_code,
                    "account_type_id"       => $Sales->account_type_id,
                    "subaccount_type_id"    => $Sales->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order_id->customer_supplier_id,
                    "table_id"              => $return_id,            
                    "table_name"            => 'item_returned',           
                    "voucher_code"          => $code,
                    "reference"             => $order->bill_no,
                    "voucher_amount"        => $order_difference,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Returned Sale: '.$code,
                );
                $credit_vouchers[] = array( // dr Sales_receivable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales_receivable->account_id,
                    "account_code"          => $Sales_receivable->account_code,
                    "account_type_id"       => $Sales_receivable->account_type_id,
                    "subaccount_type_id"    => $Sales_receivable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order_id->customer_supplier_id,
                    "table_id"              => $return_id,            
                    "table_name"            => 'item_returned',           
                    "voucher_code"          => $code,
                    "reference"             => $order->bill_no,
                    "voucher_amount"        => $order_difference,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Returned Sale: '.$code,
                );
                
            } elseif($order_difference < 0) {
                // do journals of with the reduced order value(-ve and reverse)
                $credit_vouchers[] = array( // dr inventory
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Inventory->account_id,
                    "account_code"          => $Inventory->account_code,
                    "account_type_id"       => $Inventory->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order_id->customer_supplier_id,
                    "table_id"              => $return_id,            
                    "table_name"            => 'item_returned',           
                    "voucher_code"          => $code,
                    "reference"             => $order->bill_no,
                    "voucher_amount"        => -1 * $order_difference,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Returned Sale: '.$code,
                );
                $credit_vouchers[] = array( // dr Sales
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales->account_id,
                    "account_code"          => $Sales->account_code,
                    "account_type_id"       => $Sales->account_type_id,
                    "subaccount_type_id"    => $Sales->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order_id->customer_supplier_id,
                    "table_id"              => $return_id,            
                    "table_name"            => 'item_returned',           
                    "voucher_code"          => $code,
                    "reference"             => $order->bill_no,
                    "voucher_amount"        => -1 * $order_difference,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Returned Sale: '.$code,
                );
                $credit_vouchers[] = array( // cr Sales_receivable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales_receivable->account_id,
                    "account_code"          => $Sales_receivable->account_code,
                    "account_type_id"       => $Sales_receivable->account_type_id,
                    "subaccount_type_id"    => $Sales_receivable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order_id->customer_supplier_id,
                    "table_id"              => $return_id,            
                    "table_name"            => 'item_returned',           
                    "voucher_code"          => $code,
                    "reference"             => $order->bill_no,
                    "voucher_amount"        => -1 * $order_difference,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'Returned Sale: '.$code,
                );

            }
        } else {
            // cash/credit purchase
        }
        
        // now submit
        if(count($credit_vouchers) > 0) {
            if($this->db->insert_batch('vouchers', $credit_vouchers)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        // accounting end ************************************* 
    }
    public function update_return($id) {
        exit();
        $form_data = array (
            "entity_id"         => $_SESSION['userid'],
            "item_id"           => $this->input->post("item_id"),
            "item_status_id"    => $this->input->post("item_status_id"),
            "active"            => 1,
            "narrative"         => $this->input->post("narrative")
        );
        $condition = array("item_return_id");

        if($this->Inserts->update_data('item_returned',$form_data,$condition)) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully updated.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Updation failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    /** Purchase Sale Return End */

    ## Item Return End
    #=====================================================================================



    ##Order Payments Start
    public function new_order_payment ($orderID) {
        #generate the code
        $day = date('d');
        $permitted_chars    = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_code        =  substr(str_shuffle($permitted_chars), 0, 10);
        #get last order id
        $data['last_order'] = $orderID;
        $last_order = $orderID;

        $code = 'J' . $day. 'T' . $last_order . $random_code;

        // get order details
        $order_type = $_POST['order_type'];
        $order = $this->db->where('order_id', $orderID)->get('orders')->row();
        $thisDate = date('Y-m-d');

        // Raise the transaction
        $Inventory = $this->db->where('account_code', '500001')->get('accounts')->row(); 
        $Paying_Account = $this->db->where('account_id', $_POST['account_id'])->get('accounts')->row(); 
       
        $payment_amount = $this->input->post("payment_amount");
        $form_data = array (
            "entity_id"             => $_SESSION['userid'],
            "order_id"              => $orderID,
            "account_id"            => $this->input->post("account_id"),
            "payment_amount"        => $payment_amount,
            "payment_date"          => $this->input->post("payment_date"),
            "transaction_code"      => $code,
            "other_reference"       => $this->input->post("reference"),
            "bank_account_number"   => $this->input->post("bank_account_number"),
            "check_number"          => $this->input->post("check_number"),
            "check_maturity_date"   => $this->input->post("check_maturity_date"),
            "paid_by"               => $this->input->post("paid_by"),
            "narrative"             => $this->input->post("narrative")
        );

        if($this->db->insert('order_payments',$form_data)) {
            $payment_id = $this->db->insert_id();
            #deduct this paid amount from the balance existing in the orders table
            $updateQuery = 'UPDATE orders SET paying_balance = paying_balance - '.$payment_amount.' WHERE order_id = '.$orderID.' ';
            $this->db->query($updateQuery);
            // confirm if balance is settled
            $order_details = $this->db->where('order_id', $orderID)->get('orders')->row();
            if($order_details->paying_balance == 0) {
                // mark order as complete
                $this->db->update(
                    "orders",
                    array('paid_status' => 1),
                    array('order_id' => $orderID)
                );

                // make the table available now
                $this->db->update('eating_tables', array('active' => 1), array('eating_table_id' => $order_details->eating_table_id));
            }

            $sale_vouchers = array();
            // do the vouchers here
            if($order_type == 'purchase') {
                // $Purchase_Tax_Receivable = $this->db->where('account_code', '500003')->get('accounts')->row(); 
                $Purchases	= $this->db->where('account_code', '800001')->get('accounts')->row(); 
                $Purchase_payable = $this->db->where('account_code', '600001')->get('accounts')->row(); 
                
                $sale_vouchers[] = array( // cr Paying_Account
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Paying_Account->account_id,
                    "account_code"          => $Paying_Account->account_code,
                    "account_type_id"       => $Paying_Account->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order->customer_supplier_id,
                    "table_id"              => $payment_id,            
                    "table_name"            => 'order_payments',           
                    "voucher_code"          => $code,
                    "reference"             => $_POST['reference'],
                    "voucher_amount"        => $payment_amount,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Purchase Payment: '.$code,
                );
                $sale_vouchers[] = array( // cr Purchases
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Purchases->account_id,
                    "account_code"          => $Purchases->account_code,
                    "account_type_id"       => $Purchases->account_type_id,
                    "subaccount_type_id"    => $Purchases->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order->customer_supplier_id,
                    "table_id"              => $payment_id,            
                    "table_name"            => 'order_payments',           
                    "voucher_code"          => $code,
                    "reference"             => $_POST['reference'],
                    "voucher_amount"        => $payment_amount,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Purchase Payment: '.$code,
                );
                $sale_vouchers[] = array( // dr Purchase_payable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Purchase_payable->account_id,
                    "account_code"          => $Purchase_payable->account_code,
                    "account_type_id"       => $Purchase_payable->account_type_id,
                    "subaccount_type_id"    => $Purchase_payable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order->customer_supplier_id,
                    "table_id"              => $payment_id,            
                    "table_name"            => 'order_payments',           
                    "voucher_code"          => $code,
                    "reference"             => $_POST['reference'],
                    "voucher_amount"        => $payment_amount,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Purchase Payment: '.$code,
                );
            } elseif($order_type == 'sale') {
                // Raise the transaction if sale
                $Sales	= $this->db->where('account_code', '700001')->get('accounts')->row(); //cr
                $Sales_receivable = $this->db->where('account_code', '500002')->get('accounts')->row(); //dr
                $Sales_tax_payable = $this->db->where('account_code', '600003')->get('accounts')->row(); //cr

                $sale_vouchers[] = array( // dr Paying_Account
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Paying_Account->account_id,
                    "account_code"          => $Paying_Account->account_code,
                    "account_type_id"       => $Paying_Account->account_type_id,
                    "subaccount_type_id"    => $Inventory->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order->customer_supplier_id,
                    "table_id"              => $payment_id,            
                    "table_name"            => 'order_payments',           
                    "voucher_code"          => $code,
                    "reference"             => $_POST['reference'],
                    "voucher_amount"        => $payment_amount,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Sale Payment: '.$code,
                );
                $sale_vouchers[] = array( // dr Sales
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales->account_id,
                    "account_code"          => $Sales->account_code,
                    "account_type_id"       => $Sales->account_type_id,
                    "subaccount_type_id"    => $Sales->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order->customer_supplier_id,
                    "table_id"              => $payment_id,            
                    "table_name"            => 'order_payments',          
                    "voucher_code"          => $code,
                    "reference"             => $_POST['reference'],
                    "voucher_amount"        => $payment_amount,
                    "voucher_type"          => 'dr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Sale Payment: '.$code,
                );
                $sale_vouchers[] = array( // cr Sales_receivable
                    "org_id"                => $_SESSION['orgid'],
                    "account_id"            => $Sales_receivable->account_id,
                    "account_code"          => $Sales_receivable->account_code,
                    "account_type_id"       => $Sales_receivable->account_type_id,
                    "subaccount_type_id"    => $Sales_receivable->subaccount_type_id,
                    "fiscal_year_id"        => $_SESSION['fiscalyearid'],
                    "customer_supplier_id"  => $order->customer_supplier_id,
                    "table_id"              => $payment_id,            
                    "table_name"            => 'order_payments',             
                    "voucher_code"          => $code,
                    "reference"             => $_POST['reference'],
                    "voucher_amount"        => $payment_amount,
                    "voucher_type"          => 'cr',
                    "transaction_date"      => $thisDate,
                    "created_by"            => $_SESSION['userid'],
                    "approved_by"           => '',
                    "narrative"             => 'New Sale Payment: '.$code,
                );
            }
            
            $this->db->insert_batch('vouchers', $sale_vouchers);

            $this->session->set_flashdata('alert', '<div class="alert alert-success">Transaction Completed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        } else  {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Level Two Transaction Failed.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }


        
    }
    ##Order Payments End
    ##================================================================================



    ##User Section Start
    public function user_orders ($userID) {
        #get user orders
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'User Orders';

        $this->data['user_orders'] = $this->Business_Model->user_orders($userID);
        $this->data['user_debt'] = $this->debt->customer_debt($userID);
        $this->data['this_user'] = $this->Majorselects->entitys($userID);

        #var_dump($this->data['this_user']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('business/user_orders', $this->data);
        $this->load->view('inc/footer');
    }
    ##User Section End






    #######################################Reports start################################
    public function testr () {
        $id = 1;
        $this->my_data['order_profile'] = $this->Majorselects->order_profile($id);
        $this->my_data['order_items'] = $this->Majorselects->order_items($id);

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            "order_items"  => $this->my_data['order_items']
        );

        $this->load->view('reports/test', $merger);
    }

    public function sales_receipt ($orderID) {
        $this->my_data['order_profile'] = $this->Majorselects->order_profile($orderID);

        if(isset($_POST['item'])) 
            $this->my_data['order_items'] = $this->Majorselects->order_items($orderID, $_POST['item']);
        else 
            $this->my_data['order_items'] = $this->Majorselects->order_items($orderID);

        #var_dump($this->my_data);

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            "order_items"  => $this->my_data['order_items']
        );

        $this->load->view('reports/sales_receipt', $merger);
    }


    public function purchase_invoice ($orderID) {
        $this->data['page'] = 'Purchase Invoice';

        $this->my_data['order_profile'] = $this->Majorselects->order_profile($orderID);
        #$this->my_data['order_purchases'] = $this->Majorselects->order_purchases($orderID);
        $this->my_data['order_items'] = $this->Majorselects->order_items($orderID);

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            #"order_items"  => $this->my_data['order_purchases']
            "order_items"  => $this->my_data['order_items']
        );


        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/purchase_invoice', $merger);
        $this->load->view('inc/footer');
    }

    public function purchase_receipt ($orderID) {
        $this->my_data['order_profile'] = $this->Majorselects->order_profile($orderID);
        #$this->my_data['order_purchases'] = $this->Majorselects->order_purchases($orderID);
        $this->my_data['order_items'] = $this->Majorselects->order_items($orderID);

        #var_dump($this->my_data);

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            #"order_items"  => $this->my_data['order_purchases']
            "order_items"  => $this->my_data['order_items']
        );

        #$this->load->view('reports/purchase_receipt', $merger);
        $this->load->view('reports/sales_receipt', $merger);

    }

    public function sale_invoice ($orderID) {
        $this->data['page'] = 'Sale Invoice';

        $this->my_data['order_profile'] = $this->Majorselects->order_profile($orderID);
        $this->my_data['order_items'] = $this->Majorselects->order_items($orderID);

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            "order_items"  => $this->my_data['order_items']
        );

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/sale_invoice', $merger);
        $this->load->view('inc/footer');
    }

    public function sale_delivery_note ($orderID) {
        $this->data['page'] = 'Delivery Note';

        $this->my_data['order_profile'] = $this->Majorselects->order_profile($orderID);
        $this->my_data['order_items'] = $this->Majorselects->order_items($orderID);

        $merger = array(
            "order_header" => $this->my_data['order_profile'],
            "order_items"  => $this->my_data['order_items']
        );

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/sale_delivery_note', $merger);
        $this->load->view('inc/footer');
    }

    public function receipt () {
         $this->load->library('pdf');
         $html = $this->load->view('reports/test', true);
         $this->pdf->createPDF($html, 'mypdf', false);
         $this->pdf->createPDF($html, 'mypdf');
    }



}
