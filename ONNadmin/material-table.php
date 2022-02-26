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
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                               <a href="add-new-material.php"> <button style="background-color: #008CBA;
  border: none;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;"><b>+</b>ADD MATERIAL</button></a>
                             </div>
                        </div>
                </div>
    </div>
          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Material name</th>
                
            </tr>
        </thead>
        <tbody><?php
           $row = mysqli_query($dbhandle,"SELECT * FROM `tbl_material`");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
											<tr>
											
													
													
													<td><?php echo $fetch['id'];?></td>
								
													<td><?php echo $fetch['material_name'];?></td>
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