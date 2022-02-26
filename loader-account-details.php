<?php   session_start();	
	ob_start(); 
	include("controls/define2.php");
	include("TBXadmin/include/config.php"); 
    if(!isset($_SESSION['user_id'])){
			echo "<META http-equiv='refresh' content='0;URL=index.php'>"; 
		}else{
			$user_id = $_SESSION['user_id']; 
		}
		if(isset($_POST['updatch'])){
			
				$old_password = $_POST["old_password"];
				$new_password = $_POST["new_password"]; 
				$re_password = $_POST["re_password"];
			
				$query = mysqli_query($dbhandle, "SELECT * FROM tbl_loader WHERE id = '".$_SESSION['user_id']."' AND BINARY password = '$old_password'");
				$count = mysqli_num_rows($query);
				if ($count > 0){
					$update = mysqli_query($dbhandle, "UPDATE tbl_loader SET password = '$new_password' WHERE id = '".$_SESSION['user_id']."'");
					$sms = '<p class="success-msg">Password updated Successfully</p>' ;
					}else{	
					$sms = '<p class="error-msg">Old Password is not matched!</p>' 
					;}}
					/*****update details*****/
					if(isset($_POST['loaderupdate'])){
						$name = $_POST["name"];  
						/* $email = $_POST["email"]; 
						$mobile = $_POST["mobile"]; **/ 
						$update = mysqli_query($dbhandle, "UPDATE tbl_loader SET name = '$name' WHERE id = '".$_SESSION['user_id']."'"); 
						$sms = '<p class="success-msg">User details updated Successfully</p>' ;
						}
$row = mysqli_query($dbhandle, "select * from tbl_loader WHERE id = '".$_SESSION['user_id']."'");
$fetch = mysqli_fetch_array($row);	$page_title = "My Account";	$seo_keyword = "My Account";	$seo_content = "My Account";	
 include("header.php");include("header-bottom.php");   //print_r($fetch) ;
?>
<!--end of top header bottom-->

<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12 mobile-zero-padding">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="<?php echo base_url ; ?>"> <img src="images/home.png"> </a></li>
       <li><a  class="bred-active"> Loader Dashboard </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
  <div class="main-dashboarsd-section">     
    <div class="container mobile-zero-padding">	<?php  if(isset($sms)){		echo $sms ;	}?>	
     <?php 	include 'loader_dashboard_side_menu.php';?>
 
       <div class="col-md-9 col-sm-6">	
       <div class="box-style-of-view-order">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')">PERSONAL INFORMATION</button>
  <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button>
</div>

<div id="London" class="tabcontent" style="display: block;"><form action="" method="post">
<div class="col-md-12">
  <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  <p>Name <span style="color:red;">*</span></p>
  </div>
  <div class="col-md-8">
    <input name="name" type="text" id="nameL" <?php echo ($fetch['name']!='')?'readonly':''; ?> class="form-control" placeholder="Name" value="<?php echo $fetch['name'];?>" >
  </div>
  <div class="col-md-1">
    
  </div>
  </div>


<div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  <p>Email Id <span style="color:red;">*</span></p>
  </div>
  <div class="col-md-8 paddinng">
    <input type="email" id="email"  readonly class="form-control" placeholder="Email" value="<?php echo $fetch['email'];?>" >
  </div>
  <div class="col-md-1">
    
  </div>
  </div>

  <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  <p>Mobile No. <span style="color:red;">*</span></p>
  </div>
  <div class="col-md-8">
    <input type="text" id="mobile" class="form-control" readonly placeholder="Mobile No." value="<?php echo $fetch['mb_no'];?>" >
  </div>
  <div class="col-md-1">
    
  </div>
  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
   <!--- <button type="button" class="edit-details-btn"> Edit Details </button>-->
    <button type="submit" name="loaderupdate" class="update-details-btn"> UPDATE DETAILS </button>
  </div>
  <div class="col-md-1">
    
  </div>
  </div>
  </div>
</form>
  </div>

<div id="Paris" class="tabcontent"><form action="" method="post">
  <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-3">
  <p> Current Password <span style="color:red;">*</span></p>
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
  <p> New Password <span style="color:red;">*</span></p>
  </div>
  <div class="col-md-7 ">
    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password" >
  </div>
  <div class="col-md-1">
    
  </div>
  </div>

   <div class="row">
  <div class="col-md-1">
    
  </div>
  <div class="col-md-3">
  <p> Confirm Password <span style="color:red;">*</span></p>
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
    <button type="submit" name="updatch"  class="update-password-btn "> CHANGE PASSWORD </button>
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


<?php include("footer.php"); ?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>		        <script type="text/javascript">            /* <![CDATA[ */      
      jQuery(function(){ 
		  jQuery("#nameL").validate({  
			  expression: "if (VAL) return true; else return false;",  
			  message: "Please Enter Loader Name"     
		  });  
		  jQuery("#mobile").validate({ 
			  expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",
			  message: "Your Phone Number in correct format" 
		  });    
		  jQuery("#email").validate({  
			  expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;", 
			  message: "Please enter a valid Email ID"  
		  });		
		  jQuery("#old_password").validate({  
			  expression: "if (VAL) return true; else return false;",   
			  message: "Please Enter Old Password"    
		  });						
		  jQuery("#new_password").validate({   
			  expression: "if (VAL.length > 5 && VAL) return true; else return false;",
			  message: "Please enter a valid Password Min 5 Character"     
		  });		
		  jQuery("#re_password").validate({     
			  expression: "if ((VAL == jQuery('#new_password').val()) && VAL) return true; else return false;",              
			  message: "Confirm password doesn't match"    
		  });					
	  });            /* ]]> */        </script>

</body>
</html>