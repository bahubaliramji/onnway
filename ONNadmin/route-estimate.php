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
                               <a href="add-new-route.php"> <button style="background-color: #008CBA;
  border: none;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;"><b>+</b>ADD ROUTE</button></a>
                             </div>
                        </div>
                </div>
    </div>
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SOURCE</th>
                <th>DESTINATION</th>
                <th>VEHICLE TYPE</th>
                <th>PRICE</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `tbl_estimate` ORDER BY `id` DESC");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
   $vid=$fetch['truck_type'];
	   
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
											
													
												
													<td><?php echo $fetch['from_id'];?></td>
													<td><?php echo $fetch['to_id'];?></td>
								                    <td><?php echo $c;?></td>
								                    <td><?php echo $fetch['price'];?></td>
								                     <td><a href="edit-route.php?id=<?php echo $fetch['id']; ?>"><button type="button" class="btn btn-info">EDIT</button></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="delete-route.php?id=<?php echo $fetch['id']; ?>"><button type="button" class="btn btn-danger">DELETE</button></a></td>
											
												</tr>
                                              
												</tr>
<?php $x++; } }?>
	

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