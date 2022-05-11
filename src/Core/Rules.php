<?php
use \Core\Response;
use \Core\DB;



function required($field, $value) {
    
    $message = [
        "type" => "error",
        "message" => "The field '$field' is required."                            
    ];
    
    if(!$value || empty($value) ){
         Response::json($message, 500);
      	exit;
    }
}



function unique_sku($field, $value) {
    
    $message = [
        "type" => "error",
        "message" => "The field '$field'  should be unique."                            
    ];
    
    
    $where= [
    	"sku" => [ 
    		"action" => "=",
    		"value" => $value 
    	]
    ];
    
    $s = DB::findOne("products", $where);
    
    
    if($s->num_rows){
    	Response::json($message, 500);
    	exit;
    }
    
}





?>