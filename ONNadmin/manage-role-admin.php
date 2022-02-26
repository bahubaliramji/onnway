<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$id=$_GET['id'];
 $row = mysqli_query($dbhandle,"SELECT * FROM `tbl_admin` where id='$id'");
while($fetch = mysqli_fetch_array($row)){
?>
<section id="main-content">
    <section class="wrapper" style="padding-left:40px;"> 
          <div class="row" style="font-size:30px;">
             <b>Manage Loads</b> 
          </div>
    	<form method="POST" action="manage-role-php.php?id=<?php echo $id; ?>">
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-2"> Username : </div><div class="col-sm-3"> <?php echo $fetch['username']; ?> </div>
         </div>
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">  Email :  </div><div class="col-sm-3"><?php echo $fetch['email']; ?></div>
         </div><div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-2"> Password :  </div><div class="col-sm-3"><?php echo $fetch['password']; ?></div>
         </div><div class="row" style="padding-top:10px; font-size:18px;">
             <div class="col-sm-2"> Manage Quote :</div>
          <div class="col-sm-2">   
           <input type='hidden' value='0' name='managequote'>
          <input type="checkbox" class="form-check-input" id="managequote1" name="managequote"value="1" <?php if($fetch['managequotes']==1){ ?>checked <?php } ?>></div>
   

         </div><div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-2"> Load request :  </div><div class="col-sm-2">
                <input type='hidden' value='0' name='loadrequest'>
                <input type="checkbox" class="form-check-input" id="partload" name="loadrequest"value="1"  <?php if($fetch['loadrequest']==1){ ?>checked <?php } ?>>
   </div>
   
         </div><div class="row" style="padding-top:10px; font-size:18px;">
             <div class="col-sm-2">Employee login :  </div><div class="col-sm-2"> 
             <input type='hidden' value='0' name='employeelogin'>
             <input type="checkbox" class="form-check-input" id="partload" name="employeelogin"value="1"  <?php if($fetch['employeelogin']==1){ ?>checked <?php } ?>>
     </div>
  
         </div><div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-2">Loader registration :  </div><div class="col-sm-2">  
            <input type='hidden' value='0' name='loaderregistration'>
            <input type="checkbox" class="form-check-input" id="partload" name="loaderregistration"value="1"  <?php if($fetch['loaderreg']==1){ ?>checked <?php } ?>>
     </div>
   
         </div><div class="row" style="padding-top:10px; font-size:18px;">
          <div class="col-sm-2">   Vechile registration :  </div><div class="col-sm-2">
               <input type='hidden' value='0' name='vechileregistration'>
               <input type="checkbox" class="form-check-input" id="partload" name="vechileregistration"value="1"  <?php if($fetch['vehiclereg']==1){ ?>checked <?php } ?>>
     </div>
         </div><div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">  Track Order :  </div><div class="col-sm-2">
               <input type='hidden' value='0' name='trackorder'>
                <input type="checkbox" class="form-check-input" id="partload" name="trackorder"value="1"  <?php if($fetch['trackorder']==1){ ?>checked <?php } ?>>
     </div>
         </div><div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">  Booked truck :   </div><div class="col-sm-2">
               <input type='hidden' value='0' name='bookedtruck'>
               <input type="checkbox" class="form-check-input" id="partload" name="bookedtruck"value="1"  <?php if($fetch['bookedtruck']==1){ ?>checked <?php } ?>>
     </div>
         </div><div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-2"> Booked order :  </div> <div class="col-sm-2">
                <input type='hidden' value='0' name='bookedorder'>
                <input type="checkbox" class="form-check-input" id="partload" name="bookedorder"value="1"  <?php if($fetch['bookedorder']==1){ ?>checked <?php } ?>>
     </div>
         </div><div class="row" style="padding-top:10px; font-size:18px;">
         <div class="col-sm-2">    Setting :   </div><div class="col-sm-2">
             <input type='hidden' value='0' name='setting'>
             <input type="checkbox" class="form-check-input" id="partload" name="setting"value="1"  <?php if($fetch['setting']==1){ ?>checked <?php } ?>>
   </div>
         </div>
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">  Transport form :   </div><div class="col-sm-2">
               <input type='hidden' value='0' name='transportform'>
               <input type="checkbox" class="form-check-input" id="partload" name="transportform"value="1"  <?php if($fetch['transportform']==1){ ?>checked <?php } ?>>
    </div> </div>
    <div class="row" style="padding-top:10px;">
     <div class="col-sm-4"><input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit"></div>
     </div>
    </section>
</section>
<?php
} 
include("footer.php");
?>