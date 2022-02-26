<?php
include("include/config.php");
$mobile_no=$_GET['mobile_no'];
$doc_type=$_GET['doc_type'];

$row = mysqli_query($dbhandle,"UPDATE `driver_profile_tbl` SET `$doc_type`='2' WHERE `mobile_no`='$mobile_no'");
echo $mobile_no.$doc_type.$row;
header('location:verifydriver.php?mobile_no='.$mobile_no);