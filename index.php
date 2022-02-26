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




// $roww = mysqli_query($dbhandle, "SELECT * FROM trucks GROUP BY type");
// $fetchh = mysqli_fetch_array($roww);
// echo "<pre>";
// 	print_r($fetchh);

// echo  $fetchh;
// die();


if (isset($_POST['submitt_get_fare'])) {
	if ($_POST['type'] == "full") {
		$source = $_POST["source"];
		$destination = $_POST["destination"];
		$vehicletype = $_POST["vehicletype"];
		$materialtype = $_POST["materialtype"];
		$weight = $_POST["weight"];
		//	$noofvehicle = $_POST["no_of_vehicle"];
		$scheduled_date = $_POST["scheduled_date"];
		//	$scheduled_time = $_POST["scheduled_time"];

		$token = $_SESSION['token'];
		$query2 = mysqli_query($dbhandle, "SELECT * FROM users WHERE token = '$token'");
		$data2 = mysqli_fetch_assoc($query2);
		$id = $data2['id'];
		$_SESSION['user_id'] = $id;


		$row = mysqli_query($dbhandle, "SELECT * FROM `fares` where source='$source' AND destination = '$destination' AND truck_id = '$vehicletype'");

		$row121 = mysqli_query($dbhandle, "INSERT INTO enquiry
 	 (
 	 user_id,
 	 source,
 	 destination,
 	 truck_type,
 	 material,
 	 weight,
 	 schedule,
 	 sourceLAT,
 	 sourceLNG,
 	 destinationLAT,
 	 destinationLNG
 	     ) VALUES
 	     (
 	     '$id',
 	     '$source',
 	     '$destination',
 	     '$vehicletype',
 	     '$materialtype',
 	     '$weight',
 	     '$scheduled_date',
 	     '',
 	     '',
 	     '',
 	     ''
 	         )");

		$ccc = mysqli_num_rows($row);

		if ($ccc > 0) {
			while ($fetch = mysqli_fetch_array($row)) {

				$tid = $fetch['truck_id'];

				$row2 = mysqli_query($dbhandle, "SELECT * FROM `trucks` where id='$tid' ");
				$fetch2 = mysqli_fetch_array($row2);

				$row21 = mysqli_query($dbhandle, "SELECT * FROM `tbl_material` where id='$materialtype' ");
				$fetch21 = mysqli_fetch_array($row21);

				$f = $fetch['other_charges'];
				if (empty($f)) {
					$f = '0';
				}

				$c = $fetch['cgst'];
				if (empty($c)) {
					$c = '0';
				}

				$s = $fetch['sgst'];
				if (empty($s)) {
					$s = '0';
				}

				$i = $fetch['insurance'];
				if (empty($i)) {
					$i = '0';
				}

				$response = array(
					"id" => $fetch['id'],
					"source" => $fetch['source'],
					"destination" => $fetch['destination'],
					"truck_id" => $fetch2['title'],
					"truck" => $tid,
					"truck_type" => $fetch2['type'],
					"material" => $fetch21['material_name'],
					"material_id" => $materialtype,
					"freight" => $fetch['freight'],
					"weight" => $weight,
					"other_charges" => $f,
					"cgst" => $c,
					"sgst" => $s,
					"insurance" => $i,
					"schedule_date" => $scheduled_date,
				);
			}

			$data = array(
				"status" => "1",
				"message" => "Data",
				"data" => $response
			);

			// echo json_encode($data);
			//print_r($data);
			$_SESSION['check_fare'] = $data;
			header('Location: user/check_fare.php');
		} else {
			$_SESSION['fl_quote'] = $_POST;
			header('Location: user/request_full_load_quote.php');
		}
	} else {
		// print_r($_POST);
		// die();

		$_SESSION['part_load_data'] = $_POST;
		header('Location: user/part_load.php');

	}
}

$page_title = "OnnWay";
$seo_keyword = "OnnWay";
$seo_content = "OnnWay";

include("header.php");
include("header-bottom.php");

?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--end of top header bottom-->
<div class="banner-sec" style="background-image: url(admin/<?php if (isset($results[1][4])) {
																echo $results[1][4];
															} ?>);">
	<div class="container">
		<div class="col-md-12 banner-inner-content">
			<h2><?php if (isset($results[1][2])) {
					echo $results[1][2];
				} ?></h2>
			<ul>
				<li><?php if (isset($results[2][2])) {
						echo $results[2][2];
					} ?></li>
			</ul>

		</div>
		<style>
			.radio:checked+label {
				border: 3px solid white;
			}
		</style>
		<?php if (!isset($_SESSION['vehicle_id']) && isset($_SESSION['vehicle_id']) == "") { ?>
			<form action="" method="post">
				<div class="col-md-12 banner-inner-post ">
					<div class="row">
						<div class="col-sm-5">
							<span class="select-tab">
								<input style="display: none;" checked class="form-control radio" name="type" id="full" type="radio" value="full">
								<label for="full">
									<div class="post-tab-style">POST FULL LOAD NOW</div>
								</label>
							</span>
						</div>


						<div class="col-sm-2">

						</div>
						<div class="col-sm-5">
							<input style="display: none;" class="form-control radio" name="type" id="part" type="radio" value="part">
							<label for="part">
								<div class="post-tab-style">POST PART LOAD NOW</div>
							</label>

						</div>
					</div>
					<br>
					<!-- <span class="select-tab">
						<select name="source" id="cf_source" required>

							<option value="">Source</option>
							<?php
							$row = mysqli_query($dbhandle, "select * from tbl_city order by city_name");

							while ($fetch = mysqli_fetch_array($row)) {

							?>
								
								<option value="<?php echo $fetch['id']; ?>"><?php echo $fetch['city_name'] . ' (' . $fetch['state_name'] . ')'; ?></option>
							<?php } ?>
						</select>
					</span class="select-tab">
					<span class="select-tab">
						<select name="destination" id="cf_destination" required>
							<option value="">Destination</option>
							<?php
							$row = mysqli_query($dbhandle, "select * from tbl_city order by city_name ");

							while ($fetch = mysqli_fetch_array($row)) {

							?>
								
								<option value="<?php echo $fetch['id']; ?>"><?php echo $fetch['city_name'] . ' (' . $fetch['state_name'] . ')'; ?></option>
							<?php } ?>
							
						</select>
					</span> -->
					<div class="row">
						<div class="col-sm-3">
							<span class="select-tab">
								<input style="width: 261px; height:49px;" class="form-control" name="source" id="source" type="text" placeholder="Source City" onblur="setTimeout(function() {  document.querySelector('#source').value = document.querySelector('#source').value.split(',')[0]},1);">
								<div id="map" style="display:none"></div>
							</span>
						</div>
						<div class="col-sm-3">
							<span class="select-tab">
								<input style="width: 261px; height:49px;" class="form-control" name="destination" id="destination" type="text" placeholder="Destination City" onblur="setTimeout(function() {  document.querySelector('#destination').value = document.querySelector('#destination').value.split(',')[0]},1);">

							</span>
						</div>
						<img src="images/open.png" width="100px" height="40px">
						<div class="col-sm-3">
							<span class="select-tab">
								<select name="vehicletype" id="cf_vehicletype" required>
									<option value="">Vehicle Type</option>
									<?php
									$roww = mysqli_query($dbhandle, "SELECT * FROM trucks GROUP BY type");
									while ($fetchh = mysqli_fetch_array($roww)) {
										// print_r($fetchh);

										// echo  $fetchh;
										// die();
									?>
										<optgroup label="<?php echo ucfirst($fetchh['type']); ?>">
											<?php $rowtruck = mysqli_query($dbhandle, "select * from trucks where type='" . $fetchh['type'] . "'");
											while ($fetchhh = mysqli_fetch_array($rowtruck)) {
												if ($fetchh['id'] == 2) {

											?>
													<option value="<?php echo $fetchhh['id']; ?>"><?php echo $fetchhh['title']; ?></option>
													<?php	} else {
													if ($fetchh['type'] == 'open truck') { ?>
														<option value="<?php echo $fetchhh['id']; ?>">y<img src="images/open.png" width="100px" height="40px"><?php echo $fetchhh['title']; ?></option>
													<?php
													}
													if ($fetchh['type'] == 'container') { ?>
														<option value="<?php echo $fetchhh['id']; ?>"><?php echo $fetchhh['title']; ?></option>
													<?php
													}
													if ($fetchh['type'] == 'trailer') { ?>
														<option value="<?php echo $fetchhh['id']; ?>"><?php echo $fetchhh['title']; ?></option>
											<?php
													}
												}
											} ?>
										</optgroup>

									<?php } ?>

								</select>
							</span>
						</div>
						<div class="col-sm-3">
							<span class="select-tab">
								<select name="materialtype" id="cf_materialtype" required>
									<option value="">Material Type</option>
									<?php
									$rowww = mysqli_query($dbhandle, "select * from tbl_material");

									while ($fetchhh = mysqli_fetch_array($rowww)) {

									?>

										<option value="<?php echo $fetchhh['id']; ?>"><?php echo $fetchhh['material_name']; ?></option>
									<?php } ?>

								</select>
							</span>
						</div>
					</div>






				</div>

				<div class="col-md-12 banner-inner-post">

					<span class="select-tab">


						<input id="vecweight" required Placeholder="Weight in KG" type="text" name="weight" value="" class="slect-padd">


					</span class="select-tab">


					<span class="select-tab ">
						<input type="text" name="scheduled_date" class="inital1 new-home-dat slect-padd" required placeholder="Select Scheduled Date" id="datepicker">
					</span>

					<!-- <span class="select-tab">
						<input type="hidden" name="no_of_vehicle" value="1">
						<select name="scheduled_time" id="scheduled_time" class="option-padd" required>
							<option value="" id="defaultOpen">Select Scheduled Time </option>
							<option value="12AM-3AM"> 12AM - 3AM</option>
							<option value="3AM-6AM"> 3AM - 6AM</option>
							<option value="6AM-9AM"> 6AM - 9AM</option>
							<option value="9AM-12PM"> 9AM - 12PM</option>
							<option value="12PM-3PM"> 12PM - 3PM</option>
							<option value="3PM-6PM"> 3PM - 6PM</option>
							<option value="6PM-9PM"> 6PM - 9PM</option>
							<option value="9PM-12AM"> 9PM - 12AM</option>


						</select>
					</span> -->

					<span>

						<?php if (!isset($_SESSION['token'])) { ?>
							<a data-toggle="modal" data-target="#myModal"> <button type="submit" name="submitt_get_fare" class="check-fare-tab-style"><span style="font-size:14px;">GET FARE Login</strong></button></a>
						<?php } else { ?>
							<button type="submit" name="submitt_get_fare" class="check-fare-tab-style"><span style="font-size: 14px;">GET FARE</span></button>
						<?php  }  ?>
					</span>
				</div>
			</form><?php } ?>
	</div>
</div>
<!--End of banner section-->
<section class="about-us-section">
	<div class="container">
		<?php
		$sql8 = "SELECT * FROM aboutus";
		$res8 = mysqli_query($dbhandle, $sql8);
		foreach ($res8 as $category) {
		?>
			<div class="col-md-5 col-sm-6">
				<img src="admin/<?= $category['a_img']; ?>" class="truck-img">
			</div>
			<div class="col-md-7 col-sm-6">
				<div class="about-content-section">
					<h2>ABOUT <span class="choose-style">US</span></h2>
					<p><?= $category['a_content']; ?>
					</p>
					<h4><a href="about-us.php">READ MORE</a></h4>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
<!--End of about-us section-->
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
			foreach ($res9 as $category) {
			?>
				<div class="col-md-6 col-sm-6 choose-us-metro-section">
					<img src="admin/<?= $category['w_img']; ?>">
					<h3><?= $category['w_title']; ?></h3>
					<p><?= $category['w_content']; ?></p>
				</div>
			<?php } ?>
		</div>

	</div>
</section>
<!--end of why choose us section-->
<section class="how-it-works-section">
	<div class="container">
		<div class="col-md-12">
			<h2>HOW <span class="choose-style"> IT WORKS</span></h2>
		</div>
		<?php
		$sql10 = "SELECT * FROM how_it ";
		$res10 = mysqli_query($dbhandle, $sql10);
		foreach ($res10 as $category) {
		?>
			<div class="col-md-3 col-sm-6 pad-btm">
				<div class="col-md-12  how-it-works-inner">
					<img src="admin/<?= $category['h_img']; ?>">
					<h3><?= $category['h_title']; ?></h3>
					<p style="text-align: justify;"><?= $category['h_content']; ?></p>
				</div>
				<div class="red-arrow"><img src="images/arrow.png"></div>
			</div>
		<?php } ?>
	</div>
</section>
<!--end of how it works-->
<section class="content-section">

	<div class="container-fluid zero-padding">
		<div class="col-md-6 testimonial-black">


			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


				<!-- Wrapper for slides -->
				<div class="carousel-inner testimonial-text" role="listbox">
					<?php
					$sql11 = "SELECT * FROM testimonial";
					$res11 = mysqli_query($dbhandle, $sql11);
					$data =  mysqli_fetch_assoc($res11);

					$id = $data['t_id'];
					// $id = $_GET['t_id'];
					foreach ($res11 as $slider11) {

						if ($slider11['t_id'] == $id) {
							echo '<div class="item active">
					<div class="col-md-12 text-center">
						<h4> WHAT PEOPLE SAY </h4>
						<h2> TESTIMONIALS </h2>
						<span class="border-style"> <img src="images/heading-border.png"> </span> <br>
						<span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
						<p> ' . $slider11['t_message'] . '
						<h3>' . $slider11['t_name'] . '</h3>
						</p>
					</div>
				    </div>';
						} else {
							echo '<div class="item">
					<div class="col-md-12 text-center">
						<h4> WHAT PEOPLE SAY </h4>
						<h2> TESTIMONIALS </h2>
						<span class="border-style"> <img src="images/heading-border.png"> </span> <br>
						<span class="quotes-style"> <img src="images/blockquotes-img.png"> </span>
						<p>' . $slider11['t_message'] . '
						<h3>' . $slider11['t_name'] . '</h3>
						</p>
					</div>
				    </div>';
						}
					} ?>
				</div>
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php
					$sql1 = "SELECT * FROM testimonial";
					$res1 = mysqli_query($dbhandle, $sql1);
					$data =  mysqli_fetch_assoc($res1);

					$id = $data['t_id'];
					$count = 0;
					foreach ($res1 as $slider) {
						if ($slider['t_id'] == $id) {
							echo '<li data-target="#carousel-example-generic" data-slide-to="' . $count . '" class="active"></li>';
						} else {
							echo '<li data-target="#carousel-example-generic" data-slide-to="' . $count . '"></li>';
						}
						$count++;
					}
					?>
				</ol>
			</div>



		</div>

		<div class="col-md-6 current-update-white">
			<div class="col-md-12">
				<h3> CURRENT <span class="update-style"> UPDATES </span> </h3>
				<?php
				$sql10 = "SELECT * FROM current_updates ";
				$res10 = mysqli_query($dbhandle, $sql10);
				foreach ($res10 as $category) {
					echo '<p>' . $category['c_content'] . '</p>';
				}
				?>
				<!-- <ul>
					<li>E-Way Bill is an electronically generated document. which is required to be generated for the movement of goods of more Rs. 50,000 from one place to another.</li>
					<li>In case an e-way bill has been generated but the goods are either not transported or are not transported as per the details furnished in the e-way bill, the e-way bill shall be cancelled The cancellation can be done either electronically on the GST Website directly or through a GST Facilitation Centre within 24 hours of the generation of the e-way bill.</li>
					<li class="text11">An e-way bill cannot be cancelled if it has been verified in transit.</li>
					<li>The e-way bill generated in any state shall be valid in every state and union territory of India.</li>

				</ul> -->
			</div>
		</div>
	</div>


</section>
<!--end of content section-->

<!--START OF LOGIN SECTION-->

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

		jQuery("#$payload = explode(".
			",$token)[1]; 
			$n1 = str_replace(['-', '_', ''], ['+', '/', '='], $payload);
			// echo "<br>";
			// echo $n1;
			//  echo "<br>";
			echo base64_decode($n1);
			").validate({

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