<?php
namespace Core;

use Core\Response;

require_once __DIR__."/../db_config.php";

class DB {
	
	
	public static function connect(){
		$connection = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		return $connection;
	}
	
	
	// insert
	public static function insert( $table, $data = array() ){										
		$keys = implode(",", array_keys($data) );
		$values = implode("','", $data);
		
		$connection = self::connect();
		
		$sql = "INSERT INTO $table($keys) VALUES('$values')";
		
		return $connection->query($sql);
	}
	
	
	// delete
	public static function delete($table, $id = null ){
		$sql = "DELETE FROM $table WHERE id = $id";
		
		$connection = self::connect();
		
		return $connection->query($sql);
	}
	
	
	
	// all data
	public static function all($table){
		$sql = "SELECT * FROM $table";
		
		$connection = self::connect();
		
		$result = $connection->query($sql);
		
		$rows = $result->num_rows;
	
		
		$list = [];
			
		while($row = $result->fetch_assoc() ){
			$list[] = $row;
		}
		return $list;
	}
	
	
	
	// find one row
	public static function  findOne($table, $where){
		
		$connection = self::connect();
	
	
		$sql = "SELECT * FROM $table WHERE ";
		
		foreach ($where as $column => $where_clause ){
			$action = $where_clause["action"];
			$value = $where_clause["value"];
			
			$sql .= " $column $action '$value' ";
		}
		
		
		$result = $connection->query($sql);
		
		self::error($connection);
		
		return $result;
	}
	
	
	
	
	public static function error($connection){
		if($connection->error){
			
			Response::json([
				"type" => "error",
				"message" => $connection->error
			], 500);
		}
	}
	
	
	
}





?>