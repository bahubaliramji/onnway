<?php include('header.php'); 

if(isset($_POST['submit'])){

  $truck_reg_no = $_POST['truck_reg_no'];

         $driver_name = $_POST['driver_name'];

         $driver_mb_no = $_POST['driver_mb_no'];

         $aadhar_no = $_POST['aadhar_no'];

         $bank_details = $_POST['bank_details'];

         $truck_type = $_POST['truck_type'];

        // $fitness_certificate = $_POST['fitness_certificate'];

         $route = $_POST['route'];

    

  $path = $base_url."upload/vehicle_documents/";

  $truck_permit =$_FILES['truck_permit']['name'];

  $tmp_path = $_FILES['truck_permit']['tmp_name'];

  $driver_certificate =$_FILES['driver_certificate']['name'];

  $tmp_path = $_FILES['driver_certificate']['tmp_name'];

  $truck_reg_file =$_FILES['truck_reg_file']['name'];

  $tmp_path = $_FILES['truck_reg_file']['tmp_name'];



  $dl_file =$_FILES['dl_file']['name'];

  $tmp_path = $_FILES['dl_file']['tmp_name'];

  $aadhar_file =$_FILES['aadhar_file']['name'];

  $tmp_path = $_FILES['aadhar_file']['tmp_name'];

  $fitness_certificate =$_FILES['fitness_certificate']['name'];

  $tmp_path = $_FILES['fitness_certificate']['tmp_name'];



  move_uploaded_file($tmp_path,$path.$truck_permit);

   move_uploaded_file($tmp_path,$path.$driver_certificate); 

   move_uploaded_file($tmp_path,$path.$truck_reg_file); 



 move_uploaded_file($tmp_path,$path.$dl_file);

   move_uploaded_file($tmp_path,$path.$aadhar_file); 

   move_uploaded_file($tmp_path,$path.$fitness_certificate);

       $truck_insurance = $_POST['truck_insurance'];

       





  $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET truck_reg_no = '$truck_reg_no', driver_name = '$driver_name', d_mb_no = '$driver_mb_no', aadhar_voter_id = '$aadhar_no' , bank_details = '$bank_details', truck_type = '$truck_type', truck_reg_file = '$truck_reg_file', dl_file = '$dl_file', aadhar_file = '$aadhar_file', f_certificate = '$fitness_certificate', route = '$route' , truck_permit = '$truck_permit', driver_certificate = '$driver_certificate' , truck_insurance = '$truck_insurance'  WHERE vehicle_owner_id = '$id'");

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

          <img src="images/vehicle-registration-stepper-5.png">

          <ul class="vehicle-sec">

             <li> Owner <br> Information </li>

             <li class="contact-color">  Contact <br> Information </li>

             <li class="contact-color"> Company <br> Information </li>

             <li class="contact-color"> Bank <br> Details </li>

             <li class="contact-color"> Add <br> Truck </li>

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

     <div class="pers-style-info">

     <h4> ADD TRUCK </h4>

      </div>



      <div class="personal-information-form choose-type">



          <div class="row">

            <div class="col-md-8">

                <label> Bank Name  </label>

                 <select class="form-control">

                   <option> Select your bank  </option>

                   <option>SBI</option>

                   

                </select>

             </div>

      <div class="col-md-4">

         <div class="truck-permit">

           <p></p>

            <input name="file-5[]" id="file-5" class="inputfile10 inputfile-5" data-multiple-caption="{count} files selected" multiple="" type="file">

            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>

      </div>

    

         </div>



         <div class="row">

            <div class="col-md-12">

                <label> Driver name </label>

               <input type="text" name="driver-name" class="form-control" placeholder=" Enter driver name ">

             </div>



             



         </div>



          <div class="row">

            <div class="col-md-6">

                <label>  Driver mobile no. </label>

                <input type="text" name="driver-mobile" class="form-control" placeholder=" Enter Driver mobile no. ">

             </div>



             <div class="col-md-6">

                 <label> Aadhar number </label>

                 <input type="text" name="aadhar-no" class="form-control" placeholder=" Enter your aadhar no. ">

             </div>



         </div>



         <div class="row">

            <div class="col-md-12">

                <label>  Bank details </label>

                <input type="text" name="driver-mobile" class="form-control" placeholder=" Enter Driver mobile no. ">

             </div>



         </div>



         <div class="row">

            <div class="col-md-6">

                <label>  Select truck type </label>

                  <select class="form-control">

                     <option>Select truck type</option>

                  </select>

             </div>



             <div class="col-md-6">

                 <label> Load passing  </label>

                 <input type="text" name="load-passing" class="form-control" placeholder=" Enter Load passing ">

             </div>



         </div>




               <div class="row">

            <div class="col-md-8">

                <label> Fitness certificate  </label>

                 <input type="text" name="fitness-certificate" class="form-control" placeholder=" Upload fitness certificate">

             </div>

      <div class="col-md-4">

         <div class="truck-permit">

           <p></p>

            <input name="file-5[]" id="file-5" class="inputfile10 inputfile-5" data-multiple-caption="{count} files selected" multiple="" type="file">

            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>

      </div>

    

         </div>



           <div class="row">

            <div class="col-md-12">

                <label>  Operate your route </label>

                <input type="text" name="operate-route" class="form-control" placeholder=" Enter to operate your route. ">

             </div>



         </div>



         <div class="row">

            <div class="col-md-8">

                <label> Truck Permit  </label>

                 <input type="text" name="truck-permit" class="form-control" placeholder=" Upload truck permit ">

             </div>

      <div class="col-md-4">

         <div class="truck-permit">

           <p></p>

            <input name="file-5[]" id="file-5" class="inputfile10 inputfile-5" data-multiple-caption="{count} files selected" multiple="" type="file">

            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>

      </div>

    

         </div>



           <div class="row">

            <div class="col-md-8">

                <label> Authorised driver certificate by owner  </label>

                 <input type="text" name="driver-certificate" class="form-control" placeholder=" Upload Driver certificate ">

             </div>

      <div class="col-md-4">

         <div class="truck-permit">

           <p></p>

            <input name="file-5[]" id="file-5" class="inputfile10 inputfile-5" data-multiple-caption="{count} files selected" multiple="" type="file">

            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>

      </div>

    

         </div>



         <div class="row">

            <div class="col-md-8">

                <label> Truck insurance & validity </label>

                 <input type="text" name="insurance-validity" class="form-control" placeholder=" Upload truck insurance ">

             </div>

      <div class="col-md-4">

         <div class="truck-permit">

           <p></p>

            <input name="file-5[]" id="file-5" class="inputfile10 inputfile-5" data-multiple-caption="{count} files selected" multiple="" type="file">

            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>

        </div>

      </div>

    

         </div>



          <div class="row">

            <div class="col-md-12 continue-btn">

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



<div class="complete-reg-pop-up" >

      <div class="col-md-12">

        <div class="close-btn">

          <p>X</p>

        </div>

      </div>

    

    <div class="col-md-12">

        <div class="success-img-style check-img">

           <img src="images/success-img.png">

        </div>

      </div>



      <div class="col-md-12">

        <div class="thankyou-reg registration-style">

          <h6> Thank You for <span class="reg-color"> Registration ! <span> </h6>

        </div>

      </div>



       <div class="col-md-12">

        <div class="con-btn text-center">

          <button type="button" class="con-btn-style"> Continue To Update </button>

          <p><a href="#">Skip this step</a></p>

        </div>

      </div>



    </div>



<!--END OF POP UP-->



<div class="overlay">

      </div>





<?php include("footer.php") ;?>

</body>

</html>