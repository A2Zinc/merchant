<?php 
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();	
		$this->load->library('super_auth');
        $this->load->model('Stores');
        

	} 
	public function index()
	{
	
		$this->load->library('super_auth');
	    if($this->super_auth->is_logged()){
	        redirect('/Admin_dashboard');
	    }
		$data['stores']=$this->Stores->store_list(['filter_merchant_id' =>0]);
		$data['title'] = "Admin Login Area";
		$this->load->view('user/login_form',$data);
	}

	public function merchant_login()
	{

		$data['title'] = "Super Admin Login Area";
		$this->load->view('user/login_form');
		
	}

	public function switch_to_store()
	{
		$merchant_id=$this->session->userdata('merchant_id');
		#NEED TO ADD AUTHORIY
		$store_id=$this->input->get('store');
		$store=$this->Stores->store_select($store_id);
		$this->session->set_userdata(['s_store_id'=>$store[0]->store_id]);
		$this->session->set_userdata(['user_db_session'=>$store[0]->store_db]);
		$this->session->set_userdata(['s_store_name'=>$store[0]->store_name]);
		redirect('Admin_dashboard');

	}
	public function switchback(){
		$error = '';
		$merchant_id = $this->input->get('merchant_id');
		$this->super_auth->merchant_login_by_id($merchant_id);
		$this->session->set_userdata('user_db_session','super_admin');
		if($data===False){
			redirect('adminlogin');
		} else{
			redirect('merchant/dashboard');
		}		
	}
	public function merchant_do_login()
	{

		$error = '';
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$response=$this->super_auth->login($username, $password);
		if($response===False){
			redirect('adminlogin');
		} else{
			$this->session->set_userdata(['s_store_id'=>55]);
			$this->session->set_userdata(['s_store_name'=>'	Merchant store second']);
			$this->session->set_userdata('user_db_session','lwtPOS');	
			if($this->session->userdata('user_type')=='1'){
		        redirect('Merchant_dashboard');
	    	} else{
	    		redirect('Admin_dashboard');

	    	}

		}
	}

	public function logout()
	{	
		$CI =& get_instance();
		$user_data = array(
				'sid_web','user_id' ,'user_type','user_name'
			);
        $CI->session->sess_destroy();
		redirect('adminlogin');
	}

}