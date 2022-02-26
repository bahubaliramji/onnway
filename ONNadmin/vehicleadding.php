<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper"> 
    <div class="container" style="background-color: #fff; padding: 5px 5px 5px 5px; color: #111;">
                <div class="box-body box box-warning">
                      <div class="row" style="margin-top:0px;">
                            <div class="col-sm-10"></div>
                            
                            <div class="col-sm-2">
                               <a href="add-new-vehicle.php"> <button style="background-color: #008CBA;
  border: none;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;"><b>+</b>ADD VEHICLE</button></a>
                             </div>
                        </div>
                </div>
    </div>
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Vehicle Type</th>
                <th>Length</th>
                <th>Dimension</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `vehicle_list`");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
											<tr>
											
													
													<td><?php if($fetch['vehicle_type']==1){echo "Truck";} if($fetch['vehicle_type']==2){echo "Trailer";} if($fetch['vehicle_type']==3){echo "Container";}?></td>
													<td><?php echo $fetch['length']; echo"MT";?></td>
													<td><?php echo $fetch['dimension'];?></td>
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