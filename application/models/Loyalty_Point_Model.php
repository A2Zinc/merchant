<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loyalty_Point_Model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_point() {
        try{
            $this->db->select('*');
            $this->db->from('loyalty_management');
            $this->db->where_not_in('point_type', 3);
            $this->db->order_by('created_date', 'DESC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function add_point($data){
        try{
            if($this->db->insert('loyalty_management', $data)){
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

    public function fetch_product_name($searchtxt)
    {
        $this->db->select('product_id,product_name');
        $this->db->from('product_information');
        $this->db->where('is_deleted', 0);
        $this->db->like('product_name', $searchtxt, 'both');
        $query=$this->db->get();

        $response=array();
        if ($query->num_rows() > 0) {
            $count=0;
            $fetch_record=$query->result_array();
            foreach ($fetch_record  as $key => $value) {
                $response[] = array("value"=>$value['product_id'],"label"=>$value['product_name']);
            }
        }
        return $response;
    }

    public function delete_point($coupon_id){
        try{
            $this->db->where('point_id', $coupon_id);
            if($this->db->delete('loyalty_management')){
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

    public function change_status_point(){
        try{
            $this->db->set('status', $this->input->post('status'));
            $this->db->where('point_id', $this->input->post('deactive_id'));
            return $this->db->update('loyalty_management');
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_point_by_id($coupon_id){
        try{
            $this->db->select('loyalty_management.*');
            $this->db->from('loyalty_management');
           // $this->db->join('product_information','loyalty_management.product_id=product_information.product_id','LEFT');
            $this->db->where('point_id',$coupon_id);
            $query = $this->db->get();

            $array = array();
            if($this->db->affected_rows() > 0) {
                $array = $query->row_array();
            }
            return $array;

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_point($coupon_id,$data){
        try{
            $this->db->where('point_id', $coupon_id);
            if($this->db->update('loyalty_management',$data)){
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

    public function isCouponExist($coupon_name){
        try{
            $this->db->select('coupon_name');
            $this->db->from('loyalty_management');
            $this->db->where('coupon_name',$coupon_name);

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


}
