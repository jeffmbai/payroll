<?php

class Managerselects extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function competitions () {
        //competitions
        $this->db->select('
            competition.competition_id,
            competition.competition_code,
            competition.competition_name,
            competition.location,
            competition.industry_id,
            competition.start_date,
            competition.end_date,
            competition.description,
            competition.requirements,
            competition.status,
            competition.date_modified,
            competition.time_stamp,

            status.status_name,
            status.status_description,

            industries.industry_name,
            industries.industry_description

            FROM competition
        ', FALSE);
        $this->db->join('status','status.status_id = competition.status');
        $this->db->join('industries','industries.industry_id = competition.industry_id');
        $this->db->order_by("competition.time_stamp asc");
        $result = $this->db->get();
        return $result->result();
    }
    


}




