<?php
ob_start();
session_start();
include'inc/admindb.php';


  $id = $_POST['id'];
  $fare = $_POST['fare'];
  $other = $_POST['other'];


$query = "UPDATE assigned_orders SET 
fare = '$fare',
other = '$other'
WHERE id = '$id'";

                      $run = mysqli_query($con , $query);
	
	echo $run;
	//echo $_POST['aid'];


?>