<?php
$fname = basename($_SERVER['PHP_SELF']);


$active1 = $active2 = $active3 = $active4 = $active5 = $active6 = $active7 = $active8 = $active9 = $active10 = $active11 = $active12 = $active13 = $active14 = $active15 = $active16 = $active17 = $active18 = $active19 = $active20 = $active21 = $active22 = $active23 = $active24 = $active25 = $active26 = $active27 = $active28 = $active29 = $active30 = $active31 = $active32 = $active33 = $active34 = $active35 = $active36 =$active37 =$active38 =$active39 ="";




if ($fname == "dashboard.php") {
  $active1 = 'active';
}
if ($fname == "trucks.php") {
  $active2 = 'active';
}
if ($fname == "materials.php") {
  $active3 = 'active';
}
if ($fname == "fares.php") {
  $active4 = 'active';
}
if ($fname == "loaders.php") {
  $active5 = 'active';
}
if ($fname == "transporters.php") {
  $active6 = 'active';
}
if ($fname == "drivers.php") {
  $active7 = 'active';
}
if ($fname == "confirmed.php") {
  $active8 = 'active';
}
if ($fname == "loader_full_load.php") {
  $active9 = 'active';
}
if ($fname == "loader_full_load_bid.php") {
  $active10 = 'active';
}
if ($fname == "loader_part_load_bid.php") {
  $active11 = 'active';
}
if ($fname == "full_load_posted.php") {
  $active12 = 'active';
}
if ($fname == "part_load_posted.php") {
  $active13 = 'active';
}
if ($fname == "receipts.php") {
  $active14 = 'active';
}
if ($fname == "name_change.php") {
  $active15 = 'active';
}
if ($fname == "transport_change.php") {
  $active27 = 'active';
}
if ($fname == "business_settings.php") {
  $active28 = 'active';
}
if ($fname == "picture.php") {
  $active29 = 'active';
}
if ($fname == "aboutus.php") {
  $active30 = 'active';
}
if ($fname == "why_us.php") {
  $active31 = 'active';
}
if ($fname == "how_it.php") {
  $active32 = 'active';
}
if ($fname == "testimonial.php") {
  $active33 = 'active';
}
if ($fname == "current.php") {
  $active34 = 'active';
}
if ($fname == "faq.php") {
  $active35 = 'active';
}
if ($fname == "policy.php") {
  $active36 = 'active';
}
if ($fname == "post_truck.php") {
  $active37 = 'active';
}


if ($fname == "loader_change.php") {
  $active24 = 'active';
}
if ($fname == "feedback.php") {
  $active16 = 'active';
}
if ($fname == "subject.php") {
  $active17 = 'active';
}
if ($fname == "ratings.php") {
  $active18 = 'active';
}
if ($fname == "employee.php") {
  $active19 = 'active';
}
if ($fname == "promo.php") {
  $active20 = 'active';
}
if ($fname == "enquiry.php") {
  $active21 = 'active';
}
if ($fname == "weights.php") {
  $active22 = 'active';
}
if ($fname == "get_call.php") {
  $active23 = 'active';
}
if ($fname == "bids.php") {
  $active25 = 'active';
}
if ($fname == "users.php") {
  $active26 = 'active';
}

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-red elevation-4">
  <!-- Brand Logo -->


  <a href="dashboard.php" class="brand-link">
    <img src="<?= base_url . 'upload/logo.png'; ?>" alt="Admin Logo" class="brand-image elevation-1" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <?php
    //echo "SELECT * FROM count WHERE loading = 'read' LMIMT 1";

    $confirmeddata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE confirmed = 'read' LIMIT 1"));
    $loadingdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE loading = 'read' LIMIT 1"));
    $full_loaddata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE full_load = 'read' LIMIT 1"));
    $part_loaddata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE part_load = 'read' LIMIT 1"));
    $full_load_trucksdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE full_load_trucks = 'read' LIMIT 1"));
    $part_load_trucksdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE part_load_trucks = 'read' LIMIT 1"));
    $receiptsdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE receipts = 'read' LIMIT 1"));
    $namedata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE name = 'read' LIMIT 1"));
    $transportdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE transport = 'read' LIMIT 1"));
    $feedbackdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE feedback = 'read' LIMIT 1"));
    $ratingsdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE ratings = 'read' LIMIT 1"));
    $get_calldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM count WHERE get_call = 'read' LIMIT 1"));
    $business_settingsdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM business_settings"));
    $picturedata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM business_settings"));
    $aboutusdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM aboutus"));
    $why_usdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM why_us"));
    $how_itdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM how_it"));
    $testimonialdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM testimonial"));
    $currentdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM current_updates"));
    $faqdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM faq"));
    $policydata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM termscondition"));
 	$blogdata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM blog"));
    $blog_categorydata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM blog_category"));

    if ($confirmeddata > 0) {
      $confirmed = '<span class="right badge badge-info">New</span>';
    } else {
      $confirmed = '';
    }

    if ($loadingdata > 0) {
      $loading = '<span class="right badge badge-info">New</span>';
    } else {
      $loading = '';
    }

    if ($full_loaddata > 0) {
      $full_load = '<span class="right badge badge-info">New</span>';
    } else {
      $full_load = '';
    }

    if ($part_loaddata > 0) {
      $part_load = '<span class="right badge badge-info">New</span>';
    } else {
      $part_load = '';
    }

    if ($full_load_trucksdata > 0) {
      $full_load_trucks = '<span class="right badge badge-info">New</span>';
    } else {
      $full_load_trucks = '';
    }

    if ($part_load_trucksdata > 0) {
      $part_load_trucks = '<span class="right badge badge-info">New</span>';
    } else {
      $part_load_trucks = '';
    }

    if ($receiptsdata > 0) {
      $receipts = '<span class="right badge badge-info">New</span>';
    } else {
      $receipts = '';
    }

    if ($namedata > 0) {
      $name = '<span class="right badge badge-info">New</span>';
    } else {
      $name = '';
    }

    if ($transportdata > 0) {
      $transport = '<span class="right badge badge-info">New</span>';
    } else {
      $transport = '';
    }

    if ($feedbackdata > 0) {
      $feedback = '<span class="right badge badge-info">New</span>';
    } else {
      $feedback = '';
    }

    if ($ratingsdata > 0) {
      $ratings = '<span class="right badge badge-info">New</span>';
    } else {
      $ratings = '';
    }

    if ($get_calldata > 0) {
      $get_call = '<span class="right badge badge-info">New</span>';
    } else {
      $get_call = '';
    }

    if ($business_settingsdata > 0) {
      $business_settings = '<span class="right badge badge-info">New</span>';
    } else {
      $business_settings = '';
    }

    if ($picturedata > 0) {
      $picture = '<span class="right badge badge-info">New</span>';
    } else {
      $picture = '';
    }

    if ($aboutusdata > 0) {
      $aboutus = '<span class="right badge badge-info">New</span>';
    } else {
      $aboutus = '';
    }

    if ($why_usdata > 0) {
      $why_us = '<span class="right badge badge-info">New</span>';
    } else {
      $why_us = '';
    }
	if ($blogdata > 0) {
      $blog = '<span class="right badge badge-info">New</span>';
    } else {
      $blog = '';

    } if ($blog_categorydata > 0) {
      $blog_category = '<span class="right badge badge-info">New</span>';
    } else {
      $blog_category = '';
    }
    if ($how_itdata > 0) {
      $how_it = '<span class="right badge badge-info">New</span>';
    } else {
      $how_it = '';
    }

    if ($testimonialdata > 0) {
      $testimonial = '<span class="right badge badge-info">New</span>';
    } else {
      $testimonial = '';
    }
    if ($currentdata > 0) {
      $current = '<span class="right badge badge-info">New</span>';
    } else {
      $current = '';
    }
    if ($faqdata > 0) {
      $faq = '<span class="right badge badge-info">New</span>';
    } else {
      $faq = '';
    }
    if ($policydata > 0) {
      $policy = '<span class="right badge badge-info">New</span>';
    } else {
      $policy = '';
    }
    if ($post_truckdata > 0) {
      $post_truck = '<span class="right badge badge-info">New</span>';
    } else {
      $post_truck = '';
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
          <a href="weights.php" class="nav-link <?= $active22; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Weights Management
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

        <li class="nav-item">
          <a href="promo.php" class="nav-link <?= $active20; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Promo Codes Management
            </p>
          </a>
        </li>


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

        <li class="nav-item">
          <a href="users.php" class="nav-link <?= $active26; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Users Management
            </p>
          </a>
        </li>

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

        <li class="nav-item">
          <a href="enquiry.php" class="nav-link <?= $active21; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Customer Enquiries
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="get_call.php" class="nav-link <?= $active23; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Get Call Enquiries
              <?= $get_call; ?>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="bids.php" class="nav-link <?= $active25; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              All Bids
              <?= $get_call; ?>
            </p>
          </a>
        </li>

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
        <!--HOME SECTION START -->

        <li class="nav-header">FRONTEND SETTINGS</li>
        <li class="nav-item">
          <a href="business_settings.php" class="nav-link <?= $active28; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Business Settings
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="picture.php" class="nav-link <?= $active29; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Picture Settings
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="aboutus.php?a_id=1" class="nav-link <?= $active30; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              About Us Settings
             
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="why_us.php" class="nav-link <?= $active31; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Why Choose Us
             
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="how_it.php" class="nav-link <?= $active32; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              How It Works
             
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="testimonial.php" class="nav-link <?= $active33; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Testimonials
             
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="current.php?c_id=1" class="nav-link <?= $active34; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Current Updates
              
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="faq.php?p_id=1" class="nav-link <?= $active35; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              FAQ
             
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="policy.php?term_id=1" class="nav-link <?= $active36; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Policies
             
            </p>
          </a>
        </li>
		  <li class="nav-item">
          <a href="blog_category.php" class="nav-link <?= $active39; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Blog Category
             
            </p>
          </a>
        </li>
		  <li class="nav-item">
          <a href="blog.php" class="nav-link <?= $active38; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Blog
             
            </p>
          </a>
        </li>
        
    <!--    <li class="nav-item">
          <a href="post_truck.php?" class="nav-link <?= $active37; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Post A Truck
              <?= $post_truck; ?>
            </p>
          </a>
        </li>  -->
        <!--HOME SECTION END -->

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

        <li class="nav-item">
          <a href="transport_change.php" class="nav-link <?= $active27; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Profile change Requests
              <?= $transport; ?>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="loader_change.php" class="nav-link <?= $active24; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Loader Profile Requests
              <?= $name; ?>
            </p>
          </a>
        </li>

        <li class="nav-header">OTHER SETTINGS</li>

        <li class="nav-item">
          <a href="employee.php" class="nav-link <?= $active19; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Employee Management
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="feedback.php" class="nav-link <?= $active16; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Customer Feedback
              <?= $feedback; ?>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="ratings.php" class="nav-link <?= $active18; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Customer Ratings
              <?= $ratings; ?>
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
