<?php

include('inc/head3.php');

?>

<?php

include('inc/sidebar3.php');

$ofdata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM survey_officer WHERE id = '$oid'"));


$vcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM assigned_surveys WHERE officer_id = '$oid' AND status = 'verified'"));
$rcount = mysqli_num_rows(mysqli_query($con , "SELECT * FROM assigned_surveys WHERE officer_id = '$oid' AND status = 'rejected'"));

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard3.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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



                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary" style="background: white;">
                        <div class="inner">
                            <h3><?= $vcount; ?></h3>

                            <p>Verified Profiles</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary" style="background: white;">
                        <div class="inner">
                            <h3><?= $rcount; ?></h3>

                            <p>Rejected Profiles</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
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
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>


<script>
/* ChartJS
 * -------
 * Here we will create a few charts using ChartJS
 */



//-------------
//- DONUT CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
var donutData = {
    labels: [
        'Verified Workers',
        'Verified Contractors',
        'Verified Brands',
        'Incomplete Registrations'
    ],
    datasets: [{
        data: [ < ? = $wcount; ? > , < ? = $ccount; ? > , < ? = $bcount; ? > , < ? = $icount; ? > ],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
    }]
}
var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
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
$(function() {
    $('.select2').select2()

    var table = $("#example1").DataTable({
        "autoWidth": true,
        "scrollX": true,
        "scrollY": true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
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






    var areaChartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
                label: 'Workers',
                backgroundColor: 'rgb(222,184,135)',
                borderColor: 'rgb(222,184,135)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgb(222,184,135)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(222,184,135)',
                data: [ < ? = implode(',', $wcount2); ? > ]
            },
            {
                label: 'Contractors',
                backgroundColor: 'rgb(169,169,169)',
                borderColor: 'rgb(169,169,169)',
                pointRadius: false,
                pointColor: 'rgb(169,169,169)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(169,169,169)',
                data: [ < ? = implode(',', $ccount2); ? > ]
            },
            {
                label: 'Brands',
                backgroundColor: 'rgb(255,228,225)',
                borderColor: 'rgb(255,228,225)',
                pointRadius: false,
                pointColor: 'rgb(255,228,225)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(255,228,225)',
                data: [ < ? = implode(',', $bcount2); ? > ]
            },
            {
                label: 'Total',
                backgroundColor: 'rgb(100,149,237)',
                borderColor: 'rgb(100,149,237)',
                pointRadius: false,
                pointColor: 'rgb(100,149,237)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(100,149,237)',
                data: [ < ? = implode(',', $ucount2); ? > ]
            },
            {
                label: 'Incomplete',
                backgroundColor: 'rgb(127,255,212)',
                borderColor: 'rgb(127,255,212)',
                pointRadius: false,
                pointColor: 'rgb(127,255,212)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgb(127,255,212)',
                data: [ < ? = implode(',', $icount2); ? > ]
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
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
    }

    var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })







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