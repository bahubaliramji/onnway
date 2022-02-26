<?php  session_start();
		error_reporting(0);
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php");

 if(!isset($_SESSION['last_vehicle_id'])){
	 echo "<META http-equiv='refresh' content='0;URL=vehicle-registration-1.php'>";
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
			
        
        $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation', alt_contact_person = '$altercontactperson', alt_mb_no = '$altermobnumber'  WHERE vehicle_owner_id = '".$_SESSION['last_vehicle_id']."'");
		
		header("refresh:1;url=vehicle-registration-3.php");
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

<div class="col-md-12">

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

     <div class="col-md-12">

        <div class="loader-reg-heading"> 

          <h3> Vehicle Registration </h3>

       </div>

      </div> 

    </div>

</section>

<!--END OF LOADER REGISTRATION TOP HRTADING-->



<section>

  <div class="container">

     <div class="col-md-12" >

        <div class="loader-reg-stepper-1-style vehicle-registration"> 

          <img src="<?php echo base_url ; ?>images/vehicle-registration-stepper-2.png">

          <ul class="vehicle-sec">

             <li> Owner <br> Information </li>

             <li>  Contact <br> Information </li>

             <li> Company <br> Information </li>

             <li> Bank <br> Details </li>

             <li> Add <br> Truck </li>

          </ul>

       </div>

      </div> 

    </div>

</section>



<section class="form-section">

  <div class="container">

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

     <div class="pers-style-info">

     <h4> CONTACT INFORMATION </h4>

      </div>


		<form action="" method="POST">
      <div class="personal-information-form choose-type">



          

         <div class="row">

            <div class="col-md-12">

                <label> Address </label>

                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your Address ">

             </div>

         </div>

         <div class="row">

            <div class="col-md-6">

                <label> City </label>

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

                <label> Pincode  </label>

                <input type="text" maxlength="6" id="pincode" name="pincode" class="form-control" placeholder="Enter pincode ">

             </div>



         </div>



          <div class="row">

            <div class="col-md-6">

                <label>  Alternate Contact Person </label>

                <input type="text" id="altercontactperson"  name="altercontactperson" class="form-control" placeholder=" Enter Name ">

             </div>


   <div class="col-md-6">

                <label> Designation-(Owner/Manager/Partner) </label>

                <select class="form-control" name="designation" id="designation">
                   <option value=""> Select designation </option>
                   <option value="Owner"> Owner </option>
                   <option value="Manager"> Manager </option>
                   <option value="Partner"> Partner </option>

                </select>

             </div>
           
         </div>



          <div class="row">

              <div class="col-md-6">

                <label>  Alternate Mobile No.  </label>

                <input type="text" maxlength="10" name="altermobnumber" id="altermobnumber" class="form-control" placeholder=" Enter your Mobile Number ">

             </div>
             
        

            <div class="col-md-6 continue-btn">

              <div class="skip-tab">

                <a href="vehicle-registration-3">Skip</a>

               </div>

                

             </div>

         </div>


          <div class="row">

              <div class="col-md-6">
             </div>
             
            <div class="col-md-6 continue-btn"><button type="submit" name="vehicle_submit" class="cont-btn-style"> Continue </button>

             </div>

         </div>
      </div>
	  
	  </form>

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



</body>

</html>