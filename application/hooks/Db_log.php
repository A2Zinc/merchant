<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Db_log 
{

    public $CI;
    function __construct() 
    {


    }


    function logQueries() 
    {
        // $CI->need_lib->lwt_permissions();
       
               $CI = & get_instance();
                       $CI->load->library('need_lib');
        if($CI->router->fetch_method()=="sync"){
            return;
        }


        $times = $CI->db->query_times;
        $sql=[];
        foreach ($CI->db->queries as $key => $query) 
        { 
            if(trim(substr($query, 0,6))!='SELECT' && trim(substr($query, 0,6))!='select' && trim(substr($query, 0,3))!='SET'){
                $sql[] = $query; 
            // fwrite($handle, $sql . "\n\n");    
            // $CI->need_lib->synk_to_live("1","common","insert",$sql);
        
            }

        }
        $data_str['sql']=$sql;
        $data_str=http_build_query($data_str);
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://atozpos.azurewebsites.net/cashier/Cashier/api_run',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $data_str,
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
          ),
        ));

      //curl_exec($curl);
  
    }

}