<?php   session_start();
		ob_start();
 include("controls/define.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['user_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
 }else{
	 $user_id = $_SESSION['user_id'];
 } 
 
 if(isset($_POST['update_contact'])){
    $address = $_POST["address"];
     $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $designation = $_POST["designation"];
   $landline_number = $_POST["landline_number"];
    $alternate_contact_person = $_POST["alternate_contact_person"];
     $alternate_mobile_no = $_POST["alternate_mobile_no"];
      $truck_type = $_POST["truck_type"];
	  

	  
      $update = mysql_query("UPDATE tbl_loader SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation'   , landline_no = '$landline_number', alt_contact_person = '$alternate_contact_person', alt_mb_no = '$alternate_mobile_no', truck_type = '$trucktype'   WHERE id = '".$_SESSION['user_id']."'");
	  
	  $sms = '<p class="success-msg">Contact Details updated Successfully</p>' ;
    }
	
	if(isset($_POST['update_company'])){
		
    $company_name = $_POST['company_name'];
        $company_type = $_POST['company_type'];
      
        $service_tax = $_POST['service_tax'];
        $pan_no = $_POST['pan_no'];
        $tin_no = $_POST['tin_no'];
        $company_website = $_POST['company_website'];
      //$path = $base_url."upload/documents/";
       $path = "upload/documents/";
    
  $panimg =$_FILES['panimg']['name'];
  $panimg_path = $_FILES['panimg']['tmp_name'];

   $tinimg =$_FILES['tinimg']['name'];
  $tinimg_path = $_FILES['tinimg']['tmp_name'];

  move_uploaded_file($panimg_path,$path.$panimg);
  move_uploaded_file($tinimg_path,$path.$tinimg);    


	
  $update = mysql_query("UPDATE tbl_loader SET company_name = '$company_name', company_type = '$company_type', service_tax = '$service_tax', pan_card_no = '$pan_no', pan_file = '$panimg', tin_no = '$tin_no', tin_file = '$tinimg', company_website = '$company_website'
    WHERE id = '".$_SESSION['user_id']."'");
	
	 $sms = '<p class="success-msg">Company Details updated Successfully</p>' ;
}
	
	
 
 $result = mysql_query("SELECT * FROM tbl_loader WHERE id = '".$_SESSION['user_id']."'");
 $rowU = mysql_fetch_array($result);
 
 	$page_title = "My Account";
	$seo_keyword = "My Account";
	$seo_content = "My Account";
	
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
        <li><a href="<?php echo base_url ; ?>"> <img src="images/home.png"> </a></li>
       <li><a  class="bred-active"> Company Details </a></li>
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
       <?php 	include 'loader_dashboard_side_menu.php';?>
 
       <div class="col-md-7">
       <div class="box-style-of-truck-info-style">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')"> Company Information </button>
  <button class="tablinks" onclick="openCity(event, 'Paris')"> Contact Information </button>
</div>

<div id="London" class="tabcontent information company-detail" style="display: block;">
<form action="" method="POST" enctype="multipart/form-data" >  
  <div class="row">
  
  <div class="col-md-12">
    <p> Company Name</p>
  <br>
    <input value="<?php echo $rowU['company_name'];?>" type="text" name="company_name" class="form-control" placeholder=" Enter your Company Name">
  </div>

  </div>


 <div class="row">
  
  <div class="col-md-6">
    <p> Company type </p>
  <br>
    <select class="form-control"  name="company_type">
     <option value=""> Select your company Type </option>
       <option <?php  if($rowU['company_type'] == 'company 1'){ echo 'selected' ; }  ?> value="company 1"> Company 1 </option>
                    <option <?php  if($rowU['company_type'] == 'company 2'){ echo 'selected' ; }  ?> value="company 2"> Company 2 </option>
   </select>
  </div>

  <div class="col-md-6">
  <p> Service Tax/GST Number </p>
  <br>
 <input value="<?php echo $rowU['service_tax'] ; ?>" type="text" name="service_tax" class="form-control" placeholder=" Enter service Tax/GST number ">
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Pan Card No. </p>
  <br>
   <input value="<?php echo $rowU['pan_card_no'];?>" type="text" name="pan_no" class="form-control" placeholder=" Enter No. " >
  </div>

  <div class="col-md-6">
  <p></p>
  <br>
  <div class="truck-permit">
           <p></p>
		   <input type="file" name="panimg" id="file-1" class="inputfile inputfile-1" >
		   <?php if(!empty($rowU['pan_file'])){?> 
		   </br><p><a href="<?php base_url ; ?>upload/documents/<?php echo $rowU['pan_file'];?>">Download</a></p>
		   <?php } ?>
           <!---- <span class="file-style-truck file-goes"> File name goes here </span><input type="file" name="file-5[]" id="file-5" class="inputfile5 inputfile-5" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>--->
        </div>
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Tin No.  </p>
  <br>
     
    <input value="<?php echo $rowU['tin_no'];?>" type="text" name="tin_no" class="form-control" placeholder=" Enter No. " >
           
  </div>

  <div class="col-md-6">
  <p>  </p>
  <br>
  <div class="truck-permit">
           <p></p>
		   <input type="file" name="tinimg" id="file-1" class="inputfile inputfile-1">
		   <?php if(!empty($rowU['tin_file'])){?> 
		   </br><p><a href="<?php base_url ; ?>upload/documents/<?php echo $rowU['pan_file'];?>">Download</a></p>
		   <?php } ?>
          <!---  <span class="file-style-truck"> File name goes here </span><input type="file" name="file-5[]" id="file-5" class="inputfile5 inputfile-5" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label> --->
        </div>
  </div>
  </div>

   <div class="row">
  
  <div class="col-md-12">
    <p> Company Website  </p>
  <br>
     
           <input value="<?php echo $rowU['company_website'];?>" type="text"  name="company_website" class="form-control" placeholder=" Enter your company website " >
           
  </div>

  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" name="update_company" class="update-truck-info-btn"> Update </button>
  </div>
  
  </div>
  
  </form>

  </div>


<div id="Paris" class="tabcontent driver-info">
  <form action="" method="POST">
   <div class="row">
  
  <div class="col-md-12">
    <p> Address </p>
  <br>
    <input type="text" name="address" value="<?php echo $rowU['address'];?>" id="address" class="form-control" placeholder="Enter your Address">
  </div>

  </div>


 <div class="row">
  
  <div class="col-md-6">
    <p> City </p>
  <br>
    <select name="city" class="form-control" style="height: 50px; border-color: #e5e5e5; font-size: 13px; color: #777777;">
                    <option value="">Select City</option>
        <?php   
		$row = mysql_query("select * from tbl_city");
	           while($fetch = mysql_fetch_array($row)){	 ?>
			<option <?php if($fetch['id'] == $rowU['city'] ){ echo 'selected' ; } ?> value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
	<?php } ?>
                </select>
  </div>

  <div class="col-md-6">
  <p> Pincode </p>
  <br>
   <input value="<?php echo $rowU['pincode'];?>" type="text" name="pincode" class="form-control" placeholder=" Enter pincode ">
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Designation </p>
  <br>
   <input value="<?php echo $rowU['designation'];?>" type="text" name="designation" class="form-control" placeholder=" Enter Designation ">
  </div>

  <div class="col-md-6">
  <p> Landline No.(with STD code)* </p>
  <br>
  <input value="<?php echo $rowU['landline_no'];?>" type="text" name="landline_number" class="form-control" placeholder=" Enter your Landline No. ">
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Alternate contact person </p>
  <br>
 <input value="<?php echo $rowU['alt_contact_person'];?>" type="text" name="alternate_contact_person" class="form-control" placeholder=" Alternate contact person ">
  </div>

  <div class="col-md-6">
  <p> Alternate mobile no. </p>
  <br>
 <input value="<?php echo $rowU['alt_mb_no'];?>" type="text" name="alternate_mobile_no" class="form-control" placeholder=" Enter your Alternate Mobile Number ">
  </div>
  </div>
  <div class="row">
  
  <!---<div class="col-md-6">
    <p> Frequently used truck type </p>
  <br>
 <select class="form-control" style="height: 50px; border-color: #e5e5e5; font-size: 13px; color: #777777;">
                    <option> Select </option>
                    <option> Hyva </option>
                </select>
  </div> --->
  </div> 

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" name="update_contact" class="update-truck-info-btn driver"> Update </button>
  </div>
  
  </div>
  
  </form>

  

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




<?php include("footer.php"); ?>

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
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

</body>
</html>