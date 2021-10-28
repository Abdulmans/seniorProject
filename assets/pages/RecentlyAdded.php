<?php
session_start();
@$Search = $_GET['search'];
$_SESSION['search'] = $Search;
require_once("../php/dbcontroller.php");
$db_handle = new DBController();
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
	<script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>

	<!-- Bootstrap4 files-->
	<script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />

	<!-- Font awesome 5 -->
	<link href="../fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

	<!-- custom style -->
	<link href="../css/ui.css" rel="stylesheet" type="text/css" />
	<link href="../css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

	<!-- custom javascript -->
	<script src="../js/script.js" type="text/javascript"></script>

	<script type="text/javascript">
		/// some script

		// jquery ready start
		$(document).ready(function() {
			// jQuery code

		});
		// jquery end
	</script>

</head>

<body>


	<?php include 'navigation.php' ?>




	<!-- ========================= SECTION INTRO ========================= -->
	<section class="section-intro pb-0 padding-y-sm">
		<div class="container">

			<div class="intro-banner-wrap">
				<img src="../images/banners/introBanner.jpg" class="img-fluid">
			</div>

		</div> <!-- container //  -->
	</section>
	<!-- ========================= Search SECTION ========================= -->
	<section class="section-content padding-y-sm">
		<div class="container col-lg-6">
			<article class="card">
				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<form action="search.php?" class="search">
							<div class="input-group w-100">
								<input type="text" id="search" name="search" class="form-control" placeholder="Search">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
					</div> <!-- col.// -->

				</div>
			</article>

		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SEARCH SECTION END// ========================= -->



	<!-- ========================= SECTION  ========================= -->
	<section class="section-name  padding-y-sm">

		<div class="container">

			<div class="row">

				<?php
				$product_array = $db_handle->runQuery("SELECT * FROM books WHERE Book_Status = '0' ORDER BY Add_Date DESC ");
				if (!empty($product_array)) {
					foreach ($product_array as $key => $value) {
				?>
						<div class="col-md-3">
							<div href="./buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="card card-product-grid">
								<a href="./buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="img-wrap"> <img src="../images/items/<?php echo $product_array[$key]["bookCover"]; ?>"> </a>
								<figcaption class="info-wrap">
									<a href="./buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>" class="title"><?php echo $product_array[$key]["bookName"]; ?></a>
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
				} else {
					
				}
				?>
			</div> <!-- row.// -->
		</div><!-- container // -->
	</section>
	<!-- ========================= SECTION  END// ========================= -->



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