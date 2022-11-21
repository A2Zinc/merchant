<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Terminals extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	//customer List
	public function terminal_list()
	{
		$this->db->select('*');
		$this->db->from('terminal_payment');
		$this->db->order_by('terminal_name','asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//terminal Search Item
	public function terminal_search_item($terminal_id)
	{
		$this->db->select('*');
		$this->db->from('terminal_payment');
		$this->db->where('terminal_id',$terminal_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Count customer
	public function terminal_entry($data)
	{
		$this->db->select('*');
		$this->db->from('terminal_payment');
		$this->db->where('terminal_name',$data['terminal_name']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return FALSE;
		}else{
			$this->db->insert('terminal_payment',$data);
			return TRUE;
		}
	}
	//Retrieve customer Edit Data
	public function retrieve_terminal_editdata($terminal_id)
	{
		$this->db->select('*');
		$this->db->from('terminal_payment');
		$this->db->where('pay_terminal_id',$terminal_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	//Update Terminals
	public function update_terminal($data,$terminal_id)
	{
		$this->db->where('pay_terminal_id',$terminal_id);
		$result = $this->db->update('terminal_payment',$data);

		if ($result) {
			return true;
		}
		return false;
	}
	// Delete terminal Item
	public function delete_terminal($terminal_id)
	{
		$this->db->where('pay_terminal_id',$terminal_id);
		$this->db->delete('terminal_payment'); 	
		return true;
	}

	// Count terminal
	public function count_store_terminal($data_filter_arr=array()) {

		$merchant_id = $data_filter_arr["filter_merchant_id"];
		$store_id 	 = $data_filter_arr["filter_store_id"];

		$this->db->select('*');
		$this->db->from('terminal');

		if($merchant_id > 0) {
			$this->db->where('merchant_id',$merchant_id);
		}

		if($store_id > 0) {
			$this->db->where('store_id',$store_id);
		}

		// $this->db->where('is_deleted','0');
		return $this->db->count_all_results();
	}

	// Admin Terminal List
	public function store_terminal_list($limit, $start, $data_filter_arr = array()) {

		$merchant_id = $data_filter_arr["filter_merchant_id"];
		$store_id 	 = $data_filter_arr["filter_store_id"];

		// $this->db->limit($limit, $start);
		$this->db->select('*,(select name from `merchant` where merchant.id = CI.merchant_id) as merchant_name,(select store_name from `store_set` where store_set.store_id = CI.store_id) as store_name');
		$this->db->from('terminal as CI');

		if($merchant_id > 0) {
			$this->db->where('CI.merchant_id',$merchant_id);
		}

		if($store_id > 0) {
			$this->db->where('CI.store_id',$store_id);
		}

		$this->db->order_by('id','desc');
		
		// $this->db->where('is_deleted','0');
		$query = $this->db->get();
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	//Retrieve store terminal Edit Data
	public function retrieve_store_terminal_editdata($terminalid) {
		$this->db->select('*,(select name from `merchant` where merchant.id = CI.merchant_id) as merchant_name,(select store_name from `store_set` where store_set.store_id = CI.store_id) as store_name');
		$this->db->from('terminal as CI');
		$this->db->where('id',$terminalid);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}
	public function check_terminal_exists($license_key,$merchant_id) {
		$this->db->from('terminal');
		$this->db->where(['license_key'=>$license_key,'merchant_id' => $merchant_id]);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}


	public function retrieve_stores_by_merchant_id($merchant_id) {
		$this->db->select('store_set.*,merchant.name merchant_name');
		$this->db->join('merchant',"store_set.merchant_id=merchant.merchant_id");
		$this->db->from('store_set');
		$this->db->where(['merchant.merchant_id' => $merchant_id]);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	// public function retrieve_store_by_license_key($license_key,$merchant_id) {
	// 	$this->db->select('store_set.*,merchant.name as merchant_name');
	// 	$this->db->join('store_set',"store_set.merchant_id=terminal.merchant_id");
	// 	$this->db->join('merchant',"merchant.merchant_id=terminal.merchant_id");
	// 	$this->db->from('terminal');
	// 	$this->db->where(['license_key'=>$license_key,'merchant_id' => $merchant_id]);
	// 	$query = $this->db->get();
	// 	if ($query->num_rows() > 0) {
	// 		return $query->row_array();
	// 	}
	// 	return false;
	// }

	// Add store terminal
	public function add_store_terminal_db($data) {

		$this->db->insert('terminal',$data);
		$insert_id = $this->db->insert_id();
		if ($insert_id > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// Update store terminal
	public function update_store_terminal($data,$terminalid) {

		try{
			$this->db->where('id',$terminalid);
			$result = $this->db->update('terminal',$data);
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
	}

	public function delete_store_terminal($terminalid)
	{
		try{
            $this->db->set('is_deleted','1');
			$this->db->where('id',$terminalid);
			$result = $this->db->update('terminal');
          	//echo $this->db->last_query();exit;

            $respnce['status'] = 'success';
            $respnce['message'] = 'Terminal successfully deleted';
            return $respnce;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

	}
}