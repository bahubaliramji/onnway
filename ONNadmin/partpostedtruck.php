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
                <th>mobile No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Source</th>
                <th>Vehicle type</th>
                <th>Schedule date</th>
                <th>Destination</th>
                <th>Posted date</th>
                <th>Percentage left</th>
            </tr>
        </thead>
        <tbody><?php
        
           $row = mysqli_query($dbhandle,"SELECT * FROM `part_posted_truck`");
$x=1;
while($fetch = mysqli_fetch_array($row)){
   $p=0;
            if($fetch['div1']==0)
            {
                $p=$p+100;
            }
            if($fetch['div2']==0)
            {
                $p=$p+100;
            }
            if($fetch['div3']==0)
            {
                $p=$p+100;
            }
            if($fetch['div4']==0)
            {
                $p=$p+100;
            }
            if($fetch['div5']==0)
            {
                $p=$p+100;
            }
            if($fetch['div6']==0)
            {
                $p=$p+100;
            }
            if($fetch['div7']==0)
            {
                $p=$p+100;
            }
            if($fetch['div8']==0)
            {
                $p=$p+100;
            }
            $p=$p/8;
    
	?>
											<tr>
											
													
													<td><?php echo $fetch['mobile_no'];?></td>
														<td><?php $mobile_no= $fetch['mobile_no'];
													if($fetch['type']==1)
													{
													    $row1 = mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl` where mobile_no='$mobile_no'");
	
                                                        while($fetch1 = mysqli_fetch_array($row1)){ 
                                                            echo $fetch1['name'];
                                                        }
  
													}
													if($fetch['type']==2)
													{
													     $row1 = mysqli_query($dbhandle,"SELECT * FROM `driver_profile_tbl` where mobile_no='$mobile_no'");
	
                                                        while($fetch1 = mysqli_fetch_array($row1)){ 
                                                            echo $fetch1['name']; }
													}
													?></td>
													<td><?php  if($fetch['type']==1)
													{
													    echo "Provider";
													}
													if($fetch['type']==2)
													{
													    echo "Driver";
													}
													?></td>
													<td><?php echo $fetch['source'];?></td><td><?php $vid= $fetch['vehicle_type']; 
													  $query11 = mysqli_query($dbhandle,"SELECT * FROM `vehicle_list` where id='$vid'");
	    while($fetch11 = mysqli_fetch_array($query11)){
	        $v_type=$fetch11['vehicle_type'];     
	        $dimension=$fetch11['dimension'];
	        $length=$fetch11['length'];
	        
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
								}				echo $c;	?></td>
													<td><?php echo $fetch['sch_date'];?></td>
												<td>	<?php
													$truckid=$fetch['posted_truck_id'];
           $row1 = mysqli_query($dbhandle,"SELECT * FROM `part_posted_truck_destination` where posted_truck_id='$truckid'");

	
while($fetch1 = mysqli_fetch_array($row1)){
  ?>
													<?php echo $fetch1['destination'];?></td> 
													<td><?php echo $fetch['current_date'];?></td>
												<td><a href="partloadpic.php?div1=<?php echo $fetch['div1'] ?>&div2=<?php echo $fetch['div2'] ?>&div3=<?php echo $fetch['div3'] ?>&div4=<?php echo $fetch['div4'] ?>&div5=<?php echo $fetch['div5'] ?>&div6=<?php echo $fetch['div6'] ?>&div7=<?php echo $fetch['div7'] ?>&div8=<?php echo $fetch['div8'] ?>"><?php echo $p; echo "%";?></a></a></td> 
											<?php } ?>	</tr>
                                              
												
<?php $x++; }?>
	

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