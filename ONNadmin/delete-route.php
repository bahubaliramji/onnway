<?php
include("include/config.php");
$id=$_GET['id'];
$row = mysqli_query($dbhandle,"DELETE FROM `tbl_estimate` WHERE id='$id'");
    
    header('location:route-estimate.php');
?>