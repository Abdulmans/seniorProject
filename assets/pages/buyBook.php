<?php
session_start();
@$ID = $_SESSION['id'];
$bookID = $_GET['Book_ID'];
$_SESSION['Book_ID'] = $bookID;
$userID = $_GET['userID'];
$_SESSION['userID'] = $userID;
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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevo">


    <!-- jQuery -->
    <script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>



    <!-- Font awesome 5 -->
    <link href="../fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

    <!-- custom style -->
    <link href="../css/ui.css" rel="stylesheet" type="text/css" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    <!-- Bootstrap4 files-->
    <script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />

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


    <?php include 'navigation.php'; ?>

    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM books WHERE Book_ID = $bookID");
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
    ?>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-8">

                        <main class="col-md-12">
                            <article class="card card-product-list">
                                <div class="row no-gutters">
                                    <aside class="col-md-3">
                                        <a href="#" class="img-wrap">
                                            <img src="../images/items/<?php echo $product_array[$key]["bookCover"]; ?>">
                                        </a>
                                    </aside> <!-- col.// -->
                                    <div class="col-md-8">
                                        <div class="info-main">
                                            <a href="#" class="h5 title"> <?php echo $product_array[$key]["bookName"]; ?> </a>

                                            <p><?php echo $product_array[$key]["bookDescription"]; ?> </p>

                                        </div> <!-- info-main.// -->
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                            </article> <!-- card-product .// -->
                        </main> <!-- col.// -->
                        <?php
                        $product_array2 = $db_handle->runQuery("SELECT * FROM user WHERE User_ID = $userID");
                        if (!empty($product_array2)) {
                            foreach ($product_array2 as $key => $value) {
                        ?>
                                <main class="col-md-12">
                                    <article class="card card-product-list">
                                        <div class="row no-gutters">

                                            <aside class="col-md-3">
                                                <a href="#" class="img-wrap">
                                                    <img src="../images/avatars/<?php echo $product_array2[$key]["profilePicture"]?>">
                                                </a>
                                            </aside>
                                            <div class="col-md-6">
                                                <div class="info-main">
                                                    <a href="#" class="h5 title"> Seller Information: </a>


                                                    <p id="name"> <?php echo $product_array2[$key]["First_Name"]; ?> <?php echo $product_array2[$key]["Last_Name"]; ?> </p>
                                                    <p id="Location"> <?php echo $product_array2[$key]["City"]; ?> </p>
                                                    <p id="phone">+966<?php echo $product_array2[$key]["Phone"]; ?> </p>
                                                    <br>
                                                    <br>
                                                    <a href="#" class="btn btn-primary"> Contact Seller </a>

                                                </div> <!-- info-main.// -->
                                            </div> <!-- col.// -->
                                        <?php
                                    }
                                } else {
                                        ?>
                                        <div class="container">
                                            <p> There is no seller </p>
                                        </div>
                                    <?php
                                }
                                    ?>

                                        </div> <!-- row.// -->
                                    </article> <!-- card-product .// -->
                                </main> <!-- col.// -->
                                <hr>
                                <div class="col-md-12">
                                    <h3 class="pull-left">Comments</h3>
                                    <?php
                                    $product_array3 = $db_handle->runQuery("SELECT * FROM comments WHERE Book_ID = $bookID");
                                    if (!empty($product_array3)) {
                                        foreach ($product_array3 as $key2 => $value) {
                                            $UC = $product_array3[$key2]["User_ID"];
                                    ?>

                                            <div class="media g-mb-30 media-comment">
                                                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                                                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                                    <div class="g-mb-15">
                                                        <?php
                                                        if ($UC == 0) { ?> <h5 class="h5 g-color-gray-dark-v1 mb-0">Anonymous</h5>
                                                        <?php } else { ?>
                                                            <?php
                                                            $product_array4 = $db_handle->runQuery("SELECT * FROM user WHERE User_ID = $UC");
                                                            if (!empty($product_array4)) {
                                                                foreach ($product_array4 as $key3 => $value) {
                                                            ?>
                                                                    <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php echo $product_array4[$key3]["First_Name"]; ?> <?php echo $product_array4[$key3]["Last_Name"]; ?></h5>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <p></p>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>

                                                    <p><?php echo $product_array3[$key2]["Comment"]; ?></p>


                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <p> There are no comments</p>
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <form action="../php/addcomment.php" method="post">
                                        <fieldset>
                                            <div class="media g-mb-30 media-comment">


                                                <div class="form-item col-md-9">
                                                    <textarea class="form-control" id="comment" name="comment" placeholder="Your comment" required="" row="3"></textarea>
                                                </div>
                                                <div class="form-item col-md-3">
                                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                    </div>
                    <br>
                    <div class="col-lg-4">
                        <main class="col-md-12">
                            <article class="card card-product-list">
                                <div class="row no-gutters">
                                    <aside class="col-sm-12">
                                        <div class="info-aside">
                                            <div class="price-wrap">
                                                <span class="price h5"> Price: </span>
                                                <span class="price h5"> <?php echo "$" . $product_array[$key]["bookPrice"]; ?> </span> <br>
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
                                            </div> <!-- info-price-detail // -->
                                            <br>

                                            <br>
                                            <br>
                                            <button id="addToCart" class="btn btn-outline-warning">Add to cart</button>
                                            <button onclick="location.href = 'creditCard.php?Book_ID=<?php echo $bookID ?>'" id="buyNow" class="btn btn-warning">Buy now</button>


                                        </div> <!-- info-aside.// -->
                                    </aside> <!-- col.// -->
                                </div>
                            </article>
                        </main>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <p> There are no books that you are selling </p>
    <?php
    }
    ?>
    <br>


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