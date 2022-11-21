<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cashier_model extends MY_Model
{

    public $current_terminal;
    public function __construct()
    {
        parent::__construct();
        $set_timezone = $this->get_fontsize();
        date_default_timezone_set($set_timezone->timezone);
    }

    static function GetMAC(){
        $macAddr=false;
        $arp=`arp -n`;
        $lines=explode("\n", $arp);

        foreach($lines as $line){
            $cols=preg_split('/\s+/', trim($line));

            if ($cols[0]==$_SERVER['REMOTE_ADDR']){
                $macAddr=$cols[2];
            }
        }

        return $macAddr;
    }
    //Parent Category List
    // public function parent_category_list()
    // {
    //     $this->db->select('*');
    //     $this->db->from('product_category');
    //     $this->db->where('cat_type', 1);
    //     $this->db->where('status', 1);
    //     $this->db->order_by('menu_pos');
    //     //$this->db->limit('9');
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     }
    //     return false;
    // }

    //prashant code  cashier/Cashier/insertproduct
    public function add_product($product_id,$brand_id){
         try{
            $img_url = $this->input->post('product_hidden_img');
            $split_url= substr($img_url, strrpos($img_url, '/' ) );
            $img_name=str_replace($split_url[0],'',$split_url);

            $upc_code = $this->input->post('case_upc');

            $img = './uploads/products/'.$upc_code.'_'.$img_name;

            // Function to write image into file
            file_put_contents($img, file_get_contents($img_url));

            if($img == './uploads/products/'.$upc_code.'__' || empty($img_url)){
                $img = './uploads/products/600px-No_image_available.svg (2).png';
            }

            $supplier = $this->input->post('supplier');

            if(!empty($supplier)){
                $sup = $this->isExistSupplier($supplier);
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
                    $supp = $this->isExistSupplier($supplier);
                    $ssupplier = $supp->supplier_name;
                    $supplierID = $supp->supplier_id;
                }
            }

            $brand = (!empty($this->input->post('brand')) ? $this->input->post('brand'):'0');

            if(!$this->isExistBrand($brand)){
                $dat = array(
                    'brand_id' => $brand_id,
                    'brand_name' => $brand,
                    'description' => $brand,
                    'status' => 1,
                );
                $this->db->insert('brand', $dat);
                $brandId = $dat['brand_id'];
            }else{
                $brands = $this->isExistBrand($brand);
                $brandId = $brands->brand_id;
            }
            $units = $this->input->post('unit');
            if($this->get_unit($units)){
                $getunit = $this->get_unit($units);
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

            if($this->get_size($sizes)){
                $getsize = $this->get_size($sizes);
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

            // $product_combo = $this->input->post('product_combo');
            // $combo_unit = $this->input->post('combo_unit');
            // $combo_price = $this->input->post('combo_price');

            // if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
            //   $combodata = [];
            //     for($t = 0; $t< count($product_combo); $t++){
            //        $combodata['product_id'] = $product_id;
            //        $combodata['product_combo'] = $product_combo[$t];
            //        $combodata['combo_unit'] = $combo_unit[$t];
            //        $combodata['combo_price'] = $combo_price[$t];
            //
            //        $this->db->insert('product_combos', $combodata);
            //     }
            // }

            $hidden = $this->input->post('combo_row');
            foreach ($hidden as $value) {
                $combodata = [];
                $combodata['product_id'] = $product_id;
                $combodata['product_combo'] =   $this->input->post('product_combo_'.$value);
                $combodata['combo_unit'] =  $this->input->post('combo_unit_'.$value);
                $combodata['combo_price'] = $this->input->post('combo_price_'.$value);

                if(!empty($combodata['product_combo'] && $combodata['combo_unit'] && $combodata['combo_price'])){
                  $this->db->insert('product_combos', $combodata);
                }
            }

            $data = array(
                'product_id'            => $product_id,
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
                'case_UPC'              => (!empty($upc_code)) ? $upc_code : $this->input->post('upc'),
                'barcode_type'          => $this->input->post('barcode_type'),
                'mpn'                   => $this->input->post('mpn'),
                'image_thumb'           => $img,
                'store_promotion_price' => $this->input->post('store_promotion_price'),
                'ecomm_promotion_price' => $this->input->post('ecommerce_promotion_price'),
                'status'                => 1,
                'Applicable_CRV'        => (!empty($this->input->post('CRV'))?$this->input->post('CRV'):'0'),
                'Applicable_Tax'        => (!empty($this->input->post('TAX'))?$this->input->post('TAX'):'0'),
                'parent_product'        => (!empty($this->input->post('parent_product_id'))?$this->input->post('parent_product_id'):''),
                'created_at'            => date('Y-m-d H:i:s'),
                'updated_at'            => date('Y-m-d H:i:s'),

            );



            $status = (!empty($this->input->post('status'))?$this->input->post('status'):'insert');
            $table_from = (!empty($this->input->post('from'))?$this->input->post('from'):'master');

            if($status == 'insert' AND $table_from == 'api'){

                if($this->db->insert('product_master', $data)){
                    $data['reorder_level'] = $this->input->post('reorder_level');
                    $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
                     $this->db->insert('product_information',$data);

                    // ST - for query log
                    $last_query = $this->db->last_query();
                    $user_id = $this->session->userdata['username'];
                    $module = 'Inventory';
                    $operation = 'Add Product Using API';
                    $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query,0,1);

                    $user_id        =  $this->session->userdata('username');
                    $notification   =  'Add Product '.$data['product_name'].' ('.$data['case_UPC'].')';
                    $action_id      =  $this->session->userdata('username');
                    $action         = 'add product';
                    $module         = 'inventory';

                    // $check = $this->check_notification($module,$perm='A');
                    // if(strpos($check[0]['inventory_notification'], 'A') !== false){
                    //     $check_status = 1;
                    // }

                    $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                    // EN - for query log
                }
            }elseif($status == 'insert' AND $table_from == 'master'){
                $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
                $data['reorder_level'] = $this->input->post('reorder_level');
                $this->db->insert('product_information', $data);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Add Product';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log

                $user_id        =  $this->session->userdata('username');
                $notification   =  'Add Product '.$data['product_name'].' ('.$data['case_UPC'].')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'add product';
                $module         = 'inventory';

                // $check = $this->check_notification($module,$perm='A');
                // if(strpos($check[0]['inventory_notification'], 'A') !== false){
                //     $check_status = 1;
                // }

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
            }
            elseif($status == 'update' AND $table_from == 'store'){
                $this->db->where('case_UPC', $upc_code);
                $this->db->update('product_information', $data);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Update Product';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log

                $user_id        =  $this->session->userdata('username');
                $notification   =  'Add Product '.$data['product_name'].' ('.$data['case_UPC'].')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'add product';
                $module         = 'inventory';

                // $check = $this->check_notification($module,$perm='A');
                // if(strpos($check[0]['inventory_notification'], 'A') !== false){
                //     $check_status = 1;
                // }
                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
            }else{
                $data['reorder_level'] = $this->input->post('reorder_level');
                $this->db->insert('product_information', $data);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Add Product';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);

                $user_id        =  $this->session->userdata('username');
                $notification   =  'Add Product '.$data['product_name'].' ('.$data['case_UPC'].')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'add product';
                $module         = 'inventory';

                // $check = $this->check_notification($module,$perm='A');
                // if(strpos($check[0]['inventory_notification'], 'A') !== false){
                //     $check_status = 1;
                // }
                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                // EN - for query log
            }

            if($this->db->affected_rows() > 0){

                return $data;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function mail_template_list($where=[]){
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->from('mail_template_list');
        $query=$this->db->get();
        return $query->result();
    }

    public function is_email_schedule_runs($id){
        $this->db->where(['template_id' => $id, 'date' => date('Y-m-d')]);
        $this->db->from('report_schedule_log');
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function mail_template_by_id($id){
        $this->db->from('mail_template_list');
        $this->db->where('id',$id);
        $query=$this->db->get();
        if($this->db->affected_rows() > 0){
            $result = $query->row();
            return $result;
        }else{
            return false;
        }
    }
    public function get_unit($units){
        try{
            $this->db->select('unit_name,value');
            $this->db->from('tbl_unit');
            $this->db->where('unit_name',$units);
            $this->db->order_by('value','asc');
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
    public function get_size($sizes){
        try{
            $this->db->select('*');
            $this->db->from('tbl_size');
            $this->db->where('name',$sizes);
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

    public function frequentky_sold_item(){
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

        if($auto_id !=0 && $auto_id != ""){
                $this->db->where('id',$auto_id);
                $this->db->update('miscellaneous_product',array('product_name'=>$misceleneous_name,'product_price'=>$custom_price_value,'is_taxable'=>$tax));
        }else{
            try{
                $this->db->select('*');
                $this->db->from('miscellaneous_product');
                $this->db->where('product_name',$misceleneous_name);
                $query=$this->db->get();
                $story_array = array();
                if($this->db->affected_rows() > 0){
                    $this->db->where('product_name',$misceleneous_name);
                    $this->db->update('miscellaneous_product',array('product_price'=>$custom_price_value,'is_taxable'=>$tax));
                }else{
                    $this->db->insert('miscellaneous_product',array('product_name'=>$misceleneous_name,'product_price'=>$custom_price_value,'is_taxable' =>$tax,'created_date' => date('Y-m-d H:i:s')));
                }
            }catch(Exception $ex){
                error_log($ex->getTraceAsString());
                echo $ex->getTraceAsString();
                return FALSE;
            }
        }
    }

    public function isExistBrand($brand){
        try{
            $this->db->select('brand_name,brand_id');
            $this->db->from('brand');
            $this->db->where('brand_name',$brand);
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

    //check data is avilable or not in product information
    public function getProductData($barcode){

        $pad_barcode = str_pad($barcode,8,"0",STR_PAD_LEFT);

        try{
            $this->db->select('brand.brand_name,brand.brand_id,product_category.category_id,product_category.parent_category_id,product_category.category_name,product_category.Applicable_Tax as cat_Applicable_Tax,product_category.Applicable_CRV as cat_Applicable_CRV,product_category.is_EBT as is_EBT,product_category.measurement_type,product_information.*,
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
        //check data is avilable or not in product master
    public function getProductMasterData($barcode){
        try{
            $this->db->select('brand.brand_name,brand.brand_id,product_category.category_id,product_category.category_name,product_master.*');
            $this->db->from('product_master');
            $this->db->join('brand','brand.brand_id=product_master.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_master.category_id','LEFT');
            $this->db->where('product_master.case_UPC',$barcode);
            $this->db->where('product_master.is_deleted',0);
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

    public function get_all_products() {
        try{
            $this->db->select('product_category.category_id,product_category.category_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.is_deleted', 0);
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

    public function inventoryReportData($params=array()) {

        $start_date_filter = !empty($params["start_date_filter"]) ? $params["start_date_filter"] : "";
        $end_date_filter   = !empty($params["end_date_filter"]) ? $params["end_date_filter"] : "";

        try{
            $this->db->select('product_category.category_id,product_category.category_name,product_information.*,(select sum(od.quantity) from order_details as od where od.product_id = product_information.product_id) as sold_qty');
            $this->db->from('product_information');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.is_deleted', 0);
            $this->db->order_by('id', 'DESC');

            if($start_date_filter != "" && $end_date_filter != "") {

                $this->db->where('product_information.product_id IN (SELECT `product_id` FROM `order_details` left join `order` on `order`.`order_id` = `order_details`.`order_id` where DATE(`order`.`order_date`) BETWEEN "'.$start_date_filter.'" AND "'.$end_date_filter.'")', NULL, FALSE);
            }

            // $this->db->limit(100);
            $query =$this->db->get();
            // print $this->db->last_query();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function dailyCategoryBreakDownData($sales_report_category="",$start_date="",$end_date="") {
        try{
            $this->db->select('sum(od.quantity) as tot_qty, pi.product_name,pc.category_id,pc.category_name');
            $this->db->from('order_details as od');
            $this->db->join('product_information as pi','pi.product_id = od.product_id','LEFT');
            $this->db->join('product_category as pc','pc.category_id = pi.category_id','LEFT');

            if($sales_report_category != "")
                $this->db->where('pc.category_id', $sales_report_category);
            else
                $this->db->where('pc.category_id', 'SRPYBDLCJ53HW8C');

            if($start_date != "" && $end_date != "") {
                $this->db->where("DATE(od.created_at) BETWEEN '".$start_date."' AND '".$end_date."'");
            } else {
                $this->db->where('DATE(od.created_at)', date("Y-m-d"));
            }

            $this->db->group_by('pi.product_id');
            $this->db->limit('5');
            $query =$this->db->get();
            //print $this->db->last_query();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function dailyCategoryWiseBreakDownData($cat_id=array(),$start_date="",$end_date="",$type="chart") {
        try{
            if($type=="chart") {
                $this->db->select('sum(od.quantity) as tot_qty, pi.product_name,pc.category_id,pc.category_name,sum(od.total_price) as sales');
            } else {
                $this->db->select('od.quantity, pi.product_name,pc.category_id,pc.category_name,od.total_price as sales,od.created_at');
            }

            $this->db->from('order_details as od');
            $this->db->join('product_information as pi','pi.product_id = od.product_id','LEFT');
            $this->db->join('product_category as pc','pc.category_id = pi.category_id','LEFT');

            if(!empty($cat_id)) {

                if(count($cat_id) == 1 && $cat_id[0] == "") {
                } else {
                    $st=" pi.category_id in ('".implode("','",$cat_id)."')";
                    $this->db->where($st, NULL, FALSE);
                }
            }

            if($start_date != "" && $end_date != "") {
                $this->db->where("DATE(od.created_at) BETWEEN '".$start_date."' AND '".$end_date."'");
            } else {
                $this->db->where('DATE(od.created_at)', date("Y-m-d"));
            }

            if($type == "chart") {
                $this->db->group_by('pi.category_id');
                $this->db->limit('5');
            }

            $query =$this->db->get();
            // print $this->db->last_query();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function isProductExist($barcode){
        try{
            $this->db->select('case_UPC');
            $this->db->from('product_information');
            $this->db->where('case_UPC',$barcode);
            $result= $this->db->get()->result();
            if(!empty($result)){
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

    public function get_category_id($category_name){
        try{
            $this->db->select('category_id');
            $this->db->from('product_category');
            $this->db->where('category_name',$category_name);
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

    public function find_brand($brand){

        $this->db->select('brand_id');
        $this->db->from('brand');
        $this->db->where('brand_name',$brand);
        $query=$this->db->get();
        $story_array = array();
        if($this->db->affected_rows() > 0){
            $story_array = $query->row();
            return $story_array->brand_id;
        }else{
            return 0;
        }

    }

    public function get_product_by_id($product_id){
        try{
            // $this->db->select('product_category.category_id,product_category.category_name,brand.brand_id,brand.brand_name,product_information.*');
            $this->db->select('supplier_information.supplier_name as sname,product_category.category_id,product_category.category_name,brand.brand_id,brand.brand_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('brand','brand.brand_id = product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->join('supplier_information','supplier_information.supplier_id=product_information.supplier_id','LEFT'); //added above supplier join
            $this->db->where('product_information.product_id',$product_id);

            $query = $this->db->get();

            if($this->db->affected_rows() > 0) {
                $productarray = array(
                    'product_id' => $query->row()->product_id,
                    'product_name' => $query->row()->product_name,
                    'parent_product' => $query->row()->parent_product,
                    'brand_name' => $query->row()->brand_name,
                    'supp_id' => $query->row()->supplier_id,
                    'supp_name' => $query->row()->sname,
                    'supplier' => $query->row()->supplier,
                    'brand_id' => $query->row()->brand_id,
                    'category_id' => $query->row()->category_id,
                    'category_name' => $query->row()->category_name,
                    'case_upc' => $query->row()->case_UPC,
                    'short_name' => $query->row()->short_name,
                    'Meta_Title' => $query->row()->Meta_Title,
                    'Meta_Key' => $query->row()->Meta_Key,
                    'Meta_Desc' => $query->row()->Meta_Desc,
                    'supplier_price' => $query->row()->supplier_price,
                    'unit' => $query->row()->unit,
                    'quantity' => $query->row()->quantity,
                    'product_details' => $query->row()->product_details,
                    'store_sell_price' => $query->row()->onsale_price,
                    'ecomm_sell_price'=> $query->row()->ecomm_sale_price,
                    'size' =>  $query->row()->size,
                    'proof' =>  $query->row()->proof,
                    'abv' =>  $query->row()->abv,
                    'region' => $query->row()->region,
                    'producer' => $query->row()->producer,
                    'product_image'=> $query->row()->image_thumb,
                    'store_promotion' => $query->row()->store_promotion_price,
                    'ecomm_promotion'=> $query->row()->ecomm_promotion_price,
                    'Applicable_CRV' => $query->row()->Applicable_CRV,
                    'Applicable_Tax'=> $query->row()->Applicable_Tax,
                    'is_ecommerce'=> $query->row()->is_ecommerce,
                    'bin'=> $query->row()->bin,
                    'scratcher_no_from'=> $query->row()->scratcher_no_from,
                    'scratcher_no_to'=> $query->row()->scratcher_no_to,
                    'barcode_formats'=> $query->row()->barcode_formats,
                    'barcode_type'=> $query->row()->barcode_type,
                    'shopify_product_id'=> $query->row()->shopify_product_id,
                    'reorder_level'=> $query->row()->reorder_level,
                    'scratcher_status' => $query->row()->scratcher_status,
                    'scracher_current_no' => $query->row()->scracher_current_no,
                    'is_archive_scratcher' => $query->row()->is_archive_scratcher,

                );
                return $productarray;
            }else {
                return FALSE;
            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function find_category($cat_name){

        $this->db->select('category_id,Applicable_CRV,Applicable_Tax');
        $this->db->from('product_category');
        $this->db->where('category_name',trim($cat_name));
        $query=$this->db->get();
        $story_array = array();
        if($this->db->affected_rows() > 0){
            $story_array = $query->row();
            $arrayName = array(
                'category_id' =>$story_array->category_id ,
                'Applicable_Tax' =>$story_array->Applicable_Tax ,
                'Applicable_CRV' =>$story_array->Applicable_CRV ,
             );
            return $arrayName;
        }else{
            return 0;
        }
    }

    public function update_product_from_shopify($product_id , $data= array()){
        if(!empty($data)){
            $this->db->where('product_id',$product_id);
            $this->db->update('product_information', $data);
        }
    }

    public function update_product(){
        try{
            $product_id = $this->input->post('product_id');
            $sup_price = $this->input->post('supplier_price');
            if($sup_price == '0.00'){
                $supplier_price = '';
            }else{
                $supplier_price = $this->input->post('supplier_price');
            }

            $supplier = $this->input->post('supplier');
            if(!empty($supplier)){
                $sup = $this->isExistSupplier($supplier);
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
                    $supp = $this->isExistSupplier($supplier);
                    $ssupplier = $supp->supplier_name;
                    $supplierID = $supp->supplier_id;
                }
            }

            $brand = (!empty($this->input->post('brand')) ? $this->input->post('brand'):'0');

            if(!$this->isExistBrand($brand)){
                $dat = array(
                    'brand_id' => $this->auth->generator(15),  //chnage
                    'brand_name' => $brand,
                    'description' => $brand,
                    'status' => 1,
                );
                $this->db->insert('brand', $dat);
                $brandId = $dat['brand_id'];
            }else{
                $brands = $this->isExistBrand($brand);
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


            if($this->get_size($sizes)){
                $getsize = $this->get_size($sizes);
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

            $category_id = $this->input->post('category_id');
            if(!empty($category_id)) {
                $is_size['is_last_size'] = $name;
                $this->db->where('category_id', $category_id);
                $this->db->update('product_category', $is_size);
            }

            // $product_combo = $this->input->post('product_combo');
            // $combo_unit = $this->input->post('combo_unit');
            // $combo_price = $this->input->post('combo_price');

            // if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
                $this->db->where('product_id', $product_id);
                $delete = $this->db->delete('product_combos');
            // }

            // if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
            //     $combodata = [];
            //     for($t = 0; $t< count($product_combo); $t++){
            //          $combodata['product_id'] = $product_id;
            //          $combodata['product_combo'] = $product_combo[$t];
            //          $combodata['combo_unit'] = $combo_unit[$t];
            //          $combodata['combo_price'] = $combo_price[$t];
            //       // echo '<pre>'; print_r($combodata);exit;
            //         $this->db->insert('product_combos', $combodata);
            //     }
            // }

            $hidden = $this->input->post('combo_row');
            foreach ($hidden as $value) {
                $combodata = [];
                $combodata['product_id'] = $product_id;
                $combodata['product_combo'] =   $this->input->post('product_combo_'.$value);
                $combodata['combo_unit'] =  $this->input->post('combo_unit_'.$value);
                $combodata['combo_price'] = $this->input->post('combo_price_'.$value);

                if(!empty($combodata['product_combo'] && $combodata['combo_unit'] && $combodata['combo_price'])){
                  $this->db->insert('product_combos', $combodata);
                }elseif(empty($combodata['product_combo'])){
                  $this->db->where('product_id',$product_id);
                  $this->db->delete('product_combos');
                }
            }

            // elseif(empty($product_combo[0]))
            // {
            //      $this->db->where('product_id',$product_id);
            //     $this->db->delete('product_combos');
            //     //echo $this->db->last_query();
            // }

            $old_qty = $this->input->post('old_quantity');
            $new_qty = $this->input->post('quantity');
            if( $old_qty != $new_qty ){
                $product_shopify_id = $this->get_productinfo_by_id($product_id);
                if($product_shopify_id != null){
                    $api_data =array(
                        'shopify_product_id' => $product_shopify_id ,
                        'quantity' => $new_qty,
                    );
                    $this->eplugin->update_inventory($api_data);
                }
            }


            $data = array(
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
                'reorder_level'         => $this->input->post('reorder_level'),
                'created_at'            => date('Y-m-d H:i:s'),
                'updated_at'            => date('Y-m-d H:i:s'),
                'updated_empid'         => $this->session->userdata('username'),
            );

            $this->db->where('product_id', $product_id);
            if($this->db->update('product_information', $data)){

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Update Product';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log

                $user_id        =  $this->session->userdata('username');
                $notification   =  'Update Product '.$data['product_name'].' ('.$this->input->post('case_upc').')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update product';
                $module         = 'inventory';

                // $check = $this->check_notification($module,$perm='B');
                // if(strpos($check[0]['inventory_notification'], 'B') !== false){
                //     $check_status = 1;
                // }

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

                $response['id'] = $product_id;
                $response['status'] = 'success';
                $response['message'] = 'Product is updated successfully';
                $response['data'] = $data;
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

    public function delete_product($id){
        $this->db->set('is_deleted', 1);
        $this->db->where('product_id', $id);

        $qry = $this->db->update('product_information');

        // ST - for query log
        $last_query = $this->db->last_query();
        $user_id = $this->session->userdata['username'];
        $module = 'Inventory';
        $operation = 'Delete Product';
        $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
        // EN - for query log
        $user_id        =  $this->session->userdata('username');
        $notification   =  'Delete Product';
        $action_id      =  $this->session->userdata('username');
        $action         = 'delete product';
        $module         = 'inventory';

        $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
        return $qry;
    }


    public function get_all_units() {
        try{
            $this->db->order_by('value','asc');
            $query =$this->db->get('tbl_unit');

            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
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
            if($data['user_action']==2){
                $time_result  =$this->db->from('user_timesheet')->where(['username' => $data['username'], 'user_action' => 1,'date' => $data['date']])->order_by('id','Desc')->get()->result();
                if(isset($time_result) && !empty($time_result)){
                    $diff=round((strtotime(date('Y-m-d H:i:s')) - strtotime($time_result[0]->datetime))/3600, 1);

                    $user_report  =$this->db->from('timesheet_report')->where(['username' => $data['username'], 'start_date' => $data['date']])->order_by('id','Desc')->get()->result();

                    if(isset($user_report) && !empty($user_report)){
                        $user_report=$user_report[0];
                        $user_hours=$user_report->daily_hours+$diff;
                        $this->db->where(['id' => $user_report->id]);
                        $this->db->update('timesheet_report',['custom_hours' => "$user_hours",'daily_hours' => "$user_hours"]);
                    } else{
                         $user_hours=$diff;
                        $this->db->insert('timesheet_report',['daily_hours' => $user_hours,'custom_hours' => $user_hours,'username' => $data['username'],'start_date' => $data['date'], 'created_at' => date('Y-m-d H:i:s')]);
                    }
                }
            }
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

    public function get_timesheet_by_id($username){
        try{
            $this->db->select('user_action');  //chnages
            $this->db->from('user_timesheet');
            $this->db->where('username',$username);
             //$this->db->order_by('user_action','DESC');
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
    public function current_week_dates(){
        $monday = strtotime("last monday");
        $monday =$current= date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
        while ($current <= $sunday) {
            $dates[] = date('Y-m-d', $current);
            $current = strtotime('+1 days', $current);

        }
        return $dates;
    }
    public function current_report_week_dates($btn_type='', $monday=''){ // 0 - Current Week / 1 - Previous Week / 2 - 1 day

        $dates = array();
        if($btn_type == '') {
            // ST - Current Week
            $monday = strtotime("last monday");
            $monday =$current= date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
            while ($current <= $sunday) {
                $dates[] = date('Y-m-d', $current);
                $current = strtotime('+1 days', $current);
            }
            // EN - Current Week
        }

        if($btn_type == 'previous_week') {
            // ST - Previous Week
            // $monday = strtotime("last monday");
            $prev_monday =  strtotime(date("Y-m-d",strtotime($monday))." -7 days");
            for($i=0;$i<7;$i++) {
                $new_date = strtotime(date("Y-m-d",$prev_monday)." +".$i." days");

                $dates[] = date('Y-m-d', $new_date);
            }
            // EN - Previous Week
        }

        if($btn_type == 'next_week') {
            // ST - Next Week
            // $monday = strtotime("last monday");
            $prev_monday =  strtotime(date("Y-m-d",strtotime($monday))." +7 days");

            for($i=6;$i>=0;$i--) {
                $new_date = strtotime(date("Y-m-d",$prev_monday)." -".$i." days");
                $dates[] = date('Y-m-d', $new_date);
            }
            // EN - Next Week
        }

        if($btn_type == 'previous_day') {
            // ST - Previous 1 day
            $prev_monday =  strtotime(date("Y-m-d",strtotime($monday))." -1 days");

            for($i=0;$i<7;$i++) {
                $new_date = strtotime(date("Y-m-d",$prev_monday)." +".$i." days");
                $dates[] = date('Y-m-d', $new_date);
            }
            // EN - Previous 1 day
        }

        if($btn_type == 'next_day') {
            // ST - Next 1 day
            $prev_monday =  strtotime(date("Y-m-d",strtotime($monday))." +1 days");

            for($i=6;$i>=0;$i--) {
                $new_date = strtotime(date("Y-m-d",$prev_monday)." -".$i." days");
                $dates[] = date('Y-m-d', $new_date);
            }
            // EN - Next 1 day
        }
        return $dates;
    }
    public function get_dates() {

        $this->db->select('date');
        $this->db->from('user_timesheet');
        $this->db->group_by('date');
        $query = $this->db->get();
        $arrayName = array();
        if($this->db->affected_rows() > 0) {
            $arrayName = $query->result_array();
        }
        return $arrayName;
    }
    public function getdata_by_id($datess){
        try{
            $this->db->order_by('id');
            $this->db->select('users.first_name,users.last_name,user_timesheet.id,user_timesheet.timecard_ID,user_timesheet.username,user_timesheet.datetime,user_timesheet.user_action,user_timesheet.date');
            $this->db->from('user_timesheet');
            $this->db->join('users','users.user_id = user_timesheet.username','LEFT');
            $this->db->where('user_timesheet.username', $this->session->userdata['username']);
            $this->db->where('user_timesheet.date', $datess);
            $query = $this->db->get();
            $arrayName = array();
            if($this->db->affected_rows() > 0) {
                $arrayName = $query->result_array();
            }
            return $arrayName;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
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
        $this->db->select('name');
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

    public function fetch_all_size(){

        $this->db->select('measurement_type,age_restrict,Applicable_CRV,Applicable_Tax,measurement_value,is_last_size');
        $this->db->from('product_category');

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
        $this->db->select('name');
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
    /*******LOYALTY SECTION************/
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

    public function fetch_customer_by_search($customer){
        $this->db->select('customer_id,first_name,last_name,customer_email,customer_mobile,customer_address_1,customer_address_2,city,zip');
        $this->db->from('customer_information');
        $this->db->where('is_active', '1');
        $this->db->group_start();
        $this->db->like('first_name',$customer);
        $this->db->or_like('last_name',$customer);
        $this->db->or_like('customer_email',$customer);
        $this->db->or_like('customer_mobile',$customer);
        $this->db->group_end();
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
    }

    public function add_coupon(){
        try{
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

            if($this->db->insert('coupon_new', $data)){
                $user_id        =  $this->session->userdata('username');
                $notification   =  'Create Coupon '.$data['coupon_name'];
                $action_id      =  $this->session->userdata('username');
                $action         = 'add coupon';
                $module         = 'customer loyalty';

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

     public function get_all_coupon() {
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted', 0);
            $this->db->where('manage_type', 0);
            //$this->db->where('end_date >=', date('Y-m-d'));
            $this->db->order_by('end_date', 'DESC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
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

              $user_id        =  $this->session->userdata('username');
              $notification   =  'Edit Coupon '.$data['coupon_name'];
              $action_id      =  $this->session->userdata('username');
              $action         = 'update coupon';
              $module         = 'customer loyalty';

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


    public function delete_coupon($id){
        try{
            $this->db->set('is_deleted', 1);
            $this->db->where('coupon_id', $id);
              if($this->db->update('coupon_new')){
                  $user_id        =  $this->session->userdata('username');
                  $notification   =  'Delete Coupon';
                  $action_id      =  $this->session->userdata('username');
                  $action         = 'delete coupon';
                  $module         = 'customer loyalty';

                  $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                  return TRUE;
              }
          }catch(Exception $ex) {
                error_log($ex->getTraceAsString());
                echo $ex->getTraceAsString();
                return FALSE;
          }
    }

    public function delete_coupon_permanently($id){
      try{
          $this->db->where('coupon_id', $id);
            if($this->db->delete('coupon_new')){
                $user_id        =  $this->session->userdata('username');
                $notification   =  'Delete Coupon';
                $action_id      =  $this->session->userdata('username');
                $action         = 'delete';
                $module         = 'customer loyalty';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                return TRUE;
            }
        }catch(Exception $ex) {
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
        }
    }

    public function delete_promotion_permanently($id){
        try{
            $this->db->where('coupon_id', $id);
              if($this->db->delete('coupon_new')){
                  $user_id        =  $this->session->userdata('username');
                  $notification   =  'Delete Promotion';
                  $action_id      =  $this->session->userdata('username');
                  $action         = 'delete';
                  $module         = 'customer loyalty';

                  $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                  return TRUE;
              }
          }catch(Exception $ex) {
                error_log($ex->getTraceAsString());
                echo $ex->getTraceAsString();
                return FALSE;
          }
    }

    public function delete_promotion($id){
        try{
            $this->db->set('is_deleted', 1);
            $this->db->where('coupon_id', $id);
              if($this->db->update('coupon_new')){
                  $user_id        =  $this->session->userdata('username');
                  $notification   =  'Delete Promotion';
                  $action_id      =  $this->session->userdata('username');
                  $action         = 'delete';
                  $module         = 'customer loyalty';

                  $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                  return TRUE;
              }
          }catch(Exception $ex) {
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

    public function get_productinfo_by_id($product_id){
        try{
            $this->db->select('shopify_product_id');
            $this->db->from('product_information');
            $this->db->where('product_id',$product_id);
            $query = $this->db->get();
            // echo $this->db->last_query();
            // exit;
            $array = array();
            if($this->db->affected_rows() > 0) {
                $array = $query->row();
                // $array->shopify_product_id;
                // exit;
            }
            return $array->shopify_product_id;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function add_promotion(){
        try{
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
                'coupon_details'           => (!empty($this->input->post('promotion_details')) ? $this->input->post('promotion_details') : ''),
                'combo_amount'             => $this->input->post('combo_amount'),
                'receipt_promotion'        => (!empty($this->input->post('receipt_promotion')) ? $this->input->post('receipt_promotion') : ''),
                'is_footer'                => $this->input->post('is_receipt_promotion'),
                'manage_type'              => 1,
                'status'                   => 1,
            );
            $data = $this->security->xss_clean($data);

            if($this->db->insert('coupon_new', $data)){
                $user_id        =  $this->session->userdata('username');
                $notification   =  'Create Promotion '.$data['coupon_name'];
                $action_id      =  $this->session->userdata('username');
                $action         = 'add promotion';
                $module         = 'customer loyalty';

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

    public function get_all_promotion() {
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted', 0);
            $this->db->where('manage_type', 1);
//            $this->db->where('end_date >=', date('Y-m-d'));
            $this->db->order_by('end_date', 'DESC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_promotion($coupon_id,$data){
        try{
            $this->db->where('coupon_id', $coupon_id);
            if($this->db->update('coupon_new',$data)){
                $user_id        =  $this->session->userdata('username');
                $notification   =  'Edit Promotion '.$data['coupon_name'];
                $action_id      =  $this->session->userdata('username');
                $action         = 'update promotion';
                $module         = 'customer loyalty';

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

    public function order_details($order_id=0) {
        $this->db->select('*,customer_information.customer_name');
        $this->db->from('order');
        $this->db->join('customer_information','customer_information.customer_id=order.customer_id','LEFT');
        $this->db->where('order_id', $order_id);
        $query = $this->db->get();
        if($query->num_rows()>0) {
            $result = $query->result();
        }
        return $result[0];
    }

    public function getRefundReceiptData($order_id=0) {

        $master_arr = array();
        if(strlen($order_id) > 0) {

            $this->db->select('*,customer_information.customer_name');
            $this->db->from('refund_order');
            $this->db->join('customer_information','customer_information.customer_id=refund_order.customer_id','LEFT');
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


                $this->db->select('refund_order_details.*,product_information.onsale_price,product_information.store_promotion_price');
                $this->db->from('refund_order_details');
                $this->db->join('product_information','product_information.product_id=refund_order_details.product_id','LEFT');
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
                $due_amount     = $result[0]->due_amount;
                $discount_discount     = $result[0]->discount_discount;


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
                $master_arr["due_amount"]    = $due_amount;
                $master_arr["discount_discount"]    = $discount_discount;
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
            $this->db->where('is_active', 1);


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

    public function get_all_supplier() {
        try{
            $this->db->select('supplier_name,supplier_id');
            $this->db->from('supplier_information');
            $this->db->where('is_deleted', 0);
            $this->db->order_by('supplier_name', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_advance_cash(){
        try{
            $data = array(
                'employee_id'          => $this->session->userdata('username'),
                'employee_name'        => $this->session->userdata('name'),
                'advance_amount'       => $this->input->post('advance_amount'),
                'reason'               => $this->input->post('reason'),
                'paycheck'             => $this->input->post('paycheck'),
                'status'               => 'Pending',
                'created_at'           => date('Y-m-d H:i:s'),
            );

            $data = $this->security->xss_clean($data);

            if($this->db->insert('tbl_advance', $data)){
                $user_id        = $this->session->userdata('username');
                $notification   = 'Request for cash advance';
                $action_id      = $this->session->userdata('username');
                $action         = 'pending';
                $module         = 'hrms';

                // $check = $this->check_notification($module,$perm='B');
                // if(strpos($check[0]['hrms_notification'], 'B') !== false){
                //     $check_status = 1;
                // }

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

    public function get_cash_advance_data() {
        try{
            $this->db->select('tbl_paychecks.paycheck,tbl_paychecks.value,users.first_name,users.last_name,tbl_advance.id,tbl_advance.employee_id,tbl_advance.employee_name,tbl_advance.advance_amount,tbl_advance.status,tbl_advance.reason,tbl_advance.denied_reason,tbl_advance.notes,tbl_advance.created_at');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->join('tbl_paychecks', 'tbl_paychecks.value = tbl_advance.paycheck','LEFT');
            $this->db->where_not_in('tbl_advance.status', 'Cancelled');
            $this->db->order_by("tbl_advance.status_no", "ASC");
            $this->db->order_by('tbl_advance.created_at', 'DESC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function change_advcash_status(){
        try{
           $cash_id = $this->input->post('cash_id');
           $employee_id = $this->input->post('employee_id');
           $data = array(
                'status' => $this->input->post('status'),
                'status_no' => $this->input->post('status_no'),
           );
           $this->db->where('id', $cash_id);
           if($this->db->update('tbl_advance',$data)){
               $user_id        = $this->session->userdata('username');
               $notification   = 'Cash Advance Request has been approved';
               $action_id      = $employee_id;
               $action         = 'approved';
               $module         = 'hrms';
               $fromhtml       = 1;

               // $check = $this->check_notification($module,$perm='D');
               // if(strpos($check[0]['hrms_notification'], 'D') !== false){
               //     $check_status = 1;
               // }
               $this->insert_user_notification($user_id,$notification,$action_id,$action,$module,$fromhtml);

               return $cash_id;
           }else{
               return FALSE;
           }
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }

    public function denied_advcash(){
        try{
           $cash_id = $this->input->post('cash_id');
           $employee_id = $this->input->post('employee_id');
           $data = array(
                'status' => $this->input->post('status'),
                'denied_reason' => $this->input->post('denied_reason'),
                'status_no' => $this->input->post('status_no'),
           );
           $this->db->where('id', $cash_id);
           if($this->db->update('tbl_advance',$data)){
               $user_id        = $this->session->userdata('username');
               $notification   = 'Cash Advance Request has been denied';
               $action_id      = $employee_id;
               $action         = 'denied';
               $module         = 'hrms';
               $fromhtml       = 1;
               $this->insert_user_notification($user_id,$notification,$action_id,$action,$module,$fromhtml);

               return $cash_id;
           }else{
               return FALSE;
           }
       }catch(Exception $ex) {
           error_log($ex->getTraceAsString());
           echo $ex->getTraceAsString();
           return FALSE;
       }
    }


    public function get_leave_type() {
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

    public function retrieve_setting_customkey()
    {

        $this->db->select('*');
        $this->db->from('custom_key_settings');
        //$this->db->where('setting_id',1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
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

    public function fetch_supplier($category_id){
        try{
            $this->db->select('*');
            $this->db->from('supplier_information');
            $this->db->like('supplier_category', $category_id,BOTH);
            $this->db->order_by('supplier_category', 'DESC');
            $query = $this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->result_array();
                return $story_array;
            }else{
                $this->db->select('*');
                $this->db->from('supplier_information');
                $this->db->order_by('supplier_category', 'DESC');
                $query = $this->db->get();
                $story_array = array();
                if($this->db->affected_rows() > 0){
                    $story_array = $query->result_array();
                    return $story_array;
                }
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function insert_leave($data){
        try{
            if($this->db->insert('tbl_emp_leave', $data)){

              $user_id        =  $data['employee_id'];
              $notification   =  'Requested for leave';
              $action_id      =  $data['employee_id'];
              $action         = 'pending';
              $module         = 'hrms';

              // $check = $this->check_notification($module,$perm='A');
              // if(strpos($check[0]['hrms_notification'], 'A') !== false){
              //     $check_status = 1;
              // }
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

    public function get_MaxLeave(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_leave_type');
            $this->db->where('id', $_POST['leave_type']);
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
                    'leave_type' => $leave_type,
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

    public function remainingHour() {
        $this->db->select('*');
        $this->db->from('tbl_timesheet');
        $query = $this->db->get();
        $story_array = array();
        if($this->db->affected_rows() > 0){
            $story_array = $query->row();
            return $story_array;
        }
    }

    public function insert_emp_shift(){
        // $data = array(
        //     'start_time' => date('h:i A', strtotime(date('Y-m-d h:i:s'))),
        //     'id' => $this->session->userdata('shiftdata')['user_id'],
        //     'shift_name' => $this->input->post('shift_type'),
        //     'created_date' => $this->input->post('shift_date'),
        //     'end_time' => '',
        // );

        $data = array(
            'employee_id' => $this->session->userdata('shiftdata')['user_id'],
            'shift' => $this->input->post('shift_type'),
            'shift_date' => $this->input->post('shift_date'),
        );

        $this->db->insert('tbl_emp_shift', $data);
        // $this->db->insert('tbl_shift_type', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function insert_supplier(){
        try{
            $data = array(
                'supplier_id'   => $this->auth->generator(20),
                'supplier_name' => $this->input->post('supplier_name'),
                'mobile'        => $this->input->post('mobile'),
                'email'         => $this->input->post('email'),
                'address'       => $this->input->post('address'),
                'details'       => $this->input->post('details'),
                'contact_name'  => $this->input->post('contact_name'),
                'contact_email' => $this->input->post('contact_email'),
                'contact_no'    => $this->input->post('contact_no'),
                'supervisor_name'  => $this->input->post('supervisor_name'),
                'supervisor_email' => $this->input->post('supervisor_email'),
                'supervisor_contact_no' => $this->input->post('supervisor_contact_no'),
                'status'        => 1,
                'supplier_category' => implode(',',$this->input->post('supplier_cat')),
            );
            $data = $this->security->xss_clean($data);
            $this->db->insert('supplier_information', $data);

            // ST - for query log
            $last_query = $this->db->last_query();
            $user_id = $this->session->userdata['username'];
            $module = 'Inventory';
            $operation = 'Insert Supplier Information';
            $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
            // EN - for query log

            $user_id        =  $this->session->userdata('username');
            $notification   =  'Add Supplier '.$data['supplier_name'];
            $action_id      =  $this->session->userdata('username');
            $action         = 'add supplier';
            $module         = 'inventory';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

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

    public function fetch_product_name($searchtxt,$size_i){
        // $this->db->select('product_id,product_name');
        $this->db->select('product_id,product_name,image_thumb,case_UPC');
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
                // $response[] = array("value"=>$value['product_id'],"label"=>$value['product_name']);
                $response[] = array("value"=>$value['product_id'],"label"=>$value['product_name'],'image_thumb' =>$value['image_thumb'],'case_UPC' =>$value['case_UPC']);
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

    /* Date on 27-01-2021 @rajeswari  */
    public function get_all_suppliers() {
        try{
            // $this->db->where('status', 1);
            $this->db->where('is_deleted', 0);
            $query =$this->db->get('supplier_information');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //prashant
    public function delete_supplier($id){
        $this->db->set('is_deleted', 1);
        $this->db->where('supplier_id', $id);
        $qry = $this->db->update('supplier_information');

        // ST - for query log
        $last_query = $this->db->last_query();
        $user_id = $this->session->userdata['username'];
        $module = 'Inventory';
        $operation = 'Delete Supplier';
        $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
        // EN - for query log

        $user_id        =  $this->session->userdata('username');
        $notification   =  'Delete Supplier';
        $action_id      =  $this->session->userdata('username');
        $action         = 'delete supplier';
        $module         = 'inventory';

        $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

        return $qry;
    }

    public function get_supplier_by_id($supplier_id){
        try{
            $this->db->select('*');
            $this->db->from('supplier_information');
            $this->db->where('supplier_information.supplier_id',$supplier_id);

            $query = $this->db->get();

            if($this->db->affected_rows() > 0) {
                $supplierarray = array(
                    'supplier_id' => $query->row()->supplier_id,
                    'supplier_name' => $query->row()->supplier_name,
                    'mobile' => $query->row()->mobile,
                    'email' => $query->row()->email,
                    'address' => $query->row()->address,
                    'details' => $query->row()->details,
                    'website' => $query->row()->website,
                    'contact_name' => $query->row()->contact_name,
                    'contact_email' => $query->row()->contact_email,
                    'contact_no' => $query->row()->contact_no,
                    'supplier_category' => $query->row()->supplier_category,
                    'supervisor_name' => $query->row()->supervisor_name,
                    'supervisor_email' => $query->row()->supervisor_email,
                    'supervisor_contact_no' => $query->row()->supervisor_contact_no,

                );
                return $supplierarray;
            }else {
                return FALSE;
            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
   public function update_supplier(){
        try{
            $supplier_id = $this->input->post('supplier_id');

            $data = array(
                'supplier_name' => $this->input->post('supplier_name'),
                'mobile'        => $this->input->post('mobile'),
                'email'         => $this->input->post('email'),
                'address'       => $this->input->post('address'),
                'details'       => $this->input->post('details'),
                'contact_name'  => $this->input->post('contact_name'),
                'contact_email' => $this->input->post('contact_email'),
                'contact_no'    => $this->input->post('contact_no'),
                'supplier_category' => implode(',',$this->input->post('supplier_cat')),
                'supervisor_name'  => $this->input->post('supervisor_name'),
                'supervisor_email' => $this->input->post('supervisor_email'),
                'supervisor_contact_no' => $this->input->post('supervisor_contact_no'),
            );
            $data = $this->security->xss_clean($data);
            $this->db->where('supplier_id',$supplier_id);
            $this->db->update('supplier_information',$data);

            // ST - for query log
            $last_query = $this->db->last_query();
            $user_id = $this->session->userdata['username'];
            $module = 'Inventory';
            $operation = 'Update Supplier Information';
            $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
            // EN - for query log

            $data1 = array(
                'supplier' => $this->input->post('supplier_name'),
            );

            $this->db->where('supplier_id', $supplier_id);
            $this->db->update('product_information',$data1);

            // ST - for query log
            $last_query = $this->db->last_query();
            $user_id = $this->session->userdata['username'];
            $module = 'Inventory';
            $operation = 'Update Product Information';
            $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
            // EN - for query log

            $user_id        =  $this->session->userdata('username');
            $notification   =  'Update Supplier '.$data['supplier_name'];
            $action_id      =  $this->session->userdata('username');
            $action         = 'update supplier';
            $module         = 'inventory';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

            $respnce['id'] = $supplier_id;
            $respnce['status'] = 'success';
            $respnce['message'] = 'Supplier is successfully updated';
            return $respnce;
        }catch(Exception $ex) {
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
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $data = $this->security->xss_clean($data);
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();

        $data1 = array(
            'user_id'           =>  $insert_id ,
            'username'          =>  $this->input->post('username'),
            'password'          =>  md5("gef".$this->input->post('password')),
            'user_type'         =>  $this->input->post('role'),//2
            'security_code'     =>      '',
            'status'            =>  1 //0
            );
        $data1 = $this->security->xss_clean($data1);
        $this->db->insert('user_login',$data1);



        $dat['user_id'] = $this->input->post('username');
        $this->db->insert('front_role_extra_permission', $dat);

        $user_id        =  $this->session->userdata('username');
        $notification   = 'Add Employee ('.$this->input->post('first_name').' '.$this->input->post('last_name').')';
        $action_id      =  $this->session->userdata('username');
        $action         = 'add employee';
        $module         = 'store setting';

        $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

        /******* w4form data start *********/
        $folderPath = "./uploads/emp_sign/";
        $image_parts = explode(";base64,", $_POST['employee_sign']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file, $image_base64);

        $data3 = array(
            'username' => $this->input->post('username'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'address' => $this->input->post('address'),
            'address_details' => $this->input->post('zip'),
            'social_security_no' => $this->input->post('security_no'),
            'filling_condition' => $this->input->post('filling_condition'),
            'other_income' => $this->input->post('other_income'),
            'deductions' => $this->input->post('deductions'),
            'extra_withholding' => $this->input->post('extra_withholding'),
            'employee_signature' => $file,
            'signature_date' => $this->input->post('signature_date'),
            'name_with_address' => $this->input->post('name_with_address'),
            'employment_date' => $this->input->post('employment_date'),
            'EIN' => $this->input->post('EIN'),
            'multiple_jobs_worksheet_1' => $this->input->post('multiple_jobs_worksheet_1'),
            'multiple_jobs_worksheet_2a' => $this->input->post('multiple_jobs_worksheet_2a'),
            'multiple_jobs_worksheet_2b' => $this->input->post('multiple_jobs_worksheet_2b'),
            'multiple_jobs_worksheet_2c' => $this->input->post('multiple_jobs_worksheet_2c'),
            'multiple_jobs_worksheet_3' => $this->input->post('multiple_jobs_worksheet_3'),
            'multiple_jobs_worksheet_4' => $this->input->post('multiple_jobs_worksheet_4'),
            'deductions_worksheet_1' => $this->input->post('deductions_worksheet_1'),
            'deductions_worksheet_2' => $this->input->post('deductions_worksheet_2'),
            'deductions_worksheet_3' => $this->input->post('deductions_worksheet_3'),
            'deductions_worksheet_4' => $this->input->post('deductions_worksheet_4'),
            'deductions_worksheet_5' => $this->input->post('deductions_worksheet_5'),
            'multiple_jobs_or_spouse_works' => $this->input->post('multiple_jobs_or_spouse_works'),
            'total_amount' => $this->input->post('total_amount'),
            'step3a' => $this->input->post('step3a'),
            'step3b' => $this->input->post('step3b'),
        );

        $data3 = $this->security->xss_clean($data3);

        /******* w4form data end *********/

        /******* i9form data start *********/

        $folderPath1 = "./uploads/emp_sign/";
        $image_parts1 = explode(";base64,", $_POST['employee_signature']);
        $image_type_aux1 = explode("image/", $image_parts1[0]);
        $image_type1 = $image_type_aux1[1];
        $image_base64_1 = base64_decode($image_parts1[1]);
        $file1 = $folderPath1 . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file1, $image_base64_1);

        $folderPath2 = "./uploads/emp_sign/";
        $image_parts2 = explode(";base64,", $_POST['translator_sign']);
        $image_type_aux2 = explode("image/", $image_parts2[0]);
        $image_type2 = $image_type_aux2[1];
        $image_base64_2 = base64_decode($image_parts2[1]);
        $file2 = $folderPath2 . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file2, $image_base64_2);

        $folderPath3 = "./uploads/emp_sign/";
        $image_parts3 = explode(";base64,", $_POST['authorized_sign']);
        $image_type_aux3 = explode("image/", $image_parts3[0]);
        $image_type3 = $image_type_aux3[1];
        $image_base64_3 = base64_decode($image_parts3[1]);
        $file3 = $folderPath3 . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
        file_put_contents($file3, $image_base64_3);

        $data4 = array(
            'username' => $this->input->post('username'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middle_initial' => $this->input->post('middle_initial'),
            'nickname' => $this->input->post('nickname'),
            'address' => $this->input->post('address'),
            'apartment_no' => $this->input->post('apartment_no'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zipcode' => $this->input->post('zipcode'),
            'employee_signature' => $file1,
            'dob' => $this->input->post('dob12'),
            'social_security_no' => $this->input->post('social_security_no'),
            'email' => $this->input->post('email'),
            'contact_no' => $this->input->post('contact_no'),
            'imprisonment' => $this->input->post('imprisonment'),
            'USCIS_no' => $this->input->post('USCIS_no'),
            'expiration_date' => $this->input->post('expiration_date'),
            'i_94_admission_no' => $this->input->post('i_94_admission_no'),
            'foreign_passport_no' => $this->input->post('foreign_passport_no'),
            'country_of_issuance' => $this->input->post('country_of_issuance'),
            'signature_date' => $this->input->post('signature_date'),
            'translator_check' => $this->input->post('translator_check'),
            'translator_sign' => $file2,
            'translator_sign_date' => $this->input->post('translator_sign_date'),
            'translator_firstname' => $this->input->post('translator_firstname'),
            'translator_lastname' => $this->input->post('translator_lastname'),
            'translator_address' => $this->input->post('translator_address'),
            'translator_city' => $this->input->post('translator_city'),
            'translator_state' => $this->input->post('translator_state'),
            'translator_zipcode' => $this->input->post('translator_zipcode'),
            'citizenship_immigration' => $this->input->post('citizenship_immigration'),
            'doc_title_1' => $this->input->post('doc_title_1'),
            'doc_title_2' => $this->input->post('doc_title_2'),
            'doc_title_3' => $this->input->post('doc_title_3'),
            'doc_title_4' => $this->input->post('doc_title_4'),
            'doc_title_5' => $this->input->post('doc_title_5'),
            'issuing_authority_1' => $this->input->post('issuing_authority_1'),
            'issuing_authority_2' => $this->input->post('issuing_authority_2'),
            'issuing_authority_3' => $this->input->post('issuing_authority_3'),
            'issuing_authority_4' => $this->input->post('issuing_authority_4'),
            'issuing_authority_5' => $this->input->post('issuing_authority_5'),
            'doc_number_1' => $this->input->post('doc_number_1'),
            'doc_number_2' => $this->input->post('doc_number_2'),
            'doc_number_3' => $this->input->post('doc_number_3'),
            'doc_number_4' => $this->input->post('doc_number_4'),
            'doc_number_5' => $this->input->post('doc_number_5'),
            'doc_expiry_1' => $this->input->post('doc_expiry_1'),
            'doc_expiry_2' => $this->input->post('doc_expiry_2'),
            'doc_expiry_3' => $this->input->post('doc_expiry_3'),
            'doc_expiry_4' => $this->input->post('doc_expiry_4'),
            'doc_expiry_5' => $this->input->post('doc_expiry_5'),
            're_hire_date' => $this->input->post('re_hire_date'),
            'doc_title_6' => $this->input->post('doc_title_6'),
            'doc_no_6' => $this->input->post('doc_no_6'),
            'doc_expiry_6' => $this->input->post('doc_expiry_6'),
            'authorized_sign' => $file3,
            'authorized_sign_date' => $this->input->post('authorized_sign_date'),
            'authorized_title' => $this->input->post('authorized_title'),
            'authorized_firstname' => $this->input->post('authorized_firstname'),
            'authorized_lastname' => $this->input->post('authorized_lastname'),
            'emp_organization' => $this->input->post('emp_organization'),
            'organization_addres' => $this->input->post('organization_addres'),
            'organization_city' => $this->input->post('organization_city'),
            'organization_state' => $this->input->post('organization_state'),
            'organization_zipcode' => $this->input->post('organization_zipcode'),
        );

        /******* i9form data end *********/

        if($this->input->post('w4hiden_add') == 1){
            if($this->db->insert('tbl_w4form',$data3)){
                if($this->input->post('i9hiden_add') == 1){
                    if($this->db->insert('tbl_i9form',$data4)){
                        return TRUE;
                    }else{
                      return FALSE;
                    }
                }
            }
        }else if($this->input->post('i9hiden_add') == 1){
            if($this->db->insert('tbl_i9form',$data4)){
                return TRUE;
            }else{
              return FALSE;
            }
        }else{
            return TRUE;
        }

        // $this->db->insert('tbl_w4form',$data3);
        //
        //
        //     $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
        //     $dat['user_id'] = $this->input->post('username');
        //     $this->db->insert('front_role_extra_permission', $dat);
        //     if($this->db->affected_rows() > 0){
        //         return true;
        //     }else{
        //         return false;
        //     }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function get_user_role() {
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
    public function get_all_department() {
        try{
            $query =$this->db->get('tbl_department');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_designation() {
        try{
            $query =$this->db->get('tbl_designation');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function isUsernameExist($username){
        try{
            $this->db->select('username');
            $this->db->from('user_login');
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
            $this->db->from('users');
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
                $response['status'] = 'success';

                $user_id        =  $this->session->userdata('username');
                $notification   = 'Update Tax ( $'.$response['tax'].' )';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update tax';
                $module         = 'store setting';

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

    public function update_setting($data){
        try{
            $this->db->where('setting_id',1);
            if($this->db->update('web_setting',$data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Store information updated';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update store information';
                $module         = 'store setting';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                return true;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //Update setting
    public function update_CRV($value,$size){
        try{
            $this->db->empty_table('tbl_crv');
            if (is_array($value) || is_array($size)){
                for ($i=0;$i<count($value);$i++){
                    $data1 = array(
                        'crv_value' => $value[$i],
                        'crv_size' => $size[$i],
                    );
                    $this->db->insert('tbl_crv', $data1);
                }
            }
            return true;
        }catch(Exception $ex){
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

    //imp
    public function get_permission() {
        try {
            $this->db->select('pos_rights, reports_rights, inventory_rights, loyalty_rights, store_rights, hrms_rights, submit_timecard_rights, e_order_rights, market_place_rights');
            $this->db->from('front_role_permission');
            $this->db->where('Role_id', $this->session->userdata("role_id"));
            $query = $this->db->get();

            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
              return 0;
            }
        } catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //imp
    public function get_extra_permission() {
        try {
          $this->db->select('pos_rights, reports_rights, inventory_rights, loyalty_rights, store_rights, hrms_rights, submit_timecard_rights, e_order_rights, market_place_rights');
          $this->db->from('front_role_extra_permission');
          $this->db->where('user_id', $this->session->userdata('username'));
          $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    /*** Rajeswari Updated on 11-feb for Save Order  End code Here*******/
    public function insert_save_order(){
        // date_default_timezone_set("America/Los_Angeles");
         $data = array(
            'order_title'            => $this->input->post('order_des'),
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
                'is_price_override' => $_POST['is_price_override'][$key],
                'product_rate' => $_POST['product_rate'][$key],
                'override_orignal_rate' => $_POST['price_override_original'][$key],
                'product_price' => $_POST['product_price'][$key],
                'product_orignal_price' => $_POST['price_override_original'][$key]*$_POST['product_qty'][$key],
                'product_qty' => $_POST['product_qty'][$key],
                'product_crv' => $_POST['product_crv'][$key],
                'is_product_crv' => $_POST['is_product_crv'][$key],
                'is_product_size' => $_POST['is_product_size'][$key],
                'product_price' => $_POST['product_price'][$key],
                'is_texable' => $_POST['is_texable'][$key],
                'date_of_save_order' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('save_order_details', $dataToSave);
        }
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    /*** Rajeswari Updated on 11-feb for Save Order  End code Here*******/

    //prashant code

    public function update_save_order($recall_order_id){
        // date_default_timezone_set("America/Los_Angeles");
        $this->db->where('id',$recall_order_id);
        $this->db->delete('save_orders');

        $data = array(
           'order_title'            => $this->input->post('order_des'),
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
               'is_price_override' => $_POST['is_price_override'][$key],
                'product_rate' => $_POST['product_rate'][$key],
                'override_orignal_rate' => $_POST['price_override_original'][$key],
                'product_price' => $_POST['product_price'][$key],
                'product_orignal_price' => $_POST['price_override_original'][$key]*$_POST['product_qty'][$key],
               'product_qty' => $_POST['product_qty'][$key],
               'product_crv' => $_POST['product_crv'][$key],
               'is_product_crv' => $_POST['is_product_crv'][$key],
               'is_product_size' => $_POST['is_product_size'][$key],
               'is_texable' => $_POST['is_texable'][$key],
               'date_of_save_order' => date('Y-m-d H:i:s'),
           );

          // echo '<pre>'; print_r($dataToSave);
           $this->db->insert('save_order_details', $dataToSave);
       }
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }

      // code...
    }
    //end prashant code

    public function get_recall_order($date_filter) {
        try {
            $this->db->select('*');
            $this->db->from('save_orders');

            if($date_filter != "") {
                 $daten=date("Y-m-d",strtotime($date_filter));
                 $this->db->where('date(date_of_save_order)', $daten);

            }
            // else {
            //     $this->db->limit('10');
            // }
            $this->db->order_by('date_of_save_order','desc');
            $query = $this->db->get();
            // echo $this->db->last_query();
            // exit;
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

    //rejeshwari code

    public function get_all_users_leave() {
        try{
            // $this->db->select('users.*,user_login.username,user_login.user_type,roles.role_name');
            $this->db->select('users.*,user_login.username,user_login.user_type,front_roles.role_name');
            $this->db->from('users');
            $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT');
             // $this->db->join('roles', 'roles.id=user_login.user_type','LEFT');
             $this->db->join('front_roles', 'front_roles.id=user_login.user_type','LEFT');
            $this->db->where('users.status', 1);
            $this->db->where('user_login.user_type >', 1);
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_leave()
    {
        try{
            $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
                $this->db->from('tbl_emp_leave');
                $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
                $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
                $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
                $this->db->where_not_in('tbl_emp_leave.status', 'Cancelled');
                $this->db->order_by("tbl_emp_leave.status_no", "ASC");
                $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
                $query =$this->db->get();
                return $query->result_array();
        }catch(Exception $ex){
                error_log($ex->getTraceAsString());
                echo $ex->getTraceAsString();
                return FALSE;
            }

    }

    public function fetch_emp_by_search($customer,$tab_id){
        try{
            $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
            $this->db->from('tbl_emp_leave');
            $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
            $this->db->where_not_in('tbl_emp_leave.status', 'Cancelled');
            $this->db->order_by("tbl_emp_leave.status_no", "ASC");
            $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
            $this->db->group_start();
            $this->db->like('first_name',$customer);
            $this->db->or_like('last_name',$customer);
            $this->db->or_like('employee_id',$customer);
            $this->db->or_like('employee_name',$customer);
            $this->db->group_end();
             if($tab_id=="All")
            {
                $this->db->where('tbl_emp_leave.id >',0);
            }
            else
            {
                $this->db->where('tbl_emp_leave.status', $tab_id);
            }
            $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
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

    public function update_leave_status($leave_id){
      try{
            // date_default_timezone_set("America/Los_Angeles");
            $employee_id = $this->input->post('employee_id');
            $this->db->where('id', $leave_id);
            $data = array(
                'status' => $this->input->post('status'),
                'status_no' => $this->input->post('status_no'),
           );
            if($this->db->update('tbl_emp_leave',$data)){

              $user_id        = $this->session->userdata('username');
              $notification   = 'Leave Request has been approved';
              $action_id      = $employee_id;
              $action         = 'approved';
              $module         = 'hrms';
              $fromhtml       = 1;

              // $check = $this->check_notification($module,$perm='C');
              // if(strpos($check[0]['hrms_notification'], 'C') !== false){
              //     $check_status = 1;
              // }
              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module,$fromhtml);
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

    public function filter_emp_leave_by_status($leave_status)
    {
        try{
             if($leave_status=='All'){
            $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
            $this->db->from('tbl_emp_leave');
            $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
            $this->db->where_not_in('tbl_emp_leave.status', 'Cancelled');
            $this->db->order_by("tbl_emp_leave.status_no", "ASC");
            $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
                $query =$this->db->get();
                return $query->result_array();
           }else{
           $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
            $this->db->from('tbl_emp_leave');
            $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
            $this->db->where('tbl_emp_leave.status',$leave_status);
            $this->db->where_not_in('tbl_emp_leave.status', 'Cancelled');
            $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
                $query =$this->db->get();
                return $query->result_array();
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function update_deny_leave_status(){
        try{
            // date_default_timezone_set("America/Los_Angeles");
            $employee_id = $this->input->post('employee_id');
            $leave_id = $this->input->post('leave_id');
            $data = array(
                'deny_reason' => $this->input->post('reason'),
                'status' => $this->input->post('status'),
                'status_no' => $this->input->post('status_no'),
            );
            $data = $this->security->xss_clean($data);
            $this->db->where('id',$leave_id);
            if($this->db->update('tbl_emp_leave',$data)){
                $user_id        = $this->session->userdata('username');
                $notification   = 'Leave Request has been denied';
                $action_id      = $employee_id;
                $action         = 'denied';
                $module         = 'hrms';
                $fromhtml       = 1;

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module,$fromhtml);

                $respnce['id'] = $leave_id;
                $respnce['status'] = 'success';
                $respnce['message'] = 'Denied status updated';
                return $respnce;
            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_leave_data(){
        try{
            $leave_id = $this->input->post('leave_id');
            $employee_id = $this->input->post('employee_id');
            $data = array(
                'notes' => $this->input->post('notes'),
            );
            $data = $this->security->xss_clean($data);

            $this->db->where('id', $leave_id);
            if($this->db->update('tbl_emp_leave',$data)){
                $arrayName = array(
                  'additional_info' => $this->input->post('notes'),
                  'cash_id' => $this->input->post('leave_id'),
                  'chat_person' => 'manager',
                  'chat_type' => 'leave',
                  'created_at' =>  date('Y-m-d H:i:s'),
                  'sender_id'  => $this->session->userdata('username'),
               );
                $this->db->insert('tbl_chat_history', $arrayName);

                $user_id        = $employee_id;
                $notification   = 'Leave Request additional information required';
                $action_id      = $this->session->userdata('username');
                $action         = 'addition_info';
                $module         = 'hrms';

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
    /* Rajeswari Update Code For Additonal Info Cah Adv*/
      public function update_cash_adv_data(){
          try{
            $leave_id = $this->input->post('leave_id');
            $employee_id = $this->input->post('employee_id');
            $data = array(
                'notes' => $this->input->post('notes'),
            );
            $data = $this->security->xss_clean($data);
            $this->db->where('id', $leave_id);
            if($this->db->update('tbl_advance',$data)){
              $arrayName = array(
                'additional_info' => $this->input->post('notes'),
                'cash_id' => $this->input->post('leave_id'),
                'chat_person' => 'manager',
                'chat_type' => 'cash',
                'created_at' =>  date('Y-m-d H:i:s'),
                'sender_id'  => $this->session->userdata('username'),
             );
              $this->db->insert('tbl_chat_history', $arrayName);
                $user_id        = $employee_id;
                $notification   = 'Cash Advance Request additional information required';
                $action_id      = $this->session->userdata('username');
                $action         = 'addition_info';
                $module         = 'hrms';

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

    //prasant code
    public function get_combo_productdata($product_id){
        try{
            $this->db->where('product_id',$product_id);
            $query =$this->db->get('product_combos');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_users() {
        try{
            $this->db->select('users.*,user_login.username,user_login.user_type,user_login.user_shift_status,front_roles.role_name');
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
            $this->db->select('users.*,user_login.username,user_login.user_type,front_roles.role_name');
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
              'updated_at' => date('Y-m-d H:i:s'),
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
            $this->db->update('user_login',$data1);

            $user_id        =  $this->session->userdata('username');
            $notification   = 'Update Employee ('.$this->input->post('first_name').' '.$this->input->post('last_name').')';
            $action_id      =  $this->session->userdata('username');
            $action         = 'update employee';
            $module         = 'store setting';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

                /******* w4form data start *********/
                $folderPath = "./uploads/emp_sign/";
                $image_parts = explode(";base64,", $_POST['employee_sign']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $file = $folderPath . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
                file_put_contents($file, $image_base64);

                $data2 = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'address' => $this->input->post('address'),
                    'address_details' => $this->input->post('zip'),
                    'social_security_no' => $this->input->post('security_no'),
                    'filling_condition' => $this->input->post('filling_condition'),
                    'other_income' => $this->input->post('other_income'),
                    'deductions' => $this->input->post('deductions'),
                    'extra_withholding' => $this->input->post('extra_withholding'),
                    'employee_signature' => $file,
                    'signature_date' => $this->input->post('signature_date'),
                    'name_with_address' => $this->input->post('name_with_address'),
                    'employment_date' => $this->input->post('employment_date'),
                    'EIN' => $this->input->post('EIN'),
                    'multiple_jobs_worksheet_1' => $this->input->post('multiple_jobs_worksheet_1'),
                    'multiple_jobs_worksheet_2a' => $this->input->post('multiple_jobs_worksheet_2a'),
                    'multiple_jobs_worksheet_2b' => $this->input->post('multiple_jobs_worksheet_2b'),
                    'multiple_jobs_worksheet_2c' => $this->input->post('multiple_jobs_worksheet_2c'),
                    'multiple_jobs_worksheet_3' => $this->input->post('multiple_jobs_worksheet_3'),
                    'multiple_jobs_worksheet_4' => $this->input->post('multiple_jobs_worksheet_4'),
                    'deductions_worksheet_1' => $this->input->post('deductions_worksheet_1'),
                    'deductions_worksheet_2' => $this->input->post('deductions_worksheet_2'),
                    'deductions_worksheet_3' => $this->input->post('deductions_worksheet_3'),
                    'deductions_worksheet_4' => $this->input->post('deductions_worksheet_4'),
                    'deductions_worksheet_5' => $this->input->post('deductions_worksheet_5'),
                    'multiple_jobs_or_spouse_works' => $this->input->post('multiple_jobs_or_spouse_works'),
                    'total_amount' => $this->input->post('total_amount'),
                    'step3a' => $this->input->post('step3a'),
                    'step3b' => $this->input->post('step3b'),
                );

                /******* w4form data end *********/

                /******* i9form data start *********/

                $folderPath1 = "./uploads/emp_sign/";
                $image_parts1 = explode(";base64,", $_POST['employee_signature']);
                $image_type_aux1 = explode("image/", $image_parts1[0]);
                $image_type1 = $image_type_aux1[1];
                $image_base64_1 = base64_decode($image_parts1[1]);
                $file1 = $folderPath1 . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
                file_put_contents($file1, $image_base64_1);

                $folderPath2 = "./uploads/emp_sign/";
                $image_parts2 = explode(";base64,", $_POST['translator_sign']);
                $image_type_aux2 = explode("image/", $image_parts2[0]);
                $image_type2 = $image_type_aux2[1];
                $image_base64_2 = base64_decode($image_parts2[1]);
                $file2 = $folderPath2 . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
                file_put_contents($file2, $image_base64_2);

                $folderPath3 = "./uploads/emp_sign/";
                $image_parts3 = explode(";base64,", $_POST['authorized_sign']);
                $image_type_aux3 = explode("image/", $image_parts3[0]);
                $image_type3 = $image_type_aux3[1];
                $image_base64_3 = base64_decode($image_parts3[1]);
                $file3 = $folderPath3 . uniqid() . '.png'; //$file = $folderPath . uniqid() . '.'.$image_type;
                file_put_contents($file3, $image_base64_3);

                $data3 = array(
                    'username' => $this->input->post('username'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'middle_initial' => $this->input->post('middle_initial'),
                    'nickname' => $this->input->post('nickname'),
                    'address' => $this->input->post('address'),
                    'apartment_no' => $this->input->post('apartment_no'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'zipcode' => $this->input->post('zipcode'),
                    'employee_signature' => $file1,
                    'dob' => $this->input->post('dob12'),
                    'social_security_no' => $this->input->post('social_security_no'),
                    'email' => $this->input->post('email'),
                    'contact_no' => $this->input->post('contact_no'),
                    'imprisonment' => $this->input->post('imprisonment'),
                    'USCIS_no' => $this->input->post('USCIS_no'),
                    'expiration_date' => $this->input->post('expiration_date'),
                    'i_94_admission_no' => $this->input->post('i_94_admission_no'),
                    'foreign_passport_no' => $this->input->post('foreign_passport_no'),
                    'country_of_issuance' => $this->input->post('country_of_issuance'),
                    'signature_date' => $this->input->post('signature_date'),
                    'translator_check' => $this->input->post('translator_check'),
                    'translator_sign' => $file2,
                    'translator_sign_date' => $this->input->post('translator_sign_date'),
                    'translator_firstname' => $this->input->post('translator_firstname'),
                    'translator_lastname' => $this->input->post('translator_lastname'),
                    'translator_address' => $this->input->post('translator_address'),
                    'translator_city' => $this->input->post('translator_city'),
                    'translator_state' => $this->input->post('translator_state'),
                    'translator_zipcode' => $this->input->post('translator_zipcode'),
                    'citizenship_immigration' => $this->input->post('citizenship_immigration'),
                    'doc_title_1' => $this->input->post('doc_title_1'),
                    'doc_title_2' => $this->input->post('doc_title_2'),
                    'doc_title_3' => $this->input->post('doc_title_3'),
                    'doc_title_4' => $this->input->post('doc_title_4'),
                    'doc_title_5' => $this->input->post('doc_title_5'),
                    'issuing_authority_1' => $this->input->post('issuing_authority_1'),
                    'issuing_authority_2' => $this->input->post('issuing_authority_2'),
                    'issuing_authority_3' => $this->input->post('issuing_authority_3'),
                    'issuing_authority_4' => $this->input->post('issuing_authority_4'),
                    'issuing_authority_5' => $this->input->post('issuing_authority_5'),
                    'doc_number_1' => $this->input->post('doc_number_1'),
                    'doc_number_2' => $this->input->post('doc_number_2'),
                    'doc_number_3' => $this->input->post('doc_number_3'),
                    'doc_number_4' => $this->input->post('doc_number_4'),
                    'doc_number_5' => $this->input->post('doc_number_5'),
                    'doc_expiry_1' => $this->input->post('doc_expiry_1'),
                    'doc_expiry_2' => $this->input->post('doc_expiry_2'),
                    'doc_expiry_3' => $this->input->post('doc_expiry_3'),
                    'doc_expiry_4' => $this->input->post('doc_expiry_4'),
                    'doc_expiry_5' => $this->input->post('doc_expiry_5'),
                    're_hire_date' => $this->input->post('re_hire_date'),
                    'doc_title_6' => $this->input->post('doc_title_6'),
                    'doc_no_6' => $this->input->post('doc_no_6'),
                    'doc_expiry_6' => $this->input->post('doc_expiry_6'),
                    'authorized_sign' => $file3,
                    'authorized_sign_date' => $this->input->post('authorized_sign_date'),
                    'authorized_title' => $this->input->post('authorized_title'),
                    'authorized_firstname' => $this->input->post('authorized_firstname'),
                    'authorized_lastname' => $this->input->post('authorized_lastname'),
                    'emp_organization' => $this->input->post('emp_organization'),
                    'organization_addres' => $this->input->post('organization_addres'),
                    'organization_city' => $this->input->post('organization_city'),
                    'organization_state' => $this->input->post('organization_state'),
                    'organization_zipcode' => $this->input->post('organization_zipcode'),
                );

                /******* i9form data end *********/

            if($this->input->post('w4hiden_submit') == 1){
                $this->db->where('username', $this->input->post('username'));
                if($this->db->update('tbl_w4form',$data2)){
                    if($this->input->post('i9hiden_submit') == 1){
                        $this->db->where('username', $this->input->post('username'));
                        if($this->db->update('tbl_i9form',$data3)){
                            return TRUE;
                        }else{
                          return FALSE;
                        }
                    }
                }
            }else if($this->input->post('i9hiden_submit') == 1){
                $this->db->where('username', $this->input->post('username'));
                if($this->db->update('tbl_i9form',$data3)){
                    return TRUE;
                }else{
                    return FALSE;
                }
            }else{
                return TRUE;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_user(){
        try{
            $this->db->set('status', 0);
            $this->db->where('user_id',$this->input->post('user_id'));
            $this->db->update('users');
            $this->db->set('status', 0);
            $this->db->where('user_id',$this->input->post('user_id'));
            if($this->db->update('user_login')){
              $user_id        =  $this->session->userdata('username');
              $notification   = 'Delete Employee (Employee Id : '.$this->input->post('user_id').')';
              $action_id      =  $this->session->userdata('username');
              $action         = 'delete employee';
              $module         = 'store setting';

              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
              return TRUE;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function activate_employee(){
        try{
            $this->db->set('status', 1);
            $this->db->where('user_id',$this->input->post('user_id'));
            $this->db->update('users');
            $this->db->set('status', 1);
            $this->db->where('user_id',$this->input->post('user_id'));
            if($this->db->update('user_login')){
              $user_id        =  $this->session->userdata('username');
              $notification   = 'Activate Employee (Employee Id : '.$this->input->post('user_id').')';
              $action_id      =  $this->session->userdata('username');
              $action         = 'activate employee';
              $module         = 'store setting';

              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
              return TRUE;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function isRecallSaveOrderExist($name){
        try{
            $this->db->select('id');
            $this->db->from('save_orders');
            $this->db->where('order_title',$name);
            $result= $this->db->get()->result();
            if(!empty($result)){
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
                $this->db->where('date', date("m-d-Y",strtotime($date_filter)));
            } else {
                $this->db->limit('10');
            }
            $query = $this->db->get();
            //  print $this->db->last_query();
            // return;

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


        /******* Payout @rajeswari ************/

    public function insert_payout(){
        try{
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
                $supplier_name = $this->input->post('vendor_name');
                $supplier_id = 0;
            }

            $type = $this->input->post('Type');
            if($type== 'Scratcher / Lotto'){
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
                    'payout_amount'=>$this->input->post('payout_amount'),
                    'payment_type'=>$this->input->post('payment_type'),
                    'bin_id'=> (!empty($scratcher_upc) ? $bin : ''),
                    'user_id'=>$this->session->userdata['username'],
                    'shift' => $this->session->userdata['shiftdata']['shift_id'],
                    'terminal' => $this->current_terminal,
                    'date' => date("Y-m-d"),
                    'payout_date' => date('Y-m-d H:i:s'),
                    'check_no' => (!empty($this->input->post('check_no'))?$this->input->post('check_no'):''),
                );

                  $this->db->insert('tbl_scratchers_payout',$arrayName_new);
                   if($this->db->affected_rows() > 0){
                     $insert_id = $this->db->insert_id();//

                     $user_id        = $this->session->userdata['username'];
                     $notification   = '$'.$this->input->post('payout_amount').' Payout for Scratcher Payout';
                     $action_id      = $this->session->userdata['username'];
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

                if($this->input->post('category') == 'Others'){
                    $category_id = $this->auth->generator(15);
                    $arrayName = array(
                      'category_id' => $category_id,
                      'category_name' => $this->input->post('category_name'),
                      'cat_type' => 1,
                    );
                    $this->db->insert('product_category',$arrayName);
                }else{
                    $category_name = $this->input->post('category');

                    $this->db->select('category_id');
                    $this->db->from('product_category');
                    $this->db->where('category_name', $category_name);
                    $query = $this->db->get();
                    $result = $query->row();
                    $category_id = $result->category_id;
                }

                $data = array(
                    'supplier_emp_id' => $supplier_id,
                    'category_id' => $category_id,
                    'notes' => $this->input->post('vendor_notes'),
                    'supplier_emp_name' => $supplier_name,
                    'type' => $this->input->post('Type'),
                    'payout_money'=>$this->input->post('payout_amount'),
                    'payment_type'=>$this->input->post('payment_type'),
                    'shift' => $this->session->userdata['shiftdata']['shift_id'],
                    'terminal' => $this->current_terminal,
                    'date' => date("Y-m-d"),
                    'created_at' => date('Y-m-d H:i:s'),
                    'check_no' => (!empty($this->input->post('check_no'))?$this->input->post('check_no'):''),
                );

            }

            if($type == 'Employee'){
                $data = array(
                    'supplier_emp_id' => 1,
                    'notes' => $this->input->post('emp_notes'),
                    'supplier_emp_name' => $this->input->post('employee_name'),
                    'type' => $this->input->post('Type'),
                    'payout_money'=>$this->input->post('payout_amount'),
                    'payment_type'=>$this->input->post('payment_type'),
                    'shift' => $this->session->userdata['shiftdata']['shift_id'],
                    'terminal' => $this->current_terminal,
                    'date' => date("Y-m-d"),
                    'created_at' => date('Y-m-d H:i:s'),
                    'check_no' => (!empty($this->input->post('check_no'))?$this->input->post('check_no'):''),
                    // 'payout_by_user' => $this->input->post('payout_amount') -
                 );
            }
            $data = $this->security->xss_clean($data);

            if($this->db->insert('tbl_payout', $data)){
                $insert_id = $this->db->insert_id();//

                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'pos';
                $operation = 'Payout Transaction';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);


                $user_id        = $this->session->userdata['username'];
                $notification   = '$'.$data['payout_money'].' Payout for '.$data['type'].' Payout';
                $action_id      = $this->session->userdata['username'];
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


    public function insert_payout_with_note(){
        try{
            $shift = $this->session->userdata['shiftdata']['shift_id'];
            $username = $this->session->userdata['shiftdata']['username'];
            $drawer_cash = $this->get_current_shift_data($username,$shift);
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
                $supplier_name = $this->input->post('vendor_name');
                $supplier_id = 0;
            }


            $type = $this->input->post('Type');
            if($type== 'Scratcher / Lotto'){
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
                      'payout_amount'=> $this->input->post('payout_amount'),
                      'payment_type'=>$this->input->post('payment_type'),
                      'bin_id'=> (!empty($pro_name) ? $bin : ''),
                      'user_id'=>$this->session->userdata['username'],
                      'shift' => $this->session->userdata['shiftdata']['shift_id'],
                      'terminal' => $this->current_terminal,
                      'date' => date("Y-m-d"),
                      'payout_date' => date('Y-m-d H:i:s'),
                      'payout_note'=> $this->input->post('payout_note'),
                      'check_no' => (!empty($this->input->post('check_no'))?$this->input->post('check_no'):''),
                      'payout_by_user' => number_format($payout_by_user, 2),
                  );


                  $this->db->insert('tbl_scratchers_payout',$arrayName_new);
                   if($this->db->affected_rows() > 0){
                     $insert_id = $this->db->insert_id();//

                     $user_id        = $this->session->userdata['username'];
                     $notification   = '$'.$this->input->post('payout_amount').' Payout for Scratcher Payout ( '.$this->input->post('payout_note').' )';
                     $action_id      = $this->session->userdata['username'];
                     $action         = 'Scratcher Payout';
                     $module         = 'pos terminal';

                     //$check = $this->check_notification($module,$perm='B');
                     // if(strpos($check[0]['pos_notification'], 'B') !== false){
                     //     $check_status = 1;
                     // }
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

              if($this->input->post('category') == 'Others'){
                  $category_id = $this->auth->generator(15);
                  $arrayName = array(
                    'category_id' => $category_id,
                    'category_name' => $this->input->post('category_name'),
                    'cat_type' => 1,
                  );
                  $this->db->insert('product_category',$arrayName);
              }else{
                  $category_name = $this->input->post('category');

                  $this->db->select('category_id');
                  $this->db->from('product_category');
                  $this->db->where('category_name', $category_name);
                  $query = $this->db->get();
                  $result = $query->row();
                  $category_id = $result->category_id;
              }

                $data = array(
                    'supplier_emp_id' => $supplier_id,
                    'category_id' => $category_id,
                    'notes' => $this->input->post('vendor_notes'),
                    'supplier_emp_name' => $supplier_name,
                    'type' => $this->input->post('Type'),
                    'payout_money'=>$this->input->post('payout_amount'),
                    'payment_type'=>$this->input->post('payment_type'),
                    'shift' => $this->session->userdata['shiftdata']['shift_id'],
                    'terminal' => $this->current_terminal,
                    'date' => date("Y-m-d"),
                    'created_at' => date('Y-m-d H:i:s'),
                    'payout_note'=> $this->input->post('payout_note'),
                    'check_no' => (!empty($this->input->post('check_no'))?$this->input->post('check_no'):''),
                    'payout_by_user' => $payout_by_user,
                );
            }

            if($type == 'Employee'){
                $data = array(
                    'supplier_emp_id' => 1,
                    'notes' => $this->input->post('emp_notes'),
                    'supplier_emp_name' => $this->input->post('employee_name'),
                    'type' => $this->input->post('Type'),
                    'payout_money'=>$this->input->post('payout_amount'),
                    'payment_type'=>$this->input->post('payment_type'),
                    'shift' => $this->session->userdata['shiftdata']['shift_id'],
                    'terminal' => $this->current_terminal,
                    'date' => date("Y-m-d"),
                    'created_at' => date('Y-m-d H:i:s'),
                    'payout_note'=> $this->input->post('payout_note'),
                    'check_no' => (!empty($this->input->post('check_no'))?$this->input->post('check_no'):''),
                    'payout_by_user' => $payout_by_user,
                 );
            }
            $data = $this->security->xss_clean($data);

            if($this->db->insert('tbl_payout', $data)){
                $insert_id = $this->db->insert_id();//

                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'pos';
                $operation = 'Payout Transaction';
                $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);


                $user_id        = $this->session->userdata['username'];
                $notification   = '$'.$data['payout_money'].' Payout for '.$data['type'].' Payout ( '.$this->input->post('payout_note').' )';
                $action_id      = $this->session->userdata['username'];
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


    //prashant code 1MAR
    public function get_all_category($categorytype='1') {
          try{
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
          }catch(Exception $ex){
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
          }
    }

    public function delete_custom_category(){
        try{
          $this->db->set('is_deleted', 1);
          $this->db->where('id',$this->input->post('id'));
          $this->db->update('custom_category_setting');
          $this->db->set('is_deleted', 1);
          $this->db->where('cat_id',$this->input->post('id'));
          if($this->db->update('custom_category_setting_details')){
              $user_id        =  $this->session->userdata('username');
              $notification   = 'Delete Custom Category';
              $action_id      =  $this->session->userdata('username');
              $action         = 'delete custom category';
              $module         = 'store setting';

              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

              return TRUE;
          }

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

    public function get_cat_name($cat_id)
    {
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

      $user_id        =  $this->session->userdata('username');
      $notification   = 'Add Custom Category ('.$cattname.')';
      $action_id      =  $this->session->userdata('username');
      $action         = 'add custom category';
      $module         = 'store setting';

      $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }

    }

    public function isCustomCategoryExist($cat_name){
        try{
            $this->db->select('name');
            $this->db->from('custom_category_setting');
            $this->db->where('name',$cat_name);
            // $this->db->where_not_in('user_id',13);

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

    public function get_custom_category_data($id){
        try{
            $this->db->select('custom_category_setting_details.*,custom_category_setting.name as catname,custom_category_setting.category_id');
            $this->db->from('custom_category_setting_details');
            $this->db->join('custom_category_setting', 'custom_category_setting.id = custom_category_setting_details.cat_id','LEFT');
            $this->db->where('custom_category_setting_details.cat_id',$id);
            $this->db->where('custom_category_setting_details.is_deleted',0);
            $query = $this->db->get();
            return $query->result_array();

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
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
                'name' => $cattname
              );
              if($cat_id == 0){
                $this->db->where('id', $id);
              }else{
                $this->db->where('category_id', $cat_id);
              }

              if($this->db->update('custom_category_setting', $dat)){
                  $user_id        =  $this->session->userdata('username');
                  $notification   = 'Update Custom Category ('.$cattname.')';
                  $action_id      =  $this->session->userdata('username');
                  $action         = 'update custom category';
                  $module         = 'store setting';

                  $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

                  if($this->db->affected_rows() > 0){
                      return true;
                  }else{
                      return false;
                  }
              }


        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function get_cat_wise_buttons(){
        try{
            $this->db->select('id,name,value,is_crv,percent,is_taxable,(SELECT age_restrict FROM product_category WHERE product_category.category_id IN (SELECT category_id FROM custom_category_setting WHERE custom_category_setting.id = custom_category_setting_details.cat_id)) as is_age_restrict');
            $this->db->from('custom_category_setting_details');
            $this->db->where('cat_id', $this->input->post('cat_id'));
            $this->db->where('custom_category_setting_details.is_deleted', 0);
            $query = $this->db->get();
            // print "========>".$this->db->last_query();

            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


     ///****** Rajeswari @Lottery Management ***********/
     public function get_all_lotteries() {
        try{
            $this->db->select('*');
            $this->db->from('tbl_lotteries');
             $query =$this->db->get();
            //echo $this->db->last_query();exit;
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_lottery(){
              //echo '<pre>'; print_r($_POST);exit;
       $employee_id=$this->session->userdata['username'];
       $employee_name=$this->session->userdata['name'];
        try{
            $data = array(
                'employee_name'   => $employee_name,
                'employee_id'   => $employee_id,
                'lottery_name' => $this->input->post('lottery_name'),
                'price_per_ticket'=> $this->input->post('price_per_ticket'),
                'draw_date'         => $this->input->post('draw_date'),
                );
            $data = $this->security->xss_clean($data);
            $this->db->insert('tbl_lotteries', $data);
            $insert_id = $this->db->insert_id();//
            $com_rows = $this->input->post('combo_row');
           //echo '<pre>'; print_r($com_rows);exit;
      foreach ($com_rows as $value) {
          $catdata = [];
          $catdata['lottery_id'] = $insert_id;
          $catdata['winning_title'] =   $this->input->post('winning_title_'.$value);
          $catdata['winning_amount'] =  $this->input->post('winning_price_'.$value);
          $this->db->insert('tbl_lottery_winning_details', $catdata);
        }
       // echo $this->db->last_query();exit;

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
    public function get_lottery_by_id($lottery_id){
        try{
            $this->db->select('*');
            $this->db->from('tbl_lotteries');
                         $this->db->where('tbl_lotteries.id',$lottery_id);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0) {
                $lotteryarray = array(
                    'lottery_id' => $query->row()->lottery_id,
                    'employee_id' => $query->row()->employee_id,
                    'lottery_name' => $query->row()->lottery_name,
                    'price_per_ticket' => $query->row()->price_per_ticket,
                    'draw_date' => $query->row()->draw_date,
                    'winning_amount' => $query->row()->winning_amount,
                    'quantity' => $query->row()->quantity,
                   );
                return $lotteryarray;
            }else {
                return FALSE;
            }
       }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_lottery(){
          //echo '<pre>'; print_r($_POST);exit;
        try{
            $lottery_id = $this->input->post('lottery_id');
           //echo $lottery_id; exit;
            $data = array(
                'lottery_name' => $this->input->post('lottery_name'),
                'price_per_ticket'        => $this->input->post('price_per_ticket'),
                'draw_date'         => $this->input->post('draw_date'),
                'winning_amount'       => $this->input->post('winning_amount'),
                'quantity'       => $this->input->post('quantity'),
               );
            $data = $this->security->xss_clean($data);
            $this->db->where('lottery_id',$lottery_id);
            $this->db->update('tbl_lotteries',$data);
           //echo $this->db->last_query();
             $respnce['id'] = $lottery_id;
            $respnce['status'] = 'success';
            $respnce['message'] = 'Lottery is updated successfully';
            return $respnce;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

     public function insert_Lottery_number(){
       //  echo '<pre>'; print_r($_POST);exit;
       $employee_id=$this->session->userdata['username'];
       $employee_name=$this->session->userdata['name'];

         $data = array(
             'employee_id' => $employee_id,
            'employee_name'       =>  $employee_name,
            'lottery_category_name' => $this->input->post('lottery_cat_id'),
            'lottery_id'       => $this->input->post('lottery_unique_id'),
             'lottery_price'       => $this->input->post('lottery_price'),
            );
          $this->db->insert('tbl_lottery_ids', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function get_all_list_lotteries() {
        try{
            $this->db->select('*');
            $this->db->from('tbl_lottery_ids');
             $query =$this->db->get();
            //echo $this->db->last_query();exit;
            return $query->result_array();
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
               // ST - for query log
               $last_query = $this->db->last_query();
               $user_id = $this->session->userdata['username'];
               $module = 'Inventory';
               $operation = 'Cash Drop Transaction';
               $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
               // EN - for query log

              $response['drop'] = $insert_id;
              $response['name'] = (!empty($this->session->userdata['cashierdata']['name']) ? $this->session->userdata['cashierdata']['name']: $this->session->userdata['shiftdata']['first_name'].' '.$this->session->userdata['shiftdata']['last_name']);
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

              // $check = $this->check_notification($module,$perm='A');

              // if(strpos($check[0]['pos_notification'], 'A') !== false){
              //     $check_status = 1;
              // }
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



       public function insert_scratcher(){
              //echo '<pre>'; print_r($_POST);exit;
       $employee_id=$this->session->userdata['username'];
       $employee_name=$this->session->userdata['name'];
        try{
            $data = array(
                'employee_name'   => $employee_name,
                'employee_id'   => $employee_id,
                'game_name' => $this->input->post('game_name'),
                'price'=> $this->input->post('price'),
                'upc'         => $this->input->post('upc'),
                'bin_data' => $this->input->post('bin_data'),
                'expiry'=> $this->input->post('expiry'),
                'payout_prize'  => $this->input->post('payout_prize'),
                'created_at' => date('Y-m-d'),
                );
            $data = $this->security->xss_clean($data);
            $this->db->insert('tbl_scratcher', $data);
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

    public function get_scratcher_by_id($scratcher_id){
        try{
            $this->db->select('*');
            $this->db->from('tbl_scratcher');
                         $this->db->where('tbl_scratcher.id',$scratcher_id);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0) {
                $scratcherarray = array(
                    'game_name' => $query->row()->game_name,
                    'price' => $query->row()->price,
                    'upc' => $query->row()->upc,
                    'bin_data' => $query->row()->bin_data,
                    'expiry' => $query->row()->expiry,
                    'payout_prize' => $query->row()->payout_prize,
                   );
                return $scratcherarray;
            }else {
                return FALSE;
            }
       }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    public function update_scratcher(){
        try{
            $scratcher_id = $this->input->post('scratcher_id');
              $data = array(
                'game_name' => $this->input->post('game_name'),
                'price'        => $this->input->post('price'),
                'upc'         => $this->input->post('upc'),
                'bin_data'       => $this->input->post('bin_data'),
                'expiry'       => $this->input->post('expiry'),
                'payout_price'  => $this->input->post('payout_price'),
                'created_at' => date('Y-m-d'),
               );
            $data = $this->security->xss_clean($data);
            $this->db->where('id',$scratcher_id);
            $this->db->update('tbl_scratcher',$data);
            $response['status'] = 'success';
            return $response;
            }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_scratcher($id){
        $this->db->set('is_deleted', 1);
        $this->db->where('id', $id);
        return $this->db->update('tbl_scratcher');
    }


    public function getw4FormData(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_w4form');
            $this->db->where('username', $this->input->post('username'));
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->row();
                return $story_array;
            }else{
                return false;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_custom_product(){
         // echo '<pre>'; print_r($_POST);exit;
       $employee_id=$this->session->userdata['username'];
       $employee_name=$this->session->userdata['name'];
       $Applicable_CRV = (!empty($this->input->post('Applicable_CRV')) ? 1: 0);
       $Applicable_Tax = (!empty($this->input->post('Applicable_Tax')) ? 1: 0);
       $crv_size = (!empty($this->input->post('crv_size')) ?$this->input->post('crv_size'): 0);
         try{
            $data = array(
               // 'case_UPC'    => $this->generator(8),
                'product_id' =>  $this->auth->generator(8),
                'case_UPC'   => $this->input->post('product_upc'),
                'product_name'   => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('custom_product_name')),
                'onsale_price'   => $this->input->post('custom_product_price'),
                'short_name'   => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('custom_product_name')),
                'is_custom_product'   => '1',
                'Applicable_CRV'   => $Applicable_CRV,
                'Applicable_Tax'   => $Applicable_Tax,
                'size' => $crv_size,
                'image_thumb'      => './uploads/products/600px-No_image_available.svg (2).png',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
             );
            $data = $this->security->xss_clean($data);
            $this->db->insert('product_information', $data);

            // ST - for query log
            $last_query = $this->db->last_query();
            $user_id = $this->session->userdata['username'];
            $module = 'Inventory';
            $operation = 'Custom Product Insert';
            $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
            // EN - for query log

          //echo $this->db->last_query(); exit;
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

      public function get_custom_product_by_id_old($custom_product_id){
        try{
            $this->db->select('*');
            $this->db->from('product_information');
                         $this->db->where('product_information.id',$custom_product_id);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0) {
                $customproductarray = array(
                    'id' => $query->row()->id,
                    'case_UPC' => $query->row()->case_UPC,
                    'product_name' => $query->row()->product_name,
                    'price' => $query->row()->price,
                   );
                return $customproductarray;
            }else {
                return FALSE;
            }
       }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }



    /* @Rajeswari Payout By Date IN POS Start Here  **/
    public function get_all_payouts() {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $story_array = array();
        try{
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
            $this->db->select('(select CONCAT(first_name, " ", last_name) from users inner join user_login as ul on ul.user_id = users.user_id where ul.username = tbl_scratchers_payout.user_id limit 1) as supplier_emp_name,payout_amount as payout_money,payment_type,payout_date as created_at');
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

     public function get_leaverequests_by_date(){
        try{
            $selected_date = $this->input->post('leave_req_date');

               $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
                $this->db->from('tbl_emp_leave');
                $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
                $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
                $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');            //$this->db->where('is_delete',0);
                // $this->db->where('Date(tbl_advance.created_at)', $selected_date);
                $this->db->where('Date(tbl_emp_leave.created_at)', $selected_date);
                $this->db->where('tbl_emp_leave.employee_id', $this->session->userdata['username']);  //added prashant
           //$this->db->where('date', date("m-d-Y",strtotime($date_filter)));
            $query=$this->db->get();
          //echo $this->db->last_query(); exit;
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

     public function get_cashadv_by_date(){
        try{
            $selected_date = $this->input->post('cashadv_date');
            $this->db->select('users.first_name,users.last_name,tbl_advance.*');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            // $this->db->where('start_date', date("m-d-Y",strtotime($selected_date)));
            $this->db->where('Date(tbl_advance.created_at)', $selected_date);
            $this->db->where('tbl_advance.employee_id', $this->session->userdata['username']);  //added prashant
            $query=$this->db->get();
            // echo $this->db->last_query(); exit;
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

    public function get_payouts_by_date(){
        try{
            $selected_date = $this->input->post('payout_date');
            $story_array = array();

            $this->db->select('*');
            $this->db->from('tbl_payout');
            //$this->db->where('is_delete',0);
            $this->db->where('DATE(created_at)',$selected_date);
            $query=$this->db->get();
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
            $this->db->where('tbl_scratchers_payout.date',$selected_date);
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

            if(count($story_array) > 0) {
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

    /* @Rajeswari Payout By Date IN POS End Here  **/

    public function update_custom_product_old(){
          //echo '<pre>'; print_r($_POST);exit;
        try{
            $custom_product_id = $this->input->post('custom_product_id');
            $Applicable_CRV = (!empty($this->input->post('Applicable_CRV')) ? 1: 0);
            $Applicable_Tax = (!empty($this->input->post('Applicable_Tax')) ? 1: 0);
            $data = array(
                'case_UPC' => $this->input->post('product_upc'),
                'product_name' => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('custom_product_name')),
                'price'         => $this->input->post('custom_product_price'),
                'Applicable_CRV'   => $Applicable_CRV,
                'Applicable_Tax'   => $Applicable_Tax,
                );
            $data = $this->security->xss_clean($data);
            $this->db->where('id',$custom_product_id);
            $this->db->update('product_information',$data);
           //echo $this->db->last_query();
             $respnce['id'] = $lottery_id;
            $respnce['status'] = 'success';
            $respnce['message'] = 'Custom product is updated successfully';
            return $respnce;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    public function delete_custom_product($id){
        $this->db->set('is_deleted', 1);
        $this->db->where('id', $id);
        return $this->db->update('product_information');
    }

    public function update_custom_product(){
      try{
            $product_id = $this->input->post('product_id');
            // echo $product_id; exit;
            $sup_price = $this->input->post('supplier_price');
            if($sup_price == '0.00'){
                $supplier_price = '';
            }else{
                $supplier_price = $this->input->post('supplier_price');
            }

            $supplier = $this->input->post('supplier');
            if(!empty($supplier)){
                $sup = $this->isExistSupplier($supplier);
                if(empty($sup)){
                    $dat = array(
                        'supplier_id'   => $this->auth->generator(20),
                        'supplier_name' => $this->input->post('supplier'),
                        'status' => 1,
                    );
                    $this->db->insert('supplier_information', $dat);

                    // ST - for query log
                    $last_query = $this->db->last_query();
                    $user_id = $this->session->userdata['username'];
                    $module = 'Inventory';
                    $operation = 'Add Supplier Information from custom product';
                    $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                    // EN - for query log

                    $ssupplier = $dat['supplier_name'];
                    $supplierID = $dat['supplier_id'];
                }else{
                    $supp = $this->isExistSupplier($supplier);
                    $ssupplier = $supp->supplier_name;
                    $supplierID = $supp->supplier_id;
                }
            }

            $sizes = strtolower($this->input->post('size'));
            if($this->get_size($sizes)){
                $getsize = $this->get_size($sizes);
                $name = $getsize->name;
            }else{
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

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Add size from custom product';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log

                $name = $arrayName['name'];
            }

            $product_combo = $this->input->post('product_combo');
            $combo_unit = $this->input->post('combo_unit');
            $combo_price = $this->input->post('combo_price');

            if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
                $this->db->where('product_id', $product_id);
                $delete = $this->db->delete('product_combos');

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Delete Product Combo from custom product';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log
            }

            if(!empty($product_combo[0] && $combo_unit[0] && $combo_price[0])){
                $combodata = [];
                for($t = 0; $t< count($product_combo); $t++){
                     $combodata['product_id'] = $this->input->post('product_id');
                     $combodata['product_combo'] = $product_combo[$t];
                     $combodata['combo_unit'] = $combo_unit[$t];
                     $combodata['combo_price'] = $combo_price[$t];
                  // echo '<pre>'; print_r($combodata);exit;
                    $this->db->insert('product_combos', $combodata);

                    // ST - for query log
                    $last_query = $this->db->last_query();
                    $user_id = $this->session->userdata['username'];
                    $module = 'Inventory';
                    $operation = 'Add Product combo from custom product';
                    $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                    // EN - for query log
                }
            }


            $data = array(
                'product_name'          => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_name')),
                'short_name'            => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_nickname')),
                'category_id'           => (!empty($this->input->post('category_id'))?$this->input->post('category_id'):'0'),
                'brand_id'              => $this->input->post('brand_id'),
                'size'                  => $name,
                'supplier'              => $ssupplier,
                'supplier_id'           => $supplierID,
                'product_details'       => $this->input->post('details'),
                'producer'              => $this->input->post('producer'),
                'Meta_Title'            => $this->input->post('Meta_Title'),
                'Meta_Key'              => $this->input->post('Meta_Key'),
                'Meta_Desc'             => $this->input->post('Meta_Desc'),
                'unit'                  => $this->input->post('unit'),
                'quantity'              => $this->input->post('quantity'),
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
                'reorder_level'         => $this->input->post('reorder_level'),
                'is_custom_product'     => '0',
                'created_at'            => date('Y-m-d H:i:s'),
                'updated_at'            => date('Y-m-d H:i:s'),
            );

            $this->db->where('product_id', $product_id);
            if($this->db->update('product_information', $data)){

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Update custom product';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log


              //echo $this->db->last_query();exit;
                $response['id'] = $product_id;
                $response['status'] = 'success';
                $response['message'] = 'Custom Product is Successfully Updated';
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
     public function get_custom_product_by_id($product_id){
        try{
            $this->db->select('product_category.category_id,product_category.category_name,brand.brand_id,brand.brand_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('brand','brand.brand_id = product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.product_id',$product_id);

            $query = $this->db->get();
           //echo $this->db->last_query(); exit;

            if($this->db->affected_rows() > 0) {
                $productarray = array(
                    'id' => $query->row()->id,
                    'product_id' => $query->row()->product_id,
                    'product_name' => $query->row()->product_name,
                    'brand_name' => $query->row()->brand_name,
                    'supplier' => $query->row()->supplier,
                    'brand_id' => $query->row()->brand_id,
                    'category_id' => $query->row()->category_id,
                    'category_name' => $query->row()->category_name,
                    'case_upc' => $query->row()->case_UPC,
                    'short_name' => $query->row()->short_name,
                    'Meta_Title' => $query->row()->Meta_Title,
                    'Meta_Key' => $query->row()->Meta_Key,
                    'Meta_Desc' => $query->row()->Meta_Desc,
                    'supplier_price' => $query->row()->supplier_price,
                    'unit' => $query->row()->unit,
                    'quantity' => $query->row()->quantity,
                    'product_details' => $query->row()->product_details,
                    'store_sell_price' => $query->row()->onsale_price,
                    'ecomm_sell_price'=> $query->row()->ecomm_sale_price,
                    'size' =>  $query->row()->size,
                    'proof' =>  $query->row()->proof,
                    'abv' =>  $query->row()->abv,
                    'region' => $query->row()->region,
                    'producer' => $query->row()->producer,
                    'product_image'=> $query->row()->image_thumb,
                    'store_promotion' => $query->row()->store_promotion_price,
                    'ecomm_promotion'=> $query->row()->ecomm_promotion_price,
                    'Applicable_CRV' => $query->row()->Applicable_CRV,
                    'Applicable_Tax'=> $query->row()->Applicable_Tax,
                    'is_ecommerce'=> $query->row()->is_ecommerce,
                    'reorder_level'=> $query->row()->reorder_level,

                );
                return $productarray;
            }else {
                return FALSE;
            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    /* Rajeswari@ Custom Products Start Here **/

    // ST - Scratcher Inventory
    public function get_all_scratcher_inventory_products() {
        try{
            $this->db->select('product_category.category_id,product_category.category_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.is_deleted', 0);
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

    public function scratcher_inventory_add_product($product_id,$brand_id) {
         try{
            $upc_code = $this->input->post('case_upc');
            $supplier = $this->input->post('supplier');
            if(!empty($supplier)){
                $sup = $this->isExistSupplier($supplier);
                if(empty($sup)){
                    $dat = array(
                        'supplier_id'   => $this->auth->generator(20),
                        'supplier_name' => $this->input->post('supplier'),
                        'status' => 1,
                    );
                    $this->db->insert('supplier_information', $dat);

                    // ST - for query log
                    $last_query = $this->db->last_query();
                    $user_id = $this->session->userdata['username'];
                    $module = 'Inventory'; // Inventory
                    $operation = 'Add Supplier Information';
                    $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                    // EN - for query log

                    $ssupplier = $dat['supplier_name'];
                    $supplierID = $dat['supplier_id'];
                }else{
                    $supp = $this->isExistSupplier($supplier);
                    $ssupplier = $supp->supplier_name;
                    $supplierID = $supp->supplier_id;
                }
            }

            $units = $this->input->post('unit');
            if($this->get_unit($units)){
                $getunit = $this->get_unit($units);
                $unit = $getunit->value;
            }else{
                $unit = $units;
            }

            // $sup_price = $this->input->post('supplier_price');
            // if($sup_price == '0.00'){
            //     $supplier_price = '';
            // }else{
            //     $supplier_price = $this->input->post('supplier_price');
            // }

            $data = array(
                'product_id'            => $product_id,
                'product_name'          => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_name')),
                'short_name'            => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_nickname')),
                'bin'                   => $this->input->post('bin'),
                'category_id'           => '0',
                'supplier'              => $ssupplier,
                'supplier_id'           => $supplierID,
                'unit'                  => $unit,
                'quantity'              => $this->input->post('quantity'),
                'onsale_price'          => $this->input->post('store_sell_price'),
                // 'supplier_price'        => number_format($supplier_price, 2),
                // 'price'                 => (!empty($supplier_price)) ? $supplier_price : '0',
                'case_UPC'              => (!empty($upc_code)) ? $upc_code : $this->input->post('upc'),
                'status'                => 1,
                'Applicable_CRV'        => '0',
                'Applicable_Tax'        => '0',
                'is_scratchable'        => 1,
                'scratcher_no_from'     => $this->input->post('scratcher_no_from'),
                'scratcher_no_to'       => $this->input->post('scratcher_no_to'),
                'scracher_current_no'   => $this->input->post('scratcher_no_from'),
                'scratcher_status'      => $this->input->post('scratcher_status'),
                'created_at'            => date('Y-m-d H:i:s'),
                'updated_at'            => date('Y-m-d H:i:s'),
                'image_thumb'           => './uploads/products/600px-No_image_available.svg (2).png',

            );

            $status = (!empty($this->input->post('status'))?$this->input->post('status'):'insert');
            $table_from = (!empty($this->input->post('from'))?$this->input->post('from'):'master');

            if($status == 'insert' AND $table_from == 'api'){
                if($this->db->insert('product_master', $data)){

                    // ST - for query log
                    $last_query = $this->db->last_query();
                    $user_id = $this->session->userdata['username'];
                    $module = 'Inventory'; // Inventory
                    $operation = 'Add Product Master Using API';
                    $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query,0,1);
                    // EN - for query log

                    $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
                     $this->db->insert('product_information',$data);

                     // ST - for query log
                    $last_query = $this->db->last_query();
                    $user_id = $this->session->userdata['username'];
                    $module = 'Inventory'; // Inventory
                    $operation = 'Add Product Information';
                    $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                    // EN - for query log

                    $user_id        =  $this->session->userdata('username');
                    $notification   =  'Add Scratcher '.$this->input->post('product_name').' ('.$upc_code.')';
                    $action_id      =  $this->session->userdata('username');
                    $action         = 'add scratcher';
                    $module         = 'inventory';

                    $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                }
            }elseif($status == 'insert' AND $table_from == 'master'){
                $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
               $this->db->insert('product_information', $data);

               // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory'; // Inventory
                $operation = 'Add Product Information';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);

                $user_id        =  $this->session->userdata('username');
                $notification   =  'Add Scratcher '.$data['product_name'].' ('.$upc_code.')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'add scratcher';
                $module         = 'inventory';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                // EN - for query log
            }
            elseif($status == 'update' AND $table_from == 'store'){
                $this->db->where('case_UPC', $upc_code);
                $this->db->update('product_information', $data);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory'; // Inventory
                $operation = 'Update Product Information';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);

                $user_id        =  $this->session->userdata('username');
                $notification   =  'Add Scratcher '.$data['product_name'].' ('.$upc_code.')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'add scratcher';
                $module         = 'inventory';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                // EN - for query log

            }else{
                $this->db->insert('product_information', $data);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory'; // Inventory
                $operation = 'Add Product Information';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);


                $user_id        =  $this->session->userdata('username');
                $notification   =  'Add Scratcher '.$data['product_name'].' ('.$upc_code.')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'add scratcher';
                $module         = 'inventory';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                // EN - for query log
            }

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

    public function scratcher_inventory_update_product() {
        try{
            $product_id = $this->input->post('product_id');
            $supplier = $this->input->post('supplier');
            if(!empty($supplier)){
                $sup = $this->isExistSupplier($supplier);
                if(empty($sup)){
                    $dat = array(
                        'supplier_id'   => $this->auth->generator(20),
                        'supplier_name' => $this->input->post('supplier'),
                        'status' => 1,
                    );
                    $this->db->insert('supplier_information', $dat);

                    // ST - for query log
                    $last_query = $this->db->last_query();
                    $user_id = $this->session->userdata['username'];
                    $module = 'Inventory'; // Inventory
                    $operation = 'Add Supplier Information';
                    $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                    // EN - for query log

                    $ssupplier = $dat['supplier_name'];
                    $supplierID = $dat['supplier_id'];
                }else{
                    $supp = $this->isExistSupplier($supplier);
                    $ssupplier = $supp->supplier_name;
                    $supplierID = $supp->supplier_id;
                }
            }

            // $sup_price = $this->input->post('supplier_price');
            // if($sup_price == '0.00'){
            //     $supplier_price = '';
            // }else{
            //     $supplier_price = $this->input->post('supplier_price');
            // }

            if($this->input->post('scratcher_status') == 0){
                $archive = 0;
            }else{
                $archive = 1;
            }

            $data = array(
                'product_name'          => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_name')),
                'short_name'            => preg_replace('/[~\$#@?^}{\+=*]+/','',$this->input->post('product_nickname')),
                'bin'                   => $this->input->post('bin'),
                'category_id'           => '0',
                'supplier'              => $ssupplier,
                'supplier_id'           => $supplierID,
                // 'supplier_price'        => number_format($supplier_price, 2),
                // 'price'                 => (!empty($supplier_price)) ? $supplier_price : '0',
                'unit'                  => $this->input->post('unit'),
                'quantity'              => $this->input->post('quantity'),
                'onsale_price'          => $this->input->post('store_sell_price'),
                'scratcher_no_from'     => $this->input->post('scratcher_no_from'),
                'scratcher_no_to'       => $this->input->post('scratcher_no_to'),
                'scratcher_status'      => $this->input->post('scratcher_status'),
                'is_archive_scratcher'  => $archive,
            );

            $this->db->where('product_id', $product_id);
            if($this->db->update('product_information', $data)){

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory'; // Inventory
                $operation = 'Update Scratcher Product Information';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log

                $user_id        =  $this->session->userdata('username');
                $notification   =  'Update Scratcher '.$this->input->post('product_name').' ('.$this->input->post('case_upc').')';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update scratcher';
                $module         = 'inventory';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

                $response['id'] = $product_id;
                $response['status'] = 'success';
                $response['message'] = 'Scratcher is updated successfully';
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
    // EN - Scratcher Inventory

    public function fetch_cash_employee($employee,$tab_id){
        try{
            $this->db->select('tbl_paychecks.paycheck,tbl_paychecks.value,users.first_name,users.last_name,tbl_advance.id,tbl_advance.employee_id,tbl_advance.employee_name,tbl_advance.advance_amount,tbl_advance.status,tbl_advance.reason,tbl_advance.denied_reason,tbl_advance.notes,tbl_advance.created_at');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->join('tbl_paychecks', 'tbl_paychecks.value = tbl_advance.paycheck','LEFT');
            $this->db->where_not_in('tbl_advance.status', 'Cancelled');
            $this->db->order_by("tbl_advance.status_no", "ASC");
            $this->db->order_by('tbl_advance.created_at', 'DESC');
            $this->db->group_start();
            $this->db->like('first_name',$employee);
            $this->db->or_like('last_name',$employee);
            $this->db->or_like('employee_id',$employee);
            $this->db->or_like('employee_name',$employee);
            $this->db->group_end();
            if($tab_id=="All")
            {
                $this->db->where('tbl_advance.id >',0);
            }
            else
            {
                $this->db->where('tbl_advance.status', $tab_id);
            }
            $this->db->order_by('tbl_advance.created_at', 'DESC');
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
               $this->db->select('tbl_paychecks.paycheck,tbl_paychecks.value,users.first_name,users.last_name,tbl_advance.id,tbl_advance.employee_id,tbl_advance.employee_name,tbl_advance.advance_amount,tbl_advance.status,tbl_advance.reason,tbl_advance.denied_reason,tbl_advance.notes,tbl_advance.created_at');
               $this->db->from('tbl_advance');
               $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
               $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
               $this->db->join('tbl_paychecks', 'tbl_paychecks.value = tbl_advance.paycheck','LEFT');
               $this->db->where_not_in('tbl_advance.status', 'Cancelled');
               $this->db->order_by("tbl_advance.status_no", "ASC");
               $this->db->order_by('tbl_advance.created_at', 'DESC');
               $query =$this->db->get();
               return $query->result_array();
           }else{
               $this->db->select('tbl_paychecks.paycheck,tbl_paychecks.value,users.first_name,users.last_name,tbl_advance.id,tbl_advance.employee_id,tbl_advance.employee_name,tbl_advance.advance_amount,tbl_advance.status,tbl_advance.reason,tbl_advance.denied_reason,tbl_advance.notes,tbl_advance.created_at');
               $this->db->from('tbl_advance');
               $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
               $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
               $this->db->join('tbl_paychecks', 'tbl_paychecks.value = tbl_advance.paycheck','LEFT');
                $this->db->where_not_in('tbl_advance.status', 'Cancelled');
               $this->db->where('tbl_advance.status',$status);
               $this->db->order_by('tbl_advance.created_at', 'DESC');
               $query =$this->db->get();
               return $query->result_array();
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



     public function get_recallorders_by_date(){
        try{
            $selected_date = $this->input->post('recall_date');
            $this->db->select('*');
            $this->db->from('save_orders');
            //$this->db->where('is_delete',0);
            $this->db->where('DATE(date_of_save_order)',$selected_date);
            $query=$this->db->get();
             //echo $this->db->last_query();
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

    public function label_editor(){
        $data = array(
          'label_height' => $this->input->post('label_height'),
          'label_width'  => $this->input->post('label_width'),
        );
        $data = $this->security->xss_clean($data);
        $this->db->where('id', $this->input->post('lbl_id'));
        if($this->db->update('tbl_label_editor',$data)){
            $user_id        =  $this->session->userdata('username');
            $notification   = 'Update Label Editor';
            $action_id      =  $this->session->userdata('username');
            $action         = 'update label editor';
            $module         = 'store setting';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_label_editor_by_id(){
        try{
              $id = $this->input->post('id');
              if($id == 0){
                $id = 1;
              }else{
                $id = $this->input->post('id');
              }
            $this->db->select('*');
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

    public function insert_customer(){
        try{
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
            $this->db->insert('customer_information', $data);
              if($this->db->affected_rows() > 0){
                  $arrayName = array(
                     'customer_id'    => $data['customer_id'],
                     'redeem_point'   => $this->get_customer_reg_point(),
                     'point_type'    => 1,
                     'created_at'     => date('Y-m-d H:i:s'),
                     'updated_at'     => date('Y-m-d H:i:s'),
                  );
                  $this->db->insert('customer_redeem_point_master',$arrayName);
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

    public function isemailExists($email){
      try{
          $this->db->select('customer_email');
          $this->db->from('customer_information');
          $this->db->where('customer_email',$email);

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

    public function emailExists($email,$customer_id){
      try{
          $this->db->select('customer_email');
          $this->db->from('customer_information');
          $this->db->where('customer_email',$email);
          $this->db->where_not_in('customer_id',$customer_id);
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

    public function update_customer(){
      try{
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
          );

          $this->db->where('customer_id', $this->input->post('customer_id'));
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

    public function delete_customer($id){
      $this->db->set('is_active', 0);
      $this->db->where('customer_id', $id);
      return $this->db->update('customer_information');
    }

    public function get_refund_order_previous_transaction($date_filter) {

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

            // print $this->db->last_query();
            // exit();

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


           //** Rajeswari Updated on 19-march **//
    public function get_product_data_print_labels($id){
      try{
            $this->db->select('if(product_information.short_name != "",product_information.short_name, product_information.product_name) AS product_name,case_upc,onsale_price,store_promotion_price,product_id,id,image_thumb');
            $this->db->from('product_information');
            $this->db->where_in('product_information.product_id',$id);
            $query=$this->db->get();
            return $query->result();
           }
        catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

     public function getPrintLabelsData($check_ids) {
          try{
             $this->db->select('product_name,case_upc,onsale_price,store_promotion_price,product_id,id,image_thumb');
             $this->db->from('product_information');
             $this->db->where_in('product_information.product_id',$check_ids);
             //getPrintLabelsData
              $query = $this->db->get();
              return $query->result();

           }
        catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function get_permission_ajax() {
      try {
          $Role_id = $this->input->post("Role_id");
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


    public function get_brand_name($brandid){
        try {
            $this->db->select('brand_name');
            $this->db->from('brand');
            $this->db->where('brand_id', $brandid);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0){
                return $query->row();
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }


    public function update_permission($user_id,$data){
        try{
            $this->db->select('user_id');
            $this->db->from('front_role_extra_permission');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0){
                $this->db->where('user_id', $user_id);
                if($this->db->update('front_role_extra_permission', $data)){
                    $user_id        =  $this->session->userdata('username');
                    $notification   = 'Update Employee Permissions';
                    $action_id      =  $this->session->userdata('username');
                    $action         = 'update permission';
                    $module         = 'store setting';

                    $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                    return TRUE;
                }
            }else{
                $data['user_id'] = $user_id;
                if($this->db->insert('front_role_extra_permission', $data)){
                  $user_id        =  $this->session->userdata('username');
                  $notification   = 'Update Employee Permissions';
                  $action_id      =  $this->session->userdata('username');
                  $action         = 'update permission';
                  $module         = 'store setting';

                  $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                  return TRUE;
                }
            }
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

    public function get_perm_ajax() {
        try {
            $user_id = $this->session->userdata['username'];
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


    public function fetch_coupon_by_search($coupon){
        try{
          $this->db->select('*');
          $this->db->from('coupon_new');
          $this->db->where('is_deleted', 0);
          $this->db->where('manage_type', 0);
          $this->db->like('coupon_name',$coupon);
          $this->db->order_by('end_date', 'ASC');
          $query = $this->db->get();

          if($query->num_rows()>0){
            return $query->result();
          }
        }catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function fetch_promotion_by_search($promotion){
        try{
          $this->db->select('*');
          $this->db->from('coupon_new');
          $this->db->where('is_deleted', 0);
          $this->db->where('manage_type', 1);
          $this->db->like('coupon_name',$promotion);
          $this->db->order_by('end_date', 'ASC');
          $query = $this->db->get();

          if($query->num_rows()>0){
            return $query->result();
          }
        }catch (Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_replicate_by_id($product_id){
        try{
            $this->db->select('product_category.category_id,product_category.category_name,brand.brand_id,brand.brand_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('brand','brand.brand_id = product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.product_id',$product_id);
            $query = $this->db->get();
            return $query->row();

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


     public function get_cash_advance_hrms() {
          // $date = new DateTime("now");
          // $dat=date('Y-m-d');
        // $dat='2021-04-09';
        try{
            $this->db->select('users.first_name,users.last_name,tbl_advance.*');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            // $this->db->where('Date(tbl_advance.created_at)', $dat);
            $this->db->where('tbl_advance.employee_id', $this->session->userdata['username']);
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


    public function get_all_leave_hrms(){
        // $date = new DateTime("now");
        // $dat=date('Y-m-d');
        try{
            $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
                $this->db->from('tbl_emp_leave');
                $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
                $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
                $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
                // $this->db->where('Date(tbl_emp_leave.created_at)', $dat);
                $this->db->where('tbl_emp_leave.employee_id', $this->session->userdata['username']);
                $this->db->order_by('tbl_emp_leave.updated_at', 'DESC' );
                $this->db->limit('4');
                $query =$this->db->get();
              // echo $this->db->last_query(); exit;
                return $query->result_array();
        }catch(Exception $ex){
                error_log($ex->getTraceAsString());
                echo $ex->getTraceAsString();
                return FALSE;
            }
    }

    // public function get_cash_advance_hrms() {
    //     $date1=date('m-d-Y');
    //     try{
    //         $this->db->select('users.first_name,users.last_name,tbl_advance.*');
    //         $this->db->from('tbl_advance');
    //         $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
    //         $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
    //          $this->db->where('start_date', $date1);
    //          //cho $this->db->last_query(); exit;
    //         $query =$this->db->get();
    //         return $query->result_array();
    //     }catch(Exception $ex){
    //         error_log($ex->getTraceAsString());
    //         echo $ex->getTraceAsString();
    //         return FALSE;
    //     }
    // }

    public function salesSummaryData() {

        $SalesSummaryArr = array();

        // ST - For SalesToday
        $this->db->select('FORMAT(SUM(total_amount),2) as SalesToday');
        $this->db->from('order');
        $this->db->where("DATE(order_date) BETWEEN '".$this->start_date."' AND '".$this->end_date."'");
        $SalesTodayQuery = $this->db->get();

        if($SalesTodayQuery->num_rows()>0) {
            $SalesTodayResult              = $SalesTodayQuery->result();
            $SalesSummaryArr["SalesToday"] = $SalesTodayResult[0]->SalesToday;
        }
        // EN - For SalesToday

        // ST - For SalesYesterday
        $this->db->select('FORMAT(SUM(total_amount),2) as SalesYesterday');
        $this->db->from('order');
        $this->db->where('DATE(order_date) = DATE_SUB(CURDATE(),INTERVAL 1 DAY)', NULL, FALSE);
        $SalesYesterdayQuery = $this->db->get();

        if($SalesYesterdayQuery->num_rows()>0) {
            $SalesYesterdayResult              = $SalesYesterdayQuery->result();
            $SalesSummaryArr["SalesYesterday"] = $SalesYesterdayResult[0]->SalesYesterday;
        }
        // EN - For SalesYesterday

        // ST - For SalesDayLastYear
        $this->db->select('FORMAT(SUM(total_amount),2) as SalesDayLastYear');
        $this->db->from('order');
        $this->db->where('DATE(order_date) = DATE_SUB(CURDATE(),INTERVAL 1 YEAR)', NULL, FALSE);
        $SalesDayLastYearQuery = $this->db->get();

        if($SalesDayLastYearQuery->num_rows()>0) {
            $SalesDayLastYearResult              = $SalesDayLastYearQuery->result();
            $SalesSummaryArr["SalesDayLastYear"] = $SalesDayLastYearResult[0]->SalesDayLastYear;
        }
        // EN - For SalesDayLastYear

        // ST - For SalesWeek

        // $previous_week = strtotime("last monday");
        // $start_week = strtotime("last monday midnight",$previous_week);
        // $end_week = strtotime("next sunday",$start_week);

        //check the current day
        if(date('D')!='Mon') {
            //take the last monday
            $staticstart = date('Y-m-d',strtotime('last Monday'));
        }else{
            $staticstart = date('Y-m-d');
        }

        //always next sunday
        /*if(date('D')!='Sun')
        {
            $staticfinish = date('Y-m-d',strtotime('next Sunday'));
        }else{*/
            $staticfinish = date('Y-m-d');
        // }

        $start_week = $staticstart;
        $end_week   = $staticfinish;

        $this->db->select('FORMAT(SUM(total_amount),2) as SalesWeek');
        $this->db->from('order');
        $this->db->where("DATE(order_date) BETWEEN '".$start_week."' AND '".$end_week."'");
        $SalesWeekQuery = $this->db->get();
        // print "==============================".$this->db->last_query();

        if($SalesWeekQuery->num_rows()>0) {
            $SalesWeekResult              = $SalesWeekQuery->result();
            $SalesSummaryArr["SalesWeek"] = $SalesWeekResult[0]->SalesWeek;
        }
        // EN - For SalesWeek

        // ST - For SalesLastWeek
        $this->db->select('FORMAT(SUM(total_amount),2) as SalesLastWeek');
        $this->db->from('order');

        $this->db->where('DATE(order_date) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY', NULL, FALSE);
        $this->db->where('DATE(order_date) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY', NULL, FALSE);

        $SalesLastWeekQuery = $this->db->get();

        if($SalesLastWeekQuery->num_rows()>0) {
            $SalesLastWeekResult              = $SalesLastWeekQuery->result();
            $SalesSummaryArr["SalesLastWeek"] = $SalesLastWeekResult[0]->SalesLastWeek;
        }
        // EN - For SalesLastWeek

        // ST - For SalesThisWeekLastYear
        $this->db->select('FORMAT(SUM(total_amount),2) as SalesThisWeekLastYear');
        $this->db->from('order');
        $this->db->where('YEARWEEK(DATE_SUB( `order_date`, INTERVAL 4 YEAR ),3) = YEARWEEK(DATE_SUB( NOW(), INTERVAL 4 YEAR ),3)', NULL, FALSE);
        $SalesThisWeekLastYearQuery = $this->db->get();

        if($SalesThisWeekLastYearQuery->num_rows()>0) {
            $SalesThisWeekLastYearResult              = array(); //$SalesThisWeekLastYearQuery->result();
            $SalesSummaryArr["SalesThisWeekLastYear"] = $SalesThisWeekLastYearResult[0]->SalesThisWeekLastYear;
        }
        // EN - For SalesThisWeekLastYear

        /////////////////// Month ////////////////////////////

        // ST - For SalesMonth
        $current_month = date("m");
        $current_year  = date("Y");

        $start_date_month = $current_year."-".$current_month."-01";
        $end_date_month   = date("Y-m-d");

        $this->db->select('FORMAT(SUM(total_amount),2) as SalesMonth');
        $this->db->from('order');
        $this->db->where("DATE(order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");
        $SalesMonthQuery = $this->db->get();
        // print $this->db->last_query(); exit();

        if($SalesMonthQuery->num_rows()>0) {
            $SalesMonthResult              = $SalesMonthQuery->result();
            $SalesSummaryArr["SalesMonth"] = $SalesMonthResult[0]->SalesMonth;
        }
        // EN - For SalesMonth

        // ST - For Last SalesMonth
        $current_month = date("m");
        $current_year  = date("Y");

        $start_date_month = date("Y-m-d", strtotime("first day of previous month"));
        $end_date_month   = date("Y-m-d", strtotime("last day of previous month"));

        $this->db->select('FORMAT(SUM(total_amount),2) as SalesMonth');
        $this->db->from('order');
        $this->db->where("DATE(order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");
        $SalesMonthQuery = $this->db->get();

        if($SalesMonthQuery->num_rows()>0) {
            $SalesMonthResult              = $SalesMonthQuery->result();
            $SalesSummaryArr["SalesLastMonth"] = $SalesMonthResult[0]->SalesMonth;
        }
        // EN - For Last SalesMonth

        // ST - For Last Year SalesMonth
        $current_month = date("m");
        $current_year  = date("Y",strtotime("-1 year"));

        $dateToTest    = date("Y-m-d");
        $lastday = date('t',strtotime($dateToTest));

        $start_date_month = $current_year."-".$current_month."-01";
        $end_date_month   = $current_year."-".$current_month."-".$lastday;

        $this->db->select('FORMAT(SUM(total_amount),2) as SalesMonth');
        $this->db->from('order');
        $this->db->where("DATE(order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");
        $SalesMonthQuery = $this->db->get();

        if($SalesMonthQuery->num_rows()>0) {
            $SalesMonthResult              = array(); //$SalesMonthQuery->result();
            $SalesSummaryArr["SalesLastYearMonth"] = $SalesMonthResult[0]->SalesMonth;
        }
        // EN - For Last Year SalesMonth

        return $SalesSummaryArr;
    }

    public function scratcherSalesData() {

        $ScratcherSalesArr = array();

        $this->db->select('order.order_id,product_information.bin,SUM(order_details.quantity) as quantity');
        $this->db->from('order');
        $this->db->join('order_details','order_details.order_id=order.order_id','LEFT');
        $this->db->join('product_information','product_information.product_id=order_details.product_id','LEFT');
        $this->db->where('product_information.is_scratchable', 1);

        $st=" product_information.bin in (select id from tbl_scratcher_bins)";
        $this->db->where($st, NULL, FALSE);

        if($this->start_date != date("Y-m-d")) {
            $this->db->where("DATE(order_date) BETWEEN '".$this->start_date."' AND '".$this->end_date."'");
        } else {
            $this->db->where('DATE(order_date)', date("Y-m-d"));
        }

        $this->db->group_by('product_information.bin');
        $this->db->order_by('product_information.created_at','desc');
        $this->db->order_by('order_details.quantity','desc');
        $this->db->limit('10');
        $query = $this->db->get();

        // print $this->db->last_query();
        // exit();

        $scratcher_sales_bin_arr = array();
        $scratcher_sales_qty_arr = array();

        if($this->db->affected_rows() > 0) {
            $scratcher_sales_result = $query->result();

            foreach ($scratcher_sales_result as $key => $value) {

                if($value->quantity != "") {

                    if($value->bin != "") {
                        $scratcher_sales_bin_arr[] = "Bin#".$value->bin;
                    }

                    if($value->quantity != "") {
                        $scratcher_sales_qty_arr[] = $value->quantity;
                    } else {
                        $scratcher_sales_qty_arr[] = 0;
                    }
                }
            }
        }
        $ScratcherSalesArr["scratcher_sales_bin_arr"] = $scratcher_sales_bin_arr;
        $ScratcherSalesArr["scratcher_sales_qty_arr"] = $scratcher_sales_qty_arr;
        return $ScratcherSalesArr;
    }

    public function ssReportData($bin_id_arr=array(),$start_date="",$end_date="") {

        // $bin = str_replace("Bin#","",$bin);
        $master_arr = array();

        $this->db->select('order.order_id,order.order_date,product_information.product_name,product_information.bin,order_details.quantity');
        $this->db->from('order');
        $this->db->join('order_details','order_details.order_id=order.order_id','LEFT');
        $this->db->join('product_information','product_information.product_id=order_details.product_id','LEFT');
        $this->db->where('product_information.is_scratchable', 1);

        if(!empty($bin_id_arr)) {

            if(count($bin_id_arr) == 1 && $bin_id_arr[0] == "") {
            } else {
                $st=" product_information.bin in ('".implode("','",$bin_id_arr)."')";
                $this->db->where($st, NULL, FALSE);
            }
        }

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(order.order_date) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $this->db->where('DATE(order.order_date)', date("Y-m-d"));
        }

        $this->db->order_by('product_information.created_at','desc');
        $this->db->order_by('order_details.quantity','desc');

        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        // print $this->db->last_query();
        // exit();
        $master_arr["product_details"] = $result_prod;
        return $master_arr;
    }

    public function payoutData($start_date="",$end_date="") {

        $payout_arr                = array();
        $payout_money_vendor_arr   = array();
        $payout_money_employee_arr = array();
        $payout_sp_arr             = array();
        $suffix_arr                = array();
        $week_date_arr             = array();
        /////////////////////////////////////

        if($start_date != "" && $end_date != "") {
            $begin = new DateTime($start_date);
            $end = new DateTime($end_date);
            $end->modify('+1 day');

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $dt = $dt->format("Y-m-d");
                $suffix_arr[] = date("dS", strtotime($dt));
                $week_date_arr[] = date("Y-m-d", strtotime($dt));
                $payout_money_vendor_arr[date("j", strtotime($dt))] = 0;
                $payout_money_employee_arr[date("j", strtotime($dt))] = 0;
                $payout_sp_arr[date("j", strtotime($dt))] = 0;
            }
        } else {

            for ($i=0; $i<7; $i++) {
                // echo date("d/m - dS", strtotime($i." days ago")).'<br />';
                $suffix_arr[] = date("dS", strtotime($i." days ago"));
                $week_date_arr[] = date("Y-m-d", strtotime($i." days ago"));
                $payout_money_vendor_arr[date("j", strtotime($i." days ago"))] = 0;
                $payout_money_employee_arr[date("j", strtotime($i." days ago"))] = 0;
                $payout_sp_arr[date("j", strtotime($i." days ago"))] = 0;
            }
        }

        foreach ($week_date_arr as $key_d => $value_d) {

            $this->db->select('payout_money,type,DAY(created_at) as temp_day');
            $this->db->from('tbl_payout');
            $this->db->where('DATE(created_at)', $value_d);
            // $this->db->where('week(created_at) = week(now())-1', NULL, FALSE);
            $query_vendor = $this->db->get();

            // print $this->db->last_query();
            // print "<hr>";

            $result_vendor = $query_vendor->result();

            foreach ($result_vendor as $key_v => $value_v) {

                if($value_v->type == "Vendor") {
                    if($value_v->payout_money != "") {
                        if($payout_money_vendor_arr[$value_v->temp_day] != "")
                            $payout_money_vendor_arr[$value_v->temp_day] = $payout_money_vendor_arr[$value_v->temp_day] + $value_v->payout_money;
                        else
                            $payout_money_vendor_arr[$value_v->temp_day] = $value_v->payout_money;
                    }
                }

                if($value_v->type == "Employee") {
                    if($value_v->payout_money != "") {

                        if($payout_money_employee_arr[$value_v->temp_day] != "")
                            $payout_money_employee_arr[$value_v->temp_day] = $payout_money_employee_arr[$value_v->temp_day] + $value_v->payout_money;
                        else
                            $payout_money_employee_arr[$value_v->temp_day] = $value_v->payout_money;
                    }
                }
            }

            // ST - Scratchers Payout
            $this->db->select('FORMAT(SUM(payout_amount),2) as payout_amount,DAY(payout_date) as temp_day2');
            $this->db->from('tbl_scratchers_payout');
            $this->db->where('DATE(payout_date)', $value_d);
            $query_sp   = $this->db->get();
            $result_sp  = $query_sp->result();
            foreach ($result_sp as $key_vv => $value_vv) {
                if($value_vv->payout_amount != "") {
                    $payout_sp_arr[$value_vv->temp_day2] = str_replace(",", "", $value_vv->payout_amount);
                }
            }
            // EN - Scratchers Payout
        }
        /////////////////////////////////////

        $payout_arr["payout_money_vendor_arr"]   = array_reverse($payout_money_vendor_arr);
        $payout_arr["payout_money_employee_arr"] = array_reverse($payout_money_employee_arr);
        $payout_arr["payout_sp_arr"]             = array_reverse($payout_sp_arr);
        $payout_arr["suffix_arr"]                = array_reverse($suffix_arr);
        return $payout_arr;
    }

    public function KPIData($start_date="",$end_date="") {

        $this->db->select('*');
        $this->db->from('kpi_detail');

        if($this->start_date != date("Y-m-d")) {
            $this->db->where("DATE(kpi_date) BETWEEN '".$this->start_date."' AND '".$this->end_date."'");
        } else {
            $this->db->where("DATE(kpi_date)",date("Y-m-d"));
        }
        $kpi_res = $this->db->get()->result_array();

        $kpi_arr    = array();
        $kpi_arr[1] = "green";
        $kpi_arr[2] = "green";
        $kpi_arr[3] = "green";
        $kpi_arr[4] = "green";
        $kpi_arr[5] = "green";

        if(!empty($kpi_res)) {
            foreach ($kpi_res as $key => $value) {

                $color = "green";

                // Opening/Closing
                if($value["kpi_type"] == 1) {
                    if($value["kpi_value"] == 0)
                        $color = "green";
                    else if($value["kpi_value"] <= 20)
                        $color = "yellow";
                    else if($value["kpi_value"] > 20)
                        $color = "red";
                }

                // Transaction Void / No Sale / Price Override
                if($value["kpi_type"] == 2 || $value["kpi_type"] == 3 || $value["kpi_type"] == 4) {
                    if($value["kpi_value"] == 0)
                        $color = "green";
                    else if($value["kpi_value"] <= 2)
                        $color = "yellow";
                    else if($value["kpi_value"] > 2)
                        $color = "red";
                }

                // Cash Drop
                if($value["kpi_type"] == 5) {
                    if($value["kpi_value"] <= 3)
                        $color = "yellow";
                    else if($value["kpi_value"] > 3)
                        $color = "red";
                }

                $kpi_arr[$value["kpi_type"]] = $color;
            }
        }
        return $kpi_arr;
    }

    public function insert_kpi_data($kpi_type,$kpi_value) {

        $this->db->select('*');
        $this->db->from('kpi_detail');
        $this->db->where('kpi_type',$kpi_type);
        $this->db->where('kpi_date',date("Y-m-d"));
        $result = $this->db->get()->result_array();

        if(!empty($result)) {

            $this->db->query("UPDATE `kpi_detail` SET `kpi_value` = kpi_value + ".$kpi_value."
            WHERE `kpi_type` = $kpi_type AND `kpi_date` = '".date("Y-m-d")."'");

        } else {
            $this->db->insert('kpi_detail', array('kpi_type' => $kpi_type, 'kpi_value' => $kpi_value, 'kpi_date' => date("Y-m-d")));
        }

        if($kpi_type == 2 || $kpi_type == 3) { // 3 - No Sale, 2 - Transaction Void
            $event_type = ($kpi_type == 2 ) ? 1 : 2;
            $this->db->insert('kpi_detail_void_no_sale', array('event_type' => $event_type, 'user_id' => $this->session->userdata['username'], 'shift_id' => $this->session->userdata['shiftdata']['shift_id'], 'created_at' => date("Y-m-d")));
        }
    }

    public function insert_kpi_detail_price_override($param) {
        $this->db->insert('kpi_detail_price_override', $param);
    }

    public function salesAndMarginComparisonData($cat_id='',$day_of_date='',$from_where='chart',$start_date='',$end_date='') { // chart / details

        $sm_arr                    = array();
        $payout_money_sales_arr    = array();
        $payout_money_margin_arr   = array();
        $suffix_arr                = array();
        $week_date_arr             = array();
        /////////////////////////////////////

        if($start_date != "" && $end_date != "") {
            $begin = new DateTime($start_date);
            $end = new DateTime($end_date);
            $end->modify('+1 day');

            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $dt) {
                $dt = $dt->format("Y-m-d");
                $suffix_arr[] = date("dS", strtotime($dt));
                $week_date_arr[] = date("Y-m-d", strtotime($dt));
                $payout_money_sales_arr[date("j", strtotime($dt))] = 0;
                $payout_money_margin_arr[date("j", strtotime($dt))] = 0;
            }
        } else {

            for ($i=0; $i<7; $i++) {
                // echo date("d/m - dS", strtotime($i." days ago")).'<br />';
                $suffix_arr[] = date("dS", strtotime($i." days ago"));
                $week_date_arr[] = date("Y-m-d", strtotime($i." days ago"));
                $payout_money_sales_arr[date("j", strtotime($i." days ago"))] = 0;
                $payout_money_margin_arr[date("j", strtotime($i." days ago"))] = 0;
            }
        }

        foreach ($week_date_arr as $key_d => $value_d) {

            $this->db->select('IF(product_information.store_promotion_price > 0,FORMAT(SUM(product_information.store_promotion_price), 2),FORMAT(SUM(product_information.onsale_price), 2) * `order_details`.`quantity`) as sales_total, IF(product_information.store_promotion_price > 0,FORMAT(product_information.store_promotion_price - product_information.supplier_price, 2),FORMAT(product_information.onsale_price - product_information.supplier_price, 2) * `order_details`.`quantity`) as margin,DAY(ord.order_date) as temp_day,
                IF(product_information.store_promotion_price > 0,product_information.store_promotion_price,`product_information`.`onsale_price`) as sale_price_final , `product_information`.`supplier_price`,SUM(`order_details`.`quantity`) as qty,product_information.product_name,(select category_name from product_category where category_id = product_information.category_id) as category_name,ord.order_date');
            $this->db->from('order ord');
            $this->db->join('order_details','order_details.order_id=ord.order_id','LEFT');
            $this->db->join('product_information','product_information.product_id=order_details.product_id','LEFT');


            if($start_date == "" && $end_date == "") {
                if($day_of_date != "")
                    $this->db->where('DATE(ord.order_date)', $day_of_date);
                else
                    $this->db->where('DATE(ord.order_date)', $value_d);
            } else {
                $this->db->where("DATE(ord.order_date) BETWEEN '".$start_date."' AND '".$end_date."'");
            }

            if($cat_id != '' && $cat_id != 'all') {
                $this->db->where('product_information.category_id', $cat_id);
            }

            $this->db->where('product_information.product_id != ""', NULL, FALSE);
            $this->db->group_by('product_information.product_id');

            $query_sm  = $this->db->get();

            // print $this->db->last_query();
            // exit();

            $result_sm = $query_sm->result();

            foreach ($result_sm as $key_v => $value_v) {

                if($value_v->supplier_price != "") {
                    $value_v->supplier_price = number_format($value_v->supplier_price,2);
                    $sales_t =  str_replace(",", "", $value_v->supplier_price) * $value_v->qty;

                    if($payout_money_margin_arr[$value_v->temp_day] != "")
                        $payout_money_margin_arr[$value_v->temp_day] = $payout_money_margin_arr[$value_v->temp_day] + $sales_t;
                    else
                        $payout_money_margin_arr[$value_v->temp_day] = $sales_t;
                }
                if($value_v->sale_price_final != "") {
                    $value_v->sale_price_final = number_format($value_v->sale_price_final,2);
                    $sale_price_final =  str_replace(",", "", $value_v->sale_price_final) * $value_v->qty;

                    if($payout_money_sales_arr[$value_v->temp_day] != "")
                        $payout_money_sales_arr[$value_v->temp_day] = $payout_money_sales_arr[$value_v->temp_day] + $sale_price_final;
                    else
                        $payout_money_sales_arr[$value_v->temp_day] = $sale_price_final;
                }
            }
        }
        /////////////////////////////////////

        $sm_arr["payout_money_sales_arr"]   = array_reverse($payout_money_sales_arr);
        $sm_arr["payout_money_margin_arr"]  = array_reverse($payout_money_margin_arr);
        $sm_arr["suffix_arr"]               = array_reverse($suffix_arr);

        if($from_where == "chart")
            return $sm_arr;
        else
            return $result_sm;
    }

    public function frequentlySoldItemsData() {

        $fs_arr     = array();
        $fs_cat     = array();
        $fs_cat_id  = array();
        $fs_stats   = array();

        $this->db->select('pi.category_id,count(od.product_id) as fs_count, (select DISTINCT(category_name) from product_category where product_category.category_id = pi.category_id) as category_name');
            $this->db->from('order_details od');
            $this->db->join('product_information pi','pi.product_id = od.product_id','LEFT');
            $this->db->join('order o','o.order_id = od.order_id','LEFT');
            $this->db->where('pi.category_id != ""', NULL, FALSE);

            if($this->start_date != date("Y-m-d")) {
                $this->db->where("DATE(o.order_date) BETWEEN '".$this->start_date."' AND '".$this->end_date."'");
            } else {

                $current_month = date("m");
                $current_year  = date("Y");

                $start_date_month = $current_year."-".$current_month."-01";
                $end_date_month   = date("Y-m-d");

                $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");
            }

            $this->db->group_by('pi.category_id');
            $this->db->order_by('fs_count', 'desc');
            $this->db->limit('5');

        $querys     = $this->db->get();
        $fs_result  = $querys->result_array();
        // print $this->db->last_query();

        if(!empty($fs_result)) {
            foreach ($fs_result as $key => $value) {
                if(!in_array($value["category_name"], $fs_cat)){
                   $fs_cat[]    = $value["category_name"];
                   $fs_cat_id[] = $value["category_id"];
                   $fs_stats[]  = $value["fs_count"];
                }
            }
        }

        $fs_arr["fs_cat"]     = $fs_cat;
        $fs_arr["fs_cat_id"]  = $fs_cat_id;
        $fs_arr["fs_stats"]   = $fs_stats;

        return $fs_arr;
    }

    public function reportData($cat_id=array(),$start_date="",$end_date="") {

        $master_arr = array();
        $this->db->select('pc.category_name,o.order_id,pi.product_id,count(od.product_id) as fs_count, pi.product_name,(select sum(quantity) from order_details where order_details.product_id = pi.product_id) as sold_qty,o.order_date');
        $this->db->from('order_details od');
        $this->db->join('product_information pi','pi.product_id = od.product_id','LEFT');
        $this->db->join('product_category pc','pc.category_id = pi.category_id','LEFT');
        $this->db->join('order o','o.order_id = od.order_id','LEFT');

        if(!empty($cat_id)) {

            if(count($cat_id) == 1 && $cat_id[0] == "") {
            } else {
                $st=" pi.category_id in ('".implode("','",$cat_id)."')";
                $this->db->where($st, NULL, FALSE);
            }
        }

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(o.order_date) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $current_month = date("m");
            $current_year  = date("Y");

            $start_date_month = $current_year."-".$current_month."-01";
            $end_date_month   = date("Y-m-d");

            $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");
        }

        $this->db->group_by('pi.product_id');
        $this->db->order_by('fs_count', 'desc');
        $query_prod  = $this->db->get();
        // print $this->db->last_query();
        // exit();
        $result_prod = $query_prod->result_array();
        $master_arr["product_details"] = $result_prod;

        return $master_arr;
    }

    public function inventoryStockData() {

        $is_arr     = array();
        $is_cat     = array();
        $is_stats   = array();

        $this->db->select('pc.category_name,(select sum(pi.quantity) from product_information as pi where pi.category_id = pc.category_id) as tot_qty');
            $this->db->from('product_category pc');
            $this->db->order_by('tot_qty', 'desc');
            $this->db->limit('5');

        $querys     = $this->db->get();
        $is_result  = $querys->result_array();

        if(!empty($is_result)) {
            foreach ($is_result as $key => $value) {
               $is_cat[]   = $value["category_name"];
               $is_stats[] = $value["tot_qty"];
            }
        }

        $is_arr["is_cat"]     = $is_cat;
        $is_arr["is_tot_qty"] = $is_stats;

        return $is_arr;

    }

    public function payoutSummaryData($params=array(),$from_where='chart_details') {

        $date_clicked      = !empty($params["date_clicked"]) ? $params["date_clicked"] : "";
        $payout_type       = !empty($params["payout_type"]) ? $params["payout_type"] : "";
        $start_date_filter = !empty($params["start_date_filter"]) ? $params["start_date_filter"] : "";
        $end_date_filter   = !empty($params["end_date_filter"]) ? $params["end_date_filter"] : "";

        $payoutSummaryArr = array();

        // ST - Lotto Payout
        $this->db->select('s.lotto_name,s.payout_amount as payout_amount, s.payout_date as cash_out_date, s.payment_type');
        $this->db->from('tbl_scratchers_payout as s');
        $this->db->where('s.scratcher_id',0);

        if($start_date_filter != "" && $end_date_filter != "") {
            $this->db->where("DATE(payout_date) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
        } else {

            if($from_where == 'chart_details' && $date_clicked != "") {
                $this->db->where('DATE(payout_date)', $date_clicked);
            } else {
                $this->db->where('DATE(payout_date)', date("Y-m-d"));
            }
        }

        $query      = $this->db->get();

        // print $this->db->last_query();
        // exit();

        if ($query->num_rows() > 0) {
            $payoutSummaryArr["LottoPayout"] = $query->result_array();
        }
        // EN - Lotto Payout

        // ST - Scratcher Payout
        $this->db->select('pi.case_UPC as scratcher_upc, pi.onsale_price, s.payout_amount as cash_out_amt, s.payout_date as cash_out_date, s.payment_type');
        $this->db->from('tbl_scratchers_payout as s');
        $this->db->join('product_information pi','pi.case_UPC = s.scratcher_id','INNER');
        $this->db->where('pi.is_scratchable',1);
        $this->db->where('s.scratcher_id !=',0);

        if($start_date_filter != "" && $end_date_filter != "") {
            $this->db->where("DATE(payout_date) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
        } else {

            if($from_where == 'chart_details' && $date_clicked != "") {
                $this->db->where('DATE(payout_date)', $date_clicked);
            } else {
                $this->db->where('DATE(payout_date)', date("Y-m-d"));
            }
        }

        $query      = $this->db->get();

        // print $this->db->last_query();
        // exit();

        if ($query->num_rows() > 0) {
            $payoutSummaryArr["ScratcherPayout"] = $query->result_array();
        }
        // EN - Scratcher Payout

        // ST - Employee Payout
        $this->db->select('*');
        $this->db->from('tbl_payout');
        $this->db->where('type','Employee');

        if($start_date_filter != "" && $end_date_filter != "") {
            $this->db->where("DATE(created_at) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
        } else {

            if($from_where == 'chart_details' && $date_clicked != "") {
                $this->db->where('DATE(created_at)', $date_clicked);
            } else {
                $this->db->where('DATE(created_at)', date("Y-m-d"));
            }
        }

        $query_e      = $this->db->get();

        // print $this->db->last_query();
        // exit();

        if ($query_e->num_rows() > 0) {
            $payoutSummaryArr["EmployeePayout"] = $query_e->result_array();
        }
        // EN - Employee Payout

        // ST - Vendor Payout
        $this->db->select('*,(select category_name from product_category where product_category.category_id = tbl_payout.category_id) as category_name');
        $this->db->from('tbl_payout');
        $this->db->where('type','Vendor');

        if($start_date_filter != "" && $end_date_filter != "") {
            $this->db->where("DATE(created_at) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
        } else {

            if($from_where == 'chart_details' && $date_clicked != "") {
                $this->db->where('DATE(created_at)', $date_clicked);
            } else {
                $this->db->where('DATE(created_at)', date("Y-m-d"));
            }
        }

        $query_v      = $this->db->get();
        if ($query_v->num_rows() > 0) {
            $payoutSummaryArr["VendorPayout"] = $query_v->result_array();
        }
        // EN - Vendor Payout
        return $payoutSummaryArr;
    }

    public function scratcherInventoryData($params=array()) {

        $start_date_filter = !empty($params["start_date_filter"]) ? $params["start_date_filter"] : "";
        $end_date_filter   = !empty($params["end_date_filter"]) ? $params["end_date_filter"] : "";

        try{
            $this->db->select('pi.product_id,999 as store_id,pi.scracher_current_no as scracher_current_no ,pi.product_name as scratcher_name, pi.bin as bin_id, pi.onsale_price as scratcher_price, pi.quantity as qty, (select sum(od.quantity) from order_details as od where od.product_id = pi.product_id) as sold_qty,pi.case_UPC as scratcher_upc');
            $this->db->from('order as o');
            $this->db->join('order_details as od','od.order_id=o.order_id','LEFT');
            $this->db->join('product_information as pi','pi.product_id=od.product_id','LEFT');
            $this->db->where('pi.is_scratchable',1);

            if($start_date_filter != "" && $end_date_filter != "") {
                $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
            } else {
                $this->db->where('DATE(o.order_date)', date("Y-m-d"));
            }

            $this->db->order_by('o.id','desc');

            $query_si      = $this->db->get();

            // print $this->db->last_query();
            // exit();

            $result_si_arr = $query_si->result_array();
            return $result_si_arr;

        } catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function scratcherSalesSummaryData($start_date="",$end_date="") {

        $this->db->select('pi.case_UPC as scratcher_upc,pi.onsale_price as scratcher_price, pi.quantity as qty, (select sum(od.quantity) from order_details as od where od.product_id = pi.product_id) as sold_qty,(pi.quantity - (select sum(od.quantity) from order_details as od where od.product_id = pi.product_id)) as remain_qty,pi.product_name as scratcher_name,o.order_date as sale_date');
        $this->db->from('product_information pi');
        $this->db->join('order_details od','od.product_id=pi.product_id','LEFT');
        $this->db->join('order o','o.order_id=od.order_id','LEFT');
        $this->db->where('is_scratchable', 1);

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(o.order_date) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $this->db->where('DATE(o.order_date)', date("Y-m-d"));
        }

        $this->db->order_by('pi.created_at','desc');
        $this->db->order_by('od.quantity','desc');

        $query_sssd = $this->db->get();
        $result_sssd = $query_sssd->result();
        return $result_sssd;
    }

    public function top10SellingItemsData($cat_id=array(),$no_of_items=10,$product_name="",$start_date="",$end_date="",$top_selling_type_of_month="") {

        if($top_selling_type_of_month != "") {

            if($top_selling_type_of_month == "this_month") {

                $current_month = date("m");
                $current_year  = date("Y");

                $start_date_month = $current_year."-".$current_month."-01";
                $end_date_month   = date("Y-m-d");

            } else if($top_selling_type_of_month == "last_month") {

                $start_date_month = date("Y-m-d", strtotime("first day of -1 month"));
                $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));

            } else if($top_selling_type_of_month == "last_3month") {

                $start_date_month = date("Y-m-d", strtotime("first day of -3 month"));
                $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));

            } else if($top_selling_type_of_month == "last_6month") {

                $start_date_month = date("Y-m-d", strtotime("first day of -6 month"));
                $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));

            } else if($top_selling_type_of_month == "last_9month") {

                $start_date_month = date("Y-m-d", strtotime("first day of -9 month"));
                $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));
            }

            $this->db->select('pi.product_id,pc.category_name,cn.coupon_name,count(od.product_id) as fs_count, pi.product_name,(select sum(quantity) from order_details where DATE(order_details.created_at) BETWEEN "'.$start_date_month.'" AND "'.$end_date_month.'" and order_details.product_id = pi.product_id) as sold_qty,o.order_date');

        } else {

            $current_month = date("m");
            $current_year  = date("Y");

            $start_date_month = $current_year."-".$current_month."-01";
            $end_date_month   = date("Y-m-d");

            $this->db->select('pi.product_id,pc.category_name,cn.coupon_name,count(od.product_id) as fs_count, pi.product_name,(select sum(quantity) from order_details where DATE(order_details.created_at) BETWEEN "'.$start_date_month.'" AND "'.$end_date_month.'" and order_details.product_id = pi.product_id) as sold_qty,o.order_date');
        }

        $this->db->from('order_details od');
        $this->db->join('product_information pi','pi.product_id = od.product_id','LEFT');
        $this->db->join('product_category pc','pc.category_id=pi.category_id','LEFT');
        $this->db->join('order o','o.order_id=od.order_id','LEFT');
        $this->db->join('coupon_new cn','cn.product_id=pi.product_id','LEFT');
        $this->db->where('pi.product_id != ""', NULL, FALSE);

        if($product_name != "") {
            $this->db->like('pi.product_name', $product_name, 'both');
        }

        if(!empty($cat_id)) {

            if(count($cat_id) == 1 && $cat_id[0] == "") {
            } else {
                $st=" pi.category_id in ('".implode("','",$cat_id)."')";
                $this->db->where($st, NULL, FALSE);
            }
        }

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(o.order_date) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {

            if($top_selling_type_of_month != "") {

                if($top_selling_type_of_month == "this_month") {

                    $current_month = date("m");
                    $current_year  = date("Y");

                    $start_date_month = $current_year."-".$current_month."-01";
                    $end_date_month   = date("Y-m-d");

                    $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");

                } else if($top_selling_type_of_month == "last_month") {

                    $start_date_month = date("Y-m-d", strtotime("first day of -1 month"));
                    $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));

                    $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");

                } else if($top_selling_type_of_month == "last_3month") {

                    $start_date_month = date("Y-m-d", strtotime("first day of -3 month"));
                    $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));

                    $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");

                } else if($top_selling_type_of_month == "last_6month") {

                    $start_date_month = date("Y-m-d", strtotime("first day of -6 month"));
                    $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));

                    $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");

                } else if($top_selling_type_of_month == "last_9month") {

                    $start_date_month = date("Y-m-d", strtotime("first day of -9 month"));
                    $end_date_month   = date("Y-m-d", strtotime("last day of -1 month"));

                    $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");
                }

            } else {

                $current_month = date("m");
                $current_year  = date("Y");

                $start_date_month = $current_year."-".$current_month."-01";
                $end_date_month   = date("Y-m-d");

                $this->db->where("DATE(o.order_date) BETWEEN '".$start_date_month."' AND '".$end_date_month."'");
            }
        }

        $this->db->group_by('pi.product_id');
        $this->db->order_by('sold_qty', 'desc');

        if($no_of_items == "")
            $this->db->limit(10);
        else
            $this->db->limit($no_of_items);

        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        // print $this->db->last_query(); exit();
        return $result_prod;
    }

    public function kpi_price_override_detail($product_name="",$start_date="",$end_date="") {

        $this->db->select("pi.product_name,kd.*,users.first_name,users.last_name");
        $this->db->from('kpi_detail_price_override as kd');
        $this->db->join('product_information pi','pi.product_id = kd.product_id','LEFT');
        $this->db->join('user_login','kd.user_id = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');

        $this->db->where('pi.product_id != ""', NULL, FALSE);

        if($product_name != "") {
            $this->db->like('pi.product_name', $product_name, 'both');
        }

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(kd.created_at) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {

            $end_date_month   = date("Y-m-d");
            $this->db->where("DATE(kd.created_at) BETWEEN '".$end_date_month."' AND '".$end_date_month."'");
        }

        $this->db->group_by('kd.order_id');
        $this->db->order_by('kd.created_at', 'desc');

        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        // print $this->db->last_query(); exit();
        return $result_prod;

    }

    public function kpi_detail_void_no_sale($event_type="",$start_date="",$end_date="") {

        $this->db->select("kd.*,users.first_name,users.last_name");
        $this->db->from('kpi_detail_void_no_sale as kd');
        $this->db->join('user_login','kd.user_id = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');
        $this->db->where('event_type',$event_type);

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(kd.created_at) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $end_date_month   = date("Y-m-d");
            $this->db->where("DATE(kd.created_at) BETWEEN '".$end_date_month."' AND '".$end_date_month."'");
        }

        $this->db->order_by('kd.created_at', 'desc');

        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        // print $this->db->last_query(); exit();
        return $result_prod;
    }

    public function kpi_detail_open_close_bal($start_date="",$end_date="") {

        if($start_date != "" && $end_date != "" && $start_date != $end_date) {           
            $main_dates[0]                  = $start_date;
            $main_dates[1]                  = $end_date;
        } else if($start_date != "" && $end_date != "" && $start_date == $end_date) {           
            $main_dates[0]                  = $start_date;            
        } else {
            $main_dates[0]                  = date("Y-m-d");
        }

        $kpi_detail_open_close_bal_arr  = array();
        $reconcillation_report_arr      = array();

        //////////// ST - Cash Proceeds
        $cash_proceeds = array();
        $cash_proceeds['label'] = "Cash Proceeds";
        $cash_proceeds_actual_count = array();

        $cash_proceeds_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_cash_proceeds = $this->get_cash_proceeds($value_dt);
            if($get_cash_proceeds[0]['cash_proceeds'] != "") {
                $cash_proceeds['data'][] = str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
                $cash_proceeds_tot = $cash_proceeds_tot + str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
                $cash_proceeds_actual_count[] = str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
            } else {
                $cash_proceeds['data'][] = '-';
                $cash_proceeds_actual_count[] = 0;
            }
        }
        $cash_proceeds['data'][] = number_format($cash_proceeds_tot,2);
        $cash_proceeds_actual_count[] = $cash_proceeds_tot;
        $cash_sales = $cash_proceeds;
        $reconcillation_report_arr['cash_proceeds'] = $cash_proceeds;
        //////////// EN - Cash Proceeds

        //////////// ST - Opening Cash
        $opening_cash = array();
        $opening_cash['label'] = "Opening Cash";
        $opening_cash_tot = 0.00;
        $opening_cash_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_opening_cash = $this->get_opening_cash($value_dt);
            if($get_opening_cash[0]['cash_in_drawer'] != "") {
                $oc = str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
                $opening_cash['data'][] = number_format($oc,2);
                $opening_cash_tot = $opening_cash_tot + str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
                $opening_cash_actual_count[] = str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
            } else {
                $opening_cash['data'][] = '-';
                $opening_cash_actual_count[] = 0;
            }
        }
        $opening_cash['data'][] = number_format($opening_cash_tot,2);
        $opening_cash_actual_count[] = $opening_cash_tot;
        $reconcillation_report_arr['opening_cash'] = $opening_cash;
        $kpi_detail_open_close_bal_arr['opening_cash']['text']   = "Opening cash";
        $kpi_detail_open_close_bal_arr['opening_cash']['amount'] = number_format($opening_cash_tot,2);
        //////////// EN - $crv_sales_actual_count

        //////////// ST - Cash Sales
        //$cash_sales = array();
        $cash_sales['label'] = "Cash Sales";
        $reconcillation_report_arr['cash_sales'] = $cash_sales;


        ////////////////////////////////////////////////////////
        $this->db->select('total_amount as cash_sales, users.first_name as first_name,users.last_name as last_name');
        $this->db->from('order');
        $this->db->join('user_login','order.user_id = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');
        $this->db->where('is_cash_card', 1);

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(order_date) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $this->db->where('DATE(order_date)', $main_dates[0]);
        }

        $query = $this->db->get();
        $res_ord_arr =  $query->result_array();

        if(!empty($res_ord_arr)) {
            foreach ($res_ord_arr as $key_ord => $value_ord) {

                $temp_arr = array();
                $cash_sales    = $value_ord["cash_sales"];
                $cash_sales_by = $value_ord["first_name"]." ".$value_ord["last_name"];                

                $temp_arr['text'] = "Cash sales by ".$cash_sales_by;
                $temp_arr['amount'] = number_format($cash_sales,2);

                $kpi_detail_open_close_bal_arr['cash_sales'][] = $temp_arr;
            }
        }        
        ////////////////////////////////////////////////////////
        //////////// EN - Cash Sales


        //////////// ST - Total payout
        $payout = array();
        $payout['label'] = "Payout";
        $payout_tot = 0.00;
        $payout_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_payout = $this->get_payout($value_dt);
            if($get_payout[0]['normal_payout'] != "") {
                $total=str_replace(",","",$get_payout[0]['normal_payout']) + str_replace(",","",$get_payout[0]['scratcher_payout']);
                $payout['data'][] = number_format($total,2);
                $payout_tot = $payout_tot + $total;
                $payout_actual_count[] = $total;
            } else {
                $payout['data'][] = '-';
                $payout_actual_count[] = 0;
            }
        }
        $payout['data'][] = number_format($payout_tot,2);
        $payout_actual_count[] = $payout_tot;
        $reconcillation_report_arr['payout'] = $payout;

        ///////////////////////////////////////////////////////
        $this->db->select('payout_money as normal_payout,supplier_emp_name');
        $this->db->from('tbl_payout');

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(created_at) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $this->db->where('DATE(created_at)', $main_dates[0]);
        }

        $query_payout = $this->db->get();
        $result_payout = $query_payout->result_array();
        
        if(!empty($result_payout)) {
            foreach ($result_payout as $key_pay => $value_pay) {

                $temp_payout_arr   = array();
                $supplier_emp_name = $value_pay["supplier_emp_name"];

                $normal_payout     = $value_pay["normal_payout"];

                $temp_payout_arr['text'] =  "Payout by ". $supplier_emp_name;
                $temp_payout_arr['amount'] = number_format($normal_payout,2);

                $kpi_detail_open_close_bal_arr['payout'][] = $temp_payout_arr;
            }
        }

        $this->db->select('payout_amount as scratcher_payout,users.first_name as first_name,users.last_name as last_name');
        $this->db->from('tbl_scratchers_payout');
        $this->db->join('user_login','tbl_scratchers_payout.user_id = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(payout_date) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $this->db->where('DATE(payout_date)', $main_dates[0]);
        }

        $query_spayout = $this->db->get();
        $result_spayout = $query_spayout->result_array();
        
        if(!empty($result_spayout)) {
            foreach ($result_spayout as $key_spay => $value_spay) {

                $temp_payout_arr   = array();
                $spayout_name      = $value_spay["first_name"]." ".$value_spay["last_name"];
                $spayout_amount    = $value_spay["scratcher_payout"];

                $temp_payout_arr['text'] =  "Payout by ". $spayout_name;
                $temp_payout_arr['amount'] = number_format($spayout_amount,2);

                $kpi_detail_open_close_bal_arr['payout'][] = $temp_payout_arr;
            }
        }        
        ///////////////////////////////////////////////////////

        //////////// EN - Total payout

        //////////// ST - Refund Proceeds
        $refund_amount = array();
        $refund_amount['label'] = "Refund";
        $refund_amount_actual_count = array();

        $refund_amount_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_refund_proceeds = $this->get_refund_proceeds($value_dt);
            if($get_refund_proceeds[0]['refund_amount'] != "") {
                $refund_amount['data'][] = str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
                $refund_amount_tot = $refund_amount_tot + str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
                $refund_amount_actual_count[] = str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
            } else {
                $refund_amount['data'][] = '-';
                $refund_amount_actual_count[] = 0;
            }
        }

        $refund_amount['data'][] = number_format($refund_amount_tot,2);
        $refund_amount_actual_count[] = $refund_amount_tot;
        //$cash_sales = $refund_amount;
        $reconcillation_report_arr['refund_amount'] = $refund_amount;

        ///////////////////////////////////////////////////////
        $this->db->select('total_amount as refund_amount,users.first_name as first_name,users.last_name as last_name');
        $this->db->from('refund_order');
        $this->db->join('user_login','refund_order.user_id = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');
        $this->db->where('is_cash_card', 1);

        if($start_date != "" && $end_date != "") {
            $this->db->where("date BETWEEN '".date('m-d-Y',strtotime($start_date))."' AND '".date('m-d-Y',strtotime($end_date))."'");
        } else {        
            $this->db->where('date', date('m-d-Y'));
        }

        $query_refund  = $this->db->get();
        $result_refund =  $query_refund->result_array();

        if(!empty($result_refund)) {
            foreach ($result_refund as $key_refund => $value_refund) {
                $temp_refund_arr  = array();
                $refund_name      = $value_refund["first_name"]." ".$value_refund["last_name"];
                $refund_amount    = $value_refund["refund_amount"];

                $temp_refund_arr['text'] =  "Refund by ". $refund_name;
                $temp_refund_arr['amount'] = number_format($refund_amount,2);

                $kpi_detail_open_close_bal_arr['refund'][] = $temp_refund_arr;
            }
        }
        ///////////////////////////////////////////////////////
        //////////// EN - Refund Proceeds

        //////////// ST - Cash drop
        $cash_drop = array();
        $cash_drop['label'] = "Cash Drop";
        $cash_drop_tot = 0.00;
        $cash_drop_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_cash_drop = $this->get_cash_drop($value_dt);
            if($get_cash_drop[0]['cash_drop_amount'] != "") {
                $cash_drop['data'][] = str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
                $cash_drop_tot = $cash_drop_tot + str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
                $cash_drop_actual_count[] = str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
            } else {
                $cash_drop['data'][] = '-';
                $cash_drop_actual_count[] = 0;
            }
        }
        $cash_drop['data'][] = number_format($cash_drop_tot,2);
        $cash_drop_actual_count[] = $cash_drop_tot;

        $reconcillation_report_arr['cash_drop'] = $cash_drop;

        ///////////////////////////////////////////////////////
        $this->db->select('cash_amount as cash_drop_amount,users.first_name as first_name,users.last_name as last_name');
        $this->db->from('cash_drop');
        $this->db->join('user_login','cash_drop.user_id = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(datetime) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $this->db->where('DATE(datetime)', $main_dates[0]);
        }

        $query_cash_drop = $this->db->get();
        $result_cash_drop = $query_cash_drop->result_array();
            
        if(!empty($result_cash_drop)) {
            foreach ($result_cash_drop as $key_cd => $value_cd) {
                $temp_refund_arr     = array();
                $cash_drop_name      = $value_cd["first_name"]." ".$value_cd["last_name"];
                $cash_drop_amount    = $value_cd["cash_drop_amount"];

                $temp_refund_arr['text']    =  "Cash drop by ". $cash_drop_name;
                $temp_refund_arr['amount']  = number_format($cash_drop_amount,2);

                $kpi_detail_open_close_bal_arr['cash_drop'][] = $temp_refund_arr;
            }
        }
        ///////////////////////////////////////////////////////
        //////////// EN - Cash drop

        //////////// ST - actual cash
        $actual_cash = array();
        $actual_cash['label'] = "Required Cash";
        $actual_value_cnt = 0;
        $actual_cash_diff = array();

        foreach ($opening_cash_actual_count as $actual_value) {

            $a = $actual_value + $cash_proceeds_actual_count[$actual_value_cnt];
            $b = $payout_actual_count[$actual_value_cnt] + $cash_drop_actual_count[$actual_value_cnt] + $refund_amount_actual_count[$actual_value_cnt];

            $actual_total = $a - $b;
            $actual_cash['data'][] = number_format($actual_total,2);
            $actual_cash_diff[] = $actual_total;
            $actual_value_cnt++;
        }
        $reconcillation_report_arr['actual_cash'] = $actual_cash;
        //////////// EN - actual cash

        //////////// ST - Closing Cash
        $closing_cash = array();
        $closing_cash['label'] = "Closed Cash";
        $closing_cash_tot = 0.00;
        $closing_cash_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_closing_cash = $this->get_closing_cash($value_dt);
            if($get_closing_cash[0]['closing_cash_amount'] != "") {
                $close_cash = str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
                $closing_cash['data'][] = number_format($close_cash,2);
                $closing_cash_tot = $closing_cash_tot + str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
                $closing_cash_actual_count[] = str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
            } else {
                $closing_cash['data'][] = '-';
                $closing_cash_actual_count[] = 0;
            }
        }
        $closing_cash['data'][] = number_format($closing_cash_tot,2);
        $closing_cash_actual_count[] = $closing_cash_tot;

        $reconcillation_report_arr['closing_cash'] = $closing_cash;
        //////////// EN - Closing Cash

        //////////// ST - Difference
        $Difference = array();
        $Difference['label'] = "Difference";

        $diff = 0;
        $dif  = 0;
        foreach ($actual_cash_diff as $value_diff) {

            $diff_value = $value_diff - $closing_cash_actual_count[$diff];
            $diff_value = number_format($diff_value,2);
            $html = $diff_value;

            $Difference['data'] = $html;
            $dif = $html;
            $diff++;
        }

        $reconcillation_report_arr['Difference'] = $Difference;
        $kpi_detail_open_close_bal_arr['difference']['text']   = "Difference";
        $kpi_detail_open_close_bal_arr['difference']['amount'] = $dif;
        //////////// EN - Difference
        
        return $kpi_detail_open_close_bal_arr;
    }

    public function kpi_detail_cash_drops($start_date="",$end_date="") {

        $this->db->select("kd.*,users.first_name,users.last_name");
        $this->db->from('kpi_detail_cash_drops as kd');
        $this->db->join('user_login','kd.user_id = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');

        if($start_date != "" && $end_date != "") {
            $this->db->where("DATE(kd.created_at) BETWEEN '".$start_date."' AND '".$end_date."'");
        } else {
            $this->db->where("DATE(kd.created_at)", date("Y-m-d"));
        }
        $this->db->order_by('kd.created_at', 'desc');

        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        // print $this->db->last_query(); exit();
        return $result_prod;
    }

    public function shiftReportData($params=array()) {

        $start_date_filter = !empty($params["start_date_filter"]) ? $params["start_date_filter"] : "";
        $end_date_filter   = !empty($params["end_date_filter"]) ? $params["end_date_filter"] : "";

        $this->db->select('tbl_user_shift.*,users.first_name as first_name,users.last_name as last_name');
        $this->db->from('tbl_user_shift');
        $this->db->join('user_login','tbl_user_shift.username = user_login.username','left');
        $this->db->join('users','users.user_id = user_login.user_id','left');
        //$role=$this->session->userdata('role_id');
        // if(isset($role) && $this->session->userdata('role_id') != 4) {
        //     $this->db->where('tbl_user_shift.username', $this->session->userdata['username']);
        // }

        //$this->db->where('shift_in_out', 2);

        if($start_date_filter != "" && $end_date_filter != "") {
            $this->db->where("DATE(date) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
        } else {
            $this->db->where('DATE(date)', date("Y-m-d"));
        }

        $this->db->order_by('tbl_user_shift.id','desc');

        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        //print $this->db->last_query(); exit();
        return $result_prod;
    }

    public function cardTransactionReportData($params=array()) {

        $start_date_filter = !empty($params["start_date_filter"]) ? $params["start_date_filter"] : "";
        $end_date_filter   = !empty($params["end_date_filter"]) ? $params["end_date_filter"] : "";

        $this->db->select('*,IFNULL((SELECT customer_name FROM customer_information WHERE customer_information.customer_id = order.customer_id),"Walk in customer") as customer_name');
        $this->db->from('order');
        $this->db->where('is_cash_card', 2); // 2 - Card

        if($start_date_filter != "" && $end_date_filter != "") {
            $this->db->where("DATE(order.order_date) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
        }

        $this->db->order_by('id','desc');
        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        // print $this->db->last_query(); exit();
        return $result_prod;
    }

    public function auditLogReportData($params=array()) {

        $start_date_filter = !empty($params["start_date_filter"]) ? $params["start_date_filter"] : "";
        $end_date_filter   = !empty($params["end_date_filter"]) ? $params["end_date_filter"] : "";

        $this->db->select('*,(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.user_id = user_notification.user_id) as customer_name,(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.user_id = user_notification.action_id) as action_by');
        $this->db->from('user_notification');

        if($start_date_filter != "" && $end_date_filter != "") {
            $this->db->where("DATE(user_notification.created_at) BETWEEN '".$start_date_filter."' AND '".$end_date_filter."'");
        }

        $this->db->order_by('id','desc');
        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
        // print $this->db->last_query(); exit();
        return $result_prod;
    }

    public function get_last_end_date($type){

        switch($type){
            case "last_month":
                $dates['start_date']= date("Y-m-d", strtotime("first day of previous month"));
                $dates['last_date']= date("Y-m-d", strtotime("last day of previous month"));
                break;
            case "current_month":
                $dates['start_date']= date("Y-m-d", strtotime('first day of this month'));
                $dates['last_date']= date("Y-m-d", strtotime('last day of this month'));
                break;
            case "last_week":
                $dates['start_date'] = date('Y-m-d', strtotime("last week"));
                $dates['last_date'] = date('Y-m-d', strtotime("last week +6 days"));
                break;
            case "current_week":
                $dates['start_date'] = date('Y-m-d', strtotime("this week"));
                $dates['last_date'] = date('Y-m-d', strtotime("this week +6 days"));
                break;

            case "last_day":
                $dates['start_date'] = date('Y-m-d', strtotime("-1 day"));
                $dates['last_date'] = date('Y-m-d', strtotime("-1 day"));
                break;

            case "current_day":
                $dates['start_date'] = date('Y-m-d');
                $dates['last_date'] = date('Y-m-d');
                break;
        }

        return $dates;
    }
    public function not_available_periods_by_report($report_type){
        switch(trim($report_type)){
            case "shift":
            return ["current_week","last_week","current_month","last_month"];
            break;
            default:
            return [];
        }
     }

    public function get_endpoint_for_report($name){
        switch(trim($name)){
            case "shift":
            return "shift_report_export_email";
            break;
            case "payout-s":
            case "payout-e":
            case "payout-v":
            return "payout_reports_go";
            break;
            case "timesheet":
            return "timesheet_report_ajax";
            break;
            case "card_transaction":
            return "card_transaction_go";
            break;
            case "audit_log":
            return "audit_log_report_go";
            break;
            case "scratcher_sales":
            return "scratcher_inventory_summary_go";
            break;
            case "inventory":
            return "inventory_report_go";
            break;
            default:
            return "";
        }
     }
     public function timesheetReportData($main_dates=array(),$btn_type='current',$btn_date=0,$start_date_filter="",$end_date_filter="") {
        $setting=$this->Gen_settingm->retrieve_setting_editdata();
        $type=$setting['pay_period'];

        switch($type){
        case '1':
            $max_days=7;
            $monday = strtotime("last monday");
            $monday =$current= date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $days=0;
            for($i=1;$i<=4;$i++){
                $plus6=$days-6;

                if($btn_type =='filter_go') {

                    $individual['start_date']= date('Y-m-d',strtotime($start_date_filter));
                    $individual['end_date']= date('Y-m-d',strtotime($end_date_filter));

                } else if($btn_type =='filter_clear') {

                    $individual['start_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$plus6.' days'));

                } else if($btn_type =='previous_day') {
                    $days = $days+1;
                    $plus6 = $plus6+1;
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' -'.$plus6.' days'));
                } else if($btn_type =='next_day') {
                    //start - end date fillter code previous
                    $days = $days-1;
                    $plus6 = $plus6-1;
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' +1 days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' +7 days'));
                }else{

                    $individual['start_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$plus6.' days'));
                    //start - end date fillter code previous
                }

                $days=$days+7;
                $data_ranges[]=$individual;
                if($i==1){ // current weak
                    $data=$individual;
                }
            }

            break;

        case '2': // Weekly
            $max_days=7;
            $monday = strtotime("last monday");
            $monday =$current= date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
            $days=0;
            for($i=1;$i<=4;$i++){
                $plus6=$days-13;

                if($btn_type =='filter_go') {

                    $individual['start_date']= date('Y-m-d',strtotime($start_date_filter));
                    $individual['end_date']= date('Y-m-d',strtotime($end_date_filter));

                } else if($btn_type =='filter_clear') {

                    $individual['start_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$plus6.' days'));

                } else if($btn_type =='previous_day') {
                    $days = $days+1;
                    $plus6 = $plus6+1;
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' -'.$plus6.' days'));
                } else if($btn_type =='next_day') {
                    //start - end date fillter code previous
                    $days = $days-1;
                    $plus6 = $plus6-1;
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' +1 days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' +7 days'));
                }else{

                    $individual['start_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$plus6.' days'));
                    //start - end date fillter code previous
                }

                $days=$days+7;
                $data_ranges[]=$individual;
                if($i==1){ // current weak
                    $data=$individual;
                }
            }

            break;

        case '4':
            $max_days=30;
            $current_month=date('m');
            $current_year=date('Y');
            $days=0;
            for($i=1;$i<=4;$i++){
                $plus6=$days-30;

                if($btn_type =='filter_go') {

                    $individual['start_date']= date('Y-m-d',strtotime($start_date_filter));
                    $individual['end_date']= date('Y-m-d',strtotime($end_date_filter));

                } else if($btn_type =='filter_clear') {

                    $individual['start_date']= $current_year.'-'.$current_month.'-'.'01';
                    $individual['end_date']=$current_year.'-'.$current_month.'-'.date('t',strtotime($individual['start_date']));

                } else if($btn_type =='previous_day'){
                    $days = $days+1;
                    $plus6 = $plus6+1;
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' -'.$plus6.' days'));
                }else if($btn_type =='next_day'){
                    $days = $days-1;
                    $plus6 = $plus6-1;
                    //start - end date fillter code previous
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' +1 days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' +30 days'));
                }else{

                $individual['start_date']= $current_year.'-'.$current_month.'-'.'01';
                $individual['end_date']=$current_year.'-'.$current_month.'-'.date('t',strtotime($individual['start_date']));

                }
                $data_ranges[]=$individual;

                $current_month=$current_month-1;
                if($current_month<=0){
                     $current_year=date('Y')-1;
                     $current_month=12;
                }
                if($i==1){
                    if(date('d',strtotime($individual['end_date']))=='31'){
                        $max_days=31;
                    }
                    $data=$individual;

                }
            }
            break;
        case '3':
            $max_days=15;
            $current_month=date('m');
            $current_year=date('Y');
            $current_day=date('d');
            $days=0;
            for($i=1;$i<=4;$i++){

                $plus6=$days-15;

                if($btn_type =='filter_go') {

                    $individual['start_date']= date('Y-m-d',strtotime($start_date_filter));
                    $individual['end_date']= date('Y-m-d',strtotime($end_date_filter));

                } else if($btn_type =='filter_clear') {

                    if($current_day<=15){
                        $individual['start_date']= $current_year.'-'.$current_month.'-01';
                        $individual['end_date']=$current_year.'-'.$current_month.'-15';
                    } else{
                        $individual['start_date']= $current_year.'-'.$current_month.'-16';
                        $individual['end_date']=$current_year.'-'.$current_month.'-'.date('t',strtotime($individual['start_date']));
                    }

                } else if($btn_type =='previous_day'){
                    $days = $days+1;
                    $plus6 = $plus6+1;
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' -'.$plus6.' days'));
                }else if($btn_type =='next_day'){
                    $days = $days-1;
                    $plus6 = $plus6-1;
                    //start - end date fillter code previous
                    $individual['start_date']= date('Y-m-d',strtotime($btn_date.' +1 days'));
                    $individual['end_date']= date('Y-m-d',strtotime($btn_date.' +15 days'));
                }else{

                    if($current_day<=15){
                        $individual['start_date']= $current_year.'-'.$current_month.'-01';
                        $individual['end_date']=$current_year.'-'.$current_month.'-15';
                    } else{
                        $individual['start_date']= $current_year.'-'.$current_month.'-16';
                        $individual['end_date']=$current_year.'-'.$current_month.'-'.date('t',strtotime($individual['start_date']));
                    }
                }

                $data_ranges[]=$individual;
                if($current_day<=15){
                    $current_month=$current_month-1;
                    $current_day="16";
                    if($current_month<=0){
                        $current_year=date('Y')-1;
                        $current_month=12;
                    }
                } else{
                    $current_month=$current_month;
                    $current_day="01";
                }
                if($i==1){
                    if(date('d',strtotime($individual['end_date']))=='31'){
                        $max_days=16;
                    }
                    $data=$individual;
                }
            }
        }

        $report_array = array();
        $report_array['start_date'] = $data['start_date'];
        $report_array['end_date'] = $data['end_date'];
        $report_array['total_day'] = $max_days+2;
        $current=strtotime($data['start_date']);
        $this->db->join('users','users.user_id = user_login.user_id','LEFT');
        $this->db->from('user_login');
        $users=$this->db->get()->result();

        $i=0;
        foreach($users as $keyu => $user){
            $current=$data['start_date'];
            $report_array['display_data'][$i]['username'] = $user->first_name.' '.$user->last_name;
            $report_array['display_data'][$i]['user_id'] = $user->username;
            $hours=0;
            $status= "Approved";
            $com_hours[$data['start_date']]=0;
            $date_data = array();

            while(strtotime($current)<=strtotime($data['end_date'])){
                $tmp_date = $current;
                $this->db->from('user_timesheet');
                $this->db->where('username',$user->username);
                $temp_result = $this->db->where('date',$current);
                $result_ts =$temp_result->get()->result();
                if(isset($result_ts) && empty($result_ts) && date('Y-m-d') >= $current && date('Y-m-d') != $current ) {
                //$report_array['display_data'][$i]['date_array'][] = $this->db->last_query().'--->'.$tmp_date.'->'.$current;
                 $report_array['display_data'][$i]['date_array'][] = 'Ab';
                } else {

                    $this->db->from('tbl_emp_leave');
                    $result2 =$this->db->where(['employee_id' => $user->username,'status !=' => 'Denied'])->where("'".date("Y-m-d",strtotime($current))."' BETWEEN STR_TO_DATE(start_date,'%m-%d-%Y') AND STR_TO_DATE(end_date,'%m-%d-%Y')")->get()->row()->status;

                    if(!empty($result2) && $result2!='') {

                        if($result2 == 'Denied')
                            $report_array['display_data'][$i]['date_array'][] = "Rj";
                        else if($result2 == 'Approved')
                            $report_array['display_data'][$i]['date_array'][] = "L";
                        else if($result2 == 'Pending')
                            $report_array['display_data'][$i]['date_array'][] = "P";
                        else if($result2 == 'Cancelled')
                            $report_array['display_data'][$i]['date_array'][] = "C";
                        else
                            $report_array['display_data'][$i]['date_array'][] = "0.00";

                    } else {

                        $this->db->from('tbl_emp_leave');
                        $result_decline =$this->db->where(['employee_id' => $user->username,'status'=>'Denied'])->where("'".date("Y-m-d",strtotime($current))."' BETWEEN STR_TO_DATE(start_date,'%m-%d-%Y') AND STR_TO_DATE(end_date,'%m-%d-%Y')")->get()->row()->status;

                        $result_decline = ($result_decline != '')?$result_decline.'-':'';

                        $this->db->from('timesheet_report');
                        $result =$this->db->where(['username' => $user->username,
                                      'start_date' =>  $current,
                                      ])->get()->result();

                        if(isset($result) && !empty($result)){
                                $com_hours[$data['start_date']]=$com_hours[$data['start_date']]+$result[0]->custom_hours;
                                $hours=$hours+$result[0]->custom_hours;

                                $report_array['display_data'][$i]['date_array'][] = $result_decline.number_format($result[0]->custom_hours,2);

                        } else{
                            if(date('Y-m-d') <= $current)
                                $report_array['display_data'][$i]['date_array'][] = $result_decline.'0.00';
                            else
                                $report_array['display_data'][$i]['date_array'][] = $result_decline.'0.00';

                        }
                    }
                }
                    $current=date('Y-m-d',strtotime($current.' +1 day'));
            }
            $report_array['display_data'][$i]['date_array'][] = number_format($hours,2);
            $i++;
        }
        $report_arr=[];
        $report_array_html=   '<div class="col-md-12">
                                <div class="h3">Timesheet Report</div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input type="date" name="start_date_tr_filter" id="start_date_tr_filter" class="form-control" value="'.$report_array['start_date'].'">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input type="date" name="end_date_tr_filter" id="end_date_tr_filter" class="form-control" value="'.$report_array['end_date'].'" min="">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                                <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control timesheet_report_click" data-type="filter_go" data-date = "" type="button">Go</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <button class="btn btn-primary btn-dark my-2 my-sm-0 form-control timesheet_report_click" data-type="filter_clear" data-date = "" type="button">Clear Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

            <div class="col-md-6 my-3">
                <button class="btn btn-dark previous_day timesheet_report_click" data-type="previous_day" data-date="'.$report_array['start_date'].'"><<< Previous Day </button>
            </div>
            <div class="col-md-6 text-right  my-3">
                <button class="btn btn-dark next_day timesheet_report_click" data-type="next_day" data-date="'.$report_array['start_date'].'">Next Day >>></button>
            </div>

            <div class="col-md-12" style="margin: 20px 0px;">
                <div class="row">
                    <div class="col-md-3">
                        <span style="background-color: green;display: inline-table;height: 10px;width: 60px;">&nbsp</span> : Approved Leave
                    </div>
                    <div class="col-md-3">
                        <span style="background-color: yellow;display: inline-table;height: 10px;width: 60px;">&nbsp</span> : Pending Leave
                    </div>
                    <div class="col-md-3">
                        <span style="background-color: blue;display: inline-table;height: 10px;width: 60px;">&nbsp</span> : Decline Leave
                    </div>
                </div>
            </div>

            <div class="col-md-12 p-0">
                <div class="container table-responsive pt-1 timesheet-header">
                    <table class="table table-bordered table-hover" id="tbl_timesheet_report">
            <thead class="headsec">
            <tr>
                <th class="text-white dtfc-fixed-left sticky-header" style="background: #ec4d4d;">User</th>';
                $report_array_html .= '<th class="text-white dtfc-fixed-left sticky-header" style="background: #ec4d4d;">Total</th>';
                $start_date        = $report_array['start_date'];
                $end_date          = $report_array['end_date'];

                $begin = new DateTime($start_date);
                $end = new DateTime($end_date);
                $end->modify('+1 day');

                $interval = DateInterval::createFromDateString('1 day');
                $period = new DatePeriod($begin, $interval, $end);

                // print_r($period);
                $head_arr=[];
                $head_arr[]="User";
                $head_date_arr = array();

                foreach ($period as $dt) {
                    $report_array_html .= '<th class="text-white" style="position:sticky;top:-5px;z-index:99;background: #ec4d4d;">'.$dt->format("m/d/Y").'</th>';
                    $head_arr[]=$dt->format("m/d/Y");
                    $head_date_arr[] = $dt->format("Y-m-d");
                 }
                 $head_arr[]="Total";
                $report_array_html .= '
            </tr>
        </thead>
        <tbody>';

        $report_arr[]=implode(',', $head_arr);

            foreach ($report_array['display_data'] as $key => $value) {
                $row_arr=[];
                $report_array_html .=  '<tr>';
                $report_array_html .= '<td style="background:white">'.$value['username'].'</td>';
                $row_arr[]=$value['username'];

                $tempElement = count($value['date_array'])-1;
                $tempValue   = $value['date_array'][$tempElement];
                array_pop($value['date_array']);
                array_unshift($value['date_array'],$tempValue);

                $r=0;
                foreach ($value['date_array'] as $value_day) {

                    if($r==0) {

                        $report_array_html .= '<td style="background:white">'.$value_day.'</td>';

                    } else {

                        if(strpos($value_day, 'Denied-') !== false){
                            $style='style="background:blue;color:white;font-weight:bold;"';
                            $value_day = str_replace('Denied-', '', $value_day);
                        }else{
                            $style='';
                        }

                        if($value_day === 'L')
                            $report_array_html .= '<td style="background:green;color:white;font-weight:bold;">App</td>';
                        else if($value_day ==='Ab')
                            $report_array_html .= '<td>0.00</td>';
                        else if($value_day ==='Rj')
                            $report_array_html .= '<td style="background:blue;color:white;font-weight:bold;">Dec</td>';
                        else if($value_day ==='P')
                            $report_array_html .= '<td style="background:yellow;color:black;font-weight:bold;">'.$value_day.'</td>';
                        else if($value_day ==='C')
                            $report_array_html .= '<td style="background:orange;color:white;font-weight:bold;">'.$value_day.'</td>';
                        else
                            $report_array_html .= '<td '.$style.'>'.$value_day.'</td>';
                    }
                    //$report_array_html .= '<td>'.$value_day.'</td>';
                    $r++;

                    $row_arr[]=$value_day;
                }
                $report_array_html .= "</tr>";
                $report_arr[]=implode(',', $row_arr);
            }

        $report_array_html .= '</tbody></table>';
        $report_array_html .= '<script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>';


        $store_result = $this->db->from('web_setting')->get()->row()->name;
        $store_address_result = $this->db->from('web_setting')->get()->row()->address;
        $storename = ($store_result!='')?$store_result:'Campus Liquor';

        $store_arr = array();
        $store_arr["store_name"]         = $storename;
        $store_arr["store_address"]      = $store_address_result;
        $store_arr["store_daterange"]    = date("m-d-Y",strtotime($start_date)).' to '.date("m-d-Y",strtotime($end_date));

        $report_array_html .= '<script>
        var tbl_timesheet_report = jQuery("#tbl_timesheet_report").DataTable({
            fixedColumns: {
                left: 2
            },
            fixedHeader: {
                header: true,
                footer: true,
            },
            lengthChange: true,
            "pageLength": 20,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true,

            dom: "Blfrtip", // Bfrtip
            buttons: [
                {
                    extend: "pdf",
                    text: "Email",
                    action: function () {
                        extendDataTable(tbl_timesheet_report,"Timesheet Report ( '.date("m-d-Y",strtotime($start_date)).' to '.date("m-d-Y",strtotime($end_date)).') '.$storename.'","'.$store_arr["store_name"].'","'.$store_arr["store_address"].'","'.$store_arr["store_daterange"].'");
                    }
                }
            ],
        });
        </script>';

        $report_array_html .= '</div></div>';

        $report_array['html']=$report_array_html;
        $report_array['csv_html_arr']=$report_arr;
        $report_array['start_date']=$start_date;
        $report_array['end_date']=$end_date;
        return $report_array;

    }

    public function reportSchedulerData($main_dates=array(),$btn_type='current',$btn_date=0,$start_date_filter="",$end_date_filter="") {

        $setting=$this->Gen_settingm->retrieve_setting_editdata();
        $max_days=7;
        $monday = strtotime("last monday");
        $monday =$current= date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $days=0;
        for($i=1;$i<=4;$i++){
            $plus6=$days-6;



            if($btn_type == 'next_week'){

                $days = $days-7;
                $plus6 = $plus6-7;
                $individual['start_date']= date('Y-m-d',strtotime($btn_date.' +7 days'));
                $individual['end_date']= date('Y-m-d',strtotime($btn_date.' +14 days'));

            }else if($btn_type == 'previous_week'){

                $days = $days+7;
                $plus6 = $plus6+7;
                $individual['start_date']= date('Y-m-d',strtotime($btn_date.' -'.$days.' days'));
                $individual['end_date']= date('Y-m-d',strtotime($btn_date.' -'.$plus6.' days'));



            }else {

                $individual['start_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$days.' days'));
                $individual['end_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$plus6.' days'));
                //start - end date fillter code previous
            }


            $days=$days+7;
            $data_ranges[]=$individual;
            if($i==1){ // current weak
                $data=$individual;
            }
        }

        // print_r($data);
        // exit;

        $report_array = array();
        $report_array['start_date'] = $data['start_date'];
        $report_array['end_date'] = $data['end_date'];
        $report_array['total_day'] = $max_days+2;
        $current=strtotime($data['start_date']);
        $this->db->join('users','users.user_id = user_login.user_id','LEFT');
        $this->db->from('user_login');
        $users=$this->db->get()->result();

        $i=0;
        foreach($users as $keyu => $user){
            $current=$data['start_date'];
            $report_array['display_data'][$i]['username'] = $user->first_name.' '.$user->last_name;
            $report_array['display_data'][$i]['user_id'] = $user->username;
            $hours=0;
            $status= "Approved";
            $com_hours[$data['start_date']]=0;
            $date_data = array();

            while(strtotime($current)<=strtotime($data['end_date'])){
                $tmp_date = $current;

                $this->db->from('shift_scheduler');
                $this->db->select('id,shift_start_time,shift_end_time');
                $to_from_time =$this->db->where(['user_id' => $user->username,'shift_date'=>$current])->get()->result();

                $shift_start_time = '00:00';
                $shift_end_time = '00:00';
                $shift_id = 0;

                $this->db->from('tbl_emp_leave');
                $result2 =$this->db->where(['employee_id' => $user->username])->where("'".date("Y-m-d",strtotime($current))."' BETWEEN STR_TO_DATE(start_date,'%m-%d-%Y') AND STR_TO_DATE(end_date,'%m-%d-%Y')")->get()->row()->status;

                if($result2 == 'Denied')
                    $bg_color = "blue";
                else if($result2 == 'Pending')
                    $bg_color = "yellow";
                else
                    $bg_color = "white";

                if($result2 == 'Approved'){
                        $btn = "L";
                }else{

                    if(!empty($to_from_time)) {
                        $shift_start_time = date("H:i",strtotime($to_from_time[0]->shift_start_time));
                        $shift_end_time = date("H:i",strtotime($to_from_time[0]->shift_end_time));
                        $shift_id = $to_from_time[0]->id;

                        $shift_start_time2              = new DateTime('0000-00-00 '.$shift_start_time);
                        $shift_end_time2                = new DateTime('0000-00-00 '.$shift_end_time);

                        $interval = date_diff($shift_end_time2,$shift_start_time2);
                        $tot_hrs = $interval->format('%h:%i');

                        if(strtotime($current)<=strtotime(date("Y-m-d"))) {
                            $btn = "<td style='background:white;text-align: center;letter-spacing: 2px;' class='shift_scheduler_tooltip'>".$shift_start_time." To ".$shift_end_time."</td>";
                        } else {
                            // $btn = $shift_start_time." To ".$shift_end_time."<button class='btn btn-primary schedule_shift tooltip_display' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'> R</button>";

                            $btn = "<td style='background:".$bg_color."' class='shift_scheduler_tooltip'>

                            <form name='shift_scheduler_frm' method='POST'>
                                <input type='hidden' name='shift_id' id='shift_id' value='".$shift_id."'>
                                <input type='hidden' name='shift_date' id='shift_date' value='".$current."'>
                                <input type='hidden' name='shift_user_id' id='shift_user_id' value='".$user->username."'>

                            <table class='table table-bordered table-hover'>
                                <tr>
                                    <td><input type='time' class='save_scheduler shift_start_time' name='shift_start_time' id='shift_start_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."' value='".$shift_start_time."'></td>
                                    <td><input type='time' class='save_scheduler shift_end_time' name='shift_end_time' id='shift_end_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."' value='".$shift_end_time."'></td>
                                    <td class='tot_hrs'>".$tot_hrs."</td>
                                </tr>
                            </table></form>";

                        }
                    } else {
                        if(strtotime($current)<=strtotime(date("Y-m-d"))) {
                            $btn = "<td style='background:".$bg_color."' class='shift_scheduler_tooltip'>-</td>";
                        } else {
                            // $btn = "<button class='btn btn-primary schedule_shift tooltip_display' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'>Schedule</button>";

                            $btn = "<td style='background:".$bg_color."' class='shift_scheduler_tooltip'>

                             <form name='shift_scheduler_frm' method='POST'>
                                <input type='hidden' name='shift_id' id='shift_id' value='".$shift_id."'>
                                <input type='hidden' name='shift_date' id='shift_date' value='".$current."'>
                                <input type='hidden' name='shift_user_id' id='shift_user_id' value='".$user->username."'>

                            <table class='table table-bordered table-hover'>
                                <tr>
                                    <td><input type='time' class='save_scheduler shift_start_time' name='shift_start_time' id='shift_start_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'></td>
                                    <td><input type='time' class='save_scheduler shift_end_time' name='shift_end_time' id='shift_end_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'></td>
                                    <td class='tot_hrs'>0</td>
                                </tr>
                            </table></form>";
                        }
                    }
                }
                $report_array['display_data'][$i]['date_array'][] = $btn;

                $current=date('Y-m-d',strtotime($current.' +1 day'));
                $ss_cnt2++;
            }
            // $report_array['display_data'][$i]['date_array'][] = number_format($hours,2);
            $i++;
        }

        $report_arr=[];
        $report_array_html= '

            <div class="row">

                <div class="col-md-12" style="margin: 20px 0px;">
                    <div class="row dece_10">
                        <div class="col-md-2">
                            <span style="background-color: green;display: inline-table;height: 10px;width: 60px;">&nbsp;</span> : Approved Leave
                        </div>
                        <div class="col-md-2">
                            <span style="background-color: yellow;display: inline-table;height: 10px;width: 60px;">&nbsp</span> : Pending Leave
                        </div>
                        <div class="col-md-2">
                            <span style="background-color: blue;display: inline-table;height: 10px;width: 60px;">&nbsp</span> : Decline Leave
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-dark next_day copy_week_timesheet_report" data-date="'.$report_array['start_date'].'" data-start_date="'.$report_array['start_date'].'" data-end_date="'.$report_array['end_date'].'">Copy from Last Week</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-3">
                    <button class="btn btn-dark previous_day week_timesheet_report_click" data-type="previous_week" data-date="'.$report_array['start_date'].'"><<< Previous Week </button>
                </div>
                <div class="col-md-6 text-right my-3">
                    <button class="btn btn-dark next_day week_timesheet_report_click" data-type="next_week" data-date="'.$report_array['start_date'].'">Next Week >>></button>
                </div>
            </div>


            <div class="col-md-12 p-0">
                <div class="container table-responsive timesheet-header" style="width: 100%;padding: 0px;margin: 0px;max-width: 100%;}">
                    <table class="table table-bordered table-hover" id="tbl_timesheet_report">
                        <thead class="headsec ">
                        <tr>
                            <th class="text-white dtfc-fixed-left sticky-header" style="background: #ec4d4d;position:sticky;left:0px;z-index:999;">User</th>';
                            // $report_array_html .= '<th class="text-white dtfc-fixed-left sticky-header" style="background: #ec4d4d;">Total</th>';
                            $start_date        = $report_array['start_date'];
                            $end_date          = $report_array['end_date'];

                            $begin = new DateTime($start_date);
                            $end = new DateTime($end_date);
                            $end->modify('+1 day');

                            $interval = DateInterval::createFromDateString('1 day');
                            $period = new DatePeriod($begin, $interval, $end);
                            // print_r($period);
                            // exit;
                            foreach ($period as $dt) {
                                $report_array_html .= '<th class="text-white" style="position:sticky;top:-5px;z-index:99;background: #ec4d4d;">'.$dt->format("m/d/Y").'

                                    <table class="table table-bordered table-hover" style="border:0;">
                                        <tr style="border:0;">
                                            <th class="text-white fixedHeader-floating" style="background: #ec4d4d; border:0; width:50%;position:sticky;top:-5px;z-index:99;">In</th>
                                            <th class="text-white fixedHeader-floating" style="background: #ec4d4d; border:0;width:35%;position:sticky;top:-5px;z-index:99;">Out</th>
                                            <th class="text-white fixedHeader-floating" style="background: #ec4d4d; border:0;width:0;padding-right:0px;position:sticky;top:-5px;z-index:99;"># Hours</th>
                                        </tr>
                                    </table>

                                </th>';
                            }
                            $report_array_html .= '
                        </tr>

                        </thead>';
                        //echo $report_array_html;exit;

                    $report_array_html .= '<tbody>';

            // $report_arr[]=implode(',', $head_arr);

            foreach ($report_array['display_data'] as $key => $value) {
                if($value['username']!=' '){
                    $row_arr=[];
                    $report_array_html .=  '<tr>';
                    $report_array_html .= '<td style="background:white;">'.$value['username'].'</td>';
                    $row_arr[]=$value['username'];

                    // $tempElement = count($value['date_array'])-1;
                    // $tempValue   = $value['date_array'][$tempElement];
                    // array_pop($value['date_array']);
                    // array_unshift($value['date_array'],$tempValue);

                    $r=0;
                    foreach ($value['date_array'] as $value_day) {


                        if($value_day === 'L')
                            $report_array_html .= '<td style="background:green;color:white;font-weight:bold;text-align: center;">Approved</td>';
                        else
                            $report_array_html .= $value_day.'</td>';

                        $r++;

                        $row_arr[]=$value_day;
                    }
                    $report_array_html .= "</tr>";
                    $report_arr[]=implode(',', $row_arr);
                }
            }

        $report_array_html .= '</tbody></table>';
        $report_array_html .= '<link rel="stylesheet" type="text/css" href="'.base_url().'/assets/cashier/style/datatable@1.10.22/jquery.dataTables.css"/>';
        $report_array_html .= '<script src="'.base_url().'/assets/report/js/jquery.dataTables.min.js"></script>';
        $report_array_html .= '<script src="'.base_url().'/assets/report/js/dataTables.buttons.min.js"></script>';
        $report_array_html .= '<script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>';


        $store_result = $this->db->from('web_setting')->get()->row()->name;
        $store_address_result = $this->db->from('web_setting')->get()->row()->address;
        $storename = ($store_result!='')?$store_result:'Campus Liquor';

        $store_arr = array();
        $store_arr["store_name"]         = $storename;
        $store_arr["store_address"]      = $store_address_result;
        $store_arr["store_daterange"]    = date("m-d-Y",strtotime($start_date)).' to '.date("m-d-Y",strtotime($end_date));

        $report_array_html .= '<script>
        var tbl_timesheet_report = jQuery("#tbl_timesheet_report").DataTable({
            fixedColumns: {
                left: 1
            },
            lengthChange: false,
            "pageLength": 8,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true
        });
        </script>';

        $report_array_html .= '</div></div>';

        $report_array['html']=$report_array_html;
        $report_array['csv_html_arr']=$report_arr;
        $report_array['start_date']=$start_date;
        $report_array['end_date']=$end_date;
        return $report_array;

    }

    public function saveLastWeekReportSchedulerData($main_dates=array(),$btn_type='current',$btn_date=0,$start_date_filter="",$end_date_filter="") {

        $setting=$this->Gen_settingm->retrieve_setting_editdata();
        $max_days=7;
        $monday = strtotime("last monday");
        $monday =$current= date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $days=0;
        for($i=1;$i<=4;$i++){
            $plus6=$days-6;

            if($btn_type == 'next_week'){

                $days = $days-7;
                $plus6 = $plus6-7;
                $individual['start_date']= date('Y-m-d',strtotime($btn_date.' +7 days'));
                $individual['end_date']= date('Y-m-d',strtotime($btn_date.' +14 days'));

            }else if($btn_type == 'previous_week'){

                $days = $days+7;
                $plus6 = $plus6+7;
                $individual['start_date']= date('Y-m-d',strtotime($btn_date.' -'.$days.' days'));
                $individual['end_date']= date('Y-m-d',strtotime($btn_date.' -'.$plus6.' days'));

            }else {
                if($start_date_filter != "" && $end_date_filter != "") {
                    $individual['start_date'] = $start_date_filter;
                    $individual['end_date']   = $end_date_filter;

                } else {
                    $individual['start_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$days.' days'));
                    $individual['end_date']= date('Y-m-d',strtotime(date('Y-m-d',$monday).' -'.$plus6.' days'));
                }
                //start - end date fillter code previous
            }

            $days=$days+7;
            $data_ranges[]=$individual;
            if($i==1){ // current weak
                $data=$individual;
            }
        }

        $report_array = array();
        $report_array['start_date'] = $data['start_date'];
        $report_array['end_date'] = $data['end_date'];
        $report_array['total_day'] = $max_days+2;
        $current=strtotime($data['start_date']);
        $this->db->join('users','users.user_id = user_login.user_id','LEFT');
        $this->db->from('user_login');
        $users=$this->db->get()->result();

        $i=0;
        foreach($users as $keyu => $user){
            $current=$data['start_date'];
            $report_array['display_data'][$i]['username'] = $user->first_name.' '.$user->last_name;
            $report_array['display_data'][$i]['user_id'] = $user->username;
            $hours=0;
            $status= "Approved";
            $com_hours[$data['start_date']]=0;
            $date_data = array();

            while(strtotime($current)<=strtotime($data['end_date'])){
                $tmp_date = $current;

                $this->db->from('shift_scheduler');
                $this->db->select('id,shift_start_time,shift_end_time');
                $to_from_time =$this->db->where(['user_id' => $user->username,'shift_date'=>$current])->get()->result();

                $shift_start_time = '00:00';
                $shift_end_time = '00:00';
                $shift_id = 0;

                $this->db->from('tbl_emp_leave');
                $result2 =$this->db->where(['employee_id' => $user->username,'status =' => 'Approved'])->where("'".date("Y-m-d",strtotime($current))."' BETWEEN STR_TO_DATE(start_date,'%m-%d-%Y') AND STR_TO_DATE(end_date,'%m-%d-%Y')")->get()->row()->status;

                if($result2 == 'Approved'){
                            $btn = "L";
                }else{

                    if(!empty($to_from_time)) {
                        $shift_start_time = date("H:i",strtotime($to_from_time[0]->shift_start_time));
                        $shift_end_time = date("H:i",strtotime($to_from_time[0]->shift_end_time));
                        $shift_id = $to_from_time[0]->id;

                        $shift_start_time2              = new DateTime('0000-00-00 '.$shift_start_time);
                        $shift_end_time2                = new DateTime('0000-00-00 '.$shift_end_time);

                        $interval = date_diff($shift_end_time2,$shift_start_time2);
                        $tot_hrs = $interval->format('%h:%i');

                        if(strtotime($current)<=strtotime(date("Y-m-d"))) {
                            $btn = "<td style='background:white' class='shift_scheduler_tooltip'>".$shift_start_time." To ".$shift_end_time."</td>";
                        } else {
                            // $btn = $shift_start_time." To ".$shift_end_time."<button class='btn btn-primary schedule_shift tooltip_display' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'> R</button>";

                            $btn = "<td style='background:white' class='shift_scheduler_tooltip'>

                            <form name='shift_scheduler_frm' method='POST'>
                                <input type='hidden' name='shift_id' id='shift_id' value='".$shift_id."'>
                                <input type='hidden' name='shift_date' id='shift_date' value='".$current."'>
                                <input type='hidden' name='shift_user_id' id='shift_user_id' value='".$user->username."'>

                            <table class='table table-bordered table-hover'>
                                <tr>
                                    <td><input type='time' class='save_scheduler shift_start_time' name='shift_start_time' id='shift_start_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."' value='".$shift_start_time."'></td>
                                    <td><input type='time' class='save_scheduler shift_end_time' name='shift_end_time' id='shift_end_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."' value='".$shift_end_time."'></td>
                                    <td class='tot_hrs'>".$tot_hrs."</td>
                                </tr>
                            </table></form>";

                        }
                    } else {
                        if(strtotime($current)<=strtotime(date("Y-m-d"))) {
                            $btn = "<td style='background:white' class='shift_scheduler_tooltip'>-</td>";
                        } else {
                            // $btn = "<button class='btn btn-primary schedule_shift tooltip_display' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'>Schedule</button>";

                            $btn = "<td style='background:white' class='shift_scheduler_tooltip'>

                             <form name='shift_scheduler_frm' method='POST'>
                                <input type='hidden' name='shift_id' id='shift_id' value='".$shift_id."'>
                                <input type='hidden' name='shift_date' id='shift_date' value='".$current."'>
                                <input type='hidden' name='shift_user_id' id='shift_user_id' value='".$user->username."'>

                            <table class='table table-bordered table-hover'>
                                <tr>
                                    <td><input type='time' class='save_scheduler shift_start_time' name='shift_start_time' id='shift_start_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'></td>
                                    <td><input type='time' class='save_scheduler shift_end_time' name='shift_end_time' id='shift_end_time' data-date='".$current."' data-userid='".$user->username."' data-shift_id='".$shift_id."'  data-start_date='".$shift_start_time."' data-end_date='".$shift_end_time."'></td>
                                    <td class='tot_hrs'>0</td>
                                </tr>
                            </table></form>";
                        }
                    }
                }
                $report_array['display_data'][$i]['date_array'][] = $btn;

                $current=date('Y-m-d',strtotime($current.' +1 day'));
                $ss_cnt2++;
            }
            // $report_array['display_data'][$i]['date_array'][] = number_format($hours,2);
            $i++;
        }
        $report_arr=[];
        $report_array_html= '

            <div class="row">

                <div class="col-md-12" style="margin: 20px 0px;">
                    <div class="row">
                        <div class="col-md-2">
                            <span style="background-color: green;display: inline-table;height: 10px;width: 60px;">&nbsp;</span> : Approved Leave
                        </div>
                        <div class="col-md-2">
                            <span style="background-color: yellow;display: inline-table;height: 10px;width: 60px;">&nbsp</span> : Pending Leave
                        </div>
                        <div class="col-md-2">
                            <span style="background-color: blue;display: inline-table;height: 10px;width: 60px;">&nbsp</span> : Decline Leave
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-dark next_day copy_week_timesheet_report" data-date="'.$report_array['start_date'].'" data-start_date="'.$report_array['start_date'].'" data-end_date="'.$report_array['end_date'].'">Copy from Last Week</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-3">
                    <button class="btn btn-dark previous_day week_timesheet_report_click" data-type="previous_week" data-date="'.$report_array['start_date'].'"><<< Previous Week </button>
                </div>
                <div class="col-md-6 text-right my-3">
                    <button class="btn btn-dark next_day week_timesheet_report_click" data-type="next_week" data-date="'.$report_array['start_date'].'">Next Week >>></button>
                </div>
            </div>

            <div class="col-md-12 p-0">
                <div class="container table-responsive timesheet-header" style="width: 100%;padding: 0px;margin: 0px;max-width: 100%;}">
                    <table class="table table-bordered table-hover" id="tbl_timesheet_report">
                        <thead class="headsec">
                        <tr>
                            <th class="text-white dtfc-fixed-left sticky-header" style="background: #ec4d4d;">User</th>';
                            // $report_array_html .= '<th class="text-white dtfc-fixed-left sticky-header" style="background: #ec4d4d;">Total</th>';
                            $start_date        = $report_array['start_date'];
                            $end_date          = $report_array['end_date'];

                            $begin = new DateTime($start_date);
                            $end = new DateTime($end_date);
                            $end->modify('+1 day');

                            $interval = DateInterval::createFromDateString('1 day');
                            $period = new DatePeriod($begin, $interval, $end);
                            // print_r($period);
                            // exit;
                            foreach ($period as $dt) {
                                $report_array_html .= '<th class="text-white" style="position:sticky;top:-5px;z-index:99;background: #ec4d4d;">'.$dt->format("m/d/Y").'

                                    <table class="table table-bordered table-hover" style="border:0;">
                                        <tr style="border:0;">
                                            <th class="text-white" style="background: #ec4d4d; border:0;">In</th>
                                            <th class="text-white" style="background: #ec4d4d; border:0;">Out</th>
                                            <th class="text-white" style="background: #ec4d4d; border:0;"># Hours</th>
                                        </tr>
                                    </table>

                                </th>';
                            }
                            $report_array_html .= '
                        </tr>

                        </thead>';
                        //echo $report_array_html;exit;

                    $report_array_html .= '<tbody>';

            // $report_arr[]=implode(',', $head_arr);

            foreach ($report_array['display_data'] as $key => $value) {
                if($value['username']!=' '){
                    $row_arr=[];
                    $report_array_html .=  '<tr>';
                    $report_array_html .= '<td style="background:white">'.$value['username'].'</td>';
                    $row_arr[]=$value['username'];

                    // $tempElement = count($value['date_array'])-1;
                    // $tempValue   = $value['date_array'][$tempElement];
                    // array_pop($value['date_array']);
                    // array_unshift($value['date_array'],$tempValue);

                    $r=0;
                    foreach ($value['date_array'] as $value_day) {


                        if($value_day === 'L')
                            $report_array_html .= '<td style="background:green;color:white;font-weight:bold;text-align: center;">Approved</td>';
                        else
                            $report_array_html .= $value_day.'</td>';

                        $r++;

                        $row_arr[]=$value_day;
                    }
                    $report_array_html .= "</tr>";
                    $report_arr[]=implode(',', $row_arr);
                }
            }

        $report_array_html .= '</tbody></table>';
        $report_array_html .= '<link rel="stylesheet" type="text/css" href="'.base_url().'/assets/cashier/style/datatable@1.10.22/jquery.dataTables.css"/>';
        $report_array_html .= '<script src="'.base_url().'/assets/report/js/jquery.dataTables.min.js"></script>';
        $report_array_html .= '<script src="'.base_url().'/assets/report/js/dataTables.buttons.min.js"></script>';
        $report_array_html .= '<script src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script>';



        $store_result = $this->db->from('web_setting')->get()->row()->name;
        $store_address_result = $this->db->from('web_setting')->get()->row()->address;
        $storename = ($store_result!='')?$store_result:'Campus Liquor';

        $store_arr = array();
        $store_arr["store_name"]         = $storename;
        $store_arr["store_address"]      = $store_address_result;
        $store_arr["store_daterange"]    = date("m-d-Y",strtotime($start_date)).' to '.date("m-d-Y",strtotime($end_date));

        $report_array_html .= '<script>
        var tbl_timesheet_report = jQuery("#tbl_timesheet_report").DataTable({
            fixedColumns: {
                left: 1
            },
            fixedHeader: {
                header: true,
                footer: true,
            },
            lengthChange: false,
            "pageLength": 8,
            "autoWidth": true,
            "bLengthChange": false,
            "responsive": true
        });
        </script>';

        $report_array_html .= '</div></div>';

        $report_array['html']=$report_array_html;
        $report_array['csv_html_arr']=$report_arr;
        $report_array['start_date']=$start_date;
        $report_array['end_date']=$end_date;
        return $report_array;

    }

    public function insertLastWeekReportSchedulerData($btn_date) {

        $is_success = 0;
        $setting=$this->Gen_settingm->retrieve_setting_editdata();
        $max_days=7;
        $monday = strtotime("last monday");
        $monday =$current= date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $days=0;
        for($i=1;$i<=4;$i++){
            $plus6=$days-6;

            $days = $days+7;
            $plus6 = $plus6+7;
            $individual['start_date']= date('Y-m-d',strtotime($btn_date.' -'.$days.' days'));
            $individual['end_date']= date('Y-m-d',strtotime($btn_date.' -'.$plus6.' days'));

            $days=$days+7;
            $data_ranges[]=$individual;
            if($i==1){ // current weak
                $data=$individual;
            }
        }

        $this->db->select('*');
        $this->db->from('shift_scheduler');
        $this->db->where("DATE(shift_date) BETWEEN '".$data['start_date']."' AND '".$data['end_date']."'");
        $result = $this->db->get()->result_array();

        // print "===========>".$this->db->last_query();

        if(!empty($result)) {
            foreach ($result as $key => $value) {
                $user_id            = $value['user_id'];
                $shift_date         = $value['shift_date'];
                $shift_start_time   = $value['shift_start_time'];
                $shift_end_time     = $value['shift_end_time'];

                $date               = strtotime($shift_date);
                $date               = strtotime("+7 day", $date);
                $next_shift_date    = date('Y-m-d', $date);

                if($next_shift_date > date('Y-m-d')) {

                    $this->db->from('tbl_emp_leave');
                    $result2 =$this->db->where(['employee_id' => $user_id])->where("'".date("Y-m-d",strtotime($next_shift_date))."' BETWEEN STR_TO_DATE(start_date,'%m-%d-%Y') AND STR_TO_DATE(end_date,'%m-%d-%Y')")->get()->row()->status;

                    if($result2 != 'Approved') {

                        $this->db->where('user_id', $user_id);
                        $this->db->where('shift_date', $next_shift_date);
                        $this->db->delete('shift_scheduler');

                        $shift_scheduler_param                      = array();
                        $shift_scheduler_param["user_id"]           = $user_id;
                        $shift_scheduler_param["shift_date"]        = $next_shift_date;
                        $shift_scheduler_param["shift_start_time"]  = $shift_start_time;
                        $shift_scheduler_param["shift_end_time"]    = $shift_end_time;

                        $this->db->insert('shift_scheduler', $shift_scheduler_param);
                        $insert_id = $this->db->insert_id();
                        $is_success = 1;
                    }
                }
            }
        }
        return $is_success;
    }

    public function shiftReportAjax($data_shift_id=0,$data_terminal_id=0) {

        $this->db->select('users.first_name,users.last_name,FORMAT(sum(cash_in_drawer),2) as tot_cash_in_drawer,FORMAT(sum(cash_out_drawer),2) as tot_cash_out_drawer,FORMAT(sum(coin_dispenser_in),2) as tot_coin_dispenser_in,(select FORMAT(sum(paid_amount),2) from `order` where is_cash_card = 1 and shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as cash_sales,

            (select FORMAT(sum(total_amount),2) from `refund_order` where is_cash_card = 1 and shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as refund_amount,

            (select FORMAT(sum(paid_amount),2) from `order` where (is_cash_card = 2 or is_cash_card = 3) and shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as card_sales,


            (select FORMAT(sum(paid_amount),2) from `order` where is_cash_card = 2 and card_type = 0 and shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as card_sales_credit,

            (select FORMAT(sum(paid_amount),2) from `order` where is_cash_card = 2 and card_type = 1 and shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as card_sales_debit,

            (select FORMAT(sum(paid_amount),2) from `order` where is_cash_card = 3 and shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as card_sales_ebt

            ,(select FORMAT(sum(redeem_discount),2) from `order` where shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as redeem_discount_db,(select FORMAT(sum(cash_amount),2) from `cash_drop` where  shift = "'.$data_shift_id.'" and terminal = "'.$data_terminal_id.'") as paid_outs,tbl_user_shift.username');
        $this->db->from('tbl_user_shift');

        $this->db->join('user_login', 'user_login.username = tbl_user_shift.username','LEFT');
        $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
        //$this->db->where('username', $this->session->userdata['username']);
        //$this->db->where('shift_in_out', 2);
        //$this->db->where('DATE(date)', date("m-d-Y"));
        $this->db->where('id', $data_shift_id);
        // $this->db->where('terminal_id', $data_terminal_id);
        $query_prod  = $this->db->get();
        $result_prod = $query_prod->result_array();
         // print $this->db->last_query(); exit();
        return $result_prod;
    }

    public function shiftReportPayoutAjax($data_shift_id=0) {

        $this->db->select('supplier_emp_name,created_at,payout_money,type');
        $this->db->from('tbl_payout');
        $this->db->where('shift', $data_shift_id);
        $query_prod  = $this->db->get();
        $result_prod_payout = $query_prod->result_array();

        $this->db->select('customer_name as supplier_emp_name,payout_date as created_at,payout_amount as payout_money,"Scratcher" as type');
        $this->db->from('tbl_scratchers_payout');
        $this->db->where('shift', $data_shift_id);
        $query_prod_scratcher  = $this->db->get();
        $result_prod_scratcher = $query_prod_scratcher->result_array();

        $master_arr = array_merge($result_prod_payout,$result_prod_scratcher);
        return $master_arr;
    }

    public function shiftReportCashdropAjax($data_shift_id=0) {

        $this->db->select('(select users.first_name from user_login left join users on users.user_id = user_login.user_id where user_login.username = cash_drop.user_id) as username, datetime, cash_amount');
        $this->db->from('cash_drop');
        $this->db->where('shift', $data_shift_id);
        $query_prod_cashdrop  = $this->db->get();
        $result_prod_cashdrop = $query_prod_cashdrop->result_array();
        return $result_prod_cashdrop;
    }

    public function salesReportSummaryDataFunc($cat) {

        $this->db->select('pi.quantity as qty, (select sum(od.quantity) from order_details as od where od.product_id = pi.product_id) as sold_qty,(pi.quantity - (select sum(od.quantity) from order_details as od where od.product_id = pi.product_id)) as remain_qty,pi.product_name as scratcher_name,o.order_date as sale_date,FORMAT(SUM(od.total_price),2) total_price');
        $this->db->from('product_information pi');
        $this->db->join('order_details od','od.product_id=pi.product_id','LEFT');
        $this->db->join('order o','o.order_id=od.order_id','LEFT');
        $this->db->where('is_scratchable', 0);
        $this->db->where('pi.category_id IN (SELECT category_id FROM product_category where (category_id = "'.$cat.'" or parent_category_id = "'.$cat.'"))', NULL, FALSE);
        $this->db->where('DATE(o.order_date)', date("Y-m-d"));
        $this->db->group_by('pi.product_id');
        $this->db->order_by('pi.created_at','desc');
        $this->db->order_by('od.quantity','desc');

        $query_sssdf = $this->db->get();
        $result_sssdf = $query_sssdf->result();
        // print $this->db->last_query();
        return $result_sssdf;
    }

    public function salesReportSummaryData($sales_summary_category) {

        $response = array();

        $response["status"] = "error";
        $response["html"]   = "";

        if($sales_summary_category == "scratcher") {
            $ScratcherSalesSummary = $this->scratcherSalesSummaryData();

            $total_sales = 0;
            $total_qty   = 0;
            $html_sss    = "";

            $html_sss.= '<thead class="thead-dark">';
                $html_sss.= '<tr>';
                    $html_sss.= '<th>Scartcher UPC#</th>';
                    $html_sss.= '<th>Scratcher Name</th>';
                    $html_sss.= '<th>Scartcher Price</th>';
                    $html_sss.= '<th>Qty</th>';
                    $html_sss.= '<th>Sale Date</th>';
                $html_sss.= '</tr>';
            $html_sss.= '</thead>';
            $html_sss.= '<tbody>';

            if(!empty($ScratcherSalesSummary)) {

                $response["status"] = "success";

                foreach ($ScratcherSalesSummary as $key_sss => $value_sss) {

                    $html_sss.= '<tr>';
                    $html_sss.= '<td>'.$value_sss->scratcher_upc.'</td>';
                    $html_sss.= '<td>'.$value_sss->scratcher_name.'</td>';
                    $html_sss.= '<td>$'.$value_sss->scratcher_price.'</td>';
                    $html_sss.= '<td>'.$value_sss->qty.'</td>';
                    $html_sss.= '<td>'.date("m-d-Y",strtotime($value_sss->sale_date)).'</td>';
                    $html_sss.= '</tr>';

                    $total_sales = $total_sales + $value_sss->scratcher_price;
                    $total_qty   = $total_qty + $value_sss->qty;
                }

                    $html_sss.= '<tr class="bg-green">';
                    $html_sss.= '<td colspan="2">Total Sales</td>';
                    $html_sss.= '<td>$'.$total_sales.'</td>';

                    $html_sss.= '<td class="bg-salmon">Total Qty</td>';
                    $html_sss.= '<td class="bg-salmon">'.$total_qty.'</td>';
                    $html_sss.= '</tr>';

            } else {
                $html_sss.= '<tr><td colspan="5" style="text-align: center !important;">No Records Found.</td></tr>';
            }

            $response["status"] = "success";
            $response["html"] = $html_sss;

        } else {

            $html_src    = "";
            $html_src.= '<thead class="thead-dark">';
                $html_src.= '<tr>';
                    $html_src.= '<th>Product Name</th>';
                    $html_src.= '<th>Total Qty</th>';
                    $html_src.= '<th>Sold Qty</th>';
                    $html_src.= '<th>Remaining Qty</th>';
                    $html_src.= '<th>Sale Amount</th>';
                    $html_src.= '<th>Sale Date</th>';
                $html_src.= '</tr>';
            $html_src.= '</thead>';
            $html_src.= '<tbody>';

            $salesReportSummaryDataFunc = $this->salesReportSummaryDataFunc($sales_summary_category);

            if(!empty($salesReportSummaryDataFunc)) {

                $response["status"] = "success";

                foreach ($salesReportSummaryDataFunc as $key_src => $value_src) {
                    $html_src.= '<tr>';
                    $html_src.= '<td>'.$value_src->scratcher_name.'</td>';
                    $html_src.= '<td>'.$value_src->qty.'</td>';
                    $html_src.= '<td>'.$value_src->sold_qty.'</td>';
                    $html_src.= '<td>'.$value_src->remain_qty.'</td>';
                    $html_src.= '<td>$'.$value_src->total_price.'</td>';
                    $html_src.= '<td>'.date("m-d-Y",strtotime($value_src->sale_date)).'</td>';
                    $html_src.= '</tr>';
                }
            } else {
                $html_src.= '<tr><td colspan="6" style="text-align: center !important;">No Records Found.</td></tr>';
            }

            $response["status"] = "success";
            $response["html"]   = $html_src;
        }

        echo json_encode($response);
        exit();
    }

    public function get_supplierdata_by_id($supplier_id){
        try{
            $this->db->select('supplier_information.supplier_name,supplier_information.supplier_id,COUNT(product_information.supplier_id) as productcount, product_information.product_id');
            $this->db->from('supplier_information');
            $this->db->join('product_information','product_information.supplier_id=supplier_information.supplier_id','LEFT');
            $this->db->where('supplier_information.supplier_id',$supplier_id);
            $this->db->where('product_information.is_deleted',0);
            $query = $this->db->get();

            $dat =  $query->row();

            $this->db->select('supplier_name,supplier_id');
            $this->db->from('supplier_information');
            $this->db->where('is_deleted', 0);
            $this->db->where_not_in('supplier_id', $supplier_id);
            $this->db->order_by('supplier_name', 'ASC');
            $querys =$this->db->get();
            $supp_list = $querys->result_array();

            $arrayName = array(
              'supplier' => $dat,
              'supplier_list' => $supp_list,
            );

            return $arrayName;

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    //BA7HHA82X17CJGLHXTVL
    public function updateSupplierId(){
        try{
            $old_id = $this->input->post('old_supplier_id');
            $new_id = $this->input->post('new_supplier_id');


            $data = [];
            $count = 0;
            foreach($old_id as $oid){
                // echo '<pre>'; print_r($count);
                $data['supplier_id'] =  (!empty($new_id[$count])) ? $new_id[$count] : $oid;
                $data['supplier'] =(!empty($new_id[$count])) ? $this->fetchSupplier($new_id[$count]) : $this->fetchSupplier($oid);

                $this->db->where('supplier_id',$oid);
                $this->db->update('product_information',$data);

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Update Product Information';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log

                $count++;

                $this->db->set('is_deleted', 1); //1
                $this->db->where('supplier_id', $oid);
                $this->db->update('supplier_information');

                // ST - for query log
                $last_query = $this->db->last_query();
                $user_id = $this->session->userdata['username'];
                $module = 'Inventory';
                $operation = 'Update Supplier Information';
                $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
                // EN - for query log
            }

            $user_id        =  $this->session->userdata('username');
            $notification   = 'Delete Supplier';
            $action_id      =  $this->session->userdata('username');
            $action         = 'delete supplier';
            $module         = 'inventory';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);


            // for($count = 0; $count < count($old_id); $count++){

            //     $data = array(
            //         'supplier_id' => (!empty($new_id[$count])) ? $new_id[$count] : $old_id[$count],
            //         'supplier' => (!empty($new_id[$count])) ? $this->fetchSupplier($new_id[$count]) : $this->fetchSupplier($old_id[$count]),
            //     );
            //     //update is_deleted on product information
            //     $this->db->where('supplier_id',$old_id[$count]);
            //     $this->db->update('product_information',$data);

            //     //update is_deleted on supplier information
            //     $this->db->set('is_deleted', 1); //1
            //     $this->db->where('supplier_id', $old_id[$count]);
            //     $this->db->update('supplier_information');

            // }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function fetchSupplier($supplier_id){
      $this->db->select('supplier_name');
      $this->db->from('supplier_information');
      $this->db->where('supplier_id',$supplier_id);
      $query = $this->db->get();

      $array = array();
      if($this->db->affected_rows() > 0) {
          $array = $query->row();
      }
      return $array->supplier_name;

    }

    public function isCouponExist($coupon){
        try{
            $this->db->select('coupon_name');
            $this->db->from('coupon_new');
            $this->db->where('coupon_name',$coupon);
            $this->db->where('manage_type', 0);
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

    public function is_product_exist($product){
        try{
            $this->db->select('product_name');
            $this->db->from('product_information');
            $this->db->where('product_name',$product);
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


    public function checkExistCoupon($coupon,$coupon_id){
        try{
            $this->db->select('coupon_name');
            $this->db->from('coupon_new');
            $this->db->where('coupon_name',$coupon);
            $this->db->where('manage_type', 0);
            $this->db->where_not_in('coupon_id',$coupon_id);

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

    public function isPromotionExist($coupon){
        try{
            $this->db->select('coupon_name');
            $this->db->from('coupon_new');
            $this->db->where('coupon_name',$coupon);
            $this->db->where('manage_type',1);
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


    public function checkExistPromotion($coupon,$coupon_id){
        try{
            $this->db->select('coupon_name');
            $this->db->from('coupon_new');
            $this->db->where('coupon_name',$coupon);
            $this->db->where('manage_type', 1);
            $this->db->where_not_in('coupon_id',$coupon_id);

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

    //prashant created 4 aug
    public function get_leaverequests_on_load(){
       try{
           $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
           $this->db->from('tbl_emp_leave');
           $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
           $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
           $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');
           $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
           $this->db->limit('4');
           $this->db->where('tbl_emp_leave.employee_id', $this->input->post('hrms_id'));  //added prashant
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
    //end prashant

     public function get_leaverequests_by_type(){
        try{
            $leave_req_type = $this->input->post('leave_req_type');
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
               $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
                $this->db->from('tbl_emp_leave');
                $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
                $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
                $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');            //$this->db->where('is_delete',0);
                if($leave_req_type=="month")
                {
                $this->db->where('MONTH(tbl_emp_leave.created_at)', date('m') );
                }
                elseif($leave_req_type=='week')
                {
                     $this->db->where('tbl_emp_leave.created_at <=', date('Y-m-d', strtotime('1 week')));
                     $this->db->where('tbl_emp_leave.created_at >', date('Y-m-d', strtotime('-1 day')));
                }elseif($leave_req_type==''){
                    $this->db->order_by('tbl_emp_leave.updated_at', 'DESC');
                    $this->db->limit('4');
                }
                $this->db->where('tbl_emp_leave.employee_id', $this->input->post('username'));  //added prashant
                $query=$this->db->get();
     // echo $this->db->last_query(); exit;
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

    public function get_leaverequests_in_dates(){
        try{
            $leave_req_type = $this->input->post('leave_req_type');
            $fdate = $this->input->post('from_date');
            //$fdate_n=date("Y-m-d",strtotime($fdate));
            //echo $fdate_n; exit;
            $to_date = $this->input->post('to_date');
            //$to_n=date("Y-m-d",strtotime($to_date));
            $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
                $this->db->from('tbl_emp_leave');
                $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
                $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
                $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');            //$this->db->where('is_delete',0);
                $this->db->where('tbl_emp_leave.created_at >=', $fdate);
                $this->db->where('tbl_emp_leave.created_at <=', $to_date);
               // }
                $this->db->where('tbl_emp_leave.employee_id', $this->input->post('username'));  //added prashant
                $query=$this->db->get();
           // echo $this->db->last_query(); exit;
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

    public function get_cashadv_by_type(){
        try{
            $cash_req_type = $this->input->post('cash_req_type');
            $this->db->select('users.first_name,users.last_name,tbl_advance.*');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
//            // $this->db->where('start_date', date("m-d-Y",strtotime($selected_date)));
//            $this->db->where('Date(tbl_advance.created_at)', $selected_date);
            if($cash_req_type=="month")
                {
                $this->db->where('MONTH(tbl_advance.created_at)', date('m') );
                }
                elseif($cash_req_type=='week')
                {
                     $this->db->where('tbl_advance.created_at <=', date('Y-m-d', strtotime('1 week')));
                     $this->db->where('tbl_advance.created_at >', date('Y-m-d', strtotime('-1 day')));
                }elseif ($cash_req_type=='') {
                    $this->db->order_by('tbl_advance.created_at', 'DESC');
                    $this->db->limit('4');
                }
            $this->db->where('tbl_advance.employee_id', $this->input->post('username'));  //added prashant
            $query=$this->db->get();
            // echo $this->db->last_query(); exit;
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
    public function get_cashrequests_in_dates(){
        try{
            $fdate1 = $this->input->post('from_cash_date');
            //$fdate_n1=date("Y-m-d",strtotime($fdate1));
            //echo $fdate_n; exit;
            $to_date1 = $this->input->post('to_cash_date');
            //$to_n1=date("Y-m-d",strtotime($to_date1));
            $this->db->select('users.first_name,users.last_name,tbl_advance.*');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');            //$this->db->where('is_delete',0);
                $this->db->where('tbl_advance.created_at >=', $fdate1);
                $this->db->where('tbl_advance.created_at <=', $to_date1);
               // }
                $this->db->where('tbl_advance.employee_id', $this->input->post('username'));  //added prashant
                $query=$this->db->get();
          //echo $this->db->last_query(); exit;
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
            'submit_timecard_rights' => !empty($this->input->post('submit_timecard_rights')) ? implode(',',$this->input->post('submit_timecard_rights')) : '',
            'e_order_rights' => !empty($this->input->post('e_order_rights')) ? $this->input->post('e_order_rights') : '',
            'market_place_rights' => !empty($this->input->post('market_place_rights')) ? $this->input->post('market_place_rights') : '',
        );

        if($this->db->insert('front_role_permission', $data)){
            $user_id        =  $this->session->userdata('username');
            $notification   = 'Create Role Permission ('.$this->input->post('role_name').')';
            $action_id      =  $this->session->userdata('username');
            $action         = 'add role permission';
            $module         = 'store setting';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function isRoleExist($rolename){
        try{
            $this->db->select('role_name');
            $this->db->from('front_roles');
            $this->db->where('role_name',$rolename);
            $this->db->where('is_deleted',0);
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

    public function get_frontrole_by_id($role_id){
        try{

            $this->db->select('front_roles.role_name,front_role_permission.*');
            $this->db->from('front_role_permission');
            $this->db->join('front_roles', 'front_roles.id = front_role_permission.Role_id','LEFT');
            $this->db->where('front_role_permission.Role_id',$role_id);

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

    public function update_role(){
        $role_id = $this->input->post('Role_id');
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
              'submit_timecard_rights' => !empty($this->input->post('submit_timecard_rights')) ? implode(',',$this->input->post('submit_timecard_rights')) : '',
              'e_order_rights' => !empty($this->input->post('e_order_rights')) ? $this->input->post('e_order_rights') : '',
              'market_place_rights' => !empty($this->input->post('market_place_rights')) ? $this->input->post('market_place_rights') : '',
        );

        $this->db->where('Role_id',$role_id);
        if($this->db->update('front_role_permission', $data)){
            $user_id        =  $this->session->userdata('username');
            $notification   = 'Update Role Permission ('.$this->input->post('role_name').')';
            $action_id      =  $this->session->userdata('username');
            $action         = 'update role permission';
            $module         = 'store setting';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function isCheckExistRole($role_id,$role_name){
        try{
            $this->db->select('role_name');
            $this->db->from('front_roles');
            $this->db->where('role_name',$role_name);
            $this->db->where_not_in('id',$role_id);

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
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Delete Role Permission';
                $action_id      =  $this->session->userdata('username');
                $action         = 'delete role permission';
                $module         = 'store setting';

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


     public function get_all_scratchers() {
        try{
            $this->db->select('case_UPC,product_name');
            $this->db->from('product_information');
            $this->db->where('product_information.is_deleted', 0);
            $this->db->where('product_information.is_scratchable', 1);
            $this->db->where('product_information.is_archive_scratcher', 0);
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

    public function isSupplierNameExist($name){
        try{
            $this->db->select('supplier_name');
            $this->db->from('supplier_information');
            $this->db->where('supplier_name',$name);
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

    public function supplierNameExist($supplier_name,$supplier_id){
        try{
            $this->db->select('supplier_name');
            $this->db->from('supplier_information');
            $this->db->where('supplier_name',$supplier_name);
            $this->db->where_not_in('supplier_id ',$supplier_id);

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

    public function get_supplier_name($supplier_id){
        try{
            $this->db->select('supplier_name');
            $this->db->from('supplier_information');
            $this->db->where('supplier_id',$supplier_id);
            $this->db->where('is_deleted',0);
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

    public function update_fontsize(){
        try{
            $data = array(
              'font_size' => $this->input->post('font_size'),
            );

            if($this->db->update('web_setting',$data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Update font size settings';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update font size';
                $module         = 'store setting';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
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

    public function update_payroll(){
        try{
            $data = array(
              'pay_period' => $this->input->post('pay_period'),
              'pay_date' => $this->input->post('pay_date'),
            );
            if($this->db->update('web_setting',$data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Update Payroll settings';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update payroll';
                $module         = 'store setting';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
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

    public function get_fontsize(){
        try{
            $this->db->select('font_size,custom_msg,paycheck_amount,no_of_paychecks,pay_period,pay_date,cash_register,start_cash,cashback_fee,about_store,timezone,date_format,time_format,logo,node_status,credit_card_fees,credit_card_fees_type');
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

    public function get_websettings(){
        try{
            $this->db->select('*');
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

    public function get_leave_by_id(){
        try{
            $emp_id = (!empty($this->input->post('employee_id')) ? $this->input->post('employee_id') : $this->session->userdata['username']);
            $this->db->select('*');
            $this->db->from('tbl_emp_leave');
            $this->db->where('id', $this->input->post('leave_id'));
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
                    'remaining_leaves' => ((int)$maximum_leaves - (int)$days_requested),
                    'remaining_hr' => ((int)$maximum_hr + (int)$hours_requested),
                    'leaveType' => $leave_type,
                    'days_requested' => $query->row()->days_requested,
                    'hours_requested' => $query->row()->hours_requested,
                    'start_date' => $query->row()->start_date,
                    'end_date' => $query->row()->end_date,
                    'reason' => $query->row()->reason,
                    'leave_id'=> $this->input->post('leave_id'),
                );
                return $arrayName;
            }

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_leave($leave_id,$data){

        try{
            $emp_id = $data['employee_id'];
            $this->db->where('id', $leave_id);
            $this->db->update('tbl_emp_leave',$data);
            $query = $this->db->get();
            if($this->db->affected_rows() > 0){
               $user_id        =  $emp_id;
               $notification   =  'Requested for leave';
               $action_id      =  $emp_id;
               $action         = 'pending';
               $module         = 'hrms';
               $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
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

    public function delete_leave(){
        try{
            $data = array(
                'status' => 'Cancelled',
                'days_requested' => '0',
                'hours_requested' => '0',
                'status_no' => '4',
            );
            $this->db->where('id', $this->input->post('leave_id'));
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

    public function delete_cash(){
        try{
            $this->db->set('status', 'Cancelled');
            $this->db->set('status_no', '4');
            $this->db->where('id', $this->input->post('cash_id'));
            $this->db->delete('tbl_advance');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_cashadv_by_id(){
        try{
            $this->db->select('id,advance_amount,reason,paycheck');
            $this->db->from('tbl_advance');
            $this->db->where('id', $this->input->post('cash_id'));
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

    public function update_advancecash(){
        try{
            $data = array(
                'employee_id'          => $this->session->userdata('username'),
                'employee_name'        => $this->session->userdata('name'),
                'advance_amount'       => $this->input->post('advance_amount'),
                'reason'               => $this->input->post('reason'),
                'paycheck'             => $this->input->post('paycheck'),
                'created_at'           => date('Y-m-d H:i:s'),
            );

            $data = $this->security->xss_clean($data);
            $this->db->where('id', $this->input->post('cash_id'));
            if($this->db->update('tbl_advance',$data)){
              $user_id        = $this->session->userdata('username');
              $notification   = 'Request for cash advance';
              $action_id      = $this->session->userdata('username');
              $action         = 'pending';
              $module         = 'hrms';
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


    public function delete_recept_msg(){
        try{
            $this->db->where('custom_receipt_msg', $this->input->post('msg'));
            $this->db->delete('tbl_custom_msg');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_userdata_by_role_id($role_id){
        try{
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

    public function get_promotion_receipt_msg(){
        try{
            $this->db->select('receipt_promotion');
            $this->db->from('coupon_new');
            $this->db->where('is_footer', 1);
            $querys =$this->db->get();
            if($this->db->affected_rows() > 0){
                return $querys->result_array();
            }else{
                return false;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function fetch_product_by_txt($searchtxt){
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
                $response[] = array(
                  "value"=>$value['product_id'],
                  "label"=>$value['product_name']);
            }
        }
        return $response;
    }

    public function fetch_product_by_txts($searchtxt, $exist_id){
        $this->db->select('product_id,product_name');
        $this->db->from('product_information');
        $this->db->where('is_deleted', 0);
        $this->db->where_not_in('product_id', $exist_id);
        $this->db->like('product_name', $searchtxt, 'both');
        $query=$this->db->get();

        $response=array();
        if ($query->num_rows() > 0) {
            $count=0;
            $fetch_record=$query->result_array();
            foreach ($fetch_record  as $key => $value) {
                $response[] = array(
                  "value"=>$value['product_id'],
                  "label"=>$value['product_name']);
            }
        }
        return $response;
    }

    public function getProdutctById($product_id){
        try{
            $this->db->select('product_name,product_id');
            $this->db->from('product_information');
            $this->db->where('product_id', $product_id);
            $query =$this->db->get();
            if($this->db->affected_rows() > 0){
                return $query->row();
            }else{
                return false;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_archive_coupon(){
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted', 1);
            $this->db->where('manage_type', 0);
            //$this->db->where('end_date >=', date('Y-m-d'));
            $this->db->order_by('end_date', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function activate_coupon(){
        try{
          $this->db->set('is_deleted', 0);
          $this->db->set('end_date', $this->input->post('end_date'));
          $this->db->where('coupon_id',$this->input->post('coupon_id'));
              if($this->db->update('coupon_new')){
                  $user_id        =  $this->session->userdata('username');
                  $notification   =  'Activate coupon';
                  $action_id      =  $this->session->userdata('username');
                  $action         = 'activate couppon';
                  $module         = 'customer loyalty';

                  $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                  return TRUE;
              }
          }catch(Exception $ex) {
                error_log($ex->getTraceAsString());
                echo $ex->getTraceAsString();
                return FALSE;
          }
    }

    public function get_all_archive_promotion(){
        try{
            $this->db->select('*');
            $this->db->from('coupon_new');
            $this->db->where('is_deleted', 1);
            $this->db->where('manage_type', 1);
            //$this->db->where('end_date >=', date('Y-m-d'));
            $this->db->order_by('end_date', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function activate_promotion(){
        try{
            $this->db->set('is_deleted', 0);
            $this->db->set('end_date', $this->input->post('end_date'));
            $this->db->where('coupon_id',$this->input->post('coupon_id'));
            if($this->db->update('coupon_new')){
                $user_id        =  $this->session->userdata('username');
                $notification   =  'Activate Promotion';
                $action_id      =  $this->session->userdata('username');
                $action         = 'activate promotion';
                $module         = 'customer loyalty';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                return TRUE;
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

    public function delete_receipt_promotion(){
        try{
            $data = array(
                'is_footer'            => 0,
                'receipt_promotion'    => '',
            );
            $data = $this->security->xss_clean($data);
            $this->db->where('coupon_id', $this->input->post('coupon_id'));
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

    public function expire_scratcher($id){
        $this->db->set('scratcher_status', 1);
        $this->db->set('is_archive_scratcher', 1);
        $this->db->where('product_id', $id);
        $qry = $this->db->update('product_information');

        // ST - for query log
        $last_query = $this->db->last_query();
        $user_id = $this->session->userdata['username'];
        $module = 'Inventory'; // Inventory
        $operation = 'Scratcher Expire';
        $data = $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
        // EN - for query log

        return $qry;
    }

    public function delete_all_product(){
        $this->db->set('is_deleted', 1);
        $qry = $this->db->update('product_information');

        // ST - for query log
        $last_query = $this->db->last_query();
        $user_id = $this->session->userdata['username'];
        $module = 'Inventory';
        $operation = 'Delete All Product';
        $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
        // EN - for query log

        return $qry;
    }

    public function delete_all_custom_product(){
        $this->db->set('is_deleted', 1);
        $this->db->where('is_custom_product', 1);

        $qry = $this->db->update('product_information');

        // ST - for query log
        $last_query = $this->db->last_query();
        $user_id = $this->session->userdata['username'];
        $module = 'Inventory';
        $operation = 'Delete All Custom Product';
        $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
        // EN - for query log

        return $qry;
    }

    public function delete_all_suppliers(){
        $this->db->set('is_deleted', 1); //1

        $qry = $this->db->update('supplier_information');

        // ST - for query log
        $last_query = $this->db->last_query();
        $user_id = $this->session->userdata['username'];
        $module = 'Inventory';
        $operation = 'Delete All Suppliers';
        $this->need_lib->synk_to_live($user_id,$module,$operation,$last_query);
        // EN - for query log

        return $qry;
    }

    public function update_receipt_msg(){
        try{
          //echo '<pre>'; print_r($_POST);exit;
            if($this->input->post('new_msg') == '--Select Custom Message--'){
              $msg = $this->input->post('cust_msg');
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
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Update receipt settings';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update receipt';
                $module         = 'store setting';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
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

    public function get_store_name(){
        try{
            $this->db->select('name');
            $this->db->from('web_setting');
            $query =$this->db->get();
            return $query->result();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_paychecks(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_paychecks');
            $this->db->order_by('value', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_paychecks(){
        try{
            $paychecks = $this->input->post('paychecks');
            $this->db->where('id >', '0');
            $delete = $this->db->delete('tbl_paychecks');
            if($delete){
                for($temp = 1; $temp <= $paychecks; $temp++){
                    $dat = array(
                        'id' => $temp,
                        'paycheck' => 'Next '.$temp.' Paychecks',
                        'value' => $temp
                    );
                    $this->db->insert('tbl_paychecks',$dat);
                }
            }

            $data = array(
              'paycheck_amount' => $this->input->post('paycheck_amount'),
              'no_of_paychecks' => $paychecks,
            );
            if($this->db->update('web_setting',$data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Update Cash Advance settings';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update cash advance settings';
                $module         = 'store setting';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
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

    public function change_clock_in_out($attendance,$username){
        try{
            $this->db->set('clock_in_out', $attendance);
            $this->db->where('username',$username);
            $this->db->update('user_login');
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function check_clock_in_out(){
        try{
            $username = $this->session->userdata('userdata')['username'];
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

    public function check_clockin($count){
        try{
            $this->db->select('clock_in_out');  //chnages
            $this->db->from('user_login');
            $this->db->where('clock_in_out', $count);
            $query=$this->db->get();
            return $query->num_rows();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
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
        $user_id        =  $this->session->userdata('username');
        $notification   = 'Update Cash Register Settings';
        $action_id      =  $this->session->userdata('username');
        $action         = 'update cash register';
        $module         = 'store setting';

        $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
          return $data;
      }else{
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

    public function update_bins(){
        try{
            $bins = $this->input->post('bins');
            $this->db->set('is_archive_scratcher', '1');
            $this->db->set('scratcher_status', '2');
            $this->db->where('bin >', $bins);
            $this->db->update('product_information');
            // $this->db->where('id >', '0');
            // $delete = $this->db->delete('tbl_scratcher_bins');
            // if($delete){
            //     for($temp = 1; $temp <= $bins; $temp++){
            //         $dat = array(
            //             'id' => $temp,
            //             'bins' => 'Bin '.$temp,
            //             'value' => $temp
            //         );
            //         $this->db->insert('tbl_scratcher_bins',$dat);
            //     }
            // }
            // return TRUE;

            $this->db->set('is_archive', '1');
            $this->db->where('id >', '0');
            $update = $this->db->update('tbl_scratcher_bins');
            if($update){
                for($temp = 1; $temp <= $bins; $temp++){
                    $this->db->set('is_archive', '0');
                    $this->db->where('id', $temp);
                    $this->db->update('tbl_scratcher_bins');
                }
            }

            $user_id        =  $this->session->userdata('username');
            $notification   = 'Update Scratcher Settings';
            $action_id      =  $this->session->userdata('username');
            $action         = 'update scratcher settings';
            $module         = 'store setting';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);

            return TRUE;

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

    public function get_all_scratcher_bins_new(){
        try{
            // $this->db->select('tbl_scratcher_bins.*');  //chnages
            // $this->db->from('tbl_scratcher_bins');
            // $this->db->where('is_archive',0);
            $this->db->select('COUNT(scratcher_status) AS available');  //chnages
            $this->db->from('product_information');
            $this->db->where('product_information.is_deleted',0);
            $this->db->where('product_information.is_scratchable',1);
            $this->db->where('product_information.scratcher_status',0);
            $query2 =$this->db->get();

            $conditions = $query2->result();


            $this->db->select('bin');  //chnages
            $this->db->from('product_information');
            $this->db->where('product_information.is_deleted',0);
            $this->db->where('product_information.is_scratchable',1);
            if($conditions[0]->available != 0){
              $this->db->where('product_information.scratcher_status ',0);
            }
            $query =$this->db->get();

            $bin_array = $query->result_array();

            $dat= [];
            foreach ($bin_array as $value) {
                 array_push($dat,$value['bin']);
            }

            $this->db->select('tbl_scratcher_bins.*');  //chnages
            $this->db->from('tbl_scratcher_bins');
            $this->db->where('is_archive',0);
            if($conditions[0]->available != 0){
              $this->db->where_not_in('value',$dat);
            }
            $query1=$this->db->get();
            return $query1->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_shift_terminal_data($data){
        try{
           if($this->db->insert('tbl_user_shift', $data)){
               $insert_id = $this->db->insert_id();

               //added 18-Nov
               $arr = array('active' => 1,'username' => $data['username']);
               $this->db->where('terminal_id',$this->current_terminal);
               $this->db->update('terminal', $arr);


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

    public function update_shift_terminal_data($data,$username){
       // echo '<pre>'; print_r($data);exit;
        try{
            $this->db->where('username', $this->session->userdata['shiftdata']['username']);
            $this->db->where('id', $this->session->userdata['shiftdata']['shift_id']);
            $this->db->where('terminal_id', $this->session->userdata['shiftdata']['terminal_id']);
            $this->db->where('date', date('Y-m-d'));
            if($this->db->update('tbl_user_shift',$data)){
                $this->db->set('user_shift_status',0);
                $this->db->where('username',$username);
                if($this->db->update('user_login')){
                    //added 18-Nov
                    $arr = array('active' => 0, 'username' => $username);
                    $this->db->where('terminal_id',$this->current_terminal);
                    $this->db->update('terminal', $arr);
                    //end added 18-Nov

                    $user_id        = $this->session->userdata['shiftdata']['username'];
                    $notification   = 'End Shift';
                    $action_id      = $this->session->userdata['shiftdata']['username'];
                    $action         = 'shift out';
                    $module         = 'clock in out';

                    $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                    return TRUE;
                }
            }else{
                return FALSE;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //imp added 18Nov2021
    public function update_shift_data($username,$shift_id,$terminal_id,$data){
        try{
            $this->db->where('username',$username);
            $this->db->where('id',$shift_id);
            $this->db->where('terminal_id',$terminal_id);

            if($this->db->update('tbl_user_shift',$data)){
               //added 18-Nov
               $arr = array('active' => 1,'username' => $username);
               $this->db->where('terminal_id',$this->current_terminal);
               $this->db->update('terminal', $arr);
               //end added 18-Nov

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



    // public function check_login_user(){
    //   try{
    //
    //       $this->db->select('clock_in_out');  //chnages
    //       $this->db->from('user_login');
    //       $this->db->where('username', $this->session->userdata['username']);
    //       $query=$this->db->get();
    //       if($this->db->affected_rows() > 0){
    //           return $this->session->userdata['username'];
    //       } else {
    //           return FALSE;
    //       }
    //   }catch(Exception $ex){
    //       error_log($ex->getTraceAsString());
    //       echo $ex->getTraceAsString();
    //       return FALSE;
    //   }
    // }

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

            // echo '<pre>'; print_r($query1->row());exit;
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

    public function check_user_login($username){
        try{
            $this->db->select('clock_in_out');  //chnages
            $this->db->from('user_login');
            $this->db->where('username',$username);
            $query=$this->db->get();
            return $query->row()->clock_in_out;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_current_shift_data($username,$shift){
        try{
            $user = $this->session->userdata['shiftdata']['username'];
            $this->db->select('id');
            $this->db->from('tbl_user_shift');
            $this->db->where('terminal_id', $this->current_terminal);
            $this->db->order_by('id','DESC');
            $this->db->limit(1);
            $query=$this->db->get();
            $shift_ID = $query->row()->id;

            $this->db->select('*');  //chnages
            $this->db->from('tbl_user_shift');
            $this->db->where('date', date('Y-m-d'));
            //added 13-06);
            $this->db->where('id', (!empty($this->session->userdata['shiftdata']['shift_id']) ? $this->session->userdata['shiftdata']['shift_id'] : $shift_ID));
            $this->db->where('terminal_id', $this->current_terminal);
            $this->db->where('shift_in_out', (!empty($user) ? 1 : 2));//$shift);
            // $this->db->or_where('shift_in_out', 1);//added 13-06);

            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $query=$this->db->get();

            $cash_in_drawer = round($query->row()->cash_in_drawer,2);


            //payout changes
            $this->db->select('SUM(payout_money - payout_by_user) as grand_total_payout');  //chnages
            $this->db->from('tbl_payout');
            $this->db->where('terminal', $this->current_terminal);
            $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
            $this->db->where('date', date('Y-m-d'));
            $this->db->where_not_in('payment_type','Check');
            $query8 = $this->db->get();

            $payout_amt1 = round($query8->row()->grand_total_payout,2);



            $this->db->select('SUM(payout_amount - payout_by_user) as grand_total_scratcher_payout');  //chnages
            $this->db->from('tbl_scratchers_payout');
            $this->db->where('terminal', $this->current_terminal);
            $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
            $this->db->where('date', date('Y-m-d'));
            $this->db->where_not_in('payment_type','Check');
            $query9 = $this->db->get();

            $payout_amt2 = round($query9->row()->grand_total_scratcher_payout,2);
            //end payout changes

            $this->db->select('SUM(total_amount) as grand_total_amt');  //chnages
            $this->db->from('order');
            $this->db->where('terminal', $this->current_terminal);
            $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
            $this->db->where('is_cash_card', 1);
            $this->db->where('date', date('m-d-Y'));
            $query2 = $this->db->get();

            $grand_total_amt = round($query2->row()->grand_total_amt,2);

            $this->db->select('sum(cash_amount) as grand_cash_drop');  //chnages
            $this->db->from('cash_drop');
            $this->db->where('terminal', $this->current_terminal);
            $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
            $this->db->where('date', date('m-d-Y'));
            $query3=$this->db->get();
            // $this->db->last_query();
            $grand_cash_drop =  round($query3->row()->grand_cash_drop,2);

             $cash = $this->get_fontsize();

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
              // 'bin_data' => json_decode($query->row()->bin_data_in, true),//$query1->result(),
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

    public function reorder_product($id,$reorder_level){
        $data = array(
          'reorder_level' =>  $reorder_level,
          'updated_empid' => $this->session->userdata('username'),
          'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('product_id', $id);
        if($this->db->update('product_information',$data)){
          return TRUE;
        }
    }

    public function reorder_all_product($reorder_level){
        $data = array(
          'reorder_level' =>  $reorder_level,
          'updated_empid' => $this->session->userdata('username'),
          'updated_at' => date('Y-m-d H:i:s'),
        );
        if($this->db->update('product_information',$data)){
          return TRUE;
        }
    }

    public function selectShift($shift_in_out){
        try{
            $this->db->select('id,shift_in_out,shift_no');
            $this->db->from('tbl_user_shift');
            $this->db->where('terminal_id',$this->current_terminal);
            $this->db->where('shift_in_out',$shift_in_out);
            $this->db->where('date', date('Y-m-d'));
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get();
            return $query->row();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_skip_shift(){
        try{
            $this->db->select('defer_shift');
            $this->db->from('tbl_user_shift');
            $this->db->where('id',$this->session->userdata['shiftdata']['shift_id']);
            $this->db->where('terminal_id',$this->session->userdata['shiftdata']['terminal_id']);
            $this->db->where('date', date('Y-m-d'));
            $query = $this->db->get();
            return $query->row()->defer_shift;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_grand_total_amt(){
      try{
            $this->db->select('SUM(total_amount) as grand_total_amt');  //chnages
            $this->db->from('order');
            $this->db->where('terminal', $this->session->userdata['shiftdata']['terminal_id']);
            $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
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

    public function change_user_shift_status(){
        try{
            $data = array(
                'id' =>  $this->input->post('shift_id'),
                'terminal_id' => $this->input->post('terminal_id'),
                'username' => $this->input->post('username'),
                'cash_out_drawer' => $this->input->post('cash_in_drawer'),
                'coin_dispenser_out' => $this->input->post('coin_dispenser'),
                'bin_data_out' => json_encode($this->input->post('bin_data')),
                'datetime_out' =>  date('Y-m-d H:i:s'),
                'defer_shift' => '0',
                'shift_in_out' => 2,
            );

            $this->db->set('user_shift_status',0);
            $this->db->where('username', $this->input->post('username'));
            if($this->db->update('user_login')){
                $this->db->where('username', $this->input->post('username'));
                $this->db->where('id', $this->input->post('shift_id'));
                $this->db->where('terminal_id', $this->input->post('terminal_id'));
                // $this->db->where('date', date('Y-m-d'));
                $this->db->where('date', $this->input->post('shift_date'));
                if($this->db->update('tbl_user_shift',$data)){
                    $user_id        =  $this->session->userdata('username');
                    $notification   = 'Shift Out by Manager';
                    $action_id      =  $this->session->userdata('username');
                    $action         = 'shift out';
                    $module         = 'store setting';

                    $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                    return $data['username'];
                }else{
                    return FALSE;
                }
            }
          //  $this->db->where('')

            // $this->db->set('user_shift_status', 0);

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_shift_in_user(){
        try{
          //date_default_timezone_set("America/Los_Angeles");
          $this->db->select('users.*,user_login.username,user_login.user_shift_status,tbl_user_shift.*');
          $this->db->from('users');
          $this->db->join('user_login', 'user_login.user_id = users.user_id','LEFT');
          $this->db->join('tbl_user_shift', 'tbl_user_shift.username = user_login.username','LEFT');
          $this->db->where('tbl_user_shift.shift_in_out', 1);
          // $this->db->where('tbl_user_shift.date', date('Y-m-d'));
          // $this->db->where('users.status', 1);
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

    public function get_last_shift_data($differ_shift){
        $this->db->select('cash_out_drawer,coin_dispenser_out,bin_data_out,shift_in_out');  //chnages
        $this->db->from('tbl_user_shift');
        //$this->db->where('date', date('m-d-Y'));
        $this->db->where('terminal_id', $this->current_terminal);

        if($differ_shift==1){
            $this->db->where('id!=',$this->session->userdata['shiftdata']['shift_id']);
        }

        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query=$this->db->get();
        if($query->num_rows()>0){
            $arrayName = array(
              'shift_in_out'=> $query->row()->shift_in_out,
              'cash_in_drawer' => round($query->row()->cash_out_drawer,2),
              'coin_dispenser' => round($query->row()->coin_dispenser_out,2),
              //'bin_data' => json_decode($query->row()->bin_data_out, true),//$query1->result(),
              'bin_data' => $this->get_all_active_bins(),
              'bin_count' => count($this->get_all_scratcher_bins()),
            );

        } else{
            $arrayName = array(
              'shift_in_out'=> 2,
              'cash_in_drawer' => 0,
              'coin_dispenser' => 0,
              'bin_data' => $this->get_all_active_bins(),//[],
              'bin_count' => count($this->get_all_scratcher_bins()),
            );
        }
        return $arrayName;
    }

    public function get_grand_total_cash_drop(){
        $this->db->select('SUM(cash_amount) as grand_cash_drop');  //chnages
        $this->db->from('cash_drop');
        $this->db->where('terminal', $this->session->userdata['shiftdata']['terminal_id']);
        $this->db->where('shift', $this->session->userdata['shiftdata']['shift_id']);
        $this->db->where('date', date('m-d-Y'));
        $query3=$this->db->get();

        $grand_cash_drop =  round($query3->row()->grand_cash_drop,2);
        return $grand_cash_drop;
    }

    public function get_start_cash_in(){
        $this->db->select('cash_in_drawer');
        $this->db->from('tbl_user_shift');
        $this->db->where('id', $this->session->userdata['shiftdata']['shift_id']);//$this->session->userdata['shiftdata']['shift_id']);
        $this->db->where('username', $this->session->userdata['shiftdata']['username']);
        $this->db->order_by('id','DESC');
        $query3 = $this->db->get();
        return $query3->row()->cash_in_drawer;

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

    public function fetch_product_name_by_id($product_id){
        // $this->db->select('product_id,product_name');
        $this->db->select('product_id,product_name,image_thumb,case_UPC');
        $this->db->from('product_information');
        $this->db->where('is_deleted', 0);
        $this->db->where('product_id', $product_id);

        $query=$this->db->get();
        $response=array();
        if ($query->num_rows() > 0) {
            $response=$query->result_array();
        }
        return $response;
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

    public function get_point_by_id(){
        try{
            $this->db->select('loyalty_management.*');
            $this->db->from('loyalty_management');
            $this->db->where('point_id',$this->input->post('point_id'));
            $query = $this->db->get();

            // $array = array();
            // if($this->db->affected_rows() > 0) {
            //     $array = $query->row();
            // }
            return $query->row();

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_point(){
        $point_id = $this->input->post('point_id');
        $data = array(
            'point_type'     => $this->input->post('point_type_ini'),
            'point_amount'   => (!empty($this->input->post('point_amount'))?$this->input->post('point_amount'):null),
            'point'          => (!empty($this->input->post('point'))?$this->input->post('point'):null),
            'status'         => 1,
            'created_date'     => date('Y-m-d H:i:s'),
        );

        $data = $this->security->xss_clean($data);
        $this->db->where('point_id', $point_id);
        if($this->db->update('loyalty_management',$data)){
            $pointdata = (($this->input->post('point_type_ini') == 3 ) ? 'redemption':'earning');
            $user_id        =  $this->session->userdata('username');
            $notification   = 'Update '.$pointdata.' point';
            $action_id      =  $this->session->userdata('username');
            $action         = 'update '.$pointdata.' point';
            $module         = 'store setting';

            $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_outbound_point(){
        $this->db->select('*');
        $this->db->from('loyalty_management');
        $this->db->where('point_type', 3);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function reconcillation_report_data($main_dates) {
        $reconcillation_report_arr = array();

        //////////// ST - Status
        $status_arr = array();
        $status_arr['label'] = "Status";

        foreach ($main_dates as $key_dt => $value_dt) {

            if($value_dt >= date("Y-m-d")) {
                $status_arr['data'][] = "Open";
            } else {
                $status_arr['data'][] = 'Closed';
            }
        }
        $status_arr['data'][] = '-';
        $reconcillation_report_arr['status'] = $status_arr;
        //////////// EN - Status

        //////////// ST - Updated
        /*$updated_arr = array();
        $updated_arr['label'] = "Updated";

        foreach ($main_dates as $key_dt => $value_dt) {
            if($value_dt < date("Y-m-d")) {
                $updated_arr['data'][] = "10:11 PM";
            } else {
                $updated_arr['data'][] = "-";
            }
        }
        $updated_arr['data'][] = "-";
        $reconcillation_report_arr['updated'] = $updated_arr;*/
        //////////// EN - Updated

        //////////// ST - Cash Proceeds
        $cash_proceeds = array();
        $cash_proceeds['label'] = "Cash Proceeds";
        $cash_proceeds_actual_count = array();

        $cash_proceeds_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_cash_proceeds = $this->get_cash_proceeds($value_dt);
            if($get_cash_proceeds[0]['cash_proceeds'] != "") {
                $cash_proceeds['data'][] = str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
                $cash_proceeds_tot = $cash_proceeds_tot + str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
                $cash_proceeds_actual_count[] = str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
            } else {
                $cash_proceeds['data'][] = '-';
                $cash_proceeds_actual_count[] = 0;
            }
        }
        $cash_proceeds['data'][] = number_format($cash_proceeds_tot,2);
        $cash_proceeds_actual_count[] = $cash_proceeds_tot;
        $cash_sales = $cash_proceeds;
        $reconcillation_report_arr['cash_proceeds'] = $cash_proceeds;
        //////////// EN - Cash Proceeds

        //////////// ST - Card Proceeds
        $card_proceeds = array();
        $card_proceeds['label'] = "Card Proceeds";

        $card_proceeds_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_card_proceeds = $this->get_card_proceeds($value_dt);
            if($get_card_proceeds[0]['card_proceeds'] != "") {
                $card_proceeds['data'][] = str_replace(",","",$get_card_proceeds[0]['card_proceeds']);
                $card_proceeds_tot = $card_proceeds_tot + str_replace(",","",$get_card_proceeds[0]['card_proceeds']);
            } else {
                $card_proceeds['data'][] = '-';
            }
        }
        $card_proceeds['data'][] = number_format($card_proceeds_tot,2);
        $reconcillation_report_arr['card_proceeds'] = $card_proceeds;
        //////////// EN - Card Proceeds

        //////////// ST - EBT Card Proceeds
        $ebt_card_proceeds = array();
        $ebt_card_proceeds['label'] = "EBT Card Proceeds";

        $ebt_card_proceeds_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_ebt_proceeds = $this->get_ebt_proceeds($value_dt);
            if($get_ebt_proceeds[0]['ebt_card_proceeds'] != "") {
                $ebt_card_proceeds['data'][] = str_replace(",","",$get_ebt_proceeds[0]['ebt_card_proceeds']);
                $ebt_card_proceeds_tot = $ebt_card_proceeds_tot + str_replace(",","",$get_ebt_proceeds[0]['ebt_card_proceeds']);
            } else {
                $ebt_card_proceeds['data'][] = '-';
            }
        }
        $ebt_card_proceeds['data'][] = number_format($ebt_card_proceeds_tot,2);
        $reconcillation_report_arr['ebt_card_proceeds'] = $ebt_card_proceeds;
        //////////// EN - EBT Card Proceeds

        //////////// ST - Net Sales
        $net_sales_actual_count = array();
        $net_sales = array();
        $net_sales['label'] = "Net Sales";

        $net_sales_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_net_sales = $this->get_net_sales($value_dt);
            if($get_net_sales[0]['net_sales'] != "") {
                $net_sales['data'][] = str_replace(",","",$get_net_sales[0]['net_sales']);
                $net_sales_actual_count[] = str_replace(",","",$get_net_sales[0]['net_sales']);
                $net_sales_tot = $net_sales_tot + str_replace(",","",$get_net_sales[0]['net_sales']);
            } else {
                $net_sales['data'][] = '-';
                $net_sales_actual_count[]= 0;
            }
        }
        $net_sales['data'][] = number_format($net_sales_tot,2);
        $net_sales_actual_count[]= $net_sales_tot;
        $reconcillation_report_arr['net_sales'] = $net_sales;
        //////////// EN - Net Sales

        //////////// ST - Sales Tax
        $sales_tax = array();
        $sales_tax_actual_count = array();
        $sales_tax['label'] = "Sales Tax";

        $sales_tax_tot = 0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_sales_tax = $this->get_sales_tax($value_dt);
            if($get_sales_tax[0]['sale_tax'] != "") {
                $sales_tax['data'][] = str_replace(",","",$get_sales_tax[0]['sale_tax']);
                $sales_tax_actual_count[] = str_replace(",","",$get_sales_tax[0]['sale_tax']);
                $sales_tax_tot = $sales_tax_tot + str_replace(",","",$get_sales_tax[0]['sale_tax']);
            } else {
                $sales_tax['data'][] = '-';
                $sales_tax_actual_count[] = 0;
            }
        }
        $sales_tax['data'][] = number_format($sales_tax_tot,2);
        $sales_tax_actual_count[] = $sales_tax_tot;
        $reconcillation_report_arr['sales_tax'] = $sales_tax;
        //////////// EN - Sales Tax

        //////////// ST - CRV
        $crv_sales = array();
        $crv_sales_actual_count = array();
        $crv_sales['label'] = "CRV";

        $crv_sales_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_crv_sales = $this->get_crv_sales($value_dt);
            if($get_crv_sales[0]['crv_sales'] != "") {
                $crv_sales['data'][] = str_replace(",","",$get_crv_sales[0]['crv_sales']);
                $crv_sales_actual_count[] = str_replace(",","",$get_crv_sales[0]['crv_sales']);
                $crv_sales_tot = $crv_sales_tot + str_replace(",","",$get_crv_sales[0]['crv_sales']);
            } else {
                $crv_sales['data'][] = '-';
                $crv_sales_actual_count[] = 0;
            }
        }
        $crv_sales['data'][] = number_format($crv_sales_tot,2);
        $crv_sales_actual_count[] = $crv_sales_tot;
        $reconcillation_report_arr['crv_sales'] = $crv_sales;
        //////////// EN - CRV

        //////////// ST - actual sales count
        $actual_sales = array();
        $actual_sales['label'] = "Actual Sales";

        $actual_sales_tot = 0.00;
        $i=0;
        foreach ($net_sales_actual_count as $key_dt) {

            $ast = $key_dt - ( $sales_tax_actual_count[$i] + $crv_sales_actual_count[$i]);
            $actual_sales['data'][] = number_format($ast,2);
            $actual_sales_tot = $actual_sales_tot + $key_dt;
            $i++;
        }
        //$actual_sales['data'][] = $actual_sales_tot;
        $reconcillation_report_arr['actual_sales'] = $actual_sales;
        //////////// EN - $crv_sales_actual_count



        //////////// ST - Opening Cash
        $opening_cash = array();
        $opening_cash['label'] = "Opening Cash";
        $opening_cash_tot = 0.00;
        $opening_cash_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_opening_cash = $this->get_opening_cash($value_dt);
            if($get_opening_cash[0]['cash_in_drawer'] != "") {
                $oc = str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
                $opening_cash['data'][] = number_format($oc,2);
                $opening_cash_tot = $opening_cash_tot + str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
                $opening_cash_actual_count[] = str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
            } else {
                $opening_cash['data'][] = '-';
                $opening_cash_actual_count[] = 0;
            }
        }
        $opening_cash['data'][] = number_format($opening_cash_tot,2);
        $opening_cash_actual_count[] = $opening_cash_tot;
        $reconcillation_report_arr['opening_cash'] = $opening_cash;
        //////////// EN - $crv_sales_actual_count


        //////////// ST - Cash Sales
        //$cash_sales = array();
        $cash_sales['label'] = "Cash Sales";
        $reconcillation_report_arr['cash_sales'] = $cash_sales;
        //////////// EN - Cash Sales


        //////////// ST - Total payout
        $payout = array();
        $payout['label'] = "Payout";
        $payout_tot = 0.00;
        $payout_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_payout = $this->get_payout($value_dt);
            if($get_payout[0]['normal_payout'] != "") {
                $total=str_replace(",","",$get_payout[0]['normal_payout']) + str_replace(",","",$get_payout[0]['scratcher_payout']);
                $payout['data'][] = number_format($total,2);
                $payout_tot = $payout_tot + $total;
                $payout_actual_count[] = $total;
            } else {
                $payout['data'][] = '-';
                $payout_actual_count[] = 0;
            }
        }
        $payout['data'][] = number_format($payout_tot,2);
        $payout_actual_count[] = $payout_tot;
        $reconcillation_report_arr['payout'] = $payout;
        //////////// EN - Total payout

        //////////// ST - refund Proceeds
        $refund_amount = array();
        $refund_amount['label'] = "- Refund";
        $refund_amount_actual_count = array();

        $refund_amount_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_refund_proceeds = $this->get_refund_proceeds($value_dt);
            if($get_refund_proceeds[0]['refund_amount'] != "") {
                $refund_amount['data'][] = str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
                $refund_amount_tot = $refund_amount_tot + str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
                $refund_amount_actual_count[] = str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
            } else {
                $refund_amount['data'][] = '-';
                $refund_amount_actual_count[] = 0;
            }
        }

        $refund_amount['data'][] = number_format($refund_amount_tot,2);
        $refund_amount_actual_count[] = $refund_amount_tot;
        //$cash_sales = $refund_amount;
        $reconcillation_report_arr['refund_amount'] = $refund_amount;
        //////////// EN - refund Proceeds

        //////////// ST - Cash drop
        $cash_drop = array();
        $cash_drop['label'] = "Cash Drop";
        $cash_drop_tot = 0.00;
        $cash_drop_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_cash_drop = $this->get_cash_drop($value_dt);
            if($get_cash_drop[0]['cash_drop_amount'] != "") {
                $cash_drop['data'][] = str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
                $cash_drop_tot = $cash_drop_tot + str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
                $cash_drop_actual_count[] = str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
            } else {
                $cash_drop['data'][] = '-';
                $cash_drop_actual_count[] = 0;
            }
        }
        $cash_drop['data'][] = number_format($cash_drop_tot,2);
        $cash_drop_actual_count[] = $cash_drop_tot;

        $reconcillation_report_arr['cash_drop'] = $cash_drop;
        //////////// EN - Cash drop

        //////////// ST - actual cash
        $actual_cash = array();
        $actual_cash['label'] = "Required Cash";
        $actual_value_cnt = 0;
        $actual_cash_diff = array();

        foreach ($opening_cash_actual_count as $actual_value) {

            $a = $actual_value + $cash_proceeds_actual_count[$actual_value_cnt];
            $b = $payout_actual_count[$actual_value_cnt] + $cash_drop_actual_count[$actual_value_cnt] + $refund_amount_actual_count[$actual_value_cnt];

            $actual_total = $a - $b;
            $actual_cash['data'][] = number_format($actual_total,2);
            $actual_cash_diff[] = $actual_total;
            $actual_value_cnt++;
        }
        $reconcillation_report_arr['actual_cash'] = $actual_cash;
        //////////// EN - actual cash

        //////////// ST - Closing Cash
        $closing_cash = array();
        $closing_cash['label'] = "Closed Cash";
        $closing_cash_tot = 0.00;
        $closing_cash_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_closing_cash = $this->get_closing_cash($value_dt);
            if($get_closing_cash[0]['closing_cash_amount'] != "") {
                $close_cash = str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
                $closing_cash['data'][] = number_format($close_cash,2);
                $closing_cash_tot = $closing_cash_tot + str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
                $closing_cash_actual_count[] = str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
            } else {
                $closing_cash['data'][] = '-';
                $closing_cash_actual_count[] = 0;
            }
        }
        $closing_cash['data'][] = number_format($closing_cash_tot,2);
        $closing_cash_actual_count[] = $closing_cash_tot;

        $reconcillation_report_arr['closing_cash'] = $closing_cash;
        //////////// EN - Closing Cash

        //////////// ST - Difference
        $Difference = array();
        $Difference['label'] = "Difference";

        $diff = 0;
        foreach ($actual_cash_diff as $value_diff) {

            $diff_value = $value_diff - $closing_cash_actual_count[$diff];
            $diff_value = number_format($diff_value,2);

            if($value_diff < $closing_cash_actual_count[$diff]) {
                $html = "<span style='color:green;'> + ".abs($diff_value)."</span>";
            } else if($value_diff > $closing_cash_actual_count[$diff]) {
                $html = "<span style='color:red;'> - ".$diff_value."</span>";
            } else {
                $html = "<span style='color:black;'>".$diff_value."</span>";
            }

            $Difference['data'][] = $html;
            $diff++;
        }

        $reconcillation_report_arr['Difference'] = $Difference;
        //////////// EN - Difference

        return $reconcillation_report_arr;
    }

    public function kpi_opening_closing_diff() {

        $main_dates[0] = date("Y-m-d");


        $reconcillation_report_arr = array();


        //////////// ST - Cash Proceeds
        $cash_proceeds = array();
        $cash_proceeds['label'] = "Cash Proceeds";
        $cash_proceeds_actual_count = array();

        $cash_proceeds_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_cash_proceeds = $this->get_cash_proceeds($value_dt);
            if($get_cash_proceeds[0]['cash_proceeds'] != "") {
                $cash_proceeds['data'][] = str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
                $cash_proceeds_tot = $cash_proceeds_tot + str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
                $cash_proceeds_actual_count[] = str_replace(",","",$get_cash_proceeds[0]['cash_proceeds']);
            } else {
                $cash_proceeds['data'][] = '-';
                $cash_proceeds_actual_count[] = 0;
            }
        }
        $cash_proceeds['data'][] = number_format($cash_proceeds_tot,2);
        $cash_proceeds_actual_count[] = $cash_proceeds_tot;
        $cash_sales = $cash_proceeds;
        $reconcillation_report_arr['cash_proceeds'] = $cash_proceeds;
        //////////// EN - Cash Proceeds

        //////////// ST - Opening Cash
        $opening_cash = array();
        $opening_cash['label'] = "Opening Cash";
        $opening_cash_tot = 0.00;
        $opening_cash_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_opening_cash = $this->get_opening_cash($value_dt);
            if($get_opening_cash[0]['cash_in_drawer'] != "") {
                $oc = str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
                $opening_cash['data'][] = number_format($oc,2);
                $opening_cash_tot = $opening_cash_tot + str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
                $opening_cash_actual_count[] = str_replace(",","",$get_opening_cash[0]['cash_in_drawer']);
            } else {
                $opening_cash['data'][] = '-';
                $opening_cash_actual_count[] = 0;
            }
        }
        $opening_cash['data'][] = number_format($opening_cash_tot,2);
        $opening_cash_actual_count[] = $opening_cash_tot;
        $reconcillation_report_arr['opening_cash'] = $opening_cash;
        //////////// EN - $crv_sales_actual_count


        //////////// ST - Cash Sales
        //$cash_sales = array();
        $cash_sales['label'] = "Cash Sales";
        $reconcillation_report_arr['cash_sales'] = $cash_sales;
        //////////// EN - Cash Sales


        //////////// ST - Total payout
        $payout = array();
        $payout['label'] = "Payout";
        $payout_tot = 0.00;
        $payout_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_payout = $this->get_payout($value_dt);
            if($get_payout[0]['normal_payout'] != "") {
                $total=str_replace(",","",$get_payout[0]['normal_payout']) + str_replace(",","",$get_payout[0]['scratcher_payout']);
                $payout['data'][] = number_format($total,2);
                $payout_tot = $payout_tot + $total;
                $payout_actual_count[] = $total;
            } else {
                $payout['data'][] = '-';
                $payout_actual_count[] = 0;
            }
        }
        $payout['data'][] = number_format($payout_tot,2);
        $payout_actual_count[] = $payout_tot;
        $reconcillation_report_arr['payout'] = $payout;
        //////////// EN - Total payout

        //////////// ST - refund Proceeds
        $refund_amount = array();
        $refund_amount['label'] = "Refund";
        $refund_amount_actual_count = array();

        $refund_amount_tot = 0.00;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_refund_proceeds = $this->get_refund_proceeds($value_dt);
            if($get_refund_proceeds[0]['refund_amount'] != "") {
                $refund_amount['data'][] = str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
                $refund_amount_tot = $refund_amount_tot + str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
                $refund_amount_actual_count[] = str_replace(",","",$get_refund_proceeds[0]['refund_amount']);
            } else {
                $refund_amount['data'][] = '-';
                $refund_amount_actual_count[] = 0;
            }
        }

        $refund_amount['data'][] = number_format($refund_amount_tot,2);
        $refund_amount_actual_count[] = $refund_amount_tot;
        //$cash_sales = $refund_amount;
        $reconcillation_report_arr['refund_amount'] = $refund_amount;
        //////////// EN - refund Proceeds

        //////////// ST - Cash drop
        $cash_drop = array();
        $cash_drop['label'] = "Cash Drop";
        $cash_drop_tot = 0.00;
        $cash_drop_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_cash_drop = $this->get_cash_drop($value_dt);
            if($get_cash_drop[0]['cash_drop_amount'] != "") {
                $cash_drop['data'][] = str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
                $cash_drop_tot = $cash_drop_tot + str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
                $cash_drop_actual_count[] = str_replace(",","",$get_cash_drop[0]['cash_drop_amount']);
            } else {
                $cash_drop['data'][] = '-';
                $cash_drop_actual_count[] = 0;
            }
        }
        $cash_drop['data'][] = number_format($cash_drop_tot,2);
        $cash_drop_actual_count[] = $cash_drop_tot;

        $reconcillation_report_arr['cash_drop'] = $cash_drop;
        //////////// EN - Cash drop

        //////////// ST - actual cash
        $actual_cash = array();
        $actual_cash['label'] = "Required Cash";
        $actual_value_cnt = 0;
        $actual_cash_diff = array();

        foreach ($opening_cash_actual_count as $actual_value) {

            $a = $actual_value + $cash_proceeds_actual_count[$actual_value_cnt];
            $b = $payout_actual_count[$actual_value_cnt] + $cash_drop_actual_count[$actual_value_cnt] + $refund_amount_actual_count[$actual_value_cnt];

            $actual_total = $a - $b;
            $actual_cash['data'][] = number_format($actual_total,2);
            $actual_cash_diff[] = $actual_total;
            $actual_value_cnt++;
        }
        $reconcillation_report_arr['actual_cash'] = $actual_cash;
        //////////// EN - actual cash

        //////////// ST - Closing Cash
        $closing_cash = array();
        $closing_cash['label'] = "Closed Cash";
        $closing_cash_tot = 0.00;
        $closing_cash_actual_count = array();
        $i=0;
        foreach ($main_dates as $key_dt => $value_dt) {
            $get_closing_cash = $this->get_closing_cash($value_dt);
            if($get_closing_cash[0]['closing_cash_amount'] != "") {
                $close_cash = str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
                $closing_cash['data'][] = number_format($close_cash,2);
                $closing_cash_tot = $closing_cash_tot + str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
                $closing_cash_actual_count[] = str_replace(",","",$get_closing_cash[0]['closing_cash_amount']);
            } else {
                $closing_cash['data'][] = '-';
                $closing_cash_actual_count[] = 0;
            }
        }
        $closing_cash['data'][] = number_format($closing_cash_tot,2);
        $closing_cash_actual_count[] = $closing_cash_tot;

        $reconcillation_report_arr['closing_cash'] = $closing_cash;
        //////////// EN - Closing Cash

        //////////// ST - Difference
        $Difference = array();
        $Difference['label'] = "Difference";

        $diff = 0;
        foreach ($actual_cash_diff as $value_diff) {

            $diff_value = $value_diff - $closing_cash_actual_count[$diff];
            $diff_value = number_format($diff_value,2);
            $html = $diff_value;

            $Difference['data'][] = $html;
            $diff++;
        }

        $reconcillation_report_arr['Difference'] = $Difference;
        //////////// EN - Difference

        /*print_r($reconcillation_report_arr);
        exit();*/
        return $reconcillation_report_arr;
    }

    public function get_net_sales($date) {

        $this->db->select('FORMAT(SUM(total_amount),2) as net_sales');
        $this->db->from('order');
        $this->db->where('DATE(order_date)', $date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_cash_proceeds($date) {

        $this->db->select('FORMAT(SUM(total_amount),2) as cash_proceeds');
        $this->db->from('order');
        $this->db->where('is_cash_card', 1);
        $this->db->where('DATE(order_date)', $date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_refund_proceeds($date) {

        $this->db->select('FORMAT(SUM(total_amount),2) as refund_amount');
        $this->db->from('refund_order');
        $this->db->where('is_cash_card', 1);
        $this->db->where('date', date('m-d-Y',strtotime($date)));
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    public function get_ebt_proceeds($date) {

        $this->db->select('FORMAT(SUM(total_amount),2) as ebt_card_proceeds');
        $this->db->from('order');
        $this->db->where('is_cash_card', 3); // EBT
        $this->db->where('DATE(order_date)', $date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_card_proceeds($date) {

        $this->db->select('FORMAT(SUM(total_amount),2) as card_proceeds');
        $this->db->from('order');
        $this->db->where('is_cash_card', 2);
        $this->db->where('DATE(order_date)', $date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_sales_tax($date) {

        $this->db->select('FORMAT(SUM(tax_amount),2) as sale_tax');
        $this->db->from('order');
        $this->db->where('DATE(order_date)', $date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_crv_sales($date) {

        $this->db->select('FORMAT(SUM(container_deposit),2) as crv_sales');
        $this->db->from('order');
        $this->db->where('DATE(order_date)', $date);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_opening_cash($date) {

        $this->db->select('cash_in_drawer');
        $this->db->from('tbl_user_shift');
        $this->db->where('date', date("Y-m-d",strtotime($date)));
        $this->db->order_by('id','asc');
        $this->db->limit('1');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_closing_cash($date) {

        $this->db->select('cash_out_drawer as closing_cash_amount');
        $this->db->from('tbl_user_shift');
        $this->db->where('date', date("Y-m-d",strtotime($date)));
        $this->db->order_by('id','desc');
        $this->db->limit('1');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_payout($date) {

        $this->db->select('FORMAT(SUM(payout_money),2) as normal_payout,(select FORMAT(SUM(payout_amount),2) from tbl_scratchers_payout where DATE(tbl_scratchers_payout.payout_date)=DATE(tbl_payout.created_at)) as scratcher_payout');
        $this->db->from('tbl_payout');
        $this->db->where('DATE(created_at)', $date);
        $query = $this->db->get();
        // echo $this->db->last_query();
        // exit;
        return $query->result_array();
    }

    public function get_cash_drop($date) {

        $this->db->select('FORMAT(SUM(cash_amount),2) as cash_drop_amount');
        $this->db->from('cash_drop');
        $this->db->where('DATE(datetime)', $date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_about_store(){
        $data = array('about_store'=> $this->input->post('about_store'));
        if($this->db->update('web_setting',$data)){
            return TRUE;
        }else{
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

    public function update_clover_data($oauth,$mid){
        $data = array(
            'CLOVER_ACCESS_TOKEN'=> $oauth,
            'CLOVER_MERCHANT_ID'=> $mid
        );

        if($this->db->update('card_transaction_setting',$data)){
            return TRUE;
        }else{
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

    public function update_card_transaction(){
        try{
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
              'CLOVER_APP_SECRET'                   => $this->input->post('CLOVER_APP_SECRET'),
              'CLOVER_APP_ID'                       => $this->input->post('CLOVER_APP_ID'),
              'active_transaction_type'             => $this->input->post('active_transaction_type'),
             );
            if($this->db->update('card_transaction_setting',$data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Card processing settings updated';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update card processing settings';
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
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Mail settings updated';
                $action_id      =  $this->session->userdata('username');
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



    public function get_user_notification_count(){
        try{
            if($this->session->userdata('shiftdata')['role_id'] == 4 ){
                $this->db->select('users.first_name,users.last_name,users.gender,user_notification.*');
                $this->db->from('user_notification');
                // $this->db->join('user_login', 'user_login.user_id = user_notification.user_id','LEFT');
                $this->db->join('users', 'users.user_id = user_notification.user_id','LEFT');
                $this->db->where('user_notification.action', 'pending');
                $this->db->where('user_notification.is_read', 0);
                $this->db->where('user_notification.is_deleted', 0);
                $this->db->order_by('user_notification.created_at', 'DESC');
                $query = $this->db->get();
                return $query->num_rows();

            }else{
                $userID = (!empty($this->input->post('user_id')) ? $this->input->post('user_id'):$this->session->userdata('shiftdata')['username']);
                $this->db->select('user_id');
                $this->db->from('user_login');
                $this->db->where('username', $userID);//$this->input->post('user_id'));
                $query = $this->db->get();
                $id = $query->row()->user_id;

                $this->db->select('users.first_name,users.last_name,users.gender,user_notification.*');
                $this->db->from('user_notification');
                //$this->db->join('user_login', 'user_login.username = user_notification.user_id','LEFT');
                $this->db->join('users', 'users.user_id = user_notification.user_id','LEFT');
                //$this->db->where('user_notification.user_id', $id);
                if($userID!=''){
                $this->db->where(' FIND_IN_SET('.$userID.',user_notification.action_id) > 0');
                }
                //$this->db->where(' FIND_IN_SET('.$id.',user_notification.action_id)');
                $this->db->where('user_notification.is_read', 0);
                $this->db->where('user_notification.is_deleted', 0);
                //$this->db->where_not_in('user_notification.action', 'pending');
                //$this->db->where_not_in('user_notification.notification', 'Requested for leave');
                // $this->db->where_not_in('user_notification.notification', 'Request for cash advance');
                $this->db->order_by('user_notification.created_at', 'DESC');
                $query = $this->db->get();
                return $query->num_rows();
            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function read_user_notification($last = 0){
        $this->db->update('user_notification',array('is_read' => 1));
    }

    public function get_user_notification($last = 0){

        try{
            if($this->session->userdata('shiftdata')['role_id'] == 4 ){
                $this->db->select('users.first_name,users.last_name,users.gender,user_notification.*');
                $this->db->from('user_notification');
                // $this->db->join('user_login', 'user_login.user_id = user_notification.user_id','LEFT');
                $this->db->join('users', 'users.user_id = user_notification.user_id','LEFT');
                //$this->db->where('user_notification.action', 'pending');
                // $this->db->where('user_notification.is_read', 0);
                $this->db->where('user_notification.is_deleted', 0);
                $this->db->order_by('user_notification.created_at', 'DESC');
                if($last==1){
                    return $this->db->get()->row()->notification;
                }else{
                    $query = $this->db->get();
                    return $query->result_array();
                }
                // echo $this->db->last_query();
                // exit;
            }else{
                $userID = (!empty($this->input->post('user_id')) ? $this->input->post('user_id'):$this->session->userdata('shiftdata')['username']);
                $this->db->select('user_id');
                $this->db->from('user_login');
                $this->db->where('username', $userID);//$this->input->post('user_id'));
                $query = $this->db->get();
                $id = $query->row()->user_id;

                $this->db->select('users.first_name,users.last_name,users.gender,user_notification.*');
                $this->db->from('user_notification');
                //$this->db->join('user_login', 'user_login.username = user_notification.user_id','LEFT');
                $this->db->join('users', 'users.user_id = user_notification.user_id','LEFT');
                //$this->db->where('user_notification.user_id', $id);
                if($userID!=''){
                $this->db->where(' FIND_IN_SET('.$userID.',user_notification.action_id) > 0');
                }
                //$this->db->where('user_notification.is_read', 0);
                $this->db->where('user_notification.is_deleted', 0);
                // $this->db->where_not_in('user_notification.action', 'pending');
                // $this->db->where_not_in('user_notification.notification', 'Requested for leave');
                // $this->db->where_not_in('user_notification.notification', 'Request for cash advance');
                $this->db->order_by('user_notification.created_at', 'DESC');

                if($last==1){
                    return $this->db->get()->row()->notification;
                }else{
                    $query = $this->db->get();
                    // echo $this->db->last_query();
                    // exit;
                    return $query->result_array();
                }

            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }

    }

    public function get_user_notification_node($last = 0){
        try{

            $userID = (!empty($this->input->post('user_id')) ? $this->input->post('user_id'):$this->session->userdata('shiftdata')['username']);
            $this->db->select('user_id');
            $this->db->from('user_login');
            $this->db->where('username', $userID);//$this->input->post('user_id'));
            $query = $this->db->get();
            $id = $query->row()->user_id;

            $this->db->select('users.first_name,users.last_name,users.gender,user_notification.*');
            $this->db->from('user_notification');
            //$this->db->join('user_login', 'user_login.username = user_notification.user_id','LEFT');
            $this->db->join('users', 'users.user_id = user_notification.user_id','LEFT');
            //$this->db->where(' FIND_IN_SET('.$id.',user_notification.action_id)');
            $this->db->where('user_notification.is_read', 0);
            //$this->db->where('user_notification.user_id', $id);
            $this->db->where('user_notification.is_deleted', 0);
            if ($last==2){
            // $this->db->where_not_in('user_notification.action', 'pending');
            // $this->db->where_not_in('user_notification.notification', 'Requested for leave');
            // $this->db->where_not_in('user_notification.notification', 'Request for cash advance');
            }
            $this->db->order_by('user_notification.created_at', 'DESC');

            if($last==1){
                $this->db->limit(1);
                $result = $this->db->get()->row();
                //echo $this->db->last_query();
                $action_arr =explode(',', $result->action_id);
                if(in_array($userID, $action_arr)){
                    return $result;
                }else{
                    return false;
                }

            }else if ($last==2){
                $query = $this->db->get();
                return $query->num_rows();
            }else{
                $query = $this->db->get();
                return $query->result_array();
            }

        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_customer_point_data($customer_mobile_no){
        $data = $this->getcustomerByPhoneModal($customer_mobile_no);
        $loyalty = $this->get_outbound_point();

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

        $response =array();
        if(!empty($data)){
            $response['status']          = 'success';
            $response['data']            = $data;
            $response['account_balance'] = number_format($account_balance,2);
        }else{
            $response['status']          = 'fail';
            $response['data']            = array();
            $response['account_balance'] = 0;
        }
        return $response;
    }


    //common function
    public function insert_user_notification($user_id,$notification,$action_id,$action,$module,$fromhtml=0){
        try{
            if($fromhtml== 0){
                $action_id = $this->get_manager_ids();
            }else{
                $action_id = $action_id;
            }
            $arrayName = array(
                'user_id'       =>  $this->get_user_id_by_username($user_id),
                'notification'  =>  $notification,
                // 'action_id'   =>    $action_id,//$this->get_manager_ids(),//$this->get_user_id_by_username($action_id),
                'action_id'     =>  $this->get_manager_ids(),
                'action'        =>  $action,
                'module'        =>  $module,
                'created_at'    =>  date('Y-m-d H:i:s'),
            );
            $this->db->insert('user_notification',$arrayName);

        }catch(Exception $ex) {
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

    public function update_date_setting(){
        try{
            $data = array(
              'timezone'       => $this->input->post('timezone'),
              'date_format'    => $this->input->post('date_format'),
              'time_format'    => $this->input->post('time_format'),

             );
            if($this->db->update('web_setting',$data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Date & Time settings updated';
                $action_id      =  $this->session->userdata('username');
                $action         = 'update datetime settings';
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

    public function update_payoutNote(){
      //echo '<pre>'; print_r($_POST);exit;
        $table_name = $this->input->post('table_name');
        $data = array(
          'payout_note'=> $this->input->post('payout_note')
        );
        $data = $this->security->xss_clean($data);
        $this->db->where('id', $this->input->post('id'));
        if($this->db->update($table_name,$data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function activate_scratcher(){
        try{
          $this->db->set('scratcher_status', 0);
          $this->db->set('is_archive_scratcher', 0);
          $this->db->where('product_id', $this->input->post('scratcherID'));
          if($this->db->update('product_information')){
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

    public function change_point_status(){
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

    public function get_all_archive_scratcher(){
        try{
            $this->db->select('product_id,product_name,case_UPC,supplier,onsale_price,quantity,scratcher_status,bin');
            $this->db->from('product_information');
            $this->db->where('is_scratchable', 1);
            $this->db->where('is_archive_scratcher', 1);
            $this->db->where('is_deleted', 0);
            $this->db->where('scratcher_status !=', 0);
            $query = $this->db->get();
            return $query->result_array();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function active_scratcher(){
        try{
            $this->db->set('is_archive_scratcher', 0);
            $this->db->set('scratcher_status', 0);
            $this->db->set('bin', $this->input->post('bin'));
            $this->db->where('case_UPC', $this->input->post('case_UPC'));
            if($this->db->update('product_information')){
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

    public function active_scratcher_archive($id){
        try{
            $this->db->set('scratcher_status', 0);
            $this->db->where('product_id', $id);
            if($this->db->update('product_information')){
                $user_id        =  $this->session->userdata('username');
                $notification   =  'Ative scratcher';
                $action_id      =  $this->session->userdata('username');
                $action         = 'active scratcher';
                $module         = 'inventory';

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

    public function current_cash_drower_amt(){
       //date_default_timezone_set("America/Los_Angeles");
       $user = $this->session->userdata['shiftdata']['username'];

       $this->db->select('id');
       $this->db->from('tbl_user_shift');
       $this->db->where('terminal_id', $this->current_terminal);
       $this->db->order_by('id','DESC');
       $this->db->limit(1);
       $query1=$this->db->get();
       $shift_ID = $query1->row()->id;


       $this->db->select('*');  //chnages
       $this->db->from('tbl_user_shift');
       $this->db->where('date', date('Y-m-d'));
       //added 13-06);
       $this->db->where('id', (!empty($this->session->userdata['shiftdata']['shift_id']) ? $this->session->userdata['shiftdata']['shift_id'] : $shift_ID));
       $this->db->where('terminal_id', $this->current_terminal);
       $this->db->where('shift_in_out', (!empty($user) ? 1 : 2));//$shift);
       // $this->db->or_where('shift_in_out', 1);//added 13-06);

       $this->db->order_by('id', 'DESC');
       $this->db->limit(1);
       $query=$this->db->get();

       $cash_in_drawer = round($query->row()->cash_in_drawer,2);


       //payout changes
       $this->db->select('SUM(payout_money) as grand_total_payout');  //chnages
       $this->db->from('tbl_payout');
       $this->db->where('terminal', $this->current_terminal);
       $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
       $this->db->where('date', date('Y-m-d'));
       $this->db->where_not_in('payment_type','Check');
       $query8 = $this->db->get();

       $payout_amt1 = round($query8->row()->grand_total_payout,2);



       $this->db->select('SUM(payout_amount - payout_by_user) as grand_total_scratcher_payout');  //chnages
       $this->db->from('tbl_scratchers_payout');
       $this->db->where('terminal', $this->current_terminal);
       $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
       $this->db->where('date', date('Y-m-d'));
       $this->db->where_not_in('payment_type','Check');
       $query9 = $this->db->get();

       $payout_amt2 = round($query9->row()->grand_total_scratcher_payout,2);
       //end payout changes

       $this->db->select('SUM(total_amount) as grand_total_amt');  //chnages
       $this->db->from('order');
       $this->db->where('terminal', $this->current_terminal);
       $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
       $this->db->where('is_cash_card', 1);

       $this->db->where('date', date('m-d-Y'));
       $query2 = $this->db->get();

       $grand_total_amt = round($query2->row()->grand_total_amt,2);

       $this->db->select('sum(cash_amount) as grand_cash_drop');  //chnages
       $this->db->from('cash_drop');
       $this->db->where('terminal', $this->current_terminal);
       $this->db->where('shift',$this->session->userdata['shiftdata']['shift_id']);
       $this->db->where('date', date('m-d-Y'));
       $query3=$this->db->get();
       // $this->db->last_query();
       $grand_cash_drop =  round($query3->row()->grand_cash_drop,2);

       $cash = $this->get_fontsize();

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

    public function cash_drower_by_cashier($shift_id){
      //date_default_timezone_set("America/Los_Angeles");

      $this->db->select('*');  //chnages
      $this->db->from('tbl_user_shift');
      $this->db->where('date', date('Y-m-d'));
      //added 13-06);
      $this->db->where('id', $shift_id);

      $query=$this->db->get();

      $cash_in_drawer = round($query->row()->cash_in_drawer,2);


      //payout changes
      $this->db->select('SUM(payout_money) as grand_total_payout');  //chnages
      $this->db->from('tbl_payout');
      //$this->db->where('terminal', $this->current_terminal);
      $this->db->where('shift',$shift_id);
      $this->db->where('date', date('Y-m-d'));
      $this->db->where_not_in('payment_type','Check');
      $query8 = $this->db->get();

      $payout_amt1 = round($query8->row()->grand_total_payout,2);



      $this->db->select('SUM(payout_amount - payout_by_user) as grand_total_scratcher_payout');  //chnages
      $this->db->from('tbl_scratchers_payout');
      // $this->db->where('terminal', $this->current_terminal);
      $this->db->where('shift',$shift_id);
      $this->db->where('date', date('Y-m-d'));
      $this->db->where_not_in('payment_type','Check');
      $query9 = $this->db->get();

      $payout_amt2 = round($query9->row()->grand_total_scratcher_payout,2);
      //end payout changes

      $this->db->select('SUM(total_amount) as grand_total_amt');  //chnages
      $this->db->from('order');

      $this->db->where('shift',$shift_id);
      $this->db->where('is_cash_card', 1);
      $this->db->where('date', date('m-d-Y'));
      $query2 = $this->db->get();

      $grand_total_amt = round($query2->row()->grand_total_amt,2);



      $this->db->select('sum(cash_amount) as grand_cash_drop');  //chnages
      $this->db->from('cash_drop');

      $this->db->where('shift',$shift_id);
      $this->db->where('date', date('m-d-Y'));
      $query3=$this->db->get();
      // $this->db->last_query();
      $grand_cash_drop =  round($query3->row()->grand_cash_drop,2);

      $cash = $this->get_fontsize();

       $drower_cash = $cash_in_drawer + $grand_total_amt - $grand_cash_drop - $payout_amt1 - $payout_amt2;
       $cash_drop= $cash_in_drawer + $grand_total_amt - $grand_cash_drop - $cash->start_cash - $payout_amt1 - $payout_amt2;
       // if($user != ''){
       //   $cash_drower = $drower_cash;
       // }else{
       //   $cash_drower = $cash_in_drawer;
       // }

       $drawerdata = array(
           'cash_in_drawer' => $drower_cash,
           'withdrawable_amt' => $cash_drop,
       );

       return $drawerdata;
    }

    public function update_cashdropNote(){
        $data = array(
          'cash_drop_note'=> $this->input->post('cash_drop_note')
        );
        $data = $this->security->xss_clean($data);
        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('cash_drop',$data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function insert_chat_history(){
       // echo '<pre>'; print_r($_POST);exit;
        $data = array(
            'additional_info' => $this->input->post('additional_info'),
            'cash_id'         => $this->input->post('chat_id'),
            'chat_person'     => $this->input->post('chat_person'),
            'created_at'      => date('Y-m-d H:i:s'),
            'chat_type'       => $this->input->post('chat_type'),
            'sender_id'       => $this->input->post('sender_id'),
        );
        // $data = $this->security->xss_clean($data);
        if($this->db->insert('tbl_chat_history', $data)){
            $this->db->set('notes', $this->input->post('additional_info'));
            $this->db->where('id', $this->input->post('chat_id'));
            $this->db->update($this->input->post('table_name'));
            return $data;
        }else{
            return FALSE;
        }
    }

    public function get_user_chat_history($chat_id,$chat_type){
        try{
            $this->db->select('tbl_chat_history.*,users.first_name,users.last_name,users.gender');
            $this->db->from('tbl_chat_history');
            $this->db->join('user_login', 'user_login.username = tbl_chat_history.sender_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->where('cash_id', $chat_id);
            $this->db->where('chat_type', $chat_type);
            $this->db->order_by('created_at','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function get_cashadv_on_load(){
        try{
            $this->db->select('users.first_name,users.last_name,tbl_advance.*');
            $this->db->from('tbl_advance');
            $this->db->join('user_login', 'user_login.username = tbl_advance.employee_id','LEFT');
            $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->where('tbl_advance.employee_id', $this->input->post('username'));  //added prashant
            $this->db->order_by('tbl_advance.created_at', 'DESC');
            $this->db->limit('4');
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

    public function get_perm_ajax_condition($username) {
        try {
            $user_id = $username;//(!empty($username) ? $username: $this->session->userdata('username'));
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

    function fetch_user_notification($limit, $start){
        if($this->session->userdata('shiftdata')['role_id'] == 4 ){

            $this->db->select('users.first_name,users.last_name,users.gender,user_notification.*');
            $this->db->from('user_notification');
            // $this->db->join('user_login', 'user_login.user_id = user_notification.user_id','LEFT');
            $this->db->join('users', 'users.user_id = user_notification.user_id','LEFT');
            // $this->db->where('user_notification.action', 'pending');
            // $this->db->where('user_notification.is_read', 0);
            $this->db->where('user_notification.is_deleted', 0);
            $this->db->order_by('user_notification.created_at', 'DESC');
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $userID = (!empty($this->input->post('user_id')) ? $this->input->post('user_id'):$this->session->userdata('shiftdata')['username']);
            $this->db->select('user_id');
            $this->db->from('user_login');
            $this->db->where('username', $userID);//$this->input->post('user_id'));
            $query = $this->db->get();
            $id = $query->row()->user_id;

            $this->db->select('users.first_name,users.last_name,users.gender,user_notification.*');
            $this->db->from('user_notification');
            //$this->db->join('user_login', 'user_login.username = user_notification.user_id','LEFT');
            $this->db->join('users', 'users.user_id = user_notification.user_id','LEFT');
            //$this->db->where('user_notification.user_id', $id);
            if($userID!=''){
            $this->db->where(' FIND_IN_SET('.$userID.',user_notification.action_id) > 0');
            }
            //$this->db->where(' FIND_IN_SET('.$id.',user_notification.action_id)');
            $this->db->where('user_notification.is_read', 0);
            $this->db->where('user_notification.is_deleted', 0);
            //$this->db->where_not_in('user_notification.action', 'pending');
            //$this->db->where_not_in('user_notification.notification', 'Requested for leave');
            // $this->db->where_not_in('user_notification.notification', 'Request for cash advance');
            $this->db->order_by('user_notification.created_at', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
   }
    public function dailySalesBreakDownReportData($start_date="",$end_date="") {

        $curr_date = date("Y-m-d");

        try{
            $this->db->select('sum(due_amount) as gross_sales, count(id) as gross_sales_cnt, (sum(due_amount) - sum(tax_amount) - sum(container_deposit)) as net_sales,(select count(id) from `order` where tax_amount != "0.00" and DATE(order_date) = "'.$curr_date.'") as tax_count,sum(tax_amount) as total_tax,

                (select count(id) from `order` where coupon_discount != "0.00" and DATE(order_date) = "'.$curr_date.'") as discount_count,

                sum(coupon_discount) as total_discount,

                (select count(id) from `order` where container_deposit != "0.00" and DATE(order_date) = "'.$curr_date.'") as container_deposit_count,

                sum(container_deposit) as total_container_deposit,

                (select count(id) from `order` where is_cash_card = "1" and DATE(order_date) = "'.$curr_date.'") as tot_cash_count,

                (select sum(due_amount) from `order` where is_cash_card = "1" and DATE(order_date) = "'.$curr_date.'") as tot_cash_amount,

                (select count(id) from `order` where is_cash_card = "2" and DATE(order_date) = "'.$curr_date.'") as tot_card_count,

                (select sum(due_amount) from `order` where is_cash_card = "2" and DATE(order_date) = "'.$curr_date.'") as tot_card_amount,

                (select count(id) from `order` where is_cash_card = "3" and DATE(order_date) = "'.$curr_date.'") as tot_ebt_count,

                (select sum(due_amount) from `order` where is_cash_card = "3" and DATE(order_date) = "'.$curr_date.'") as tot_ebt_amount,

                ');
            $this->db->from('order');

            if($start_date != "" && $end_date != "") {
                $this->db->where("DATE(order_date) BETWEEN '".$start_date."' AND '".$end_date."'");
            } else {
                $this->db->where('DATE(order_date)', $curr_date);
            }

            $query=$this->db->get();
            // print $this->db->last_query();
            // exit();
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

    public function change_scratcher_status(){
        try{
          $this->db->set('scratcher_status', $this->input->post('scratcher_status'));
          if($this->input->post('scratcher_status') == 0){
            $this->db->set('is_archive_scratcher', 0);
          }else{
            $this->db->set('is_archive_scratcher', 1);
          }
          $this->db->where('case_UPC', $this->input->post('case_UPC'));
          if($this->db->update('product_information')){
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

    public function check_bin_availability($bin){
        try{
            $this->db->select('COUNT(bin) as bin');
            $this->db->from('product_information');
            $this->db->where('is_deleted',0);
            $this->db->where('is_scratchable',1);
            $this->db->where('scratcher_status',0);
            $this->db->where('bin',$bin);
            $query = $this->db->get();
            return $query->row()->bin;
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

      public function update_node_setting(){
          try{
            $this->db->set('node_status', $this->input->post('node_status'));
            if($this->db->update('web_setting')){
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

      public function get_miscellaneous_products(){
          try{
                    $this->db->select('*');
                    $this->db->from('miscellaneous_product');
                    $this->db->where('is_delete',0);
              $this->db->order_by('created_date','DESC');
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

      public function get_miscellaneous_product_by_id(){
          try{
              $this->db->select('id,product_name,is_taxable,product_price');
              $this->db->from('miscellaneous_product');
              $this->db->where('id',$this->input->post('id'));
                  $query = $this->db->get();
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

      public function update_miscellaneous(){
          try{
            $data = array(
              'product_name'   => $this->input->post('product_name'),
              'product_price'  => $this->input->post('product_price'),
              'is_taxable'     => $this->input->post('is_taxable'),
            );
            $this->db->where('id', $this->input->post('id'));
            if($this->db->update('miscellaneous_product', $data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Update miscellaneous product';
                $action_id      =  $this->session->userdata('username');
                $action         = 'Update miscellaneous product';
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

      public function delete_miscellaneous_product(){
          try{
              $this->db->set('is_delete', 1);
              $this->db->where('id',$this->input->post('id'));
              if($this->db->update('miscellaneous_product')){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Delete miscellaneous product';
                $action_id      =  $this->session->userdata('username');
                $action         = 'delete miscellaneous product';
                $module         = 'store setting';

                $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
                return TRUE;
              }

          }catch(Exception $ex){
              error_log($ex->getTraceAsString());
              echo $ex->getTraceAsString();
              return FALSE;
          }
      }
      public function add_miscellaneous(){
          try{
            $data = array(
              'product_name'   => $this->input->post('product_name'),
              'product_price'  => $this->input->post('product_price'),
              'is_taxable'     => $this->input->post('is_taxable'),
            );
            if($this->db->insert('miscellaneous_product', $data)){
                $user_id        =  $this->session->userdata('username');
                $notification   = 'Add miscellaneous product';
                $action_id      =  $this->session->userdata('username');
                $action         = 'Add miscellaneous product';
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

    public function delete_custom_category_product(){
        try{
          $this->db->set('is_deleted',1);
          $this->db->where('id', $this->input->post('id'));
          $this->db->where('cat_id', $this->input->post('cat_id'));

          if($this->db->update('custom_category_setting_details')){
              $user_id        =  $this->session->userdata('username');
              $notification   =  'Delete Custom Category Product';
              $action_id      =  $this->session->userdata('username');
              $action         =  'delete custom category product';
              $module         =  'store setting';

              $this->insert_user_notification($user_id,$notification,$action_id,$action,$module);
              return TRUE;
          }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function insert_custom_cat_product(){
        try{
         if($this->input->post('percent') == 0){
           $percent = '';
         }else{
            $percent = $this->input->post('percent');
         }
          $data = array(
              'cat_id'      => $this->input->post('cat_id'),
              'name'        => $this->input->post('product_name_txt'),
              'value'       => $this->input->post('product_price'),
              'is_crv'      => $this->input->post('is_crv'),
              'is_taxable'  => $this->input->post('is_tax'),
              'is_ebt'      => $this->input->post('is_ebt'),
              'percent'     => $percent,
              'is_deleted'  => 0,
          );

          if($this->db->insert('custom_category_setting_details', $data)){
              $user_id        =  $this->session->userdata('username');
              $notification   =  'add custom category product '.$data['name'];
              $action_id      =  $this->session->userdata('username');
              $action         = 'add custom category product';
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

    public function get_custom_cat_product_data(){
        try{
            $this->db->select('custom_category_setting_details.id,custom_category_setting_details.percent,custom_category_setting_details.is_ebt,custom_category_setting_details.cat_id,custom_category_setting_details.value,custom_category_setting_details.is_crv,custom_category_setting_details.is_taxable,custom_category_setting_details.name as proname,custom_category_setting.name');
            $this->db->from('custom_category_setting_details');
            $this->db->join('custom_category_setting','custom_category_setting.id=custom_category_setting_details.cat_id','LEFT');
            $this->db->where('custom_category_setting_details.id', $this->input->post('id'));
            $this->db->where('custom_category_setting_details.cat_id', $this->input->post('cat_id'));
            $query = $this->db->get();
            return $query->row();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_custom_cat_product(){
        try{
           if($this->input->post('percent') == 0){
              $percent = '';
           }else{
              $percent = $this->input->post('percent');
           }

          $data = array(
              'name'        => $this->input->post('product_name_txt'),
              'value'       => $this->input->post('product_price'),
              'is_crv'      => $this->input->post('is_crv'),
              'is_taxable'  => $this->input->post('is_tax'),
              'is_ebt'  => $this->input->post('is_ebt'),
              'percent'     => $percent,
          );

          $this->db->where('id', $this->input->post('id'));
          if($this->db->update('custom_category_setting_details', $data)){
              $user_id        =  $this->session->userdata('username');
              $notification   =  'update custom category product '.$data['name'];
              $action_id      =  $this->session->userdata('username');
              $action         = 'update custom category product';
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

    public function get_inventory_audit($upc){
        try{
            $this->db->select('users.first_name,users.last_name,product_information.updated_at');  //chnages
            $this->db->from('user_login');
            $this->db->join('users','user_login.user_id = users.user_id', 'LEFT');
            $this->db->join('product_information','user_login.username = product_information.updated_empid', 'LEFT');
            $this->db->where('product_information.case_UPC', $upc);
            $this->db->where_not_in('product_information.updated_empid', 0);
            $query = $this->db->get();
            return $query->row();
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function set_shift_schedule($shift_id,$data) {
        try{
            if($shift_id > 0) { // Update

                $this->db->where('id', $shift_id);
                if($this->db->update('shift_scheduler', $data)) {
                    return $shift_id;
                }

            } else { // Insert

                if($this->db->insert('shift_scheduler', $data)) {
                    return $this->db->insert_id();
                }
            }

        } catch(Exception $ex) {
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

    public function update_onsale_price($id,$case_UPC,$onsale_price){
        try{
            $data = array(
              'onsale_price' =>  $onsale_price,
              'updated_empid' => $this->session->userdata('username'),
              'updated_at' => date('Y-m-d H:i:s'),
            );
            if(empty($id)){
                $this->db->where('case_UPC', $case_UPC);
            }else{
                $this->db->where('product_id', $id);
            }
            if($this->db->update('product_information',$data)){
              return $onsale_price;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_card_fees(){
        try{
          $this->db->set('credit_card_fees', $this->input->post('credit_card_fees'));
          $this->db->set('credit_card_fees_type', $this->input->post('credit_card_fees_type'));
          if($this->db->update('web_setting')){
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

    public function update_supplier_price($id,$case_UPC,$supplier_price){
        try{
            $data = array(
              'supplier_price' =>  $supplier_price,
              'updated_empid' => $this->session->userdata('username'),
              'updated_at' => date('Y-m-d H:i:s'),
            );
            if(empty($id)){
                $this->db->where('case_UPC', $case_UPC);
            }else{
                $this->db->where('product_id', $id);
            }
            if($this->db->update('product_information',$data)){
              return $supplier_price;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_store_promotion_price($id,$case_UPC,$store_promotion_price){
        try{
            $data = array(
              'store_promotion_price' =>  $store_promotion_price,
              'updated_empid' => $this->session->userdata('username'),
              'updated_at' => date('Y-m-d H:i:s'),
            );
            if(empty($id)){
                $this->db->where('case_UPC', $case_UPC);
            }else{
                $this->db->where('product_id', $id);
            }
            if($this->db->update('product_information',$data)){
              return $store_promotion_price;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_qty($id,$case_UPC,$quantity){
        try{
            $data = array(
              'quantity' =>  $quantity,
              'updated_empid' => $this->session->userdata('username'),
              'updated_at' => date('Y-m-d H:i:s'),
            );
            if(empty($id)){
                $this->db->where('case_UPC', $case_UPC);
            }else{
                $this->db->where('product_id', $id);
            }
            if($this->db->update('product_information',$data)){
              return $quantity;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_onchange_supplier($id,$case_upc,$supplier_id,$supplier_name){
        try{
             $data = array(
                 'supplier'      => $supplier_name,  //delete it
                 'supplier_id'   => $supplier_id,
                 'updated_empid' => $this->session->userdata('username'),
                 'updated_at'    => date('Y-m-d H:i:s'),
             );
             if(empty($id)){
                 $this->db->where('case_UPC', $case_upc);
             }else{
                 $this->db->where('product_id', $id);
             }
             if($this->db->update('product_information',$data)){
               return $supplier_name;
             }else{
                 return FALSE;
             }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function geti9FormData(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_i9form');
            $this->db->where('username', $this->input->post('username'));
            $query=$this->db->get();
            $story_array = array();
            if($this->db->affected_rows() > 0){
                $story_array = $query->row();
                return $story_array;
            }else{
                return false;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
}
