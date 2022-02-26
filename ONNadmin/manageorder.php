<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Loader mobile no</th>
                    <th>source</th>
                    <th>destination</th>
                    <th>Schedule date</th>
                    <th>Add driver</th>
                </tr>
            </thead>
            <tbody><?php
                    $row = mysqli_query($dbhandle, "SELECT * FROM `full_truck_book_load` where driver_mobile_no='-1'");
                    $x = 1;

                    while ($fetch = mysqli_fetch_array($row)) {


                    ?>
                    <tr>


                        <td><a href="loaderpro.php?mobile_no=<?php echo $fetch['loader_mobile_no']; ?>"><?php echo $fetch['loader_mobile_no']; ?></a></td>
                        <td><?php echo $fetch['source']; ?></td>
                        <td><?php echo $fetch['destination']; ?></td>
                        <td><?php echo $fetch['sch_date']; ?></td>

                        <td>
                            <?php
                            $id = $fetch['id'];

                            ?>
                            <a href="add-driver-full-load.php?id=<?php echo $id; ?>" class="btn btn-primary"><button class="btn btn-primary">ADD</button></a>
                        </td>
                    </tr>

                    </tr>
                <?php $x++;
                    } ?>


            </tbody>
        </table>
    </section>
</section>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
</body>