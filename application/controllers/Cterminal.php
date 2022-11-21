<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cterminal extends CI_Controller {

	function __construct() {
      	parent::__construct();
		$this->load->library('lterminal');
		$this->load->model('Terminals');
		$check_login=$this->load->library('super_auth');
        if($check_login===false){
            redirect('adminlogin');
        }
    }
	//Default loading for terminal system.
	public function index()
	{
		$content = $this->lterminal->terminal_add_form();
		$this->template->full_super_admin_html_view($content);
	}
	//Insert terminal
	public function insert_terminal()
	{

		$this->form_validation->set_rules('terminal_name', display('terminal_name'),'trim|required');
		$this->form_validation->set_rules('terminal_company', display('terminal_company'), 'trim|required');
		$this->form_validation->set_rules('terminal_bank_account', display('terminal_bank_account'), 'trim|required');
		$this->form_validation->set_rules('customer_care_phone_no', display('customer_care_phone_no'), 'trim|required');

		if ($this->form_validation->run() == FALSE)
        {
        	$data = array(
				'title' => display('add_terminal')
			);
        	$content = $this->parser->parse('terminal/add_terminal',$data,true);
			$this->template->full_super_admin_html_view($content);
        }
        else
        {
			$data=array(
				'pay_terminal_id' 			=> $this->auth->generator(15),
				'terminal_name' 			=> $this->input->post('terminal_name'),
				'terminal_provider_company' => $this->input->post('terminal_company'),
				'linked_bank_account_no' 	=> $this->input->post('terminal_bank_account'),
				'customer_care_phone_no' 	=> $this->input->post('customer_care_phone_no'),
				);

			$result=$this->Terminals->terminal_entry($data);

			if ($result == TRUE) {
					
				$this->session->set_userdata(array('message'=>display('successfully_added')));

				if(isset($_POST['add-terminal'])){
					redirect(base_url('Cterminal/manage_terminal'));
				}elseif(isset($_POST['add-terminal-another'])){
					redirect(base_url('Cterminal'));
				}

			}else{
				$this->session->set_userdata(array('error_message'=>display('already_inserted')));
				redirect(base_url('Cterminal'));
			}
        }
	}
	//Manage terminal
	public function manage_terminal()
	{
        $content =$this->lterminal->terminal_list();
		$this->template->full_admin_html_view($content);;
	}
	//terminal Update Form
	public function terminal_update_form($terminal_id)
	{	
		$content = $this->lterminal->terminal_edit_data($terminal_id);
		$this->menu=array('label'=> 'Edit terminal', 'url' => 'Ccustomer');
		$this->template->full_super_admin_html_view($content);
	}
	// terminal Update
	public function terminal_update($terminal_id=null)
	{

		$this->form_validation->set_rules('terminal_name', display('terminal_name'),'trim|required');
		$this->form_validation->set_rules('terminal_company', display('terminal_company'), 'trim|required');
		$this->form_validation->set_rules('terminal_bank_account', display('terminal_bank_account'), 'trim|required');
		$this->form_validation->set_rules('customer_care_phone_no', display('customer_care_phone_no'), 'trim|required');

		if ($this->form_validation->run() == FALSE)
        {
        	$data = array(
				'title' => display('manage_terminal')
			);
        	$content = $this->parser->parse('terminal/manage_terminal',$data,true);
			$this->template->full_super_admin_html_view($content);
        }
        else
        {

			$data=array(
				'terminal_name' 			=> $this->input->post('terminal_name'),
				'terminal_provider_company' => $this->input->post('terminal_company'),
				'linked_bank_account_no' 	=> $this->input->post('terminal_bank_account'),
				'customer_care_phone_no' 	=> $this->input->post('customer_care_phone_no'),
				);

			$result=$this->Terminals->update_terminal($data,$terminal_id);

			if ($result == TRUE) {
				$this->session->set_userdata(array('message'=>display('successfully_updated')));
				redirect('Cterminal/manage_terminal');
			}else{
				$this->session->set_userdata(array('message'=>display('successfully_updated')));
				redirect('Cterminal/manage_terminal');
			}
        }
	}
	// terminal Delete
	public function terminal_delete($terminal_id)
	{
		$this->Terminals->delete_terminal($terminal_id);
		$this->session->set_userdata(array('message'=>display('successfully_delete')));
		redirect('Cterminal/manage_terminal');
	}

	// Display store terminal
	public function manage_store_terminal() {

		$filter_merchant_id = !empty($this->input->get('merchant_id')) ? $this->input->get('merchant_id') : 0;
		$filter_store_id 	= !empty($this->input->get('store_id')) ? $this->input->get('store_id') : 0;

		$data_filter_arr 						= array();
		$data_filter_arr["filter_store_id"] 	= $filter_store_id;

		$config = array();
		$data['title'] = "All Terminal";
		       
       	$config["base_url"] = base_url() . "Cterminal/manage_store_terminal";
       	$config["total_rows"] = $this->Terminals->count_store_terminal($data_filter_arr);

       	$config["per_page"] = 20;
       	$config["uri_segment"] = 3;
       	$this->pagination->initialize($config);

       	$CI =& get_instance();
        $CI->load->model('Stores');
        
        $store_list 	= $CI->Stores->store_list();
        $merchant_list  = $CI->Stores->merchant_list();

        $data['store_list']  	 = $store_list;
        $data['merchant_list']   = $merchant_list;

       	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       	$data["terminals"] = $this->Terminals->store_terminal_list($config["per_page"], $page, $data_filter_arr);

       	$data["links"] = $this->pagination->create_links();

       	$data["filter_store_id"]    = $filter_store_id;

		$content = $this->parser->parse('store_terminal/list_terminal',$data,true);

		$this->template->full_super_admin_html_view($content);
	}

	public function edit_store_terminal() {

    	$data['title'] = "Update Terminal";
		$data['terminaldata'] = $this->Terminals->retrieve_store_terminal_editdata($this->input->get('terminalid'));
		$content = $this->parser->parse('store_terminal/edit_terminal',$data,true);
		$this->template->full_super_admin_html_view($content);
   	}

   	// store terminal Update
	public function update_store_terminal() {
		
		$terminalid  = $this->input->post('terminalid');
		$is_deleted = $this->input->post('is_deleted');
		if($is_deleted == ''){
			$is_deleted = 0;
		}else{
			$is_deleted = 1;
		}

	  	//Customer basic information updating.
		$data = array(
				'terminal_id' 		=> $this->input->post('terminal_id'),
				'mac_address' 		=> $this->input->post('mac_address'),
				'is_deleted' 		=> $is_deleted,
			);

		$result=$this->Terminals->update_store_terminal($data,$terminalid);

		if ($result) {
			$this->session->set_flashdata('success', "Terminal is successfully updated");
			redirect('Cterminal/manage_store_terminal');
		} else {
			$this->session->set_flashdata('error', "Something went Wrong");
			redirect(base_url('Cterminal/manage_store_terminal/'));
		}
	}

	// store terminal Delete
	public function delete_store_terminal() {
		$this->load->model('Terminals');
		$data = $this->Terminals->delete_store_terminal($this->input->post('terminalid'));
		echo json_encode($data);
		$this->session->set_userdata(array('message'=>display('successfully_delete')));
        

		//redirect('Ccustomer/manage_customer');
	}
}