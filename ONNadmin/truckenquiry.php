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
                <th>type</th>
                <th>source</th>
                <th>vehicle type</th>
                <th>schedule date</th>
                <th>destination</th>
            </tr>
        </thead>
        <tbody><?php
        
           $row = mysqli_query($dbhandle,"SELECT * FROM `full_posted_truck`");
$x=1;
	SELECT * FROM `full_posted_truck_destination` where posted_truck_id='$truckid'
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
											<tr>
											
													
													<td><?php echo $fetch['mobile_no'];?></td>
													<td><?php echo $fetch['type'];?></td>
													<td><?php echo $fetch['source'];?></td>
													<td><?php echo $fetch['vehicle_type'];?></td>
													<td><?php echo $fetch['sch_date'];?></td>
													<?php
													$truckid=$fetch['posted_truck_id'];
           $row1 = mysqli_query($dbhandle,"SELECT * FROM `full_posted_truck_destination` where posted_truck_id='$truckid'");

	
while($fetch1 = mysqli_fetch_array($row1)){
  ?>
													<td><?php echo $fetch1['destination'];?> ,</td> <?php } ?>
												</tr>
                                              
												
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