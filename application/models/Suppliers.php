<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Suppliers extends MY_Model {
	public function __construct()
	{
		parent::__construct();
	}
	//Count supplier
	public function count_supplier()
	{
		return $this->db->count_all("supplier_information");
	}
	//supplier List
	public function supplier_list()
	{
		$this->db->select('*');
		$this->db->from('supplier_information');
		$this->db->order_by('supplier_id','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
		//supplier List For Report
	public function supplier_list_report()
	{
		$this->db->select('*');
		$this->db->from('supplier_information');
		$this->db->order_by('supplier_id','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
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
	//supplier Search List
	public function supplier_search_item($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('supplier_information');
		$this->db->where('supplier_id',$supplier_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Product search item
	public function product_search_item($supplier_id,$product_name){
		$this->db->select('*');
		$this->db->from('product_information');
		$this->db->where('supplier_id',$supplier_id);
		$this->db->like('product_name', $product_name, 'both');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Count supplier
	public function supplier_entry($data)
	{

		$this->db->select('*');
		$this->db->from('supplier_information');
		$this->db->where('supplier_name',$data['supplier_name']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return FALSE;
		}else{

			$this->db->insert('supplier_information',$data);
			//Data is sending for syncronizing
		
			$this->db->select('*');
			$this->db->from('supplier_information');
			$this->db->where('status',1);
			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_product[] = array('label'=>$row->supplier_name,'value'=>$row->supplier_id);
			}
			$cache_file = './my-assets/js/admin_js/json/supplier.json';
			$productList = json_encode($json_product);
			file_put_contents($cache_file,$productList);
			return TRUE;
		}
	}
	//Retrieve supplier Edit Data
	public function retrieve_supplier_editdata($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('supplier_information');
		$this->db->where('supplier_id',$supplier_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Update Categories
	// public function update_supplier($data,$supplier_id)
	// {
	// 	$this->db->where('supplier_id',$supplier_id);
	// 	$this->db->update('supplier_information',$data); 	
	// 	$this->db->select('*');
	// 	$this->db->from('supplier_information');
	// 	$this->db->where('status',1);
	// 	$query = $this->db->get();
	// 	foreach ($query->result() as $row) {
	// 		$json_product[] = array('label'=>$row->supplier_name,'value'=>$row->supplier_id);
	// 	}
	// 	$cache_file = './my-assets/js/admin_js/json/supplier.json';
	// 	$productList = json_encode($json_product);
	// 	file_put_contents($cache_file,$productList);
	// 	return true;
	// }
	// Delete supplier Item
	// public function delete_supplier($supplier_id)
	// {
	// 	$result = $this->db->select('*')
	// 						->from('product_purchase')
	// 						->where('supplier_id',$supplier_id)
	// 						->get()
	// 						->num_rows();
	// 	if ($result > 0) {
	// 		$this->session->set_userdata(array('error_message'=>display('you_cant_delete_this_supplier')));
	// 		redirect('Csupplier/manage_supplier');
	// 	}else{
	// 		$this->db->where('supplier_id',$supplier_id);
	// 		$this->db->delete('supplier_information'); 	

	// 		$this->db->select('*');
	// 		$this->db->from('supplier_information');
	// 		$this->db->where('status',1);
	// 		$query = $this->db->get();
	// 		foreach ($query->result() as $row) {
	// 			$json_product[] = array('label'=>$row->supplier_name,'value'=>$row->supplier_id);
	// 		}
	// 		$cache_file = './my-assets/js/admin_js/json/supplier.json';
	// 		$productList = json_encode($json_product);
	// 		file_put_contents($cache_file,$productList);
	// 		return true;
	// 	}
	// }
	//Retrieve supplier Personal Data 
	public function supplier_personal_data($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('supplier_information');
		$this->db->where('supplier_id',$supplier_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Retrieve Supplier Purchase Data 
	public function supplier_purchase_data($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('product_purchase');
		$this->db->where(array('supplier_id'=>$supplier_id,'status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Supplier Search Data
	public function supplier_search_list($cat_id,$company_id)
	{
		$this->db->select('a.*,b.sub_category_name,c.category_name');
		$this->db->from('suppliers a');
		$this->db->join('supplier_sub_category b','b.sub_category_id = a.sub_category_id');
		$this->db->join('supplier_category c','c.category_id = b.category_id');
		$this->db->where('a.sister_company_id',$company_id);
		$this->db->where('c.category_id',$cat_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	//To get certain supplier's chalan info by which this company got products day by day
	public function suppliers_ledger($supplier_id)
	{ 
		$this->db->select('*');
		$this->db->from('supplier_ledger');
		$this->db->where('supplier_id',$supplier_id);
		$this->db->order_by('invoice_no','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Retrieve supplier Transaction Summary
	public function suppliers_transection_summary($supplier_id)
	{
	 $result=array();
		$this->db->select_sum('amount','total_credit');
		$this->db->from('supplier_ledger');
		$this->db->where(array('supplier_id'=>$supplier_id,'deposit_no'=>NULL,'status'=>1));
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$result[]=$query->result_array();	
		}
		
		$this->db->select_sum('amount','total_debit');
		$this->db->from('supplier_ledger');
		$this->db->where(array('supplier_id'=>$supplier_id,'invoice_no'=>NULL,'status'=>1));
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			$result[]=$query->result_array();	
		}
		return $result;
	
	}
	//Findings a certain supplier products sales information
	public function supplier_sales_details($supplier_id)
	{
		$from_date = $this->input->post('from_date');		
		$to_date = $this->input->post('to_date');
		
		$this->db->select('date,product_name,product_model,product_id,cartoon,quantity,supplier_rate,(quantity*supplier_rate) as total');
		$this->db->from('sales_report');
		$this->db->where('supplier_id',$supplier_id);
		if($from_date!=null AND $to_date!=null)
		{
			$this->db->where('date >',$from_date.' 00:00:00');
			$this->db->where('date <',$to_date.' 00:00:00');
		}
		$this->db->order_by('date','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	public function supplier_sales_summary($supplier_id)
	{
		$from_date = $this->input->post('from_date');		
		$to_date = $this->input->post('to_date');
		
		
		$this->db->select('date,product_name,product_model,product_id,sum(cartoon) as cartoon, sum(quantity) as quantity ,supplier_rate,sum(quantity*supplier_rate) as total');
		$this->db->from('sales_report');
		$this->db->where('supplier_id',$supplier_id);
		if($from_date!=null AND $to_date!=null)
		{
			$this->db->where('date >=',$from_date.' 00:00:00');
			$this->db->where('date <=',$to_date.' 00:00:00');
		}
		$this->db->group_by('product_id,date,supplier_rate');
		$this->db->order_by('date','desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		
		
		return false;
	}
	
	################## Ssales & Payment Details ####################
	public function sales_payment_actual($supplier_id,$limit,$start_record,$from_date=null,$to_date=null)
	{
		$this->db->select('*');
		$this->db->from('sales_actual');
		$this->db->where('supplier_id',$supplier_id);
		if($from_date!=null AND $to_date!=null)
		{
			$this->db->where('date >',$from_date.' 00:00:00');
			$this->db->where('date <',$to_date.' 00:00:00');
		}
		$this->db->limit($limit, $start_record);
		$this->db->order_by('date');
		$query = $this->db->get();
		//echo $str = $this->db->last_query();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		
		return false;
	}
	################## total sales & payment information ####################
	public function sales_payment_actual_total($supplier_id)
	{
		$this->db->select_sum('sub_total');
		$this->db->from('sales_actual');
		$this->db->where('supplier_id',$supplier_id);
		$this->db->where('sub_total >',0);
		$query = $this->db->get();
		$result=$query->result_array();
		$data[0]["debit"]=$result[0]["sub_total"];
	
		$this->db->select_sum('sub_total');
		$this->db->from('sales_actual');
		$this->db->where('supplier_id',$supplier_id);
		$this->db->where('sub_total <',0);
		$query = $this->db->get();
		$result=$query->result_array();
		$data[0]["credit"]=$result[0]["sub_total"];
		
		$data[0]["balance"]=$data[0]["debit"]+$data[0]["credit"];
		
		return $data;
	}
	//To get certain supplier's payment info which was paid day by day
	public function supplier_paid_details($supplier_id)
	{
		$this->db->select('*');
		$this->db->from('supplier_ledger');
		$this->db->where('supplier_id',$supplier_id);
		$this->db->where('chalan_no',NULL);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//To get certain supplier's chalan info by which this company got products day by day
	public function supplier_chalan_details($supplier_id)
	{ 
		$this->db->select('*');
		$this->db->from('supplier_ledger');
		$this->db->where('supplier_id',$supplier_id);
		$this->db->where('deposit_no',NULL);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}

	//prashant code//
	public function get_all_supplier() {
        try{
        	$this->db->where('is_deleted', 0);
            $query =$this->db->get('supplier_information');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    public function insert_supplier(){ 
        try{
        	$data = array(
	            'supplier_id'   => $this->auth->generator(20),
	            'supplier_name' => $this->input->post('supplier_name'),
	            'mobile'        => $this->input->post('mobile'),
	            'email'         => $this->input->post('email'),
	            'address'       => $this->input->post('address'),
	            'details'       => $this->input->post('details'),
	            'contact_name'  => $this->input->post('contact_name'),
	            'contact_email' => $this->input->post('contact_email'),
	            'contact_no'  	=> $this->input->post('contact_no'),
	            'status'        => 1,
	            'supplier_category' => implode(',',$this->input->post('supplier_cat')),
	        );
	        $data = $this->security->xss_clean($data);
            $this->db->insert('supplier_information', $data);
            if($this->db->affected_rows() > 0){
            	$respnce['status'] = 'success';
            	$respnce['message'] = 'Supplier is Successfully Inserted';
                return $respnce;
            }else{
                return false;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
 	}
 	public function get_supplier_by_id($supplier_id){
        try{
            $this->db->select('*');
            $this->db->from('supplier_information');
            $this->db->where('supplier_id', $supplier_id);
            $query = $this->db->get();
            
            $array = array();
            if($this->db->affected_rows() > 0) {
                 $array = $query->row_array();
            } 
            return $array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    public function update_supplier(){
        try{
        	$supplier_id = $this->input->post('supplier_id');
        	$data = array(
	            'supplier_name' => $this->input->post('supplier_name'),
	            'mobile'        => $this->input->post('mobile'),
	            'email'         => $this->input->post('email'),
	            'address'       => $this->input->post('address'),
	            'details'       => $this->input->post('details'),
	            'contact_name'  => $this->input->post('contact_name'),
	            'contact_email' => $this->input->post('contact_email'),
	            'contact_no'  	=> $this->input->post('contact_no'),
	            'supplier_category' => implode(',',$this->input->post('supplier_cat')),
	        );
        	$data = $this->security->xss_clean($data);
            $this->db->where('supplier_id', $supplier_id);
            $this->db->update('supplier_information',$data);

            $data1 = array(
                'supplier' => $this->input->post('supplier_name'),
            );
            $this->db->where('supplier_id', $supplier_id);
            $this->db->update('product_information',$data1);

            $respnce['status'] = 'success';
        	$respnce['message'] = 'Suppier is Successfully Updated';
            return $respnce;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_supplier($supplier_id){
        try{
        	$this->db->set('is_deleted', 1);
            $this->db->where('supplier_id', $supplier_id);
            $this->db->update('supplier_information');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    } 

    public function isNameExist($name){
        try{
            $this->db->select('supplier_name');
            $this->db->from('supplier_information');
           $this->db->where('supplier_name',$name);
            // $this->db->like('supplier_name', $name, 'both');
            
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

    public function isMobileExist($mobile){
        try{
            $this->db->select('mobile');
            $this->db->from('supplier_information');
            $this->db->where('mobile',$mobile);
            
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
            $this->db->select('email');
            $this->db->from('supplier_information');
            $this->db->where('email',$email);
            
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
}