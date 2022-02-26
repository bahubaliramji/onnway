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
                <th>ID</th>
                <th>Load type</th>
                <th>Loader Mobile no</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Vehicle type</th>
                <th>Material type</th>
                <th>Schedule date</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `order_enquiry` ");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
											<tr>
											
													<td><?php echo $fetch['id'];?></td>
													<td><?php if( $fetch['load_type']==1){
													    echo "FULL LOAD";
													}
													else{
													    echo "PART LOAD";   
													}
													?></td>
													<td><?php echo $fetch['mobile_no'];?></td>
													<td><?php echo $fetch['source'];?></td>
													<td><?php echo $fetch['destination'];?></td>
													<td><?php echo $fetch['vehicle_type'];?></td>
													<td><?php echo $fetch['material_type'];?></td>
													<td><?php echo $fetch['sch_date'];?></td>
												</tr>
                                              
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
