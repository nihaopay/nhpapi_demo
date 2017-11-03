<?php
$need_check_extensions = array('curl');
//check extension
$extensions =  get_loaded_extensions();
foreach ($need_check_extensions as $key => $value) {
    if(!in_array( $value , $extensions ) ){
        throw new Exception('php extension '. $value.'  is not installed');
    }else{
    }
}

//check json_encode json_decode exists
if (!function_exists('json_encode') || !function_exists('json_decode')) {
    throw new Exception('json_encode is not support by this version of php');
}