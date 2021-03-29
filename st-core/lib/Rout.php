<?php
namespace lib;
class Rout{
	public static $ptr;
	static function get($str,$fun){
		self::$ptr->get($str,$fun);
	}
	static function post($str,$fun){
		self::$ptr->post($str,$fun);
	}
	static function put($str,$fun){
		self::$ptr->put($str,$fun);
	}
	static function set($str,$fun){
		self::$ptr->set($str,$fun);
	}
	static function resolve(){
		self::$ptr->resolve();
	}
}
?>
