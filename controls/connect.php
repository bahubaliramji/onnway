<?php
/*$con=mysql_connect("localhost","nationprathena","nathena@123");
if (!$con) 
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("nationpr_athena",$con);	*/
$con=mysql_connect("localhost","nationpr_athena","athena@123");
if (!$con) 
{
   die('Could not connect: ' . mysql_error());
}
mysql_select_db("nationpr_athena",$con); 
?>