<?php
namespace Model;
use Core\DB;


class ProductModel {
	
	protected static $table_name = "products";
	
	
	
	public static function save($data){
		$result = DB::insert(self::$table_name, $data);	
		return $result;
	}
	
	public static function delete($id){
		$result = DB::delete(self::$table_name, $id);	
		return $result;
	}
	
	
	public static function all(){
		$result = DB::all(self::$table_name);
		return $result;		
	}

}




?>