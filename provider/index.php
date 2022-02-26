<?php


$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");


// echo "<pre>";
// print_r($data2);
// die();

$query = mysqli_query($dbhandle, "SELECT * FROM provider_profile_tbl WHERE user_id = '$id'");
$data = mysqli_fetch_assoc($query);

$id = 0;
if($data!=null){
    $id = $data['id'];
}

$name  =  $data['name'];
$city  =  $data['city'];
$transport_name  =  $data['transport_name'];


if (isset($_POST['update_profile'])) {
    if(isset($_SESSION['profile_update'])){
        $_SESSION['swal_title'] = "You Already requested for profile update wait please!";
        $_SESSION['swal_icon'] = "error";
        $_SESSION['link'] = 'index.php';
    } else {
        if($_POST['name'] != ''  && $_POST['city'] != '' && $_POST['transport_name'] !=''){
        
            $user_id = $_POST['user_id'];
            $nname = $_POST['name'];
            $ccity = $_POST['city'];
            $ttransport_name = $_POST['transport_name'];
            $res1 = $res2 = false;
                if($name != $nname){
                    $sql1 = "INSERT INTO `name_change_request`(`user_id`, `name`) VALUES ('$user_id','$nname')";
                    $res1 = mysqli_query($dbhandle,$sql1);
                }
                if($city!=$ccity || $transport_name!=$ttransport_name){
                    $sql2 = "INSERT INTO `transport_change_request`( `user_id`, `transport`, `city`) VALUES ('$user_id','$ttransport_name','$ccity')";
                    $res2 = mysqli_query($dbhandle,$sql2);
                }
        
            
                if($res1 == TRUE || $res2 == TRUE){
                    $_SESSION['profile_update'] = true;
                    $_SESSION['swal_title'] = "Your profile is under varificatiion please wait min 3 hours!";
                    $_SESSION['swal_icon'] = "success";
                    $_SESSION['link'] = "index.php";
                
                }
                else {
                    $_SESSION['swal_title'] = "Nothing To Update here";
                    $_SESSION['swal_icon'] = "error";
                    $_SESSION['link'] = "index.php";
                }
        } else {
            $_SESSION['swal_title'] = "All details are required!";
            $_SESSION['swal_icon'] = "error";
        }
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
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="index.php"> <img src="../images/account-detail.png"> Account Detail </a></li>
                        <li><a href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li class="dropdown"><a href="trucks.php"> <img src="../images/my-order.png"> Truck Details </a></li>
                        
                        <li class="dropdown"><a href="truck_add.php"> <img src="../images/my-order.png"> Add Truck </a></li>
                        <li><a href="operated_routs.php"> <img src="../images/com-detail.png"> Operated Routs </a></li>
                        <li><a href="#"> <img src="../images/address-book.png"> Address Book </a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">

                <div class="box-style-of-view-order">
                    <div class="tab">
                        <button class="tablinks active" style="width: 100%;" onclick="openCity(event, 'London')">PERSONAL INFORMATION</button>
                        <!-- <button class="tablinks change-pad" onclick="openCity(event, 'Paris')">CHANGE PASSWORD</button> -->
                    </div>

                    <div id="London" class="tabcontent" style="display: block;">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?= $data2['id']; ?>">
                                
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Name <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="name" type="text" id="name"  class="form-control"  placeholder="Name" value="<?php if(isset($data['name'])){ echo $name ; } ?>">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                    

                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Mobile No. <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="mobile" class="form-control" readonly  placeholder="Mobile No." value="<?php echo $data2['phone']; ?>">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>City <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">                  
                                        <input class="form-control" name="city" id="pac-input" type="text" placeholder="City" onblur="setTimeout(function() { document.querySelector('#pac-input').value = document.querySelector('#pac-input').value.split(',')[0]},1);" value="<?php if(isset($data['name'])){ echo $data['city']; } ?>" />
                                        <div id="map" style="display:none"></div>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>


                                    <div class="row"  >
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <p>Transport Name<span style="color:red;">*</span></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="transport_name" name="transport_name" class="form-control" placeholder="Transport Name" value="<?php if(isset($data['transport_name'])){ echo $transport_name ; }?>">
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                    </div>

                                    

                               <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-7">
                                        <button type="submit" name="update_profile" class="update-password-btn "> UPDATE PROFILE </button>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                        </form>
                    </div>

                   
                </div>
            </div>


        </div>
    </div>
</section>

<!-- google map -->
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAatarUnfCi0opdn9JPy6GNuwf0q3r6RBg&callback=initMap&libraries=places&v=weekly"
      async
    ></script>
    <script>
      function initMap() {
          const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 40.749933, lng: -73.98633 },
            zoom: 13,
            mapTypeControl: false,
          });
          const card = document.getElementById("pac-card");
          const input = document.getElementById("pac-input");
          const biasInputElement = document.getElementById("use-location-bias");
          const strictBoundsInputElement = document.getElementById("use-strict-bounds");
          const options = {
            fields: ["formatted_address", "geometry", "name"],
            strictBounds: false,
            types: ["(cities)"],
          };
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);
          const autocomplete = new google.maps.places.Autocomplete(input, options);
          autocomplete.bindTo("bounds", map);
          const marker = new google.maps.Marker({
            map,
            anchorPoint: new google.maps.Point(0, -29),
          });        
          autocomplete.addListener("place_changed", () => {
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

<?php
include("include/footer.php");
?>