<?php

require APPPATH.'libraries/REST_Controller.php';

class Api2 extends REST_Controller{

  public function __construct(){
    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(array("api/Api2_model"));
    $this->load->model("Cashier_model");
    $this->load->library(array("form_validation"));
    $this->load->helper("security");
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
        
        if($this->form_validation->run() === FALSE){
          $this->response(array(
            "status" => 0,
            "message" => "All fields are needed"
          ) , REST_Controller::HTTP_NOT_FOUND);

        }else{
          if(!empty($this->input->post())){
            $user = $this->Api2_model->user_login($this->input->post('username'),$this->input->post('password'));
            if(!empty($user) && $user != FALSE){
              $this->response(array(
                      "status" => 1,
                      "message" => "User login successful",
                      "data" => $user
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
                  "message" => "All fields are needed"
                ), REST_Controller::HTTP_NOT_FOUND);
          }
        }

    }


public function POSterminalCheckout_post() {
        $cart_grand_total  = $this->input->post('main_cart_grand_total');
        //$cart_grand_total  = $this->input->post('cart_grand_total');
        $product_id        = $this->input->post('product_id');
        $product_quantity  = $this->input->post('product_qty');
        $product_price     = $this->input->post('product_price');
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
        $order_details = $this->input->post('order_details');
        if(isset($order_details)){
          $order_details=$order_details;
        } else{
          $order_details="";
        }
        $user_id = 86;
        /*if($check_register_amount == false){
            $response["status"]  = 0;
            $response["message"] = "Limit Exceed";
        }else */ if(!empty($product_id)) {

            $order_id         = $this->auth->generator(15);

            if($walk_in_customer_id != 0)
                $customer_id = $walk_in_customer_id;
            else
                $customer_id = 0;

            $data=array(
                'order_id'          =>  $order_id,
                'customer_id'       =>  $customer_id,
                'date'              =>  date("m-d-Y"), // 07-16-2020
                'total_amount'      =>  $cart_grand_total,
                'order'             =>  $this->number_generator_order(),
                'total_discount'    =>  0,
                'order_discount'    =>  0,
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
                'shift'             =>  0,
                'terminal'          =>  0,
                'order_details'     => $order_details,
                'e_order'           => 1
            );

            $this->db->insert('order',$data);

            // ST - for query log
            $last_query = $this->db->last_query();
            $user_id = 86;
            $module = 'pos';
            $operation = 'Cash Transaction';
            $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
            // EN - for query log

            $api_data_in = array();
            foreach ($product_id as $key => $value) {
                # fetch primary key id by product_id
                $order_details_id = $this->auth->generator(15);
                $db_product_id         = $product_id[$key];
                $db_product_quantity   = $product_quantity[$key];
                $db_product_rate       = $product_rate[$key];
                $db_product_price      = $product_price[$key];
                $db_product_name       = $product_name[$key];
                $db_is_texable         = (!empty($is_texable[$db_product_id]) ? $is_texable[$db_product_id] : 0);

                if($db_is_texable == 1) {
                    $sale_tax = "7.75";
                } else {
                    $sale_tax = "0.00";
                }

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
                    'supplier_rate'     =>  0,
                    // 'total_price'       =>  ($db_product_rate * $db_product_quantity),
                    'total_price'       =>  $db_product_price,  //prasant added
                    'is_combo_apply'    =>  $combo_apply,       //prasant added
                    'discount'          =>  0,
                    'status'            =>  1
                );
                $this->db->insert('order_details',$order_details);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = 86;
                $module = 'pos';
                $operation = 'Cash Transaction';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query,1);
                // EN - for query log


                // EN - For order_details
                $db_product_quantity=0-$db_product_quantity;
                $api_data_in[] =array('product_id' => $db_product_id , 'quantity' => $db_product_quantity);

                // // ST - update ecommerce plugin inventory
                // $product_shopify_id = $this->Cashier_model->get_productinfo_by_id($db_product_id);
                // if($product_shopify_id != null){
                //     //$api_data_in[] =array('shopify_product_id' => $product_shopify_id , 'quantity' => $db_product_quantity);
                //     //print_r($api_data);
                // }
                // // EN - update ecommerce plugin inventory
            }

            $api_data = array();
            $api_data['request'] = $api_data_in;
            // print_r($api_data);
            // echo json_encode($api_data);
            // exit;
            $this->adjust_inventory_quantity($api_data);

//            $this->eplugin->adjust_quantity($api_data);

  
            $response["status"]  = 1;
            $response["order_id"]= $order_id;
            $response["message"] = "Order saved successfully.";

            //open cash drawer




        } else {

            $response["status"]  = 0;
            $response["order_id"]= 0;
            $response["message"] = "Please try again.";

        }

        echo json_encode($response);
        exit();
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

              if($this->Api2_model->insert_user($user)){
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

          if($img == './uploads/products/_'){
                $img = './uploads/products/600px-No_image_available.svg (2).png';
          }

          $supplier = (!empty($this->input->post('supplier')) ? $this->input->post('supplier'):'');

          if(!$this->Api2_model->isExistSupplier($supplier)){
              $dat = array(
                  'supplier_id'   => $this->auth->generator(20),
                  'supplier_name' => $this->input->post('supplier'),
                  'status' => 1,
              );
              $this->db->insert('supplier_information', $dat);
              $ssupplier = $dat['supplier_name'];
              $supplierID = $dat['supplier_id'];
          }else{
              $supp = $this->Api2_model->isExistSupplier($supplier);
              $ssupplier = $supp->supplier_name;
              $supplierID = $supp->supplier_id;
          }
          $brand = (!empty($this->input->post('brand')) ? $this->input->post('brand'):'0');
          if(!$this->Api2_model->isExistBrand($brand)){
              $dat = array(
                  'brand_id' => $this->auth->generator(15),
                  'brand_name' => $brand,
                  'description' => $brand,
                  'status' => 1,
              );
              $this->db->insert('brand', $dat);
              $brandId = $dat['brand_id'];
          }else{
              $brands = $this->Api2_model->isExistBrand($brand);
              $brandId = $brands->brand_id;
          }
          $units = $this->input->post('unit');
          if($this->Api2_model->get_unit($units)){
              $getunit = $this->Api2_model->get_unit($units);
              $unit = $getunit->value;
          }else{
              $unit = $units;
          }
          $sizes = $this->input->post('size');
          if($this->Api2_model->get_size($sizes)){
              $getsize = $this->Api2_model->get_size($sizes);
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
              $data = array(
                  'product_id'            => $this->auth->generator(8),
                  'product_name'          => $this->input->post('product_name'),
                  'short_name'            => $this->input->post('product_nickname'),
                  'category_id'           => (!empty($this->input->post('category_id'))?$this->input->post('category_id'):'0'),
                  'brand_id'              => $brandId,
                  'size'                  => $name,
                  'supplier'              => $ssupplier,
                  'supplier_id'           => $supplierID,
                  'shopify_product_id'    => $this->input->post('shopify_product_id'),
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
                  'onsale_price'          => $this->input->post('store_sell_price'),
                  'ecomm_sale_price'      => $this->input->post('ecommerce_sell_price'),
                  'barcode_formats'       => $this->input->post('barcode_formats'),
                  'case_UPC'              => (!empty($upc_code))? $upc_code : $this->input->post('upc'),
                  'barcode_type'          => $this->input->post('barcode_type'),
                  'mpn'                   => $this->input->post('mpn'),
                  'image_thumb'           => $img,
                  // //'barcode_json'          => $this->input->post('barcode_json'),
                  'store_promotion_price' => $this->input->post('store_promotion_price'),
                  'ecomm_promotion_price' => $this->input->post('ecommerce_promotion_price'),
                  'status'                => 1,
                  'Applicable_CRV'        => (!empty($this->input->post('CRV'))?$this->input->post('CRV'):'0'),
                  'Applicable_Tax'        => (!empty($this->input->post('TAX'))?$this->input->post('TAX'):'0'),
                  'is_from_shopify'       => 1,
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

            if($this->Api2_model->insert_product($data,$status,$table_from)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Product has been created",
                  'product_id' => $data['product_id'],
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
        $shopify_id = $this->input->post('shopify_product_id');
        $sizes    = $this->input->post('size');
        $sup_price  = $this->input->post('supplier_price');

          if($sup_price == '0.00'){
              $supplier_price = '';
          }else{
              $supplier_price = $this->input->post('supplier_price');
          }
          if($this->Api2_model->get_size($sizes)){
              $getsize = $this->Api2_model->get_size($sizes);
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

          $supplier = (!empty($this->input->post('supplier')) ? $this->input->post('supplier'):'');

          if(!$this->Api2_model->isExistSupplier($supplier)){
              $dat = array(
                  'supplier_id'   => $this->auth->generator(20),
                  'supplier_name' => $this->input->post('supplier'),
                  'status' => 1,
              );
              $this->db->insert('supplier_information', $dat);
              $ssupplier = $dat['supplier_name'];
              $supplierID = $dat['supplier_id'];
          }else{
              $supp = $this->Api2_model->isExistSupplier($supplier);
              $ssupplier = $supp->supplier_name;
              $supplierID = $supp->supplier_id;
          }

          $product_info = array(
              'product_name' => $this->input->post('product_name'),
              'short_name'   => $this->input->post('product_nickname'),
              'category_id'  => (!empty($this->input->post('category_id'))?$this->input->post('category_id'):'0'),
              'brand_id'     => $this->input->post('brand_id'),
              'size'         => $name,
              'supplier'     => $ssupplier,
              'supplier_id'  => $supplierID,
              'product_details' => $this->input->post('details'),
              'producer'        => $this->input->post('producer'),
              'Meta_Title'      => $this->input->post('Meta_Title'),
              'Meta_Key'        => $this->input->post('Meta_Key'),
              'Meta_Desc'       => $this->input->post('Meta_Desc'),
              'unit'            => $this->input->post('unit'),
              'quantity'        => $this->input->post('quantity'),
              'abv'             => $this->input->post('abv'),
              'proof'           => $this->input->post('proof'),
              'region'          => $this->input->post('region'),
              'supplier_price'  => number_format($supplier_price, 2),
              'onsale_price'    => $this->input->post('store_sell_price'),
              'ecomm_sale_price'      => $this->input->post('ecommerce_sell_price'),
              'store_promotion_price' => $this->input->post('store_promotion_price'),
              'ecomm_promotion_price' => $this->input->post('ecommerce_promotion_price'),
              'Applicable_CRV'        => $this->input->post('CRV'),
              'Applicable_Tax'        => $this->input->post('TAX'),
              'is_ecommerce'          => $this->input->post('is_ecommerce'),
          );

          $product_combo = $this->input->post('product_combo');
          $combo_unit = $this->input->post('combo_unit');
          $combo_price = $this->input->post('combo_price');

          // if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
              $this->db->where('product_id', $product_id);
              $delete = $this->db->delete('product_combos');
          // }

          if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
              $combodata = [];
              for($t = 0; $t< count($product_combo); $t++){
                   $combodata['product_id'] = $product_id;
                   $combodata['product_combo'] = $product_combo[$t];
                   $combodata['combo_unit'] = $combo_unit[$t];
                   $combodata['combo_price'] = $combo_price[$t];
                // echo '<pre>'; print_r($combodata);exit;
                  $this->db->insert('product_combos', $combodata);
              }
          }elseif(empty($product_combo[0])){
              $this->db->where('product_id',$product_id);
              $this->db->delete('product_combos');
          }

          if($this->Api2_model->update_product($shopify_id, $product_info)){
              $this->response(array(
                "status" => 1,
                "message" => "Product has been updated"
              ), REST_Controller::HTTP_OK);
          }else{
        $this->response(array(
                "status" => 0,
                "messsage" => "Failed to update product"
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
        $res = $this->Api2_model->insert($data);
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
        $data= $this->Api2_model->getProductData($barcode);

        if(!empty($data)){
            $img = ltrim($data->image_thumb,"./");

            $product_id = $data->product_id;
            $combo_data = $this->Api2_model->get_combo_productdata($product_id);
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
            $data1= $this->Api2_model->getProductMasterData($barcode);

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
                $cat_id = $this->Api2_model->find_category($catname);
                $response->products[0]->category_id=$cat_id['category_id'];
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

        $brands = $this->Api2_model->get_brands();
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
        $units = $this->Api2_model->get_units();

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
        $supplier = $this->Api2_model->get_suppliers();
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

    // Plugin api code

    public function inventorylist_get(){
        $recentitem = $this->Api2_model->inventorylist();

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


    public function inventorybyid_post(){
        $product_id=$this->input->post('product_id');
        $recentitem = $this->Api2_model->getProductByID($product_id);

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

    public function inventoryupdate_post(){
      if(!empty($this->input->post()) )  {

          $product_id = !empty($this->input->post('product_id')) ? $this->input->post('product_id') : '';
          $product_qty = !empty($this->input->post('product_qty')) ? $this->input->post('product_qty') : '';

          $this->db->where('product_id', $product_id);
           $result=$this->db->get('product_information');
           $product_info= $result->result();

           $quantity=$product_info[0]->quantity-$product_qty;

          if($product_id!='' && $product_qty !=''){

            $data = array(
                'quantity' => $quantity,
                'updated_at' => date('Y-m-d H:i:s')
            );
            $data = $this->security->xss_clean($data);
            if($this->Api2_model->update_product_qty($product_id,$data)){
                $this->response(array(
                  "status" => 1,
                  "message" => "Inventory updated successfully"
                ), REST_Controller::HTTP_OK);
            }else{
                $this->response(array(
                  "status" => 0,
                  "messsage" => "Failed to update Inventory"
                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }

          }else{
                $this->response(array(
                  "status" => 0,
                  "message" => "All fields are needed"
                ), REST_Controller::HTTP_NOT_FOUND);
          }

      }else{
            $this->response(array(
                "status" => 0,
                "message" => "All fields are needed"
            ), REST_Controller::HTTP_NOT_FOUND);
      }
    }



    

    public function size_get(){
        $sizes = $this->Api2_model->get_sizes();

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
        $sizes = $this->Api2_model->fetch_size($category_id);
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

      $data['category'] = $this->Api2_model->get_all_category();
        foreach ($data['category']  as $key => $value) {
          $data['category'][$key]['sub_cat'] = $this->Api2_model->get_all_category($value['category_id']);
          foreach ($data['category'][$key]['sub_cat']  as $key_sub => $value_sub) {
              $data['category'][$key]['sub_cat'][$key_sub]['child_cat'] = $this->Api2_model->get_all_category($value_sub['category_id']);
              foreach ($data['category'][$key]['sub_cat'][$key_sub]['child_cat']  as $key_child => $value_child) {
                  $data['category'][$key]['sub_cat'][$key_sub]['child_cat'][$key_child]['grand_cat'] = $this->Api2_model->get_all_category($value_child['category_id']);
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

          $this->Api2_model->insert_order($arrayName);

          if(!empty($email)){
            $order_id = $arrayName['order_id'];
            $data["order_id"] = $order_id;

            $getPOSReceiptData = $this->Api2_model->getPOSReceiptData($order_id);
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

                $result = $this->Api2_model->insert_order_details($catdata);

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
        $coupons = $this->Api2_model->get_coupons();
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
        $promotions = $this->Api2_model->get_promotions();
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

            if($this->Api2_model->insert_coupon($data)){
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
          if($this->Api2_model->update_coupon($coupon_id,$data)){
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
       if($this->Api2_model->delete_coupon($coupon_id)){
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
        $coupondata = $this->Api2_model->get_coupon_by_id($coupon_id);
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
                'manage_type'              => 1,
                'status'                   => 1,
            );
            $data = $this->security->xss_clean($data);
            if($this->Api2_model->insert_promotion($data)){
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
          );
          $data = $this->security->xss_clean($data);
          if($this->Api2_model->update_promotion($coupon_id,$data)){
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
        $promotiondata = $this->Api2_model->get_promotion_by_id($coupon_id);
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
      $catdata = $this->Api2_model->fetch_category_name($category_id);
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
      $branddata = $this->Api2_model->fetch_brand_name($brand_id);
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
      $product_id = $this->input->post('product_id');
      $productdata = $this->Api2_model->fetch_product_name($product_id);
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
   public function adjust_inventory_quantity($data){
       for($count = 0; $count < count($data['request']); $count++){

           $product_id = $data['request'][$count]['product_id'];
           $purchase_qty = substr($data['request'][$count]['quantity'],1);
           $old_qty = $this->Cashier_model->get_inventory_qty($product_id);
           $dat['quantity'] = $old_qty->quantity - $purchase_qty;

           $this->db->where('product_id',$product_id);
           $this->db->update('product_information',$dat);
       }

    }
    public function product_list_get(){
      $this->db->limit(2,0);
      $this->db->where('is_ecommerce',1);
      $this->db->order_by('parent_product','asc');
      $data_array=$this->Cashier_model->get_all_products();
      foreach ($data_array as $key => $data) {
      $api_data["products"][]=   [
                "product_id"=>"".$data['product_id']."",
                "parent_id"=>0,
                "shopify_product_id"=>"",
                "barcode_formats"=>"".$data['barcode_formats']."",
                "barcode"=>"".$data['case_UPC']."",
                "barcode_type"=>"".$data['barcode_type']."",
                "brand"=>"".$this->input->post('brand')."",
                //"category"=>"".$data->category_name."",
                "category_id"=>"".$data['category_id']."",
                "image"=>base_url().$data['image_thumb'],
                "manufacturer"=>"".$data['producer']."",
                "mpn"=>"".$data['mpn']."",
                "qty"=>"".$data['quantity']."",
                "title"=>"".$data['product_name']."",
                "unit"=>"".$data['unit']."",
                "description"=>"".$data['product_details']."",
                "meta_title"=>"".$data['Meta_Title']."",
                "meta_key"=>"".$data['Meta_Key']."",
                "meta_description"=>"".$data['Meta_Desc']."",
                "abv"=>"".$data['abv']."",
                "proof"=>"".$data['proof']."",
                "region"=>"".$data['region']."",
                "supplier_price"=>"".$data['supplier_price']."",
                "store_sell_price"=>"".$data['onsale_price']."",
                "price"=>"".$data['ecomm_sale_price']."",
                "store_promotion_price"=>"".$data['store_promotion_price']."",
                "ecomm_promotion_price"=>"".$data['ecomm_promotion_price']."",
                "Applicable_CRV"=>"".$data['Applicable_CRV']."",
                "Applicable_Tax"=>"".$data['Applicable_Tax']."",
                "supplier"=>"".$data['supplier']."",
                "size"=>"".$data['size']."",
                "is_ecommerce"=>"".$data['is_ecommerce']."",
                "parent_product"=>"".$data['parent_product']."",
                ];

      }
      echo json_encode($api_data);


    }
  public function number_generator_order()
    {
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
}

 ?>
