<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>News</title>

	<!-- favicon -->
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

</head>

<body>
	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->
	<?php
	$id_news = "active";
	include('./layouts/sidebar.php');
	?>
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Organic Information</p>
						<h1>News Article</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
				<?php
				$conn = mysqli_connect("localhost", "root", "", "test");
				mysqli_set_charset($conn, "utf8");
				$sql = "SELECT * FROM news";
				$result = mysqli_query($conn, $sql);
				$product = [];
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$product[] = $row;
					}
				}
				// Số lượng sản phẩm mỗi trang
				$per_page = 9;

				// Tổng số trang
				$total_pages = ceil(count($product) / $per_page);

				// Trang hiện tại
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

				// Vị trí bắt đầu lấy sản phẩm của trang hiện tại
				$start = ($current_page - 1) * $per_page;

				// Danh sách sản phẩm của trang hiện tại
				$current_products = array_slice($product, $start, $per_page);

				// Hiển thị danh sách sản phẩm của trang hiện tại
				$counter = 0; // đếm số sản phẩm đã hiển thị
				foreach ($current_products as $item) {
					if ($counter % 3 == 0) { // nếu đã hiển thị đủ 3 sản phẩm trên 1 dòng thì tạo 1 dòng mới
						echo '<div class="row">';
					}
				?>
					<div class="col-lg-4 col-md-6">
						<div class="single-latest-news">
							<a href="single-news.php?id=<?php echo $item['id']; ?>">
								<div class="">
									<a href="single-product.html"><img style="width:345px; height:216px;" src=<?php echo $item['image']; ?> alt=""></a>
								</div>
							</a>
							<div class="news-text-box">
								<h3><a href="single-news.php?id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></h3>
								<p class="blog-meta">
									<span class="author"><i class="fas fa-user"></i> <?php echo $item['author']; ?></span>
									<span class="date"><i class="fas fa-calendar"></i> <?php echo $item['date']; ?></span>
								</p>
								<p class="excerpt"><?php echo $item['excerpt']; ?></p>
								<a href="single-news.php?id=<?php echo $item['id']; ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
							</div>
						</div>
					</div>
				<?php
					$counter++; // tăng số sản phẩm đã hiển thị
					if ($counter % 3 == 0 || $counter == count($current_products)) { // nếu đã hiển thị đủ 3 sản phẩm trên 1 dòng hoặc là sản phẩm cuối cùng thì kết thúc dòng
						echo '</div>';
					}
				}
				// Hiển thị phân trang
				echo '<div class="row">';
				echo '<div class="col-lg-12 text-center">';
				echo '<div class="pagination-wrap">';
				echo '<ul>';
				for ($i = 1; $i <= $total_pages; $i++) {
					if ($i == $current_page) {
						echo '<li class="active"><a href="?page=' . $i . '">' . $i . '</a></li>';
					} else {
						echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
					}
				}
				echo '</ul>';
				echo '</div>';
				echo '</div>';
				echo '</div>';

				mysqli_close($conn);
				?>
			</div>
			<style>
				.pagination-wrap ul li.active a {
					background-color: #007bff;
					color: #fff;
				}
			</style>
		</div>
	</div>
	<!-- end latest news -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<?php
	include('./layouts/footer.php');
	?>

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

</body>

</html>