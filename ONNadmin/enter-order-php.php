<?php
    include("include/config.php");
    $id=$_GET['id'];
    $driver_mobile_no=$_POST['driver_mobile_no'];
  //  $driver_name=$_POST['driver_name'];
    $material=$_POST['material'];
    $weight=$_POST['weight'];
    $sch_date=$_POST['sch_date'];
    $pickup_street=$_POST['pickup_street'];
    $pickup_pincode=$_POST['pickup_pincode'];
    $drop_street=$_POST['drop_street'];
    $drop_pincode=$_POST['drop_pincode'];
    $price=$_POST['price'];
    $driver_price=$_POST['driver_price'];
   echo $driver_mobile_no.$driver_name.$material.$weight.$sch_date.$pickup_street.$pickup_pincode.$drop_street.$drop_pincode.$price.$driver_price.$id;
    $row = mysqli_query($dbhandle,"UPDATE `full_truck_book_load` SET `material_type`='$material',`weight`='$weight',`sch_date`='$sch_date',`price`='$price',`driver_price`='$driver_price',`pickup_street`='$pickup_street',`pickup_pincode`='$pickup_pincode',`drop_street`='$drop_street',`drop_pincode`='$drop_pincode',`driver_mobile_no`='$driver_mobile_no',`type`='1' WHERE `id`='$id'");
  //  echo $row;
 //  header('location:manageorder.php');
?>