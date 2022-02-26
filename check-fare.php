<?php 	session_start();
		//error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
  $url_gm='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
  
    if(!isset($_SESSION['token'])){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
	}else{
	 $user_id = $_SESSION['user_id'];
	}
	  $path = "upload/documents/";
  $random_key = strtotime(date('Y-m-d H:i:s'));
	if(isset($_POST['add_booking'])){
		
		$resultB = mysqli_query($dbhandle, "SELECT id FROM tbl_book_load order by id desc limit 1");
		$rowB = mysqli_fetch_array($resultB);
		$booking_id = 'L'.($rowB['id']+1001) ;
		$lr_no = 'A'.($rowB['id']+1001);
		$source = $_SESSION['source'] ;
		$source_name = $_SESSION['source_name'] ;
		$destination =	$_SESSION['destination'] ;
		$vehicle_type = $_SESSION['vehicletype'] ;
		$material_type = $_SESSION['materialtype'] ;
		$weight = $_SESSION['weight'] ;
		$no_vehicle =  $_SESSION['noofvehicle'] ;
		$scheduled_date = $_SESSION['scheduled_date'] ;
		$scheduled_time = $_SESSION['scheduled_time'] ;
	
		$lat1 = $_SESSION['lat1'] ;
        $lon1 = $_SESSION['lon1'] ;
		$lat2 = $_SESSION['lat2'] ;
		$lon2 = $_SESSION['lon2'] ;
		$actualPrice = $_SESSION['actualPrice'];
		$price_km = $_SESSION['price_km'] ;
		$cost = $_SESSION['price'] ;
		$distance = $_SESSION['distance'] ;
		
		
		$pickup_street = $_POST['pickup_street'] ;
		$pickup_city = $_SESSION['source'] ;
		$pickup_pincode = $_POST['pickup_pincode'] ;
		$drop_street = $_POST['drop_street'] ;
		$destination_name = $_SESSION['destination'] ;
		$drop_pincode = $_POST['drop_pincode'] ;

		$booking_date = date("d-m-Y H:i:s") ;

	
	$query = mysqli_query($dbhandle, "INSERT INTO `tbl_book_load` (`id`, `loader_id`, `source`, `destination`, `material_type`, `weight`, `dimension`, `vehicle_type`, `no_vehicle`, `cost`, `scheduled_date`, `scheduled_time`, `post_type`, `distance`, `pickup_street`, `pickup_city`, `pickup_pincode`, `drop_street`, `destination_name`, `drop_pincode`, `booking_id`, `lr_no`, `booking_date`, `confirm_booking_date`, `status`) VALUES (NULL, '".$user_id."', '".$source."', '".$destination."', '".$material_type."', '".$weight."', '', '".$vehicle_type."', '".$no_vehicle."', '".$cost."', '".$scheduled_date."','".$scheduled_time."', '', '".$distance."', '".$pickup_street."', '".$pickup_city."', '".$pickup_pincode."', '".$drop_street."', '".$destination_name."', '".$drop_pincode."', '".$booking_id."', '', '".$booking_date."', '', '1');") ;
	
		if(($_POST["address"])!=""){
			$address = ", address = '".$_POST["address"]."'";
		}else{
			$address = "";
		}
		if(($_POST["city_name"])!=""){
			$city = ", city = '".$_POST["city_name"]."'";
		}else{
			$city = "";
		}
		if(($_POST["pincode"])!=""){
			$pincode = ", pincode = '".$_POST["pincode"]."'";
		}else{
			$pincode = "";
		}
		if(($_POST["designation"])!=""){
			$designation = ", designation = '".$_POST["designation"]."'";
		}else{
			$designation = "";
		}
		if(($_POST["landline_number"])!=""){
			$landline_no = ", landline_no = '".$_POST["landline_number"]."'";
		}else{
			$landline_no = "";
		}
		if(($_POST["alternate_contact_person"])!=""){
			$alt_contact_person = ", alt_contact_person = '".$_POST["alternate_contact_person"]."'";
		}else{
			$alt_contact_person = "";
		}
		if(($_POST["alternate_mobile_no"])!=""){
			$alt_mb_no = ", alt_mb_no = '".$_POST["alternate_mobile_no"]."'";
		}else{
			$alt_mb_no = "";
		}
		if(($_POST["company_name"])!=""){
			$company_name = ", company_name = '".$_POST["company_name"]."'";
		}else{
			$company_name = "";
		}
		if(($_POST["gst_no"])!=""){
			$gst_no = ", gst_no = '".$_POST["gst_no"]."'";
		}else{
			$gst_no = "";
		}
		if(($_POST["pan_card_no"])!=""){
			$pan_card_no = ", pan_card_no = '".$_POST["pan_card_no"]."'";
		}else{
			$pan_card_no = "";
		}
		if(($_POST["company_website"])!=""){
			$company_website = ", company_website = '".$_POST["company_website"]."'";
		}else{
			$company_website = "";
		}

		
if(!empty($_FILES['gst_file']['name'])){
			$gst_file =$_FILES['gst_file']['name'];
			$gst_file = rand().$random_key.'-'.$gst_file;
			$gst_file_tmp = $_FILES['gst_file']['tmp_name'];
			move_uploaded_file($gst_file_tmp,$path.$gst_file);
			$gst_file = ", gst_file = '$gst_file'";
		}else{
			$gst_file = "";
		}
		if(!empty($_FILES['pan_file']['name'])){
			$pan_file =$_FILES['pan_file']['name'];
			$pan_file = rand().$random_key.'-'.$pan_file;
			$pan_file_tmp = $_FILES['pan_file']['tmp_name'];
			move_uploaded_file($pan_file_tmp,$path.$pan_file);
			$pan_file = ", pan_file = '$pan_file'";
		}else{
			$pan_file = "";
		} 
		
	$update = mysqli_query($dbhandle, "UPDATE tbl_loader SET status=3 $address $city $pincode $designation $landline_no $alt_contact_person $alt_mb_no $company_name $gst_no $pan_card_no $company_website  $pan_file $gst_file   WHERE id = '".$_SESSION['user_id']."'");
	
	 $popupalertcheck = '<p class="success-msg">Your Booking is Pending for admin Review</p>' ;
	
	}
  
 $result = mysqli_query($dbhandle, "SELECT * FROM tbl_loader WHERE id = '".$_SESSION['user_id']."'");
 //$rowU = mysqli_fetch_array($result);
 //print_r($rowU) ;
 
	$page_title = "Check Fare";
	$seo_keyword = "Check Fare";
	$seo_content = "Check Fare";
 include("header.php"); 
 ?>
<!--end of top header-->
<section>
	<div class="top-sccond">
		<div class="container mobile-zero-padding">
		  <div class="col-md-2"></div>
			<div class="col-md-4 col-sm-4 border-right">
				<div class="from-to-section">
					<p> From <span class="to-style">To</span></p>
					<h4> <?php echo $_SESSION['source_name'] ; ?> <span class="root-img-gap"><img src="images/root-arrow.png"> </span> <span class="to-style-place"><?php echo $_SESSION['destination_name'] ; ?> </span></h4>
				</div>
			</div>

      <div class="col-md-4 col-sm-6">
        <div class="truck-type text-center new-truck1">
          <h5>TRUCK TYPE</h5>
		  <?php 
              $roww = mysqli_query($dbhandle, "select * from vehicle_list where id = '".$_SESSION['vehicletype']."'");
	            $fetchh = mysqli_fetch_array($roww) ;
									 ?> 
          <p><?php echo $fetchh['dimension'];?>/<?php echo $fetchh['length'];?></p>
        </div>
      </div>
      <div class="col-md-2"></div>
        <!--<div class="col-md-4">
        <div class="change-button pull-right">
          <a href="<?php echo base_url ; ?>"><button type="button" class="change-btn-style btn btn-default">CHANGE</button></a>
        </div>
      </div>-->
		</div>
	</div>
</section>
<!--end of top-second-->

<!--START OF ACCORDIAN SECTION-->
<section>
  <div class="main-content-section">
    <div class="container mobile-zero-padding">
	<?php  if(isset($sms)){		echo $sms ;	}?>
	<form action="" enctype="multipart/form-data" method="post" name="myForm" onsubmit="return validateForm()">
      <div class="col-md-5">
        <div class="accordian-detail">
        <div class=" accordion-style">
        
   <div class="panel-group" id="accordion">
      <div class="accordion-container-1">

  <div class="set1">
    <a href="#">
      Shipping Detail
      <i class="fa fa-plus"></i>
    </a>
    <div class="content-2" id="shipping_required" style="display: block;">
         <div class="panel" style="max-height: 100%;">

  <div class="col-md-12">
  <div class=" edit-detail shipping-details ">
  <div class="col-md-12 padding-style">
  <!---<i class="edit-icon fa fa-pencil-square-o" aria-hidden="true"></i>-->
</div>
    <!--<label>Pick up Date</label>
    <input type="text" id="datepicker" placeholder="26 Aug 2017" class="form-control" >
	-->
   <!--<label>Industry Type</label>
     <select class="weight-style form-control" disabled="">
      <option>Select</option>
      <option>Cement</option>
    </select> -->

    <label> Material Type </label>
	<input type="text"  class="weight-style  form-control" id="" readonly value="<?php echo $_SESSION['materialtype'];?>" />
     

    <label> Weight </label>
	 <input Placeholder="Weight in KG" value="<?php echo  $_SESSION['weight'] ; ?>" class="weight-style form-control" type="text" readonly   >
    

    <!-- <label> Dimension </label>
    <select class="weight-style form-control" disabled="">
      <option>Select</option>
      <option>Dimension</option>
    </select> -->

     <label> Scheduled Date </label>
	 	<input class="weight-style nform1 form-control" value="<?php echo  $_SESSION['scheduled_date'] ; ?>" type="text"  placeholder="Scheduled date and Time" id="datepicker" readonly>
   
    </div>
  </div>
  
  <div class="col-md-6 col-sm-6 col-xs-6">
  <div class="price-style">
    <h3>Distance</h3>
    </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <div class="price-rs">
    <h3 style="color:#ff0000;"><?php echo  $_SESSION['distance'] ; ?> Km</h3>
    </div>
  </div>
  
  <div class="col-md-6 col-sm-6 col-xs-6">
  <div class="price-style">
    <h3>Fare</h3>
    </div>
  </div>
  <div class="col-md-6 col-sm-6 col-xs-6">
  <div class="price-rs">
    <h3 style="color:#ff0000;">Rs <?php echo  $_SESSION['price'] ; ?></h3>
    </div>
  </div>
  <div class="col-md-12">
  <div class="payment-detailo-style">
    <h4>[ Payment 80% at the time of loading and 20% at the time of unloading Thru IMPS/NEFT/RTGS ]</h4>
    </div>
  </div>
</div>
    </div>
  </div>
  <div class="set1">
    <a href="#">
      Loading Address 
      <i class="fa fa-plus"></i>
    </a>
    <div class="content-2" id="loading_required">
    <div class="panel" style="max-height: 100%;">
   <div class="col-md-12 zero-padding">
  <div class="shipping-details edit-detail1">
  <div class="col-md-12 padding-style">
 <!-- <i class="edit-icon1 fa fa-pencil-square-o" aria-hidden="true"></i> -->
</div>
<div class="col-md-12 form-group">
	<label> Pick up Full Address </label>
    <textarea value="" type="text" id="pickup_street" name="pickup_street"  class="form-control" placeholder="Pick up Street Adress" ></textarea>
    </div>
	
    <div class="col-md-12 zero-padding">
	<div class="col-md-6" >
    <label> Pick up City </label>
    <input value="<?php echo $_SESSION['source_name'] ; ?>" id="pickup_city" type="text" name="pickup_city"  class="form-control"  placeholder="Pick up Location" disabled="">
	
	</div>
	
	<div class="col-md-6" >
    <label> Pick up Pincode </label>
    <input value="" type="text" name="pickup_pincode" id="pickup_pincode"  maxlength="6" class="form-control" placeholder="Pick up Pincode" >
	</div>
    </div>
	<div class="col-md-12 form-group">
	 <label>Drop Full Address</label>
    <textarea value="" type="text" id="drop_street" name="drop_street" class="form-control" placeholder="Drop Street Adress"  ></textarea>
    </div>
	
	<div class="col-md-6" >
    <label>Drop City</label>
    <input value="<?php echo $_SESSION['destination_name'] ; ?>" type="text" id="destination_name"  class="form-control"  placeholder="Drop Location" disabled="">
	
	</div>
	
	<div class="col-md-6" >
    <label> Drop Pincode </label>
    <input value="" type="text" id="drop_pincode" maxlength="6"  name="drop_pincode"  class="form-control" placeholder="Drop Pincode"  >
	</div>
	
	

    </div>
  </div>
</div>
    </div>
  </div>
  <div class="set1">
    <a href="#">
      Contact Detail
      <i class="fa fa-plus"></i> 
    </a>
    <div class="content-2">
     <div class="panel" style="max-height: 100%;">
 <div class="col-md-12">
  <div class="shipping-details">
    <!--<div class="skip-style">
      <p>Skip this step</p>
    </div>-->
    <label> Address </label>
    <input value="<?php echo $rowU['address'] ; ?>"  type="text" id="address" <?php echo ($rowU['address']!='')?'readonly':'name="address"'; ?> class="form-control" placeholder=" Enter your Address ">
    <!--<label>Drop Location</label>
    <input type="text" name="Drop-Location" class="form-control" placeholder="Drop Location"> -->

    </div>
  </div>
  <div class="col-md-6">
        <div class="shipping-details">
    <label> City </label>
    <select class="weight-style form-control"  id="city_name" <?php echo ($rowU['city']!='')?'readonly':'name="city_name"'; ?> >
      <option value="">Select City</option>
        <?php   
		$row = mysqli_query($dbhandle, "select * from tbl_city");
	           while($fetch = mysqli_fetch_array($row)){	 ?>
			<option <?php if($fetch['id'] == $rowU['city'] ){ echo 'selected' ; } ?> value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
	<?php } ?>
    </select>
    </div>
     </div>
       <div class="col-md-6">
        <div class="shipping-details">
    <label> Pincode </label>
   <input value="<?php echo $rowU['pincode'];?>"  type="text" id="pincode" <?php echo ($rowU['pincode']!='')?'readonly':'name="pincode"'; ?>  maxlength="6" class="form-control" placeholder=" Enter pincode ">
    </div>
     </div>

       <div class="col-md-6">
        <div class="shipping-details">
    <label> Designation </label>
    <select id="designation" <?php echo ($rowU['designation']!='')?'readonly':'name="designation"'; ?> class="form-control weight-style">
			<option value="">Select Designation</option>
			<option value="Manager" <?php echo ($rowU['designation']=='Manager')?'selected':''; ?> >Manager</option>
			<option value="Owner"  <?php echo ($rowU['designation']=='Owner')?'selected':''; ?>>Owner</option>
			<option value="Partner"  <?php echo ($rowU['designation']=='Partner')?'selected':''; ?>>Partner</option>
			<option value="Other"  <?php echo ($rowU['designation']=='Other')?'selected':''; ?>>Other</option>
		</select>
    </div>
     </div>
       <div class="col-md-6">
        <div class="shipping-details">
    <label> Landline No.(with STD code) </label>
   <input value="<?php echo $rowU['landline_no'];?>"  type="text" id="landline_number" <?php echo ($rowU['landline_no']!='')?'readonly':'name="landline_number"'; ?>  class="form-control"  placeholder=" Enter your Landline No. " maxlength="15">
    </div>
     </div>

        <div class="col-md-6">
        <div class="shipping-details">
    <label>  Alternate contact person </label>
    <input value="<?php echo $rowU['alt_contact_person'];?>" type="text" id="alternate_contact_person"  <?php echo ($rowU['alt_contact_person']!='')?'readonly':'name="alternate_contact_person"'; ?> class="form-control" placeholder=" Alternate contact person ">
    </div>
     </div>
       <div class="col-md-6">
        <div class="shipping-details">
    <label> Alternate mobile no. </label>
   <input value="<?php echo $rowU['alt_mb_no'];?>" type="text" id="alternate_mobile_no" <?php echo ($rowU['alt_mb_no']!='')?'readonly':'name="alternate_mobile_no"'; ?> class="form-control" placeholder=" Enter your Mobile Number "  maxlength="10">
    </div>
     </div>

      <!--<div class="col-md-6">
        <div class="shipping-details">
    <label>  Frequently used truck type </label>
      <select class="weight-style form-control">
         <option> Select </option>
         <option> Truck </option>
    </select>
    </div>
     </div> -->

</div>
    </div>
  </div>

   <div class="set1">
    <a href="#">
      Company Detail
      <i class="fa fa-plus"></i> 
    </a>
    <div class="content-2">
      <div class="panel" style="max-height: 100%;">
     
  <!--<div class="col-md-6">
        <div class="shipping-details">
     <div class="choose-style">
          <p>Choose from save address*</p>
          </div>
    </div>
     </div>

     <div class="col-md-6">
        <div class="shipping-details">
          <div class="skip-style skip1">
      <p> Skip this step</p>
    </div>
    </div>
     </div> -->

       <div class="col-md-12">
        <div class="shipping-details edit-detail2">
         <label> Company Name </label>
         <input value="<?php echo $rowU['company_name'];?>"  type="text" id="company_name" <?php echo ($rowU['company_name']!='')?'readonly':'name="company_name"'; ?> class="form-control" placeholder=" Enter your Company Name">
    </div>
     </div>

      <div class="col-md-12">
	  <div class="shipping-details">
  <label> GST Number </label>
 <input value="<?php echo $rowU['gst_no'] ; ?>" type="text"  id="gst_no" <?php echo ($rowU['gst_no']!='')?'readonly':'name="gst_no"'; ?> class="form-control" placeholder=" Enter service Tax/GST number ">
  </div>
  </div>
  <div class="col-md-12">
				<div class="shipping-details form-group">
                <label> GST File. (Attach File)  &nbsp;&nbsp;&nbsp;</label>
               <br class="visible-xs">
			<?php if($rowU['gst_file']!=""){?>
			<a href="<?php echo  $path.$rowU['gst_file'];?>" target="_blank">Download GST File</a>
			<?php }else{?>
            <span class="file-style-truck other-info"> Upload GST File Here </span>

            <input type="file" name="gst_file" id="gst_file" class="inputfile7 inputfile-5" >
			<?php }?>
			
              </div>
             </div>

  <div class="col-md-12">
  <div class="shipping-details">
    <label> Pan Card No.  <span style="color:red;">*</span></label>
   <input value="<?php echo $rowU['pan_card_no'];?>" type="text" id="pan_no" <?php echo ($rowU['pan_card_no']!='')?'readonly':'name="pan_card_no"'; ?> class="form-control" placeholder=" Enter No. " >
  </div>
</div>
	 <div class="col-md-12">
<div class="shipping-details form-group">
                <label> Pan Card No. (Attach File) <span style="color:red;">*</span> &nbsp;&nbsp;&nbsp;</label>
                <br class="visible-xs">
			<?php if($rowU['pan_file']!=""){?>
			<a href="<?php echo  $path.$rowU['pan_file'];?>" target="_blank">Download Pan File</a>
			<?php }else{?>
            <span class="file-style-truck other-info"> Upload Pan Card File </span>

            <input type="file" name="pan_file" id="pan_file" class="inputfile7 inputfile-5" >
			<?php }?>
			
         </div>     
             </div>



       <div class="col-md-12">
        <div class="shipping-details edit-detail2">
         <label> Company Website </label>
         <input value="<?php echo $rowU['company_website'];?>" type="text"   <?php echo ($rowU['company_website']!='')?'readonly':'name="company_website"'; ?> class="form-control" placeholder=" Enter your company website " >
    </div>
     </div>
</div>
    </div>
  </div>

</div>


     </div>
      <div class="col-md-2">
          
        </div>
  </div>
           
<div class="row">
<div class="col-md-12 pull-left">
<button type="submit" name="add_booking" class="confirm-tab-style">CONFIRM LOADING</button>
</div>
</div>

        </div>
      </div>
	  
	  </form> 
      <div class="col-md-7">
         <div class="map-section">
		 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDOhWEH6qIYmon2vqRrbsOmSdS4w-LoAQ&callback=initMap">
    </script>
   <script type="text/javascript">
   var markers = [
    
            
    
            {
               "title": '<?php echo $_SESSION['source_name'] ; ?>',
               "lat": '<?php echo $_SESSION['lat1'] ; ?>',
               "lng": '<?php echo $_SESSION['lon1'] ; ?>'
           }
    
       ,
    
            {
               "title": '<?php echo $_SESSION['destination_name'] ; ?>',
               "lat": '<?php echo $_SESSION['lat2'] ; ?>',
               "lng": '<?php echo $_SESSION['lon2'] ; ?>'
           }
    
   ];
   </script>
   <script type="text/javascript">
 
       window.onload = function () {
           var mapOptions = {
               center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
               zoom: 7,
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
  
		 
         <div id="dvMap">
		             
         </div>
      </div>
    </div>
  </div>
</section>
<!--END OF ACCORDIAN SECTION-->
<!--login pop up-->
<!--START OF LOGIN SECTION-->
<div class="modal fade company-page-modal" id="myModal" role="dialog">
    <div class="modal-dialog">       
         <div id="container_demo">
                 <a class="hiddenanchor" id="toregister"></a>
                 <a class="hiddenanchor" id="tosuccess"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                      <a class="hiddenanchor" id="tofpass"></a>
                    <div id="wrapper">
                     
                     <!--START OF LOGIN-->
                        <div id="login" class="animate form">
                        
                                    <form  action="mysuperscript.php" autocomplete="on"> 
                                <div class="col-md-12 zero-padding">

<h1>Login  <button type="button" class="close" data-dismiss="modal">&times;</button></h1>


<div class="col-md-12 login-sec-style">


 <input type="text" class="form-control" name="name" placeholder="Email/Phone No">
 
  <input type="password" class="form-control" name="password" placeholder="Password">
  <div class="checkbox-inline generate-style">
  
  <input type="checkbox" name="">&nbsp; &nbsp;Generate OTP</div>
  <span class="forget-style"><a href="#tofpass" class="to_fpass">Forgot Password?</a> </span></div>
<div class="col-md-12">
<button type="submit" class="btn btn-default" id="sign-style">SIGN IN </button>
</div>

<div class="col-md-12">

<p class="create-new-style change_link text-center">
									
							<!--	<a href="#toregister" class="to_register"><strong>Go Back</strong></a>-->
              <a href="#"> <strong> Go Back </strong> </a>
								</p>
</div>
</div>

  </form>
 </div>
 <!--END OF LOGIN-->

<!--start of success-->

   <div id="success" class="animate form">
                        
                                     <form  action="mysuperscript.php" autocomplete="on"> 
                                  <div class="col-md-12 zero-padding">

<button type="button" class="close close-style" data-dismiss="modal">&times;</button>
<div class="col-md-12">
	<div class="success-img text-center">
		<img src="images/success-img.png">
	</div>
</div>
<div class="col-md-12">
	<div class="thank-text text-center">
		<h4>Thank You for <span class="reg-style">Registration !<span></h4>
	</div>
</div>
<div class="col-md-12">
	<div class="your-account text-center">
		<p>Your Account has been created and a verification 
email has been sent to your registered email address.</p>
	</div>
</div>

<div class="col-md-12">
	<div class="create-acc-style text-center">
		<p>Create an account ?</p>
	</div>
</div>

</div>
   </form>
     </div>

<!--END OF SUCCESS-->
<!--START OF FORGET-->
                        <div id="fpass" class="animate form">
                        

                              <form  action="" autocomplete="on"> 
                             
<div class="col-md-12 zero-padding">

<h1 class="register-1">Forget Password <button type="button" class="close" data-dismiss="modal">&times;</button></h1>
<div class="col-md-12 login-sec-style">
 <input type="email" class="email-forget form-control" name="email" placeholder="Email Id">
</div>
<div class="col-md-12">
<button type="submit" class="btn btn-default" id="sign-style">Send </button>
</div>


<div class="col-md-12">

<p class="change_link text-center">
									
									<a href="#toregister" class="to_register"><strong>Create an Account ?</strong></a><br>	<a href="#tologin" class="to_register"><strong>Already have an account ? Login</strong></a>
								</p>
</div>
</div>
 </form>
  </div>

                        <!--END OF FORGET-->
<!--START OF REGISTER-->
                        <div id="register" class="animate form">
                       
                              <form  action="mysuperscript.php" autocomplete="on"> 
                                  <div class="col-md-12 zero-padding">

<h1 class="register-1">Register <button type="button" class="close" data-dismiss="modal">&times;</button></h1>
<div class="col-md-12 login-sec-style">
 <input type="text" class="form-control" name="name" placeholder="Name">
 <input type="email" class="form-control" name="email" placeholder="Email ID">
 <input type="text" class="form-control" name="number" placeholder="Mobile">
  <input type="password" class="form-control" name="password" placeholder="Password">
  <input type="password" class="form-control" name="re-password" placeholder="Retype Password">
  <div class="checkbox-inline generate-style">
  
  <input type="checkbox" name="">&nbsp; &nbsp;I Agree with the <span class="terms-and-cond-style"> <a href="#tosuccess" class="to_success"> Terms and condition </a></span></div>
</div>
 <div class="col-md-12">

<button type="submit" class="btn btn-default" id="sign-style">REGISTER </button>
</div>
</div>
   </form>
      </div>
<!--END OF REGISTER-->
</div>
    </div>
    </div>
  </div>
<!--END OF LOGIN SECTION-->

<!--START OF CHECK FARE POP-UP-->
  <section>
    <div class="continue-to-update-pop-up">
      <div class="col-md-12">
        <div class="close-btn">
          <p>X</p>
        </div>
      </div>

      <div class="col-md-12">
        <div class="update-text-style">
          <h5>Update contact/ company/ details to post order</h5>
        </div>
      </div>

       <div class="col-md-12">
        <div class="con-btn text-center">
          <button type="button" class="con-btn-style"> Continue To Update </button>
          <p><a href="#">Skip this step</a></p>
        </div>
      </div>

    </div>
  </section>
<!--END OF CHECK FARE POP-UP-->

<div class="continue-to-update-pop-up-success1">
      <div class="col-md-12">
        <div class="close-btn">
          <p>X</p>
        </div>
      </div>
    
    <div class="col-md-12">
        <div class="success-img-style">
           <img src="images/success-img.png">
        </div>
      </div>

      <div class="col-md-12">
        <div class="update-text-style update">
          <h5>Update contact/ company/ details to post order</h5>
        </div>
      </div>

       <div class="col-md-12">
        <div class="con-btn text-center">
          <button type="button" class="con-btn-style"> Continue To Update </button>
          <p><a href="#">Skip this step</a></p>
        </div>
      </div>

    </div>
	
<?php include("footer.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
   <script type="text/javascript">
   function validateForm() {
    var pickup_street = document.forms["myForm"]["pickup_street"].value;
    var pickup_pincode = document.forms["myForm"]["pickup_pincode"].value;
    var drop_street = document.forms["myForm"]["drop_street"].value;
    var drop_pincode = document.forms["myForm"]["drop_pincode"].value;
	
   /*  var address = document.forms["myForm"]["address"].value;
    var city_name = document.forms["myForm"]["city_name"].value;
    var pincode = document.forms["myForm"]["pincode"].value;
    var designation = document.forms["myForm"]["designation"].value;
    var landline_number = document.forms["myForm"]["landline_number"].value;
	
    var company_name = document.forms["myForm"]["company_name"].value;
    var company_type = document.forms["myForm"]["company_type"].value;
    var service_tax = document.forms["myForm"]["service_tax"].value;
    var pan_no = document.forms["myForm"]["pan_no"].value;
    var panimg = document.forms["myForm"]["panimg"].value;
    var tin_no = document.forms["myForm"]["tin_no"].value;
    var tinimg = document.forms["myForm"]["tinimg"].value; */
	

    
    if ((pickup_street == "") || (pickup_pincode == "") || (drop_street == "") || (drop_pincode == "") ) {
        alert("Please Filled Loading Address");
		$("#loading_required").show();
		$("#shipping_required").hide();
        return false;
    }
	  
/* 	if ((address == "") || (city_name == "") || (pincode == "") || (drop_pincode == "") || (designation == "")|| (landline_number == "") ) {
        alert("Please Filled Contact Details");
        return false;
    }
	
	if ((company_name == "") || (company_type == "") || (service_tax == "") || (pan_no == "") || (panimg == "")|| (tin_no == "") || (tinimg == "")) {
        alert("Please Filled Company Details");
        return false;
    } */
}
   
   </script>
		
        <script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){ 
				jQuery("#landline_number").validate({
                    expression: "if (VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please enter valid Landline number"
                });	
				jQuery("#alternate_mobile_no").validate({
                    expression: "if (VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please enter valid Mobile number"
                });	
				jQuery("#pickup_pincode").validate({
                    expression: "if (VAL.length > 5 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please enter valid Pincode"
                });	
				jQuery("#pincode").validate({
                    expression: "if (VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please enter valid Pincode"
                });	
				jQuery("#drop_pincode").validate({
                    expression: "if (VAL.length > 5 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please enter valid Pincode"
                });					
			/* jQuery("#loader_type").validate({
                    expression: "if (VAL != '') return true; else return false;",
                    message: "Please select a Type"
                });

    

        jQuery("#datepicker").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				
		 jQuery("#pickup_street").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				

        
				
		 jQuery("#drop_street").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });

        jQuery("#drop_pincode").validate({

                    expression: "if (VAL.length > 6 && VAL.match(/^[0-9]*$/)) return true; else return false;",

                    message: "Your Phone Number in correct format"

                });
		jQuery("#address").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				
		 jQuery("#designation").validate({

                    expression: "if (VAL.length > 6 && VAL.match(/^[0-9]*$/)) return true; else return false;",

                    message: "Your Phone Number in correct format"

                });
				
		
				
		jQuery("#company_name").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				
		jQuery("#service_tax").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				
		jQuery("#pan_no").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
		
		jQuery("#panimg").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				
		jQuery("#tin_no").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });
				
		jQuery("#tinimg").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please enter Scheduled Date"

                });		
				
         */

       

            });

            /* ]]> */

        </script> 


<script>
	$('.how-it-works-inner img').click(function(){
$(".how-it-works-inner img").removeClass("active");
 $(this).addClass('active');
})
</script>

<!--ACCORDIAN SCRIPT-->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
<!--EDIT SCRIPT-->
  <script>
$('.edit-icon').click(function () {
   $('.edit-detail  input[type="text"], .edit-detail input[type="number"], .edit-detail input[type="radio"], .edit-detail textarea, .edit-detail select').removeAttr('disabled');
return false;

})

$('.edit-icon1').click(function () {
   $('.edit-detail1  input[type="text"], .edit-detail1 input[type="number"], .edit-detail1 input[type="radio"], .edit-detail1 textarea, .edit-detail1 select').removeAttr('disabled');
return false;

})

$('.edit-icon2').click(function () {
   $('.edit-detail2  input[type="text"], .edit-detail2 input[type="number"], .edit-detail2 input[type="radio"], .edit-detail2 textarea, .edit-detail2 select').removeAttr('disabled');
return false;

})

</script>
<!--pop-up script-->
<script>
$(".skip-style").click(function(){
$(".continue-to-update-pop-up").css('display','block');
$(".overlay").css('display','block');
});

$(".close-btn").click(function(){
$(".continue-to-update-pop-up").css('display','none');
$(".overlay").css('display','none');
});

$(".con-btn-style").click(function(){
$(".continue-to-update-pop-up").css('display','none');
$(".overlay").css('display','none');
});

$(".choose-style").click(function(){
$(".continue-to-update-pop-up-success1").css('display','block');
$(".overlay").css('display','block');
});

$(".close-btn").click(function(){
$(".continue-to-update-pop-up-success1").css('display','none');
$(".overlay").css('display','none');
});
</script>
<div class="modal fade company-page-modal" id="confirmBooking" role="dialog">
    <div class="modal-dialog new-contain">

        <div id="container_demo">
		
            <div id="wrapper">

                <!--start of success-->

                <div  id="loginv" class="animate form">

                        <div class="col-md-12 zero-padding newzero">

                            <button type="button" class="close close-style" data-dismiss="modal">&times;</button>


                            <div class="col-md-12">

                                <div class="thank-text text-center">
                                     <h3> congratulation  </h3>
                                    <h4>Your Loading is confirm and pending for truck assign</h4>.
                                     <h5>Booking will be confirm within 60 minute according to Truck availbilty at your 
                                     locationYou will receive notification and update through Call/SMS and Email </h5>
									<a href="order-list.php"><input type="submit" class="con-btn-style" value="Ok" /></a>

                                </div>

                            </div>

                        

                        </div>

                </div>

                <!--END OF SUCCESS-->

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){

  $(".set1 > a").on("click", function(){

    if($(this).hasClass('active')){

      $(this).removeClass("active");

      $(this).siblings('.content-2').slideUp(200);

      $(".set1 > a i").removeClass("fa-minus").addClass("fa-plus");

    }else{

      $(".set1 > a i").removeClass("fa-minus").addClass("fa-plus");

    $(this).find("i").removeClass("fa-plus").addClass("fa-minus");

    $(".set1 > a").removeClass("active");

    $(this).addClass("active");

    $('.content-2').slideUp(200);

    $(this).siblings('.content-2').slideDown(200);

    }

    

  });

});

</script>
<?php if($popupalertcheck!=""){ ?>
		<script type="text/javascript">
			$(function() {
				$("#confirmBooking").modal();
			});
		</script>
 <?php }?>
<?php include 'validation.php';?>
</body>
</html>