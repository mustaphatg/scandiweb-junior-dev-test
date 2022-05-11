<?php


function load($class_name){
    $s = str_replace("\\", "/", $class_name).".php";                        
    
    $file = __DIR__."/".$s;
    
    if(file_exists($file)){
        require_once $file;
    }else{
        die("<h2>Error : Class ' $s' not found.</h2>");
    }
    
}


spl_autoload_register("load");







?>