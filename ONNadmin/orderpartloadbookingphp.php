<?php
session_start();
include("include/config.php");
$id=$_GET['id'];
$query = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` FROM  WHERE id='$id'");
while($fetch=mysqli_fetch_array($query)){
   
$material_type=$_GET['material_type'];
$source=$fetch['source'];
$destination=$fetch['destination'];
$vehicle_type=$fetch['vehicle_type'];
$sch_date=$fetch['sch_date'];
} 
$weight=$_GET['weight'];
$length=$_GET['length'];
$width=$_GET['width'];
$height=$_GET['height'];
$div1=$_GET['div1'];
$div2=$_GET['div2'];
$div3=$_GET['div3'];
$div4=$_GET['div4'];
$div5=$_GET['div5'];
$div6=$_GET['div6'];
$div7=$_GET['div7'];
$div8=$_GET['div8'];
 
        
    $quer = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` WHERE id='$id'");
while($fetc=mysqli_fetch_array($quer)){
    echo $fetc['div1'];
    if($fetc['div1']==1){
        $div1=1;
    }
    if($fetc['div2']==1){
        $div2=1;
    }
    if($fetc['div3']==1){
        $div3=1;
    }
    if($fetc['div4']==1){
        $div4=1;
    }
    if($fetc['div5']==1){
        $div5=1;
    }
    if($fetc['div6']==1){
        $div6=1;
    }
    if($fetc['div7']==1){
        $div7=1;
    }
    if($fetc['div8']==1){
        $div8=1;
    }
    
}
    
echo $div1.$length.$weight.$width;
echo $height.$id;
$query8 = mysqli_query($dbhandle,"UPDATE `full_truck_book_load` SET `weight`='$weight',`length`='$length',`width`='$width',`height`='$height' WHERE `id`='$id'");
 header('location:editorder.php?id='.$id);
?>












