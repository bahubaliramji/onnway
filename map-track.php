<?php
include("header.php");
include("sidebar.php");
if(isset($_GET['id']))
{
$msg=mysql_query("delete from consignments where id='".$_GET['id']."'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}



/**
* Author: CodexWorld
* Author URI: http://www.codexworld.com
* Function Name: getAddress()
* $latitude => Latitude.
* $longitude => Longitude.
* Return =>  Address of the given Latitude and longitude.
**/
function getAddress($latitude,$longitude){
    if(!empty($latitude) && !empty($longitude)){
        //Send request and receive json data by address
        $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 
        $output = json_decode($geocodeFromLatLong);
        $status = $output->status;
        //Get address from json data
        $address = ($status=="OK")?$output->results[1]->formatted_address:'';
        //Return address of the given latitude and longitude
        if(!empty($address)){
            return $address;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}

function getAddre($a,$b)
{
 
    if(!empty($a) && !empty($b)){
        //Send request and receive json data by address
       // $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 
	
		$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($a).",".trim($b)."&sensor=false";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geocodeFromLatLong = curl_exec($ch);
    curl_close($ch);
	$geocodeFromLatLong = rtrim($geocodeFromLatLong, "\0");

        
		$output = json_decode($geocodeFromLatLong);
        $status = $output->status;
        //Get address from json data
		if($status=="OK")
		{
		  echo $address= $output->results[1]->formatted_address;
		}
		else
		{
		 $address="";
		}
       // $address = ($status=="OK")?$output->results[1]->formatted_address:'';
        //Return address of the given latitude and longitude
        if(!empty($address)){
            return $address;
        }else{
            return false;
        }
    }else{
        return false;   
    }

	
	
}

/**
 * Use getAddress() function like the following.
 */
?>
  
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Consignment</h3>
				<div class="row">
				
                  <div class="col-md-12">
				   <div class="content-panel">
                           <form class="form-horizontal style-form" name="form1" method="post" action="">
                           <p style="color:#F00"></p>
                        
                          
                              
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Branch</label>
                              <div class="col-sm-10">
								  <select class="form-control" name="branch" id="branch" required onChange="getDriver(this.value)">
								  <option value="">Select Branch</option>
								  <?php
								  $sql=mysqli_query($dbhandle, "select * from branch_pincodes_latest GROUP BY(branch)");
								  while($fetch=mysqli_fetch_array($sql)){
								  ?>
								  <option value="<?php echo $fetch["branch"]; ?>"><?php echo $fetch["branch"]; ?></option>
								  <?php } ?>
								  </select>
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Driver</label>
                              <div class="col-sm-10">
								  <select class="form-control" name="driver" id="driver" required >
								  <option value="">Select Driver</option>
					
								  </select>
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                              <div class="col-sm-10">
								 <input class="form-control" type="text" id="mapdate" name="mapdate"  reqquired />
                              </div>
                          </div>
						  
						  
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Search" class="btn btn-theme"></div>
                          </form>
                      </div>
				  </div>
	               <div class="clearfix"></div>   
                  <div class="col-md-12">
				   <?php
					     if(isset($_POST["Submit"]))
							  {
							    extract($_POST);
								$mapdate=date("Y-m-d", strtotime($mapdate));
								
					$getdrs1=mysqli_query($dbhandle, "select * from tbl_log where username='$driver' and created_date BETWEEN '$mapdate' AND '$mapdate 23:59:59'");
					$fetch1=mysqli_fetch_array($getdrs1);
					$lat1=$fetch1["latitude"];
					$long1=$fetch1["longitude"];
					$getdrs2=mysqli_query($dbhandle, "select * from tbl_log where username='$driver' and created_date='$mapdate' orderby id DESC");
					$fetch2=mysqli_fetch_array($getdrs2);
					$lat2=$fetch2["latitude"];
					$long2=$fetch2["longitude"];
					
					
					/***********Distance matrix***********/
					$getdrsD1=mysqli_query($dbhandle, "select * from tbl_log where username='$driver' and created_date BETWEEN '$mapdate' AND '$mapdate 23:59:59'orderby id ASC limit 1");
					$fetchD1=mysqli_fetch_array($getdrsD1);
					print_r($fetchD1) ;
					$latD1=$fetchD1["latitude"];
					$longD1=$fetchD1["longitude"];
					$getdrsD2=mysqli_query($dbhandle, "select * from tbl_log where username='$driver' and created_date BETWEEN '$mapdate' AND '$mapdate 23:59:59' orderby id DESC limit 1");
					$fetchD2=mysqli_fetch_array($getdrsD2);
					$latD2=$fetchD2["latitude"];
					$longD2=$fetchD2["longitude"];
			
					echo  $url = "https://maps.googleapis.com/maps/api/distancematrix/xml?units=metrix&origins=$latD1,$lonD1&destinations=$latD2,$lonD2&key=AIzaSyBHB5GcUC772610OcgShgcCSYSmsm6N6PY";
					$ch = curl_init();
								$URI = $url;
								curl_setopt($ch, CURLOPT_URL, $URI);
								curl_setopt($ch, CURLOPT_HEADER, 0);
								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								
								// Make request
								$data = curl_exec($ch);
								curl_close($ch); 
														  
							  $xml = simplexml_load_string($data);
							  $json = json_encode($xml);
							  $array = json_decode($json,TRUE);
							 
							 echo  $distance = ceil($array['row']['element']['distance']['value']/1000) ;
							 echo "jjj" ;
					/**********************/
					
					?>
					 
						
                      <div class="content-panel table-responsive">
					  
					  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var markers = [
	<?php while($fetch1=mysqli_fetch_array($getdrs1)){ 
					$lat1=$fetch1["latitude"];
					$long1=$fetch1["longitude"];
					 ?>
            {
                "title": '',
                "lat": '<?php echo $lat1 ; ?>',
                "lng": '<?php echo $long1 ; ?>',
                "description": '<?php echo getAddre($fetch1['latitude'],$fetch1['longitude']) ; ?>'
            }
        ,
	<?php }  ?>
				
        
    ];
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var lat_lng = new Array();
        var latlngbounds = new google.maps.LatLngBounds();
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
            latlngbounds.extend(marker.position);
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
 
        //***********ROUTING****************//
 
        //Initialize the Path Array
        var path = new google.maps.MVCArray();
 
        //Initialize the Direction Service
        var service = new google.maps.DirectionsService();
 
        //Set the Path Stroke Color
        var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });
 
        //Loop and Draw Path Route between the Points on MAP
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
<div id="dvMap" style="width: 1100px; height: 600px">
					  
                      </div>
                  </div>
				  
				  <?php 	  }
					   ?>
				 
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
	
	<!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
	<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
  <script>
     /*$( document ).ready(function() {
          $('select.styled').customSelect();
	  });
	  */
	  
	  $(document).ready(function() {
   /* $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );*/
	 $('#example').DataTable({
	  dom: 'lBfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
	 
	 });
} );


function getDriver(str)
{
 
 
               $.ajax({
                type:'POST',
                url:'getDriver.php',
                data:'branch='+str,
                success:function(html){
				//alert(html)
                 $("#driver").html(html) ; 
				 
                }
            }); 
}
  </script>
  
  
  
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
        //<![CDATA[
          
      /*  var map;
          
        // Ban Jelacic Square - Center of Zagreb, Croatia
        var center = new google.maps.LatLng(45.812897, 15.97706);
          
        function init() {
              
            var mapOptions = {
                zoom: 13,
                center: center,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
              
            map = new google.maps.Map(document.getElementById("map"), mapOptions);
              
            var marker = new google.maps.Marker({
                map: map, 
                position: center,
            });
        }
        //]]>
		google.maps.event.addDomListener(window, 'load', init);*/
		
		
       function makeRequest(url, callback) {
	   //alert(url)
    var request;
  /*  if (window.XMLHttpRequest) {
        request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
    }
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
		
		   alert(request);
            callback(request);
        }
    }
    request.open("GET", url, true);
    request.send();*/
	
	var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	 var data = JSON.parse(this.responseText);
	 alert(this.responseText);
	callback(xhttp);
       
          
     
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
  
  
  
 // $("#create_order").hide();
	//var shipping_address_details = $("#shipping_address_details").val();
	/*$.post( url,
		{
			shipping_address_details: ""
		},
		function(data){
			if(data.returnValue !=''){
				 //$('#shipping_fname').val(data.name);
				//alert(data);
				}
			
			}, "json")*/
}



/*var map;
  
// Ban Jelacic Square - City Center
var center = new google.maps.LatLng(45.812897, 15.97706);
  
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
  
function init() {
  
    var mapOptions = {
      zoom: 13,
      center: center,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
      
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
      
    makeRequest('getLocation.php', function(data) {
              
        var data = JSON.parse(data.responseText);
          alert(data);
        for (var i = 0; i < data.length; i++) {
		 //alert(data[i]);
           displayLocation(data[i]);
        }
    });
}

//google.maps.event.addDomListener(window, 'load', init);


function displayLocation(location) {
          
    var content =   '<div class="infoWindow"><strong>'  + location.name + '</strong>'
                    + '<br/>'     + location.address
                    + '<br/>'     + location.address + '</div>';
      
    if (parseInt(location.lat) == 0) {
        geocoder.geocode( { 'address': location.address }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                  
                var marker = new google.maps.Marker({
                    map: map, 
                    position: results[0].geometry.location,
                    title: location.name
                });
                  
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                });
            }
        });
    } else {
        var position = new google.maps.LatLng(parseFloat(location.lat), parseFloat(location.lon));
        var marker = new google.maps.Marker({
            map: map, 
            position: position,
            title: location.name
        });
          
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(content);
            infowindow.open(map,marker);
        });
    }
}

google.maps.event.addDomListener(window, 'load', init);*/
 /*$(document).ready(function() {
 
 init();
 
 });*/

        </script>
		
		<link href="assets/css/dcalendar.picker.css" rel="stylesheet" type="text/css">
	<script src="assets/js/dcalendar.picker.js"></script>
    <script>
	 $(document).ready(function() {
$('#mapdate').dcalendarpicker({

  // default: mm/dd/yyyy
  format: 'dd-mm-yyyy'
  
});
});
</script>

  </body>
</html>
