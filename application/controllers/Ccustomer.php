<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ccustomer extends CI_Controller {

	function __construct() {
      	parent::__construct();
		$this->load->library('lcustomer');
		$this->load->library("pagination");
		$this->load->model('Customers');
    	$this->load->library('super_auth');
        if($this->super_auth->is_logged()===false){
            redirect('/');
        }
    }

    public function index()
	{
		$data['title'] = "Add Customer";
		$data['country'] = $this->Customers->fetchCountry();
		$content = $this->parser->parse('customer/edit_customer_view',$data,true);
		$this->template->full_admin_html_view($content);
	}	


	//customer_search_item
	public function customer_search_item()
	{
		$customer_id = $this->input->post('customer_id');			
		$content = $this->lcustomer->customer_search_item($customer_id);
		$this->template->full_admin_html_view($content);
	}

	//Manage customer
	public function manage_customer1()
	{
		$data['title'] = "All Customers";
        $data['customers'] = $this->Customers->customer_list();

		$content = $this->parser->parse('Ccustomer/manage_customer',$data,true);
		$this->template->full_admin_html_view($content);
	   
	// 


	//Insert Product and upload
	// public function insert_customer()
	// {
	// 	$customer_id=$this->auth->generator(15);

	//   	//Customer  basic information adding.
	// 	$data=array(
	// 		'customer_id' 		=> $customer_id,
	// 		'customer_name' 	=> $this->input->post('customer_name'),
	// 		'customer_mobile' 	=> $this->input->post('mobile'),
	// 		'customer_email' 	=> $this->input->post('email'),
	// 		'customer_short_address' => $this->input->post('address'),
	// 		'customer_address_1' => $this->input->post('customer_address_1'),
	// 		'customer_address_2' => $this->input->post('customer_address_2'),
	// 		'city' 				=> $this->input->post('city'),
	// 		'state' 			=> $this->input->post('state'),
	// 		'country' 			=> $this->input->post('country'),
	// 		'zip' 				=> $this->input->post('zip'),
	// 		'status' 			=> 1
	// 		);

	// 	$result=$this->Customers->customer_entry($data);
		
	// 	if ($result == TRUE) {		
	// 		$this->session->set_userdata(array('message'=>display('successfully_added')));
	// 		if(isset($_POST['add-customer'])){
	// 			redirect(base_url('Ccustomer/manage_customer'));
	// 			exit;
	// 		}elseif(isset($_POST['add-customer-another'])){
	// 			redirect(base_url('Ccustomer'));
	// 			exit;
	// 		}
	// 	}else{
	// 		$this->session->set_userdata(array('error_message'=>display('already_exists')));
	// 		redirect(base_url('Ccustomer'));
	// 	}
	}

	//customer Update Form
	
	 public function edit_customer()
    {
    	$data['title'] = "Update Customer";
    	
		$data['country'] = $this->Customers->fetchCountry();


		$data['customerdata'] = $this->Customers->retrieve_customer_editdata($this->input->get('customerid'));
		//print_r($data['customerdata']['country'] );exit;
		if($data['customerdata'])
			$data['states'] = $this->Customers->fetchStatebyCountry($data['customerdata']['country']);
		else
			$data['states'] = '';

		$content = $this->parser->parse('customer/edit_customer_view',$data,true);
		$this->template->full_admin_html_view($content);


   	}

	

	//Select city by country id
	public function select_city_country_id()
	{
		$country_id = $this->input->post('country_id');
		$states = $this->Customers->select_city_country_id($country_id);

		$html ="";
		if ($states) {
			$html .="<select class=\"form-control select2\" id=\"country\" name=\"country\" style=\"width: 100%\">
					<option value=\"\">".display('select_one')."</option>";
			foreach ($states as $state) {
            $html .="<option value='".$state->iso2."'>".$state->name."</option>";
			}
			$html .="</select>";
		}
		echo $html;
	}	

	//Credit Customer Form
	public function credit_customer()
	{
		$this->load->model('Customers');
		
		$content = $this->lcustomer->credit_customer_list();
		$this->template->full_admin_html_view($content);;
	}
	
	//Paid Customer list. The customer who will pay 100%.
	public function paid_customer()
	{
		$this->load->model('Customers');
		$content = $this->lcustomer->paid_customer_list();
		$this->template->full_admin_html_view($content);;
	}
			
	//Customer Ledger
	public function customer_ledger($customer_id)
	{	
		$content = $this->lcustomer->customer_ledger_data($customer_id);
		$this->template->full_admin_html_view($content);
	}

	//Customer Ledger Report
	public function customer_ledger_report()
	{	
		$customer_id = $this->input->post('customer_id');
		$content = $this->lcustomer->customer_ledger_report($customer_id);
		$this->template->full_admin_html_view($content);
	}
	
	//Customer Final Ledger
	public function customerledger($customer_id)
	{
		$content = $this->lcustomer->customerledger_data($customer_id);
		$this->template->full_admin_html_view($content);
	}	
	//Customer Previous Balance
	public function previous_balance_form()
	{	
		$content = $this->lcustomer->previous_balance_form();
		$this->template->full_admin_html_view($content);
	}

	// Delete Customer
	public function customer_delete()
	{	
		$this->load->model('Customers');
		$data = $this->Customers->delete_customer($this->input->post('customerid'));
		echo json_encode($data);
		$this->session->set_userdata(array('message'=>display('successfully_delete')));
        

		//redirect('Ccustomer/manage_customer');
	}

	//Display customers----------
	public function manage_customer()
	{
		$config = array();
		$data['title'] = "All Customer";
		       
       $config["base_url"] = base_url() . "Ccustomer/manage_customer";
       $config["total_rows"] = $this->Customers->count_customer();
       $config["per_page"] = 20;
       $config["uri_segment"] = 3;
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $data["customers"] = $this->Customers->
           customer_list($config["per_page"], $page);
       $data["links"] = $this->pagination->create_links();


        //$data['customers'] = $this->Customers->customer_list();

		
		$content = $this->parser->parse('customer/customer',$data,true);
		$this->template->full_admin_html_view($content);
	}		

	

	//prashant code
	public function insert_customer()
	{
		
		$customer_id=$this->auth->generator(15);
		$is_active = $this->input->post('is_active');
		if($is_active == ''){
			$is_active = 0;
		}else{
			$is_active = 1;
		}
	  	//Customer  basic information adding.
		$data=array(
			'customer_id' 		=> $customer_id,
			'customer_name' 	=> $this->input->post('first_name').' '.$this->input->post('last_name'),
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'customer_mobile' 	=> $this->input->post('phone_no'),
			'customer_email' 	=> $this->input->post('email'),
			'customer_address_1' => $this->input->post('address_1'),
			'customer_address_2' => $this->input->post('address_2'),
			'country' 			=> $this->input->post('country'),
			'state' 			=> $this->input->post('state'),
			'city' 				=> $this->input->post('city'),
			'zip' 				=> $this->input->post('zipcode'),
			'status' 			=> 1,
			'is_active' 		=> $is_active,
			'added_on' 			=> date('Y/m/d H:i:s'),
			);

		$data = $this->security->xss_clean($data);
		$result=$this->Customers->customer_add($data);
		if ($result) {		
			$this->session->set_flashdata('success', "Customer is Successfully Inserted");
			redirect(base_url('Ccustomer'));
			exit;
		}else{
			$this->session->set_flashdata('error', "Something went Wrong");
			redirect(base_url('Ccustomer'));
		}
	}

	// customer Update
	public function update_customer()
	{
		
		$customer_id  = $this->input->post('customer_id');
		$is_active = $this->input->post('is_active');
		if($is_active == ''){
			$is_active = 0;
		}else{
			$is_active = 1;
		}

	  	//Customer  basic information updating.
		$data=array(
			'customer_name' 	=> $this->input->post('first_name').' '.$this->input->post('last_name'),
			'first_name' 		=> $this->input->post('first_name'),
			'last_name' 		=> $this->input->post('last_name'),
			'customer_mobile' 	=> $this->input->post('phone_no'),
			'customer_email' 	=> $this->input->post('email'),
			'customer_address_1' => $this->input->post('address_1'),
			'customer_address_2' => $this->input->post('address_2'),
			'country' 			=> $this->input->post('country'),
			'state' 			=> $this->input->post('state'),
			'city' 				=> $this->input->post('city'),
			'zip' 				=> $this->input->post('zipcode'),
			'status' 			=> 1,
			'is_active' 		=> $is_active,
			);
		//echo $customer_id;print_r($data);exit;
		$result=$this->Customers->update_customer($data,$customer_id);

		if ($result) {		
			
			$this->session->set_flashdata('success', "Customer is Successfully Updated");
			redirect('Ccustomer/manage_customer');
			//exit;
		}else{
			$this->session->set_flashdata('error', "Something went Wrong");
			redirect(base_url('Ccustomer/manage_customer/'));
		}

		
	}

	public function fetchState(){
        $countryId = $this->input->post('country_id');
        // echo '<pre>';print_r($countryId);exit;
        if($countryId){
            echo $this->Customers->fetchState($countryId);
        }
        
    }

    public function check_phno(){
        $data = $this->Customers->isPhoneExist($this->input->post('phno'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function check_email(){
        $data = $this->Customers->isEmailExist($this->input->post('email'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }
}