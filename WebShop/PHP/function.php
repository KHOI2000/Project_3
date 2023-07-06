<?php 
// === function  handle
function get_data($label_field)
{
    global $$label_field;
    if (!empty($$label_field))
        return $$label_field;
}
function get_data_cookie($label_field){
    if(!empty($_COOKIE[$label_field])){
        return $_COOKIE[$label_field];
    }
}
function is_error($label_field)
{
    global $error;
    if (!empty($error[$label_field]))
        return $error[$label_field];
}
function showError($input) {
    global $error;
    if(!empty($error[$input])){
        echo $error[$input] ;
    }
}
function format_money($number , $decimals, $dec_point , $thousands_sep,$unit = "đ" ) {
    return number_format($number,$decimals,$dec_point,$thousands_sep)."<span style='text-decoration:underline';>{$unit}<span>";
}
