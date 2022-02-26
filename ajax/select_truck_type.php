<?php
include("../TBXadmin/include/config.php");
$type =  $_POST['type'];
$result = mysqli_query($dbhandle, "SELECT `id`, `title` FROM `trucks` WHERE  `type` = '$type'");
$data1='<option value="">Select Truck</option>';
while ($data = mysqli_fetch_assoc($result)) {
    $data1 .= '<option value="'.$data['id'].'">'.$data['title'].'</option>';
// array_push($data1,$data);
// $
}
echo $data1;




?>