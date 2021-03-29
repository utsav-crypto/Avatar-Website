<?php
namespace database;
require_once(ROOT."database/config/config.php");

class DB{
	public static $dbcon = null;
	public static function getDbConnection(){
		if(is_null(self::$dbcon)){
			self::$dbcon = new \mysqli(DB_HOST,DB_USER,DB_PASS);
		}
		return(self::$dbcon);
	}

	public static function executeQuery($query){
		$conn = self::getDbConnection();
		if(!$conn->select_db(DB_NAME)){
			$conn->query("create database ".DB_NAME);
		}
		$res = $conn->query($query);
		if($conn->error){
			echo("error:".$conn->error);
		}
		self::close();
		if(gettype($res)!="boolean"){
			return $res->fetch_all(MYSQLI_BOTH);
		}
		else{
			return($res);
		}
	}

	private static function close(){
		if(self::$dbcon!==null){
			self::$dbcon->close();
		}
		self::$dbcon = null;
	}

	public static function getNavItem(){
		$sql = "SELECT * FROM ".TB_LINK." WHERE type='nav_item';";
		return (self::executeQuery($sql));
	}

}
