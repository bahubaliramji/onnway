<?php session_start();
include('include/config.php');
$type = $_SESSION['type'];
$sidepage = 'login';
if ($_SESSION['user_id'] == '') {
	header('location:index.php');
}
?>
<style>
	.box {
		box-shadow: none;
	}
</style>
<html>

<head>
	<title>Technobrix | Loader</title>
	<?php include('include/head.php'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">

		<?php include('include/header.php'); ?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php include('include/sidebar.php'); ?>



		<!-- Content Wrapper. Contains page content -->

		<div class="content-wrapper">

			<!-- Main content -->

			<section class="content">

				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-xs-12">
						<form method="post" action="" enctype="multipart/form-data">
							<div class="box">

								<div class="row" style="margin-right: 0px;margin-left: 0px;">
									<div class="box-header with-border" style="margin-left: 10px;">
										<i class="fa fa-user" aria-hidden="true"></i>
										<h3 class="box-title">Login Managment</h3>

									</div><!-- /.box-header -->
									<div class="box-body box box-warning">
										<div>

											<ol class="breadcrumb">
												<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
												<li class="active" style="color:#f0193f">Login Managment </li>
											</ol>
										</div>

										<div class="col-lg-3 col-xs-12" style="margin-left: 230px;">

											<!-- small box -->

											<div class="small-box bg-aqua" style="width: 277px;height: 118px; border-radius:15px;">

												<div class="inner">
													<h4><strong><a href="emplogin.php" style="color:white">Employee Login</a></strong></h4>
												</div>

												<div class="icon">

													<i class="ion ion-person-add"></i>

												</div>


											</div>

										</div>

										<!-- ./col -->

										<div class="col-lg-3 col-xs-12" style="margin-left: 23px;">

											<!-- small box -->

											<div class="small-box bg-green" style="width: 277px;height: 118px; border-radius: 15px;">

												<div class="inner">
													<h4><strong><a href="calllogin.php" style="color:white">Call Center Login</a></strong></h4>

												</div>

												<div class="icon">

													<i class="ion ion-person-add"></i>

												</div>




											</div>

										</div>



										<!-- ./col -->

									</div>



								</div>
							</div>
					</div>
			</section>
		</div>
	</div>
	<!-- /.content -->
	</div>
</body>


<!-- /.content-wrapper -->

<style>
	.breadcrumb>li+li:before {
		padding: 0 5px;
		color: #151313;
		content: ">";
	}

	.row-style {
		margin-top: -29px;
	}

	.bg-red {
		background-color: #ff6eb4 !important;
	}

	.bg-red1 {
		background-color: #ffd700;
	}

	.bg-yellow {
		background-color: #a52a2a;
	}

	.bg-yellow1 {
		background-color: #8ee5ee;
		 !important;
	}

	h4.h4-style {
		margin-left: -182px;
	}
</style>