<?php   session_start();
		ob_start();
 include("controls/define2.php"); 
 include("TBXadmin/include/config.php"); 

   if($_SESSION['vehicle_id']==""){
	 echo "<META http-equiv='refresh' content='0;URL=index.php'>";
 }else{
	  $user_id = $_SESSION['user_id'];
 } 
 if($_SESSION['vehicle_owner_type']!="owner"){
	header("location:vehicle-my-account.php"); 
 }
 $path = $base_url."upload/vehicle_documents/";
/* if(isset($_POST['add_truck'])){
 
		$truck_reg_no = $_POST['truck_reg_no'];
        $driver_name = $_POST['driver_name'];
        $mobile_no = $_POST['driver_mobile_no'];
        $dl = $_POST['dl'];
        $aadhar_no = $_POST['aadhar_no'];
        $bank_details = $_POST['bank_details'];
        $truck_type = $_POST['truck_type'];
        $load_passing = $_POST['load_passing'];
        $fitness_cert_no = $_POST['fitness_cert_no'];
        $truck_permit_no = $_POST['truck_permit_no'];
        $auth_driver_cert_no = $_POST['auth_driver_cert_no'];
        $auth_driver_cert_no = $_POST['auth_driver_cert_no'];
        $truck_validity = $_POST['truck_validity'];

		$random_key = strtotime(date('Y-m-d H:i:s'));
		
  $insert = mysql_query("Insert INTO tbl_trucks(vehicle_owner_id, truck_reg_no, truck_type, load_passing,  truck_permit_no, truck_validity, driver_name, mobile_no, dl, aadhar_no, fitness_cert_no,auth_driver_cert_no, created_date)VALUE('".$_SESSION['vehicle_id']."','".$truck_reg_no."','".$truck_type."','".$load_passing."','".$truck_permit_no."','".$truck_validity."','".$driver_name."','".$mobile_no."','".$dl."','".$aadhar_no."','".$fitness_cert_no."','".$auth_driver_cert_no."','".date('d-m-Y')."')");
	
	$truck_id = mysql_insert_id();
	if(!empty($_FILES['truck_reg_file']['name'])){
			$truck_reg_file =$_FILES['truck_reg_file']['name'];
			$truck_reg_file = rand().$random_key.'-'.$truck_reg_file;
			$truck_reg_tmp = $_FILES['truck_reg_file']['tmp_name'];
			 move_uploaded_file($truck_reg_tmp,$path.$truck_reg_file);
			 $truck_reg_file = ", truck_reg_file = '$truck_reg_file'";
		}else{
			$truck_reg_file = "";
		}
		if(!empty($_FILES['truck_permit_file']['name'])){
			$truck_permit_file =$_FILES['truck_permit_file']['name'];
			$truck_permit_file = rand().$random_key.'-'.$truck_permit_file;
			$truck_permit_tmp = $_FILES['truck_permit_file']['tmp_name'];
			 move_uploaded_file($truck_permit_tmp,$path.$truck_permit_file);
			 $truck_permit_file = ", truck_permit_file = '$truck_permit_file'";
		}else{
			$truck_permit_file = "";
		}
		
		if(!empty($_FILES['insurance_file']['name'])){
			$insurance_file =$_FILES['insurance_file']['name'];
			$insurance_file = rand().$random_key.'-'.$insurance_file;
			$insurance_tmp = $_FILES['insurance_file']['tmp_name'];
			move_uploaded_file($insurance_tmp,$path.$insurance_file);
			$insurance_file = ", insurance_file = '$insurance_file'";
		}else{
			$insurance_file = "";
		}
		
		if(!empty($_FILES['fitness_cert_file']['name'])){
			$fitness_cert_file =$_FILES['fitness_cert_file']['name'];
			$fitness_cert_file = rand().$random_key.'-'.$fitness_cert_file;
			$fitness_cert_tmp = $_FILES['fitness_cert_file']['tmp_name'];
			move_uploaded_file($fitness_cert_tmp,$path.$fitness_cert_file);
			$fitness_cert_file = ", fitness_cert_file = '$fitness_cert_file'";
		}else{
			$fitness_cert_file = "";
		}
		
		if(!empty($_FILES['auth_driver_cert_file']['name'])){
			$auth_driver_cert_file =$_FILES['auth_driver_cert_file']['name'];
			$auth_driver_cert_file = rand().$random_key.'-'.$auth_driver_cert_file;
			$auth_driver_cert_tmp = $_FILES['auth_driver_cert_file']['tmp_name'];
			move_uploaded_file($auth_driver_cert_tmp,$path.$auth_driver_cert_file);
			$auth_driver_cert_file = ", auth_driver_cert_file = '$auth_driver_cert_file'";
		}else{
			$auth_driver_cert_file = "";
		}
		
		if(!empty($_FILES['dl_file']['name'])){
			$dl_file =$_FILES['dl_file']['name'];
			$dl_file = rand().$random_key.'-'.$dl_file;
			$$dl_tmp = $_FILES['dl_file']['tmp_name'];
			move_uploaded_file($$dl_tmp,$path.$dl_file);
			$dl_file = ", dl_file = '$dl_file'";
		}else{
			$dl_file = "";
		}
		
		if(!empty($_FILES['aadhar_file']['name'])){
			$aadhar_file =$_FILES['aadhar_file']['name'];
			$aadhar_file = rand().$random_key.'-'.$aadhar_file;
			$aadhar_tmp = $_FILES['aadhar_file']['tmp_name'];
			move_uploaded_file($aadhar_tmp,$path.$aadhar_file);
			$aadhar_file = ", aadhar_file = '$aadhar_file'";
		}else{
			$aadhar_file = "";
		}

  $update = mysql_query("UPDATE tbl_trucks SET status='1' $truck_reg_file  $truck_permit_file $insurance_file  $fitness_cert_file $auth_driver_cert_file $dl_file $aadhar_file where vehicle_owner_id = '".$_SESSION['vehicle_id']."' and id='".$truck_id."'");
  if(!empty($_POST['route_operate'])){
			for($i=0;$i<count($_POST['route_operate']);$i++){
				  mysql_query("INSERT INTO tbl_truck_destination(trucks_id, destination_id)VALUES('$truck_id','".$_POST['route_operate'][$i]."')"); 
				 
			}
		} 
		

$sms = '<p class="success-msg">Truck added Successfully</p>' ;
} */	
$query = mysqli_query($dbhandle, "SELECT * FROM tbl_trucks WHERE vehicle_owner_id = '".$_SESSION['vehicle_id']."' and id='".$_GET['truck_id']."'");
 $count = mysqli_num_rows($query);
 if ($count > 0){
	$rowU =  mysqli_fetch_array($query);
 }else{
	 header("location:my-truck.php");
 }
 

 
 	$page_title = "View Truck";
	$seo_keyword = "View Truck";
	$seo_content = "View Truck";
	
	 include("header.php"); 
	 include("header-bottom.php"); 
 ?>
 
<!--end of top header bottom-->
<!--START OF BREADCRUMB-->
<section>
<div class="container">
<div class="col-md-12">
  <div class="breadcrumb-section">
    <ul>
       <li><a href="<?php echo base_url ; ?>"> <img src="<?php echo base_url ; ?>images/home.png"> </a></li>
       <li><a class="bred-active"> Vendor Dashboard </a></li>
    </ul>
  </div>
  </div>
</div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
  <div class="main-dashboarsd-section style-dash">
    <div class="container">
	<?php  if(isset($sms)){		echo $sms ;	}?>
       <div class="col-md-4">
          <div class="vendor-dashboard-section">
            <h4>USER DASHBOARD</h4>
          </div>
          <div class="dashboad-details">
             <?php include('include/vehicle-sidebar.php') ; ?>
          </div>
       </div>
 
       <div class="col-md-7">
       <div class="box-style-of-truck-info-style">
 <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'London')"> View Truck </button>
  
</div>
<form action="" method="POST" enctype="multipart/form-data" > 
<div id="London" class="tabcontent information" style="display: block;">
<div class="row">

            <div class="col-md-12">
<div class="panel-group" id="accordion1">
      <div class="accordion-container-1">
  <div class="set1">
    <a href="#" id="truck_link_id" class="active">
      View TRUCK INFORMATION
      <!--<i class="fa fa-plus"></i>-->
    </a>
    <div class="content-1" id="truck_field">
       <div class="personal-information-section vehicle-reg-style"> 
     

      <div class="personal-information-form choose-type">

          <div class="row">

            <div class="col-md-6">
<div class="col-md-12">
<div class="col-md-12">
                <label>  Select Truck Type </label>

                  <select class="form-control" name="truck_type"  id="truck_type" readonly>

                     <option value="">Select truck type</option>
					 <?php 
                                 $roww = mysqli_query($dbhandle, "select vehicle_category,id from tbl_trucktype");
									while($fetchh = mysqli_fetch_array($roww)){
									?>
							<optgroup label="<?php echo $fetchh['vehicle_category'];?>">
							<?php $rowtruck = mysqli_query($dbhandle, "select * from vehicle_list where status = 1 and vehicle_type='".$fetchh['id']."' order by length asc ");
									while($fetchhh = mysqli_fetch_array($rowtruck)){
										if($fetchh['id']==2){
											
										?>
											<option value="<?php echo $fetchhh['id'];?>" <?php echo ($rowU['truck_type']==$fetchhh['id'])?'selected':'';?>><img src="upload/vechile_image/<?php echo $fetchhh['pimage'];?>"><?php if($fetchhh['sub_type']=='1'){ echo "Flat Bed - ";} if($fetchhh['sub_type']=='2'){ echo "Semi Bed - ";} echo $fetchhh['length'];?> MT /<?php echo $fetchhh['dimension'];?></option>
								<?php	}else{?>
											<option value="<?php echo $fetchhh['id'];?>" <?php echo ($rowU['truck_type']==$fetchhh['id'])?'selected':'';?>><img src="upload/vechile_image/<?php echo $fetchhh['pimage'];?>"><?php echo $fetchhh['length'];?> MT /<?php echo $fetchhh['dimension'];?></option>
							<?php	
										}
									} ?>
							</optgroup>
								
						<?php } ?>
                  </select>

             </div>



             <div class="col-md-6">

                 <label> Load Passing  </label>

                 <input type="text" name="load_passing"  id="load_passing"  class="form-control"  value="<?php echo $rowU['load_passing'];?>" placeholder=" Enter Load passing " readonly>

             </div>

                </div>
              </div>
         </div>
		<!--<div class="row">

            <div class="col-md-12">

                <label>  Operate your route </label>

                
				<select name="route_operate[]" class="form-control select2" id="route_operate" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">				
					 <?php $row = mysqli_query($dbhandle, "select * from tbl_city order by city_name ");
							while($fetch = mysqli_fetch_array($row)){ ?>
								<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['city_name'];?></option>
							<?php } ?>
				</select>
             </div>



         </div>-->
		 <div class="row">

            <div class="col-md-8">
                <div class="col-md-12">
                <div class="col-md-12">

                <label> Truck Permit No </label>

                 <input type="text" name="truck_permit_no" id="truck_permit_no" value="<?php echo $rowU['truck_permit_no'];?>" class="form-control" placeholder="Truck Permit no " readonly>
                </div>
                </div>
             </div>

      <div class="col-md-4">
 <div class="col-md-12">
                <div class="col-md-12">
         <div class="truck-permit">

           <p><?php if(!empty($rowU['truck_permit_file'])){?><a href="<?php echo $path.$rowU['truck_permit_file'];?>" target="_blank">Download File</a><?php }else{ echo "No file Uploaded";}?></p>

            <!--<input name="truck_permit_file" id="file-7" class="fileUpload inputfile10 inputfile-5"  type="file">

            <label for="file-7"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>-->

        </div>

      </div>
          </div>

      </div>

    

         </div>
         

          <div class="row">

            <div class="col-md-8">
 <div class="col-md-12">
 <div class="col-md-12">
                <label> TRUCK REGISTRATION NUMBER  </label>

                <input type="text" name="truck_reg_no" id="truck_reg_no" class="form-control" value="<?php echo $rowU['truck_reg_no'];?>" readonly placeholder="Truck Registration Number ">
                </div>
             </div>
              </div>
      <div class="col-md-4">
           <div class="col-md-12">
                <div class="col-md-12">

         <div class="truck-permit">

           <p>   <?php if(!empty($rowU['truck_reg_file'])){?><a href="<?php echo $path.$rowU['truck_reg_file'];?>"  target="_blank">Download File</a><?php }else{ echo "No file Uploaded";}?></p>

            <!--<input name="truck_reg_file" id="file-5" class="fileUpload inputfile10 inputfile-5"  type="file">

            <label for="file-5"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>-->

        </div>

      </div>
          </div>

      </div>

    

         </div>

          <div class="row">

            <div class="col-md-8">
 <div class="col-md-12">
 <div class="col-md-12">
                <label> Truck validity & Insurance Upto</label>
					<div class='input-group date'>
                    <input type='text' class="date-style form-control" readonly value="<?php echo $rowU['truck_validity'];?>" name="truck_validity" id="datepicker" placeholder=" Truck Validity Date" />
                    <span class="input-group-addon">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </span>
                </div>
                </div>
             </div>
              </div>
      <div class="col-md-4">
           <div class="col-md-12">
                <div class="col-md-12">

         <div class="truck-permit">

           <p>  <?php if(!empty($rowU['insurance_file'])){?><a href="<?php echo $path.$rowU['insurance_file'];?>"  target="_blank">Download File</a><?php }else{ echo "No file Uploaded";}?></p>

           <!-- <input name="insurance_file" id="file-9" class="fileUpload inputfile10 inputfile-5" type="file">  <!--data-multiple-caption="{count} files selected" multiple=""--> 
<!--
            <label for="file-9"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>-->

        </div>

      </div> </div>

      </div>

    

         </div>
		  <div class="row">

            <div class="col-md-8">
 <div class="col-md-12">
 <div class="col-md-12">
                <label> Fitness Certificate  </label>

                 <input type="text" name="fitness_cert_no"  id="fitness_cert_no"  value="<?php echo $rowU['fitness_cert_no'];?>" readonly class="form-control" placeholder=" Fitness certificate No">
                </div>
             </div>
              </div>
      <div class="col-md-4">
           <div class="col-md-12">
                <div class="col-md-12">

         <div class="truck-permit">

           <p>  <?php if(!empty($rowU['fitness_cert_file'])){?><a href="<?php echo $path.$rowU['fitness_cert_file'];?>"  target="_blank">Download File</a><?php }else{ echo "No file Uploaded";}?></p>

            <!--<input name="fitness_cert_file" id="file-6" class="fileUpload inputfile10 inputfile-5" type="file">

            <label for="file-6"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>-->

        </div>

      </div>
          </div>

      </div>

    

         </div>

          <div class="row">
               <div class="col-md-12">
               <div class="col-md-12">
            <div class="col-md-12 continue-btn add-driver-info view-dri1 view11">
                <button type="button" class="cont-btn-style" id="forword_to_driver"> View Driver Information </button>
             </div>
              </div>
              </div>
         </div>

      </div>
       </div>
    </div>
  </div>
  <div class="set1">
    <a href="#" id="driver_link_id">
      ADD DRIVER INFORMATION
     <!-- <i class="fa fa-plus"></i>-->
    </a>
    <div class="content-1" id="driver_field" style="display: none;">
            <div class="personal-information-section vehicle-reg-style"> 
     

      <div class="personal-information-form choose-type" style="padding:18px 0px;">

	  <div class="row">
<div class="col-md-12">
<div class="col-md-12">
            <div class="col-md-6">

                <label> Driver name </label>

               <input type="text" name="driver_name" readonly  id="driver_name" value="<?php echo $rowU['driver_name'];?>" class="form-control" placeholder="Enter Driver Name ">

             </div>

            <div class="col-md-6">

                <label>  Driver Mobile No. </label>

                <input type="text" name="driver_mobile_no" id="driver_mobile_no" readonly value="<?php echo $rowU['mobile_no'];?>" class="form-control" placeholder=" Enter Driver Mobile no. ">

         </div>
         </div>
         </div>
          </div> 

         <div class="row">

            <div class="col-md-8">
<div class="col-md-12">
<div class="col-md-12">
                <label>Driving Licence </label>

                <input type="text" name="dl" id="dl"  class="form-control" value="<?php echo $rowU['dl'];?>" readonly placeholder=" Enter Driving License No">
</div>
</div>
             </div>

		<div class="col-md-4">
 <div class="col-md-12">
                <div class="col-md-12">
         <div class="truck-permit">

           <p>    <?php if(!empty($rowU['dl_file'])){?><a href="<?php echo $path.$rowU['dl_file'];?>"  target="_blank">Download File</a><?php }else{ echo "No file Uploaded";}?></p>

          <!--  <input name="dl_file" id="file-11" class="fileUpload inputfile10 inputfile-5" type="file">

            <label for="file-11"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>-->

        </div>

      </div>
            </div>

      </div>

         </div> 

          <div class="row">
			<div class="col-md-8">
			<div class="col-md-12">
			<div class="col-md-12">

                 <label> Aadhar number </label>

                 <input type="text" name="aadhar_no" id="aadhar_no" value="<?php echo $rowU['aadhar_no'];?>" class="form-control" readonly placeholder=" Enter Your Aadhar No. ">

             </div>
             </div>
                
                
             </div>
			 <div class="col-md-4">
 <div class="col-md-12">
                <div class="col-md-12">
         <div class="truck-permit">

           <p>  <?php if(!empty($rowU['aadhar_file'])){?><a href="<?php echo $path.$rowU['aadhar_file'];?>"  target="_blank">Download File</a><?php }else{ echo "No file Uploaded";}?></p>

           <!-- <input name="aadhar_file" id="file-10" class="fileUpload inputfile10 inputfile-5" type="file">

            <label for="file-10"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>-->

        </div>

      </div></div>

      </div>
		</div>

         <div class="row">

            <div class="col-md-8">
            <div class="col-md-12">
            <div class="col-md-12">

                <label> Authorised driver certificate by owner  </label>

                 <input type="text" name="auth_driver_cert_no" name="auth_driver_cert_no"  value="<?php echo $rowU['auth_driver_cert_no'];?>" readonly class="form-control" placeholder=" Driver certificate No">

             </div>
             </div>
             </div>

      <div class="col-md-4">
 <div class="col-md-12">
                <div class="col-md-12">
         <div class="truck-permit">

           <p>   <?php if(!empty($rowU['auth_driver_cert_file'])){?><a href="<?php echo $path.$rowU['auth_driver_cert_file'];?>"  target="_blank">Download File</a><?php }else{ echo "No file Uploaded";}?></p>

           <!-- <input name="auth_driver_cert_file" id="file-8" class="fileUpload inputfile10 inputfile-5" multiple="" type="file">

            <label for="file-8"><i class="camera-truck fa fa-camera" aria-hidden="true"></i>&nbsp; &nbsp; <span>Upload Image</span></label>-->

        </div>

      </div></div>

      </div>

    

         </div>

         <!-- <div class="row">
            <div class="col-md-12 continue-btn add-driver-info">
                <button type="submit" name="add_truck" class="cont-btn-style"> Continue </button>
             </div>

             
         </div>-->

      </div>
       </div>
    </div>
  </div>

</div>


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

!--END OF SUCCESS-->
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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <!-- Select2 -->

  <link rel="stylesheet" href="<?php echo base_url ; ?>css/select2.min.css">
<script src="<?php echo base_url ; ?>js/select2.full.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $(".set1 > a").on("click", function(){
    if($(this).hasClass('active')){
      $(this).removeClass("active");
      $(this).siblings('.content-1').slideUp(0);
      $(".set1 > a i").removeClass("fa-minus").addClass("fa-plus");
    }else{
      $(".set1 > a i").removeClass("fa-minus").addClass("fa-plus");
    $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
    $(".set1 > a").removeClass("active");
    $(this).addClass("active");
    $('.content-1').slideUp(0);
    $(this).siblings('.content-1').slideDown(0);
    }
    
  });
  $("#forword_to_driver").on("click", function(){
    
      $("#truck_link_id").removeClass("active");
	  $('#truck_field').slideUp(0);
	  $("#driver_link_id").addClass("active");
	  $('#driver_field').slideDown(0);
    
    
  });
});
</script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
	$(".select2").select2();
  } );
  </script>



<?php include 'footer.php';?>
 <script src="<?php echo base_url ; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
   <script src="<?php echo base_url ; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript">        </script>
		
        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){  
					jQuery("#truck_type").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please Select Truck Type"
							});
							
							
					jQuery("#load_passing").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter Load passing"
							});
					jQuery("#route_operate").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please select Route"
							});
					jQuery("#truck_permit_no").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter Truck Permit No"
							});
					jQuery("#file-7").validate({
								expression: "if (VAL) return true; else return false;",
								message: "<br>Please Upload Truck Permit File"
							});
					jQuery("#truck_reg_no").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter Truck Reg No"
							});
					jQuery("#file-5").validate({
								expression: "if (VAL) return true; else return false;",
								message: "<br>Please Upload Truck Reg File"
							});
					jQuery("#datepicker").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter Truck Insurance Validaty"
							});
					jQuery("#file-9").validate({
								expression: "if (VAL) return true; else return false;",
								message: "<br>Please Upload Truck Insurance File"
							});
					jQuery("#driver_name").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter Driver Name"
							});
					jQuery("#driver_mobile_no").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter Driver Mobile no"
							});
					jQuery("#dl").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please Enter Driving License"
							});
					jQuery("#file-11").validate({
								expression: "if (VAL) return true; else return false;",
								message: "<br>Please Upload Driving License File"
							});
					jQuery("#fitness_cert_no").validate({
								expression: "if (VAL) return true; else return false;",
								message: "Please enter Fitness Certificate No"
							});
					jQuery("#file-6").validate({
								expression: "if (VAL) return true; else return false;",
								message: "<br>Please Upload Fitness Certificate File"
							});
				
        
				
         
            });
            /* ]]> */
			
        </script>
</body>
</html>