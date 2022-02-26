<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$mobile_no=$_GET['mobile_no'];
 $row = mysqli_query($dbhandle,"SELECT * FROM  `provider_profile_tbl` where mobile_no='$mobile_no'");
while($fetch = mysqli_fetch_array($row)){
?>
<section id="main-content">
    <section class="wrapper" style="padding-left:40px;"> 
          <div class="row" style="font-size:30px;">
             <b>PROVIDER PROFILE</b> 
          </div>
    	<form method="POST" action="updateproviderprofile.php">
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> MOBILE NUMBER : </div><div class="col-sm-3">  <input type="text" class="form-control" name="mobile_no" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['mobile_no']; ?>" required> </div>
         </div></br><div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> TRANSPORT NAME : </div><div class="col-sm-3"> <input type="text" class="form-control" name="transport_name" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['transport_name']; ?>" required>  </div>
         </div></br>
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-3">  Name :  </div><div class="col-sm-3"><input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['name']; ?>" required> </div>
         </div></br><div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> CITY :  </div><div class="col-sm-3"><input type="text" class="form-control" name="city" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['city']; ?>" required> </div>
         </div></br>
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> FRONT AADHAR: </div><div class="col-sm-3"><?php if($fetch['front_aadhar']==1){ $doc_type="front_aadhar"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php echo "Download IT"; ?></a></div><div class="col-sm-3">  <a href="cofirmproviderverify.php?mobile_no=<?php echo $mobile_no; ?>&doc_type=<?php echo $doc_type; ?>">CONFIRM VERIFICATION</a><?php } else if($fetch['front_aadhar']==2){ $doc_type="front_aadhar"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php echo "Download IT"; ?></a></div><div class="col-sm-3">  VERIFIED<?php } else {?>NOT UPLOADED<?php } ?></div>
         </div></br>
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> BACK AADHAR :  </div><div class="col-sm-3"><?php if($fetch['back_aadhar']==1){ $doc_type="back_aadhar"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php  echo "Download IT"; ?></a></div><div class="col-sm-3"> <a href="cofirmproviderverify.php?mobile_no=<?php echo $mobile_no; ?>&doc_type=<?php echo $doc_type; ?>">CONFIRM VERIFICATION</a><?php } else if($fetch['back_aadhar']==2){ $doc_type="back_aadhar"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php echo "Download IT"; ?></a></div><div class="col-sm-3">  VERIFIED<?php } else {?>NOT UPLOADED<?php } ?></div>
         </div></br>
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> FRONT DRIVING LICENSE :  </div><div class="col-sm-3"><?php if($fetch['front_driving']==1){  $doc_type="front_driving"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php  echo "Download IT"; ?></a></div><div class="col-sm-3"> <a href="cofirmproviderverify.php?mobile_no=<?php echo $mobile_no; ?>&doc_type=<?php echo $doc_type; ?>">CONFIRM VERIFICATION</a><?php } else if($fetch['front_driving']==2){ $doc_type="front_driving"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php echo "Download IT"; ?></a></div><div class="col-sm-3">  VERIFIED<?php } else {?>NOT UPLOADED<?php } ?></div>
         </div></br>
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> BACK DRIVING LICENSE :  </div><div class="col-sm-3"><?php if($fetch['back_driving']==1){  $doc_type="back_driving"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php  echo "Download IT"; ?></a></div><div class="col-sm-3"><a href="cofirmproviderverify.php?mobile_no=<?php echo $mobile_no; ?>&doc_type=<?php echo $doc_type; ?>">CONFIRM VERIFICATION</a><?php } else if($fetch['back_driving']==2){ $doc_type="'back_driving"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php echo "Download IT"; ?></a></div><div class="col-sm-3">  VERIFIED<?php } else {?>NOT UPLOADED<?php } ?></div>
         </div></br>
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> FRONT REGISTRATION CARD :  </div><div class="col-sm-3"><?php if($fetch['front_registration']==1){  $doc_type="front_registration"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php  echo "Download IT"; ?></a></div><div class="col-sm-3"><a href="cofirmproviderverify.php?mobile_no=<?php echo $mobile_no; ?>&doc_type=<?php echo $doc_type; ?>">CONFIRM VERIFICATION</a><?php } else if($fetch['front_registration']==2){ $doc_type="front_registration"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php echo "Download IT"; ?></a></div><div class="col-sm-3">  VERIFIED<?php } else {?>NOT UPLOADED<?php } ?></div>
         </div></br>
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-3"> BACK REGISTRATION CARD :  </div><div class="col-sm-3"><?php if($fetch['back_registration']==1){  $doc_type="back_registration"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php  echo "Download IT"; ?></a></div><div class="col-sm-3"><a href="cofirmproviderverify.php?mobile_no=<?php echo $mobile_no; ?>&doc_type=<?php echo $doc_type; ?>">CONFIRM VERIFICATION</a><?php } else if($fetch['back_registration']==2){ $doc_type="back_registration"; ?> <a href='../android/Uploads/<?php echo '"'.$mobile_no.'""'.$doc_type.'"'.'.png'; ?>'><?php echo "Download IT"; ?></a></div><div class="col-sm-3">  VERIFIED<?php } else {?>NOT UPLOADED<?php } ?></div>
         </div></br>
         <input class="btn btn-primary btn-lg" type="submit" value="UPDATE">
         </form>
         
<?php } ?>