<?php
session_start();
define("ROOT",str_replace("index.php","../",$_SERVER["SCRIPT_FILENAME"])."st-core/");
define("PUBLIC_ROOT",str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]));
define("HOST",(isHttps()?"https://":"http://").$_SERVER["HTTP_HOST"]."/");
define("TITLE",$_SERVER["HTTP_HOST"]);

define("DB_HOST","localhost");
define("DB_NAME","stribe");
define("DB_USER","root");
define("DB_PASS","");

define("TB_COMPANEY","companey");
define("TB_USER","user");
define("TB_LINK","link");

//class config{

//}

function isHttps() {

	if ((!empty($_SERVER['HTTPS']))) {

		return true;
	}
	return false;
}
