<?php
include("header.php");
include("sidebar.php");
$mobile_no=$_GET['mobile_no'];

?>
<section id="main-content">
    <section class="wrapper" style="padding-top: 10px;">
        <h2>
            REQUEST CHANGES
        </h2>
        </br></br></br></br></br>
<div class="row">
<div class="col-sm-2">
    Mobile Number
</div>
<div class="col-sm-3">
<div class="form-group pass_show"> 
    <input name="mobile_no" class="form-control" id="email" type="email" /> 
</div>
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Name
</div>
<div class="col-sm-3">
<div class="form-group pass_show"> 
    <input name="name" class="form-control" id="name" type="email" /> 
</div>
</div>
</div>
<div class="row">
<div class="col-sm-2">
    City
</div>
<div class="col-sm-3">
<div class="form-group pass_show"> 
    <input name="city" class="form-control" id="name" type="email" /> 
</div>
</div>
</div>
 </section>
</section>
<?php
include("footer.php");
?>