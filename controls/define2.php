<?php
define("base_url", "https://onnway.drsomnathraghuwanshi.com/");
define("admin_url", "https://onnway.drsomnathraghuwanshi.com/admin");

if(isset($_SESSION['user_email'])){
define("welcome", "Welcome ".$_SESSION['user_email']);
}else{
define("welcome", "Welcome to Rahul Vehicle ");
}
