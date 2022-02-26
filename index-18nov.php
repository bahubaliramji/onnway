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
		<button type="button" class="post-tab-style">POST A LOAD</button><br>
			<span class="select-tab">
				<select name="source">

					<option>Source</option>
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
				<select name="destination">
					<option>Destination</option>
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
				<select name="vehicletype" >
					<option>Vehicle Type</option>
					 <?php 
                                 $roww = mysql_query("select * from vehicle_list where status = 1");

	                               while($fetchh = mysql_fetch_array($roww)){

									 ?>
					
					<option value="<?php echo $fetchh['id'];?>"><img src="upload/vechile_image/<?php echo $fetchh['pimage'];?>"><?php echo $fetchh['dimension'];?>/<?php echo $fetchh['length'];?></option>
										<?php } ?>
					
				</select>
			</span>

			<span class="select-tab">
				<select name="materialtype">
					<option>Material Type</option>
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
				
				
				 <input id="vecweight" Placeholder="Weight in Ton" type="text" name="weight" value="">
										 

			</span class="select-tab">
			
			
			<span class="select-tab">
				<input type="text" name="scheduled_date" placeholder="Select Scheduled Date" id="datepicker">
			</span>
			
			<span class="select-tab">
			<input type="hidden" name="no_of_vehicle" value="1">
				<select name="scheduled_time">
					 <option value="">Select Scheduled Time </option>
										 <option value="12AM-3PM"> 12AM - 3PM</option>
										 <option value="3PM-6PM"> 3PM - 6PM</option>
										 <option value="6PM-9PM"> 6PM - 9PM</option>
										 <option value="9AM-12PM"> 9AM - 12PM</option>
										
										 
				</select>
			</span>
 
			<span>
			
				<?php  if($_SESSION['user_id']==''){ ?>
		<a data-toggle="modal" data-target="#myModal">	<button type="submit" name="submitt" class="check-fare-tab-style">CHECK FARE</button></a>
		<?php }else{ ?>
				<a href="check-fare.php"> <button type="submit" name="submitt" class="check-fare-tab-style">CHECK FARE</button> </a>
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
				
                 <p>Onnway.com is creating an online open market platform for freight where our transporters, as well as fleet operators, can connect easily. We are working out on some of the major issues in the regions of locating costs, optimizing route, tracking during transit and timely delivery.
				 With our matchless technology incorporated platform.
•	Instant availability of trucks
•	Reasonable price 
•	Perfect experience
</p>
                 <h4>READ MORE</h4>
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
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/metro.png">
		<h3>Dedicated service</h3>
		 <p>Our dedication to our customers is to make sure well-organized, dependable and unproblematic organization of your freight necessities - by rendering best service at best rates. At Onnway.com , we understand that there are a lot of customers in the market who get below average or very poor service but at ever-rising rates. </p>
		</div>
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/metro.png">
		<h3>Decrease your stress</h3>
		 <p>Actually making deliveries perhaps is an essential element of your business it is not why you are into business. Handling a fleet of trucks plus their drivers while interacting with staff and clients is a time intense, detail-oriented procedure. Designating these functions to a dependable, outside party like Onnway.com  gives you a lot of free time so that you can focus on your main business.</p>
		</div>
         <div class="col-md-6 choose-us-metro-section">
		 <img src="images/metro.png">
		<h3>Dependable carriers</h3>
		 <p>We build up reliable working kinships with carriers who preserve customary loads for us, and consecutively, we offer them with 24-hour send-off and course communication to do away with confusion. in addition, our carriers handle solely one loader at a time who keeps up their account as well as score. We also provide payment to our shippers within 21 days of the receipt of the invoice plus clear evidence of delivery.</p>
		</div>
		<div class="col-md-6 choose-us-metro-section">
		 <img src="images/metro.png">
		<h3>Track and trace easily</h3>
		 <p>Supervise your cargo, bulk as well as container transfer with a simple click of a mouse button online - anytime, anyplace. Onnway.com assists to track in addition to trace cargo, bulk plus container transport.</p>
		</div>
	</div>
</section>
<!--end of why choose us section-->
<section class="how-it-works-section">
	<div class="container">
		<div class="col-md-12">
			<h2>HOW <span class="choose-style"> IT WORKS</span></h2>
		</div>
		<div class="col-md-4">
		<div class="col-md-12 how-it-works-inner">
		 <img src="images/metro-border.png" class="active">
		<h3>Reserve Online in seconds</h3>
		 <p>Now you can hire a truck in as little as 60 seconds with just a few clicks via Mobile App or our Website.</p>
        </div>
		</div>
		<div class="col-md-4">
        <div class="col-md-12 how-it-works-inner">
		 <img src="images/metro-border.png">
		<h3>Lowest cost</h3>
		 <p>Get immediate price of the Trucks for your consignments and we will make certain that it is as low as it can possibly be.</p>
         </div>
		</div>
		<div class="col-md-4">
		<div class="col-md-12 how-it-works-inner">
		 <img src="images/metro-border.png">
		<h3>Tracking and support</h3>
		 <p>You can now trace and track your shipments real-time and also link with your driver anytime along the path.</p>
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
  <div class="carousel-inner" role="listbox">
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
				    		 <li>E-Way Bill is an electronically generated document.<br> which is required to be generated for the movement of goods of more Rs. 50,000 from one place to another.</li>
				    		 <li>In case an e-way bill has been generated  but the goods are either not transported or are not transported as per the details furnished in the e-way bill, the e-way bill shall be cancelled<br>The cancellation can be done either electronically on the GST Website directly or through a GST Facilitation Centre within 24 hours of the generation of the e-way bill.</li>
				    		 <li>An e-way bill cannot be cancelled if it has been verified in transit.<br></li>
							 <li>The e-way bill generated in any state shall be valid in every state and union territory of India.<br></li>
							 
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
			jQuery("#loader_type").validate({
                    expression: "if (VAL != '') return true; else return false;",
                    message: "Please select a Type"
                });

    

        jQuery("#name").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Your Name"

                });

        

        jQuery("#password ").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Write password"

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
	minDate: 0
	});
  } );
  </script>
  
<script>
	$('.how-it-works-inner img').click(function(){
$(".how-it-works-inner img").removeClass("active");
 $(this).addClass('active');
})
</script>




</body>
</html>