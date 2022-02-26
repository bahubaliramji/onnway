<?php   session_start();
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['vehicle_id'])){
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
	  

	  
      $update = mysqli_query($dbhandle, "UPDATE tbl_loader SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation'   , landline_no = '$landline_number', alt_contact_person = '$alternate_contact_person', alt_mb_no = '$alternate_mobile_no', truck_type = '$trucktype'   WHERE id = '".$_SESSION['user_id']."'");
	  
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


	
  $update = mysqli_query($dbhandle, "UPDATE tbl_loader SET company_name = '$company_name', company_type = '$company_type', service_tax = '$service_tax', pan_card_no = '$pan_no', pan_file = '$panimg', tin_no = '$tin_no', tin_file = '$tinimg', company_website = '$company_website'
    WHERE id = '".$_SESSION['user_id']."'");
	
	 $sms = '<p class="success-msg">Bank Details updated Successfully</p>' ;
}
	
	
 
 $result = mysqli_query($dbhandle, "SELECT * FROM tbl_loader WHERE id = '".$_SESSION['user_id']."'");
 $rowU = mysqli_fetch_array($result);
 
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
       <li><a href="#"> <img src="images/home.png"> </a></li>
       <li><a href="#" class="bred-active"> Vendor Dashboard </a></li>
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
       <div class="col-md-4">
          <div class="vendor-dashboard-section">
            <h4>USER DASHBOARD</h4>
          </div>
          <div class="dashboad-details">
            <ul>
              <li><a href="#"> <img src="images/account-detail.png"> Account Details </a></li>
              <li><a href="#"> <img src="images/com-detail.png"> Company Details </a></li>
               <li class="dropdown"><a href="#"> <img src="images/my-order.png"> My Truck </a></li> 
            </ul>
          </div>
       </div>
 
       <div class="col-md-7">
       <div class="box-style-of-truck-info-style">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')"> Truck Information </button>
  <button class="tablinks" onclick="openCity(event, 'Paris')"> Driver Information </button>
</div>

<div id="London" class="tabcontent information" style="display: block;">
  <div class="row">
  
  <div class="col-md-6">
    <p> Select Truck Type </p>
  <br>
    <select class="form-control">
      <option> Select </option>
      <option selected> Truck Type </option>
   </select>
  </div>

  <div class="col-md-6">
  <p> Load Passing </p>
  <br>
   <select class="form-control">
      <option> Select </option>
      <option selected> No. of Tons </option>
   </select>
  </div>

  </div>


 <div class="row">
  
  <div class="col-md-6">
    <p> Operate Your Route </p>
  <br>
    <select class="form-control">
      <option> Select </option>
      <option selected> Enter Route </option>
   </select>
  </div>

  <div class="col-md-6">
  <p> Truck Permit </p>
  <br>
   <div class="truck-permit">
           <p></p>
            <span class="file-style-truck"> File name goes here </span><input type="file" name="file-5[]" id="file-5" class="inputfile5 inputfile-5" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Truck Registration No. </p>
  <br>
    <input type="text" name="number" class=" form-control" placeholder="Enter No." id="enter-no-style">
  </div>

  <div class="col-md-6">
  <p> </p>
  <br>
  <div class="truck-permit">
           <p></p>
            <span class="file-style-truck file-goes"> File name goes here </span><input type="file" name="file-5[]" id="file-5" class="inputfile5 inputfile-5" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Truck Validity </p>
  <br>
     
                <div class='input-group date'>
                    <input type='text' class="form-control"  id="datepicker" placeholder="Enter Date" />
                    <span class="input-group-addon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                </div>
           
  </div>

  <div class="col-md-6">
  <p> Truck Insurance </p>
  <br>
  <div class="truck-permit">
           <p></p>
            <span class="file-style-truck"> File name goes here </span><input type="file" name="file-5[]" id="file-5" class="inputfile5 inputfile-5" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" class="update-truck-info-btn"> Update </button>
  </div>
  
  </div>

  </div>


<div id="Paris" class="tabcontent driver-info">

   <div class="row">
  
  <div class="col-md-6">
    <p> Driver Name </p>
  <br>
    <input type="text" name="name" class="form-control" placeholder="Name">
  </div>

  <div class="col-md-6">
  <p> Mobile Number </p>
  <br>
  <input type="text" name="name" class="form-control" placeholder="Enter your Mobile Number">
  </div>

  </div>


 <div class="row">
  
  <div class="col-md-6">
    <p> Driving Licence </p>
  <br>
    <input type="text" name="driving-licence" class="form-control" placeholder="Enter licence no.">
  </div>

  <div class="col-md-6">
  <p> </p>
  <br>
   <div class="driver-information-style">
           <p></p>
            <span class="file-info-style file-name-style"> File name goes here </span><input type="file" name="file-6[]" id="file-6" class="inputfile6 inputfile-6" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-6"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Adhaar No. </p>
  <br>
    <input type="text" name="aadhar-no" class=" form-control" placeholder="Enter No." id="aadhar-style">
  </div>

  <div class="col-md-6">
  <p> </p>
  <br>
 <div class="driver-information-style">
           <p></p>
            <span class="file-info-style file-name-style"> File name goes here </span><input type="file" name="file-6[]" id="file-6" class="inputfile6 inputfile-6" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-6"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Fitness Certificate </p>
  <br>
  <div class="driver-information-style">
           <p></p>
            <span class="file-info-style"> File name goes here </span><input type="file" name="file-6[]" id="file-6" class="inputfile6 inputfile-6" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-6"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>

  <div class="col-md-6">
  <p> Driver Certificate by Owner </p>
  <br>
 <div class="driver-information-style">
           <p></p>
            <span class="file-info-style"> File name goes here </span><input type="file" name="file-6[]" id="file-6" class="inputfile6 inputfile-6" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-6"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" class="update-truck-info-btn driver"> Update </button>
  </div>
  
  </div>

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
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
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

</body>
</html>