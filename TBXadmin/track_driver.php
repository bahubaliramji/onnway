<?php
session_start();

include ('include/config.php');

$type = $_SESSION['type'];
$sidepage = 'track';
$innersidepage = 'track';

if ($_SESSION['user_id'] == '')
{
	header('location:index.php');
} ?><html>	<head>		<title>Technobrix | Order Track</title>		<?php
include ('include/head.php');
 ?>	</head>	<body class="skin-blue sidebar-mini">		<div class="wrapper">		<?php
include ('include/header.php');
 ?>		<!-- Left side column. contains the logo and sidebar -->		<?php
include ('include/sidebar.php');
 ?>		<?php

 ?>		<!--<link href="plugins/iCheck/all.css" rel="stylesheet" type="text/css" />			<!-- Content Wrapper. Contains page content -->		<div class="content-wrapper">			<!-- Content Header (Page header) -->			<!-- Main content -->			<section class="content">				<div class="row">					<div class="col-xs-12">						<div class="box">							<div class="box-header with-border">	


 							<i class="fa fa-files-o"></i>								<h3 class="box-title">Order Track</h3>	


 														<!--<a href="employee_login_reg.php" style="float:right"><button  class="btn btn-info">+ Add Employee Login</button></a>-->							</div>


 						<!-- /.box-header -->							<div class="box-body box box-warning">								<div>									<ol class="breadcrumb">										<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>										<li class="active" style="color:#f0193f">Order Track</li>									</ol>




 														</div>
<?php 
	$select = mysqli_query($dbhandle, "select * from tbl_book_load where id='" . $_GET['id'] . "'");
	$data   = mysqli_fetch_array($select);

$driverdata = mysqli_fetch_array(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where mb_no='8269334349'"));

	?>

 <!--																					
<div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
    </div>

 <div id="map" style="    position: relative;
    overflow: hidden;
    width: 100%;
    height: 400px"></div>




    <script>

    

      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: <?php echo $driverdata['latitude'];?>, lng: <?php echo $driverdata['longitude'];?>}
        });
        directionsDisplay.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsDisplay);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });


         var locations1 = [
  

 ['Driver <?php echo $driverdata['name'];?>', <?php echo $driverdata['latitude'];?>, <?php echo $driverdata['longitude'];?>, 1],
];

var marker1;
   for (i = 0; i < locations1.length; i++) {  
      marker1 = new google.maps.Marker({
         icon: {
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        strokeColor: "green",
        scale: 3
    },
        position: new google.maps.LatLng(locations1[i][1], locations1[i][2]),
        map: map
      });


      google.maps.event.addListener(marker1, 'click', (function(marker1, i) {
        return function() {
          infowindow.setContent(locations1[i][0]);
          infowindow.open(map, marker1);
        }
      })(marker1, i));
    }
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var selectedMode = document.getElementById('mode').value;
        directionsService.route({
        origin: {lat: <?php echo $data['pick_lat'];?>, lng: <?php echo $data['pick_long'];?>},  // Haight.
         destination: {lat: <?php echo $data['drop_lat'];?>, lng: <?php echo $data['drop_lat'];?>},  // Ocean Beach.

         //   origin: {lat: 23.23, lng: 77.43},  // Haight.
       //   destination: {lat: 23.23, lng: 77.40},  // Ocean Beach.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
-->


 <div id="floating-panel" style="display: none;">
    <b>Start: </b>
    <select id="start">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>
    <b>End: </b>
    <select id="end">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>
    </div>

    <div id="map" style="width: 100%;height: 500px"></div>


    <?php 
 
    $driverdata = mysqli_fetch_array(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where vehicle_owner_id='".$_GET['id']."'"));

    ?>



    <script>

getLocation();




function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}



function showPosition(position) {
    var clatt = position.coords.latitude;
    var clongi = position.coords.longitude; 




 var iconBase = '<?php echo $baseurl;?>TBXadmin/';

        var icn = iconBase + 'icons8-container-truck-24.png';

   var locations = [
  
   ['<?php echo $driverdata['name'];?>',  <?php echo $driverdata['latitude'];?>, <?php echo $driverdata['longitude'];?>, 1],
  
 
];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng( <?php echo $driverdata['latitude'];?>,  <?php echo $driverdata['longitude'];?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
 
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
       /*  icon: {
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        strokeColor: "red",
        scale: 3
    },*/
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
         icon: icn,
        map: map
      });

      
var contentString = '<div class="contentinfo">'+
             ''+
            '<a class="seebtn" href=""><h4  class="firstHeading" style="color:#00417D;" ><?php echo $driverdata['name'];?></h4></a>'+
            '<div class="bodyinfo">'+
            ' </div></div></div>';


            
google.maps.event.addListener(infowindow, 'domready', function() {

 
   var iwOuter = $('.gm-style-iw');

   
   var iwBackground = iwOuter.prev();

 
   iwBackground.children(':nth-child(2)').css({'display' : 'none'});

   iwBackground.children(':nth-child(4)').css({'display' : 'none'});

});


/*marker.addListener('mouseout',function() {
    //infowindow.close();
    setTimeout(function(){  infowindow.close(); }, 3000);
});*/
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(contentString);
          setTimeout(function(){  infowindow.open(map, marker); }, 600);
          //infowindow.open(map, marker);
        }
      })(marker, i));
    }

 var locations1 = [
  

 ['My Location', clatt, clongi, 1],
];

/*
var marker1;
   for (i = 0; i < locations1.length; i++) {  
      marker1 = new google.maps.Marker({
         icon: {
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        strokeColor: "green",
        scale: 3
    },
        position: new google.maps.LatLng(locations1[i][1], locations1[i][2]),
        map: map
      });


      google.maps.event.addListener(marker1, 'click', (function(marker1, i) {
        return function() {
          infowindow.setContent(locations1[i][0]);
          infowindow.open(map, marker1);
        }
      })(marker1, i));
    }*/

}

    </script>


 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWXNTc_QfM-j_Y43CDAZY0X6jaGiwXgrw&libraries&callback=initMap">
    </script>
 





							</div>						</div>					</div>			</section>			</div>		</div>		<!-- ./wrapper -->		<!-- DATA TABES SCRIPT -->		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>		<script src="bootstrap/js/bootstrap.min.js"></script>		<script src="plugins/datatables/jquery.dataTables.min.js"></script>		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>		<!-- AdminLTE App -->		<script src="dist/js/app.min.js"></script>		<?php //include("web_files/footer.php");
 ?>		<!-- page script -->		<script type="text/javascript">

			  $(function () {

				$("#example1").DataTable();

				$('#example2').DataTable({

				  "paging": true,

				  "lengthChange": false,

				  "searching": false,

				  "ordering": true,

				  "info": true,

				  "autoWidth": false

				});

			  });

			</script>	</body></html><style>
	tr{
		text-align:center;
	}
	th{
		text-align:center;
	}
	
	</style>