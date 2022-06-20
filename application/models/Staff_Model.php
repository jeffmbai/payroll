<?php

class Staff_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    #Staff Start
    public function staff() {
        $this->db->select ('
            employees.*,
            
            orgs.org_name,
            
            departments.department_name,
            
            designations.designation_name
            
            FROM employees        
        ', FALSE);
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->join("departments", "departments.department_id = employees.department_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id");
        $this->db->where("employees.active",1);
        $result = $this->db->get();
        return $result->result();
    }

    public function archive_staff() {
        $this->db->select ('
            employees.*,
            
            orgs.org_name,
            
            departments.department_name,
            
            designations.designation_name
            
            FROM employees        
        ', FALSE);
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->join("departments", "departments.department_id = employees.department_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id");
        $this->db->where("employees.active",0);
        $result = $this->db->get();
        return $result->result();
    }

    public function staff_profile($id) {
        $this->db->select ('
            employees.*,
            
            orgs.org_name,
            
            departments.department_name,
            
            designations.designation_name
            
            FROM employees        
        ', FALSE);
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->join("departments", "departments.department_id = employees.department_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id");
        $this->db->where('employees.employee_id', $id);
        $result = $this->db->get();
        return $result->result();
    }

    public function org_staff($orgID) {
        $this->db->select ('
            employees.*,
            
            orgs.org_name,
            
            departments.department_name,
            
            designations.designation_name
            
            FROM employees        
        ', FALSE);
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->join("departments", "departments.department_id = employees.department_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id");
        $result = $this->db->get();
        return $result->result();
    }

    #Staff End

    #salary start
    public function staff_allowances($id) {
        $this->db->select ('
            employee_allowances.*,
            
            allowances.allowance_name, allowances.is_taxable
            
            FROM employee_allowances
        ', FALSE);
        $this->db->join("allowances", "allowances.allowance_id = employee_allowances.allowance_id");
        $this->db->where('employee_allowances.employee_id', $id);
        $result = $this->db->get();
        return $result->result();
    }

    public function staff_deductibles($id) {
        $this->db->select ('
            employee_deductibles.*,
            
            deductibles.deductible_name
            
            FROM employee_deductibles
        ', FALSE);
        $this->db->join("deductibles", "deductibles.deductible_id = employee_deductibles.deductible_id");
        $this->db->where('employee_deductibles.employee_id', $id);
        $result = $this->db->get();
        return $result->result();
    }

    public function staff_bank_accounts($id) {
        $this->db->select ('
            employee_bank_details .employee_bank_detail_id, employee_bank_details.employee_id, employee_bank_details.bank_name,
            employee_bank_details.branch_name, employee_bank_details.branch_code, employee_bank_details.account_number, 
            employee_bank_details.active, employee_bank_details.time_stamp,
            
            employees.first_name, employees.second_name, employees.last_name, employees.email, employees.id_number, employees.primary_phone
            
            FROM employee_bank_details 
        ', FALSE);
        $this->db->join("employees", "employees.employee_id = employee_bank_details.employee_id");
        $this->db->where('employee_bank_details.employee_id', $id);
        $result = $this->db->get();
        return $result->result();
    }

    #salary end

    public function staff_with_advance () {
        //;
        return $this->db->query (" SELECT a.*, b.first_name, b.second_name, b.last_name, b.id_number, c.deductible_name
                FROM employee_deductibles AS a 
                JOIN employees AS b ON a.employee_id = b.employee_id
                JOIN deductibles AS c ON a.deductible_id = c.deductible_id
                WHERE c.deductible_name LIKE '%advance%'")->result();
    }
    public function staff_with_advance_specific ($id) {
        //;
        return $this->db->query (" SELECT a.*, b.first_name, b.second_name, b.last_name, b.id_number, c.deductible_name
                FROM employee_deductibles AS a 
                JOIN employees AS b ON a.employee_id = b.employee_id
                JOIN deductibles AS c ON a.deductible_id = c.deductible_id
                WHERE c.deductible_name LIKE '%advance%' AND a.employee_id = '$id' ")->row();
    }





}




