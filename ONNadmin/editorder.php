<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$id=$_GET['id'];
?>
<section id="main-content">
    <section class="wrapper"> 
    <form action="enter-order-php.php?id=<?php echo $id;?>" method="post">
    <?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` WHERE id='$id'");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
                      $source=$fetch['source'];
        $vehicle_type=$fetch['vehicle_type'];
        $destination=$fetch['destination'];
       
             
 
  $vid=$fetch['vehicle_type'];
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
           <div class="container" style="background-color: #555; padding: 5px 5px 5px 5px; color: #eee; font-family: 'Roboto';">
               <!-- <div class="box-body box box-warning">-->
                      <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                         <div class="col-sm-2">   SOURCE: </div><div class="col-sm-4">&nbsp;&nbsp;<?php echo $source;?></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">DESTINATION: </div><div class="col-sm-4">&nbsp;&nbsp; <?php echo $destination;?></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                         <div class="col-sm-2">VECHILE TYPE: </div><div class="col-sm-4">  &nbsp;&nbsp;   <?php echo $c;?></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  MATERIAL TYPE: </div><div class="col-sm-4"> <input type="text" class="form-control" name="material" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['material_type'];?> " required></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    WEIGHT: </div><div class="col-sm-4"><input type="text" class="form-control" name="weight" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['weight'];?>" required></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">   SCHEDULE TIME:  </div><div class="col-sm-4"> <input type="text" class="form-control" name="sch_date" aria-describedby="emailHelp" placeholder="material" value=" <?php echo $fetch['sch_date'];?>" required> </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    PICKUP STREET: </div><div class="col-sm-4"><input type="text" class="form-control" name="pickup_street" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['pickup_street'];?>" required> </div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  PICKUP PINCODE:  </div><div class="col-sm-4"> <input type="text" class="form-control" name="pickup_pincode" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['pickup_pincode'];?>" required>  </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    DROP STREET: </div><div class="col-sm-4"> <input type="text" class="form-control" name="drop_street" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['drop_street'];?>" required></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  DROP PINCODE:  </div><div class="col-sm-4"> <input type="text" class="form-control" name="drop_pincode" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['drop_pincode'];?>" required>  </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    USER PRICE: </div><div class="col-sm-4"><input type="text" class="form-control" name="price" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['price'];?>" required> </div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  DRIVER PRICE:  </div><div class="col-sm-4"> <input type="text" class="form-control" name="driver_price" aria-describedby="emailHelp" placeholder="material" value=" <?php echo $fetch['driver_price'];?>" required> </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    ADVANCE PAYMENT: </div><div class="col-sm-4"><input type="text" class="form-control" name="advpay" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['price']-$fetch['due_amount'];?>" required> </div>
                                            </div>
                                         <div class="col-sm-6">
                                          <div class="col-sm-2">   LOAD TYPE:  </div><div class="col-sm-4"><?php if($fetch['load_type']==1){ echo "FULL LOAD"; }else{ ?><a href="order_part_load.php?id=<?php echo $id; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>"><?php echo "EDIT PART LOAD"; } ?></a></div>
                                            </div>
                                            
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    PROVIDER MOBILE NO: </div><div class="col-sm-4"><input type="text" class="form-control" name="provider_mobile_no" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['driver_mobile_no'];?>" required> </div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  DRIVER MOBILE NO:  </div><div class="col-sm-4"> <input type="text" class="form-control" name="driver_mobile_no" aria-describedby="emailHelp" placeholder="material" value=" <?php echo $fetch['assigned_driver_mobile_no'];?>" required> </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    TRUCK NUMBER: </div><div class="col-sm-4"><input type="text" class="form-control" name="truck_number" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['truck_number'];?>" required> </div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  ORDER STATUS:  </div><div class="col-sm-4"> <select name="item_delivered" value="3" selected="selected" class="form-control">
          <option value="">ORDER STATUS</option>
        					
					<option value="1" <?php if($fetch['item_delivered']==1){ echo "selected"; } ?>>TRUCK NOT ASSIGNED</option>
															
					<option value="2" <?php if($fetch['item_delivered']==2){ echo "selected"; } ?>>WAITING FOR SHIPMENT</option>
															
					<option value="3" <?php if($fetch['item_delivered']==3){ echo "selected"; } ?>>ITEM DELIVERED</option>
															
					<option value="4" <?php if($fetch['item_delivered']==4){ echo "selected"; } ?>>POD PENDING</option>
															
					<option value="5" <?php if($fetch['item_delivered']==5){ echo "selected"; } ?>>POD DONE</option> 
					</select>
					</div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    POD : </div><div class="col-sm-4"><?php if($fetch['item_delivered']!=5){ echo "ITEM NOT DELIVERED"; } else { echo "POD"; }?> </div>
                                            </div>
                                            <div class="col-sm-6">
                                         </div>
                                        </div>
                                               <?php } ?>
                                               </br><div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6"><div class="col-sm-2"></div><div class="col-sm-4"><button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button></form></div></div></div></br></br></br>
              </div>
<script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
</body>