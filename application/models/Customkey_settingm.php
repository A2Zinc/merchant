<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customkey_settingm extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	//Retrieve custom key setting edit data
	public function retrieve_setting_editdata()
	{

		$this->db->select('*');
		$this->db->from('custom_key_settings');
		//$this->db->where('setting_id',1);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	public function addcustomkey_name($customkeyid,$customkey_name,$custom_price_value,$tax)
	{
		try{
            $this->db->select('*');
            $this->db->from('custom_key_settings');
            $this->db->where('customkey_id',$customkeyid);
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $this->db->where('customkey_id',$customkeyid);
                $this->db->update('custom_key_settings',array('customkey_name'=>$customkey_name,'customkey_value'=>$custom_price_value,'is_taxable'=>$tax));
                
            }else{
                $this->db->insert('custom_key_settings',array('customkey_name'=>$customkey_name,'customkey_value'=>$custom_price_value,'is_taxable'=>$tax));
                

            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

	}

	public function removecustomkey_name($customkeyid)
	{
		try{
            $this->db->select('*');
            $this->db->from('custom_key_settings');
            $this->db->where('customkey_id',$customkeyid);
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $this->db->where('customkey_id',$customkeyid);
                $this->db->update('custom_key_settings',array('customkey_name'=>'','customkey_value'=>'','is_taxable'=>0));
                
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

	}
	
	
}	