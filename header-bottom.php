<header class="header-bottom">

	<div class="container">

		<div class="col-md-5 col-sm-6 col-xs-7 header-bottom-right-text padding-zero-mob">

			<h3><a href="index.php">SERVICES</a>&nbsp; <span class="nbsp">&nbsp; &nbsp; &nbsp;</span><?php if (isset($_SESSION['vehicle_id']) == "") { ?>|&nbsp; <span class="nbsp">&nbsp; &nbsp; &nbsp;</span><a <?php if (isset($_SESSION['user_id'])) {
																																																					echo "href='order-list.php'";
																																																				} else { ?> data-toggle="modal" data-target="#myModal" <?php } ?>>TRACK & TRACE</a><?php } ?></h3>

		</div>



		<div class="col-md-7 col-sm-6 col-xs-5  padding-zero-mob">

			<!--<div class="header-bottom-right-section">

      <?php if ($_SESSION['id'] == '') { ?>

		<a data-toggle="modal" data-target="#myModalv">	<button type="button" class="tab-style">POST A TRUCK</button></a>

  <?php } else { ?>  <a href="vehicle-registration-4.php"  >  <button class="tab-style">POST A TRUCK</button></a>

       <?php  }  ?>

		</div>-->

			<div class="header-bottom-right-section">

				<?php if (isset($_SESSION['provider_token']) && $_SESSION['provider_token'] != "") {
				} else { ?>
					<a  data-toggle="modal" data-target="#myModalProvider" <?php /* echo base_url;  */ if (isset($_SESSION['vehicle_id']) && $_SESSION['vehicle_id'] != "") {
								//	echo "post-truck.php";
								} else { 
								//	echo "post-a-truck.php" ;
									  }?>> <button class="tab-style">POST A TRUCK</button></a>
				<?php } ?>


			</div>







		</div>

	</div>

</header>