<?php

class Stations_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function all_stations () {
        //all_stations
        $this->db->select ('
            stations.station_id, stations.org_id, stations.category_id, stations.station_name, stations.active,
            stations.narrative, stations.latitude, stations.longitude, stations.primary_phone, stations.secondary_phone,
            stations.other_phone, stations.primary_email, stations.secondary_email, stations.other_email, 
            stations.date_modified, stations.time_stamp,            
            orgs.org_name, orgs.address, orgs.phone,
            categories.cat_name, categories.cat_id,            
            currencies.currency_code,            
            countries.name as country_name
            
            FROM stations 
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = stations.org_id');
        $this->db->join('currencies', 'currencies.currency_id = orgs.org_id','left');
        $this->db->join('categories', 'stations.category_id = categories.cat_id','left');
        $this->db->join('countries', 'countries.country_id = orgs.country_id','left');
        $this->db->order_by('orgs.org_name, stations.station_name ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function select_org_stations ($id) {
        //select_org_stations
        $this->db->select ('
            stations.station_id, stations.org_id, stations.category_id, stations.station_name, stations.active,
            stations.narrative, stations.latitude, stations.longitude, stations.primary_phone, stations.secondary_phone,
            stations.other_phone, stations.primary_email, stations.secondary_email, stations.other_email,         
            orgs.org_name, orgs.address, orgs.phone,   
            categories.cat_name, categories.cat_id,          
            currencies.currency_code,            
            countries.name as country_name
            
            FROM stations 
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = stations.org_id');
        $this->db->join('categories', 'stations.category_id = categories.cat_id','left');
        $this->db->join('currencies', 'currencies.currency_id = orgs.org_id','left');
        $this->db->join('countries', 'countries.country_id = orgs.country_id','left');
        $this->db->where('stations.org_id', $id);
        $this->db->order_by('orgs.org_name, stations.station_name ASC');
        $result = $this->db->get();
        return $result->result();
    }
    


}




