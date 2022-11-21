<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MY_Model {
	public function __construct()
	{
		parent::__construct();
	}
	//Check valid user
	function check_valid_user($username,$password)
	{
		$fullpassword = md5($password);
		//$fullpassword = md5("gef".$password);
        $this->db->where(array('username'=>$username,'password'=>$fullpassword,'status'=>1));
		$query = $this->db->get('user_login');
		$result =  $query->result_array();
		
		if (count($result) == 1)
		{
			$user_id = $result[0]['user_id'];
			
			$this->db->select('a.*,b.*');
			$this->db->from('user_login a');
			$this->db->join('users b','b.user_id = a.user_id');
			$this->db->where('a.user_id',$user_id);
			$query = $this->db->get();
			return $query->result_array();
		}
		return false;
	}
	function check_valid_user_by_store($username)
		{


	        $this->db->where(array('username'=>$username,'status'=>1));
			$query = $this->db->get('user_login');
			$result =  $query->result_array();
			
			if (count($result) == 1)
			{
				$user_id = $result[0]['user_id'];
				
				$this->db->select('a.*,b.*');
				$this->db->from('user_login a');
				$this->db->join('users b','b.user_id = a.user_id');
				$this->db->where('a.user_id',$user_id);
				$query = $this->db->get();
				return $query->result_array();
			}
			return false;
		}

	// Get module Rights
	function get_module_rights($roleid)
	{
			//$moduledata = array();
			$this->db->select('role_permission.*,roles.role_name,user_modules.Module_name');
			$this->db->from('role_permission');
			$this->db->join('roles','roles.id=role_permission.Role_id','LEFT');
			$this->db->join('user_modules','user_modules.id=role_permission.Module_id','LEFT');
			if($roleid != '1')
				$this->db->where('roles.id',$roleid);
			else
				$this->db->where('role_permission.Role_id','1');
			$this->db->where('role_permission.None_rights','0');
			//echo $this->db->last_query();exit;
			$query = $this->db->get();
			foreach($query->result_array() as $result)
			{
				$module_data[] = array(
				'module_id'  => $result['Module_id'],
				'module_name' =>$result['Module_name'] ,
				'module_rights' => array('None_rights'=>$result['None_rights'],
                        'Read_rights'=>$result['Read_rights'],
                        'Write_rights'=>$result['Write_rights'],
                        'Edit_rights'=>$result['Edit_rights'],
                        'Delete_rights'=>$result['Delete_rights'],
                        'Admin_rights'=>$result['Admin_rights'])
				);
			}
			//echo $roleid;
			//print_r($result);
			//print_r($module_data);
			//exit;
			return $module_data;

	}
	/*
	**User registration
	*/
	public function user_registration()
	{
		$birth_day 	 = $this->input->post('birth_day');
		$birth_month = $this->input->post('birth_month');
		$birth_year  = $this->input->post('birth_year');
		$dbo         = $birth_year.'-'.$birth_month.'-'.$birth_day;
	
		$data1=array(
			'user_id'			=>	null,
			'first_name'		=>	$this->input->post('first_name'),
			'last_name'			=>	$this->input->post('last_name'),
			'gender'			=>	$this->input->post('user_sex'),
			'date_of_birth'		=>	$dbo ,
			'status'			=>	1
			);
		$this->db->insert('users',$data1);
        $insert_id = $this->db->insert_id();
		//Inset user Login table 
		
		$password = $this->input->post('password');
		$password = md5("ctgs".$password);
		
		$data = array(
			'user_id'			=>	1,//$insert_id ,
			'username'			=>	$this->input->post('username'),
			'password'		    =>	$password,
			'user_type'			=>	2,
			'security_code'		=>  '',
			'status'			=>	0
			);
		$this->db->insert('user_login',$data);
	}
	public function profile_edit_data()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->select('a.*,b.username');
		$this->db->from('users a');
		$this->db->join('user_login b','b.user_id = a.user_id');
		$this->db->where('a.user_id',$user_id);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Update Profile
	public function profile_update()
	{
		$this->load->library('upload');
        $old_logo = $this->input->post('old_logo');

	    if (($_FILES['logo']['name'])) {
            $files = $_FILES;
            $config=array();
            $config['upload_path'] ='assets/dist/img/profile_picture/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size']      = '1024';
            $config['max_width']     = '*';
            $config['max_height']    = '*';
            $config['overwrite']     = FALSE;
            $config['encrypt_name']     = true; 

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('logo')) {
                $sdata['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('Admin_dashboard/edit_profile');
            } else {
                $view =$this->upload->data();
                $logo=$config['upload_path'].$view['file_name'];
                @unlink($old_logo);
            }
        }



		$user_id = $this->session->userdata('user_id');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$user_name = $this->input->post('user_name');
		$new_logo = (!empty($logo)?$logo:$old_logo);

		return $this->db->query("UPDATE `users` AS `a`,`user_login` AS `b` SET `a`.`first_name` = '$first_name', `a`.`last_name` = '$last_name', `b`.`username` = '$user_name',`a`.`logo` = '$new_logo' WHERE `a`.`user_id` = '$user_id' AND `a`.`user_id` = `b`.`user_id`");
	}
	//Change Password
	public function change_password($email,$old_password,$new_password)
	{
		$user_name = md5("gef".$new_password);
		$password = md5("gef".$old_password);
        $this->db->where(array('username'=>$email,'password'=>$password,'status'=>1));
		$query = $this->db->get('user_login');
		$result =  $query->result_array();
		
		if (count($result) == 1)
		{	
			$this->db->set('password',$user_name);
			$this->db->where('password',$password);
			$this->db->where('username',$email);
			$this->db->update('user_login');

			return true;
		}
		return false;
	}

}