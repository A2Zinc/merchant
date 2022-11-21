<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('website/Lcabinet');
		$this->load->model('website/Categories');
    }

    //Default loading for Home Index.
    public function index()
    {
		$content = $this->lcabinet->about_page();
		$this->template->full_website_html_view($content);
    }
}