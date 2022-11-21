<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$class= $this->router->fetch_class();
		$method= $this->router->fetch_method();
		
		// if($class=='Cashier' && ($method=='index')){
		// 	$status=$this->db->where('id', 1)->update('cron_status',['status'=> 1]);
		// 	$this->session->set_userdata('cronrun','1');
		// } else if( $method=='POSterminal' ||  $method=='inventory'||  $method=='store_settings'){
		// 	$status=$this->db->where('id', 1)->update('cron_status',['status'=> 0]);
		// }

//		echo  $this->session->userdata('cronrun');

	}

}