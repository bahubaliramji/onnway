<?php

//session start
session_start();
error_reporting(0);
//create Constants to store NoN repeated values
define('SITEURL', 'onnway/');
define('LOCALHOST', '');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'onnway');
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die('connection failed!'); 

// Database connection		
$db_select = mysqli_select_db($conn, DB_NAME) or die('DB name not selected!'); 
// Selecting Database