<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_auth {
	//Login....
	public function login($username,$password)
	{
		$CI =& get_instance();

		$fullpassword = md5($password);
        $CI->db->where(array('username'=>$username,'password'=>$fullpassword));
		$query = $CI->db->get('user_login');
		$result =  $query->result_array();
		
		if (count($result) == 1)
		{
			$user_id = $result[0]['user_id'];
			
			$CI->db->select('*');
			$CI->db->from('user_login ');
			$CI->db->where('user_id',$user_id);
			$query = $CI->db->get();
			$user_data=$query->result_array();
          	$CI->session->set_userdata($user_data[0]);
           	return True;
		}else{
			return FALSE;
        }
	}
	public function merchant_login_by_id($merchant_id)
	{
		$CI =& get_instance();

	    $CI->db->where(['merchant_id'=>$merchant_id]);
		$query = $CI->db->get('user_login');
		$result =  $query->result_array();
		
		if (count($result) == 1)
		{
			$user_id = $result[0]['user_id'];
			
			$CI->db->select('*');
			$CI->db->from('user_login ');
			$CI->db->where('user_id',$user_id);
			$query = $CI->db->get();
			$user_data=$query->result_array();
          	$CI->session->set_userdata($user_data[0]);
           	return True;
		}else{
			return FALSE;
        }
	}

	
	//Check if is logged....
	public function is_logged()
	{
		$CI =& get_instance();

        if($CI->session->userdata('user_id')!='')
		{
			return true;
		}
		return false;
	}
	//Logout....
	public function logout()
	{
		$CI =& get_instance();
		$user_data = array(
				'sid_web','user_id' ,'user_type','user_name'
			);
        $CI->session->session_destroy();
		return true;
	}

	//Check for logged in user is Admin or not.
	public function is_merchant()
	{
		$CI =& get_instance();
        if ($CI->session->userdata('user_type')== 1 || $CI->session->userdata('user_type')== 2 )
		{
			return true;
		}
		return false;
	}	

	//Check for logged in user is Admin or not.
	public function is_super_admin()
	{
		$CI =& get_instance();
        if ($CI->session->userdata('user_type') == 4)
		{
			return true;
		}
		return false;
	}
	

	
	//This function is used to Generate Key
	public function generator($lenth)
	{
		$number=array("A","B","C","D","E","F","G","H","I","J","K","L","N","M","O","P","Q","R","S","U","V","T","W","X","Y","Z","1","2","3","4","5","6","7","8","9","0");
	
		for($i=0; $i<$lenth; $i++)
		{
			$rand_value=rand(0,34);
			$rand_number=$number["$rand_value"];
		
			if(empty($con))
			{ 
			$con=$rand_number;
			}
			else
			{
			$con="$con"."$rand_number";}
		}
		return $con;
	}

}
?>