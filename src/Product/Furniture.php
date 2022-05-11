<?php
namespace Product;
use Core\Helpers;


class Furniture extends BaseProduct implements ProductValidator {

    protected $dimensions;

    function __construct($input) {
        parent::__construct($input);
		$this->height = $input["height"];
		$this->width = $input["width"];
		$this->length = $input["length"];								
	}


    /*
        Setters
    */
    public function setHeight($height) {
        $this->height = $height;
    }
    
    public function setWidth($width) {
        $this->width = $width;
    }
    
    public function setLength($length) {
        $this->length = $length;
    }



    /*
        Getters
    */
   public function getHeight() {
        return $this->height;
    }
    
    public function getWidth() {
        return $this->width;
    }
    
    public function getLength() {
        return $this->length;
    }




    /*
        Validation
    */
    public function validate() {

        parent::validate();

        Helpers::validate([
            "height" => [
                "value" => $this->height,
                "rules" => ["required"]
            ],
            "width" => [
                "value" => $this->width,
                "rules" => ["required"]
            ],
            "length" => [
                "value" => $this->length,
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
    	$height = $this->getHeight();
    	$width = $this->getWidth();
    	$length = $this->getLength();
    	$product_type = $this->getProductType();
    	
    	$values = compact("name", "sku", "price", "height", "width", "length", "product_type");			
    	return $values;
    }
	

}




?>