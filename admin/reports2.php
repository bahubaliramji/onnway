<?php

include('inc/head.php');

?>

  <?php

include('inc/sidebar.php');

?>

<?php

$wcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM workers WHERE status = 'approved'"));
$ccount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM contractors WHERE status = 'approved'"));
$bcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM brands WHERE status = 'approved'"));
$ucount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM users"));
$icount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM users WHERE (name = '')"));

$wjcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM jobs"));
$wacount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM job_application"));
$cjcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM jobs_contractor"));
$cacount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM job_application2"));

$wcount2 = array();
$ccount2 = array();
$bcount2 = array();
$ucount2 = array();
$icount2 = array();

$wjcount2 = array();
$wacount2 = array();
$cjcount2 = array();
$cacount2 = array();

for($i = 1 ; $i <= 6 ; $i++)
{
	$wcount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM workers INNER JOIN users ON workers.user_id = users.id WHERE workers.status = 'approved' AND MONTH(users.created)=$i"));
$ccount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM contractors INNER JOIN users ON contractors.user_id = users.id WHERE contractors.status = 'approved' AND MONTH(users.created)=$i"));
$bcount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM brands INNER JOIN users ON brands.user_id = users.id WHERE brands.status = 'approved' AND MONTH(users.created)=$i"));
$ucount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM users WHERE MONTH(created)=$i"));
$icount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM users WHERE (name = '') AND MONTH(created)=$i"));

$wjcount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM jobs WHERE MONTH(created)=$i"));
$wacount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM job_application WHERE MONTH(created)=$i"));
$cjcount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM jobs_contractor WHERE MONTH(created)=$i"));
$cacount2[] = mysqli_num_rows(mysqli_query($con , "SELECT * FROM job_application2 WHERE MONTH(created)=$i"));

}


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Reports</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
		 
		 <div class="col-lg-6 col-6">
		 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registrations</h3>

              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
		 
<div class="col-lg-6 col-6">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Registrations</h3>

              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
		 
		 
		 <div class="col-lg-6 col-6">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Workers Jobs</h3>

              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart2" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
			
			<div class="col-lg-6 col-6">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Contractors Jobs</h3>

              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart3" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
		
		
		  
		  
         
		  
          <!-- ./col -->
        </div>
		
		 <!-- DONUT CHART -->
            
		  
		
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
<!-- Filterizr-->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>


<script>
  
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

//console.log(<?= implode(',' , $wcount2); ?>);
    
	var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June'],
      datasets: [
        {
          label               : 'Workers',
          backgroundColor     : 'rgb(222,184,135)',
          borderColor         : 'rgb(222,184,135)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgb(222,184,135)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(222,184,135)',
          data                : [<?= implode(',' , $wcount2); ?>]
        },
        {
          label               : 'Contractors',
          backgroundColor     : 'rgb(169,169,169)',
          borderColor         : 'rgb(169,169,169)',
          pointRadius         : false,
          pointColor          : 'rgb(169,169,169)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(169,169,169)',
          data                : [<?= implode(',' , $ccount2); ?>]
        },
		{
          label               : 'Brands',
          backgroundColor     : 'rgb(255,228,225)',
          borderColor         : 'rgb(255,228,225)',
          pointRadius         : false,
          pointColor          : 'rgb(255,228,225)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(255,228,225)',
          data                : [<?= implode(',' , $bcount2); ?>]
        },
		{
          label               : 'Total',
          backgroundColor     : 'rgb(100,149,237)',
          borderColor         : 'rgb(100,149,237)',
          pointRadius         : false,
          pointColor          : 'rgb(100,149,237)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(100,149,237)',
          data                : [<?= implode(',' , $ucount2); ?>]
        },
		{
          label               : 'Incomplete',
          backgroundColor     : 'rgb(127,255,212)',
          borderColor         : 'rgb(127,255,212)',
          pointRadius         : false,
          pointColor          : 'rgb(127,255,212)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(127,255,212)',
          data                : [<?= implode(',' , $icount2); ?>]
        },
      ]
    }
	
	//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

















var areaChartData2 = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June'],
      datasets: [
        {
          label               : 'Posted',
          backgroundColor     : 'rgb(222,184,135)',
          borderColor         : 'rgb(222,184,135)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgb(222,184,135)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(222,184,135)',
          data                : [<?= implode(',' , $wjcount2); ?>]
        },
        {
          label               : 'Applications',
          backgroundColor     : 'rgb(169,169,169)',
          borderColor         : 'rgb(169,169,169)',
          pointRadius         : false,
          pointColor          : 'rgb(169,169,169)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(169,169,169)',
          data                : [<?= implode(',' , $wacount2); ?>]
        },
      ]
    }
	
	//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
    var barChartData2 = jQuery.extend(true, {}, areaChartData2)
    var temp02 = areaChartData2.datasets[0]
    var temp12 = areaChartData2.datasets[1]
    barChartData2.datasets[0] = temp12
    barChartData2.datasets[1] = temp02

    var barChartOptions2 = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart2 = new Chart(barChartCanvas2, {
      type: 'bar', 
      data: barChartData2,
      options: barChartOptions2
    })




var areaChartData3 = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June'],
      datasets: [
        {
          label               : 'Posted',
          backgroundColor     : 'rgb(222,184,135)',
          borderColor         : 'rgb(222,184,135)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgb(222,184,135)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(222,184,135)',
          data                : [<?= implode(',' , $cjcount2); ?>]
        },
        {
          label               : 'Applications',
          backgroundColor     : 'rgb(169,169,169)',
          borderColor         : 'rgb(169,169,169)',
          pointRadius         : false,
          pointColor          : 'rgb(169,169,169)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(169,169,169)',
          data                : [<?= implode(',' , $cacount2); ?>]
        },
      ]
    }
	
	//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas3 = $('#barChart3').get(0).getContext('2d')
    var barChartData3 = jQuery.extend(true, {}, areaChartData3)
    var temp03 = areaChartData3.datasets[0]
    var temp13 = areaChartData3.datasets[1]
    barChartData3.datasets[0] = temp13
    barChartData3.datasets[1] = temp03

    var barChartOptions3 = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart3 = new Chart(barChartCanvas3, {
      type: 'bar', 
      data: barChartData3,
      options: barChartOptions3
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Verified Workers', 
          'Verified Contractors',
          'Verified Brands', 
          'Incomplete Registrations'
      ],
      datasets: [
        {
          data: [<?= $wcount; ?>,<?= $ccount; ?>,<?= $bcount; ?>,<?= $icount; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })

   
  
  </script>


<script>
  $(function () {
	  $('.select2').select2()
	  
    var table = $("#example1").DataTable({
      "autoWidth": true,
	  "scrollX": true,
	  "scrollY": true,
	  "pagingType": "full_numbers",
	  dom: 'Bfrtip',
	  lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
	  buttons: [
	        'pageLength',
			{
                extend: 'collection',
                text: 'Print Options',
                buttons: [
                    'copyHtml5',
            'excelHtml5',
			'print'
                ]
            }
        ]
    });
	
	
	
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<script>
  $(function () {
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
