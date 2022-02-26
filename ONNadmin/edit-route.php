<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$id=$_GET['id'];
  $row = mysqli_query($dbhandle,"SELECT * FROM `tbl_estimate` where id='$id'");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
   $vid=$fetch['truck_type'];
	   
	    $query1 = mysqli_query($dbhandle,"SELECT * FROM `vehicle_list` where id='$vid'");
	    while($fetch1 = mysqli_fetch_array($query1)){
	        $v_type=$fetch1['vehicle_type'];
	        $dimension=$fetch1['dimension'];
	        $length=$fetch1['length'];
	        
	        if($v_type==1){
	            $vec_type="Truck";
	        }
	        if($v_type==2){
	            $vec_type="Trailer";
	        }
	        if($v_type==3){
	            $vec_type="Container";
	        }
	        $c=$vec_type.' '.$length.' mt '.$dimension;
	    }
?>
<section id="main-content">
    <section class="wrapper" style="padding-left:40px;"> 
          <div class="row" style="font-size:30px;">
             <b>EDIT ROUTE</b> 
          </div>
    	<form method="POST" action="edit-route-php.php?id=<?php echo $id; ?>">
        
         <div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">   </div><div class="row" style="padding-top:10px; font-size:18px;"></div></div>
            <div class="row" style="padding-top:10px; font-size:18px;">   <div class="col-sm-2"> SOURCE :  </div><div class="col-sm-3"><input type="text" class="form-control" name="source" aria-describedby="emailHelp" placeholder="source"  value="<?php echo $fetch['from_id']; ?>" required> </div>
</div></div>
<div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">   </div><div class="row" style="padding-top:10px; font-size:18px;"></div></div>
            <div class="row" style="padding-top:10px; font-size:18px;">   <div class="col-sm-2"> DESTINATION :  </div><div class="col-sm-3"><input type="text" class="form-control" name="destination" aria-describedby="emailHelp" placeholder="destination" value="<?php echo $fetch['to_id']; ?>" required> </div>
</div></div>
<div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">   </div><div class="row" style="padding-top:10px; font-size:18px;"></div></div>
            <div class="row" style="padding-top:10px; font-size:18px;">   <div class="col-sm-2"> TRUCK :  </div><div class="col-sm-3"><input type="text" class="form-control" name="truck_type" aria-describedby="emailHelp" placeholder="truck type" value="<?php echo $c; ?>"  required> </div>
</div></div>
<div class="row" style="padding-top:10px; font-size:18px;">
           <div class="col-sm-2">   </div><div class="row" style="padding-top:10px; font-size:18px;"></div></div>
            <div class="row" style="padding-top:10px; font-size:18px;">   <div class="col-sm-2"> PRICE :  </div><div class="col-sm-3"><input type="text" class="form-control" name="price" aria-describedby="emailHelp" placeholder="price" value="<?php echo $fetch['price']; ?>"  required> </div>
</div></div>
    <div class="row" style="padding-top:10px;">
     <div class="col-sm-4"><input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit"></div>
     </div>
    </section>
</section>
<?php
}
include("footer.php");
?>