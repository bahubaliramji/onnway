<?php $base_url = 'http://technobrix.in/newtbx/rahul-vehicle/TBXadmin';
 
$username = "rahul_vehical";
$password = "rahul_vehical@123";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("rahul_vehical",$dbhandle)
  or die("Could not select examples");
  
  ?>