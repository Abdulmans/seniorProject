<?php
session_start();
if (!@$_SESSION['logged_in']) {
	$_SESSION['City'] = 'Riyadh';
} else {
}
require_once("assets/php/dbcontroller.php");
$City = @$_SESSION['City'];
$db_handle = new DBController();
$i = 4;
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="max-age=604800" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>USED BOOKS</title>


	<!-- jQuery -->
	<script src="assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>

	<!-- Bootstrap4 files-->
	<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Font awesome 5 -->
	<link href="assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

	<!-- custom style -->
	<link href="assets/css/ui.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

	<!-- custom javascript -->
	<script src="assets/js/script.js" type="text/javascript"></script>

	<script type="text/javascript">
		/// some script

		// jquery ready start
		$(document).ready(function() {
			// jQuery code
				$("#advanceSearch").on('click', function (e){
					$("#searchButton").toggle();
				});
		});
		// jquery end
	</script>

</head>

<body>


	<header class="section-header">
		<section class="header-main border-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4 col-4">
						<div class="brand-wrap">
							<a href="index.php">USED BOOKS</a> | <?php if (@$_SESSION['Admin'] == 1) { ?><a href="assets/DashBoard/Dashboard.php" target="_blank">Dashboard</a><?php } else {
																																											} ?>
						</div> <!-- brand-wrap.// -->
					</div>

					<div class="col-lg-4 col-sm-12 order-3 order-lg-2">
						<!-- empty div to maintain the header -->
					</div> <!-- col.// -->
					<div class="col-lg-4 col-sm-6 col-8 order-2 order-lg-3">
						<div class="float-md-right">
							<div class="widget-header  mr-3">
							</div>
							<div class="widget-header  mr-3">
								<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
								<span class="badge badge-pill badge-danger notify">0</span>
							</div>
							<div class="widget-header  mr-3">
								<?php if (@$_SESSION['logged_in']) { ?><a href="assets/pages/editProfile.php" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a><?php } else {
																																										} ?>
							</div>
							<?php if (@$_SESSION['logged_in']) { ?>

								<div class="widget-header icontext">
									<div class="text">
										<div>

											<div class="dropdown show">
												<a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="icon icon-sm rounded-circle border"><i class="fa fa-bars" aria-hidden="true"></i></a>

												<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
													<a class="dropdown-item" href="assets/pages/sellBook.php">Sell Book</a>
													<a class="dropdown-item" href="assets/pages/manageBook.php">Manage Book</a>
													<a class="dropdown-item" href="assets/pages/orders.php">Your orders</a>
													<a class="dropdown-item" href="assets/php/signout.php">Sign-Out</a>
												</div>
											</div>

										</div>
									</div>
								</div>
							<?php } else { ?>
								<div class="widget-header icontext">
									<div class="text">
										<span class="text-muted">Welcome!</span>
										<div>
											<a href="assets/pages/sign_in.php">Sign in</a> |
											<a href="assets/pages/sign_up.php"> Register</a>
										</div>
									</div>
								</div>
							<?php } ?>
						</div> <!-- widgets-wrap.// -->
					</div> <!-- col.// -->
				</div> <!-- row.// -->


			</div> <!-- container.// -->
		</section> <!-- header-main .// -->

		<div class="row justify-content-center" style="background-color: rgb(55, 92, 253);">
			<ul class="nav navbar navbar-expand-lg">
				<li class="nav-item">
					<a class="nav-link" style="color:white" href="assets/pages/RecentlyAdded.php">Recently Added Books</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:white" href="assets/pages/SuggestedBooks.php">Suggested Books</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:white" href="assets/pages/nearbyBooks.php">Nearby Books</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:white" href="assets/php/trendingBooks.php">Trending Books</a>
				</li>
			</ul>
		</div>
	</header> <!-- section-header.// -->




	<!-- ========================= SECTION INTRO ========================= -->
	<section class="section-intro pb-0 padding-y-sm">
		<div class="container">

			<div class="intro-banner-wrap">
				<img src="./assets/images/banners/introBanner.jpg" class="img-fluid">
			</div>

		</div> <!-- container //  -->
	</section>
	<!-- ========================= SECTION INTRO END// ========================= -->



	<!-- ========================= Search SECTION ========================= -->
	<section class="section-content padding-y-sm">
		<div class="container col-lg-6">
			<article class="card">
				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<form action="assets/pages/search.php?" class="search">
							<div class="input-group w-100">
								<input type="text" id="search" name="search" class="form-control" placeholder="Search">
								<div class="input-group-append">
									<button id="advanceSearch" class="btn btn-primary" data-toggle="collapse" data-target="#advanceSearchDiv" type="button">
										Advance Search
									</button>
									<button id="searchButton" class="btn btn-primary" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						
					</div> <!-- col.// -->
				</div>
				<div id="advanceSearchDiv" class="col-lg-12 collapse" style="padding: 10px;">
					
						<div class="form-row col-md-12 col-lg-12">
							<div class="form-group col-md-2">
								<label for="from">City</label>
								<select name="city" id="city" class="form-control">
								<option value="">Any</option>
                                    <option value="Riyadh">Riyadh</option>
                                    <option value="Jeddah">Jeddah</option>
                                    <option value="Qassim">Qassim</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="from">Genre</label>
                                <select name="genre" id="genre" class="form-control">
                                    <option value="">Any</option>
                                    <option value="Novel">Novel</option>
                                    <option value="Science">Science</option>
                                    <option value="History">History</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="from">Condition</label>
                                <select name="condition" id="condition" class="form-control">
                                    <option value="">Any</option>
                                    <option value="Very Good">Very Good</option>
                                    <option value="Good">Good</option>
                                    <option value="Bad">Bad</option>
                                    <option value="Damaged">Damaged</option>
								</select>
							</div>
							<div class="col-md-3 form-group">
								<label for="from">From</label>
								<input class="form-control" type="number" name="minPrice" id="minPrice" value="0" placeholder="Minimum Price">
							</div>
							<div class="col-md-3 form-group">
								<label for="to">To</label>
								<input class="form-control" type="number" name="maxPrice" id="maxPrice"  placeholder="Maximum Price">
							</div>
						</div>
						<div id="advanceSearchDiv" class="from-grop collapse text-right" style="padding-right: 10px; padding-bottom: 10px;">
							<button class="btn btn-primary" type="submit">Search <i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
			</article>
		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SEARCH SECTION END// ========================= -->
	<hr>
	<!-- =========================  CAROUSEL SECTION ========================= -->
	<div class="container" style="margin: auto;">
		<h2 style="text-align: center;">Recently Added Books</h2>
		<div class="row blog" style="margin-bottom: 50px;">
			<div class="col-md-12">
				<div id="blogCarousel1" class="carousel slide" data-ride="carousel">

					<ol class="carousel-indicators" style="bottom: -50px; background-color:lightblue">
						<li data-target="#blogCarousel1" data-slide-to="0" class="active"></li>
						<li data-target="#blogCarousel1" data-slide-to="1"></li>
					</ol>

					<!-- Carousel items -->
					<div class="carousel-inner" style="margin-top: 20px;">

						<div class="carousel-item active">
							<div class="row">
								<?php
								$product_array = $db_handle->runQuery("SELECT * FROM books WHERE Book_Status = '0' ORDER BY Add_Date DESC ");
								if (!empty($product_array)) {
									$i = 4;
									foreach ($product_array as $key => $value) {
										if ($i > 0) {
											$i--;
								?>
											<div class="col-md-3">
												<div href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="card card-product-grid">
													<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="img-wrap"> <img src="assets/images/items/<?php echo $product_array[$key]["bookCover"]; ?>"> </a>
													<figcaption class="info-wrap">
														<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="title"><?php echo $product_array[$key]["bookName"]; ?></a>
														<div class="row">
															<div class="col-6">
																<div class="price mt-1"><?php echo "$" . $product_array[$key]["bookPrice"]; ?></div> <!-- price-wrap.// -->
															</div>
															<div class="col-6">
																<div class="rating-wrap">
																	<span class="price h5"> condition: </span>
																	<span class="price h5 
                                    <?php
											$x = $product_array[$key]["bookCondition"];
											if ($x == 'Very Good') {
												echo "text-success";
											} else if ($x == 'Good') {
												echo "text-info";
											} else if ($x == 'Bad') {
												echo "text-warning";
											} else if ($x == 'Damaged') {
												echo "text-danger";
											}
									?>"> <?php echo $product_array[$key]["bookCondition"]; ?> </span>
																</div>

															</div>
														</div>

													</figcaption>
												</div>
											</div> <!-- col.// -->
									<?php
										} else {
										}
									}
								} else {
									?>

								<?php
								}


								?>
							</div>
							<!--.row-->
						</div>
						<!--.item-->

						<div class="carousel-item">
							<div class="row">
								<?php
								$product_array = $db_handle->runQuery("SELECT * FROM books WHERE Book_Status = '0' ORDER BY Add_Date DESC ");
								if (!empty($product_array)) {
									$i = 8;
									foreach ($product_array as $key => $value) {
										if ($i > 4) {
											$i--;
										} else if ($i > 0) {
											$i--;
								?>
											<div class="col-md-3">
												<div href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="card card-product-grid">
													<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="img-wrap"> <img src="assets/images/items/<?php echo $product_array[$key]["bookCover"]; ?>"> </a>
													<figcaption class="info-wrap">
														<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="title"><?php echo $product_array[$key]["bookName"]; ?></a>
														<div class="row">
															<div class="col-6">
																<div class="price mt-1"><?php echo "$" . $product_array[$key]["bookPrice"]; ?></div> <!-- price-wrap.// -->
															</div>
															<div class="col-6">
																<div class="rating-wrap">
																	<span class="price h5"> condition: </span>
																	<span class="price h5 
                                    <?php
											$x = $product_array[$key]["bookCondition"];
											if ($x == 'Very Good') {
												echo "text-success";
											} else if ($x == 'Good') {
												echo "text-info";
											} else if ($x == 'Bad') {
												echo "text-warning";
											} else if ($x == 'Damaged') {
												echo "text-danger";
											}
									?>"> <?php echo $product_array[$key]["bookCondition"]; ?> </span>
																</div>

															</div>
														</div>

													</figcaption>
												</div>
											</div> <!-- col.// -->
									<?php
										}
									}
								} else {
									?>

								<?php
								}

								?>
							</div>
							<!--.row-->
						</div>
						<!--.item-->

					</div>
					<!--.carousel-inner-->
				</div>
				<!--.Carousel-->

				<div class="row" style="justify-content: right; margin-top:10px; margin-right: 1px;">
					<form method="get" action="assets/pages/RecentlyAdded.php">
						<button type="submit" class="btn btn-outline-primary">Load more</button>
					</form>
				</div>
			</div>
		</div>

		<hr>

		<h2 style="text-align: center;">Nearby Books</h2>
		<div class="row blog" style="margin-bottom: 50px;">
			<div class="col-md-12">
				<div id="blogCarousel2" class="carousel slide" data-ride="carousel">

					<ol class="carousel-indicators" style="bottom: -50px; background-color:lightblue">
						<li data-target="#blogCarousel2" data-slide-to="0" class="active"></li>
						<li data-target="#blogCarousel2" data-slide-to="1"></li>
					</ol>

					<!-- Carousel items -->
					<div class="carousel-inner" style="margin-top: 20px;">

						<div class="carousel-item active">
							<div class="row">
								<?php
								

										$product_array = $db_handle->runQuery("SELECT * FROM books INNER JOIN user On books.User_ID = user.User_ID WHERE city = '$City' AND Book_Status = '0' ");
										if (!empty($product_array)) {
											$i = 4;
											foreach ($product_array as $key => $value) {
												if ($i > 0) {
													$i--;
								?>
													<div class="col-md-3">
														<div href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="card card-product-grid">
															<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="img-wrap"> <img src="assets/images/items/<?php echo $product_array[$key]["bookCover"]; ?>"> </a>
															<figcaption class="info-wrap">
																<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="title"><?php echo $product_array[$key]["bookName"]; ?></a>
																<div class="row">
																	<div class="col-6">
																		<div class="price mt-1"><?php echo "$" . $product_array[$key]["bookPrice"]; ?></div> <!-- price-wrap.// -->
																	</div>
																	<div class="col-6">
																		<div class="rating-wrap">
																			<span class="price h5"> condition: </span>
																			<span class="price h5 
                                    <?php
													$x = $product_array[$key]["bookCondition"];
													if ($x == 'Very Good') {
														echo "text-success";
													} else if ($x == 'Good') {
														echo "text-info";
													} else if ($x == 'Bad') {
														echo "text-warning";
													} else if ($x == 'Damaged') {
														echo "text-danger";
													}
									?>"> <?php echo $product_array[$key]["bookCondition"]; ?> </span>
																		</div>

																	</div>
																</div>

															</figcaption>
														</div>
													</div> <!-- col.// -->
											<?php
												} else {
												}
											}
										} else {
											?>

								<?php
										}
								
								?>
							</div>
							<!--.row-->
						</div>
						<!--.item-->

						<div class="carousel-item">
							<div class="row">
								<?php
								$product_array = $db_handle->runQuery("SELECT * FROM books INNER JOIN user On books.User_ID = user.User_ID WHERE city = '$City' AND Book_Status = '0' ");
										if (!empty($product_array)) {
											$i = 8;
											foreach ($product_array as $key => $value) {
												if ($i > 4) {
													$i--;
												} else if ($i > 0) {
													$i--;
								?>
													<div class="col-md-3">
														<div href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="card card-product-grid">
															<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="img-wrap"> <img src="assets/images/items/<?php echo $product_array[$key]["bookCover"]; ?>"> </a>
															<figcaption class="info-wrap">
																<a href="assets/pages/buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="title"><?php echo $product_array[$key]["bookName"]; ?></a>
																<div class="row">
																	<div class="col-6">
																		<div class="price mt-1"><?php echo "$" . $product_array[$key]["bookPrice"]; ?></div> <!-- price-wrap.// -->
																	</div>
																	<div class="col-6">
																		<div class="rating-wrap">
																			<span class="price h5"> condition: </span>
																			<span class="price h5 
                                    <?php
													$x = $product_array[$key]["bookCondition"];
													if ($x == 'Very Good') {
														echo "text-success";
													} else if ($x == 'Good') {
														echo "text-info";
													} else if ($x == 'Bad') {
														echo "text-warning";
													} else if ($x == 'Damaged') {
														echo "text-danger";
													}
									?>"> <?php echo $product_array[$key]["bookCondition"]; ?> </span>
																		</div>

																	</div>
																</div>

															</figcaption>
														</div>
													</div> <!-- col.// -->
											<?php
												}
											}
										} else {
											?>

								<?php
										}
									
								?>
							</div>
							<!--.row-->
						</div>
						<!--.item-->
					</div>
					<!--.carousel-inner-->
				</div>
				<!--.Carousel-->

				<div class="row" style="justify-content: right; margin-top:10px;  margin-right: 1px;">
					<form method="get" action="assets/pages/nearbyBooks.php">
						<button type="submit" class="btn btn-outline-primary">Load more</button>
					</form>
				</div>
			</div>
		</div>
	</div>




	<!-- ========================= FOOTER ========================= -->
	<footer class="section-footer border-top padding-y">
		<div class="container">
			<p class="float-md-right">
				&copy Copyright 2021 All rights reserved
			</p>
			<p class="float-md-left">
				Contact number: 0509358368
			</p>
		</div><!-- //container -->
	</footer>
	<!-- ========================= FOOTER END // ========================= -->



</body>

</html>