<?php   session_start();
		ob_start();
 include("controls/define.php"); 
 include("TBXadmin/include/config.php"); 

   if($_SESSION['vehicle_id']==""){
		echo "<META http-equiv='refresh' content='0;URL=index.php'>";
	}else{
	  $user_id = $_SESSION['user_id'];
	} 
	if($_SESSION['vehicle_owner_type']!="owner"){
		header("location:vehicle-my-account.php"); 
	}
	$path = $base_url."upload/vehicle_documents/";
	if(isset($_POST['post_truck'])){
		
		$resultB = mysql_query("SELECT id FROM tbl_post_truck order by id desc limit 1");
		$rowB = mysql_fetch_array($resultB);
		
		$post_truck_id = 'T'.($rowB['id']+1001);
		
		$source = $_POST['source'];
        $truck_id = $_POST['truck_id'];
        $truck_type = $_POST['truck_type'];
        $weight = $_POST['weight'];
        $schedule_date = $_POST['schedule_date'];
		if (isset($_POST['destination'])) {
			$x = '';
			foreach($_POST['destination'] as $id =>$value){
				
					$destination .= $x.$value;
					$x = ',';

			}
		}
			
		$insert = mysql_query("Insert INTO tbl_post_truck(vehicle_owner_id, truck_id, post_truck_id, source, destination, truck_type, weight,  schedule_date, created_date)VALUE('".$_SESSION['vehicle_id']."','".$truck_id."','$post_truck_id' ,'".$source."','".$destination."','".$truck_type."','".$weight."','".$schedule_date."','".date('h:i:s d-m-Y')."')");
		$update = mysql_query("UPDATE `tbl_trucks` SET `post_status` = '2' WHERE `id` = '".$truck_id."'");
	
		$sms = '<p class="success-msg">Truck Posted Successfully</p>' ;
	}	

 	$page_title = "Bank Details";
	$seo_keyword = "Bank Details";
	$seo_content = "Bank Details";
	
	include("header.php"); 
	include("header-bottom.php"); 
 ?>
 
<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>
       <li><a class="bred-active"> Vendor Dashboard </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
  <div class="main-dashboarsd-section style-dash">
    <div class="container">
	<?php  if(isset($sms)){		echo $sms ;	}?>
       <div class="col-md-4">
          <div class="vendor-dashboard-section">
            <h4>USER DASHBOARD</h4>
          </div>
          <div class="dashboad-details">
             <?php include('include/vehicle-sidebar.php') ; ?>
          </div>
       </div>
 
		<div class="col-md-7">	
			<div class="box-style-of-view-order">
				 <div class="tab">
				  <button class="tablinks active" onclick="openCity(event, 'London')">Post Truck</button>
				</div>
				<div id="London" class="tabcontent" style="display: block;">
					<form action="" method="post">
					<div class="personal-information-form choose-type">
					<div class="row">
						<div class="col-md-6">
							<label>  Source</label>
							<select name="source" id="source" class="form-control">
								<option value="">Select Source</option>
								<?php 
									$row = mysql_query("select * from tbl_city order by city_name");
									
									while($fetch = mysql_fetch_array($row)){ ?>
								<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-6">
							<label> Destination </label>
							<select name="destination[]" id="destination" class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
							<option value="">Select Destination</option>
								<?php 
									$row = mysql_query("select * from tbl_city order by city_name ");
									
									while($fetch = mysql_fetch_array($row)){	 ?>
								<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>Truck Reg. No.</label>
							<select name="truck_id" id="truck_id" class="form-control">
								<option value="">Select Truck Reg No</option>
								<?php 
									$result = mysql_query("SELECT id,truck_reg_no FROM tbl_trucks WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."'  order by id desc");
									
									while($fetch = mysql_fetch_array($result)){ ?>
								<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['truck_reg_no'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>  Select Truck Type </label>
							<select name="truck_type" id="truck_type" class="form-control" >
								<option value="">Select Truck Type</option>
								<?php 
									$roww = mysql_query("select * from vehicle_list where status = 1");
									
									while($fetchh = mysql_fetch_array($roww)){
									
									?>
								<option value="<?php echo $fetchh['id'];?>"><img src="upload/vechile_image/<?php echo $fetchh['pimage'];?>"><?php echo $fetchh['dimension'];?>/<?php echo $fetchh['length'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-6">
							<label> Weight in Ton  </label>
							<input id="weight" class="form-control" Placeholder="Weight in Ton" type="text" name="weight" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label> Select Scheduled Date </label>
							<input type="text" name="schedule_date" class="form-control" placeholder="Select Scheduled Date" id="datepicker">
						</div>
					</div>
  
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-3"></div>
						<div class="col-md-7">
							<button type="submit" name="post_truck"  class="update-password-btn">Post Truck</button>
						</div>
						<div class="col-md-1"></div>
					</div> 
				</form>
			</div>
		</div>
	</div>
 </div>
  </div>
</section>
<!--END OF ADDRESS BOOK-->

<!--START OF LOGIN SECTION-->
<div class="modal fade company-page-modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    

         
         <div id="container_demo" >
        
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
                  
                <a href="#toregister" class="to_register"><strong>Create an account ?</strong></a>
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

!--END OF SUCCESS-->
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
                  
                  <a href="#toregister" class="to_register"><strong>Create an Account ?</strong></a><br>  <a href="#tologin" class="to_register"><strong>Already have an account ? Login</strong></a>
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
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <!-- Select2 -->

 
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$(".select2").select2();
  } );
  </script>



<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3> QUICK LINKS </h3>
                    <ul>
                        <li> <a href="index.html"> Home </a> </li>
                        <li> <a href="about-us.html"> About us </a> </li>
                        <li> <a href="contact-us.html"> Contact us </a> </li>
                        <li> <a href="faq.html"> Faqs </a> </li>
                        <li> <a href="#"> Careers </a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3> QUICK LINKS</h3>
                    <ul>
                        <li> <a href="#"> How it works </a> </li>
                        <li> <a href="#"> Track & trace</a> </li>
                        <li> <a href="#"> Payment terms</a> </li>
                        <li> <a href="#"> RTO form download </a> </li>
                        <li> <a href="#"> Privacy policy </a> </li>
                        <li> <a href="#"> Terms & conditon </a> </li>
                        <li> <a href="#"> Support </a> </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3> CONTACT US </h3>
                    <ul>
                        <li> <a href="#"> Contact no </a> </li>
                        <li> <a href="#"> +91-8860978927 </a> </li>
                        <li> <a href="#"> Address </a> </li>
                        <li> <a href="#"> Neque porro quisquam est </a> </li>
                        <li> <a href="#"> qui dolorem </a> </li>
                        <li> <a href="#"> Email Id </a> </li>
                        <li> <a href="#"> amitsoni.@technobrix.com </a> </li>
                    </ul>
                </div>
              
                <div class="col-md-3">
                    <h3> FOLLOW US </h3>
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                    </ul>
                </div>
                 <div class="col-md-3 app-style">
                    <h3> DOWNLOAD  APP </h3>
                    <ul class="google">
                        <li> <a href="#"> <img src="images/google-img.png"> </a> </li>
                        
                    </ul>
                </div>
            </div>
            <!--row--> 
        </div>
        <!--container--> 
    </div>
    <!--footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="text-center"> Designed by Technobrix.com </p>
        
        </div>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
 <!-- Select2 -->

  <link rel="stylesheet" href="<?php echo base_url ; ?>css/select2.min.css">
<script src="<?php echo base_url ; ?>js/select2.full.min.js"></script>
  <script>
 
  $( function() {
    $( "#datepicker" ).datepicker({ 
	minDate: 0
	});
	
	$(".select2").select2();
  });
  </script>
 <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
		
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){  
					jQuery("#truck_type").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please Select Truck Type"
							});
					jQuery("#destination").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter destination"
							});
					jQuery("#source").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please select source"
							});
					jQuery("#truck_id").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please Select Truck Reg No"
							});
					jQuery("#weight").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please Enter Weight"
							});
					
            });
            /* ]]> */
			
        </script>
</body>
</html>