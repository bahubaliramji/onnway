<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
$id=$_GET['id'];
?>
<section id="main-content">
    <section class="wrapper"> 
    <?php
           $row = mysqli_query($dbhandle,"select * from full_truck_book_load WHERE id='$id'");
$x=1;
	
while($fetch = mysqli_fetch_array($row)){
  
    
	?>
           <div class="container" style="background-color: #444; padding: 20px 20px 20px 20px; color: white;">
                <div class="box-body box box-warning">
                      <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            SOURCE: <?php echo $fetch['source'];?>
                                            </div>
                                            <div class="col-sm-6">
                                          DESTINATION:  <?php echo $fetch['destination'];?>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            VECHILE TYPE:  <?php echo $fetch['vehicle_type'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            MATERIAL TYPE:  <?php echo $fetch['material_type'];?>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            WEIGHT:  <?php echo $fetch['weight'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            SCHEDULE TIME:  <?php echo $fetch['sch_date'];?>
                                            </div>
                                        </div>
                                       <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            PICKUP STREET:  <?php echo $fetch['pickup_street'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            PICKUP PINCODE:  <?php echo $fetch['pickup_pincode'];?>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            DROP STREET:  <?php echo $fetch['drop_street'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            DROP PINCODE:  <?php echo $fetch['drop_pincode'];?>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            PRICE:  <?php echo $fetch['price'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            AMOUNT DUE:  <?php echo $fetch['due_amount'];?>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            DRIVER MOBILE:  <?php echo $fetch['driver_mobile_no'];?>
                                            </div>
                                            <div class="col-sm-6">
                                            BOOKING TYPE:  <?php echo $fetch['load_type'];?>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            ITEM DELIVERED:  <?php if($fetch['item_delivered']==1){echo "Yes";} else{ echo "No"; }?>
                                            </div>
                                            
                                        </div><?php 
                                   
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
            $p=$p/8; ?>
                                         <div class="row" style="margin-top:30px;">
                                        <div class="col-sm-6">
                                            
                                            PERCENTAGE USED:  <?php if($fetch['load_type']==1){echo "100%";} else{ echo $p; echo "%";}?>
                                            </div>
                                            
                                        </div>
                                        
              </div>
            </div>
           

    </section>
     <?php  }?>
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