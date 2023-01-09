<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Template {

	//Admin Html View....
	public function full_admin_html_view($content){
		$CI =& get_instance();
		$logged_info='';

		// if ($CI->auth->is_admin())
		// {
		// 	$log_info = array(
		// 			'email'  => $CI->session->userdata('user_name'),
		// 			'logout' => base_url('Admin_dashboard/logout')
		// 		);
		// 	$logged_info = $CI->parser->parse('include/admin_header',$log_info,true);
		// }
		$CI->load->model('Products');
		$company_info=[];
		$data = array (
				'logindata' 	=> $logged_info,
				'content' 		=> $content,
				'company_info' 	=> $company_info
			);

		echo $content = $CI->parser->parse('admin_html_template',$data);
	echo "dasds";
		
	}
	public function full_super_admin_html_view($content){

		$CI =& get_instance();
		$logged_info='';
		$CI->load->model('Products');
		$company_info=$CI->Products->retrieve_company();
		$data = array (
				'logindata' 	=> $logged_info,
				'content' 		=> $content,
				'company_info' 	=> $company_info,
				'super_admin'	=> 1,
			);
		$content = $CI->parser->parse('admin_html_template',$data);
	}


	//Website Html View....
	public function full_website_html_view($content){

		$CI =& get_instance();
		$CI->load->model('Products');
        $CI->load->model('Themes');
        $theme = $CI->Themes->get_theme();
		$company_info=$CI->Products->retrieve_company();
		$data = array (
				'content' 		=> $content,
				'company_info' 	=> $company_info
			);
		$content = $CI->parser->parse('website/themes/'.$theme.'/website_html_template',$data);
	}

	//Customers Html View....
	public function full_customers_html_view($data){
		$CI =& get_instance();
		$CI->parser->parse('customers/include/header',$data);
    	$CI->parser->parse('customers/'.$data['file'],$data);
    	$CI->parser->parse('customers/include/footer',$data);
	}


	//Customer Html View....
	public function full_cashier_html_view($data){
		$CI =& get_instance();
		if($data['file']=='pos')
        	$CI->load->view('cashier/include/pos-header',$data);
    	else
    		$CI->load->view('cashier/include/header',$data);

        $CI->load->view('cashier/'.$data['file'],$data);

        if($data['file']=='pos')
        	$CI->load->view('cashier/include/pos-footer',$data);
        else
        	$CI->load->view('cashier/include/footer',$data);

	}

	public function full_report_html_view($data){
		$CI =& get_instance();

    	$CI->load->view('cashier/include/report-header',$data);

        $CI->load->view('cashier/'.$data['file'],$data);

        //$CI->load->view('cashier/include/footer',$data);

	}


	//Customer POS Receipt Html View....
	public function full_cashier_pos_rept_html_view($data) {
		$CI =& get_instance();
        $CI->parser->parse('cashier/pos_rcpt.php',$data);
    }

    public function full_cashier_pos_rept_view_html_view($data) {
		$CI =& get_instance();
        $CI->parser->parse('cashier/pos_rcpt_view.php',$data);
    }

    
    public function full_cashier_pos_return_rept_html_view($data) {
		$CI =& get_instance();
        $CI->parser->parse('cashier/reports/pos_return_rcpt.php',$data);
    }

     //Lables Print Html View....
	public function full_cashier_print_labels_html_view($data) {
				$CI =& get_instance();
        $CI->parser->parse('cashier/print_lables.php',$data);
  }

	public function full_cashier_print_special_labels_html_view($data) {
				$CI =& get_instance();
        $CI->parser->parse('cashier/print_special_lables.php',$data);
  }


}
