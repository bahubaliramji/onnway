<?php include('header.php'); 

if(isset($_POST['submit'])){

$bank_name = $_POST['bank_name'];

$branch_address = $_POST['branch_address'];

$benificiary_name = $_POST['benificiary_name'];

$acc_no = $_POST['acc_no'];

  $ifsc_code = $_POST['ifsc_code'];

       

       

 $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET bank_name = '$bank_name', branch_address = '$branch_address', benificiary_name = '$benificiary_name', acc_no = '$acc_no' , ifsc_code = '$ifsc_code'  WHERE vehicle_owner_id = '$id'");

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

          <img src="images/vehicle-registration-stepper-4.png">

          <ul class="vehicle-sec">

             <li> Owner <br> Information </li>

             <li class="contact-color">  Contact <br> Information </li>

             <li class="contact-color"> Company <br> Information </li>

             <li class="contact-color"> Bank <br> Details </li>

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

     <div class="pers-style-info">

     <h4> BANK DETAILS </h4>

      </div>



      <div class="personal-information-form choose-type">



          <div class="row">

            <div class="col-md-6">

                <label> Bank Name  </label>

                 <select class="form-control" name="bank_name">

                   <option> Select your bank  </option>

                   <option>SBI</option>

                   

                </select>

             </div>

      <div class="col-md-6">

      </div>

    

         </div>



         <div class="row">

            <div class="col-md-6">

                <label> Branch Address</label>
                <input type="text" name="" class="form-control" placeholder="Enter branch address">

             </div>

  <div class="col-md-6">
                <label> IFSC Code  </label>
                <input type="text" name="ifsc_code" class="form-control" placeholder=" EnterIFSC code ">
             </div>
  </div>



          <div class="row">

            <div class="col-md-6">

                <label>  Beneficiery Name </label>

                <input type="text" name="benificiary_name" class="form-control" placeholder=" Enter Name ">

             </div>



             <div class="col-md-6">

                 <label> Account No. </label>

                 <input type="text" name="acc_no" class="form-control" placeholder=" Enter No. ">

             </div>



         </div>



          <div class="row">

            <div class="col-md-12 continue-btn">

               <!-- <div class="skip-tab">

                <a href="vehicle-registration-5.php">Skip</a>

               </div>-->

                <button type="button" name="submit" class="cont-btn-style"> Continue </button>

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



<?php include("footer.php") ;?>

</body>

</html>