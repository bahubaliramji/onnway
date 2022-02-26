<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper"> 
    <div class="container" style="background-color: #fff; padding: 5px 5px 5px 5px; color: #111;">
                <div class="box-body box box-warning">
                  
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Mobile number</th>
                <th>Name</th>
                <th>Transport Name</th>
                <th>City</th>
                <th>Requests</th>
                <th>Verify</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl`");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
											<tr>
											
													
													<td><?php echo $fetch['mobile_no'];?></td>
													<td><?php echo $fetch['name'];?></td>
													<td><?php echo $fetch['transport_name'];?></td>
												
													<td><?php echo $fetch['city'];?></td>
													<td><?php if(!($fetch['change_mobile']==0 AND $fetch['change_name']==0 AND $fetch['change_city']==0)){ ?><button type="button" class="btn btn-primary">REQUEST</button><?php } else { echo "NO REQUEST"; } ?> </td>
                                                    <td><a href="verifyprovider.php?mobile_no=<?php echo $fetch['mobile_no']; ?>"><button type="button" class="btn btn-primary">VIEW</button></a></td>
                                            	    <td><a href="delprovider.php?mobile_no=<?php echo $fetch['mobile_no']; ?>"><button type="button" class="btn btn-primary">DELETE</button></a></td>
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