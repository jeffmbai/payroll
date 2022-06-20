<?php

class Business_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    ### All Items start
    public function all_items () {
        #get all items
        $this->db->select ('
           items_store.*,
           items.brand_id, items.brand_id, items.color_id, items.tax_type_id, items.for_sale, items.for_purchase, items.image,

           orgs.org_name, orgs.address,
           units.unit_name,
           brands.brand_name,
           colors.color_name,
           package_types.package_type_name,
           tax_types.tax_type_name, tax_types.tax_rate

           FROM items_store
        ', FALSE);
        $this->db->join('items', 'items_store.item_id = items.item_id');
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id','left');
        $this->db->join('package_types', 'package_types.package_type_id = items.package_type_id','left');
        $this->db->join('orgs', 'orgs.org_id = items_store.store_id');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('brand_models', 'brand_models.brand_model_id = items.brand_model_id', 'left');
        $this->db->join('colors', 'colors.color_id = items.color_id', 'left');

        if(isset($_SESSION['shop_id'])) $this->db->where("items_store.store_id", $_SESSION['shop_id']); //selecct only items from the shop

        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ### All Items end

    ## Specified Statsu Items Start
    public function  status_items ($statusID) {
        #query based on item status
        $this->db->select ('
            items.*,
            
            orgs.org_name, orgs.address,
            units.unit_name,
            brands.brand_name,
            brand_models.brand_model_id, brand_models.model_name,
            tax_types.tax_type_name, tax_types.tax_rate,
            item_status.item_status_name

            FROM items
        ', FALSE);
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id', 'left');
        $this->db->join('orgs', 'orgs.org_id = items.org_id');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('brand_models', 'brands.brand_id = brand_models.brand_id', 'left');
        $this->db->join('item_status', 'item_status.item_status_id = items.item_status_id', 'left');
        #if($_SESSION['superuser'] != 1) { $this->db->where("items.org_id = '".$_SESSION['orgid']."' "); }
        $this->db->where("items.item_status_id = '".$statusID."' ");
        $this->db->order_by('items.item_name ASC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ## Specified Statsu Items End

    ## Sales/purchase Items Start
    public function  sale_purchase ($value) {
        $this->db->select ('
            items.*,            
            orgs.org_name, orgs.address,
            units.unit_name,
            brands.brand_name,
            brand_models.brand_model_id, brand_models.model_name,
            tax_types.tax_type_name, tax_types.tax_rate,
            item_status.item_status_name

            FROM items
        ', FALSE);
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id', 'left');
        $this->db->join('orgs', 'orgs.org_id = items.org_id');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('brand_models', 'brands.brand_id = brand_models.brand_id', 'left');
        $this->db->join('item_status', 'item_status.item_status_id = items.item_status_id', 'left');
        #if($_SESSION['superuser'] != 1) { $this->db->where("items.org_id = '".$_SESSION['orgid']."' "); }
        if($value = 'all') {$this->db->where("items.for_sale = 1 OR items.for_purchase = 1 OR items.for_bar = 1 ");}
        if($value = 'sale') {$this->db->where("items.for_sale = 1 ");}
        if($value = 'purchase') {$this->db->where("items.for_purchase = 1 ");}
        if($value = 'bar') {$this->db->where("items.for_bar = 1 ");}
        
        $this->db->order_by('items.item_name ASC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ## Sale/purchase Items End

    ## Item Search Start
    public function search_item ($data, $spurpose) {
        $data = trim($data);
        #get all items
        $this->db->select ('
           items_store.*,
           items.brand_id, items.brand_id, items.color_id, items.tax_type_id, items.for_sale, items.for_purchase, items.image,

           orgs.org_name, orgs.address,
           units.unit_name,
           brands.brand_name,
           colors.color_name,
           package_types.package_type_name,
           tax_types.tax_type_name, tax_types.tax_rate

           FROM items_store
        ', FALSE);
        $this->db->join('items', 'items_store.item_id = items.item_id');
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id','left');
        $this->db->join('package_types', 'package_types.package_type_id = items.package_type_id','left');
        $this->db->join('orgs', 'orgs.org_id = items_store.store_id');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('brand_models', 'brand_models.brand_model_id = items.brand_model_id', 'left');
        $this->db->join('colors', 'colors.color_id = items.color_id', 'left');
        //$this->db->where("items_store.store_id = '3' "); //selecct only items from the shop

        if($spurpose == 'sale') $this->db->where("CONCAT(ifnull(items.barcode,''),' ',ifnull(items.selling_price,''),' ',ifnull(items.item_name,''),' ',ifnull(brands.brand_name,'')) LIKE '%$data%' AND items.for_sale = 1 "); 
        if($spurpose == 'bar') $this->db->where("CONCAT(ifnull(items.barcode,''),' ',ifnull(items.selling_price,''),' ',ifnull(items.item_name,''),' ',ifnull(brands.brand_name,'')) LIKE '%$data%'  AND items.for_bar = 1 "); 
        if($spurpose == 'all') $this->db->where("CONCAT(ifnull(items.barcode,''),' ',ifnull(items.selling_price,''),' ',ifnull(items.item_name,''),' ',ifnull(brands.brand_name,'')) LIKE '%$data%' "); 

        if(isset($_SESSION['shop_id'])) $this->db->where("items_store.store_id", $_SESSION['shop_id']); //selecct only items from the shop

        $this->db->order_by('items_store.item_name ASC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function search_category_items ($catid) {
        #get all items
        $this->db->select ('
           items_store.*,
           items.brand_id, items.brand_id, items.color_id, items.tax_type_id, items.for_sale, items.for_purchase, items.image,

           orgs.org_name, orgs.address,
           units.unit_name,
           brands.brand_name,
           colors.color_name,
           package_types.package_type_name,
           tax_types.tax_type_name, tax_types.tax_rate

           FROM items_store
        ', FALSE);
        $this->db->join('items', 'items_store.item_id = items.item_id');
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id','left');
        $this->db->join('package_types', 'package_types.package_type_id = items.package_type_id','left');
        $this->db->join('orgs', 'orgs.org_id = items_store.store_id');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('brand_models', 'brand_models.brand_model_id = items.brand_model_id', 'left');
        $this->db->join('colors', 'colors.color_id = items.color_id', 'left');
        $this->db->where("items.category_id = '$catid' ");

        if(isset($_SESSION['shop_id'])) $this->db->where("items_store.store_id", $_SESSION['shop_id']); //selecct only items from the shop

        $this->db->order_by('items_store.item_name ASC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function search_barcode ($data) {
        $data = trim($data);
        #get all items
        $this->db->select ('
            items.*,

            units.unit_name,
            brands.brand_name,
            colors.color_name,
            tax_types.tax_rate, tax_types.tax_type_name,
            brand_models.brand_model_id, brand_models.model_name,
            package_types.package_type_name

            FROM items
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = items.org_id');
        $this->db->join('units', 'units.unit_id = items.unit_id', 'left');
        $this->db->join('colors', 'colors.color_id = items.color_id', 'left');
        $this->db->join('tax_types', 'tax_types.tax_type_id = items.tax_type_id', 'left');
        $this->db->join('package_types', 'package_types.package_type_id = items.package_type_id', 'left');
        $this->db->join('brands', 'brands.brand_id = items.brand_id', 'left');
        $this->db->join('brand_models', 'brands.brand_id = brand_models.brand_id', 'left');
        $this->db->where("items.barcode",$data); 
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ## Item Search End

    ##Sales Start
    public function sales ($orgid = null, $from_date = null, $to_date = null) {
        #all sales
        $this->db->select ("
            orders.*,
            
            entitys.firstname, entitys.secondname, entitys.phone, entitys.id_passport, entitys.email,
            orgs.org_name,
            eating_tables.eating_table_name,
            transaction_types.transaction_type_name,
            
            (SELECT CONCAT(ifnull(entitys.firstname,''),' ',ifnull(entitys.secondname,''),' ',ifnull(entitys.lastname,'')) FROM entitys WHERE entitys.entity_id = orders.customer_supplier_id ) AS customer_supplier_name,

            (SELECT SUM(payment_amount) FROM order_payments WHERE orders.order_id = order_payments.order_id) AS total_paid
            
            FROM orders
        ", FALSE);
        $this->db->join('orgs', 'orgs.org_id = orders.org_id');
        $this->db->join('entitys', 'entitys.entity_id = orders.entity_id');
        $this->db->join('eating_tables', 'eating_tables.eating_table_id = orders.eating_table_id','left');
        $this->db->join('transaction_types', 'transaction_types.transaction_type_id = orders.transaction_type_id');
        $this->db->where("orders.transaction_type_id = 1 OR orders.transaction_type_id = 3"); 

        if($orgid != null)
            $this->db->where("orders.org_id", $orgid); 

        if($from_date != null && $to_date != null)
            $this->db->where("orders.date_time BETWEEN '$from_date' AND '$to_date' "); 

        $this->db->order_by('orders.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ##Sales End

    ##Purchases Start
    public function purchases ($orgid = null, $from_date = null, $to_date = null) {
        #all purchases
        $this->db->select ("
            orders.*,
            
            entitys.firstname, entitys.secondname, entitys.phone, entitys.id_passport, entitys.email,
            orgs.org_name,
            transaction_types.transaction_type_name,
            
            (SELECT CONCAT(entitys.firstname,' ',entitys.secondname,' ',entitys.lastname) FROM entitys WHERE entitys.entity_id = orders.customer_supplier_id ) AS customer_supplier_name,

            (SELECT SUM(payment_amount) FROM order_payments WHERE orders.order_id = order_payments.order_id) AS total_paid
            
            FROM orders
        ", FALSE);
        $this->db->join('orgs', 'orgs.org_id = orders.org_id');
        $this->db->join('entitys', 'entitys.entity_id = orders.entity_id');
        $this->db->join('transaction_types', 'transaction_types.transaction_type_id = orders.transaction_type_id');
        $this->db->where("orders.transaction_type_id = 2 OR orders.transaction_type_id = 4"); 

        if($orgid != null)
            $this->db->where("orders.org_id", $orgid); 

        if($from_date != null && $to_date != null)
            $this->db->where("orders.date_time BETWEEN '$from_date' AND '$to_date' "); 
            
        $this->db->order_by('orders.order_id DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ##Purchases End


    ##Returns Start
    public function item_returned() {
        $this->db->select ("
            item_returned.*,
            items.item_name, items.barcode,

            item_status.item_status_name,

            orders.bill_no,

            entitys.firstname, entitys.secondname, entitys.lastname

            FROM item_returned
        ", FALSE);
        $this->db->join('items', 'items.item_id = item_returned.item_id');
        $this->db->join('item_status', 'item_returned.item_status_id = item_status.item_status_id');
        $this->db->join('orders', 'orders.order_id = item_returned.order_id');
        $this->db->join('entitys', 'entitys.entity_id = item_returned.entity_id');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ##Returns End

    ##Order Payments Start
    public function order_payments($orderID) {
        $this->db->select ("
            a.order_payment_id, a.order_id, a.account_id, a.entity_id, 
            a.payment_amount, a.payment_date, a.transaction_code, 
            a.bank_account_number, a.check_number, a.check_maturity_date, 
            a.paid_by, a.narrative, a.date_modified, a.time_stamp,
            
            b.account_name, b.account_code,
            
            c.firstname, c.secondname, c.email, c.id_passport
        ");
        $this->db->from('order_payments as a');
        $this->db->join('accounts as b', 'a.account_id = b.account_id');
        $this->db->join('entitys as c', 'c.entity_id = a.entity_id');
        $this->db->where('a.order_id', $orderID);
        $result = $this->db->get();
        return $result->result();
    }
    public function payment_details($id) {
        return $this->db->select("a.*, 
                            b.bill_no, b.reference, b.date_time, b.net_amount, b.paid_status, b.customer_supplier_id,
                            c.account_name, c.account_code,
                            d.firstname, d.secondname, d.lastname, d.phone, d.email,
                            (SELECT CONCAT(ifnull(firstname,''),' ',ifnull(secondname,''),' ',ifnull(lastname,'')) FROM entitys WHERE a.entity_id = entitys.entity_id) AS cashier_name
                        ")
                        ->from('order_payments as a')
                        ->join('orders as b','a.order_id = b.order_id')
                        ->join('accounts as c','a.account_id = c.account_id')
                        ->join('entitys as d','b.customer_supplier_id = d.entity_id')
                        ->where('a.order_payment_id',$id)
                        ->get()->row();
    }
    ##Order Payments End

    ##Invoice Payments Start
    public function payments() {
        $this->db->select ("
            orders.*,            
            entitys.firstname, entitys.secondname, entitys.phone, entitys.id_passport, entitys.email,
            orgs.org_name,
            transaction_types.transaction_type_name,
            payment_modes.payment_mode_name,            
            (SELECT CONCAT(entitys.firstname,' ',entitys.secondname,' ',entitys.lastname) FROM entitys WHERE entitys.entity_id = orders.customer_supplier_id ) AS customer_supplier_name
        FROM orders
        ", FALSE);
        $this->db->join('orgs', 'orgs.org_id = orders.org_id');
        $this->db->join('entitys', 'entitys.entity_id = orders.entity_id');
        $this->db->join('transaction_types', 'transaction_types.transaction_type_id = orders.transaction_type_id');
        $this->db->join('payment_modes', 'payment_modes.payment_mode_id = orders.payment_mode_id');
        $this->db->where("orders.transaction_type_id = 5");
        $this->db->order_by('orders.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ##Invoice Payments End

    ##User Orders Start
    public function user_orders ($userID) {
        #all sales
        $this->db->select ("
                a.*,
                b.firstname, b.secondname, b.phone, b.id_passport, b.email,
                c.transaction_type_name,
                
                (SELECT CONCAT(ifnull(entitys.firstname,''),' ',ifnull(entitys.secondname,''),' ',ifnull(entitys.lastname,'')) FROM entitys WHERE entitys.entity_id = a.customer_supplier_id ) AS customer_supplier_name
            ");
        $this->db->from('orders as a');
        $this->db->join('entitys as b', 'a.entity_id = b.entity_id');
        $this->db->join('transaction_types as c', 'c.transaction_type_id = a.transaction_type_id');
        $this->db->where("a.customer_supplier_id", $userID);
        $this->db->order_by('a.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ##User Orders End

    ##Agent Orders Start
    public function agent_orders ($agentID, $from_date = null, $to_date = null) {
        $this->db->select ("
            orders.order_id, orders.org_id, orders.transaction_type_id, orders.entity_id, orders.customer_supplier_id, 
            orders.payment_mode_id, orders.bill_no, orders.date_time, orders.service_charge, orders.tax_charge, orders.net_amount, 
            orders.discount, orders.paid_status, orders.paid_amount, orders.paying_balance, orders.change_return, 
            orders.date_modified, orders.time_stamp,
            
            entitys.firstname, entitys.secondname, entitys.phone, entitys.id_passport, entitys.email,
            transaction_types.transaction_type_name,
            
            (SELECT CONCAT(entitys.firstname,' ',entitys.secondname,' ',entitys.lastname) FROM entitys WHERE entitys.entity_id = orders.customer_supplier_id ) AS customer_supplier_name,

            (SELECT SUM(payment_amount) FROM order_payments WHERE orders.order_id = order_payments.order_id) AS total_paid
            
            FROM orders
        ", FALSE);
        $this->db->join('entitys', 'entitys.entity_id = orders.entity_id');
        $this->db->join('transaction_types', 'transaction_types.transaction_type_id = orders.transaction_type_id');
        $this->db->where("orders.entity_id", $agentID);
        $this->db->where("orders.transaction_type_id IN (1,3) ");

        if($from_date != null && $to_date != null)
            $this->db->where("orders.date_time BETWEEN '$from_date' AND '$to_date' ");

        $this->db->order_by('orders.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ##Agent Orders End

    ##Agent Debt Start
    public function agent_debt ($agentID, $from_date = null, $to_date = null) {
        #get user debt
        $this->db->select ("
            orders.order_id, orders.org_id, orders.transaction_type_id, orders.entity_id, orders.customer_supplier_id, 
            orders.payment_mode_id, orders.bill_no, orders.date_time, orders.service_charge, orders.tax_charge, orders.net_amount, 
            orders.discount, orders.paid_status, orders.paid_amount, orders.paying_balance, orders.change_return,
            
            entitys.firstname, entitys.secondname, entitys.phone, entitys.id_passport, entitys.email,
            transaction_types.transaction_type_name,
            
            (SELECT CONCAT(entitys.firstname,' ',entitys.secondname,' ',entitys.lastname) FROM entitys WHERE entitys.entity_id = orders.customer_supplier_id ) AS customer_supplier_name
            
            FROM orders
        ", FALSE);
        $this->db->join('entitys', 'entitys.entity_id = orders.entity_id');
        $this->db->join('transaction_types', 'transaction_types.transaction_type_id = orders.transaction_type_id');
        $this->db->where("orders.entity_id = ".$agentID." AND orders.paying_balance > 0 ");
        $this->db->where("orders.transaction_type_id IN (1,3) ");

        if($from_date != null && $to_date != null)
            $this->db->where("orders.date_time BETWEEN '$from_date' AND '$to_date' ");

        $this->db->order_by('orders.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
    }
    ##Agent Debt End

    ##Get close day report start
    public function my_close_day ($dayDate) {
        //get summary sales based on brands
        $query = $this->db->query("SELECT *, 
                                        (select COUNT(brand_id) 
                                            FROM vw_my_close_day 
                                                WHERE 
                                                    brands.brand_id = vw_my_close_day.brand_id AND 
                                                    entity_id = '$_SESSION[userid]' AND
                                                    date_time = '$dayDate') AS number_sold,
                                        (SELECT net_amount 
                                            FROM vw_my_close_day 
                                                WHERE 
                                                    brands.brand_id = vw_my_close_day.brand_id AND 
                                                    entity_id = '$_SESSION[userid]' AND 
                                                    date_time = '$dayDate' LIMIT 1) AS net_amount,
                                            (SELECT paying_balance 
                                                FROM vw_my_close_day 
                                                    WHERE 
                                                        brands.brand_id = vw_my_close_day.brand_id AND 
                                                        entity_id = '$_SESSION[userid]' AND 
                                                        date_time = '$dayDate' LIMIT 1) AS paying_balance
                                    FROM brands");

        return $query->result();
    }
    public function my_close_day_detailed ($dayDate) {
        //get the specific items sold in this given day
        $query = $this->db->query("SELECT * FROM vw_my_close_day WHERE date_time = '$dayDate' ");
        return $query->result();
    } 
    ##Get close day report end




    #==========================================Request Items

    ##Requested Items Start
    public function item_request_list () {
        $this->db->select ("
            item_requests.*,
            orgs.org_name,
            items.item_name, items.barcode,
            CONCAT(entitys.firstname,' ',entitys.secondname,' ',entitys.lastname) AS requested_by, entitys.phone, entitys.id_passport,
            (SELECT CONCAT(firstname,' ',secondname,' ',lastname) FROM entitys WHERE entitys.entity_id = item_requests.approver_id) AS approved_by
            
            FROM item_requests 
        ", FALSE);
        $this->db->join('orgs', 'orgs.org_id = item_requests.store_id','left');
        $this->db->join('items', 'items.item_id = item_requests.item_id');
        $this->db->join('entitys', 'entitys.entity_id = item_requests.entity_id');
        if($_SESSION['superuser'] != 1) $this->db->where("item_requests.entity_id", $_SESSION['userid']); 
        $result = $this->db->get();
        return $result->result();
    }
    ##Requested Items End
   
    

}




