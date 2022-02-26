<?php
session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehiclealltruck';
 $get_latlon = mysqli_fetch_assoc(mysqli_query($dbhandle, "select * from driver_log where truck_id='".$_POST['id']."' order by id desc"));
mysqli_query($dbhandle, "delete  from driver_log where truck_id='".$_POST['id']."' and id!='".$get_latlon['id']."' order by id desc")
?>
         <div class="map-section">
		 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDOhWEH6qIYmon2vqRrbsOmSdS4w-LoAQ&callback=initMap">
    </script>
   <script type="text/javascript">
   var markers = [
    
            
    
            {
               "title": '',
               "lat": '<?php echo $get_latlon['lat'] ; ?>',
               "lng": '<?php echo $get_latlon['lon'] ; ?>'
           }
    

    
   ];
   </script>
   <script type="text/javascript">
 
       window.onload = function () {
           var mapOptions = {
               center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
               zoom: 10,
               mapTypeId: google.maps.MapTypeId.ROADMAP
           };
           var path = new google.maps.MVCArray();
           var service = new google.maps.DirectionsService();
 
           var infoWindow = new google.maps.InfoWindow();
           var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
           var poly = new google.maps.Polyline({ map: map, strokeColor: '#6EB3F7' });
           var lat_lng = new Array();
           for (i = 0; i < markers.length; i++) {
               var data = markers[i]
               var myLatlng = new google.maps.LatLng(data.lat, data.lng);
               lat_lng.push(myLatlng);
               var marker = new google.maps.Marker({
                   position: myLatlng,
                   map: map,
                   title: data.title
               });
               (function (marker, data) {
                   google.maps.event.addListener(marker, "click", function (e) {
                       infoWindow.setContent(data.description);
                       infoWindow.open(map, marker);
                   });
               })(marker, data);
           }
           for (var i = 0; i < lat_lng.length; i++) {
               if ((i + 1) < lat_lng.length) {
                   var src = lat_lng[i];
                   var des = lat_lng[i + 1];
                   path.push(src);
                   poly.setPath(path);
                   service.route({
                       origin: src,
                       destination: des,
                       travelMode: google.maps.DirectionsTravelMode.DRIVING
                   }, function (result, status) {
                       if (status == google.maps.DirectionsStatus.OK) {
                           for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                               path.push(result.routes[0].overview_path[i]);
                           }
                       }
                   });
               }
           }
       }
   </script>
  
		 
         <div id="dvMap" style="position: relative; overflow: hidden;    width: 630px;
    height: 716px;">
		             
         </div>
      </div>