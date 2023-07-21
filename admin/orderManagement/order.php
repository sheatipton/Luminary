<?php
require_once "../../setup/db.connect.php";
error_reporting(0);

$user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$user_id = $user_id->fetch_object()->user_id;
$sql = "SELECT * FROM Orders";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);

$order_id = $_GET['order_id'];
/*$ordered_item_id = $mysqli->query("SELECT * FROM Orders_Items WHERE order_id = " . $order_id . "");
$ordered_item_rows = mysqli_num_rows($result);
$book_id = $mysqli->query("SELECT book_id FROM Orders WHERE order_id = " . $order_id . "");
$book_id = $book_id->fetch_object()->book_id;
$price = $mysqli->query("SELECT price FROM Orders WHERE order_id = " . $order_id . "");
$price = $price->fetch_object()->price;*/
?>

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
  <title>Dashboard</title>

</head>

<body>
  <!-- Side Navigation -->
  <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">
    <nav id="sidebar" aria-label="Main Navigation" style="background-color: #5E6073;">
      <div class="js-sidebar-scroll">
        <div class="content-side">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link" href="../../index.php" style=" color: #F9F8EB;">
                <i class="bi bi-house"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">Home</span>
              </a>
            </li>
            <hr style="height: .1rem;">
            <li class="nav-main-item">
              <a class="nav-main-link" href="../admin_dash.php" style=" color: #F9F8EB;">
                <i class="bi bi-clipboard-data"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">Dashboard</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="../bookManagement\products.php" style=" color: #F9F8EB;">
                <i class="bi bi-book"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">Products</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="../userManagement\users.php" style=" color: #F9F8EB;">
                <i class="bi bi-people"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">Users</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="./orders.php" style=" color: #F9F8EB;">
                <i class="bi bi-table"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">Orders</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header id="page-header">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
            <i class="bi bi-list"></i>
          </button>
          <span class="d-none d-sm-inline-block ms-2">Order Management</span>&nbsp;&nbsp;<i class="bi bi-table"></i>
        </div>
        <div class="d-flex align-items-center">
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="d-none d-sm-inline-block ms-2" style="margin-right:10px;">Admin</span>
              <i class="bi bi-person-square"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">

              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">
                  <span class="fs-sm fw-medium">Profile</span>

                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_signin.html">
                  <span class="fs-sm fw-medium">Logout</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Header Loader -->
      <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Container -->
    <main id="main-container">
      <div class="content">
        <div class="row">

        <p style="font-size: 40px">PAGE UNDER CONSTRUCTION&nbsp;<i class="bi bi-cone-striped" style="font-size: 36px"></i></p><br>
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
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Resources -->
  <script src="../../assets/js/oneui.app.min.js"></script>
  <script src="../../assets/js/lib/jquery.min.js"></script>
  <script src="../../assets/js/plugins/select2.full.min.js"></script>
  <script src="../../assets/js/plugins/bootstrap-maxlength.min.js"></script>
  <script src="../../assets/js/plugins/ckeditor.js"></script>
  <script src="../../assets/js/plugins/dropzone.min.js"></script>
  <script>
    One.helpersOnLoad(['jq-select2', 'jq-maxlength', 'js-ckeditor']);
  </script>
</body>

</html>