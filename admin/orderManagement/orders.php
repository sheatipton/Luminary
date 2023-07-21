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

        <!-- User Dropdown -->
        <div class="d-flex align-items-center">
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="d-none d-sm-inline-block ms-2" style="margin-right:10px;">Admin</span>
              <i class="bi bi-person-square"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../info/profile.php">
                  <span class="fs-sm fw-medium">Profile</span>
                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../login/logout.php">
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

        <!-- All Orders -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">All Orders - <?php echo $rows ?></h3>
            <div class="block-options">
              <div class="dropdown">
              </div>
            </div>
          </div>
          <div class="block-content">

            <!-- All Orders Table -->
            <div class="table-responsive">
              <table class="table table-borderless table-striped table-vcenter">
                <thead>
                  <tr>
                    <th class="d-none d-sm-table-cell">Order ID</th>
                    <th class="d-none d-sm-table-cell">Order Date</th>
                    <th class="d-none d-sm-table-cell">Confirmation #</th>
                    <th class="d-none d-sm-table-cell">Customer ID</th>
                    <th class="d-none d-sm-table-cell">Subtotal</th>
                    <th class="d-none d-sm-table-cell">Status</th>
                    <th class="d-none d-sm-table-cell">Action</th>
                  </tr>
                </thead>

                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                  $order_id[$i] = $row['order_id'];
                  $user_id[$i] = $row['user_id'];
                  $order_date[$i] = $row['order_date'];
                  $confirmation_number[$i] = $row['confirmation_number'];
                  $subtotal[$i] = $row['subtotal'];
                  $i++;
                }

                for ($i = 1; $i <= count($subtotal); $i++) {
                  echo "
                    <tbody>
                      <tr>
                        <td class='d-none d-md-table-cell fs-sm'>
                            <p>" . $order_id[$i] . "</p>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                            <p>" . $order_date[$i] . "</p>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                            <p>" . $confirmation_number[$i] . "</p>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                            <p>" . $user_id[$i] . "</p>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                          <strong>$" . $subtotal[$i] . ".00</strong>
                        </td>
                        <td class='d-none d-md-table-cell fs-md'>
                          <span class='badge bg-success'>Completed</span>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                          <a class='btn btn-outline-info btn-sm' href='order.php?=" . $order_id[$i] . "'>Edit
                        </td>
                      </tr>";
                }
                echo "
                </tbody>
                  </table>
                </div>";
                ?>

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