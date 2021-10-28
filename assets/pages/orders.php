<?php
session_start();
@$ID = $_SESSION['id'];
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

    <?php include 'navigation.php'; ?>

    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM books WHERE User_ID = $ID AND Book_Status = '0'");
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
    ?>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-12">

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
                                            <h4>Book name</h4>
                             
                                            <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-column">
                                                <span class="lead fw-normal">Your order has been ......</span>
                                                <span class="lead fw-normal">stuff:</span>
                                                <span class="lead fw-normal">details:</span>
                                            </div>
                                            
                                            </div>
                                            <hr class="my-4">
                                            <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">On its way</div>
                                            </div>
                                
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start"><span>15 Mar</span><span>Order placed</span></div>
                                            <div class="d-flex flex-column justify-content-center"><span>15 Mar</span><span>Order placed</span></div>
                                            <div class="d-flex flex-column justify-content-center align-items-center"><span>15 Mar</span><span>Order Dispatched</span></div>
                                            <div class="d-flex flex-column align-items-center"><span>15 Mar</span><span>Out for delivery</span></div>
                                            <div class="d-flex flex-column align-items-end"><span>15 Mar</span><span>Delivered</span></div>
                                            </div>

                                        </div> <!-- info-main.// -->
                                    </div> <!-- col.// -->
                                    
                                </div> <!-- row.// -->
                            </article> <!-- card-product .// -->
                        </main> <!-- col.// -->


                    </div>

                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container">
            <p> There are no books that you are selling </p>
        </div>
    <?php
    }
    ?>

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