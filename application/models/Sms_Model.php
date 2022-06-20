<?php

class Sms_Model extends CI_Model
{

    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function templates () {
        return $this->db->select('a.*, b.org_name')->from('sms_templates as a')->join('orgs as b','a.org_id = b.org_id','left')->get()->result();
    }

    public function sent_messages () {
        return $this->db->select('a.*, b.org_name')
        ->from('sms as a')
        ->join('orgs as b','a.org_id = b.org_id','left')
        ->where(" sent = 1 ")
        ->get()->result();
    }
    public function outbox_messages () {
        return $this->db->select('a.*, b.org_name')
        ->from('sms as a')
        ->join('orgs as b','a.org_id = b.org_id','left')
        ->where(" sent = 0 ")
        ->get()->result();
    }

    public function send($phone = '', $message = '') {
        //send sms JTL Operator
        $sender_id = 'UNICOMM'; //Your Default senderId
        $apikey = 'ZDE1NTA4OTZmMWZhN2M0NTQ0MTVjNz'; // Check under Settings->API Keys in vsoft.co.ke
        $username= 'rejianto'; // Your sms.vsoft.co.ke Username
        $api_url="https://sms.vsoft.co.ke/api/send_sms";
        $post_data = 'username='.$username.'&api_key='.$apikey.'&message='.$message.'&phone='.$phone.'&sender_id='.$sender_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        //echo $result; 
    }

    public function send2($phone = '', $message = '') {
        // Third Party Operator

        $url = 'https://api.tililtech.com/sms/v3/sendsms';
        // Setup request to send json via POST
        $data = array(
            "api_key" => "33b6bc9cf195ee11352f5x30a3171481ac5b45cdccfd9322e5232b90d9edb03a",
            "service_id" => 0,
            "mobile" => $phone,
            "response_type" => "json",
            "shortcode" => "NBIHOSPITAL",
            "message" => $message
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        //echo $result; 
    }

    // Datatable starts
    var $column_search = array('a.sms_id', 'a.phone', 'a.message', 'b.org_name'); //set column field database for datatable searchable
    var $order = array('a.sms_id' => 'desc'); // default order

    public function sentsms_datatable($getdata) {
        $i = 0;

        $this->db->select ('a.*, b.org_name');
        $this->db->from('sms as a');
        $this->db->join('orgs as b','a.org_id = b.org_id');

        foreach ($this->column_search as $item) { // loop column 

			if ($getdata['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $getdata['search']['value']);
				} else {
					$this->db->or_like($item, $getdata['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($getdata['order'])) // here order processing
		{
			$this->db->order_by($this->column_search[$getdata['order']['0']['column']], $getdata['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}


        if($getdata['length'] != -1) {
            $this->db->limit($getdata['length'], $getdata['start']);
        }

        $this->db->where(" sent = 1 ");
        $result = $this->db->get();
        return $result->result();
    }
    public function sentsms_count() {
        return $this->db->where(" sent = 1 ")->get('sms')->num_rows();
    }

    public function outboxsms_datatable($getdata) {
        $i = 0;

        $this->db->select ('a.*, b.org_name');
        $this->db->from('sms as a');
        $this->db->join('orgs as b','a.org_id = b.org_id','left');

        foreach ($this->column_search as $item) { // loop column 

			if ($getdata['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $getdata['search']['value']);
				} else {
					$this->db->or_like($item, $getdata['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($getdata['order'])) // here order processing
		{
			$this->db->order_by($this->column_search[$getdata['order']['0']['column']], $getdata['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}


        if($getdata['length'] != -1) {
            $this->db->limit($getdata['length'], $getdata['start']);
        }

        $this->db->where(" sent = 0 ");
        $result = $this->db->get();
        return $result->result();
    }
    public function outbox_count() {
        return $this->db->where(" sent = 0 ")->get('sms')->num_rows();
    }
    // Datatable ends
    
    


}




