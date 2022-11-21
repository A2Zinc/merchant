<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ccashieruser extends CI_Controller {

  function __construct()
    {
        parent::__construct();
         $this->load->library('auth');
        $this->load->library('session');
        $this->load->model('Cashieruser');
        $this->load->library('super_auth');
        if($this->super_auth->is_logged()===false){
            redirect('/');
        }

    }

    public function index()
    {
        $data['title'] = "Add Cashier";
        $data['role'] = $this->Cashieruser->get_cashier_role();
        $content = $this->parser->parse('cashiers/add_cashier_view',$data,true);
        $this->template->full_admin_html_view($content);
    }

    #================Manage User===============#
    public function manage_cashier()
    {
        $data['title'] = "All Cashiers";
        $data['users'] = $this->Cashieruser->get_all_cashiers();

        $content = $this->parser->parse('cashiers/cashier_list',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function insert_cashier(){
        $data = $this->Cashieruser->addCashier();
        echo json_encode($data); 
    } 

    public function cashier_delete(){
        $data=$this->Cashieruser->delete_cashier();
        echo json_encode($data);
    } 

    public function cashier_view(){
        $data['title'] = "View Cashier";
        $user_id = isset($_GET['id']) ? $_GET['id'] : '';
        $data['userdata'] = $this->Cashieruser->get_cashier_by_id($user_id);
        $content = $this->parser->parse('cashiers/view_cashier',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function cashier_update_form(){  
        $data['title'] = "Update Cashier";
        $user_id = isset($_GET['id']) ? $_GET['id'] : '';
        $data['user'] = $this->Cashieruser->get_cashier_by_id($user_id);
        //$data['role'] = $this->Cashieruser->get_cashier_role();
        $content = $this->parser->parse('cashiers/edit_cashier_view',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function update_cashier(){
        $data=$this->Cashieruser->update_cashier();
        echo json_encode($data);
    }


    public function check_username(){
        $data = $this->Cashieruser->isUsernameExist($this->input->post('username'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function check_email(){
        $data = $this->Cashieruser->isEmailExist($this->input->post('email'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function manage_role(){
        $data['title'] = "Role";
      $data['role'] = $this->Cashieruser->get_all_role();
      $data['module'] = $this->Cashieruser->get_all_user_module();

      $role_id = $_POST['role_id'];
      $data['userrole'] = $this->Cashieruser->get_roledata_by_id($role_id);

          $content = $this->parser->parse('roles/user_role',$data,true);
          $this->template->full_admin_html_view($content);
    }

    public function delete_role(){
        $role_id = $this->input->post('role_id');
        if($this->Cashieruser->delete_role($role_id)){
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
           
                $this->Cashieruser->add_role($data);

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

        $this->db->where('Role_id',$role_id);
        $this->db->delete('role_permission');

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
            $this->Cashieruser->add_role($data);
        }
        $this->session->set_flashdata('success', "Role is Successfully Updated.");
          redirect(base_url('User/manage_role'));
  
    } 

    public function getroleById() {
        // $role_id = $_POST['role_id'];
        $data = $this->Cashieruser->get_roledata_by_id();
        echo json_encode($data);
    }


	
	
}