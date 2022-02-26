<?php
include('include/config.php');
    $email = $_POST['email'];
  
	$password = $_POST['password'];
	$data_login = mysqli_query($dbhandle,"SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password'");
	
	if(mysqli_num_rows($data_login)==1){
	    session_start();
	    $_SESSION['email']=$email;
	    
	    header('location:dashboard.php');
	}
	else{
	   header('location:index.php?msg=1');
	}
?>