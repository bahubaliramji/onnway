<?php
    $address ='Gaya'; // Google HQ
    
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key=AIzaSyBJCSjFGcsFkG5Zy7k3Ph6ArHv6EoWSxpk');
      
        $output= json_decode($geocode);
   
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;

  echo $latitude;
  echo $longitude;
/*
?>
<html>
    <head>
        
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data" action="up.php">
            <input type="file" name="imageUpload">
            <input type="submit" value="Upload">
        </form>
    </body>
</html>
<?php
    $files=scandir("uploads");
    $c=count($files);
    for($a=2; $a <$c ;$a++){
        ?>
        <a href="uploads/7895">dl.front</a><?php
    }*/
?>