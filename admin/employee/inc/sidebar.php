<?php
	  $fname = basename($_SERVER['PHP_SELF']);
	  
	  
	  $active1 = $active2 = $active3 = $active4 = $active5 = $active6 = $active7 = $active8 = $active9 = $active10 = $active11 = $active12 = $active13 = $active14 = $active15 =$active16 =$active17 =$active18 =$active19 = "";
	  
	  
	  
	  
    if($fname == "dashboard.php")
	{
        $active1 = 'active';
    }
    if($fname == "trucks.php")
	{
        $active2 = 'active';
    }
    if($fname == "materials.php")
	{
        $active3 = 'active';
    }
    if($fname == "fares.php")
	{
        $active4 = 'active';
    }
    if($fname == "loaders.php")
	{
        $active5 = 'active';
    }
    if($fname == "transporters.php")
	{
        $active6 = 'active';
    }
    if($fname == "drivers.php")
	{
        $active7 = 'active';
    }
    if($fname == "confirmed.php")
	{
        $active8 = 'active';
    }
    if($fname == "loader_full_load.php")
	{
        $active9 = 'active';
    }
    if($fname == "loader_full_load_bid.php")
	{
        $active10 = 'active';
    }
    if($fname == "loader_part_load_bid.php")
	{
        $active11 = 'active';
    }
    if($fname == "full_load_posted.php")
	{
        $active12 = 'active';
    }
    if($fname == "part_load_posted.php")
	{
        $active13 = 'active';
    }
    if($fname == "receipts.php")
	{
        $active14 = 'active';
    }
    if($fname == "name_change.php")
	{
        $active15 = 'active';
    }
    if($fname == "feedback.php")
	{
        $active16 = 'active';
    }
    if($fname == "subject.php")
	{
        $active17 = 'active';
    }
    if($fname == "ratings.php")
	{
        $active18 = 'active';
    }
    if($fname == "employee.php")
	{
        $active19 = 'active';
    }
	  
	  ?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-red elevation-4">
    <!-- Brand Logo -->


    <a href="dashboard.php" class="brand-link">
    <img src="<?= base_url.'upload/logo.png'; ?>" alt="Admin Logo" class="brand-image elevation-1"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Employee Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <?php
      //echo "SELECT * FROM count WHERE loading = 'read' LMIMT 1";
      
      $employeedata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM employee WHERE id = '$role'"));
      
      
      $confirmeddata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE confirmed = 'read' LIMIT 1"));
      $loadingdata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE loading = 'read' LIMIT 1"));
      $full_loaddata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE full_load = 'read' LIMIT 1"));
      $part_loaddata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE part_load = 'read' LIMIT 1"));
      $full_load_trucksdata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE full_load_trucks = 'read' LIMIT 1"));
      $part_load_trucksdata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE part_load_trucks = 'read' LIMIT 1"));
      $receiptsdata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE receipts = 'read' LIMIT 1"));
      $namedata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE name = 'read' LIMIT 1"));
      $feedbackdata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE feedback = 'read' LIMIT 1"));
      $ratingsdata = mysqli_num_rows(mysqli_query($con , "SELECT * FROM count WHERE ratings = 'read' LIMIT 1"));
      
      if($confirmeddata > 0)
      {
          $confirmed = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $confirmed = '';
      }
      
      if($loadingdata > 0)
      {
          $loading = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $loading = '';
      }
      
      if($full_loaddata > 0)
      {
          $full_load = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $full_load = '';
      }
      
      if($part_loaddata > 0)
      {
          $part_load = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $part_load = '';
      }
      
      if($full_load_trucksdata > 0)
      {
          $full_load_trucks = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $full_load_trucks = '';
      }
      
      if($part_load_trucksdata > 0)
      {
          $part_load_trucks = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $part_load_trucks = '';
      }
      
      if($receiptsdata > 0)
      {
          $receipts = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $receipts = '';
      }
      
      if($namedata > 0)
      {
          $name = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $name = '';
      }
      
      if($feedbackdata > 0)
      {
          $feedback = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $feedback = '';
      }
      
      if($ratingsdata > 0)
      {
          $ratings = '<span class="right badge badge-info">New</span>';
      }
      else
      {
          $ratings = '';
      }
      
      ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
			   
			   <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?= $active1; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
			   
			   <?php
			   
			   $data = $employeedata['data'];
			   
			   if(!empty($data))
			   {
			       ?>
			       
			       
			   
			   <li class="nav-header">DATA MANAGEMENT</li>
			   
          <li class="nav-item">
            <a href="trucks.php" class="nav-link <?= $active2; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Trucks Management
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="materials.php" class="nav-link <?= $active3; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Material Management
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="fares.php" class="nav-link <?= $active4; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Fares Management
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="subject.php" class="nav-link <?= $active17; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Subjects Management
              </p>
            </a>
          </li>
		  
		  
		  <?php
			   }
			   
			   ?>
		  
		  <?php
			   
			   $users = $employeedata['users'];
			   
			   if(!empty($users))
			   {
			       ?>
		  
		  <li class="nav-header">USERS MANAGEMENT</li>
		  
          
          <li class="nav-item">
            <a href="loaders.php" class="nav-link <?= $active5; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Loaders Management
              </p>
            </a>
          </li>
		  
		  
		  <li class="nav-item">
            <a href="transporters.php" class="nav-link <?= $active6; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Transporters Management
              </p>
            </a>
          </li>
		  
		  
		  <li class="nav-item">
            <a href="drivers.php" class="nav-link <?= $active7; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Drivers Management
              </p>
            </a>
          </li>
          
           <?php
			   }
			   
			   ?>
		  
		  
		  
		  <?php
			   
			   $loaders = $employeedata['loaders'];
			   
			   if(!empty($loaders))
			   {
			       ?>
		  
		  
          <li class="nav-header">LOADERS ENQUIRIES</li>
          
          <li class="nav-item">
            <a href="confirmed.php" class="nav-link <?= $active8; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Confirmed Orders
                <?= $confirmed; ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="loader_full_load.php" class="nav-link <?= $active9; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Loading Enquiries
                <?= $loading; ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="loader_full_load_bid.php" class="nav-link <?= $active10; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Full Load Bidding Quotes
                <?= $full_load; ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="loader_part_load_bid.php" class="nav-link <?= $active11; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Part Load Bidding Quotes
                <?= $part_load; ?>
              </p>
            </a>
          </li>
          
          <?php
			   }
			   
			   ?>
          
          
          
          
          <?php
			   
			   $trucks = $employeedata['trucks'];
			   
			   if(!empty($trucks))
			   {
			       ?>
          
          
          <li class="nav-header">TRANSPORTERS POSTED TRUCKS</li>
          
          <li class="nav-item">
            <a href="full_load_posted.php" class="nav-link <?= $active12; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Full Load Trucks
                <?= $full_load_trucks; ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="part_load_posted.php" class="nav-link <?= $active13; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Part Load Trucks
                <?= $part_load_trucks; ?>
              </p>
            </a>
          </li>
          
          <?php
			   }
			   
			   ?>
			   
			   
			   
			   
			   <?php
			   
			   $requests = $employeedata['requests'];
			   
			   if(!empty($requests))
			   {
			       ?>
          
          <li class="nav-header">REQUESTS</li>
          
          <li class="nav-item">
            <a href="receipts.php" class="nav-link <?= $active14; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Payment Receipts
                <?= $receipts; ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="name_change.php" class="nav-link <?= $active15; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Name change Requests
                <?= $name; ?>
              </p>
            </a>
          </li>
          <?php
			   }
			   
			   ?>
			   
			   <?php
			   
			   $other = $employeedata['other'];
			   
			   if(!empty($other))
			   {
			       ?>
         
         
         <li class="nav-header">OTHER SETTINGS</li>
          
          
          <li class="nav-item">
            <a href="feedback.php" class="nav-link <?= $active16; ?>" >
              <i class="nav-icon fas fa-th"></i>
              <p>
                Customer Feedback
                <?= $feedback; ?>
              </p>
            </a>
          </li> 
          
          <li class="nav-item">
            <a href="ratings.php" class="nav-link <?= $active18; ?>" >
              <i class="nav-icon fas fa-th"></i>
              <p>
                Customer Ratings
                <?= $ratings; ?>
              </p>
            </a>
          </li> 
         
         <?php
			   }
			   
			   ?>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>