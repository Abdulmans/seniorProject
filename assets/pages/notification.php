<?php
session_start();
require_once("../php/dbcontroller.php");
$db_handle = new DBController();
$userid = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Profile </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../DashBoard/vendors/feather/feather.css">
  <link rel="stylesheet" href="../DashBoard/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../DashBoard/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../DashBoard/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../DashBoard/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../DashBoard/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../DashBoard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../DashBoard/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../DashBoard/css/vertical-layout-light/style.css">
  <!-- endinject -->
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="editProfile.php">
            <label for="">User Profile</label>
          </a>
          <a class="navbar-brand brand-logo-mini" href="editProfile.php">
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="editProfile.php">
              <i class="mdi mdi-pencil menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Notification.php">
              <i class="mdi mdi-bell menu-icon"></i>
              <span class="menu-title">Notification</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PasswordAndSecurity.php">
              <i class="mdi mdi-security menu-icon"></i>
              <span class="menu-title">Password & Security</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <!-- Start here -->


      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Notification</h4>
                  
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tbody>
                        
                        <tr>
                        <td style="color:red;"><h5>  Your book *#name of the book#* has not been sold for 45 days  </h5></td>
                        </tr>
                        <?php
				                 $product_array = $db_handle->runQuery("SELECT * FROM purchases INNER JOIN books ON purchases.Book_ID = books.Book_ID INNER JOIN user on purchases.Seller_ID = user.User_ID WHERE Buyer_ID = '$userid'");
			                    if (!empty($product_array)) {
				                  	foreach ($product_array as $key => $value) {
			                    	?>     
                            <tr>
                            <td style="color:green;"><h5>  You have Bought <?php echo $product_array[$key]['bookName']; ?> for <?php echo $product_array[$key]['bookPrice']; ?>$ from <?php echo $product_array[$key]['First_Name']; ?> <?php echo $product_array[$key]['Last_Name']; ?> </h5></td>
                            </tr> 
                            
                            
                            <?php }} else {} ?>
                            <?php
				                 $product_array = $db_handle->runQuery("SELECT * FROM purchases INNER JOIN books ON purchases.Book_ID = books.Book_ID INNER JOIN user on purchases.Buyer_ID = user.User_ID WHERE Seller_ID = '$userid'");
			                    if (!empty($product_array)) {
				                  	foreach ($product_array as $key => $value) {
			                    	?>     
                            <tr>
                            <td style="color:green;"><h5>  You have sold <?php echo $product_array[$key]['bookName']; ?> for <?php echo $product_array[$key]['bookPrice']; ?>$ for <?php echo $product_array[$key]['First_Name']; ?> <?php echo $product_array[$key]['Last_Name']; ?> </h5></td>
                            </tr> 
                            
                            
                            <?php }} else {} ?>

                      </tbody>
                    </table>
                  </div>      


                  </form>
                </div>
              </div>
            </div>
            
        <!-- end here -->
  
  <!-- main-panel ends -->
  </div>
  
  <!-- page-body-wrapper ends -->
  </div> 
  
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../DashBoard/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../DashBoard/vendors/chart.js/Chart.min.js"></script>
  <script src="../DashBoard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../DashBoard/vendors/progressbar.js/progressbar.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../DashBoard/js/off-canvas.js"></script>
  <script src="../DashBoard/js/hoverable-collapse.js"></script>
  <script src="../DashBoard/js/template.js"></script>
  <script src="../DashBoard/js/settings.js"></script>
  <script src="../DashBoard/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../DashBoard/js/dashboard.js"></script>
  <script src="../DashBoard/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>