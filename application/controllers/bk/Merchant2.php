<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Merchant2 extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('Soft_settings');
		$this->load->model('Merchant_model','merchant');
		$this->load->model('Stores','store');
		$this->load->model('Gen_settingm');
	}
    //Default index page loading


	public function index(){

		$getlogo = $this->Gen_settingm->get_logo_favicon();
        $logo_data = array( 'sitelogo' => $getlogo['logo'], 'sitefavicon' => $getlogo['favicon']);

        $this->session->set_userdata($logo_data);

		if (!$this->auth->is_logged() )
		{
			$this->output->set_header("Location: ".base_url().'admin', TRUE, 302);
		}

		$data = array(
			'title' 			=> display('merchant'),
			"merchants"			=> $this->merchant->get_all()

		);

		$content = $this->parser->parse('merchant/list',$data,true);
		$this->template->full_admin_html_view($content);
	}
	public function add(){

		$getlogo = $this->Gen_settingm->get_logo_favicon();
        $logo_data = array( 'sitelogo' => $getlogo['logo'], 'sitefavicon' => $getlogo['favicon']);

        $this->session->set_userdata($logo_data);

		if (!$this->auth->is_logged() )
		{
			$this->output->set_header("Location: ".base_url().'admin', TRUE, 302);
		}

		$data = array(
			'title' 			=> 'Add Merchant',
		);

		$content = $this->parser->parse('merchant/add',$data,true);
		$this->template->full_admin_html_view($content);
	}
	public function edit($merchant_id){

		$getlogo = $this->Gen_settingm->get_logo_favicon();
        $logo_data = array( 'sitelogo' => $getlogo['logo'], 'sitefavicon' => $getlogo['favicon']);

        $this->session->set_userdata($logo_data);

		if (!$this->auth->is_logged() )
		{
			$this->output->set_header("Location: ".base_url().'admin', TRUE, 302);
		}

		$data = array(
			'merchant'			=> $this->merchant->get($merchant_id),
			'terminals'			=> $this->merchant->get_terminals($merchant_id),
			'title' 			=> 'Edit Merchant',

		);

		$content = $this->parser->parse('merchant/add',$data,true);
		$this->template->full_admin_html_view($content);
	}
	public function save(){
		$this->form_validation->set_rules('merchant[name]', display('store_name'), 'trim|required');
        $this->form_validation->set_rules('merchant[address]', display('store_address'), 'trim|required');

        if ($this->form_validation->run() == FALSE) {
           echo json_encode("Fields are required");
        } 
        else {
			$merchant=$_POST['merchant'];
			$merchant_id=$this->merchant->insert($merchant);
			echo json_encode("success"); 
		}
	}
	public function update($merchant_id){
		$merchant=$_POST['merchant'];
		$add_terminals=$_POST['add_terminal'];
		$delete_terminals=$_POST['delete_terminal'];
		$edit_terminals=$_POST['edit_terminal'];
		$this->merchant->update($merchant,$merchant_id);
		// $this->merchant->insert_terminals($add_terminals,$merchant_id);
		// $this->merchant->update_terminals($edit_terminals);
		// $this->merchant->delete_terminals($delete_terminals);
		echo json_encode("success");

	}
	public function delete(){
		$merchant_id=$_POST['merchant_id'];
		$this->merchant->delete($merchant_id);
		echo json_encode("success");
	}

}