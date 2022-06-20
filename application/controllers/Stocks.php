<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends MY_Controller {

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
            $this->load->model('Stocks_Model');
            
            $this->data['active_user'] = $this->Majorselects->get_user();
        }
    }

    /*** Start Index ***/
    public function home() {
        $this->data['page'] = 'Stocks';   
        $this->session->set_userdata('referred_from', current_url());

        $this->data['payment_modes'] = $this->Majorselects->payment_modes();
        $this->data['all_orgs'] = $this->Majorselects->all_orgs();
        $this->data['stocks'] = $this->Stocks_Model->stocks();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('stocks/index', $this->data);
        $this->load->view('inc/footer');

    }
    /*** End Index ***/  

    public function stock_details($id) {
        $this->data['page'] = 'Stock details';   
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_orgs'] = $this->Majorselects->all_orgs();
        $this->data['all_items'] = $this->Majorselects->all_items();
        #$this->data['brands_models'] = $this->Majorselects->brands_models();
        $this->data['stock_details'] = $this->Stocks_Model->stock_details($id);
        $this->data['stock_lines'] = $this->Stocks_Model->stock_lines($id);
        #$this->data['stock_lines'] = $this->Stocks_Model->stock_lines2($id);

        if($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('stocks/stock_details', $this->data);
            $this->load->view('inc/footer');
        }

    }

    public function new_stock () {
        #new stock
        $orgid = $this->input->post('org');

        //find out if stock had been generated before doing a stock take for this org/store
        $check1 = $this->db->where('store_id', $orgid)->get('items_store')->result();
        if(count($check1) < 1) {
            $link1 = '<a href="'.site_url('sys/item_stock').'">here</a>';
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Click to '.$link1.' to redistrbute items to this store first.  <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('stocks/home'));
        }
        
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        $form_data = array(
            "org_id"            => $orgid,
            "stock_name"        => $this->input->post('stock_name'),
            "stock_date"        => $this->input->post('stock_date'),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );

        if($this->Inserts->insert_data('stocks', $form_data)){
            $lastid = $this->db->insert_id(); //get stock_id
            //create stock lines from the items_store data
            $insert = 'INSERT IGNORE INTO stock_lines (org_id, item_store_id, stock_id, item_id, item_quantity, system_quantity, narrative, active) VALUES ';
            
            $items_arr = array();
            $x = 0;
            foreach($check1 as $alit) {
                $x++;
                $insert .= "(
                    '".$alit->store_id."',
                    '".$alit->item_store_id."',
                    '".$lastid."',
                    '".$alit->item_id."',
                    '".$alit->available_qty."',
                    '".$alit->available_qty."',
                    'Auto-gen',
                    '1'
                )";
                if($x < count($check1)) $insert .= ',';
            }

            if($this->db->query($insert)) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('stocks/home'));
            } else {
                $this->db->query("DELETE FROM stocks WHERE stock_id = '$lastid' ");
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed!!! Please try again later or contact your administrator for assistance. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('stocks/home'));
            }

        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function update_stock ($id) {
        #update stock
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        $form_data = array(
            "org_id"            => $this->input->post('org'),
            "stock_name"        => $this->input->post('stock_name'),
            "stock_date"        => $this->input->post('stock_date'),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );

        $condition = array(
            "stock_id" => $id
        );

        if($this->Inserts->update_data('stocks', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_stock($id){
        $data = array( "stock_id" => $id );
        if($this->Deletes->delete_data('stocks', $data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    public function new_stock_line ($id) {
        #new stock line
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        #to compare details
        $system_qty = null;
        $reorder_level = null;
        $brand_model_id = $this->input->post('brand_model_id');
        $qry1 = $this->db->query("SELECT reorder_level, available_qty FROM brand_models WHERE brand_model_id = '$brand_model_id' ");
        foreach($qry1->result() as $qr1r) {
            $system_qty = $qr1r->available_qty;
            $reorder_level = $qr1r->reorder_level;
        }

        #check for the database trigger
        $form_data = array(
            "stock_id"          => $id,
            #"item_id"           => null, #currently not being used
            "item_id"           => $this->input->post('item_id'), #being used
            "brand_model_id"    => $brand_model_id,
            "system_quantity"   => $system_qty,
            "item_quantity"     => $this->input->post('item_quantity'),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );

        if($this->Inserts->insert_data('stock_lines', $form_data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Added. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function update_stock_line ($id) {
        #update stock
        $active = $this->input->post('active');
        if($active == '') $active = 0;

        #check for the database trigger
        $form_data = array(
            #"item_id"           => null, #currently not being used
            "item_id"           => $this->input->post('item_id'), #being used
            "brand_model_id"    => $this->input->post('brand_model_id'),
            "item_quantity"     => $this->input->post('item_quantity'),
            "narrative"         => trim($this->input->post('narrative')),
            "active"            => $active
        );
        $condition = array( "stock_line_id" => $id );

        if($this->Inserts->update_data('stock_lines', $form_data, $condition)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully Updated. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }
    public function delete_stock_line($id){
        $data = array( "stock_line_id" => $id );
        if($this->Deletes->delete_data('stock_lines', $data)){
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Successfully deleted. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
        else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($this->session->userdata('referred_from'));
        }
    }

    ##=================================================================


    public function redistribute_items() {
        $storeid = $this->input->post('store_id');
        $items = $this->input->post('item_id');
        $action_point = $this->input->post('action_point');

        //initiate distribution
        if($action_point == 'distribute') {
            $with_opening_stock = $_POST['with_opening_stock'];

            $insert = 'INSERT IGNORE INTO items_store (org_id, store_id, item_id, item_name, available_qty, buying_price, marked_price, selling_price, barcode, item_status_id) VALUES ';
            if (in_array("All", $items)) {
                //select from items as you insert_ignore into items_store table
                $all_items = $this->db->get('items')->result();
                $items_arr = array();
                $x = 0;

                foreach($all_items as $alit) {
                    $x++;
                    $thisitemName = preg_replace('/\'/','', $alit->item_name);
                    $qty = $alit->available_qty;
                    if($alit->available_qty == 'no') $qty = 0;
                    $insert .= "(
                        '".$alit->org_id."',
                        '".$storeid."',
                        '".$alit->item_id."',
                        '".$thisitemName."',
                        '".$qty."',
                        '".$alit->buying_price."',
                        '".$alit->marked_price."',
                        '".$alit->selling_price."',
                        '".$alit->barcode."',
                        '".$alit->item_status_id."'
                    )";
                    if($x < count($all_items)) $insert .= ',';
                }
            } else {
                //loop through item array
                $x = 0;
                foreach($items as $key=>$value) {
                    $x++;
                    $thisitem = $this->db->where('item_id',$value)->get('items')->row();
		            $thisitemName = preg_replace('/\'/','', $thisitem->item_name);
                    $qty = $thisitem->available_qty;
                    if($thisitem->available_qty == 'no') $qty = 0;
                    $insert .= "(
                        '".$thisitem->org_id."',
                        '".$storeid."',
                        '".$thisitem->item_id."',
                        '".$thisitemName."','items'
			            '".$qty."',
                        '".$thisitem->buying_price."',
                        '".$thisitem->marked_price."',
                        '".$thisitem->selling_price."',
                        '".$thisitem->barcode."',
                        '".$thisitem->item_status_id."'
                    )";
                    if($x < count($items)) $insert .= ',';
                }
            }

            //echo $insert;
            if($this->db->query($insert)) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Executed successfully. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sys/item_stock'));
            }
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sys/item_stock'));
            }

        }

        //rollback distribution
        if($action_point == 'rollback') {
            $delete = "DELETE FROM items_store WHERE store_id = '$storeid' AND item_id IN (";
            if (in_array("All", $items)) {
                //select from items as you delete from items_store table
                $all_items = $this->db->get('items')->result();
                $items_arr = array();
                $x = 0;
                foreach($all_items as $alit) {
                    $x++;
                    $delete .= $alit->item_id;
                    if($x < count($all_items)) $delete .= ', ';
                }
                $delete .= ' )';
            } else {
                //loop through item array
                $x = 0;
                foreach($items as $alit) {
                    $x++;
                    $delete .= $alit;
                    if($x < count($items)) $delete .= ', ';
                }
                $delete .= ' )';
            }

            //echo $delete;
            if($this->db->query($delete)) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Executed successfully. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sys/item_stock'));
            }
            else {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sys/item_stock'));
            }
        }

        if($action_point == 'override') {
            $this->db->trans_start();

            if (in_array("All", $items)) {
                //select from items
                $all_items = $this->db->select('item_id, available_qty')->from('items')->get()->result();
                foreach($all_items as $alit) {
                    $this->db->query("UPDATE items_store SET available_qty = $alit->available_qty WHERE item_id = $alit->item_id AND store_id = $storeid ");
                }
            } else {
                //loop through item array
                foreach($items as $key=>$value) {
                    $thisitem = $this->db->select('item_id, available_qty')->from('items')->where('item_id',$value)->get()->row();
                    $this->db->query("UPDATE items_store SET available_qty = $thisitem->available_qty WHERE item_id = $thisitem->item_id AND store_id = $storeid ");
                }
            }
            
            if($this->db->trans_status() === FALSE){
                $this->session->set_flashdata('alert', '<div class="alert alert-danger">Sorry!!! Something went wrong. Please try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sys/item_stock'));
            }else{
                $this->db->trans_complete();
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Executed successfully. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect(site_url('sys/item_stock'));
            }

        }

    } 

    public function move_stock () {
        $orgid1 = $this->input->post('org_id1');
        $orgid2 = $this->input->post('org_id2');
        $itemid1 = $this->input->post('item_id1');
        //$itemid2 = $this->input->post('item_id2');
        $quantity = $this->input->post('quantity');

        if($orgid1 == $orgid2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">You cannot transfer to the same store.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/move_stock'));
        }

        $itemavailability = $this->db->where("item_id = '$itemid1' AND store_id = '$orgid2' ")->get('items_store')->num_rows();
        if($itemavailability < 1) {
            //the desired quantity is not available
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">Sorry! This item is not available on the "To Store".<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/move_stock'));
        }

        $available = $this->db->where("item_id = '$itemid1' AND store_id = '$orgid1' ")->get('items_store')->row('available_qty');
        if($available < $quantity) {
            //the desired quantity is not available
            $this->session->set_flashdata('alert', '<div class="alert alert-warning">Failed! The selected store does not have enough stock to initiate this transfer.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/move_stock'));
        } 

        $transfer1 = $this->db->query(" UPDATE items_store SET available_qty = (available_qty + $quantity) WHERE store_id = '$orgid2' AND item_id = '$itemid1' "); //increase on the other end
        $transfer2 = $this->db->query(" UPDATE items_store SET available_qty = (available_qty - $quantity) WHERE store_id = '$orgid1' AND item_id = '$itemid1' "); //decrease on this end

        if($transfer1 && $transfer2) {
            $this->session->set_flashdata('alert', '<div class="alert alert-success">Success! Transfer has been successful.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/move_stock'));
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Please try again later or contact your administrator.<span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect(site_url('sys/move_stock'));
        }

    }


    #==================================================================

    public function generate_excel ($id) {
        $details = $this->Stocks_Model->stock_details($id);
        $lines = $this->Stocks_Model->stock_lines($id);

        header('Content-type: text/csv');
        header('Content-disposition: attachment;filename=stock_list.csv');

        foreach($details as $details) echo "Stock Name:, ".$details->stock_name.", Store or Shop:, ".$details->org_name.", Date:, ".$details->stock_date." ".PHP_EOL;

        echo " ".PHP_EOL;

        echo "No, Item Name, SKU, System Qty, Actual Qty, Deviation".PHP_EOL;

        $x= 1;
        foreach($lines as $dt) {
            $deviation = $dt->system_quantity - $dt->item_quantity;

            echo  $x.','.$dt->item_name.','.$dt->barcode.','.$dt->system_quantity.','.$dt->item_quantity.','.$deviation.' '.PHP_EOL;
            $x++;
        }
    }

    public function generate_pdf ($id) {
        $this->load->library('pdf');
        $this->data['stock_details'] = $this->Stocks_Model->stock_details($id);
        $this->data['stock_lines'] = $this->Stocks_Model->stock_lines($id);

        $html = $this->load->view('stocks/generate_pdf', $this->data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
        $this->pdf->createPDF($html, 'mypdf');
   }


    ##stock report start
    public function stock_report($id) {
        // $this->data['stock_details'] = $this->Stocks_Model->stock_details($id);
        // $this->data['stock_lines'] = $this->Stocks_Model->stock_lines2($id);
        
        $this->data['stock_details'] = $this->Stocks_Model->stock_details($id);
        $this->data['stock_lines'] = $this->Stocks_Model->stock_lines($id);

        #var_dump($this->data['stock_lines']); exit();

        $this->load->view('reports/stock_report', $this->data);
    }
    ##stock report end




    

    



}