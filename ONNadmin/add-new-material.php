<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper" style="padding-left:40px;"> 
          <div class="row" style="font-size:30px;">
             <b>ADD MATERIAL</b> 
          </div>
    	<form method="POST" action="add-material-php.php">
        
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">   </div><div class="row" style="padding-top:10px; font-size:18px;"></div></div>
            <div class="row" style="padding-top:10px; font-size:18px;">   <div class="col-sm-2"> MATERIAL :  </div><div class="col-sm-3"><input type="text" class="form-control" name="material" aria-describedby="emailHelp" placeholder="material"  required> </div>
</div></div>
    <div class="row" style="padding-top:10px;">
     <div class="col-sm-4"><input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit"></div>
     </div>
    </section>
</section>
<?php
include("footer.php");
?>