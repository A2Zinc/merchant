<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myotherclass
{
    function MyOtherfunction()
    {
        $CI =& get_instance();
        $row_timezone = $CI->db->query('select * from web_setting')->row()->timezone;
        if($row_timezone != "") {
            date_default_timezone_set($row_timezone);
        } else {
            date_default_timezone_set("America/Los_Angeles");
        }

        // $row_node = $CI->db->query('select * from web_setting')->row()->node_status;
        // $CI->session->set_userdata('node_setting',$row_node);
        // //echo "<script> var node_setting = ".$row_node.";</script>";

    }

}
