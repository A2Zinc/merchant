<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('remove_space'))
{
    function remove_space($var = '')    {
       $string = str_replace(' ','-', $var);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }
}

function GetIP(){

  if(stripos(base_url(), 'localhost')!==false){
    $usystemno=UNIQUE_NO;
  }  
 else {
    if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';
        $ipaddress=explode(":",$ipaddress);
        $ipaddress=trim($ipaddress[0]);
        $usystemno=$ipaddress;
    }
    return $usystemno;  
}

if ( ! function_exists('remove_hyphen'))
{
    function remove_hyphen($var = '')    {
     return  $string = str_replace('-',' ', $var);
    }
}

if(!function_exists('dd')){
    function dd($data=''){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();
    }
}

if(!function_exists('d')){
    function d($data=''){
        echo "<pre>";
        print_r($data);
        echo "</pre>";        
    }
}
//remove special character
function clean($string) {
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

if(!function_exists('get_short_string')){
    function get_short_string($inputstring,$no_of) {
        $pieces = explode(" ", $inputstring);
        return $first_part = implode(" ", array_splice($pieces, 0, $no_of));
    }
}