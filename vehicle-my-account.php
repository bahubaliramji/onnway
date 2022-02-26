<?php   session_start();		
ob_start(); 
include("controls/define2.php");
  include("TBXadmin/include/config.php");     
  if(!isset($_SESSION['vehicle_id'])  || $_SESSION['vehicle_id']==""){
	  header("location:index.php");
	  }
	  else{	
	  $user_id = $_SESSION['vehicle_id']; 
  }
  if(isset($_POST['update_pass'])){
  $old_password = $_POST["old_password"];   
  $new_password = $_POST["new_password"];   
  $re_password = $_POST["re_password"];
  if($new_password == $re_password){
	  if($old_password != $new_password){
	  $query = mysqli_query($dbhandle, "SELECT * FROM tbl_vehicle_owner WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."' AND BINARY password = '$old_password'");
	  $count = mysqli_num_rows($query);
	  if ($count > 0){
				$update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET password = '$new_password' WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."'");
				$sms = '<p class="success-msg">Password updated Successfully</p>' ;
		  }
		  else{
			  $sms = '<p class="error-msg">Old Password is not matched!</p>' ;
		  }
	  }else{
		   $sms = '<p class="error-msg">Old and New Password can\'t be same!</p>' ;
	  }
  }else{
		 $sms = '<p class="error-msg">New Password is not matched iwth confirm password!</p>' ;
  }
}/*****update details*****/

if(isset($_POST['update_account'])){
	  $name = $_POST["name"];     
	  $last_name = $_POST["last_name"]; 
	  $aadhar_no = $_POST["aadhar_no"]; 
	  $update = mysqli_query($dbhandle, "UPDATE tbl_vehicle_owner SET name = '$name',  last_name = '$last_name', aadhar_no = '$aadhar_no' WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."'");  
	  $sms = '<p class="success-msg">User details updated Successfully</p>' ;
}


$row_sql = mysqli_query($dbhandle, "select * from tbl_vehicle_owner WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."'");
$fetch_result = mysqli_fetch_array($row_sql);

$page_title = "My Account";
$seo_keyword = "My Account";	
$seo_content = "My Account";	
 include("header.php"); 
 include("header-bottom.php"); 
 //print_r($fetch) ;
?>
<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12 mobile-zero-padding">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="<?php echo base_url ; ?>"> <img src="images/home.png"> </a></li>
       <li><a  class="bred-active"> Vehicle Dashboard </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
  <div class="main-dashboarsd-section">     
    <div class="container mobile-zero-padding">	
	<?php  if(isset($sms)){		echo $sms ;	} ?>	
       <div class="col-md-4">
          <div class="vendor-dashboard-section">
            <h4>VEHICLE DASHBOARD</h4>
          </div>
          <div class="dashboad-details">
            <?php include('include/vehicle-sidebar.php') ; ?>
          </div>
       </div>
 
       <div class="col-md-7 border-crt">	
       <div class="box-style-of-view-order col-md-12 zero-padding">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')">Personal Information</button>
  <button class="tablinks tewblink" onclick="openCity(event, 'Paris')">Change Password</button>
</div>

<div id="London" class="tabcontent" style="display: block;">
<form action="" method="post">

<div class="personal-information-form choose-type col-md-12 zero-padding">

         <div class="col-md-12 mobile-zero-padding">

          <div class="row">
<div class="col-md-12">
            <div class="col-md-6">

                <label> First Name <span style="color:red">*</span></label>

                <input type="text" name="name" <?php echo ($fetch_result['name']!='')?'readonly':''; ?> id="fname" value="<?php echo $fetch_result['name']; ?>" class="form-control" placeholder="Enter your First Name">

             </div>

             

               <div class="col-md-6">

                <label> Last Name </label>

                <input name="last_name" type="text" <?php echo ($fetch_result['last_name']!='')?'readonly':''; ?> id="lname" value="<?php echo $fetch_result['last_name']; ?>" class="form-control" placeholder="Enter your Last Name">

             </div>

              </div> 

         </div>



         <div class="row">
<div class="col-md-12">
            <div class="col-md-6">

                <label> Mobile Number <span style="color:red">*</span></label>

                <input type="text" id="ve_mobile" value="<?php echo $fetch_result['mb_no']; ?>" class="form-control" placeholder="Enter your Mobile Number" readonly>

             </div>



             <div class="col-md-6">

                <label> Aadhar Number  <span style="color:red">*</span></label>

                <input name="aadhar_no" type="text" <?php echo ($fetch_result['aadhar_no']!='')?'readonly':''; ?> maxlength="12" id="aadhar_no" value="<?php echo $fetch_result['aadhar_no']; ?>" class="form-control" placeholder="Enter your Aadhar Number">

             </div>

</div>

         </div>

        

         <div class="row">
			<div class="col-md-12">
			<div class="col-md-12">
         <label> Email Id   <span style="color:red">*</span></label>

                <input type="email" id="ve_email" class="form-control" value="<?php echo $fetch_result['email']; ?>" readonly placeholder="Enter your Email id">
</div>
          
             </div>
         </div>

          

               <div class="row">
           <div class="col-md-12">        
          <div class="col-md-6">
             </div>

            <div class="col-md-6 continue-btn">

                <button type="submit" name="update_account" class="cont-btn-style"> Continue </button>

             </div>
               </div>
             </div>
              
       </div>
         </div>
  
  
</form>
  </div>

<div id="Paris" class="tabcontent new-tab-c"><form action="" method="post">
  <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-3">
  <p> Current Password <span style="color:red">*</span> </p>
  </div>
  <div class="col-md-7">
    <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Password" >
  </div>
  <div class="col-md-1">
    
  </div>
  </div>

  <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-3">
  <p> New Password  <span style="color:red">*</span></p>
  </div>
  <div class="col-md-7">
    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password" >
  </div>
  <div class="col-md-1">
    
  </div>
  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-3">
  <p> Confirm Password <span style="color:red">*</span> </p>
  </div>
  <div class="col-md-7">
    <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Confirm Password" >
  </div>
  <div class="col-md-1">
    
  </div>
  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-3">
  </div>
  <div class="col-md-7">
    <button type="submit" name="update_pass"  class="update-password-btn"> Update </button>
  </div>
  <div class="col-md-1">
    
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
$('.edit-details-btn').click(function () {
   $('.tabcontent  input[type="text"], .tabcontent input[type="email"], .tabcontent input[type="radio"], .edit-detail textarea, .tabcontent select').removeAttr('disabled');
return false;
})

</script>

<script>
$(".edit-details-btn").click(function(){
$(".update-details-btn").css('display','block');
$(".edit-details-btn").css('display','none');
});

</script>


<?php include("footer.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript"></script>
<script type="text/javascript">
   /* <![CDATA[ */
   jQuery(function() {
       jQuery("#fname").validate({
           expression: "if (VAL) return true; else return false;",
           message: "Please Enter First Name"
       });
	  /*  jQuery("#lname").validate({
           expression: "if (VAL) return true; else return false;",
           message: "Please Enter Last Name"
       }); */
       jQuery("#aadhar_no").validate({
           expression: "if (VAL.length > 11 && VAL.match(/^[0-9]*$/)) return true; else return false;",
           message: "Your Aadhar Number is Invalid"
       });
       /* jQuery("#email").validate({
           expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
           message: "Please enter a valid Email ID"
       }); */
       jQuery("#old_password").validate({
           expression: "if (VAL) return true; else return false;",
           message: "Please Enter Old Password"
       });
       jQuery("#new_password").validate({
           expression: "if (VAL.length > 5 && VAL) return true; else return false;",
           message: "Please enter a valid Password min. 5 Character"
       });
       jQuery("#re_password").validate({
           expression: "if ((VAL == jQuery('#new_password').val()) && VAL) return true; else return false;",
           message: "Confirm password doesn't match"
       });
   }); /* ]]> */
</script>

</body>
</html>