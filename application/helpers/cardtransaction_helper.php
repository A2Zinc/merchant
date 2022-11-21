<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if(!function_exists('card_transaction_settings')){
    function card_transaction_settings($data=''){
        $ci =& get_instance();
        $ci->load->database();
        $ci->db->from('card_transaction_setting');
        $query = $ci->db->get();
        $results=$query->result();
        
        if(!empty($results[0])){
            $ci->config->set_item('card_transaction_api_url', $results[0]->card_transaction_api_url);
            $ci->config->set_item('card_transaction_uat_api_url', $results[0]->card_transaction_uat_api_url);
            $ci->config->set_item('card_transaction_merchant_id', $results[0]->card_transaction_merchant_id);
            $ci->config->set_item('card_transaction_assoc_merchant_id', $results[0]->card_transaction_assoc_merchant_id);
            $ci->config->set_item('card_transaction_auth_key', $results[0]->card_transaction_auth_key);
            $ci->config->set_item('card_transaction_api_key', $results[0]->card_transaction_api_key);
            $ci->config->set_item('card_transaction_terminal_hsn_no', $results[0]->card_transaction_terminal_hsn_no);
            $ci->config->set_item('card_transaction_username', $results[0]->card_transaction_username);
            $ci->config->set_item('card_transaction_password', $results[0]->card_transaction_password);

            $ci->config->set_item('CLOVER_APP_URL', $results[0]->CLOVER_APP_URL);
            $ci->config->set_item('CLOVER_APP_SECRET', $results[0]->CLOVER_APP_SECRET);
            $ci->config->set_item('CLOVER_APP_ID', $results[0]->CLOVER_APP_ID);
            $ci->config->set_item('CLOVER_ACCESS_TOKEN', $results[0]->CLOVER_ACCESS_TOKEN);
            $ci->config->set_item('CLOVER_MERCHANT_ID', $results[0]->CLOVER_MERCHANT_ID);
            $ci->config->set_item('CLOVER_DEVICE_ID', $results[0]->CLOVER_DEVICE_ID);
        }
    }
}

card_transaction_settings();
