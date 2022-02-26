<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
   <section class="wrapper" style="padding-left:40px;">
      <div class="row" style="font-size:30px;">
         <b>LOADER PROFILE</b>
      </div>
      <?php
      $mobile_no = $_GET['mobile_no'];
      $row = mysqli_query($dbhandle, "SELECT * FROM  `loader_profile_tbl` where mobile_no='$mobile_no'");

      if ($row == true) {
         while ($fetch = mysqli_fetch_array($row)) {
      ?>
            <form method="POST" action="updateloaderprofile.php">
               <div class="row" style="padding-top:10px; font-size:18px;">
                  <div class="col-sm-3"> MOBILE NUMBER : </div>
                  <div class="col-sm-3"> <input type="text" class="form-control" name="mobile_no" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['mobile_no']; ?>" required> </div>
               </div></br>
               <div class="row" style="padding-top:10px; font-size:18px;">
                  <div class="col-sm-3"> Type : </div>
                  <div class="col-sm-3"> <input type="text" class="form-control" name="type" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['type']; ?>" required> </div>
               </div></br>
               <div class="row" style="padding-top:10px; font-size:18px;">
                  <div class="col-sm-3"> Name : </div>
                  <div class="col-sm-3"><input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['name']; ?>" required> </div>
               </div></br>
               <div class="row" style="padding-top:10px; font-size:18px;">
                  <div class="col-sm-3"> CITY : </div>
                  <div class="col-sm-3"><input type="text" class="form-control" name="city" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['city']; ?>" required> </div>
               </div></br>
               <div class="row" style="padding-top:10px; font-size:18px;">
                  <div class="col-sm-3"> Address: </div>
                  <div class="col-sm-3"><input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['address']; ?>" required> </div>
               </div></br>
               <div class="row" style="padding-top:10px; font-size:18px;">
                  <div class="col-sm-3"> Email: </div>
                  <div class="col-sm-3"><input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['email']; ?>" required> </div>
               </div></br>
               <input class="btn btn-primary btn-lg" type="submit" value="UPDATE">
            </form>
      <?php
         }
      } else {
         echo "<div class='main-content'>Data Not Found.</div>";
      }
      ?>