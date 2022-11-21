<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //Count Product
    public function count_product()
    {
        return $this->db->count_all("product_information");
    }

    //Product List
    public function product_list($per_page = null, $page = null)
    {
        $query = $this->db->select('
					supplier_information.*,
					product_information.*,
					product_category.category_name,
					unit.unit_short_name
				')
            ->from('product_information')
            ->join('supplier_information', 'product_information.supplier_id = supplier_information.supplier_id', 'left')
            ->join('product_category', 'product_category.category_id = product_information.category_id', 'left')
            ->join('unit', 'unit.unit_id = product_information.unit', 'left')
            ->limit($per_page, $page)
            ->order_by('product_information.product_name', 'asc')
            ->group_by('product_information.product_id')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //get store wise product when product transfer to another store
    public function get_product_list_by_store($store_id)
    {
        $query = $this->db->select('a.*')
            ->from('product_information a')
            ->join('transfer b', 'a.product_id = b.product_id')
            ->where('store_id=', $store_id)
            ->group_by('a.product_name')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //All Product List
    public function all_product_list()
    {
        $query = $this->db->select('
					supplier_information.*,
					product_information.*,
					product_category.category_name,
					unit.unit_short_name
				')
            ->from('product_information')
            ->join('supplier_information', 'product_information.supplier_id = supplier_information.supplier_id', 'left')
            ->join('product_category', 'product_category.category_id = product_information.category_id', 'left')
            ->join('unit', 'unit.unit_id = product_information.unit', 'left')
            ->order_by('product_information.product_name', 'asc')
            ->group_by('product_information.product_id')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Product List Count
    public function product_list_count()
    {
        $query = $this->db->select('
					supplier_information.*,
					product_information.*,
					product_category.category_name,
					unit.unit_short_name
				')
            ->from('product_information')
            ->join('supplier_information', 'product_information.supplier_id = supplier_information.supplier_id', 'left')
            ->join('product_category', 'product_category.category_id = product_information.category_id', 'left')
            ->join('unit', 'unit.unit_id = product_information.unit', 'left')
            ->order_by('product_information.product_id', 'desc')
            ->group_by('product_information.product_id')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Tax selected item
    public function tax_selected_item($tax_id)
    {
        $result = $this->db->select('*')
            ->from('tax_information')
            ->where('tax_id', $tax_id)
            ->get()
            ->result();

        return $result;
    }

    //Product generator id check
    public function product_id_check($product_id)
    {
        $query = $this->db->select('*')
            ->from('product_information')
            ->where('product_id', $product_id)
            ->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Count Product
    public function product_entry($data)
    {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('status', 1);
        $this->db->where('product_model', $data['product_model']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('product_information', $data);
            $this->db->select('*');
            $this->db->from('product_information');
            $this->db->where('status', 1);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
            }
            $cache_file = './my-assets/js/admin_js/json/product.json';
            $productList = json_encode($json_product);
            file_put_contents($cache_file, $productList);
            return TRUE;
        }
    }

    //Retrieve Product Edit Data
    public function retrieve_product_editdata($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve company Edit Data
    public function retrieve_company()
    {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    // public function update_product($data, $product_id)
    // {

    //     $this->db->where('product_id', $product_id);
    //     $this->db->update('product_information', $data);

    //     $this->db->select('*');
    //     $this->db->from('product_information');
    //     $this->db->where('status', 1);
    //     $query = $this->db->get();
    //     foreach ($query->result() as $row) {
    //         $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
    //     }
    //     $cache_file = './my-assets/js/admin_js/json/product.json';
    //     $productList = json_encode($json_product);
    //     file_put_contents($cache_file, $productList);
    //     return true;
    // }

    // Delete Product Item
    // public function delete_product($product_id)
    // {
    //     #### Check product is using on system or not##########
    //     # If this product is used any calculation you can't delete this product.
    //     # but if not used you can delete it from the system.

    //     $this->db->select('product_id');
    //     $this->db->from('product_purchase_details');
    //     $this->db->where('product_id', $product_id);
    //     $query = $this->db->get();
    //     $affected_row = $query->num_rows();

    //     if ($affected_row == 0) {

    //         //product image delete
    //         $product_info = $this->db->select('image_large_details, image_thumb')->from('product_information')->where('product_id',$product_id)->get()->result();
    //         if($product_info){
    //             @unlink(FCPATH.$product_info->image_large_details);
    //             @unlink(FCPATH.$product_info->image_thumb);
    //         }
    //         //product gallery image delete
    //         $gallery_images = $this->db->select('image_url')->from('image_gallery')->where('product_id',$product_id)->get()->result();
    //         if($gallery_images) {
    //             foreach ($gallery_images as $gallery_image) {
    //                 @unlink(FCPATH.$gallery_image->image_url);
    //             }
    //         }
    //         $this->db->where('product_id', $product_id);
    //         $this->db->delete('image_gallery');

    //         $this->db->where('product_id', $product_id);
    //         $this->db->delete('product_information');
    //         $this->session->set_userdata(array('message' => display('successfully_delete')));

    //         $this->db->select('*');
    //         $this->db->from('product_information');
    //         $this->db->where('status', 1);
    //         $query = $this->db->get();
    //         foreach ($query->result() as $row) {
    //             $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
    //         }
    //         $cache_file = './assets/js/admin_js/json/product.json';
    //         $productList = json_encode($json_product);
    //         file_put_contents($cache_file, $productList);
    //         redirect('Cproduct/manage_product');
    //     } else {
    //         $this->session->set_userdata(array('error_message' => display('you_cant_delete_this_product')));
    //         redirect('Cproduct/manage_product');
    //     }
    // }

    //Product By Search
    public function product_search_item($product_id)
    {
        $query = $this->db->select('
			supplier_information.*,
			product_information.*,
			product_category.category_name,
			unit.unit_short_name
		')
            ->from('product_information')
            ->join('supplier_information', 'product_information.supplier_id = supplier_information.supplier_id', 'left')
            ->join('product_category', 'product_category.category_id = product_information.category_id', 'left')
            ->join('unit', 'unit.unit_id = product_information.unit', 'left')
            ->where('product_information.product_id', $product_id)
            ->order_by('product_information.product_name', 'desc')
            ->group_by('product_information.product_id')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Duplicate Entry Checking
    public function product_model_search($product_model)
    {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('product_model', $product_model);
        $query = $this->db->get();
        return $this->db->affected_rows();
    }

    //Product Details
    public function product_details_info($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Product Purchase Report
    public function product_purchase_info($product_id)
    {
        $this->db->select('a.*,b.*,c.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('product_purchase_details b', 'b.purchase_id = a.purchase_id');
        $this->db->join('supplier_information c', 'c.supplier_id = a.supplier_id');
        $this->db->where('b.product_id', $product_id);
        $this->db->order_by('a.purchase_id', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Invoice Data for specific data
    public function invoice_data($product_id)
    {
        $this->db->select('
			a.*,
			b.*,
			sum(b.total_price)  - (b.discount * b.quantity) as total_price,
			c.customer_name
			');
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->join('customer_information c', 'c.customer_id = a.customer_id');
        $this->db->where('b.product_id', $product_id);
        $this->db->group_by('b.invoice_id');
        $this->db->order_by('a.invoice_id', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function previous_stock_data($product_id, $startdate)
    {
        $startdate .= " 00:00:00";

        $this->db->select('date,sum(quantity) as quantity');
        $this->db->from('product_report');
        $this->db->where('product_id', $product_id);
        $this->db->where('date <=', $startdate);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }

    public function insert_product($data){
       // echo '<pre>'; print_r($data);exit;
        try{
            // if($this->db->insert('test_product', $data)){
            //     return $this->db->insert_id();
            // }else{
            //     return FALSE;
            // } 

           if($this->db->insert('product_information', $data)){
            
                return $this->db->insert_id();
            }else{
                print_r($this->db->error()) ;exit;
                return FALSE;
            }     
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    public function add_product($product_id,$brand_id){
         try{
            $img_url = $_FILES['product_hidden_img1']['tmp_name'];  
            $img_name=$_FILES['product_hidden_img1']['name'];
            $upc_code = $this->input->post('case_upc');
            $img = './uploads/products/'.$upc_code.'_'.$img_name;  
            if($img == './uploads/products/_'){
                $img = './uploads/products/600px-No_image_available.svg (2).png';
            }else{
                file_put_contents($img, file_get_contents($img_url)); 
            }
            $supplier = (!empty($this->input->post('supplier')) ? $this->input->post('supplier'):'');

            if(!$this->isExistSupplier($supplier)){
                $dat = array(
                    'supplier_id'   => $this->auth->generator(20),
                    'supplier_name' => $this->input->post('supplier'),
                    'status' => 1,
                );
                $this->db->insert('supplier_information', $dat);
                $ssupplier = $dat['supplier_name'];
            }else{
                $supp = $this->isExistSupplier($supplier);
                $ssupplier = $supp->supplier_name;
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
            $sizes = $this->input->post('size');
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
                $name = $arrayName['name'];
            }

            $sup_price = $this->input->post('supplier_price');
            if($sup_price == '0.00'){
                $supplier_price = '';
            }else{
                $supplier_price = $this->input->post('supplier_price');
            }

            $data = array(
                'product_id'            => $product_id,
                'product_name'          => $this->input->post('product_name'),
                'short_name'            => $this->input->post('product_nickname'),
                'category_id'           => (!empty($this->input->post('category_id'))?$this->input->post('category_id'):'0'),
                'brand_id'              => $brandId,
                'size'                  => $name,
                'supplier'              => $ssupplier,
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
                'case_UPC'              => (!empty($upc_code)) ? $upc_code : $this->input->post('upc'),
                'barcode_type'          => $this->input->post('barcode_type'),
                'mpn'                   => $this->input->post('mpn'),
                'image_thumb'           => $img,
                //'barcode_json'          => $this->input->post('barcode_json'),
                'store_promotion_price' => $this->input->post('store_promotion_price'),  
                'ecomm_promotion_price' => $this->input->post('ecommerce_promotion_price'),  
                'status'                => 1,
                'Applicable_CRV'        => (!empty($this->input->post('CRV'))?$this->input->post('CRV'):'0'),
                'Applicable_Tax'        => (!empty($this->input->post('TAX'))?$this->input->post('TAX'):'0'),
                // 'is_ecommerce'          => (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0'),


            );
            
            $status = (!empty($this->input->post('status'))?$this->input->post('status'):'insert');
            $table_from = (!empty($this->input->post('from'))?$this->input->post('from'):'master');
            if($status == 'insert' AND $table_from == 'api'){
                if($this->db->insert('product_master', $data)){
                    $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
                     $this->db->insert('product_information',$data);
                }
            }elseif($status == 'insert' AND $table_from == 'master'){
                $data['is_ecommerce'] = (!empty($this->input->post('is_ecommerce'))?$this->input->post('is_ecommerce'):'0');
                $this->db->insert('product_information', $data);                
            }
            elseif($status == 'update' AND $table_from == 'store'){
                $this->db->where('case_UPC', $upc_code);
                $this->db->update('product_information', $data);
            }else{
                $this->db->insert('product_information', $data);
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

     public function update_product(){
        try{
            $img_url = $_FILES['product_hidden_img1']['tmp_name'];  
           // $split_url= substr($img_url, strrpos($img_url, '/' ) );
            $img_name=$_FILES['product_hidden_img1']['name'];

            $upc_code = $this->input->post('case_upc');
            
            $img = './uploads/products/'.$upc_code.'_'.$img_name;

             if($img == './uploads/products/_'){
                $img = './uploads/products/600px-No_image_available.svg (2).png';
            }else
            {
                file_put_contents($img, file_get_contents($img_url)); 
            }
            $product_id = $this->input->post('product_id');
            $sup_price = $this->input->post('supplier_price');
            if($sup_price == '0.00'){
                $supplier_price = '';
            }else{
                $supplier_price = $this->input->post('supplier_price');
            }

            $supplier = (!empty($this->input->post('supplier')) ? $this->input->post('supplier'):'');

            if(!$this->isExistSupplier($supplier)){
                $dat = array(
                    'supplier_id'   => $this->auth->generator(20),
                    'supplier_name' => $this->input->post('supplier'),
                    'status' => 1,
                );
                $this->db->insert('supplier_information', $dat);
                $ssupplier = $dat['supplier_name'];
            }else{
                $supp = $this->isExistSupplier($supplier);
                $ssupplier = $supp->supplier_name;
            }
                
            $sizes = $this->input->post('size');
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
                $name = $arrayName['name'];
            }

            $data = array(
                'product_name'          => $this->input->post('product_name'),
                'short_name'            => $this->input->post('product_nickname'),
                'category_id'           => (!empty($this->input->post('category_id'))?$this->input->post('category_id'):'0'),
                'brand_id'              => $this->input->post('brand_id'),
                'size'                  => $name,
                'supplier'              => $ssupplier,
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
                'onsale_price'          => $this->input->post('store_sell_price'),   
                'ecomm_sale_price'      => $this->input->post('ecommerce_sell_price'), 
                'store_promotion_price' => $this->input->post('store_promotion_price'),  
                'ecomm_promotion_price' => $this->input->post('ecommerce_promotion_price'),     
                'Applicable_CRV'        => $this->input->post('CRV'),  
                'Applicable_Tax'        => $this->input->post('TAX'),    
                'is_ecommerce'          => $this->input->post('is_ecommerce'),
                'case_UPC'              => (!empty($upc_code)) ? $upc_code : $this->input->post('upc'),
                'image_thumb'           => $img,
            );
            // echo '<pre>'; print_r($data);exit;

            $this->db->where('product_id', $product_id);
            if($this->db->update('product_information', $data)){
                
                $response['id'] = $product_id;
                $response['status'] = 'success';
                $response['message'] = 'Product is Successfully Updated';
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
    


    public function get_all_products() {
        try{
            $this->db->select('product_category.category_id,product_category.category_name,product_information.*');
            $this->db->from('product_information');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.is_deleted', 0);
           $this->db->order_by("id desc");
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function isProductExist($product_name){
        try{
            $this->db->select('product_name');
            $this->db->from('product_information');
            $this->db->where('product_name',$product_name);
            
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

   

    public function delete_product($product_id){
        try{
            $this->db->set('is_deleted', 1);
            $this->db->where('product_id', $product_id);
            return $this->db->update('product_information');
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    public function get_product_by_id($product_id){
        try{
            $this->db->select('product_category.category_id,product_category.category_name,brand.brand_id,brand.brand_name,product_information.*');
            $this->db->from('product_information');  
            $this->db->join('brand','brand.brand_id = product_information.brand_id','LEFT');
            $this->db->join('product_category','product_category.category_id=product_information.category_id','LEFT');
            $this->db->where('product_information.product_id',$product_id);
           
            $query = $this->db->get();

            if($this->db->affected_rows() > 0) {
                $productarray = array(
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


    public function get_all_category() {
        try{
            $this->db->select('category_id,category_name');
            $this->db->from('product_category');
            $this->db->order_by('category_name', 'ASC');
            $query =$this->db->get();
            return $query->result_array();

        

        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_all_brand() {
        try{
            $this->db->select('brand_id,brand_name');
            $this->db->from('brand');
            $this->db->order_by('brand_name', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function get_all_unit() {
        try{
            $this->db->select('*');
            $this->db->from('unit');
            $this->db->order_by('unit_name', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    // public function update_product($product_id,$data){
    //   // echo $product_id;print_r($data);exit;
    //     try {
            
    //         $this->db->where('product_id', $product_id);
    //         if($this->db->update('product_information',$data)){
    //             return TRUE;
    //         }else{
    //             print_r($this->db->error());exit;
    //             return FALSE;
    //         }
               
    //     } catch (Exception $exc) {
    //         error_log($ex->getTraceAsString());
    //         echo $ex->getTraceAsString();
    //         return FALSE;
    //     }
    // }

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
     public function get_all_supplier() {
        try{
            $this->db->select('supplier_name');
            $this->db->from('supplier_information');
            $this->db->where('is_deleted', 0);
            $query = $this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
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
        );
        return $array;
        
    }


    public function isExistSupplier($supplier){
        try{
            $this->db->select('supplier_name,supplier_id');
            $this->db->from('supplier_information');
            $this->db->where('supplier_name',$supplier);
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

    public function isUPCExist($upc){
        try{
            $this->db->select('case_UPC');
            $this->db->from('product_information');
            $this->db->where('case_UPC',$upc);
            
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

}