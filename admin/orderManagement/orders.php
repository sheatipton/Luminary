<?php
require_once "../../setup/db.connect.php";

$user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$user_id = $user_id->fetch_object()->user_id;
$sql = "SELECT * FROM Orders";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Luminary - Orders Management</title>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="../../favicon_io\favicon.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="../../favicon_io\android-chrome-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../favicon_io\android-chrome-192x192.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" id="css-main" href="../../assets/css/oneui.min.css">
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
                  <a class="nav-main-link" href="../../index.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-house-fill"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Luminary</span>
                  </a>
                </li>
                <hr style="height: .1rem;">
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../admin_dash.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-clipboard-data"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Admin Dashboard</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../orderManagement\order.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-table"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Orders</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../memberManagement\members.php"  style=" color: #F9F8EB;">
                    <i class="bi bi-person-bounding-box"></i>
                    <span class="nav-main-link-name" style="margin-left: 10px;">Members</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../bookManagement\products.php"  style=" color: #F9F8EB;">
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
              <span class="d-none d-sm-inline-block ms-2">Luminary - All Orders</span>
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
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../info/profile.php">
                      <span class="fs-sm fw-medium">Profile</span>
                      <span class="badge rounded-pill bg-default-light ms-2">1</span>
                    </a>
                  </div>
                  <div role="separator" class="dropdown-divider m-0"></div>
                  <div class="p-2">
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../login/logout.php">
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
          <!-- Page Content -->
          <div class="content">
            <!-- Quick Overview -->
            <div class="row">
              <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                  <div class="block-content block-content-full">
                    <div class="fs-2 fw-semibold text-primary">0</div>
                  </div>
                  <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-muted mb-0">
                      Pending
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                  <div class="block-content block-content-full">
                    <div class="fs-2 fw-semibold text-dark"><? echo $rows - 20; ?></div>
                  </div>
                  <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-muted mb-0">
                      Today
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                  <div class="block-content block-content-full">
                    <div class="fs-2 fw-semibold text-dark"><? echo $rows; ?></div>
                  </div>
                  <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-muted mb-0">
                      All Time
                    </p>
                  </div>
                </a>
              </div>
            </div>
            <!-- END Quick Overview -->

            <!-- All Orders -->
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">All Orders</h3>
                <div class="block-options">
                  <div class="dropdown">
                    <button type="button" class="btn-block-option" id="dropdown-ecom-filters" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Filters <i class="fa fa-angle-down ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                      <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Pending..
                        <span class="badge bg-black-50 rounded-pill">35</span>
                      </a>
                      <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Processing
                        <span class="badge bg-warning rounded-pill">15</span>
                      </a>
                      <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        For Delivery
                        <span class="badge bg-info rounded-pill">20</span>
                      </a>
                      <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Canceled
                        <span class="badge bg-danger rounded-pill">72</span>
                      </a>
                      <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        Delivered
                        <span class="badge bg-success rounded-pill">890</span>
                      </a>
                      <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                        All
                        <span class="badge bg-primary rounded-pill">997</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="block-content">

              <!-- All Orders Table -->
              <div class="table-responsive">
                  <table class="table table-borderless table-striped table-vcenter">
                    <thead>
                      <tr>
                        <th class="text-center" style="width: 200px;">Confirm #</th>
                        <th class="d-none d-sm-table-cell text-center" style="width: 250px;">Order Date</th>
                        <th style="width: 250px;">Order Status</th>
                        <th class="d-none d-xl-table-cell text-center">Customer ID</th>
                        <th class="d-none d-sm-table-cell text-end" style="width: 200px;">Value</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>

              <?php
                  $i = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $order_id[$i] = $row['order_id'];
                    $user_id[$i] = $row['user_id'];
                    $confirmation_number[$i] = $row['confirmation_number'];
                    $order_date[$i] = $row['order_date'];
                    $subtotal[$i] = $row['subtotal'];
                    $i++;
                  }

                  for ($i = 1; $i <= count($subtotal); $i++) {
                    echo "
                    <tbody>
                      <tr>
                        <td class='text-center fs-sm'>
                          <a class='fw-semibold' href='order.php?d=" . $order_id[$i] . "'>
                            <strong>" . $confirmation_number[$i] . "</strong>
                          </a>
                        </td>
                        <td class='d-none d-sm-table-cell text-center fs-sm'>" . $order_date[$i] . "</td>
                        <td>
                        <span class='badge bg-success'>Order Completed</span>
                        </td>
                        <td style='text-align:center' class='d-none d-xl-table-cell fs-sm'>
                          <a class='fw-semibold' href='javascript:void(0)'>" . $user_id[$i] . "</a>
                        </td>
                        <td class='d-none d-sm-table-cell text-end fs-sm'>
                          <strong>$" . $subtotal[$i] . ".00</strong>
                        </td>
                        <td class='text-center'>
                          <a class='btn btn-sm btn-alt-secondary' href='order.php?d=" . $order_id[$i] . "' data-bs-toggle='tooltip' title='View'>
                            <i class='bi bi-eye-fill'></i>
                        </td>
                      </tr>";
                  }

                      //<span class="badge bg-info">For delivery</span>
                      //<span class="badge bg-success">Delivered</span>
                      //<span class="badge bg-warning">Processing</span>
                      //<span class='badge bg-danger'>Canceled</span>
                      echo "
                </tbody>
                  </table>
                </div>";
                ?>
                <!-- END All Orders Table -->

                <!-- Pagination -->
                <nav aria-label="Photos Search Navigation">
                  <ul class="pagination pagination-sm justify-content-end mt-2">
                    <li class="page-item">
                      <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                        Prev
                      </a>
                    </li>
                    <li class="page-item active">
                      <a class="page-link" href="javascript:void(0)">1</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="javascript:void(0)">4</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="javascript:void(0)" aria-label="Next">
                        Next
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- END Pagination -->
              </div>
            </div>
            <!-- END All Orders -->
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

    <script src="../../assets/js/oneui.app.min.js"></script>

    <!-- jQuery (required for Select2 + Bootstrap Maxlength plugin) -->
    <script src="../../assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="../../assets/js/plugins/select2.full.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap-maxlength.min.js"></script>
    <script src="../../assets/js/plugins/ckeditor.js"></script>
    <script src="../../assets/js/plugins/dropzone.min.js"></script>

    <!-- Page JS Helpers (Select2 + Bootstrap Maxlength + CKEditor plugins) -->
    <script>One.helpersOnLoad(['jq-select2', 'jq-maxlength', 'js-ckeditor']);</script>
  </body>
</html>
