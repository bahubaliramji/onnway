<?php
    include("include/config.php");
    $id=$_GET['id'];
    $price=$_POST['price'];
    $material=$_POST['material'];
    $weight=$_POST['weight'];
    $sch_date=$_POST['sch_date'];
    $user_price=$_POST['user_price'];
    $mobile_no=$_POST['mobile_no'];
    echo $price.$mobile_no.$material.$sch_date.$weight.$user_price;
    $row = mysqli_query($dbhandle,"UPDATE `full_quote_details` SET `material_type`='$material',`weight`='$weight',`sch_date`='$sch_date',`final_price`='$user_price',`truck_mobile_no`='$mobile_no',`driver_prive`='$price' WHERE `quote_id`='$id'");
    header('location:fullload.php');
?>