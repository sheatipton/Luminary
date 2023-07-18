<?php
require_once "../../setup/db.connect.php";

// Retrieve Data
$user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$user_id = $user_id->fetch_object()->user_id;
$sql = "SELECT * FROM Books WHERE user_id = '" . $user_id . "'";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);
$lowStock = "SELECT * FROM Books WHERE lowStock = 1 AND user_id = '" . $_COOKIE["user_id"] . "'";
$lowStockResult = $mysqli->query($lowStock);
$lowStock = mysqli_num_rows($lowStockResult);
$outOfStock = 0;
?>

<script>
  function processSearch() {
    var book_id = document.getElementById('book_id').value;
    window.location.href = "./productEdit.php?&thesearch=" + book_id;
  }
</script>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link rel="stylesheet" href="https://fonts.googleapis.com/2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" id="css-main" href="../../assets/css/oneui.min.css">
  <link rel="shortcut icon" href="../../images/favicon.ico">
  <link rel="stylesheet" href="../../style/index.css">
  <title>Book Management</title>

</head>

<body>
  <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">
    <nav id="sidebar" aria-label="Main Navigation" style="background-color: #5E6073;">
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
              <a class="nav-main-link" href="#" style=" color: #F9F8EB;">
                <i class="bi bi-book-fill"></i>
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
          <span class="d-none d-sm-inline-block ms-2">Book Management</span>
        </div>

        <!-- User Dropdown -->
        <div class="d-flex align-items-center">
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="d-none d-sm-inline-block ms-2" style="margin-right:10px;"></span>
              <i class="bi bi-person-square">&nbsp;&nbsp;&nbsp;Welcome, Author</i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">

              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../login/profile.php">
                  <span class="fs-sm fw-medium">Profile</span>
                  <span class="badge rounded-pill bg-default-light ms-2">1</span>
                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../login\logout.php">
                  <span class="fs-sm fw-medium">Log Out</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main id="main-container">
      <div class="content">
        <div class="row">
          <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="./productEdit.php?book_id=new">
              <div class="block-content block-content-full" style="height:5.3rem;">
                <div class="fs-2 fw-semibold text-default">
                  <i class="fa fa-plus"></i>
                </div>
              </div>
              <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm text-default mb-0">
                  Add New
                </p>
              </div>
            </a>
          </div>
          <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
              <div class="block-content block-content-full">
                <div class="fs-2 fw-semibold text-city"><?php echo $outOfStock ?></div>
              </div>
              <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm text-city mb-0">
                  Out of stock
                </p>
              </div>
            </a>
          </div>
          <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
              <div class="block-content block-content-full">
                <div class="fs-2 fw-semibold text-dark"><?php echo $lowStock ?></div>
              </div>
              <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm text-muted mb-0">
                  Low on Stock
                </p>
              </div>
            </a>
          </div>
          <div class="col-6 col-lg-3">
            <a class="block block-rounded block-link-shadow text-center" href="../../browse\all_books.php">
              <div class="block-content block-content-full">
                <div class="fs-2 fw-semibold text-dark"><?php echo $rows ?></div>
              </div>
              <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm text-muted mb-0">
                  All Books
                </p>
              </div>
            </a>
          </div>
        </div>

        <!-- All Products -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">All Books</h3>
            <div class="block-options">
              <div class="dropdown">
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    Low Stock
                    <span class="badge bg-success rounded-pill"><?php echo $lowStock ?></span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    Out of Stock
                    <span class="badge bg-city-op rounded-pill"><?php echo $outOfStock ?></span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    All
                    <span class="badge bg-default-light rounded-pill"><?php echo $rows ?></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="block-content">

            <!-- All Products Table -->
            <div class="table-responsive">
              <table class="table table-borderless table-striped table-vcenter">
                <thead>
                  <tr>
                    <th class="d-none d-sm-table-cell" style="width: 250px; padding-left: 40px;">Author</th>
                    <th class="d-none d-sm-table-cell" style="width: 250px;">Book Title</th>
                    <th class="d-none d-sm-table-cell text-center">book_id</th>
                    <th>Status</th>
                    <th class="d-none d-sm-table-cell text-end">Price</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>

                <?php
                // Pull from DB
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                  $user_id[$i] = $row['user_id'];
                  $book_id[$i] = $row['book_id'];
                  $cover[$i] = "../../";
                  $cover[$i] .= $row['image'];
                  $title[$i] = $row['title'];
                  $author[$i] = $row['author'];
                  $price[$i] = $row['price'];
                  $stock[$i] = $row['stock'];
                  $lowStockBool[$i] = $row['lowStock'];
                  $i++;
                }

                // Display Information
                if ($rows == 0) {
                  echo "<h1 style='text-align:center'>No Books Available</h1>";
                } else {
                  for ($i = 1; $i <= count($title); $i++) {
                    echo "
                    <tbody style='font-size: 24px'>
                      <tr>
                        <td class='d-none d-md-table-cell fs-sm' style='padding-left: 40px'>
                          <a class='fw-semibold' href='productEdit.php'>
                            <strong>" . $author[$i] . "</strong>
                          </a>
                        </td>
                        <td class='d-none d-md-table-cell fs-sm'>
                          <a href='productEdit.php'>" . $title[$i] . "</a>
                        </td>
                        <td class='d-none d-sm-table-cell text-center fs-sm'>" . $book_id[$i] . "</td>
                        <td>";
                    if ($stock[$i] < 5) {
                      echo "<span class='badge bg-city-op'>Out of Stock</span>";
                      $outOfStock++;
                    } else if ($lowStockBool[$i] == 1) {
                      echo "<span class='badge bg-warning' style='opacity:70%;'>Low Stock</span>";
                      $lowStock++;
                    } else {
                      echo "<span class='badge bg-success' style='opacity:70%;'>Available</span>";
                    }
                    echo              "</td>
                        <td class='text-end d-none d-sm-table-cell fs-sm'>
                          <strong>" . $price[$i] . "</strong>
                        </td>
                        <td class='text-center fs-sm'>
                          <a href='productEdit.php?book_id=" . $book_id[$i] . "' data-bs-toggle='tooltip' title='Delete'>Edit
                          </a>
                        </td>
                      </tr>";
                  }
                  echo "</tbody>
                  </table>
                </div>";
                }
                ?>
            </div>
          </div>
        </div>
    </main>

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

    <!-- Resources -->
    <script src="../../assets/js/lib/jquery.min.js"></script>
    <script src="../../assets/js/plugins/select2.full.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap-maxlength.min.js"></script>
    <script src="../../assets/js/plugins/ckeditor.js"></script>
    <script src="../../assets/js/plugins/dropzone.min.js"></script>
    <script src="../../assets/js/oneui.app.min.js"></script>

</body>

</html>