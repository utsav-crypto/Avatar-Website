<?php
namespace core\rout;
include_once('interfaces/IRequest.php');
class Request implements interfaces\IRequest{
	function __construct(){
		$this->bootstrapSelf();
	}

	private function bootstrapSelf(){
		foreach($_SERVER as $key => $value){
  		$this->{$this->toCamelCase($key)} = $value;
		}
		$this->clienIP = $this->getClientiP();
	}

	private function toCamelCase($string){
		$result = strtolower($string);
		preg_match_all('/_[a-z]/', $result, $matches);
		foreach($matches[0] as $match){
			$c = str_replace('_', '', strtoupper($match));
			$result = str_replace($match, $c, $result);
    	}
		return $result;
	}

	public function getBody(){
		if($this->requestMethod === "GET"){
  			return;
		}
    	if ($this->requestMethod == "POST"){
  			$body = array();
      	foreach($_POST as $key => $value){
        	$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}
			return $body;
		}
	}


	private function getClientiP(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			//ip pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}
?>
