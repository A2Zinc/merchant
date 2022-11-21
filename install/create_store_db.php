<?php
	session_start();
	$response_ajax 	 = array();

	$store_id = ((isset($_POST['store_id']) && $_POST['store_id'] != "")?$_POST['store_id']:"0");
	$api_type = ((isset($_POST['api_type']) && $_POST['api_type'] != "")?$_POST['api_type']:"");


	// ST - Store Information
	if($api_type == "store_information") {

		if(intval($store_id) > 0) { // Update

			$curl = curl_init();
			curl_setopt_array($curl, array(
			  	CURLOPT_URL => 'http://a2zstaging.azurewebsites.net/superadmin/api/store_update_api',
			  	CURLOPT_RETURNTRANSFER => true,
			  	CURLOPT_ENCODING => '',
			  	CURLOPT_MAXREDIRS => 10,
			  	CURLOPT_TIMEOUT => 0,
			  	CURLOPT_FOLLOWLOCATION => true,
			  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  	CURLOPT_CUSTOMREQUEST => 'POST',
			  	CURLOPT_POSTFIELDS => $_POST
			));

			$response_ajax["status"] 	= 1;
			$response_ajax["message"] 	= "Store has been updated successfully.";
			$response_ajax["store_id"] 	= $store_id;

			//$response = curl_exec($curl);
			//curl_close($curl);

		} else { // Insert

			$curl = curl_init();
			curl_setopt_array($curl, array(
			  	CURLOPT_URL => 'http://a2zstaging.azurewebsites.net/superadmin/api/store_add',
			  	CURLOPT_RETURNTRANSFER => true,
			  	CURLOPT_ENCODING => '',
			  	CURLOPT_MAXREDIRS => 10,
			  	CURLOPT_TIMEOUT => 0,
			  	CURLOPT_FOLLOWLOCATION => true,
			  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  	CURLOPT_CUSTOMREQUEST => 'POST',
			  	CURLOPT_POSTFIELDS => $_POST
			));

			$response_ajax["status"] 	= 1;
			$response_ajax["message"] 	= "Store has been created successfully.";

			$response = curl_exec($curl);

			//$response =  '{"status":1,"store_data":{"store_id":"40","merchant_id":"211019041655","store_name":"Campus Liquor","store_db":"a2zpos_v3","store_username":"swazeiCentral","store_password":"swazeiCentral@123","host":"104.43.252.46","store_email":"info@mirchmasala2go.com","store_contact":"+1 619-642-0189","store_url":"","store_category":"","store_address_1":"6165 El Cajon Blvd","street_number":null,"city":"San Diego","state":"CA","zipcode":"92115","store_country":"United States","default_status":"0","created_date":"2021-11-11 14:26:35","updated_date":"2021-11-11 14:26:35"}}';

			//curl_close($curl);
			$response_decode = json_decode($response);

			if(!empty($response_decode->store_data)) {
				foreach ($response_decode->store_data as $key => $value) {
					$_SESSION["store_session_data"]["store_information"][$key] = $value;

					if($key == "store_id") {
						$response_ajax["store_id"] 	= $value;
					}
				}
			}
		}
	}
	// EN - Store Information

	// ST - Tax Information
	if($api_type == "tax_information") {
		// CURLOPT_URL => 'http://localhost/lunavo/pos151121/a2zpos-web/superadmin/api/save_tax_information',
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  	CURLOPT_URL => 'http://a2zstaging.azurewebsites.net/superadmin/api/save_tax_information',
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_ENCODING => '',
		  	CURLOPT_MAXREDIRS => 10,
		  	CURLOPT_TIMEOUT => 0,
		  	CURLOPT_FOLLOWLOCATION => true,
		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  	CURLOPT_CUSTOMREQUEST => 'POST',
		  	CURLOPT_POSTFIELDS => $_POST
		));		

		$response = curl_exec($curl);
		$response_decode = json_decode($response);		

		if(!empty($response_decode->status) && $response_decode->status == 1) {
			if(!empty($response_decode->tax_setting_data)) {
				foreach ($response_decode->tax_setting_data as $key => $value) {
					$_SESSION["store_session_data"]["tax_information"][$key] = $value;
				}
			}

			$response_ajax["status"] 	= 1;
			$response_ajax["message"] 	= "Tax Information has been saved successfully.";

		} else {
			$response_ajax["status"] 	= 0;
			$response_ajax["message"] 	= $response_decode->message;
		}

		curl_close($curl);
	}
	// EN - Tax Information

	// ST - Card Processor Settings
	if($api_type == "card_processor_settings") {
		// CURLOPT_URL => 'http://localhost/lunavo/pos151121/a2zpos-web/superadmin/api/save_card_processor_settings',
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  	CURLOPT_URL => 'http://a2zstaging.azurewebsites.net/superadmin/api/save_card_processor_settings',
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_ENCODING => '',
		  	CURLOPT_MAXREDIRS => 10,
		  	CURLOPT_TIMEOUT => 0,
		  	CURLOPT_FOLLOWLOCATION => true,
		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  	CURLOPT_CUSTOMREQUEST => 'POST',
		  	CURLOPT_POSTFIELDS => $_POST
		));

		$response = curl_exec($curl);
		$response_decode = json_decode($response);

		if(!empty($response_decode->status) && $response_decode->status == 1) {
			if(!empty($response_decode->card_processor_settings_data)) {
				foreach ($response_decode->card_processor_settings_data as $key => $value) {
					$_SESSION["store_session_data"]["card_processor_settings"][$key] = $value;
				}
			}

			$response_ajax["status"] 	= 1;
			$response_ajax["message"] 	= "Card Processor Settings has been saved successfully.";

		} else {

			$response_ajax["status"] 	= 0;
			$response_ajax["message"] 	= $response_decode->message;
		}

		curl_close($curl);
	}
	// EN - Card Processor Settings

	// ST - Cash Register Information
	if($api_type == "cash_register_information") {
		// CURLOPT_URL => 'http://localhost/lunavo/pos151121/a2zpos-web/superadmin/api/save_cash_register_information',
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  	CURLOPT_URL => 'http://a2zstaging.azurewebsites.net/superadmin/api/save_cash_register_information',
		  	CURLOPT_RETURNTRANSFER => true,
		  	CURLOPT_ENCODING => '',
		  	CURLOPT_MAXREDIRS => 10,
		  	CURLOPT_TIMEOUT => 0,
		  	CURLOPT_FOLLOWLOCATION => true,
		  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  	CURLOPT_CUSTOMREQUEST => 'POST',
		  	CURLOPT_POSTFIELDS => $_POST
		));

		$response = curl_exec($curl);
		$response_decode = json_decode($response);

		if(!empty($response_decode->status) && $response_decode->status == 1) {
			if(!empty($response_decode->web_setting_data)) {
				foreach ($response_decode->web_setting_data as $key => $value) {
					$_SESSION["store_session_data"]["cash_register_information"][$key] = $value;
				}
			}

			$response_ajax["status"] 	= 1;
			$response_ajax["message"] 	= "Cash Register Information has been saved successfully.";

		} else {

			$response_ajax["status"] 	= 0;
			$response_ajax["message"] 	= $response_decode->message;
		}

		curl_close($curl);
	}
	// EN - Cash Register Information

	echo json_encode($response_ajax);
	exit();
?>