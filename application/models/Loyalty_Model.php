<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loyalty_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

    public function get_all_coupon() {
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted', 0);
            $this->db->where('manage_type', 0);
            //$this->db->where('end_date >=', date('Y-m-d'));
            $this->db->order_by('end_date', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_size() {
        try{
            $this->db->select('*');
            $this->db->from('tbl_size');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    } 

    public function add_coupon($data){ 
        try{
            if($this->db->insert('coupon_new', $data)){
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

    public function fetch_product_name($searchtxt,$size_i)
    {
        $this->db->select('product_id,product_name');
        $this->db->from('product_information');
        $this->db->where('is_deleted', 0);
        $this->db->like('product_name', $searchtxt, 'both');
        if($size_i != ''){
            $this->db->where('size', $size_i); 
        }
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

    public function fetch_category_name($searchtxt)
    {
        $this->db->select('category_id,category_name');
        $this->db->from('product_category');
        $this->db->where('status', 1);
        $this->db->like('category_name', $searchtxt, 'both');
        $query=$this->db->get();

        $response=array();
        if ($query->num_rows() > 0) {
            $count=0;
            $fetch_record=$query->result_array();
            foreach ($fetch_record  as $key => $value) {
                $response[] = array("value"=>$value['category_id'],"label"=>$value['category_name']);
            }
        }
        return $response;
    }

    public function fetch_brand_name($searchtxt)
    {
        $this->db->select('brand_id,brand_name');
        $this->db->from('brand');
        $this->db->where('status', 1);
        $this->db->like('brand_name', $searchtxt, 'both');
        $query=$this->db->get();

        $response=array();
        if ($query->num_rows() > 0) {
            $count=0;
            $fetch_record=$query->result_array();
            foreach ($fetch_record  as $key => $value) {
                $response[] = array("value"=>$value['brand_id'],"label"=>$value['brand_name']);
            }
        }
        return $response;
    }

    public function delete_coupon($coupon_id,$data){
        try{
            $this->db->where('coupon_id', $coupon_id);
            if($this->db->update('coupon_new', $data)){
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

    public function change_status(){
        try{
            $this->db->set('status', $this->input->post('status'));
            $this->db->where('coupon_id', $this->input->post('deactive_id'));
            return $this->db->update('coupon_new');
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    } 

    public function get_coupon_by_id($coupon_id){
        try{
            $this->db->select('coupon_new.*,product_information.product_name,product_category.category_name,brand.brand_name');
            $this->db->from('coupon_new');
            $this->db->join('product_information','coupon_new.product_id=product_information.product_id','LEFT');
             $this->db->join('product_category','coupon_new.category_id=product_category.category_id','LEFT');
              $this->db->join('brand','coupon_new.brand_id=brand.brand_id','LEFT');

             $this->db->group_by(["`product_category`.`category_name`", "`product_information`.`product_name`","`brand`.`brand_name`"]);
              //$this->db->group_by( `product_information`.`product_name`);
              // $this->db->group_by(`brand`.`brand_name`);
            $this->db->where('coupon_id',$coupon_id);
            $query = $this->db->get();
           // echo $this->db->last_query();exit;
            $array = array();
            if($this->db->affected_rows() > 0) {
                
                $arr = $query->row();
                $this->db->select('product_name,product_id');
                $this->db->from('product_information');
                $this->db->where_in('product_id', explode(',', $arr->product_id));
                $query1 = $this->db->get();
                $res = $query1->result();
            } 
            return ['coupondata'=>$arr, 'productdata' =>$res];

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_coupon($coupon_id,$data){
        try{
            $this->db->where('coupon_id', $coupon_id);
            if($this->db->update('coupon_new',$data)){
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
            $this->db->from('coupon_new');
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

    public function get_all_promotion() {
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted', 0);
            $this->db->where('manage_type', 1);
//            $this->db->where('end_date >=', date('Y-m-d'));
            $this->db->order_by('end_date', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }    

    public function get_productinfo_by_upc(){
        try{
            $this->db->select('product_id,product_name');
            $this->db->from('product_information');
            $this->db->where('case_UPC',$_POST['case_UPC']);
            $query = $this->db->get();

            $array = array();
            if($this->db->affected_rows() > 0) {
                $array = $query->row();
            } 
            return $array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    
    public function add_promotion($data){ 
        try{
            if($this->db->insert('coupon_new', $data)){
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
    
    public function get_promotion_by_id($coupon_id){
        try{
            $this->db->select('coupon_new.*,product_information.product_name,product_category.category_name,brand.brand_name');
            $this->db->from('coupon_new');
            $this->db->join('product_information','coupon_new.product_id=product_information.product_id','LEFT');
             $this->db->join('product_category','coupon_new.category_id=product_category.category_id','LEFT');
              $this->db->join('brand','coupon_new.brand_id=brand.brand_id','LEFT');

             $this->db->group_by(["`product_category`.`category_name`", "`product_information`.`product_name`","`brand`.`brand_name`"]);
              //$this->db->group_by( `product_information`.`product_name`);
              // $this->db->group_by(`brand`.`brand_name`);
            $this->db->where('coupon_id',$coupon_id);
            $query = $this->db->get();
           // echo $this->db->last_query();exit;
            $array = array();
            if($this->db->affected_rows() > 0) {
                
                $arr = $query->result();
                $this->db->select('product_name,product_id');
                $this->db->from('product_information');
                $this->db->where_in('product_id', explode(',', $arr[0]->product_id));
                $query1 = $this->db->get();
                $res = $query1->result();
            } 
            return ['coupondata'=>$arr, 'productdata' =>$res];

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    
    public function update_promotion($coupon_id,$data){
        try{
            $this->db->where('coupon_id', $coupon_id);
            if($this->db->update('coupon_new',$data)){
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


}	