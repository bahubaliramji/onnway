<?php


   require('inc/db.php');

   $sid = $_GET['id'];

   $sql = "SELECT * FROM category
         WHERE location_id = '$sid' AND status = 'active'"; 


   $result = mysqli_query($con , $sql);


   $json = [];
   while($row = mysqli_fetch_array($result)){
        $json[$row['id']] = $row['name'];
   }


   echo json_encode($json);
?>