<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	
	function __construct() {
      	parent::__construct(); 
		$this->load->library('auth');
		$this->load->library('lusers');
		$this->load->library('session');
		$this->load->model('Userm');
    $this->load->model('Hrms_Model');
		$this->auth->check_admin_auth();

		if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message'=>display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
    }
    #==============User page load============#
	public function index()
	{
    
		$data['title'] = "Add User";
    $data['role'] = $this->Userm->get_user_role();
    $data['front_role'] = $this->Userm->get_all_front_role();
    $data['department'] = $this->Hrms_Model->get_all_department();
    $data['designation'] = $this->Hrms_Model->get_all_designation();
    $content = $this->parser->parse('users/add_user_view',$data,true);
		$this->template->full_admin_html_view($content);
	}

	#===============User Search Item===========#
	public function user_search_item()
	{	
		$user_id = $this->input->post('user_id');
        $content = $this->lusers->user_search_item($user_id);
		$this->template->full_admin_html_view($content);
	}

	#================Manage User===============#
	public function manage_user()
	{
        $data['title'] = "All Users";
        $data['users'] = $this->Userm->get_all_users();

		$content = $this->parser->parse('users/user_list',$data,true);
		$this->template->full_admin_html_view($content);
	}


	#==============Insert User==============#
	// public function insert_user()
	// {
	// 	$data=array(
	// 		'first_name'=> $this->input->post('first_name'),
	// 		'last_name' => $this->input->post('last_name'),
	// 		'email' 	=> $this->input->post('email'),
	// 		'password' 	=> md5("gef".$this->input->post('password')),
	// 		'user_type' => $this->input->post('user_type'),
	// 		'store_id' 	=> $this->input->post('store_id'),
	// 		'logo' 		=> base_url('assets/website/image/login.png'),
	// 		'status' 	=> 1
	// 		);

	// 	$result = $this->lusers->insert_user($data);
	// 	if ($result) {
	// 		$this->session->set_userdata(array('message'=>display('successfully_added')));
	// 		if(isset($_POST['add-user'])){
	// 			redirect('User/manage_user');
	// 		}elseif(isset($_POST['add-user-another'])){
	// 			redirect(base_url('User'));
	// 		}
	// 	}else{
	// 		$this->session->set_userdata(array('error_message'=>display('already_exists')));
	// 		redirect(base_url('User/manage_user'));
	// 	}
	// }

	public function insert_user(){
        $data = $this->Userm->addUser();
        echo json_encode($data); 
    } 

	#===============User update form================#
	// public function user_update_form($user_id)
	// {	
	// 	$content = $this->lusers->user_edit_data($user_id);
	// 	$this->template->full_admin_html_view($content);
	// }

	#===============User update===================#
	// public function user_update()
	// {
	// 	$user_id  = $this->input->post('user_id');
	// 	$this->Userm->update_user($user_id);
	// 	$this->session->set_userdata(array('message'=>display('successfully_updated')));
	// 	redirect(base_url('User/manage_user'));
	// }
	#============User delete===========#
	// public function user_delete($user_id)
	// {
	// 	$this->Userm->delete_user($user_id);
	// 	$this->session->set_userdata(array('message'=>display('successfully_delete')));
	// 	redirect('User/manage_user');
	// }

	public function user_delete(){
        $data=$this->Userm->delete_user();
        echo json_encode($data);
    } 

    public function user_view(){
    	$data['title'] = "View User";
    	$user_id = isset($_GET['id']) ? $_GET['id'] : '';
      $data['userdata'] = $this->Userm->get_user_by_id($user_id);
		$content = $this->parser->parse('users/view_user',$data,true);
		$this->template->full_admin_html_view($content);
    }

    public function user_update_form(){	
		$data['title'] = "Update User";
		$user_id = isset($_GET['id']) ? $_GET['id'] : '';
		$data['user'] = $this->Userm->get_user_by_id($user_id);
    $data['front_role'] = $this->Userm->get_all_front_role();
    $data['role'] = $this->Userm->get_user_role();
    $data['department'] = $this->Hrms_Model->get_all_department();
    $data['designation'] = $this->Hrms_Model->get_all_designation();
    //echo '<pre>'; print_r($data);exit;
		$content = $this->parser->parse('users/edit_user_view',$data,true);
		$this->template->full_admin_html_view($content);
	}

	public function update_user(){
		$data=$this->Userm->update_user();
    echo json_encode($data);
	}


	public function check_username(){
        $data = $this->Userm->isUsernameExist($this->input->post('username'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function check_email(){
        $data = $this->Userm->isEmailExist($this->input->post('email'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function manage_role(){
    	$data['title'] = "Role";
      $data['role'] = $this->Userm->get_all_role();
      $data['module'] = $this->Userm->get_all_user_module();

      $role_id = $_POST['role_id'];
      $data['userrole'] = $this->Userm->get_roledata_by_id($role_id);

		  $content = $this->parser->parse('roles/user_role',$data,true);
		  $this->template->full_admin_html_view($content);
    }

    public function delete_role(){
        $role_id = $this->input->post('role_id');
        if($this->Userm->delete_role($role_id)){
           $this->session->set_flashdata('success','Role is Successfully Deleted.');
            redirect('User/manage_role'); 
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('User/manage_role'); 
        }         
        
    } 

    public function insert_role()
    {
    	#insert role_name into roles table
    	$data1 = array(
      			'role_name' => $this->input->post('role_name')
      		);
      	$data1 = $this->security->xss_clean($data1);
        $this->db->insert('roles', $data1);

        #get last insert id
        $insert_id = $this->db->insert_id();

      	$module_id = $this->input->post('Module_id');

      	
      	for($i=0; $i < sizeof($module_id); $i++){
      		$data = array(
      			'Role_id' => $insert_id,
      			'Module_id' => $module_id[$i]
      		);

      		if($this->input->post($module_id[$i].'_add')){
      				$data['Write_rights']=$this->input->post($module_id[$i].'_add');
      				$data['None_rights']= 0;
      		}
      		if($this->input->post($module_id[$i].'_view')){
      				$data['Read_rights']=$this->input->post($module_id[$i].'_view');
      				$data['None_rights']= 0;
      		}
      		if($this->input->post($module_id[$i].'_edit')){
      				$data['Edit_rights']=$this->input->post($module_id[$i].'_edit');
      				$data['None_rights']= 0;
      		}
      		if($this->input->post($module_id[$i].'_delete')){
      				$data['Delete_rights']=$this->input->post($module_id[$i].'_delete');
      				$data['None_rights']= 0;
      		}

      		if($this->input->post($module_id[$i].'_all')){
      				$data['Write_rights']=1;
      				$data['Read_rights']=1;
      				$data['Edit_rights']=1;
      				$data['Delete_rights']=1;
      				$data['Admin_rights']=1;
      				$data['None_rights']= 0;
      		}
      			$this->Userm->add_role($data);
      	}
	        
        	$this->session->set_flashdata('success', "Role is Successfully Inserted.");
        	redirect(base_url('User/manage_role'));
	        
    } 

    public function update_role(){ 
       // echo '<pre>'; print_r($_POST);exit();
        $data1 = array(
            'role_name' => $this->input->post('role_name'),
          );
        $role_id = $this->input->post('Role_id');
        $this->db->where('id',$role_id);
        $this->db->update('roles', $data1);


        $module_id = $this->input->post('Module_id');

       // $this->db->where('Role_id',$role_id);
        //$this->db->delete('role_permission');

        for($i=0; $i < sizeof($module_id); $i++){
         $data = array(
            'Role_id' =>  $role_id,
            'Module_id' => $module_id[$i]
          );
          if($this->input->post($module_id[$i].'_view')){
              $data['Read_rights']=$this->input->post($module_id[$i].'_view');
              $data['None_rights']= 0;
          }
          else{
              $data['Read_rights']=0;
               }


          if($this->input->post($module_id[$i].'_add')){
              $data['Write_rights']=$this->input->post($module_id[$i].'_add');
              $data['None_rights']= 0;
          }
          else{
              $data['Write_rights']=0;
            }

          
          if($this->input->post($module_id[$i].'_edit')){
              $data['Edit_rights']=$this->input->post($module_id[$i].'_edit');
              $data['None_rights']= 0;
          }
          else{
              $data['Edit_rights']=0;
              
          }
          if($this->input->post($module_id[$i].'_delete')){
              $data['Delete_rights']=$this->input->post($module_id[$i].'_delete');
              $data['None_rights']= 0;
          }else{
              $data['Delete_rights']=0;
              
          }

          if($this->input->post($module_id[$i].'_all')){
              $data['Write_rights']=1;
              $data['Read_rights']=1;
              $data['Edit_rights']=1;
              $data['Delete_rights']=1;
              $data['Admin_rights']=1;
              $data['None_rights']= 0;
          }else if($data['Write_rights']==0 || $data['Read_rights']==0 || $data['Edit_rights']==0 || $data['Delete_rights']==0)
          {
             $data['Admin_rights']=0;
          }

          if($data['Write_rights']==0 && $data['Read_rights']==0 && $data['Edit_rights']==0 && $data['Delete_rights']==0){
            $data['None_rights']= 1;
           
          }
          
            $this->Userm->update_role($role_id, $module_id[$i], $data);
        
        }
          
          $this->session->set_flashdata('success', "Role is Successfully Updated.");
          redirect(base_url('User/manage_role'));
  
    } 

    public function getroleById() {
        // $role_id = $_POST['role_id'];
        $data = $this->Userm->get_roledata_by_id();
        echo json_encode($data);
    }
    /********FRONT ROLES**************/
    public function manage_frontrole() {
      $data['title'] = "Front Role";
      $data['front_role'] = $this->Userm->get_all_front_role();
//      echo '<pre>'; print_r($data);exit;
      $content = $this->parser->parse('front_roles/front_roles',$data,true);
      $this->template->full_admin_html_view($content);
    }
    
    public function add_front_role() {
      $data['title'] = "Add Front Role";
      $content = $this->parser->parse('front_roles/add_front_role',$data,true);
      $this->template->full_admin_html_view($content);
    }
    
    public function insert_front_role() {
        $data1 = array(
            'role_name' => $this->input->post('role_name')
          );
        $data1 = $this->security->xss_clean($data1);
        $this->db->insert('front_roles', $data1);
        #get last insert id
        $insert_id = $this->db->insert_id();
        $module_id = $this->input->post('Module_id');
        $sub = $this->input->post('sub_rights');

          $data = array(
              'Role_id' => $insert_id,
              'pos_rights' => !empty($this->input->post('pos_rights')) ? implode(',',$this->input->post('pos_rights')) : '',
              'reports_rights' => !empty($this->input->post('reports_rights')) ? implode(',',$this->input->post('reports_rights')) : '',
              'inventory_rights' => !empty($this->input->post('inventory_rights')) ? implode(',',$this->input->post('inventory_rights')) : '',
              'loyalty_rights' => !empty($this->input->post('loyalty_rights')) ? implode(',',$this->input->post('loyalty_rights')) : '',
              'store_rights' => !empty($this->input->post('store_rights')) ? implode(',',$this->input->post('store_rights')) : '',
              'hrms_rights' => !empty($this->input->post('hrms_rights')) ? implode(',',$this->input->post('hrms_rights')) : '',
              'submit_timecard_rights' => !empty($this->input->post('submit_timecard_rights')) ? $this->input->post('submit_timecard_rights') : '',
              'e_order_rights' => !empty($this->input->post('e_order_rights')) ? $this->input->post('e_order_rights') : '',
              'market_place_rights' => !empty($this->input->post('market_place_rights')) ? $this->input->post('market_place_rights') : '',
          );

          $insert = $this->Userm->insert_front_role($data);
          if($insert == 1) {
              $this->session->set_flashdata('success', "Front Role Permisssion is Successfully Inserted.");
              redirect('User/manage_frontrole');
          } else {
              $this->session->set_flashdata('error', "Something went wrong. Please try again.");
              redirect('User/manage_frontrole');
          }

    }
    
    public function edit_front_role() {
        $data['title'] = "Update Front Role";
        $role_id = isset($_GET['id']) ? $_GET['id'] : '';
        $data['roledata'] = $this->Userm->get_frontrole_by_id($role_id);
        $content = $this->parser->parse('front_roles/edit_front_role',$data,true);
        $this->template->full_admin_html_view($content);
    }
    
    public function update_front_role() {
        $role_id = $this->input->post('Role_id');
        $data1 = array(
            'role_name' => $this->input->post('role_name')
        );
        $this->db->where('id', $role_id);
        $this->db->update('front_roles', $data1);
        $data = array(
              'pos_rights' => !empty($this->input->post('pos_rights')) ? implode(',',$this->input->post('pos_rights')) : '',
              'reports_rights' => !empty($this->input->post('reports_rights')) ? implode(',',$this->input->post('reports_rights')) : '',
              'inventory_rights' => !empty($this->input->post('inventory_rights')) ? implode(',',$this->input->post('inventory_rights')) : '',
              'loyalty_rights' => !empty($this->input->post('loyalty_rights')) ? implode(',',$this->input->post('loyalty_rights')) : '',
              'store_rights' => !empty($this->input->post('store_rights')) ? implode(',',$this->input->post('store_rights')) : '',
              'hrms_rights' => !empty($this->input->post('hrms_rights')) ? implode(',',$this->input->post('hrms_rights')) : '',
              'submit_timecard_rights' => !empty($this->input->post('submit_timecard_rights')) ? $this->input->post('submit_timecard_rights') : '',
              'e_order_rights' => !empty($this->input->post('e_order_rights')) ? $this->input->post('e_order_rights') : '',
              'market_place_rights' => !empty($this->input->post('market_place_rights')) ? $this->input->post('market_place_rights') : '',
        );
        $update = $this->Userm->update_front_role($role_id,$data);
        if($update == 1) {
            $this->session->set_flashdata('success', "Front Role Permisssion is Successfully Updated.");
            redirect('User/manage_frontrole');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('User/manage_frontrole');
        }
    }
    
    public function delete_front_role(){
        $role_id = $this->input->post('role_id');
        if($this->Userm->delete_front_role($role_id)){
           $this->session->set_flashdata('success','Front Role is Successfully Deleted.');
            redirect('User/manage_frontrole'); 
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('User/manage_frontrole'); 
        }         
        
    }

    public function user_permission(){
        $data['title'] = "User Permisssions";
        $user_id = isset($_GET['id']) ? $_GET['id'] : '';
        $data['roledata'] = $this->Userm->get_user_permission_by_id($user_id);
        $content = $this->parser->parse('users/user_permission_view',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function update_user_permission(){
        $user_id = $this->input->post('user_id');
        $data = array(
             'pos_rights' => !empty($this->input->post('pos_rights')) ? implode(',',$this->input->post('pos_rights')) : '',
             'reports_rights' => !empty($this->input->post('reports_rights')) ? implode(',',$this->input->post('reports_rights')) : '',
             'inventory_rights' => !empty($this->input->post('inventory_rights')) ? implode(',',$this->input->post('inventory_rights')) : '',
             'loyalty_rights' => !empty($this->input->post('loyalty_rights')) ? implode(',',$this->input->post('loyalty_rights')) : '',
             'store_rights' => !empty($this->input->post('store_rights')) ? implode(',',$this->input->post('store_rights')) : '',
             'hrms_rights' => !empty($this->input->post('hrms_rights')) ? implode(',',$this->input->post('hrms_rights')) : '',
             'submit_timecard_rights' => !empty($this->input->post('submit_timecard_rights')) ? $this->input->post('submit_timecard_rights') : '',
             'e_order_rights' => !empty($this->input->post('e_order_rights')) ? $this->input->post('e_order_rights') : '',
             'market_place_rights' => !empty($this->input->post('market_place_rights')) ? $this->input->post('market_place_rights') : '',
        );

        $update = $this->Userm->update_permission($user_id,$data);
        if($update == 1) {
            $this->session->set_flashdata('success', "Permisssion is Successfully Updated.");
            redirect('User/manage_user');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('User/manage_user');
        }
    }

}