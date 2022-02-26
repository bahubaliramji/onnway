<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper"> 
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>mobile_no</th>
                <th>source</th>
                <th>Destination</th>
                <th>Vehicle type</th>
                <th>Material type</th>
                <th>Schedule date</th>
                <th>price</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"select * from full_quote_details ORDER BY quote_id DESC");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  if($fetch['final_price']==0){
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
											<tr>
											
													
													<td><a href="loaderpro.php?mobile_no=<?php echo $fetch['mobile_no'];?>"><?php echo $fetch['mobile_no'];?></a></td>
													<td><?php echo $fetch['source'];?></td>
													<td><?php echo $fetch['destination'];?></td>
													<td><?php echo $c;?></td>
													<td><?php echo $fetch['material_type'];?></td>
													<td><?php echo $fetch['sch_date'];?></td>
													
													<td>
                                                        <?php
                                                            $id=$fetch['quote_id'];
                                                            
                                                        ?>
                                                        <a href="enter-quote-price.php?id=<?php echo $id; ?>" class="btn btn-primary"><button class="btn btn-primary">ADD</button></a></td>
                                                    	<td>
                                                        <?php
                                                            $id=$fetch['quote_id'];
                                                            
                                                        ?>
                                                        <a href="enter-quote-price.php?id=<?php echo $id; ?>" class="btn btn-primary"><button class="btn btn-primary">EDIT</button></a></td>
												</tr>
              <?php } }                if($fetch['final_price']>0){
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
											<tr>
											
													
													<td><?php echo $fetch['mobile_no'];?></td>
													<td><?php echo $fetch['source'];?></td>
													<td><?php echo $fetch['destination'];?></td>
													<td><?php echo $c;?></td>
													<td><?php echo $fetch['material_type'];?></td>
													<td><?php echo $fetch['sch_date'];?></td>
													
													<td><?php echo $fetch['current_date'];?></td>
												    <td><?php echo $fetch['final_price'];?></td>
												    <td>
                                                        <?php
                                                            $id=$fetch['quote_id'];
                                                            
                                                        ?>
                                                        <a href="enter-quote-price.php?id=<?php echo $id; ?>" class="btn btn-primary"><button class="btn btn-primary">EDIT</button></a></td>
											
													</tr>
                                              
												
<?php $x++; } } }?>
	

        </tbody>
    </table>
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