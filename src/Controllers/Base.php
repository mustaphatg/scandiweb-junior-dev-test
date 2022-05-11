<?php     
namespace Controllers;
use Core\Request;
use Core\Response;



abstract class Base {
    protected $request;
    //protected $response;
    
    
    function __construct(){
        $this->request = new Request();
        //$this->response = new Response();
    }
    
}



?>