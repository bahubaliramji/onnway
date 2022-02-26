<?php
include("include/config.php");
 $mobile_no=$_GET['mobile_no'];

 $row = mysqli_query($dbhandle,"DELETE FROM `driver_profile_tbl` WHERE mobile_no='$mobile_no'");
    
   header('location:truckdriver.php');
?>