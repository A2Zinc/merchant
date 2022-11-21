<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rcpt_settingm extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	//Retrieve general setting edit data
	public function retrieve_setting_editdata()
	{

		$this->db->select('*');
		$this->db->from('receipt_setting');
		$this->db->where('setting_id',1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row_array();	
		}
		return false;
	}
	
		

	//Retrieve logo and favicon
	public function get_logo_favicon()
    {
        try{
            $this->db->select('logo,favicon');
            $this->db->from('web_setting');
            $this->db->where('setting_id',1);
            $query=$this->db->get();
           
            if($this->db->affected_rows() > 0){
                $story_array = $query->row_array();
                return $story_array;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    //Retrive paydate accordingly period
    public function get_payperiod($payid)
    {
    	try{
            $this->db->select('pay_date');
            $this->db->from('web_setting');
            $this->db->where('pay_period',$payid);
            $query=$this->db->get();
           
            if($this->db->affected_rows() > 0){
                $story_array = $query->row_array();
                return $story_array;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
	//Update setting
	public function update_setting($data)
	{
		try{
		$this->db->where('setting_id',1);
		$this->db->update('web_setting',$data);
		//$respnce['status'] = 'success';
        //$respnce['message'] = 'General Setting is Successfully Updated';
            //return $respnce;
		//echo $this->db->last_query();exit;
		return true;
		}catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
	}

	

	//Language
	public function languages()
	{ 
		if ($this->db->table_exists($this->table)) { 
			$fields = $this->db->field_data($this->table);
			$i = 1;
			foreach ($fields as $field)
			{  
				if ($i++ > 2)
					$result[$field->name] = ucfirst($field->name);
			}

			if (!empty($result)) return $result;
		}else {
			return false; 
		}
	}

	
}	