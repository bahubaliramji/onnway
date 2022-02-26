<?php session_start();
include('include/config.php');
$type = $_SESSION['type']; 
$sidepage = 'vehicle';
$innersidepage = 'vehiclealltruck';
if($_SESSION['user_id']==''){
	header('location:index.php');
}
 ?>
  <html>
<head>
  <title>Track Truck</title>
<?php include('include/head.php'); ?>
</head>
<body class="skin-blue sidebar-mini">
	  <div class="wrapper">
	<?php include('include/header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include('include/sidebar.php'); ?>
<?php
   $editid = $_GET['id'];
    $path = $base_url."../upload/vehicle_documents/";
    $select = mysqli_query($dbhandle, "select * from tbl_trucks where id='".$editid."'");
	$data = mysqli_fetch_array($select);	
	$owner_result = mysqli_fetch_array(mysqli_query($dbhandle, "SELECT * FROM tbl_vehicle_owner WHERE vehicle_owner_id = '".$data['vehicle_owner_id']."'"));
	
		?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">           
								<div class="box">
									<div class="box-header with-border">
										<i class="fa fa-edit" aria-hidden="true"></i><h3 class="box-title"> Vehicle Truck Info </h3>
										
									</div><!-- /.box-header -->

									  <div class="box-body box box-warning">
										<div>
                         <ol class="breadcrumb">
                           <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                            
							<li class="active" style="color:#f0193f">Vehicle Truck Info</li>
						 </ol>
						
						  
                      </div>
										<div id="general_info">
											<form method="post" action="#" enctype="multipart/form-data">
											<br><br>
											<div class="row">
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u>TRUCK INFORMATION :</u></label>		
												</div>
											</div>
										
									   <div class="row col-sm-5">
									     <div class="col-sm-5">
										    <label>Truck Reg. No.   :</label>
										 </div>
										 <div class="col-sm-7">
										   <?php echo $data['truck_reg_no'];?>
										   <?php if($data['truck_reg_file']!=""){?>&nbsp;&nbsp; 
									  <a href="<?php echo 	$path.$data['truck_reg_file'];?>" target="_blank">Download</a>	<?php }?>
										 </div>								  
									  </div>
<div class="col-sm-12">		</div>							  
									  <div class="row">
												<div class="col-sm-5">	
													<label style="font-size: 157%;"><u>Track Truck :</u></label>		
												</div>
											</div>
							<div class="row col-md-12" id="track_loca"></div>																							<div class="row col-md-12" id="track_loc">	
<?php $get_latlon = mysqli_fetch_assoc(mysqli_query($dbhandle, "select * from driver_log where truck_id='".$_GET['id']."' order by id desc"));
/* print_r($get_latlon); */

/* mysqli_query("delete  from driver_log where truck_id='".$_GET['id']."' and id!='".$get_latlon['id']."' order by id desc"); */
?><p>Last Status Updated on <?php echo $get_latlon['date']." - ".$get_latlon['time'];?> </p>
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

									  </div>		
									  

             			                    </div>






              <!--end student photo -->





									 </div>


								



										 
										</div>
									  </div>
									  
									  
									  
										</div><!--end of general info-->	

									</div>

								</div>

							

						</div>

					</div>

				</section>

			</div>
            <?php include("web_files/footer.php");?>
			<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
			<!-- Bootstrap 3.3.2 JS -->
			<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!-- AdminLTE App -->
			<script src="dist/js/app.min.js"></script>
			<script src="dist/js/demo.js"></script>





   		
			  
<style>
button#pro1 {
    margin-left: 178px;
}
.col-sm-1.cmstyle p {
    margin-left: -18px;
    margin-top: 7px;
}
.multiselect1 ul li {
    list-style: none;
    background: #4F6877;
    padding: 0 6px;
    margin-left: -40px;
    width: 220px;
    color: #fff;
    font-size: 17px;
}
.form-group {
    margin-bottom: 0px; 
}
.star{
	color: red;
}
.breadcrumb>li+li:before{
	    content: ">";
}
.multiselect1 ul li {
    list-style: none;
    background: #4F6877;
    padding: 0 6px;
    margin-left: -40px;
    width: 220px;
    color: #fff;
    font-size: 17px;
}
div#general_info .row {
    margin: 10px 0 10px 0;
}
.checkbox-inline{
	font-weight: 700;
}
.more-stop-style{
margin-left: 178px;
}
.button-route{
margin-top: 10px;
}
.form-control[readonly]{
	background-color:#fff !important;
}
#res1{
	margin-left: 10px;
}
.area-drop .from-control {
    width: 100%;
    height: 34px;
    border-radius: 4px;
    outline: none;
    border: none;
    border: 1px solid #d2d6de;
    padding-left: 18px;
}
#general_info{
	margin-top: -38px ;
}
span.cal1 {
    position: absolute;
    right: 15px;
    top: 0px;
    border: 1px solid #d2ded6;
    width: 38px;
    height: 34px;
    text-align: center;
    border-radius: 0 4px 4px 0;
    line-height: 34px;
}


button#s1 {
    width: 110px;
    margin-left: -14px;
}
.radiostyle {
    margin-left: 177px;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
    setInterval(function() {
		
	location.reload(); 
/* 		 var dataString = 'id=<?php echo $_GET['id'];?>';
        $.ajax
			({
				type: "POST",
				url: "get_location.php",
				data: dataString,
				cache: false,
				success: function(result)
				{
				
					$("#track_loca").html(result);
					
				} 
			}); */ 
    }, 12000);
});
</script>
