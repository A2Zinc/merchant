<?php
	session_start();
	$response_ajax 	 = array();
	$merchant_id 	 = $_REQUEST['merchant_id'];
	$licence_key 	 = $_REQUEST['licence_key'];

	$param = array();
	$param["merchant_id"] = $merchant_id;
	$param["licence_key"] = $licence_key;

	$curl = curl_init();
	curl_setopt_array($curl, array(

	  	CURLOPT_URL => 'http://a2zstaging.azurewebsites.net/superadmin/api/terminal_verfication',
	  	CURLOPT_RETURNTRANSFER => true,
	  	CURLOPT_ENCODING => '',
	  	CURLOPT_MAXREDIRS => 10,
	  	CURLOPT_TIMEOUT => 0,
	  	CURLOPT_FOLLOWLOCATION => true,
	  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  	CURLOPT_CUSTOMREQUEST => 'POST',
	  	CURLOPT_POSTFIELDS => $param

	));

	$response = curl_exec($curl);
	curl_close($curl);
	$response_decode = json_decode($response);

	$html = "<option value=''>Select Store</option>";

	if($response_decode->status == 1 && is_array($response_decode->store_data)) {

		$_SESSION['merchant_id'] = $merchant_id;
		$_SESSION['license_key'] = $licence_key;
		
		foreach ($response_decode->store_data as $key => $value) {
			
			$store_id 			= $value->store_id;
            $merchant_id 		= $value->merchant_id;
            $store_name 		= $value->store_name;
            $store_db 			= $value->store_db;
            $store_username 	= $value->store_username;
            $store_password 	= $value->store_password;
            $host 				= $value->host;
            $store_email 		= $value->store_email;
            $store_contact 		= $value->store_contact;
            $store_url 			= $value->store_url;
            $store_category 	= $value->store_category;
            $store_address_1 	= $value->store_address_1;
            $store_address_2 	= $value->street_number;
            $city               = $value->city;
            $state              = $value->state;
            $zipcode            = $value->zipcode;
            $default_status 	= $value->default_status;
            $created_date 		= $value->created_date;
            $updated_date 		= $value->updated_date;
            $merchant_name 		= $value->merchant_name;			

            if($store_address_1 != "" && $store_address_2 != ""){
            	$store_name = $store_name.' ( '.$store_address_1.','.$store_address_2.' )';
            }else if($store_address_1 != "" && $store_address_2 == ""){
            	$store_name = $store_name.' ( '.$store_address_1.' )';
            }else if($store_address_1 == "" && $store_address_2 != ""){
            	$store_name = $store_name.' ( '.$store_address_2.' )';
            }			
			
			$html .= "<option value='".$store_id."' data-merchant_id='".$merchant_id."' data-store_db='".$store_db."' data-store_username='".$store_username."' data-store_password='".$store_password."' data-host='".$host."'>".$store_name."</option>";

			$response_ajax["status"] 	= 1;
			$response_ajax["message"] 	= "";
			$response_ajax["html"] 		= $html;
		}
	}

	// Wrong enter merchant_id/licence_key
	if($response_decode->status == 0 && !is_array($response_decode->store_data)) {		

		$response_ajax["status"] 	= 0;
		$response_ajax["message"] 	= $response_decode->store_data;		
	}

	// Store is unavailable
	if($response_decode->status == 0 && empty($response_decode->store_data)) {		

		$response_ajax["status"] 	= 2;
		$response_ajax["message"] 	= "Oops! Store is unavailable.";
	}

	echo json_encode($response_ajax);
	exit();
?>