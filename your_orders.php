<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
	header('location:login.php');
} else {
?>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="#">
		<title>My Orders</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/animsition.min.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet"> <!-- favicon -->
		<link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
		<!-- fontawesome -->
		<link rel="stylesheet" href="../assets/css/all.min.css">
		<!-- bootstrap -->
		<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
		<!-- owl carousel -->
		<link rel="stylesheet" href="../assets/css/owl.carousel.css">
		<!-- magnific popup -->
		<link rel="stylesheet" href="../assets/css/magnific-popup.css">
		<!-- animate css -->
		<link rel="stylesheet" href="../assets/css/animate.css">
		<!-- mean menu css -->
		<link rel="stylesheet" href="../assets/css/meanmenu.min.css">
		<!-- main style -->
		<link rel="stylesheet" href="../assets/css/main.css">
		<!-- responsive -->
		<link rel="stylesheet" href="../assets/css/responsive.css">
		<!-- jquery -->
		<script src="../assets/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap -->
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- count down -->
		<script src="../assets/js/jquery.countdown.js"></script>
		<!-- isotope -->
		<script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
		<!-- waypoints -->
		<script src="../assets/js/waypoints.js"></script>
		<!-- owl carousel -->
		<script src="../assets/js/owl.carousel.min.js"></script>
		<!-- magnific popup -->
		<script src="../assets/js/jquery.magnific-popup.min.js"></script>
		<!-- mean menu -->
		<script src="../assets/js/jquery.meanmenu.min.js"></script>
		<!-- sticker js -->
		<script src="../assets/js/sticker.js"></script>
		<!-- main js -->
		<script src="../assets/js/main.js"></script>
		<style type="text/css" rel="stylesheet">
			.indent-small {
				margin-left: 5px;
			}

			.form-group.internal {
				margin-bottom: 0;
			}

			.dialog-panel {
				margin: 10px;
			}

			.datepicker-dropdown {
				z-index: 200 !important;
			}

			.panel-body {
				background: #e5e5e5;
				/* Old browsers */
				background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* FF3.6+ */
				background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
				/* Chrome,Safari4+ */
				background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* Chrome10+,Safari5.1+ */
				background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* Opera 12+ */
				background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
				/* IE10+ */
				background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
				/* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
				font: 600 15px "Open Sans", Arial, sans-serif;
			}

			label.control-label {
				font-weight: 600;
				color: #777;
			}

			/* 
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
			/* tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #404040; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	} */
			/* */ @media only screen and (max-width: 760px),
			(min-device-width: 768px) and (max-device-width: 1024px) {

				/* table { 
	  	width: 100%; 
	}

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	} */


				/* thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; } */

				/* td { 
		
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		
		position: absolute;
	
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	} */

			} */
		</style>

	</head>

	<body>


		<!-- header -->
		<div class="top-header-area" id="sticker">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center">
						<div class="main-menu-wrap">
							<!-- logo -->
							<div class="site-logo">
								<a href="index.php">
									<img src="../assets/img/logo.png" alt="">
								</a>
							</div>
							<!-- logo -->
							<!-- menu start -->
							<nav class="main-menu">
								<ul>
									<li class="nav-item"> <a class="nav-link active" href="index.php">HOME <span class="sr-only">(current)</span></a> </li>
									<li class="nav-item"> <a class="nav-link active" href="restaurants.php">SHOP<span class="sr-only"></span></a> </li>
									<li class="nav-item"> <a class="nav-link active" href="news.php">NEWS<span class="sr-only"></span></a> </li>
									<li class="nav-item"> <a class="nav-link active" href="restaurants.php">CONTACT<span class="sr-only"></span></a> </li>
									<?php
									if (empty($_SESSION["user_id"])) // if user is not login
									{
										echo '
									<li class="nav-item"><a href="login.php" class="nav-link active">LOGIN</a></li>
									<li class="nav-item"><a href="registration.php" class="nav-link active">REGISTER</a></li>';
									} else {
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">CART</a> </li>';
										echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">LOGOUT</a> </li>';
									}
									?>
								</ul>
							</nav>
							<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
							<div class="mobile-menu"></div>
							<!-- menu end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header -->
		<div class="page-wrapper">



			<div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
				<div class="container"> </div>

			</div>
			<div class="result-show">
				<div class="container">
					<div class="row">


					</div>
				</div>
			</div>

			<section class="restaurants-page">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
						</div>
						<div class="col-xs-12">
							<div class="bg-gray">
								<div class="row">

									<table class="table table-bordered table-hover">
										<thead style="background: #404040; color:white;">
											<tr>

												<th>Item</th>
												<th>Quantity</th>
												<th>Price</th>
												<th>Status</th>
												<th>Date</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>


											<?php

											$query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
											if (!mysqli_num_rows($query_res) > 0) {
												echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
											} else {

												while ($row = mysqli_fetch_array($query_res)) {

											?>
													<tr>
														<td data-column="Item"> <?php echo $row['title']; ?></td>
														<td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														<td data-column="price">$<?php echo $row['price']; ?></td>
														<td data-column="status">
															<?php
															$status = $row['status'];
															if ($status == "" or $status == "NULL") {
															?>
																<button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button>
															<?php
															}
															if ($status == "in process") { ?>
																<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button>
															<?php
															}
															if ($status == "closed") {
															?>
																<button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>
															<?php
															}
															?>
															<?php
															if ($status == "rejected") {
															?>
																<button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
															<?php
															}
															?>






														</td>
														<td data-column="Date"> <?php echo $row['date']; ?></td>
														<td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
														</td>

													</tr>


											<?php }
											} ?>




										</tbody>
									</table>



								</div>

							</div>



						</div>



					</div>
				</div>
		</div>
		</section>


		<footer class="footer">
			<div class="row bottom-footer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-3 payment-options color-gray">
							<h5>Payment Options</h5>
							<ul>
								<li>
									<a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
								</li>
								<li>
									<a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
								</li>
								<li>
									<a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
								</li>
								<li>
									<a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
								</li>
								<li>
									<a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
								</li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-4 address color-gray">
							<h5>Address</h5>
							<p>1086 Stockert Hollow Road, Seattle</p>
							<h5>Phone: 75696969855</a></h5>
						</div>
						<div class="col-xs-12 col-sm-5 additional-info color-gray">
							<h5>Addition informations</h5>
							<p>Join thousands of other restaurants who benefit from having partnered with us.</p>
						</div>
					</div>
				</div>
			</div>

			</div>
		</footer>

		</div>


		<script src="js/jquery.min.js"></script>
		<script src="js/tether.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/animsition.min.js"></script>
		<script src="js/bootstrap-slider.min.js"></script>
		<script src="js/jquery.isotope.min.js"></script>
		<script src="js/headroom.js"></script>
		<script src="js/foodpicky.min.js"></script>
	</body>

</html>
<?php
}
?>