<?php    
namespace Core;
use Core\Response;

class Router {
    
    private $routes = array();
    
    /*
        Route sample 
        
        $routes = [
            "/api/get" => [
                class => \Controllers\Product::class,
                method => "getProduct"getProduct,
                http_method => GET
             ]
        ]
    
    */
    
    public function get($route, $arr){
        
        $this->routes[$route] = [
            "class" => $arr[0],
            "method" => $arr[1],
            "http_method" => "GET"
        ];             
        
    }
    
    public function post($route, $arr){
        
        $this->routes[$route] = [
            "class" => $arr[0],
            "method" => $arr[1],
            "http_method" => "POST"
        ];           
        
    }
    
    
    public function start(){
        $url = $_SERVER["HTTP_HOST"];
        $url .= $_SERVER["REQUEST_URI"];
        
        
        $info = parse_url($url);
        $path = $info["path"];
        $path = $this->getCleanPath($path);
        
        

        // if path has been registered
        if(array_key_exists($path, $this->routes)){                                
            
            $current = $this->routes[$path];
            
            $class = $current["class"];
            $method = $current["method"];
            
            // create new instanse of controller
            $controller = new $class;
            
            // call controller's method
             $controller->$method();
        }else{
        	// redirect all other request to index.html
            Response::html("index.html");
        }
        
    }
    
    
    public function getCleanPath($path){
    	$host = $_SERVER["HTTP_HOST"];
    	return str_replace($host, "", $path);
    }
    
}



?>