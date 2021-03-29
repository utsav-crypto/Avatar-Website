<?php
namespace lib;
class JS{
	public static function alert($msg){
		echo("<script>alert('$msg')</script>");
	}
	public static function console($func,$msg){
		echo("<script>console.$func('$msg')</script>");
	}
	public static function abc($func,$msg){
		echo("<script>console.$func('$msg')</script>");
	}
}
