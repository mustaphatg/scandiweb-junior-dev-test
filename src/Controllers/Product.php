<?php
namespace Controllers;


use Core\Response;
use Core\Helpers;
use Product\ProductFactory;
use Model\ProductModel;


class Product extends Base {

    function __construct() {
        parent::__construct();
    }


    public function home() {
        return Response::html("index.html");
    }



    public function saveProduct() {

        /*
            factory pattern to get concrete product object
        */
        $product = ProductFactory::create($this->request->post());

        // validate
        $product->validate();
        
        // save
		$result = ProductModel::save( $product->getValues() );
		
		if($result){
         	return Response::json(["message" => "success"]);
		}
    }



    public function getProducts() {
    	$data = ProductModel::all();
         return Response::json($data);
    }
    
    
    
    // delete a product
    public function deleteProduct(){
    	$id = $this->request->get("id");
    	ProductModel::delete($id);
    	
        return Response::json(["message" => "success"]);
    }


}






?>