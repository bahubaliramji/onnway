 <?php 	   session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");
 
if(!isset($_SESSION['last_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=loader-registration-1.php'>";
 }else{
	 $user_id = $_SESSION['last_id'];
 }  
 //$_SESSION['id'] = 71;
 if(isset($_POST['submit'])){
    $address = $_POST["address"];
     $city = $_POST["city"];
    $pincode = $_POST["pincode"];
    $designation = $_POST["designation"];
   $landline_number = $_POST["landline_number"];
    $alternate_contact_person = $_POST["alternate_contact_person"];
     $alternate_mobile_no = $_POST["alternate_mobile_no"];
      $truck_type = '';
	  
      $update = mysqli_query($dbhandle, "UPDATE tbl_loader SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation'   , landline_no = '$landline_number', alt_contact_person = '$alternate_contact_person', alt_mb_no = '$alternate_mobile_no', truck_type = '$trucktype'   WHERE id = '".$_SESSION['last_id']."'");
	  
	  echo "<META http-equiv='refresh' content='0;URL=loader-registration-3.php'> ";	
    }
	
	
 include("header.php");

 ?>

<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12 mobile-zero-padding">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="#"> <img src="images/home.png"> </a></li>
       <li><a href="#" class="bred-active"> Loader Registration </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->
<!--START OF LOADER REGISTRATION TOP HRTADING-->
<section>
  <div class="container">
     <div class="col-md-12 mobile-zero-padding">
        <div class="loader-reg-heading"> 
          <h3> Loader Registration </h3>
       </div>
      </div> 
    </div>
</section>
<!--END OF LOADER REGISTRATION TOP HRTADING-->

<section>
  <div class="container">
     <div class="col-md-12 mobile-zero-padding" >
        <div class="loader-reg-stepper-1-style"> 
          <img src="images/loader-registraton-stepper-2.png" class="img-responsive">
          <ul class="registyration12">
             <li> Personal <br> Information </li>
             <li class="contact-style">  Contact <br> Information </li>
             <li> Company <br> Information </li>
          </ul>
       </div>
      </div> 
    </div>
</section>

<section class="form-section"> <form action-"" method="post">
  <div class="container mobile-zero-padding">
  <div class="col-md-2">
    
  </div>
     <div class="col-md-8" >
        <div class="personal-information-section"> 
         <div class="information-wrap">     
     <div class="pers-style-info">
     <h4> CONTACT INFORMATION </h4>
      </div>

      <div class="personal-information-form mobile-form">
         <div class="row">
            <div class="col-md-12">
                <label> Address <span style="color:red;">*</span></label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your Address">
             </div>
         </div>

          <div class="row">
            <div class="col-md-6">
                <label> City <span style="color:red;">*</span></label>
                <select class="form-control" name="city" id="city">
                    <option value="">Select City</option>
        <?php   
		$row = mysqli_query($dbhandle, "select * from tbl_city");
	           while($fetch = mysqli_fetch_array($row)){	 ?>
			<option  value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
	<?php } ?>
                </select>
             </div>

             <div class="col-md-6">
                <label> Pincode  <span style="color:red;">*</span> </label>
                <input type="text" maxlength="6" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode">
             </div>

         </div>

          <div class="row">
            <div class="col-md-6">
                <label> Designation <span style="color:red;">*</span></label>
				<select id="designation" name="designation" class="form-control">
					<option value="">Select Designation</option>
					<option value="Manager">Manager</option>
					<option value="Owner">Owner</option>
					<option value="Partner">Partner</option>
					<option value="Other">Other</option>
				</select>
               
             </div>

             <div class="col-md-6">
                <label> Landline No.(with STD code)<span style="color:red;">*</span>  </label>
                <input type="text" name="landline_number" id="landline_number" class="form-control" placeholder="Enter your Landline No.">
             </div>
             
         </div>

         <div class="row">
            <div class="col-md-6">
                <label>  Alternate contact person</label>
                <input type="text" name="alternate_contact_person" id="alternate_contact_person" class="form-control" placeholder="Enter Alternate Name">
             </div>

             <div class="col-md-6">
                <label>  Alternate mobile no.   </label>
                <input type="text" name="alternate_mobile_no" id="alternate_mobile_no" class="form-control" maxlength="10" placeholder=" Enter your Mobile Number ">
             </div>
             
         </div>

          <!---- <div class="row">
            <div class="col-md-6">
                <label>  Frequently used truck type </label>
                <select class="form-control" name="truck_type" id="truck_type">
                    <option> Select </option>
                    <option> Hyva </option>
                </select>
             </div>

             <div class="col-md-6">
                
             </div>
             
         </div>--->

          <div class="row">
            <div class="col-md-12 continue-btn">
               
			    <a href="loader-registration-3.php"><button type="button" class="cont-btn-style"> Skip </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" name="submit" class="cont-btn-style"> Continue </button>
             </div>

             
         </div>

      </div>
      </div>
       </div>
      </div>

      <div class="col-md-2">
    
  </div> 
    </div>
  </form>
</section>

<!--START OF LOGIN SECTION-->

<!--END OF LOGIN SECTION-->


<?php include('footer.php') ; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
		
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){  
        jQuery("#address").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Address"
                });
		
		jQuery("#city").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Select City"
                });		
        
        jQuery("#pincode").validate({
                    expression: "if (VAL.length > 5 && VAL.match(/^[0-9]*$/)) return true; else return false;",
                    message: "Please Enter Valid Pincode"
                });
       
				
		jQuery("#designation").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Select Designation"
                });	
		jQuery("#landline_number").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Please Enter Landline Number"
              });	
         
            });
            /* ]]> */
        </script>
</body>
</html>