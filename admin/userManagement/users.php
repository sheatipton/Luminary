<?php
require_once "../../setup/db.connect.php";

$sql = "SELECT * FROM Users";
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
                <a class="nav-main-link" href="./users.php" style=" color: #F9F8EB;">
                  <i class="bi bi-people"></i>
                  <span class="nav-main-link-name" style="margin-left: 10px;">Users</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="../orderManagement\orders.php" style=" color: #F9F8EB;">
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
            <span class="d-none d-sm-inline-block ms-2">User Management</span>&nbsp;&nbsp;<i class="bi bi-people"></i>
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

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
          <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
              <div class="input-group">
                <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times-circle"></i>
                </button>
                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
              </div>
            </form>
          </div>
        </div>

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

          <!-- All Products -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">All Users - <?php echo $rows ?></h3>
              <div class="block-options">
                <div class="dropdown">
                </div>
              </div>
            </div>
            <div class="block-content">

              <!-- All Products Table -->
              <div class="table-responsive">
                <table class="table table-borderless table-vcenter">
                  <thead>
                    <tr>
                      <th class="d-none d-sm-table-cell">User ID</th>
                      <th class="d-none d-md-table-cell">Name</th>
                      <th class="d-none d-md-table-cell">Email</th>
                      <th class="d-none d-md-table-cell">Address</th>
                      <th class="d-none d-md-table-cell">Type</th>
                      <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                  </thead>

                  <?php
                  $i = 1;
                  while ($row = mysqli_fetch_assoc($result)) {;
                    $user_id[$i] = $row['user_id'];
                    $type[$i] = $row['type'];
                    $name[$i] = $row['name'];
                    $email[$i] = $row['email'];
                    $address[$i] = $row['address']; 
                    $i++;  
                  }

                  for ($i = 1; $i <= count($name); $i++) {
                    echo "
                    <tbody>
                      <tr>
                        <td class='d-none d-md-table-cell fs-md'>   
                            <p>" . $user_id[$i] . "</p>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                        <p>" . $name[$i] . "</p>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                        <p>" . $email[$i] . "</p>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                        <p>" . $address[$i] . "</p>
                        </td>";

                    if ($type[$i] == 0) {
                      $type[$i] = "Administrator";
                    } else if ($type[$i] == 1) {
                      $type[$i] = "Author";
                    } else if ($type[$i] == 2) {
                      $type[$i] = "Customer";
                    }

                    echo "
                        <td class='d-none d-md-table-cell fs-sm'>
                        <p>" . $type[$i] . "</p>
                        </td>
                        <td class='-none d-md-table-cell fs-sm'>
                          <a class='btn btn-outline-info btn-sm' href='userInfo.php?selectedUser=" . $user_id[$i] . "'>Edit
                          </a>";
                    echo "</td>";
                  }
                  echo "</tbody>
                  </table>
                </div>";
                  ?>
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