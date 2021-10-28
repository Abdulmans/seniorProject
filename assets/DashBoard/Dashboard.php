<?php
session_start();
require_once("../php/dbcontroller.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
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
          <a class="navbar-brand brand-logo" href="Dashboard.php">
            <label for="">Dashboard</label>
          </a>
          <a class="navbar-brand brand-logo-mini" href="Dashboard.php">
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
            <a class="nav-link" href="Dashboard.php">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">User List</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <!-- Start here -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users list</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            ID
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $user_array = $db_handle->runQuery("SELECT * FROM user WHERE User_Type != '1'");
                        if (!empty($user_array)) {
                          foreach ($user_array as $key => $value) {
                        ?>
                            <tr>
                              <td class="py-1">
                                <?php echo $user_array[$key]["First_Name"];
                                echo " ";
                                echo $user_array[$key]["Last_Name"] ?>
                              </td>
                              <td>
                              <?php echo $user_array[$key]["Email"]
                                ?>
                              </td>
                              <td>
                              <?php echo $user_array[$key]["User_ID"]
                                ?>
                              </td>
                              <td>
                                <?php if ($user_array[$key]["User_Type"] == 4) { ?>
                                  <label class="badge badge-danger">Blocked</label>
                                  <?php
                                }else {
                                ?>
                                  <label class="badge badge-success">Active</label>
                                  <?php } ?>
                              </td>
                              <td>
                              <?php if ($user_array[$key]["User_Type"] == 4) { ?>
                                <a type="button"  href = "../php/UnblockUser.php?UserID=<?php echo $user_array[$key]["User_ID"];?>" class="btn btn-success btn-md btn-rounded btn-fw ">Unblock</a>                            <?php
                                }else {
                                ?>
                                  <a type="button" href = "../php/BlockUser.php?UserID=<?php echo $user_array[$key]["User_ID"];?>"  class="btn btn-danger btn-rounded btn-fw ">Block</a>
                                  <?php } ?>
                              </td>
                            </tr>
                            </tr>
                          <?php
                          }
                        } else {
                          ?>
                          <p> Somthings Wrong.. </p>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
 
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>