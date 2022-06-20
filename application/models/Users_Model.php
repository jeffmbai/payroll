<?php

class Users_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function all_entitys() {
        #get all users
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname, entitys.secondname, 
            entitys.lastname, entitys.phone, entitys.gender, entitys.dob, entitys.id_passport, 
            entitys.active, entitys.system_role, entitys.sub_department_id,
            entitys.super_user, entitys.profile_picture, entitys.date_modified, entitys.time_stamp,

            roles.role_name, roles.permission,
            orgs.org_name, orgs.address,
            sub_departments.sub_department_name,
            departments.department_id, departments.department_name,
            stations.station_id, stations.station_name

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('sub_departments', 'sub_departments.sub_department_id = entitys.sub_department_id','left');
        $this->db->join('departments', 'departments.department_id = sub_departments.department_id','left');
        $this->db->join('stations', 'departments.station_id = stations.station_id','left');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id','left');
        $this->db->where('entitys.entity_id > 2');
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function sys_users() {
        #get sys users
        $this->db->select ('
            entitys.*,
            roles.role_name, roles.permission,
            orgs.org_name, orgs.address,
            sub_departments.sub_department_name,
            departments.department_id, departments.department_name,
            stations.station_id, stations.station_name

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('sub_departments', 'sub_departments.sub_department_id = entitys.sub_department_id','left');
        $this->db->join('departments', 'departments.department_id = sub_departments.department_id','left');
        $this->db->join('stations', 'departments.station_id = stations.station_id','left');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id','left');
        $this->db->where(" (entitys.system_role != 3 OR entitys.system_role != 4) AND entitys.entity_id > 2");
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }

    public function entity($id) {
        #get user based on entity_id/ userid
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname, entitys.secondname, 
            entitys.lastname, entitys.phone, entitys.gender, entitys.dob, entitys.id_passport, 
            entitys.active, entitys.system_role, entitys.sub_department_id,
            entitys.super_user, entitys.profile_picture, entitys.date_modified, entitys.time_stamp,

            roles.role_name, roles.permission,
            orgs.org_name, orgs.address,
            sub_departments.sub_department_name,
            departments.department_id, departments.department_name,
            stations.station_id, stations.station_name

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('sub_departments', 'sub_departments.sub_department_id = entitys.sub_department_id');
        $this->db->join('departments', 'departments.department_id = sub_departments.department_id');
        $this->db->join('stations', 'departments.station_id = stations.station_id');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id');
        $this->db->where("entitys.entity_id = '".$id."' ");
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function business_users($role) {
        #get user based on role and orgid for business processes
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname, entitys.secondname, 
            entitys.lastname, entitys.phone, entitys.gender, entitys.id_passport, entitys.active, 
            entitys.system_role, entitys.super_user, entitys.profile_picture, entitys.entity_address,

            roles.role_name,
            orgs.org_name, orgs.address

            FROM entitys
        ', FALSE);
        $this->db->join('roles', 'roles.role_id = entitys.system_role');
        $this->db->join('orgs', 'orgs.org_id = entitys.org_id');
        $this->db->where("entitys.system_role = ".$role." AND entitys.org_id = ".$_SESSION['orgid']." AND entitys.active = 1 ");
        // $this->db->where('entitys.entity_id ASC');
        $this->db->order_by('entitys.firstname ASC');
        $result = $this->db->get();
        return $result->result();
    }


}




