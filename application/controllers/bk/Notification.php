<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notification extends CI_Controller {

	function __construct() {
      	parent::__construct();
		$this->auth->check_admin_auth();
    }

    public function index()
    {
    	$data['title'] = "Notification";
		$content = $this->parser->parse('notification/notification',$data,true);
		$this->template->full_admin_html_view($content);
    }
}    