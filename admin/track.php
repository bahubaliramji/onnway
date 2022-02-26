<!DOCTYPE html>
<?php

$slat = $_GET['slat'];
$slng = $_GET['slng'];
$dlat = $_GET['dlat'];
$dlng = $_GET['dlng'];

?>

<html>
  <head>
    <title>Track Order</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXQZx4qVICTJWyKTXO0Ji28GZjD4Pvavg&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      "use strict";

      let map;

      function initMap() {
  var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;

    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        
        map = new google.maps.Map(document.getElementById('map'));
        directionsDisplay.setMap(map);
        
        var start = new google.maps.LatLng(<?= $slat; ?>, <?= $slng; ?>);
        //var end = new google.maps.LatLng(38.334818, -181.884886);
        var end = new google.maps.LatLng(<?= $dlat; ?>, <?= $dlng; ?>);
        /*
var startMarker = new google.maps.Marker({
            position: start,
            map: map,
            draggable: true
        });
        var endMarker = new google.maps.Marker({
            position: end,
            map: map,
            draggable: true
        });
*/
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap(map);
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
        });
        
    }

    google.maps.event.addDomListener(window, 'load', initialize);
}
    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>