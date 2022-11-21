<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class eplugin{
	
	/*
	created : ravi sanchaniya
	created date : 15/04/2021
	Description : ecommerce api library to update data on ecommerce plugin
	*/



	//Inventory Update
	public function update_inventory($date=array())
	{

		$CI =& get_instance();

		$curl = curl_init();

		$api_url = $CI->config->item('ecommerce_api_url');

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $api_url.'update_quantity',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => 'shopify_product_id='.$date['shopify_product_id'].'&quantity='.$date['quantity'],
		  CURLOPT_HTTPHEADER => array(
		    'license_key: 34343fsdfsf343',
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		// echo $response;
		// exit();

	}
	public function refund($data){
		$CI =& get_instance();
		$curl = curl_init();

		$api_url = $CI->config->item('ecommerce_api_url');
		$post_data=[
			'order_id' => $data['eorder_id'],
			'item_ids' => $data['item_ids']
		];
		// print_r($post_data);
		// die;
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $api_url.'refund',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => json_encode($post_data),
		  CURLOPT_HTTPHEADER => array(
		    'license_key: 34343fsdfsf343',
		    'Content-Type: application/json'
		  ),
		));
		// echo json_encode($data);
		$response = curl_exec($curl);

		$CI->db->where(['order_id' => $data['order_id']]);
		$CI->db->update('order',['order_details' => $response]);

		//$response = curl_exec($curl);

	}
	public function fullfillment($data){
		$CI =& get_instance();
		$curl = curl_init();

		$api_url = $CI->config->item('ecommerce_api_url');
		$post_data=['order_id' => $data['eorder_id']];
		//print_r($date);

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $api_url.'shipping',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => json_encode($post_data),
		  CURLOPT_HTTPHEADER => array(
		    'license_key: 34343fsdfsf343',
		    'Content-Type: application/json'
		  ),
		));
		// echo json_encode($data);

		$response = curl_exec($curl);

		$CI->db->where(['order_id' => $data['order_id']]);
		$CI->db->update('order',['order_details' => $response]);
		curl_close($curl);
		// echo $response;
		// exit();

	}

	//Inventory Adjust on POS order
	public function adjust_quantity($data=array())
	{

		$CI =& get_instance();

		$curl = curl_init();

		$api_url = $CI->config->item('ecommerce_api_url');

		//print_r($date);

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $api_url.'adjust_quantity',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		    'license_key: 34343fsdfsf343',
		    'Content-Type: application/json'
		  ),
		));
		// echo json_encode($data);

		$response = curl_exec($curl);

		curl_close($curl);
		// echo $response;
		// exit();

	}



	//Inventory add prodct
	public function update_productinfo($data=array())
	{


		$CI =& get_instance();

		$curl = curl_init();

		$api_url = $CI->config->item('ecommerce_api_url');

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $api_url.'update_product/',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		    'license_key: 34343fsdfsf343',
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		// echo json_encode($data);
		// print_r($data);
		curl_close($curl);
		return json_decode($response);
		// exit();

	}

	//Inventory add prodct
	public function insert_productinfo($data=array())
	{

		$CI =& get_instance();

		$curl = curl_init();

		$api_url = $CI->config->item('ecommerce_api_url');

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $api_url.'add_product/',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => json_encode($data),
		  CURLOPT_HTTPHEADER => array(
		    'license_key: 34343fsdfsf343',
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		// echo json_encode($data);
		// print_r($data);
		// echo $response;
		// die;
		curl_close($curl);
		return json_decode($response);
		// exit();

	}

	

}
?>