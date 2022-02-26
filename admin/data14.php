<?php
ob_start();
session_start();
include'inc/admindb.php';

$status = $_POST['status'];

if(isset($_POST['aid']))
{
	$query = "UPDATE documents SET status = '$status' WHERE id = '".$_POST['aid']."'";
                      $run = mysqli_query($con , $query);
	
	echo 'success';
	//echo $_POST['aid'];
}

?>