<?php 	session_start();
		//error_reporting(0);
		ob_start();
 include("controls/define.php"); 
 include("TBXadmin/include/config.php"); 
  $url_gm='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  
   /* $queryP = $objT->getPage(4);
	$rowsP=mysql_fetch_array($queryP);
	$page_title = $rowsP['title'];
	$seo_keyword = $rowsP['keyword'];
	$seo_content = $rowsP['description']; */
	
	if(isset($_POST['submitt'])){
	
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $vehicletype = $_POST["vehicletype"];
    $materialtype = $_POST["materialtype"];
    $weight = $_POST["weight"];
    $noofvehicle = $_POST["no_of_vehicle"];
    $scheduled_date = $_POST["scheduled_date"];
    $scheduled_time = $_POST["scheduled_time"];
	
	

////////////////////////////////////////////

$queryS = mysql_query("select * from tbl_city where id= '$source'");
$dataS = mysql_fetch_array($queryS);
    
$queryD = mysql_query("select * from tbl_city where id= '$destination'");
$dataD = mysql_fetch_array($queryD);

 $queryV = mysql_query("select * from vehicle_list where id= '$vehicletype'");
$dataV = mysql_fetch_array($queryV);

 $price_km = $dataV['price_km'] ;


        $city_category = $dataS['category_id'];
        $lat1 = $dataS['latitude'];
        $lon1 = $dataS['longitude'];
        $city_categoryy = $dataD['category_id'];
        $lat2 = $dataD['latitude'];
        $lon2 = $dataD['longitude'];
		
		$source_name = $dataS["city_name"];
    $destination_name = $dataD["city_name"];


 /*echo $distance = ceil((3958*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180)*1.60934); */
 
 echo $url = "https://maps.googleapis.com/maps/api/distancematrix/xml?units=metrix&origins=$source_name,IN&destinations=$destination_name,IN&key=AIzaSyBHB5GcUC772610OcgShgcCSYSmsm6N6PY";
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
							 
							  $distance = ceil($array['row']['element']['distance']['value']/1000) ;
	

  $actualPrice = $noofvehicle*$distance*$price_km;  


   /////////////////////////////////////////////////////////////

   
 if($city_category=='1' && $city_categoryy=='1'){


$price= $actualPrice ;


}else if($city_category=='1' && $city_categoryy=='2'){
	
	$price= $actualPrice +(10/100*$actualPrice);
	
}else if($city_category=='1' && $city_categoryy=='3'){
	
	$price= $actualPrice +(30/100*$actualPrice);
	
	
}elseif($city_category=='1' && $city_categoryy=='4'){
	$price= $actualPrice +(40/100*$actualPrice);

}
elseif($city_category=='2' && $city_categoryy=='1'){


$price= $actualPrice ;


}else if($city_category=='2' && $city_categoryy=='2'){
	
	$price= $actualPrice +(10/100*$actualPrice);
	
}else if($city_category=='2' && $city_categoryy=='3'){
	
	$price= $actualPrice +(30/100*$actualPrice);
	
	
}elseif($city_category=='2' && $city_categoryy=='4'){
	$price= $actualPrice +(40/100*$actualPrice);

}elseif($city_category=='3' && $city_categoryy=='1'){


$price= $actualPrice ;


}else if($city_category=='3' && $city_categoryy=='2'){
	
	$price= $actualPrice +(10/100*$actualPrice);
	
}else if($city_category=='3' && $city_categoryy=='3'){
	
	$price= $actualPrice +(30/100*$actualPrice);
	
	
}elseif($city_category=='3' && $city_categoryy=='4'){
	$price= $actualPrice +(40/100*$actualPrice);

}elseif($city_category=='4' && $city_categoryy=='1'){


$price= $actualPrice ;


}else if($city_category=='4' && $city_categoryy=='2'){
	
	$price= $actualPrice +(10/100*$actualPrice);
	
}else if($city_category=='4' && $city_categoryy=='3'){
	
	$price= $actualPrice +(30/100*$actualPrice);
	
	
}elseif($city_category=='4' && $city_categoryy=='4'){
	$price= $actualPrice +(40/100*$actualPrice);

}




	$_SESSION['source'] = $_POST["source"];
	$_SESSION['source_name'] = $dataS["city_name"];
    $_SESSION['destination'] = $_POST["destination"];
    $_SESSION['destination_name'] = $dataD["city_name"];
    $_SESSION['vehicletype'] = $_POST["vehicletype"];
    $_SESSION['materialtype'] = $_POST["materialtype"];
    $_SESSION['weight'] = $_POST["weight"];
    $_SESSION['noofvehicle'] = $_POST["no_of_vehicle"];
    $_SESSION['scheduled_date'] = $_POST["scheduled_date"];
    $_SESSION['scheduled_time'] = $_POST["scheduled_time"];
	
	 $_SESSION['lat1'] = $dataS['latitude'];
     $_SESSION['lon1'] = $dataS['longitude'];
     $_SESSION['lat2']= $dataD['latitude'];
     $_SESSION['lon2'] = $dataD['longitude'];
     $_SESSION['distance'] = $distance ;
    $_SESSION['actualPrice'] = $actualPrice;
    $_SESSION['price_km'] = $price_km ;
    $_SESSION['price'] = $price;
	
	/* */
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("INSERT INTO `tbl_post_load_enq` (`id`, `user_id`,  `sourse`, `destination`, `vihicle_type`, `material_type`, `weight`, `qty`, `schedule_date`, `scheduled_time`,`status`) VALUES (NULL, '".$user_id."', '".$_SESSION['source_name']."', '".$_SESSION['destination_name']."', '".$_SESSION['vehicletype']."', '".$_SESSION['materialtype']."', '".$_SESSION['weight']."', '".$_SESSION['noofvehicle']."', '".$_SESSION['scheduled_date']."', '".$_SESSION['scheduled_time']."','1')") ;
	/**/
  
  header('Location: check-fare.php');
  
}

	$page_title = "Rahul Vehicle";
	$seo_keyword = "Rahul Vehicle";
	$seo_content = "Rahul Vehicle";
	
 include("header.php");
 include("header-bottom.php");

 ?>
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--end of top header bottom-->
<div class="banner-sec">
	<div class="container">
		<div class="col-md-12 banner-inner-content">
			<h2>TRANSPORT<br>EVERYWHERE</h2>
			<ul>
				<li>100% guarantee safe delivery</li>
				<li>with over 30 highly modernized</li>
				<li>delivery vehicles , to local as international goals.</li>
			</ul>

		</div>
		<?php if(!isset($_SESSION['vehicle_id']) && $_SESSION['vehicle_id']==""){?>
		<form action="" method="post">
		<div class="col-md-12 banner-inner-post ">
		<button type="button" class="post-tab-style">POST FULL LOAD NOW</button><br>
			<span class="select-tab">
				<select name="source" id="cf_source" required>

					<option value="">Source</option>
					 <?php 
                                 $row = mysql_query("select * from tbl_city order by city_name");

	                               while($fetch = mysql_fetch_array($row)){

									 ?>
					<!--<option selected>Enter Your Source</option>-->
					<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
										<?php } ?>
				</select>
			</span class="select-tab">
			<span class="select-tab">
				<select name="destination" id="cf_destination" required>
					<option value="">Destination</option>
					 <?php 
                                 $row = mysql_query("select * from tbl_city order by city_name ");

	                               while($fetch = mysql_fetch_array($row)){

									 ?>
					<!--<option selected>Enter Your Source</option>-->
					<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
										<?php } ?>
					<!--<option selected>Choose Destination</option>-->
				</select>
			</span>
			<span class="select-tab">
				<select name="vehicletype" id="cf_vehicletype" required >
					<option value="">Vehicle Type</option>
					 <?php 
                                 $roww = mysql_query("select vehicle_category,id from tbl_trucktype");
									while($fetchh = mysql_fetch_array($roww)){
									?>
							<optgroup label="<?php echo $fetchh['vehicle_category'];?>">
							<?php $rowtruck = mysql_query("select * from vehicle_list where status = 1 and vehicle_type='".$fetchh['id']."' order by length asc ");
									while($fetchhh = mysql_fetch_array($rowtruck)){
										if($fetchh['id']==2){
											
										?>
											<option value="<?php echo $fetchhh['id'];?>"><img src="upload/vechile_image/<?php echo $fetchhh['pimage'];?>"><?php if($fetchhh['sub_type']=='1'){ echo "Flat Bed - ";} if($fetchhh['sub_type']=='2'){ echo "Semi Bed - ";} echo $fetchhh['length'];?> MT /<?php echo $fetchhh['dimension'];?></option>
								<?php	}else{?>
											<option value="<?php echo $fetchhh['id'];?>"><img src="upload/vechile_image/<?php echo $fetchhh['pimage'];?>"><?php echo $fetchhh['length'];?> MT /<?php echo $fetchhh['dimension'];?></option>
							<?php	
										}
									} ?>
							</optgroup>
								
						<?php } ?>
					
				</select>
			</span>

			<span class="select-tab">
				<select name="materialtype" id="cf_materialtype" required>
					<option value="">Material Type</option>
					 <?php 
                                 $rowww = mysql_query("select * from tbl_material");

	                               while($fetchhh = mysql_fetch_array($rowww)){

									 ?>
					
					<option value="<?php echo $fetchhh['material_name'];?>"><?php echo $fetchhh['material_name'];?></option>
										<?php } ?>
					
				</select>
			</span>
			
		</div>

		<div class="col-md-12 banner-inner-post">
			
			<span class="select-tab">
				
				
				 <input id="vecweight" required Placeholder="Weight in Ton" type="text" name="weight" value="" >
										 

			</span class="select-tab">
			
			
			<span class="select-tab">
				<input type="text" name="scheduled_date" required placeholder="Select Scheduled Date" id="datepicker">
			</span>
			
			<span class="select-tab">
			<input type="hidden" name="no_of_vehicle" value="1">
				<select name="scheduled_time" id="scheduled_time"  required >
					 <option value="" id="defaultOpen" class="option-padd">Select Scheduled Time </option>
										 <option value="12AM-3AM"> 12AM - 3AM</option>
										 <option value="3AM-6AM"> 3AM - 6AM</option>
										 <option value="6AM-9AM"> 6AM - 9AM</option>
										 <option value="9AM-12PM"> 9AM - 12PM</option>
										 <option value="12PM-3PM"> 12PM - 3PM</option>
										 <option value="3PM-6PM"> 3PM - 6PM</option>
										 <option value="6PM-9PM"> 6PM - 9PM</option>
										 <option value="9PM-12AM"> 9PM - 12AM</option>
										
										 
				</select>
			</span>
 
			<span>
			
				<?php  if($_SESSION['user_id']==''){ ?>
		<a data-toggle="modal" data-target="#myModal">	<button type="submit" name="submitt" class="check-fare-tab-style"><span style="font-size: 19px;">GET FARE</strong></button></a>
		<?php }else{ ?>
				 <button type="submit" name="submitt" class="check-fare-tab-style"><span style="font-size: 19px;">GET FARE</span></button> 
				 <?php  }  ?>
			</span>
		</div>
	</form><?php }?>
	</div>
</div>
<!--End of banner section-->
<section class="about-us-section">
	<div class="container">
		<div class="col-md-5">
			<img src="images/about-us-truck.png">
			</div>
			<div class="col-md-7">
			<div class="about-content-section">
				<h5>LITTLE ABOUT US</h5>
				
                 <p>Onnway.com is creating an online open market platform for freight where our loader, as well as Vehicle Provider, can connect easily. We are working out on some of the major issues in the regions of locating costs, optimizing route, on demand availability, tracking during transit and timely delivery.<br>
	With our matchless technology incorporated platform, we are devoted to making certain that the right loader gets coordinated with the right vehicle provider that too at the exact price.
</p>
                 <h4><a href="about-us.php">READ MORE</a></h4>
			</div>
		</div>
	</div>
</section>
<!--End of about-us section-->
<section class="why-choose-us-section">
	<div class="container">
		<div class="col-md-12">
			<h2>WHY <span class="choose-style"> CHOOSE US</span></h2>
			<p>Onnway.com is inspiring shipment by forming it a flawless experience for both loaders as well as fleet operators. We create the procedure of getting trucks at the most excellent price and tracking of the consignments trouble-free for shippers. We also assist fleet operators in ascertaining best use and efficient organization of their fleet.</p>
		</div>
        <div class="col-md-12 zero-padding">
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-booking.png">
		<h3>Simple Booking Process</h3>
		 <p>Our booking process is very simple without any cumbersome procedures. You can do it within as little time as possible. </p>
		</div>
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-instant-truck.png">
		<h3>Instant Availability of trucks</h3>
		 <p>We will check the current availability of trucks at your location and assign you a truck within few minutes and confirm.</p>
		</div>
        </div>
        <div class="col-md-12 zero-padding">
         <div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-hassle-free.png">
		<h3>Hassle-Free Process</h3>
		 <p>Our process of booking, paying etc is very simple. You need not go through any kind of hassle process when you do business with us.</p>
		</div>
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-track.png">
		<h3>Vehicle Track and Trace support</h3>
		 <p>You can always be in contact with your driver simultaneously you can also get real-time goods tracking and tracing support from us.</p>
		</div>
        </div>
        <div class="col-md-12 zero-padding">
        <div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-reasonable-price.png">
		<h3>Reasonable and Competitive price</h3>
		 <p>Get immediate prices for your bookings and we assure you that we will provide you with the best and most competitive rates. </p>
		</div>
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-paymet-mode.png">
		<h3>Simple and Easy payment Mode</h3>
		 <p>Our payment mode is as simple and easy as it can be. Not much of your time or effort will be taken while you make the payment.</p>
		</div>
        </div>
        <div class="col-md-12 zero-padding">
         <div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-24x7.png">
		<h3>Anytime Call support 24x7</h3>

		 <p class="dedi-style">You can call us at any time when you feel that you need our support. We are available for you throughout.</p>
         
		</div>
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/i-network.png">
		<h3>Largest Network of vehicle</h3>
		 <p>We possess the largest network of Fleet owners and vehicles and our network throughout the country is very wide and hence it lets Onnway.com the one-stop solution for our client needs.</p>
		</div>
        </div>
	</div>
</section>
<!--end of why choose us section-->
<section class="how-it-works-section">
	<div class="container">
		<div class="col-md-12">
			<h2>HOW <span class="choose-style"> IT WORKS</span></h2>
		</div>
     
		<div class="col-md-3">
		<div class="col-md-12 how-it-works-inner">
		 <img src="images/i-post-load.png" class="active">
		<h3>Post a Load <br>in Seconds</h3>
		 <p>Now you can book a vehicle in as little as 60 seconds with just a few clicks via Mobile App or our Website.</p>
        </div>
        <div class="red-arrow"><img src="images/arrow.png"></div>
		</div>
        <div class="col-md-3">
        <div class="col-md-12 how-it-works-inner two1">
		 <img src="images/i-confirm-load.png">
		<h3>Get Instant Price & Confirm your Load</h3>
		 <p>Get the immediate price of the Trucks for your consignments and we will make certain that it is as low as it can possibly be. Once ok you can also immediately confirm your load.</p>
         </div>
         <div class="red-arrow"><img src="images/arrow.png"></div>
		</div>
        <div class="col-md-3">
		<div class="col-md-12 how-it-works-inner three1">
		 <img src="images/i-instant-truck-available.png">
		<h3>Get Instant availability of vehicle</h3>
		 <p>We will check the current availability of trucks at your location and assign you a truck within few minutes and confirm your order.</p>
         </div>
         <div class="red-arrow"><img src="images/arrow.png"></div>
		</div>
     
		
        <div class="col-md-3">
		<div class="col-md-12 how-it-works-inner four">
		 <img src="images/i-support.png">
		<h3>Updates, Tracking & support (through Website/SMS / Email / Call)</h3>
		 <p>You can now trace and track your shipments anytime along the path till the consignment reach its destination.</p>
         </div>
         
		</div>

	</div>
</section>
<!--end of how it works-->
<section class="content-section">
	
		<div class="container-fluid zero-padding">
			<div class="col-md-6 testimonial-black">


			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner testimonial-text" role="listbox">
    <div class="item active">
       <div class="col-md-12 text-center">
				   	   <h4> WHAT PEOPLE SAY </h4>
				   	   <h2> TESTIMONIALS </h2>
				   	   <span class="border-style"> <img src="images/heading-border.png"> </span> <br>
				   	   <span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
				   	   <p>Thanks to Onnway.com and because of them a truck can be booked without any hassle. We were initially in two minds as to approach this company or not. But once we got in touch with them we found that their online booking arrangement to get a truck on demand is a very stress-free procedure.<h3>Ganesh cons. and co.</h3>
					   

. </p>
				   </div>
    </div>
    <div class="item">
       <div class="col-md-12 text-center">
				   	   <h4> WHAT PEOPLE SAY </h4>
				   	   <h2> TESTIMONIALS </h2>
				   	   <span class="border-style"> <img src="images/heading-border.png"> </span> <br>
				   	   <span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
				   	   <p> Using Onnway.com to move our consignments turned out to be one of the most excellent experiences for us. Their expertness plus customer-centric approach to the services is what makes them stand apart from other such transportation services. Their instantaneous news’s about the goods plus professional operators provide us peace of mind, however significant the consignment.
<h3>Sarthak Infra Pvt. Ltd.</h3>
</p>
				   </div>
    </div>
        <div class="item">
       <div class="col-md-12 text-center">
				   	   <h4> WHAT PEOPLE SAY </h4>
				   	   <h2> TESTIMONIALS </h2>
				   	   <span class="border-style"> <img src="images/heading-border.png"> </span> <br>
				   	   <span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
				   	   <p>They are well prepared to handle any type of consignment with their highly developed technology. We could also easily get real-time information about the spot of our cargoes, and their drivers plus operators are totally confirmed. They also provide the most excellent prices for their highest professional services.
<h3>Asthvinyak Co.</h3>
 </p>
				   </div>
    </div>
        <div class="item">
       <div class="col-md-12 text-center">
				   	   <h4> WHAT PEOPLE SAY </h4>
				   	   <h2> TESTIMONIALS </h2>
				   	   <span class="border-style"> <img src="images/heading-border.png"> </span> <br>
				   	   <span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
				   	   <p>Onnway.com is one of the most dependable trucking services we have met. We totally believe them with any goods to be moved. Their customer backing is at all times accessible to answer any questions. And, they as well keep us informed about our cargo and have always assured a protected transportation of our commodities.
<h3>Solanki Trans Services</h3>
 </p>
				   </div>
    </div>
        <div class="item">
       <div class="col-md-12 text-center">
				   	   <h4> WHAT PEOPLE SAY </h4>
				   	   <h2> TESTIMONIALS </h2>
				   	   <span class="border-style"> <img src="images/heading-border.png"> </span> <br>
				   	   <span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
				   	   <p>We are fully content with the services we got. Their online booking arrangement made it trouble-free for us to acquire the vehicle of our option, and at the most practical rates. Their vehicle operators are well trained and hence are able to deliver every cargo safely, and their customer support is forever ready to help. Highly recommended company
<h3>Sarthak Industries</h3>
 </p>
				   </div>
    </div>
        <div class="item">
       <div class="col-md-12 text-center">
				   	   <h4> WHAT PEOPLE SAY </h4>
				   	   <h2> TESTIMONIALS </h2>
				   	   <span class="border-style"> <img src="images/heading-border.png"> </span> <br>
				   	   <span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
				   	   <p>Onnway.com has established to be a very trustworthy company. This is evident from their outstanding communication and sense of importance on every consignment. Their dispatchers plus customer service have demonstrated to be very dependable and customer oriented. 
<h3>Shyam , Driver</h3>
</p>
				   </div>
    </div>

  </div>

  <!-- Controls -->
  <!--
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  -->
</div>

				 

			</div>

				<div class="col-md-6 current-update-white">
				    <div class="col-md-12">
				    	<h3> CURRENT <span class="update-style"> UPDATES </span> </h3>
				    	<ul>
				    		 <li>E-Way Bill is an electronically generated document. which is required to be generated for the movement of goods of more Rs. 50,000 from one place to another.</li>
				    		 <li>In case an e-way bill has been generated  but the goods are either not transported or are not transported as per the details furnished in the e-way bill, the e-way bill shall be cancelled The cancellation can be done either electronically on the GST Website directly or through a GST Facilitation Centre within 24 hours of the generation of the e-way bill.</li>
				    		 <li class="text11">An e-way bill cannot be cancelled if it has been verified in transit.</li>
							 <li>The e-way bill generated in any state shall be valid in every state and union territory of India.</li>
							 
				    	</ul>
				    </div>
				</div>
			</div>
		
	
</section>
<!--end of content section-->

<!--START OF LOGIN SECTION-->

<!--END OF LOGIN SECTION-->
<?php include("footer.php"); ?>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script> 
		
        <script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){  
			
				jQuery("#cf_source").validate({
				
                    expression: "if (VAL) return true; else return false;",
					
                    message: "Please Select Source"

                });
				
				jQuery("#cf_destination").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Destination"

                });
				
				jQuery("#cf_vehicletype").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Vehicle Type"

                });
				
				jQuery("#cf_materialtype").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Material Type"

                });
				
				jQuery("#scheduled_time").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Time"

                });
				


			/* jQuery("#vecweight").validate({

                    expression: "if ( VAL.match(/^[0-9]*$/)) return true; else return false;",

                    message: "Vehicle Weight in Only Number Format"

                }); */
				
			jQuery("#loader_type").validate({
                    expression: "if (VAL != '') return true; else return false;",
					
                    message: "Please select a Type"
					
                });
				
			jQuery("#name").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Your Name"

                });

        

			jQuery("#password").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Enter Password Here"

                });

			jQuery("#mobile").validate({

                    expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",

                    message: "Your Phone Number in correct format"

                });

			jQuery("#email").validate({

                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",

                    message: "Please enter a valid Email ID"

                });

      

			jQuery("#emaill").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter a valid Email/Phone No"

                });

			jQuery("#loader_password").validate({
				
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
					
                    message: "Please enter a valid Password"
					
                });
				
			jQuery("#re_password").validate({
                    expression: "if ((VAL == jQuery('#loader_password').val()) && VAL) return true; else return false;",
					
                    message: "Confirm password doesn't match"
                });

            });
			
            /* ]]> */

        </script> 


 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 
  $( function() {
    $( "#datepicker" ).datepicker({ 
	minDate: 0,
	maxDate: 4
	});
  } );
  </script>
  
<script>
	$('.how-it-works-inner img').click(function(){
$(".how-it-works-inner img").removeClass("active");
 $(this).addClass('active');
});
$(document).ready(function(){	
$("#vecweight").blur(function () {
	if (!isNaN( $("#vecweight").val() )){
			$.ajax({	
					type: "POST",
					url: "check_weight.php",
					data: { weight: $(this).val(), vehicle_id: $("#cf_vehicletype").val() },
					dataType:"JSON",
					beforeSend: function(){
						
				},
				success: function(result){
					if(result['status']==0){
						alert("Weight Can't be exceed from limit");
						$("#vecweight").val('');
					}
				}
			});
	}else{
		$("#vecweight").val('');
		alert('Please Enter Numeric Value only');
	}
	});
});
</script>

<?php include 'validation.php';?>


</body>
</html>