<?php
include("include/config.php");
$type=$_POST['type'];
$length=$_POST['length'];
$dimension=$_POST['dimension'];
$row = mysqli_query($dbhandle,"INSERT INTO `vehicle_list`(`vehicle_type`, `length`, `dimension`) VALUES ('$type','$length','$dimension')");
    
    header('location:vehicleadding.php');
?>