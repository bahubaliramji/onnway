<?php  session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");

 if(!isset($_SESSION['last_vehicle_id'])){
	 header('location:index.php');
 }else{
	 $user_id = $_SESSION['last_vehicle_id'];
 }
 if(isset($_POST['vehicle_submit'])){
	$address = $_POST['address'];

         $city = $_POST['city'];

        $pincode = $_POST['pincode'];

        $designation = $_POST['designation'];

       // $landline_no = $_POST['landline_no'];

		$altercontactperson = $_POST['altercontactperson'];

        $altermobnumber = $_POST['altermobnumber'];
		
        $agent_pan_card_no = $_POST['agent_pan_card_no'];
		
        $agent_aadhar_card_no = $_POST['agent_aadhar_card_no'];
		
		$path = $base_url."upload/vehicle_documents/";

		$random_key = strtotime(date('Y-m-d H:i:s'));
		
         if(!empty($_FILES['agent_pan_card_file']['name'])){
			$agent_pan_card_file =$_FILES['agent_pan_card_file']['name'];
			$agent_pan_card_file = rand().$random_key.'-'.$agent_pan_card_file;
			 move_uploaded_file($_FILES['agent_pan_card_file']['tmp_name'],$path.$agent_pan_card_file);
			 $agent_pan_card_file = ", agent_pan_card_file = '$agent_pan_card_file'";
		}else{
			$agent_pan_card_file = "";
		}
		
		if(!empty($_FILES['agent_aadhar_card_file']['name'])){
			$agent_aadhar_card_file =$_FILES['agent_aadhar_card_file']['name'];
			$agent_aadhar_card_file = rand().$random_key.'-'.$agent_aadhar_card_file;
			 move_uploaded_file($_FILES['agent_aadhar_card_file']['tmp_name'],$path.$agent_aadhar_card_file);
			 $agent_aadhar_card_file = ", agent_aadhar_card_file = '$agent_aadhar_card_file'";
		}else{
			$agent_aadhar_card_file = "";
		}
	
        $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation', alt_contact_person = '$altercontactperson', alt_mb_no = '$altermobnumber', agent_pan_card_no='$agent_pan_card_no', agent_aadhar_card_no='$agent_aadhar_card_no' $agent_pan_card_file $agent_aadhar_card_file  WHERE vehicle_owner_id = '".$_SESSION['last_vehicle_id']."'");
		
		header("location:vehicle-registration-bank.php");
 }
 
 
	  
	  
	$page_title = "Vehicle Registration";
	$seo_keyword = "Vehicle Registration";
	$seo_content = "Vehicle Registration";
	
	include('header.php');



 ?>

<!--end of top header bottom-->

<!--START OF BREADCRUMB-->

<section>

<div class="container">

<div class="col-md-12 mobile-zero-padding">

  <div class="breadcrumb-section">

    <ul>

       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>

       <li><a  class="bred-active"> Vehicle Registration </a></li>

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

          <h3> Vehicle Registration </h3>

       </div>

      </div> 

    </div>

</section>

<!--END OF LOADER REGISTRATION TOP HRTADING-->



<section>

  <div class="container">

     <div class="col-md-12 mobile-zero-padding" >

        <div class="loader-reg-stepper-1-style vehicle-registration"> 

          <img src="<?php echo base_url ; ?>images/vehicle-registration-stepper-2.png" class="img-responsive">

          <ul class="vehicle-sec1">

             <li> Owner <br> Information </li>

             <li>  Contact <br> Information </li>
			 
			 <li> Bank <br> Details </li>

             <li> Company <br> Information </li>

             <li> Add <br> Truck </li>

          </ul>

       </div>

      </div> 

    </div>

</section>



<section class="form-section">

  <div class="container mobile-zero-padding">

  <div class="col-md-2">

    

  </div>

     <div class="col-md-8" >

        <div class="personal-information-section vehicle-reg-style"> 

          <!-- <h3> SELECT TYPE &nbsp; &nbsp;  | <span class="radio-tab"> <form>

    <label class="radio-inline">

      <input type="radio" name="optradio" checked> Vehicle Owner

    </label>

<label class="radio-inline">

      <input type="radio" name="optradio">  Transporter/ Agent

    </label>

     </form> </span></h3>-->

<div class="information-wrap">
     <div class="pers-style-info">

     <h4> CONTACT INFORMATION </h4>

      </div>


		<form action="" method="POST" enctype="multipart/form-data">
      <div class="personal-information-form choose-type mobile-form">



          

         <div class="row">

            <div class="col-md-12">

                <label> Address <span style="color:red">*</span></label>

                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your Address ">

             </div>

         </div>

         <div class="row">

            <div class="col-md-6">

                <label> City <span style="color:red">*</span></label>

                <select class="form-control"  id="city"  name="city">
					 <option value="">Select City</option>
                    <?php   
		$row = mysqli_query($dbhandle, "select * from tbl_city");
	           while($fetch = mysqli_fetch_array($row)){	 ?>
			<option  value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
	<?php } ?>

                </select>

             </div>



             <div class="col-md-6">

                <label> Pincode  <span style="color:red">*</span></label>

                <input type="text" maxlength="6" id="pincode" name="pincode" maxlength="6" class="form-control" placeholder="Enter pincode ">

             </div>



         </div>



          <div class="row">

            <div class="col-md-6">

                <label>  Alternate Contact Person </label>

                <input type="text" id="altercontactperson"  name="altercontactperson" class="form-control" placeholder=" Enter Name ">

             </div>

			 <div class="col-md-6">

                <label> Alternate Mobile No.  </label>

                <input type="text" maxlength="10" name="altermobnumber" id="altermobnumber" class="form-control" placeholder=" Enter your Mobile Number ">

             </div>
 
           
         </div>
<?php if($_SESSION['vehicle_owner_type']=="agent"){?>
 <div class="row attach-file">
			<div class="col-md-6">

                <label> Pan Card no.  <span style="color:red">*</span> </label>

                <input type="text" maxlength="15" name="agent_pan_card_no" id="agent_pan_card_no" class="form-control" placeholder=" Enter your Pan Card No ">

             </div>

            <div class="col-md-6">

                <label> Pan Card (Attach File) <span style="color:red">*</span> </label>

					<div class="truck-permit">


				<span class="file-style-truck other-info"> File name goes here </span><!--<input type="file" name="file-5[]" id="file-5" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected" multiple="">-->

				<input type="file" name="agent_pan_card_file" id="agent_pan_card_file" class="fileUpload inputfile7 inputfile-5">

				<label for="agent_pan_card_file" class="fileUploaderror"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

				</div>

             </div>
             </div>
			 <div class="row attach-file">
				<div class="col-md-6">

                <label> Aadhar Card no.   <span style="color:red">*</span></label>

                <input type="text" maxlength="14" name="agent_aadhar_card_no" id="agent_aadhar_card_no" class="form-control" placeholder=" Enter your Aadhar Card No ">

             </div>
			 
			

             <div class="col-md-6">

                <label> Aadhar Card (Attach File)  <span style="color:red">*</span> </label>
               <div class="truck-permit">

            <span class="file-style-truck other-info"> File name goes here </span><!--<input type="file" name="file-5[]" id="file-5" class="inputfile7 inputfile-5" data-multiple-caption="{count} files selected" multiple="">-->

            <input type="file" name="agent_aadhar_card_file" id="agent_aadhar_card_file" class="fileUpload inputfile7 inputfile-5" >
	
            <label for="agent_aadhar_card_file" id="idAadharNex"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>
              
             </div>
 </div>
<?php }?>

          <div class="row">

              <?php if($_SESSION['vehicle_owner_type']=="owner"){?> <div class="col-md-6">

                <label> Designation-(Owner/Manager/Partner) </label>

                <select class="form-control" name="designation" id="designation">
                   <option value=""> Select designation </option>
                   <option value="Owner"> Owner </option>
                   <option value="Manager"> Manager </option>
                   <option value="Partner"> Partner </option>

                </select>

  </div><?php }?>
             
        

           

         </div>


          <div class="row">

             
             
            <div class="col-md-12 continue-btn">
			<a href="<?php echo base_url ; ?>vehicle-registration-bank.php"><button type="button" class="cont-btn-style"> Skip </button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="submit" name="vehicle_submit" class="cont-btn-style"> Continue </button>

             </div>

         </div>
      </div>
	  
	  </form>
      </div>

       </div>

      </div>
      <div class="col-md-2">
  </div> 

    </div>

</section>



<!--START OF LOGIN SECTION-->



<!--END OF LOGIN SECTION-->



<!--START OF POP UP-->

<!--

<div class="vehicle-reg-pop-up" >

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

        <div class="thankyou-reg">

          <h6> Thank You for <span class="reg-color"> Registration ! <span> </h6>

        </div>

      </div>





      <div class="col-md-12">

        <div class="update-text">

          <h5> Proceed to complete/<br> contact /  company /  bank details before post a truck. </h5>

        </div>

      </div>



       <div class="col-md-12">

        <div class="con-btn text-center">

          <button type="button" class="con-btn-style"> Continue To Update </button>

          <p><a href="#">Skip this step</a></p>

        </div>

      </div>



    </div>

-->

<!--END OF POP UP-->

<!--

<div class="overlay">

      </div>

-->

<?php include('footer.php'); ?>
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
							message: "Please Select city"
						});
				jQuery("#pincode").validate({
							expression: "if (VAL.length > 5 && VAL.match(/^[0-9]*$/)) return true; else return false;",
							message: "Please Enter Valid 6 Digit Pin Code"
						});
				jQuery("#altermobnumber").validate({
							expression: "if (VAL.match(/^[0-9]*$/)) return true; else return false;",
							message: "Please Enter Valid 10 Digit Mobile No"
						});
				jQuery("#agent_pan_card_no").validate({
							expression: "if (VAL) return true; else return false;",
							message: "Please Enter Pan Card No "
						});
				jQuery("#agent_aadhar_card_no").validate({
							expression: "if (VAL.match(/^[0-9]*$/)) return true; else return false;",
							message: "Please Enter Aadhar card No"
						});
				jQuery("#agent_pan_card_file").validate({
							expression: "if (VAL) return true; else return false;",
							message: "Please upload Pan File "
						});
				jQuery("#agent_aadhar_card_file").validate({
							expression: "if (VAL) return true; else return false;",
							message: "Please upload Aadhar File"
						});
         
            });
            /* ]]> */
			
        </script>


</body>

</html>