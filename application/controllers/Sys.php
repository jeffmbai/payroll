<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sys extends MY_Controller {

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
            $this->load->model('Organization');
            $this->load->model('Inserts');
            $this->load->model('Mailing');
            $this->load->model('Stocks_Model','stocks');
            
            $this->data['active_user'] = $this->Majorselects->get_user();

            if(!isset($_SESSION['loggedin'])) {
                #get the details of this user
                $log_details = $this->log_details();
                $this->Inserts->insert_data("sys_logs", $log_details);
                $_SESSION['loggedin'] = 'true';
            }
        }

        if($_SESSION['userid'] != 1) {
            if( !$this->check() ) redirect(site_url('pages/logout'));
        } 
    }

    function log_details(){
        $dt = '{"hostname" : "'.gethostname().'" , "os" : "'.php_uname().'" }';
        $data = array(
            "event_name"=> "login",
            "computer"  => $dt,
            "operator"  => $_SESSION['userid'],
            "start_time"=> date('Y-m-d H:m:s')
        );
        return $data;
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

    /*** Start POS Login ***/
    public function pos_signin() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'pos_login';

        $this->load->view('pos_login', $this->data);

    }
    /*** End POS Login ***/ 

    /*** Start Index ***/
    public function index() {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Dashboard';

        $this->data['users'] = $this->Majorselects->get_count('entitys');
        $this->data['suppliers'] = $this->Majorselects->entity_with_roles(3);
        $this->data['items'] = $this->Majorselects->get_count('items');
        $this->data['stores'] = $this->Majorselects->get_count('orgs');
        $this->data['orgs'] = $this->db->get('orgs')->result();
        $this->data['paid_orders'] = $this->Majorselects->settled_orders(1);
        $this->data['cancelled_orders'] = $this->Majorselects->settled_orders(2);
        $this->data['pending_orders'] = $this->Majorselects->settled_orders(0);
        $this->data['total_settled_orders'] = $this->Majorselects->total_settled_orders(1);
        $this->data['available_items'] = $this->Majorselects->available_items();
        $this->data['needs_reorder'] = $this->Majorselects->needs_reorder();

        $this->data['all_entitys'] = $this->Majorselects->all_entitys();
        $this->data['stock_items'] = $this->Majorselects->stock_items($_SESSION['orgid']);

        if(isset($_POST['filterdate'])) {
            $_SESSION['filterdate'] = $_POST['filterdate'];
        }


        if($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) {
            #super admin
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('index', $this->data);
            $this->load->view('inc/footer');
        } elseif( $_SESSION['userrole'] == 5 ) {
            //receptionist
            redirect(site_url('rooms/book_room'), 'refresh');
        } else {
            #other users
            $this->data['payment_modes'] = $this->Majorselects->payment_modes();
            $this->data['eating_tables'] = $this->Majorselects->all_eating_tables();
            $this->data['all_items'] = $this->Majorselects->all_items();
        

            if(isset($_SESSION['wapi']) && $_SESSION['superuser'] != 1) {
                if($_SESSION['wapi'] == 1) {
                    #go to hotel
                    redirect(site_url('posale/home'));
                } elseif($_SESSION['wapi'] == 2) {
                    #go to bar
                    redirect(site_url('posale/bar'));
                }
            }elseif($_SESSION['userrole'] == 7) {
                redirect(site_url('business/sales'));

            }else{
                redirect(site_url('posale/home'));
            }

        }

    }
    /*** End Index ***/

    /* Users Start */
    public function users () {
        #add user
        $this->data['page'] = 'users';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['all_users'] = $this->Majorselects->all_entitys();
        $this->data['stations'] = $this->Majorselects->stations();

#var_dump($this->data['all_users']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/users', $this->data);
        $this->load->view('inc/footer');

    }

    public function user_profile ($id) {
        #user profile
        $this->data['page'] = 'user_profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Majorselects->all_orgs();
        $this->data['this_user'] = $this->Majorselects->entitys($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/user_profile', $this->data);
        $this->load->view('inc/footer');
    }

    public function my_profile () {
        #my profile: active user profiles
        $this->data['page'] = 'My Profile';
        
        $this->session->set_userdata('referred_from', current_url());

        $this->data['system_roles'] = $this->Majorselects->system_roles();
        $this->data['orgs'] = $this->Majorselects->all_orgs();

        if($_SESSION['superuser'] == 1) {
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/my_profile', $this->data);
            $this->load->view('inc/footer');
        } else {
            $this->load->view('inc/pos_header', $this->data);
            $this->load->view('admin/my_profile', $this->data);
            $this->load->view('inc/footer');
        }
    }

    /* Users End */

    /* Attributes Start */
    public function attributes () {
        #attributes
        $this->data['page'] = 'attributes';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_attributes'] = $this->Majorselects->all_attributes();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/attributes', $this->data);
        $this->load->view('inc/footer');

    }

    public function attribute_profile ($id) {
        $this->data['page'] = 'attribute_profile';
        #attribute profile
        $this->session->set_userdata('referred_from', current_url());

        $this->data['this_attribute'] = $this->Majorselects->this_attribute($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/attribute_profile', $this->data);
        $this->load->view('inc/footer');

    }
    /* Attributes End */

    /* Brands Start */
    public function brands () {
        #brands
        $this->data['page'] = 'brands';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_brands'] = $this->Majorselects->all_brands();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/brands', $this->data);
        $this->load->view('inc/footer');
    }
    public function brand_profile ($id) {
        #brand profile
        $this->data['page'] = 'brand_profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['this_brand'] = $this->Majorselects->this_brand($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/brand_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Brands End */

    /* Brand Models Start */
    public function brands_models () {
        $this->data['page'] = 'brand_models';
        #brands models
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_brands'] = $this->Majorselects->all_brands();
        $this->data['all_orgs'] = $this->Majorselects->all_orgs();
        $this->data['brand_models'] = $this->Majorselects->brands_models();

        #var_dump($this->data['brand_models']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/brands_models', $this->data);
        $this->load->view('inc/footer');
    }
    /* Brand Models End */

    /* Eating Tables Start */
    public function eating_tables () {
        $this->permission_check('general_view');
        $this->data['page'] = 'Eating Tables';
        #eating tables
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_orgs'] = $this->Majorselects->all_orgs();
        $this->data['all_eating_tables'] = $this->Majorselects->all_eating_tables();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/eating_tables', $this->data);
        $this->load->view('inc/footer');
    }
    /* Eating Tables End */

    /* Package Types Start */
    public function package_types () {
        #package types
        $this->data['page'] = 'package_types';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['package_types'] = $this->Majorselects->package_types();

        #var_dump($this->data['brand_models']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/package_types', $this->data);
        $this->load->view('inc/footer');
    }
    /* Package Types End */

    /* Units Start */
    public function units () {
        #units
        $this->data['page'] = 'units';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_units'] = $this->Majorselects->all_units();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/units', $this->data);
        $this->load->view('inc/footer');
    }
    public function unit_profile ($id) {
        #unit profile
        $this->data['page'] = 'units_profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['this_unit'] = $this->Majorselects->this_unit($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/unit_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Units End */

    /* Countries Start */
    public function countries () {
        #countries
        $this->data['page'] = 'countries';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_countries'] = $this->Majorselects->all_countries();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/countries', $this->data);
        $this->load->view('inc/footer');
    }
    public function country_profile ($id) {
        #country profile
        $this->data['page'] = 'country_profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['this_country'] = $this->Majorselects->this_country($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/country_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Countries End */

    /* Fiscal Year Start */
    public function fiscal_years () {
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Fiscal Years';

        $this->data['fiscal_years'] = $this->Majorselects->fiscal_years();
        $this->data['orgs'] = $this->Majorselects->all_orgs();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/fiscal_year', $this->data);
        $this->load->view('inc/footer');
    }
    /* Fiscal Year end */

    /* Currencies Start */
    public function currencies () {
        $this->data['page'] = 'currencies';
        #currencies
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_currencies'] = $this->Majorselects->all_currencies();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/currencies', $this->data);
        $this->load->view('inc/footer');
    }
    public function currency_profile ($id) {
        $this->data['page'] = 'currency_profile';
        #currency profile
        $this->session->set_userdata('referred_from', current_url());

        $this->data['this_currency'] = $this->Majorselects->this_currency($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/currency_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Currencies End */

    /* Tax Types Start */
    public function tax_types () {
        #tax_types
        $this->data['page'] = 'Tax Types';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_tax_types'] = $this->Majorselects->all_tax_types();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/tax_types', $this->data);
        $this->load->view('inc/footer');
    }
    public function tax_type_profile ($id) {
        #tax_type profile
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Tax Types Profile';

        $this->data['this_tax_type'] = $this->Majorselects->this_tax_type($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/tax_type_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Tax Types End */

    #-------------------------TRAILS--------------------------
    public function general_audit() {
        if($_SESSION['superuser'] != 1 || $_SESSION['userrole'] != 1) exit();
        $this->data['page'] = 'Trails';

        $this->data['trails'] = $this->Majorselects->general_trailogs();
        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/sys_logs', $this->data);
        $this->load->view('inc/footer');
    }
    public function this_audit() {
        $id  = $_POST['data'];
        if($_SESSION['superuser'] != 1 || $_SESSION['userrole'] != 1) exit();
        $this->data['page'] = 'Trails';

        $dta = $this->db->where('sys_log_id', $id)->get('sys_logs')->row();
        $rtn = '
            <table class="table table-responsive table-condensed">
                <tbody>
                    <tr><th>Task</th></tr>
                    <tr><td>'.$dta->task.'</td></tr>
                    <tr><th>Narrative</th></tr>
                    <tr><td>'.$dta->narrative.'</td></tr>
                </tbody>
            </table>
        ';
        
        echo $rtn;
    }
    #-------------------------TRAILS--------------------------

    /* Categories Start */
    public function categories () {
        #categories
        $this->data['page'] = 'categories';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_categories'] = $this->Majorselects->all_categories();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/categories', $this->data);
        $this->load->view('inc/footer');
    }
    public function category_profile ($id) {
        $this->data['page'] = 'category profile';
        #category profile
        $this->session->set_userdata('referred_from', current_url());

        $this->data['this_category'] = $this->Majorselects->this_category($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/category_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Categories End */

    /* Colors Start */
    public function colors () {
        $this->data['page'] = 'Colors';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['colors'] = $this->db->query("SELECT * FROM colors ORDER BY color_name ASC")->result();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/colors', $this->data);
        $this->load->view('inc/footer');
    }
    /* Colors End */

    /* Stores Start */
    public function stores () {
        #stores
        $this->data['page'] = 'Stores';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_stores'] = $this->Majorselects->all_orgs();
        $this->data['countries'] = $this->Majorselects->all_countries();
        $this->data['currencies'] = $this->Majorselects->all_currencies();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/stores', $this->data);
        $this->load->view('inc/footer');
    }
    public function store_profile ($id) {
        #stores profile
        $this->data['page'] = 'store_profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_stores'] = $this->Majorselects->all_orgs();

        $this->data['countries'] = $this->Majorselects->all_countries();
        $this->data['currencies'] = $this->Majorselects->all_currencies();
        $this->data['this_store'] = $this->Majorselects->this_org($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/store_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Stores End */

    /* Items Start */
    public function add_item () {
        #add_item
        $this->data['page'] = 'Add Item';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_stores'] = $this->Organization->organizations();
        $this->data['all_categories'] = $this->Majorselects->all_categories();
        $this->data['all_brands'] = $this->Majorselects->all_brands();
        $this->data['all_attributes'] = $this->Majorselects->all_attributes();
        $this->data['all_tax_types'] = $this->Majorselects->all_tax_types();
        $this->data['all_units'] = $this->Majorselects->all_units();
        $this->data['package_types'] = $this->Majorselects->package_types();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/add_item', $this->data);
        $this->load->view('inc/footer');
    }
    public function items () {
        #manage item
        $this->data['page'] = 'Items';

        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_items'] = $this->Majorselects->all_items();
        $this->data['all_categories'] = $this->Majorselects->all_categories();
        $this->data['all_attributes'] = $this->Majorselects->all_attributes();

        #echo $this->data['all_items']; exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/items', $this->data);
        $this->load->view('inc/footer');
    }

    public function all_items () {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $items = $this->Majorselects->all_items();
        $data = array();
        foreach($items as $r) {
            $narrative = $r->narrative;
            $active = ($r->active == 1 ? "True" : "False");

            $reorder =  null;
            if($r->total_items <= $r->reorder_level) $reorder = '<span class="text-danger">Below <i class="fa fa-arrow-circle-o-down"></i></span>';
            else $reorder = '<span class="text-success">Above <i class="fa fa-arrow-circle-o-up"></i></span>';

            $data[] = array(
                  '<img src="'.base_url('assets/images/items/'.$r->image).'" height="50px" />',
                  $r->item_name,
                  '<a href="'.site_url('sys/item_profile/'.$r->item_id).'" >'.$r->barcode.'</a>',
                  //$r->org_name,
                  $r->brand_name,
                  $r->color_name,
                  number_format($r->buying_price, 2),
                  number_format($r->marked_price, 2),
                  $r->total_items,
                  $r->reorder_level,
                  $reorder,
                  $r->tax_type_name,                  
                  $narrative,
                  $active,
                  '<div class="dropdown">
                        <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="'.site_url('sys/item_profile/'.$r->item_id).'">View</a></li>
                            <li><a href="'.site_url('delete/item/'.$r->item_id).'"> Delete</a></li>
                        </ul>
                    </div> '
             );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($items),
            "recordsFiltered" => count($items),
            "data" => $data
          );
        echo json_encode($output);
        exit();
    }

    public function failed_imports () {
        $this->data['page'] = 'Failed Imports';

        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_items'] = $this->Majorselects->all_items();
        $this->data['all_categories'] = $this->Majorselects->all_categories();
        $this->data['all_attributes'] = $this->Majorselects->all_attributes();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/items_failed_imports', $this->data);
        $this->load->view('inc/footer');
    }

    public function all_failed_imports () {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $items = $this->Majorselects->all_failed_imports();
        $data = array();
        foreach($items as $r) {
            $narrative = $r->narrative;
            $tax_type = $this->db->where('tax_type_id',$r->tax_type_id)->get('tax_types')->row('tax_type_name');

            $data[] = array(
                '<input type="text" class="jtl_input" id="item_name'.$r->item_id.'" value="'.$r->item_name.'" />',
                '<input type="text" class="jtl_input" id="category'.$r->item_id.'" value="'.$r->category.'" /> ',
                '<input type="text" class="jtl_input" id="brand_id'.$r->item_id.'" value="'.$r->brand_id.'" /> ',
                '<input type="text" class="jtl_input" id="unit'.$r->item_id.'" value="'.$r->unit.'" /> ',
                '<input type="text" class="jtl_input" id="color'.$r->item_id.'" value="'.$r->color.'" /> ',
                '   <input type="text" class="jtl_input" id="tax_type_id'.$r->item_id.'" value="'.$tax_type.'" />
                    <input type="hidden" readonly class="jtl_input" id="tax_type_id'.$r->item_id.'" value="'.$r->tax_type_id.'" />
                ',
                '<input type="text" class="jtl_input" id="buying_price'.$r->item_id.'" value="'.$r->buying_price.'" /> ',
                '<input type="text" class="jtl_input" id="marked_price'.$r->item_id.'" value="'.$r->marked_price.'" /> ',
                '<input type="text" class="jtl_input" id="barcode'.$r->item_id.'" value="'.$r->barcode.'" /> ',
                '<input type="text" class="jtl_input" id="opening_stock'.$r->item_id.'" value="'.$r->opening_stock.'" /> ',
                '<input type="text" class="jtl_input" id="reorder_level'.$r->item_id.'" value="'.$r->reorder_level.'" /> ',
                '<input type="text" class="jtl_input" id="narrative'.$r->item_id.'" value="'.$r->narrative.'" /> ',
                  '<div class="dropdown">
                        <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="import_item('.$r->item_id.')">Import</a></li>
                            <li><a href="'.site_url('delete/item_three/'.$r->item_id).'"> Delete</a></li>
                        </ul>
                    </div> '
             );
        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => count($items),
            "recordsFiltered" => count($items),
            "data" => $data
          );
        echo json_encode($output);
        exit();
    }

    public function item_profile ($id) {
        #manage item profile
        $this->data['page'] = 'Item Profile';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['this_item'] = $this->Majorselects->this_item($id);

        $this->data['all_stores'] = $this->Majorselects->all_orgs();
        $this->data['all_categories'] = $this->Majorselects->all_categories();
        $this->data['all_brands'] = $this->Majorselects->all_brands();
        $this->data['all_attributes'] = $this->Majorselects->all_attributes();
        $this->data['all_tax_types'] = $this->Majorselects->all_tax_types();
        $this->data['all_units'] = $this->Majorselects->all_units();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/item_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Items End */

    /* Order Start */
    public function new_order () {
        #make a new order
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_items'] = $this->Majorselects->all_items();
    #var_dump($this->data['all_items']); exit();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/new_order', $this->data);
        $this->load->view('inc/footer');
    }
    public function orders () {
        #manage orders
        $this->session->set_userdata('referred_from', current_url());
        $this->data['page'] = 'Orders';

        if(isset($_GET['str'])) $storeID = $_GET['str'];
        else $storeID = $_SESSION['orgid'];
        $this->data['orders'] = $this->Majorselects->orders($storeID);
        $this->data['orgs'] = $this->Majorselects->all_orgs();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/orders', $this->data);
        $this->load->view('inc/footer');
    }
    public function order_profile ($id) {
        #order profile
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Orders Profile';

        $this->data['order_profile'] = $this->Majorselects->order_profile($id);
        $this->data['order_items'] = $this->Majorselects->order_items($id);
        $this->data['all_items'] = $this->Majorselects->all_items();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/order_profile', $this->data);
        $this->load->view('inc/footer');
    }
    /* Order End */

    /* Stores Start */
    public function item_stock() {
        #get the stock of stores' items and update stock
        $this->session->set_userdata('referred_from', current_url());

        $this->data['page'] = 'Item Stock';

        if(isset($_GET['str'])) $storeID = $_POST['str'];
        elseif(isset($_SESSION['storeid'])) $storeID = $_SESSION['storeid'];
        else $storeID = $_SESSION['orgid'];

        //$this->data['stock_items'] = $this->Majorselects->stock_items($storeID);
        $this->data['stock_items'] = $this->stocks->stock_items($storeID);
        $this->data['all_categories'] = $this->Majorselects->all_categories();
        $this->data['all_attributes'] = $this->Majorselects->all_attributes();
        $this->data['orgs'] = $this->Organization->organizations();

       # echo $this->data['stock_items']; exit();

        if($_SESSION['superuser'] == 1 || $_SESSION['userrole'] == 1) {
            $this->load->view('inc/admin_header', $this->data);
            $this->load->view('admin/item_stock', $this->data);
            $this->load->view('inc/footer');
        } else {
            $this->load->view('inc/pos_header', $this->data);
            $this->load->view('admin/item_stock', $this->data);
            $this->load->view('inc/footer');
        }
    }
    public function store_stock() {
        $storeid = $_POST['data'];
        $_SESSION['storeid'] = $storeid;
        echo $_SESSION['storeid'];
    }

    public function move_stock() {
        #move stock from store to store
        $this->data['page'] = 'Move Stock';
        $this->session->set_userdata('referred_from', current_url());

        $this->data['all_stores'] = $this->Majorselects->all_orgs();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('admin/move_stock', $this->data);
        $this->load->view('inc/footer');

    }
    /* Stores End */

    /* Receipt/ Invoice Start */
    public function trans($id) {
        #get order details
        $this->session->set_userdata('referred_from', current_url());

        $this->data['order_header'] = $this->Majorselects->order_profile($id);
        $this->data['order_items'] = $this->Majorselects->order_items($id);

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('invoice', $this->data);
        $this->load->view('inc/footer');

    }
    /* Receipt/ Invoice End */


    /* REPORTS START */
    public function sales_report (){
        #get sales report
        $this->data['page'] = 'Sales Report';  
        $this->session->set_userdata('referred_from', current_url());

        $this->data['orgs'] = $this->Organization->organizations();

        $this->load->view('inc/admin_header', $this->data);
        $this->load->view('reports/sales_pg', $this->data);
        $this->load->view('inc/footer');
    }
    /* REPORTS END */



    #========================Another Items Section Start ======================
    

    public function item_breakdown () {
        if(!isset($_POST['item_id'])) {
            echo 'error';
        } else {
            $itemid = $this->input->post('item_id');
            $breakdown_value = $this->input->post('breakdown_value');
            $price = $this->input->post('unit_price');
            $unitid = $this->input->post('unit_id');
            $formula = $this->input->post('formula');  //use this to get the buying price

            //now get item details
            $item = $this->db->select('a.*, b.unit_name')
                          ->from('items as a')
                          ->join('units as b', 'a.unit_id = b.unit_id','left')
                          ->where('a.item_id',$itemid)
                          ->get()->row();
            $this_price = ceil($item->buying_price / $formula); //roundup the result

            $thisunit = $this->db->select('unit_name')->from('units')->where('unit_id',$unitid)->get()->row('unit_name');
            
            $form_data = array(
                "item_name"      => $item->item_name.' '.$breakdown_value.' '.$thisunit,
                "org_id"         => $item->org_id,
                "category_id"    => $item->category_id,
                "unit_id"        => $unitid,
                "brand_id"       => $item->brand_id,
                "attribute_id"   => $item->attribute_id,
                "tax_type_id"    => $item->tax_type_id,
                "parent_item_id" => $itemid,
                "buying_price"   => $this_price,
                "marked_price"   => $price,
                "image"          => $item->image,
                "for_sale"       => $item->for_sale,
                "for_purchase"   => $item->for_purchase,
                "for_bar"        => $item->for_bar,
                "narrative"      => 'Child Item',
                "availability"   => $item->availability,
                "available_qty"  => $formula,
                "breakdown_formula"  => $formula,
                "active"         => 1
            );
    
            if($this->Inserts->insert_data('items', $form_data)){
                //you have to reduce the parent item available_qty by 1 now. 
                //Assumption: The box/can/bucket/packet e.t.c have been opened or broken down, so it can nolonger be sold whole
                $this->db->query("UPDATE items SET available_qty = (available_qty - 1) WHERE item_id = '$itemid' ");

                $this->session->set_flashdata('alert', '<div class="alert alert-success">Item breakdown successful. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }

    public function item_breakdown2 () {
        if(!isset($_POST['childid'])) {
            echo 'error';
        } else {
            $childid = $this->input->post('childid');
            $parentid = $this->input->post('parentid');

            //now get item details
            $this->db->trans_start(); //start transaction
            $formula = $this->db->select('breakdown_formula')->from('items')->where('item_id',$childid)->get()->row('breakdown_formula');
            $this->db->query("UPDATE items SET available_qty = (available_qty - 1) WHERE item_id = '$parentid' ");
            $this->db->query("UPDATE items SET available_qty = '$formula' WHERE item_id = '$childid' ");
            $this->db->trans_complete(); //end transaction

            if($this->db->trans_status() === TRUE) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Item redistribution successful. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                echo 'success';
            }
            else echo 'error';
        }
    }
    public function delete_item_breakdown () {
        if(!isset($_POST['childid'])) {
            echo 'error';
        } else {
            $childid = $this->input->post('childid');

            //now get item details
            $this->db->trans_start(); //start transaction
            $this->db->query("DELETE FROM items WHERE item_id = '$childid' ");
            $this->db->trans_complete(); //end transaction

            if($this->db->trans_status() === TRUE) {
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Item deleted successfully. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                echo 'success';
            }
            else echo 'error';
        }
    }


    #========================Another Items Section End ======================



    // Contact Support Start
    public function contact_support () {
        // get user details
        $user = $this->db->select('a.*, b.org_name')
                        ->from('entitys as a')
                        ->join('orgs as b','a.org_id = b.org_id')
                        ->where('a.entity_id', $_SESSION['userid'])
                        ->get()->row();
        $form_data = array(
            "entity_id" => $_SESSION['userid'],
            "subject" => $_POST['subject'],
            "narrative" => $_POST['narrative']
        );
        if($this->db->insert('support', $form_data)) {
            $insertID = $this->db->insert_id();

            // send email
            $subject = $_POST['subject'];
            $body  = $_POST['narrative'];
            $body  .= '<p>
                            Regards,
                            '.$user->firstname.' '.$user->lastname.' <br/>
                            '.$user->org_name.' <br/>
                            Phone: '.$user->phone.' <br/>
                            Email: '.$user->email.' <br/>
                        </p>';
            $sendEmail = $this->Mailing->send_email('onyangoreaggan@gmail.com', $subject, $body);
            if($sendEmail){
                #insert data into database
                $email_data = array(
                    "org_id"            => $user->org_id,
                    "sys_email_id"      => 1,
                    "table_id"          => $user->entity_id,
                    "table_name"        => 'support',
                    "emailed"           => true,
                    "email_recipient"   => 'info@jiwanitech.com,'.$user->email,
                    "email_cc"          => 'jiwanilimited@gmail.com',
                    "email_subject"     => $subject,
                    "email_body"        => $body
                );
                $this->db->insert('sys_emailed', $email_data);
                #echo Email Sent
                $this->session->set_flashdata('alert', '<div class="alert alert-success">Email successfully sent. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                redirect($_SESSION['referred_from'], 'refresh');
            }
            else {
                #insert data into database
                $email_data = array(
                    "org_id"            => $user->org_id,
                    "sys_email_id"      => 1,
                    "table_id"          => $user->entity_id,
                    "table_name"        => 'support',
                    "emailed"           => false,
                    "email_recipient"   => 'info@jiwanitech.com',
                    "email_cc"          => 'jiwanilimited@gmail.com',
                    "email_subject"     => $subject,
                    "email_body"        => $body
                );
                $this->db->insert('sys_emailed', $email_data);
                #echo "Email NOT Sent";
                var_dump($sendEmail);
                // $this->session->set_flashdata('alert', '<div class="alert alert-warning">Failed! Email not sent. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
                // redirect($_SESSION['referred_from'], 'refresh');
            }
        } else {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Failed! Try again later. <span aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">&times;</span></div>');
            redirect($_SESSION['referred_from'], 'refresh');
        }
    }
    // Contact Support End



    public function test_report () {
        $this->load->library('pdf');
        $html = $this->load->view('reports/test', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
        $this->pdf->createPDF($html, 'mypdf');
    }

    public function items_list () {
        $this->data['items'] = $this->Majorselects->all_items();

        $this->load->library('pdf');
        $html = $this->load->view('reports/items_list', $this->data, true);
        $this->pdf->createPDF($html, 'items_list');
   }


}