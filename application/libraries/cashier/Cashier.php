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


	//Inventory Update
	public function adjust_quantity($date=array())
	{

		$CI =& get_instance();

		$curl = curl_init();

		$api_url = $CI->config->item('ecommerce_api_url');

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $api_url.'adjust_quantity',
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

	

}
?>