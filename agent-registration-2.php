<?php include('header.php');

if(isset($_POST['submit'])){

 $address = $_POST['address'];

         $city = $_POST['city'];

        $pincode = $_POST['pincode'];

        $designation = $_POST['designation'];

       // $landline_no = $_POST['landline_no'];

   

   $altercontactperson = $_POST['altercontactperson'];

        $altermobnumber = $_POST['altermobnumber'];

      

        //$trucktype = $_POST['trucktype'];



        $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET address = '$address', city = '$city', pincode = '$pincode', designation = '$designation'

    , alt_contact_person = '$altercontactperson', alt_mb_no = '$altermobnumber'  WHERE vehicle_owner_id = '".$_SESSION['id']."'");

      }

 ?>

<!--end of top header bottom-->

<!--START OF BREADCRUMB-->

<section>

<div class="container">

<div class="col-md-12">

  <div class="breadcrumb-section">

    <ul>

       <li><a href="#"> <img src="images/home.png"> </a></li>

       <li><a href="#" class="bred-active"> Vehicle Registration </a></li>

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

          <img src="images/vehicle-registration-stepper-2.png">

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



      <div class="personal-information-form choose-type">



          

         <div class="row">

            <div class="col-md-12">

                <label> Address </label>

                <input type="text" name="address" class="form-control" placeholder=" Enter your Address ">

             </div>

         </div>

         <div class="row">

            <div class="col-md-6">

                <label> City </label>

                <select class="form-control" name="city">

                   <option> Enter Your City  </option>

                   <option> New Delhi </option>

                </select>

             </div>



             <div class="col-md-6">

                <label> Pincode  </label>

                <input type="text" name="pincode" class="form-control" placeholder=" Enter pincode ">

             </div>



         </div>



          <div class="row">

            <div class="col-md-6">

                <label>  Alternate contact person </label>

                <input type="text" name="altercontactperson" class="form-control" placeholder=" Enter Name ">

             </div>


   <div class="col-md-6">

                <label>  Alternate mobile no.  </label>

                <input type="text" name="altermobnumber" class="form-control" placeholder=" Enter your Mobile Number ">

             

             </div>
           
         </div>



         <div class="row">
            <div class="col-md-6">
                <label> Pan Card No. </label>
                <input type="text" name="pan-number" class="form-control" placeholder="Enter No.">
             </div>

             <div class="col-md-6">
                <div class="truck-permit">
           <p></p>
            <span class="file-style-truck other-info file-1"> File name goes here </span><input name="file-5[]" id="file-5" class="inputfile8 inputfile-5" data-multiple-caption="{count} files selected" multiple="" type="file">
            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
                
             </div>
             
         </div>
            <div class="row">
            <div class="col-md-6">
                <label> Aadhar No. </label>
                <input type="text" name="pan-number" class="form-control" placeholder="Enter No.">
             </div>

             <div class="col-md-6">
                <div class="truck-permit">
           <p></p>
            <span class="file-style-truck other-info file-1"> File name goes here </span><input name="file-5[]" id="file-5" class="inputfile8 inputfile-5" data-multiple-caption="{count} files selected" multiple="" type="file">
            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>
        </div>
                
             </div>
             
         </div>



          <div class="row">

              <div class="col-md-6">
             </div>
             
            <div class="col-md-6 continue-btn">
 <button type="button" class="cont-btn-style"> Continue </button>

             </div>

         </div>
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



</body>

</html>