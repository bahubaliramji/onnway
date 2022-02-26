<?php
	  $fname = basename($_SERVER['PHP_SELF']);
	  
	  $active1 = $active2 = $active3 = $active4 = $active5 = $active6 = $active7 = $active8 = $active9 = $active10 = $active11 = $active12 = $active13 = "";
	  $active14 = $active15 = $active16 = $active17 = $active18 = $active19 = $active20 = $active21 = $active22 = $active23 = $active24 =$active25 = "";
	  
	  if($fname == "dashboard2.php")
	  {
		  $active1 = 'active';
	  }
	  if($fname == "verified_workers2.php")
	  {
		  $active2 = 'active';
		  $active5 = 'active';
	  }
	  
	  if($fname == "verified_contractors2.php")
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
	  if($fname == "profile.php")
	  {
		  $active10 = 'active';
	  }
	  if($fname == "ab.php")
	  {
		  $active11 = 'active';
	  }
	  if($fname == "fa.php")
	  {
		  $active12 = 'active';
	  }
	  if($fname == "po.php")
	  {
		  $active13 = 'active';
	  }
	  if($fname == "te.php")
	  {
		  $active14 = 'active';
	  }
	  if($fname == "location.php")
	  {
		  $active16 = 'active';
	  }
	  if($fname == "ho.php")
	  {
		  $active17 = 'active';
	  }
	  if($fname == "co.php")
	  {
		  $active18 = 'active';
	  }
	  if($fname == "kn.php")
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
      
      <span class="brand-text font-weight-light">Workers Joint Brand</span>
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
            <a href="dashboard2.php" class="nav-link <?= $active1; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
			   
			   <li class="nav-item">
            <a href="verified_workers2.php" class="nav-link <?= $active2; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Workers
              </p>
            </a>
          </li>
		  
		  <li class="nav-item">
            <a href="verified_contractors2.php" class="nav-link <?= $active3; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contractors
              </p>
            </a>
          </li>
			   
          
		 
		  
		  
		  
		  <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link <?= $active8; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Jobs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="worker_jobs2.php" class="nav-link <?= $active7; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Workers Jobs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="contractor_jobs2.php" class="nav-link <?= $active9; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contractor Jobs</p>
                </a>
              </li>
              
            </ul>
          </li>
		  
		
          
          
		  <li class="nav-item">
            <a href="profile.php" class="nav-link <?= $active10; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Profile
              </p>
            </a>
		  </li>
		  
		  <li class="nav-item">
            <a href="ab.php" class="nav-link <?= $active11; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                About Us
              </p>
            </a>
		  </li>
		  
		  <li class="nav-item">
            <a href="fa.php" class="nav-link <?= $active12; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                FAQs
              </p>
            </a>
		  </li>
		  
		  <li class="nav-item">
            <a href="po.php" class="nav-link <?= $active13; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Policies
              </p>
            </a>
		  </li>
		  
		  <li class="nav-item">
            <a href="te.php" class="nav-link <?= $active14; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Terms and Conditions
              </p>
            </a>
		  </li>
		  
		<!--  <li class="nav-item">
            <a href="profile.php" class="nav-link <?= $active15; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Raise Complaint
              </p>
            </a>
		  </li>
		  
		  <li class="nav-item">
            <a href="profile.php" class="nav-link <?= $active16; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Give Feedback
              </p>
            </a>
		  </li>
	-->
		  <li class="nav-item">
            <a href="ho.php" class="nav-link <?= $active17; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                How to use
              </p>
            </a>
		  </li>
		  
		  <li class="nav-item">
            <a href="co.php" class="nav-link <?= $active18; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contact Us
              </p>
            </a>
		  </li>
		  
		  <li class="nav-item">
            <a href="kn.php" class="nav-link <?= $active19; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Knowledge Center
              </p>
            </a>
          </li>
          
          
          
          
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>