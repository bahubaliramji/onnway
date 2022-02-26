<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $edit_query = "SELECT * FROM assigned_orders WHERE id = '$edit_id'";
    $edit_run = mysqli_query($con, $edit_query);
    $edit_row = mysqli_fetch_array($edit_run);
    $fare = $edit_row['fare'];
    $other = $edit_row['other'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Provider Fare</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
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



                    <div class="card">
                        <div class="card-header">
                            <?php
                            if (isset($error)) {
                            ?>
                                <h3 class="card-title" style="color: red;"><?= $error; ?></h3>
                            <?php
                            } else {
                            ?>
                                <h3 class="card-title">Edit Data</h3>
                            <?php
                            }
                            ?>
                        </div>



                        <!-- /.card-header -->
                        <form role="form" id="form" method="POST">
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="fare">Fare</label>

                                    <input type="number" step="any" class="form-control" id="fare" value="<?= $fare; ?>" name="fare" placeholder="Fare" required>

                                </div>


                                <div class="form-group">
                                    <label for="other">Other Charges</label>

                                    <input type="number" step="any" class="form-control" id="other" value="<?= $other; ?>" name="other" placeholder="Other Charges" required>

                                </div>






                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" onClick="MyFunction2(<?= $edit_id; ?>)" class="btn btn-primary">Submit</button>
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





<script>
    function MyFunction2(aid2) {

        var data = new FormData();
        data.append('id', aid2);
        var form_data = $('#form').serializeArray();
        $.each(form_data, function(key, input) {
            data.append(input.name, input.value);
        });

        //console.log(data);

        var settings = {
            "url": "data7.php",
            "method": "POST",
            "timeout": 0,
            "processData": false,
            "contentType": false,
            "data": data
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
            window.history.back();
        });

        /*$.ajax({
            url: 'data5.php',
            method: 'post',
            data: 'id=' + aid2 + '&pay=' + pay
        }).done(function(dd) {

            console.log(dd);

            location.reload();

        })*/
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