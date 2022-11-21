<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customerm extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        
    }
    //Add customer
    public function customer_add($data){  
        try{
            if($this->db->insert('customer_information', $data)){
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

    public function customer_update($data,$customer_id){
        try{
            $this->db->where('customer_id',$customer_id);
            if($this->db->update('customer_information', $data)){
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

    

    //email exist
    public function customer_email_exist($email)
    {
         try{
            $this->db->select('customer_email');
            $this->db->from('customer_information');
            $this->db->where('customer_email',$email);
            
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