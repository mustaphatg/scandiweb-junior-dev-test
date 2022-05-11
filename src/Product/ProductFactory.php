<?php     
namespace Product;

use Book;
use DVD;
use Furniture;





class ProductFactory {
    

    public static function create($input){
        
        $list = require __DIR__."/config_list.php";                    
       
        $class = $list[ $input["product_type"] ];
        return new $class($input);
    }
    
}



?>