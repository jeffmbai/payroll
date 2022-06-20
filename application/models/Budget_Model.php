<?php

class Budget_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    #get budgets start
    public function budgets() {
        $this->db->select ('
        budget.budget_id, budget.org_id, budget.fiscal_year_id, budget.budget_total_amount, budget.budget_code, 
        budget.budget_type, budget.active, budget.narrative, budget.date_modified, budget.time_stamp,

        orgs.org_name,

        fiscal_years.fiscal_year_name, fiscal_years.start_date, fiscal_years.end_date

        FROM budget 
        ', FALSE);
        $this->db->join("orgs", "orgs.org_id = budget.org_id");
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = budget.fiscal_year_id");
        $result = $this->db->get();
        return $result->result();
    }
    public function this_budget($id) {
        $this->db->select ('
        budget.budget_id, budget.org_id, budget.fiscal_year_id, budget.budget_total_amount, budget.budget_code, 
        budget.budget_type, budget.active, budget.narrative, budget.date_modified, budget.time_stamp,

        orgs.org_name,

        fiscal_years.fiscal_year_name, fiscal_years.start_date, fiscal_years.end_date

        FROM budget 
        ', FALSE);
        $this->db->join("orgs", "orgs.org_id = budget.org_id");
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = budget.fiscal_year_id");
        $this->db->where("budget.budget_id", $id);
        $result = $this->db->get();
        return $result->result();
    }

    public function budget_breakdown($id) {
        $this->db->select ('
        budget_breakdown.budget_breakdown_id, budget_breakdown.budget_id, budget_breakdown.vote_head_id,
        budget_breakdown.budget_amount, budget_breakdown.active, budget_breakdown.narrative,

        vote_heads.vote_head_name,

        budget.fiscal_year_id, budget.budget_type, budget.budget_total_amount, budget.budget_code,
        budget.active as budget_active, budget.narrative as budget_narrative,

        fiscal_years.fiscal_year_name, fiscal_years.start_date, fiscal_years.end_date

        FROM budget_breakdown
        ', FALSE);
        $this->db->join("budget", "budget.budget_id = budget_breakdown.budget_id");
        $this->db->join("vote_heads", "vote_heads.vote_head_id = budget_breakdown.vote_head_id");
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = budget.fiscal_year_id");
        $this->db->where("budget.budget_id", $id);
        $result = $this->db->get();
        return $result->result();
    }

    public function budget_breakdown_fr() {
        $this->db->select ('
        budget_breakdown.budget_breakdown_id, budget_breakdown.budget_id, budget_breakdown.vote_head_id,
        budget_breakdown.budget_amount, budget_breakdown.active, budget_breakdown.narrative,

        vote_heads.vote_head_name,

        budget.fiscal_year_id, budget.budget_type, budget.budget_total_amount, budget.budget_code,
        budget.active as budget_active, budget.narrative as budget_narrative,

        fiscal_years.fiscal_year_name, fiscal_years.start_date, fiscal_years.end_date

        FROM budget_breakdown
        ', FALSE);
        $this->db->join("budget", "budget.budget_id = budget_breakdown.budget_id");
        $this->db->join("vote_heads", "vote_heads.vote_head_id = budget_breakdown.vote_head_id");
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = budget.fiscal_year_id");
        $this->db->where("budget.budget_id", "ASC");
        $result = $this->db->get();
        return $result->result();
    }
    #get budgets End





}




