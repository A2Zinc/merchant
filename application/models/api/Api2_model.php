<?php

class Api2_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

    public function insert_user($data = array()){
       return $this->db->insert("users", $data);
    }

    public function insert($data){
       
       if($this->db->insert('users',$data))
       {    
           return 'User is created successfully';
       }
         else
       {
           return "Error has occured";
       }
   }


   public function user_login($username,$password){
      $this->db->where("username", $username);
      $query = $this->db->get("user_login");
        if($query->num_rows() > 0){
            $hash_pass = $query->row()->password;
            $pass = md5("gef".$password);
            if($hash_pass === $pass){
               return $query->row();
            }
            // return FALSE;
        }else{
            return FALSE;
        }
   }

   public function getProductData($barcode){  
        try{
            $this->db->select('brand.brand_name,brand.brand_id,product_category.category_id,product_category.category_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.case_UPC',$barcode);
            $query = $this->db->get();

            $product_array = array();
            if($this->db->affected_rows() > 0) {
                $product_array = $query->row();
            } 
            return $product_array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function getProductByID($product_id){  
        try{
            $this->db->select('product_category.category_id,product_category.category_name,brand.brand_id,brand.brand_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('brand','brand.brand_id = product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.product_id',$product_id);
            $query = $this->db->get();

            $product_array = array();
            if($this->db->affected_rows() > 0) {
                $product_array = $query->row();
            } 
            return $product_array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_combo_productdata($product_id){
       try{
           $this->db->where('product_id',$product_id);
           $query =$this->db->get('product_combos');
           return $query->result();
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }


    public function inventorylist(){  
        try{
            $this->db->select('product_information.*,brand.brand_name,brand.brand_id,product_category.category_id,product_category.category_name');
            $this->db->from('product_information');
            $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            //$this->db->limit(20);
            $product_id = array('SA5E83KD','6GFJRGJ1','7UX8XRCA','OR9AE294','EJE5ZJ7T');
            $this->db->where_in('product_id',$product_id);
            $this->db->order_by('id','DESC');
            $query = $this->db->get();

            $product_array = array();
            if($this->db->affected_rows() > 0) {
                $product_array = $query->result_array();
            } 
            return $product_array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function recentitem($user_id=0){  
        try{
            $this->db->select('brand.brand_name,brand.brand_id,product_category.category_id,product_category.category_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->limit(20);
            $this->db->order_by('id','DESC');
            $query = $this->db->get();

            $product_array = array();
            if($this->db->affected_rows() > 0) {
                $product_array = $query->result_array();
            } 
            return $product_array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function getProductMasterData($barcode){  
        try{
            $this->db->select('brand.brand_name,brand.brand_id,product_category.category_id,product_category.category_name,product_master.*');
            $this->db->from('product_master');
            $this->db->join('brand','brand.brand_id=product_master.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_master.category_id','LEFT');
            $this->db->where('product_master.case_UPC',$barcode);
            $query = $this->db->get();

            $product_array = array();
            if($this->db->affected_rows() > 0) {
                $product_array = $query->row();
            } 
            return $product_array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function find_category($cat_name){

        $this->db->select('category_id');
        $this->db->from('product_category');
        $this->db->where('category_name',trim($cat_name));
        $query=$this->db->get();
        $story_array = array();
        if($this->db->affected_rows() > 0){
            $story_array = $query->row();
            return $story_array->category_id;
        }else{
            return 0;
        }
    }

  public function get_brands(){

    $this->db->select("*");
    $this->db->from("brand");
    $query = $this->db->get();

    return $query->result();
  }

  public function get_suppliers(){

    $this->db->select("*");
    $this->db->from("supplier_information");
     $this->db->where("status", 1);
    $query = $this->db->get();

    return $query->result();
  }


  public function get_units() {
    $this->db->select("*");
    $this->db->from("tbl_unit");
    $query = $this->db->get();

    return $query->result();
  }

  public function get_sizes() {
    $this->db->select("*");
    $this->db->from("tbl_size");
    $query = $this->db->get();

    return $query->result();
  }



  public function get_all_category($categorytype='1') {
       
    $this->db->select('*');
    $this->db->from('product_category');
    if($categorytype=='1'){
      $this->db->where('cat_type', $categorytype);
    }else{
      $this->db->where('parent_category_id', $categorytype);
    }
    $this->db->order_by('category_name', 'ASC');
    $query =$this->db->get();
    return $query->result_array();
        
  }

 
    // public function insert_product($data){
    //   if($this->db->insert('product_information',$data))
    //    {    
    //        return 'Product is created successfully';
    //    }
    //      else
    //    {
    //        return "Error has occured";
    //    }
    // }

    public function insert_product($data,$status,$table_from){
    
    if($status == 'insert' AND $table_from == 'api'){
      if($this->db->insert('product_master', $data)){
          $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
          $this->db->insert('product_information',$data);
      }
    }elseif($status == 'insert' AND $table_from == 'master'){
      $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
        $this->db->insert('product_information', $data);
    }elseif($status == 'update' AND $table_from == 'store'){
      $this->db->where('case_UPC', $upc_code);
      $this->db->update('product_information', $data);
    }
    
    if($this->db->affected_rows() > 0){    
      return 'Product is created successfully';
    }else{
      return "Error has occured";
    }
  }
  public function update_product($product_id, $product_info){

      $this->db->where("product_id", $product_id);
      return $this->db->update("product_information", $product_info);
  }

  public function get_size($sizes){
    $this->db->select('*');
    $this->db->from('tbl_size');
    $this->db->where('name',$sizes);
    $query=$this->db->get();
    $story_array = array();
      if($this->db->affected_rows() > 0){
          $story_array = $query->row();
          return $story_array;
      }
  }

  public function isExistBrand($brand){
    $this->db->select('brand_name,brand_id');
    $this->db->from('brand');
    $this->db->where('brand_name',$brand);
    $query=$this->db->get();
    $story_array = array();
    if($this->db->affected_rows() > 0){
        $story_array = $query->row();
        return $story_array;
    }
 }

 public function get_unit($units){
    $this->db->select('unit_name,value');
    $this->db->from('tbl_unit');
    $this->db->where('unit_name',$units);
    $query=$this->db->get();
    $story_array = array();
      if($this->db->affected_rows() > 0){
          $story_array = $query->row();
          return $story_array;
      }
  }

  public function fetch_size($category_id){
        $this->db->select('measurement_type,age_restrict,Applicable_CRV,Applicable_Tax,measurement_value');
        $this->db->from('product_category');
        $this->db->where('category_id',$category_id);
        $query1 = $this->db->get();
        //echo $this->db->last_query();
        $size_type = $query1->row()->measurement_type;
        $age_restrict = $query1->row()->age_restrict;
        $Applicable_CRV = $query1->row()->Applicable_CRV;
        $Applicable_Tax = $query1->row()->Applicable_Tax;
        $measurement_value = $query1->row()->measurement_value;
        //$measurement_group
        //echo '<pre>'; print_r($size_type);exit;
        $this->db->select('*');
        $this->db->from('tbl_size');
        $this->db->where('size_type', $size_type);
        $query = $this->db->get();
        //return $query->result_array();
        
        if(!empty($measurement_value)){
            $measurement_value_ar=explode (",",$measurement_value);
            $size_ar=array();
            foreach ($measurement_value_ar as $value) {
                $size_ar[]=array('name'=>$value);
            }
            $sizename=$size_ar;
        }else{
            $sizename=$query->result_array();
        }

        $array = array(
            'sizename' => $sizename,
            'age_restrict' => $age_restrict,
            'Applicable_CRV' => $Applicable_CRV,
            'Applicable_Tax' => $Applicable_Tax,
        );
        return $array;
        
    }
  
    public function insert_order($arrayName){
       $this->db->insert('order',$arrayName);
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }
   }

   public function insert_order_details($catdata){
       $this->db->insert('order_details',$catdata);
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }
   }


   public function getPOSReceiptData($order_id=0) {
       $master_arr = array();
       if(strlen($order_id) > 0) {

           $this->db->select('*,customer_information.customer_name');
           $this->db->from('order');
           $this->db->join('customer_information','customer_information.customer_id=order.customer_id','LEFT');
           $this->db->where('order_id', $order_id);
           $query = $this->db->get();
           if($query->num_rows()>0) {
               $result = $query->result();

               $tax_amount         = $result[0]->tax_amount;
               $coupon_discount    = $result[0]->coupon_discount;
               $container_deposit  = $result[0]->container_deposit;
               $is_cash_card       = $result[0]->is_cash_card;
               $return_balance     = $result[0]->return_balance;
               if($result[0]->customer_name != "")
                   $customer_name  = $result[0]->customer_name;
               else
                   $customer_name = "Walk-in Customer";

               $master_arr["order_no"]          = $order_id;
               $master_arr["customer_name"]     = $customer_name;
               $master_arr["customer_address"]  = "1 Brandywine Road Menonome Falls WI 53051";
               $master_arr["order_time"]        = date("h:iA");
               $master_arr["tax"]               = $tax_amount;
               $master_arr["coupon_apply"]      = $coupon_discount;
               $master_arr["container_deposit"] = $container_deposit;
               $master_arr["is_cash_card"]      = $is_cash_card;
               $master_arr["return_balance"]    = $return_balance;

               $this->db->select('*');
               $this->db->from('order_details');
               $this->db->where('order_id', $order_id);
               $query_order_details = $this->db->get();

               $result_order_details_arr = array();
               if($query_order_details->num_rows()>0) {
                   $result_order_details_arr = $query_order_details->result_array();
               }

               $master_arr["order_details"] = $result_order_details_arr;
           }
       }

       return $master_arr;
    }

    public function get_coupons(){
	    $this->db->select('*');
	    $this->db->from('coupon_new');
	    $this->db->where('is_deleted', 0);
	    $this->db->where('manage_type', 0);
	  //$this->db->where('end_date >=', date('Y-m-d'));
	    $this->db->order_by('end_date', 'ASC');
	    $query =$this->db->get();

	    return $query->result();
   }

	public function get_promotions(){
	    $this->db->select('*');
	    $this->db->from('coupon_new');
	    $this->db->where('is_deleted', 0);
	    $this->db->where('manage_type', 1);
	//  $this->db->where('end_date >=', date('Y-m-d'));
	    $this->db->order_by('end_date', 'ASC');
	    $query =$this->db->get();

	    return $query->result();
	}

  public function insert_coupon($data){
     if($this->db->insert('coupon_new', $data)){
         return TRUE;
     }else{
         return FALSE;
     }
  }

   public function update_coupon($coupon_id,$data){
     $this->db->where('coupon_id', $coupon_id);
     return $this->db->update("coupon_new", $data);
   }

   public function update_product_qty($product_id,$data){
     $this->db->where('product_id', $product_id);
     $this->db->update("product_information", $data);
     // echo $this->db->last_query();
     // exit();
     $this->db->trans_complete();
// was there any update or error?
     // echo $this->db->affected_rows();
     // exit;
      if ($this->db->affected_rows() == '1') {
        return TRUE;
      }else{
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
         $this->db->where('coupon_id',$coupon_id);
         $query = $this->db->get();

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

  public function insert_promotion($data){
       if($this->db->insert('coupon_new', $data)){
           return TRUE;
       }else{
           return FALSE;
       }
   }

   public function update_promotion($coupon_id,$data){
       $this->db->where('coupon_id', $coupon_id);
       return $this->db->update("coupon_new", $data);
   }

   public function get_promotion_by_id($coupon_id){
       try{
           $this->db->select('coupon_new.*,product_information.product_name,product_category.category_name,brand.brand_name');
           $this->db->from('coupon_new');
           $this->db->join('product_information','coupon_new.product_id=product_information.product_id','LEFT');
           $this->db->join('product_category','coupon_new.category_id=product_category.category_id','LEFT');
           $this->db->join('brand','coupon_new.brand_id=brand.brand_id','LEFT');
           $this->db->group_by(["`product_category`.`category_name`", "`product_information`.`product_name`","`brand`.`brand_name`"]);
           $this->db->where('coupon_id',$coupon_id);
           $query = $this->db->get();
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

   public function delete_coupon($coupon_id){
     // delete method
     $this->db->set('is_deleted', 1);
     $this->db->where("coupon_id", $coupon_id);
     return $this->db->update("coupon_new");
   }

   public function fetch_category_name($category_id){
       $this->db->select('category_id,category_name');
       $this->db->from('product_category');
       $this->db->where('status', 1);
       $this->db->where('category_id', $category_id);
       $query=$this->db->get();
       return $query->row();
   }

   public function fetch_brand_name($brand_id){
       $this->db->select('brand_id,brand_name');
       $this->db->from('brand');
       $this->db->where('status', 1);
       $this->db->where('brand_id', $brand_id);
       $query=$this->db->get();
       return $query->row();
   }

   public function fetch_product_name($product_id){
       $this->db->select('product_id,product_name');
       $this->db->from('product_information');
       $this->db->where('is_deleted', 0);
       $this->db->where('product_id', $product_id);

       $query=$this->db->get();
       $response=array();
       if ($query->num_rows() > 0) {
           $count=0;
           $fetch_record=$query->result_array();
           foreach ($fetch_record  as $key => $value) {
               $response[] = array(
                 "product_id"=>$value['product_id'],
                 "product_name"=>$value['product_name']);
           }
       }
       return $response;
       // return $query->row();

   }

   public function isExistSupplier($supplier){
       try{
           $this->db->select('supplier_name,supplier_id');
           $this->db->from('supplier_information');
           $this->db->where('supplier_name',$supplier);
           $this->db->where('is_deleted',0);
           $query=$this->db->get();
           $story_array = array();
           if($this->db->affected_rows() > 0){
               $story_array = $query->row();
               return $story_array;
           }else{
               return false;
           }
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

 
}

 ?>
