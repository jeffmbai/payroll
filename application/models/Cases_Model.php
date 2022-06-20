<?php

class Cases_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function all_cases() {
        #get all users/entitys
        $this->db->select ('
            entitys.entity_id, entitys.org_id, entitys.email, entitys.firstname, entitys.secondname, 
            entitys.lastname, entitys.phone, entitys.gender, entitys.dob, entitys.id_passport, 
            entitys.active, entitys.system_role, entitys.sub_department_id, entitys.contact_person_name1,
            entitys.contact_person_phone1, entitys.contact_person_email1, entitys.contact_person_address1,
            entitys.contact_person_name2, entitys.contact_person_phone2, entitys.contact_person_email2, entitys.contact_person_address2,
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
        $this->db->where("entitys.system_role = 2");
        $this->db->order_by('entitys.firstname, entitys.secondname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function patient_cases($statusID) {
        #+ve cases
        $this->db->select ('
            patients.patient_id, patients.org_id, patients.station_id, patients.entity_id, patients.status_id, 
            patients.initial_status, patients.case_number, patients.start_date, patients.end_date, patients.created_by,
            patients.active, patients.attachment_name, patients.attachment_path, patients.narrative, 
            patients.date_modified, patients.time_stamp,            
            stations.station_name, stations.latitude, stations.longitude, stations.primary_phone, stations.secondary_phone,
            stations.other_phone, stations.primary_email, stations.secondary_email, stations.other_email,            
            entitys.entity_name, entitys.firstname, entitys.secondname, entitys.lastname, entitys.email, entitys.phone,
            entitys.gender, entitys.dob, entitys.id_passport, entitys.profile_picture, entitys.contact_person_name1,
            entitys.contact_person_phone1, entitys.contact_person_email1, entitys.contact_person_address1, entitys.contact_person_name2,
            entitys.contact_person_phone2, entitys.contact_person_email2, entitys.contact_person_address2,            
            status.status_name
            
            FROM patients 
        ', FALSE);
        $this->db->join('stations', 'stations.station_id = patients.station_id');
        $this->db->join('entitys', 'entitys.entity_id = patients.entity_id');
        $this->db->join('status', 'status.status_id = patients.status_id');
        $this->db->where("status.status_id = '".$statusID."' OR patients.initial_status = '".$statusID."' ");
        $this->db->order_by('entitys.firstname, entitys.secondname ASC');
        $result = $this->db->get();
        return $result->result();
    }

    public function case_profile($caseID) {
        #case profile
        $this->db->select ('
            patients.patient_id, patients.org_id, patients.station_id, patients.entity_id, patients.status_id, 
            patients.initial_status, patients.case_number, patients.start_date, patients.end_date, patients.created_by,
            patients.active, patients.attachment_name, patients.attachment_path, patients.narrative, 
            patients.date_modified, patients.time_stamp,            
            stations.station_name, stations.latitude, stations.longitude, stations.primary_phone, stations.secondary_phone,
            stations.other_phone, stations.primary_email, stations.secondary_email, stations.other_email,            
            entitys.entity_name, entitys.firstname, entitys.secondname, entitys.lastname, entitys.email, entitys.phone,
            entitys.gender, entitys.dob, entitys.id_passport, entitys.profile_picture, entitys.contact_person_name1, entitys.entity_address,
            entitys.contact_person_phone1, entitys.contact_person_email1, entitys.contact_person_address1, entitys.contact_person_name2,
            entitys.contact_person_phone2, entitys.contact_person_email2, entitys.contact_person_address2,            
            status.status_name
            
            FROM patients 
        ', FALSE);
        $this->db->join('stations', 'stations.station_id = patients.station_id');
        $this->db->join('entitys', 'entitys.entity_id = patients.entity_id');
        $this->db->join('status', 'status.status_id = patients.status_id');
        $this->db->where("patients.patient_id = '".$caseID."' ");
        $this->db->order_by('entitys.firstname, entitys.secondname ASC');
        $result = $this->db->get();
        return $result->result();
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


}




