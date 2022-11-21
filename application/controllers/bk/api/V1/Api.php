<?php

require APPPATH.'libraries/REST_Controller.php';

class Api extends REST_Controller{

  public function __construct(){
    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(array("api/Api_model"));
    $this->load->library(array("form_validation"));
    $this->load->library('api/eplugin');
    $this->load->helper("security");

    $set_timezone = $this->Api_model->get_web_setting_data();
    date_default_timezone_set($set_timezone->timezone);
  }






  /*
    INSERT: POST REQUEST TYPE
    UPDATE: PUT REQUEST TYPE
    DELETE: DELETE REQUEST TYPE
    LIST: Get REQUEST TYPE
  */
  /* ----------LOGIN API----------*/
  public function login_post(){
       $this->form_validation->set_rules("username", "Username", "required|trim|xss_clean");
       $this->form_validation->set_rules("password", "Password", "required|trim|xss_clean");

       $username = $this->input->post('username');
       $password = md5("gef".$this->input->post('password'));

       if($this->form_validation->run() === FALSE){
           $this->response(array(
             "status" => 0,
             "message" => "All fields are needed"
           ) , REST_Controller::HTTP_NOT_FOUND);

       }else{
           if(!empty($username) && !empty($password)){
               if($this->Api_model->isUserExist($username)) {
                   $getpass=$this->Api_model->getRoleData($username);
                       if($password == $getpass->password) {
                           $session_data=array(
                               'username' => $username,
                               'role_id' => $getpass->user_type,
                               'role_name' =>$getpass->role_name,
                               'name' => $getpass->first_name.' '.$getpass->last_name,
                               'first_name' => $getpass->first_name,
                               'last_name' => $getpass->last_name,
                               'nick_name' => $getpass->nick_name,
                               'loginFront' => TRUE
                           );
                           $this->response(array(
                               "status" => 1,
                               "message" => "User login successful",
                               "data" => $session_data
                           ), REST_Controller::HTTP_OK);
                       }else{
                           $this->response(array(
                                 "status" => 0,
                                 "message" => "Invalid Username or Password"
                           ), REST_Controller::HTTP_NOT_FOUND);
                       }
               }else{
                 $this->response(array(
                    "status" => 0,
                    "message" => "User does not exist"
                 ), REST_Controller::HTTP_NOT_FOUND);
               }
           }else{
                $this->response(array(
                   "status" => 0,
                   "message" => "All fields are needed"
                ), REST_Controller::HTTP_NOT_FOUND);
           }
       }

    }

  	public function upcbarcodelookup_post(){

      	$this->form_validation->set_rules("upc_code", "UPC Code", "required|trim");

      	if($this->form_validation->run() === FALSE){
	        $this->response(array(
	          "status" => 0,
	          "message" => "UPC Code Required"
	        ) , REST_Controller::HTTP_NOT_FOUND);
      	}else{

          	if(!empty($this->input->post())){
	            $api_key  = $this->config->item('barcodelookup_key');
	            $UPC_code = $this->input->post('upc_code'); //012000002090

            //$url="https://api.barcodelookup.com/v2/products?barcode=".$UPC_code."&foratted=y&key=".$api_key;
            //exit();
	          	$curl = curl_init();
	              	curl_setopt_array($curl, array(
	          		CURLOPT_URL => "https://api.barcodelookup.com/v2/products?barcode=".$UPC_code."&foratted=y&key=".$api_key,
	          		CURLOPT_RETURNTRANSFER => true,
	          		CURLOPT_ENCODING => "",
	          		CURLOPT_MAXREDIRS => 10,
	          		CURLOPT_TIMEOUT => 0,
	          		CURLOPT_FOLLOWLOCATION => true,
	          // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	          		CURLOPT_CUSTOMREQUEST => "GET",
	          		CURLOPT_POSTFIELDS => array('barcode' => $UPC_code,'key' => $api_key),
	          		CURLOPT_HTTPHEADER => array(
	            		"Accept: application/json"
	          		),
        		));
		        $response = curl_exec($curl);
		        curl_close($curl);

      //      $response = get_data($url,$UPC_code,$api_key);

            // $response ='{"products":[{"barcode_number":"682430400102","barcode_type":"UPC","barcode_formats":"UPC 682430400102, EAN 0682430400102","mpn":"682430400102","model":"","asin":"","product_name":"Voss Artesian Water Still - 16.9 Fl Oz","title":"","category":"Food, Beverages & Tobacco > Beverages > Water > Spring Water","manufacturer":"Voss","brand":"Voss","label":"","author":"","publisher":"","artist":"","actor":"","director":"","studio":"","genre":"","audience_rating":"","ingredients":"Artesian Water","nutrition_facts":"Protein 0 G, Total lipid (fat) 0 G, Carbohydrate, by difference 0 G, Sodium, Na 0 MG, Energy 0 KCAL","color":"","format":"","package_quantity":"","size":"","length":"","width":"","height":"","weight":"","release_date":"","description":"Artesian Water Still Artesian Water Still.","features":[],"images":["https://images.barcodelookup.com/2973/29738014-1.jpg"],"stores":[{"store_name":"Walmart","store_price":null,"product_url":"https://www.walmart.com/ip/Voss-Artesian-Water-16-9-Fl-Oz/192459321&intsrc=CATF_4284","currency_code":"USD","currency_symbol":"$"},{"store_name":"Walgreens","store_price":"1.99","product_url":"https://www.walgreens.com/store/c/voss-artesian-water-still/ID=prod6117417-product","currency_code":"USD","currency_symbol":"$"},{"store_name":"Target","store_price":"1.49","product_url":"https://www.target.com/p/voss-artesian-water-16-9-fl-oz-bottle/-/A-47823824&intsrc=CATF_1444","currency_code":"USD","currency_symbol":"$"},{"store_name":"UnbeatableSale.com","store_price":"43.59","product_url":"http://www.gourmet-foodshop.com/spdsp533.html","currency_code":"USD","currency_symbol":"$"},{"store_name":"Rakuten.com","store_price":"43.59","product_url":"https://www.rakuten.com/shop/unbeatablesale/product/SPDSP533/?sku=SPDSP533&scid=af_feed","currency_code":"USD","currency_symbol":"$"}],"reviews":[]}]}';

	            $response_decode=json_decode($response);
	            print_r($response_decode);
	            echo '</pre>';
	            echo '<strong>Barcode Number:</strong> ' . $response_decode->products[0]->barcode_number . '<br><br>';
	            echo '<strong>Product Name:</strong> ' . $response_decode->products[0]->product_name. '<br><br>';

          	}else{
              	$this->response(array(
	                "status" => 0,
	                "message" => "fields are needed"
              	), REST_Controller::HTTP_NOT_FOUND);
          	}
      	}
  	}

  // POST: <project_url>/index.php/student
  public function index_post(){
      $this->form_validation->set_rules("first_name", "First Name", "required|trim|xss_clean");
      $this->form_validation->set_rules("last_name", "Last Name", "required|trim|xss_clean");
      $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email");
      $this->form_validation->set_rules("phone_no", "Mobile", "required|trim|xss_clean");
      $this->form_validation->set_rules("gender", "Gender", "required|trim|xss_clean");
      $this->form_validation->set_rules("marital_status", "Marital Status", "required|trim|xss_clean");

      $this->form_validation->set_rules("blood_group", "Blood Group", "required|trim|xss_clean");

      if($this->form_validation->run() === FALSE){
        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ) , REST_Controller::HTTP_NOT_FOUND);

      }else{
          if(!empty($this->input->post())){
              $user = array(
                "first_name" => $this->input->post('first_name'),
                "last_name" => $this->input->post('last_name'),
                "email" => $this->input->post('email'),
                "phone_no" => $this->input->post('phone_no'),
                "gender" => $this->input->post('gender'),
                "marital_status" => $this->input->post('marital_status'),
                "blood_group" => $this->input->post('blood_group'),
              );

              if($this->Api_model->insert_user($user)){
                $this->response(array(
                  "status" => 1,
                  "message" => "User has been created"
                ), REST_Controller::HTTP_OK);
              }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to create User"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }
  }

    public function insertProduct_post(){
        if(!empty($this->input->post()) )  {
          $img_url = $this->input->post('product_hidden_img');
          $split_url= substr($img_url, strrpos($img_url, '/' ) );
          $img_name=str_replace($split_url[0],'',$split_url);

          $upc_code = $this->input->post('case_upc');

          $img = './uploads/products/'.$upc_code.'_'.$img_name;

          // Function to write image into file
          file_put_contents($img, file_get_contents($img_url));

          if($img == './uploads/products/'.$upc_code.'__'){
                $img = './uploads/products/600px-No_image_available.svg (2).png';
          }

          $supplier = $this->input->post('supplier');

          if(!empty($supplier)){
              $sup = $this->Api_model->isExistSupplier($supplier);
              if(empty($sup)){
                  $dat = array(
                      'supplier_id'   => $this->auth->generator(20),
                      'supplier_name' => $this->input->post('supplier'),
                      'status' => 1,
                  );
                  $this->db->insert('supplier_information', $dat);
                  $ssupplier = $dat['supplier_name'];
                  $supplierID = $dat['supplier_id'];
              }else{
                  $supp = $this->Api_model->isExistSupplier($supplier);
                  $ssupplier = $supp->supplier_name;
                  $supplierID = $supp->supplier_id;
              }
          }

          $brand = (!empty($this->input->post('brand')) ? $this->input->post('brand'):'0');
          if(!$this->Api_model->isExistBrand($brand)){
              $dat = array(
                  'brand_id' => $this->auth->generator(15),
                  'brand_name' => $brand,
                  'description' => $brand,
                  'status' => 1,
              );
              $this->db->insert('brand', $dat);
              $brandId = $dat['brand_id'];
          }else{
              $brands = $this->Api_model->isExistBrand($brand);
              $brandId = $brands->brand_id;
          }

          $units = $this->input->post('unit');
          if($this->Api_model->get_unit($units)){
              $getunit = $this->Api_model->get_unit($units);
              $unit = $getunit->value;
          }else{
              $unit = $units;
          }

          $sizes1 = strtolower($this->input->post('size'));
          // this below code such as 2.3/4 oz purpose only
          if(strpos( $sizes1, '/' ) !== false){
              $str = explode(" ", str_replace("."," ",$sizes1));
              $str1 = explode("/", $str[1]);
              $sizes =  $str[0] + ($str1[0] / $str1[1]).' '.$str[2];
          }else{
              $sizes = $sizes1;
          }

          $measurement_val= $this->input->post('measurement_value');
          $arrs = array_filter(explode(',', $measurement_val));
          if(in_array($sizes, $arrs)){
              $extra['measurement_value'] = $this->input->post('measurement_value');
              $this->db->where('category_id', $this->input->post('category_id'));
              $this->db->update('product_category',$extra);
          }else{
              $ext['measurement_value'] = $sizes.','.$measurement_val;
              $this->db->where('category_id', $this->input->post('category_id'));
              $this->db->update('product_category',$ext);
          }

          if($this->Api_model->get_size($sizes)){
              $getsize = $this->Api_model->get_size($sizes);
              $name = $getsize->name;
          }else{
              if(strpos($sizes, 'quart') !== false){
                   $arrayName = array(
                      'name' => $sizes,
                      'size_type' => 3,
                  );
              }
              if(strpos($sizes, 'gallon') !== false){
                  $arrayName = array(
                      'name' => $sizes,
                      'size_type' => 3,
                  );
              }
              if(strpos($sizes, 'ml') !== false){
                  $arrayName = array(
                      'name' => $sizes,
                      'size_type' => 3,
                  );
              }
              if(strpos($sizes, 'liter') !== false){
                   $arrayName = array(
                      'name' => $sizes,
                      'size_type' => 2,
                  );
              }
              if(strpos($sizes, 'oz') !== false){
                   $arrayName = array(
                      'name' => $sizes,
                      'size_type' => 1,
                  );
              }
              $siz = $this->db->insert('tbl_size', $arrayName);
              $name = $arrayName['name'];
          }

          $sup_price = $this->input->post('supplier_price');
          if($sup_price == '0.00'){
              $supplier_price = '';
          }else{
              $supplier_price = $this->input->post('supplier_price');
          }

          $category_id = $this->input->post('category_id');
          if(!empty($category_id)) {
              $is_size['is_last_size'] = $name;
              $this->db->where('category_id', $category_id);
              $this->db->update('product_category', $is_size);
          }

              $data = array(
                  'product_id'            => $this->auth->generator(8),
                  'product_name'          => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_name')),
                  'short_name'            => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_nickname')),
                  'category_id'           => (!empty($category_id) ? $category_id : '0'),
                  'brand_id'              => $brandId,
                  'size'                  => $name,
                  'supplier'              => $ssupplier, //delete it
                  'supplier_id'           => $supplierID,
                  'product_details'       => $this->input->post('details'),
                  'producer'              => $this->input->post('producer'),
                  'Meta_Title'            => $this->input->post('Meta_Title'),
                  'Meta_Key'              => $this->input->post('Meta_Key'),
                  'Meta_Desc'             => $this->input->post('Meta_Desc'),
                  'unit'                  => $unit,
                  'quantity'              => $this->input->post('quantity'),
                  'abv'                   => $this->input->post('abv'),
                  'proof'                 => $this->input->post('proof'),
                  'region'                => $this->input->post('region'),
                  'supplier_price'        => number_format($supplier_price, 2),
                  'price'                 => (!empty($supplier_price)) ? $supplier_price : '0',
                  'onsale_price'          => $this->input->post('store_sell_price'),
                  'ecomm_sale_price'      => $this->input->post('ecommerce_sell_price'),
                  'barcode_formats'       => $this->input->post('barcode_formats'),
                  'case_UPC'              => (!empty($upc_code))? $upc_code : $this->input->post('upc'),
                  'barcode_type'          => $this->input->post('barcode_type'),
                  'mpn'                   => $this->input->post('mpn'),
                  'image_thumb'           => $img,
                  'store_promotion_price' => $this->input->post('store_promotion_price'),
                  'ecomm_promotion_price' => $this->input->post('ecommerce_promotion_price'),
                  'status'                => 1,
                  'Applicable_CRV'        => (!empty($this->input->post('CRV'))?$this->input->post('CRV'):'0'),
                  'Applicable_Tax'        => (!empty($this->input->post('TAX'))?$this->input->post('TAX'):'0'),
                  'parent_product'        => (!empty($this->input->post('parent_product_id'))?$this->input->post('parent_product_id'):''),
              );

              $status = (!empty($this->input->post('status'))?$this->input->post('status'):'insert');
              $table_from = (!empty($this->input->post('from'))?$this->input->post('from'):'master');

              $product_combo = $this->input->post('product_combo');
              $combo_unit = $this->input->post('combo_unit');
              $combo_price = $this->input->post('combo_price');

              if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
                $combodata = [];
                  for($t = 0; $t< count($product_combo); $t++){
                     $combodata['product_id'] = $data['product_id'];
                     $combodata['product_combo'] = $product_combo[$t];
                     $combodata['combo_unit'] = $combo_unit[$t];
                     $combodata['combo_price'] = $combo_price[$t];

                     $this->db->insert('product_combos', $combodata);

                  }
              }

            if($this->Api_model->insert_product($data,$status,$table_from,$upc_code)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Product has been created"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to create Product"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function updateProduct_post(){
      if(!empty($this->input->post()) )  {
        $product_id = $this->input->post('product_id');
        $sup_price  = $this->input->post('supplier_price');
        if($sup_price == '0.00'){
            $supplier_price = '';
        }else{
            $supplier_price = $this->input->post('supplier_price');
        }

        $supplier = $this->input->post('supplier');
        if(!empty($supplier)){
            $sup = $this->Api_model->isExistSupplier($supplier);
            if(empty($sup)){
                $dat = array(
                    'supplier_id'   => $this->auth->generator(20),
                    'supplier_name' => $this->input->post('supplier'),
                    'status' => 1,
                );
                $this->db->insert('supplier_information', $dat);
                $ssupplier = $dat['supplier_name'];
                $supplierID = $dat['supplier_id'];
            }else{
                $supp = $this->Api_model->isExistSupplier($supplier);
                $ssupplier = $supp->supplier_name;
                $supplierID = $supp->supplier_id;
            }
        }

        $brand = (!empty($this->input->post('brand')) ? $this->input->post('brand'):'0');

        if(!$this->Api_model->isExistBrand($brand)){
            $dat = array(
                'brand_id' => $this->auth->generator(15),  //chnage
                'brand_name' => $brand,
                'description' => $brand,
                'status' => 1,
            );
            $this->db->insert('brand', $dat);
            $brandId = $dat['brand_id'];
        }else{
            $brands = $this->Api_model->isExistBrand($brand);
            $brandId = $brands->brand_id;
        }

        $sizes1 = strtolower($this->input->post('size'));
        // this below code such as 2.3/4 oz purpose only
        if(strpos( $sizes1, '/' ) !== false){
            $str = explode(" ", str_replace("."," ",$sizes1));
            $str1 = explode("/", $str[1]);
            $sizes =  $str[0] + ($str1[0] / $str1[1]).' '.$str[2];
        }else{
            $sizes = $sizes1;
        }

        $measurement_val= $this->input->post('measurement_value');
        $arrs = array_filter(explode(',', $measurement_val));
        if(in_array($sizes, $arrs)){
            $extra['measurement_value'] = $this->input->post('measurement_value');
            $this->db->where('category_id', $this->input->post('category_id'));
            $this->db->update('product_category',$extra);
        }else{
            $ext['measurement_value'] = $sizes.','.$measurement_val;
            $this->db->where('category_id', $this->input->post('category_id'));
            $this->db->update('product_category',$ext);
        }

        if($this->Api_model->get_size($sizes)){
            $getsize = $this->Api_model->get_size($sizes);
            $name    = $getsize->name;
        }else{
            if(strpos($sizes, 'quart') !== false){
                 $arrayName = array(
                    'name' => $sizes,
                    'size_type' => 3,
                );
            }
            if(strpos($sizes, 'gallon') !== false){
                $arrayName = array(
                    'name' => $sizes,
                    'size_type' => 3,
                );
            }
            if(strpos($sizes, 'ml') !== false){
                $arrayName = array(
                    'name' => $sizes,
                    'size_type' => 3,
                );
            }
            if(strpos($sizes, 'liter') !== false){
                 $arrayName = array(
                    'name' => $sizes,
                    'size_type' => 2,
                );
            }
            if(strpos($sizes, 'oz') !== false){
                 $arrayName = array(
                    'name' => $sizes,
                    'size_type' => 1,
                );
            }
            $siz = $this->db->insert('tbl_size', $arrayName);
            $name = $arrayName['name'];
        }

        $category_id = $this->input->post('category_id');
        if(!empty($category_id)) {
            $is_size['is_last_size'] = $name;
            $this->db->where('category_id', $category_id);
            $this->db->update('product_category', $is_size);
        }

          $old_qty = $this->input->post('old_quantity');
          $new_qty = $this->input->post('quantity');
          if( $old_qty != $new_qty ){
              $product_shopify_id = $this->Api_model->get_productinfo_by_id($product_id);
              if($product_shopify_id != null){
                  $api_data =array(
                      'shopify_product_id' => $product_shopify_id ,
                      'quantity' => $new_qty,
                  );
                  $this->eplugin->update_inventory($api_data);
              }
          }

          $product_info = array(
              'product_name'          => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_name')),
              'short_name'            => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_nickname')),
              'category_id'           => (!empty($category_id) ? $category_id : '0'),
              'brand_id'              => $brandId,
              'size'                  => $name,
              'supplier'              => $ssupplier,  //delete it
              'supplier_id'           => $supplierID,
              'product_details'       => $this->input->post('details'),
              'producer'              => $this->input->post('producer'),
              'Meta_Title'            => $this->input->post('Meta_Title'),
              'Meta_Key'              => $this->input->post('Meta_Key'),
              'Meta_Desc'             => $this->input->post('Meta_Desc'),
              'unit'                  => $this->input->post('unit'),
              'quantity'              => $new_qty,
              'abv'                   => $this->input->post('abv'),
              'proof'                 => $this->input->post('proof'),
              'region'                => $this->input->post('region'),
              'supplier_price'        => number_format($supplier_price, 2),
              'price'                 => (!empty($supplier_price)) ? $supplier_price : '0',
              'onsale_price'          => $this->input->post('store_sell_price'),
              'ecomm_sale_price'      => $this->input->post('ecommerce_sell_price'),
              'store_promotion_price' => $this->input->post('store_promotion_price'),
              'ecomm_promotion_price' => $this->input->post('ecommerce_promotion_price'),
              'Applicable_CRV'        => $this->input->post('CRV'),
              'Applicable_Tax'        => $this->input->post('TAX'),
              'is_ecommerce'          => $this->input->post('is_ecommerce'),
              'parent_product'        => (!empty($this->input->post('parent_product_id'))?$this->input->post('parent_product_id'):''),
          );

          $product_combo = $this->input->post('product_combo');
          $combo_unit = $this->input->post('combo_unit');
          $combo_price = $this->input->post('combo_price');

          if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
              $this->db->where('product_id', $product_id);
              $delete = $this->db->delete('product_combos');
          }

          if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
              $combodata = [];
              for($t = 0; $t< count($product_combo); $t++){
                   $combodata['product_id'] = $product_id;
                   $combodata['product_combo'] = $product_combo[$t];
                   $combodata['combo_unit'] = $combo_unit[$t];
                   $combodata['combo_price'] = $combo_price[$t];
                  $this->db->insert('product_combos', $combodata);
              }
          }elseif(empty($product_combo[0])){
              $this->db->where('product_id',$product_id);
              $this->db->delete('product_combos');
          }

          if($this->Api_model->update_product($product_id, $product_info)){
              $this->response(array(
                "status" => 1,
                "message" => "Product data updated successfully"
              ), REST_Controller::HTTP_OK);
          }else{
        $this->response(array(
                "status" => 0,
                "messsage" => "Failed to update product data"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }

      }else{
        $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

  public function user_post(){
    $this->form_validation->set_rules("first_name", "First Name", "required|trim|xss_clean");
    $this->form_validation->set_rules("last_name", "Last Name", "required|trim|xss_clean");
    $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email");
    $this->form_validation->set_rules("phone_no", "Mobile", "required|trim|xss_clean");
    $this->form_validation->set_rules("gender", "Gender", "required|trim|xss_clean");
    $this->form_validation->set_rules("marital_status", "Marital Status", "required|trim|xss_clean");

    $this->form_validation->set_rules("blood_group", "Blood Group", "required|trim|xss_clean");

    if($this->form_validation->run()){
        $data = array(
          "first_name" => $this->input->post('first_name'),
          "last_name" => $this->input->post('last_name'),
          "email" => $this->input->post('email'),
          "phone_no" => $this->input->post('phone_no'),
          "gender" => $this->input->post('gender'),
          "marital_status" => $this->input->post('marital_status'),
          "blood_group" => $this->input->post('blood_group'),
        );
        $res = $this->Api_model->insert($data);
        $this->response($res);
    }
  }


  function get_data($url,$UPC_code,$api_key) {
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        //CURLOPT_POSTFIELDS => array('barcode' => $UPC_code,'key' => $api_key),
        CURLOPT_HTTPHEADER => array(
          "Accept: application/json"
        ),
      ));
      $response = curl_exec($curl);
      curl_close($curl);

      return $response;

  }

  public function UPCbarcodescan_post(){
        $barcode= $this->input->post('barcode');
        $data= $this->Api_model->getProductData($barcode);

        if(!empty($data)){
            $img = ltrim($data->image_thumb,"./");

            $product_id = $data->product_id;
            $combo_data = $this->Api_model->get_combo_productdata($product_id);
            $combodata = [];
              for($t = 0; $t< count($combo_data); $t++){
                 $arr['product_combo'] = $combo_data[$t]->product_combo;
                 $arr['combo_unit'] = $combo_data[$t]->combo_unit;
                 $arr['combo_price'] = $combo_data[$t]->combo_price;

                 array_push($combodata,$arr);
            }

            $response = [
                "success" => 'yes',
                "products"=> [
                "0"=>[
                "actor"=>"",
                "artist"=>"",
                "asin"=>"",
                "audience_rating"=>"",
                "author"=>"",
                "product_id"=>"".$data->product_id."", //created by
                "barcode_formats"=>"".$data->barcode_formats."",
                "barcode_number"=>"".$data->case_UPC."",
                "barcode_type"=>"".$data->barcode_type."",
                "brand"=>"".$data->brand_name."",
                "category"=>"".$data->category_name."",
                "category_id"=>"".$data->category_id."",  //created by
                "color"=>"",
                "description"=>"",
                "director"=>"",
                "features"=>[],
                "format"=>"",
                "genre"=>"",
                "height"=>"",
                "images"=>["".base_url().$img.""],
                "ingredients"=>"",
                "label"=>"",
                "length"=>"",
                "manufacturer"=>"".$data->producer."",
                "model"=>"",
                "mpn"=>"".$data->mpn."",
                "nutrition_facts"=>"",
                "package_quantity"=>"".$data->quantity."",
                "product_name"=>"".$data->product_name."",
                "publisher"=>"",
                "release_date"=>"",
                "unit"=>"".$data->unit."",  //created by
                "product_details"=>"".$data->product_details."",  //created by
                "meta_title"=>"".$data->Meta_Title."",  //created by
                "meta_key"=>"".$data->Meta_Key."",  //created by
                "meta_description"=>"".$data->Meta_Desc."",  //created by
                "abv"=>"".$data->abv."",  //created by
                "proof"=>"".$data->proof."",  //created by
                "region"=>"".$data->region."",  //created by
                "supplier_price"=>"".$data->supplier_price."",  //created by
                "store_sell_price"=>"".$data->onsale_price."",  //created by
                "ecomm_sell_price"=>"".$data->ecomm_sale_price."",  //created by
                "store_promotion_price"=>"".$data->store_promotion_price."",  //created by
                "ecomm_promotion_price"=>"".$data->ecomm_promotion_price."",  //created by
                "Applicable_CRV"=>"".$data->Applicable_CRV."",  //created by
                "Applicable_Tax"=>"".$data->Applicable_Tax."",  //created by
                "supplier"=>"".$data->supplier."",  //created by
                "reviews"=>[],
                "size"=>"".$data->size."",
                "status"=>"update",
                "from"=>"store",
                "is_ecommerce"=>"".$data->is_ecommerce."",
                "stores"=> [
                        "0"=>[
                                "currency_code"=>"USD",
                                "currency_symbol"=>"$",
                                "product_url"=>"",
                                "store_name"=>"",
                                "store_price"=>"",
                            ]



                ],
                "studio"=>"",
                "title"=>"",
                "weight"=>"",
                "width"=>"",
                "product_combo_data"=>$combodata,
                ]
               ]
            ];

            // array_push($response,$combodata);

            echo json_encode($response);

        } else {
            $data1= $this->Api_model->getProductMasterData($barcode);

            if(!empty($data1)){
                $img = ltrim($data1->image_thumb,"./");

                $response = [
                    "success" => 'yes',
                    "products"=> [
                    "0"=>[
                    "actor"=>"",
                    "artist"=>"",
                    "asin"=>"",
                    "audience_rating"=>"",
                    "author"=>"",
                    "product_id"=>"".$data1->product_id."", //created by
                    "barcode_formats"=>"".$data1->barcode_formats."",
                    "barcode_number"=>"".$data1->case_UPC."",
                    "barcode_type"=>"".$data1->barcode_type."",
                    "brand"=>"".$data1->brand_name."",
                    "category"=>"".$data1->category_name."",
                    "category_id"=>"".$data1->category_id."",  //created by
                    "color"=>"",
                    "description"=>"",
                    "director"=>"",
                    "features"=>[],
                    "format"=>"",
                    "genre"=>"",
                    "height"=>"",
                    "images"=>["".base_url().$img.""],
                    "ingredients"=>"",
                    "label"=>"",
                    "length"=>"",
                    "manufacturer"=>"".$data1->producer."",
                    "model"=>"",
                    "mpn"=>"".$data1->mpn."",
                    "nutrition_facts"=>"",
                    "package_quantity"=>"".$data1->quantity."",
                    "product_name"=>"".$data1->product_name."",
                    "publisher"=>"",
                    "release_date"=>"",
                    "unit"=>"".$data1->unit."",  //created by
                    "product_details"=>"".$data1->product_details."",  //created by
                    "meta_title"=>"".$data1->Meta_Title."",  //created by
                    "meta_key"=>"".$data1->Meta_Key."",  //created by
                    "meta_description"=>"".$data1->Meta_Desc."",  //created by
                    "abv"=>"".$data1->abv."",  //created by
                    "proof"=>"".$data1->proof."",  //created by
                    "region"=>"".$data1->region."",  //created by
                    "supplier_price"=>"".$data1->supplier_price."",  //created by
                    "store_sell_price"=>"".$data1->onsale_price."",  //created by
                    "ecomm_sell_price"=>"".$data1->ecomm_sale_price."",  //created by
                    "store_promotion_price"=>"".$data1->store_promotion_price."",  //created by
                    "ecomm_promotion_price"=>"".$data1->ecomm_promotion_price."",  //created by
                    "Applicable_CRV"=>"".$data1->Applicable_CRV."",  //created by
                    "Applicable_Tax"=>"".$data1->Applicable_Tax."",  //created by
                    "supplier"=>"".$data1->supplier."",  //created by
                    "reviews"=>[],
                    "size"=>"".$data1->size."",
                    "status"=>"insert",
                    "from"=>"master",
                    "stores"=> [
                            "0"=>[
                                    "currency_code"=>"USD",
                                    "currency_symbol"=>"$",
                                    "product_url"=>"",
                                    "store_name"=>"",
                                    "store_price"=>"",
                                ]



                    ],
                    "studio"=>"",
                    "title"=>"",
                    "weight"=>"",
                    "width"=>"",
                    ]
                   ]
                ];

                echo json_encode($response);
            }else{
                $response = $this->need_lib->get_product_by_upc($barcode);
                if(!empty($response)){
                $response->success= 'yes';
                $cat_array = explode('>', $response->products[0]->category);
                $catname = end($cat_array);
                $cat_id = $this->Api_model->find_category($catname);
                $response->products[0]->category_id=$cat_id['category_id'];//$cat_id['category_id'];

                // $response->products[0]->Applicable_Tax=$cat_id['Applicable_Tax'];
                // $response->products[0]->Applicable_CRV=$cat_id['Applicable_CRV'];
                $response->products[0]->status='insert';
                $response->products[0]->from='api';
                }else{
                    $response->success= 'no';
                }

                echo json_encode($response);
            }

        }

    }

    //prashant code
    public function brand_get(){
        $brands = $this->Api_model->get_brands();
        if(count($brands) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Brands found",
            "data" => $brands
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No Brands found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function unit_get(){
        $units = $this->Api_model->get_units();

        if(count($units) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Units found",
            "data" => $units
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No Units found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function supplier_get(){
        $supplier = $this->Api_model->get_suppliers();
        if(count($supplier) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Suppliers found",
            "data" => $supplier
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No Suppliers found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function recentitem_get(){
        $recentitem = $this->Api_model->recentitem();

        if(count($recentitem) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Item found",
            "data" => $recentitem
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No Item found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }



    public function size_get(){
        $sizes = $this->Api_model->get_sizes();

        if(count($sizes) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "sizes found",
            "data" => $sizes
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No sizes found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function fetchsize_post(){
        $category_id = $this->input->post('category_id');
        $sizes = $this->Api_model->fetch_size($category_id);
        if(count($sizes) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "sizes found",
            "data" => $sizes
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No sizes found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function category_get(){

      $data['category'] = $this->Api_model->get_all_category();
        foreach ($data['category']  as $key => $value) {
          $data['category'][$key]['sub_cat'] = $this->Api_model->get_all_category($value['category_id']);
          foreach ($data['category'][$key]['sub_cat']  as $key_sub => $value_sub) {
              $data['category'][$key]['sub_cat'][$key_sub]['child_cat'] = $this->Api_model->get_all_category($value_sub['category_id']);
              foreach ($data['category'][$key]['sub_cat'][$key_sub]['child_cat']  as $key_child => $value_child) {
                  $data['category'][$key]['sub_cat'][$key_sub]['child_cat'][$key_child]['grand_cat'] = $this->Api_model->get_all_category($value_child['category_id']);
              }
          }
        }

      if(count($data['category']) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Categories found",
          "data" => $data['category']
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "No category found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

    //prasant 9 mar api work
  public function orderdetails_post(){
      $data = json_decode(file_get_contents("php://input"));
      $email = $data[0]->customer_email;
      if(!empty($data)){
          $arrayName = array(
            'order_id' => $this->auth->generator(15),
            'tax_amount' => $data[0]->tax,
            'container_deposit' => $data[0]->crv,
            'paid_amount' => $data[0]->sub_total,
          );

          $this->Api_model->insert_order($arrayName);

          if(!empty($email)){
            $order_id = $arrayName['order_id'];
            $data["order_id"] = $order_id;

            $getPOSReceiptData = $this->Api_model->getPOSReceiptData($order_id);
            $data["getPOSReceiptData"] = $getPOSReceiptData;

              $pdf = '<body class="body2">
                <div class="header d-flex justify-content-center mt-1 flex-column">
                  <img src="'.base_url("/assets/cashier/images/c.png").'" alt="" class="src" width="150" height="100" />
                  <div class="textcon mx-auto d-flex flex-column">
                    <p class="left bold-3  mt-0 mb-0  mx-auto text-wrap" style="margin-left: 15%;">
                      5425 El Cajon Blvd.,
                    </p>
                    <p class="m-0 mx-auto" style="margin-left: 15%;">
                      San Diego, CA 92115
                    </p>

                      <p class="m-0 mx-auto" style="margin-left: 16%;">STORE ID 5670690</p>

                    <img src="'.base_url("/assets/cashier/images/bar.svg").'" class="w-50 mx-auto img-bar" style="width: 140px; height:80px; margin-left: 15%;"/>
                    <div class="stars bold">
                  ***********************************************
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between" >
                  <div class="wrap-address d-flex flex-column w-50" style="margin-left:30%;">
                    <p class="left bold-3">ORDER NO:</p>
                    <p class="left bold-3 w-75 text-wrap">'.$getPOSReceiptData["order_no"].'</p>
                  </div>
                  <div class="top-wrap d-flex w-50 justify-content-end" style="margin-left:25%; margin-top:-9%;">
                    <div class="wrap-address d-flex flex-column text-end">
                      <p class="middle bold-3 text-nowrap">DATE & TIME:</p>
                      <p class="middle w-100">'.date("m/d/Y").'</p>
                      <p id="time_set" class="right w-100">'.$getPOSReceiptData["order_time"].'</p>
                    </div>
                  </div>
                </div>

                <div class="stars bold" style="margin-left:30%;">
                  ***********************************************
                </div>
                <div class="table-con">';
                $sub_total = 0;
                $tot_qty   = 0;
                if (count($getPOSReceiptData['order_details']) > 0) {
                  foreach ($getPOSReceiptData['order_details'] as $key => $value) {
                $pp = $value['rate'] * $value['quantity'];
                $pdf.='<table style="margin-left:30%; margin-right:15%;">
                      <tr>
                        <th style="width: 18%">QUANT.</th>
                        <th style="width: 28%; padding-left:4px;">ITEMS</th>
                        <th style="padding-left:74px;">PRICE</th>
                      </tr>
                      <tr>
                        <td>'.$value["quantity"].'</td>
                        <td ><span class="bold">*</span>'.$value["product_name"].'@'.$value["rate"].'</td>
                        <td>$'.number_format($pp, 2).'</td>
                      </tr>
                    </table>';
                  }
                }

                $pdf.='<p class="total-items m-0 mt-3" style="margin-left:30%;">Total Items : '.$tot_qty.'</p>
                  <div class="stars lines w-100" style="margin-left:30%;">
                    -----------------------------------
                  </div>';
                  $grand_total = $sub_total + $getPOSReceiptData["tax"] + $getPOSReceiptData["container_deposit"];
                  $tt = $grand_total + $getPOSReceiptData['return_balance'];
                  $pdf.='<table style="margin-left:30%; margin-right:10%;">
                    <tr>
                      <th>Subtotal</th>
                      <th>$'.number_format($sub_total, 2).'</th>
                    </tr>
                    <tr>
                      <th>Tax</th>
                      <th>$'.$getPOSReceiptData['tax'].'</th>
                    </tr>
                    <tr>
                      <th>Container Deposit</th>
                      <th>$'.$getPOSReceiptData['container_deposit'].'</th>
                    </tr>
                    <tr>
                      <th>Total</th>
                      <th>$'.number_format($grand_total, 2).'</th>
                    </tr>
                    <tr>
                      <th>Cash</th>
                      <th>$'.number_format($tt, 2).'</th>
                    </tr>
                    <tr>
                      <th>Change</th>
                      <th>$'.$getPOSReceiptData['return_balance'].'</th>
                    </tr>
                  </table>
                </div>
                <div class="stars bold" style="margin-left:30%;">
                  ***********************************************
                </div>
                <p class="text-center foot-text">Your Total Savings on This Order</p>
                <p class="amt text-center foot-text">$0</p>
                <p class="text-center" style="padding-left:20px;">You earned 0 Points</p>

                <p class="tq mb-0">THANK YOU !!</p>
                <p class="tq mt-0 mb-3">FOR SHOPPING WITH US</p>

              </body>';


              $mpdf = new \Mpdf\Mpdf();
              $stylesheet = file_get_contents(base_url().'assets/cashier/style/order_details.css'); // external css
              $mpdf->WriteHTML('<html><head>');
              $mpdf->WriteHTML('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" /></link>');
              $mpdf->WriteHTML($stylesheet,1);
              $mpdf->WriteHTML('</head>');
              $mpdf->WriteHTML($pdf,2);
              $mpdf->WriteHTML('</html>');
              // $mpdf->Output(); // opens in browser
              $path = 'uploads/order_rcpt/'.$order_id.'_order_details.pdf';
              $mpdf->Output($path);  // file_put_contents($order_id.'_order_details.pdf', './uploads/');

              $config = Array(
                  'protocol' => 'smtp',
                  'smtp_host' => 'ssl://smtp.gmail.com',
                  'smtp_port' => '25',
                  'smtp_user' => 'me@example.com',
                  'smtp_pass' => 'mypassword',
                  'mailtype' => 'html',
                  'charset' => 'utf-8'
              );
              //

              $this->load->library('email');
              $this->email->initialize($config);
              $this->email->from('okapse7@gmail.com');
              $this->email->to('pkapse7@gmail.com');
              $this->email->subject('Email Test');
              $this->email->message($path);
              $this->email->send();

            }

            foreach ($data[0]->product_info as $value) {
                $catdata = [];
                $catdata['order_details_id'] = $this->auth->generator(15);
                $catdata['order_id'] = $arrayName['order_id'];
                $catdata['product_id'] = $value->product_id;
                $catdata['product_name'] = $value->product_name;
                $catdata['quantity'] = $value->quantity;
                $catdata['rate'] = $value->product_price;

                $result = $this->Api_model->insert_order_details($catdata);

                if($result){
                  $this->response(array(
                        "status" => 1,
                        "message" => "Data inserted successfully",
                        "order_pdf" => base_url().$path,
                        "mail_status" => "sent",
                      ), REST_Controller::HTTP_OK);
                }else{
                  $this->response(array(
                       "status" => 0,
                       "message" => "Failed",
                       "mail_status" => "not_sent",
                     ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }
            };

        }else{
          $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
          ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    //prasant 24 mar api work
    public function coupons_get(){
        $coupons = $this->Api_model->get_coupons();
        if(count($coupons) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Coupons found",
            "data" => $coupons
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No Coupons found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function promotions_get(){
        $promotions = $this->Api_model->get_promotions();
        if(count($promotions) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Promotions found",
            "data" => $promotions
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No Promotions found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function create_coupon_post(){
        if(!empty($this->input->post()))  {
            $coupon_type = $this->input->post('coupon_type');
            if($coupon_type == 8){
                $product_id = !empty($this->input->post('product_id')) ? implode(',',$this->input->post('product_id')) : '';
            }elseif($coupon_type == 3){
                $product_id = !empty($this->input->post('product_id')) ? implode('',$this->input->post('product_id')) : '';
            }elseif($coupon_type != 3 || $coupon_type != 8){
                $product_id = '';
            }
            $coupon_condition = $this->input->post('coupon_condition');
            if($coupon_condition == '--Select Condition--'){
                $coupon_condition = '';
            }else{
                $coupon_condition = $this->input->post('coupon_condition');
            }
             $startdate = explode('-',$this->input->post('start_date'));
             $enddate = explode('-',$this->input->post('end_date'));
             $data = array(
                'coupon_id'                => $this->auth->generator(15),
                'coupon_name'              => $this->input->post('coupon_name'),
                'coupon_type'              => $coupon_type,
                'product_id'               => $product_id,
                'category_id'              => $this->input->post('category_id'),
                'brand_id'                 => $this->input->post('brand_id'),
                'product_qty'              => (!empty($this->input->post('product_qty'))?$this->input->post('product_qty'):''),
                'coupon_price_type'        => $this->input->post('discount_type'),
                'coupon_amount'            => (!empty($this->input->post('discount_amount'))?$this->input->post('discount_amount'):null),
                'discount_percentage'      => (!empty($this->input->post('discount_percentage'))?$this->input->post('discount_percentage'):null),
                'coupon_condition'         => $coupon_condition,
                'coupon_condition_price'   => $this->input->post('coupon_condition_price'),
                'usetype'                  => $this->input->post('usetype'),
                'autoapply'                => $this->input->post('autoapply'),
                'coupon_apply_type'        => $this->input->post('apply_type'),
                'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
                'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
                'coupon_details'           => $this->input->post('coupon_details'),
                'combo_amount'             =>(!empty($this->input->post('combo_amount'))?$this->input->post('combo_amount'):0),
                'status'                   => 1,
            );
            $data = $this->security->xss_clean($data);

            if($this->Api_model->insert_coupon($data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Coupon has been created"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to create coupon"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function update_coupon_post(){
      if(!empty($this->input->post()) )  {
          $coupon_type = $this->input->post('coupon_type');
          if($coupon_type == 8){
              $product_id = !empty($this->input->post('product_id')) ? implode(',',$this->input->post('product_id')) : '';
          }elseif($coupon_type == 3){
              // $product_id = !empty($this->input->post('product_id')) ? implode('',$this->input->post('product_id')) : '';
              $product_id = !empty($this->input->post('product_id')[0]) ? $this->input->post('product_id')[0] : '';
          }elseif($coupon_type != 3 || $coupon_type != 8){
              $product_id = '';
          }
           $coupon_id = $this->input->post('coupon_id');
           $startdate = explode('-',$this->input->post('start_date'));
           $enddate = explode('-',$this->input->post('end_date'));
           $data = array(
              'coupon_name'              => $this->input->post('coupon_name'),
              'coupon_type'              => $coupon_type,
              'product_id'               => $product_id,
              'category_id'              => $this->input->post('category_id'),
              'brand_id'                 => $this->input->post('brand_id'),
              'product_qty'              => $this->input->post('product_qty'),
              'coupon_price_type'        => $this->input->post('discount_type'),
              'coupon_amount'            => $this->input->post('discount_amount'),
              'discount_percentage'      => $this->input->post('discount_percentage'),
              'coupon_condition'         => $this->input->post('coupon_condition'),
              'coupon_condition_price'   => $this->input->post('coupon_condition_price'),
              'usetype'                  => $this->input->post('usetype'),
              'autoapply'                => $this->input->post('autoapply'),
              'coupon_apply_type'        => $this->input->post('apply_type'),
              'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
              'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
              'coupon_details'           => $this->input->post('coupon_details'),
              'combo_amount'             =>(!empty($this->input->post('combo_amount'))?$this->input->post('combo_amount'):0),
          );
          $data = $this->security->xss_clean($data);
          if($this->Api_model->update_coupon($coupon_id,$data)){
              $this->response(array(
                "status" => 1,
                "message" => "Coupon updated successfully"
              ), REST_Controller::HTTP_OK);
          }else{
        $this->response(array(
                "status" => 0,
                "messsage" => "Failed to update coupon"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }

      }else{
        $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

    public function delete_coupon_post(){
       $coupon_id = $this->security->xss_clean($this->input->post('coupon_id'));
       if($this->Api_model->delete_coupon($coupon_id)){
         $this->response(array(
           "status" => 1,
           "message" => "Coupon has been deleted"
         ), REST_Controller::HTTP_OK);
       }else{
         // return false
         $this->response(array(
           "status" => 0,
           "message" => "Failed to delete Coupon"
         ), REST_Controller::HTTP_NOT_FOUND);
       }
   }

    public function coupon_data_post(){
        $coupon_id = $this->input->post('coupon_id');
        $coupondata = $this->Api_model->get_coupon_by_id($coupon_id);
        if(count($coupondata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Coupon Data found",
            "data" => $coupondata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function create_promotion_post(){
        if(!empty($this->input->post()))  {
            $pro_id = $this->input->post('product_id');
            $product_id = implode(',',$pro_id);
            $startdate = explode('-',$this->input->post('start_date'));
            $enddate = explode('-',$this->input->post('end_date'));
            $data = array(
                'coupon_id'                => $this->auth->generator(15),
                'coupon_name'              => $this->input->post('promotion_name'),
                'coupon_type'              => $this->input->post('promotion_type'),
                'product_id'               => $product_id,
                'product_qty'              => $this->input->post('product_qty'),
                'usetype'                  => $this->input->post('usetype'),
                'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
                'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
                'coupon_details'           => $this->input->post('promotion_details'),
                'combo_amount'             => $this->input->post('combo_amount'),
                'receipt_promotion'        => $this->input->post('receipt_promotion'),
                'manage_type'              => 1,
                'status'                   => 1,
                'is_footer'                => $this->input->post('is_receipt_promotion'),
            );
            $data = $this->security->xss_clean($data);
            if($this->Api_model->insert_promotion($data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Promotion has been created"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to create promotion"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function update_promotion_post(){
      if(!empty($this->input->post()) )  {
          $pro_id = $this->input->post('product_id');
          $product_id = implode(',',$pro_id);
          $coupon_id = $this->input->post('promotion_id');
          $startdate = explode('-',$this->input->post('start_date'));
          $enddate = explode('-',$this->input->post('end_date'));
          $data = array(
              'coupon_name'              => $this->input->post('promotion_name'),
              'coupon_type'              => $this->input->post('promotion_type'),
              'product_id'               => $product_id,
              'product_qty'              => $this->input->post('product_qty'),
              'usetype'                  => $this->input->post('usetype'),
              'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
              'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
              'coupon_details'           => $this->input->post('promotion_details'),
              'combo_amount'             => $this->input->post('combo_amount'),
              'receipt_promotion'        => $this->input->post('receipt_promotion'),
              'is_footer'                => $this->input->post('is_receipt_promotion'),
          );
          $data = $this->security->xss_clean($data);
          if($this->Api_model->update_promotion($coupon_id,$data)){
              $this->response(array(
                "status" => 1,
                "message" => "Promotion updated successfully"
              ), REST_Controller::HTTP_OK);
          }else{
        $this->response(array(
                "status" => 0,
                "messsage" => "Failed to update promotion"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }

      }else{
        $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
      }
    }


    public function promotion_data_post(){
        $coupon_id = $this->input->post('promotion_id');
        $promotiondata = $this->Api_model->get_promotion_by_id($coupon_id);
        if(count($promotiondata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Promotion Data found",
            "data" => $promotiondata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    //end

    public function get_category_post(){
      $category_id = $this->input->post('category_id');
      $catdata = $this->Api_model->fetch_category_name($category_id);
      if(count($catdata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Category found",
          "data" => $catdata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

    public function get_brand_post(){
      $brand_id = $this->input->post('brand_id');
      $branddata = $this->Api_model->fetch_brand_name($brand_id);
      if(count($branddata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Brand found",
          "data" => $branddata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

    public function get_product_post(){
      $searchtxt=$this->input->post('searchtxt');
      $size_i=$this->input->post('size_i');
      $productdata = $this->Api_model->fetch_product_name($searchtxt,$size_i);
      if(count($productdata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Product found",
          "data" => $productdata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }

    public function delete_promotion_post(){
       $promotion_id = $this->security->xss_clean($this->input->post('promotion_id'));
       if($this->Api_model->delete_promotion($promotion_id)){
         $this->response(array(
           "status" => 1,
           "message" => "Promotion has been deleted"
         ), REST_Controller::HTTP_OK);
       }else{
         // return false
         $this->response(array(
           "status" => 0,
           "message" => "Failed to delete Promotion"
         ), REST_Controller::HTTP_NOT_FOUND);
       }
   }

    public function sizes_get(){
        $sizes = $this->Api_model->get_all_sizes();
        if(count($sizes) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Sizes found",
            "data" => $sizes
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Not found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

  //customer apis 9-4-021

   public function country_get(){
       $country = $this->Api_model->fetchCountry();
       if(count($country) > 0){
         $this->response(array(
           "status" => 1,
           "message" => "Country found",
           "data" => $country
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Not found",
         ), REST_Controller::HTTP_NOT_FOUND);
       }
   }

   public function states_post(){
       $countryId = $this->input->post('country_id');
       $state = $this->Api_model->fetchStatebyCountry($countryId);
       if(count($state) > 0){
         $this->response(array(
           "status" => 1,
           "message" => "State found",
           "data" => $state
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Not found",
         ), REST_Controller::HTTP_NOT_FOUND);
       }
   }


   public function customers_get(){
       $customer = $this->Api_model->get_all_customer();
       if(count($customer) > 0){
         $this->response(array(
           "status" => 1,
           "message" => "Customers found",
           "data" => $customer
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Not found",
         ), REST_Controller::HTTP_NOT_FOUND);
       }
   }

   public function get_customer_post(){
     $customer_id = $this->input->post('customer_id');
     $customer = $this->Api_model->get_customer_by_id($customer_id);

     if(count($customer) > 0){
       $this->response(array(
         "status" => 1,
         "message" => "Customer found",
         "data" => $customer
       ), REST_Controller::HTTP_OK);
     }else{
       $this->response(array(
         "status" => 0,
         "message" => "Not found",
       ), REST_Controller::HTTP_NOT_FOUND);
     }
   }

   public function create_customer_post(){
       if(!empty($this->input->post()))  {
           $data = array(
               'customer_id' => $this->auth->generator(15),
               'customer_name' => $this->input->post('customer_fname').' '.$this->input->post('customer_lname'),
               'first_name' => $this->input->post('customer_fname'),
               'last_name' => $this->input->post('customer_lname'),
               'customer_email' => $this->input->post('customer_email'),
               'customer_mobile' => $this->input->post('customer_phone'),
               'customer_address_1' => $this->input->post('address_1'),
               'customer_address_2' => $this->input->post('address_2'),
               'country' => $this->input->post('country'),
               'state' => $this->input->post('state'),
               'city' => $this->input->post('city'),
               'zip'=> $this->input->post('zipcode'),
               'status'=> 1,
               'is_active' => 1,
               'added_on' => date('Y/m/d H:i:s'),
           );
           $data = $this->security->xss_clean($data);
           if($this->Api_model->insert_customer($data)){
               $this->response(array(
                 "status" => 1,
                 "message" => "Customer has been created"
               ), REST_Controller::HTTP_OK);
           }else{
               $this->response(array(
                 "status" => 0,
                 "message" => "Failed to create customer"
               ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
       }else{
           $this->response(array(
               "status" => 0,
               "message" => "All fields are needed"
           ), REST_Controller::HTTP_NOT_FOUND);
       }
   }


   public function update_customer_post(){
     if(!empty($this->input->post()) )  {
         $customer_id = $this->input->post('customer_id');
         $data = array(
             'customer_name' => $this->input->post('customer_fname').' '.$this->input->post('customer_lname'),
             'first_name' => $this->input->post('customer_fname'),
             'last_name' => $this->input->post('customer_lname'),
             'customer_email' => $this->input->post('customer_email'),
             'customer_mobile' => $this->input->post('customer_phone'),
             'customer_address_1' => $this->input->post('address_1'),
             'customer_address_2' => $this->input->post('address_2'),
             'country' => $this->input->post('country'),
             'state' => $this->input->post('state'),
             'city' => $this->input->post('city'),
             'zip'=> $this->input->post('zipcode'),
         );

         $data = $this->security->xss_clean($data);
         if($this->Api_model->update_customer($customer_id,$data)){
             $this->response(array(
               "status" => 1,
               "message" => "Customer updated successfully"
             ), REST_Controller::HTTP_OK);
         }else{
       $this->response(array(
               "status" => 0,
               "messsage" => "Failed to update customer"
           ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
         }

     }else{
       $this->response(array(
               "status" => 0,
               "message" => "All fields are needed"
           ), REST_Controller::HTTP_NOT_FOUND);
     }
   }

   public function delete_customer_post(){
      $customer_id = $this->security->xss_clean($this->input->post('customer_id'));
      if($this->Api_model->delete_customer($customer_id)){
        $this->response(array(
          "status" => 1,
          "message" => "Customer has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        // return false
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete customer"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function get_country_post(){
    $country_id = $this->input->post('country_id');
    $country = $this->Api_model->get_country_by_id($country_id);

    if(count($country) > 0){
      $this->response(array(
        "status" => 1,
        "message" => "Country found",
        "data" => $country
      ), REST_Controller::HTTP_OK);
    }else{
      $this->response(array(
        "status" => 0,
        "message" => "Not found",
      ), REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function get_state_post(){
    $state_id = $this->input->post('state_id');
    $country_id = $this->input->post('country_id');
    $state = $this->Api_model->get_state_by_id($state_id,$country_id);

    if(count($state) > 0){
      $this->response(array(
        "status" => 1,
        "message" => "State found",
        "data" => $state
      ), REST_Controller::HTTP_OK);
    }else{
      $this->response(array(
        "status" => 0,
        "message" => "Not found",
      ), REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function leave_requests_get(){
      $leaves = $this->Api_model->get_all_leave();
      if(count($leaves) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Leave Requests found",
          "data" => $leaves
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function cash_requests_get(){
      $cash = $this->Api_model->get_all_cash_advance();
      if(count($cash) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Cash Advance Requests found",
          "data" => $cash
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }


  //search employee
  public function search_leaveemp_post(){
    $searchtxt = $this->input->post('employee');
    $status = $this->input->post('status');
    $leavedata = $this->Api_model->fetch_emp_by_search($searchtxt,$status);
    if(count($leavedata) > 0){
      $this->response(array(
        "status" => 1,
        "message" => "Leave found",
        "data" => $leavedata
      ), REST_Controller::HTTP_OK);
    }else{
      $this->response(array(
        "status" => 0,
        "message" => "Not found",
      ), REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function leave_status_post(){
      $status = $this->input->post('status');
      $leavedata = $this->Api_model->filter_emp_leave_by_status($status);
      if(count($leavedata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Leave Approvals found",
          "data" => $leavedata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function search_cashemp_post(){
      $searchtxt = $this->input->post('employee');
      $status = $this->input->post('status');
      $cashdata = $this->Api_model->fetch_cash_employee($searchtxt,$status);
      if(count($cashdata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Cash Approvals found",
          "data" => $cashdata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function cash_status_post(){
      $status = $this->input->post('status');
      $cashdata = $this->Api_model->filter_cash_advance($status);
      if(count($cashdata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Cash Advance found",
          "data" => $cashdata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function leavetypes_get(){
      $leavetype = $this->Api_model->get_all_leaveType();
      if(count($leavetype) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Leave Types Found",
          "data" => $leavetype
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function insert_leave_request_post(){
      if(!empty($this->input->post()))  {
        $emp_id =  $this->input->post('username');
        $leave_type = $this->input->post('leave_type');
        $start = $this->input->post('start_date');
        $end = (!empty($this->input->post('end_date'))?$this->input->post('end_date'):$this->input->post('start_date'));

        if($leave_type == '0'){
          $requested_hr = $this->input->post('requested_hr');
        }else{
          $requested_hr = '';
        }
        $requested_day = $this->input->post('requested_day');

        $data = array(
            'employee_id' => $emp_id,
            'employee_name' => $this->input->post('first_name').' '.$this->input->post('last_name'),
            'start_date' => date("m-d-Y", strtotime($start)),
            'end_date' => date("m-d-Y", strtotime($end)),
            'leaveType' => $leave_type,
            'reason' => $this->input->post('reason'),
            'days_requested' => (!empty($requested_day)?$requested_day:''),
            'hours_requested' => (!empty($requested_hr)?$requested_hr:''),
            'status' => 'Pending',
        );

        if($leave_type == '0'){
            $maxLeaves = $this->Api_model->getAccruedLeaves();
        }else{
            $maxLeaves = $this->Api_model->getMaxLeaves($leave_type);
        }

        $leavesTaken =  ( (strtotime($end) - strtotime($start) )/60/60/24) + 1;

        $isExist = $this->Api_model->empExits($emp_id,$leave_type);

        if(!$isExist){

            $arrayName = array(
                'employee_id' => $emp_id,
                'leave_type' => $leave_type,
                'maximum_leaves' => (!empty($maxLeaves->max_leave)?$maxLeaves->max_leave:''),
                'maximum_accrued_hr' => (!empty($maxLeaves->hours_accrued_leave)?$maxLeaves->hours_accrued_leave:''),
                'leaves_taken' => $leavesTaken,
                'req_leave_hours' => (!empty($requested_hr)?$requested_hr:'0')
            );
            $this->Api_model->insert_leave_statistics($arrayName);
        }
        else{

            $arrayName = array(
                'leaves_taken' => $isExist['leaves_taken'] + $leavesTaken,
                'req_leave_hours' => $isExist['requested_hr'] + $requested_hr
            );

            $this->Api_model->update_leave_statistics($arrayName,$emp_id,$leave_type);

        }

          $data = $this->security->xss_clean($data);
          if($this->Api_model->insert_leave($data)){
              $this->response(array(
                "status" => 1,
                "message" => "Leave request has been submitted"
              ), REST_Controller::HTTP_OK);
          }else{
              $this->response(array(
                "status" => 0,
                "message" => "Failed to leave request"
              ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }
      }else{
          $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
          ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function change_leavestatus_post(){
      $leave_id = $this->input->post('leave_id');
      $reason = (!empty($this->input->post('denied_reason'))?$this->input->post('denied_reason'):'');
      $data = array(
          'status' => $this->input->post('status'),
          'deny_reason' => $reason,
      );
      $leave = $this->Api_model->change_leave_status($leave_id,$data);
      if(count($leave) > 0){
          $this->response(array(
              "status" => 1,
              "message" => "Leave request approval status has been updated",
              "data" => $leave
          ), REST_Controller::HTTP_OK);
      }else{
          $this->response(array(
            "status" => 0,
            "message" => "Failed to update leave request approval status",
          ), REST_Controller::HTTP_NOT_FOUND);
      }
  }


  public function change_cashstatus_post(){
      $cash_id = $this->input->post('cash_id');
      $reason = (!empty($this->input->post('denied_reason'))?$this->input->post('denied_reason'):'');
      $data = array(
          'status' => $this->input->post('status'),
          'denied_reason' => $reason,
      );
      $cash = $this->Api_model->change_advcash_status($cash_id,$data);
      if(count($cash) > 0){
          $this->response(array(
              "status" => 1,
              "message" => "Cash Advance request approval status has been updated",
              "data" => $cash
          ), REST_Controller::HTTP_OK);
      }else{
          $this->response(array(
            "status" => 0,
            "message" => "Failed to update cash advance request approval status",
          ), REST_Controller::HTTP_NOT_FOUND);
      }
  }


  public function leave_requests_select_post(){
      $emp_id = $this->input->post('employee_id');
      $leave_req_type = $this->input->post('leave_req_type');

      $fdate = $this->input->post('from_date');
      $to_date = $this->input->post('to_date');
      $fdate_n=date("Y-m-d",strtotime($fdate));
      $to_n=date("Y-m-d",strtotime($to_date));

      $requestdata = $this->Api_model->get_leaverequests_by_type($leave_req_type,$emp_id,$fdate_n,$to_n);
      if(count($requestdata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Request status found",
          "data" => $requestdata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }

  }

  public function cash_request_status_post(){
      $emp_id = $this->input->post('employee_id');
      $cashdata = $this->Api_model->get_cash_advance_hrms($emp_id);
      if(count($cashdata) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Request status found",
          "data" => $cashdata
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Not found",
        ), REST_Controller::HTTP_NOT_FOUND);
      }

  }


  public function insert_cashadv_request_post(){
        if(!empty($this->input->post()))  {
            $data = array(
                'employee_id'          => $this->input->post('emp_id'),
                'employee_name'        => $this->input->post('first_name').' '.$this->input->post('last_name'),
                'advance_amount'       => $this->input->post('advance_amount'),
                'reason'               => $this->input->post('reason'),
                'paycheck'             => $this->input->post('paycheck'),
                'status'               => 'Pending',
            );

            $data = $this->security->xss_clean($data);

            if($this->Api_model->insert_advance_cash($data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Cash Advance request has been created"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to Cash Advance request"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function leave_addinfo_post(){
        $leave_id = $this->input->post('leave_id');
        $data = array(
            'notes' => $this->input->post('add_info'),
        );
        $leave = $this->Api_model->leave_addinfo($leave_id,$data);
        if(count($leave) > 0){
            $this->response(array(
                "status" => 1,
                "message" => "Additional Info has been updated",
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Failed to update additional info",
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function cash_addinfo_post(){
        $cash_id = $this->input->post('cash_id');
        $data = array(
            'notes' => $this->input->post('add_info'),
        );
        $cash = $this->Api_model->cash_addinfo($cash_id,$data);
        if(count($cash) > 0){
            $this->response(array(
                "status" => 1,
                "message" => "Additional Info has been updated",
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Failed to update additional info",
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function get_leavedata_post(){
        $leave_id = $this->input->post('leave_id');
        $emp_id =  $this->input->post('employee_id');
        $leavedata = $this->Api_model->get_leave_by_id($leave_id,$emp_id);
        if(count($leavedata) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Leave found",
              "data" => $leavedata
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Not found",
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function get_cashdata_post(){
        $cash_id = $this->input->post('cash_id');
        $cashdata = $this->Api_model->get_cash_by_id($cash_id);
        if(count($cashdata) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Cash Advance data found",
              "data" => $cashdata
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Not found",
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function get_remaining_leave_post(){
       $emp_id =  $this->input->post('employee_id');
       $leave_type = $this->input->post('leave_type');
       $data = $this->Api_model->empExits($emp_id,$leave_type);
       if(!empty($data)){
           $result['remaining_leave'] = $data['maximum_leaves'] - $data['days_requested'];
           $this->response(array(
             "status" => 1,
             "message" => "Remaining Leaves Found",
             "data" => $result,
           ), REST_Controller::HTTP_OK);
       }else{
           $result['remaining_leave'] = $this->Api_model->get_MaxLeave($leave_type);
           $this->response(array(
             "status" => 1,
             "message" => "Remaining Leaves Found",
             "data" => $result['remaining_leave'],
           ), REST_Controller::HTTP_OK);
       }
    }


  	public function update_leave_request_post(){
        if(!empty($this->input->post()))  {

            $emp_id =  $this->input->post('employee_id');
            $leave_type = $this->input->post('leave_type');
            $leave_id = $this->input->post('leave_id');
            $start = $this->input->post('start_date');
            $end = (!empty($this->input->post('end_date'))?$this->input->post('end_date'):$this->input->post('start_date'));

            if($leave_type == '0'){
              $requested_hr = $this->input->post('requested_hr');
            }else{
              $requested_hr = '';
            }
            $requested_day = $this->input->post('requested_day');

            $data = array(
                'employee_id' => $emp_id,
                'employee_name' => $this->input->post('first_name').' '.$this->input->post('last_name'),
                'start_date' => date("m-d-Y", strtotime($start)),
                'end_date' => date("m-d-Y", strtotime($end)),
                'leaveType' => $leave_type,
                'reason' => $this->input->post('reason'),
                'days_requested' => (!empty($requested_day)?$requested_day:''),
                'hours_requested' => (!empty($requested_hr)?$requested_hr:''),
                'status' => 'Pending',
            );

            if($leave_type == '0'){
                $maxLeaves = $this->Api_model->getAccruedLeaves();
            }else{
                $maxLeaves = $this->Api_model->getMaxLeaves($leave_type);
            }
            $leavesTaken =  ( (strtotime($end) - strtotime($start) )/60/60/24) + 1;

            $isExist = $this->Api_model->empExits($emp_id,$leave_type);

            if(!$isExist){
                $arrayName = array(
                    'employee_id' => $emp_id,
                    'leave_type' => $leave_type,
                    'maximum_leaves' => (!empty($maxLeaves->max_leave)?$maxLeaves->max_leave:''),
                    'maximum_accrued_hr' => (!empty($maxLeaves->hours_accrued_leave)?$maxLeaves->hours_accrued_leave:''),
                    'leaves_taken' => (!empty($requested_hr)?'':$leavesTaken),
                    'req_leave_hours' => (!empty($requested_hr)?$requested_hr:'0')
                );

                $this->Api_model->insert_leave_statistics($arrayName);
            }else{
                $old_hr = $this->input->post('old_requested_hr');
                $new_hr = $requested_hr;
                if($old_hr > $new_hr){
                  $actual_hr = $new_hr - $old_hr;
                }else{
                  $actual_hr = $old_hr - $new_hr;
                }
                $arrayName = array(
                    'leaves_taken' => $isExist['leaves_taken'],
                    'req_leave_hours' => $isExist['requested_hr'] + $actual_hr,
                );

                $this->Api_model->update_leave_statistics($arrayName,$emp_id,$leave_type);

            }

            $data = $this->security->xss_clean($data);
            if($this->Api_model->update_leave($leave_id,$data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Leave request has been updated"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to update leave request"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function cancel_leave_post(){
        $leave_id = $this->input->post('leave_id');
        $data = array(
            'status' => 'Cancelled',
            'days_requested' => '0',
            'hours_requested' => '0',
        );
        $leave = $this->Api_model->delete_leave($leave_id,$data);
        if(count($leave) > 0){
            $this->response(array(
                "status" => 1,
                "message" => "Leave Request has beeen cancelled",
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Failed to cancel leave request",
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function update_cash_request_post(){
        if(!empty($this->input->post()))  {
            $cash_id = $this->input->post('cash_id');
            $data = array(
                'employee_id'          => $this->input->post('employee_id'),
                'employee_name'        => $this->input->post('first_name').' '.$this->input->post('last_name'),
                'advance_amount'       => $this->input->post('advance_amount'),
                'reason'               => $this->input->post('reason'),
                'paycheck'             => $this->input->post('paycheck'),
            );
            $data = $this->security->xss_clean($data);
            if($this->Api_model->update_advancecash($cash_id,$data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Cash Advance Request has been updated"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to update cash advance request"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "All fields are needed",
            ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function cancel_cash_post(){
        $cash_id = $this->input->post('cash_id');
        $cash = $this->Api_model->delete_cash($cash_id);
        if(count($cash) > 0){
            $this->response(array(
                "status" => 1,
                "message" => "Cash Advance Request has beeen cancelled",
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Failed to cancel cash advance request",
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function clock_in_out_post(){
        $this->form_validation->set_rules("username", "Username", "required|trim|xss_clean");
        $this->form_validation->set_rules("password", "Password", "required|trim|xss_clean");

        $username = $this->input->post('username');
        $password = md5("gef".$this->input->post('password'));

        if($this->form_validation->run() === FALSE){
            $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
            ) , REST_Controller::HTTP_NOT_FOUND);

        }else{
            if(!empty($username) && !empty($password)){
                if($this->Api_model->isUserExist($username)) {
                    $getpass=$this->Api_model->getRoleData($username);
                    if($password == $getpass->password) {
                        $session_data =array(
                            'username' =>$getpass->username,
                            'first_name' => $getpass->first_name,
                            'last_name' => $getpass->last_name,
                            'type' => $getpass->user_type,
                            'loginEmp' =>TRUE //boolean value TRUE
                        );

                        if($this->input->post('session_type') == 'login'){
                            $data = array(
                                'timecard_ID' => 'TC_2222',
                                'username' => $username,
                                'date' => date('Y-m-d'),
                                'user_action' => 1, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                            );
                            $data = $this->Api_model->insertTimesheet($data);
                            $response = array(
                                'first_name' => $session_data['first_name'],
                                'last_name' => $session_data['last_name'],
                                'session' => "Clocked In",
                            );

                            $attendance = '1';
                            $this->Api_model->change_clock_in_out($attendance,$username);

                            $this->response(array(
                                "status" => 1,
                                "message" => "Clocked In Successfully",
                                "data" => $response
                            ), REST_Controller::HTTP_OK);
                        }elseif($this->input->post('session_type') == 'logout'){
                            $arr = $this->Api_model->getUserData($username);
                            $data = array(
                                'timecard_ID' => 'TC_2222',
                                'username' => $username,
                                'date' => date('Y-m-d'),
                                'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                            );

                            $data = $this->Api_model->insertTimesheet($data);
                            $response = array(
                                'first_name' => $arr->first_name,
                                'last_name' => $arr->last_name,
                                'session' => "Clocked Out",
                            );

                            $attedence = '0';
                            $this->Api_model->change_clock_in_out($attedence,$username);

                            $this->response(array(
                                "status" => 1,
                                "message" => "Clocked Out Successfully",
                                "data" => $response
                            ), REST_Controller::HTTP_OK);

                        }
                    }else{
                      $this->response(array(
                            "status" => 0,
                            "message" => "Invalid Username or Password"
                      ), REST_Controller::HTTP_NOT_FOUND);
                    }
                }
                else{
                  $this->response(array(
                     "status" => 0,
                     "message" => "User does not exist"
                  ), REST_Controller::HTTP_NOT_FOUND);
                }
            }else{
              $this->response(array(
                 "status" => 0,
                 "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function get_permission_post(){
        $Role_id = $this->input->post("Role_id");
        $user_id =  $this->input->post('employee_id');
        $data = $this->Api_model->get_permission_ajax($Role_id);
        $result = $this->Api_model->get_perm_ajax($user_id);

        $permission = array(
          'role_permission' => $data,
          'user_permission' => $result,
        );

        if(count($permission) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Permissions Found",
              "data" => $permission
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Not found",
            ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function inventory_products_get(){
        $current_page = $this->input->get('current_page');
        $limit = 20;
        $offset = ($current_page - 1) * $limit;
        $products = $this->Api_model->get_all_products($limit,$offset);
        $num_rows = $this->Api_model->get_rows();
        $data = array(
          'products' => $products,
          'current_page' => $current_page,
          'total_pages' => ceil ($num_rows / $limit),
        );
        if(!empty($data)){
            $this->response(array(
              "status" => 1,
              "message" => "Products Found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Not found",
            ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function leave_request_status_post(){
        $emp_id = $this->input->post('employee_id');
        $requestdata = $this->Api_model->get_all_leave_hrms($emp_id);
        if(count($requestdata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Request status found",
            "data" => $requestdata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Not found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function search_product_get(){
        $searchdata = $this->Api_model->fetch_product_by_text();
        if(count($searchdata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Products found",
            "data" => $searchdata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Product Not found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function search_product_upc_get(){
        $searchdata = $this->Api_model->fetch_product_by_upc();
        if(count($searchdata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Products found",
            "data" => $searchdata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Not found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function scratcher_products_get(){
        $current_page = $this->input->get('current_page');
        $limit = 20;
        $offset = ($current_page - 1) * $limit;
        $products = $this->Api_model->get_all_scratcher_inventory_products($limit,$offset);
        $num_rows = $this->Api_model->get_scratcher_products_rows();
        $data = array(
          'scratcher_products' => $products,
          'current_page' => $current_page,
          'total_pages' => ceil ($num_rows / $limit),
        );
        if(!empty($data)){
            $this->response(array(
              "status" => 1,
              "message" => "Products Found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Not found",
            ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function synk_live_post(){
        $synk_query = $this->input->post('synk_query');
        if($this->Api_model->synk_query_data($synk_query)){
            $this->response(array(
              "status" => 1,
              "message" => "Success"
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Failed"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function insertScratcher_post(){
        if(!empty($this->input->post()) )  {
            $upc_code = $this->input->post('case_upc');
            $units = $this->input->post('unit');
            if($this->Api_model->get_unit($units)){
                $getunit = $this->Api_model->get_unit($units);
                $unit = $getunit->value;
            }else{
                $unit = $units;
            }
            $sup_price = $this->input->post('supplier_price');
            if($sup_price == '0.00'){
                $supplier_price = '';
            }else{
                $supplier_price = $this->input->post('supplier_price');
            }

            $data = array(
                'product_id'            => $this->auth->generator(8),
                'product_name'          => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('scratcher_name')),
                'short_name'            => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('scratcher_name')),
                'bin'                   => $this->input->post('bin'),
                'category_id'           => '0',
                'supplier'              => 'California State Lottery',
                'supplier_id'           => '285ZB5OC81G7S2A67XHA',
                'unit'                  => $unit,
                'quantity'              => $this->input->post('quantity'),
                'onsale_price'          => $this->input->post('scratcher_price'),
                'supplier_price'        => number_format($supplier_price, 2),
                'price'                 => (!empty($supplier_price)) ? $supplier_price : '0',
                'case_UPC'              => $upc_code,
                'status'                => 1,
                'Applicable_CRV'        => '0',
                'Applicable_Tax'        => '0',
                'is_scratchable'        => 1,
                'scratcher_no_from'     => $this->input->post('scratcher_no_from'),
                'scratcher_no_to'       => $this->input->post('scratcher_no_to'),
            );

            if($this->Api_model->add_scratcher($data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Scratcher has been created"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to create Scratcher"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function scratcher_data_post(){
        $product_id = $this->input->post('scratcher_id');
        $scratcherdata = $this->Api_model->get_scratcher_by_id($product_id);
        if(count($scratcherdata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Scratcher Data found",
            "data" => $scratcherdata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function updateScratcher_post(){
        if(!empty($this->input->post()) )  {
            $product_id = $this->input->post('scratcher_id');

            $sup_price = $this->input->post('supplier_price');
            if($sup_price == '0.00'){
                $supplier_price = '';
            }else{
                $supplier_price = $this->input->post('supplier_price');
            }
            $data = array(
                'product_name'          => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('scratcher_name')),
                'short_name'            => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('scratcher_name')),
                'bin'                   => $this->input->post('bin'),
                'supplier_price'        => number_format($supplier_price, 2),
                'price'                 => (!empty($supplier_price)) ? $supplier_price : '0',
                'unit'                  => $this->input->post('unit'),
                'quantity'              => $this->input->post('quantity'),
                'onsale_price'          => $this->input->post('scratcher_price'),
                'scratcher_no_from'     => $this->input->post('scratcher_no_from'),
                'scratcher_no_to'       => $this->input->post('scratcher_no_to'),
            );

            if($this->Api_model->update_scratcher($product_id,$data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Scratcher data updated successfully"
                ), REST_Controller::HTTP_OK);
            }else{
                  $this->response(array(
                      "status" => 0,
                      "messsage" => "Failed to update Scratcher data"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function search_scratcher_get(){
        $searchdata = $this->Api_model->fetch_scratcher_by_text();
        if(count($searchdata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Scratchers found",
            "data" => $searchdata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Scratcher Not found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function scratcher_upc_post(){
        $case_upc = $this->input->post('upc');
        $scratcherdata = $this->Api_model->get_scratcher_by_upc($case_upc);
        if(count($scratcherdata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Scratcher Data found",
            "data" => $scratcherdata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function recent_scratcher_get(){
        $recentitem = $this->Api_model->recent_scratcher_items();
        if(count($recentitem) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Scratchers found",
            "data" => $recentitem
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Scratchers not found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function cashadvance_modal_get(){
        $recentitem = $this->Api_model->get_cash_modal_data();
        if(count($recentitem) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $recentitem
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function delete_image_post(){
        $product_id = $this->input->post('product_id');
        $data['image_thumb'] = './uploads/products/600px-No_image_available.svg (2).png';
        if($this->Api_model->delete_product_image($product_id,$data)){
            $this->response(array(
              "status" => 1,
              "message" => "Image deleted successfully"
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "messsage" => "Failed to delete image"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function check_clock_in_out_post(){
        $username =  $this->input->post('employee_id');
        $clockdata = $this->Api_model->check_clock_in_out($username);
        if(count($clockdata) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $clockdata
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function coupon_conditions_get(){
        $data[0] = array(
            'title' => 'Total Greater Than',
            'value' => '1',
        );
        $data[1] = array(
            'title' => 'Product Greater Than (Only for product coupon type)',
            'value' => '3'
        );
        if(!empty($data)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function insert_custom_product_post(){
        if(!empty($this->input->post()) )  {
            $data = array(
                'product_id' =>  $this->auth->generator(8),
                'case_UPC' => $this->input->post('product_upc'),
                'product_name' => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('custom_product_name')),
                'onsale_price' => $this->input->post('custom_product_price'),
                'short_name' => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('custom_product_name')),
                'is_custom_product' => '1',
                'Applicable_CRV' => (!empty($this->input->post('CRV'))?$this->input->post('CRV'):'0'),
                'Applicable_Tax' => (!empty($this->input->post('TAX'))?$this->input->post('TAX'):'0'),
                'image_thumb' => './uploads/products/600px-No_image_available.svg (2).png',
             );
            $data = $this->security->xss_clean($data);
            if($this->Api_model->insert_custom_product($data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Custom Product has been created"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to create Custom Product"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function cash_advance_setting_post(){

        if(!empty($this->input->post()) )  {
            $data = array(
                'paycheck_amount'  => $this->input->post('paycheck_amount'),
                'no_of_paychecks'  => $this->input->post('no_of_paychecks'),
             );

            $data = $this->security->xss_clean($data);

            if($this->Api_model->update_paychecks($data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Cash Advance Setting has been updated"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to updated cash advance setting"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function custom_key_get(){

        $data['custom_key'] = $this->Api_model->get_customkey_data();
        if(!empty($data)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }

    }

    public function remove_custom_key_post(){
        $data = $this->Api_model->remove_custom_key();
        if($data){
          $user_id        =  $this->session->userdata('username');
          $notification   = 'Delete custom key';
          $action_id      =  $this->session->userdata('username');
          $action         = 'delete custom key';
          $module         = 'store setting';

          $this->Api_model->insert_user_notification($user_id,$notification,$action_id,$action,$module);

          $this->response(array(
            "status" => 1,
            "message" => "Custom key deleted successfully",
            "data" => $data,
          ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "messsage" => "Failed to delete custom key"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function custom_key_update_post(){
        $exist = $this->Api_model->existCustomKey($this->input->post('customkey_name'),$this->input->post('customkey_id'));
        if($exist == false){
            $data = $this->Api_model->update_key_setting();
            if($data){
              $this->response(array(
                "status" => 1,
                "message" => "Custom key update successfully",
                "data" => $data
              ), REST_Controller::HTTP_OK);
            }else{
              $this->response(array(
                "status" => 0,
                "message" => "Error to update Custom key",
              ), REST_Controller::HTTP_NOT_FOUND);
            }

        }else{
          $this->response(array(
                "status" => 0,
                "message" => "Custom key already exists",
          ), REST_Controller::HTTP_NOT_FOUND);

        }

    }

    //prashant  21-June-2021
    public function cashadvance_settings_get(){
        $data = $this->Api_model->get_web_setting_data();
        $result = array(
            'max_amount' => $data->paycheck_amount,
            'max_paychecks' => $data->no_of_paychecks,
            'max_percent_paycheck' => '15'
        );
        if(!empty($data)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $result
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function receipt_promotions_get(){
        $data = $this->Api_model->get_all_receipt_promotions();
        if(count($data) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function custom_receipt_msg_get(){
        $data = $this->Api_model->get_custom_msg();
        $dat = $this->Api_model->get_web_setting_data();
        $data = array(
            'msg_list' => $data,
            'selected_msg' => $dat->custom_msg,
        );
        if(count($data) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function update_custom_receipt_msg_post(){
        if(!empty($this->input->post()) ) {
            $response = $this->Api_model->update_receipt_msg();
            if(!empty($response)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Custom Receipt Message has been updated",
                  "data" => $response
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to updated custom receipt message"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }

    }


    public function delete_receipt_promotion_post(){
          $coupon_id = $this->input->post('coupon_id');
          if($this->Api_model->delete_receipt_promotion($coupon_id)){
              $this->response(array(
                "status" => 1,
                "message" => "Receipt promotion deleted successfully"
              ), REST_Controller::HTTP_OK);
          }else{
              $this->response(array(
                "status" => 0,
                "messsage" => "Failed to delete receipt promotion"
              ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }
    }

    public function store_information_get(){
        $setting_detail = $this->Api_model->retrieve_setting_editdata();
        if(count($setting_detail) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $setting_detail
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function update_store_information_post(){

      if(!empty($this->input->post()) ) {
        $data=array(
            'language'      => $this->input->post('language'),
            'secret_key'    => $this->input->post('secret_key'),
            'name'          => $this->input->post('name'),
            'mobile'        => $this->input->post('mobile_no'),
            'address'       => $this->input->post('address'),
            'email'         => $this->input->post('email'),
            'website'       => $this->input->post('website'),
            'apps_url'      => $this->input->post('apps_url'),
            'instagram_url' => $this->input->post('instagram_url'),
            'twitter_url'   => $this->input->post('twitter_url'),
            'facebook_url'  => $this->input->post('facebook_url'),
            'Meta_Title'    => $this->input->post('Meta_Title'),
            'Meta_Key'      => $this->input->post('Meta_Key'),
            'Meta_Desc'     => $this->input->post('Meta_Desc'),
        );

        if(!empty($this->input->post('logo'))){
            $image_parts = explode(";base64,", $_POST['logo']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file =  './assets/images/logo/'.uniqid().'.png';
            file_put_contents($file, $image_base64);
            $data['logo'] = substr($file, 2);
        }
        $data = $this->security->xss_clean($data);
        if($this->Api_model->update_setting($data)){
            $this->response(array(
              "status" => 1,
              "message" => "Store Information has been updated",
              //"data" => $response
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "Failed to store information"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

      }else{
          $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
          ), REST_Controller::HTTP_NOT_FOUND);
      }

    }

    public function store_about_get(){
        $data = $this->Api_model->get_web_setting_data();
        if(count($data) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data->about_store
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function scratcher_settings_get(){
        $bins = $this->Api_model->get_all_scratcher_bins();
        if(count($bins) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => count($bins)
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function update_bins_post(){
        $bins = $this->input->post('bins');
        if($this->Api_model->update_bins($bins)){
            $this->response(array(
              "status" => 1,
              "message" => "Scratcher Settings Updated successfully"
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "messsage" => "Failed to delete scratcher settings"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function custom_categories_get(){
        $data = $this->Api_model->get_all_custom_category();
        if(count($data) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function insert_custom_category_post(){
        if(!empty($this->input->post()))  {
          $response = $this->Api_model->add_category_btn();
            if($response == 1){
                $this->response(array(
                  "status" => 1,
                  "message" => "Custom Category has been created"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to custom category"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function get_custom_catdata_post(){
        $id = $this->input->post('cat_id');;
        $data = $this->Api_model->get_custom_category_data($id);
        if(count($data) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "No found",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function update_custom_category_post(){
        if(!empty($this->input->post()))  {
          $response = $this->Api_model->update_custom_category();
            if($response == 1){
                $this->response(array(
                  "status" => 1,
                  "message" => "Custom Category has been updated"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Failed to update custom category"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function delete_custom_category_post(){
        $cat_id = $this->input->post('category_id');
        if($this->Api_model->delete_custom_category($cat_id)){
            $this->response(array(
              "status" => 1,
              "message" => "Custom Category has been deleted"
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "messsage" => "Failed to delete custom category"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function tax_settings_get(){
        $data = $this->Api_model->get_tax();
        if(count($data) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data->tax_setting_others
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function update_tax_post(){
        $data = array('tax_setting_others' => $this->input->post('tax'));
        $response = $this->Api_model->updateTax($data);
        if($response){
            $this->response(array(
              "status" => 1,
              "message" => "Custom Category has been deleted",
              "data" => $response
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "messsage" => "Failed to delete custom category"
            ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function module_login_post(){

       $this->form_validation->set_rules("username", "Username", "required|trim|xss_clean");
       $this->form_validation->set_rules("password", "Password", "required|trim|xss_clean");

       $username = $this->input->post('username');
       $password = md5("gef".$this->input->post('password'));

       if($this->form_validation->run() === FALSE){
           $this->response(array(
             "status" => 0,
             "message" => "All fields are needed"
           ) , REST_Controller::HTTP_NOT_FOUND);

       }else{
           if(!empty($username) && !empty($password)){
              $getpass=$this->Api_model->getRoleData($username);
              $check = $this->Api_model->checkPermission($username, $this->input->post('module'), $getpass->user_type);
              $clock_permission = $getpass->clock_in_out;
              if($this->Api_model->isUserExist($username)) {
                if($password == $getpass->password){
                    if($check == 1){
                        if($clock_permission == 1){
                            //already clock in on web
                            $session_data=array(
                                 'username' => $username,
                                 'role_id' => $getpass->user_type,
                                 'role_name' =>$getpass->role_name,
                                 'name' => $getpass->first_name.' '.$getpass->last_name,
                                 'first_name' => $getpass->first_name,
                                 'last_name' => $getpass->last_name,
                                 'nick_name' => $getpass->nick_name,
                                 'module' => $this->input->post('module'),
                                 'clock_status' => $getpass->clock_in_out,
                                 'loginFront' => TRUE
                            );
                             $this->response(array(
                                 "status" => 1,
                                 "message" => "Already Clocked In",
                                 "data" => $session_data
                             ), REST_Controller::HTTP_OK);
                        }else{
                            //clock in successfully
                              $das = array(
                                  'timecard_ID' => 'TC_2222',
                                  'username' => $username,
                                  'date' => date('Y-m-d'),
                                  'user_action' => 1, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                              );
                              $data = $this->Api_model->insertTimesheet($das);
                              $attendance = '1';
                              $insert_dat= $this->Api_model->change_clock_in_out($attendance,$username);
                              if($insert_dat){
                                  $send_data=array(
                                       'username' => $username,
                                       'role_id' => $getpass->user_type,
                                       'role_name' =>$getpass->role_name,
                                       'name' => $getpass->first_name.' '.$getpass->last_name,
                                       'first_name' => $getpass->first_name,
                                       'last_name' => $getpass->last_name,
                                       'nick_name' => $getpass->nick_name,
                                       'module' => $this->input->post('module'),
                                       'clock_status' => $getpass->clock_in_out,
                                       'loginFront' => TRUE
                                  );
                                  $this->response(array(
                                      "status" => 1,
                                      "message" => "Clocked In Successfully",
                                      "data" => $send_data
                                  ), REST_Controller::HTTP_OK);
                              }
                        }
                    }else{
                        $this->response(array(
                          "status" => 0,
                          "message" => "User does not have access"
                        ), REST_Controller::HTTP_NOT_FOUND);
                    }
                }else{
                    $this->response(array(
                       "status" => 0,
                       "message" => "Invalid Username or Password"
                    ), REST_Controller::HTTP_NOT_FOUND);
                }
              }else{
                 $this->response(array(
                    "status" => 0,
                    "message" => "User does not exist"
                 ), REST_Controller::HTTP_NOT_FOUND);
             }
           }else{
                $this->response(array(
                   "status" => 0,
                   "message" => "All fields are needed"
                ), REST_Controller::HTTP_NOT_FOUND);
           }

       }

    }

    // public function front_login_post(){
    //     $this->form_validation->set_rules("username", "Username", "required|trim|xss_clean");
    //     $this->form_validation->set_rules("password", "Password", "required|trim|xss_clean");
    //
    //     $username = $this->input->post('username');
    //     $password = md5("gef".$this->input->post('password'));
    //     $module = $this->input->post('module');
    //     $shift_username = $this->input->post('shift_username');
    //     $shift_status = $this->input->post('shift_status');
    //
    //
    //
    //     if(!empty($this->input->post())){
    //         $getpass=$this->Api_model->getRoleData($username);
    //         if($this->Api_model->isUserExist($username)) {
    //             $clock_status = $getpass->clock_in_out;
    //
    //             $check = $this->Api_model->checkPermission($username, $module, $getpass->user_type);
    //             $fontsize = $this->Api_model->get_web_setting_data();
    //             $checkAttendance=$this->Api_model->checkAttendance($username);
    //
    //                 if($password == $getpass->password){
    //                   /*check clock in or clock out previous_status*/
    //                   if($clock_status == 1 ){
    //                     /*check user permission or not*/
    //                       if($check == 1) {
    //
    //                          /*set user login session*/
    //                          if($getpass->user_type != 1){
    //
    //                              $session_data=array(
    //                                  // 'user_id' => $user_id,
    //                                  'username' => $username,
    //                                  'role_id' => $getpass->user_type,
    //                                  'role_name' =>$getpass->role_name,
    //                                  'name' => $getpass->first_name.' '.$getpass->last_name,
    //                                  'nick_name' => $getpass->nick_name,
    //                                  'fontsize' => $fontsize->font_size,
    //                                  'clock_perm' => $clock_status,
    //                                  'loginFront' => TRUE
    //                              );
    //
    //                              $this->response(array(
    //                                  "status" => 1,
    //                                  // "message" => "Already Clocked In",
    //                                  "data" => $session_data
    //                              ), REST_Controller::HTTP_OK);
    //                          }
    //
    //                           // $this->session->set_userdata($session_data);
    //
    //                           $data=array(
    //                               'username' => $username,
    //                               'role_id' => $getpass->user_type,
    //                               'role_name' =>$getpass->role_name,
    //                               'name' => $getpass->first_name.' '.$getpass->last_name,
    //                           );
    //                           $this->Api_model->insert_login_data($data);
    //
    //                           $arrayName = array(
    //                               'module' => $module,
    //                               'Role_id' => $getpass->user_type,
    //                               'username' => $username,
    //                               'clock_perm' => $clock_status,
    //                           );
    //
    //                           if($module == 'clock' ){
    //
    //                             if($checkAttendance['clock']->user_action == 2 ){
    //
    //                                 if($shift_username != $username){
    //
    //                                       if($shift_status == 'shift_on'){
    //                                           $data = array(
    //                                               'timecard_ID' => 'TC_2222',
    //                                               'username' => $username,
    //                                               'date' => date('Y-m-d'),
    //                                               'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
    //                                               'datetime' => date('Y-m-d H:i:s'),
    //                                           );
    //                                           $data = $this->Api_model->insertTimesheet($data);
    //                                           $response = array(
    //                                               'fname' => $getpass->first_name,
    //                                               'lname' => $getpass->last_name,
    //                                               'status' => 'auto_clockout',
    //                                               'module' => 'clock',
    //                                               'clock_perm' => $clock_status,
    //                                           );
    //
    //                                           $attendance = '0';
    //                                           $this->Api_model->change_clock_in_out($attendance,$username);
    //
    //                                           $this->response(array(
    //                                             "status" => 1,
    //                                             "message" => "Clock Out successfully",
    //                                             "data" => $response
    //                                           ), REST_Controller::HTTP_OK);
    //                                       }else{
    //
    //                                           $this->response(array(
    //                                             "status" => 1,
    //                                             // "message" => "Already Clocked Indfgdfgdfg",
    //                                             "data" => $arrayName
    //                                           ), REST_Controller::HTTP_OK);
    //                                       }
    //                                 }
    //                             }elseif($checkAttendance['clock']->user_action == 1){
    //
    //
    //                                 if($checkAttendance['date_status'] != 'today'){
    //                                       $miss_clockout = array(
    //                                           'timecard_ID' => 'TC_2222',
    //                                           'username' => $username,
    //                                           'date' => date("Y-m-d", strtotime("yesterday")),
    //                                           'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
    //                                           'datetime' => date("Y-m-d H:i:s", strtotime("today 60 sec ago")),
    //                                       );
    //
    //                                       $result_clockout = $this->Api_model->insertTimesheet($miss_clockout);
    //                                       if($result_clockout){
    //                                           if($getpass->user_type == 1){
    //                                               $session_data['admindata']=array(
    //                                                   // 'user_id' => $user_id,
    //                                                   'username' => $username,
    //                                                   'role_id' => $getpass->user_type,
    //                                                   'role_name' =>$getpass->role_name,
    //                                                   'name' => $getpass->first_name.' '.$getpass->last_name,
    //                                                   'nick_name' => $getpass->nick_name,
    //                                                   'fontsize' => $fontsize->font_size,
    //                                                   'clock_perm' => $clock_status,
    //                                                   'loginAdmin' => TRUE
    //                                                 );
    //
    //                                                 $this->response(array(
    //                                                     "status" => 1,
    //                                                     // "message" => "Already Clocked In",
    //                                                     "data" => $session_data
    //                                                 ), REST_Controller::HTTP_OK);
    //                                           }
    //
    //
    //                                           $data = array(
    //                                               'timecard_ID' => 'TC_2222',
    //                                               'username' => $username,
    //                                               'date' => date('Y-m-d'),
    //                                               'user_action' => 1, // 1 = clock-in (Login) and 2 = clock-out (Logout)
    //                                               'datetime' => date('Y-m-d H:i:s'),
    //                                           );
    //                                           $result = $this->Api_model->insertTimesheet($data);
    //
    //                                           $response = array(
    //                                               'name' => $getpass->first_name.' '.$getpass->last_name,
    //                                               'status' => 'forget_clockout',
    //                                               'clock_status' => $clock_status,
    //                                               'Role_id' => $getpass->user_type,
    //                                               'module' => $this->input->post('module'),
    //                                           );
    //
    //                                           if($result){
    //                                               $user_id        =  $username;
    //                                               $notification   =  $getpass->first_name.' '.$getpass->last_name.' forgot clock out';
    //                                               $action_id      =  $username;
    //                                               $action         = 'forget clockout';
    //                                               $module         = 'clock in out';
    //
    //                                               $this->Api_model->insert_user_notification($user_id,$notification,$action_id,$action,$module);
    //                                           }
    //
    //                                           $this->response(array(
    //                                             "status" => 1,
    //                                             "message" => "Clock In successfully",
    //                                             "data" => $response
    //                                           ), REST_Controller::HTTP_OK);
    //                                       }
    //                                 }else if($checkAttendance['date_status'] == 'today'){
    //
    //                                       if($shift_status == 'shift_on'){
    //
    //                                           if($shift_username != $username){
    //                                                 $data = array(
    //                                                     'timecard_ID' => 'TC_2222',
    //                                                     'username' => $username,
    //                                                     'date' => date('Y-m-d'),
    //                                                     'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
    //                                                     'datetime' => date('Y-m-d H:i:s'),
    //                                                 );
    //                                                 $data = $this->Api_model->insertTimesheet($data);
    //                                                 $response = array(
    //                                                     'fname' => $getpass->first_name,
    //                                                     'lname' => $getpass->last_name,
    //                                                     'status' => 'auto_clockout',
    //                                                     'module' => 'clock',
    //                                                     'clock_perm' => $clock_status,
    //                                                 );
    //
    //                                                 $attendance = '0';
    //                                                 $this->Api_model->change_clock_in_out($attendance,$username);
    //
    //                                                 if($getpass->user_type == 1){
    //                                                     $this->response(array(
    //                                                       "status" => 1,
    //                                                       "message" => "Admin Clock Out successfully",
    //                                                       "data" => $response
    //                                                     ), REST_Controller::HTTP_OK);
    //                                                 }else {
    //                                                   $this->response(array(
    //                                                     "status" => 1,
    //                                                     "message" => "Clock Out successfully",
    //                                                     "data" => $response
    //                                                   ), REST_Controller::HTTP_OK);
    //                                                 }
    //
    //
    //                                           }else{
    //
    //                                               $this->response(array(
    //                                                 "status" => 1,
    //                                                 "message" => "Already Clocked In",
    //                                                 "data" => $arrayName
    //                                               ), REST_Controller::HTTP_OK);
    //                                           }
    //
    //                                       }else{
    //                                         //clock ka conditon lagaan hai
    //                                           $this->response(array(
    //                                             "status" => 1,
    //                                             "message" => "Already Clocked In",
    //                                             "data" => $arrayName
    //                                           ), REST_Controller::HTTP_OK);
    //                                       }
    //                                 }
    //
    //                             }else{
    //                                   $data = array(
    //                                       'timecard_ID' => 'TC_2222',
    //                                       'username' => $username,
    //                                       'date' => date('Y-m-d'),
    //                                       'user_action' => 1, // 1 = clock-in (Login) and 2 = clock-out (Logout)
    //                                       'datetime' => date('Y-m-d H:i:s'),
    //                                   );
    //                                   $result = $this->Api_model->insertTimesheet($data);
    //                                   $response = array(
    //                                       'name' => $getpass->first_name.' '.$getpass->last_name,
    //                                       'status' => 'first clockin',
    //                                   );
    //
    //                                   $this->response(array(
    //                                     "status" => 1,
    //                                     "message" => "Clock In successfully",
    //                                     "data" => $response,
    //                                   ), REST_Controller::HTTP_OK);
    //                             }
    //
    //                           }else{
    //
    //                               $array= array(
    //                                   'module' => $module,
    //                                   'status' => 'invalid_login1',
    //                                   'name' => $getpass->first_name.' '.$getpass->last_name,
    //                                   'clock_status' => $clock_status,
    //                               );
    //
    //                               //clock in first condition
    //                               $this->response(array(
    //                                 "status" => 1,
    //                                 "message" => "Clock in first",
    //                                 // "data" => $array,
    //                               ), REST_Controller::HTTP_OK);
    //                           }
    //                       }else{
    //                           $this->response(array(
    //                             "status" => 0,
    //                             "message" => "User does not have access"
    //                           ), REST_Controller::HTTP_OK);
    //                       }
    //                   }else{
    //                       if($module == 'clock'){
    //
    //                           if($getpass->user_type == 1){
    //                               $session_data['admindata']=array(
    //                                   // 'user_id' => $user_id,
    //                                   'username' => $username,
    //                                   'role_id' => $getpass->user_type,
    //                                   'role_name' =>$getpass->role_name,
    //                                   'name' => $getpass->first_name.' '.$getpass->last_name,
    //                                   'nick_name' => $getpass->nick_name,
    //                                   'fontsize' => $fontsize->font_size,
    //                                   'clock_perm' => $clock_status,
    //                                   'loginAdmin' => TRUE
    //                              );
    //
    //                              $this->response(array(
    //                                  "status" => 1,
    //                                  // "message" => "Already Clocked In",
    //                                  "data" => $session_data
    //                              ), REST_Controller::HTTP_OK);
    //
    //                           }
    //
    //                           $das = array(
    //                               'timecard_ID' => 'TC_2222',
    //                               'username' => $username,
    //                               'date' => date('Y-m-d'),
    //                               'user_action' => 1, // 1 = clock-in (Login) and 2 = clock-out (Logout)
    //                               'datetime' => date('Y-m-d H:i:s'),
    //                           );
    //                           $data = $this->Api_model->insertTimesheet($das);
    //                           $attendance = '1';
    //                           $this->Api_model->change_clock_in_out($attendance,$username);
    //                       }
    //
    //                       $array= array(
    //                           'module' => $module,
    //                           'status' => 'invalid_login',
    //                           'name' => $getpass->first_name.' '.$getpass->last_name,
    //                           'clock_status' => $clock_status,
    //                       );
    //
    //                       $this->response(array(
    //                         "status" => 1,
    //                         // "message" => "Clocked In successfully",
    //                         "data" => $array,
    //                       ), REST_Controller::HTTP_OK);
    //
    //                   }
    //
    //
    //
    //                 }else{
    //                     $this->response(array(
    //                        "status" => 0,
    //                        "message" => "Invalid Username or Password"
    //                     ), REST_Controller::HTTP_NOT_FOUND);
    //                 }
    //
    //           }else{
    //               $this->response(array(
    //                  "status" => 0,
    //                  "message" => "User does not exist"
    //               ), REST_Controller::HTTP_NOT_FOUND);
    //           }
    //     }else{
    //          $this->response(array(
    //             "status" => 0,
    //             "message" => "All fields are needed"
    //          ), REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }

    public function front_login_post(){
        $this->form_validation->set_rules("username", "Username", "required|trim|xss_clean");
        $this->form_validation->set_rules("password", "Password", "required|trim|xss_clean");

        $username = $this->input->post('username');
        $password = md5("gef".$this->input->post('password'));
        $module = $this->input->post('module');
        $shift_username = $this->input->post('shift_username');
        $shift_status = $this->input->post('shift_status');

        if(!empty($this->input->post())){
            $getpass=$this->Api_model->getRoleData($username);
            if($this->Api_model->isUserExist($username)) {
                $clock_status = $getpass->clock_in_out;

                $check = $this->Api_model->checkPermission($username, $module, $getpass->user_type);
                $fontsize = $this->Api_model->get_web_setting_data();
                $checkAttendance=$this->Api_model->checkAttendance($username);

                    if($password == $getpass->password){

                      /*check clock in or clock out previous_status*/
                      if($clock_status == 1 ){
                        /*check user permission or not*/
                          if($check == 1) {
                             /*set user login session*/

                             if($getpass->user_type != 1){

                                 $session_data=array(
                                     // 'user_id' => $user_id,
                                     'username' => $username,
                                     'role_id' => $getpass->user_type,
                                     'role_name' =>$getpass->role_name,
                                     'name' => $getpass->first_name.' '.$getpass->last_name,
                                     'nick_name' => $getpass->nick_name,
                                     'fontsize' => $fontsize->font_size,
                                     'clock_perm' => $clock_status,
                                     'loginFront' => TRUE
                                 );

                                 $this->response(array(
                                     "status" => 1,
                                     // "message" => "Already Clocked In",
                                     "data" => $session_data
                                 ), REST_Controller::HTTP_OK);
                             }


                              $data=array(
                                  'username' => $username,
                                  'role_id' => $getpass->user_type,
                                  'role_name' =>$getpass->role_name,
                                  'name' => $getpass->first_name.' '.$getpass->last_name,
                              );
                              $this->Api_model->insert_login_data($data);

                              $arrayName = array(
                                  'module' => $module,
                                  'Role_id' => $getpass->user_type,
                                  'username' => $username,
                                  'clock_perm' => $clock_status,
                              );

                              if($module == 'clock' ){


                                if($checkAttendance['clock']->user_action == 2 ){


                                    if($shift_username != $username){

                                          if($shift_status == 'shift_on'){
                                              $data = array(
                                                  'timecard_ID' => 'TC_2222',
                                                  'username' => $username,
                                                  'date' => date('Y-m-d'),
                                                  'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                                                  'datetime' => date('Y-m-d H:i:s'),
                                              );
                                              $data = $this->Api_model->insertTimesheet($data);

                                              $response = array(
                                                  'fname' => $getpass->first_name,
                                                  'lname' => $getpass->last_name,
                                                  'status' => 'auto_clockout',
                                                  'module' => 'clock',
                                                  'clock_perm' => $clock_status,
                                                  'Role_id'=> $getpass->user_type,
                                              );

                                              // $this->session->unset_userdata('admindata');

                                              $attendance = '0';
                                              $this->Api_model->change_clock_in_out($attendance,$username);

                                              $this->response(array(
                                                "status" => 1,
                                                "message" => "Clock Out successfully",
                                                "data" => $response
                                              ), REST_Controller::HTTP_OK);

                                          }else{
                                              $this->response(array(
                                                "status" => 1,
                                                // "message" => "Already Clocked Indfgdfgdfg",
                                                "data" => $arrayName
                                              ), REST_Controller::HTTP_OK);
                                          }
                                    }
                                }elseif($checkAttendance['clock']->user_action == 1){

                                    if($checkAttendance['date_status'] != 'today'){
                                          $miss_clockout = array(
                                              'timecard_ID' => 'TC_2222',
                                              'username' => $username,
                                              'date' => date("Y-m-d", strtotime("yesterday")),
                                              'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                                              'datetime' => date("Y-m-d H:i:s", strtotime("today 60 sec ago")),
                                          );

                                          $result_clockout = $this->Api_model->insertTimesheet($miss_clockout);
                                          if($result_clockout){
                                              if($getpass->user_type == 1){
                                                  $session_data['admindata']=array(
                                                      // 'user_id' => $user_id,
                                                      'username' => $username,
                                                      'role_id' => $getpass->user_type,
                                                      'role_name' =>$getpass->role_name,
                                                      'name' => $getpass->first_name.' '.$getpass->last_name,
                                                      'nick_name' => $getpass->nick_name,
                                                      'fontsize' => $fontsize->font_size,
                                                      'clock_perm' => $clock_status,
                                                      'loginAdmin' => TRUE
                                                  );

                                                  $this->response(array(
                                                      "status" => 1,
                                                      // "message" => "Already Clocked In",
                                                      "data" => $session_data
                                                  ), REST_Controller::HTTP_OK);
                                              }

                                              $data = array(
                                                  'timecard_ID' => 'TC_2222',
                                                  'username' => $username,
                                                  'date' => date('Y-m-d'),
                                                  'user_action' => 1, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                                                  'datetime' => date('Y-m-d H:i:s'),
                                              );
                                              $result = $this->Api_model->insertTimesheet($data);
                                              $response = array(
                                                  'name' => $getpass->first_name.' '.$getpass->last_name,
                                                  'status' => 'forget_clockout',
                                                  'clock_status' => $clock_status,
                                                  'Role_id' => $getpass->user_type,
                                                  'module' => $this->input->post('module'),
                                              );

                                              if($result){
                                                  $user_id        =  $username;
                                                  $notification   =  $getpass->first_name.' '.$getpass->last_name.' forgot clock out';
                                                  $action_id      =  $username;
                                                  $action         = 'forget clockout';
                                                  $module         = 'clock in out';

                                                  $this->Api_model->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                                              }

                                              $this->response(array(
                                                "status" => 1,
                                                "message" => "Clock In successfully",
                                                "data" => $response
                                              ), REST_Controller::HTTP_OK);

                                          }
                                    }else if($checkAttendance['date_status'] == 'today'){

                                          if($shift_status == 'shift_on'){

                                              if($shift_username != $username){
                                                    $data = array(
                                                        'timecard_ID' => 'TC_2222',
                                                        'username' => $username,
                                                        'date' => date('Y-m-d'),
                                                        'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                                                        'datetime' => date('Y-m-d H:i:s'),
                                                    );
                                                    $data = $this->Api_model->insertTimesheet($data);
                                                    $response = array(
                                                        'fname' => $getpass->first_name,
                                                        'lname' => $getpass->last_name,
                                                        'status' => 'auto_clockout',
                                                        'module' => 'clock',
                                                        'clock_perm' => $clock_status,
                                                        'Role_id'=> $getpass->user_type,
                                                    );

                                                    $attendance = '0';
                                                    $this->Api_model->change_clock_in_out($attendance,$username);

                                                    if($getpass->user_type == 1){
                                                        $this->response(array(
                                                          "status" => 1,
                                                          "message" => "Admin Clock Out successfully",
                                                          "data" => $response
                                                        ), REST_Controller::HTTP_OK);
                                                    }else {
                                                      $this->response(array(
                                                        "status" => 1,
                                                        "message" => "Clock Out successfully",
                                                        "data" => $response
                                                      ), REST_Controller::HTTP_OK);
                                                    }

                                              }else{
                                                  //show end shit and clock out modal
                                                  $this->response(array(
                                                    "status" => 1,
                                                    "message" => "Already Clocked In",
                                                    "data" => $arrayName
                                                  ), REST_Controller::HTTP_OK);
                                              }

                                          }else{
                                              //show end shit and clock out modal
                                              $this->response(array(
                                                "status" => 1,
                                                "message" => "Already Clocked In",
                                                "data" => $arrayName
                                              ), REST_Controller::HTTP_OK);
                                          }
                                    }

                                }

                              }else{
                                 if($checkAttendance['date_status'] != 'today' && $clock_status == 1){
                                     $this->response(array(
                                       "status" => 1,
                                       "message" => "Please clock in first",
                                     ), REST_Controller::HTTP_OK);
                                }else{
                                    $array= array(
                                        'module' => $module,
                                        'status' => $module.'_login',
                                        'name' => $getpass->first_name.' '.$getpass->last_name,
                                        'clock_status' => $clock_status,
                                        'Role_id' => $getpass->user_type,
                                    );

                                    $this->response(array(
                                      "status" => 1,
                                      "message" => $module.' login successfully',
                                      "data" => $array
                                    ), REST_Controller::HTTP_OK);

                                }
                              }
                          }else{
                              $this->response(array(
                                "status" => 0,
                                "message" => "User does not have access"
                              ), REST_Controller::HTTP_OK);
                          }
                      }else{
                          if($this->input->post('module') == 'clock'){
                              if($getpass->user_type == 1){
                                  $session_data['admindata']=array(
                                      // 'user_id' => $user_id,
                                      'username' => $username,
                                      'role_id' => $getpass->user_type,
                                      'role_name' =>$getpass->role_name,
                                      'name' => $getpass->first_name.' '.$getpass->last_name,
                                      'nick_name' => $getpass->nick_name,
                                      'fontsize' => $fontsize->font_size,
                                      'clock_perm' => $clock_status,
                                      'loginAdmin' => TRUE
                                  );

                                  $this->response(array(
                                      "status" => 1,
                                      // "message" => "Already Clocked In",
                                      "data" => $session_data
                                  ), REST_Controller::HTTP_OK);

                              }
                              $das = array(
                                  'timecard_ID' => 'TC_2222',
                                  'username' => $username,
                                  'date' => date('Y-m-d'),
                                  'user_action' => 1, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                                  'datetime' => date('Y-m-d H:i:s'),
                              );
                              $data = $this->Api_model->insertTimesheet($das);
                              $attendance = '1';
                              $this->Api_model->change_clock_in_out($attendance,$username);

                              $array= array(
                                  'module' => $this->input->post('module'),
                                  'status' => 'clock_login',
                                  'name' => $getpass->first_name.' '.$getpass->last_name,
                                  'clock_status' => $clock_status,
                                  'Role_id' => $getpass->user_type,
                              );

                              $this->response(array(
                                "status" => 1,
                                "message" => "Clock In successfully",
                                "data" => $array
                              ), REST_Controller::HTTP_OK);

                          }else{
                              $array= array(
                                  'module' => $this->input->post('module'),
                                  'status' => 'other_login',
                                  'name' => $getpass->first_name.' '.$getpass->last_name,
                                  'clock_status' => $clock_status,
                                  'Role_id' => $getpass->user_type,
                              );

                              $this->response(array(
                                  "status" => 1,
                                  "message" => "Please clock in first!",
                                  "data" => $array
                              ), REST_Controller::HTTP_OK);
                          }


                      }

                    }else{
                        $this->response(array(
                           "status" => 0,
                           "message" => "Invalid Username or Password"
                        ), REST_Controller::HTTP_NOT_FOUND);
                    }

              }else{
                $this->response(array(
                   "status" => 0,
                   "message" => "User does not exist"
                ), REST_Controller::HTTP_NOT_FOUND);
              }
        }else{
            $this->response(array(
               "status" => 0,
               "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }
    }



    public function clock_out_post(){

        $username = $this->input->post('username');
        if(!empty($username)){
            $getpass=$this->Api_model->getPass($username);
            $present = $getpass->clock_in_out;
                if($present == 1){
                  $data = array(
                      'timecard_ID' => 'TC_2222',
                      'username' => $username,
                      'date' => date('Y-m-d'),
                      'user_action' => 2, // 1 = clock-in (Login) and 2 = clock-out (Logout)
                  );
                  $data = $this->Api_model->insertTimesheet($data);
                  $attedence = '0';
                  $insert_dat= $this->Api_model->change_clock_in_out($attedence,$username);
                  if($insert_dat){
                      $this->response(array(
                          "status" => 1,
                          "message" => "Clocked Out Successfully",
                          //"data" => $send_data
                      ), REST_Controller::HTTP_OK);
                  }

              }
        }
    }

    public function customer_signup_post(){

      $this->form_validation->set_rules("name", "Name", "required|trim|xss_clean");
      $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email|is_unique[customer_information.customer_email]",array('is_unique' => 'This %s already exists please enter another email address'));
      $this->form_validation->set_rules("mobile", "Mobile No", "required|trim|xss_clean|numeric|exact_length[10]|is_unique[customer_information.customer_mobile]",array('is_unique' => 'This %s already exists please enter another mobile no'));
      $this->form_validation->set_rules("password", "Password", "required|trim|xss_clean");
      $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|trim|xss_clean|matches[password]");

      if($this->form_validation->run() === FALSE){
          $this->response(array(
            "status" => 0,
            "message" => str_replace("\n","",strip_tags($this->form_validation->error_string())),
          ) , REST_Controller::HTTP_NOT_FOUND);

      }else{
          if(!empty($this->input->post())){
              $name = explode(" ",$this->input->post('name'));
              $user = array(
                "customer_id"       => $this->auth->generator(15),
                "customer_name"     => $this->input->post('name'),
                "first_name"        => $name[0],
                "last_name"         => $name[1],
                "customer_email"    => $this->input->post('email'),
                "customer_mobile"   => $this->input->post('mobile'),
                "password"          => md5("gef".$this->input->post('password')),
                'is_active'         => 1,
              );

              if($this->Api_model->customer_signup($user)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Customer Registration Successful"
                ), REST_Controller::HTTP_OK);
              }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "Registration Failed"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }

          }
      }
    }


    public function customer_signin_post(){
         $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email");
         $this->form_validation->set_rules("password", "Password", "required|trim|xss_clean");

         $email = $this->input->post('email');
         $password = md5("gef".$this->input->post('password'));

         if($this->form_validation->run() === FALSE){
             $this->response(array(
               "status" => 0,
               "message" => str_replace("\n","",strip_tags($this->form_validation->error_string())),
             ) , REST_Controller::HTTP_NOT_FOUND);

         }else{
             if(!empty($email) && !empty($password)){
                 if($this->Api_model->isCustomerExist($email)) {
                     $getpass=$this->Api_model->getCustomerData($email);
                         if($password == $getpass['password']) {
                             $session_data=array(
                                 'name' => $getpass['customer_name'],
                                 'first_name' => $getpass['first_name'],
                                 'last_name' => $getpass['last_name'],
                                 'loginCustomer' => TRUE
                             );
                             $this->response(array(
                                 "status" => 1,
                                 "message" => "Customer login successful",
                                 "data" => $session_data
                             ), REST_Controller::HTTP_OK);
                         }else{
                             $this->response(array(
                                   "status" => 0,
                                   "message" => "Invalid Username or Password"
                             ), REST_Controller::HTTP_NOT_FOUND);
                         }
                 }else{
                   $this->response(array(
                      "status" => 0,
                      "message" => "Customer does not exist"
                   ), REST_Controller::HTTP_NOT_FOUND);
                 }
             }else{
                  $this->response(array(
                     "status" => 0,
                     "message" => "All fields are needed"
                  ), REST_Controller::HTTP_NOT_FOUND);
             }
         }

      }

      public function roles_get(){
          $data = $this->Api_model->get_all_front_role();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function insert_role_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->insert_role();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Role has been created"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to create role"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function update_role_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->update_role();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Role has been updated"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to update role"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function get_frontrole_data_post(){
          $role_id = $this->input->post('role_id');
          $data = $this->Api_model->get_frontrole_by_id($role_id);
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "No found",
            ), REST_Controller::HTTP_NOT_FOUND);
          }

      }

      public function get_employee_by_role_post(){
          $data = $this->Api_model->get_userdata_by_role_id();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "No found",
            ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function delete_role_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->delete_role();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Role has been deleted"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to delete role"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function employees_get(){
          $data = $this->Api_model->get_users();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function delete_employee_post(){
          $user_id = $this->input->post('user_id');
          if($this->Api_model->delete_user($user_id)){
              $this->response(array(
                "status" => 1,
                "message" => "Employee has been deleted"
              ), REST_Controller::HTTP_OK);
          }else{
              $this->response(array(
                "status" => 0,
                "messsage" => "Failed to delete employee"
              ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }

      }

      public function insert_employee_post(){

        $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email|is_unique[users.email]",array('is_unique' => 'This %s already exists please enter another email address'));
        $this->form_validation->set_rules("username", "Username", "required|trim|xss_clean|is_unique[user_login.username]",array('is_unique' => 'This %s already exists please enter another username'));

        if($this->form_validation->run() === FALSE){
            $this->response(array(
              "status" => 0,
              "message" => str_replace("\n","",strip_tags($this->form_validation->error_string())),
            ) , REST_Controller::HTTP_NOT_FOUND);

        }else{
            if(!empty($this->input->post())){
                if($this->Api_model->addUser()){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Customer Registration Successful"
                  ), REST_Controller::HTTP_OK);
                }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Registration Failed"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

            }
        }
      }

      public function archive_employees_get(){
          $data = $this->Api_model->get_inactive_users();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function activate_employee_post(){
          $user_id = $this->input->post('user_id');
          if($this->Api_model->activate_employee($user_id)){
              $this->response(array(
                "status" => 1,
                "message" => "Employee has been Activate"
              ), REST_Controller::HTTP_OK);
          }else{
              $this->response(array(
                "status" => 0,
                "messsage" => "Failed to activate employee"
              ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          }
      }

      public function get_user_data_post(){
          $user_id = $this->input->post('user_id');
          $data = $this->Api_model->get_user_by_id($user_id);
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function update_employee_post(){
          // $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|is_unique[users.email],email'.);

          $this->form_validation->set_rules("email", "Email", "required|trim|xss_clean|valid_email");
          $this->form_validation->set_rules("username", "Username", "required|trim|xss_clean");

          if($this->form_validation->run() === FALSE){
              $this->response(array(
                "status" => 0,
                "message" => str_replace("\n","",strip_tags($this->form_validation->error_string())),
              ) , REST_Controller::HTTP_NOT_FOUND);

          }else{
              if(!empty($this->input->post())){
                  if($this->Api_model->update_user()){
                    $this->response(array(
                      "status" => 1,
                      "message" => "Customer Registration Successful"
                    ), REST_Controller::HTTP_OK);
                  }else{
                    $this->response(array(
                      "status" => 0,
                      "message" => "Registration Failed"
                    ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                  }

              }
          }
      }

      public function loyalty_intake_points_get(){
          $data = $this->Api_model->get_all_point();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function get_point_data_post(){
          $point_id = $this->input->post('point_id');
          $data = $this->Api_model->get_pointdata_by_id($point_id);
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }


      public function update_intake_point_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->update_point();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Point has been updated"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to update point"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function loyalty_outbound_points_get(){
          $data = $this->Api_model->get_outbound_point();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function update_outbound_point_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->update_point();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Point has been updated"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to update point"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function user_permissions_post(){
          $role_name = $this->input->post('role_name');

          $this->db->select('id');
          $this->db->from('front_roles');
          $this->db->where('role_name',$role_name);
          $query = $this->db->get();

          $role_id = $query->row()->id;
          $user_id = $this->input->post('employee_id');

          $user_permission = $this->Api_model->get_user_permission_by_id($user_id);
          $role_permission = $this->Api_model->get_frontrole_by_id($role_id);

          $data = array(
              'user_permission' => $user_permission,
              'role_permission' => $role_permission,
          );

          if($data){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }


      public function update_employee_permission_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->update_permission();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Employee permisions has been updated"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to update employee permissions"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }


      public function card_processing_get(){
          $data = $this->Api_model->get_card_processing();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function update_card_processing_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->update_card_transaction();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Card Processing Setting has been updated"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to update card processing setting"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function payroll_view_get(){
          $data[0] = array(
            'title' => 'Weekly',
            "data" => [
                array("value" => 1,"label" => "Same Day"),
                array("value" => 2,"label" => "Next Day"),
                array("value" => 3,"label" => "Next Business Day"),
            ]

          );

          $data[1] = array(
            'title' => 'Bi-Weekly',
            "data" => [
                array("value" => 1,"label" => "Same Day"),
                array("value" => 2,"label" => "Next Day"),
                array("value" => 3,"label" => "Next Business Day"),
            ]

          );

          $data[2] = array(
            'title' => 'Twice-a-month',
            "data" => [
                array("value" => 1,"label" => "Same Day"),
                array("value" => 2,"label" => "Next Day"),
                array("value" => 3,"label" => "Next Business Day"),
            ]

          );

          $data[3] = array(
            'title' => 'Monthly',
            "data" => [
                array("value" => 4,"label" => "Last Working Day"),
                array("value" => 5,"label" => "Last Business Day"),
                array("value" => 6,"label" => "Last Calendar Day"),
                array("value" => 7,"label" => "First Working Day of Next Month"),
                array("value" => 8,"label" => "First Business Day of Next Month"),
                array("value" => 9,"label" => "First Calendar Day of Next Month"),
            ]

          );

          if(!empty($data)){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function payroll_get(){
          $data = $this->Api_model->get_payroll_data();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function update_payroll_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->update_payroll();
              if($response == 1){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Payroll Setting has been updated"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to update payroll setting"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function shift_setings_get(){
          $data = $this->Api_model->get_shift_in_user();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      public function shift_out_by_manager_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->shift_logout_by_manager();
              if($response){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Shift logout successful"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to shift logout"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }


      public function datetime_settings_get(){
          $timezone = array(
            "data" => [
                array("value" => 'America/New_York', "label" => "America/New_York (UTC−05:00)"),
                array("value" => 'America/Chicago',"label" => "America/Chicago (UTC−06:00)"),
                array("value" => 'America/Denver',"label" => "America/Denver (UTC−07:00)"),
                array("value" => 'America/Phoenix', "label" => "America/Phoenix (UTC−07:00)"),
                array("value" => 'America/Los_Angeles',"label" => "America/Los_Angeles (UTC−08:00)"),
                array("value" => 'America/Anchorage',"label" => "America/Anchorage (UTC−09:00)"),
                array("value" => 'America/Adak',"label" => "America/Adak (UTC−10:00)"),
                array("value" => 'Pacific/Honolulu',"label" => "Pacific/Honolulu (UTC−10:00)"),
            ]
          );

          $dateformat = array(
            "data" => [
                array("value" => 'mm-dd-YYYY', "label" => "mm-dd-yyyy"),
                array("value" => 'dd-mm-YYYY',"label" => "dd-mm-yyyy"),
                array("value" => 'YYYY-mm-dd',"label" => "yyyy-mm-dd"),
                array("value" => 'mm/dd/YYYY', "label" => "mm/dd/yyyy"),
                array("value" => 'dd/mm/YYYY',"label" => "dd/mm/yyyy"),
                array("value" => 'YYYY/mm/dd',"label" => "yyyy/mm/dd"),
            ]

          );

          $timeformat = array(
            "data" => [
                array("value" => '12 Hours', "label" => "12 Hours"),
                array("value" => '24 Hours',"label" => "24 Hours"),
            ]
          );

          $data = array(
            'timezone' => $timezone,
            'dateformat' => $dateformat,
            'timeformat' => $timeformat,
           );

          if(!empty($data)){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }


      public function update_datetime_settings_post(){
          if(!empty($this->input->post()))  {
            $response = $this->Api_model->update_date_setting();
              if($response){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Date & time settings has been updated"
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                    "status" => 0,
                    "message" => "Failed to update date & time settings"
                  ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

      public function get_date_time_seettings_get(){
          $data = $this->Api_model->get_web_setting_data();
          if(count($data) > 0){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $data
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 0,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
      }

      // prashant api work 1-Sept-2021
      public function walk_in_customer_post(){
          if(!empty($this->input->post())){
              $customer_mobile_no = $this->input->post('customer_mobile_no');
              $data = $this->Api_model->getcustomerByPhoneModal($customer_mobile_no);
              $loyalty = $this->Api_model->get_outbound_point();
              $account_balance = 0;
              if(!empty($loyalty)) {
                  if(!empty($data->tot_redeem_point))
                      $tot_redeem_point = $data->tot_redeem_point;
                  else
                      $tot_redeem_point = 0;
                  foreach ($loyalty as $key_l => $value_l) {
                      if($value_l['point_type'] == 3) { // Loyalty point
                          $point_amount    = $value_l['point_amount'];
                          $point           = $value_l['point'];
                          if($tot_redeem_point > 0) {
                              $account_balance = ($tot_redeem_point * $point_amount) / $point;
                          }
                      }
                  }
              }

              if(!empty($data)){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Data found",
                    "data" => $data,
                    "account_balance" => number_format($account_balance,2),
                  ), REST_Controller::HTTP_OK);
              }else{
                  $this->response(array(
                      "status" => 0,
                      "message" => "Data not found",
                      "account_balance" => 0,
                  ), REST_Controller::HTTP_OK);
              }
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
        }

      }

    public function pos_customer_signup_post(){
        $this->form_validation->set_rules("customer_fname", "First Name", "required|trim|xss_clean");
        $this->form_validation->set_rules("customer_lname", "Last Name", "required|trim|xss_clean");
        $this->form_validation->set_rules("customer_email", "Email", "trim|xss_clean|valid_email|is_unique[customer_information.customer_email]");
        $this->form_validation->set_rules("customer_mobile", "Mobile No", "required|trim|xss_clean|is_unique[customer_information.customer_mobile]",array('is_unique' => 'This mobile number is already exist'));

        if($this->form_validation->run() === FALSE){
            $this->response(array(
              "status" => 0,
              "message" => str_replace("\n","",strip_tags($this->form_validation->error_string())),
            ) , REST_Controller::HTTP_NOT_FOUND);

        }else{
          if(!empty($this->input->post())){
                $result = $this->Api_model->pos_customer_signup();
                $customer_mobile_no = $result;
                $data = $this->Api_model->getcustomerByPhoneModal($customer_mobile_no);
                $loyalty = $this->Api_model->get_outbound_point();

                $account_balance = 0;
                if(!empty($loyalty)) {
                    if(!empty($data->tot_redeem_point))
                        $tot_redeem_point = $data->tot_redeem_point;
                    else
                        $tot_redeem_point = 0;
                    foreach ($loyalty as $key_l => $value_l) {
                        if($value_l['point_type'] == 3) { // Loyalty point
                            $point_amount    = $value_l['point_amount'];
                            $point           = $value_l['point'];
                            if($tot_redeem_point > 0) {
                                $account_balance = ($tot_redeem_point * $point_amount) / $point;
                            }
                        }
                    }
                }

                if(!empty($data)){
                    $this->response(array(
                      "status" => 1,
                      "message" => "Customer register successfully",
                      "data" => $data,
                      "account_balance" => number_format($account_balance,2),
                    ), REST_Controller::HTTP_OK);
                }else{
                    $this->response(array(
                        "status" => 0,
                        "message" => "something went wrong",
                        "account_balance" => 0,
                    ), REST_Controller::HTTP_NOT_FOUND);
                }
          }else{
              $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
              ), REST_Controller::HTTP_NOT_FOUND);
          }
      }

   }


   public function get_cat_wise_buttons_post(){
       $data = $this->Api_model->get_cat_wise_buttons();
       if(!empty($data)){
         $this->response(array(
           "status" => 1,
           "message" => "Data found",
           "data" => $data
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Data not found",
         ), REST_Controller::HTTP_OK);
       }
   }

   //prashant api work 7 Sept 2021

   public function cash_login_post(){
       $username = $this->input->post('username');
       $password = md5("gef".$this->input->post('password'));

       if(!empty($username) && !empty($password)){
           if($this->Api_model->isUserExist($username)) {
               $getpass=$this->Api_model->getRoleData($username);
               if($password == $getpass->password) {
                   $session_data['cashierdata']=array(
                       'user_id' => $user_id,
                       'username' => $username,
                       'role_id' => $getpass->user_type,
                       'role_name' =>$getpass->role_name,
                       'name' => $getpass->first_name.' '.$getpass->last_name,
                       'loginCASH' => TRUE
                   );

                   $data=array(
                       'username' => $username,
                       'role_id' => $getpass->user_type,
                       'role_name' =>$getpass->role_name,
                       'name' => $getpass->first_name.' '.$getpass->last_name,
                   );
                   $this->Api_model->insert_login_data($data);
                   // echo json_encode($this->input->post('module'));
                   $terminal_id = $this->input->post('terminal_id');
                   $shift_id = $this->input->post('shift_id');
                   $shift_username = $this->input->post('shift_username');
                   $grand_total_amt = $this->Api_model->get_grand_total_amt($terminal_id,$shift_id);
                   $grand_cash_drop = $this->Api_model->get_grand_total_cash_drop($terminal_id,$shift_id);
                   $get_start_cash_in = $this->Api_model->get_start_cash_in($shift_username,$shift_id);

                    $cash1 = $this->Api_model->get_web_setting_data();
                    $cash_limit = $cash1->cash_register;
                    $min_amount = $cash1->start_cash;
                    $amtt = $get_start_cash_in + $grand_total_amt - $grand_cash_drop;
                   //
                    if($amtt > $cash1->cash_register){
                        $data["user_id"]  = $this->input->post('username');
                        $data["cash_drop_amt"] =  $amtt - $min_amount;
                        $this->response(array(
                            "status" => 1,
                            "message" => "Logged in successfully",
                            "data" => $data
                        ), REST_Controller::HTTP_OK);
                    }else{
                        $data["user_id"]  = $this->input->post('username');
                        $data["cash_drop_amt"] =  0;
                        $this->response(array(
                            "status" => 1,
                            "message" => "Logged in successfully",
                            "data" => $data
                        ), REST_Controller::HTTP_OK);
                    }

               }else{
                 $this->response(array(
                       "status" => 0,
                       "message" => "Invalid Username or Password"
                 ), REST_Controller::HTTP_NOT_FOUND);
               }
           }else{
             $this->response(array(
                "status" => 0,
                "message" => "User does not exist"
             ), REST_Controller::HTTP_NOT_FOUND);
           }
       }
   }

   public function insert_cash_drop_post(){
       $terminal_id = $this->input->post('terminal_id');
       $shift_id = $this->input->post('shift_id');
       $shift_username = $this->input->post('shift_username');

       $cash_drawer_amt = $this->Api_model->current_cash_drower_amt($shift_username,$terminal_id,$shift_id);

       if($cash_drawer_amt['cash_in_drawer'] < $this->input->post('cash_amount')){
           $result['show_alert_amt'] = $this->input->post('cash_amount'); // - $cash_drawer_amt['cash_in_drawer'];
           $this->response(array(
               "status" => 0,
               "message" => "Insufficient cash in cash drawer ($ " .$result['show_alert_amt']. ")",
               // "data" => $response
           ), REST_Controller::HTTP_OK);
       }else{
           $data = array(
               'user_id'     => $this->input->post('user_id'),
               'cash_amount' => $this->input->post('cash_amount'),
               'datetime'    => date('Y-m-d H:i:s'),
               'shift'       => $shift_id,
               'terminal'    => $terminal_id,
               'date'        => date('m-d-Y'),
           );
           $result = $this->Api_model->insert_cash_drop($data);
           if($result){
               $this->response(array(
                   "status" => 1,
                   "message" => "Cash drop successful",
                   "data" => $result
               ), REST_Controller::HTTP_OK);
           }

       }

   }

   public function scanupc_pos_post(){
       $barcode= $this->input->post('barcode');
       $data= $this->Api_model->getProductData($barcode);
       // ST - Get coupon details
       $pos_coupon_details = $this->Api_model->pos_coupon_details($data->product_id);
       $pos_coupon_details_arr = array();
       if(!empty($pos_coupon_details)) {
           $pos_coupon_details_arr["coupon_name"] = $pos_coupon_details->coupon_name;
           $pos_coupon_details_arr["coupon_details"] = $pos_coupon_details->coupon_details;
       }
       $data->pos_coupon_details = $pos_coupon_details_arr;
       // EN - Get coupon details
       // ST - Get product combo details
       $pos_product_combodetails = $this->Api_model->pos_product_combodetails($data->product_id);
       //$pos_product_combodetails_arr = array();
       $data->pos_combo_details = json_encode($pos_product_combodetails);
       // EN - Get product combo details
       // ST - Get Liquor Tobacco Category
       $getLiquorTobaccoCategory = $this->Api_model->getLiquorTobaccoCategory();
       //$pos_product_combodetails_arr = array();
       $data->liquor_tobacco_category = $getLiquorTobaccoCategory;
       // EN - Get Liquor Tobacco Category
       if(!empty($data) > 0) {
         $this->response(array(
             "status" => 1,
             "message" => "Product found",
             "data" => $data
         ), REST_Controller::HTTP_OK);
       } else {
           $response["status"] = 0;
           $this->response(array(
               "status" => 0,
               "message" => "Product not found",
               "data" => $response,
           ), REST_Controller::HTTP_NOT_FOUND);
       }

   }

   public function product_lookup_post(){
       $barcode= $this->input->post('barcode');
       $data= $this->Api_model->getProductData($barcode);
       if(!empty($data)){
         $arrayName = array(
             'product_name' => $data->product_name,
             'short_name' => $data->short_name,
             'product_price' => $data->onsale_price,
             'store_promotion_price' => $data->store_promotion_price,
         );
         $this->response(array(
           "status" => 1,
           "message" => "Data found",
           "data" => $arrayName,
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Data not found",
         ), REST_Controller::HTTP_OK);
       }
   }



   //prashant 17 sept api Work

   public function open_calc_post(){
      $is_transaction_completed = $this->input->post('is_transaction_completed');
      $exist_product_id = $this->input->post('exist_product_id');
      $main_cart_grand_total = $this->input->post('main_cart_grand_total');

      if (empty($exist_product_id)) {
          $this->response(array(
            "status" => 0,
            "message" => "There are no products in your Cart",
          ), REST_Controller::HTTP_OK);
      }else{
          $arrayName = array(
              'return_balance_html' => 0,
              'optxt_html' => $main_cart_grand_total,
              'grand_total' => $main_cart_grand_total,
              'return_balance_html' => 0,
          );
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $arrayName,
          ), REST_Controller::HTTP_OK);
      }
   }

   public function pos_checkout_post(){
       $return_bal = $this->input->post('return_balance');
       $optxt = $this->input->post('optxt_html');
       if (empty($optxt)) {
         $this->response(array(
           "status" => 0,
           "message" => "Please enter amount",
         ), REST_Controller::HTTP_NOT_FOUND);
       }

      if ($return_bal < 0) {
         $this->response(array(
           "status" => 0,
           "message" => "Tendered cash is less than billed amount",
         ), REST_Controller::HTTP_NOT_FOUND);
      }


      $cart_grand_total  = $this->input->post('main_cart_grand_total');
      $product_id        = $this->input->post('product_id');
      $product_quantity  = $this->input->post('product_qty');
      $product_price     = $this->input->post('product_price');
      $product_crv       = $this->input->post('product_crv');
      $product_rate      = $this->input->post('product_rate');
      $is_texable        = $this->input->post('is_texable');
      $sale_tax          = "0.00";
      $product_name      = $this->input->post('product_name');
      $container_deposit = $this->input->post('container_deposit');
      $return_balance    = $this->input->post('db_return_balance');
      $tax_amount        = $this->input->post('tax_amount');
      $walk_in_customer_name = $this->input->post('walk_in_customer_name');
      $walk_in_customer_id   = $this->input->post('walk_in_customer_id');
      $recall_order_id   = $this->input->post('recall_order_id');
      $coupon_discount = $this->input->post('coupon_discount_total'); // prashant added
      $redeem_points_discount = $this->input->post('redeem_points_discount');

      $cashback_note = $this->input->post('cashback_note'); // prashant added
      $cashback_amount = $this->input->post('cashback_amount'); // prashant added

      $user_id = $this->input->post('shift_username');
      $check_register_amount = $this->check_cash_reg_amount();

      // if($check_register_amount == false){
      //     $response["status"]  = 0;
      //     $response["message"] = "Limit Exceed";
      //     $this->response(array(
      //       "status" => 0,
      //       "message" => "Limit Exceed",
      //     ), REST_Controller::HTTP_OK);
      // }else
      if(!empty($product_id)) {
          $order_id = $this->auth->generator(15);

          if($walk_in_customer_id != 0)
              $customer_id = $walk_in_customer_id;
          else
              $customer_id = 0;
              if($walk_in_customer_id != "0") {
                  $total_points = 0;
                  $points = $this->Api_model->get_all_point();


                  if(!empty($points)) {
                      foreach ($points as $key_p => $value_p) {
                          if($value_p['point_type'] == 2) {
                              $db_point_amount = $value_p['point_amount'];
                              $db_point = $value_p['point'];
                              $final_cart_grand_total = $cart_grand_total - ($tax_amount + $container_deposit + $coupon_discount);
                              $total_points = ($db_point * $final_cart_grand_total) / $db_point_amount;
                          }
                      }
                  }
                  $point_type = 2;
                  $customer_id = $walk_in_customer_id;
                  $data_redeem = array(
                      'customer_id'       =>  $customer_id,
                      'order_id'          =>  $order_id,
                      'redeem_point'      =>  floor($total_points),
                      'point_type'        =>  $point_type // 1 - New Register / 2 - By Value
                  );

                  $this->db->insert('customer_redeem_point_master',$data_redeem);
              }

              // ST - For Customer Redeem Point Transaction
              $customer_id = $walk_in_customer_id;

              if($this->input->post('used_redeem_points') != 0) {
                  $used_redeem_points = $this->input->post('used_redeem_points');

                  $data_redeem = array(
                      'customer_id'       =>  $customer_id,
                      'order_id'          =>  $order_id,
                      'redeem_point'      =>  $used_redeem_points
                  );


                  $this->db->insert('customer_redeem_trans_point_master',$data_redeem);
              }
              // EN - For Customer Redeem Point Transaction

              $data=array(
                  'order_id'          =>  $order_id,
                  'customer_id'       =>  $customer_id,
                  'date'              =>  date("m-d-Y"), // 07-16-2020
                  'total_amount'      =>  $cart_grand_total,
                  'order'             =>  $this->number_generator_order(),
                  'total_discount'    =>  0,
                  'order_discount'    =>  0,
                  'redeem_discount'   =>  $redeem_points_discount,
                  'service_charge'    =>  0,
                  'user_id'           =>  $user_id,
                  'store_id'          =>  0,
                  'details'           =>  "",
                  'paid_amount'       =>  $cart_grand_total,
                  'due_amount'        =>  $cart_grand_total,
                  'sale_tax'          =>  $sale_tax,
                  'tax_amount'        =>  $tax_amount,
                  'container_deposit' =>  $container_deposit,
                  'return_balance'    =>  $return_balance,
                  'is_cash_card'      =>  1,
                  'status'            =>  1,
                  'coupon_discount'   =>  $coupon_discount, //prashant added
                  'shift'             =>  $this->input->post('shift_id'),
                  'terminal'          =>  $this->input->post('terminal_id'),
                  'order_date'        =>  date('Y-m-d H:i:s'),
              );

              $this->db->insert('order',$data);

              // ST - for query log
              $last_query = $this->db->last_query();
              $user_id =  $this->input->post('employee_id');
              $module = 'pos';
              $operation = 'Cash Transaction';
              $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
              // EN - for query log

              $api_data_in = array();
              $total_quantity=0;
              foreach ($product_id as $key => $value) {
                  $total_quantity+=$product_quantity[$key];
              }

              foreach ($product_id as $key => $value) {
                $order_details_id = $this->auth->generator(15);
                $db_product_id         = $product_id[$key];
                $db_product_quantity   = $product_quantity[$key];
                $db_product_crv        = $product_crv[$key];
                $db_product_rate       = $product_rate[$key];
                $db_product_price      = $product_price[$key];
                $db_product_name       = $product_name[$key];
                $db_is_texable         = (isset($is_texable[$key]) ? $is_texable[$key] : 0);

                if($db_is_texable == 1) {
                    $sale_tax = "7.75";
                } else {
                    $sale_tax = "0.00";
                }


                $total_price_with_discount=$cart_grand_total+$redeem_points_discount+$coupon_discount-$tax_amount-$container_deposit;

                $reedem_per_product=($db_product_rate/$total_price_with_discount)  * $redeem_points_discount;
                $discount_per_product=$db_product_rate/$total_price_with_discount  * $coupon_discount;

                $combo_apply = (empty($_POST['pos_combo_detail'][0])) ? '0' : '1';  //prasant added



                // ST - For order_details
                $order_details = array(
                    'order_details_id'  =>  $order_details_id,
                    'order_id'          =>  $order_id,
                    'product_id'        =>  $db_product_id,
                    'product_name'      =>  $db_product_name,
                    'variant_id'        =>  0,
                    'store_id'          =>  0,
                    'quantity'          =>  $db_product_quantity,
                    'rate'              =>  $db_product_rate,
                    'is_taxable'        =>  $db_is_texable,
                    'supplier_rate'     =>  0,
                    'total_price'       =>  $db_product_price,  //prasant added
                    'is_combo_apply'    =>  $combo_apply,       //prasant added
                    'discount'          =>  $discount_per_product,
                    'reedem_discount'   =>  $reedem_per_product,
                    'container_deposit' =>  $db_product_crv,
                    'status'            =>  1,
                    'created_at'        => date('Y-m-d H:i:s'),
                );

                $this->db->insert('order_details',$order_details);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id =  $this->input->post('employee_id');
                $module = 'pos';
                $operation = 'Cash Transaction';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query,1);
                // EN - for query log

                if(!empty($cashback_note)){
                    $user_id        = $this->input->post('employee_id');
                    $notification   = '$'.$cashback_amount.' cashback ( '.$cashback_note.' )';
                    $action_id      = $this->input->post('employee_id');
                    $action         = 'cashback note';
                    $module         = 'pos terminal';

                    $this->Api_model->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                }

                $scratcher_data = $this->check_scratchable($db_product_id);
                if($scratcher_data['is_scratchable'] != 1){
                    $db_product_quantity= 0-$db_product_quantity;
                    $api_data_in[] =array('product_id' => $db_product_id , 'quantity' => $db_product_quantity);
                }else{
                    $scracher_current_no = $scratcher_data['scracher_current_no'];
                    $this->update_scratcher_current_no($db_product_id,$db_product_quantity,$scracher_current_no);
                }

          }

          $api_data = array();
          $api_data['request'] = $api_data_in;

          $this->adjust_inventory_quantity($api_data);
          $this->eplugin->adjust_quantity($api_data);

          // ST - For Recall Order Delete
          if($recall_order_id > 0) {
              $this->db->delete('save_orders', array('id' => $recall_order_id));
              $this->db->delete('save_order_details', array('save_order_id' => $recall_order_id));
          }
          // EN - For Recall Order Delete
          $response["order_id"]= $order_id;
          $response["return_balance"]= $this->input->post('return_balance');
          $response["customer_cash"]= $this->input->post('optxt_html');
          $response["transaction_status"]= 'success';
          $response["transaction_type"]= 'cash';
          $response["grand_total"]= $this->input->post('main_cart_grand_total');
          $response["container_deposit"]= $this->input->post('container_deposit');
          $response["tax_amount"]= $this->input->post('tax_amount');

          $this->response(array(
            "status" => 1,
            "message" => "Order saved successfully.",
            "data" => $response,
          ), REST_Controller::HTTP_OK);
          //open cash drawer
          $this->open_drawer();
      }else {
          $response["order_id"]= 0;
          $this->response(array(
            "status" => 0,
            "message" => "Please try again.",
            "data" => $response,
          ), REST_Controller::HTTP_OK);

      }

      $terminal_id = $this->input->post('terminal_id');
      $shift_id = $this->input->post('shift_id');
      $shift_username = $this->input->post('shift_username');

      $grand_total_amt = $this->Api_model->get_grand_total_amt($terminal_id,$shift_id);
      $grand_cash_drop = $this->Api_model->get_grand_total_cash_drop($terminal_id,$shift_id);
      $get_start_cash_in = $this->Api_model->get_start_cash_in($shift_username,$shift_id);

      $cash1 = $this->Api_model->get_web_setting_data();
      $cash_limit = $cash1->cash_register;
      $min_amount = $cash1->start_cash;
      $amtt = $get_start_cash_in + $grand_total_amt - $grand_cash_drop;

      if($amtt > $cash1->cash_register){
         $response["cash_drop_amt"] =  $amtt - $min_amount;
         $this->response(array(
           "status" => 1,
           "message" => "Limit Exceed",
           "data" => $response,
         ), REST_Controller::HTTP_OK);
      }

       // echo json_encode($response);
       // exit();
    }


      public function check_cash_reg_amount(){
          $current_date = date('Y-m-d');
          $user_id =  $this->input->post('employee_id');
          $this->db->select("sum(total_amount) sum");
          $this->db->from('order');
          $this->db->where('user_id', $user_id);
          $this->db->where('date', $current_date);
          $query=$this->db->get();
          $total = $query->row()->sum;
          $dat = $this->Api_model->get_web_setting_data();
          $temp_amt= $dat->start_cash;//100
          $amt = round($total + $temp_amt, 2);
          $cash_reg_amt = $dat->cash_register;
          if($amt > $cash_reg_amt){
             return FALSE;
          }else{
             return TRUE;
          }
     }

    //NUMBER GENERATOR FOR ORDER
    public function number_generator_order(){
        $this->db->select_max('order', 'order_no');
        $query = $this->db->get('order');
        $result = $query->result_array();
        $order_no = $result[0]['order_no'];
        if ($order_no !='') {
            $order_no = $order_no + 1;
        }else{
            $order_no = 1000;
        }
        return $order_no;
    }

    public function check_scratchable($product_id){
        $this->db->select('is_scratchable,scratcher_no_from,scratcher_no_to,scracher_current_no');
        $this->db->from('product_information');
        $this->db->where('product_id',$product_id);
        $this->db->where('is_deleted',0);
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }

    }

    public function update_scratcher_current_no($product_id,$product_quantity,$scracher_current_no){
        $query = $this->db->select('quantity')->from('product_information')->where('product_id',$product_id)->where('is_scratchable', 1)->get();
        $available_qty = $query->row()->quantity;
        if($product_quantity == $available_qty){
            $this->db->set('is_archive_scratcher', 1);
            $this->db->set('scratcher_status', 1);
            $this->db->where('product_id',$product_id);
            $this->db->where('is_scratchable', 1);
            $this->db->update('product_information');
        }
        $scracher = $product_quantity + $scracher_current_no;
        $result = $this->Api_model->update_scratcher_current_no($scracher,$product_quantity,$product_id);
    }

    public function adjust_inventory_quantity($data){
       for($count = 0; $count < count($data['request']); $count++){

           $product_id = $data['request'][$count]['product_id'];
           $purchase_qty = substr($data['request'][$count]['quantity'],1);
           $old_qty = $this->Api_model->get_inventory_qty($product_id);
           $dat['quantity'] = $old_qty->quantity - $purchase_qty;

           $this->db->where('product_id',$product_id);
           $this->db->update('product_information',$dat);
       }

    }

    public function open_drawer(){
        shell_exec('echo \'hello\' > /dev/ttyUSB0 ');
    }


    public function frequently_sold_items_get(){
        $result = $this->Api_model->frequently_sold_items();
        if(count($result) > 0){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $result,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    //prashant api work for shift module 21Sept
    public function start_shift_view_post(){
       $username = $this->input->post('username');
       $shift_username = $this->input->post('shift_username');
       $response = $this->Api_model->user_shift_error($username);
       if(!empty($response) && empty($shift_username)){
             $getpass=$this->Api_model->getShift($username);

             $session_data['shiftdata']=array(
               'username'       => $getpass['username'],
               'first_name'     => $getpass['first_name'],
               'last_name'      => $getpass['last_name'],
               'name'           => $getpass['first_name'].' '.$getpass['last_name'],
               'employee_shift' => $getpass['user_shift_status'],
               'shift_status'   => $getpass['shift_in_out'],
               'shift_id'       => $getpass['shift_id'],
               'terminal_id'    => $getpass['terminal_id'],
               'defer_shift'    => $getpass['defer_shift'],
               'loginShift'     =>TRUE //boolean value TRUE
             );

             $this->response(array(
                 "status" => 1,
                 "message" => "Data found",
                 "data" => $session_data
             ), REST_Controller::HTTP_OK);

       }else{
           $terminal_id = $this->input->post('terminal_id');
           $shift_id = $this->input->post('shift_id');
           $user_shift_status = $this->Api_model->getRoleData($username); //user_shift status in user_login

           $data = $this->Api_model->get_current_shift_data($username,$shift_id,$terminal_id,$shift_username);

           if($data['shift_in_out'] == 1 && $user_shift_status->user_shift_status == 1){
                 if($shift_username == $username){
                    if($data['defer_shift']!=1){
                       $this->response(array(
                           "status" => 1,
                           "message" => "Data found",
                           "data" => $data
                       ), REST_Controller::HTTP_OK);

                    } else{
                       $result = $this->Api_model->get_last_shift_data(1,$terminal_id,$shift_id);
                         if(!empty($result)){
                           $this->response(array(
                               "status" => 1,
                               "message" => "Data found",
                               "data" => $result
                           ), REST_Controller::HTTP_OK);
                         }
                    }

                 }
                 else{
                   $this->response(array(
                       "status" => 0,
                       "message" => "Please end shift from other terminal to start shift here",
                   ), REST_Controller::HTTP_OK);
                 }
           } else{
                 $result = $this->Api_model->get_last_shift_data(0,$terminal_id,$shift_id);
                 if(!empty($result)){
                     $this->response(array(
                         "status" => 1,
                         "message" => "Data found",
                         "data" => $result
                     ), REST_Controller::HTTP_OK);
                 }else{
                   $cash = $this->Api_model->get_web_setting_data();
                   $arrayName = array(
                     'cash_in_drawer' => $cash->start_cash,
                   );
                   $this->response(array(
                       "status" => 1,
                       "message" => "Data found",
                       "data" => $arrayName
                   ), REST_Controller::HTTP_OK);
                 }
           }

         }
    }

    public function shift_terminal_post(){
        $username = $this->input->post('username');
        $shift_username = $this->input->post('shift_username');
        $terminal_id = $this->input->post('terminal_id');
        $shift_id = $this->input->post('shift_id');
        $defer_shift = $this->input->post('defer_shift');
        if(empty($shift_username)){
            $shift_in_out = 2;
            // $shift_id = $this->Api_model->selectShift($shift_in_out,$terminal_id);//not use
            $data = array(
                'terminal_id' => $terminal_id,
                'username' => $username,
                'cash_in_drawer' => $this->input->post('cash_in_drawer'),
                'coin_dispenser_in' => $this->input->post('coin_dispenser'),
                'bin_data_in' => json_encode($this->input->post('bin_data')),
                'datetime_in' =>  date('Y-m-d H:i:s'),
                'datetime_out' =>  date('Y-m-d H:i:s'),
                'date' =>  date('Y-m-d'),
                'defer_shift' => (!empty($this->input->post('shift_speed')) ? '1' : '0'),
                'shift_in_out' => 1, // 1 = shift_in (Login) and 2 = shift_out (Logout)
            );
            //$bindata = $this->input->post('bin_data');

            $this->db->set('user_shift_status',1);
            $this->db->where('username',$username);
            $this->db->update('user_login');

            $insert_shift = $this->Api_model->insert_shift_terminal_data($data);
            if($insert_shift){

              $getpass=$this->Api_model->getShift($username);

              $session_data['shiftdata']=array(
                  'shift_username' =>$getpass['username'],
                  'first_name' => $getpass['first_name'],
                  'last_name' => $getpass['last_name'],
                  'employee_shift' => $getpass['user_shift_status'],
                  'shift_status' => $getpass['shift_in_out'],
                  'shift_id' => $insert_shift,//$getpass['shift_id'],
                  'terminal_id' => $getpass['terminal_id'],
                  'defer_shift' => $getpass['defer_shift'],
                  'role_id' => $getpass['role_id'],
                  'loginShift' =>TRUE //boolean value TRUE
              );

              $this->response(array(
                  "status" => 1,
                  "message" => "Shift started successfully",
                  "data" => $session_data
              ), REST_Controller::HTTP_OK);

            }

        }else if(!empty($shift_username) && $defer_shift == 1){
              $username = $this->input->post('shift_username');
              $data = array(
                  'cash_in_drawer' => $this->input->post('cash_in_drawer'),
                  'coin_dispenser_in' => $this->input->post('coin_dispenser'),
                  'bin_data_in' => json_encode($this->input->post('bin_data')),
                  'datetime_in' =>  date('Y-m-d H:i:s'),
                  'datetime_out' =>  date('Y-m-d H:i:s'),
                  'date' =>  date('Y-m-d'),
                  'defer_shift' => (!empty($this->input->post('shift_speed')) ? '1' : '0'),
                  'shift_in_out' => 1, // 1 = shift_in (Login) and 2 = shift_out (Logout)
              );

              $this->db->where('username',$username);
              $this->db->where('id',$shift_id);
              $this->db->where('terminal_id',$terminal_id);
              $this->db->where('date', date('Y-m-d'));

              if($this->db->update('tbl_user_shift',$data)){
                  $getpass=$this->Api_model->getShift($username);
                  $session_data['shiftdata']=array(
                      'shift_username' =>$getpass['username'],
                      'first_name' => $getpass['first_name'],
                      'last_name' => $getpass['last_name'],
                      'employee_shift' => $getpass['user_shift_status'],
                      'shift_status' => $getpass['shift_in_out'],
                      'shift_id' => $getpass['shift_id'],
                      'terminal_id' => $getpass['terminal_id'],
                      'defer_shift' => $getpass['defer_shift'],
                      'loginShift' =>TRUE //boolean value TRUE
                  );

                  $this->response(array(
                      "status" => 1,
                      "message" => "Shift started successfully",
                      "data" => $session_data  //if comment
                  ), REST_Controller::HTTP_OK);

              }


        }else if(!empty($shift_username) && $defer_shift == 0){
              $arr = $this->Api_model->getUserData($username);
              $shift_in_out = 1;
              //$shift_id = $this->Api_model->selectShift($shift_in_out); not use

              $data = array(
                  'terminal_id' => $terminal_id,
                  'username' => $username,
                  'cash_out_drawer' => $this->input->post('cash_in_drawer'),
                  'coin_dispenser_out' => $this->input->post('coin_dispenser'),
                  'bin_data_out' => json_encode($this->input->post('bin_data')),
                  'datetime_out' =>  date('Y-m-d H:i:s'),
                  'defer_shift' => 0,
                  'shift_in_out' => 2, // 1 = shift_in (Login) and 2 = shift_out (Logout)
              );

              if($this->Api_model->update_shift_terminal_data($data,$username,$shift_username,$shift_id,$terminal_id) ){
                  $this->response(array(
                      "status" => 1,
                      "message" => "Shift end successfully",
                      // "data" => $session_data
                  ), REST_Controller::HTTP_OK);
              }
          }
    }

    public function cashback_post(){
        $exist_product_id = $this->input->post('exist_product_id');
        if(empty($exist_product_id)){
            $this->response(array(
                "status" => 0,
                "message" => "There are no product in your cart",
            ), REST_Controller::HTTP_OK);
        }else{
            $data = array(
              'order_amount' => $this->input->post('main_cart_grand_total'),
              'cashback_fee' => 2.75,
            );
            $this->response(array(
                "status" => 0,
                "message" => "Data found",
                "data" => $data
            ), REST_Controller::HTTP_OK);
        }
    }

    public function cashback_submit_post(){
        $coupon_discount_total = $this->input->post('coupon_discount_total');
        $redeem_points_discount = $this->input->post('redeem_points_discount');
        $main_cart_grand_total = $this->input->post('main_cart_grand_total');

        $cashback_amount = $this->input->post('cashback_amount');
        $cashback_fee = $this->input->post('cashback_fee');
        $cashdrawer_amt = $this->input->post('cashdrawer_amt');

        $grand_total = $main_cart_grand_total - ($coupon_discount_total + $redeem_points_discount);

        if ($cashback_amount > $cashdrawer_amt) {
            $this->response(array(
                "status" => 0,
                "message" => "Insufficient cash in cash drawer ($ " .$cashback_amount. ")",
            ), REST_Controller::HTTP_OK);
        }else{
            $cashback_order_total = $grand_total + $cashback_amount + $cashback_fee;

            $data = array(
                'grand_total'     => number_format($cashback_order_total, 2),
                'cashback_fee'    => $cashback_fee,
                'cashback_amount' => $cashback_amount,
                'is_cashback'     => 1,
            );
            $this->response(array(
                "status" => 0,
                "message" => "Caskback has been submitted",
                "data" => $data
            ), REST_Controller::HTTP_OK);
        }
    }

    public function save_order_post(){
        $transaction  = $this->input->post('is_transaction_completed');
        $product_id   = $this->input->post('exist_product_id');
        if (empty($product_id)){
            $this->response(array(
              "status" => 0,
              "message" => "Please add atleast one product",
            ), REST_Controller::HTTP_OK);
        }else if($transaction == 1){
            $this->response(array(
              "status" => 0,
              "message" => "Transaction has been already completed",
            ), REST_Controller::HTTP_OK);
        } else {
            $recall_order_id = $this->input->post('recall_order_id');
            if(!empty($recall_order_id)){
                $data = $this->Api_model->update_save_order($recall_order_id);
                if($data == true){
                  $this->response(array(
                    "status" => 1,
                    "message" => "Order saved successfully",
                  ), REST_Controller::HTTP_OK);
                }
            }else{
                $data = $this->Api_model->insert_save_order();
                if($data == true){
                    $this->response(array(
                      "status" => 1,
                      "message" => "Order saved successfully",
                    ), REST_Controller::HTTP_OK);
                }
            }
        }
    }

    //recall order functionality apis - 11 Oct 2021
    public function recall_order_post(){
        $date_filter = (!empty($this->input->post('date')) ? $this->input->post('date') : date('Y-m-d'));
        $result = $this->Api_model->get_recall_order($date_filter);
        if(!empty($this->input->post())){
          if(!empty($result)){
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $result,
            ), REST_Controller::HTTP_OK);
          }else{
            $this->response(array(
              "status" => 1,
              "message" => "Data not found",
            ), REST_Controller::HTTP_OK);
          }
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "All fields are needed"
          ) , REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function recall_order_details_post(){
        $recall_order_id = isset($_POST['recall_order_id']) ? $_POST['recall_order_id'] : 0;

        if($recall_order_id > 0) {
          $data['product_details']  = $this->Api_model->get_recall_order_detail($recall_order_id);
          $data['order_details']    = $this->Api_model->get_recall_order_byid($recall_order_id);

          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 1,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function discard_recall_order_post(){
        $recall_order_id = isset($_POST['recall_order_id']) ? $_POST['recall_order_id'] : 0;

        if($recall_order_id > 0) {
          $this->db->delete('save_orders', array('id' => $recall_order_id));
          $this->db->delete('save_order_details', array('save_order_id' => $recall_order_id));

          $this->response(array(
            "status" => 1,
            "message" => "Order discarded successfully",
          ), REST_Controller::HTTP_OK);

        }else{
          $this->response(array(
            "status" => 0,
            "message" => "something went wrong",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function order_recall_cart_post(){
        $recall_order_id = isset($_POST['recall_order_id']) ? $_POST['recall_order_id'] : 0;

        if($recall_order_id > 0) {
          $product_details  = $this->Api_model->get_recall_order_detail($recall_order_id);
          $order_details    = $this->Api_model->get_recall_order_byid($recall_order_id);

          $data                     = array();
          $data['product_details']  = $product_details;
          $data['order_details']    = $order_details;
          $data['recall_order_id']  = $recall_order_id;

          $this->response(array(
            "status" => 1,
            "message" => "Order recall successfully",
            "data" => $data,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "something went wrong",
          ), REST_Controller::HTTP_NOT_FOUND);
        }
    }
    //end recall order functionality apis - 11 Oct 2021

    //custom price apis - 11 Oct 2021
    public function custom_price_get(){
        $result = $this->Api_model->getmisceleneous_name();
        if(!empty($result)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $result,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function custom_price_submit_post(){
        $misceleneous_name = $this->input->post('misceleneous_name');
        $custom_price_value = $this->input->post('custom_price_value');
        $tax = $this->input->post('tax');
        $auto_id = $this->input->post('auto_id');

        $data = $this->Api_model->addmisceleneous_name($misceleneous_name,$custom_price_value,$tax,$auto_id);
        if($data == true){
            $this->response(array(
              "status" => 1,
              "message" => $data['status']." misceleneous product successfully",
            ), REST_Controller::HTTP_OK);
        }
    }
    //end custom price apis - 11 Oct 2021

    //payout apis - 11 Oct 2021
    public function payout_view_get(){
        $result['vendors'] = $this->Api_model->get_all_suppliers();
        $result['categories'] = $this->Api_model->get_fix_category();
        $result['employees'] = $this->Api_model->get_all_users();
        $result['scratchers'] = $this->Api_model->get_all_scratchers();

        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $result['recent_payout'] = $this->Api_model->get_all_payouts($curr_date);

        if(!empty($result)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $result,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function recent_payouts_by_date_post(){
         $payout_date = $this->input->post('payout_date');
         $data = $this->Api_model->get_all_payouts($payout_date);
         if(!empty($this->input->post())){
            if(!empty($data)){
              $this->response(array(
                "status" => 1,
                "message" => "Data found",
                "data" => $data,
              ), REST_Controller::HTTP_OK);
            }else{
              $this->response(array(
                "status" => 0,
                "message" => "Data not found",
              ), REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
            ) , REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function payout_submit_post(){
        $terminal_id = $this->input->post('terminal_id');
        $shift_id = $this->input->post('shift_id');
        $shift_username = $this->input->post('shift_username');
        $cash_drawer_amt = $this->Api_model->current_cash_drower_amt($shift_username,$terminal_id,$shift_id);
        if($cash_drawer_amt['cash_in_drawer'] < $this->input->post('payout_amount')){
            // $this->open_drawer();
              $result['status'] = 'payout_note';
              $result['insertdata'] =  $_POST;
              $this->response(array(
                "status" => 1,
                "message" => "Payout with payout note",
                "data" => $result,
              ), REST_Controller::HTTP_OK);
        }else{
            $data = $this->Api_model->insert_payout();
            $this->open_drawer();
            if($data == true){
              $this->response(array(
                "status" => 1,
                "message" => "Payout success",
              ), REST_Controller::HTTP_OK);
            }
        }
    }

    public function payout_submit_with_note_post(){
        $data = $this->Api_model->insert_payout_with_note();
        $this->open_drawer();
        if($data == true){
            $this->response(array(
              "status" => 1,
              "message" => "Payout success",
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
                "status" => 0,
                "message" => "something went wrong",
                "account_balance" => 0,
            ), REST_Controller::HTTP_NOT_FOUND);
        }


    }



    //end payout apis - 11 Oct 2021

    //Price override apis - 11 Oct 2021
    public function price_override_click_post(){
        $is_transaction_completed = $this->input->post('is_transaction_completed');
        $exist_product_id = $this->input->post('exist_product_id');

        if($exist_product_id == "" OR $is_transaction_completed == 1) {
            $response['price_override_click'] = 0;
            $this->response(array(
              "status" => 0,
              "message" => "There are no product in your Cart",
              "data" => $response,
            ), REST_Controller::HTTP_OK);
        }else{
          $response['price_override_click'] = 1;
          $this->response(array(
            "status" => 1,
            "data" => $response,
            // "message" => "There are nos product in your Cart",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function table_row_click_post(){
        $is_transaction_completed = $this->input->post('is_transaction_completed');
        $exist_product_id = $this->input->post('exist_product_id');
        $price_override_click = $this->input->post('price_override_click');

        if($exist_product_id == "" OR $is_transaction_completed == 1) {
            $this->response(array(
              "status" => 0,
              "message" => "There are no product in your Cart",
            ), REST_Controller::HTTP_OK);
        }else{
          $response['price_override_click'] = 0;
          $response['product_name'] = $this->input->post('product_name');
          $response['product_base_price'] = $this->input->post('product_base_price');
          $this->response(array(
            "status" => 1,
            "data" => $response,
          ), REST_Controller::HTTP_OK);
        }
    }

    public function price_override_submit_post(){
        $exist_product_id = $this->input->post('product_id');
        $price_override_price = $this->input->post('price_override_price');
        $original_price = $this->input->post('product_base_price');
        $pro_qty = $this->input->post('product_quantity');

        if(!empty($this->input->post())){
            $data['price_override_click'] = 0;
            $data['product_name'] = $this->input->post('product_name');
            $data['product_base_price'] = number_format($original_price,2);

            $final_price = $pro_qty * $price_override_price;
            $data['strike_org_price'] = number_format($original_price * $pro_qty,2);
            $data['onsale_price'] = number_format($final_price,2);
            $data['product_offer_price'] = number_format($final_price,2);
            $data['is_price_override'] = 1;
            $data['original_price'] = number_format($original_price,2);
            $data['product_quantity'] = $pro_qty;
            $this->response(array(
              "status" => 1,
              "data" => $data,
            ), REST_Controller::HTTP_OK);
        }else{
            $this->response(array(
              "status" => 0,
              "message" => "All fields are needed"
            ) , REST_Controller::HTTP_NOT_FOUND);
        }

    }
    //end price override apis - 11 Oct 2021

    //Refund apis - 12 Oct 2021
    public function refund_history_get(){
        $date_filter = '';
        $result = $this->Api_model->get_refund_order($date_filter,1);
        if(!empty($result)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $result,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function refund_receipt_post(){
        $date_filter = $this->input->post('date');
        $result = $this->Api_model->get_refund_order($date_filter);
        if(!empty($result)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $result,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function refund_receipt_details_post(){
        $order_id = $this->input->post('order_id');
        $result = $this->Api_model->get_refund_order_details($order_id);

        $total_item        = 0;
        $sub_total         = 0;
        $grand_total       = 0;
        $tax_amount        = 0;
        $container_deposit = 0;
        $discount          = 0;

        if(!empty($result)) {
            foreach ($result as $key => $value) {
                $discount           = $discount + $value->discount*$value->quantity;
                $total_item         = $total_item + $value->quantity;
                $grand_total        = $value->total_amount;
                $tax_amount         = $value->tax_amount;
                $container_deposit  = $value->container_deposit;
                $sub_total          = $sub_total+$value->total_price;
                $case_UPC           = $value->case_UPC;
                $used_qty           = $value->used_qty;
                $Applicable_Tax     = $value->is_taxable;
            }
        }

        $data['order_details'] = $result;
        $data['total_item'] = $total_item;
        $data['subtotal'] = number_format($sub_total, 2);
        $data['tax'] = $tax_amount;
        $data['container_deposit'] = $container_deposit;
        $data['refund_total'] = number_format($grand_total, 2);

        if(!empty($data)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data,
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }

    public function complete_refund_order_post() {
       $order_details_id       = $this->input->post('order_details_id');
       $order_details_qty      = $this->input->post('order_details_qty');
       $total_amount_refund    = $this->input->post('total_amount_refund');
       $tax_amount_refund      = $this->input->post('tax_amount_refund');
       $container_deposit      = $this->input->post('container_deposit_refund');
       $refund_product_name    = $this->input->post('refund_product_name');
       $refund_product_rate    = $this->input->post('refund_product_rate');
       $refund_total_price     = $this->input->post('refund_total_price');
       $is_scan_refund_order   = $this->input->post('is_scan_refund_order');

       $terminal_id = $this->input->post('terminal_id');
       $shift_id = $this->input->post('shift_id');
       $employee_id = $this->input->post('employee_id');

       if($is_scan_refund_order == 0) { // Without scan order
           $order_id = "";
           if(count($order_details_id) > 0) {
               $ajax_data=[];
               foreach ($order_details_id as $key => $value) {
                   $order_details_auto_id = $value;
                   $order_details_qty_db     = $order_details_qty[$key];

                   $this->db->select('*');
                   $this->db->from('order_details');
                   $this->db->where('order_details_id',$order_details_auto_id);
                   $result_order_details = $this->db->get()->result();

                   if(!empty($result_order_details)) {
                       $pro_container_deposit=$result_order_details[0]->container_deposit;
                       $pro_container_deposit=($pro_container_deposit*$order_details_qty[$key])/$result_order_details[0]->quantity;

                       $result_order_details[0]->quantity=$order_details_qty[$key];
                       $result_order_details[0]->container_deposit=$pro_container_deposit;
                       $ajax_data[]=$result_order_details[0];
                       $order_id = $result_order_details[0]->order_id;
                       unset($result_order_details[0]->is_combo_apply);
                       unset($result_order_details[0]->created_at);

                       $this->db->insert('refund_order_details', $result_order_details[0]);
                       // ST - for query log
                       $last_query = $this->db->last_query();
                       $user_id = $employee_id;
                       $module = 'pos';
                       $operation = 'Refund Transaction';
                       $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query,1);
                       // EN - for query log
                       $refund_order_details_auto_id = $this->db->insert_id();

                       $data = array("quantity"=>$order_details_qty_db);
                       $this->db->where('id', $refund_order_details_auto_id);
                       $this->db->update('refund_order_details', $data);
                       // ST - for query log
                       $last_query = $this->db->last_query();
                       $user_id = $employee_id;
                       $module = 'pos';
                       $operation = 'Update Refund Transaction';
                       $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query,1);
                       // EN - for query log
                   }
               }

               $this->db->select("sum(quantity) sum");
               $this->db->where('order_id', $order_id);
               $refund_order_details = $this->db->get('refund_order_details')->result();
               if(!isset($refund_order_details[0]->sum) || $refund_order_details[0]->sum==null ){
                   $refund_total=0;
               } else{
                   $refund_total=$refund_order_details[0]->sum;
               }
               $this->db->select("sum(quantity) sum");
               $this->db->where('order_id', $order_id);
               $order_details = $this->db->get('order_details')->result();
               if(!isset($order_details[0]->sum) || $order_details[0]->sum==null ){
                   $order_total=0;
               } else{
                    $order_total=$order_details[0]->sum;
               }
               if(trim($order_total)==trim($refund_total)){
                   $this->db->where('order_id', $order_id);
                   $this->db->update('order', ['refunded' => 1]);
                   // ST - for query log
                   $last_query = $this->db->last_query();
                   $user_id = $employee_id;
                   $module = 'pos';
                   $operation = 'Update Refund Transaction';
                   $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                   // EN - for query log
               }

               if($order_id != "") {
                   $this->db->select('*');
                   $this->db->from('order');
                   $this->db->where('order_id',$order_id);
                   $result_order = $this->db->get()->result();
                   unset($result_order[0]->order_date,$result_order[0]->card_request, $result_order[0]->card_response, $result_order[0]->card_number,$result_order[0]->card_type, $result_order[0]->is_cashback, $result_order[0]->cashback_fee, $result_order[0]->cashback_amount,$result_order[0]->redeem_discount,$result_order[0]->is_deleted,$result_order[0]->is_deleted,$result_order[0]->is_deleted,$result_order[0]->is_deleted,$result_order[0]->shift ,$result_order[0]->terminal ,$result_order[0]->refunded ,$result_order[0]->e_order,$result_order[0]->e_order_status ,$result_order[0]->order_details);

                   $this->db->select('*');
                   $this->db->from('refund_order');
                   $refunded_order=$this->db->where('order_id',$order_id)->get()->result();
                   if(!empty($result_order) && empty($refunded_order)) {
                       $this->db->insert('refund_order', $result_order[0]);
                       // ST - for query log
                       $last_query = $this->db->last_query();
                       $user_id = $employee_id;
                       $module = 'pos';
                       $operation = 'Insert Refund Transaction';
                       $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                       // EN - for query log
                       $order_data = array(
                               "date"=>date("m-d-Y"),
                               "total_amount" => $total_amount_refund,
                               "paid_amount" => $total_amount_refund,
                               "due_amount" => $total_amount_refund,
                               "tax_amount" => $tax_amount_refund,
                               "container_deposit" => $container_deposit,
                               'shift'       => $shift_id,
                               'terminal'    => $terminal_id,
                               "total_reedem" => $_POST['refund_reedeem_amount'],
                       );
                       $this->db->where('order_id', $order_id);
                       $this->db->update('refund_order', $order_data);
                       // ST - for query log
                       $last_query = $this->db->last_query();
                       $user_id = $employee_id;
                       $module = 'pos';
                       $operation = 'Update Refund Transaction';
                       $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                       // EN - for query log
                   } else{
                       $order_data=array(
                       "total_reedem" => $refunded_order[0]->total_reedem+$_POST['refund_reedeem_amount'],
                       );
                       $this->db->where('order_id', $order_id);
                       $this->db->update('refund_order', $order_data);
                   }
               }
           }
       } else { // Scan order
            $ajax_data=[];
           if(count($order_details_id) > 0) {
               // ST - refund_order
               $order_id         = $this->auth->generator(15);
               $order            = $this->number_generator_order();
               $customer_id      = 0;
               $refund_order_data = array(
                       "order_id"          => $order_id,
                       "customer_id"       => $customer_id,
                       "date"              => date("m-d-Y"),
                       "total_amount"      => $total_amount_refund,
                       "order"             => $order,
                       "paid_amount"       => $total_amount_refund,
                       "due_amount"        => $total_amount_refund,
                       "tax_amount"        => $tax_amount_refund,
                       'shift'             => $shift_id,
                       'terminal'          => $terminal_id,
                       "container_deposit" => $container_deposit
               );
               $this->db->insert('refund_order', $refund_order_data);
               $refund_order_data['refunded']=1;
               $this->db->insert('order', $refund_order_data);

               // ST - for query log
               $last_query = $this->db->last_query();
               $user_id = $employee_id;
               $module = 'pos';
               $operation = 'Insert Refund Transaction';
               $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
               // EN - for query log

               // EN - refund_order

               foreach ($order_details_id as $key => $value) {
                   $product_id             = $value;
                   $product_qty            = $order_details_qty[$key];
                   $refund_product_name_db = $refund_product_name[$key];
                   $refund_product_rate_db = $refund_product_rate[$key];
                   $refund_total_price_db  = $refund_total_price[$key];

                   // ST - refund_order_details
                   $order_details_id           = $this->auth->generator(15);
                   $refund_order_details_data  = array(
                           "order_details_id"  => $order_details_id,
                           "order_id"          => $order_id,
                           "product_id"        => $product_id,
                           "product_name"      => $refund_product_name_db,
                           "quantity"          => $product_qty,
                           "rate"              => $refund_product_rate_db,
                           "total_price"       => $refund_total_price_db,
                           "variant_id"        => 0,
                           "store_id"          => 0,
                           "supplier_rate"     => 0,
                           "discount"          => 0,
                           "container_deposit" => 0,
                   );
                   $refund_order = $this->db->insert('order_details', $refund_order_details_data);
                   $refund_order = $this->db->insert('refund_order_details', $refund_order_details_data);
                   $refund_order_details_data['discount']=0;
                   $refund_order_details_data['is_taxable']=1;
                   $ajax_data[]=$refund_order_details_data;

                   // ST - for query log
                   $last_query = $this->db->last_query();
                   $user_id = $employee_id;
                   $module = 'pos';
                   $operation = 'Insert Refund Transaction';
                   $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query,1);
                   // EN - for query log
               }
           }
       }
       $response             = array();
       $response['status']   = 'success';
        $this->open_drawer();

       $this->db->select('*');
       $this->db->from('order');
       $this->db->where('order_id',$order_id);
       $result_order = $this->db->get()->result();

       if(isset($_POST['refund_reedeem_amount']) && $_POST['refund_reedeem_amount']>0){

            $data_redeem = array(
               'customer_id'       =>  $result_order[0]->customer_id,
               'order_id'          =>  $order_id,
               'redeem_point'      =>  floor($_POST['refund_reedeem_amount'])*10,
               'point_type'        =>  2 // 1 - New Register / 2 - By Value
           );
           $this->db->insert('customer_redeem_point_master',$data_redeem);
        }
        if(isset($result_order[0]->customer_id)){
            $data_redeem = array(
               'customer_id'       =>  $result_order[0]->customer_id,
               'order_id'          =>  $order_id,
               'redeem_point'      =>  $total_amount_refund-$tax_amount_refund,
           );
           $this->db->insert('customer_redeem_trans_point_master',$data_redeem);
        }


       $response['refund_reedeem_amount']=$_POST['refund_reedeem_amount'];
       $response['refund_discount_amount']=$_POST['refund_discount_amount'];
       $response['ajax_data']=$ajax_data;

       $this->response(array(
         "status" => 1,
         "message" => "Order refunded successfully",
         "data" => $response,
       ), REST_Controller::HTTP_OK);
   }
   //Refund apis - 12 Oct 2021

   //Discount apis - 12 Oct 2021
   public function discount_view_get(){
       $data['discount_percentage'] = $this->Api_model->get_discounts(0);
       $data['discount_amount'] = $this->Api_model->get_discounts(1);

       if(!empty($data)){
         $this->response(array(
           "status" => 1,
           "message" => "Data found",
           "data" => $data,
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Data not found",
         ), REST_Controller::HTTP_OK);
       }
   }

   public function discount_apply_post(){
        $exist_product_id = $this->input->post('exist_product_id');
        $is_transaction_completed = $this->input->post('is_transaction_completed');
        if($exist_product_id == "" OR $is_transaction_completed == 1) {
            $this->response(array(
                "status" => 0,
                "message" => "There are no product in your cart",
            ), REST_Controller::HTTP_OK);
        }else{
            $discount_type  = $this->input->post('discount_type');
            $discount_value = $this->input->post('discount_value');
            $sub_total = $this->input->post('sub_total');
            $tax = $this->input->post('tax');
            $container_deposit = $this->input->post('container_deposit');

            $grand_total_amt = $sub_total + $tax + $container_deposit;

            if($sub_total < $discount_value){
                $this->response(array(
                    "status" => 0,
                    "message" => "Discount Value is greater than sub total, please select other discount",
                ), REST_Controller::HTTP_OK);
            }else{
                if($discount_type == 0){
                    $discount = ($sub_total * $discount_value) / 100;
                    $response['discount_amount'] = number_format($discount, 2);
                    $response['grand_total'] = number_format($grand_total_amt - $discount,2);
                    $response['discount_txt'] = $this->input->post('discount_txt');
                }else{
                    $response['discount_amount'] = number_format($discount_value, 2);
                    $response['grand_total'] = number_format($grand_total_amt - $discount_value,2);
                    $response['discount_txt'] = $this->input->post('discount_txt');
                }

                $this->response(array(
                    "status" => 1,
                    "data" => $response,
                ), REST_Controller::HTTP_OK);
            }
        }
   }
   //end discount apis - 12 Oct 2021

   // coupon apis - 1 Nov 2021
   public function coupon_view_post(){
       $exist_product_id = $this->input->post('exist_product_id');
       if(empty($exist_product_id)){
           $this->response(array(
               "status" => 0,
               "message" => "There are no product in your cart",
           ), REST_Controller::HTTP_OK);
       }else{
           $data = $this->Api_model->pos_coupon_list();
           if(count($data) > 0){
             $this->response(array(
               "status" => 1,
               "message" => "Data found",
               "data" => $data,
             ), REST_Controller::HTTP_OK);
           }else{
             $this->response(array(
               "status" => 0,
               "message" => "Data not found",
             ), REST_Controller::HTTP_OK);
           }
       }
   }

   public function apply_coupon_post(){
       $response=array('status'=>0);
       $coupon_code = $this->input->post('coupon_code');
       $exist_coupon_post=$this->input->post('exist_coupon');
       $exist_product_id=$this->input->post('exist_product_id');
       $qty_txt=$this->input->post('qty_txt');
       $cart_grand_total = $this->input->post('cart_grand_total');
       $tax_value_input= 0;

       $exist_coupon = array();
       if($exist_coupon_post!=''){
           $exist_coupon = explode(",",$exist_coupon_post);
       }

       $Subtotal=$cart_grand_total;
       $grand_total=$Subtotal;

       $grand_total_main=$grand_total;
       $cart_total_main=$Subtotal;

       $status = 0;
       $coupon_amount = array();
       $message = '';
       $coupon_data = '';
       $display_msg =array();
       $count=0;
       $condition_status=0;

       // check previour exlusive added
       $isprevious_exclusive=0;
       if(!empty($exist_coupon)){
           $exlusive_check = $this->db->select('*')->from('coupon_new')->where_in('coupon_name', $exist_coupon)->where('status', 1)->where('is_deleted', 0)->get()->result_array();

           if(!empty($exlusive_check)){
               foreach ($exlusive_check as $key => $value) {
                   if($value['coupon_apply_type']==1)
                           $isprevious_exclusive=1;
               }
           }
       }
       // over check exclusive

       $result = $this->db->select('*')->from('coupon_new')->where('coupon_name', $coupon_code)->where('status', 1)->get()->row();

       $check_coupon = array();
       $customer_id = $this->input->post('employee_id');
       if($result->usetype==1 && !empty($customer_id)){
           $check_coupon = $this->db->select('customer_id,order_id,date_of_apply')->where('customer_id', $customer_id)->where('coupon_code', $coupon_code)->from('applied_coupon_order_invoice')->get()->row();
       }

       if($result->coupon_condition==1 && $grand_total < $result->coupon_condition_price){
           $condition_status=1;
           $message='Grand Total must be Greater than $'.$result->coupon_condition_price;

           $data['condition_status']=$condition_status;
           $this->response(array(
             "status" => 1,
             "message" => $message,
             "data" => $data,
           ), REST_Controller::HTTP_OK);

       }else if($result->coupon_condition==2 && $grand_total > $result->coupon_condition_price){
           $message='Grand Total must be Less than $'.$result->coupon_condition_price;
           $condition_status=1;

           $data['condition_status'] = $condition_status;
           $this->response(array(
             "status" => 1,
             "message" => $message,
             "data" => $data,
           ), REST_Controller::HTTP_OK);
       }

       if ($result && empty($check_coupon) && $condition_status==0 && $isprevious_exclusive==0){
           $today = strtotime(date('d-m-Y'));
            $start_date = strtotime($result->start_date);
            $end_date = strtotime($result->end_date);
            $difference_date = (int)$end_date - (int)$today;

           if ((int)$today > (int)$end_date){
               $this->response(array(
                 "status" => 1,
                 "message" => 'coupon_is_expired'
               ), REST_Controller::HTTP_OK);

               // $message=display('coupon_is_expired');
           }else{
               $diff = abs($start_date - $end_date);
               $years = floor($diff / (365 * 60 * 60 * 24));
               $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
               $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

               if ((int)$today >= (int)$start_date) {
                   if($result->coupon_type==1){
                       if ($result->coupon_price_type == 1)
                           $coupon_amnt= $result->coupon_amount;
                       if($result->coupon_price_type == 2) {
                           $total_dis = ($cart_grand_total * $result->coupon_amount) / 100;
                           $coupon_amnt=$total_dis;
                       }

                       $status                         = 1;
                       $coupon_data                    = (array) $result;
                       $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                       $Subtotal                       = $Subtotal-$coupon_amnt;
                       $grand_total                    = $grand_total-$coupon_amnt;

                       $display_msg[$count]['message']= 'Coupon Code '.$coupon_code.' is applied on Cart Total of $'.$coupon_amnt;
                       $display_msg[$count]['coupon_amount']=$coupon_amnt;

                       $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];
                       $this->response(array(
                         "status" => 1,
                         "message" => $display_msg[$count]['message'],
                         "data" => $data,
                       ), REST_Controller::HTTP_OK);
                   }

                   // 3=product_base
                   if($result->coupon_type==3){
                       $found=0;
                       $productprice=0;
                       $product_qty=0;
                       $exist_product_id_ar = explode(',', $exist_product_id);
                       $qty_txt_ar = explode(',', $qty_txt);
                       $c=0;

                       foreach ($exist_product_id_ar as $items):
                           if($items==$result->product_id){
                             $found=1;
                               $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();
                               $productprice=$result_pro->onsale_price * $qty_txt_ar[$c];
                               $productname=$result_pro->product_name;
                               $product_qty=$qty_txt_ar[$c];
                               $c++;
                           }
                       endforeach;

                       if($found==0){
                           $message='Product Not Found in the Cart Item';
                           $this->response(array(
                             "status" => 1,
                             "message" => $message,
                           ), REST_Controller::HTTP_OK);
                       }else{

                           if ($result->coupon_price_type == 1)
                               $coupon_amnt=$result->coupon_amount;
                           if($result->coupon_price_type == 2) {
                               $total_dis = ($productprice * $result->coupon_amount) / 100;
                               $coupon_amnt=$total_dis;
                           }

                           if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                               $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);

                           }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                               $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);

                           }else{

                               $status                         = 1;
                               $coupon_data                    = (array) $result;
                               //$coupon_amount[$coupon_code]    = $coupon_amnt;
                               $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                               $Subtotal                       = $Subtotal-$coupon_amnt;
                               $grand_total                    = $grand_total-$coupon_amnt;

                               $display_msg[$count]['message']='Coupon Code '.$coupon_code.' is applied on the selected Product';

                               $display_msg[$count]['coupon_amount']= number_format($coupon_amnt,2);

                               $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                               $this->response(array(
                                 "status" => 1,
                                 "message" => $display_msg[$count]['message'],
                                 "data" => $data,
                               ), REST_Controller::HTTP_OK);

                           }
                       }
                   }

                   // 8=combo product_base
                   if($result->coupon_type==8){
                       $found=0;
                       $productprice=0;
                       $product_qty=0;
                       $exist_product_id_ar = explode(',', $exist_product_id);
                       $qty_txt_ar = explode(',', $qty_txt);
                       $c=0;

                       $product_count=0;
                       $qty_match = 0;
                       $comboproduct_arr=explode(',', $result->product_id);

                       $heighestprice_Ar=array();
                       $hiighestqty_Ar = array();
                       $total_qty=array_sum($qty_txt_ar);

                       foreach ($exist_product_id_ar as $items):
                           if(in_array($items, $comboproduct_arr)){
                               $found=1;
                               $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();
                               $heighestprice_Ar[$items] = $result_pro->onsale_price;
                               $hiighestqty_Ar[$items] = $qty_txt_ar[$c];
                               $productprice+=$result_pro->onsale_price * $qty_txt_ar[$c];
                               $product_qty+=$qty_txt_ar[$c];
                               $c++;
                           }
                       endforeach;

                       asort($heighestprice_Ar);

                       $floor_qty= floor($product_qty / $result->product_qty);
                       $discount_qty=$floor_qty*$result->product_qty;
                       $combo_discount = ($discount_qty / $result->product_qty) * $result->combo_amount;

                       if($product_qty >= $result->product_qty){
                           $qty_match=1;
                       }
                       $coupon_amnt= number_format($productprice - $combo_discount,2);
                       if($found==0){

                           $message='Product Combo Not Match Or Found in the Cart Item';
                           $this->response(array(
                             "status" => 1,
                             "message" => $message,
                           ), REST_Controller::HTTP_OK);

                       }else if($qty_match!=1){

                           $message='Quantity specified does not meet the Coupon Quantity Criteria';
                           $this->response(array(
                             "status" => 1,
                             "message" => $message,
                           ), REST_Controller::HTTP_OK);
                       }else if($result->combo_amount > $productprice){

                           $message='Coupon Discount is Greater than Product Price';
                           $this->response(array(
                             "status" => 1,
                             "message" => $message,
                           ), REST_Controller::HTTP_OK);

                       }else{
                           if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                               $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);
                           }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                               $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);
                           }else{

                               $status                         = 1;
                               $coupon_data                    = (array) $result;
                               //$coupon_amount[$coupon_code]    = $coupon_amnt;
                               $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                               $Subtotal                       = $Subtotal-$coupon_amnt;
                               $grand_total                    = $grand_total-$coupon_amnt;

                               $display_msg[$count]['message']='Coupon Code '.$coupon_code.' is applied on the selected Product';
                               $display_msg[$count]['coupon_amount']= number_format($coupon_amnt,2);
                               $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                               $this->response(array(
                                 "status" => 1,
                                 "message" => $display_msg[$count]['message'],
                                 "data" => $data,
                               ), REST_Controller::HTTP_OK);
                           }
                       }
                   }

                   // 9=cateogry coupon
                   if($result->coupon_type==9){
                       $found=0;
                       $productprice=0;
                       $product_qty=0;
                       $exist_product_id_ar = explode(',', $exist_product_id);
                       $qty_txt_ar = explode(',', $qty_txt);
                       $c=0;

                       foreach ($exist_product_id_ar as $items):
                           $found=1;
                           $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();
                           if($result_pro->category_id == $result->category_id){
                               $productprice=$result_pro->onsale_price * $qty_txt_ar[$c];
                               $productname=$result_pro->product_name;
                               $product_qty=$qty_txt_ar[$c];
                               $c++;
                           }

                       endforeach;

                       if($found==0){
                           $message='Product Not Found in the Cart Item';
                           $this->response(array(
                             "status" => 1,
                             "message" => $message,
                           ), REST_Controller::HTTP_OK);
                       }else{

                           if ($result->coupon_price_type == 1)
                               $coupon_amnt=$result->coupon_amount;
                           if($result->coupon_price_type == 2) {
                               $total_dis = ($productprice * $result->coupon_amount) / 100;
                               $coupon_amnt=$total_dis;
                           }
                           if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                               $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);
                           }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                               $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);
                           }else{
                               $status                         = 1;
                               $coupon_data                    = (array) $result;
                               //$coupon_amount[$coupon_code]    = $coupon_amnt;
                               $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                               $Subtotal                       = $Subtotal-$coupon_amnt;
                               $grand_total                    = $grand_total-$coupon_amnt;

                               $display_msg[$count]['message']='Coupon Code '.$coupon_code.' is applied on the selected Product';
                               $display_msg[$count]['coupon_amount']= number_format($coupon_amnt,2);
                               $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                               $this->response(array(
                                 "status" => 1,
                                 "message" => $display_msg[$count]['message'],
                                 "data" => $data,
                               ), REST_Controller::HTTP_OK);
                           }
                       }
                   }

                   // 10=brand coupon
                   if($result->coupon_type==10){
                       $found=0;
                       $productprice=0;
                       $product_qty=0;
                       $exist_product_id_ar = explode(',', $exist_product_id);
                       $qty_txt_ar = explode(',', $qty_txt);
                       $c=0;

                       foreach ($exist_product_id_ar as $items):
                           $found=1;
                           $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();
                           if($result_pro->brand_id == $result->brand_id){
                               $productprice=$result_pro->onsale_price * $qty_txt_ar[$c];
                               $productname=$result_pro->product_name;
                               $product_qty=$qty_txt_ar[$c];
                               $c++;
                           }

                       endforeach;

                       if($found==0){
                           $message='Product Not Found in the Cart Item';
                           $this->response(array(
                             "status" => 1,
                             "message" => $message,
                           ), REST_Controller::HTTP_OK);
                       }else{

                           if ($result->coupon_price_type == 1)
                               $coupon_amnt=$result->coupon_amount;
                           if($result->coupon_price_type == 2) {
                               $total_dis = ($productprice * $result->coupon_amount) / 100;
                               $coupon_amnt=$total_dis;
                           }

                           if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                               $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);
                           }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                               $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                               $this->response(array(
                                 "status" => 1,
                                 "message" => $message,
                               ), REST_Controller::HTTP_OK);
                           }else{
                               $status                         = 1;
                               $coupon_data                    = (array) $result;
                               //$coupon_amount[$coupon_code]    = $coupon_amnt;
                               $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                               $Subtotal                       = $Subtotal-$coupon_amnt;
                               $grand_total                    = $grand_total-$coupon_amnt;

                               $display_msg[$count]['message']='Coupon Code '.$coupon_code.' is applied on the selected Product';

                               $display_msg[$count]['coupon_amount']= number_format($coupon_amnt,2);

                               $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                               $this->response(array(
                                 "status" => 1,
                                 "message" => $display_msg[$count]['message'],
                                 "data" => $data,
                               ), REST_Controller::HTTP_OK);
                           }
                       }
                   }
                   $count++;
               }else {
                   $message=display('coupon_is_expired');
                   $this->response(array(
                     "status" => 1,
                     "message" => 'coupon_is_expired',
                   ), REST_Controller::HTTP_OK);
               }
           }
       }else{
           if($isprevious_exclusive==1){
               $message='Exclusive Coupon is Used';
               $this->response(array(
                 "status" => 1,
                 "message" => $message,
               ), REST_Controller::HTTP_OK);

          }else if($condition_status!=1){
               $message='Invalid Coupon / Coupon Already Used';

               $this->response(array(
                 "status" => 1,
                 "message" => $message,
               ), REST_Controller::HTTP_OK);
        }

       }

       if($status==1 && $result->coupon_apply_type==0 && is_array($exist_coupon) && !empty($exist_coupon) && $isprevious_exclusive==0 && $condition_status==0){
           foreach ($exist_coupon as $value) {
                   $result = $this->db->select('*')->from('coupon_new')->where('coupon_name', $value)->where('status', 1)->get()->row();
                   $check_coupon=array();

                   if($result){
                       if($result->usetype==1){
                       $customer_id = $this->session->userdata('customer_id');
                       $check_coupon = $this->db->select('customer_id,order_id,date_of_apply')->where('customer_id', $customer_id)->where('coupon_code', $value)->from('applied_coupon_order_invoice')->get()->row();
                       }
                   }

                   if ($result && empty($check_coupon)){
                       $today = strtotime(date('d-m-Y'));
                       $start_date = strtotime($result->start_date);
                       $end_date = strtotime($result->end_date);
                       $difference_date = (int)$end_date - (int)$today;

                       if ((int)$today > (int)$end_date){
                           $response['message']=display('coupon_is_expired');
                           $this->response(array(
                             "status" => 1,
                             "message" => 'coupon_is_expired',
                           ), REST_Controller::HTTP_OK);
                       }
                       $diff = abs($start_date - $end_date);
                       $years = floor($diff / (365 * 60 * 60 * 24));
                       $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                       $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                       if ((int)$today >= (int)$start_date) {
                           if($result->coupon_type==1){
                               if ($result->coupon_price_type == 1)
                                   $coupon_amnt= $result->coupon_amount;
                               if($result->coupon_price_type == 2) {
                                   $total_dis = ($cart_grand_total * $result->coupon_amount) / 100;
                                   $coupon_amnt=$total_dis;
                               }

                               $status                 = 1;
                               $coupon_data[$value]    = (array) $result;
                               //$coupon_amount[$value]  = $coupon_amnt;
                               $coupon_amount[$value]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                               $Subtotal               = $Subtotal-$coupon_amnt;
                               $grand_total            = $grand_total-$coupon_amnt;

                               $display_msg[$count]['message']=$value.' Applied with $'.$coupon_amnt.' on cart';
                               $display_msg[$count]['coupon_amount']=$coupon_amnt;

                               $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                               $this->response(array(
                                 "status" => 1,
                                 "message" => $display_msg[$count]['message'],
                                 "data" => $data,
                               ), REST_Controller::HTTP_OK);

                           }

                           // 3=product_base
                           if($result->coupon_type==3){
                               $found=0;
                               $productprice=0;
                               $product_qty=0;
                               $exist_product_id_ar = explode(',', $exist_product_id);
                               $qty_txt_ar = explode(',', $qty_txt);
                               $c=0;

                               foreach ($exist_product_id_ar as $items):
                                   if($items==$result->product_id){
                                       $found=1;

                                       $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();

                                       $productprice=$result_pro->onsale_price * $qty_txt_ar[$c];
                                       $productname=$result_pro->product_name;
                                       $product_qty=$qty_txt_ar[$c];
                                       $c++;
                                   }
                               endforeach;

                               if($found==0){
                                   $response['message']='Product Not Found in the Cart Item';
                                   $this->response(array(
                                     "status" => 1,
                                     "message" => $response['message'],
                                   ), REST_Controller::HTTP_OK);
                               }else{

                                   if ($result->coupon_price_type == 1)
                                       $coupon_amnt=$result->coupon_amount;
                                   if($result->coupon_price_type == 2) {
                                       $total_dis = ($productprice * $result->coupon_amount) / 100;
                                       $coupon_amnt=$total_dis;
                                   }

                                   if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                                       $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);
                                   }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                                       $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);
                                   }else{

                                   $status                 = 1;
                                   //$coupon_amount[$value]  = $coupon_amnt;
                                   $coupon_amount[$value]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                                   $Subtotal               = $Subtotal-$coupon_amnt;
                                   $grand_total            = $grand_total-$coupon_amnt;

                                   $display_msg[$count]['message']=$value.' Applied with $'.$coupon_amnt.' on '.$productname;
                                   $display_msg[$count]['coupon_amount']=$coupon_amnt;

                                   $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                                   $this->response(array(
                                     "status" => 1,
                                     "message" => $display_msg[$count]['message'],
                                     "data" => $data,
                                   ), REST_Controller::HTTP_OK);

                                   }

                               }
                           }

                           // 8=combo product_base
                           if($result->coupon_type==8){
                               $found=0;
                               $productprice=0;
                               $product_qty=0;
                               $exist_product_id_ar = explode(',', $exist_product_id);
                               $qty_txt_ar = explode(',', $qty_txt);
                               $c=0;

                               $product_count=0;
                               $qty_match = 0;
                               $comboproduct_arr=explode(',', $result->product_id);


                               $heighestprice_Ar=array();
                               $hiighestqty_Ar = array();
                               $total_qty=array_sum($qty_txt_ar);

                               //delete code

                               foreach ($exist_product_id_ar as $items):
                                   if(in_array($items, $comboproduct_arr)){
                                       $found=1;
                                       $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();
                                       $heighestprice_Ar[$items] = $result_pro->onsale_price;
                                       $hiighestqty_Ar[$items] = $qty_txt_ar[$c];
                                       $productprice+=$result_pro->onsale_price * $qty_txt_ar[$c];
                                       $product_qty+=$qty_txt_ar[$c];
                                       $c++;
                                   }
                               endforeach;

                               asort($heighestprice_Ar);


                               $floor_qty= floor($product_qty / $result->product_qty);
                               $discount_qty=$floor_qty*$result->product_qty;
                               $combo_discount = ($discount_qty / $result->product_qty) * $result->combo_amount;

                               if($product_qty >= $result->product_qty){
                                   $qty_match=1;
                               }
                               $coupon_amnt= number_format($productprice - $combo_discount,2);

                               if($found==0){

                                   $message='Product Combo Not Match Or Found in the Cart Item';
                                   $this->response(array(
                                     "status" => 1,
                                     "message" => $message,
                                   ), REST_Controller::HTTP_OK);

                               }else if($qty_match!=1){

                                   $message='Quantity specified does not meet the Coupon Quantity Criteria';
                                   $this->response(array(
                                     "status" => 1,
                                     "message" => $message,
                                   ), REST_Controller::HTTP_OK);

                               }else if($result->combo_amount > $productprice){

                                   $message='Coupon Discount is Greater than Product Price';
                                   $this->response(array(
                                     "status" => 1,
                                     "message" => $message,
                                   ), REST_Controller::HTTP_OK);

                               }else{
                                   if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                                       $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);
                                   }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                                       $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);
                                   }else{
                                       $status                         = 1;
                                       $coupon_data                    = (array) $result;
                                       //$coupon_amount[$coupon_code]    = $coupon_amnt;
                                       $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                                       $Subtotal                       = $Subtotal-$coupon_amnt;
                                       $grand_total                    = $grand_total-$coupon_amnt;
                                       $display_msg[$count]['message']='Coupon Code '.$coupon_code.' is applied on the selected Product';

                                       $display_msg[$count]['coupon_amount']= number_format($coupon_amnt,2);

                                       $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $display_msg[$count]['message'],
                                         "data" => $data,
                                       ), REST_Controller::HTTP_OK);

                                   }

                               }
                           }

                           // 9=cateogry coupon
                           if($result->coupon_type==9){
                               $found=0;
                               $productprice=0;
                               $product_qty=0;
                               $exist_product_id_ar = explode(',', $exist_product_id);
                               $qty_txt_ar = explode(',', $qty_txt);
                               $c=0;

                               foreach ($exist_product_id_ar as $items):
                                   $found=1;
                                   $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();
                                   if($result_pro->category_id == $result->category_id){
                                       $productprice=$result_pro->onsale_price * $qty_txt_ar[$c];
                                       $productname=$result_pro->product_name;
                                       $product_qty=$qty_txt_ar[$c];
                                       $c++;
                                   }

                               endforeach;

                               if($found==0){
                                   $message='Product Not Found in the Cart Item';
                                   $this->response(array(
                                     "status" => 1,
                                     "message" => $message,
                                   ), REST_Controller::HTTP_OK);
                               }else{

                                   if ($result->coupon_price_type == 1)
                                       $coupon_amnt=$result->coupon_amount;
                                   if($result->coupon_price_type == 2) {
                                       $total_dis = ($productprice * $result->coupon_amount) / 100;
                                       $coupon_amnt=$total_dis;
                                   }

                                   if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                                       $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);
                                   }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                                       $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);
                                   }else{

                                       $status                         = 1;
                                       $coupon_data                    = (array) $result;
                                       //$coupon_amount[$coupon_code]    = $coupon_amnt;
                                       $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                                       $Subtotal                       = $Subtotal-$coupon_amnt;
                                       $grand_total                    = $grand_total-$coupon_amnt;

                                       $display_msg[$count]['message']='Coupon Code '.$coupon_code.' is applied on the selected Product';

                                       $display_msg[$count]['coupon_amount']= number_format($coupon_amnt,2);

                                       $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $display_msg[$count]['message'],
                                         "data" => $data,
                                       ), REST_Controller::HTTP_OK);

                                   }

                               }
                           }

                           // 10=brand coupon
                           if($result->coupon_type==10){
                               $found=0;
                               $productprice=0;
                               $product_qty=0;
                               $exist_product_id_ar = explode(',', $exist_product_id);
                               $qty_txt_ar = explode(',', $qty_txt);
                               $c=0;

                               foreach ($exist_product_id_ar as $items):
                                   $found=1;
                                   $result_pro = $this->db->select('*')->from('product_information')->where('product_id', $items)->get()->row();
                                   if($result_pro->brand_id == $result->brand_id){
                                       $productprice=$result_pro->onsale_price * $qty_txt_ar[$c];
                                       $productname=$result_pro->product_name;
                                       $product_qty=$qty_txt_ar[$c];
                                       $c++;
                                   }

                               endforeach;

                               if($found==0){
                                   $message='Product Not Found in the Cart Item';
                                   $this->response(array(
                                     "status" => 1,
                                     "message" => $message,
                                   ), REST_Controller::HTTP_OK);
                               }else{

                                   if ($result->coupon_price_type == 1)
                                       $coupon_amnt=$result->coupon_amount;
                                   if($result->coupon_price_type == 2) {
                                       $total_dis = ($productprice * $result->coupon_amount) / 100;
                                       $coupon_amnt=$total_dis;
                                   }

                                   if($result->coupon_condition==3 && $product_qty <= $result->coupon_condition_price){
                                       $message='Product Quantity should be Greater than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);

                                   }else if($result->coupon_condition==4 && $product_qty >= $result->coupon_condition_price){
                                       $message='Product Quantity should be Less than '.$result->coupon_condition_price;
                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $message,
                                       ), REST_Controller::HTTP_OK);

                                   }else{

                                       $status                         = 1;
                                       $coupon_data                    = (array) $result;
                                       //$coupon_amount[$coupon_code]    = $coupon_amnt;
                                       $coupon_amount[$coupon_code]    = array('coupon_type'=>$result->coupon_type,'amount'=>$coupon_amnt);
                                       $Subtotal                       = $Subtotal-$coupon_amnt;
                                       $grand_total                    = $grand_total-$coupon_amnt;

                                       $display_msg[$count]['message']='Coupon Code '.$coupon_code.' is applied on the selected Product';

                                       $display_msg[$count]['coupon_amount']= number_format($coupon_amnt,2);

                                       $data['coupon_amount'] = $display_msg[$count]['coupon_amount'];

                                       $this->response(array(
                                         "status" => 1,
                                         "message" => $display_msg[$count]['message'],
                                         "data" => $data,
                                       ), REST_Controller::HTTP_OK);

                                   }

                               }
                           }

                       } else {
                           $response['message']=display('coupon_is_expired');
                           $this->response(array(
                             "status" => 1,
                             "message" => 'coupon_is_expired',
                           ), REST_Controller::HTTP_OK);
                       }
                   } else {
                           $response['message']='Invalid Coupon / Coupon Already Used';
                           $this->response(array(
                             "status" => 1,
                             "message" => $response['message'],
                           ), REST_Controller::HTTP_OK);
                   }
                   $count++;
           }
       }

       $response['status']         =   $status;
       //$response['coupon_data']    =   $coupon_data;
       $response['display_data']    =   $display_msg;
       $response['coupon_details']  =   $coupon_amount;
       $response['cart_total']     =   $cart_grand_total;
       $response['grand_total']    =   number_format($grand_total, 2);
       // $response['message']        =   $message;

       $response['grand_total_main'] = $grand_total_main;
       $response['cart_total_main'] = $cart_total_main;
       $response['shipping_charge_main'] = $shipping_charge_main;

       //$response=array('status'=>1);
       // echo json_encode($response);

       $this->response(array(
         "status" => 1,
         "message" => 'Coupon applied successfully',
         "data" => $response,
       ), REST_Controller::HTTP_OK);
   }

   //end coupon apis - 1 Nov 2021


   //Print view receipt apis - 1 Nov 2021
   public function prevoius_transaction_post(){
       $date_filter = (!empty($this->input->post('date')) ? $this->input->post('date') : '');
       $result = $this->Api_model->get_refund_order_previous_transaction($date_filter);
       if(!empty($this->input->post())){
         if(!empty($result)){
           $this->response(array(
             "status" => 1,
             "message" => "Data found",
             "data" => $result,
           ), REST_Controller::HTTP_OK);
         }else{
           $this->response(array(
             "status" => 0,
             "message" => "Data not found",
           ), REST_Controller::HTTP_OK);
         }
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "All fields are needed"
         ) , REST_Controller::HTTP_NOT_FOUND);
       }
   }

   public function pos_receipt_post(){
       $order_id = $this->input->post('order_id');
       $result = $this->Api_model->getPOSReceiptData($order_id);
       if(!empty($this->input->post())){
         if(!empty($result)){
           $this->response(array(
             "status" => 1,
             "message" => "Data found",
             "data" => $result,
           ), REST_Controller::HTTP_OK);
         }else{
           $this->response(array(
             "status" => 0,
             "message" => "Data not found",
           ), REST_Controller::HTTP_OK);
         }
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "All fields are needed"
         ) , REST_Controller::HTTP_NOT_FOUND);
       }
   }
   //End print view receipt apis - 1 Nov 2021


   //Redeem Point Apis 15 Nov 2021
   public function redeem_points_post(){
      $walk_in_customer_id = $this->input->post('walk_in_customer_id');
      if(empty($walk_in_customer_id)){
          $this->response(array(
            "status" => 0,
            "message" => "Please login to redeem points.",
          ), REST_Controller::HTTP_OK);
      }else{
        $exist_product_id = $this->input->post('exist_product_id');
        $is_transaction_completed = $this->input->post('is_transaction_completed');

        if (empty($exist_product_id) || $is_transaction_completed== 1) {
            $this->response(array(
              "status" => 0,
              "message" => "There are no product in your cart",
            ), REST_Controller::HTTP_OK);
        }else{
            $data = $this->Api_model->get_customer_redeem_points($walk_in_customer_id);
            // echo '<pre>'; print_r($data);exit;
            $result['total_points'] = $data->tot_redeem_point;
            $result['account_balance'] = ($data->tot_redeem_point /  $data->db_point_amount);
            $this->response(array(
              "status" => 1,
              "message" => "Data found",
              "data" => $result,
            ), REST_Controller::HTTP_OK);

        }

      }
   }

   public function redeem_point_submit_post(){
       $redeem_points_input =  $this->input->post('redeem_points_input');
       $account_balance =  $this->input->post('account_balance'); // data-cust_loyalty_amount
       $total_points_input = $this->input->post('total_points_input');
       $container_deposit = $this->input->post('container_deposit');
       $tax_amount = $this->input->post('tax_amount');
       $outbound_point_amount = $this->input->post('outbound_point_amount');
       $outbound_point_amount_main = $this->input->post('outbound_point_amount_main');
       $outbound_point_main = $this->input->post('outbound_point_main');
       $btn_txt = $this->input->post('btn_txt');

       $main_cart_grand_total = $this->input->post('main_cart_grand_total');
       $final_amount = 0.0;
       $main_cart_grand_total = $main_cart_grand_total + $container_deposit + $tax_amount;

       if($btn_txt == 'Submit'){
         if(empty($redeem_points_input)){
             $this->response(array(
               "status" => 0,
               "message" => "Please enter Redeem Amount.",
             ), REST_Controller::HTTP_OK);
         }
         $final_amount = $redeem_points_input;
       }elseif($btn_txt == "Redeem All") {
         $final_amount = $account_balance;
       }

       if ($final_amount > $main_cart_grand_total) {
           $this->response(array(
             "status" => 0,
             "message" => "Redeem amount is more than existing order amount.",
           ), REST_Controller::HTTP_OK);
       }

       if ($final_amount > $account_balance) {
           $this->response(array(
             "status" => 0,
             "message" => "Can not Redeem amount more than existing loyalty balance.",
           ), REST_Controller::HTTP_OK);
       }

       if ($final_amount < $outbound_point_amount) {
         $this->response(array(
           "status" => 0,
           "message" => "Minimum redeem amount is Insufficient.",
         ), REST_Controller::HTTP_OK);

       }

       $redeem_points_discount_pt = ($redeem_points_input * $outbound_point_main) / $outbound_point_amount_main ;
       $redeem_points_discount = number_format($final_amount, 2);

       $result['exist_redeem_points'] = $total_points_input;
       $result['used_redeem_points'] = ceil($redeem_points_discount_pt);
       $result['redeem_points_discount'] = $redeem_points_discount;
       $result['loyalty_discount'] = $redeem_points_discount;
       $grd_total = $main_cart_grand_total - $redeem_points_discount - $tax_amount;
       $result['grand_total'] = number_format($grd_total, 2);

       $this->response(array(
         "status" => 1,
         "data" => $result,
       ), REST_Controller::HTTP_OK);
   }
   //end Redeem Point Api

   //mail settings api 20-12-2021
   public function mail_settings_get(){
       $data = $this->Api_model->get_mail_settings();
       if(count($data) > 0){
         $this->response(array(
           "status" => 1,
           "message" => "Data found",
           "data" => $data
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Data not found",
         ), REST_Controller::HTTP_OK);
       }
   }

   public function update_mail_settings_post(){
     $data = $this->Api_model->update_mail_settings();
     if($data == true){
         $this->response(array(
           "status" => 1,
           "message" => "Mail settings updated successfully",
         ), REST_Controller::HTTP_OK);
     }else{
         $this->response(array(
             "status" => 0,
             "message" => "something went wrong",
             "account_balance" => 0,
         ), REST_Controller::HTTP_NOT_FOUND);
     }
   }

   public function notification_settings_get(){
       $data = $this->Api_model->get_store_notification();
       if(count($data) > 0){
         $this->response(array(
           "status" => 1,
           "message" => "Data found",
           "data" => $data
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Data not found",
         ), REST_Controller::HTTP_OK);
       }
   }

   public function update_notifiction_settings_post(){
       $data = array(
          'pos_notification' => !empty($this->input->post('pos_notification')) ? implode(',',$this->input->post('pos_notification')) : '',
          'inventory_notification' => !empty($this->input->post('inventory_notification')) ? implode(',',$this->input->post('inventory_notification')) : '',
          'hrms_notification' => !empty($this->input->post('hrms_notification')) ? implode(',',$this->input->post('hrms_notification')) : '',
       );
       $result = $this->Api_model->update_notification_settings($data);
       if($result == true){
           $this->response(array(
             "status" => 1,
             "message" => "Notification settings updated successfully",
           ), REST_Controller::HTTP_OK);
       }else{
           $this->response(array(
               "status" => 0,
               "message" => "something went wrong",
               "account_balance" => 0,
           ), REST_Controller::HTTP_NOT_FOUND);
       }
   }

   public function label_editor_post(){
       $data = $this->Api_model->get_label_editor_by_id();
       if(count($data) > 0){
         $this->response(array(
           "status" => 1,
           "message" => "Data found",
           "data" => $data
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Data not found",
         ), REST_Controller::HTTP_OK);
       }
   }

   public function update_label_editor_post(){
       $data = $this->Api_model->label_editor();
       if($data == true){
           $this->response(array(
             "status" => 1,
             "message" => "Label updated successfully",
           ), REST_Controller::HTTP_OK);
       }else{
           $this->response(array(
               "status" => 0,
               "message" => "something went wrong",
               "account_balance" => 0,
           ), REST_Controller::HTTP_NOT_FOUND);
       }
   }

  public function cash_reg_settings_get(){
       $data = $this->Api_model->get_web_setting_data();
       if(!empty($data)){
         $this->response(array(
           "status" => 1,
           "message" => "Data found",
           "data" => $data
         ), REST_Controller::HTTP_OK);
       }else{
         $this->response(array(
           "status" => 0,
           "message" => "Data not found",
         ), REST_Controller::HTTP_OK);
       }
   }

   public function update_cashRegister_post(){
       $data = $this->Api_model->update_cashRegister();
       if($data == true){
           $this->response(array(
             "status" => 1,
             "message" => "Cash register settings updated successfully ",
           ), REST_Controller::HTTP_OK);
       }else{
           $this->response(array(
               "status" => 0,
               "message" => "something went wrong",
               "account_balance" => 0,
           ), REST_Controller::HTTP_NOT_FOUND);
       }
   }

   public function discount_settings_get(){
       $data['discount_by_percent'] = $this->Api_model->get_discount_data($type=0);
       $data['discount_by_amount'] = $this->Api_model->get_discount_data($type=1);
        if(!empty($data)){
          $this->response(array(
            "status" => 1,
            "message" => "Data found",
            "data" => $data
          ), REST_Controller::HTTP_OK);
        }else{
          $this->response(array(
            "status" => 0,
            "message" => "Data not found",
          ), REST_Controller::HTTP_OK);
        }
    }


    public function update_discount_key_post(){
        $exist = $this->Api_model->existDiscountKey($this->input->post('discount_key_name'),$this->input->post('discount_id'));
        if($exist == 1){
            $this->response(array(
              "status" => 0,
              "message" => 'Discount key name '.$this->input->post('discount_key_name').' already exist',
            ), REST_Controller::HTTP_OK);
        }else{
           if(!empty($this->input->post('discount_id'))){
             $data = $this->Api_model->update_discount_key();
             if($data){
               $user_id        =  $this->input->post('employee_id');
               $notification   = 'Update discount key';
               $action_id      =  $this->input->post('employee_id');
               $action         = 'update discount key';
               $module         = 'store setting';

               $this->Api_model->insert_user_notification($user_id,$notification,$action_id,$action,$module);

               $this->response(array(
                 "status" => 1,
                 "message" => "Discount key updated successfully",
                 "data" => $data
               ), REST_Controller::HTTP_OK);

             }
          }else{
              $data = $this->Api_model->insert_discount_key();
              if($data){
                  $user_id        =  $this->input->post('employee_id');
                  $notification   = 'add discount key';
                  $action_id      =  $this->input->post('employee_id');
                  $action         = 'add discount key';
                  $module         = 'store setting';

                  $this->Api_model->insert_user_notification($user_id,$notification,$action_id,$action,$module);

                  $this->response(array(
                    "status" => 1,
                    "message" => "Discount key added successfully",
                    "data" => $data
                  ), REST_Controller::HTTP_OK);
              }
          }
        }
    }




}
?>
