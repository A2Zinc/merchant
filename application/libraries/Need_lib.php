<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Need_lib {

    var $CI;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->helper('url');
        // $this->CI->load->model('Products');

    }


    public function get_product_by_upc($UPC_code){

        $api_key  = $this->CI->config->item('barcodelookup_key');
        // $UPC_code = $this->input->post('upc_code');//682430400102
        $url="https://api.barcodelookup.com/v2/products?barcode=".$UPC_code."&foratted=y&key=".$api_key;

        $curl = curl_init();

        curl_setopt_array($curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => array('barcode' => $UPC_code,'key' => $api_key),
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
        // $response = get_data($url,$UPC_code,$api_key);

        /*$response ='{"products":
                        [{
                        "barcode_number":"078000013054",
                        "barcode_type":"UPC",
                        "barcode_formats":"UPC 078000013054, EAN 0078000013054",
                        "mpn":"0007800001305",
                        "model":"",
                        "asin":"",
                        "product_name":"Crush Orange Soda, 12 Fl. Oz., 12 Count",
                        "title":"",
                        "category":"Food, Beverages & Tobacco > Beverages > Soda",
                        "manufacturer":"Dr Pepper/Seven Up, Inc",
                        "brand":"Crush",
                        "label":"",
                        "author":"",
                        "publisher":"",
                        "artist":"",
                        "actor":"",
                        "director":"",
                        "studio":"",
                        "genre":"",
                        "audience_rating":"",
                        "ingredients":"",
                        "nutrition_facts":"",
                        "color":"",
                        "format":"",
                        "package_quantity":"",
                        "size":"",
                        "length":"",
                        "width":"",
                        "height":"",
                        "weight":"11",
                        "release_date":"",
                        "description":"When it comes to creating playful memories with bold and exciting fruit flavor, no soft drink satisfies quite like a Crush. The leader of the Crush family, Crush Orange shocks your senses with a sweet and tangy citrus flavor that is 100% caffeine free. Crush has been a classic beverage loved by every generation since 1916. With the delicious taste of Crush Orange, this is where fun meets flavor.",
                        "features":[],
                        "images":["https://images.barcodelookup.com/323/3234571-1.jpg"],
                        "stores":[
                            {
                            "store_name":"Blain Farm & Fleet",
                            "store_price":"5.29",
                            "product_url":"http://www.farmandfleet.com/products/665012-orange-crush-12-pack.html?feedsource=2&utm_source=affiliate&utm_medium=feed&utm_campaign=CJ%20Feed",
                            "currency_code":"USD",
                            "currency_symbol":"$"
                            },
                            {
                            "store_name":"Target",
                            "store_price":"4.89",
                            "product_url":"https://www.target.com/p/crush-orange-soda-12pk-12-fl-oz-cans/-/A-12989427",
                            "currency_code":"USD",
                            "currency_symbol":"$"
                            },
                            {
                            "store_name":"Walmart",
                            "store_price":"23.28",
                            "product_url":"https://www.walmart.com/ip/Crush-Orange-Soda-12-Fl-Oz-12-Count/33284105&intsrc=CATF_4284",
                            "currency_code":"USD",
                            "currency_symbol":"$"
                            },
                            {
                            "store_name":"Wal-Mart.com US - Paused",
                            "store_price":"23.28",
                            "product_url":"https://www.walmart.com/ip/Crush-Orange-Soda-12-Fl-Oz-12-Count/33284105",
                            "currency_code":"USD",
                            "currency_symbol":"$"
                            }
                            ],
                            "reviews":[]
                        }]
                    }';

            return json_decode($response);
        // return json_encode($response);*/
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

    public function synk_to_live($user_id,$module,$operation,$query, $is_dependent=0, $query_from=0){
        $data = array(
            'user_id' => $user_id,
            'module'  => $module,
            'module_operation' => $operation,
            'query_string' => $query,
            'is_dependent' => $is_dependent,
            'query_from' => $query_from,
        );
        if($this->CI->db->insert('query_logs', $data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function execute_on_live($qry){
        $curl = curl_init();
        $url = 'http://3.129.61.135/POS_system/project/api/V1/api/synk_live';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('synk_query' => $qry),
            CURLOPT_HTTPHEADER => array(
                // 'Cookie: PHPSESSID=n5j08t7t1tbpebs437u4pb27mcplvl5u'
                "Accept: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function upload_file($file, $tmp_file, $path) {
        $name = time() . "." . $file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "JPG" || $ext == "PNG" || $ext == "JPEG") {
            move_uploaded_file($tmp_file, $path . $name);
            return $name;
        } else {
            return FALSE;
        }
    }

    public function lwt_permissions(){
        $CI =& get_instance();
        $CI->load->model('Cashier_model');
        $role_wise=$CI->Cashier_model->get_permission();
        $user_wise=$CI->Cashier_model->get_extra_permission();

    /*----store settings Permissions----*/

        /*********Custom Key Settings*********/
        if(strpos($role_wise[0]['store_rights'], 'A') !== false){
            $custom_Key_setting = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'A') !== false){
            $custom_Key_setting = 1;
        }else{
            $custom_Key_setting = 0;
        }

        /*********Employees *********/
        if(strpos($role_wise[0]['store_rights'], 'B') !== false){
            $employees = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'B') !== false){
            $employees = 1;
        }else{
            $employees = 0;
        }

        /*********General Settings *********/
        if(strpos($role_wise[0]['store_rights'], 'C') !== false){
            $general_settings = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'C') !== false){
            $general_settings = 1;
        }else{
            $general_settings = 0;
        }

        /*********Label Editor *********/
        if(strpos($role_wise[0]['store_rights'], 'D') !== false){
            $label_editor = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'D') !== false){
            $label_editor = 1;
        }else{
            $label_editor = 0;
        }

        /*********POS Categories *********/
        if(strpos($role_wise[0]['store_rights'], 'E') !== false){
            $pos_categories = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'E') !== false){
            $pos_categories = 1;
        }else{
            $pos_categories = 0;
        }

        /*********Roles *********/
        if(strpos($role_wise[0]['store_rights'], 'F') !== false){
            $roles = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'F') !== false){
            $roles = 1;
        }else{
            $roles = 0;
        }

        /*********Payroll Settings *********/
        if(strpos($role_wise[0]['store_rights'], 'G') !== false){
            $payroll_settings = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'G') !== false){
            $payroll_settings = 1;
        }else{
            $payroll_settings = 0;
        }

        /*********Tax Settings *********/
        if(strpos($role_wise[0]['store_rights'], 'H') !== false){
            $tax_settings = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'H') !== false){
            $tax_settings = 1;
        }else{
            $tax_settings = 0;
        }

        /*********Cash Advance Settings *********/
        if(strpos($role_wise[0]['store_rights'], 'I') !== false){
            $cash_advance_settings = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'I') !== false){
            $cash_advance_settings = 1;
        }else{
            $cash_advance_settings = 0;
        }

        /*********Discount Settings *********/
        if(strpos($role_wise[0]['store_rights'], 'J') !== false){
            $discount_setting = 1;
        }elseif(strpos($user_wise[0]['store_rights'], 'J') !== false){
            $discount_setting = 1;
        }else{
            $discount_setting = 0;
        }

    /*----Custome/Loyalty Permissions----*/

        /*********Add Customer*********/
        if(strpos($role_wise[0]['loyalty_rights'], 'A') !== false){
            $add_customer = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'A') !== false){
            $add_customer = 1;
        }else{
            $add_customer = 0;
        }

        /*********Update Customer *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'B') !== false){
            $update_customer = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'B') !== false){
            $update_customer = 1;
        }else{
            $update_customer = 0;
        }

        /*********Delete Customer *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'C') !== false){
            $delete_customer = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'C') !== false){
            $delete_customer = 1;
        }else{
            $delete_customer = 0;
        }

        /*********Create Coupon *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'D') !== false){
            $create_coupon = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'D') !== false){
            $create_coupon = 1;
        }else{
            $create_coupon = 0;
        }

        /*********Edit Coupon *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'E') !== false){
            $edit_coupon = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'E') !== false){
            $edit_coupon = 1;
        }else{
            $edit_coupon = 0;
        }

        /*********Delete Coupon *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'F') !== false){
            $delete_coupon = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'F') !== false){
            $delete_coupon = 1;
        }else{
            $delete_coupon = 0;
        }

        /*********Create Promotion *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'G') !== false){
            $create_promotion = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'G') !== false){
            $create_promotion = 1;
        }else{
            $create_promotion = 0;
        }

        /*********Edit Promotion *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'H') !== false){
            $edit_promotion = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'H') !== false){
            $edit_promotion = 1;
        }else{
            $edit_promotion = 0;
        }

        /*********Delete Promotion *********/
        if(strpos($role_wise[0]['loyalty_rights'], 'I') !== false){
            $delete_promotion = 1;
        }elseif(strpos($user_wise[0]['loyalty_rights'], 'I') !== false){
            $delete_promotion = 1;
        }else{
            $delete_promotion = 0;
        }

    /*----Inventory Permissions----*/

        /*********Add Product*********/
        if(strpos($role_wise[0]['inventory_rights'], 'A') !== false){
            $add_product = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'A') !== false){
            $add_product = 1;
        }else{
            $add_product = 0;
        }

        /*********Update Product *********/
        if(strpos($role_wise[0]['inventory_rights'], 'B') !== false){
            $update_product = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'B') !== false){
            $update_product = 1;
        }else{
            $update_product = 0;
        }

        /*********Delete Product *********/
        if(strpos($role_wise[0]['inventory_rights'], 'C') !== false){
            $delete_product = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'C') !== false){
            $delete_product = 1;
        }else{
            $delete_product = 0;
        }

        /*********Add Supplier *********/
        if(strpos($role_wise[0]['inventory_rights'], 'D') !== false){
            $add_supplier = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'D') !== false){
            $add_supplier = 1;
        }else{
            $add_supplier = 0;
        }

        /*********Update Supplier *********/
        if(strpos($role_wise[0]['inventory_rights'], 'E') !== false){
            $update_supplier = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'E') !== false){
            $update_supplier = 1;
        }else{
            $update_supplier = 0;
        }

        /*********Delete Supplier *********/
        if(strpos($role_wise[0]['inventory_rights'], 'F') !== false){
            $delete_supplier = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'F') !== false){
            $delete_supplier = 1;
        }else{
            $delete_supplier = 0;
        }

        /*********Add Scratcher *********/
        if(strpos($role_wise[0]['inventory_rights'], 'G') !== false){
            $add_scratcher = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'G') !== false){
            $add_scratcher = 1;
        }else{
            $add_scratcher = 0;
        }

        /*********Update Scratcher *********/
        if(strpos($role_wise[0]['inventory_rights'], 'H') !== false){
            $update_scratcher = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'H') !== false){
            $update_scratcher = 1;
        }else{
            $update_scratcher = 0;
        }

        /*********Delete Scratcher *********/
        if(strpos($role_wise[0]['inventory_rights'], 'I') !== false){
            $delete_scratcher = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'I') !== false){
            $delete_scratcher = 1;
        }else{
            $delete_scratcher = 0;
        }

        /*********Update Custom Product *********/
        if(strpos($role_wise[0]['inventory_rights'], 'J') !== false){
            $update_custom_product = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'J') !== false){
            $update_custom_product = 1;
        }else{
            $update_custom_product = 0;
        }

        /*********Delete Custom Product *********/
        if(strpos($role_wise[0]['inventory_rights'], 'K') !== false){
            $delete_custom_product = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'K') !== false){
            $delete_custom_product = 1;
        }else{
            $delete_custom_product = 0;
        }

        /*********Product-Upc Label *********/
        if(strpos($role_wise[0]['inventory_rights'], 'L') !== false){
            $product_upc_label = 1;
        }elseif(strpos($user_wise[0]['inventory_rights'], 'L') !== false){
            $product_upc_label = 1;
        }else{
            $product_upc_label = 0;
        }


    /*----POS Permissions----*/

        // /*********Shift Report*********/
        // if(strpos($role_wise[0]['pos_rights'], 'A') !== false){
        //     $shift_report = 1;
        // }elseif(strpos($user_wise[0]['pos_rights'], 'A') !== false){
        //     $shift_report = 1;
        // }else{
        //     $shift_report = 0;
        // }

        /*********Custom Price *********/
        if(strpos($role_wise[0]['pos_rights'], 'B') !== false){
            $custom_price = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'B') !== false){
            $custom_price = 1;
        }else{
            $custom_price = 0;
        }

        /*********Print Receipt *********/
        if(strpos($role_wise[0]['pos_rights'], 'C') !== false){
            $print_receipt = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'C') !== false){
            $print_receipt = 1;
        }else{
            $print_receipt = 0;
        }

        /*********Coupon *********/
        if(strpos($role_wise[0]['pos_rights'], 'D') !== false){
            $coupon = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'D') !== false){
            $coupon = 1;
        }else{
            $coupon = 0;
        }

        /*********Cash Drop *********/
        if(strpos($role_wise[0]['pos_rights'], 'E') !== false){
            $cash_drop = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'E') !== false){
            $cash_drop = 1;
        }else{
            $cash_drop = 0;
        }

        /*********Refund *********/
        if(strpos($role_wise[0]['pos_rights'], 'F') !== false){
            $refund = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'F') !== false){
            $refund = 1;
        }else{
            $refund = 0;
        }

        /*********Payout *********/
        if(strpos($role_wise[0]['pos_rights'], 'G') !== false){
            $payout = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'G') !== false){
            $payout = 1;
        }else{
            $payout = 0;
        }

        /*********Add Custom Product *********/
        if(strpos($role_wise[0]['pos_rights'], 'H') !== false){
            $add_custom_product = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'H') !== false){
            $add_custom_product = 1;
        }else{
            $add_custom_product = 0;
        }

        /*********Price Override *********/
        if(strpos($role_wise[0]['pos_rights'], 'I') !== false){
            $price_override = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'I') !== false){
            $price_override = 1;
        }else{
            $price_override = 0;
        }

        if(strpos($role_wise[0]['pos_rights'], 'J') !== false){
            $pos_discount = 1;
        }elseif(strpos($user_wise[0]['pos_rights'], 'J') !== false){
            $pos_discount = 1;
        }else{
            $pos_discount = 0;
        }


    /*----Reports Permissions----*/

        /*********Shift Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'A') !== false){
            $shift_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'A') !== false){
            $shift_report = 1;
        }else{
            $shift_report = 0;
        }

        /*********Sales Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'B') !== false){
            $sales_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'B') !== false){
            $sales_report = 1;
        }else{
            $sales_report = 0;
        }

        /*********Reconciliation Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'C') !== false){
            $reconciliation_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'C') !== false){
            $reconciliation_report = 1;
        }else{
            $reconciliation_report = 0;
        }

        /*********Payout Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'D') !== false){
            $payout_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'D') !== false){
            $payout_report = 1;
        }else{
            $payout_report = 0;
        }

        /*********Timesheet Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'E') !== false){
            $timesheet_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'E') !== false){
            $timesheet_report = 1;
        }else{
            $timesheet_report = 0;
        }

        /*********Card Transaction Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'F') !== false){
            $card_transaction_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'F') !== false){
            $card_transaction_report = 1;
        }else{
            $card_transaction_report = 0;
        }

        /*********Audit Log Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'G') !== false){
            $audit_log_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'G') !== false){
            $audit_log_report = 1;
        }else{
            $audit_log_report = 0;
        }

        /*********Scratcher Sales Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'H') !== false){
            $scratcher_sales_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'H') !== false){
            $scratcher_sales_report = 1;
        }else{
            $scratcher_sales_report = 0;
        }

        /*********Inventory Report*********/
        if(strpos($role_wise[0]['reports_rights'], 'I') !== false){
            $inventory_report = 1;
        }elseif(strpos($user_wise[0]['reports_rights'], 'I') !== false){
            $inventory_report = 1;
        }else{
            $inventory_report = 0;
        }


        $permissions = array(
            'custom_Key_setting'    => $custom_Key_setting,
            'employees'             => $employees,
            'general_settings'      => $general_settings,
            'label_editor'          => $label_editor,
            'pos_categories'        => $pos_categories,
            'roles'                 => $roles,
            'payroll_settings'      => $payroll_settings,
            'tax_settings'          => $tax_settings,
            'cash_advance_settings' => $cash_advance_settings,
            'discount_setting'      => $discount_setting,
            'add_customer'          => $add_customer,
            'update_customer'       => $update_customer,
            'delete_customer'       => $delete_customer,
            'create_coupon'         => $create_coupon,
            'edit_coupon'           => $edit_coupon,
            'delete_coupon'         => $delete_coupon,
            'create_promotion'      => $create_promotion,
            'edit_promotion'        => $edit_promotion,
            'delete_promotion'      => $delete_promotion,
            'add_product'           => $add_product,
            'update_product'        => $update_product,
            'delete_product'        => $delete_product,
            'add_supplier'          => $add_supplier,
            'update_supplier'       => $update_supplier,
            'delete_supplier'       => $delete_supplier,
            'add_scratcher'         => $add_scratcher,
            'update_scratcher'      => $update_scratcher,
            'delete_scratcher'      => $delete_scratcher,
            'update_custom_product' => $update_custom_product,
            'delete_custom_product' => $delete_custom_product,
            'product_upc_label'     => $product_upc_label,
            'custom_price'          => $custom_price,
            'print_receipt'         => $print_receipt,
            'coupon'                => $coupon,
            'cash_drop'             => $cash_drop,
            'refund'                => $refund,
            'payout'                => $payout,
            'add_custom_product'    => $add_custom_product,
            'price_override'        => $price_override,
            'discount_perm'         => $pos_discount,
            'shift_report'          => $shift_report,
            'sales_report'          => $sales_report,
            'reconciliation_report' => $reconciliation_report,
            'payout_report'         => $payout_report,
            'timesheet_report'      => $timesheet_report,
            'card_transaction_report' => $card_transaction_report,
            'audit_log_report'      => $audit_log_report,
            'scratcher_sales_report' => $scratcher_sales_report,
            'inventory_report'      => $inventory_report,
        );

        return $permissions;
    }

    public function dymamic_size(){
        $CI =& get_instance();
        $CI->load->model('Cashier_model');
        $result = $CI->Cashier_model->get_fontsize();
        return $data['dynamic_size'] = $result->font_size;
    }

}
