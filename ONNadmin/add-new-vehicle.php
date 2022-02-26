<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper" style="padding-left:40px;"> 
          <div class="row" style="font-size:30px;">
             <b>Manage Loads</b> 
          </div>
    	<form method="POST" action="add-vehicle-php.php">
         <div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-2"> Username : </div><div class="col-sm-3"> <select name="type"  class="form-control select2 mobile3">
  <option value="1">Truck</option>
  <option value="2">Trailer</option>
  <option value="3">Container</option>
</select> </div>
         </div>
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">  Capacity :  </div><div class="col-sm-3"><input type="text" class="form-control" name="length" aria-describedby="emailHelp" placeholder="capacity"  required></div>
         </div><div class="row" style="padding-top:10px; font-size:18px;">
            <div class="col-sm-2"> Dimension :  </div><div class="col-sm-3"><input type="text" class="form-control" name="dimension" aria-describedby="emailHelp" placeholder="a*b*c"  required> </div>
</div>
    <div class="row" style="padding-top:10px;">
     <div class="col-sm-4"><input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit"></div>
     </div>
    </section>
</section>
<?php
include("footer.php");
?>