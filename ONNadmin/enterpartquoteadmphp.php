<?php
include("include/config.php");
$id=$_GET['id'];
$price=$_POST['price'];
$driver_price=$_POST['driver_price'];
$material=$_POST['material'];
$weight=$_POST['weight'];
$sch_date=$_POST['sch_date'];
$row = mysqli_query($dbhandle,"UPDATE `part_quote_details` SET `final_price`='$price',`driver_price`='$driver_price',`material_type`='$material',`weight`='$weight',`sch_date`='$sch_date' WHERE quote_id=$id");
  header('location:partload.php');
?>