<?php

include('inc/head.php');

?>

<?php

include('inc/sidebar.php');

if(isset($_GET['del']))
 {
    $del_id = $_GET['del'];
    $del_query = "DELETE FROM `trucks` WHERE `trucks`.`id` = '$del_id'";
    if(mysqli_query($con,$del_query))
    {
      $msg = "Truck Has Been Deleted";
    }
    else
    {
      $error = "Truck Hasn't Been Deleted";
    }

 }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <?php
		  


      date_default_timezone_set("Asia/Kolkata");
      
            
            $id = $_GET['id'];
            
            $data = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM posted_trucks WHERE id = '$id'"));
            
            $user_id = $data['user_id'];
            
            
             $freight = $data['freight'];
           $other_charges = $data['other_charges'];
           $cgst = $data['cgst'];
           $sgst = $data['sgst'];
           $insurance = $data['insurance'];
           $status = $data['status'];
           $truck_type = $data['truck_type'];
           $material = $data['material'];
           
           $fr = $freight + $other_charges + $cgst + $sgst + $insurance;
           
           
           $query4 = mysqli_query($con,"SELECT * FROM trucks WHERE id = '$truck_type'");
           $row4 = mysqli_fetch_array($query4);
           
           $query5 = mysqli_query($con,"SELECT * FROM tbl_material WHERE id = '$material'");
           $row5 = mysqli_fetch_array($query5);
            
            
      $query2 = mysqli_query($con,"SELECT * FROM provider_profile_tbl WHERE user_id = '$user_id'");
		 $row2 = mysqli_fetch_array($query2);
      
      $udata = mysqli_fetch_array(mysqli_query($con , "SELECT * FROM users WHERE id = '$user_id'"));
            
            ?>

                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Part Load Truck - TRUCK #<?= $id; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Part Load Truck - TRUCK #<?= $id; ?></li>
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


                    <div class="row">



                        <!-- Daily Feeds -->
                        <div class="col-lg-6">
                            <div class="daily-feeds card">
                                <div class="card-body no-padding">


                                    <!-- Item-->
                                    <div class="item clearfix">
                                        <div class="feed d-flex justify-content-between">
                                            <div class="feed-body d-flex justify-content-between" style="width: 100%;">
                                                <div class="content" style="width: inherit;">

                                                    <a class="btn btn-primary"
                                                        href="edit_part_load_posted.php?edit=<?= $id; ?>">EDIT</a>

                                                    <h4>Posted By</h4>
                                                    <p class="form-control"><?= $udata['type']; ?></p>

                                                    <h4>Name</h4>
                                                    <p class="form-control"><?= $row2['name']; ?></p>
                                                    
                                                    <h4>Phone</h4>
                                                    <p class="form-control"><?= $udata['phone']; ?></p>

                                                    <h4>Source</h4>
                                                    <p class="form-control"><?= $data['source']; ?></p>

                                                    <h4>Destination</h4>
                                                    <p class="form-control"><?= $data['destination']; ?></p>

<h4>Truck Type</h4>
                                                    <p class="form-control"><?= $row4['type'].' - '.$row4['title']; ?></p>
                                                    <h4>Load Passing</h4>
                                                    <p class="form-control"><?= $data['load_passing']; ?></p>

                                                    <h4>Schedule Date</h4>
                                                    <p class="form-control"><?= $data['schedule']; ?></p>
                                                    <h4>Weight</h4>
                                                    <p class="form-control"><?= $data['weight']; ?></p>
                                                    <h4>Material</h4>
                                                    <p class="form-control"><?= $row5['material_name']; ?></p>


                                                    <h4>Length</h4>
                                                    <p class="form-control"><?= $data['length'].' ft.'; ?></p>
                                                    <h4>Width</h4>
                                                    <p class="form-control"><?= $data['width'].' ft.'; ?></p>

                                                    <h4>Height</h4>
                                                    <p class="form-control"><?= $data['height'].' ft.'; ?></p>
                                                    
                                                    <h4>Total Dimension</h4>
                                                    <p class="form-control"><?= ($data['length'] * $data['width'] * $data['height']).' cu.ft.'; ?></p>
                                                    
                                                    <h4>Special Note</h4>
                                                    <p class="form-control"><?= $data['remarks']; ?></p>

                                                    <h4>Status</h4>
                                                    <p class="form-control"><?= $data['status']; ?></p>
                                                    <h4>Booking Date</h4>
                                                    <p class="form-control"><?= $data['created']; ?></p>



                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="daily-feeds card">
                                <div class="card-body no-padding">


                                    <!-- Item-->
                                    <div class="item clearfix">
                                        <div class="feed d-flex justify-content-between">
                                            <div class="feed-body d-flex justify-content-between" style="width: 100%;">
                                                <div class="content" style="width: inherit;">

                                                    <button type="button" id="canceltruck"
                                                        class="btn btn-block btn-danger">CANCEL TRUCK</button>

</br>
</br>

<div class="container">
        <nav>


            <h3 class="align-center">Truck details</h3>

            <div class="nav-box">
                <table>
                    <tr>
                        <td class="align-left">
                            Truck Type:
                        </td>

                        <td class="align-right">
                            <?= $row4['title']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Total Capacity:
                        </td>

                        <td class="align-right">
                            <?= $data['truckCapacity']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Box Length:
                        </td>

                        <td class="align-right">
                            <?= $data['boxLength']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Box Width:
                        </td>

                        <td class="align-right">
                            <?= $data['boxWidth']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-left">
                            Box Area:
                        </td>

                        <td class="align-right">
                            <?= $data['boxArea']. " sq.ft."; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </nav>

</br>
</br>

        <div class="container1">
            <h3 class="align-center" style="padding-top: 10px;padding-bottom: 10px;"><?= $data['weight']; ?></h3>
            <div class="in-row">
                <div class="small-box-white in-box bgcolor-white"></div>
                <div> <strong>Unselected</strong> </div>
                <div class="small-box-grey in-box bgcolor-grey"></div>
                <div><strong>Selected</strong> </div>
            </div>
            <div class="boxes">
                <?php
                
                $selected = $data['selected'];
                $str_arr = explode (",", $selected);
                
                ?>
                <div class="box-select">
                    
                    <?php
                    if(in_array("1", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum1(),selected1()"id="sel1" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum1(),selected1()"id="sel1" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    <?php
                    if(in_array("2", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum2(),selected2()"id="sel2" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum2(),selected2()"id="sel2" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                   
                </div>
                <div class="box-select">
                    
                    
                    <?php
                    if(in_array("3", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum3(),selected3()"id="sel3" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum3(),selected3()"id="sel3" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    
                    
                    <?php
                    if(in_array("4", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum4(),selected4()"id="sel4" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum4(),selected4()"id="sel4" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                   
                </div>
                <div class="box-select">
                   
                   <?php
                    if(in_array("5", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum5(),selected5()"id="sel5" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum5(),selected5()"id="sel5" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    
                    <?php
                    if(in_array("6", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum6(),selected6()"id="sel6" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum6(),selected6()"id="sel6" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                </div>
                <div class="box-select">
                   
                   <?php
                    if(in_array("7", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum7(),selected7()"id="sel7" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum7(),selected7()"id="sel7" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                    
                    
                    <?php
                    if(in_array("8", $str_arr))
                    {
                        ?>
                        <div class="box-selected" onclick="sum8(),selected8()"id="sel8" style="background: grey;"></div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box-selected" onclick="sum8(),selected8()"id="sel8" style="background: rgba(0, 0, 0,0.06);"></div>
                        <?php
                    }
                    ?>
                  
                </div>
            </div>

            <div class="total">
                <div class="area">
                    <div class="text1">
                        Selected Area:

                    </div>
                    <div class="selected-area-data" style="padding-left: 40px;">
                        <?= $data['selectedArea']. " sq.ft."; ?>
                    </div>
                </div>

                <div class="area">
                    <div class="text1">

                        Remaining Area:
                    </div>
                    <div class="selected-area-data" style="padding-left: 27px;">
                        <?= $data['remainingArea']. " sq.ft."; ?>

                    </div>

                </div>
            </div>



        </div>





    </div>


                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

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

<?php
  include('inc/footer.php');
  ?>