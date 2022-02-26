<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper"> 
   
           <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li>Dashboard</li>                          
                    </ol>
                </div>
            </div>
             <?php 
                
                 $result = mysqli_query($dbhandle,"SELECT * FROM `loader_profile_tbl`");
                 $rowcount=mysqli_num_rows($result);
             ?>
             
            <div class="row"> 
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                   <a href="loaderlogin.php"> <div class="info-box blue-bg">
                        
                        <div class="count"><?php echo $rowcount; ?></div>
                        <div class="title">Loader</div>                     
                    </div><!--/.info-box-->  </a>       
                </div><!--/.col-->
                <?php 
                 $result1 = mysqli_query($dbhandle,"SELECT * FROM `provider_profile_tbl`");
                 $rowcount1=mysqli_num_rows($result1);
             ?>
            
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a href="truckprovider.php">     <div class="info-box brown-bg">
                        
                        <div class="count"><?php echo $rowcount1; ?></div>
                        <div class="title">Provider</div>                      
                    </div><!--/.info-box-->         
                </div><!--/.col--> </a> 
                <?php 
                 $result2 = mysqli_query($dbhandle,"SELECT * FROM `driver_profile_tbl`");
                 $rowcount2=mysqli_num_rows($result2);
             ?>
            
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                 <a href="truckdriver.php">    <div class="info-box dark-bg">
                        
                        <div class="count"><?php echo $rowcount2; ?></div>
                        <div class="title">Driver</div>                     
                    </div><!--/.info-box-->         
                </div><!--/.col--></a>
                <?php 
                 $result3 = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load`");
                 $rowcount3=mysqli_num_rows($result3);
             ?>
            
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a href="trackorder.php">     <div class="info-box green-bg">
                        
                        <div class="count"><?php echo $rowcount3; ?></div>
                        <div class="title">Booking</div>                        
                    </div><!--/.info-box-->         
                </div><!--/.col--></a>
                
            </div><!--/.row-->
     
            <div class="main">
      
                          <table class="table mb-0" style="border: 1; background-color: #fff;">
                      <thead class="bg-light">
                        <tr>
                          <th align="center">Booking ID</th>
                          <th align="center">Source</th>
                          <th align="center">Destination</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                               <?php 
                 $query = mysqli_query($dbhandle,"SELECT * FROM `full_truck_book_load` ORDER BY id DESC LIMIT 4");
                 while($fetch = mysqli_fetch_array($query)){
             ?>
                          <td><a href="orderdescription.php?id=<?php echo $fetch['id']; ?>"><?php echo $fetch['id'];?></a></td>
                          <td><?php echo $fetch['source'];?></td>
                          <td><?php echo $fetch['destination'];?></td>
                          
                        </tr>
                       <?php } ?>
                      </tbody>
                    </table>
                        </div>
          

                
                  

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
    </section>
</section>
<?php
include("footer.php");
?>