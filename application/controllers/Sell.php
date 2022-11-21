<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sell extends CI_Controller {
	
	function __construct() {
      	parent::__construct(); 
		$this->load->library('session');
		// $this->load->model('Posm');
        $this->load->library('super_auth');
        if($this->super_auth->is_logged()===false){
            redirect('/');
        }

    }
	#================Manage User===============#
	public function manage_pos()
	{
        $data['title'] = "All POS";
        // $data['users'] = $this->Userm->get_all_users();
        
		$content = $this->parser->parse('sell/pos_list',$data,true);
		$this->template->full_admin_html_view($content);
	}

	

}