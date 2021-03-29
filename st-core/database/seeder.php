<?php
namespace database;
require_once(ROOT."database/config/config.php");
class table{
	public $table_name = null;
	public $query = null;
	function construct($table_name){
		$this->table_name = $table_name;
	}
	function insert(){
		DB::executeQuery($this->query);
	}
}


class seeder{
	function __construct(){
		$this->tbl = array();
		$temp = new table(TB_COMPANEY);
		$temp->query = "CREATE TABLE ".TB_COMPANEY."(
			stribeId CHAR(10),
			companeyName VARCHAR(255)
		);";
		$temp->insert();
		unset($temp);

		$temp = new table(TB_USER);
		$temp->query= "CREATE TABLE ".TB_USER."(
			stribeId CHAR(10),
			userName VARCHAR(255)
		)";
		$temp->insert();
		unset($temp);

		$temp = new table(TB_USER);
		$temp->query= "CREATE TABLE ".TB_LINK."(
			id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			linkurl VARCHAR(250),
			name VARCHAR(255),
			type VARCHAR(20)
		)";

		$temp->insert();
		unset($temp);

		$this->insert();
	}

	private function insert(){
		$sql = "
			INSERT INTO ".TB_LINK." (linkurl,name,type) VALUES ('".HOST."','Home','nav_item');
		";
		DB::executeQuery($sql);
		$sql = "
			INSERT INTO ".TB_LINK." (linkurl,name,type) VALUES ('".HOST."#aboutus"."','About us','nav_item');
		";
		DB::executeQuery($sql);
		$sql = "
			INSERT INTO ".TB_LINK." (linkurl,name,type) VALUES ('/login','Login','nav_item');
		";
		DB::executeQuery($sql);
	}
}

new seeder();
