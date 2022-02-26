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
                
                <th>Loader Mobile no</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Material type</th>
                <th>Schedule date</th>
                <th>Weight</th>
                <th>L,W,H</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `partload_enquiry` ");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
											<tr>
											
													<td><?php echo $fetch['id'];?></td>
													
													<td><?php echo $fetch['mobile_no'];?></td>
													<td><?php echo $fetch['source'];?></td>
													<td><?php echo $fetch['destination'];?></td>
													<td><?php echo $fetch['material_type'];?></td>
													<td><?php echo $fetch['sch_date'];?></td>
													<td><?php echo $fetch['weight'];?></td>
													<td><?php echo $fetch['length'].','.$fetch['width'].','.$fetch['height'];?></td>
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
