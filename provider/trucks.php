<?php


$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

?>



<section>
    <div class="container">
        <div class="col-md-12">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="#"> <img src="../images/home.png"> </a></li>
                    <li><a href="#" class="bred-active"> Add </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--END OF BREADCRUMB-->

<!--START OF ADDRESS BOOK-->
<section>
    <div class="main-dashboarsd-section">
        <div class="container">
            <div class="col-md-4">
                <div class="user-dashboard-section">
                    <h4>User Dashboard</h4>
                </div>
                <div class="dashboad-details">
                    <ul>
                        <li ><a href="index.php"> <img src="../images/account-detail.png"> Account Detail </a></li>
                        <li><a href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="trucks.php"> <img src="../images/my-order.png"> Truck Details </a></li>
                        
                        <li ><a href="truck_add.php"> <img src="../images/my-order.png"> Add Truck </a></li>
                        <li><a href="operated_routs.php"> <img src="../images/com-detail.png"> Operated Routs </a></li>
                        <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">

                <div class="box-style-of-view-order">
                    <div class="tab">
                        <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">Trucks</button>
                        <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                    </div>

                    <div id="London" class="tabcontent" style="display: block;">
                       <div class="row" style="padding:20px">
                           <?php $query = mysqli_query($dbhandle, "SELECT * FROM `mytrucksprovider` WHERE `provider_mobile_no` = '$id'");
                            while($data = mysqli_fetch_assoc($query)){ 
                                $type = $data['vehicle_type'];
                                $query2 = mysqli_query($dbhandle, "SELECT * FROM `trucks` WHERE `id` = '$type'");
                                $data2 = mysqli_fetch_assoc($query2)
                                // print_r($data);
                                //print_r($data = mysqli_fetch_assoc($query))?>
                                <div class="col-md-6">
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="../images/open.png" width="70px" height="40px">
                                            </td>
                                            <td>
                                                <h4>Truck type</h4>
                                                <p><b><?= $data2['title'] ?> <?= $data2['type'] ?></b></p>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <img src="../images/account-detail.png" width="50px" height="50px">
                                            </td>
                                            <td>
                                            <h4>Registration Number</h4>
                                                <p><b><?= $data['truck_reg_no'] ?> </b></p>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <img src="../images/i-booking.png" width="70px" height="40px">
                                            </td>
                                            <td>
                                            <h4>Driver Details</h4>
                                                <p>Name:<b><?= $data['driver_name'] ?></b></p>
                                                <p>Number:<b><?= $data['driver_mobile_no'] ?></b></p>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                           
                           <?php } ?>
                       </div>
                    </div>

                   
                </div>
            </div>


        </div>
    </div>
</section>



<?php
include("include/footer.php");
?>