<ul>
	<li>
		<a href="<?php echo base_url ; ?>vehicle-my-account.php"> <img src="<?php echo base_url ; ?>images/account-detail.png"> Account Details </a>
	</li>
	<li>
		<a href="<?php echo base_url ; ?>vehicle-company-details.php"> <img src="<?php echo base_url ; ?>images/com-detail.png"> Company Details </a>
	</li>
	<li>
		<a href="<?php echo base_url ; ?>vehicle-bank-details.php"> <img src="<?php echo base_url ; ?>images/com-detail.png"> Bank Details </a>
	</li>
	<?php if($_SESSION['vehicle_owner_type']=='owner'){?>
	<li class="dropdown">
		<a href="<?php echo base_url ; ?>my-truck.php"> <img src="<?php echo base_url ; ?>images/my-order.png"> My Truck </a>
	</li>
	<li class="dropdown">
		<a href="<?php echo base_url ; ?>my-posted-truck.php"> <img src="<?php echo base_url ; ?>images/my-order.png"> My Posted Truck </a>
	</li>
	<?php }else{?>
		<li class="dropdown">
		<a href="<?php echo base_url ; ?>my-posted-truck-info.php"> <img src="<?php echo base_url ; ?>images/my-order.png"> My Posted Truck </a>
	</li>
	<?php }?>
</ul>