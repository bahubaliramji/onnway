<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $squery =  "SELECT * FROM complaint WHERE id = '$id'";
    $data = mysqli_fetch_array(mysqli_query($con , $squery));
	
	$user_id = $data['user_id'];
	
	$sdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
	
	$type = $sdata['type'];
	
	
	if($type == 'worker')
	{
		
		$iidd = 'W00'.$sdata['id'];
		
		
	}
	else if($type == 'brand')
	{
		
		$iidd = 'B00'.$sdata['id'];
	}
	else
	{
		
		$iidd = 'C00'.$sdata['id'];
	}
	
	
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Employee</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item">Employee Management</li>
              <li class="breadcrumb-item active">Add Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
			<?php
            if(isset($_POST['submit']))
            {

              $username = $_POST['username'];
              $full_name = $_POST['full_name'];
              $password = $_POST['password'];
              $data1 = $_POST['data1'];
              $data2 = $_POST['data2'];
              $data3 = $_POST['data3'];
              $data4 = $_POST['data4'];
              $users1 = $_POST['users1'];
              $users2 = $_POST['users2'];
              $users3 = $_POST['users3'];
              $loaders1 = $_POST['loaders1'];
              $loaders2 = $_POST['loaders2'];
              $loaders3 = $_POST['loaders3'];
              $trucks1 = $_POST['trucks1'];
              $trucks2 = $_POST['trucks2'];
              $requests1 = $_POST['requests1'];
              $requests2 = $_POST['requests2'];
              $other = $_POST['other'];

$dataarrya = array();
if($data1 == 'on')
{
    array_push($dataarrya,"1");
}
if($data2 == 'on')
{
    array_push($dataarrya,"2");
}
if($data3 == 'on')
{
    array_push($dataarrya,"3");
}
if($data4 == 'on')
{
    array_push($dataarrya,"4");
}

$datalist = implode(', ', $dataarrya);

$usersarrya = array();
if($users1 == 'on')
{
    array_push($usersarrya,"1");
}
if($users2 == 'on')
{
    array_push($usersarrya,"2");
}
if($users3 == 'on')
{
    array_push($usersarrya,"3");
}

$userslist = implode(', ', $usersarrya);

$loadersarrya = array();
if($loaders1 == 'on')
{
    array_push($loadersarrya,"1");
}
if($loaders2 == 'on')
{
    array_push($loadersarrya,"2");
}
if($loaders3 == 'on')
{
    array_push($loadersarrya,"3");
}

$loaderslist = implode(', ', $loadersarrya);

$trucksarrya = array();
if($trucks1 == 'on')
{
    array_push($trucksarrya,"1");
}
if($trucks2 == 'on')
{
    array_push($trucksarrya,"2");
}

$truckslist = implode(', ', $trucksarrya);

$requestsarrya = array();
if($requests1 == 'on')
{
    array_push($requestsarrya,"1");
}
if($requests2 == 'on')
{
    array_push($requestsarrya,"2");
}

$requestslist = implode(', ', $requestsarrya);

$othersarrya = array();
if($other == 'on')
{
    array_push($othersarrya,"1");
}

$otherslist = implode(', ', $othersarrya);



              if(empty($username) or empty($full_name) or empty($password))
              {
                $error = "Please fill all fields";
              }
              else
			  {
				  
				  $question_insert = "INSERT INTO employee SET 
				  username = '$username',
				  full_name = '$full_name',
				  password = '$password',
				  data = '$datalist',
				  users = '$userslist',
				  loaders = '$loaderslist',
				  trucks = '$truckslist',
				  requests = '$requestslist',
				  other = '$otherslist'
				  ";
                if(mysqli_query($con,$question_insert))
                {
                  header('Location:employee.php');
                }
                else
                {
                  $error = "Some error occurred";
                }
				
				
			  }
              
              
            } 
            ?>

            <div class="card">
              <div class="card-header">
                <?php
				if(isset($error))
				{
				?>
				<h3 class="card-title" style="color: red;"><?= $error; ?></h3>
				<?php
				}
				else
				{
				?>
				<h3 class="card-title">Add Data</h3>
				<?php
				}
				?>
              </div>
			  
			  
			  
              <!-- /.card-header -->
               <form role="form" method="POST">
                <div class="card-body">
				
				<div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                  </div>
				  
				
				  
				  <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Enter Full Name" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
                  </div>
				  
				  <label for="data">Data Management (Trucks, Material, Fares and Subjects management)</label>
				  
				 <div class="form-group">
				     <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="" name="data1" id="data1">
                          <label class="form-check-label">Enabled</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="data2" id="data2">
                          <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="data3" id="data3">
                          <label class="form-check-label">Delete</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="data4" id="data4">
                          <label class="form-check-label">Add</label>
                        </div>
                      </div>
				  
				  
				  <label for="users">Users Management (Loaders, Transporters and Drivers management)</label>
				  
				 <div class="form-group">
				     <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="" name="users1">
                          <label class="form-check-label">Enabled</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="users2" id="users2">
                          <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="users3" id="users3">
                          <label class="form-check-label">Delete</label>
                        </div>
                      </div>
				  
				  
				  
				  
				  <label for="loaders">Loaders Enquiries</label>
				  
				 <div class="form-group">
				     <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="" name="loaders1">
                          <label class="form-check-label">Enabled</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="loaders2" id="loaders2">
                          <label class="form-check-label">Edit</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="loaders3" id="loaders3">
                          <label class="form-check-label">Delete</label>
                        </div>
                      </div>
				  
				  
				   <label for="trucks">Transporters Posted Trucks (Full load and Part load trucks)</label>
				  
				 <div class="form-group">
				     <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="" name="trucks1">
                          <label class="form-check-label">Enabled</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="trucks2" id="trucks2">
                          <label class="form-check-label">Edit</label>
                        </div>
                      </div>
				  
				  
				  <label for="requests">Requests (Payment receipts and Name change requests)</label>
				  
				 <div class="form-group">
				     <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="" name="requests1" name="requests1">
                          <label class="form-check-label">Enabled</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="requests2" id="requests2">
                          <label class="form-check-label">Edit</label>
                        </div>
                      </div>
				  
				  
				  <label for="other">Other Settings (Customer feedback and ratings)</label>
				  
				 <div class="form-group">
				     <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="" name="other">
                          <label class="form-check-label">Enabled</label>
                        </div>
                      </div>
				  
                 
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js"></script>
<script src="plugins/datatables-scroller/js/dataTables.scroller.min.js"></script>
<script src="plugins/datatables-scroller/js/scroller.bootstrap4.min.js"></script>
<script src="plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="plugins/datatables-select/js/select.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<!-- Filterizr-->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!--<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXQZx4qVICTJWyKTXO0Ji28GZjD4Pvavg&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
-->

<script>

$('input[name=data1]').change(function(){
    if($(this).is(':checked')) {
        // Checkbox is checked..
        
        document.getElementById('data2').disabled=false;
        document.getElementById('data3').disabled=false;
        document.getElementById('data4').disabled=false;
        
    } else {
        // Checkbox is not checked..
        document.getElementById('data2').disabled=true;
        document.getElementById('data3').disabled=true;
        document.getElementById('data4').disabled=true;
    }
});


$('input[name=users1]').change(function(){
    if($(this).is(':checked')) {
        // Checkbox is checked..
        
        document.getElementById('users2').disabled=false;
        document.getElementById('users3').disabled=false;
        
    } else {
        // Checkbox is not checked..
        document.getElementById('users2').disabled=true;
        document.getElementById('users3').disabled=true;
    }
});

$('input[name=loaders1]').change(function(){
    if($(this).is(':checked')) {
        // Checkbox is checked..
        
        document.getElementById('loaders2').disabled=false;
        document.getElementById('loaders3').disabled=false;
        
    } else {
        // Checkbox is not checked..
        document.getElementById('loaders2').disabled=true;
        document.getElementById('loaders3').disabled=true;
    }
});

$('input[name=trucks1]').change(function(){
    if($(this).is(':checked')) {
        // Checkbox is checked..
        
        document.getElementById('trucks2').disabled=false;
        
    } else {
        // Checkbox is not checked..
        document.getElementById('trucks2').disabled=true;
    }
});

$('input[name=requests1]').change(function(){
    if($(this).is(':checked')) {
        // Checkbox is checked..
        
        document.getElementById('requests2').disabled=false;
        
    } else {
        // Checkbox is not checked..
        document.getElementById('requests2').disabled=true;
    }
});

</script>


<script>
function MyFunction2(iidd) {

    var aid = iidd;

    //console.log(aid);

    $.ajax({
        url: 'data.php',
        method: 'post',
        data: 'aid=' + aid
    }).done(function(dd) {

        console.log(dd);

        location.reload();

    })
}
</script>


<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>








<script>
$(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });

    $('.filter-container').filterizr({
        gutterPixels: 3
    });
    $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
    });
})
</script>
<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>

<script>
$('#dates').daterangepicker({
    autoUpdateInput: false,
    locale: {
        format: 'YYYY-MM-DD'
    }
})

$('#dates').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
});

$('#dates').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
</script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

</body>

</html>
