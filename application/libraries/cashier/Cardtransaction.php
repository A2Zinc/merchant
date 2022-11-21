<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cardtransaction{
	
	/*
	created : Ravi Sanchaniya
	created date : 14/06/2021
	Description : Card Transaction API Library
	*/

	// ping Method

	public function ping() {

		$CI =& get_instance();

		$card_transaction_api_url = $CI->config->item('card_transaction_api_url');
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_assoc_merchant_id  = $CI->config->item('card_transaction_assoc_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_api_key  = $CI->config->item('card_transaction_api_key');
		$card_transaction_terminal_hsn_no  = $CI->config->item('card_transaction_terminal_hsn_no');		

		$post_array = array("merchantId" => $card_transaction_merchant_id,"hsn" => $card_transaction_terminal_hsn_no); 
		$post_json =json_encode($post_array);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_api_url.'v1/ping',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: ".$card_transaction_auth_key,
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$curl_response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  $response['status'] = 0;
		  $response['status'] = $err;
		} else {
		 	  	$response_decode=json_decode($curl_response);

			  	if($response_decode->connected == 1){
					$response['status'] = 1;
					$response['massage'] = 'connected';
				}else{
					$response['status'] = $response_decode->errorCode;
				  	$response['massage'] = $response_decode->errorMessage;
				}
		}

		return $response;

	}


	// connect to server
	public function connect() {

		$CI =& get_instance();

		$card_transaction_api_url = $CI->config->item('card_transaction_api_url');
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_assoc_merchant_id  = $CI->config->item('card_transaction_assoc_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_api_key  = $CI->config->item('card_transaction_api_key');
		$card_transaction_terminal_hsn_no  = $CI->config->item('card_transaction_terminal_hsn_no');		

		$post_array = array("merchantId" => $card_transaction_merchant_id,"hsn" => $card_transaction_terminal_hsn_no,"force" => "true"); 
		$post_json =json_encode($post_array);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_api_url.'v2/connect',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HEADER => 1,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: ".$card_transaction_auth_key,
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		//$response = curl_exec($curl);

		$curl_response = curl_exec($curl);
		$err = curl_error($curl);
		
		//print_r($curl_response);
		// exit();
		if ($err) {
		  $response['status'] = 0;
		  $response['error'] = $err;
		} else {

				//
				$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
				$header = substr($curl_response, 0, $header_size);

				$headers_indexed_arr = explode("\r\n", $header);
				$headers_arr = array();
				$status_message = array_shift($headers_indexed_arr);
				foreach ($headers_indexed_arr as $value) {
				  if(false !== ($matches = explode(':', $value, 2))) {
				    $headers_arr["{$matches[0]}"] = trim($matches[1]);
				  }                
				}
				//print_r($headers_arr);
				$session_ar=explode(";",$headers_arr['X-CardConnect-SessionKey']);
				$session_key = trim($session_ar[0]);
				//echo "<br>";
				//
		 	  	

			  	if($session_key != ''){
					$response['status'] = 1;
					$response['X-CardConnect-SessionKey'] = $session_key;
				}else{
					$response['status'] = 0;
				  	$response['massage'] = 'disconnect';
				}
		}
		// print_r($response);
		// exit();
		curl_close($curl);
		return $response;

	}

	// Clear Machine Display
	public function cleardisplay() {

		$CI =& get_instance();

		$card_transaction_api_url = $CI->config->item('card_transaction_api_url');
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_assoc_merchant_id  = $CI->config->item('card_transaction_assoc_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_api_key  = $CI->config->item('card_transaction_api_key');
		$card_transaction_terminal_hsn_no  = $CI->config->item('card_transaction_terminal_hsn_no');		

		$post_array = array("merchantId" => $card_transaction_merchant_id,"hsn" => $card_transaction_terminal_hsn_no); 
		$post_json =json_encode($post_array);

		$X_CardConnect_SessionKey = $CI->session->userdata['X-CardConnect-SessionKey'];

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_api_url.'v3/clearDisplay',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HEADER => 1,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: ".$card_transaction_auth_key,
		    "X-CardConnect-SessionKey: ".$X_CardConnect_SessionKey,
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		//print_r($curl_response);
		// exit();
		if($err)
		  $response['status'] = 0;
		else
		  $response['status'] = 1;
		

		return $response;
		
	}

	// Read Confirmation
	public function readConfirmation() {

		$CI =& get_instance();

		$card_transaction_api_url = $CI->config->item('card_transaction_api_url');
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_assoc_merchant_id  = $CI->config->item('card_transaction_assoc_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_api_key  = $CI->config->item('card_transaction_api_key');
		$card_transaction_terminal_hsn_no  = $CI->config->item('card_transaction_terminal_hsn_no');		

		$post_array = array(
						"merchantId" => $card_transaction_merchant_id,
						"hsn" => $card_transaction_terminal_hsn_no,
						"prompt" => "Is this credit card transaction ?",
						"beep" => true
					); 
		$post_json =json_encode($post_array);

		$X_CardConnect_SessionKey = $CI->session->userdata['X-CardConnect-SessionKey'];		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_api_url.'v2/readConfirmation',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,		  
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: ".$card_transaction_auth_key,
		    "X-CardConnect-SessionKey: ".$X_CardConnect_SessionKey,
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$curl_response = curl_exec($curl);

	   $fl = fopen("requests.txt","a");
       fwrite($fl,"********START-->" . date("Y-m-d H:i:s") . "\r\n");
       fwrite($fl,"-------GET DATA---------\r\n");        
       fwrite($fl,$curl_response."&\r\n");
       fwrite($fl,"\r\n********END-->" . date("Y-m-d H:i:s") . "\r\n\r\n");
       fclose($fl);

		$err = curl_error($curl);
		$response = array();
		if ($err) {
		  $response['status'] = 2;
		  $response['massage'] = $err;
		} else {
	 	  	$response_decode=json_decode($curl_response);

		  	if($response_decode->confirmed == "true" || $response_decode->confirmed == true) {
				$response['status']  = 1;
				$response['massage'] = 'confirmed';
			}else{
				$response['status']  = 0;
			  	$response['massage'] = "Not confirmed";
			}
		}
		curl_close($curl);
		return $response;
	}

	// Read Card
	public function display() {

		$CI =& get_instance();

		$card_transaction_api_url = $CI->config->item('card_transaction_api_url');
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_assoc_merchant_id  = $CI->config->item('card_transaction_assoc_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_api_key  = $CI->config->item('card_transaction_api_key');
		$card_transaction_terminal_hsn_no  = $CI->config->item('card_transaction_terminal_hsn_no');		

		$post_array = array("merchantId" => $card_transaction_merchant_id,"hsn" => $card_transaction_terminal_hsn_no,"text" => "Wellcome To Campus Liquor !!"); 
		
		$post_json =json_encode($post_array);

		$X_CardConnect_SessionKey = $CI->session->userdata['X-CardConnect-SessionKey'];

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_api_url.'v3/display',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HEADER => 1,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: ".$card_transaction_auth_key,
		    "X-CardConnect-SessionKey: ".$X_CardConnect_SessionKey,
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		
	}

	// Auth Card
	public function authcard($amount=0,$order_id=0000,$username='Sadiksha Sharma',$readconfirmation_response=array()) {
		
		$CI =& get_instance();

		$card_transaction_api_url = $CI->config->item('card_transaction_api_url');
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_assoc_merchant_id  = $CI->config->item('card_transaction_assoc_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_api_key  = $CI->config->item('card_transaction_api_key');
		$card_transaction_terminal_hsn_no  = $CI->config->item('card_transaction_terminal_hsn_no');		
		$CI =& get_instance();

		if($amount != 0)
			$amount = $amount * 100;

		// ST - Read Confirmation

	   $fl = fopen("requests3.txt","a");
       fwrite($fl,"********START-->" . date("Y-m-d H:i:s") . "\r\n");
       fwrite($fl,"-------GET DATA---------\r\n");        
       fwrite($fl,json_encode($readconfirmation_response)."&\r\n");
       fwrite($fl,"\r\n********END-->" . date("Y-m-d H:i:s") . "\r\n\r\n");
       fclose($fl);

		$aid = "credit";
		$includepin = "false";
		if(!empty($readconfirmation_response) && $readconfirmation_response['status'] == 0) {
			$aid = "debit";
			$includepin = "true";
		}
		// EN - Read Confirmation

		$post_array = array(
			"merchantId" 			=> $card_transaction_merchant_id,
			"hsn" 		 			=> $card_transaction_terminal_hsn_no,
			"amount" 		 		=> $amount,
			"includeSignature" 		=> "false",
			"includeAmountDisplay" 	=> "true",
			"confirmAmount" 		=> "false",
			"beep" 		 			=> "true",
			"aid" 		 			=> $aid,
			"includeAVS" 		 	=> "false",
			"includePIN" 		 	=> $includepin,
			"capture" 		 		=> "true",
			"orderId" 		 		=> $order_id,
			"clearDisplayDelay" 	=> "1000",
			"userFields" 			=> array("UDF1" => $username,"UDF2" => "IOWAVUE"),
		);
		
		$post_json =json_encode($post_array);

	   $fl = fopen("requests2.txt","a");
       fwrite($fl,"********START-->" . date("Y-m-d H:i:s") . "\r\n");
       fwrite($fl,"-------GET DATA---------\r\n");        
       fwrite($fl,$post_json."&\r\n");
       fwrite($fl,"\r\n********END-->" . date("Y-m-d H:i:s") . "\r\n\r\n");
       fclose($fl);

		// echo "<br>test";
		// print_r($CI->session->userdata);

		$X_CardConnect_SessionKey = $CI->session->userdata['X-CardConnect-SessionKey'];
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_api_url.'v3/authCard',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HEADER => 1,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: ".$card_transaction_auth_key,
		    "X-CardConnect-SessionKey: ".$X_CardConnect_SessionKey,
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));
		//echo $X_CardConnect_SessionKey;
		$curl_response = curl_exec($curl);

		$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
		$header = substr($curl_response, 0, $header_size);
		$body = substr($curl_response, $header_size);

		//print_r($body);
		curl_close($curl);
		$response = array();
		$response_decode=json_decode($body);


		$fl = fopen("cardresponse.txt","a");
        fwrite($fl,"********START-->" . date("Y-m-d H:i:s") . "\r\n");
        fwrite($fl,"-------CARD RESPONSE ---------\r\n");        
        fwrite($fl,$body."&\r\n");
        fwrite($fl,"-------CARD RESPONSE ENCODE---------\r\n");
        fwrite($fl,json_encode($body)."&\r\n");
        fwrite($fl,"\r\n********END-->" . date("Y-m-d H:i:s") . "\r\n\r\n");
        fclose($fl);

		// print_r($response_decode);
		// echo "with 0 -> ".$response_decode[0]['respstat'];
		// echo "without 0 -> ".$response_decode['respstat'];
		
		//echo $response_decode->respstat;
		//die();
		if($response_decode->respstat == "A"){
			$response['status']    = 1;
			$response['data'] 	   = $body;
			$response['respstat']  = "A";
		}else if($response_decode->respstat == "B"){
			$response['status']    = 0;
			$response['data'] 	   = $body;
			$response['respstat']  = "B";
		}else if($response_decode->respstat == "C"){
			$response['status']    = 0;
			$response['data'] 	   = $body;
			$response['respstat']  = "C";
		}else{
			$response['status']    = 0;
			$response['data'] 	   = $body;
			$response['respstat']  = "D";
		}
		$response['card_request']  = $post_json;
		return $response;
	}

	// Disconnect from Machine
	public function disconnect() {
		
		$CI =& get_instance();

		$card_transaction_api_url = $CI->config->item('card_transaction_api_url');
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_assoc_merchant_id  = $CI->config->item('card_transaction_assoc_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_api_key  = $CI->config->item('card_transaction_api_key');
		$card_transaction_terminal_hsn_no  = $CI->config->item('card_transaction_terminal_hsn_no');		

		$post_array = array("merchantId" => $card_transaction_merchant_id,"hsn" => $card_transaction_terminal_hsn_no); 
		
		$post_json =json_encode($post_array);

		$X_CardConnect_SessionKey = $CI->session->userdata['X-CardConnect-SessionKey'];

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_api_url.'v2/disconnect',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HEADER => 1,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: ".$card_transaction_auth_key,
		    "X-CardConnect-SessionKey: ".$X_CardConnect_SessionKey,
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);

	}

	public function convert_header_to_array($headers){

		echo "Test";
		$headers_indexed_arr = explode("\r\n", $headers);
		$headers_arr = array();
		$status_message = array_shift($headers_indexed_arr);
		foreach ($headers_indexed_arr as $value) {
		  if(false !== ($matches = explode(':', $value, 2))) {
		    $headers_arr["{$matches[0]}"] = trim($matches[1]);
		  }                
		}
		// Show that it works
		//header('content-type: text/plain; charset=utf-8');
		//print_r($headers_arr);
		return $headers_arr;
	}

	// Refund Card Inquire
	public function refundCardInquire($amount=0,$retref=0000,$orderid=0000) {		

		$CI =& get_instance();
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');		
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_username  = $CI->config->item('card_transaction_username');
		$card_transaction_password  = $CI->config->item('card_transaction_password');		

		if($amount != 0)
			$amount = $amount * 100;		
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_uat_api_url.'inquire/'.$retref.'/'.$card_transaction_merchant_id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,		  
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",		  
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Basic ".base64_encode($card_transaction_username.":".$card_transaction_password),
		    "cache-control: no-cache",
		  ),
		));

		//echo $X_CardConnect_SessionKey;
		$curl_response = curl_exec($curl);

		$curl_response_decode = json_decode($curl_response);
		$resptext = $curl_response_decode->resptext; // Approval
		$refundable = $curl_response_decode->refundable; // Y
		$voidable = $curl_response_decode->voidable; // N
		
		curl_close($curl);

		$response = array();
		if($resptext == "Approval" && $refundable == "Y") {

			$response_refund = $this->refundCardAmount($amount,$retref,$orderid);
			if($response_refund['status'] == 1) {
				$response['status'] = 1;
				$response['data'] = $response_refund['data'];
			} else {
				$response['status'] = 0;
				$response['error'] = $response_refund['error'];
			}

		} else if($voidable == "Y") {

			$response_refund = $this->refundVoidCardAmount($amount,$retref,$orderid);
			if($response_refund['status'] == 1) {
				$response['status'] = 1;
				$response['data'] = $response_refund['data'];
			} else {
				$response['status'] = 0;
				$response['error'] = $response_refund['error'];
			}

		} else {
			$response['status'] = 0;
			$response['error'] = "Transaction is not settled yet.";
		}

		return $response;
	}

	// Refund Card Point
	public function refundCardAmount($amount=0,$retref=0000,$orderid=0000) {

		$CI =& get_instance();		
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');		
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_username  = $CI->config->item('card_transaction_username');
		$card_transaction_password  = $CI->config->item('card_transaction_password');

		$post_array = array(
			"merchid" 	=> $card_transaction_merchant_id,
			"retref"	=> $retref,
			"amount" 	=> $amount,
			"orderid" 	=> $orderid			
		);
		
		$post_json =json_encode($post_array);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_uat_api_url.'refund',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,		  
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Basic ".base64_encode($card_transaction_username.":".$card_transaction_password),
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));
		
		$curl_response = curl_exec($curl);
		$curl_response_decode = json_decode($curl_response);		
		curl_close($curl);		
		$resptext = $curl_response_decode->resptext; // Approval
		$respstat = $curl_response_decode->respstat; // A

		$response = array();		
		if($resptext == "Approval" && $respstat == "A") {
			$response['status'] = 1; // Success
			$response['data'] = $curl_response;
		} else {
			$response['status'] = 0; // Fail
			$response['error'] = $resptext;
		}		
		return $response;
	}

	// Void Card Amount
	public function refundVoidCardAmount($amount=0,$retref=0000,$orderid=0000) {

		$CI =& get_instance();		
		$card_transaction_uat_api_url = $CI->config->item('card_transaction_uat_api_url');		
		$card_transaction_merchant_id  = $CI->config->item('card_transaction_merchant_id');
		$card_transaction_auth_key  = $CI->config->item('card_transaction_auth_key');
		$card_transaction_username  = $CI->config->item('card_transaction_username');
		$card_transaction_password  = $CI->config->item('card_transaction_password');

		$post_array = array(
			"merchid" 	=> $card_transaction_merchant_id,
			"retref"	=> $retref,
			"amount" 	=> $amount,
			"orderid" 	=> $orderid			
		);
		
		$post_json =json_encode($post_array);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $card_transaction_uat_api_url.'void',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_FOLLOWLOCATION => true,		  
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Basic ".base64_encode($card_transaction_username.":".$card_transaction_password),
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));
		
		$curl_response = curl_exec($curl);
		$curl_response_decode = json_decode($curl_response);
		curl_close($curl);
		$resptext = $curl_response_decode->resptext; // Approval
		$respstat = $curl_response_decode->respstat; // A		

		$response = array();
		if($resptext == "Approval" && $respstat == "A") {
			$response['status'] = 1; // Success
			$response['data'] = $curl_response;
		} else {
			$response['status'] = 0; // Fail
			$response['error'] = $resptext;
		}
		return $response;
	}

	// Clover API
	public function cloverPayment($amount=0) {

		$CI =& get_instance();
		$CLOVER_APP_URL = $CI->config->item('CLOVER_APP_URL');		
		$CLOVER_APP_SECRET  = $CI->config->item('CLOVER_APP_SECRET');
		$CLOVER_APP_ID  = $CI->config->item('CLOVER_APP_ID');
		$CLOVER_ACCESS_TOKEN  = $CI->config->item('CLOVER_ACCESS_TOKEN');
		$CLOVER_MERCHANT_ID  = $CI->config->item('CLOVER_MERCHANT_ID');
		$CLOVER_DEVICE_ID  = $CI->config->item('CLOVER_DEVICE_ID');

		$curl = curl_init();	
		$digits = 4;	
		$rand_num = rand(pow(10, $digits-1), pow(10, $digits)-1);

		if($amount != 0)
			$amount = $amount * 100;

		$post_array = array(
			"amount" 			=> $amount,
			"final"				=> "true",			
			"externalPaymentId" => "38-868-856-".$rand_num
		);
		$post_json =json_encode($post_array);

		$Idempotency_Key = $this->gen_uuid();
 
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $CLOVER_APP_URL.'/connect/v1/payments',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    'X-Clover-Device-Id: '.$CLOVER_DEVICE_ID,
		    'x-clover-merchant-id: '.$CLOVER_MERCHANT_ID,
		    'X-POS-ID: AtozPOS',
		    'Idempotency-Key: '.$Idempotency_Key,
		    'Authorization: Bearer '.$CLOVER_ACCESS_TOKEN,
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		
		/*$response = '{"issues":{"signature":{}},"payment":{"amount":100,"cardTransaction":{"authCode":"510994","cardType":"MC","cardholderName":"BIN-2 PRODUCTION CARD","entryType":"EMV_CONTACT","extra":{"applicationLabel":"4D415354455243415244","authorizingNetworkName":"MASTERCARD","cvmResult":"SIGNATURE","applicationIdentifier":"A0000000041010"},"first6":"222635","last4":"7649","referenceId":"129900500010","state":"CLOSED","token":"1055252959867649","transactionNo":"000002","type":"AUTH","vaultedCard":{"cardholderName":"BIN-2 PRODUCTION CARD","expirationDate":"0224","first6":"222635","last4":"7649","token":"1055252959867649"}},"createdTime":1635266533283,"employee":{"id":"WNYXFX3X6TMCA"},"externalPaymentId":"38-868-856-1200","id":"FAED1FRT4DSJ4","offline":false,"order":{"id":"DVM95RESZB9VT"},"result":"SUCCESS","taxAmount":0,"tipAmount":0}}';*/

		curl_close($curl);
		$response_decode = json_decode($response);
		$response_decode->clover_request = $post_json;
		return $response_decode;
	}

	// Clover Status API
	public function cloverStatus() {

		$CI =& get_instance();
		$CLOVER_APP_URL = $CI->config->item('CLOVER_APP_URL');		
		$CLOVER_APP_SECRET  = $CI->config->item('CLOVER_APP_SECRET');
		$CLOVER_APP_ID  = $CI->config->item('CLOVER_APP_ID');
		$CLOVER_ACCESS_TOKEN  = $CI->config->item('CLOVER_ACCESS_TOKEN');
		$CLOVER_MERCHANT_ID  = $CI->config->item('CLOVER_MERCHANT_ID');
		$CLOVER_DEVICE_ID  = $CI->config->item('CLOVER_DEVICE_ID');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $CLOVER_APP_URL.'/connect/v1/device/ping',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  
		  CURLOPT_POSTFIELDS =>'{
		  "beep": true,
		  "text": "Wellcome To Campus Liquor !!"
			}',

		  CURLOPT_HTTPHEADER => array(
		  	'X-Clover-Device-Id: '.$CLOVER_DEVICE_ID,
		  	'X-POS-ID: AtozPOS',		    
		    'Content-Type: application/json',
		    'Authorization: Bearer '.$CLOVER_ACCESS_TOKEN
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}


	// Clover Cancel transaction API
	public function cloverCancelTransaction() {

		$CI =& get_instance();
		$CLOVER_APP_URL = $CI->config->item('CLOVER_APP_URL');		
		$CLOVER_APP_SECRET  = $CI->config->item('CLOVER_APP_SECRET');
		$CLOVER_APP_ID  = $CI->config->item('CLOVER_APP_ID');
		$CLOVER_ACCESS_TOKEN  = $CI->config->item('CLOVER_ACCESS_TOKEN');
		$CLOVER_MERCHANT_ID  = $CI->config->item('CLOVER_MERCHANT_ID');
		$CLOVER_DEVICE_ID  = $CI->config->item('CLOVER_DEVICE_ID');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $CLOVER_APP_URL.'/connect/v1/device/cancel',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
	  	  CURLOPT_POSTFIELDS =>'{}',
		  CURLOPT_HTTPHEADER => array(
		  	'X-Clover-Device-Id: '.$CLOVER_DEVICE_ID,
		  	'X-POS-ID: AtozPOS',		    
		    'Content-Type: application/json',
		    'Authorization: Bearer '.$CLOVER_ACCESS_TOKEN
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}
	// Clover Thankyou API
	public function cloverThankyou() {

		$CI =& get_instance();
		$CLOVER_APP_URL = $CI->config->item('CLOVER_APP_URL');		
		$CLOVER_APP_SECRET  = $CI->config->item('CLOVER_APP_SECRET');
		$CLOVER_APP_ID  = $CI->config->item('CLOVER_APP_ID');
		$CLOVER_ACCESS_TOKEN  = $CI->config->item('CLOVER_ACCESS_TOKEN');
		$CLOVER_MERCHANT_ID  = $CI->config->item('CLOVER_MERCHANT_ID');
		$CLOVER_DEVICE_ID  = $CI->config->item('CLOVER_DEVICE_ID');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $CLOVER_APP_URL.'/connect/v1/device/thank-you',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
	  	  CURLOPT_POSTFIELDS =>'{}',
		  CURLOPT_HTTPHEADER => array(
		  	'X-Clover-Device-Id: '.$CLOVER_DEVICE_ID,
		  	'X-POS-ID: AtozPOS',		    
		    'Content-Type: application/json',
		    'Authorization: Bearer '.$CLOVER_ACCESS_TOKEN
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	// Clover Wellcome API
	public function cloverWellcome() {

		$CI =& get_instance();
		$CLOVER_APP_URL = $CI->config->item('CLOVER_APP_URL');		
		$CLOVER_APP_SECRET  = $CI->config->item('CLOVER_APP_SECRET');
		$CLOVER_APP_ID  = $CI->config->item('CLOVER_APP_ID');
		$CLOVER_ACCESS_TOKEN  = $CI->config->item('CLOVER_ACCESS_TOKEN');
		$CLOVER_MERCHANT_ID  = $CI->config->item('CLOVER_MERCHANT_ID');
		$CLOVER_DEVICE_ID  = $CI->config->item('CLOVER_DEVICE_ID');

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $CLOVER_APP_URL.'/connect/v1/device/welcome',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
	  	  CURLOPT_POSTFIELDS =>'{}',
		  CURLOPT_HTTPHEADER => array(
		  	'X-Clover-Device-Id: '.$CLOVER_DEVICE_ID,
		  	'X-POS-ID: AtozPOS',		    
		    'Content-Type: application/json',
		    'Authorization: Bearer '.$CLOVER_ACCESS_TOKEN
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return json_decode($response);
	}

	/////--refund--////////////

	// Clover Refund API 
	public function cloverrefund($amount=0,$paymentid=0,$fullRefund=false){

		$CI =& get_instance();
		$CLOVER_APP_URL = $CI->config->item('CLOVER_APP_URL');		
		$CLOVER_APP_SECRET  = $CI->config->item('CLOVER_APP_SECRET');
		$CLOVER_APP_ID  = $CI->config->item('CLOVER_APP_ID');
		$CLOVER_ACCESS_TOKEN  = $CI->config->item('CLOVER_ACCESS_TOKEN');
		$CLOVER_MERCHANT_ID  = $CI->config->item('CLOVER_MERCHANT_ID');
		$CLOVER_DEVICE_ID  = $CI->config->item('CLOVER_DEVICE_ID');

		$curl = curl_init();	
		$digits = 4;	
		$rand_num = rand(pow(10, $digits-1), pow(10, $digits)-1);

		if($amount != 0)
			$amount = $amount * 100;

		$post_array = array(
			"amount" 			=> $amount,
			"fullRefund"		=> $fullRefund,		
		);

		$post_json =json_encode($post_array);

		$Idempotency_Key = $this->gen_uuid();
 
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $CLOVER_APP_URL.'/connect/v1/payments/'.$paymentid.'/refunds',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    'X-Clover-Device-Id: '.$CLOVER_DEVICE_ID,
		    'x-clover-merchant-id: '.$CLOVER_MERCHANT_ID,
		    'X-POS-ID: AtozPOS',
		    'Idempotency-Key: '.$Idempotency_Key,
		    'Authorization: Bearer '.$CLOVER_ACCESS_TOKEN,
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		
		/*$response = '{
			    "payment": {
			        "amount": 500,
			        "cardTransaction": {
			            "authCode": "741186",
			            "captured": false,
			            "cardType": "MC",
			            "cardholderName": "BIN-2 PRODUCTION CARD",
			            "currency": "usd",
			            "entryType": "EMV_CONTACT",
			            "extra": {
			                "applicationLabel": "4D415354455243415244",
			                "common": "{\"LocalDateTime\":\"20211110062122\",\"POSEntryMode\":\"051\",\"POSID\":\"2731\",\"MerchID\":\"RCTST0000008099\",\"TermEntryCapablt\":\"12\",\"CardCaptCap\":\"1\",\"STAN\":\"500085\",\"POSCondCode\":\"00\",\"TermLocInd\":\"0\",\"TermID\":\"00000001\",\"TrnmsnDateTime\":\"20211110062122\",\"TermCatCode\":\"12\"}",
			                "func": "CREDIT",
			                "authorizingNetworkName": "MASTERCARD",
			                "athNtwkId": "03",
			                "exp": "202402",
			                "cvmResult": "SIGNATURE",
			                "applicationIdentifier": "A0000000041010",
			                "card": "{\"BanknetData\":\"1110MCC960517\"}",
			                "tkntype": "1174"
			            },
			            "first6": "222635",
			            "last4": "1036",
			            "referenceId": "131400500085",
			            "state": "CLOSED",
			            "transactionNo": "000017",
			            "type": "AUTH"
			        },
			        "cashbackAmount": 0,
			        "createdTime": 1636525282000,
			        "device": {
			            "id": "a0a964d0-8c31-c641-2504-f08d4b7d31bb"
			        },
			        "employee": {
			            "id": "WNYXFX3X6TMCA"
			        },
			        "externalPaymentId": "314000102",
			        "id": "392YZ09S5J2QA",
			        "modifiedTime": 1636525283000,
			        "offline": false,
			        "order": {
			            "id": "FC0CHS57ZPRRG"
			        },
			        "result": "SUCCESS",
			        "taxAmount": 0,
			        "tipAmount": 0
			    },
			    "paymentId": "392YZ09S5J2QA",
			    "refund": {
			        "amount": 500,
			        "createdTime": 1636527318850,
			        "device": {
			            "id": "a0a964d0-8c31-c641-2504-f08d4b7d31bb"
			        },
			        "employee": {
			            "id": "WNYXFX3X6TMCA"
			        },
			        "id": "M2S6Y09R84G8M",
			        "payment": {
			            "id": "392YZ09S5J2QA"
			        },
			        "taxAmount": 0
			    }
			}';*/

		curl_close($curl);
		$response_decode = json_decode($response);
		$response_decode->clover_request = $post_json;
		return $response_decode;
	}

	// Clover Void API 
	public function clovervoid($amount=0,$paymentid=0,$fullRefund=false){

		$CI =& get_instance();
		$CLOVER_APP_URL = $CI->config->item('CLOVER_APP_URL');		
		$CLOVER_APP_SECRET  = $CI->config->item('CLOVER_APP_SECRET');
		$CLOVER_APP_ID  = $CI->config->item('CLOVER_APP_ID');
		$CLOVER_ACCESS_TOKEN  = $CI->config->item('CLOVER_ACCESS_TOKEN');
		$CLOVER_MERCHANT_ID  = $CI->config->item('CLOVER_MERCHANT_ID');
		$CLOVER_DEVICE_ID  = $CI->config->item('CLOVER_DEVICE_ID');

		$curl = curl_init();	
		$digits = 4;	
		$rand_num = rand(pow(10, $digits-1), pow(10, $digits)-1);

		if($amount != 0)
			$amount = $amount * 100;

		$post_array = array(
			"voidReason" 			=> 'USER_CANCEL',
		);

		$post_json =json_encode($post_array);

		$Idempotency_Key = $this->gen_uuid();
 
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $CLOVER_APP_URL.'/connect/v1/payments/'.$paymentid.'/void',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => $post_json,
		  CURLOPT_HTTPHEADER => array(
		    'X-Clover-Device-Id: '.$CLOVER_DEVICE_ID,
		    'x-clover-merchant-id: '.$CLOVER_MERCHANT_ID,
		    'X-POS-ID: AtozPOS',
		    'Idempotency-Key: '.$Idempotency_Key,
		    'Authorization: Bearer '.$CLOVER_ACCESS_TOKEN,
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		
		/*$response = '{
		    "payment": {
		        "amount": 5000,
		        "cardTransaction": {
		            "authCode": "735265",
		            "captured": false,
		            "cardType": "MC",
		            "cardholderName": "BIN-2 PRODUCTION CARD",
		            "currency": "usd",
		            "entryType": "EMV_CONTACT",
		            "extra": {
		                "applicationLabel": "4D415354455243415244",
		                "common": "{\"LocalDateTime\":\"20211110061908\",\"POSEntryMode\":\"051\",\"POSID\":\"2731\",\"MerchID\":\"RCTST0000008099\",\"TermEntryCapablt\":\"12\",\"CardCaptCap\":\"1\",\"STAN\":\"500080\",\"POSCondCode\":\"00\",\"TermLocInd\":\"0\",\"TermID\":\"00000001\",\"TrnmsnDateTime\":\"20211110061908\",\"TermCatCode\":\"12\"}",
		                "func": "CREDIT",
		                "authorizingNetworkName": "MASTERCARD",
		                "athNtwkId": "03",
		                "exp": "202402",
		                "cvmResult": "SIGNATURE",
		                "applicationIdentifier": "A0000000041010",
		                "card": "{\"BanknetData\":\"1110MCC960482\"}",
		                "tkntype": "1174"
		            },
		            "first6": "222635",
		            "last4": "1036",
		            "referenceId": "131400500080",
		            "state": "CLOSED",
		            "transactionNo": "000016",
		            "type": "AUTH"
		        },
		        "cashbackAmount": 0,
		        "createdTime": 1636525144000,
		        "device": {
		            "id": "a0a964d0-8c31-c641-2504-f08d4b7d31bb"
		        },
		        "employee": {
		            "id": "WNYXFX3X6TMCA"
		        },
		        "externalPaymentId": "314000101",
		        "id": "AE8QRY2GNV8FT",
		        "modifiedTime": 1636525150000,
		        "offline": false,
		        "order": {
		            "id": "8YKZHBPTW2204"
		        },
		        "result": "SUCCESS",
		        "taxAmount": 0,
		        "tipAmount": 0
		    },
		    "paymentId": "AE8QRY2GNV8FT",
		    "voidReason": "USER_CANCEL",
		    "voidStatus": "SENT_TO_SERVER"
		}';*/

		curl_close($curl);
		$response_decode = json_decode($response);
		$response_decode->clover_request = $post_json;
		return $response_decode;
	}

	function gen_uuid() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		// 32 bits for "time_low"
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),


		// 16 bits for "time_mid"
		mt_rand( 0, 0xffff ),



		// 16 bits for "time_hi_and_version",
		// four most significant bits holds version number 4
		mt_rand( 0, 0x0fff ) | 0x4000,



		// 16 bits, 8 bits for "clk_seq_hi_res",
		// 8 bits for "clk_seq_low",
		// two most significant bits holds zero and one for variant DCE1.1
		mt_rand( 0, 0x3fff ) | 0x8000,



		// 48 bits for "node"
		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}
}
?>