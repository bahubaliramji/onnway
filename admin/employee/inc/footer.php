<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../plugins/datatables-fixedheader/js/fixedHeader.bootstrap4.min.js"></script>
<script src="../plugins/datatables-scroller/js/dataTables.scroller.min.js"></script>
<script src="../plugins/datatables-scroller/js/scroller.bootstrap4.min.js"></script>
<script src="../plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="../plugins/datatables-select/js/select.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<!-- Filterizr-->
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!--<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXQZx4qVICTJWyKTXO0Ji28GZjD4Pvavg&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
-->



<script>
function MyFunction(iidd) {

    var aid = iidd;

    //console.log(aid);

    $.ajax({
        url: 'data3.php',
        method: 'post',
        data: 'aid=' + aid
    }).done(function(dd) {

        console.log(dd);

        location.reload();

    })
}
</script>

<script>

function updatePayment(aid2) {

var pay = $('#pay').val();

    console.log(aid2);

    $.ajax({
        url: 'data4.php',
        method: 'post',
        data: 'id=' + aid2 + '&pay=' + pay
    }).done(function(dd) {

        console.log(dd);

        location.reload();

    })
}

function accept(aid2) {
    var aid = <?= $id; ?> ;

    console.log(aid2);

    window.location.replace('assign_truck.php?oid=' + aid + '&aid2=' + aid2);
}

function accept4(aid2) {
    var aid = <?= $id; ?> ;

    console.log(aid2);

    window.location.replace('assign_truck2.php?oid=' + aid + '&aid2=' + aid2);
}

function accept3(aid2) {
    var aid = <?= $id; ?> ;

    console.log(aid2);

    window.location.replace('accept_bid2.php?oid=' + aid + '&aid2=' + aid2);
}

function accept2(aid2) {
            var aid = <?= $id; ?> ;

            console.log(aid2);

            window.location.replace('accept_bid.php?oid=' + aid + '&aid2=' + aid2);
        }

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

<script>
$("select[name='location_id']").change(function() {
    var stateID = $(this).val();

    console.log(stateID);

    if (stateID) {


        $.ajax({
            url: "ajaxpro.php",
            dataType: 'Json',
            data: {
                'id': stateID
            },
            success: function(data) {
                $('select[name="cat"]').empty();
                $('select[name="cat"]').append('<option value="">' + '--- Select ---' +
                    '</option>');
                $.each(data, function(key, value) {
                    $('select[name="cat"]').append('<option value="' + key + '">' + value +
                        '</option>');
                });
            }
        });

    } else {
        $('select[name="city"]').empty();
    }
});
</script>

<script>
      "use strict";

      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: {
            lat: -34.397,
            lng: 150.644
          },
          zoom: 8
        });
      }
    </script>

<script>
$("select[name='cat']").change(function() {
    var stateID = $(this).val();

    console.log(stateID);

    if (stateID) {


        $.ajax({
            url: "ajaxpro2.php",
            dataType: 'Json',
            data: {
                'id': stateID
            },
            success: function(data) {
                $('select[name="subcat1"]').empty();
                $('select[name="subcat1"]').append('<option value="">' + '--- Select ---' +
                    '</option>');
                $.each(data, function(key, value) {
                    $('select[name="subcat1"]').append('<option value="' + key + '">' +
                        value + '</option>');
                });
            }
        });

    } else {
        $('select[name="city"]').empty();
    }
});
</script>

<script>
$("select[name='subcat1']").change(function() {
    var stateID = $(this).val();

    console.log(stateID);

    if (stateID) {


        $.ajax({
            url: "ajaxpro3.php",
            dataType: 'Json',
            data: {
                'id': stateID
            },
            success: function(data) {
                $('select[name="subcat2"]').empty();
                $('select[name="subcat2"]').append('<option value="">' + '--- Select ---' +
                    '</option>');
                $.each(data, function(key, value) {
                    $('select[name="subcat2"]').append('<option value="' + key + '">' +
                        value + '</option>');
                });
            }
        });

    } else {
        $('select[name="city"]').empty();
    }
});
</script>



<script>
$("select[name='subcat2']").change(function() {
    var stateID = $(this).val();

    console.log(stateID);

    if (stateID) {


        $.ajax({
            url: "ajaxpro4.php",
            dataType: 'Json',
            data: {
                'id': stateID
            },
            success: function(data) {
                $('select[name="product"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="product"]').append('<option value="' + key + '">' +
                        value + '</option>');
                });
            }
        });

    } else {
        $('select[name="city"]').empty();
    }
});
</script>



<script type="text/javascript">
$(document).ready(function() {
    bsCustomFileInput.init();
});
</script>

<script>
$(function() {

    $("#cancel").click(function() {

        var aid = <?= $id; ?> ;
        var aid2 = 'cancelled';

        console.log(aid);

        $.ajax({
            url: 'data2.php',
            method: 'post',
            data: 'aid=' + aid + '&aid2=' + aid2
        }).done(function(dd) {

            console.log(dd);

            if (dd == 'success') {
                window.history.back();
                //window.location.replace('loader_full_load_bid.php');
            }


        })


    });


    $("#assign").click(function() {

        var aid = <?= $id; ?>;
        var aid2 = 'assigned for quote';

        //console.log(aid);

        $.ajax({
            url: 'data2.php',
            method: 'post',
            data: 'aid=' + aid + '&aid2=' + aid2
        }).done(function(dd) {

            console.log(dd);

            if (dd == 'success') {
                window.history.back();
                //window.location.replace('loader_full_load_bid_order.php?id=' + aid);
            }

            //window.location.replace('loader_full_load_bid_order.php);
            //console.log(sql);


        })


    });

    $('.select2').select2()

    var table = $("#example1").DataTable({
        autoWidth: true,
        scrollX: true,
        targets: 0,
        select: true
    });



    $('#example2').DataTable({
        scrollX: true,
    });
});
</script>


<script>
$(function() {

    var table2 = $("#example3").DataTable({
        "autoWidth": true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        fixedHeader: true,
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [{
                extend: 'pageLength',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'copy',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'excel',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                className: "btn btn-primary",
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '6pt');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', '6pt');
                },
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            }
        ],
        select: true
    });

    $('#type').on('keyup', function() {
        table2
            .columns(1)
            .search(this.value)
            .draw();
    });

    $('#name').on('keyup', function() {
        table2
            .columns(2)
            .search(this.value)
            .draw();
    });

    $('#phone').on('keyup', function() {
        table2
            .columns(3)
            .search(this.value)
            .draw();
    });

    $('#address').on('keyup', function() {
        table2
            .columns(4)
            .search(this.value)
            .draw();
    });

    $('#district').on('keyup', function() {
        table2
            .columns(5)
            .search(this.value)
            .draw();
    });

    $('#state').on('keyup', function() {
        table2
            .columns(6)
            .search(this.value)
            .draw();
    });

    $('#date').on('keyup', function() {
        table2
            .columns(7)
            .search(this.value)
            .draw();
    });

});
</script>

<script>
$(function() {

    var table3 = $("#example4").DataTable({
        "autoWidth": true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        fixedHeader: true,
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [{
                extend: 'pageLength',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'copy',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'excel',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                className: "btn btn-primary",
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '6pt');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', '6pt');
                },
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            }
        ],
        select: true
    });

    $('#type').on('keyup', function() {
        table3
            .columns(1)
            .search(this.value)
            .draw();
    });

    $('#name').on('keyup', function() {
        table3
            .columns(2)
            .search(this.value)
            .draw();
    });

    $('#phone').on('keyup', function() {
        table3
            .columns(3)
            .search(this.value)
            .draw();
    });

    $('#address').on('keyup', function() {
        table3
            .columns(4)
            .search(this.value)
            .draw();
    });

    $('#officer').on('keyup', function() {
        table3
            .columns(5)
            .search(this.value)
            .draw();
    });


    $('#date').on('keyup', function() {
        table3
            .columns(6)
            .search(this.value)
            .draw();
    });

});
</script>

<script>
$(function() {

    var table4 = $("#example5").DataTable({
        "autoWidth": true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        fixedHeader: true,
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [{
                extend: 'pageLength',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'copy',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'excel',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                className: "btn btn-primary",
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '6pt');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', '6pt');
                },
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            }
        ],
        select: true
    });

    $('#type').on('keyup', function() {
        table4
            .columns(1)
            .search(this.value)
            .draw();
    });

    $('#phone').on('keyup', function() {
        table4
            .columns(2)
            .search(this.value)
            .draw();
    });

    $('#date').on('keyup', function() {
        table4
            .columns(3)
            .search(this.value)
            .draw();
    });



});
</script>


<script>
$(function() {

    var table6 = $("#example6").DataTable({
        "autoWidth": true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        fixedHeader: true,
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [{
                extend: 'pageLength',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'copy',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'excel',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                className: "btn btn-primary",
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '6pt');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', '6pt');
                },
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            }
        ],
        select: true
    });

    $('#jobid').on('keyup', function() {
        table6
            .columns(1)
            .search(this.value)
            .draw();
    });

    $('#brand').on('keyup', function() {
        table6
            .columns(2)
            .search(this.value)
            .draw();
    });

    $('#title').on('keyup', function() {
        table6
            .columns(3)
            .search(this.value)
            .draw();
    });
    $('#positions').on('keyup', function() {
        table6
            .columns(4)
            .search(this.value)
            .draw();
    });
    $('#sector').on('keyup', function() {
        table6
            .columns(5)
            .search(this.value)
            .draw();
    });
    $('#skill_level').on('keyup', function() {
        table6
            .columns(6)
            .search(this.value)
            .draw();
    });
    $('#skill_set').on('keyup', function() {
        table6
            .columns(7)
            .search(this.value)
            .draw();
    });
    $('#nature').on('keyup', function() {
        table6
            .columns(8)
            .search(this.value)
            .draw();
    });
    $('#man_days').on('keyup', function() {
        table6
            .columns(9)
            .search(this.value)
            .draw();
    });
    $('#piece').on('keyup', function() {
        table6
            .columns(10)
            .search(this.value)
            .draw();
    });
    $('#place').on('keyup', function() {
        table6
            .columns(11)
            .search(this.value)
            .draw();
    });
    $('#location').on('keyup', function() {
        table6
            .columns(12)
            .search(this.value)
            .draw();
    });
    $('#experience').on('keyup', function() {
        table6
            .columns(13)
            .search(this.value)
            .draw();
    });
    $('#role').on('keyup', function() {
        table6
            .columns(14)
            .search(this.value)
            .draw();
    });
    $('#gender').on('keyup', function() {
        table6
            .columns(15)
            .search(this.value)
            .draw();
    });
    $('#education').on('keyup', function() {
        table6
            .columns(16)
            .search(this.value)
            .draw();
    });
    $('#hours').on('keyup', function() {
        table6
            .columns(17)
            .search(this.value)
            .draw();
    });
    $('#salary').on('keyup', function() {
        table6
            .columns(18)
            .search(this.value)
            .draw();
    });
    $('#stype').on('keyup', function() {
        table6
            .columns(19)
            .search(this.value)
            .draw();
    });
    $('#status').on('keyup', function() {
        table6
            .columns(20)
            .search(this.value)
            .draw();
    });
    $('#date').on('keyup', function() {
        table6
            .columns(21)
            .search(this.value)
            .draw();
    });



});
</script>

<script>
$(function() {

    var table7 = $("#example7").DataTable({
        "autoWidth": true,
        "pagingType": "full_numbers",
        dom: 'Bfrtip',
        fixedHeader: true,
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [{
                extend: 'pageLength',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'copy',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'excel',
                className: "btn btn-primary",
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                className: "btn btn-primary",
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '6pt');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', '6pt');
                },
                init: function(api, node, config) {
                    $(node).removeClass('dt-button')
                    $(node).removeClass('buttons-print')
                }
            }
        ],
        select: true
    });

    $('#jobid').on('keyup', function() {
        table7
            .columns(1)
            .search(this.value)
            .draw();
    });

    $('#brand').on('keyup', function() {
        table7
            .columns(2)
            .search(this.value)
            .draw();
    });

    $('#sector').on('keyup', function() {
        table7
            .columns(3)
            .search(this.value)
            .draw();
    });
    $('#job_type').on('keyup', function() {
        table7
            .columns(4)
            .search(this.value)
            .draw();
    });
    $('#experience').on('keyup', function() {
        table7
            .columns(5)
            .search(this.value)
            .draw();
    });
    $('#man_days').on('keyup', function() {
        table7
            .columns(6)
            .search(this.value)
            .draw();
    });
    $('#piece').on('keyup', function() {
        table7
            .columns(7)
            .search(this.value)
            .draw();
    });
    $('#location').on('keyup', function() {
        table7
            .columns(8)
            .search(this.value)
            .draw();
    });
    $('#status').on('keyup', function() {
        table7
            .columns(9)
            .search(this.value)
            .draw();
    });
    $('#date').on('keyup', function() {
        table7
            .columns(10)
            .search(this.value)
            .draw();
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