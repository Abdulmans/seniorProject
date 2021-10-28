<!DOCTYPE HTML>
<html lang="en">

<body>


    <header class="section-header">
        <section class="header-main border-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-4">
                        <div class="brand-wrap">
                            <a href="../../index.php">USED BOOKS</a> | <?php if (@$_SESSION['Admin'] == 1) { ?><a href="../DashBoard/Dashboard.php" target="_blank">Dashboard</a><?php } else {
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
                                <?php if (@$_SESSION['logged_in']) { ?><a href="editProfile.php" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a><?php } else {
                                                                                                                                                                        } ?>

                            </div>
                            <?php if (@$_SESSION['logged_in']) { ?>

                                <div class="widget-header icontext">
                                    <div class="text">
                                        <div>

                                            <div class="dropdown show">
                                                <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="icon icon-sm rounded-circle border"><i class="fa fa-bars" aria-hidden="true"></i></a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="sellBook.php">Sell Book</a>
                                                    <a class="dropdown-item" href="manageBook.php">ManageBook</a>
                                                    <a class="dropdown-item" href="orders.php">Your orders</a>
                                                    <a class="dropdown-item" href="../php/signout.php">Sign-Out</a>
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
                                            <a href="sign_in.php">Sign in</a> |
                                            <a href="sign_up.php"> Register</a>
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
                    <a class="nav-link" style="color:white" href="recentlyAdded.php">Recently Added Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="SuggestedBooks.php">Suggested Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="nearbyBooks.php">Nearby Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="trendingBooks.php">Trending Books</a>
                </li>
            </ul>
        </div>

    </header> <!-- section-header.// -->
</body>

</html>