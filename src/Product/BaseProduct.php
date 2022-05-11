<?php
namespace Product;
use Core\Helpers;

abstract class BaseProduct implements ProductValidator {                        
    protected $name;
    protected $sku;
    protected $price;
    
    protected $product_type;


    function __construct($inputs) {
        $this->name = $inputs["name"];
        $this->sku = $inputs["sku"];
        $this->price = $inputs["price"];
        $this->product_type = $inputs["product_type"];
    }


    /*
        Setters
    */

    public function setName($name) {
        $this->name = $name;
    }

    public function setSku($sku) {
        $this->sku = $sku;
    }

    public function setPrice($price) {
        $this->price = $price;
    }



    /*
        Getters
    */

    public function getName() {
        return $this->name;
    }

    public function getSku() {
        return $this->sku;
    }

    public function getPrice() {
        return $this->price;
    }
	
	
	public function getProductType() {
        return $this->product_type;
    }


    /*
        Validation
    */
    public function validate() {
        
        Helpers::validate([
            "name" => [
                "value" => $this->name,
                "rules" => ["required"]
            ],
            "price" => [
                "value" => $this->price,
                "rules" => ["required"]
            ],
            "sku" => [
                "value" => $this->sku,
                "rules" => ["required", "unique_sku"]
            ]
        ]);
        
    }

}

?>