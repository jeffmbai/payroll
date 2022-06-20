<?php

class Departments_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function all_departments () {
        //all_departments
        $this->db->select ('
            departments.department_id, departments.org_id, departments.station_id, departments.department_name,
            departments.narrative, departments.active, departments.date_modified, departments.time_stamp,
            stations.station_name
            
            FROM departments
        ', FALSE);
        $this->db->join('stations', 'stations.station_id = departments.station_id');
        if($_SESSION['superuser'] != 1) {
            $this->db->where('departments.org_id', $_SESSION['orgid']);
        }
        $this->db->order_by('departments.department_name ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function department ($id) {
        //single department details
        $this->db->select ('
            departments.department_id, departments.org_id, departments.station_id, departments.department_name,
            departments.narrative, departments.active, departments.date_modified, departments.time_stamp,
            stations.station_name
            
            FROM departments
        ', FALSE);
        $this->db->join('stations', 'stations.station_id = departments.station_id');
        $this->db->where("departments.department_id = '".$id."' ");
        $result = $this->db->get();
        return $result->result();
    }

    public function sub_departments ($id) {
        //sub_departments
        $this->db->select ('
            sub_departments.sub_department_id, sub_departments.org_id, sub_departments.department_id, sub_departments.sub_department_name,
            sub_departments.active, sub_departments.narrative, sub_departments.date_modified, sub_departments.time_stamp,
            departments.department_name,
            stations.station_name
            
            FROM sub_departments
        ', FALSE);
        $this->db->join('departments', 'departments.department_id = sub_departments.department_id');
        $this->db->join('stations', 'stations.station_id = departments.station_id');
        $this->db->where("sub_departments.department_id = '".$id."' ");
        $this->db->order_by('sub_departments.sub_department_name ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function select_station_departments ($id) {
        //select_station_departments
        $this->db->select ('
            departments.department_id, departments.org_id, departments.station_id, departments.department_name,
            departments.narrative, departments.active, departments.date_modified, departments.time_stamp,
            stations.station_name
            
            FROM departments
        ', FALSE);
        $this->db->join('stations', 'stations.station_id = departments.station_id');
        $this->db->where("departments.station_id = '".$id."' ");
        $this->db->order_by('departments.department_name ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function select_sub_department ($id) {
        //select_sub_department
        $this->db->select ('
            sub_departments.sub_department_id, sub_departments.org_id, sub_departments.department_id, sub_departments.sub_department_name,
            sub_departments.active, sub_departments.narrative, sub_departments.date_modified, sub_departments.time_stamp,
            departments.department_name,
            stations.station_name
            
            FROM sub_departments
        ', FALSE);
        $this->db->join('departments', 'departments.department_id = sub_departments.department_id');
        $this->db->join('stations', 'stations.station_id = departments.station_id');
        $this->db->where("sub_departments.department_id = '".$id."' ");
        $this->db->order_by('sub_departments.sub_department_name ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function department_subdepartment ($id) {
        //department_subdepartment
        $this->db->select ('
            sub_departments.sub_department_id, sub_departments.org_id, sub_departments.department_id, sub_departments.sub_department_name,
            sub_departments.active, sub_departments.narrative, sub_departments.date_modified, sub_departments.time_stamp,
            departments.department_name,
            stations.station_name
            
            FROM sub_departments
        ', FALSE);
        $this->db->join('departments', 'departments.department_id = sub_departments.department_id');
        $this->db->join('stations', 'stations.station_id = departments.station_id');
        $this->db->where("stations.station_id = '".$id."' ");
        $this->db->order_by('departments.department_name, sub_departments.sub_department_name ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function departmental_heads ($id1, $id2) {
        #get departmental heads
        $this->db->select ('
            departmental_heads.departmental_head_id, departmental_heads.department_id, departmental_heads.entity_id, 
            departmental_heads.current, departmental_heads.from_date, departmental_heads.to_date, 
            departmental_heads.date_modified, departmental_heads.time_stamp,
            entitys.org_id, entitys.email, entitys.firstname, entitys.secondname, entitys.lastname, 
            entitys.phone, entitys.gender, entitys.dob, entitys.id_passport, entitys.active,
            departments.station_id, departments.department_name,
            stations.station_name

            FROM departmental_heads
        ', FALSE);
        $this->db->join('entitys', 'entitys.entity_id = departmental_heads.entity_id');
        $this->db->join('departments', 'departments.department_id = departmental_heads.department_id');
        $this->db->join('stations', 'stations.station_id = departments.station_id', 'LEFT');
        if($id1 != null) { #get for specific department
            $this->db->where("departmental_heads.department_id = '".$id1."' ");
        }
        $this->db->order_by('departments.department_name, entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }
    


}




