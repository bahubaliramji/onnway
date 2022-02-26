
<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$id=$_GET['id'];
?>
<section id="main-content">
    <section class="wrapper"> 
    <form action="enter-quote-price-php.php?id=<?php echo $id;?>" method="post">
    <?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` WHERE id='$id'");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
                      $source=$fetch['source'];
        $vid=$fetch['vehicle_type'];
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
                                        <div class="col-sm-2">    PROVIDER NUMBER: </div><div class="col-sm-4"><input type="text" class="form-control" name="provider_number" aria-describedby="emailHelp" placeholder="provider_no" value="<?php echo $fetch['driver_mobile_no'];?>" required> </div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  DRIVER NUMBER:  </div><div class="col-sm-4"> <input type="text" class="form-control" name="driver_mobile_no" aria-describedby="emailHelp" placeholder="driver_no" value=" <?php echo $fetch['assigned_driver_mobile_no'];?>" required> </div>
                                            </div>
                                        </div>
                                         <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        </div>
                                            <div class="col-sm-6">
                                                <input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit">
                                           </div>
                                        </div>
                                               <?php } ?>
              </div>
           <!-- </div>-->
             <div class="container" style="background-color: #fff; padding-top: 20px; color: black;">
              <div class="container" style="background-color: #ddd;">
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Mobile no</th>
                <th>Name</th>
                <th>Route</th>
                <th>Confirm</th>
            </tr>
        </thead>
        <tbody><?php
           
           $row = mysqli_query($dbhandle,"SELECT * FROM `full_posted_truck`,`full_posted_truck_destination` WHERE `full_posted_truck`.source='$source' AND `full_posted_truck`.`vehicle_type`='$vehicle_type' AND `full_posted_truck_destination`.`destination`='$destination'
");
$x=1;
	
while($fetch1 = mysqli_fetch_array($row)){
  
    $type=$fetch1['type'];
    $mobile_no=$fetch1['mobile_no'];
    $tid=$fetch1['posted_truck_id'];
    $row11=mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl` where mobile_no='$mobile_no'");
    while($fetch11 = mysqli_fetch_array($row11)){
	?>
											<tr>
											
													
													<td><input type="text" class="form-control" name="driver_mobile_no" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch1['mobile_no'];?>" required></td>
												    <td><input type="text" class="form-control" name="driver_name" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch11['name'];?>" required></td>
												    <td><?php echo $fetch1['source'];?>-<?php echo $fetch1['destination']; ?></td>
                                            <td>
                                                  <input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit"> 
                                            
                                            </td>
													
                                              
												</tr>
<?php $x++; } }?>
	

        </tbody>
    </table>
    </form>
              </div>
              <!-- project team & activity end -->
              </div>
    </section>
</section>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
</body>