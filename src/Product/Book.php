<?php
namespace Product;
use Core\Helpers;


class Book extends BaseProduct implements ProductValidator {					

    protected $weight;
   

    function __construct($input) {
        parent::__construct($input);
        $this->weight = $input["weight"];
    }


    /*
        Setters
    */
    public function setWeight($weight) {
        $this->weight = $weight;
    }


    /*
        Getters
    */
    public function getWeight() {
        return $this->weight;
    }



    /*
        Validation
    */
    public function validate() {

        parent::validate();

        Helpers::validate([
            "weight" => [
                "value" => $this->weight,
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
    	$weight = $this->getWeight();
    	$product_type = $this->getProductType();
    	
    	$values = compact("name", "sku", "price", "weight", "product_type");
    	return $values;
    }


}




?>