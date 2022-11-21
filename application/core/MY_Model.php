<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_Model extends CI_Model {

public function __construct()
	{

		parent::__construct();
		$dbname=$this->session->userdata('user_db_session');
		$dbconfig=$this->dbconfigs($dbname);
		$db2=$this->load->database($dbconfig,TRUE);
      	$this->db=$db2;		
	}
public function set_db($dbname=''){
        if($dbname==''){
            $dbname=$this->session->userdata('user_db_session');            
        }
        $dbconfig=$this->dbconfigs($dbname);
        $db2=$this->load->database($dbconfig,TRUE);
        $this->db=$db2;     
}    
	function dbconfigs($dname){
		$dbconfig = array(
            'dsn'   => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'database' => $dname,
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt'  => FALSE,
            'compress' => FALSE,
            'autoinit' => TRUE,//ci version 2.x
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
        );
        return $dbconfig;
	}
}