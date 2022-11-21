<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Clover extends CI_Controller
{
    public $start_date;
    public $end_date;
    public $current_terminal;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Clover_model');
        // $this->load->model('Cashier_model');
        // $this->load->model('Products');
        // $this->load->model('Gen_settingm');
        // $this->load->library('api/eplugin');
        // $this->load->library('cashier/cardtransaction');
        // $this->load->library('csv/simple_html_dom');
        // $this->current_terminal=trim(GetIP());
        $this->start_date = date("Y-m-d");
        $this->end_date = date("Y-m-d");
        //$this->data = $this->need_lib->lwt_permissions();
    }


    public function index()
    {
       //echo "Test";
    }

    

}
