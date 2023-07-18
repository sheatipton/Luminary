<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

      <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="../../assets/js/plugins/select2.min.css">
  <link rel="stylesheet" href="../../assets\js\plugins\dropzone.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" id="css-main" href="../../assets/css/oneui.min.css">
  <link rel="shortcut icon" href="../../images/favicon.ico">
  <link rel="stylesheet" href="../../style/index.css">
    <title>Orders Management</title>
   
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
              <span class="d-none d-sm-inline-block ms-2">Luminary</span>
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
          <!-- Page Content -->
          <div class="content">
            <!-- Quick Overview -->
            <div class="row">
              <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                  <div class="block-content block-content-full">
                    <div class="item item-circle bg-success-light mx-auto">
                      <i class="fa fa-check text-success"></i>
                    </div>
                  </div>
                  <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-success mb-0">
                      ORD.00965
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                  <div class="block-content block-content-full">
                    <div class="item item-circle bg-success-light mx-auto">
                      <i class="fa fa-check text-success"></i>
                    </div>
                  </div>
                  <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-success mb-0">
                      Payment
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                  <div class="block-content block-content-full">
                    <div class="item item-circle bg-warning-light mx-auto">
                      <i class="fa fa-sync fa-spin text-warning"></i>
                    </div>
                  </div>
                  <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-warning mb-0">
                      Packaging
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                  <div class="block-content block-content-full">
                    <div class="item item-circle bg-body mx-auto">
                      <i class="fa fa-times text-muted"></i>
                    </div>
                  </div>
                  <div class="block-content py-2 bg-body-light">
                    <p class="fw-medium fs-sm text-muted mb-0">
                      Delivery
                    </p>
                  </div>
                </a>
              </div>
            </div>
            <!-- END Quick Overview -->

            <!-- Products -->
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Products</h3>
              </div>
              <div class="block-content">
                <div class="table-responsive">
                  <table class="table table-borderless table-striped table-vcenter fs-sm">
                    <thead>
                      <tr>
                        <th class="text-center" style="width: 100px;">ID</th>
                        <th>Book Title</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">QTY</th>
                        <th class="text-end" style="width: 10%;">UNIT COST</th>
                        <th class="text-end" style="width: 10%;">PRICE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center"><a href="../../browse\book_info.php"><strong>PID.965</strong></a></td>
                        <td><a href="../../browse\book_info.php">Dark Souls III</a></td>
                        <td class="text-center">50</td>
                        <td class="text-center"><strong>1</strong></td>
                        <td class="text-end">$59,00</td>
                        <td class="text-end">$59,00</td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="../../browse\book_info.php"><strong>PID.755</strong></a></td>
                        <td><a href="../../browse\book_info.php">Control</a></td>
                        <td class="text-center">68</td>
                        <td class="text-center"><strong>1</strong></td>
                        <td class="text-end">$59,00</td>
                        <td class="text-end">$59,00</td>
                      </tr>
                      <tr>
                        <td class="text-center"><a href="../../browse\book_info.php"><strong>PID.235</strong></a></td>
                        <td><a href="../../browse\book_info.php">Forza Motorsport 7</a></td>
                        <td class="text-center">23</td>
                        <td class="text-center"><strong>1</strong></td>
                        <td class="text-end">$59,00</td>
                        <td class="text-end">$59,00</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="text-end"><strong>Price:</strong></td>
                        <td class="text-end">$177,00</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="text-end"><strong>Tax:</strong></td>
                        <td class="text-end">$12.99</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="text-end"><strong>Shipping:</strong></td>
                        <td class="text-end">$4.99</td>
                      </tr>
                      <tr>
                        <td colspan="5" class="text-end"><strong>Total:</strong></td>
                        <td class="text-end">$177,00</td>
                      </tr>
                      <tr class="table-success">
                        <td colspan="5" class="text-end text-uppercase"><strong>Total Due:</strong></td>
                        <td class="text-end"><strong>$0,00</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- END Products -->

            <!-- Customer -->
            <div class="row">
              <div class="col-sm-6">
                <!-- Billing Address -->
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Billing Address</h3>
                  </div>
                  <div class="block-content">
                    <div class="fs-4 mb-1">John Parker</div>
                    <address class="fs-sm">
                      Sunset Str 598<br>
                      Melbourne<br>
                      Australia, 11-671<br><br>
                      <i class="fa fa-phone"></i> (999) 888-77777<br>
                      <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">company@example.com</a>
                    </address>
                  </div>
                </div>
                <!-- END Billing Address -->
              </div>
              <div class="col-sm-6">
                <!-- Shipping Address -->
                <div class="block block-rounded">
                  <div class="block-header block-header-default">
                    <h3 class="block-title">Shipping Address</h3>
                  </div>
                  <div class="block-content">
                    <div class="fs-4 mb-1">John Parker</div>
                    <address class="fs-sm">
                      Sunrise Str 620<br>
                      Melbourne<br>
                      Australia, 11-587<br><br>
                      <i class="fa fa-phone"></i> (999) 888-55555<br>
                      <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">company@example.com</a>
                    </address>
                  </div>
                </div>
                <!-- END Shipping Address -->
              </div>
            </div>
            <!-- END Customer -->

            <!-- Log Messages -->
            <div class="block block-rounded">
              <div class="block-header block-header-default">
                <h3 class="block-title">Log Messages</h3>
              </div>
              <div class="block-content">
                <table class="table table-borderless table-striped table-vcenter fs-sm">
                  <tbody>
                    <tr>
                      <td class="fs-base" style="width: 80px;">
                        <span class="badge bg-primary">Order</span>
                      </td>
                      <td style="width: 220px;">
                        <span class="fw-semibold">January 17, 2020 - 18:00</span>
                      </td>
                      <td>
                        <a href="javascript:void(0)">Support</a>
                      </td>
                      <td class="text-success">Order Completed</td>
                    </tr>
                    <tr>
                      <td class="fs-base">
                        <span class="badge bg-primary">Order</span>
                      </td>
                      <td>
                        <span class="fw-semibold">January 17, 2020 - 17:36</span>
                      </td>
                      <td>
                        <a href="javascript:void(0)">Support</a>
                      </td>
                      <td class="text-warning">Preparing Order</td>
                    </tr>
                    <tr>
                      <td class="fs-base">
                        <span class="badge bg-success">Payment</span>
                      </td>
                      <td>
                        <span class="fw-semibold">January 16, 2020 - 18:10</span>
                      </td>
                      <td>
                        <a href="javascript:void(0)">John Parker</a>
                      </td>
                      <td class="text-success">Payment Completed</td>
                    </tr>
                    <tr>
                      <td class="fs-base">
                        <span class="badge bg-danger">Email</span>
                      </td>
                      <td>
                        <span class="fw-semibold">January 16, 2020 - 10:35</span>
                      </td>
                      <td>
                        <a href="javascript:void(0)">Support</a>
                      </td>
                      <td class="text-danger">Missing payment details. Email was sent and awaiting for payment before processing</td>
                    </tr>
                    <tr>
                      <td class="fs-base">
                        <span class="badge bg-primary">Order</span>
                      </td>
                      <td>
                        <span class="fw-semibold">January 15, 2020 - 14:59</span>
                      </td>
                      <td>
                        <a href="javascript:void(0)">Support</a>
                      </td>
                      <td>All products are available</td>
                    </tr>
                    <tr>
                      <td class="fs-base">
                        <span class="badge bg-primary">Order</span>
                      </td>
                      <td>
                        <span class="fw-semibold">January 15, 2020 - 14:29</span>
                      </td>
                      <td>
                        <a href="javascript:void(0)">John Parker</a>
                      </td>
                      <td>Order Submitted</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END Log Messages -->
          </div>
          <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

      <!-- Footer -->
<div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>BROWSE CATEGORIES</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="./browse/bestsellers.php" class="nav-link p-0 text-muted">Bestsellers</a></li>
          <li class="nav-item mb-2"><a href="./browse/new.php" class="nav-link p-0 text-muted">New In</a></li>
          <li class="nav-item mb-2"><a href="./browse/collections.php" class="nav-link p-0 text-muted">Collections</a></li>
          <li class="nav-item mb-2"><a href="./browse/fiction.php" class="nav-link p-0 text-muted">Fiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/nonfiction.php" class="nav-link p-0 text-muted">Nonfiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/classics.php" class="nav-link p-0 text-muted">Classics</a></li>
          <li class="nav-item mb-2"><a href="./browse/all_books.php" class="nav-link p-0 text-muted">Browse All</a></li>
        </ul>
        </ul>
      </div>

      <div class="col-2">
        <h5>QUICK HELP</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="./login/profile.php" class="nav-link p-0 text-muted">Account</a></li>
          <li class="nav-item mb-2"><a href="./info/about_us.php" class="nav-link p-0 text-muted">About</a></li>
          
        </ul>
      </div>

      <div class="col-2">
        <h5>SHARE WITH YOUR FRIENDS!</h5>
        <a href="https://www.facebook.com"><i class="bi bi-facebook" style="font-size: 45px; padding-right: 15px"></i></a>
        <a href="https://www.twitter.com"><i class="bi bi-twitter" style="font-size: 45px; padding-right: 15px"></i></a>
        <a href="https://www.instagram.com"><i class="bi bi-instagram" style="font-size: 45px; padding-right: 15px"></i></a>
        
      </div>

      <div class="col-2">
        <h5>CONNECT WITH ME!</h5>
        <a href="https://www.linkedin.com/in/shea-tipton-78189516b/"><i class="bi bi-linkedin" style="font-size: 45px; padding-right: 15px"></i></a>
        <a href="https://github.com/sheatipton"><i class="bi bi-github" style="font-size: 45px; padding-right: 15px"></i></a>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>&copy; Luminary, Inc. 2022. All rights reserved.</p>
    </div>
  </footer>
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
