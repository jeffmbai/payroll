<?php

class Organization extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function organizations () {
        //orgs
        $this->db->select ('
            orgs.org_id, orgs.org_name, orgs.address, orgs.email, orgs.phone,
            orgs.active as org_active, orgs.currency_id, orgs.country_id,
            orgs.narrative as org_narrative, orgs.date_modified, orgs.time_stamp,

            currencies.currency_code, currencies.active as currency_active,
            currencies.narrative as currency_narrative,

            countries.name as country_name, countries.active as country_active

            FROM orgs
        ', FALSE);
        $this->db->join('currencies', 'currencies.currency_id = orgs.currency_id','left');
        $this->db->join('countries', 'countries.country_id = orgs.country_id','left');
        //if($_SESSION['superuser'] != 1) $this->db->where('orgs.org_id', $_SESSION['orgid']);
        $this->db->order_by('orgs.org_name ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function org () {
        //orgs
        $this->db->select ('
            orgs.org_id, orgs.org_name, orgs.address, orgs.email, orgs.phone, orgs.mpesa_details,
            orgs.active as org_active, orgs.currency_id, orgs.country_id, orgs.box_number,
            orgs.narrative as org_narrative, orgs.date_modified, orgs.time_stamp, orgs.pos_mode,
            orgs.kra_pin, orgs.vat_no, orgs.organization_type,

            currencies.currency_code, currencies.active as currency_active,
            currencies.narrative as currency_narrative,

            countries.name as country_name, countries.active as country_active

            FROM orgs
        ', FALSE);
        $this->db->join('currencies', 'currencies.currency_id = orgs.currency_id','left');
        $this->db->join('countries', 'countries.country_id = orgs.country_id','left');
        //if($_SESSION['superuser'] != 1) $this->db->where('orgs.org_id', $_SESSION['orgid']);
        $this->db->where('orgs.org_id', 1);
        $this->db->order_by('orgs.org_name ASC');
        $result = $this->db->get();
        return $result->row();
    }
    


}




