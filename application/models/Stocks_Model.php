<?php

class Stocks_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }


    public function stocks () {
        //all stocks
        $this->db->select ('
        stocks.stock_id, stocks.org_id, stocks.stock_name, stocks.stock_date, stocks.active, stocks.narrative, 
        stocks.date_modified, stocks.time_stamp,
        orgs.org_name

        FROM stocks
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = stocks.org_id');
        $this->db->order_by('stocks.stock_date DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    public function stock_details ($id) {
        //all stocks
        $this->db->select ('
        stocks.stock_id, stocks.org_id, stocks.stock_name, stocks.stock_date, stocks.active, stocks.narrative, 
        stocks.date_modified, stocks.time_stamp,
        orgs.org_name

        FROM stocks
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = stocks.org_id');
        $this->db->where('stocks.stock_id',$id);
        $this->db->order_by('stocks.stock_date DESC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }

    public function stock_lines ($id) {
        //stock lines
        $this->db->select ('
            stock_lines.*,
            stocks.stock_id, stocks.org_id as stock_org, stocks.stock_date,
            items_store.item_name, items_store.barcode,
            items.brand_id,
            brands.brand_name
        FROM stock_lines
        ', FALSE);
        $this->db->join('stocks', 'stocks.stock_id = stock_lines.stock_id');
        $this->db->join('items_store', 'items_store.item_store_id = stock_lines.item_store_id'); 
        $this->db->join('items', 'items.item_id = stock_lines.item_id');
        $this->db->join('brands', 'brands.brand_id = items.brand_id','left');
        $this->db->where('stock_lines.stock_id', $id);
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }

    public function stock_lines2 ($id) {
        //stock lines2 for shop with unique items(e.g electronics shop)
        $this->db->select ('
        stock_lines.stock_line_id, stock_lines.stock_id, stock_lines.item_id, stock_lines.item_quantity, stock_lines.active,
        stock_lines.system_quantity, stock_lines.narrative, stock_lines.date_modified, stock_lines.time_stamp,
        brand_models.model_name,
        brands.brand_name        

        FROM stock_lines
        ', FALSE);
        $this->db->join('brand_models', 'brand_models.brand_model_id = stock_lines.brand_model_id');
        $this->db->join('brands', 'brands.brand_id = brand_models.brand_id','left');
        $this->db->where('stock_lines.stock_id', $id);
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }

    public function stock_items($stroreID) {
         #get the items in a given store
         $this->db->select ('
            items_store.*,
            items.brand_id, items.brand_id, items.color_id, items.tax_type_id,

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
        $this->db->where("items_store.store_id = '".$stroreID."' ");
        #$this->db->order_by('brands.brand_name, brand_models.model_name ASC');
        $result = $this->db->get();
        return $result->result();
        //return $this->db->last_query();
    }

    public function store_items($id) {
        #get the items in a given store
        $this->db->select ('
           items_store.*,
           items.brand_id, items.brand_id, items.color_id, items.tax_type_id,

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
       $this->db->where("items_store.store_id = '".$id."' ");
       $result = $this->db->get();
       return $result->result();
       //return $this->db->last_query();
   }

    public function this_item ($itemid, $storeid) {
        #get this item
        $this->db->select ('
            items_store.*,
            items.brand_id, items.brand_id, items.color_id, items.tax_type_id,

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
        $this->db->where("items_store.item_id = '$itemid' AND items_store.store_id = '$storeid' ");
        //$this->db->get()->row();
        return $this->db->get()->row();
        //return $this->db->last_query();

    }


}




