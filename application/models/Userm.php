<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Userm extends MY_Model {
	public function __construct()
	{
		parent::__construct();
	}
	#============Count Company=============#
	public function count_user()
	{
		return $this->db->count_all("users");
	}
	#=============User List=============#
	public function user_list()
	{
		$this->db->select('users.*,user_login.*,store_set.store_name');
		$this->db->from('user_login');
		$this->db->join('users', 'users.user_id = user_login.user_id');
		$this->db->join('store_set', 'store_set.store_id = user_login.store_id','left');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	#==============User search list==============#
	public function user_search_item($user_id)
	{
		$this->db->select('users.*,user_login.user_type');
		$this->db->from('user_login');
		$this->db->join('users', 'users.user_id = user_login.user_id'); 
		$this->db->where('users.user_id',$user_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	#============Insert user to database========#
	public function user_entry($data)
	{
		$user_id = $this->auth->generator(15);

		$users= array(
				'user_id'	 => $user_id,
				'first_name' => $data['first_name'], 
				'last_name' => $data['last_name'],
				'logo' 		=> $data['logo'],
				'status' 	=> $data['status'],
			);
		$this->db->insert('users',$users);

		$user_login = array(
			'user_id'	=> $user_id,
			'username' 	=> $data['email'], 
			'store_id' 	=> $data['store_id'], 
			'password' 	=> $data['password'], 
			'user_type' => $data['user_type'], 
			'status' 	=> $data['status'], 
		);

		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where('username',$user_login['username']);
		$this->db->where('status',1);
		$query = $this->db->get();
		$result = $query->num_rows();

		if ($result > 0 ) {
			return false;
		}else{
			$this->db->insert('user_login',$user_login);
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('status',1);

			$query = $this->db->get();
			foreach ($query->result() as $row) {
				$json_product[] = array('label'=>$row->first_name,'value'=>$row->user_id);
			}
			$cache_file = './my-assets/js/admin_js/json/user.json';
			$productList = json_encode($json_product);
			file_put_contents($cache_file,$productList);
			return true;
		}
	}
	#==============User edit data===============#
	public function retrieve_user_editdata($user_id)
	{

		$this->db->select('users.*,user_login.*');
		$this->db->from('user_login');
		$this->db->join('users', 'users.user_id = user_login.user_id'); 
		$this->db->where('users.user_id',$user_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	#==============Update company==================#
	/*public function update_user($user_id)
	{

		$data=array(
			'first_name'  	=> $this->input->post('first_name'),
			'last_name' 	=> $this->input->post('last_name'),
			'status' 	    => $this->input->post('status')
			);

		$this->db->where('user_id',$user_id);
		$this->db->update('users',$data);

		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('password');

		$user_login = array(
			'username' 	=> $this->input->post('username'),
			'store_id' 	=> $this->input->post('store_id'),
			'password' 	=> 	(!empty($new_password)?md5("gef".$new_password):$old_password),
			'status' 	    => $this->input->post('status'),
			'user_type' 	    => $this->input->post('user_type')
		);

		$this->db->where('user_id',$user_id);
		$this->db->update('user_login',$user_login);

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('status',1);
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$json_product[] = array('label'=>$row->first_name,'value'=>$row->user_id);
		}
		$cache_file = './my-assets/js/admin_js/json/user.json';
		$productList = json_encode($json_product);
		file_put_contents($cache_file,$productList);
		return true;
	}*/
	#===========Delete user item========#
	// public function delete_user($user_id)
	// {
	// 	$this->db->where('user_id',$user_id);
	// 	$this->db->delete('users'); 

	// 	$this->db->where('user_id',$user_id);
	// 	$this->db->delete('user_login');

	// 	$this->db->select('*');
	// 	$this->db->from('users');
	// 	$this->db->where('status',1);
	// 	$query = $this->db->get();
	// 	foreach ($query->result() as $row) {
	// 		$json_product[] = array('label'=>$row->first_name,'value'=>$row->user_id);
	// 	}
	// 	$cache_file = './my-assets/js/admin_js/json/user.json';
	// 	$productList = json_encode($json_product);
	// 	file_put_contents($cache_file,$productList);
	// 	return true;
	// }

	//prashant code
	public function addUser(){
		 try{
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'nick_name' => $this->input->post('nick_name'),
                'email' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone_no'),
                'gender' => $this->input->post('gender'),
                'date_of_birth' => $this->input->post('dob'),
                'marital_status' => $this->input->post('marital_status'),
                'blood_group' => $this->input->post('blood_group'),
                'gurdian_name' => $this->input->post('gurdian_name'),
                'gurdian_phone' => $this->input->post('gurdian_phone'),
                'permanent_address' => $this->input->post('permanent_address'),
                'current_address' => $this->input->post('current_address'),
                'account_holder_name' => $this->input->post('account_holder_name'),
                'account_number' => $this->input->post('account_number'),
                'bank_name' => $this->input->post('bank_name'),
                'bank_identifier_code' => $this->input->post('bank_identifier_code'),
                'branch_name' => $this->input->post('branch_name'),
                'department' => $this->input->post('department'),
                'designation' => $this->input->post('designation'),
                'status' => 1,
            );
            $data = $this->security->xss_clean($data);
            $this->db->insert('users', $data);
            $insert_id = $this->db->insert_id();
			
			$data1 = array(
				'user_id'			=>	$insert_id ,
				'username'			=>	$this->input->post('username'),
				'password'		    =>	md5("gef".$this->input->post('password')),
				'user_type'			=>	$this->input->post('role'),//2
				'security_code'		=>  '',
				'status'			=>	1 //0
				);
			$this->db->insert('user_login',$data1);

            if($this->db->affected_rows() > 0){
            	$respnce['status'] = 'success';
            	$respnce['message'] = 'User is Successfully Inserted';
                return $respnce;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
       
	}

	public function get_user_by_id($user_id){
        try{
           $this->db->select('tbl_department.department_name,tbl_designation.designation_name,users.*,user_login.username,user_login.user_type');
            $this->db->from('users');            
            $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT'); 
            $this->db->join('tbl_department', 'tbl_department.id = users.department','LEFT'); 
            $this->db->join('tbl_designation', 'tbl_designation.id = users.designation','LEFT'); 
			$this->db->where('users.user_id',$user_id);
			$this->db->where('user_login.user_type >', 1);
            $query = $this->db->get();

            if($this->db->affected_rows() > 0) {
                $userarray = array(
                    'user_id' => $query->row()->user_id,
                    'first_name' => $query->row()->first_name,
                    'last_name' => $query->row()->last_name,
                    'nick_name' => $query->row()->nick_name,
                    'email' => $query->row()->email,
                    'phone_no' => $query->row()->phone_no,
                    'username' => $query->row()->username,
                    'role' => $query->row()->user_type,
                    'gender' => $query->row()->gender,
                    'date_of_birth' => $query->row()->date_of_birth,
                    'marital_status' => $query->row()->marital_status,
                    'blood_group' =>  $query->row()->blood_group,
                    'gurdian_name' =>  $query->row()->gurdian_name,
                    'gurdian_phone' =>  $query->row()->gurdian_phone,
                    'permanent_address' => $query->row()->permanent_address,
                    'current_address' => $query->row()->current_address,
                    'account_holder_name' => $query->row()->account_holder_name,
                    'account_number' => $query->row()->account_number,
                    'bank_name' => $query->row()->bank_name,
                    'bank_identifier_code' => $query->row()->bank_identifier_code,
                    'branch_name' => $query->row()->branch_name,
                    'status' => $query->row()->status,
                    'logo' => $query->row()->logo,
                    'department_name' => $query->row()->department_name,
                    'designation_name' => $query->row()->designation_name,
                );
                return $userarray;
            }else {
                return FALSE;
            }
            
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
	public function get_all_users() {
        try{
        	// $this->db->select('users.*,user_login.username,user_login.user_type,roles.role_name');
            $this->db->select('users.*,user_login.username,user_login.user_type,front_roles.role_name');
        	$this->db->from('users');            
            $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT'); 
             // $this->db->join('roles', 'roles.id=user_login.user_type','LEFT');
             $this->db->join('front_roles', 'front_roles.id=user_login.user_type','LEFT');
        	$this->db->where('users.status', 1);
        	$this->db->where('user_login.user_type >', 1);
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_user(){
        try{
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'nick_name' => $this->input->post('nick_name'),
                'email' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone_no'),
                'gender' => $this->input->post('gender'),
                'date_of_birth' => $this->input->post('dob'),
                'marital_status' => $this->input->post('marital_status'),
                'blood_group' => $this->input->post('blood_group'),
                'gurdian_name' => $this->input->post('gurdian_name'),
                'gurdian_phone' => $this->input->post('gurdian_phone'),
                'permanent_address' => $this->input->post('permanent_address'),
                'current_address' => $this->input->post('current_address'),
                'account_holder_name' => $this->input->post('account_holder_name'),
                'account_number' => $this->input->post('account_number'),
                'bank_name' => $this->input->post('bank_name'),
                'bank_identifier_code' => $this->input->post('bank_identifier_code'),
                'branch_name' => $this->input->post('branch_name'),
                'department' => $this->input->post('department'),
                'designation' => $this->input->post('designation'),
            );

            $data = $this->security->xss_clean($data);
            $this->db->where('user_id', $this->input->post('user_id'));
            $this->db->update('users',$data);
            
            $data1 = array(
            	'username' => $this->input->post('username'),
            	'user_type' => $this->input->post('role'),	
            );

            $data1 = $this->security->xss_clean($data1);
            $this->db->where('user_id', $this->input->post('user_id'));
            $this->db->update('user_login',$data1);

        	$respnce['status'] = 'success';
        	$respnce['message'] = 'User is Successfully Updated';
            return $respnce;
           
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_user(){
        try{
            $this->db->set('status', 0);
            $this->db->where('user_id',$this->input->post('id'));
			$this->db->update('users'); 
            $this->db->set('status', 0);
			$this->db->where('user_id',$this->input->post('id'));
			$this->db->update('user_login');

            $respnce['status'] = 'success';
           	$respnce['message'] = 'User is Successfully Deleted';
            return $respnce;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function isUsernameExist($username){
        try{
            $this->db->select('username');
            $this->db->from('user_login');
            $this->db->where('username',$username);
            
            $result= $this->db->get()->result();
            if($result){
                return $result; 
            }else{
                return FALSE;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function isEmailExist($email){
        try{
            $this->db->select('email');
            $this->db->from('users');
            $this->db->where('email',$email);
            
            $result= $this->db->get()->result();
            if($result){
                return $result; 
            }else{
                return FALSE;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_role() {
        try{
            $query =$this->db->get('roles');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_user_module() {
        try{
            $this->db->order_by('id', 'ASC');
            $query =$this->db->get('user_modules');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_role($role_id){
        try{
            $this->db->where('id', $role_id);
            $this->db->delete('roles');

            $this->db->where('Role_id',$role_id);
            $this->db->delete('role_permission');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
     
    public function add_role($data){   
        try{
            if($this->db->insert('role_permission', $data)){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_roledata_by_id(){
        try{
            
            $this->db->select('roles.role_name,role_permission.*');
            $this->db->from('role_permission');
            $this->db->join('roles', 'roles.id = role_permission.Role_id','LEFT'); 
            $this->db->where('role_permission.Role_id',$_POST['role_id']);

            $query = $this->db->get();
            
            $role_array = array();
            if($this->db->affected_rows() > 0) {
                $role_array = $query->result();
            } 
            return $role_array;

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_role($role_id, $module_id, $data){
        try{
            $this->db->where('Role_id',$role_id);
            $this->db->where('Module_id',$module_id);
            if($this->db->update('role_permission', $data)){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    } 
    //---- Get User Role------
    public function get_user_role() {
        try{
            $this->db->select('*');
            $this->db->from('roles');            
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    /// FRONT ROLE ///
    public function insert_front_role($data){   
        try{
            if($this->db->insert('front_role_permission', $data)){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    
    public function get_all_front_role() {
        try{
            $query =$this->db->get('front_roles');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    
    public function get_frontrole_by_id($role_id){
        try{
            
            $this->db->select('front_roles.role_name,front_role_permission.*');
            $this->db->from('front_role_permission');
            $this->db->join('front_roles', 'front_roles.id = front_role_permission.Role_id','LEFT'); 
            $this->db->where('front_role_permission.Role_id',$role_id);

            $query = $this->db->get();
            
            $role_array = array();
            if($this->db->affected_rows() > 0) {
                $role_array = $query->result();
            } 
            return $role_array;

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_front_role($role_id,$data){
        try{
            $this->db->where('Role_id',$role_id);
            if($this->db->update('front_role_permission', $data)){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    } 
    public function delete_front_role($role_id){
        try{
            $this->db->where('id', $role_id);
            $this->db->delete('front_roles');

            $this->db->where('Role_id',$role_id);
            $this->db->delete('front_role_permission');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    
    }    

    public function get_user_permission_by_id($user_id){
        try{
            $this->db->select('*');
            $this->db->from('front_role_extra_permission');
            $this->db->where('user_id',$user_id);
            $query = $this->db->get();
            return $query->row();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_permission($user_id,$data){
        try{
            $this->db->select('user_id');
            $this->db->from('front_role_extra_permission');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0){
                $this->db->where('user_id', $user_id);
                $this->db->update('front_role_extra_permission', $data);
                return TRUE;
            }else{
                $data['user_id'] = $user_id;
                $this->db->insert('front_role_extra_permission', $data);
                return TRUE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
}