<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';

class Merchant_license extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper("security");
 
		$this->load->model('Soft_settings');
		$this->load->model('Merchant_model','merchant');
		$this->load->model('Gen_settingm');
	}
    //Default index page loading


	public function activation_post(){
		$response=false;
		$error=[];
		$data=[];
		$license_key=$this->input->post('license_key');
		$mac_address=$this->input->post('mac_address');
		$merchante_details=$this->merchant->get($license_key);
		if($merchante_details!==false){
			if($merchante_details->no_of_terminal>$this->merchant->count_terminals($license_key)){
				$this->merchant->insert_terminal(['mac_address' => $mac_address,'merchant_id' => $license_key]);
				$data=$merchante_details;	
				$response=true;
			} else{
				$error[]="terminals not available";
			}
		} else{
				$error[]="invalid license key";
		}
		 $this->response(array(
                   "status" => $response,
                   "data" => $data,
                   "error" => $error
                ), REST_Controller::HTTP_OK);
	}
}