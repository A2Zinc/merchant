<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if(!function_exists('card_transaction_settings')){
    function card_transaction_settings($data=''){
        $ci =& get_instance();
        $ci->load->database();
        $sql = "SELECT * FROM `card_transaction_setting`";
        $q = $ci->db->query($sql);
        if($q->num_rows() > 0)
        {
            foreach($q->result() as $data)
            {
                echo '<p>'.$data->field_name.'</p>';
            }
        }
    }
}

//card_transaction_settings();