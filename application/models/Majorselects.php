<?php

class Majorselects extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    /* Index Page Analytics Start */
    public function get_count($db)
    {
        #count data
        $this->db->select('*');
        $this->db->from($db);
        $result = $this->db->get();
        return $result->num_rows();
    }
    /* Index Page Analytics End */


    public function general_trailogs () {
        return $this->db->order_by('time_stamp desc')->get('sys_logs')->result();
    }

    public function get_user()
    {

        #get user details in session
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname,
            entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport, entitys.active, entitys.system_role,
            entitys.super_user, entitys.profile_picture, entitys.date_modified, entitys.time_stamp,

            roles.role_name, roles.permission,

            orgs.org_name, orgs.address

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id');
        $this->db->where("entitys.email = '".$_SESSION['username']."' ");
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function entitys($id) {
        #get user based on entity_id/ userid
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname,
            entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport, entitys.active, entitys.system_role,
            entitys.super_user, entitys.profile_picture, entitys.date_modified, entitys.time_stamp,

            roles.role_name, roles.permission,

            orgs.org_name, orgs.address

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id');
        $this->db->where("entitys.entity_id = '".$id."' ");
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function entity_with_roles($role) {
        #get all entitys with given roles
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname,
            entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport, entitys.active, entitys.system_role,
            entitys.super_user, entitys.profile_picture, entitys.date_modified, entitys.time_stamp,

            roles.role_name, roles.permission,

            orgs.org_name, orgs.address

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id');
        $this->db->where("roles.role_id = '".$role."' OR entitys.entity_id = 1 ");
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function all_entitys() {
        #get all users
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname,
            entitys.secondname, entitys.lastname, entitys.phone, entitys.gender,
            entitys.dob, entitys.id_passport, entitys.active, entitys.system_role,
            entitys.super_user, entitys.profile_picture, entitys.date_modified, entitys.time_stamp,

            roles.role_name, roles.permission,

            orgs.org_name, orgs.address

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id');
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function system_roles()
    {
        $this->db->from('roles');
        if($_SESSION['superuser'] != 1) $this->db->where("active = '1' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function stations()
    {
        $this->db->from('stations');
        $result = $this->db->get();
        return $result->result();
    }

    public function status()
    {
        $this->db->from('status');
        $result = $this->db->get();
        return $result->result();
    }

    public function payment_modes()
    {
        $this->db->from('payment_modes');
        $result = $this->db->get();
        return $result->result();
    }

    public function attachment_types() {
        $this->db->from('attachment_types');
        $result = $this->db->get();
        return $result->result();
    }

    public function item_status() {
        $this->db->from('item_status');
        $result = $this->db->get();
        return $result->result();
    }

    public function all_orgs () {
        #get all orgs
        $this->db->select ('
            orgs.org_id, orgs.org_name, orgs.address, orgs.email, orgs.phone, orgs.default_sp,
            orgs.active as org_active, orgs.currency_id, orgs.country_id, orgs.parent_org,
            orgs.narrative as org_narrative, orgs.date_modified, orgs.time_stamp,

            currencies.currency_code, currencies.active as currency_active,
            currencies.narrative as currency_narrative,

            countries.name as country_name, countries.active as country_active

            FROM orgs
        ', FALSE);
        $this->db->join('currencies', 'currencies.currency_id = orgs.org_id','left');
        $this->db->join('countries', 'countries.country_id = orgs.country_id','left');
        $this->db->order_by('orgs.org_name ASC');
        $result = $this->db->get();
        return $result->result();
    }
    public function this_org ($id) {
        #get this orgs
        $this->db->select ('
            orgs.org_id, orgs.parent_org, orgs.org_name, orgs.address, orgs.email, orgs.phone,
            orgs.active as org_active, orgs.currency_id, orgs.country_id, orgs.default_sp,
            orgs.narrative as org_narrative, orgs.date_modified, orgs.time_stamp,

            currencies.currency_code, currencies.active as currency_active,
            currencies.narrative as currency_narrative,

            countries.name as country_name, countries.active as country_active

            FROM orgs
        ', FALSE);
        $this->db->join('currencies', 'currencies.currency_id = orgs.currency_id','left');
        $this->db->join('countries', 'countries.country_id = orgs.country_id','left');
        $this->db->where("orgs.org_id = '".$id."' ");
        $this->db->order_by('orgs.org_name ASC');
        $result = $this->db->get();
        return $result->result();
    }


    public function all_attributes () {
        #get all attributes#
        $this->db->from('attributes');
        $this->db->order_by("attribute_name ASC");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_attribute ($id) {
        #get all attributes#
        $this->db->from('attributes');
        $this->db->where("attribute_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function package_types () {
        #get package types
        $this->db->from('package_types');
        $result = $this->db->get();
        return $result->result();
    }

    public function all_brands () {
        #get all brands
        $this->db->from('brands');
        $this->db->order_by("brand_name ASC");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_brand ($id) {
        #brand profile
        $this->db->from('brands');
        $this->db->where("brand_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function brands_models () {
        #get models
        $this->db->select('brand_models.*, brands.brand_name
            FROM brand_models 
        ', FALSE);
        $this->db->join("brands", "brands.brand_id = brand_models.brand_id");
        $this->db->order_by(" brands.brand_name, brand_models.model_name ASC ");
        $result = $this->db->get();
        return $result->result();
    }

    public function all_eating_tables () {
        #get all_eating_tables
        $this->db->select('eating_tables.*, orgs.org_name
            FROM eating_tables
        ', FALSE);
        $this->db->join("orgs", "orgs.org_id = eating_tables.org_id");
        $result = $this->db->get();
        return $result->result();
    }


    public function all_units () {
        #get all units
        $this->db->from('units');
        $this->db->order_by("unit_name ASC");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_unit ($id) {
        #unit profile
        $this->db->from('units');
        $this->db->where("unit_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function transaction_types () {
        #get all transaction types
        $this->db->from('transaction_types');
        $result = $this->db->get();
        return $result->result();
    }

    public function all_countries () {
        #get all countries
        $this->db->from('countries');
        $this->db->order_by("name ASC");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_country ($id) {
        #country profile
        $this->db->from('countries');
        $this->db->where("country_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function all_currencies () {
        #get all currencies
        $this->db->from('currencies');
        $this->db->order_by("currency_code ASC");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_currency ($id) {
        #currency profile
        $this->db->from('currencies');
        $this->db->where("currency_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function year_months() {
        $this->db->from('year_months');
        $result = $this->db->get();
        return $result->result();
    }
    
    public function fiscal_years() {
        $this->db->from('fiscal_years');
        $result = $this->db->get();
        return $result->result();
    }

    public function designations() {
        $this->db->from('designations');
        $result = $this->db->get();
        return $result->result();
    }
    
    public function deductibles() {
        $this->db->from('designations');
        $result = $this->db->get();
        return $result->result();
    }

    public function allowances() {
        $this->db->from('designations');
        $result = $this->db->get();
        return $result->result();
    }

    public function all_tax_types () {
        #get all tax_types
        $this->db->from('tax_types');
        $this->db->order_by("tax_type_name ASC");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_tax_type ($id) {
        #tax_type profile
        $this->db->from('tax_types');
        $this->db->where("tax_type_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function all_categories () {
        #get all categories
        $this->db->from('categories');
        $this->db->order_by("cat_name ASC");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_category ($id) {
        #category profile
        $this->db->from('categories');
        $this->db->where("cat_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }


    /* Items Start */
    public function all_items () {
        #get all items
        $this->db->select ('
            items.*,

            orgs.org_name, orgs.address,
            units.unit_name,
            colors.color_name,
            brands.brand_name,
            brand_models.model_name,
            package_types.package_type_name,
            tax_types.tax_type_name, tax_types.tax_rate,
            (SELECT SUM(available_qty) FROM items_store WHERE items_store.item_id = items.item_id) as total_items

            FROM items
        ', FALSE);
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id','left');
        $this->db->join('package_types', 'package_types.package_type_id = items.package_type_id','left');
        $this->db->join('orgs', 'orgs.org_id = items.org_id','left');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('colors', 'colors.color_id = items.color_id', 'left');
        $this->db->join('brand_models', 'brand_models.brand_model_id = items.brand_model_id', 'left');
        #if($_SESSION['superuser'] == 1) $this->db->where("items.org_id = '".$_SESSION['orgid']."' ");
        $this->db->order_by('items.item_name ASC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function all_failed_imports() {
            #get all failed import items
            $this->db->select ('
            items_three.*,
            tax_types.tax_type_name, tax_types.tax_rate

            FROM items_three
        ', FALSE);
        $this->db->join('tax_types', 'tax_types.tax_type_id = items_three.tax_type_id','left');
        $this->db->order_by('items_three.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function stock_items($stroreID) {
        #get the items in a given store
        $this->db->select ('
            items.*,

            orgs.org_name, orgs.address,
            units.unit_name,
            brands.brand_name,
            colors.color_name,
            brand_models.model_name, brand_models.reorder_level,
            package_types.package_type_name,
            tax_types.tax_type_name, tax_types.tax_rate

            FROM items
        ', FALSE);
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id','left');
        $this->db->join('package_types', 'package_types.package_type_id = items.package_type_id','left');
        $this->db->join('orgs', 'orgs.org_id = items.org_id','left');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('brand_models', 'brand_models.brand_model_id = items.brand_model_id', 'left');
        $this->db->join('colors', 'colors.color_id = items.color_id', 'left');
        $this->db->where("items.org_id = '".$stroreID."' ");
        #$this->db->order_by('brands.brand_name, brand_models.model_name ASC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function this_item ($id) {
        #get this item
        $this->db->select ('
            items.*,

            orgs.org_name, orgs.address,
            units.unit_name,
            brands.brand_name,
            colors.color_name,
            brand_models.model_name,
            package_types.package_type_name,
            tax_types.tax_type_name, tax_types.tax_rate

            FROM items
        ', FALSE);
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id');
        $this->db->join('package_types', 'package_types.package_type_id = items.package_type_id','left');
        $this->db->join('orgs', 'orgs.org_id = items.org_id');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('colors', 'colors.color_id = items.color_id', 'left');
        $this->db->join('brand_models', 'brand_models.brand_model_id = items.brand_model_id', 'left');
        $this->db->where("items.item_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }
    /* Items End */

    /* Orders Start */
    public function orders ($storeID) {
        #get all orders
         $this->db->select ("
                a.*,
                b.firstname, b.secondname, b.phone, b.id_passport, b.email,
                (SELECT CONCAT(ifnull(b.firstname,''),' ',ifnull(b.secondname,''),' ',ifnull(b.lastname,'')) FROM entitys WHERE b.entity_id = a.customer_supplier_id) AS customer_supplier_name
            ");
        $this->db->from('orders as a');
        $this->db->join('entitys as b', 'a.entity_id = b.entity_id','left');
        $this->db->where("a.org_id = '".$storeID."' ");
        $this->db->order_by('a.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
    }
    public function settled_orders ($status) {
        #get the count of order status
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where("paid_status = '".$status."' ");
        $result = $this->db->get();
        return $result->num_rows();
    }
    public function total_settled_orders ($status) {
        #get the count of order status
        $this->db->select('
            SUM(net_amount) as total_amount
            FROM orders
        ', FALSE);
        $this->db->where("paid_status = '".$status."' ");
        $result = $this->db->get();
        return $result->result();
    }
    public function last_order () {
        #get last order
        $this->db->select ('
            order_id
            FROM orders
        ', FALSE);
        $this->db->order_by('order_id DESC');
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result();
    }
    public function order_id ($code) {
        #get order_id
        $this->db->select ('
            order_id
            FROM orders
        ', FALSE);
        $this->db->where("bill_no = '".$code."' ");
        $result = $this->db->get();
        return $result->result();
    }
    public function order_profile($id) {
        #get the order details
        $this->db->select ("
            a.*,
            b.org_name, b.address as org_address, b.email as org_email, b.phone as org_phone,
            c.firstname, c.secondname, c.phone, c.id_passport, c.email,
            d.transaction_type_name,
            (SELECT CONCAT(ifnull(entitys.firstname,''),' ',ifnull(entitys.secondname,''),' ',ifnull(entitys.lastname,'')) FROM entitys WHERE entitys.entity_id = a.customer_supplier_id) AS customer_supplier_name
        ");
        $this->db->from('orders as a');
        $this->db->join('orgs as b', 'b.org_id = a.org_id','left');
        $this->db->join('entitys as c', 'c.entity_id = a.entity_id','left');
        $this->db->join('transaction_types as d', 'd.transaction_type_id = a.transaction_type_id','left');
        $this->db->where("a.order_id = '".$id."' ");
        $this->db->order_by('a.time_stamp DESC');
        $result = $this->db->get();
        return $result->row();
        #return $this->db->last_query();
    }
    public function order_items($id, $items = null) {
        #get the order details
        $this->db->select ('
            a.*,

            b.category_id, b.unit_id, b.brand_id, b.brand_model_id, b.attribute_id, b.tax_type_id, b.imei_one, b.imei_two,
            b.capacity, b.model_year, b.color_id, b.item_name, b.buying_price, b.selling_price, b.image, b.narrative,
            b.availability, b.active, b.barcode,

            c.color_name,
            d.unit_name,
            e.brand_name, 
            g.tax_type_name,

            h.firstname, h.secondname, h.lastname, h.phone
        ');
        $this->db->from('order_items as a');
        $this->db->join('items as b', 'b.item_id = a.item_id');
        $this->db->join('colors as c', 'c.color_id = b.color_id', 'left');
        $this->db->join('units as d', 'd.unit_id = b.unit_id','left');
        $this->db->join('brands as e', 'e.brand_id = b.brand_id', 'left');
        $this->db->join('tax_types as g', 'g.tax_type_id = b.tax_type_id','left');
        $this->db->join('entitys as h', 'h.entity_id = a.entity_id','left');
        $this->db->where("a.order_id = '".$id."' ");

        // get only specific items if set
        if($items != null) {
            $arr = '(';
            for($x = 0; $x < COUNT($items); $x++) {
                $arr .= $items[$x].',';
            }
            $arr .= '0)';

            $this->db->where("a.order_item_id IN $arr ");
        }

        $result = $this->db->get();
        return $result->result();
    }

    public function order_purchases($id) {
        #get the order details for purchases
        $this->db->select ('
            order_purchases.order_purchase_id, order_purchases.org_id, order_purchases.order_id, order_purchases.brand_model_id, order_purchases.qty, 
            order_purchases.model_year, order_purchases.capacity, order_purchases.color, order_purchases.imei, order_purchases.selling_price, 
            order_purchases.price_estimate, order_purchases.image, order_purchases.narrative, order_purchases.date_modified, order_purchases.time_stamp,
            
            brand_models.model_name,
            brands.brand_name

            FROM order_purchases
        ', FALSE);
        $this->db->join('brand_models', 'order_purchases.brand_model_id = brand_models.brand_model_id');
        $this->db->join('brands', 'brand_models.brand_id = brands.brand_id', 'left');     
        $this->db->where("order_purchases.order_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }


    /* Orders End */



    /* Reports START */
    public function item_sales_rpt ($orgid, $fromdate, $todate, $paid) {
        $this->db->select ('
            orders.date_time, SUM(orders.service_charge) as service_charge,
            SUM(orders.tax_charge) as tax_charge, SUM(orders.net_amount) as net_amount,
            SUM(orders.discount) as discount, SUM(orders.paid_amount) as paid_amount, SUM(orders.paying_balance) as paying_balance, orders.paid_status

            FROM orders
        ', FALSE);
        $this->db->where(" (orders.date_time BETWEEN '$fromdate' AND '$todate') AND orders.org_id = '$orgid' AND orders.paid_status = '$paid' ");
        $this->db->group_by('MONTH(orders.date_time)');
        $result = $this->db->get();
        return $result->result();
    }
    
    public function staff_sales_rpt ($staffid = null, $fromdate = null, $todate = null, $paid) {
        $this->db->select ('
            a.date_time, SUM(a.service_charge) as service_charge,
            SUM(a.tax_charge) as tax_charge, SUM(a.net_amount) as net_amount,
            SUM(a.discount) as discount, SUM(a.paid_amount) as paid_amount, 
            SUM(a.paying_balance) as paying_balance, 

            b.entity_id, b.firstname, b.secondname, b.lastname, b.phone, b.email

        ');
        $this->db->from('orders as a');
        $this->db->join('entitys as b', 'a.entity_id = b.entity_id');
        $this->db->where(" a.date_time between '$fromdate' AND '$todate' ");
        if($staffid != null) 
            $this->db->where(" a.entity_id = '$staffid' ");

        // $this->db->group_by('MONTH(date_time) ASC');
        $this->db->group_by('a.entity_id');
        return $this->db->get()->result();
        // return $this->db->last_query();
    }
    /* Reports END */


    ##count items available
    public function available_items () {
        return $this->db->select("SUM(available_qty) as available_qty")->get("items_store")->row('available_qty');
    }

    ##needs reorder
    public function needs_reorder () {
        $sel = "SELECT reorder_level, (SELECT SUM(available_qty) FROM items_store WHERE items_store.item_id = items.item_id) AS total_items
                FROM items
                WHERE reorder_level <= (SELECT SUM(available_qty) FROM items_store WHERE items_store.item_id = items.item_id)";
        return $this->db->query($sel)->num_rows();
    }

























    public function competition_percentage ($competition_id) {
        #gets the level of competition in percentage. How far the competition has reached
        #this is then displayed on the banner
        $this->db->select('
                COUNT(stage_id) as totals,
                COUNT(IF(status_id = "1" ,1, NULL)) AS approved,
                COUNT(IF(status_id = "2" ,2, NULL)) AS completed,

                ((COUNT(IF(status_id = "2" ,2, NULL)) / COUNT(stage_id)) * 100 ) AS competition_percentage

                FROM competition_stages
        ', FALSE);
        $this->db->where("competition_id = '".$competition_id."' ");
        $result = $this->db->get();
        return $result->result();
    }



}




