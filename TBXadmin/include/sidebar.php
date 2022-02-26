  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/no-image.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
         <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- search form -->
  <style type="text/css">
    
b.numm {
    color: red;
}
    
<?php
$type='admin';
?>

  </style>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="<?php if($sidepage == 'dashboard'){ echo 'active'; } ?> treeview">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
		<?php if($type=='admin'){ ?>
		
		<li class="<?php if($sidepage == 'login'){ echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Login Management</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($innersidepage == 'emplogin'){ echo 'active'; } ?>"><a href="emplogin.php"><i class="fa fa-circle-o"></i>Employee Login </a></li>
            <li class="<?php if($innersidepage == 'calllogin'){ echo 'active'; } ?>"><a href="calllogin.php"><i class="fa fa-circle-o"></i> Call Center Login</a></li>
          </ul>
        </li>

 <?php 

    $newl = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_loader where news=0"));
     $newindustry = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_loader where news=0 and loader_type='Industry'"));
      $newlogis = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_loader where news=0  and loader_type='Logistics'"));
     


    ?>





			<li class="<?php if($sidepage == 'loader'){ echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Loader Registration <b class="numm"><?php if($newl!=0){ echo $newl;} ?></b></span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($innersidepage == 'loadercompany'){ echo 'active'; } ?>"><a href="loader.php?type=industry"><i class="fa fa-circle-o"></i>INDUSTRY  <b class="numm"><?php if($newindustry!=0){ echo $newindustry;} ?></b></a></li>
            <li class="<?php if($innersidepage == 'loaderindividual'){ echo 'active'; } ?>"><a href="loader.php?type=logistics"><i class="fa fa-circle-o"></i> LOGISTICS <b class="numm"><?php if($newlogis!=0){ echo $newlogis;} ?></b></a></li>
          </ul>
        </li>
		


  <?php 

    $new = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0"));
     $newdriver = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0 and vehicle_owner_type='driver'"));
      $newowner = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0  and vehicle_owner_type='owner'"));
       $newtransporter = mysqli_num_rows(mysqli_query($dbhandle, "select * from tbl_vehicle_owner where news=0 and vehicle_owner_type='transporter'"));




    ?>


		<li class="<?php if($sidepage == 'vehicle'){ echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Vehicle Registration  <b class="numm"><?php if($new!=0){ echo $new;} ?></b></span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($innersidepage == 'vehicleowner'){ echo 'active'; } ?>"><a href="vehicle-owner.php"><i class="fa fa-circle-o"></i>Vehicle Owner <b class="numm"><?php if($newowner!=0){ echo $newowner;} ?></b></a></li>
            <li class="<?php if($innersidepage == 'vehicletransporter'){ echo 'active'; } ?>"><a href="vehicle-transporter.php"><i class="fa fa-circle-o"></i> Transporter <b class="numm"><?php if($newtransporter!=0){ echo $newtransporter;} ?></b></a></li>


              <li class="<?php if($innersidepage == 'vehicledriver'){ echo 'active'; } ?>"><a href="vehicle-driver.php"><i class="fa fa-circle-o"></i> Driver <b class="numm"><?php if($newdriver!=0){ echo $newdriver;} ?></b></a></li>


			 <li class="<?php if($innersidepage == 'vehicleagent'){ echo 'active'; } ?>"><a href="vehicle-agent.php"><i class="fa fa-circle-o"></i> Agent</a></li>
			 <li class="<?php if($innersidepage == 'vehiclealltruck'){ echo 'active'; } ?>"><a href="vehicle-all-truck.php"><i class="fa fa-circle-o"></i> All Truck List</a></li>
          </ul>
        </li>
		
		<!--<li class="<?php if($sidepage == 'bookmanag'){ echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Booking Management</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($innersidepage == 'pendbook'){ echo 'active'; } ?>"><a href="pendbook.php"><i class="fa fa-circle-o"></i>Pending Booking</a></li>
            <li class="<?php if($innersidepage == 'confirmbook'){ echo 'active'; } ?>"><a href="confirmbook.php"><i class="fa fa-circle-o"></i>Confirm Booking</a></li>
          </ul>
        </li>-->



  <li class="<?php if($sidepage == 'order'){ echo 'active'; } ?> treeview">

          <a href="#">

            <i class="fa fa-files-o"></i>

            <span>Order Management</span>

            <span class="pull-right-container">

             <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li class="<?php if($innersidepage == 'order_industry'){ echo 'active'; } ?>"><a href="order.php"><i class="fa fa-circle-o"></i>Industry Order</a></li>

            <li class="<?php if($innersidepage == 'order_logi'){ echo 'active'; } ?>"><a href="order_logistics.php"><i class="fa fa-circle-o"></i> Logistics Order</a></li>

          </ul>


     <!--    </li>
            <li class="<?php if($sidepage == 'order'){ echo 'active'; } ?>"><a href="order.php"><i class="fa fa-files-o"></i>Order Management</a></li> -->




			 <li class="<?php if($sidepage == 'track'){ echo 'active'; } ?>"><a href="track.php"><i class="fa fa-files-o"></i>Track Order</a></li>
			<li class="<?php if($sidepage == 'payment'){ echo 'active'; } ?>"><a href="payment_method_management.php"><i class="fa fa-files-o"></i>Payment Method Management</a></li>
        <li class="<?php if($sidepage == 'material'){ echo 'active'; } ?>"><a href="material_list.php"><i class="fa fa-files-o"></i>Material</a></li> 
         <li class="<?php if($sidepage == 'vehicle1'){ echo 'active'; } ?>"><a href="vehicle_list.php"><i class="fa fa-files-o"></i>Vehicle</a></li>
	<?php } ?>
	
	<?php

 $newb = mysqli_num_rows(mysqli_query($dbhandle, "select * from  tbl_book_load where news=0"));
  $newt = mysqli_num_rows(mysqli_query($dbhandle, "select * from  tbl_post_truck where news=0"));
   $newle = mysqli_num_rows(mysqli_query($dbhandle, "select * from  tbl_post_load_enq where news=0"));

 $totbook = $newt+$newb+$newle;

   if($type=='admin' OR $type=='call'){ ?>
		<li class="<?php if($sidepage == 'Booking'){ echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Booking <b class="numm"><?php if($totbook!=0){ echo $totbook;} ?></b></span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($innersidepage == 'bookload'){ echo 'active'; } ?>"><a href="bookload.php"><i class="fa fa-circle-o"></i>Post a Load  <b class="numm"><?php if($newb!=0){ echo $newb;} ?></b></a></li>
			  <li class="<?php if($innersidepage == 'bookloadenq'){ echo 'active'; } ?>"><a href="bookloadenq.php"><i class="fa fa-circle-o"></i>Post a Load Enquiry  <b class="numm"> <?php if($newle!=0){ echo $newle;} ?></b></a></li>
            <li class="<?php if($innersidepage == 'booktruck'){ echo 'active'; } ?>"><a href="booktruck.php"><i class="fa fa-circle-o"></i> Post a Truck  <b class="numm"><?php if($newt!=0){ echo $newt;} ?></b></a></li>
			<li class="<?php if($innersidepage == 'booktruck_info'){ echo 'active'; } ?>"><a href="booktruck_info.php"><i class="fa fa-circle-o"></i> Post Truck Info</a></li>
			
			 <li class="<?php if($innersidepage == 'truck_enq'){ echo 'active'; } ?>"><a href="post-truck-enq.php"><i class="fa fa-circle-o"></i> Post a Truck Enquiry</a></li>
          </ul>
        </li>
	
	<?php } ?>
  <?php if($type=='admin'){ ?>
    <li class="<?php if($sidepage == 'city'){ echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>City</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($innersidepage == 'category'){ echo 'active'; } ?>"><a href="city_category.php"><i class="fa fa-circle-o"></i>Category</a></li>
            <li class="<?php if($innersidepage == 'citylist'){ echo 'active'; } ?>"><a href="city_list.php"><i class="fa fa-circle-o"></i>City</a></li>
          </ul>
        </li>



          <li class="<?php if($sidepage == 'estimates'){ echo 'active'; } ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Estimates</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($innersidepage == 'add_estimate'){ echo 'active'; } ?>"><a href="add_estimate.php"><i class="fa fa-circle-o"></i>Add</a></li>
            <li class="<?php if($innersidepage == 'all_estimate'){ echo 'active'; } ?>"><a href="estimates.php"><i class="fa fa-circle-o"></i>All</a></li>
          </ul>
        </li>
  
  <?php } ?>
     
	 <li class="<?php if($sidepage == 'reset-password.php'){ echo 'active'; } ?>"><a href="reset-password.php"><i class="fa fa-files-o"></i>Reset Password</a></li>
	 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>