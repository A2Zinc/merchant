<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cashieruser extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

   
    #============Count cashier=============#
    public function count_cashier()
    {
        return $this->db->count_all("cashiers");
    }
    #=============User List=============#
    public function cashier_list()
    {
        $this->db->select('cashiers.*,cashier_login.*,store_set.store_name');
        $this->db->from('cashier_login');
        $this->db->join('cashiers', 'cashiers.cashier_id = cashier_login.cashier_id');
        $this->db->join('store_set', 'store_set.store_id = cashier_login.store_id','left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();  
        }
        return false;
    }
    #==============User search list==============#
    public function cashier_search_item($cashier_id)
    {
        $this->db->select('cashiers.*,cashier_login.cashier_type');
        $this->db->from('cashier_login');
        $this->db->join('cashiers', 'cashiers.cashier_id = cashier_login.cashier_id'); 
        $this->db->where('cashiers.cashier_id',$cashier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();  
        }
        return false;
    }
    
    #==============User edit data===============#
    public function retrieve_cashier_editdata($cashier_id)
    {

        $this->db->select('cashiers.*,cashier_login.*');
        $this->db->from('cashier_login');
        $this->db->join('cashiers', 'cashiers.cashier_id = cashier_login.cashier_id'); 
        $this->db->where('cashiers.cashier_id',$cashier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();  
        }
        return false;
    }

    public function addCashier(){
         try{
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
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
                'status' => 1,
            );
            $data = $this->security->xss_clean($data);
            $this->db->insert('cashiers', $data);
            $insert_id = $this->db->insert_id();
            
            $data1 = array(
                'cashier_id'            =>  $insert_id ,
                'username'          =>  $this->input->post('username'),
                'password'          =>  md5("gef".$this->input->post('password')),
                'security_code'     =>  '',
                'status'            =>  1 //0
                );
            $this->db->insert('cashier_login',$data1);

            if($this->db->affected_rows() > 0){
                $respnce['status'] = 'success';
                $respnce['message'] = 'Cashier is Successfully Inserted';
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

    public function get_cashier_by_id($cashier_id){
        try{
           $this->db->select('cashiers.cashier_id,cashiers.first_name,cashiers.last_name,cashiers.email,cashiers.phone_no,cashiers.gender,cashiers.date_of_birth,cashiers.marital_status,cashiers.blood_group,cashiers.gurdian_name,cashiers.gurdian_phone,cashiers.permanent_address,cashiers.current_address,cashiers.account_holder_name,cashiers.account_number,cashiers.bank_name,cashiers.bank_identifier_code,cashiers.branch_name,cashiers.status,cashiers.logo,cashier_login.username,cashier_login.cashier_type');
            $this->db->from('cashiers');            
            $this->db->join('cashier_login', 'cashier_login.cashier_id = cashiers.cashier_id','LEFT'); 
            $this->db->where('cashiers.cashier_id',$cashier_id);
           // $this->db->where('cashier_login.cashier_type >', 1);
            $query = $this->db->get();

            if($this->db->affected_rows() > 0) {
                $userarray = array(
                    'cashier_id' => $query->row()->cashier_id,
                    'first_name' => $query->row()->first_name,
                    'last_name' => $query->row()->last_name,
                    'email' => $query->row()->email,
                    'phone_no' => $query->row()->phone_no,
                    'username' => $query->row()->username,
                    'role' => $query->row()->cashier_type,
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
    public function get_all_cashiers() {
        try{

            $this->db->select('cashiers.*,cashier_login.username');
            $this->db->from('cashiers');            
            $this->db->join('cashier_login', 'cashier_login.cashier_id = cashiers.cashier_id','LEFT');
            //$this->db->join('roles', 'roles.id=cashier_login.cashier_type','LEFT'); 
            $this->db->where('cashiers.status', 1);
           // $this->db->where('cashier_login.cashier_type >', 1);
           
            $query =$this->db->get();
             //print_r($query->result_array());exit;
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_cashier(){
        try{
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
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
            );
            $data = $this->security->xss_clean($data);
            $this->db->where('cashier_id', $this->input->post('cashier_id'));
            $this->db->update('cashiers',$data);
           // echo $this->db->last_query();
            $data1 = array(
                'username' => $this->input->post('username'),
                //'cashier_type' => $this->input->post('role'),   
            );

            $data1 = $this->security->xss_clean($data1);
            $this->db->where('cashier_id', $this->input->post('cashier_id'));
            $this->db->update('cashier_login',$data1);

            $respnce['status'] = 'success';
            $respnce['message'] = 'Cashier is Successfully Updated';
            return $respnce;
           
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_cashier(){
        try{
            $this->db->where('cashier_id',$this->input->post('id'));
            $this->db->delete('cashiers'); 
            $this->db->where('cashier_id',$this->input->post('id'));
            $this->db->delete('cashier_login');

            $respnce['status'] = 'success';
            $respnce['message'] = 'Cashier is Successfully Deleted';
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
            $this->db->from('cashier_login');
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
            $this->db->from('cashiers');
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

    public function get_all_cashier_module() {
        try{
            $this->db->order_by('id', 'ASC');
            $query =$this->db->get('cashier_modules');
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
    public function get_cashier_role() {
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


    

}