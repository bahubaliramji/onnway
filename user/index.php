<?php


$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("include/header.php");

$query2 = mysqli_query($dbhandle, "SELECT * FROM users WHERE token = '$token'");
$data2 = mysqli_fetch_assoc($query2);

$id = $data2['id'];
// echo "<pre>";
// print_r($data2);

$query = mysqli_query($dbhandle, "SELECT * FROM loader_profile_tbl WHERE user_id = '$id'");
$data = mysqli_fetch_assoc($query);

$id = 0;
if($data!=null){
    $id = $data['id'];
}
// echo "<pre>";
// print_r($data);
// die();
if (isset($_POST['update_profile'])) {
    if(isset($_SESSION['profile_update'])){
        $_SESSION['swal_title'] = "You Already requested for profile update wait please!";
        $_SESSION['swal_icon'] = "error";
        $_SESSION['link'] = 'index.php';
    } else {
        if($_POST['name'] != '' && $_POST['email'] != '' && $_POST['city'] != '' && $_POST['optradio'] !=''){
        
            $user_id = $_POST['user_id'];
            if($_FILES['image']['name'] != ''){
                $newname = new_file_name($_FILES['image']['name']);
                $ytmp_thumb = $_FILES['image']['tmp_name'];
                $image = "../android/Uploads/profile/".$newname;
                if (move_uploaded_file($ytmp_thumb, $image)) {
                    if($_POST['old_image']!=null){
                        unlink('../android/Uploads/profile/'.$_POST['old_image']);
                    }
                    $res  = mysqli_query($dbhandle,"UPDATE `loader_profile_tbl` SET `image` = '$newname' WHERE user_id = '$user_id'");
                }
            }
            $name = $_POST['name'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $type = $_POST['optradio'];
            $gst = $_POST['gst'];
                if($_POST['company']!=''){
                    $company = $_POST['company'];
                    $sql = "INSERT INTO `loader_profile_request`(`name`, `email`, `city`, `type`, `user_id`, `company`, `gst`) VALUES ('$name','$email','$city','$type','$user_id','$company','$gst')";
                } else {
                    $sql = "INSERT INTO `loader_profile_request`(`name`, `email`, `city`, `type`,`user_id`) VALUES ('$name','$email','$city','$type','$user_id')";
                }
            
                $res = mysqli_query($dbhandle,$sql);
            
                if($res == TRUE){
                    $_SESSION['profile_update'] = true;
                    $_SESSION['swal_title'] = "Your profile is under varificatiion please wait min 3 hours!";
                    $_SESSION['swal_icon'] = "success";
                    $_SESSION['link'] = "index.php";
                
                }
                else {
                    
                    $_SESSION['swal_title'] = "error";
                    $_SESSION['swal_icon'] = "error";
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
                    <li><a href="#" class="bred-active"> Loader Dashboard </a></li>
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
                        <li style="color:white; background-color:#d11f26;"><a style="color:white;" href="index.php" > <img src="../images/account-detail.png"> Account Detail </a></li>
                        <li><a href="user_kyc.php"> <img src="../images/account-detail.png"> KYC Detail </a></li>
                        <li class="dropdown"><a href="#"> <img src="../images/my-order.png"> My order </a></li>
                        <li><a href="#"> <img src="../images/com-detail.png"> Company Details </a></li>
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
                                <div class="row" style="margin-bottom: 10px;">
                                
                                    <div class="col-md-12" style="margin-left: 20px;">
                                        <div style=" text-align:center">
                                        <img style="border-radius: 50%; " src="../android/Uploads/profile/<?= $data['image'] ?>" height="200px" alt="image">

                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Image <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                                <input type="file" class="form-control" id="image" name="image" placeholder="Source">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Name <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="name" type="text" id="name"  class="form-control"  placeholder="Name" value="<?php if(isset($data['name'])){ echo $data['name']; } ?>">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-2">
                                        <p>Email Id <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8 paddinng">
                                        <input type="email" id="email" name="email"  class="form-control"  placeholder="Email" value="<?php if(isset($data['email'])){ echo $data['email']; }?>">
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
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Type <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8 paddinng">
                                    <span class="radio-tab " style="float: left; font-size: 1em; margin-top:10px">
    
    
                                        <!-- <input type="text" id="type" name="type" class="form-control" placeholder="Type" value="<?php echo $data['type']; ?>"> -->
                                        <label class="radio-inline" >
                                            <input type="radio" name="optradio"  onchange="selectType('Individual')" <?php if(isset($data['type'])){ if( $data['type'] == "Individual") { echo "checked";  } } else {echo "checked"; } ?>  value="Individual" class="loader_type_select" > Individual
                                            </label> &nbsp; &nbsp; &nbsp;
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio" id="radio_company" value="Company" onchange="selectType('Company')"  <?php if(isset($data['type']) && $data['type'] == "Company" ){ echo "checked";  } ?> class="loader_type_select"> Company
                                            </label>
                                            </span>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>

                                    <div class="row" id="company_tab" style="display: none;" >
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <p>Company <span style="color:red;">*</span></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="company" name="company" class="form-control" placeholder="Company" value="<?php if(isset($data['company'])){ echo $data['company']; }?>">
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                    </div>

                                    <div class="row" id="gst_tab" style="display: none;" >
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <p>GST <span style="color:red;">*</span></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="gst" name="gst" class="form-control" placeholder="GST no..." value="<?php if(isset($data['gst'])){ echo $data['gst']; }?>">
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

                    <!-- <div id="Paris" class="tabcontent">
                        <form action="" method="post">
                        <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Name <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="name" type="text" id="nameL"  class="form-control" placeholder="Name" value="<?php echo $data['name']; ?>">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Email Id <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8 paddinng">
                                        <input type="email" id="email" readonly class="form-control" placeholder="Email" value="<?php echo $data['email']; ?>">
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
                                        <input type="text" id="mobile" class="form-control" readonly placeholder="Mobile No." value="<?php echo $data2['phone']; ?>">
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
                                        <input name="name" type="text" id="city" readonly class="form-control" placeholder="Name" value="<?php echo $data['city']; ?>">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Type <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8 paddinng">
                                        <input type="text" id="type"  class="form-control" placeholder="Type" value="<?php echo $data['type']; ?>">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                
                                <?php if($data['type']=="Company"){ ?>
                                <div class="row">
                                    <div class="col-md-1">

                                    </div>
                                    <div class="col-md-2">
                                        <p>Company <span style="color:red;">*</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="mobile" class="form-control"  placeholder="Mobile No." value="<?php echo $data['company']; ?>">
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                               <?php } ?> 
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-7">
                                    <button type="submit" name="updatch" class="update-password-btn "> CHANGE PASSWORD </button>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>


        </div>
    </div>
</section>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    
    if(document.getElementById('radio_company').checked){
        $('#company_tab').show();
        $('#gst_tab').show();

    }

    function selectType(type){
        // alert(type);
        if(type=="Company"){
            $('#company_tab').show();
            $('#gst_tab').show();
        } else {
            $('#company_tab').hide();
            $('#gst_tab').hide();
        }
        
    }
</script>


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