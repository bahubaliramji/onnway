<?php session_start();
//error_reporting(0);
ob_start();
include("controls/define2.php");
include("TBXadmin/include/config.php");
$url_gm = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

/* $queryP = $objT->getPage(4);
	$rowsP=mysqli_fetch_array($queryP);
	$page_title = $rowsP['title'];
	$seo_keyword = $rowsP['keyword'];
	$seo_content = $rowsP['description']; */

if (isset($_POST['submitt'])) {

	$source = $_POST["source"];
	$destination = $_POST["destination"];
	$vehicletype = $_POST["vehicletype"];
	$materialtype = $_POST["materialtype"];
	$weight = $_POST["weight"];
	$noofvehicle = $_POST["no_of_vehicle"];
	$scheduled_date = $_POST["scheduled_date"];
	$scheduled_time = $_POST["scheduled_time"];



	////////////////////////////////////////////

	$queryS = mysqli_query($dbhandle, "select * from tbl_city where id= '$source'");
	$dataS = mysqli_fetch_array($queryS);

	$queryD = mysqli_query($dbhandle, "select * from tbl_city where id= '$destination'");
	$dataD = mysqli_fetch_array($queryD);

	$queryV = mysqli_query($dbhandle, "select * from vehicle_list where id= '$vehicletype'");
	$dataV = mysqli_fetch_array($queryV);

	$price_km = $dataV['price_km'];


	$city_category = $dataS['category_id'];
	$lat1 = $dataS['latitude'];
	$lon1 = $dataS['longitude'];
	$city_categoryy = $dataD['category_id'];
	$lat2 = $dataD['latitude'];
	$lon2 = $dataD['longitude'];

	$source_name = $dataS["city_name"];
	$destination_name = $dataD["city_name"];


	/*echo $distance = ceil((3958*3.1415926*sqrt(($lat2-$lat1)*($lat2-$lat1) + cos($lat2/57.29578)*cos($lat1/57.29578)*($lon2-$lon1)*($lon2-$lon1))/180)*1.60934); */

	$url = "https://maps.googleapis.com/maps/api/distancematrix/xml?units=metrix&origins=$lat1,$lon1&destinations=$lat2,$lon2&key=AIzaSyBHB5GcUC772610OcgShgcCSYSmsm6N6PY";
	$ch = curl_init();
	$URI = $url;
	curl_setopt($ch, CURLOPT_URL, $URI);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Make request
	$data = curl_exec($ch);
	curl_close($ch);

	$xml = simplexml_load_string($data);
	$json = json_encode($xml);
	$array = json_decode($json, TRUE);

	$distance = ceil($array['row']['element']['distance']['value'] / 1000);


	$actualPrice = $noofvehicle * $distance * $price_km;


	/////////////////////////////////////////////////////////////


	if ($city_category == '1' && $city_categoryy == '1') {


		$price = $actualPrice;
	} else if ($city_category == '1' && $city_categoryy == '2') {

		$price = $actualPrice + (10 / 100 * $actualPrice);
	} else if ($city_category == '1' && $city_categoryy == '3') {

		$price = $actualPrice + (30 / 100 * $actualPrice);
	} elseif ($city_category == '1' && $city_categoryy == '4') {
		$price = $actualPrice + (40 / 100 * $actualPrice);
	} elseif ($city_category == '2' && $city_categoryy == '1') {


		$price = $actualPrice;
	} else if ($city_category == '2' && $city_categoryy == '2') {

		$price = $actualPrice + (10 / 100 * $actualPrice);
	} else if ($city_category == '2' && $city_categoryy == '3') {

		$price = $actualPrice + (30 / 100 * $actualPrice);
	} elseif ($city_category == '2' && $city_categoryy == '4') {
		$price = $actualPrice + (40 / 100 * $actualPrice);
	} elseif ($city_category == '3' && $city_categoryy == '1') {


		$price = $actualPrice;
	} else if ($city_category == '3' && $city_categoryy == '2') {

		$price = $actualPrice + (10 / 100 * $actualPrice);
	} else if ($city_category == '3' && $city_categoryy == '3') {

		$price = $actualPrice + (30 / 100 * $actualPrice);
	} elseif ($city_category == '3' && $city_categoryy == '4') {
		$price = $actualPrice + (40 / 100 * $actualPrice);
	} elseif ($city_category == '4' && $city_categoryy == '1') {


		$price = $actualPrice;
	} else if ($city_category == '4' && $city_categoryy == '2') {

		$price = $actualPrice + (10 / 100 * $actualPrice);
	} else if ($city_category == '4' && $city_categoryy == '3') {

		$price = $actualPrice + (30 / 100 * $actualPrice);
	} elseif ($city_category == '4' && $city_categoryy == '4') {
		$price = $actualPrice + (40 / 100 * $actualPrice);
	}




	$_SESSION['source'] = $_POST["source"];
	$_SESSION['source_name'] = $dataS["city_name"];
	$_SESSION['destination'] = $_POST["destination"];
	$_SESSION['destination_name'] = $dataD["city_name"];
	$_SESSION['vehicletype'] = $_POST["vehicletype"];
	$_SESSION['materialtype'] = $_POST["materialtype"];
	$_SESSION['weight'] = $_POST["weight"];
	$_SESSION['noofvehicle'] = $_POST["no_of_vehicle"];
	$_SESSION['scheduled_date'] = $_POST["scheduled_date"];
	$_SESSION['scheduled_time'] = $_POST["scheduled_time"];

	$_SESSION['lat1'] = $dataS['latitude'];
	$_SESSION['lon1'] = $dataS['longitude'];
	$_SESSION['lat2'] = $dataD['latitude'];
	$_SESSION['lon2'] = $dataD['longitude'];
	$_SESSION['distance'] = $distance;
	$_SESSION['actualPrice'] = $actualPrice;
	$_SESSION['price_km'] = $price_km;
	$_SESSION['price'] = $price;

	/* */
	$user_id = $_SESSION['user_id'];
	$query = mysqli_query($dbhandle, "INSERT INTO `tbl_post_load_enq` (`id`, `user_id`,  `sourse`, `destination`, `vihicle_type`, `material_type`, `weight`, `qty`, `schedule_date`, `scheduled_time`,`status`) VALUES (NULL, '" . $user_id . "', '" . $_SESSION['source_name'] . "', '" . $_SESSION['destination_name'] . "', '" . $_SESSION['vehicletype'] . "', '" . $_SESSION['materialtype'] . "', '" . $_SESSION['weight'] . "', '" . $_SESSION['noofvehicle'] . "', '" . $_SESSION['scheduled_date'] . "', '" . $_SESSION['scheduled_time'] . "','1')");
	/**/

	header('Location: check-fare.php');
}

$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("header.php");
include("header-bottom.php");

?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--end of top header bottom-->


<!--end of how it works-->	
<section class="why-choose-us-section">
	<div class="container">
		<div class="col-md-12">
			<h2>WHY <span class="choose-style"> CHOOSE US</span></h2>
			<p><?php if (isset($results[10][2])) {
					echo $results[10][2];
				} ?></p>
		</div>

		<!-- <div class="col-md-12 zero-padding">
			<div class="col-md-6 col-sm-6 choose-us-metro-section">
				<img src="admin/<?= $category['w_img']; ?>">
				<h3><?= $category['w_title']; ?></h3>
				<p><?= $category['w_content']; ?></p>
			</div>
		</div> -->
		<div class="col-md-12 zero-padding">
			<?php
			$sql9 = "SELECT * FROM why_us ";
			$res9 = mysqli_query($dbhandle, $sql9);
			foreach ($res9 as $key => $category) {
				if($key%2 == 0){
					echo '<div class="row">';
				}
			?>
			
				<div class="col-md-6 col-sm-6 choose-us-metro-section">
					<img src="admin/<?= $category['w_img']; ?>">
					<h3><?=  $category['w_title']; ?></h3>
					<p><?= $category['w_content']; ?></p>
					
				</div>
			
			<?php
				if($key%2 !== 0){
					echo '</div >';
				}
			} ?>
		</div>

	</div>
</section>
<!--end of why choose us section-->


<!--END OF LOGIN SECTION-->
<?php include("footer.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="<?php echo base_url; ?>val/javascripts/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url; ?>val/javascripts/jquery.validation.functions.js" type="text/javascript"> </script>

<script type="text/javascript">
	/* <![CDATA[ */

	jQuery(function() {

		jQuery("#cf_source").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please Select Source"

		});

		jQuery("#cf_destination").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please Select Destination"

		});

		jQuery("#cf_vehicletype").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please Select Vehicle Type"

		});

		jQuery("#cf_materialtype").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please Select Material Type"

		});

		/* jQuery("#scheduled_time").validate({

                    expression: "if (VAL) return true; else return false;",

                    message: "Please Select Time"

                }); */



		/* jQuery("#vecweight").validate({

                    expression: "if ( VAL.match(/^[0-9]*$/)) return true; else return false;",

                    message: "Vehicle Weight in Only Number Format"

                }); */

		jQuery("#loader_type").validate({
			expression: "if (VAL != '') return true; else return false;",

			message: "Please select a Type"

		});

		jQuery("#name").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please enter Your Name"

		});



		jQuery("#password").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please Enter Password Here"

		});

		jQuery("#mobile").validate({

			expression: "if (VAL.length > 9 && VAL.match(/^[0-9]*$/)) return true; else return false;",

			message: "Your Phone Number in correct format"

		});

		jQuery("#email").validate({

			expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",

			message: "Please enter a valid Email ID"

		});



		jQuery("#emaill").validate({

			expression: "if (VAL) return true; else return false;",

			message: "Please enter a valid Email/Phone No"

		});

		jQuery("#loader_password").validate({

			expression: "if (VAL.length > 5 && VAL) return true; else return false;",

			message: "Please enter a valid Password"

		});

		jQuery("#re_password").validate({
			expression: "if ((VAL == jQuery('#loader_password').val()) && VAL) return true; else return false;",

			message: "Confirm password doesn't match"
		});

	});

	/* ]]> */
</script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
	$(function() {
		$("#datepicker").datepicker({
			minDate: 0,
			maxDate: 4
		});
	});
</script>

<script>
	$('.how-it-works-inner img').click(function() {
		$(".how-it-works-inner img").removeClass("active");
		$(this).addClass('active');
	});
	$(document).ready(function() {
		$("#vecweight").blur(function() {
			if (!isNaN($("#vecweight").val())) {
				$.ajax({
					type: "POST",
					url: "check_weight.php",
					data: {
						weight: $(this).val(),
						vehicle_id: $("#cf_vehicletype").val()
					},
					dataType: "JSON",
					beforeSend: function() {

					},
					success: function(result) {
						if (result['status'] == 0) {
							alert("Weight Can't be exceed from limit");
							$("#vecweight").val('');
						}
					}
				});
			} else {
				$("#vecweight").val('');
				alert('Please Enter Numeric Value only');
			}
		});
	});
</script>

<?php include 'validation.php'; ?>


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
        const input1 = document.getElementById("source");
        const input2 = document.getElementById("destination");
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


</body>

</html>