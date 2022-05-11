<?php    
namespace Core;


class Response {
    
    
    public static function html($page, $code = 200){
        http_response_code($code);
        header("Content-Type: text/html");
        echo self::view($page);
        exit;
    }
    
    
    public static function json($message, $code = 200){        
        http_response_code($code);
        header("Content-Type: application/json");
        echo json_encode($message);
        exit;
    }
    
    
    public static function setHeader($header){
        header($header);
    }
    
    
    
    
    public static function view($page){
        ob_start();
        
        include "public/$page";
        $html = ob_get_contents();
        
        ob_end_clean();
        return $html;
    }
    
}




?>