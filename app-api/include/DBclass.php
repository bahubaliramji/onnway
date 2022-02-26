<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'photo_order');

class DB_con {
	public $connection;
	function __construct(){
		$this->connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
		
		if ($this->connection->connect_error) die('Database error -> ' . $this->connection->connect_error);
		
	}
	function ret_obj(){
		return $this->connection;
	}
}
global $link;
$link = "http://localhost/portal/android_photo";
$cookie_name = 'Photo_order';
$cookie_time = (3600 * 24 * 30); // 30 days
?>