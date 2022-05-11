<?php
namespace Core;

require_once __DIR__."/Rules.php";

class Helpers {



    public static function validate($arr)
    {
        // loop submitted data
        foreach ($arr as $field => $options ) {
            $value = $options["value"];
            $rules = $options["rules"];
            
            // loop rules array
            foreach ($rules as $rule) {
                // each rule is a variable function in "Rules.php"				
                $rule($field, $value);
            }
        }
    }
    
    
    

}


?>