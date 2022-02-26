<?php
session_start();
include("include/config.php");

?>
<!DOCTYPE html>

<html>

<head>

	<title>ONNWAY</title>

	 <meta charset="utf-8">
<meta name="viewport" content="width=1024">
  
  <meta property="og:url" content="<?php echo $url_gm ; ?>"> 
<meta property="og:title" content="<?php echo $page_title ; ?>">
<meta property="og:description" content="<?php echo $seo_content ; ?>"> 
<meta name="keywords" content="<?php echo $seo_keyword ; ?>" />
<meta name="description" content="<?php echo $seo_content ; ?>"> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <link rel="stylesheet" type="text/css" href="../css/login-popup.css">

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD5e-SJP_E8SDLOHYz79IR79pVy6YQOgg&libraries=places"></script>
<style type="text/css">
  .but {
    display:inline-block;
    color:#fff;
    background-color: #d11f26;
    cursor:pointer;
    vertical-align:middle;
    width: 300px;
    height: 50px;
    padding: 5px;
    border-radius: 5px;
    text-align: center;
    font-size: 20px;
    font-family: inherit;
    font-weight: 500;
}
.but:active {
    color:#d11f26;
}
</style>
</head>

<body>
    


  <div class="container" style="background-color: #444; width: 100%; padding: 30px 80px 10px 50px;">

<div class="row">
  <div class="col-sm-4">
      <span class="select-tab">
       <!-- <select name="source" id="cf_source" required>

          <option value="">Source</option>
        </select> -->
        <p style="color: #fff;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Source:- &nbsp;&nbsp;&nbsp; &nbsp;
        <input id="query-0" class="query" name="source" type="text" placeholder="source" value="<?php echo $_GET['source']; ?>" style=" padding: 14px 44px; border-radius: 6px; width: 261px; color: #5e5e5e; font-size: 14px;" ></p> 
      </span>
      </div>
       <div class="col-sm-4">
       <span class="select-tab">
       <p style="color: #fff;"> Destination:- &nbsp;&nbsp;&nbsp;&nbsp;
        <input id="query-1" class="query" name="destination" type="text" placeholder="destination" value="<?php echo $_GET['destination'];  ?>" style=" padding: 14px 44px; border-radius: 6px; width: 261px; color: #5e5e5e; font-size: 14px;" ></p> 
      </span>
</div>
<div class="col-sm-4">

</div>
    </div>
  </div>
<section>
  <div class="row">
       <?php 
         $iid=$_GET['id'];
    $query = mysqli_query($dbhandle,"SELECT * FROM `part_quote_details` WHERE quote_id='$iid'");
while($fetch=mysqli_fetch_array($query)){
    ?>
    <div class="col-sm-3" style="background-color: #888; height: 550px; padding: 0px 20px 20px 20px; padding-left: 40px;">
    </br>       <span class="select-tab">
       <input id="material_type" class="query" name="material_type" type="text" placeholder="material type"  style=" padding: 14px 44px; border-radius: 6px; width: 92%; color: #5e5e5e; font-size: 14px;" value="<?php echo $fetch['material_type']; ?>">

      </span>    </br>
 <span class="select-tab">
        <input id="weight" class="query" name="weight" type="text" placeholder="Weight(MT)"  style=" padding: 14px 44px; border-radius: 6px; width: 92%; color: #5e5e5e; font-size: 14px;" value="<?php echo $fetch['weight']; ?>">
  </span>       </br> 
       <span class="select-tab">   <input id="length" class="query" name="length" type="text" placeholder="Length(ft)"  style=" padding: 14px 44px; border-radius: 6px; width: 92%; color: #5e5e5e; font-size: 14px;" value="<?php echo $fetch['length']; ?>"></span> </br> 
        <span class="select-tab">  <input id="width" class="query" name="width" type="text" placeholder="Width(ft)"  style=" padding: 14px 44px; border-radius: 6px; width: 92%; color: #5e5e5e; font-size: 14px;" value="<?php echo $fetch['width']; ?>"></span> </br> 
         <span class="select-tab"> <input id="height" class="query" name="height" type="text" placeholder="Height(ft)"  style=" padding: 14px 44px; border-radius: 6px; width: 92%; color: #5e5e5e; font-size: 14px;" value="<?php echo $fetch['height']; ?>"></span> 

      <div id="but" class="but" onclick="call()" style="max-width: 150px;"><span style="font-size: 14px;" >UPDATE</span></div>
    </div> 
   
   
    <div class="col-sm-6" style="background: url('../images/dd.png') no-repeat center center; padding-right: 200px; padding-top: 100px; padding-left: 200px; height: 375px;">
     
      <div class="row" style="padding: 10px 0px 0px 0px;">
    <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo2" class="select" <?php if($fetch['div2']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div2']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction2()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction2()"<?php } ?>></div></div>
    <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo4" class="select" <?php if($fetch['div4']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div4']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction4()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction4()"<?php } ?>></div></div>
   <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo6" class="select" <?php if($fetch['div6']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div6']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction6()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction6()"<?php } ?>></div></div>
   <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo8" class="select" <?php if($fetch['div8']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div8']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction8()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction8()"<?php } ?>></div></div>
  </div>
    <div class="row" style="padding: 10px 0px 0px 0px;">
    <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo1" class="select" <?php if($fetch['div1']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div1']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction1()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction1()"<?php } ?>></div></div>
   <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo3" class="select" <?php if($fetch['div3']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div3']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction3()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction3()"<?php } ?>></div></div>
   <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo5" class="select" <?php if($fetch['div5']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div5']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction5()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction5()"<?php } ?>></div></div>
   <div class="col-xs-3" style="padding: 0px 0px 0px 10px;"><div  id="demo7" class="select" <?php if($fetch['div7']==1){ ?>style="padding: 60px 12px 10px 25px;  background-color: #444;"  <?php } else if($fetch['div7']==2){?>style="padding: 60px 12px 10px 25px;  background-color: #f00;" onclick="myfunction7()" <?php }else{ ?> style="padding: 60px 12px 10px 25px;  background-color: #aaa;" onclick="myfunction7()"<?php } ?>></div></div>
  </br></br></br></br></br></br></br>
  <div class="row">
    <div class="col-sm-6">
    <div style="height: 20px; width: 20px; background-color: #aaa;"></div> AVAILABLE </div>
     <div class="col-sm-6">
    <div style="height: 20px; width: 20px; background-color: #404040;"></div> UNAVAILABLE </div>
  </div>
    </div>
    </div>
</div>
<?php 
}

?>
<script>
  
  var x=0;
<?php if($fetch['div1']==1){ ?>
var i1=1;
<?php } else if($fetch['div1']==2){?> document.getElementById("demo1").style.backgroundColor = "red";
  var i1=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i1=0;
<?php } ?>
function myfunction1() {
if(i1==0)
{
  document.getElementById("demo1").style.backgroundColor = "red";
  i1=i1+2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo1").style.backgroundColor = "#aaa";
  i1=i1-2;
  x=x-100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
}
<?php if($fetch['div2']==1){ ?>
var i2=1;
<?php } else if($fetch['div2']==2){?> document.getElementById("demo2").style.backgroundColor = "red";
  var i2=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i2=0;
<?php } ?>
function myfunction2() {
if(i2==0)
{
  document.getElementById("demo2").style.backgroundColor = "red";
  i2=i2+2;
  x=x+100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo2").style.backgroundColor = "#aaa";
  i2=i2-2;
  x=x-100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
}
<?php if($fetch['div3']==1){ ?>
var i3=1;
<?php } else if($fetch['div3']==2){?> document.getElementById("demo3").style.backgroundColor = "red";
 var i3=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i3=0;
<?php } ?>
function myfunction3() {
if(i3==0)
{
  document.getElementById("demo3").style.backgroundColor = "red";
  i3=i3+2;
  x=x+100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo3").style.backgroundColor = "#aaa";
  i3=i3-2;
  x=x-100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
}
<?php if($fetch['div4']==1){ ?>
var i4=1;
<?php } else if($fetch['div4']==2){?> document.getElementById("demo4").style.backgroundColor = "red";
 var i4=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i4=0;
<?php } ?>
function myfunction4() {
if(i4==0)
{
  document.getElementById("demo4").style.backgroundColor = "red";
  i4=i4+2;
  x=x+100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo4").style.backgroundColor = "#aaa";
  i4=i4-2;
  x=x-100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
    
     
 }
}
<?php if($fetch['div5']==1){ ?>
var i5=1;
<?php } else if($fetch['div5']==2){?> document.getElementById("demo5").style.backgroundColor = "red";
 var i5=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i5=0;
<?php } ?>
function myfunction5() {
if(i5==0)
{
  document.getElementById("demo5").style.backgroundColor = "red";
  i5=i5+2;
  x=x+100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo5").style.backgroundColor = "#aaa";
  i5=i5-2;
  x=x-100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
}
<?php if($fetch['div6']==1){ ?>
var i6=1;
<?php } else if($fetch['div6']==2){?> document.getElementById("demo6").style.backgroundColor = "red";
 var i6=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i6=0;
<?php } ?>
function myfunction6() {
if(i6==0)
{
  document.getElementById("demo6").style.backgroundColor = "red";
  i6=i6+2;
  x=x+100;
   document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo6").style.backgroundColor = "#aaa";
  i6=i6-2;
  x=x-100;
  document.getElementById("selectt").textContent = x/8+"% of truck";
 }
}
<?php if($fetch['div7']==1){ ?>
var i7=1;
<?php } else if($fetch['div7']==2){?> document.getElementById("demo7").style.backgroundColor = "red";
 var i7=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i7=0;
<?php } ?>
function myfunction7() {
if(i7==0)
{
  document.getElementById("demo7").style.backgroundColor = "red";
  i7=i7+2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo7").style.backgroundColor = "#aaa";
  i7=i7-2;
  x=x-100;
  document.getElementById("selectt").textContent = x/8+"% of truck";
 }
}
<?php if($fetch['div8']==1){ ?>
var i8=1;
<?php } else if($fetch['div8']==2){?> document.getElementById("demo8").style.backgroundColor = "red";
 var i8=2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";<?php } else {?>
var i8=0;
<?php } ?>
function myfunction8() {
if(i8==0)
{
  document.getElementById("demo8").style.backgroundColor = "red";
  i8=i8+2;
  x=x+100;
  document.getElementById("selectt").textContent = x/8+"% of truck";
 }
 else
 {
  document.getElementById("demo8").style.backgroundColor = "#aaa";
  i8=i8-2;
  x=x-100;
  document.getElementById("selectt").textContent = x/8+"% of truck";
 }
}
function call() {
var id=<?php echo $_GET['id']; ?>;
  var material_type=document.getElementById("material_type").value;
  var weight=document.getElementById("weight").value;
  var length=document.getElementById("length").value;
  var height=document.getElementById("height").value;
  var width=document.getElementById("width").value;
  window.location="partloadbookingphp.php?material_type="+material_type+"&id="+id+"&weight="+weight+"&length="+length+"&height="+height+"&width="+width+"&div1="+i1+"&div2="+i2+"&div3="+i3+"&div4="+i4+"&div5="+i5+"&div6="+i6+"&div7="+i7+"&div8="+i8;
}
</script>
</section>



</body>
</html>
