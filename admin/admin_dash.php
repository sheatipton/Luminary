<?php
require_once "../setup/db.connect.php";

$user_id = $mysqli->query("SELECT * FROM Users");
$user_id = $user_id->fetch_object()->user_id;
$result = $mysqli->query("SELECT * FROM Books");
$bookTotal = mysqli_num_rows($result);

$result = $mysqli->query("SELECT * FROM Users");
$userTotal = mysqli_num_rows($result);

$result = $mysqli->query("SELECT * FROM Orders");
$orderTotal = mysqli_num_rows($result);

$totalEarnings = 0;
$result = $mysqli->query("SELECT * FROM Orders");
while ($row = $result->fetch_assoc()) {
  $totalEarnings += $row['subtotal'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Luminary - Dashboard</title>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="../favicon_io\favicon.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="../favicon_io\android-chrome-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io\android-chrome-192x192.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" id="css-main" href="../assets/css/oneui.min.css">
    <!-- END Stylesheets -->
  </head>
  <body>
    <body>
      <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">

        <nav id="sidebar" aria-label="Main Navigation"  style="background-color: #5E6073;">
          <!-- Sidebar Scrolling -->
          <div class="js-sidebar-scroll" >
            <!-- Side Navigation -->
            <div class="content-side">
              <ul class="nav-main">
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../index.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-house-fill"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Luminary</span>
                  </a>
                </li>
                <hr style="height: .1rem;">
                <li class="nav-main-item">
                  <a class="nav-main-link" href="admin_dash.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-clipboard-data"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Admin Dashboard</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="orderManagement\orders.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-table"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Orders</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="memberManagement\members.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-person-bounding-box"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Members</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="bookManagement\products.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-book-fill"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Books</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- END Side Navigation -->
          </div>
          <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
          <!-- Header Content -->
          <div class="content-header">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="bi bi-list"></i>
              </button>
              <span class="d-none d-sm-inline-block ms-2">Luminary - Dashboard</span>
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="d-flex align-items-center">
              <!-- User Dropdown -->
              <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="d-none d-sm-inline-block ms-2" style="margin-right:10px;">Admin</span>
                  <i class="bi bi-person-square"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                  <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                    <p class="mt-2 mb-0 fw-medium">Admin Name</p>
                    <p class="mb-0 text-muted fs-sm fw-medium">Position</p>
                  </div>
                  <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                      <span class="fs-sm fw-medium">Profile</span>
                      <span class="badge rounded-pill bg-default-light ms-2">1</span>
                    </a>
                  </div>
                  <div role="separator" class="dropdown-divider m-0"></div>
                  <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_signin.html">
                      <span class="fs-sm fw-medium">Log Out</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- END User Dropdown -->

            </div>
            <!-- END Right Section -->
          </div>
          <!-- END Header Content -->

          <!-- Header Loader -->
          <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
          <div id="page-header-loader" class="overlay-header bg-body-extra-light">
            <div class="content-header">
              <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
              </div>
            </div>
          </div>
          <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
          <!-- Hero -->
          <div class="content">
            <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
              <div class="flex-grow-1 mb-1 mb-md-0">
                <h1 class="h3 fw-bold mb-2">
                  Dashboard
                </h1>
                <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                  Welcome <a class="fw-semibold" href="../info/profile.php">Admin</a>, everything looks great.
                </h2>
              </div>
            </div>
          </div>
          <!-- END Hero -->

          <!-- Page Content -->
          <div class="content">
            <!-- Overview -->
            <div class="row items-push">
              <div class="col-sm-6 col-xxl-4">
                <!-- Pending Orders -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold"><? echo $orderTotal ?></dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Pending Orders</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-gem fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="orderManagement/orders.php">
                      <span>View all orders</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Pending Orders -->
              </div>
              <div class="col-sm-6 col-xxl-4">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold"><? echo $userTotal ?></dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">New Customers</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-user-circle fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="memberManagement/members.php">
                      <span>View all customers</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END New Customers -->
              </div>
              <div class="col-sm-6 col-xxl-4">
                <!-- Conversion Rate -->
                <div class="block block-rounded d-flex flex-column h-100 mb-0">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                    <dl class="mb-0">
                      <dt class="fs-3 fw-bold"><? echo $bookTotal ?></dt>
                      <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Books Available</dd>
                    </dl>
                    <div class="item item-rounded-lg bg-body-light">
                      <i class="fa fa-chart-bar fs-3 text-primary"></i>
                    </div>
                  </div>
                  <div class="bg-body-light rounded-bottom">
                    <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="bookManagement\products.php">
                      <span>View all books</span>
                      <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                    </a>
                  </div>
                </div>
                <!-- END Conversion Rate-->
              </div>
            </div>
            <!-- END Overview -->

            <!-- Statistics -->

                <!-- Last 2 Weeks -->
                <!-- Chart.js Charts is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                <div class="row items-push flex-grow-1">
                  <div class="col-md-6 col-xl-12">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                      <div class="block-content flex-grow-1 d-flex justify-content-between">
                        <dl class="mb-0">
                          <dt class="fs-3 fw-bold"><? echo $orderTotal;?></dt>
                          <dd class="fs-sm fw-medium text-muted mb-0">Total Orders</dd>
                        </dl>
                        <div>
                          <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                            <i class="fa fa-caret-down me-1"></i>
                            2.2%
                          </div>
                        </div>
                      </div>
                      <div class="block-content p-1 text-center overflow-hidden">
                        <!-- Total Orders Chart Container -->
                        <canvas id="js-chartjs-new-customers" style="height: 90px;"></canvas>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-12">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                      <div class="block-content flex-grow-1 d-flex justify-content-between">
                        <dl class="mb-0">
                          <dt class="fs-3 fw-bold">$<? echo $totalEarnings;?>.00</dt>
                          <dd class="fs-sm fw-medium text-muted mb-0">Total Earnings</dd>
                        </dl>
                        <div>
                          <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                            <i class="fa fa-caret-up me-1"></i>
                            4.2%
                          </div>
                        </div>
                      </div>
                      <div class="block-content p-1 text-center overflow-hidden">
                        <!-- Total Earnings Chart Container -->
                        <canvas id="js-chartjs-total-earnings" style="height: 90px;"></canvas>
                      </div>
                    </div>
                  </div>
                <!-- END Last 2 Weeks -->
              </div>
            </div>
            <!-- END Statistics -->

          </div>
          <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

      <!-- Footer -->
      <footer id="page-footer" class="bg-body-light">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <span>Luminary</span> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <script src="../assets/js/oneui.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="../assets/js/plugins/chart.js/chart.min.js"></script>

    <!-- Page JS Code -->
    <script src="../assets/js/pages/be_pages_dashboard.min.js"></script>
  </body>
</html>
