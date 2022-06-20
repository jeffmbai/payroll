<?php

class School_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    #Student Types Start
    public function student_types() {
        #get all users/entitys
        $this->db->select (' * FROM student_type ', FALSE);
        $result = $this->db->get();
        return $result->result();
    }
    #Student Types End

    #Vote Heads Start
    public function vote_heads() {
        $this->db->select (' * FROM vote_heads ', FALSE);
        $this->db->order_by ('vote_head_id ASC');
        $result = $this->db->get();
        return $result->result();
    }
    #Vote Heads End

    #Streams Start
    public function streams() {
        $this->db->select (' * FROM streams ', FALSE);
        $result = $this->db->get();
        return $result->result();
    }
    #Streams End

    #Classes Start
    public function classes() {
        $this->db->select (' * FROM class ', FALSE);
        $result = $this->db->get();
        return $result->result();
    }
    #Classes End

    #Class Streams Start
    public function class_streams() {
        $this->db->select ('
        class_streams.class_stream_id, class_streams.class_id, class_streams.stream_id, 
        class_streams.active, class_streams.time_stamp,        
        class.class_name,
        streams.stream_name  
              
        FROM class_streams
        ', FALSE);
        $this->db->join("class", "class.class_id = class_streams.class_id");
        $this->db->join("streams", "streams.stream_id = class_streams.stream_id");
        $result = $this->db->get();
        return $result->result();
    }
    #Class Streams End

    #Fee Structure Start
    public function fee_structure_head() {
        $this->db->select ('
        fee_structure.fee_structure_id, fee_structure.fee_structure_year, fee_structure.student_type_id, fee_structure.amount, 
        fee_structure.active, fee_structure.date_modified, fee_structure.time_stamp,

        student_type.student_type_name

        FROM fee_structure
        ', FALSE);
        $this->db->join("student_type", "student_type.student_type_id = fee_structure.student_type_id");
        $result = $this->db->get();
        return $result->result();
    }
    public function fee_structure_details($id) {
        $this->db->select ('
        fee_structure.fee_structure_id, fee_structure.fee_structure_year, fee_structure.student_type_id, fee_structure.amount, 
        fee_structure.active, fee_structure.date_modified, fee_structure.time_stamp,

        student_type.student_type_name

        FROM fee_structure
        ', FALSE);
        $this->db->join("student_type", "student_type.student_type_id = fee_structure.student_type_id");
        $this->db->where("fee_structure_id", $id);
        $result = $this->db->get();
        return $result->result();
    }
    public function fee_structure_tail($id) {
        $this->db->select ('
        fee_structure_details.fee_structure_detail_id, fee_structure_details.fee_structure_id, fee_structure_details.vote_head_id, 
        fee_structure_details.amount as vote_head_amount, fee_structure_details.active, fee_structure_details.date_modified, fee_structure_details.time_stamp,

        fee_structure.fee_structure_year, fee_structure.amount as total_fee_amount, fee_structure.active as fee_structure_active,

        vote_heads.vote_head_name,

        student_type.student_type_name

        FROM fee_structure_details
        ', FALSE);
        $this->db->join("fee_structure", "fee_structure.fee_structure_id = fee_structure_details.fee_structure_id");
        $this->db->join("student_type", "student_type.student_type_id = fee_structure.student_type_id", "LEFT");
        $this->db->join("vote_heads", "vote_heads.vote_head_id = fee_structure_details.vote_head_id");
        $this->db->where("fee_structure_details.fee_structure_id", $id);
        $result = $this->db->get();
        return $result->result();
    }

    public function print_fee_structure ($year) {
        $this->db->select ('
        fee_structure_details.fee_structure_detail_id, fee_structure_details.fee_structure_id, 
        fee_structure_details.vote_head_id, fee_structure_details.amount, fee_structure_details.active,

        fee_structure.fee_structure_year, fee_structure.student_type_id, fee_structure.amount as fee_structure_amount,
        fee_structure.active as active_fee_structure,

        student_type.student_type_name,

        vote_heads.vote_head_name

        FROM fee_structure_details 
        ', FALSE);
        $this->db->join("fee_structure", "fee_structure.fee_structure_id = fee_structure_details.fee_structure_id");
        $this->db->join("student_type", "student_type.student_type_id = fee_structure.student_type_id");
        $this->db->join("vote_heads", "vote_heads.vote_head_id = fee_structure_details.vote_head_id");
        $this->db->where("fee_structure.fee_structure_year", $year);
        $this->db->group_by("fee_structure_details.vote_head_id");
        $result = $this->db->get();
        return $result->result();
    }
    public function ctrl_fee_structure ($year) {
        $this->db->select ('
        fee_structure_details.fee_structure_detail_id, fee_structure_details.fee_structure_id, 
        fee_structure_details.vote_head_id, fee_structure_details.amount, fee_structure_details.active,

        fee_structure.fee_structure_year, fee_structure.student_type_id, fee_structure.amount as fee_structure_amount,
        fee_structure.active as active_fee_structure

        FROM fee_structure_details 
        ', FALSE);
        $this->db->join("fee_structure", "fee_structure.fee_structure_id = fee_structure_details.fee_structure_id");
        $this->db->where("fee_structure.fee_structure_year", $year);
        $this->db->order_by("fee_structure_details.vote_head_id, fee_structure.student_type_id", "ASC");
        $result = $this->db->get();
        return $result->result();
    }
    #Fee Structure End

    #Fee payment receipt start
    public function payment_receipt_header ($payment_id) {
        $this->db->select ('
        fee_payment.fee_payment_id, fee_payment.payment_mode_id, fee_payment.student_id, fee_payment.amount,
        fee_payment.current_balance, fee_payment.payment_date, fee_payment.paid_by, fee_payment.active, 
        fee_payment.date_modified, fee_payment.time_stamp,

        students.first_name, students.second_name, students.last_name, students.admission_no, students.student_type_id,

        student_type.student_type_name,

        payment_modes.payment_mode_name

        FROM fee_payment 
        ', FALSE);
        $this->db->join("students", "students.student_id = fee_payment.student_id");
        $this->db->join("student_type", "students.student_type_id = student_type.student_type_id", "LEFT");
        $this->db->join("payment_modes", "payment_modes.payment_mode_id = fee_payment.payment_mode_id");
        $this->db->where("fee_payment.fee_payment_id", $payment_id);
        $result = $this->db->get();
        return $result->result();
    }
    public function payment_receipt_tail ($payment_id) {
        $this->db->select ('
        fee_payment_details.fee_payment_details_id, fee_payment_details.fee_payment_id, 
        fee_payment_details.vote_head_id, fee_payment_details.amount, fee_payment_details.narrative,

        vote_heads.vote_head_name,

        fee_payment.payment_mode_id, fee_payment.amount as fee_amount, fee_payment.student_id, 
        fee_payment.current_balance, fee_payment.payment_date

        FROM fee_payment_details 
        ', FALSE);
        $this->db->join("fee_payment", "fee_payment.fee_payment_id = fee_payment_details.fee_payment_id");
        $this->db->join("payment_modes", "payment_modes.payment_mode_id = fee_payment.payment_mode_id");
        $this->db->join("vote_heads", "vote_heads.vote_head_id = fee_payment_details.vote_head_id");
        $this->db->where("fee_payment_details.fee_payment_id", $payment_id);
        $result = $this->db->get();
        return $result->result();
    }
    #Fee payment receipt end


    #fee register start
    public function fee_register_0 () {
        $this->db->select ('
        fee_payment.fee_payment_id, fee_payment.student_id, fee_payment.amount as fee_amount, fee_payment.current_balance,
        fee_payment.payment_mode_id, fee_payment.current_balance, fee_payment.payment_date,

        payment_modes.payment_mode_name,

        students.first_name, students.second_name, students.last_name, students.admission_no,
        students.dob, students.gender, students.student_type_id,

        student_type.student_type_name

        FROM fee_payment
        ', FALSE);
        $this->db->join("payment_modes", "payment_modes.payment_mode_id = fee_payment.payment_mode_id");
        $this->db->join("students", "students.student_id = fee_payment.student_id");
        $this->db->join("student_type", "student_type.student_type_id = students.student_type_id");
        $this->db->order_by("fee_payment.payment_date, students.student_id", 'ASC');
        $result = $this->db->get();
        return $result->result();
    }
    public function fee_register_1 () {
        #get students fee payments
        $this->db->select ('
        fee_payment_details.fee_payment_details_id, fee_payment_details.fee_payment_id,
        fee_payment_details.vote_head_id, fee_payment_details.amount

        FROM fee_payment_details 
        ', FALSE);
        $result = $this->db->get();
        return $result->result();
    }
    #fee register end

    #fee payments start
    public function fee_payments_0 () {
        $this->db->select ('
        fee_payment.fee_payment_id, fee_payment.student_id, fee_payment.amount as fee_amount, fee_payment.current_balance,
        fee_payment.payment_mode_id, fee_payment.current_balance, fee_payment.payment_date,

        payment_modes.payment_mode_name,

        students.first_name, students.second_name, students.last_name, students.admission_no,
        students.dob, students.gender, students.student_type_id,

        student_type.student_type_name

        FROM fee_payment
        ', FALSE);
        $this->db->join("payment_modes", "payment_modes.payment_mode_id = fee_payment.payment_mode_id");
        $this->db->join("students", "students.student_id = fee_payment.student_id");
        $this->db->join("student_type", "student_type.student_type_id = students.student_type_id");
        $this->db->order_by("fee_payment.payment_date", 'DESC');
        $result = $this->db->get();
        return $result->result();
    }
    #fee payments end

    #financial control start
    public function financial_controls() {
        $this->db->select ('
        financial_control.financial_control_id, financial_control.org_id, financial_control.fiscal_year_id,
        financial_control.financial_control_code, financial_control.financial_control_name, 
        financial_control.financial_control_type, financial_control.financial_control_amount, 
        financial_control.active, financial_control.narrative, financial_control.date_modified, 
        financial_control.time_stamp,

        fiscal_years.fiscal_year_name,

        orgs.org_name, orgs.address, orgs.currency_id, orgs.country_id,

        currencies.currency_code,

        countries.name

        FROM financial_control
        ', FALSE);
        $this->db->join("fiscal_years", "fiscal_years.fiscal_year_id = financial_control.fiscal_year_id");
        $this->db->join("orgs", "orgs.org_id = financial_control.org_id");
        $this->db->join("currencies", "currencies.currency_id = orgs.currency_id");
        $this->db->join("countries", "countries.country_id = orgs.country_id");
        $this->db->order_by("financial_control.time_stamp", 'DESC');
        $result = $this->db->get();
        return $result->result();
    }
    #financial control end




}




