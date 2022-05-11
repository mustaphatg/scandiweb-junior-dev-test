<?php
namespace Product;
use Core\Helpers;

class DVD extends BaseProduct implements ProductValidator {

    protected $size;

    function __construct($input) {
        parent::__construct($input);
        $this->size = $input["size"];
    }



    /*
        Setters
    */
    public function setZize($size) {
        $this->size = $size;
    }


    /*
        Getters
    */
    public function getSize() {
        return $this->size;
    }
    

    /*
        Validation
    */
    public function validate() {

        parent::validate();

        Helpers::validate([
            "size" => [
                "value" => $this->size,
                "rules" => ["required"]
            ]
        ]);
    }
    
    
    
     /*
    	GET Values
    	
    	return all properties through an array
    */
    public function getValues(){
    	
    	$name = $this->getName();
    	$sku = $this->getSku();
    	$price = $this->getPrice();
    	$size = $this->getSize();
    	$product_type = $this->getProductType();
    	
    	$values = compact("name", "sku", "price", "size", "product_type");
    	return $values;
    }
    


}




?>