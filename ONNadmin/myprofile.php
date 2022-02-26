<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper" style="padding-left:40px;"> 
          <div class="row" style="font-size:30px;">
             <b>Profile Page</b> 
          </div>
      <?php
      $email=$_SESSION['email'];
           $row = mysqli_query($dbhandle,"select * from tbl_admin WHERE email='$email'");

	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">  <h2></h2>  </div><div class="row" style="padding-top:10px; font-size:18px;"></div></div>
            <div class="row" style="padding-top:10px; font-size:18px;"> 
            <div class="col-sm-2"> Email :  </div><div class="col-sm-3"><?php echo $fetch['email']; ?></div>
</div></div>
     <div class="row" style="padding-top:10px; font-size:18px;"> 
            <div class="col-sm-2"> Username :  </div><div class="col-sm-3"><?php echo $fetch['username']; ?></div>
</div></div>
 <?php } ?>
    </section>
</section>
<?php
include("footer.php");
?>