<?php
namespace lib;
use interfaces;
class Admin implements User{
	private static $islogin = false;
	private function __construct($para){
		self::$islogin = true;
		foreach($para as $key => $value){
  		$this->{$this->toCamelCase($key)} = $value;
		}
	}

	public static function insertNavItem($link , $name){
		$sql = "
			INSERT INTO ".TB_LINK." (linkurl,name,type) VALUES ('$link','$name','nav_item');
		";
		return DB::executeQuery($sql);
	}

	public static function deleteNavItem($id){
		$sql = "
			DELETE FROM ".TB_LINK." WHERE id = '".$id."';
		";
		return DB::executeQuery($sql);
	}

	public static function isLogin(){
		return(self::$islogin);
	}

	public static function createAdmin($para){
		if(!self::isLogin())
			return(new Admin($para));
		else{
			echo "Allready Login";
		}
	}
	public function __destruct(){
		self::$islogin = false;
	}
}
