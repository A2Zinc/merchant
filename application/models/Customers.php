<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customers extends MY_Model {
	public function __construct()
	{
		parent::__construct();

	}
	//Count customer
	public function count_customer()
	{
		$this->db->select('*,(select SUM(due_amount) total_amount from `order` where customer_id=CI.customer_id) as totalsale');
		$this->db->from('customer_information as CI');
		$this->db->where('CI.is_active','1');
		return $this->db->count_all_results();
	}

	//Customer List
	public function customer_list($limit, $start)
	{
		$this->db->limit($limit, $start);

		$this->db->select('*,(select SUM(due_amount) total_amount from `order` where customer_id=CI.customer_id) as totalsale');
		$this->db->from('customer_information as CI');
		$this->db->where('CI.is_active','1');
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	//Country List
	public function country_list()
	{
		$this->db->select('*');
		$this->db->from('countries');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	//Select City By Country ID List
	public function select_city_country_id($country_id)
	{
		$this->db->select('*');
		$this->db->from('states');
		$this->db->where('country_id',$country_id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

	//Credit customer List
	public function credit_customer_list()
	{

		$query = $this->db->query("

			select `customer_information`.`customer_name` AS `customer_name`,
			`customer_ledger`.`customer_id` AS `customer_id`,
			'credit' AS `type`,
			sum(-(`customer_ledger`.`amount`)) AS `amount`
			from (`customer_ledger`
			join `customer_information`
			on((`customer_information`.`customer_id` = `customer_ledger`.`customer_id`)))
			where (isnull(`customer_ledger`.`receipt_no`)
			and (`customer_ledger`.`status` = 1))
			group by `customer_ledger`.`customer_id`
			union all
			select `customer_information`.`customer_name` AS `customer_name`,
			`customer_ledger`.`customer_id` AS `customer_id`,
			'debit' AS `type`,sum(`customer_ledger`.`amount`) AS `amount`
			from (`customer_ledger` join `customer_information`
			on((`customer_information`.`customer_id` = `customer_ledger`.`customer_id`)))
			where (isnull(`customer_ledger`.`invoice_no`)
			and (`customer_ledger`.`status` = 1))
			group by `customer_ledger`.`customer_id`") ;


// $this->db->select('
// 	b.customer_name,
// 	sum(-(a.amount)) AS credit_amount
// 	');
// $this->db->from('customer_ledger a');
// $this->db->join('customer_information b','b.customer_id = a.customer_id');
// $this->db->group_by('a.customer_id');
// $this->db->where('a.invoice_no',null);
// $this->db->where('a.status',1);
// $result = $this->db->get();

		echo "<pre>";
		print_r($query->result());
		exit();



		// $this->db->select('customer_information.*,sum(customer_transection_summary.amount) as customer_balance');
		// $this->db->from('customer_information');
		// $this->db->join('customer_transection_summary', 'customer_transection_summary.customer_id= customer_information.customer_id');
		// $this->db->where('customer_information.status',1);
		// $this->db->group_by('customer_transection_summary.customer_id');
		// $this->db->having('customer_balance != 0', NULL, FALSE);
		// $query = $this->db->get();

		// if ($query->num_rows() > 0) {
		// 	return $query->result_array();
		// }
		// return false;
	}

	//Paid Customer list
	public function paid_customer_list()
	{
		$this->db->select('customer_information.*,sum(customer_transection_summary.amount) as customer_balance');
		$this->db->from('customer_information');
		$this->db->join('customer_transection_summary', 'customer_transection_summary.customer_id= customer_information.customer_id');
		// $this->db->where('customer_information.status',2);
		$this->db->where('customer_transection_summary.amount >',0);
		$this->db->group_by('customer_transection_summary.customer_id');
		$this->db->limit('50');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

	//Customer Search List
	public function customer_search_item($customer_id)
	{
		$this->db->select('customer_information.*,sum(customer_transection_summary.amount) as customer_balance');
		$this->db->from('customer_information');
		$this->db->join('customer_transection_summary', 'customer_transection_summary.customer_id= customer_information.customer_id');
		$this->db->where('customer_information.customer_id',$customer_id);
		$this->db->group_by('customer_transection_summary.customer_id');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}
	//Count customer
	public function customer_entry($data)
	{

		$this->db->select('*');
		$this->db->from('customer_information');
		$this->db->where('customer_name',$data['customer_name']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return FALSE;
		}else{
			$this->db->insert('customer_information',$data);

			$this->db->select('*');
			$this->db->from('customer_information');
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_customer[] = array('label'=>$row->customer_name,'value'=>$row->customer_id);
			}
			$cache_file ='./my-assets/js/admin_js/json/customer.json';
			$customerList = json_encode($json_customer);
			file_put_contents($cache_file,$customerList);
			return TRUE;
		}
	}


	//Customer Previous balance adjustment
	public function previous_balance_add($balance,$customer_id)
	{
		$this->load->library('auth');
		$transaction_id=$this->auth->generator(10);
		$data=array(
			'transaction_id'=> $transaction_id,
			'customer_id' 	=> $customer_id,
			'invoice_no' 	=> "NA",
			'receipt_no' 	=> NULL,
			'amount' 		=> $balance,
			'description' 	=> "Previous adjustment with software",
			'payment_type' 	=> "NA",
			'cheque_no' 	=> "NA",
			'date' 			=> date("m-d-Y"),
			'status' 		=> 1
		);

		$this->db->insert('customer_ledger',$data);
	}

	//Retrieve company Edit Data
	public function retrieve_company()
	{
		$this->db->select('*');
		$this->db->from('company_information');
		$this->db->limit('1');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}
	//Retrieve customer Edit Data
	public function retrieve_customer_editdata($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_information');
		$this->db->where('customer_id',$customer_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}
	//Retrieve customer Personal Data
	public function get_customer_by_id($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_information');
		$this->db->where('customer_id',$customer_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}
	//Retrieve customer Invoice Data
	public function customer_invoice_data($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_ledger');
		$this->db->where(array('customer_id'=>$customer_id,'receipt_no'=>NULL,'status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}
	//Retrieve customer Receipt Data
	public function customer_receipt_data($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_ledger');
		$this->db->where(array('customer_id'=>$customer_id,'invoice_no'=>NULL,'status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}
//Retrieve customer All data
	public function customerledger_tradational($customer_id)
	{
		$this->db->select('*');
		$this->db->from('customer_ledger');
		$this->db->where(array('customer_id'=>$customer_id,'status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}
//Retrieve customer total information
	public function customer_transection_summary($customer_id)
	{
		$result=array();
		$this->db->select_sum('amount','total_credit');
		$this->db->from('customer_ledger');
		$this->db->where(array('customer_id'=>$customer_id,'receipt_no'=>NULL,'status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result[]=$query->result_array();
		}

		$this->db->select_sum('amount','total_debit');
		$this->db->from('customer_ledger');
		$this->db->where(array('customer_id'=>$customer_id,'status'=>1));
		$this->db->where('receipt_no !=',NULL);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result[]=$query->result_array();
		}
		return $result;

	}


	// Delete customer Item
	public function delete_customer_item($customer_id)
	{
		$result = $this->db->select('*')
		->from('invoice')
		->where('customer_id',$customer_id)
		->get()
		->num_rows();
		if ($result > 0) {
			$this->session->set_userdata(array('error_message'=>display('you_cant_delete_this_customer')));
			redirect('Ccustomer/manage_customer');
		}else{
			$this->db->where('customer_id',$customer_id);
			$this->db->delete('customer_information');

			$this->db->select('*');
			$this->db->from('customer_information');
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_customer[] = array('label'=>$row->customer_name,'value'=>$row->customer_id);
			}
			$cache_file = './my-assets/js/admin_js/json/customer.json';
			$customerList = json_encode($json_customer);
			file_put_contents($cache_file,$customerList);
			return true;
		}
	}

	//Update customer
	public function update_customer($data,$customer_id)
	{

		try{
			$this->db->where('customer_id',$customer_id);
			$result = $this->db->update('customer_information',$data);
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
	//Add customer
	public function customer_add($data){
        try{
            if($this->db->insert('customer_information', $data)){
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

	public function delete_customer($customer_id)
	{

			try{
            $this->db->set('is_active','0');
			$this->db->where('customer_id',$customer_id);
			$result = $this->db->update('customer_information');
          	//echo $this->db->last_query();exit;

            $respnce['status'] = 'success';
            $respnce['message'] = 'Customer successfully deleted';
            return $respnce;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

	}
	public function customer_search_list($cat_id,$company_id)
	{
		$this->db->select('a.*,b.sub_category_name,c.category_name');
		$this->db->from('customers a');
		$this->db->join('customer_sub_category b','b.sub_category_id = a.sub_category_id');
		$this->db->join('customer_category c','c.category_id = b.category_id');
		$this->db->where('a.sister_company_id',$company_id);
		$this->db->where('c.category_id',$cat_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}


//get this data for recovery password
	public function get_user_info($email)
	{
		$this->db->select('*');
		$this->db->from('customer_information');
		$this->db->where('customer_email',$email);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}

//insert token to resent password
	public function set_token($precdat){
		$this->db->set('token',$precdat['token']);
		$this->db->where('customer_email',$precdat['email']);
		$result = $this->db->update('customer_information');

		if($result)
		{
			return true;
		}else{
			return false;
		}
	}

	public function password_update($data){
		$password = md5("gef".$data['password']);
		$this->db->set('password',$password);
		$this->db->where('token',$data['token']);
		$result = $this->db->update('customer_information');

		if($result)
		{
			return true;
		}else{
			return false;
		}
	}



 	public function fetchCountry(){
        try{
            $this->db->order_by("name", "ASC");
            $query = $this->db->get("countries");
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
    	}
    }

    public function fetchStatebyCountry($countryId){
        try{
           $this->db->where('country_id', $countryId);
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('states');
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
    	}
    }


    public function fetchState($countryId){
        try{
            $this->db->where('country_id', $countryId);
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('states');
            $output = '<option>--Select State--</option>';
            foreach($query->result() as $row){
                $output .= '<option value="'.$row->iso2.'">'.$row->name.'</option>';
            }
            return $output;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
    	}
    }

		public function fetchCity($stateId){
        try{
            $this->db->where('state_code', $stateId);
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('cities');
            $output = '<option>--Select City--</option>';
            foreach($query->result() as $row){
                $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
            }
            return $output;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
    	}
    }

		public function fetchCitybyState($stateId){
        try{
           $this->db->where('state_code', $stateId);
            $this->db->order_by('name', 'ASC');
            $query = $this->db->get('cities');
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
    	}
    }

     public function isPhoneExist($phno){
        try{
            $this->db->select('customer_mobile');
            $this->db->from('customer_information');
            $this->db->where('customer_mobile',$phno);

            $result= $this->db->get()->result();
            if($result){
                return $result;
            }else{
                return FALSE;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function isEmailExist($email){
        try{
            $this->db->select('customer_email');
            $this->db->from('customer_information');
            $this->db->where('customer_email',$email);

            $result= $this->db->get()->result();
            if($result){
                return $result;
            }else{
                return FALSE;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function get_all_customer() {
        try{
            $this->db->select('customer_name,customer_email,customer_mobile,customer_address_1,customer_address_2,city,zip');
            $this->db->from('customer_information');
            // $this->db->where('is_deleted', 0);
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
    	}
    }

}
