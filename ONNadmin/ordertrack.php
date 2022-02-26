<?php 	
	include("include/config.php");
	$id=$_GET['id'];
		$query = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` where id='$id'");
 while($fetch = mysqli_fetch_array($query)){
     ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Markers</title>
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {
          
        var myLatLng = {lat: <?php echo $fetch['lat']; ?>, lng: <?php echo $fetch['lng']; } ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'TRUCK LOCATION'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD5e-SJP_E8SDLOHYz79IR79pVy6YQOgg&callback=initMap">
    </script>
  </body>
</html>
