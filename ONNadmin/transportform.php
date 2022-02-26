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
            	<th>SOURCE</th>
				<th>DESTINATION</th>
			    <th>FULL LOAD</th>
                <th>PART LOAD</th>
                <th>VEHICLE TYPE</th>
                <th>MATERIAL</th>
			    <th>MONTHLY REQ.</th>
			    <th>NAME</th>
				<th>CONTACT NO.</th>
				<th>COMP. NAME</th>
				<th>EMAIL</th>
            </tr>
        </thead>
        <tbody>
           <?php 
	
$row = mysqli_query($dbhandle,"SELECT * FROM `formtransport` ORDER BY id DESC");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
    $formmid=$fetch['id'];
    $row1 = mysqli_query($dbhandle,"select * from formdestination where formid='$formmid'");

	
while($fetch1 = mysqli_fetch_array($row1)){
    $row2 = mysqli_query($dbhandle,"select * from formvehicle where formid='$formmid'");

while($fetch2 = mysqli_fetch_array($row2)){
   $vid=$fetch2['vechiletype'];
    $row3 = mysqli_query($dbhandle,"select * from vehicle_list where id='$vid'");

while($fetch3 = mysqli_fetch_array($row3)){
    
	?>
											<tr>
											
													
													<td><?php echo $fetch['source'];?></td>
													<td><?php echo $fetch1['city'];?></td>
													<td><?php echo $fetch['partload'];?></td>
													<td><?php echo $fetch['fullload'];?></td>
													<td><?php /* if($fetch3['vehicle_type']==1)
													{
													       echo ("Truck ");
													}if($fetch3['vehicle_type']==2)
													{
													       echo ("Trailer ");
													}if($fetch3['vehicle_type']==3)
													{
													       echo ("container ");
													} echo $fetch3['length']; echo $fetch3['dimension']; */?></td>
													<td><?php echo $fetch['material'];?></td>
													<td><?php echo $fetch['monthlyrequirement'];?></td>
													<td><?php echo $fetch['name'];?></td>
													<td><?php echo $fetch['contactno'];?></td>
													<td><?php echo $fetch['companyname'];?></td>
													<td><?php echo $fetch['emailid'];?></td>
                                              
												</tr>
<?php $x++; } } } }?>
	

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