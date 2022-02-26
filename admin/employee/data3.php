<?php
ob_start();
session_start();
include'inc/db.php';


if(isset($_POST['aid']))
{
	$query = "DELETE FROM mytrucksprovider WHERE id = '".$_POST['aid']."'";
                      $run = mysqli_query($con , $query);
	
	echo 'success';
	//echo $_POST['aid'];
}

?>