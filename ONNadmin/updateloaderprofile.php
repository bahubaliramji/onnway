<?php
include("include/config.php");
$mobile_no=$_POST['mobile_no'];
$name=$_POST['name'];
$transport_name=$_POST['type'];
$city=$_POST['city'];
$address=$_POST['address'];
$email=$_POST['email'];
 $row = mysqli_query($dbhandle,"UPDATE `loader_profile_tbl` SET `name`='$name',`type`='$transport_name',`city`='$city',`address`='$address',`email`='$email' WHERE `mobile_no`=$mobile_no");

header('location:loaderlogin.php');
?>