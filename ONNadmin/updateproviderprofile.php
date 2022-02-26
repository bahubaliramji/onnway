<?php
include("include/config.php");
$mobile_no=$_POST['mobile_no'];
$name=$_POST['name'];
$transport_name=$_POST['transport_name'];
$city=$_POST['city'];
 $row = mysqli_query($dbhandle,"UPDATE `provider_profile_tbl` SET `name`='$name',`transport_name`='$transport_name',`city`='$city' WHERE `mobile_no`=$mobile_no");

header('location:truckprovider.php');
?>