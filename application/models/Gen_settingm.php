<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gen_settingm extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	//Retrieve general setting edit data
	public function retrieve_setting_editdata()
	{

		$this->db->select('*');
		$this->db->from('web_setting');
		$this->db->where('setting_id',1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		return false;
	}
	//Retrieve CRV value and size
	public function retrieve_CRVsetting_editdata()
	{

		$this->db->select('*');
		$this->db->from('tbl_crv');
		//$this->db->where('setting_id',1);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result_array();
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

	//Update setting
	public function update_CRV($value,$size)
	{

		try{
				$this->db->empty_table('tbl_crv');
				//echo count($value);exit;
				//print_r($value);
			if (is_array($value) || is_array($size))
			{
  				for ($i=0;$i<count($value);$i++)
  				{


			 		$data1 = array(
                   'crv_value' => $value[$i],
                   'crv_size' => $size[$i],
                );

           		$this->db->insert('tbl_crv', $data1);
           		//echo $this->db->last_query();exit;
           }
		}

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

	//prasant code
		public function get_customkey_data(){
		try{
			$this->db->select('*');
			$this->db->from('custom_key_settings');
			//$this->db->where('setting_id',1);
			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				return $query->result_array();
			}
			return false;
		}catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }


	}

	public function update_key_setting(){
        try{
        	$customkey_id = $this->input->post('customkey_id');
	        $array_name  = array(
	            'customkey_name'  => $this->input->post('customkey_name'),
	            'customkey_value' => $this->input->post('customkey_value'),
	            'is_taxable'      => (!empty($this->input->post('taxable'))) ? '1' : '0',
	        );
	        $data = $this->security->xss_clean($array_name);

            $this->db->select('*');
            $this->db->from('custom_key_settings');
            $this->db->where('customkey_id',$customkey_id);
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $this->db->where('customkey_id',$customkey_id);
                $this->db->update('custom_key_settings',$data);
                $responce = array(
                	'customkey_id' => $customkey_id,
                	'customkey_name' => $data['customkey_name'],
                	'customkey_value' => $data['customkey_value'],
                	'is_taxable' => $data['is_taxable'],
                	'status' => 'update',
            	);
                return $responce;
            }else{
                $this->db->insert('custom_key_settings',$data);
                $responce = array(
                	'status' => 'insert',
            	);
                return $responce;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function remove_custom_key(){
        try{
        		$customkey_id = $this->input->post('customkey_id');
						$this->db->set('customkey_name', null);
						$this->db->set('customkey_value', null);
						$this->db->set('is_taxable', 0);
            $this->db->where('customkey_id', $customkey_id);
            if($this->db->update('custom_key_settings')){
                $responce = array(
                    'customkey_id' => $customkey_id,
                    'customkey_name' => '',
                    'customkey_value' => '',
                    'is_taxable' => 0,
                    'status' => 'delete',
                );
                return $responce;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function existCustomKey($customkey_name,$customkey_id){
        try{
            $this->db->select('customkey_name');
            $this->db->from('custom_key_settings');
            $this->db->where('customkey_name',$customkey_name);
            $this->db->where('customkey_id !=',$customkey_id);

            $result= $this->db->get()->result();
            if($result){
                return TRUE;
            }else{
                return FALSE;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


}
