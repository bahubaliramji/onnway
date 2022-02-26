<?php include('header.php'); 

if(isset($_POST['submit'])){

    $name = $_POST["name"];

     $mobile = $_POST["mobile"];

    $email = $_POST["email"];

    $optradio = $_POST["optradio"];

   // print_r( $optradio);

    $password = $_POST["password"];

   $re_password = $_POST["re_password"];



/*   $check=mysql_num_rows(mysql_query("SELECT * FROM tbl_loader WHERE email = '$email'"));

if ($check >0 && $password==$re_password)

{

    echo "User Already Exists or Password not Matched";

}

  

  else

{*/

   $query = mysqli_query($dbhandle, "Insert INTO tbl_loader(name,loader_type,mb_no,email,password)VALUE('".$name."','".$optradio."','".$mobile."','".$email."'

    ,'".$password."')");

  // header("refresh:1;url=loader-registration-2.php");

  // header("Location: loader-registration-2.php");

// }

 

 }

?>

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

          <img src="images/transport-registration-stepper-1.png">

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

           <h3> SELECT TYPE &nbsp; &nbsp;  | <span class="radio-tab"> <form action="" method="post">

    <label class="radio-inline">

      <input type="radio" name="optradio" checked> Vehicle Owner

    </label>

<label class="radio-inline">

      <input type="radio" name="optradio">  Transporter/ Agent

    </label>

     </span></h3>

     <div class="pers-style-info">

     <h4> PERSONAL INFORMATION </h4>

      </div>



      <div class="personal-information-form choose-type">



          <div class="row">

            <div class="col-md-12">

                <label> First Name </label>

                <input type="text" name="name" class="form-control" placeholder="Enter your First Name">

             </div>

             

         </div>

            <div class="row">

            <div class="col-md-12">

                <label> Last Name </label>

                <input type="text" name="name" class="form-control" placeholder="Enter your Last Name">

             </div>

             

         </div>



         <div class="row">

            <div class="col-md-6">

                <label> Mobile Number </label>

                <input type="text" name="mobile" class="form-control" placeholder="Enter your Mobile Number">

             </div>



             <div class="col-md-6">

                <label> Aadhar Number  </label>

                <input type="text" name="name" class="form-control" placeholder="Enter your Aadhar Number">

             </div>



         </div>



         <div class="row">
<div class="col-md-6">
         <label> Email Id   </label>

                <input type="email" name="email" class="form-control" placeholder="Enter your Email id">
</div>
            <div class="col-md-6">

                <label> Password </label>

                <input type="password" name="password" class="form-control" placeholder="Enter your password">

             </div>

         </div>

          <div class="row">
          <div class="col-md-6">

                <label> Retype password   </label>

                <input type="password" name="re_password" class="form-control" placeholder=" Enter your Retype password ">

             </div>

            <div class="col-md-6 continue-btn">

              <!-- <div class="skip-tab">

                <a href="vehicle-registration-2.php">Skip</a>

               </div>-->

             </div>
             </div>

               <div class="row">
          <div class="col-md-6">
             </div>

            <div class="col-md-6 continue-btn">

              <!-- <div class="skip-tab">

                <a href="vehicle-registration-2.php">Skip</a>

               </div>-->

                <button type="button" name="submit" class="cont-btn-style"> Continue </button>

             </div>
             </div>
              </form>

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



<!--END OF POP UP-->

<div class="overlay">

      </div>



<?php include('footer.php'); ?>



</body>

</html>