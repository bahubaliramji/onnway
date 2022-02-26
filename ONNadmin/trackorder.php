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
                <th>Booking date</th>
                <th>Schedule date</th>
                <th>Track</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` where price > 0");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
											<tr>
											
													<td><a href="orderdescription.php?id=<?php echo $fetch['id']; ?>"><?php echo $fetch['id'];?></a></td>
													<td><?php if( $fetch['load_type']==1){
													    echo "FULL LOAD";
													}
													else{
													    echo "PART LOAD";   
													}
													?></td>
													<td><?php echo $fetch['loader_mobile_no'];?></td>
													<td><?php echo $fetch['source'];?></td>
													<td><?php echo $fetch['destination'];?></td>
													<td><?php $vid= $fetch['vehicle_type']; 
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
													<td><?php echo $fetch['current_date'];?></td>
													<td><?php echo $fetch['sch_date'];?></td>
													<td>
                        <a href="ordertrack.php?id=<?php echo $fetch['id']; ?>" >   <button type="button" class="btn btn-primary">TRACK</button></a>
                        </td>
                        <td>  <a href="editorder.php?id=<?php echo $fetch['id']; ?>" >   <button type="button" class="btn btn-primary">EDIT</button></a>
                       </td>
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
