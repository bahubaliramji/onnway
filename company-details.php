<?php   session_start();
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 
 
   if(!isset($_SESSION['user_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
 }else{
	 $user_id = $_SESSION['user_id'];
 } 
  $path = $base_url."upload/documents/";
  $random_key = strtotime(date('Y-m-d H:i:s'));
 if(isset($_POST['update_contact'])){
    $address = $_POST["address"];
     $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $designation = $_POST["designation"];
   $landline_no = $_POST["landline_no"];
    $alt_contact_person = $_POST["alt_contact_person"];
     $alt_mb_no = $_POST["alt_mb_no"];
	  

	  
      $update = mysqli_query($dbhandle, "UPDATE tbl_loader SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation'   , landline_no = '$landline_no', alt_contact_person = '$alt_contact_person', alt_mb_no = '$alt_mb_no'   WHERE id = '".$_SESSION['user_id']."'");
	  
	  $sms = '<p class="success-msg">Contact Details updated Successfully</p>' ;
    }

	if(isset($_POST['update_company'])){
		
    $company_name = $_POST['company_name'];
      
        $gst_no = $_POST['gst_no'];
        $pan_card_no = $_POST['pan_card_no'];
        $company_website = $_POST['company_website'];
		
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



  $update = mysqli_query($dbhandle, "UPDATE tbl_loader SET company_name = '$company_name',  gst_no = '$gst_no', pan_card_no = '$pan_card_no', company_website = '$company_website'  $pan_file $gst_file
    WHERE id = '".$_SESSION['user_id']."'");
	
	 $sms = '<p class="success-msg">Company Details updated Successfully</p>' ;
}
	
	
 
 $result = mysqli_query($dbhandle, "SELECT * FROM tbl_loader WHERE id = '".$_SESSION['user_id']."'");
 $rowU = mysqli_fetch_array($result);
 
 	$page_title = "Company Details";
	$seo_keyword = "Company Details";
	$seo_content = "Company Details";
	
	 include("header.php"); 
	 include("header-bottom.php"); 
 ?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12 mobile-zero-padding">
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
    <div class="container mobile-zero-padding">
	<?php  if(isset($sms)){		echo $sms ;	}?>
       <?php 	include 'loader_dashboard_side_menu.php';?>
 
       <div class="col-md-9 col-sm-6">
       <div class="box-style-of-truck-info-style">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')"> COMPANY INFORMATION </button>
  <button class="tablinks" onclick="openCity(event, 'Paris')"> CONTACT INFORMATION </button>
</div>

<div id="London" class="tabcontent information company-detail" style="display: block;">
<form action="" method="POST" enctype="multipart/form-data" >  
  <div class="row">
  
  <div class="col-md-12">
    <label> Company Name <span style="color:red;">*</span></label>
    <input name="company_name" value="<?php echo $rowU['company_name'];?>" type="text" id="company_name" <?php echo ($rowU['company_name']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter your Company Name">
  </div>

  </div>


 <div class="row">
  
  

  <div class="col-md-6">
  <label> GST Number </label>
 <input value="<?php echo $rowU['gst_no'] ; ?>" type="text"  id="gst_no" <?php echo ($rowU['gst_no']!='')?'readonly':''; ?> name="gst_no" class="form-control" placeholder=" Enter service Tax/GST number ">
  </div>
  <div class="col-md-6">
				
                <label> GST File. (Attach File)  </label>
               <div class="truck-permit">
			<?php if($rowU['gst_file']!=""){?>
			<a href="<?php echo  $path.$rowU['gst_file'];?>" target="_blank">Download GST File</a>
			<?php }else{?>
            <span class="file-style-truck other-info"> Upload GST File Here </span>

            <input type="file" name="gst_file" id="gst_file" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="gst_file"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
			<?php }?>
			</div>
              
             </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <label> Pan Card No.  <span style="color:red;">*</span></label>
   <input name="pan_card_no" value="<?php echo $rowU['pan_card_no'];?>" type="text" id="pan_no" <?php echo ($rowU['pan_card_no']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter No. " >
  </div>

	 <div class="col-md-6">

                <label> Pan Card No. (Attach File) <span style="color:red;">*</span> </label>
               <div class="truck-permit">
			<?php if($rowU['pan_file']!=""){?>
			<a href="<?php echo  $path.$rowU['pan_file'];?>" target="_blank">Download Pan File</a>
			<?php }else{?>
            <span class="file-style-truck other-info"> Upload Pan Card File </span>

            <input type="file" name="pan_file" id="pan_file" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected">

            <label for="pan_file"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span><span class="ValidationErrors">*</span>Upload Image</span></label>
			<?php }?>
			</div>
              
             </div>
  </div>

   <div class="row">
  
  <div class="col-md-12">
    <label> Company Website  </label>
     
           <input name="company_website" value="<?php echo $rowU['company_website'];?>" type="text"   <?php echo ($rowU['company_website']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter your company website " >
           
  </div>

  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" name="update_company" class="update-truck-info-btn"> UPDATE </button>
  </div>
  
  </div>
    <p>&nbsp;</p>
  </form>

  </div>


<div id="Paris" class="tabcontent driver-info">
  <form action="" method="POST">
   <div class="row">
  
  <div class="col-md-12">
    <label> Company Address  <span style="color:red;">*</span></label>
    <input name="address" type="text" <?php echo ($rowU['address']!='')?'readonly':''; ?> value="<?php echo $rowU['address'];?>" id="address" class="form-control" placeholder="Enter your Address">
  </div>

  </div>


 <div class="row">
  
  <div class="col-md-6 select-city-mob-hight cityn1">
    <label> City  <span style="color:red;">*</span></label>
    <select name="city" <?php echo ($rowU['city']!='')?'readonly':''; ?> class="form-control company-desig"  border-color: #e5e5e5; font-size: 13px; color: #777777;" id="city">
                    <option value="">Select City</option>
        <?php   
		$row = mysqli_query($dbhandle, "select * from tbl_city");
	           while($fetch = mysqli_fetch_array($row)){	 ?>
			<option <?php if($fetch['id'] == $rowU['city'] ){ echo 'selected' ; } ?> value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
	<?php } ?>
                </select>
  </div>

  <div class="col-md-6">
  <label> Pincode  <span style="color:red;">*</span></label>
   <input name="pincode" value="<?php echo $rowU['pincode'];?>" type="text" maxlength="6" id="pincode" <?php echo ($rowU['pincode']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter pincode ">
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6 cityn1">
    <label> Designation <span style="color:red;">*</span></label>
		<select name="designation" id="designation" <?php echo ($rowU['designation']!='')?'readonly':''; ?> class="form-control company-desig">
			<option value="">Select Designation</option>
			<option value="Manager" <?php echo ($rowU['designation']=='Manager')?'selected':''; ?> >Manager</option>
			<option value="Owner"  <?php echo ($rowU['designation']=='Owner')?'selected':''; ?>>Owner</option>
			<option value="Partner"  <?php echo ($rowU['designation']=='Partner')?'selected':''; ?>>Partner</option>
			<option value="Other"  <?php echo ($rowU['designation']=='Other')?'selected':''; ?>>Other</option>
		</select>

  </div>

  <div class="col-md-6">
  <label> Landline No.(with STD code)<span style="color:red;">*</span> </label>

  <input name="landline_no" value="<?php echo $rowU['landline_no'];?>" type="text" <?php echo ($rowU['landline_no']!='')?'readonly':''; ?> id="landline_number" class="form-control" placeholder=" Enter your Landline No. ">
  </div>
  </div>

  <div class="row">
  
  <div class="col-md-6">
    <label> Alternate contact person </label>
 <input name="alt_contact_person" value="<?php echo $rowU['alt_contact_person'];?>" type="text" <?php echo ($rowU['alt_contact_person']!='')?'readonly':''; ?> class="form-control" placeholder=" Alternate contact person ">
  </div>

  <div class="col-md-6">
  <label> Alternate mobile no. </label>
 <input name="alt_mb_no" value="<?php echo $rowU['alt_mb_no'];?>" type="text" maxlength="10" <?php echo ($rowU['alt_mb_no']!='')?'readonly':''; ?> class="form-control" placeholder=" Enter your Alternate Mobile Number ">
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
  </div> -->
  </div> 

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-9 truck-info-update-btn">
    <button type="submit" name="update_contact" class="update-truck-info-btn driver"> UPDATE </button>
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
 <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script> 
 <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript"></script>	
 
 <script type="text/javascript">            /* <![CDATA[ */      
      jQuery(function(){ 
		  jQuery("#address").validate({  
			  expression: "if (VAL) return true; else return false;",  
			  message: "Please Enter Address"     
		  });  
		  jQuery("#pincode").validate({ 
			  expression: "if (VAL.length > 5 && VAL.match(/^[0-9]*$/)) return true; else return false;",
			  message: "Your Enter Valid Pin Code" 
		  });    
		  jQuery("#city").validate({  
			  expression: "if (VAL) return true; else return false;",
			  message: "Please Select City"  
		  });		
		  jQuery("#pan_no").validate({  
			  expression: "if (VAL) return true; else return false;",   
			  message: "Please Enter Pan No"    
		  });						
		  jQuery("#company_type").validate({   
			 expression: "if (VAL) return true; else return false;", 
			  message: "Please enter Company Type"     
		  });		
		  jQuery("#company_name").validate({     
			  expression: "if (VAL) return true; else return false;",              
			  message: "Please Enter Company Name"    
		  });	
			jQuery("#designation").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Select Designation"
                });	
		jQuery("#landline_number").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Landline Number"
              });
			  jQuery("#pan_file").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please upload Pan Card"
                }); 
	  });            /* ]]> */        </script>
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