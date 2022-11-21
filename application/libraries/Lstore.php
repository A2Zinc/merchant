<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lstore {
	//Add store
	public function store_add_form()
	{
		$CI =& get_instance();
		$CI->load->model('Stores');
		$data = array(
				'title' => display('add_store')
			);
		$customerForm = $CI->parser->parse('store/add_store',$data,true);
		return $customerForm;
	}	
	//Add store product
	public function store_transfer_form()
	{
		$CI =& get_instance();
		$CI->load->model('Stores');
		$CI->load->model('Products');
		$CI->load->model('Variants');
		$store_list   = $CI->Stores->store_list();
		$variant_list = $CI->Variants->variant_list();
		$data = array(
				'title' 		=> display('store_product_transfer'),
				'store_list' 	=> $store_list,
				'variant_list' 	=> $variant_list,
			);
		$store_product = $CI->parser->parse('store/store_product_transfer',$data,true);
		return $store_product;
	}

	//Retrieve  store List	
	public function store_list($data_filter_arr=array())
	{
		$merchant_id = $data_filter_arr["filter_merchant_id"];

		$CI =& get_instance();
		$CI->load->model('Stores');
		$store_list = $CI->Stores->store_list($data_filter_arr);
        $merchant_list  = $CI->Stores->merchant_list();

		$i=0;
		if(!empty($store_list)){	
			foreach($store_list as $k=>$v){$i++;
			   $store_list[$k]['sl']=$i;
			}
		}

		$data = array(
				'title' 			 => display('manage_store'),
				'store_list' 		 => $store_list,
				'merchant_list' 	 => $merchant_list,
				'filter_merchant_id' => $merchant_id,				
			);
		$customerList = $CI->parser->parse('store/store',$data,true);
		return $customerList;
	}

	//Retrieve  store product List	
	public function store_product_list()
	{
		$CI =& get_instance();
		$CI->load->model('Stores');
		$store_product_list = $CI->Stores->store_product_list(); 

		$i=0;
		if(!empty($store_product_list)){	
			foreach($store_product_list as $k=>$v){$i++;
			   $store_product_list[$k]['sl']=$i;
			}
		}

		$data = array(
				'title' => display('manage_store_product'),
				'store_product_list' => $store_product_list,
			);
		$customerList = $CI->parser->parse('store/manage_store_product',$data,true);
		return $customerList;
	}

	//store Edit Data
	public function store_edit_data($store_id)
	{
		$CI =& get_instance();
		$CI->load->model('Stores');
		$store_details  = $CI->Stores->retrieve_store_editdata($store_id);

		$merchant_list  = $CI->Stores->merchant_list();
		$store_category = $CI->Stores->store_category();
		$data = array(
			'title' 		  	 => display('store_edit'),
			'merchant_name'   	 => !empty($store_details[0]['merchant_name']) ? $store_details[0]['merchant_name'] : "",
			'store_id' 		  	 => $store_details[0]['store_id'],
			'store_name' 	  	 => !empty($store_details[0]['store_name']) ? $store_details[0]['store_name'] : "",
			'store_email' 	  	 => !empty($store_details[0]['store_email']) ? $store_details[0]['store_email'] : "",
			'store_contact'	  	 => !empty($store_details[0]['store_contact']) ? $store_details[0]['store_contact'] : "",
			'store_url'	 	  	 => !empty($store_details[0]['store_url']) ? $store_details[0]['store_url'] : "",
			'db_store_category'  => !empty($store_details[0]['store_category']) ? $store_details[0]['store_category'] : "",
			'db_merchant_id'  	 => !empty($store_details[0]['merchant_id']) ? $store_details[0]['merchant_id'] : "",
			'store_address_1' 	 => !empty($store_details[0]['store_address_1']) ? $store_details[0]['store_address_1'] : "",
			'store_address_2' 	 => !empty($store_details[0]['store_address_2']) ? $store_details[0]['store_address_2'] : "",
			'default_status' 	 => $store_details[0]['default_status'],
			'merchant_list'  	 => $merchant_list,
			'store_category' 	 => $store_category
			);		
		
		$chapterList = $CI->parser->parse('store/edit_store',$data,true);
		return $chapterList;
	}	
	//Store Product Edit Data
	public function store_product_edit_data($store_product_id)
	{
		$CI =& get_instance();
		$CI->load->model('Stores');
		$CI->load->model('Products');
		$CI->load->model('Variants');
		$store_details = $CI->Stores->retrieve_store_product_editdata($store_product_id);

		$store_id = $store_details[0]['store_id'];
		$product_id = $store_details[0]['product_id'];
		$variant_id = $store_details[0]['variant_id'];


		$store_list   = $CI->Stores->store_list();
		$product_list = $CI->Products->product_list();
		$variant_list = $CI->Variants->variant_list();

		$store_list_selected = $CI->Stores->store_list_selected($store_id);
		$product_list_selected = $CI->Stores->product_list_selected($product_id);
		$variant_list_selected = $CI->Stores->variant_list_selected($variant_id);

		
		$data=array(
			'title' 		=> display('store_product_edit'),
			'store_product_id' 	=> $store_details[0]['store_product_id'],
			'quantity' 	=> $store_details[0]['quantity'],
			'store_list' => $store_list,
			'product_list' => $product_list,
			'variant_list' => $variant_list,
			'store_list_selected' => $store_list_selected,
			'product_list_selected' => $product_list_selected,
			'variant_list_selected' => $variant_list_selected,
			);
		$chapterList = $CI->parser->parse('store/edit_store_product',$data,true);
		return $chapterList;
	}
}
?>