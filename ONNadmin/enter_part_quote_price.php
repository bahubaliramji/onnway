<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$id=$_GET['id'];
?>
<section id="main-content">
    <section class="wrapper"> 
    <?php
           $row = mysqli_query($dbhandle,"select * from part_quote_details WHERE quote_id='$id'");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
      $vid=$fetch['vehicle_type'];
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
           <div class="container" style="background-color: #444; padding: 20px 20px 20px 20px; color: white;">
                <div class="box-body box box-warning">
                    
                             <form method="POST" action="enterpartquoteadmphp.php?id=<?php echo $id; ?>">
                        <div class="row" style="margin-top:30px;">
                                           
                                        <div class="col-sm-6">
                                         <div class="col-sm-2">   SOURCE: </div><div class="col-sm-4">&nbsp;&nbsp;<?php echo $fetch['source'];?></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">DESTINATION: </div><div class="col-sm-4">&nbsp;&nbsp; <?php echo $fetch['destination']; ?></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                         <div class="col-sm-2">VECHILE TYPE: </div><div class="col-sm-4">  &nbsp;&nbsp;   <?php echo $c;?></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">  MATERIAL TYPE: </div><div class="col-sm-4"> <input type="text" class="form-control" name="material" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['material_type'];?> " required></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                        <div class="col-sm-2">    WEIGHT: </div><div class="col-sm-4"><input type="text" class="form-control" name="weight" aria-describedby="emailHelp" placeholder="material" value="<?php echo $fetch['weight'];?>" required></div>
                                            </div>
                                            <div class="col-sm-6">
                                          <div class="col-sm-2">   SCHEDULE TIME:  </div><div class="col-sm-4"> <input type="text" class="form-control" name="sch_date" aria-describedby="emailHelp" placeholder="material" value=" <?php echo $fetch['sch_date'];?>" required> </div>
                                            </div>
                                        </div>
                                    </div>
            </div>
            <div style="padding: 10px 10px 10px 10px"></div>
            <?php
            $pid=$fetch['posted_truck_id'];
            $p=0;
            if($fetch['div1']==2)
            {
                $p=$p+100;
            }
            if($fetch['div2']==2)
            {
                $p=$p+100;
            }
            if($fetch['div3']==2)
            {
                $p=$p+100;
            }
            if($fetch['div4']==2)
            {
                $p=$p+100;
            }
            if($fetch['div5']==2)
            {
                $p=$p+100;
            }
            if($fetch['div6']==2)
            {
                $p=$p+100;
            }
            if($fetch['div7']==2)
            {
                $p=$p+100;
            }
            if($fetch['div8']==2)
            {
                $p=$p+100;
            }
            $p=$p/8;
           $row1 = mysqli_query($dbhandle,"SELECT * FROM `part_posted_truck` where `posted_truck_id`=$pid;");

	
while($fetch1 = mysqli_fetch_array($row1)){ $mb_no=$fetch1['mobile_no'];
$typ=$fetch1['type'];
if($typ==1)
{
    $row2 = mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl` where `mobile_no`=$mb_no;");
}
if($typ==2)
{
    $row2 = mysqli_query($dbhandle,"SELECT * FROM `driver_profile_tbl` where `mobile_no`=$mb_no;");
}
while($fetch2 = mysqli_fetch_array($row2)){
?>
  
            <div class="container" style="background-color: #444; padding: 20px 20px 20px 20px; color: white;">
                <div class="box-body box box-warning">
                      <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            MOBILE NO: <?php echo $fetch2['mobile_no'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            PERCENTAGE OF TRUCK SELECTED:<a href="partloaddetails.php?id=<?php echo $id; ?>&source=<?php echo $fetch['source']; ?>&destination=<?php echo $fetch['destination']; ?>">  <?php  echo $p; echo "%";?></a>
                                            </div>
                                        </div>
                                          <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            NAME:  <?php echo $fetch2['name'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            TRANSPORT NAME: <?php echo $fetch2['transport_name'];?> 
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                             CITY: <?php echo $fetch2['city'];?>
                                            </div> </div>
                                            <div class="row" style="margin-top:30px;">
                                            <div class="col-sm-6">
                                            USER PRICE: <input type="text" class="form-control" name="price" value="<?php echo $fetch['final_price']; ?>" style="width: 300px;" >
                                            </div>
                                       
                                                                    <div class="col-sm-6">
                                            DRIVER PRICE: <input type="text" class="form-control" name="driver_price" value="<?php echo $fetch['driver_price']; ?>" style="width: 300px;" >
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px; margin-left:400px; align: center">
                                         <input value="SUBMIT" class="btn btn-primary btn-lg" id="submit" type="submit" name="submit" style="width: 300px;">
                                            </form>
                                        </div>
              </div>
            </div> 
    </section>
     <?php } } } }?>
</section>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
</body>
<?php
include("footer.php");
?>