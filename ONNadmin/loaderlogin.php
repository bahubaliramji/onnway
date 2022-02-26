<?php
include("header.php");
include("sidebar.php");
include("include/config.php");
?>
<section id="main-content">
    <section class="wrapper">
        <div class="container" style="background-color: #fff; padding: 5px 5px 5px 5px; color: #111;">
            <div class="box-body box box-warning">

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Mobile number</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Address</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody><?php
                            $row = mysqli_query($dbhandle, "SELECT * FROM `loader_profile_tbl`");
                            $x = 1;

                            while ($fetch = mysqli_fetch_array($row)) {


                            ?>
                            <tr>


                                <td><a href="loaderpro.php?mobile_no=<?php echo $fetch['mobile_no']; ?>"><?php echo $fetch['mobile_no']; ?></a></td>
                                <td><?php echo $fetch['name']; ?></td>
                                <td><?php echo $fetch['city']; ?></td>
                                <td><?php echo $fetch['email']; ?></td>
                                <td><?php echo $fetch['type']; ?></td>
                                <td><?php echo $fetch['address']; ?></td>
                                <td><a href="delloader.php?mobile_no=<?php echo $fetch['mobile_no']; ?>"><button class="btn btn-primary">DELETE</button></a></td>
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