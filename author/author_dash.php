<?php
require_once "../setup/db.connect.php";

// Retrieve Data
$user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$user_id = $user_id->fetch_object()->user_id;
$name = $mysqli->query("SELECT name FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$name = $name->fetch_object()->name;

$rows = 0;
$sql = "SELECT * FROM Books WHERE user_id = '" . $user_id . "'";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);

$totalEarnings = 0;
$result = $mysqli->query("SELECT * FROM Ordered_Items INNER JOIN Books ON Ordered_Items.book_id = Books.book_id WHERE Books.user_id = '" . $_COOKIE["user_id"] . "'");
while ($row = $result->fetch_assoc()) {
  $totalEarnings += $row['subtotal'];
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" id="css-main" href="../assets/css/oneui.min.css">
  <link rel="shortcut icon" href="../images/favicon.ico">
  <link rel="shortcut icon" href="../style/index.css">
  <title>Dashboard</title>
</head>

<body>
  <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">
    <nav id="sidebar" aria-label="Main Navigation" style="background-color: #5E6073;">
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link" href="../index.php" style=" color: #F9F8EB;">
                <i class="bi bi-house"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">Home</span>
              </a>
            </li>
            <hr style="height: .1rem;">
            <li class="nav-main-item">
              <a class="nav-main-link" href="../info/dashboard.php" style=" color: #F9F8EB;">
                <i class="bi bi-clipboard-data"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">About Dashboard</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="./bookManagement/products.php" style=" color: #F9F8EB;">
                <i class="bi bi-book"></i>
                <span class="nav-main-link-name" style="margin-left: 10px;">Books</span>
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
          <span class="d-none d-sm-inline-block ms-2">Luminary Management</span>&nbsp;&nbsp;<i class="bi bi-clipboard-data"></i>
        </div>

        <div class="d-flex align-items-center">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="d-none d-sm-inline-block ms-2" style="margin-right:10px;"><?php echo $name ?></span>
              <i class="bi bi-person-square"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../info/profile.php">
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

      <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
    </header>

    <!-- Welcome Banner -->
    <main id="main-container">
      <div class="content">
        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
          <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-2">
              Dashboard
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
              Welcome <a class="fw-semibold" href="#">Author</a>, everything looks great.
            </h2>
          </div>
        </div>
      </div>

      <!-- Box Content -->
      <div class="content">
        <div class="row items-push">

          <div class="col-sm-6 col-xxl-4">
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
              <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                <dl class="mb-0">
                  <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Products</dd>
                </dl>
                <div class="item item-rounded-lg bg-body-light"><big><?php echo $rows ?></big>
                </div>
              </div>
              <div class="bg-body-light rounded-bottom">
                <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="bookManagement\products.php">
                  <span>View all products</span>
                  <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-xl-4">
            <div class="block block-rounded d-flex flex-column h-100 mb-0">
              <div class="block-content flex-grow-1 d-flex justify-content-between">
                <dl class="mb-0">
                  <dt class="fs-3 fw-bold">$<?php echo $totalEarnings; ?>.00</dt>
                  <dd class="fs-sm fw-medium text-muted mb-0">Total Earnings</dd>
                </dl>
                <div>
                </div>
              </div>
              <div class="block-content p-1 text-center overflow-hidden">
                <canvas id="js-chartjs-total-earnings" style="height: 90px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </main>
  </div>

  <!-- Resources -->
  <script src="../assets/js/oneui.app.min.js"></script>
  <script src="../assets/js/plugins/chart.js/chart.min.js"></script>
  <script src="../assets/js/pages/be_pages_dashboard.min.js"></script>
</body>

</html>