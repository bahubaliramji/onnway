<?php   session_start();
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['vehicle_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
 }else{
	  $user_id = $_SESSION['user_id'];
 } 
  if($_SESSION['vehicle_owner_type']!="owner"){
	header("location:vehicle-my-account.php"); 
 }
 $path = $base_url."upload/vehicle_documents/";
if(isset($_POST['edit_truck'])){
 
		$truck_reg_no = $_POST['truck_reg_no'];
        $truck_type = $_POST['truck_type'];
        $load_passing = $_POST['load_passing'];
        $route_operate = $_POST['route_operate'];
        //$truck_permit_no = $_POST['truck_permit_no'];
        $truck_validity = $_POST['truck_validity'];
		
		$random_key = strtotime(date('Y-m-d H:i:s'));
		
		if(!empty($_FILES['truck_reg_file']['name'])){
			$truck_reg_file =$_FILES['truck_reg_file']['name'];
			$truck_reg_file = rand().$random_key.'-'.$truck_reg_file;
			$truck_reg_tmp = $_FILES['truck_reg_file']['tmp_name'];
			 move_uploaded_file($truck_reg_tmp,$path.$truck_reg_file);
			 $truck_reg_file = ", truck_reg_file = '$truck_reg_file'";
		}else{
			$truck_reg_file = "";
		}
		if(!empty($_FILES['truck_permit_file']['name'])){
			$truck_permit_file =$_FILES['truck_permit_file']['name'];
			$truck_permit_file = rand().$random_key.'-'.$truck_permit_file;
			$truck_permit_tmp = $_FILES['truck_permit_file']['tmp_name'];
			 move_uploaded_file($truck_permit_tmp,$path.$truck_permit_file);
			 $truck_permit_file = ", truck_permit_file = '$truck_permit_file'";
		}else{
			$truck_permit_file = "";
		}
		
		if(!empty($_FILES['insurance_file']['name'])){
			$insurance_file =$_FILES['insurance_file']['name'];
			$insurance_file = rand().$random_key.'-'.$insurance_file;
			$insurance_tmp = $_FILES['insurance_file']['tmp_name'];
			move_uploaded_file($insurance_tmp,$path.$insurance_file);
			$insurance_file = ", insurance_file = '$insurance_file'";
		}else{
			$insurance_file = "";
		}
		

  $update = mysqli_query($dbhandle, "UPDATE tbl_trucks SET truck_reg_no = '$truck_reg_no', truck_type = '$truck_type', load_passing = '$load_passing', route_operate='$route_operate', truck_validity ='$truck_validity' $truck_reg_file  $truck_permit_file $insurance_file where vehicle_owner_id = '".$_SESSION['vehicle_id']."' and id='".$_GET['truck_id']."'");
	$sms = '<p class="success-msg">Truck Details updated Successfully</p>' ;

}	
	
 
 $query = mysqli_query($dbhandle, "SELECT * FROM tbl_trucks WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."' and id='".$_GET['truck_id']."'");
 $count = mysqli_num_rows($query);
 if ($count > 0){
	$rowU =  mysqli_fetch_array($query);
 }else{
	 header("location:my-truck.php");
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
       <div class="box-style-of-truck-info-style">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')"> Truck Information </button>
  
</div>
<form action="" method="POST" enctype="multipart/form-data" > 
<div id="London" class="tabcontent information" style="display: block;">
  <div class="row">
  
  <div class="col-md-6">
    <p> Select Truck Type </p>
  <br>
    <select class="form-control" name="truck_type">
      <option selected>Select Truck Type </option>
	  <?php  $roww = mysqli_query($dbhandle, "select * from vehicle_list where status = 1");
			while($fetchh = mysqli_fetch_array($roww)){
			?>
				<option value="<?php echo $fetchh['id'];?>" <?php if($rowU['truck_type']==$fetchh['id']){ echo "selected";}?>><img src="upload/vechile_image/<?php echo $fetchh['pimage'];?>"><?php echo $fetchh['dimension'];?>/<?php echo $fetchh['length'];?></option>
			<?php } ?>
   </select>
  </div>

  <div class="col-md-6">
  <p> Load Passing </p>
  <br>
   <input type="text" name="load_passing" value="<?php echo $rowU['load_passing'];?>" class="form-control" placeholder=" Enter Load passing ">
  </div>

  </div>


 <div class="row">
  
  <div class="col-md-6">
    <p> Operate Your Route </p>
  <br>
    <input type="text" name="route_operate"  value="<?php echo $rowU['route_operate'];?>" class="form-control" placeholder=" Operate Your Route ">
  </div>

  <div class="col-md-6">
  <p> Truck Permit </p>
  <br>
   <div class="truck-permit">
           <p></p>
            <span class="file-style-truck"> <?php if(!empty($rowU['truck_permit_file'])){?><a href="<?php echo $path.$rowU['truck_permit_file'];?>">Download File</a><?php }else{ echo "No file Uploaded";}?> </span><input type="file" name="truck_permit_file" id="file-15" class="inputfile5 inputfile-5" >
            <label for="file-15"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Truck Registration No. </p>
  <br>
    <input type="text" name="truck_reg_no"  value="<?php echo $rowU['truck_reg_no'];?>" class="form-control" placeholder="Enter No." id="enter-no-style">
  </div>

  <div class="col-md-6">
  <p> Truck Reg File </p>
  <br>
  <div class="truck-permit">
           <p></p>
            <span class="file-style-truck file-goes"> <?php if(!empty($rowU['truck_reg_file'])){?><a href="<?php echo $path.$rowU['truck_reg_file'];?>">Download File</a><?php }else{ echo "No file Uploaded";}?>  </span><input type="file" name="truck_reg_file" id="file-16" class="inputfile5 inputfile-5" data-multiple-caption="{count} files selected" multiple="">
            <label for="file-16"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <p> Truck Validity </p>
  <br>
    <div class='input-group date'>
        <input type='text'  class="form-control" name="truck_validity" value="<?php echo $rowU['truck_validity'];?>" id="datepicker3" placeholder="Enter Date" />
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
            <span class="file-style-truck"> <?php if(!empty($rowU['insurance_file'])){?><a href="<?php echo $path.$rowU['insurance_file'];?>">Download File</a><?php }else{ echo "No file Uploaded";}?>  </span><input type="file" name="insurance_file" id="file-17" class="inputfile5 inputfile-5" >
            <label for="file-17"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
  </div>
  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" name="edit_truck" class="update-truck-info-btn"> Edit Truck </button>
  </div>
  
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

<script>
  $( function() {
    $( "#datepicker3" ).datepicker();
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