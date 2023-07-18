<?php
require_once "../../setup/db.connect.php";
error_reporting(0);

$sql = "SELECT * FROM Users";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);

$user_id = $_GET['selectedUser'];
$name = $mysqli->query("SELECT name FROM Users WHERE user_id = " . $user_id . "");
$name = $name->fetch_object()->name;
$dob = $mysqli->query("SELECT dob FROM Users WHERE user_id = " . $user_id . "");
$dob = $dob->fetch_object()->dob;
$email = $mysqli->query("SELECT email FROM Users WHERE user_id = " . $user_id . "");
$email = $email->fetch_object()->email;
$type = $mysqli->query("SELECT type FROM Users WHERE user_id = " . $user_id . "");
$type = $type->fetch_object()->type;

if (isset($_POST['update'])) {
  $user_id = addslashes(trim($_POST["user_id"]));
  $name = addslashes(trim($_POST["name"]));
  echo $name;
  $dob = addslashes(trim($_POST["dob"]));
  $email = addslashes(trim($_POST["email"]));
  $type = addslashes(trim($_POST["type"]));

  $mysqli->query("UPDATE Users SET user_id = '" . $user_id . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET name = '" . $name . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET dob = '" . $dob . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET email = '" . $email . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET type = '" . $type . "' WHERE user_id = '" . $user_id . "'");
  header("location: ./members.php");
}

if ($_GET['delete'] == true) {
  $mysqli->query("DELETE FROM Users WHERE user_id = '" . $_GET['selectedUser'] . "'");
  header("location: ./members.php");
}
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
  <title>User Management</title>
  
</head>

<body>

  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">

      <nav id="sidebar" aria-label="Main Navigation" style="background-color: #5E6073;">
        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
          <!-- Side Navigation -->
          <div class="content-side">
            <ul class="nav-main">
              <li class="nav-main-item">
                <a class="nav-main-link" href="../../index.php" style=" color: #F9F8EB;">
                  <i class="bi bi-house-fill"></i>
                  <span class="nav-main-link-name" style="margin-left: 10px;">Luminary</span>
                </a>
              </li>
              <hr style="height: .1rem;">
              <li class="nav-main-item">
                <a class="nav-main-link" href="../admin_dash.php" style=" color: #F9F8EB;">
                  <i class="bi bi-clipboard-data"></i>
                  <span class="nav-main-link-name" style="margin-left: 10px;">Admin Dashboard</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="../orderManagement\orders.php" style=" color: #F9F8EB;">
                  <i class="bi bi-table"></i>
                  <span class="nav-main-link-name" style="margin-left: 10px;">Orders</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="../memberManagement\members.php" style=" color: #F9F8EB;">
                  <i class="bi bi-person-bounding-box"></i>
                  <span class="nav-main-link-name" style="margin-left: 10px;">Members</span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="../bookManagement\products.php" style=" color: #F9F8EB;">
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

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
          <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
              <div class="input-group">
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times-circle"></i>
                </button>
                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
              </div>
            </form>
          </div>
        </div>
        <!-- END Header Search -->

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
          <!-- Quick Overview + Actions -->
          <div class="row">
            <div class="col-6 col-lg-6">
              <a class="block block-rounded block-link-shadow text-center" href="memberInfo.php?selectedUser=<? echo $user_id ?>&delete=true">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-danger">
                    <i class="bi bi-trash-fill"></i>
                  </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-danger mb-0">
                    Remove Member
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-6">
              <a class="block block-rounded block-link-shadow text-center" href="members.php">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-dark">
                    <i class="bi bi-x-square-fill"></i>
                  </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-gray-dark mb-0">
                    Cancel
                  </p>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Overview + Actions -->

          <!-- Info -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Info</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <form method="post">
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">User ID</label>
                      <input type="text" class="form-control" id="one-ecom-product-id" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-name">Name</label>
                      <input type="text" class="form-control" id="one-ecom-product-name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">Date of Birth</label>
                      <input type="text" class="form-control" id="one-ecom-product-id" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">Email Address</label>
                      <input type="text" class="form-control" id="one-ecom-product-id" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">Status</label>
                      <input type="text" class="form-control" id="one-ecom-product-id" name="type" value="<?php echo htmlspecialchars($type); ?>">
                    </div>
                    <div class="mb-4">
                      <button type="submit" name="update" class="btn btn-alt-primary">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END Info -->

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
    <script>
      One.helpersOnLoad(['jq-select2', 'jq-maxlength', 'js-ckeditor']);
    </script>
  </body>

</html>