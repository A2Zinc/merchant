<?php

class Api_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
    $set_timezone = $this->get_web_setting_data();
    date_default_timezone_set($set_timezone->timezone);
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


   public function isUserExist($username){
       try{
           $this->db->select('username');
           $this->db->from('user_login');
           $this->db->where('username',$username);
           $this->db->where('status',1);

           $query=$this->db->get();
               if($this->db->affected_rows() > 0){
                   return true;
               }else{
                   return false;
               }
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function get_user_id_by_username($username){
       try{
           $this->db->select('user_id');
           $this->db->from('user_login');
           $this->db->where('username', $username);
           $query = $this->db->get();
           return $query->row()->user_id;
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function getRoleData($username){
       try{
           $this->db->select('users.first_name,users.last_name,users.nick_name,front_roles.role_name,user_login.*');  //chnages
           $this->db->from('user_login');
           $this->db->join('front_roles','user_login.user_type = front_roles.id', 'LEFT');
           $this->db->join('users','user_login.user_id = users.user_id', 'LEFT');
           $this->db->where('user_login.username',$username);

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

  public function checkPermission($user_id, $module, $Role_id){
      try {
          $mod = $module.'_rights';
          $this->db->select($mod);
          $this->db->from('front_role_extra_permission');
          $this->db->where('user_id',$user_id);
          $query = $this->db->get();
          if(!empty($query->row()->$mod)){
              return 1;
          }else {
              $this->db->select($mod);
              $this->db->from('front_role_permission');
              $this->db->where('Role_id', $Role_id);
              $query1 = $this->db->get();
              if(!empty($query1->row()->$mod)) {
                  return 1;
              } else {
                  return 0;
              }
          }
      } catch (Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function getProductData($barcode){
      $pad_barcode = str_pad($barcode,8,"0",STR_PAD_LEFT);
      try{
          $this->db->select('brand.brand_name,brand.brand_id,product_category.category_id,product_category.parent_category_id,product_category.category_name,product_category.Applicable_Tax as cat_Applicable_Tax,product_category.Applicable_CRV as cat_Applicable_CRV,product_category.measurement_type,product_information.*,
            if(product_information.short_name != "",product_information.short_name, product_information.product_name) AS product_name');
          $this->db->from('product_information');
          $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
          $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
          $this->db->where('product_information.is_deleted',0);
          $this->db->where('product_information.is_archive_scratcher',0);
          $this->db->group_start();
          $this->db->where('product_information.case_UPC',$barcode);
          $this->db->or_where('product_information.case_UPC',$pad_barcode);
          $this->db->group_end();
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

    public function recentitem(){
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

  public function insert_product($data,$status,$table_from,$upc_code){
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
        $this->db->select('measurement_type,age_restrict,Applicable_CRV,Applicable_Tax,measurement_value,is_last_size');
        $this->db->from('product_category');
        $this->db->where('category_id',$category_id);
        $query1 = $this->db->get();
        //echo $this->db->last_query();
        $size_type = $query1->row()->measurement_type;
        $age_restrict = $query1->row()->age_restrict;
        $Applicable_CRV = $query1->row()->Applicable_CRV;
        $Applicable_Tax = $query1->row()->Applicable_Tax;
        $measurement_value = $query1->row()->measurement_value;
        $is_last_size = $query1->row()->is_last_size;
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
            'is_last_size' => $is_last_size,
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

                $master_arr["is_cashback"]       = $result[0]->is_cashback;
                $master_arr["cashback_fee"]      = $result[0]->cashback_fee;
                $master_arr["cashback_amount"]   = $result[0]->cashback_amount;
                $master_arr["redeem_discount"]   = $result[0]->redeem_discount;

                $this->db->select('order_details.*,product_information.onsale_price,product_information.store_promotion_price');
                $this->db->from('order_details');
                $this->db->join('product_information','product_information.product_id=order_details.product_id','LEFT');
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
             $this->db->select('product_name,product_id,image_thumb');
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

   public function fetch_product_name($searchtxt,$size_i){
       $this->db->select('product_id,product_name,image_thumb,case_UPC');
       $this->db->from('product_information');
       $this->db->where('is_deleted', 0);
       $this->db->like('product_name', $searchtxt, 'both');
       if($size_i != ''){
           $this->db->where('size', $size_i);
       }
       $this->db->limit(50); //Additional
       $query=$this->db->get();
       $response=array();
       if ($query->num_rows() > 0) {
           $count=0;
           $fetch_record=$query->result_array();
           foreach ($fetch_record  as $key => $value) {
               $response[] = array(
               "product_id"   =>$value['product_id'],
               "product_name" =>$value['product_name'],
               "product_img"  =>base_url().substr($value['image_thumb'], 2),
               "case_UPC"     =>$value['case_UPC'],
             );
           }
       }
       return $response;
   }

   public function get_all_sizes() {
     try{
         $query =$this->db->get('tbl_size');
         return $query->result_array();
     }catch(Exception $ex){
         error_log($ex->getTraceAsString());
         echo $ex->getTraceAsString();
         return FALSE;
     }
   }

   public function delete_promotion($promotion_id){
     // delete method
       $this->db->set('is_deleted', 1);
       $this->db->where("coupon_id", $promotion_id);
       return $this->db->update("coupon_new");
   }


   public function get_all_customer() {
      try{
          $this->db->select('customer_id,first_name,last_name,customer_email,customer_mobile,customer_address_1,customer_address_2,city,zip');
          $this->db->from('customer_information');
          $this->db->where('is_active', 1);
          // $this->db->where('user_id >', 1);
          $query =$this->db->get();
          return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
   }

   public function get_customer_by_id($customer_id){
     try{
         $this->db->select('countries.name,customer_information.customer_id,customer_information.customer_name,customer_information.first_name,customer_information.last_name,customer_information.customer_address_1,customer_information.customer_short_address,customer_information.customer_address_2,customer_information.city,customer_information.state,customer_information.country,customer_information.zip,customer_information.customer_mobile,customer_information.customer_email');
         $this->db->from('customer_information');
         $this->db->join('countries', 'countries.id = customer_information.country', 'LEFT');
         $this->db->where('customer_information.customer_id', $customer_id);
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


   public function fetchCountry(){
        try{
            $this->db->order_by("name", "ASC");
            $query = $this->db->get("countries");
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
      }
  }

  public function fetchStatebyCountry($countryId){
      try{
         $this->db->where('country_id', $countryId);
          $this->db->order_by('name', 'ASC');
          $query = $this->db->get('states');
          return $query->result();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

   public function insert_customer($data){
       if($this->db->insert('customer_information', $data)){
            $arrayName = array(
               'customer_id'    => $data['customer_id'],
               'redeem_point'   => $this->get_customer_reg_point(),
               'point_type'     => 1,
               'created_at'     => date('Y-m-d H:i:s'),
               'updated_at'     => date('Y-m-d H:i:s'),
            );
            $this->db->insert('customer_redeem_point_master',$arrayName);
           return TRUE;
       }else{
           return FALSE;
       }
   }

   public function update_customer($customer_id,$data){
       $this->db->where('customer_id', $customer_id);
       return $this->db->update("customer_information", $data);
   }

   public function delete_customer($customer_id){
     $this->db->set('is_active', 0);
     $this->db->where('customer_id', $customer_id);
     return $this->db->update('customer_information');
   }

   public function get_country_by_id($country_id){
       $this->db->select('id,name,sortname');
       $this->db->from('countries');
       $this->db->where('id', $country_id);
       $query=$this->db->get();
       return $query->row();
   }


   public function get_state_by_id($state_id,$country_id){
       $this->db->select('id,name,iso2');
       $this->db->from('states');
       $this->db->where('iso2', $state_id);
       $this->db->where('country_id', $country_id);
       $query=$this->db->get();
       return $query->row();
   }

   public function get_all_leave(){
       try{
           $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
               $this->db->from('tbl_emp_leave');
               $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
               $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
               $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
               $this->db->where_not_in('tbl_emp_leave.status', 'Cancelled');
               $query =$this->db->get();
               return $query->result_array();
       }catch(Exception $ex){
               error_log($ex->getTraceAsString());
               echo $ex->getTraceAsString();
               return FALSE;
           }

   }

   public function get_all_cash_advance(){
       try{
           $this->db->select('users.first_name,users.last_name,tbl_advance.*');
           $this->db->from('tbl_advance');
           $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
           $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
           $this->db->where_not_in('tbl_advance.status', 'Cancelled');
           $query =$this->db->get();
           return $query->result_array();
       }catch(Exception $ex){
               error_log($ex->getTraceAsString());
               echo $ex->getTraceAsString();
               return FALSE;
       }

   }

   public function fetch_emp_by_search($searchtxt,$status){
       try{
         $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
          $this->db->from('tbl_emp_leave');
          $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
          $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
          $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
          $this->db->group_start();
          $this->db->like('first_name',$searchtxt);
          $this->db->or_like('last_name',$searchtxt);
          $this->db->or_like('employee_id',$searchtxt);
          $this->db->or_like('employee_name',$searchtxt);
          $this->db->group_end();
          if($status=="All"){
              $this->db->where('tbl_emp_leave.id >',0);
          }else{
              $this->db->where('tbl_emp_leave.status', $status);
          }
          $query =$this->db->get();
           // return $query->result_array();
           // $query =$this->db->get();
           return $query->result_array();
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }

   }

   public function filter_emp_leave_by_status($leave_status){
       try{
          if($leave_status=='All'){
               $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
               $this->db->from('tbl_emp_leave');
               $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
               $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
               $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
               $query =$this->db->get();
               return $query->result_array();
          }else{
               $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
               $this->db->from('tbl_emp_leave');
               $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
               $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
               $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
               $this->db->where('tbl_emp_leave.status',$leave_status);
               $query =$this->db->get();
               return $query->result_array();
           }
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }

   }

   public function fetch_cash_employee($searchtxt,$status){
        try{
            $this->db->select('users.first_name,users.last_name,tbl_advance.*');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->group_start();
            $this->db->like('first_name',$searchtxt);
            $this->db->or_like('last_name',$searchtxt);
            $this->db->or_like('employee_id',$searchtxt);
            $this->db->or_like('employee_name',$searchtxt);
            $this->db->group_end();
            if($status=="All"){
                $this->db->where('tbl_advance.id >',0);
            }else{
                $this->db->where('tbl_advance.status', $status);
            }
            $query =$this->db->get();
            // return $query->result_array();
            // $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function filter_cash_advance($status){
        try{
             if($status=='All'){
               $this->db->select('users.first_name,users.last_name,tbl_advance.*');
               $this->db->from('tbl_advance');
               $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
               $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
               $query =$this->db->get();
               return $query->result_array();
           }else{
               $this->db->select('users.first_name,users.last_name,tbl_advance.*');
               $this->db->from('tbl_advance');
               $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
               $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
               $this->db->where('tbl_advance.status',$status);
               $query =$this->db->get();
               return $query->result_array();
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_leaveType() {
        try{
            $this->db->select('id,leave_type');
            $this->db->from('tbl_leave_type');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function getAccruedLeaves(){
        try{
            $this->db->select('hours_accrued_leave');
            $this->db->from('tbl_timesheet');
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

    public function getMaxLeaves($leave_type){
        try{
            $this->db->select('max_leave');
            $this->db->from('tbl_leave_type');
            $this->db->where('id', $leave_type);
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

    public function empExits($emp_id,$leave_type){
        try{
            $this->db->select('*');
            $this->db->from('tbl_leave_statistics');
            $this->db->where('employee_id',$emp_id);
            $this->db->where('leave_type',$leave_type);
            $query=$this->db->get();

            $sto_array = array();
            if($this->db->affected_rows() > 0){
                $sto_array = $query->row();

                $maximum_leaves = $sto_array->maximum_leaves;
                $maximum_hr = $sto_array->maximum_accrued_hr;
                $req_hr = $sto_array->req_leave_hours;
                $leaves_taken = $sto_array->leaves_taken;

                $this->db->select('COUNT("status") as status_count, SUM(hours_requested) as req_hr, SUM(days_requested) as req_day');
                $this->db->from('tbl_emp_leave');
                $this->db->where('employee_id',$emp_id);
                $this->db->where('leaveType',$leave_type);
                $this->db->where('status','Approved');
                $query=$this->db->get();
                $leave_arr = $query->row();
                $status_count = $leave_arr->status_count;
                $hours_requested = $leave_arr->req_hr;
                $days_requested = $leave_arr->req_day;
                $arrayName = array(
                    'maximum_leaves' => $maximum_leaves,
                    'status_count' => $status_count,
                    'maximum_hr' => $maximum_hr,
                    'requested_hr' => $req_hr,
                    'hours_requested' => $hours_requested,
                    'days_requested' => $days_requested,
                    'leaves_taken' => $leaves_taken,
                );
                return $arrayName;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_leave_statistics($arrayName){
        try{
            if($this->db->insert('tbl_leave_statistics', $arrayName)){
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

    public function update_leave_statistics($arrayName,$emp_id,$leave_type){
        try{
            $this->db->where('employee_id', $emp_id);
            $this->db->where('leave_type', $leave_type);
            if($this->db->update('tbl_leave_statistics',$arrayName)){
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

    public function insert_leave($data){
        try{
            if($this->db->insert('tbl_emp_leave', $data)){
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

    public function change_leave_status($leave_id,$data){
        try{
            $this->db->where('id', $leave_id);
            if($this->db->update('tbl_emp_leave',$data)){
              return $data['status'];
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function change_advcash_status($cash_id,$data){
        try{
           $this->db->where('id', $cash_id);
           if($this->db->update('tbl_advance',$data)){
               return $data['status'];
           }else{
               return FALSE;
           }
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }

    public function get_leaverequests_by_type($leave_req_type,$emp_id,$fdate_n,$to_n){
        try{

            // $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
            $this->db->select('tbl_emp_leave.id,tbl_emp_leave.employee_name,tbl_emp_leave.start_date,tbl_emp_leave.end_date,tbl_emp_leave.leaveType,tbl_emp_leave.reason,tbl_emp_leave.status,tbl_emp_leave.deny_reason,tbl_leave_type.leave_type');
            $this->db->from('tbl_emp_leave');
            $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');            //$this->db->where('is_delete',0);
            if($leave_req_type=="month"){
              $this->db->where('MONTH(tbl_emp_leave.created_at)', date('m') );
            }elseif($leave_req_type=='week'){
              $this->db->where('tbl_emp_leave.created_at <=', date('Y-m-d', strtotime('1 week')));
              $this->db->where('tbl_emp_leave.created_at >', date('Y-m-d', strtotime('-1 day')));
            }elseif($leave_req_type=='daterange'){
              $this->db->where('tbl_emp_leave.created_at >=', $fdate_n);
              $this->db->where('tbl_emp_leave.created_at <=', $to_n);
            }elseif($leave_req_type==''){
                $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
                $this->db->limit('4');
            }
            $this->db->where('tbl_emp_leave.employee_id', $emp_id);  //added prashant
            $query=$this->db->get();
            return $query->result();

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_cashadv_by_type($cash_req_type,$emp_id,$fdate_n,$to_n){
        try{
            $this->db->select('tbl_advance.id,tbl_advance.employee_id,tbl_advance.employee_name,tbl_advance.advance_amount,tbl_advance.status,tbl_advance.reason,tbl_advance.paycheck,tbl_advance.created_at');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            if($cash_req_type=="month"){
                $this->db->where('MONTH(tbl_advance.created_at)', date('m') );
            }elseif($cash_req_type=='week'){
                $this->db->where('tbl_advance.created_at <=', date('Y-m-d', strtotime('1 week')));
                $this->db->where('tbl_advance.created_at >', date('Y-m-d', strtotime('-1 day')));
            }elseif($cash_req_type=='daterange'){
                $this->db->where('tbl_advance.created_at >=', $fdate_n);
                $this->db->where('tbl_advance.created_at <=', $to_n);
            }
            $this->db->where('tbl_advance.employee_id', $emp_id);
            $query=$this->db->get();
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_advance_cash($data){
        try{
            if($this->db->insert('tbl_advance', $data)){
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

    public function leave_addinfo($leave_id,$data){
        try{
            $this->db->where('id', $leave_id);
            if($this->db->update('tbl_emp_leave',$data)){
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

    public function cash_addinfo($cash_id,$data){
        try{
           $this->db->where('id', $cash_id);
           if($this->db->update('tbl_advance',$data)){
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

    // public function get_leave_by_id($leave_id){
    //     try{
    //         $this->db->select('*');
    //         $this->db->from('tbl_emp_leave');
    //         $this->db->where('id', $leave_id);
    //         $query = $this->db->get();

    //         $array = array();
    //         if($this->db->affected_rows() > 0) {
    //             $array = $query->row();
    //         }
    //         return $array;
    //     }catch(Exception $ex) {
    //         error_log($ex->getTraceAsString());
    //         echo $ex->getTraceAsString();
    //         return FALSE;
    //     }
    // }


    public function get_leave_by_id($leave_id,$emp_id){
        try{
            $this->db->select('*');
            $this->db->from('tbl_emp_leave');
            $this->db->where('id', $leave_id);
            $query = $this->db->get();

            $leave_type = $query->row()->leaveType;

            $this->db->select('*');
            $this->db->from('tbl_leave_statistics');
            $this->db->where('employee_id', $emp_id);
            $this->db->where('leave_type', $leave_type);
            $query2=$this->db->get();

            $sto_array = array();
            if($this->db->affected_rows() > 0){
                $sto_array = $query2->row();

                $maximum_leaves = $sto_array->maximum_leaves;
                $maximum_hr = $sto_array->maximum_accrued_hr;
                $req_hr = $sto_array->req_leave_hours;
                $leaves_taken = $sto_array->leaves_taken;

                $this->db->select('COUNT("status") as status_count, SUM(hours_requested) as req_hr, SUM(days_requested) as req_day');
                $this->db->from('tbl_emp_leave');
                $this->db->where('employee_id',$emp_id);
                $this->db->where('leaveType',$leave_type);
                $this->db->where('status','Approved');
                $query1=$this->db->get();
                $leave_arr = $query1->row();
                $status_count = $leave_arr->status_count;
                $hours_requested = $leave_arr->req_hr;
                $days_requested = $leave_arr->req_day;
                $arrayName = array(
                    'maximum_leaves' => $maximum_leaves,
                    'status_count' => $status_count,
                    'maximum_hr' => $maximum_hr,
                    'requested_hr' => $req_hr,
                    'leaves_taken' => $leaves_taken,
                    'remaining_leaves' => $maximum_leaves - $days_requested,
                    'remaining_hr' => $maximum_hr - $hours_requested,
                    'leaveType' => $leave_type,
                    'days_requested' => $query->row()->days_requested,
                    'hours_requested' => $query->row()->hours_requested,
                    'start_date' => $query->row()->start_date,
                    'end_date' => $query->row()->end_date,
                    'reason' => $query->row()->reason,
                    'leave_id'=> $leave_id,
                );
                return $arrayName;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_cash_by_id($cash_id){
        try{
            $this->db->select('*');
            $this->db->from('tbl_advance');
            $this->db->where('id', $cash_id);
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

    public function get_MaxLeave($leave_type){
        try{
            $this->db->select('max_leave as remaining_leave');
            $this->db->from('tbl_leave_type');
            $this->db->where('id', $leave_type);
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

    public function update_leave($leave_id,$data){
        try{
            $this->db->where('id', $leave_id);
            $this->db->update('tbl_emp_leave',$data);
            if($this->db->affected_rows() > 0){
                return TRUE;
            } else {
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_leave($leave_id,$data){
        try{
            $this->db->where('id', $leave_id);
            $this->db->update('tbl_emp_leave', $data);
            if($this->db->affected_rows() > 0){
                return TRUE;
            } else {
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_advancecash($cash_id,$data){
        try{
            $this->db->where('id',$cash_id);
            if($this->db->update('tbl_advance',$data)){
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

    public function delete_cash($cash_id){
        try{
            $this->db->set('status', 'Cancelled');
            $this->db->where('id', $cash_id);
            $this->db->update('tbl_advance');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function getUserData($username){
        try{
          $this->db->select('users.first_name, users.last_name, users.gender');  //chnages
          $this->db->from('users');
          $this->db->join('user_login','user_login.user_id = users.user_id','LEFT');
          $this->db->where('username',$username);

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

    public function insertTimesheet($data){
        try{
            $this->db->insert('user_timesheet', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

  public function get_permission_ajax($Role_id) {
      try {
          $this->db->select('pos_rights, reports_rights, inventory_rights, loyalty_rights, store_rights, hrms_rights, submit_timecard_rights, e_order_rights, market_place_rights');
          $this->db->from('front_role_permission');
          $this->db->where('Role_id', $Role_id);
          $query = $this->db->get();
          if($this->db->affected_rows() > 0){
              return $query->row();
          } else {
              return 0;
          }
      } catch (Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_perm_ajax($user_id) {
      try {
          $this->db->select('pos_rights, reports_rights, inventory_rights, loyalty_rights, store_rights, hrms_rights, submit_timecard_rights, e_order_rights, market_place_rights');
          $this->db->from('front_role_extra_permission');
          $this->db->where('user_id', $user_id);
          $query = $this->db->get();
          if($this->db->affected_rows() > 0){
              return $query->row();
          } else {
              return 0;
          }
      } catch (Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_all_products($limit,$offset) {
      try{
          $this->db->select('product_category.category_id,product_category.category_name,product_information.*');
          $this->db->from('product_information');
          $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
          $this->db->where('product_information.is_deleted', 0);
          $this->db->order_by('id', 'DESC');
          $this->db->limit($limit,$offset);
          $query =$this->db->get();
          return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_rows(){
      try{
          $this->db->select('id');
          $this->db->from('product_information');
          $this->db->where('is_deleted', 0);
          $this->db->where('is_scratchable', 0);
          $this->db->order_by('id', 'DESC');
          $query =$this->db->get();
          return $query->num_rows();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_all_leave_hrms($emp_id){
      try{
          $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
          $this->db->from('tbl_emp_leave');
          $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
          $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
          $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
          $this->db->where('tbl_emp_leave.employee_id', $emp_id);
          $this->db->order_by('tbl_emp_leave.updated_at', 'DESC' );
          $this->db->limit('4');
          $query =$this->db->get();
          return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_cash_advance_hrms($emp_id) {
     try{
         $this->db->select('users.first_name,users.last_name,tbl_advance.*');
         $this->db->from('tbl_advance');
         $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
         $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
         $this->db->where('tbl_advance.employee_id', $emp_id);
         $this->db->order_by('tbl_advance.created_at', 'DESC');
         $this->db->limit('4');
         $query =$this->db->get();
         return $query->result_array();
     }catch(Exception $ex){
         error_log($ex->getTraceAsString());
         echo $ex->getTraceAsString();
         return FALSE;
     }
  }

 //  public function fetch_product_by_text(){
 //    $product_name = $this->input->get('product');
 //    $brand_name = $this->input->get('brand');
 //    $category_name = $this->input->get('category');
 //    $case_upc = $this->input->get('upc');

 //    $current_page = $this->input->get('current_page');
 //    $limit = 20;
 //    $offset = ($current_page - 1) * $limit;

 //     $this->db->select('brand.brand_name,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
 //     $this->db->from('product_information');
 //     $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
 //     $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
 //     $this->db->where('is_deleted', 0);
 //     $this->db->where('is_scratchable', 0);

 //     if(!empty($case_upc)){
 //        $this->db->where('product_information.case_UPC',$case_upc);
 //     }else{
 //        if(!empty($product_name && $brand_name && $category_name) ){
 //          $this->db->like('product_information.product_name',$product_name);
 //          $this->db->where('brand.brand_name',$brand_name);
 //          $this->db->where('product_category.category_name',$category_name);
 //        }
 //        if(!empty($product_name && $brand_name) ){
 //          $this->db->like('product_information.product_name',$product_name);
 //          $this->db->where('brand.brand_name',$brand_name);
 //        }
 //        if(!empty($product_name && $category_name) ){
 //          $this->db->like('product_information.product_name',$product_name);
 //          $this->db->where('product_category.category_name',$category_name);
 //        }
 //        if(!empty($brand_name && $category_name) ){
 //            $this->db->like('product_category.category_name',$category_name);
 //            $this->db->where('brand.brand_name',$brand_name);
 //        }

 //        if(!empty($product_name) && empty($brand_name && $category_name) ){
 //            $this->db->like('product_information.product_name',$product_name);
 //        }

 //        if(!empty($brand_name) && empty($product_name && $category_name) ){
 //            $this->db->like('brand.brand_name',$brand_name);
 //        }

 //        if(!empty($category_name) && empty($brand_name && $product_name) ){
 //            $this->db->like('product_category.category_name',$category_name);
 //        }

 //        $this->db->limit($limit,$offset);
 //    }

 //    $query = $this->db->get();

 //    if($query->num_rows()>0){
 //        $response = array(
 //          'current_page' => $current_page,
 //          'total_pages' => ceil($query->num_rows() / $limit),
 //          'products' => $query->result(),
 //       );
 //     return $response;
 //    }
 // }

//   public function fetch_product_by_text(){
//     $product_name = $this->input->get('product');
//     $brand_name = $this->input->get('brand');
//     $category_name = $this->input->get('category');
//     // $case_upc = $this->input->get('upc');

//     $current_page = $this->input->get('current_page');
//     $limit = 20;
//     $offset = ($current_page - 1) * $limit;

//     $this->db->select('brand.brand_name,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
//     $this->db->from('product_information');
//     $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
//     $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
//     $this->db->where('is_deleted', 0);
//     $this->db->where('is_scratchable', 0);

//     // if(empty($case_upc)){
//     if(!empty($product_name && $brand_name && $category_name) ){
//       $this->db->like('product_information.product_name',$product_name);
//       $this->db->or_like('brand.brand_name',$brand_name);
//       $this->db->or_like('product_category.category_name',$category_name);
//     }
//     if(!empty($product_name && $brand_name) ){
//       $this->db->like('product_information.product_name',$product_name);
//       $this->db->or_like('brand.brand_name',$brand_name);
//     }
//     if(!empty($product_name && $category_name) ){
//       $this->db->like('product_information.product_name',$product_name);
//       $this->db->or_like('product_category.category_name',$category_name);
//     }
//     if(!empty($brand_name && $category_name) ){
//         $this->db->like('product_category.category_name',$category_name);
//         $this->db->or_like('brand.brand_name',$brand_name);
//     }

//     if(!empty($product_name) && empty($brand_name && $category_name) ){
//         $this->db->like('product_information.product_name',$product_name);
//     }

//     if(!empty($brand_name) && empty($product_name && $category_name) ){
//         $this->db->like('brand.brand_name',$brand_name);
//     }

//     if(!empty($category_name) && empty($brand_name && $product_name) ){
//         $this->db->like('product_category.category_name',$category_name);
//     }

//     $this->db->limit($limit,$offset);
//     $query = $this->db->get();

//     if($query->num_rows()>0){
//         $response = array(
//           'current_page' => $current_page,
//           'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
//           'products' => $query->result(),
//        );
//      return $response;
//     }

// }

public function search_product_num_rows($product_name,$brand_name,$category_name){
    try{
        $this->db->select('brand.brand_name,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
        $this->db->from('product_information');
        $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
        $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_scratchable', 0);
        if(!empty($product_name && $brand_name && $category_name) ){
          $this->db->like('product_information.product_name',$product_name);
          $this->db->or_like('brand.brand_name',$brand_name);
          $this->db->or_like('product_category.category_name',$category_name);
        }elseif(!empty($product_name && $brand_name) ){
          $this->db->like('product_information.product_name',$product_name);
          $this->db->or_like('brand.brand_name',$brand_name);
        }elseif(!empty($product_name && $category_name) ){
          $this->db->like('product_information.product_name',$product_name);
          $this->db->or_like('product_category.category_name',$category_name);
        }elseif(!empty($brand_name && $category_name) ){
            $this->db->like('brand.brand_name',$brand_name);
            $this->db->or_like('product_category.category_name',$category_name);
        }elseif(!empty($product_name) && empty($brand_name && $category_name) ){
            $this->db->like('product_information.product_name',$product_name);
        }elseif(!empty($brand_name) && empty($product_name && $category_name) ){
            $this->db->like('brand.brand_name',$brand_name);
        }elseif(!empty($category_name) && empty($brand_name && $product_name) ){
            $this->db->like('product_category.category_name',$category_name);
        }
        $query =$this->db->get();
        return ceil($query->num_rows() / 20);
    }catch(Exception $ex){
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
    }
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

  public function fetch_product_by_upc(){
    $case_upc = $this->input->get('upc');
    $current_page = $this->input->get('current_page');
    $limit = 20;
    $offset = ($current_page - 1) * $limit;

    $this->db->select('brand.brand_name,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,
    product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,
    product_information.scratcher_status');
    $this->db->from('product_information');
    $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
    $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
    $this->db->where('is_deleted', 0);
    $this->db->where('is_scratchable', 0);

    $this->db->like('product_information.case_UPC',$case_upc);
    $this->db->limit($limit,$offset);

    $query = $this->db->get();

    if($query->num_rows()>0){
        $response = array(
          'current_page' => $current_page,
          'total_pages' => $this->search_product_upc_rows($case_upc),
          'products' => $query->result(),
       );
     return $response;
    }

}

public function search_product_upc_rows($case_upc){
    try{
        $this->db->select('brand.brand_name,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,
        product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,
        product_information.scratcher_status');
        $this->db->from('product_information');
        $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
        $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_scratchable', 0);
        $this->db->like('product_information.case_UPC',$case_upc);
        $query =$this->db->get();
        return ceil($query->num_rows() / 20);
    }catch(Exception $ex){
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
    }
}

  public function synk_query_data($synk_query){
     if($this->db->query($synk_query)){
         return TRUE;
     }else{
         return FALSE;
     }
  }

  //latest search produuct apis
public function fetch_product_by_text(){
	try{
		$product_name = $this->input->get('product');
	    $brand_name = $this->input->get('brand');
	    $category_name = $this->input->get('category');
	    $case_upc = $this->input->get('upc');

	    $current_page = $this->input->get('current_page');
	    $limit = 20;
	    $offset = ($current_page - 1) * $limit;

	    $this->db->select('brand.brand_name,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
	    $this->db->from('product_information');
	    $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
	    $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
	    $this->db->where('is_deleted', 0);
	    $this->db->where('is_scratchable', 0);

	    if(!empty($case_upc) && is_numeric($case_upc)){
	        $this->db->like('product_information.case_UPC ',$case_upc);
	        $this->db->limit($limit,$offset);
	        $query = $this->db->get();
	        $result = $query->result();
	        if($query->num_rows() == 0){
	            if(!empty($product_name || $brand_name || $category_name)){
	                $this->db->select('brand.brand_name,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
	                $this->db->from('product_information');
	                $this->db->join('brand','brand.brand_id=product_information.brand_id','LEFT');
	                $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
	                $this->db->where('is_deleted', 0);
	                $this->db->where('is_scratchable', 0);
	            }elseif(!empty($product_name && $brand_name && $category_name) ){
	                $this->db->like('product_information.product_name',$product_name);
	                $this->db->or_like('brand.brand_name',$brand_name);
	                $this->db->or_like('product_category.category_name',$category_name);
	                $this->db->limit($limit,$offset);
	                $query1 = $this->db->get();
	                if($query1->num_rows()>0){
	                    $response = array(
	                      'current_page' => $current_page,
	                      'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                      'products' => $query1->result(),
	                    );
	                   return $response;
	                }
                }elseif(!empty($product_name && $brand_name) ){
	                $this->db->like('product_information.product_name',$product_name);
	                $this->db->or_like('brand.brand_name',$brand_name);
	                $this->db->limit($limit,$offset);
	                $query1 = $this->db->get();
	                if($query1->num_rows()>0){
	                    $response = array(
	                      'current_page' => $current_page,
	                      'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                      'products' => $query1->result(),
	                    );
	                   return $response;
	                }
	            }elseif(!empty($product_name && $category_name) ){
	                $this->db->like('product_information.product_name',$product_name);
	                $this->db->or_like('product_category.category_name',$category_name);
	                $this->db->limit($limit,$offset);
	                $query1 = $this->db->get();
	                if($query1->num_rows()>0){
	                    $response = array(
	                      'current_page' => $current_page,
	                      'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                      'products' => $query1->result(),
	                    );
	                   return $response;
	                }
              	}elseif(!empty($brand_name && $category_name) ){
	                $this->db->like('brand.brand_name',$brand_name);
	                $this->db->or_like('product_category.category_name',$category_name);
	                $this->db->limit($limit,$offset);
	                $query1 = $this->db->get();
                  	if($query1->num_rows()>0){
	                    $response = array(
	                        'current_page' => $current_page,
	                        'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                        'products' => $query1->result(),
	                    );
	                    return $response;
                  	}
	            }elseif(!empty($product_name) && empty($brand_name && $category_name) ){
                  	$this->db->like('product_information.product_name',$product_name);
                  	$this->db->limit($limit,$offset);
                  	$query1 = $this->db->get();
                  	if($query1->num_rows()>0){
	                     $response = array(
	                        'current_page' => $current_page,
	                        'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                        'products' => $query1->result(),
	                    );
	                    return $response;
                  	}
	            }elseif(!empty($brand_name) && empty($product_name && $category_name) ){
	                $this->db->like('brand.brand_name',$brand_name);
	                $this->db->limit($limit,$offset);
	                $query1 = $this->db->get();
	                if($query1->num_rows()>0){
	                    $response = array(
	                        'current_page' => $current_page,
	                        'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                        'products' => $query1->result(),
	                    );
	                    return $response;
	                }
	            }elseif(!empty($category_name) && empty($brand_name && $product_name) ){
	                $this->db->like('product_category.category_name',$category_name);
	                $this->db->limit($limit,$offset);
	                $query1 = $this->db->get();
	                if($query1->num_rows()>0){
	                    $response = array(
	                        'current_page' => $current_page,
	                        'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                        'products' => $query1->result(),
	                    );
	                    return $response;
	                }
	            }
	        }else{
	            if($query->num_rows()>0){
	                $response = array(
	                  'current_page' => $current_page,
	                  'total_pages' => $this->search_product_upc_rows($case_upc),
	                  'products' => $query->result(),
	               );
	               return $response;
	            }
	        }
	    }else{
          	if(!empty($product_name && $brand_name && $category_name) ){
	            $this->db->like('product_information.product_name',$product_name);
	            $this->db->or_like('brand.brand_name',$brand_name);
	            $this->db->or_like('product_category.category_name',$category_name);
	            $this->db->limit($limit,$offset);
	            $query = $this->db->get();
	            if($query->num_rows()>0){
	                $response = array(
	                  'current_page' => $current_page,
	                  'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                  'products' => $query->result(),
	               );
	             return $response;
	            }
          	}elseif(!empty($product_name && $brand_name) ){
              	$this->db->like('product_information.product_name',$product_name);
              	$this->db->or_like('brand.brand_name',$brand_name);
              	$this->db->limit($limit,$offset);
              	$query = $this->db->get();
              	if($query->num_rows()>0){
	                $response = array(
	                    'current_page' => $current_page,
	                    'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                    'products' => $query->result(),
	                );
               		return $response;
                }
            }elseif(!empty($product_name && $category_name) ){
              	$this->db->like('product_information.product_name',$product_name);
              	$this->db->or_like('product_category.category_name',$category_name);
              	$this->db->limit($limit,$offset);
	            $query = $this->db->get();
	            if($query->num_rows()>0){
	                $response = array(
	                    'current_page' => $current_page,
	                    'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
	                    'products' => $query->result(),
	                );
	               return $response;
	            }
            }elseif(!empty($brand_name && $category_name) ){
                $this->db->like('brand.brand_name',$brand_name);
                $this->db->or_like('product_category.category_name',$category_name);
                $this->db->limit($limit,$offset);
                $query = $this->db->get();
                if($query->num_rows()>0){
                    $response = array(
                      'current_page' => $current_page,
                      'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
                      'products' => $query->result(),
                   );
                 return $response;
                }
            }elseif(!empty($product_name) && empty($brand_name && $category_name) ){
                $this->db->like('product_information.product_name',$product_name);
                $this->db->limit($limit,$offset);
                $query = $this->db->get();
                if($query->num_rows()>0){
                    $response = array(
                      'current_page' => $current_page,
                      'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
                      'products' => $query->result(),
                   );
                 return $response;
                }
            }elseif(!empty($brand_name) && empty($product_name && $category_name) ){
                $this->db->like('brand.brand_name',$brand_name);
                $this->db->limit($limit,$offset);
                $query = $this->db->get();
                if($query->num_rows()>0){
                    $response = array(
                      'current_page' => $current_page,
                      'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
                      'products' => $query->result(),
                   );
                 return $response;
                }
            }elseif(!empty($category_name) && empty($brand_name && $product_name) ){
                $this->db->like('product_category.category_name',$category_name);
                $this->db->limit($limit,$offset);
                $query = $this->db->get();
                if($query->num_rows()>0){
                    $response = array(
                      'current_page' => $current_page,
                      'total_pages' => $this->search_product_num_rows($product_name,$brand_name,$category_name),
                      'products' => $query->result(),
                   );
                 return $response;
                }
            }
	    }
	}catch(Exception $ex){
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
    }


}

  public function get_all_scratcher_inventory_products($limit,$offset) {
    try{
        $this->db->select('product_category.category_id,product_category.category_name,product_information.id,product_information.product_id,product_information.store_id,
        product_information.supplier_id,product_information.shopify_product_id,product_information.parent_product,product_information.supplier,product_information.category_id,product_information.case_UPC,product_information.barcode_type,product_information.barcode_formats,product_information.mpn,product_information.manufacturer,product_information.product_name,product_information.short_name,product_information.Meta_Title,product_information.Meta_Key,product_information.Meta_Desc,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.product_details,product_information.image_thumb,product_information.brand_id,product_information.onsale,product_information.onsale_price,product_information.ecomm_sale_price,product_information.store_promotion_price,product_information.ecomm_promotion_price,product_information.size,product_information.proof,product_information.abv,product_information.region,product_information.producer,product_information.is_promotion_page,product_information.status,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.is_from_shopify,product_information.scratcher_no_from,product_information.scratcher_no_to,
        product_information.scratcher_status');
        $this->db->from('product_information');
        $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
        $this->db->where('product_information.is_deleted', 0);
        $this->db->where('product_information.is_scratchable', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit,$offset);
        $query =$this->db->get();
        return $query->result_array();
    }catch(Exception $ex){
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
    }
  }

  public function get_scratcher_products_rows(){
    try{
        $this->db->select('id');
        $this->db->from('product_information');
        $this->db->where('is_deleted', 0);
        $this->db->where('is_scratchable', 1);
        $this->db->order_by('id', 'DESC');
        $query =$this->db->get();
        return $query->num_rows();
    }catch(Exception $ex){
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
    }
  }

  public function get_productinfo_by_id($product_id){
    try{
        $this->db->select('shopify_product_id');
        $this->db->from('product_information');
        $this->db->where('product_id',$product_id);
        $query = $this->db->get();
        $array = array();
        if($this->db->affected_rows() > 0) {
            $array = $query->row();
        }
        return $array->shopify_product_id;
    }catch(Exception $ex) {
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
    }
  }

  public function add_scratcher($data){
      try{
          if($this->db->insert('product_information', $data)){
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

  public function update_scratcher($product_id,$data){
      try{
          $this->db->where('product_id', $product_id);
          if($this->db->update('product_information',$data)){
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

  public function fetch_scratcher_by_text(){
      $scratcher_name = $this->input->get('scratcher');
      $case_upc = $this->input->get('upc');

      $current_page = $this->input->get('current_page');
      $limit = 20;
      $offset = ($current_page - 1) * $limit;

      $this->db->select('product_information.id,product_information.product_id,product_information.store_id,product_information.case_UPC,product_information.product_name,product_information.short_name,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.onsale_price,product_information.status,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
      $this->db->from('product_information');
      $this->db->where('is_deleted', 0);
      $this->db->where('is_scratchable', 1);

      if(!empty($case_upc) && is_numeric($case_upc)){
          $this->db->like('product_information.case_UPC ',$case_upc);
          $this->db->limit($limit,$offset);
          $query = $this->db->get();
          $result = $query->result();
          if($query->num_rows() == 0){
            $this->db->select('product_information.id,product_information.product_id,product_information.store_id,product_information.case_UPC,product_information.product_name,product_information.short_name,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.onsale_price,product_information.status,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
            $this->db->from('product_information');
            $this->db->where('is_deleted', 0);
            $this->db->where('is_scratchable', 1);
            $this->db->like('product_information.product_name',$scratcher_name);
            $this->db->limit($limit,$offset);
            $query1 = $this->db->get();
            if($query1->num_rows()>0){
                $response = array(
                  'current_page' => $current_page,
                  'total_pages' => $this->scratcher_num_rows($scratcher_name),
                  'scratcher_products' => $query1->result(),
                );
               return $response;
            }
          }else{
              if($query->num_rows()>0){
                  $response = array(
                    'current_page' => $current_page,
                    'total_pages' => $this->scratcher_upc_rows($case_upc),
                    'scratcher_products' => $query->result(),
                 );
                 return $response;
              }
          }
      }else{
          $this->db->like('product_information.product_name',$scratcher_name);
          $this->db->limit($limit,$offset);
          $query2 = $this->db->get();

          $response = array(
            'current_page' => $current_page,
            'total_pages' => $this->scratcher_num_rows($scratcher_name),
            'scratcher_products' => $query2->result(),
          );
         return $response;
      }

  }

  public function scratcher_upc_rows($case_upc){
      try{
          $this->db->select('product_information.id,product_information.product_id,product_information.store_id,product_information.case_UPC,product_information.product_name,product_information.short_name,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.onsale_price,product_information.status,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
          $this->db->from('product_information');
          $this->db->where('is_deleted', 0);
          $this->db->where('is_scratchable', 1);
          $this->db->like('product_information.case_UPC',$case_upc);
          $query =$this->db->get();
          return ceil($query->num_rows() / 20);
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function scratcher_num_rows($scratcher_name){
      try{
          $this->db->select('product_information.id,product_information.product_id,product_information.store_id,product_information.case_UPC,product_information.product_name,product_information.short_name,product_information.price,product_information.supplier_price,product_information.unit,product_information.quantity,product_information.onsale_price,product_information.status,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
          $this->db->from('product_information');
          $this->db->where('is_deleted', 0);
          $this->db->where('is_scratchable', 1);
          $this->db->like('product_information.product_name',$scratcher_name);
          $query =$this->db->get();
          return ceil($query->num_rows() / 20);
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_scratcher_by_id($product_id){
      try{
        $this->db->select('product_information.id,product_information.product_id,product_information.store_id,product_information.case_UPC,product_information.product_name,product_information.short_name,product_information.price,product_information.supplier_price,product_information.unit,product_information.bin,product_information.quantity,product_information.onsale_price,product_information.status,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
        $this->db->from('product_information');
        $this->db->where('product_id', $product_id);
        $query =$this->db->get();
        $array = array();
        if($this->db->affected_rows() > 0) {
            $array = $query->row();
        }
        return $array;
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

    public function get_scratcher_by_upc($case_upc){
       try{
         $this->db->select('product_information.id,product_information.product_id,product_information.store_id,product_information.case_UPC,product_information.product_name,product_information.short_name,product_information.price,product_information.supplier_price,product_information.unit,product_information.bin,product_information.quantity,product_information.onsale_price,product_information.status,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
         $this->db->from('product_information');
         $this->db->where('case_UPC', $case_upc);
         $query =$this->db->get();
         $array = array();
         if($this->db->affected_rows() > 0) {
             $array = $query->row();
         }
         return $array;
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }

    public function recent_scratcher_items(){
        try{
            $this->db->select('product_information.id,product_information.product_id,product_information.store_id,product_information.case_UPC,product_information.product_name,product_information.short_name,product_information.price,product_information.supplier_price,product_information.unit,product_information.bin,product_information.quantity,product_information.onsale_price,product_information.status,product_information.is_ecommerce,product_information.is_deleted,product_information.is_custom_product,product_information.is_scratchable,product_information.scratcher_no_from,product_information.scratcher_no_to,product_information.scratcher_status');
            $this->db->from('product_information');
            $this->db->where('is_deleted', 0);
            $this->db->where('is_scratchable', 1);
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

    public function get_cash_modal_data(){
        try{
            $this->db->select('paycheck_amount,name');
            $this->db->from('web_setting');
            $query =$this->db->get();
            $paycheck_amt = $query->row()->paycheck_amount;
            $store_name = $query->row()->name;
            $this->db->select('paycheck,value');
            $this->db->from('tbl_paychecks');
            $query1 =$this->db->get();

            $data = array(
              'paycheck_amount' => $paycheck_amt,
              'store_name' => $store_name,
              'paychecks' =>  $query1->result(),

            );
            return $data;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function delete_product_image($product_id,$data){
        try{
            $this->db->where('product_id', $product_id);
            if($this->db->update('product_information',$data)){
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

    public function change_clock_in_out($attendance,$username){
        try{
            $this->db->set('clock_in_out', $attendance);
            $this->db->where('username',$username);
            if($this->db->update('user_login')){
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

    public function check_clock_in_out($username){
        try{
            $this->db->select('clock_in_out');  //chnages
            $this->db->from('user_login');
            $this->db->where('user_login.username',$username);
            $query=$this->db->get();
            return $query->row()->clock_in_out;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_custom_product($data){
        try{
            if($this->db->insert('product_information', $data)){
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

    public function update_paychecks($data){
        try{
            if($this->db->update('web_setting', $data)){
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


    public function get_customkey_data(){
        try{
            //IN VALUE NULL TO SHO DIFFERESNT AS EXPETEDUSE THIS CONDITION
            $this->db->select('customkey_id, is_taxable ,IFNULL((custom_key_settings.customkey_name),"Custom Key") as customkey_name, IFNULL((custom_key_settings.customkey_value),"0.00") as customkey_value' );
            $this->db->from('custom_key_settings');
            //$this->db->where('setting_id',1);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
            return false;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function existCustomKey($customkey_name,$customkey_id){
        try{
            $this->db->select('customkey_name');
            $this->db->from('custom_key_settings');
            $this->db->where('customkey_name',$customkey_name);
            $this->db->where('customkey_id !=',$customkey_id);

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



    public function update_key_setting(){
        try{
            $customkey_id = $this->input->post('customkey_id');
            $array_name  = array(
                'customkey_name'  => $this->input->post('customkey_name'),
                'customkey_value' => $this->input->post('customkey_value'),
                'is_taxable'      => (!empty($this->input->post('taxable'))) ? '1' : '0',
            );
            $data = $this->security->xss_clean($array_name);

            $this->db->select('*');
            $this->db->from('custom_key_settings');
            $this->db->where('customkey_id',$customkey_id);
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $this->db->where('customkey_id',$customkey_id);
                $this->db->update('custom_key_settings',$data);
                $responce = array(
                    'customkey_id' => $customkey_id,
                    'customkey_name' => $data['customkey_name'],
                    'customkey_value' => $data['customkey_value'],
                    'is_taxable' => $data['is_taxable'],
                    'status' => 'update',
                );
                return TRUE;
            }else{
                $this->db->insert('custom_key_settings',$data);
                return TRUE;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //prashant 21-June-2021
    public function get_web_setting_data(){
        try{
            $this->db->select('font_size,custom_msg,paycheck_amount,no_of_paychecks,pay_period,pay_date,cash_register,start_cash,cashback_fee,about_store,timezone,date_format,time_format,logo,node_status');
            $this->db->from('web_setting');
            $query = $this->db->get();
            if($this->db->affected_rows() > 0){
                return $query->row();
            } else {
                return FALSE;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_receipt_promotions(){
        try{
            $this->db->select('receipt_promotion,coupon_id');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted', 0);
            $this->db->where('is_footer', 1);
            $this->db->where('manage_type', 1);

            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_custom_msg(){
        try{
            $query =$this->db->get('tbl_custom_msg');
            return $query->result_array();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_receipt_msg(){
        try{

            if($this->input->post('new_msg') == '--Select Custom Message--'){
              $msg = $this->input->post('custom_msg');
            }else{
              $msg = $this->input->post('new_msg');
            }
            $exist = $this->isExistCustomeReceiptmsg($msg);
            if($exist == false){
                $dat['custom_receipt_msg'] = $msg;
                $this->db->insert('tbl_custom_msg',$dat);
            }

            $data = array(
                'custom_msg' => !empty($this->input->post('custom_receipt_msg')) ? $this->input->post('custom_receipt_msg') : $msg,
            );

            if($this->db->update('web_setting',$data)){
                return $data['custom_msg'];
            } else {
              return FALSE;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function isExistCustomeReceiptmsg($msg){
        try{
            $this->db->select('custom_receipt_msg');
            $this->db->from('tbl_custom_msg');
            $this->db->where('custom_receipt_msg',$msg);
            $query=$this->db->get();
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_receipt_promotion($coupon_id){
        try{
            $data = array(
                'is_footer'            => 0,
                'receipt_promotion'    => '',
            );
            $data = $this->security->xss_clean($data);
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

    public function retrieve_setting_editdata(){
        try{
            $this->db->select('setting_id,logo,footer_logo,footer_text,name,mobile,address,email,website,apps_url,instagram_url,twitter_url,facebook_url,Meta_Title,Meta_Key,Meta_Desc,language,secret_key');
            $this->db->from('web_setting');
            $this->db->where('setting_id',1);
            $query = $this->db->get();

            if ($query->num_rows() > 0) {
              return $query->row_array();
            }else{
              return false;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
  	}

    public function update_setting($data){
        try{
            $this->db->where('setting_id',1);
            $this->db->update('web_setting',$data);
            return true;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_scratcher_bins(){
        try{
            $this->db->select('*');  //chnages
            $this->db->from('tbl_scratcher_bins');
            $this->db->where('is_archive',0);
            $query=$this->db->get();
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_bins($bins){
        try{
            //$bins = $this->input->post('bins');
            $this->db->where('id >', '0');
            $delete = $this->db->delete('tbl_scratcher_bins');
            if($delete){
                for($temp = 1; $temp <= $bins; $temp++){
                    $dat = array(
                        'id' => $temp,
                        'bins' => 'Bin '.$temp,
                        'value' => $temp
                    );
                    $this->db->insert('tbl_scratcher_bins',$dat);
                }
            }
            return TRUE;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_custom_category() {
        try{
            $this->db->select('*');
            $this->db->from('custom_category_setting');
            $this->db->where('is_deleted', 0);
            // $this->db->group_by('name');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function add_category_btn(){
        $cat_id = $this->input->post('category_id');
        if($cat_id == '--Select Category--'){
            $cat_id = '0';
            $cattname = $this->input->post('custom_category');
        }else{
            $cat_id = $this->input->post('category_id');
            $dat = $this->get_cat_name($cat_id);
            $cattname = $dat->category_name;
        }
        $arrayName = array(
            'name' => $cattname ,
            'category_id' => $cat_id,
        );

        $this->db->insert('custom_category_setting', $arrayName);
        $insert_id = $this->db->insert_id();//
        $hidden = $this->input->post('combo_row');
        foreach ($hidden as $value) {
            $catdata = [];
            $catdata['cat_id'] = $insert_id;
            $catdata['name'] =   $this->input->post('name_'.$value);
            $catdata['value'] =  $this->input->post('price_'.$value);
            $catdata['is_crv'] = (!empty($this->input->post('CRV_'.$value)) ? 1: 0);
            $catdata['is_taxable'] = (!empty($this->input->post('Tax_'.$value)) ? 1: 0);

            if($catdata['is_crv'] == 0){
                $catdata['percent'] = 0;
            }else{
                $catdata['percent'] = (!empty($this->input->post('percent_'.$value)) ? $this->input->post('percent_'.$value): '');
            }

            $this->db->insert('custom_category_setting_details', $catdata);
        }

        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function get_cat_name($cat_id){
        $this->db->select('category_name');
        $this->db->from('product_category');
        $this->db->where('category_id',$cat_id);
        $query=$this->db->get();
        $story_array = array();
        if($this->db->affected_rows() > 0){
            $story_array = $query->row();
            return $story_array;
        }else{
            return false;
        }
    }

    public function update_custom_category(){
        try{
            if($this->input->post('category_id') == '0' || $this->input->post('category_id') == '--Select Category--'){
                $cattname = $this->input->post('custom_category');
            }else{
                $cat_id = $this->input->post('category_id');
                $dat = $this->get_cat_name($cat_id);
                $cattname = $dat->category_name;
            }

            $id =$this->input->post('cat_id');
            $dat = array(
              'category_id'=> (!empty($cat_id)) ? $cat_id : 0,
              'name' => $cattname);
            $this->db->where('id', $id);
            $this->db->update('custom_category_setting', $dat); //only update Category Name

            $this->db->where('cat_id', $id);
            $this->db->delete('custom_category_setting_details');

            $cat_id = $this->input->post('category_id');
            if($cat_id == '--Select Category--'){
                $cat_id = '0';
            }else{
                $cat_id = $this->input->post('category_id');
            }
            $arrayName = array(
              'name' => $this->input->post('custom_category'),
              'category_id' => $cat_id,
            );


            $hidden = $this->input->post('combo_row');

            foreach ($hidden as $value) {
                $catdata = [];
                $catdata['cat_id'] = $id;
                $catdata['name'] =   $this->input->post('name_'.$value);
                $catdata['value'] =  $this->input->post('price_'.$value);
                $catdata['is_crv'] = (!empty($this->input->post('CRV_'.$value)) ? 1: 0);
                $catdata['is_taxable'] = (!empty($this->input->post('Tax_'.$value)) ? 1: 0);
                if($catdata['is_crv'] == 0){
                  $catdata['percent'] = 0;
                }else{
                  $catdata['percent'] = (!empty($this->input->post('percent_'.$value)) ? $this->input->post('percent_'.$value): '');
                }

                $this->db->insert('custom_category_setting_details', $catdata);
            }

            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function delete_custom_category($cat_id){
        try{
          $this->db->set('is_deleted', 1);
          $this->db->where('id',$cat_id);
          $this->db->update('custom_category_setting');
          $this->db->set('is_deleted', 1);
          $this->db->where('cat_id',$cat_id);
          $this->db->update('custom_category_setting_details');
          return TRUE;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_tax(){
        try{
            $this->db->select('*');
            $this->db->from('tax_setting');
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

    public function updateTax($data){
        try{
            $this->db->where('tax_setting_id', 1);
            if($this->db->update('tax_setting',$data)){
                $response['tax'] = $data['tax_setting_others'];
                return $response;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_login_data($data){
        try{
            if($this->db->insert('front_login_session', $data)){
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

    public function getPass($username){
        try{
            $this->db->select('user_login.user_id, user_login.username, user_login.password, user_login.user_type, user_login.clock_in_out, users.first_name, users.last_name');  //chnages
            $this->db->from('user_login');
            $this->db->join('users','users.user_id = user_login.user_id','LEFT');
            $this->db->where('username',$username);

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

    public function get_custom_category_data($id){
        try{
            $this->db->select('custom_category_setting_details.*,custom_category_setting.name as catname,custom_category_setting.category_id');
            $this->db->from('custom_category_setting_details');
            $this->db->join('custom_category_setting', 'custom_category_setting.id = custom_category_setting_details.cat_id','LEFT');
            $this->db->where('custom_category_setting_details.cat_id',$id);
            $query = $this->db->get();
            return $query->result_array();

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_label_editor(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_label_editor');
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->result();
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

    public function customer_signup($data){
      try{
          if($this->db->insert('customer_information', $data)){
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

   public function isCustomerExist($email){
       try{
           $this->db->select('customer_email');
           $this->db->from('customer_information');
           $this->db->where('customer_email',$email);
           $this->db->where('is_active',1);

           $query=$this->db->get();
               if($this->db->affected_rows() > 0){
                   return true;
               }else{
                   return false;
               }
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function getCustomerData($email){
       try{
           $this->db->select('customer_name,first_name,last_name,customer_mobile,customer_email,password');
           $this->db->from('customer_information');
           $this->db->where('customer_email',$email);
           $this->db->where('is_active',1);

           $query=$this->db->get();
               if($this->db->affected_rows() > 0){
                   return $query->row_array();
               }else{
                   return false;
               }
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function get_all_front_role() {
       try{
           $this->db->where('is_deleted',0);
           $this->db->where_not_in('role_name', 'Admin');
           $query =$this->db->get('front_roles');
           return $query->result_array();
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function insert_role(){
     $data1 = array(
         'role_name' => $this->input->post('role_name')
       );
     $data1 = $this->security->xss_clean($data1);
     $this->db->insert('front_roles', $data1);
     #get last insert id
     $insert_id = $this->db->insert_id();

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

       if($this->db->insert('front_role_permission', $data)){
           return TRUE;
       }else{
           return FALSE;
       }
   }

   public function update_role(){
       $role_id = $this->input->post('role_id');
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

       $this->db->where('Role_id',$role_id);
       if($this->db->update('front_role_permission', $data)){
           return TRUE;
       }else{
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
           return  $query->row();

       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function get_users() {
       try{
           $this->db->select('users.user_id,users.first_name,users.last_name,users.email,user_login.username,user_login.user_type,user_login.user_shift_status,front_roles.role_name');
           $this->db->from('users');
           $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT');
           $this->db->join('front_roles', 'front_roles.id=user_login.user_type','LEFT');
           $this->db->where('users.status', 1);
           $this->db->where('user_login.user_type >', 1);
           $this->db->where_not_in('user_login.user_id', 1);
             $query =$this->db->get();
             return $query->result_array();
         }catch(Exception $ex){
             error_log($ex->getTraceAsString());
             echo $ex->getTraceAsString();
             return FALSE;
         }
   }

   public function get_inactive_users() {
       try{
           $this->db->select('users.user_id,users.first_name,users.last_name,users.email,user_login.username,user_login.user_type,front_roles.role_name');
           $this->db->from('users');
           $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT');
           $this->db->join('front_roles', 'front_roles.id=user_login.user_type','LEFT');
           $this->db->where('users.status', 0);
           $this->db->where('user_login.user_type >', 1);
           $this->db->where_not_in('user_login.user_id', 1);
             $query =$this->db->get();
             return $query->result_array();
         }catch(Exception $ex){
             error_log($ex->getTraceAsString());
             echo $ex->getTraceAsString();
             return FALSE;
         }
   }


   public function delete_user($user_id){
       try{
           $this->db->set('status', 0);
           $this->db->where('user_id',$user_id);
           $this->db->update('users');
           $this->db->set('status', 0);
           $this->db->where('user_id',$user_id);
           $this->db->update('user_login');
           return TRUE;
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function activate_employee($user_id){
       try{
           $this->db->set('status', 1);
           $this->db->where('user_id',$user_id);
           $this->db->update('users');
           $this->db->set('status', 1);
           $this->db->where('user_id',$user_id);
           $this->db->update('user_login');
           return TRUE;
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function addUser(){
       try{
           $data = array(
           'first_name' => $this->input->post('first_name'),
           'last_name' => $this->input->post('last_name'),
           'nick_name' => $this->input->post('nick_name'),
           'email' => $this->input->post('email'),
           'phone_no' => $this->input->post('phone_no'),
           'current_address' => $this->input->post('w4address'),
           'address_more' => $this->input->post('address-more'),
           'gender' => $this->input->post('gender'),
           'date_of_birth' => $this->input->post('dob'),
           'marital_status' => $this->input->post('marital_status'),
           'gurdian_name' => $this->input->post('gurdian_name'),
           'gurdian_phone' => $this->input->post('gurdian_phone'),
           'relationship' => $this->input->post('relationship'),
           'status' => 1,
       );
       $data = $this->security->xss_clean($data);
       $this->db->insert('users', $data);
       $insert_id = $this->db->insert_id();

       $data1 = array(
           'user_id'           =>  $insert_id ,
           'username'          =>  $this->input->post('username'),
           'password'          =>  md5("gef".$this->input->post('password')),
           'user_type'         =>  $this->input->post('role'),//2
           'security_code'     =>  '',
           'status'            =>  1 //0
           );
       $data1 = $this->security->xss_clean($data1);
       $this->db->insert('user_login',$data1);

       // $folderPath = "./uploads/emp_sign/";
       // $image_parts = explode(";base64,", $_POST['employee_sign']);
       // $image_type_aux = explode("image/", $image_parts[0]);
       // $image_type = $image_type_aux[1];
       // $image_base64 = base64_decode($image_parts[1]);
       // $file = $folderPath . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
       // file_put_contents($file, $image_base64);

       // $data3 = array(
       //     'username' => $this->input->post('username'),
       //     'firstname' => $this->input->post('firstname'),
       //     'lastname' => $this->input->post('lastname'),
       //     'address' => $this->input->post('address'),
       //     'address_details' => $this->input->post('zip'),
       //     'social_security_no' => $this->input->post('security_no'),
       //     'filling_condition' => $this->input->post('filling_condition'),
       //     'other_income' => $this->input->post('other_income'),
       //     'deductions' => $this->input->post('deductions'),
       //     'extra_withholding' => $this->input->post('extra_withholding'),
       //     'employee_signature' => $file,
       //     'signature_date' => $this->input->post('signature_date'),
       //     'name_with_address' => $this->input->post('name_with_address'),
       //     'employment_date' => $this->input->post('employment_date'),
       //     'EIN' => $this->input->post('EIN'),
       //     'multiple_jobs_worksheet_1' => $this->input->post('multiple_jobs_worksheet_1'),
       //     'multiple_jobs_worksheet_2a' => $this->input->post('multiple_jobs_worksheet_2a'),
       //     'multiple_jobs_worksheet_2b' => $this->input->post('multiple_jobs_worksheet_2b'),
       //     'multiple_jobs_worksheet_2c' => $this->input->post('multiple_jobs_worksheet_2c'),
       //     'multiple_jobs_worksheet_3' => $this->input->post('multiple_jobs_worksheet_3'),
       //     'multiple_jobs_worksheet_4' => $this->input->post('multiple_jobs_worksheet_4'),
       //     'deductions_worksheet_1' => $this->input->post('deductions_worksheet_1'),
       //     'deductions_worksheet_2' => $this->input->post('deductions_worksheet_2'),
       //     'deductions_worksheet_3' => $this->input->post('deductions_worksheet_3'),
       //     'deductions_worksheet_4' => $this->input->post('deductions_worksheet_4'),
       //     'deductions_worksheet_5' => $this->input->post('deductions_worksheet_5'),
       //     'multiple_jobs_or_spouse_works' => $this->input->post('multiple_jobs_or_spouse_works'),
       //     'total_amount' => $this->input->post('total_amount'),
       //     'step3a' => $this->input->post('step3a'),
       //     'step3b' => $this->input->post('step3b'),
       // );
       //
       // $data3 = $this->security->xss_clean($data3);
       // $this->db->insert('tbl_w4form',$data3);

           if($this->db->affected_rows() > 0){
               return true;
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
           $this->db->select('users.*,user_login.username,user_login.user_type');
           $this->db->from('users');
           $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT');
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
                   'address_more' => $query->row()->address_more,
                   'current_address' => $query->row()->current_address,
                   'username' => $query->row()->username,
                   'role' => $query->row()->user_type,
                   'gender' => $query->row()->gender,
                   'date_of_birth' => $query->row()->date_of_birth,
                   'marital_status' => $query->row()->marital_status,
                   'gurdian_name' =>  $query->row()->gurdian_name,
                   'gurdian_phone' =>  $query->row()->gurdian_phone,
                   'relationship' =>  $query->row()->relationship,
                   'status' => $query->row()->status,
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

   public function update_user(){
       try{
           $data = array(
             'first_name' => $this->input->post('first_name'),
             'last_name' => $this->input->post('last_name'),
             'nick_name' => $this->input->post('nick_name'),
             'email' => $this->input->post('email'),
             'phone_no' => $this->input->post('phone_no'),
             'current_address' => $this->input->post('w4address'),
             'address_more' => $this->input->post('address-more'),
             'gender' => $this->input->post('gender'),
             'date_of_birth' => $this->input->post('dob'),
             'marital_status' => $this->input->post('marital_status'),
             'gurdian_name' => $this->input->post('gurdian_name'),
             'gurdian_phone' => $this->input->post('gurdian_phone'),
             'relationship' => $this->input->post('relationship'),
           );

           $data = $this->security->xss_clean($data);
           $this->db->where('user_id', $this->input->post('user_id'));
           $this->db->update('users',$data);

           $pass = $this->input->post('password');
           if(!empty($pass)){
                 $npassword = md5("gef".$pass);
           }else{
                 $this->db->select('password');
                 $this->db->from('user_login');
                 $this->db->where('user_id', $this->input->post('user_id'));
                 $query = $this->db->get();
                 $result = $query->row();
                 $npassword = $result->password;
           }
           $data1 = array(
               'username' => $this->input->post('username'),
               'user_type' => $this->input->post('role'),
               'password' => $npassword,
           );

           $data1 = $this->security->xss_clean($data1);
           $this->db->where('user_id', $this->input->post('user_id'));
           //$this->db->update('user_login',$data1);

           // $folderPath = "./uploads/emp_sign/";
           // $image_parts = explode(";base64,", $_POST['employee_sign']);
           // $image_type_aux = explode("image/", $image_parts[0]);
           // $image_type = $image_type_aux[1];
           // $image_base64 = base64_decode($image_parts[1]);
           // $file = $folderPath . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
           // file_put_contents($file, $image_base64);
           //
           // $data2 = array(
           //     'firstname' => $this->input->post('firstname'),
           //     'lastname' => $this->input->post('lastname'),
           //     'address' => $this->input->post('address'),
           //     'address_details' => $this->input->post('zip'),
           //     'social_security_no' => $this->input->post('security_no'),
           //     'filling_condition' => $this->input->post('filling_condition'),
           //     'other_income' => $this->input->post('other_income'),
           //     'deductions' => $this->input->post('deductions'),
           //     'extra_withholding' => $this->input->post('extra_withholding'),
           //     'employee_signature' => $file,
           //     'signature_date' => $this->input->post('signature_date'),
           //     'name_with_address' => $this->input->post('name_with_address'),
           //     'employment_date' => $this->input->post('employment_date'),
           //     'EIN' => $this->input->post('EIN'),
           //     'multiple_jobs_worksheet_1' => $this->input->post('multiple_jobs_worksheet_1'),
           //     'multiple_jobs_worksheet_2a' => $this->input->post('multiple_jobs_worksheet_2a'),
           //     'multiple_jobs_worksheet_2b' => $this->input->post('multiple_jobs_worksheet_2b'),
           //     'multiple_jobs_worksheet_2c' => $this->input->post('multiple_jobs_worksheet_2c'),
           //     'multiple_jobs_worksheet_3' => $this->input->post('multiple_jobs_worksheet_3'),
           //     'multiple_jobs_worksheet_4' => $this->input->post('multiple_jobs_worksheet_4'),
           //     'deductions_worksheet_1' => $this->input->post('deductions_worksheet_1'),
           //     'deductions_worksheet_2' => $this->input->post('deductions_worksheet_2'),
           //     'deductions_worksheet_3' => $this->input->post('deductions_worksheet_3'),
           //     'deductions_worksheet_4' => $this->input->post('deductions_worksheet_4'),
           //     'deductions_worksheet_5' => $this->input->post('deductions_worksheet_5'),
           //     'multiple_jobs_or_spouse_works' => $this->input->post('multiple_jobs_or_spouse_works'),
           //     'total_amount' => $this->input->post('total_amount'),
           //     'step3a' => $this->input->post('step3a'),
           //     'step3b' => $this->input->post('step3b'),
           // );
           //
           // $this->db->where('username', $this->input->post('username'));
           if($this->db->update('user_login',$data1)){
           // if($this->db->update('tbl_w4form',$data2)){
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

   public function get_userdata_by_role_id(){
       try{
           $role_id = $this->input->post('role_id');
           $role_name =  $this->input->post('role_name');
           $this->db->select('COUNT(user_login.user_type) as usercount');
           $this->db->from('user_login');
           $this->db->where('user_type', $role_id);
           $query = $this->db->get();
           $dat =  $query->row();

           $this->db->select('id,role_name');
           $this->db->from('front_roles');
           $this->db->where('is_deleted', 0);
           $this->db->where_not_in('id', $role_id);
           $this->db->order_by('role_name', 'ASC');
           $querys =$this->db->get();
           $role_list = $querys->result_array();

           $arrayName = array(
             'role_name' => $role_name,
             'usercount' => $dat,
             'role_list' => $role_list,
           );

           return $arrayName;
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function delete_role(){
       try{
           $this->db->set('is_deleted', 1);
           $this->db->where('id',$this->input->post('old_role_id'));
           $this->db->update('front_roles');
           $this->db->set('is_deleted', 1);
           $this->db->where('Role_id',$this->input->post('old_role_id'));
           $this->db->update('front_role_permission');

           $data['user_type'] = $this->input->post('new_role_id');
           $this->db->where('user_type',$this->input->post('old_role_id'));
           if($this->db->update('user_login', $data)){
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

   public function get_pointdata_by_id($point_id){
       try{
           $this->db->select('*');
           $this->db->from('loyalty_management');
           $this->db->where('point_id',$point_id);
           $query = $this->db->get();
           return  $query->row();
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function update_point(){
       $point_id = $this->input->post('point_id');
       $data = array(
           'point_type'     => $this->input->post('point_type'),
           'point_amount'   => (!empty($this->input->post('point_amount'))?$this->input->post('point_amount'):null),
           'point'          => (!empty($this->input->post('point'))?$this->input->post('point'):null),
           'status'         => 1,
       );

       $data = $this->security->xss_clean($data);
       $this->db->where('point_id', $point_id);
       if($this->db->update('loyalty_management',$data)){
           return TRUE;
       }else{
           return FALSE;
       }
   }

   public function get_outbound_point(){
       try{
         $this->db->select('*');
         $this->db->from('loyalty_management');
         $this->db->where('point_type', 3);
         $query = $this->db->get();
         return $query->result_array();
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

   public function update_permission(){
       try{
            $user_id = $this->input->post('employee_id');
            $data = array(
                'pos_rights' => !empty($this->input->post('pos_rights')) ? implode(',',$this->input->post('pos_rights')) : '',
                'reports_rights' => !empty($this->input->post('reports_rights')) ? implode(',',$this->input->post('reports_rights')) : '',
                'inventory_rights' => !empty($this->input->post('inventory_rights')) ? implode(',',$this->input->post('inventory_rights')) : '',
                'loyalty_rights' => !empty($this->input->post('loyalty_rights')) ? implode(',',$this->input->post('loyalty_rights')) : '',
                'store_rights' => !empty($this->input->post('store_rights')) ? implode(',',$this->input->post('store_rights')) : '',
                'hrms_rights' => !empty($this->input->post('hrms_rights')) ? implode(',',$this->input->post('hrms_rights')) : '',
                'submit_timecard_rights' => !empty($this->input->post('submit_timecard_rights')) ? implode(',',$this->input->post('submit_timecard_rights')) : '',
                'e_order_rights' => !empty($this->input->post('e_order_rights')) ? $this->input->post('e_order_rights') : '',
                'market_place_rights' => !empty($this->input->post('market_place_rights')) ? $this->input->post('market_place_rights') : '',
            );

           $this->db->select('user_id');
           $this->db->from('front_role_extra_permission');
           $this->db->where('user_id', $user_id);
           $query = $this->db->get();
           if($this->db->affected_rows() > 0){
               $this->db->where('user_id', $user_id);
               if($this->db->update('front_role_extra_permission', $data)){
                   return TRUE;
               }
           }else{
               $data['user_id'] = $user_id;
               if($this->db->insert('front_role_extra_permission', $data)){
                 return TRUE;
               }
           }
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function get_card_processing(){
       try{
           $this->db->select('*');
           $this->db->from('card_transaction_setting');
           $query = $this->db->get();
           return $query->row_array();
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function get_payroll_data(){
      try{
       		$this->db->select('pay_period,pay_date');
       		$this->db->from('web_setting');
       		$this->db->where('setting_id',1);
       		$query = $this->db->get();
       		if ($query->num_rows() > 0) {
       			return $query->row_array();
       		}
     }catch(Exception $ex) {
        error_log($ex->getTraceAsString());
        echo $ex->getTraceAsString();
        return FALSE;
     }
 	}

  public function update_card_transaction(){
      try{
        if($this->input->post('active_transaction_type') == 1){
              $data = array(
                'card_transaction_api_url'            => $this->input->post('card_transaction_api_url'),
                'card_transaction_uat_api_url'        => $this->input->post('card_transaction_uat_api_url'),
                'card_transaction_api_key'            => $this->input->post('card_transaction_api_key'),
                'card_transaction_auth_key'           => $this->input->post('card_transaction_auth_key'),
                'card_transaction_merchant_id'        => $this->input->post('card_transaction_merchant_id'),
                'card_transaction_assoc_merchant_id'  => $this->input->post('card_transaction_assoc_merchant_id'),
                'card_transaction_terminal_hsn_no'    => $this->input->post('card_transaction_terminal_hsn_no'),
                'card_transaction_username'           => $this->input->post('card_transaction_username'),
                'card_transaction_password'           => $this->input->post('card_transaction_password'),
                'active_transaction_type'             => $this->input->post('active_transaction_type'),
               );
        }else{
              $data = array(
                'CLOVER_APP_SECRET'                   => $this->input->post('CLOVER_APP_SECRET'),
                'CLOVER_APP_ID'                       => $this->input->post('CLOVER_APP_ID'),
                'active_transaction_type'             => $this->input->post('active_transaction_type'),
               );
        }

          if($this->db->update('card_transaction_setting',$data)){
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

  public function update_payroll(){
      try{
          $data = array(
            'pay_period' => $this->input->post('pay_period'),
            'pay_date' => $this->input->post('pay_date'),
          );
          if($this->db->update('web_setting',$data)){
              return TRUE;
          } else {
            return FALSE;
          }
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_shift_in_user(){
      try{
        $this->db->select('users.*,user_login.username,user_login.user_shift_status,tbl_user_shift.*');
        $this->db->from('users');
        $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT');
        $this->db->join('tbl_user_shift', 'tbl_user_shift.username = user_login.username','LEFT');
        $this->db->where('tbl_user_shift.shift_in_out', 1);
        $this->db->where('user_login.user_type >', 1);
        $this->db->order_by('tbl_user_shift.datetime_out', 'DESC');
          $query =$this->db->get();
          return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function shift_logout_by_manager(){
      try{
          $data = array(
              'id' =>  $this->input->post('id'),
              'terminal_id' => $this->input->post('terminal_id'),
              'username' => $this->input->post('username'),
              'cash_out_drawer' => $this->input->post('cash_in_drawer'),
              'coin_dispenser_out' => $this->input->post('coin_dispenser'),
              'bin_data_out' => json_encode($this->input->post('bin_data')),
              'datetime_out' =>  date('Y-m-d H:i:s'),
              'date' =>  $this->input->post('date'),
              'defer_shift' => '0',
              'shift_in_out' => 2, // 1 = shift_in (Login) and 2 = shift_out (Logout)
          );

          $this->db->set('user_shift_status',0);
          $this->db->where('username', $this->input->post('username'));
          if($this->db->update('user_login')){
              $this->db->where('username', $this->input->post('username'));
              $this->db->where('id', $this->input->post('id'));
              $this->db->where('terminal_id', $this->input->post('terminal_id'));
              $this->db->where('date', date('Y-m-d'));
              if($this->db->update('tbl_user_shift',$data)){
                  $this->db->set('user_shift_status',0);
                  $this->db->where('username',$this->input->post('username'));
                  $this->db->update('user_login');
                  return $data['username'];
              }else{
                  return FALSE;
              }
          }

      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function update_date_setting(){
      try{
          $data = array(
              'timezone'       => $this->input->post('timezone'),
              'date_format'    => $this->input->post('date_format'),
              'time_format'    => $this->input->post('time_format'),
           );
          if($this->db->update('web_setting',$data)){
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

  // prashant api work 1-Sept-2021
  public function getcustomerByPhoneModal($phonenumber){
      try{
          $this->db->select('*,
          IFNULL((select floor(sum(redeem_point)) from customer_redeem_point_master where customer_redeem_point_master.customer_id = customer_information.customer_id),0) as exist_tot_redeem_point,
          IFNULL((select floor(sum(redeem_point)) from customer_redeem_trans_point_master where customer_redeem_trans_point_master.customer_id = customer_information.customer_id),0) as used_tot_redeem_point,
          (IFNULL((select floor(sum(redeem_point)) from customer_redeem_point_master where customer_redeem_point_master.customer_id = customer_information.customer_id),0)
          - IFNULL((select floor(sum(redeem_point)) from customer_redeem_trans_point_master where customer_redeem_trans_point_master.customer_id = customer_information.customer_id),0)) as tot_redeem_point,
          (select point_amount from loyalty_management where point_type = 3) as db_point_amount, (select point from loyalty_management where point_type = 3) as db_point');
          $this->db->from('customer_information');
          $this->db->where('customer_mobile',$phonenumber);
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

  public function pos_customer_signup(){
      try{
        $data = array(
            'customer_id'     => $this->auth->generator(15),
            'customer_name'   => $this->input->post('customer_fname').' '.$this->input->post('customer_lname'),
            'first_name'      => $this->input->post('customer_fname'),
            'last_name'       => $this->input->post('customer_lname'),
            'customer_email'  => $this->input->post('customer_email'),
            'customer_mobile' => $this->input->post('customer_mobile'),
            'status'          => 1,
            'is_active'       => 1,
            'added_on'        => date('Y/m/d H:i:s'),
        );
        if($this->db->insert('customer_information',$data)){
            $arrayName = array(
               'customer_id'    => $data['customer_id'],
               'redeem_point'   => $this->get_customer_reg_point(),
               'point_type'    => 1,
               'created_at'     => date('Y-m-d H:i:s'),
               'updated_at'     => date('Y-m-d H:i:s'),
            );
            $this->db->insert('customer_redeem_point_master',$arrayName);
            return $data['customer_mobile'];
        }else{
            return FALSE;
        }
      }catch(Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

    public function get_customer_reg_point() {
        try{
            $this->db->select('point, point_amount');
            $this->db->from('loyalty_management');
            $this->db->where('point_type', 1);
            $query =$this->db->get();
            return $query->row()->point;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_cat_wise_buttons(){
        try{
            $this->db->select('id,name,custom_category_setting_details.value as onsale_price,is_crv,percent,is_taxable,(SELECT age_restrict FROM product_category WHERE product_category.category_id IN (SELECT category_id FROM custom_category_setting WHERE custom_category_setting.id = custom_category_setting_details.cat_id)) as is_age_restrict');
            $this->db->from('custom_category_setting_details');
            $this->db->where('cat_id', $this->input->post('cat_id'));
            $query = $this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_grand_total_amt($terminal_id,$shift_id){
      try{
            $this->db->select('SUM(total_amount) as grand_total_amt');  //chnages
            $this->db->from('order');
            $this->db->where('terminal', $terminal_id);
            $this->db->where('shift',$shift_id);
            $this->db->where('is_cash_card', 1);
            $this->db->where('date', date('m-d-Y'));
            $query=$this->db->get();
            $grand_total_amt = round($query->row()->grand_total_amt,2);
            return $grand_total_amt;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function get_grand_total_cash_drop($terminal_id,$shift_id){
        $this->db->select('SUM(cash_amount) as grand_cash_drop');  //chnages
        $this->db->from('cash_drop');
        $this->db->where('terminal', $terminal_id);
        $this->db->where('shift',$shift_id);
        $this->db->where('date', date('m-d-Y'));
        $query3=$this->db->get();

        $grand_cash_drop =  round($query3->row()->grand_cash_drop,2);
        return $grand_cash_drop;
    }

    public function get_start_cash_in($shift_username,$shift_id){
        $this->db->select('cash_in_drawer');
        $this->db->from('tbl_user_shift');
        $this->db->where('id', $shift_id);//$this->session->userdata['shiftdata']['shift_id']);
        $this->db->where('username', $shift_username);
        $this->db->order_by('id','DESC');
        $query3 = $this->db->get();
        return $query3->row()->cash_in_drawer;
    }

    public function current_cash_drower_amt($shift_username,$terminal_id,$shift_id){
       $user = $shift_username;

       $this->db->select('id');
       $this->db->from('tbl_user_shift');
       $this->db->where('terminal_id', $terminal_id);
       $this->db->order_by('id','DESC');
       $this->db->limit(1);
       $query1=$this->db->get();
       $shift_ID = $query1->row()->id;

       $this->db->select('*');  //chnages
       $this->db->from('tbl_user_shift');
       $this->db->where('date', date('Y-m-d'));
       //added 13-06);
       $this->db->where('id', (!empty($shift_id) ? $shift_id : $shift_ID));
       $this->db->where('terminal_id', $terminal_id);
       $this->db->where('shift_in_out', (!empty($user) ? 1 : 2));//$shift);
       // $this->db->or_where('shift_in_out', 1);//added 13-06);
       $this->db->order_by('id', 'DESC');
       $this->db->limit(1);
       $query=$this->db->get();

       $cash_in_drawer = round($query->row()->cash_in_drawer,2);

       //payout changes
       $this->db->select('SUM(payout_money) as grand_total_payout');  //chnages
       $this->db->from('tbl_payout');
       $this->db->where('terminal', $terminal_id);
       $this->db->where('shift',$shift_id);
       $this->db->where('date', date('Y-m-d'));
       $this->db->where_not_in('payment_type','Check');
       $query8 = $this->db->get();

       $payout_amt1 = round($query8->row()->grand_total_payout,2);

       $this->db->select('SUM(payout_amount - payout_by_user) as grand_total_scratcher_payout');  //chnages
       $this->db->from('tbl_scratchers_payout');
       $this->db->where('terminal', $terminal_id);
       $this->db->where('shift',$shift_id);
       $this->db->where('date', date('Y-m-d'));
       $this->db->where_not_in('payment_type','Check');
       $query9 = $this->db->get();

       $payout_amt2 = round($query9->row()->grand_total_scratcher_payout,2);
       //end payout changes

       $this->db->select('SUM(total_amount) as grand_total_amt');  //chnages
       $this->db->from('order');
       $this->db->where('terminal', $terminal_id);
       $this->db->where('shift',$shift_id);
       $this->db->where('is_cash_card', 1);

       $this->db->where('date', date('m-d-Y'));
       $query2 = $this->db->get();

       $grand_total_amt = round($query2->row()->grand_total_amt,2);

       $this->db->select('sum(cash_amount) as grand_cash_drop');  //chnages
       $this->db->from('cash_drop');
       $this->db->where('terminal', $terminal_id);
       $this->db->where('shift',$shift_id);
       $this->db->where('date', date('m-d-Y'));
       $query3=$this->db->get();
       // $this->db->last_query();
       $grand_cash_drop =  round($query3->row()->grand_cash_drop,2);

       $cash = $this->get_web_setting_data();

        $drower_cash = $cash_in_drawer + $grand_total_amt - $grand_cash_drop - $payout_amt1 - $payout_amt2;
        $cash_drop= $cash_in_drawer + $grand_total_amt - $grand_cash_drop - $cash->start_cash - $payout_amt1 - $payout_amt2;
        if($user != ''){
          $cash_drower = $drower_cash;
        }else{
          $cash_drower = $cash_in_drawer;
        }

        $drawerdata = array(
            'cash_in_drawer' => $cash_drower,
            'withdrawable_amt' => $cash_drop,
        );

        return $drawerdata;

    }

    public function pos_coupon_details($product_id){
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('product_id',$product_id);
            $this->db->where('is_deleted',0);
            $this->db->where('status',1);
            $this->db->where('end_date >=', date('Y-m-d'));
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

    public function pos_product_combodetails($product_id){
        try{
            $this->db->select('*');
            $this->db->from('product_combos');
            $this->db->where('product_id',$product_id);
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->result_array();
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

    public function getLiquorTobaccoCategory() {
        try{

            $this->db->select('product_category.category_id');
            $this->db->from('product_category');
            $this->db->where('(product_category.category_id =', "'1NJYBNO8J86WEGN'" , FALSE); // Tobacco
            $this->db->or_where("product_category.parent_category_id = '1NJYBNO8J86WEGN'", NULL, FALSE); // Tobacco
            $this->db->or_where("product_category.category_id = 'SRPYBDLCJ53HW8C'", NULL, FALSE); // Liquor
            $this->db->or_where("product_category.parent_category_id = 'SRPYBDLCJ53HW8C'", NULL, FALSE); // Liquor
            $this->db->or_where("product_category.category_id = '4I8XHFO8B6XYX39'", NULL, FALSE); // Alcoholic Beverage
            $this->db->or_where("product_category.parent_category_id = '4I8XHFO8B6XYX39')", NULL, FALSE); // Alcoholic Beverage
            $query =$this->db->get();
            $result_liquor_tobacco_category = $query->result_array();

            $liquor_tobacco_arr = array();
            if(!empty($result_liquor_tobacco_category)) {
                foreach ($result_liquor_tobacco_category as $key => $value) {
                    $liquor_tobacco_arr[] = $value['category_id'];
                }
            }
            return implode(",", $liquor_tobacco_arr);

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //common function
    public function insert_user_notification($user_id,$notification,$action_id,$action,$module,$check_status=0,$fromhtml=0){
        try{
            if($check_status == 1){
                if($fromhtml== 0){
                    $action_id = $this->get_manager_ids();
                }else{
                    $action_id = $action_id;
                }
                $arrayName = array(
                    'user_id'       =>  $this->get_user_id_by_username($user_id),
                    'notification'  =>  $notification,
                    'action_id'   =>    $this->get_manager_ids(),
                    'action'        =>  $action,
                    'module'        =>  $module,
                    'created_at'    =>  date('Y-m-d H:i:s'),
                );
                $this->db->insert('user_notification',$arrayName);
            }
        }catch(Exception $ex) {
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
        }
    }

    public function get_manager_ids(){
        try{
            $this->db->select('user_id');
            $this->db->from('user_login');
            $this->db->where('user_type',4);
            $this->db->where('user_id !=',1);
            $this->db->where('status',1);
            $result= $this->db->get()->result_array();

            $dat= [];
            foreach ($result as $value) {
                 array_push($dat,$value['user_id']);
            }

            return implode(',', $dat);
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_scratcher_current_no($scracher_current_no,$product_quantity,$product_id){
        try{
          $old_qty = $this->get_inventory_qty($product_id);
          $qty = $old_qty->quantity - $product_quantity;
          $data = array(
            'scracher_current_no' => $scracher_current_no,
            'quantity' => $qty,
          );
          $this->db->where('product_id', $product_id);
          if($this->db->update('product_information', $data)){
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

    public function get_inventory_qty($product_id){
        try{
            $this->db->select('quantity,reorder_level, product_name,is_scratchable');  //chnages
            $this->db->from('product_information');
            $this->db->where('product_id', $product_id);
            $query=$this->db->get();
            return $query->row();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function frequently_sold_items(){
        try{
            $this->db->select('id,product_name,product_price as onsale_price,is_taxable,created_date');
            $this->db->from('miscellaneous_product');
            $this->db->where('is_delete',0);
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->result();
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

    public function user_shift_error($username){
        try{
            $this->db->select('*');  //chnages
            $this->db->from('tbl_user_shift');
            $this->db->where('username',$username);
            $this->db->where('date', date('Y-m-d'));
            $this->db->where('shift_in_out', 1);//$shift);
            $query=$this->db->get();
            return $query->row();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function getShift($username){
        try{
            $this->db->select('user_login.username,user_login.user_type,user_login.user_shift_status,users.first_name,users.last_name');
            $this->db->from('user_login');
            $this->db->join('users','users.user_id = user_login.user_id','LEFT');
            $this->db->where('user_login.username',$username);
            $query = $this->db->get();

            $this->db->select('shift_in_out,id,terminal_id,defer_shift');
            $this->db->from('tbl_user_shift');
            $this->db->where('username',$username);
            $this->db->where('date', date('Y-m-d'));
            $this->db->order_by('id','desc');
            $query1 =$this->db->get();

            $arrayName = array(
                'username' => $query->row()->username,
                'first_name' => $query->row()->first_name,
                'last_name' => $query->row()->last_name,
                'user_shift_status' => $query->row()->user_shift_status,
                'shift_in_out' => $query1->row()->shift_in_out,
                'shift_id' => $query1->row()->id,
                'terminal_id' => $query1->row()->terminal_id,
                'defer_shift' => $query1->row()->defer_shift,
                'role_id' => $query->row()->user_type,
            );

            return  $arrayName;

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_current_shift_data($username,$shift_id,$terminal_id,$shift_username){
        try{
            $this->db->select('id');
            $this->db->from('tbl_user_shift');
            $this->db->where('terminal_id', $terminal_id);
            $this->db->order_by('id','DESC');
            $this->db->limit(1);
            $query=$this->db->get();
            $shiftID = $query->row()->id;

            $this->db->select('*');  //chnages
            $this->db->from('tbl_user_shift');
            $this->db->where('date', date('Y-m-d'));
            $this->db->where('id', (!empty($shift_id) ? $shift_id : $shiftID));
            $this->db->where('terminal_id', $terminal_id);
            $this->db->where('shift_in_out', (!empty($shift_username) ? 1 : 2));//$shift);

            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $query=$this->db->get();

            $cash_in_drawer = round($query->row()->cash_in_drawer,2);
            //payout changes
            $this->db->select('SUM(payout_money - payout_by_user) as grand_total_payout');  //chnages
            $this->db->from('tbl_payout');
            $this->db->where('terminal', $terminal_id);
            $this->db->where('shift', $shift_id);
            $this->db->where('date', date('Y-m-d'));
            $this->db->where_not_in('payment_type','Check');
            $query8 = $this->db->get();

            $payout_amt1 = round($query8->row()->grand_total_payout,2);

            $this->db->select('SUM(payout_amount - payout_by_user) as grand_total_scratcher_payout');  //chnages
            $this->db->from('tbl_scratchers_payout');
            $this->db->where('terminal', $terminal_id);
            $this->db->where('shift', $shift_id);
            $this->db->where('date', date('Y-m-d'));
            $this->db->where_not_in('payment_type','Check');
            $query9 = $this->db->get();

            $payout_amt2 = round($query9->row()->grand_total_scratcher_payout,2);
            //end payout changes

            $this->db->select('SUM(total_amount) as grand_total_amt');  //chnages
            $this->db->from('order');
            $this->db->where('terminal', $terminal_id);
            $this->db->where('shift', $shift_id);
            $this->db->where('is_cash_card', 1);
            $this->db->where('date', date('m-d-Y'));
            $query2 = $this->db->get();

            $grand_total_amt = round($query2->row()->grand_total_amt,2);

            $this->db->select('sum(cash_amount) as grand_cash_drop');  //chnages
            $this->db->from('cash_drop');
            $this->db->where('terminal', $terminal_id);
            $this->db->where('shift',$shift_id);
            $this->db->where('date', date('m-d-Y'));
            $query3=$this->db->get();
            $grand_cash_drop =  round($query3->row()->grand_cash_drop,2);

             $cash = $this->get_web_setting_data();

            $drower_cash = $cash_in_drawer + $grand_total_amt - $grand_cash_drop - $payout_amt1 - $payout_amt2;
            $cash_drop= $cash_in_drawer + $grand_total_amt - $grand_cash_drop - $cash->start_cash - $payout_amt1 - $payout_amt2;
            if($user != ''){
              $cash_drower = $drower_cash;
            }else{
              $cash_drower = $cash_in_drawer;
            }

            $this->db->select('*');  //chnages
            $this->db->from('tbl_user_shift');
            $this->db->where('date', date('Y-m-d'));
            $this->db->where('username', $username);
            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $query4=$this->db->get();

            $arrayName = array(
              'shift_in_out'=> $query4->row()->shift_in_out,
              'defer_shift'=> $query4->row()->defer_shift,
              'cash_in_drawer' => round($cash_drower,2),
              'cash_drop' => round($cash_drop,2),
              'coin_dispenser' => $query->row()->coin_dispenser,
              'coin_dispenser' => $query->row()->coin_dispenser_in,
              'bin_data' => $this->get_all_active_bins(),
              'bin_count' => count($this->get_all_scratcher_bins()),
            );
            return $arrayName;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_last_shift_data($differ_shift,$terminal_id,$shift_id){
        $this->db->select('cash_out_drawer,coin_dispenser_out,bin_data_out,shift_in_out,defer_shift');  //chnages
        $this->db->from('tbl_user_shift');
        $this->db->where('terminal_id', $terminal_id);
        if($differ_shift==1){
            $this->db->where('id!=',$shift_id);
        }
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query=$this->db->get();
        if($query->num_rows()>0){
            $arrayName = array(
              'shift_in_out'  => $query->row()->shift_in_out,
              'defer_shift'   => $query->row()->defer_shift,
              'cash_in_drawer' => round($query->row()->cash_out_drawer,2),
              'coin_dispenser' => round($query->row()->coin_dispenser_out,2),
              'bin_data' => $this->get_all_active_bins(),
              'bin_count' => count($this->get_all_scratcher_bins()),
            );

        } else{
            $arrayName = array(
              'shift_in_out'=> 2,
              'defer_shift' => 0,
              'cash_in_drawer' => 0,
              'coin_dispenser' => 0,
              'bin_data' => $this->get_all_active_bins(),
              'bin_count' => count($this->get_all_scratcher_bins()),
            );
        }
        return $arrayName;
    }

    public function get_all_active_bins(){
        try{
            $this->db->select('bin,scracher_current_no,scratcher_no_to,scratcher_no_from,quantity');
            $this->db->from('product_information');
            $this->db->where('is_deleted',0);
            $this->db->where('is_scratchable',1);
            $this->db->where('scratcher_status',0);
            $this->db->where_not_in('scracher_current_no','');
            $this->db->order_by('bin', 'ASC');
            $query = $this->db->get();
            return $query->result();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    // public function selectShift($shift_in_out,$terminal_id){
    //     try{
    //         $this->db->select('id,shift_in_out');
    //         $this->db->from('tbl_user_shift');
    //         $this->db->where('terminal_id',$terminal_id);
    //         $this->db->where('shift_in_out',$shift_in_out);
    //         $this->db->where('date', date('Y-m-d'));
    //         $this->db->order_by('id', 'DESC');
    //         $query = $this->db->get();
    //         return $query->row();
    //     }catch(Exception $ex){
    //         error_log($ex->getTraceAsString());
    //         echo $ex->getTraceAsString();
    //         return FALSE;
    //     }
    // }

    public function insert_shift_terminal_data($data){
        try{
           if($this->db->insert('tbl_user_shift', $data)){
               $insert_id = $this->db->insert_id();
               $user_id        = $data['username'];
               $notification   = 'Start Shift';
               $action_id      = $data['username'];
               $action         = 'shift in';
               $module         = 'clock in out';

               $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
               return $insert_id;
           }else{
               return FALSE;
           }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_shift_terminal_data($data,$username,$shift_username,$shift_id,$terminal_id){
        try{
            $this->db->where('username', $shift_username);
            $this->db->where('id', $shift_id);
            $this->db->where('terminal_id', $terminal_id);
            $this->db->where('date', date('Y-m-d'));
            if($this->db->update('tbl_user_shift',$data)){
                $this->db->set('user_shift_status',0);
                $this->db->where('username',$username);
                $this->db->update('user_login');

                $user_id        = $shift_username;
                $notification   = 'End Shift';
                $action_id      = $shift_username;
                $action         = 'shift out';
                $module         = 'clock in out';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

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

    public function insert_cash_drop($data){
        try{
            if($this->db->insert('cash_drop', $data)){
               $insert_id =  $this->db->insert_id();

               $last_query = $this->db->last_query();
               $user_id =  $this->input->post('employee_id');
               $module = 'Inventory';
               $operation = 'Cash Drop Transaction';
               $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
               // EN - for query log

              $response['drop'] = $insert_id;
              $response['name'] = (!empty($this->input->post('name')) ? $this->input->post('name'): $this->input->post('shift_fname').' '.$this->input->post('shift_lname'));
              $response['user_id'] = $data['user_id'];
              $response['cash_amount'] = $data['cash_amount'];
              $response['datetime'] = date('m/d/Y', strtotime( $data['datetime']));
              $response['print_date'] = date('m/d/Y h:i A', strtotime( $data['datetime']));

              $response['status'] = 'success';

              $user_id        = $data['user_id'];
              $notification   = 'cash dropped $'.$data['cash_amount'];
              $action_id      = $data['user_id'];
              $action         = 'cash drop';
              $module         = 'pos terminal';

              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

              return $response;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_save_order($recall_order_id){
        $this->db->where('id',$recall_order_id);
        $this->db->delete('save_orders');

        $data = array(
           'order_title'            => 'Test Description',
           'exist_product_id'       => $this->input->post('exist_product_id'),
           'main_cart_grand_total'  => $this->input->post('main_cart_grand_total'),
           'cart_grand_total'       => $this->input->post('cart_grand_total'),
           'container_deposit'      => $this->input->post('container_deposit'),
           'tax_amount'             => $this->input->post('tax_amount'),
           'walk_in_customer_name'  => $this->input->post('walk_in_customer_name'),
           'walk_in_customer_id'    => $this->input->post('walk_in_customer_id'),
           'exist_coupon'           => $this->input->post('exist_coupon'),
           'exist_promotion'        => $this->input->post('exist_promotion'),
           'coupon_discount_total'  => $this->input->post('coupon_discount_total'),
           'date_of_save_order'     => date('Y-m-d H:i:s'),
       );

       $this->db->insert('save_orders', $data);
       $lastid = $this->db->insert_id();

       $this->db->where('save_order_id',$recall_order_id);
       $this->db->delete('save_order_details');

       foreach($_POST['product_id'] as $key => $product_id){
           $dataToSave  = array(
               'save_order_id'=>$lastid,
               'product_id' => $product_id,
               'product_name' => $_POST['product_name'][$key],
               'product_rate' => $_POST['product_rate'][$key],
               'product_price' => $_POST['product_price'][$key],
               'product_qty' => $_POST['product_qty'][$key],
               'product_crv' => $_POST['product_crv'][$key],
               'is_product_crv' => $_POST['is_product_crv'][$key],
               'is_product_size' => $_POST['is_product_size'][$key],
               'is_texable' => $_POST['is_texable'][$key],
               'date_of_save_order' => date('Y-m-d H:i:s'),

               'is_price_override' => $_POST['is_price_override'][$key],
               'override_orignal_rate' => $_POST['price_override_original'][$key],
               'product_orignal_price' => $_POST['price_override_original'][$key]*$_POST['product_qty'][$key],
           );
           $this->db->insert('save_order_details', $dataToSave);
       }
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }
    }

    public function insert_save_order(){
         $data = array(
            'order_title'            => 'Test Description',
            'exist_product_id'       => $this->input->post('exist_product_id'),
            'main_cart_grand_total'  => $this->input->post('main_cart_grand_total'),
            'cart_grand_total'       => $this->input->post('cart_grand_total'),
            'container_deposit'      => $this->input->post('container_deposit'),
            'tax_amount'             => $this->input->post('tax_amount'),
            'walk_in_customer_name'  => $this->input->post('walk_in_customer_name'),
            'walk_in_customer_id'    => $this->input->post('walk_in_customer_id'),
            'exist_coupon'           => $this->input->post('exist_coupon'),
            'exist_promotion'        => $this->input->post('exist_promotion'),
            'coupon_discount_total'  => $this->input->post('coupon_discount_total'),
            'date_of_save_order'     => date('Y-m-d H:i:s'),
        );

        $this->db->insert('save_orders', $data);
        $lastid = $this->db->insert_id();
        foreach($_POST['product_id'] as $key => $product_id){
            $dataToSave  = array(
                'save_order_id'=>$lastid,
                'product_id' => $product_id,
                'product_name' => $_POST['product_name'][$key],
                'product_rate' => $_POST['product_rate'][$key],
                'product_price' => $_POST['product_price'][$key],
                'product_qty' => $_POST['product_qty'][$key],
                'product_crv' => $_POST['product_crv'][$key],
                'is_product_crv' => $_POST['is_product_crv'][$key],
                'is_product_size' => $_POST['is_product_size'][$key],
                'product_price' => $_POST['product_price'][$key],
                'is_texable' => $_POST['is_texable'][$key],
                'date_of_save_order' => date('Y-m-d H:i:s'),

                'is_price_override' => $_POST['is_price_override'][$key],
                'override_orignal_rate' => $_POST['price_override_original'][$key],
                'product_orignal_price' => $_POST['price_override_original'][$key]*$_POST['product_qty'][$key],
            );
            $this->db->insert('save_order_details', $dataToSave);
        }
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function pos_coupon_list(){
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted',0);
            $this->db->where('manage_type',0);
            $this->db->where('status',1);
            $this->db->where('end_date >=', date('Y-m-d'));
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->result();
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

    public function check_notification($module,$perm){
        try{
            if($module == 'pos terminal'){
              $module_name = 'pos_notification';
            }elseif($module == 'inventory'){
              $module_name = 'inventory_notification';
            }elseif($module == 'hrms'){
              $module_name = 'hrms_notification';
            }

            $this->db->select($module_name);
            $this->db->from('tbl_notification_settings');
            $this->db->like($module_name, $perm, 'both');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return 0;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_recall_order($date_filter) {
        try {
            $this->db->select('*');
            $this->db->from('save_orders');
            if($date_filter != "") {
                 $daten=date("Y-m-d",strtotime($date_filter));
                 $this->db->where('date(date_of_save_order)', $daten);
            }
            $this->db->order_by('date_of_save_order','desc');
            $query = $this->db->get();

            if($this->db->affected_rows() > 0){
                return $query->result();
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_recall_order_detail($recall_order_id) {
        try {
            $this->db->select('*');
            $this->db->from('save_order_details');
            $this->db->where('save_order_id', $recall_order_id);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0){
                return $query->result();
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_recall_order_byid($recall_order_id) {
        try {
            $this->db->select('*');
            $this->db->from('save_orders');
            $this->db->where('id', $recall_order_id);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0){
                return $query->result();
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function getmisceleneous_name(){
        try{
            $this->db->select('*');
            $this->db->from('miscellaneous_product');
            $this->db->where('is_delete',0);
            $this->db->order_by('created_date','DESC');
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->result();
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

    public function addmisceleneous_name($misceleneous_name,$custom_price_value,$tax,$auto_id=0){
        try{
          if($auto_id !=0 && $auto_id != ""){
              $this->db->where('id',$auto_id);
              $this->db->update('miscellaneous_product',array('product_name'=>$misceleneous_name,'product_price'=>$custom_price_value,'is_taxable'=>$tax));
              $response['status'] = 'Update';
              return $response;
          }else{
              $this->db->select('*');
              $this->db->from('miscellaneous_product');
              $this->db->where('product_name',$misceleneous_name);
              $query=$this->db->get();
              $story_array = array();
              if($this->db->affected_rows() > 0){
                  $this->db->where('product_name',$misceleneous_name);
                  $this->db->update('miscellaneous_product',array('product_price'=>$custom_price_value,'is_taxable'=>$tax));
                  $response['status'] = 'Update';
              }else{
                  $this->db->insert('miscellaneous_product',array('product_name'=>$misceleneous_name,'product_price'=>$custom_price_value,'is_taxable' =>$tax,'created_date' => date('Y-m-d H:i:s')));
                  $response['status'] = 'Insert';
              }
              return $response;
          }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_suppliers() {
        try{
            $this->db->where('is_deleted', 0);
            $query =$this->db->get('supplier_information');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_fix_category() {
        try{
            $catogories = array('Alcoholic Beverage','Beverages','Deli Products','General Merchandise','Ice Cream','On-Line Tickets','Scratcher Tickets','Package Food Products','Tobacco');
            $this->db->select('*');
            $this->db->from('product_category');
            $this->db->where_in('category_name',$catogories);
            $this->db->order_by('category_name', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_users() {
       try{
           $this->db->select('first_name,last_name,email,phone_no,current_address');
           $this->db->from('users');
           $this->db->where('status', 1);
           $this->db->where('user_id >', 1);
           $query =$this->db->get();
           return $query->result_array();
       }catch(Exception $ex){
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function get_all_scratchers() {
      try{
          $this->db->select('product_category.category_id,product_category.category_name,product_information.*');
          $this->db->from('product_information');
          $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
          $this->db->where('product_information.is_scratchable', 1);
          $this->db->order_by('id', 'DESC');
          // $this->db->limit(100);
          $query =$this->db->get();
          return $query->result_array();
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_all_payouts($curr_date) {
      try{
          $story_array = array();
          $this->db->select('*');
          $this->db->from('tbl_payout');
          $this->db->order_by('created_at', 'ASC');
          $this->db->where('DATE(created_at)',$curr_date);
          $query =$this->db->get();

          $payout_array = $query->result_array();
          if($this->db->affected_rows() > 0) {
              foreach ($payout_array as $key => $value) {
                  $payout_tmp = array();
                  $payout_tmp['supplier_emp_name'] = $value["supplier_emp_name"];
                  $payout_tmp['payout_money']      = $value["payout_money"];
                  $payout_tmp['payment_type']      = $value["payment_type"];
                  $payout_tmp['created_at']        = $value["created_at"];
                  $story_array[] = $payout_tmp;
              }
          }

          // ST - Scratcher Payout
          $this->db->select('(select CONCAT(first_name, " ", last_name) from users inner join user_login as ul on ul.user_id = users.user_id where ul.username = tbl_scratchers_payout.user_id) as supplier_emp_name,payout_amount as payout_money,payment_type,payout_date as created_at');
          $this->db->from('tbl_scratchers_payout');
          $this->db->where('tbl_scratchers_payout.date',$curr_date);
          $query_sp = $this->db->get();
          $scratcher_array = $query_sp->result_array();
          if($this->db->affected_rows() > 0) {
              foreach ($scratcher_array as $key2 => $value2) {
                  $payout_tmp = array();
                  $payout_tmp['supplier_emp_name'] = $value2["supplier_emp_name"];
                  $payout_tmp['payout_money']      = $value2["payout_money"];
                  $payout_tmp['payment_type']      = $value2["payment_type"];
                  $payout_tmp['created_at']        = $value2["created_at"];
                  $story_array[] = $payout_tmp;
              }
          }
          // EN - Scratcher Payout
          return $story_array;
      }catch(Exception $ex){
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }


  public function insert_payout(){
      try{
          $category_name = $this->input->post('category_name');
          //$category = $this->input->post('category');
          $vendor_notes = $this->input->post('vendor_notes');
          $emp_notes = $this->input->post('emp_notes');
          $payout_amount = $this->input->post('payout_amount');
          $vendor_name = $this->input->post('vendor_name');
          $employee_name = $this->input->post('employee_name');
          $type = $this->input->post('type');
          $payment_type = $this->input->post('payment_type');
          // $scratcher_id = $this->input->post('scratcher_id');
          $check_no = $this->input->post('check_no');
          $user_id = $this->input->post('employee_id');
          $terminal_id = $this->input->post('terminal_id');
          $shift_id = $this->input->post('shift_id');

          $supp_name = $this->input->post('exist_supplier_id');
          if($supp_name != 'Others'){
              $supplier_name = $supp_name;
              $this->db->select('supplier_id');
              $this->db->from('supplier_information');
              $this->db->where('supplier_name', $supp_name);
              $query = $this->db->get();
              $result = $query->row();
              $supplier_id = $result->supplier_id;
          }else{
              $supplier_name = $vendor_name;
              $supplier_id = 0;
          }

           if($type== 'Scratcher'){
              if($this->input->post('select_scratcher') == 'Lotto'){
                    $lotto = $this->input->post('lotto_name');
              }else {
                    $pro_name = $this->input->post('product_name');
                    $this->db->select('bin,case_UPC');
                    $this->db->from('product_information');
                    $this->db->where('product_name', $pro_name);
                    $query = $this->db->get();
                    $bin = $query->row()->bin;
                    $scratcher_upc = $query->row()->case_UPC;
              }

                $arrayName_new = array(
                    'scratcher_id'   => (!empty($scratcher_upc) ? $scratcher_upc : ''),
                    'lotto_name'     => (!empty($this->input->post('lotto_name')) ? $this->input->post('lotto_name') : ''),
                    'payout_amount'  => $payout_amount,
                    'payment_type'   => $payment_type,
                    'bin_id'         => (!empty($scratcher_upc) ? $bin : ''),
                    'user_id'        => $user_id,
                    'shift'          => $shift_id,
                    'terminal'       => $terminal_id,
                    'date'           => date("Y-m-d"),
                    'payout_date'    => date('Y-m-d H:i:s'),
                    'check_no'       => (!empty($check_no) ? $check_no:''),
                );
                $this->db->insert('tbl_scratchers_payout',$arrayName_new);
                 if($this->db->affected_rows() > 0){
                   $insert_id = $this->db->insert_id();//
                   $user_id        = $user_id;
                   $notification   = '$'.$payout_amount.' Payout for Scratcher Payout';
                   $action_id      = $user_id;
                   $action         = 'Scratcher Payout';
                   $module         = 'pos terminal';
                   $check = $this->check_notification($module,$perm='B');

                   $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                   $arrayName = array(
                     'status' => 'note',
                     'id' => $insert_id,
                     'type' => 'tbl_scratchers_payout'
                  );
                  return $arrayName;
              }else{
                  return false;
              }
         }
          if($type == 'Vendor'){
              if($category == 'Others'){
                  $category_id = $this->auth->generator(15);
                  $arrayName = array(
                    'category_id' => $category_id,
                    'category_name' => $category_name,
                    'cat_type' => 1,
                  );
                  $this->db->insert('product_category',$arrayName);
              }else{
                  $this->db->select('category_id');
                  $this->db->from('product_category');
                  $this->db->where('category_name', $category_name);
                  $query = $this->db->get();
                  $result = $query->row();
                  $category_id = $result->category_id;
              }
              $data = array(
                  'supplier_emp_id'   => $supplier_id,
                  'category_id'       => $category_id,
                  'notes'             => $vendor_notes,
                  'supplier_emp_name' => $supplier_name,
                  'type'              => $type,
                  'payout_money'      => $payout_amount,
                  'payment_type'      => $payment_type,
                  'shift'             => $shift_id,
                  'terminal'          => $terminal_id,
                  'date'              => date("Y-m-d"),
                  'created_at'        => date('Y-m-d H:i:s'),
                  'check_no'          => (!empty($check_no) ? $check_no:''),
              );
          }

          if($type == 'Employee'){
              $data = array(
                  'supplier_emp_id'   => 1,
                  'notes'             => $emp_notes,
                  'supplier_emp_name' => $employee_name,
                  'type'              => $type,
                  'payout_money'      => $payout_amount,
                  'payment_type'      => $payment_type,
                  'shift'             => $shift_id,
                  'terminal'          => $terminal_id,
                  'date'              => date("Y-m-d"),
                  'created_at'        => date('Y-m-d H:i:s'),
                  'check_no'          => (!empty($check_no) ? $check_no:''),
               );
          }
          $data = $this->security->xss_clean($data);
          if($this->db->insert('tbl_payout', $data)){
              $insert_id = $this->db->insert_id();//
              $last_query = $this->db->last_query();
              $module = 'pos';
              $operation = 'Payout Transaction';
              $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);

              $user_id        = $user_id;;
              $notification   = '$'.$payout_amount.' Payout for '.$data['type'].' Payout';
              $action_id      = $user_id;;
              $action         = $data['type'].' Payout';
              $module         = 'pos terminal';

              $check = $this->check_notification($module,$perm='B');
              if(strpos($check[0]['pos_notification'], 'B') !== false){
                  $check_status = 1;
              }
              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module,$check_status);

              $arrayName = array(
                'status' => 'note',
                'id' => $insert_id,
                'type' => 'tbl_payout'
             );
             return $arrayName;

          }else{
              return false;
          }
      }catch(Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_refund_order($date_filter,$history='0') {
      try {
          $this->db->select('order.*,
              (SELECT SUM(quantity) FROM order_details WHERE order_details.order_id = order.order_id) as no_of_item,
              (SELECT sum(refund_order_details.quantity) FROM refund_order_details WHERE order.order_id = refund_order_details.order_id) as used_qty');
          if($history==0){
              $this->db->where('refunded',$history);
          } else{
              $this->db->having(['used_qty>='=>'1']);
          }

          $this->db->from('order');
          $this->db->order_by('order.id','desc');

          if($date_filter != "") {
              $this->db->where('order.date', date("m-d-Y",strtotime($date_filter)));
          } else {
              $this->db->limit('10');
          }
          $query = $this->db->get();

          if($this->db->affected_rows() > 0){
              return $query->result();
          } else {
              return 0;
          }
      } catch (Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_refund_order_details($order_id) {
      try {
         $this->db->select('order.*,order.redeem_discount total_reedem_remain,order_details.order_details_id,order_details.is_taxable,order_details.rate,order_details.container_deposit as product_container_deposit,order_details.quantity,order_details.product_name,order_details.total_price,order_details.discount,order_details.reedem_discount ,product_information.Applicable_CRV,product_information.Applicable_Tax,product_information.size,product_information.case_UPC,(SELECT sum(refund_order_details.quantity) FROM refund_order_details WHERE order_details.order_details_id = refund_order_details.order_details_id) as used_qty, (SELECT sum(refund_order.total_reedem) FROM refund_order WHERE refund_order.order_id = order_details.order_id) as used_redeem');
          $this->db->from('order_details');
          $this->db->join('order','order.order_id=order_details.order_id','LEFT');
          $this->db->join('product_information','product_information.product_id=order_details.product_id','LEFT');
          $this->db->where('order_details.order_id',$order_id);
          $result= $this->db->get()->result();

          if($result){
              return $result;
          }else{
              return FALSE;
          }

      } catch (Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_discounts($type){
      try{
          $this->db->select('*');
          $this->db->from('tbl_discount_settings');
          $this->db->where('discount_type',$type);
          $query=$this->db->get();
          $story_array = array();
          if($this->db->affected_rows() > 0){
              $story_array = $query->result();
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

  public function insert_payout_with_note(){
      try{
          $username = $this->input->post('employee_id');
          $check_no = $this->input->post('check_no');
          // $scratcher_id = $this->input->post('scratcher_id');
          $type = $this->input->post('type');
          $payment_type = $this->input->post('payment_type');
          $vendor_name = $this->input->post('vendor_name');
          $employee_name  = $this->input->post('employee_name');
          $ext_sup_id=$this->input->post('exist_supplier_id');
          $emp_notes = $this->input->post('emp_notes');
          $vendor_notes = $this->input->post('vendor_notes');
          // $category = $this->input->post('category');
          $category_name = $this->input->post('category_name');
          $terminal_id = $this->input->post('terminal_id');
          $shift_id = $this->input->post('shift_id');
          $shift_username = $this->input->post('shift_username');
          $payout_amount = $this->input->post('payout_amount');
          $payout_note = $this->input->post('payout_note');

          $drawer_cash = $this->Api_model->get_current_shift_data($username,$shift_id,$terminal_id,$shift_username);
          $payout_by_user = $this->input->post('payout_amount') - $drawer_cash['cash_in_drawer'];

          $supp_name = $this->input->post('exist_supplier_id');
          if($supp_name != 'Others'){
              $supplier_name = $supp_name;
              $this->db->select('supplier_id');
              $this->db->from('supplier_information');
              $this->db->where('supplier_name', $supp_name);
              $query = $this->db->get();
              $result = $query->row();
              $supplier_id = $result->supplier_id;
          }else{
              $supplier_name = $vendor_name;
              $supplier_id = 0;
          }

          if($type== 'Scratcher'){
                if($this->input->post('select_scratcher') == 'Lotto'){
                      $lotto = $this->input->post('lotto_name');
                }else {
                      $pro_name = $this->input->post('product_name');
                      $this->db->select('bin,case_UPC');
                      $this->db->from('product_information');
                      $this->db->where('product_name', $pro_name);
                      $query = $this->db->get();
                      $bin = $query->row()->bin;
                      $scratcher_upc = $query->row()->case_UPC;
                }
                $arrayName_new = array(
                    'scratcher_id' => (!empty($scratcher_upc) ? $scratcher_upc : ''),
                    'lotto_name' => (!empty($this->input->post('lotto_name')) ? $this->input->post('lotto_name') : ''),
                    'payout_amount'=> $payout_amount,
                    'payment_type'=> $payment_type,
                    'bin_id' => (!empty($scratcher_upc) ? $bin : ''),
                    'user_id'=>$username,
                    'shift' => $shift_id,
                    'terminal' => $terminal_id,
                    'date' => date("Y-m-d"),
                    'payout_date' => date('Y-m-d H:i:s'),
                    'payout_note'=> $payout_note,
                    'check_no' => (!empty($check_no) ? $check_no:''),
                    'payout_by_user' => $payout_by_user,
                );
                $this->db->insert('tbl_scratchers_payout',$arrayName_new);
                 if($this->db->affected_rows() > 0){
                   $insert_id = $this->db->insert_id();//

                   $user_id        = $username;
                   $notification   = '$'.$payout_amount.' Payout for Scratcher Payout ( '.$this->input->post('payout_note').' )';
                   $action_id      = $username;
                   $action         = 'Scratcher Payout';
                   $module         = 'pos terminal';


                   $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                   $arrayName = array(
                     'status' => 'note',
                     'id' => $insert_id,
                     'type' => 'tbl_scratchers_payout'
                  );
                  return $arrayName;
              }else{
                  return false;
              }
         }
          if($type == 'Vendor'){

              if($category == 'Others'){
                  $category_id = $this->auth->generator(15);
                  $arrayName = array(
                    'category_id' => $category_id,
                    'category_name' => $category_name,
                    'cat_type' => 1,
                  );
                  $this->db->insert('product_category',$arrayName);
              }else{
                  $category_id = $category;
              }

              $data = array(
                  'supplier_emp_id' => $supplier_id,
                  'category_id' => $category_id,
                  'notes' => $vendor_notes,
                  'supplier_emp_name' => $supplier_name,
                  'type' => $type,
                  'payout_money'=>$payout_amount,
                  'payment_type'=>$payment_type,
                  'shift' => $shift_id,
                  'terminal' => $terminal_id,
                  'date' => date("Y-m-d"),
                  'created_at' => date('Y-m-d H:i:s'),
                  'payout_note'=> $payout_note,
                  'check_no' => (!empty($check_no) ? $check_no:''),
                  'payout_by_user' => $payout_by_user,
              );
          }

          if($type == 'Employee'){
              $data = array(
                  'supplier_emp_id' => 1,
                  'notes' => $emp_notes,
                  'supplier_emp_name' => $employee_name,
                  'type' => $type,
                  'payout_money'=>$payout_amount,
                  'payment_type'=>$payment_type,
                  'shift' => $shift_id,
                  'terminal' => $terminal_id,
                  'date' => date("Y-m-d"),
                  'created_at' => date('Y-m-d H:i:s'),
                  'payout_note'=> $payout_note,
                  'check_no' => (!empty($check_no)?$check_no:''),
                  'payout_by_user' => $payout_by_user,
               );
          }
          $data = $this->security->xss_clean($data);

          if($this->db->insert('tbl_payout', $data)){
              $insert_id = $this->db->insert_id();//

              //$this->need_lib->execute_on_live($last_query);

              $last_query = $this->db->last_query();
              $user_id = $username;
              $module = 'pos';
              $operation = 'Payout Transaction';
              $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);


              $user_id        = $username;
              $notification   = '$'.$data['payout_money'].' Payout for '.$data['type'].' Payout ( '.$this->input->post('payout_note').' )';
              $action_id      = $username;
              $action         = $data['type'].' Payout';
              $module         = 'pos terminal';


              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

              $arrayName = array(
                'status' => 'note',
                'id' => $insert_id,
                'type' => 'tbl_payout'
             );
             return $arrayName;

          }else{
              return false;
          }
      }catch(Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
  }

  public function get_refund_order_previous_transaction($date_filter){
      try {
          $this->db->select('order.*,(SELECT SUM(quantity) FROM order_details WHERE order_details.order_id = order.order_id) as no_of_item,(SELECT sum(refund_order_details.quantity) FROM refund_order_details WHERE order.order_id = refund_order_details.order_id) as used_qty');
          $this->db->from('order');
          $this->db->order_by('order.id','desc');
          if($date_filter != "") {
              $this->db->where('date', date("m-d-Y",strtotime($date_filter)));
          } else {
              $this->db->limit('10');
          }
          $query = $this->db->get();

          if($this->db->affected_rows() > 0){
              return $query->result();
          } else {
              return 0;
          }
      } catch (Exception $ex) {
          error_log($ex->getTraceAsString());
          echo $ex->getTraceAsString();
          return FALSE;
      }
   }

   public function get_customer_redeem_points($customer_id){
       try{
           $this->db->select('*,
           IFNULL((select floor(sum(redeem_point)) from customer_redeem_point_master where customer_redeem_point_master.customer_id = customer_information.customer_id),0) as exist_tot_redeem_point,
           IFNULL((select floor(sum(redeem_point)) from customer_redeem_trans_point_master where customer_redeem_trans_point_master.customer_id = customer_information.customer_id),0) as used_tot_redeem_point,
           (IFNULL((select floor(sum(redeem_point)) from customer_redeem_point_master where customer_redeem_point_master.customer_id = customer_information.customer_id),0)
           - IFNULL((select floor(sum(redeem_point)) from customer_redeem_trans_point_master where customer_redeem_trans_point_master.customer_id = customer_information.customer_id),0)) as tot_redeem_point,
           (select point_amount from loyalty_management where point_type = 3) as db_point_amount, (select point from loyalty_management where point_type = 3) as db_point');
           $this->db->from('customer_information');
           $this->db->where('customer_id',$customer_id);
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

   public function get_mail_settings(){
       try{
           $this->db->select('*');
           $this->db->from('tbl_mail_settings');
           $query = $this->db->get();
           return $query->row_array();
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }

   public function update_mail_settings(){
       try{
           $data = array(
                 'to_email'    => $this->input->post('to_email'),
                 'to_cc_email' => $this->input->post('to_cc_email'),
                 'from_email'  => $this->input->post('from_email'),
                 'from_name'   => $this->input->post('from_name'),
                 'smtp_host'   => $this->input->post('smtp_host'),
                 'smtp_port'   => $this->input->post('smtp_port'),
                 'smtp_authentication' => $this->input->post('smtp_authentication'),
                 'smtp_username' => $this->input->post('smtp_username'),
                 'smtp_password' => $this->input->post('smtp_password'),
            );
           if($this->db->update('tbl_mail_settings',$data)){
               $user_id        =  $this->input->post('employee_id');
               $notification   = 'Mail settings updated';
               $action_id      =  $this->input->post('employee_id');
               $action         = 'update mail settings';
               $module         = 'store setting';

               $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
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

   public function get_store_notification(){
       try{
           $this->db->select('*');
           $this->db->from('tbl_notification_settings');
           $this->db->where('id',1);
           $query = $this->db->get();
           return $query->row();
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
   }
   public function update_notification_settings($data){
       try{
           if($this->db->update('tbl_notification_settings',$data)){
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

   public function get_label_editor_by_id(){
       try{
           $id = $this->input->post('id');
           $this->db->select('id,label_height,label_width');
           $this->db->from('tbl_label_editor');
           $this->db->where('id',$id);
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

   public function label_editor(){
       $data = array(
         'label_height' => $this->input->post('label_height'),
         'label_width'  => $this->input->post('label_width'),
       );
       $data = $this->security->xss_clean($data);
       $this->db->where('id', $this->input->post('lbl_id'));
       if($this->db->update('tbl_label_editor',$data)){
           $user_id        =  $this->input->post('employee_id');
           $notification   = 'Update Label Editor';
           $action_id      =  $this->input->post('employee_id');
           $action         = 'update label editor';
           $module         = 'store setting';

           $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
           return TRUE;
       }else{
           return FALSE;
       }
   }

   public function update_cashRegister(){
       $data = array(
         'start_cash' => $this->input->post('start_cash'),
         'cash_register' => $this->input->post('cash_register'),
         'cashback_fee' => $this->input->post('cashback_fee'),
       );
       if($this->db->update('web_setting',$data)){
         $user_id        =  $this->input->post('employee_id');
         $notification   = 'Update Cash Register Settings';
         $action_id      =  $this->input->post('employee_id');
         $action         = 'update cash register';
         $module         = 'store setting';

         $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
           return $data;
       }else{
           return FALSE;
       }
   }

   public function get_discount_data($type){
       try{
           $this->db->select('*');
           $this->db->from('tbl_discount_settings');
           $this->db->where('discount_type',$type);
             $query = $this->db->get();
           if ($query->num_rows() > 0) {
               return $query->result_array();
           }
       }catch(Exception $ex){
       error_log($ex->getTraceAsString());
       echo $ex->getTraceAsString();
       return FALSE;
       }
   }

   public function existDiscountKey($discountkey_name,$discount_id){
       try{
           $this->db->select('discount_title');
           $this->db->from('tbl_discount_settings');
           $this->db->where('discount_title',$discountkey_name);
           $this->db->where('id !=',$discount_id);

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

   public function update_discount_key(){
         try{
               $id = $this->input->post('discount_id');
               $array_name  = array(
                   'discount_title'  => $this->input->post('discount_key_name'),
                   'discount_value' => $this->input->post('discount_key_value'),
                   'subtotal_amount' => $this->input->post('subtotal_amount'),
                   'discount_type' => $this->input->post('discount_key_type'),
                   'updated_date' => date('Y-m-d H:i:s'),
               );
               $data = $this->security->xss_clean($array_name);
             $this->db->where('id',$id);
             $this->db->update('tbl_discount_settings',$data);
             $responce = array(
               'id' => $id,
               'name' => $data['discount_title'],
               'value' => $data['discount_value'],
               'subtotal' => $data['subtotal_amount'],
               'type' => $data['discount_type'],
               'status' => 'update',
             );
             return $responce;

         }catch(Exception $ex){
             error_log($ex->getTraceAsString());
             echo $ex->getTraceAsString();
             return FALSE;
         }
     }

     public function insert_discount_key(){
         try{
               $array_name  = array(
                 'discount_title'  => $this->input->post('discount_key_name'),
                 'discount_value' => $this->input->post('discount_key_value'),
                 'discount_type' => $this->input->post('discount_key_type'),
                 'subtotal_amount' => $this->input->post('subtotal_amount'),
                 'created_date' => date('Y-m-d H:i:s'),
                 'updated_date' => date('Y-m-d H:i:s'),
               );
               $data = $this->security->xss_clean($array_name);

             $this->db->insert('tbl_discount_settings',$data);
             $responce = array(
               'id' => $this->db->insert_id(),
               'name' => $data['discount_title'],
               'value' => $data['discount_value'],
               'subtotal' => $data['subtotal_amount'],
               'type' => $data['discount_type'],
               'status' => 'insert',
             );
             return $responce;

         }catch(Exception $ex){
             error_log($ex->getTraceAsString());
             echo $ex->getTraceAsString();
             return FALSE;
         }
     }

     public function remove_discount_key(){
         try{
           $discount_id = $this->input->post('discount_id');
               $array_name  = array(
                   'discount_title'  => '',
                   'discount_value' => '',
                   'subtotal_amount' => 0.00,
               );

             $this->db->where('id', $discount_id);
             if($this->db->delete('tbl_discount_settings')){
                 $responce = array(
                     'id' =>   $discount_id,
                     'name' => $array_name['discount_title'],
                     'value' => $array_name['discount_value'],
                     'subtotal' => $array_name['subtotal_amount'],
                     'status' => 'delete',
                 );
                 return $responce;
             }else{
                 return FALSE;
             }
         }catch(Exception $ex) {
             error_log($ex->getTraceAsString());
             echo $ex->getTraceAsString();
             return FALSE;
         }
     }

     public function checkAttendance($username){
         try{
             $this->db->select('user_action');  //chnages
             $this->db->from('user_timesheet');
             $this->db->where('username', $username);
             $this->db->where('date', date("Y-m-d"));
             $this->db->order_by('datetime', 'DESC');
             $this->db->limit(1);
             $query=$this->db->get();
             $story_array = array();
             if($this->db->affected_rows() > 0){
                 $story_array = $query->row();
                 $result['date_status'] = 'today';
                 $result['clock'] = $story_array;
                 return $result ;
             }else{
               $yesterday = date("Y-m-d", strtotime("yesterday"));
               $this->db->select('user_action');  //chnages
               $this->db->from('user_timesheet');
               $this->db->where('username', $username);
               $this->db->where('date', $yesterday);
               $this->db->order_by('datetime', 'DESC');
               $this->db->limit(1);
               $query=$this->db->get();
               $story_array1 = array();
               if($this->db->affected_rows() > 0){
                  $story_array1 = $query->row();
                  $result['date_status'] = 'yesterday';
                  $result['clock'] = $story_array1;
                  return $result ;
               }else{
                   $this->db->select('user_action');  //chnages
                   $this->db->from('user_timesheet');
                   $this->db->where('username', $username);
                   $this->db->order_by('datetime', 'DESC');
                   $this->db->limit(1);
                   $query=$this->db->get();
                   $result['date_status'] = 'previous_day';
                   $result['clock'] = $query->row();
                   return $result ;
               }
             }
         }catch(Exception $ex){
             error_log($ex->getTraceAsString());
             echo $ex->getTraceAsString();
             return FALSE;
         }
     }

     public function remove_custom_key(){
         try{
         		$customkey_id = $this->input->post('customkey_id');
 						$this->db->set('customkey_name', null);
 						$this->db->set('customkey_value', null);
 						$this->db->set('is_taxable', 0);
             $this->db->where('customkey_id', $customkey_id);
             if($this->db->update('custom_key_settings')){
                 $responce = array(
                     'customkey_id' => $customkey_id,
                     'customkey_name' => 'Custom Key',
                     'customkey_value' => '0.00',
                     'is_taxable' => 0,
                     'status' => 'delete',
                 );
                 return $responce;
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
?>
