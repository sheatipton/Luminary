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
  $dob = addslashes(trim($_POST["dob"]));
  $email = addslashes(trim($_POST["email"]));
  $type = addslashes(trim($_POST["type"]));

  $mysqli->query("UPDATE Users SET user_id = '" . $user_id . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET name = '" . $name . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET dob = '" . $dob . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET email = '" . $email . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET type = '" . $type . "' WHERE user_id = '" . $user_id . "'");
  echo "<script>window.location.href='./users.php';</script>";
}

if ($_GET['delete'] == true) {
  $mysqli->query("DELETE FROM Users WHERE user_id = '" . $_GET['selectedUser'] . "'");
  echo "<script>window.location.href='./users.php';</script>";
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
            <div class="col-6 col-lg-6">
              <a class="block block-rounded block-link-shadow text-center" href="userInfo.php?selectedUser=<?php echo $user_id ?>&delete=true">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-danger">
                    <i class="bi bi-trash-fill"></i>
                  </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-danger mb-0">
                    Remove User
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-6">
              <a class="block block-rounded block-link-shadow text-center" href="users.php">
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
                    <div style="text-align: center" class="mb-4">
                      <button type="submit" name="update" class="btn btn-alt-primary">Update</button>
                    </div>
                  </form>
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