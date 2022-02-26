<?php
include("include/config.php");
$material=$_POST['material'];

$row = mysqli_query($dbhandle,"INSERT INTO `tbl_material`(`material_name`) VALUES ('$material')");
    
    header('location:material-table.php');
?>