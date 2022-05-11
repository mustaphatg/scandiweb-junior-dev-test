<?php    
namespace Core;


class Request {
    
    
    public function post($key = null){
        
        if(!count($_POST)){
        	$data = file_get_contents("php://input");	
        	$data = (array) json_decode($data);
        	$_POST = $data;
        }
        
        if($key){
            return $_POST[$key];
        }
        
        return $_POST;
    }
    
    
    public function get($key = null){
        if($key){
            return $_GET[$key];
        }
        
        return $_GET;
    }
    
}




?>