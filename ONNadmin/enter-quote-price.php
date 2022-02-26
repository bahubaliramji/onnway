<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$id=$_GET['id'];
?>
<section id="main-content">
    <section class="wrapper"> 
    <form method="POST" action="enterquoteadmphp.php?id=<?php echo $id; ?>">
    <?php
           $row = mysqli_query($dbhandle,"select * from full_quote_details WHERE quote_id='$id'");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){

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
	        	
    
	?>
           <div class="container" style="background-color: #444; padding: 20px 20px 20px 20px; color: white;">
                <div class="box-body box box-warning">
                          <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                         <div class="col-sm-2">   SOURCE: </div><div class="col-sm-4">&nbsp;&nbsp;<?php echo $fetch['source'];?></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">DESTINATION: </div><div class="col-sm-4">&nbsp;&nbsp; <?php echo $fetch['destination']; ?></div>
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
                                        <div class="col-sm-2">    USER PRICE: </div><div class="col-sm-4"><input type="text" class="form-control" name="user_price" aria-describedby="emailHelp" placeholder="price" value=" <?php echo $fetch['final_price'];?>"  required> </div>
                                            </div>
                                            
                                        </div>
                                               <?php } ?>
              </div>
            </div>
             <div class="container" style="background-color: #fff; padding-top: 20px; color: black;">
              <div class="container" style="background-color: #ddd;">
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>mobile_no</th>
                <th>name</th>
                <th>bid price</th>
                <th>Confirm</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"select * from full_bid_for_quotes WHERE quote_id='$id' ORDER BY `full_bid_for_quotes`.`bid_price` ASC");
$x=1;
	
while($fetch1 = mysqli_fetch_array($row)){
  
    $mb_no=$fetch1['mobile_no'];
     $q = mysqli_query($dbhandle,"select * from provider_profile_tbl WHERE mobile_no='$mb_no'");

	
while($f = mysqli_fetch_array($q)){
	?>
											<tr>
											
													
													<td><input type="text" class="form-control" name="mobile_no" value="<?php echo $fetch1['mobile_no'];?>"</td>
													<td><?php echo $f['name'];?></td>
													<td>
                                                <input type="text" class="form-control" name="price" value="<?php echo $fetch1['bid_price'];?>">
                                            </td>
                                            <td>
                                                    <input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit">
                                            
                                            </form></td>
													
                                              
												</tr>
<?php $x++; } } }?>
	

        </tbody>
    </table>
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