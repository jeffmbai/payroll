<?php

class Room_Model extends CI_Model
{
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    ### All room types
    public function room_types () {
        $this->db->select ('
            room_types.*,            
            orgs.org_name, orgs.address
            FROM room_types
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = room_types.org_id');
        $result = $this->db->get();
        return $result->result();
        return $this->db->last_query();
    }
    ### All room types end

    ### All rooms
    public function rooms () {
        $this->db->select ('
            rooms.*,            
            orgs.org_name, orgs.address,
            room_types.room_type_name
            FROM rooms
        ', FALSE);
        $this->db->join('orgs', 'orgs.org_id = rooms.org_id');
        $this->db->join('room_types', 'room_types.room_type_id = rooms.room_type_id');
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ### All rooms end

    ##Rooms booked start
    public function rooms_booked($orderID) {
        $this->db->select ('
            rooms_booked.*,
            rooms.room_name, rooms.room_type_id, rooms.room_rate,            
            room_types.room_type_name
            FROM rooms_booked
        ', FALSE);
        $this->db->join('rooms', 'rooms.room_id = rooms_booked.room_id');
        $this->db->join('room_types', 'room_types.room_type_id = rooms.room_type_id');
        $this->db->where("rooms_booked.order_id", $orderID);
        $result = $this->db->get();
        return $result->result();
        #return $this->db->last_query();
    }
    ##Rooms booked end

    ##booked orders
    public function orders() {
        #get the order details
        $this->db->select ("
            orders.*,

            entitys.firstname, entitys.secondname, entitys.phone, entitys.id_passport, entitys.email,
            payment_modes.payment_mode_name,
            transaction_types.transaction_type_name,
            (SELECT CONCAT(ifnull(firstname,''),' ',ifnull(secondname,''),' ',ifnull(lastname,'')) FROM entitys WHERE entitys.entity_id = orders.customer_supplier_id) AS customer_supplier_name

            FROM orders
        ", FALSE);
        $this->db->join('entitys', 'entitys.entity_id = orders.entity_id','left');
        $this->db->join('payment_modes', 'payment_modes.payment_mode_id = orders.payment_mode_id','left');
        $this->db->join('transaction_types', 'transaction_types.transaction_type_id = orders.transaction_type_id','left');
        $this->db->where("orders.transaction_type_id = '5' ");
        $this->db->order_by('orders.time_stamp DESC');
        $result = $this->db->get();
        return $result->result();
    }
    
    

}




