<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends MY_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    public function db(){
    	return $this->db;
    }
}