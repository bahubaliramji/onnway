<?php
define("base_url", "http://localhost/onnway/android/");
define("admin_url", "http://localhost/onnway/admin");

if(isset($_SESSION['user_email'])){
define("welcome", "Welcome ".$_SESSION['user_email']);
}else{
define("welcome", "Welcome to Rahul Vehicle ");
}
