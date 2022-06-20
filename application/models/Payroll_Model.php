<?php

class Payroll_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function current_payroll() {
        if(!isset($_SESSION['payroll_year']) && !isset($_SESSION['payroll_month'])) {
            $_SESSION['payroll_year'] = date('Y');
            $_SESSION['payroll_month'] = date('m');
        }
        $year = date('Y');
        $month = date('m');
        $this->db->select ('
            employee_month.*,

            employee_bank_details.bank_name,

            fiscal_years.fiscal_year_name,
            year_months.month_name,
            
            employees.first_name, employees.second_name, employees.second_name, employees.last_name, employees.email,
            employees.primary_phone, employees.id_number,
            
            designations.designation_name,
            
            departments.department_name,
            
            orgs.org_name
            
            FROM employee_month    
        ', FALSE);
        $this->db->join("employee_bank_details", "employee_bank_details.employee_bank_detail_id = employee_month.bank_id", 'left');
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = employee_month.fiscal_year_id");
        $this->db->join("year_months", "year_months.year_month_id = employee_month.year_month_id");
        $this->db->join("employees", "employees.employee_id = employee_month.employee_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id",'left');
        $this->db->join("departments", "departments.department_id = employees.designation_id",'left');
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->where("fiscal_years.fiscal_year_name = '$_SESSION[payroll_year]' AND employee_month.year_month_id = '$_SESSION[payroll_month]' AND employee_month.is_advance = 0 ");
        $result = $this->db->get();
        return $result->result();
    }
    public function current_advance() {
        if(!isset($_SESSION['payroll_year']) && !isset($_SESSION['payroll_month'])) {
            $_SESSION['payroll_year'] = date('Y');
            $_SESSION['payroll_month'] = date('m');
        }
        $year = date('Y');
        $month = date('m');
        $this->db->select ('
            employee_month.*,

            employee_bank_details.bank_name,

            fiscal_years.fiscal_year_name,
            year_months.month_name,
            
            employees.first_name, employees.second_name, employees.second_name, employees.last_name, employees.email,
            employees.primary_phone, employees.id_number,
            
            designations.designation_name,
            
            departments.department_name,
            
            orgs.org_name
            
            FROM employee_month    
        ', FALSE);
        $this->db->join("employee_bank_details", "employee_bank_details.employee_bank_detail_id = employee_month.bank_id", 'left');
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = employee_month.fiscal_year_id");
        $this->db->join("year_months", "year_months.year_month_id = employee_month.year_month_id");
        $this->db->join("employees", "employees.employee_id = employee_month.employee_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id",'left');
        $this->db->join("departments", "departments.department_id = employees.designation_id",'left');
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->where("fiscal_years.fiscal_year_name = '$_SESSION[payroll_year]' AND employee_month.year_month_id = '$_SESSION[payroll_month]' AND employee_month.is_advance = 1 ");
        $result = $this->db->get();
        return $result->result();
    }

    public function payslip($id) {  # gets payment for only one month
        $this->db->select ('
            employee_month.*,

            employee_bank_details.bank_name,

            fiscal_years.fiscal_year_name,
            year_months.month_name,
            
            employees.first_name, employees.second_name, employees.second_name, employees.last_name, employees.email,
            employees.primary_phone, employees.id_number, employees.employment_number, employees.kra_pin, 
            employees.nhif as employee_nhif, employees.nssf as employee_nssf,
            
            designations.designation_name,
            
            departments.department_name,
            
            orgs.org_name
            
            FROM employee_month    
        ', FALSE);
        $this->db->join("employee_bank_details", "employee_bank_details.employee_bank_detail_id = employee_month.bank_id", 'left');
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = employee_month.fiscal_year_id");
        $this->db->join("year_months", "year_months.year_month_id = employee_month.year_month_id");
        $this->db->join("employees", "employees.employee_id = employee_month.employee_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id",'left');
        $this->db->join("departments", "departments.department_id = employees.designation_id",'left');
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->where("employee_month.employee_month_id = ".$id." ");
        $result = $this->db->get();
        return $result->result();
        // return $this->db->last_query();
    }

    public function employee_salaries($id) { #get employee salary for more than one month
        $this->db->select ('
            employee_month.*,

            employee_bank_details.bank_name,

            fiscal_years.fiscal_year_name,
            year_months.month_name,
            
            employees.first_name, employees.second_name, employees.second_name, employees.last_name, employees.email,
            employees.primary_phone, employees.id_number, employees.employment_number, employees.kra_pin, 
            employees.nhif as employee_nhif, employees.nssf as employee_nssf,
            
            designations.designation_name,
            
            departments.department_name,
            
            orgs.org_name
            
            FROM employee_month    
        ', FALSE);
        $this->db->join("employee_bank_details", "employee_bank_details.employee_bank_detail_id = employee_month.bank_id", 'left');
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = employee_month.fiscal_year_id");
        $this->db->join("year_months", "year_months.year_month_id = employee_month.year_month_id");
        $this->db->join("employees", "employees.employee_id = employee_month.employee_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id");
        $this->db->join("departments", "departments.department_id = employees.designation_id");
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->where("employee_month.employee_id = ".$id." ");
        $result = $this->db->get();
        return $result->result();
    }

    public function monthly_bank_cashouts($orgID, $monthID, $yearID) { #get salary payments in terms of bank deposits and month
        $this->db->select ('
            employee_month.*,

            employee_bank_details.bank_name,

            fiscal_years.fiscal_year_name,
            year_months.month_name,
            
            employees.first_name, employees.second_name, employees.second_name, employees.last_name, employees.email,
            employees.primary_phone, employees.id_number, employees.employment_number, employees.kra_pin, 
            employees.nhif as employee_nhif, employees.nssf as employee_nssf,
            
            designations.designation_name,
            
            departments.department_name,
            
            orgs.org_name
            
            FROM employee_month    
        ', FALSE);
        $this->db->join("employee_bank_details", "employee_bank_details.employee_bank_detail_id = employee_month.bank_id", 'left');
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = employee_month.fiscal_year_id");
        $this->db->join("year_months", "year_months.year_month_id = employee_month.year_month_id");
        $this->db->join("employees", "employees.employee_id = employee_month.employee_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id");
        $this->db->join("departments", "departments.department_id = employees.designation_id");
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->where("employee_month.org_id = ".$orgID." AND employee_month.year_month_id = ".$monthID." AND employee_month.fiscal_year_id = ".$yearID." ");
        $result = $this->db->get();
        return $result->result();
    }

    public function get_staff_p9($empID, $yearID) {
        $this->db->select ('
            employee_month.*,

            fiscal_years.fiscal_year_name,
            year_months.month_name,
            
            employees.first_name, employees.second_name, employees.second_name, employees.last_name, employees.email,
            employees.primary_phone, employees.id_number, employees.employment_number, employees.kra_pin, 
            employees.nhif as employee_nhif, employees.nssf as employee_nssf,
            
            designations.designation_name,
            
            departments.department_name,
            
            orgs.org_name
            
            FROM employee_month    
        ', FALSE);
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = employee_month.fiscal_year_id");
        $this->db->join("year_months", "year_months.year_month_id = employee_month.year_month_id");
        $this->db->join("employees", "employees.employee_id = employee_month.employee_id");
        $this->db->join("designations", "designations.designation_id = employees.designation_id");
        $this->db->join("departments", "departments.department_id = employees.designation_id");
        $this->db->join("orgs", "orgs.org_id = employees.org_id");
        $this->db->where("employee_month.employee_id = ".$empID." AND employee_month.fiscal_year_id = ".$yearID." ");
        $result = $this->db->get();
        return $result->result();
    }

    

   


    

}




