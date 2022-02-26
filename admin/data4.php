<?php
ob_start();
session_start();
include'inc/admindb.php';


if(isset($_POST['id']))
{
	$query = "UPDATE assigned_orders SET paid = '".$_POST['pay']."' WHERE id = '".$_POST['id']."'";
                      $run = mysqli_query($con , $query);
	
	echo 'success';
	//echo $_POST['aid'];
}

?>