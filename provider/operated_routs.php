<?php



$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");


$query = mysqli_query($dbhandle, "SELECT * FROM provider_profile_tbl WHERE user_id = '$id'");
$data = mysqli_fetch_assoc($query);

$id = 0;
if ($data != null) {
    $id = $data['id'];
}

$name  =  $data['name'];
$city  =  $data['city'];
$transport_name  =  $data['transport_name'];


if (isset($_POST['update_profile'])) {

    if ($_POST['dest'] != '' && $_POST['source']) {

        $dest = $_POST['dest'];
        $source = $_POST['source'];

        $query = mysqli_query($dbhandle, "INSERT INTO provider_source_des SET 
            mobile_no = '$id', 
            source = '$source', 
            destination = '$dest'");


        if ($query) {
            $_SESSION['swal_title'] = "Route Added";
            $_SESSION['swal_icon'] = "success";
            $_SESSION['link'] = "operated_routs.php";
        } else {
            $_SESSION['swal_title'] = "Something Went Wrong";
            $_SESSION['swal_icon'] = "error";
            $_SESSION['link'] = "operated_routs_dest.php";
        }
    } else {
        $_SESSION['swal_title'] = "All details are required!";
        $_SESSION['swal_icon'] = "error";
    }
}
?>



<section>
    <div class="container">
        <div class="col-md-12">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="#"> <img src="../images/home.png"> </a></li>
                    <li><a href="#" class="bred-active"> Provider Dashboard </a></li>
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
                        <li><a href="index.php"> <img src="../images/account-detail.png"> Account Detail </a></li>
                        <li><a href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li class="dropdown"><a href="trucks.php"> <img src="../images/my-order.png"> Truck Details </a></li>

                        <li class="dropdown"><a href="truck_add.php"> <img src="../images/my-order.png"> Add Truck </a></li>
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="#"> <img src="../images/com-detail.png"> Operated Routs </a></li>
                        <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">


                    <div class="box-style-of-view-order">
                        <div class="tab">
                            <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">Add New Route</button>
                            <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                        </div>

                        <div id="London" class="tabcontent" style="display: block;">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?= $data2['id']; ?>">


                                <div class="row" style="padding:10px">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="source" id="pac-input1" type="text" placeholder="Source City" onblur="setTimeout(function() {  document.querySelector('#pac-input1').value = document.querySelector('#pac-input1').value.split(',')[0]},1);">
                                        <input class="form-control" name="dest" id="pac-input2" type="text" placeholder="Destination City" onblur="setTimeout(function() {  document.querySelector('#pac-input2').value = document.querySelector('#pac-input2').value.split(',')[0]},1);">
                                        <div id="map" style="display:none"></div>
                                    </div>


                                    <div class="col-md-2">
                                    </div>
                                </div>






                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-7">
                                        <button type="submit" name="update_profile" class="update-password-btn "> ADD </button>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box-style-of-view-order">
                        <div class="tab">
                            <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">Routes</button>
                            <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                        </div>

                        <div id="London" class="tabcontent" style="display: block;">
                            <?php $query1 = mysqli_query($dbhandle, "SELECT * FROM provider_source_des WHERE mobile_no = '$id'");

                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                // print_r($data1);
                                // die();
                            ?>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3" style="padding:20px">
                                        <?= $data1['source']; ?>
                                    </div>
                                    <div class="col-md-2" style="padding:20px">
                                        ====
                                    </div>
                                    <div class="col-md-3" style="padding:20px">
                                        <?= $data1['destination']; ?>
                                        </div>
                                    <div class="col-md-2" style="padding:20px">
                                        <form action="" method="POST" class="d-inline">
                                            <input action="" type="hidden" name="r_id" value="<?php echo $data1['id'];  ?>">

                                            <button type="submit" name="delete" value="Delete" class="btn btn-secondary">
                                                X
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
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


if (isset($_POST['delete'])) {
    $r_id = $_POST['r_id'];



    $res = mysqli_query($dbhandle, "DELETE FROM provider_source_des WHERE id = '$r_id'");
    if ($res == TRUE) {
        $_SESSION['swal_title'] = "Deleted Successfully";
        $_SESSION['swal_icon'] = "success";
        $_SESSION['link'] = "operated_routs.php";
    } else {
        $_SESSION['success_image'] = "Unable to Delete";
        $_SESSION['status_code_image'] = "error";
    }
}

include("include/footer.php");

?>




<!-- google map -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAatarUnfCi0opdn9JPy6GNuwf0q3r6RBg&callback=initMap&libraries=places&v=weekly" async></script>
<script>
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 40.749933,
                lng: -73.98633
            },
            zoom: 13,
            mapTypeControl: false,
        });
        const card = document.getElementById("pac-card");
        const input1 = document.getElementById("pac-input1");
        const input2 = document.getElementById("pac-input2");
        const biasInputElement = document.getElementById("use-location-bias");
        const strictBoundsInputElement = document.getElementById("use-strict-bounds");
        const options = {
            fields: ["formatted_address", "geometry", "name"],
            strictBounds: false,
            types: ["(cities)"],
        };
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);
        const autocomplete1 = new google.maps.places.Autocomplete(input1, options);
        const autocomplete2 = new google.maps.places.Autocomplete(input2, options);
        autocomplete1.bindTo("bounds", map);
        autocomplete2.bindTo("bounds", map);
        const marker = new google.maps.Marker({
            map,
            anchorPoint: new google.maps.Point(0, -29),
        });
        autocomplete1.addListener("place_changed", () => {
            infowindow.close();
            marker.setVisible(false);
            const place = autocomplete.getPlace();
            if (!place.geometry || !place.geometry.location) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
        });
        autocomplete2.addListener("place_changed", () => {
            infowindow.close();
            marker.setVisible(false);
            const place = autocomplete.getPlace();
            if (!place.geometry || !place.geometry.location) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
        });
    }

  
</script>