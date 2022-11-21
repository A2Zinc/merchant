<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class StoreUser extends CI_Controller {
	
	function __construct() {
    parent::__construct(); 
		$this->load->library('session');
    $this->load->library('form_validation');
		$this->load->model('merchant/StoreUser_model');
    $this->load->model('Stores');
		$this->load->library('super_auth');
    if($this->super_auth->is_logged()===false){
        redirect('/');
    }
	  
    if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message'=>display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
    }
    #==============User page load============#
	public function index()
	{
		$data['title'] = "All Store Users";
    $merchant_id=$this->session->userdata('merchant_id');
    $data['store_users']=$this->StoreUser_model->get_all($merchant_id);
    $content = $this->parser->parse('store_users/list',$data,true);
		$this->template->full_admin_html_view($content);
	}

	#===============User Search Item===========#
	
public function validation($data,$parent=''){
    foreach ($data as $key => $value) {
      if($parent!=''){
        $this->form_validation->set_rules($parent."[".$value[0]."]", $value[1], $value[2]);
      } else{
        $this->form_validation->set_rules($value[0], $value[1], $value[2]);
      } 
    } 
}
public function validate(){
  if (!$this->form_validation->run()) {
      return ['status' => false,'errors' => $this->form_validation->error_array()];
    } else{
      return ['status' => true];
    }
}
  public function add()
	{	
    $merchant_id=$this->session->userdata('merchant_id');

    if(isset($_POST['storeUsers'])){
      $data=$this->input->post('storeUsers');
      $stores=$this->input->post('stores');
        
     $this->validation([
      ['first_name','First Name', 'required', ['required' => 'You must provide a %s.']],
      ['last_name', 'Last Name','required', ['required' => 'You must provide a %s.']],
      ['username','Email', 'trim|required|valid_email|is_unique[user_login.username]',['required' => 'You must provide a %s.']],
      ['phone','Phone', 'trim|required',['required' => 'You must provide a %s.']],
     ],'storeUsers');

     $this->validation([ 
        ['password', 'Password','required|matches[confirm_password]', ['required' => 'You must provide a %s.']],
        ['confirm_password', 'Password Confirmation','required'],
        ['stores[]','Assigned Stores', 'required', ['required' => 'You must provide a %s.']],

       ]);
      $response=$this->validate();

     if($response['status']==true){
        $data['password']=md5($this->input->post('password'));
        $data['user_type']=2;

        $this->db->trans_start();
        $user_id=$this->StoreUser_model->add($data,$merchant_id);
        $this->StoreUser_model->assign_stores($user_id,$stores,$merchant_id);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
          echo json_encode(['status' => 'fail','errors' => ['other_error' => $this->db->_error_message()]]);
        } else{
          echo json_encode(['status' => 'success','msg' => 'Added Successfully','user_id' => $user_id]);
        }      
      } else{
         echo json_encode(['status' => 'fail','errors' => ['field_errors' => $response['errors']]]);
      }

      die; 
    }
    $data['title'] = "Add Store User";
    $data_filter_arr['filter_merchant_id']=$this->session->userdata('merchant_id');
    $data['stores']=$this->Stores->store_list($data_filter_arr);
    $content = $this->parser->parse('store_users/add',$data,true);
    $this->template->full_admin_html_view($content);
	}

	#================Manage User===============#
	public function edit($user_id)
	{
    $data['title'] = "Edit Users";
    $merchant_id=$this->session->userdata('merchant_id');
    if(isset($_POST['storeUsers'])){
      $data=$this->input->post('storeUsers');
      $stores=$this->input->post('stores');
      $this->validation([
      ['first_name','First Name', 'required', ['required' => 'You must provide a %s.']],
      ['last_name', 'Last Name','required', ['required' => 'You must provide a %s.']],
      ['username','Email', 'trim|required|valid_email|callback_check_user_email',['required' => 'You must provide a %s.']],
      ['phone','Phone', 'trim|required',['required' => 'You must provide a %s.']],
     ],'storeUsers');

     if($this->input->post('password')!=''){
       $this->validation([ 
        ['password', 'Password','matches[confirm_password]', ['required' => 'You must provide a %s.']],
        ['confirm_password', 'Password Confirmation','required'],
       ]);
       $data['password']=md5($this->input->post('password'));

     } 
      
     $this->validation([
        ['stores[]','Assigned Stores', 'required', ['required' => 'You must provide a %s.']],
      ]);
      $response=$this->validate();

      if($response['status']==true){
        $this->db->trans_start();
        $this->StoreUser_model->update($user_id,$data,$merchant_id);
        $this->StoreUser_model->assign_stores($user_id,$stores,$merchant_id);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
          echo json_encode(['status' => 'fail','errors' => ['other_error' => $this->db->_error_message()]]);
        } else{
          echo json_encode(['status' => 'success','msg' => 'Updated Successfully','user_id' => $user_id,'pic_resp' => $pic_response]);
        }

      }  else{
         echo json_encode(['status' => 'fail','errors' => ['field_errors' => $response['errors']]]);
      }
      die;
    }
    $data['store_user']=(array)$this->StoreUser_model->get($user_id,$merchant_id);
    $data_filter_arr['filter_merchant_id']=$merchant_id;
    $data['stores']=$this->Stores->store_list($data_filter_arr);
    $data['assigned_stores']=$this->StoreUser_model->get_assigned_stores($user_id,$data_filter_arr['filter_merchant_id']);
    $content = $this->parser->parse('store_users/add',$data,true);
    $this->template->full_admin_html_view($content);
	}

  public function do_upload($image)
  {
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload($image))
    {
            $response = array('error' => $this->upload->display_errors());
    }
    else
    {
            $response = array('upload_data' => $this->upload->data());
    }
    return $response;
  }

  public function check_user_email($email) { 
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->StoreUser_model->check_unique_user_email($id, $email);
    if($result == 0){
        $response = true;
    }
    else {
        $this->form_validation->set_message('check_user_email', 'Email must be unique');
        $response = false;
    }
    return $response;
  }



}