<?php
	  $fname = basename($_SERVER['PHP_SELF']);
	  
	  $active1 = $active2 = $active3 = $active4 = $active5 = $active6 = $active7 = $active8 = $active9 = $active10 = $active11 = $active12 = $active13 = "";
	  $active14 = $active15 = $active16 = $active17 = $active18 = $active19 = $active20 = $active21 = $active22 = $active23 = $active24 =$active25 = "";
	  
	  if($fname == "dashboard3.php")
	  {
		  $active1 = 'active';
	  }
	  if($fname == "completed.php")
	  {
		  $active2 = 'active';
		  $active5 = 'active';
	  }
	  
	  if($fname == "ongoing.php")
	  {
		  $active3 = 'active';
		  $active5 = 'active';
	  }
	  if($fname == "verified_brands.php")
	  {
		  $active4 = 'active';
		  $active5 = 'active';
	  }
	  if($fname == "pending.php")
	  {
		  $active6 = 'active';
		  $active23 = 'active';
	  }if($fname == "pending_verification.php")
	  {
		  $active24 = 'active';
		  $active23 = 'active';
	  }if($fname == "incomplete.php")
	  {
		  $active25 = 'active';
		  $active23 = 'active';
	  }if($fname == "worker_jobs2.php")
	  {
		  $active7 = 'active';
		  $active8 = 'active';
	  }
	  if($fname == "contractor_jobs2.php")
	  {
		  $active9 = 'active';
		  $active8 = 'active';
	  }
	  if($fname == "knowledge_center.php")
	  {
		  $active10 = 'active';
	  }
	  if($fname == "about.php")
	  {
		  $active11 = 'active';
		  $active15 = 'active';
	  }
	  if($fname == "faq.php")
	  {
		  $active12 = 'active';
		  $active15 = 'active';
	  }
	  if($fname == "policies.php")
	  {
		  $active13 = 'active';
		  $active15 = 'active';
	  }
	  if($fname == "terms.php")
	  {
		  $active14 = 'active';
		  $active15 = 'active';
	  }
	  if($fname == "location.php")
	  {
		  $active16 = 'active';
	  }
	  if($fname == "sectors.php")
	  {
		  $active17 = 'active';
	  }
	  if($fname == "skills.php")
	  {
		  $active18 = 'active';
	  }
	  if($fname == "jobs.php")
	  {
		  $active19 = 'active';
	  }
	  if($fname == "officers.php")
	  {
		  $active20 = 'active';
	  }
	  if($fname == "complaints.php")
	  {
		  $active21 = 'active';
	  }
	  if($fname == "feedback.php")
	  {
		  $active22 = 'active';
	  }
	  
	  ?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      
      <span class="brand-text font-weight-light">Workers Joint Officer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
			   <li class="nav-item">
            <a href="dashboard3.php" class="nav-link <?= $active1; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
	  			Dashboard
              </p>
            </a>
          </li>
			   
			   <li class="nav-item">
            <a href="ongoing.php" class="nav-link <?= $active3; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ongoing Surveys
              </p>
            </a>
          </li>
			   
			   <li class="nav-item">
            <a href="completed.php" class="nav-link <?= $active2; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Completed Surveys
              </p>
            </a>
          </li>
		  
		 
		
          
          
          
          
          
          
          
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>