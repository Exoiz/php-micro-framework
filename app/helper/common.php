<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

function pr($arr){
    $ret = '<pre>'.print_r($arr,TRUE).'</pre>'."\n";
    echo $ret;
}
function terminal($command){
    if(function_exists('system')){
        ob_start();
        system($command , $return_var);
        $output = ob_get_contents();
        ob_end_clean();
    }else if(function_exists('passthru')){
        ob_start();
        passthru($command , $return_var);
        $output = ob_get_contents();
        ob_end_clean();
    }else if(function_exists('exec')){
        exec($command , $output , $return_var);
        $output = implode("n" , $output);
    }else if(function_exists('shell_exec')){
        $output = shell_exec($command) ;
    }else{
        $output = 'Command execution not possible on this system';
        $return_var = 1;
    }
    return array('output' => $output , 'status' => $return_var);
}
function remove_prefix($str=''){
    $prefix='https://';
    if (substr($str, 0, strlen($prefix)) == $prefix) {
        $str = substr($str, strlen($prefix));
    }
    return trim($str);
}