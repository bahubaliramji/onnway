<?php
ob_start();
session_start();
include'inc/db.php';


if(isset($_POST['aid']))
{
	$query = "UPDATE orders SET status='".$_POST['aid2']."' WHERE id = '".$_POST['aid']."'";
                      $run = mysqli_query($con , $query);
	
	echo 'success';
	//echo $_POST['aid'];
}

?>