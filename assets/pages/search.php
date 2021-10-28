<?php
session_start();
@$Search = $_GET['search'];
@$city2 = $_GET['city'];
@$genre = $_GET['genre'];
@$condition = $_GET['condition'];
@$minPrice = $_GET['minPrice'];
@$maxPrice = $_GET['maxPrice'];
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

		$("#advanceSearch").on('click', function (e){
				$("#searchButton").toggle();
			});
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
                                    <button id="advanceSearch" class="btn btn-primary" data-toggle="collapse"
                                        data-target="#advanceSearchDiv" type="button">
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
                                <input class="form-control" type="number" name="minPrice" id="minPrice"
                                    placeholder="Minimum Price">
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="to">To</label>
                                <input class="form-control" type="number" name="maxPrice" id="maxPrice"
                                    placeholder="Maximum Price">
                            </div>
                        </div>
                		<div id="advanceSearchDiv" class="from-grop collapse text-right"
                    		style="padding-right: 10px; padding-bottom: 10px;">
                    		<button class="btn btn-primary" type="submit">Search <i class="fa fa-search"></i></button>
                		</div>
                	</form>
        		</div>
        	</article>
            
			<div class="row text-center" style="padding-top: 10px;">
            <?php if($city2!='') {?>
				<div class="col">
					<label class="h6" for="City">City: </label>
					<label for="City"><?php echo $city2 ?> </label>
				</div>
              <?php } else{} 
              if($genre!=''){ ?>  
				<div class="col">
					<label class="h6" for="Genre">Genre: </label>
					<label for="genre"><?php echo $genre ?> </label>
				</div>
                <?php } else{} 
              if($condition!=''){ ?>
				<div class="col">
					<label class="h6" for="Condition">Condition: </label>
					<label for="condition"><?php echo $condition ?> </label>
				</div>
                <?php } else{} 
              if($minPrice!=0){ ?>
				<div class="col">
					<label class="h6" for="Price">Minimum Price: </label>
					<label for="minPrice"><?php echo $minPrice ?> </label>
				</div>
                <?php } else{$minPrice=0;} 
              if($maxPrice!=0){ ?>
				<div class="col">
					<label class="h6" for="Price">Max Price: </label>
					<label for="maxPrice"><?php echo $maxPrice ?> </label>
				</div>
                <?php }else{$maxPrice=1000000;}?>
                

                
			</div>
        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SEARCH SECTION END// ========================= -->


    <!-- ========================= SECTION  ========================= -->
    <section class="section-name  padding-y-sm">

        <div class="container">

            <div class="row">

                <?php
                $product_array2 = $db_handle->runQuery("SELECT User_ID FROM user WHERE City LIKE '%$city2%'");
                if(!empty($product_array2)) {
                    foreach($product_array2 as $key2=>$value){
                        $usd = $product_array2[$key2]["User_ID"];

				$product_array = $db_handle->runQuery("SELECT * FROM books WHERE bookName LIKE '%$Search%' AND bookPrice >= $minPrice AND bookPrice <= $maxPrice AND bookCondition LIKE '%$condition%' AND User_ID = '$usd' AND Book_Status = '0'");
				if (!empty($product_array)) {
					foreach ($product_array as $key => $value) {
				?>
                <div class="col-md-3">
                    <div href="./buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>"
                        class="card card-product-grid">
                        <a href="./buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>"
                            class="img-wrap"> <img
                                src="../images/items/<?php echo $product_array[$key]["bookCover"]; ?>"> </a>
                        <figcaption class="info-wrap">
                            <a href="./buybook.php?Book_ID=<?php echo $product_array[$key]["Book_ID"]; ?>&userID=<?php echo $product_array[$key]["User_ID"]; ?>"
                                class="title"><?php echo $product_array[$key]["bookName"]; ?></a>
                            <div class="row">
                                <div class="col-6">
                                    <div class="price mt-1"><?php echo "$" . $product_array[$key]["bookPrice"]; ?></div>
                                    <!-- price-wrap.// -->
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
				}}} else {
					?>
                <p> The book you're looking for does not exist </p>
                <?php
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