<?php
require_once "../../setup/db.connect.php";
error_reporting(0);

$user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$user_id = $user_id->fetch_object()->user_id;
$sql = "SELECT * FROM Books WHERE user_id = '" . $user_id . "'";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);

$isbn = $_GET['isbn'];
$newBook = false;
if ($isbn == "new") {
  $newBook = true;
  $isbn = "";
  $title = "";
  $author = "";
  $subject = "";
  $category = "";
  $price = "";
  $image = "book_covers/image.ext";
  $description = "";
  $stock = "";
} else {

  $title = $mysqli->query("SELECT title FROM Books WHERE isbn = " . $isbn . "");
  $title = $title->fetch_object()->title;
  $author = $mysqli->query("SELECT author FROM Books WHERE isbn = " . $isbn . "");
  $author = $author->fetch_object()->author;
  $subject = $mysqli->query("SELECT subject FROM Books WHERE isbn = " . $isbn . "");
  $subject = $subject->fetch_object()->subject;
  $category = $mysqli->query("SELECT category FROM Books WHERE isbn = " . $isbn . "");
  $category = $category->fetch_object()->category;
  $price = $mysqli->query("SELECT price FROM Books WHERE isbn = " . $isbn . "");
  $price = $price->fetch_object()->price;
  $imageSql = $mysqli->query("SELECT image FROM Books WHERE isbn = " . $isbn . "");
  $image = $imageSql->fetch_object()->image;
  $description = $mysqli->query("SELECT description FROM Books WHERE isbn = " . $isbn . "");
  $description = $description->fetch_object()->description;
  $stock = $mysqli->query("SELECT stock FROM Books WHERE isbn = " . $isbn . "");
  $stock = $stock->fetch_object()->stock;
}

if (isset($_POST['update'])) {
  $isbn = addslashes(trim($_POST["isbn"]));
  $title = addslashes(trim($_POST["title"]));
  $author = addslashes(trim($_POST["author"]));
  $subject = addslashes(trim($_POST["subject"]));
  $category = addslashes(trim($_POST["category"]));
  $price = addslashes(trim($_POST["price"]));
  $image = addslashes(trim($_POST["image"]));
  $description = addslashes(trim($_POST["description"]));
  $stock = addslashes(trim($_POST["stock"]));

  if ($newBook == false) {
    echo 'here';
    $mysqli->query("UPDATE Books SET isbn = '" . $isbn . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET title = '" . $title . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET author = '" . $author . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET subject = '" . $subject . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET category = '" . $category . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET price = '" . $price . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET image = '" . $image . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET description = '" . $description . "' WHERE isbn = '" . $isbn . "'");
    $mysqli->query("UPDATE Books SET stock = '" . $stock . "' WHERE isbn = '" . $isbn . "'");
    header("location: ./products.php");
  } else if ($newBook == true) {
    if ($mysqli->query("INSERT INTO Books (user_id, isbn, title, author, subject, category, price, image, description, stock) VALUES ('" . $user_id . "', '" . $isbn . "','" . $title . "', '" . $author . "', '" . $subject . "', '" . $category . "','" . $price . "','" . $image . "', '" . $description . "', '" . $stock . "')")) {
      header("location: ./products.php");
    }
  }
}

if ($_GET['delete'] == true) {
  $mysqli->query("DELETE FROM Books WHERE isbn = '" . $isbn . "'");
  header("location: ./products.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>Luminary - Book Management</title>
  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="../../favicon_io\favicon.ico">
  <link rel="icon" type="image/png" sizes="192x192" href="../../favicon_io\android-chrome-192x192.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../../favicon_io\android-chrome-192x192.png">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- Fonts and OneUI framework -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="../../assets/js/plugins/select2.min.css">
  <link rel="stylesheet" href="../../assets\js\plugins\dropzone.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" id="css-main" href="../../assets/css/oneui.min.css">
  <!-- END Stylesheets -->
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
                <a class="nav-main-link" href="products.php" style=" color: #F9F8EB;">
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
                <span class="d-none d-sm-inline-block ms-2" style="margin-right:10px;">Vendor</span>
                <i class="bi bi-person-square"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                  <p class="mt-2 mb-0 fw-medium">Vendor Name</p>
                  <p class="mb-0 text-muted fs-sm fw-medium">Position</p>
                </div>
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../info/profile.php">
                    <span class="fs-sm fw-medium">Profile</span>
                    <span class="badge rounded-pill bg-primary ms-2">1</span>
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
          <!-- Quick Overview + Actions -->
          <div class="row">
            <div class="col-6 col-lg-4">
              <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <!-- number in stock -->
                  <div class="fs-2 fw-semibold text-dark"><?php echo $rows ?></div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-muted mb-0">
                    Available
                  </p>
                </div>
              </a>
            </div>
            <div class="col-4 col-lg-4">
              <a class="block block-rounded block-link-shadow text-center" href="productEdit.php?isbn=<? echo $isbn ?>&delete=true">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-danger">
                    <i class="bi bi-trash-fill"></i>
                  </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-danger mb-0">
                    Remove Product
                  </p>
                </div>
              </a>
            </div>
            <div class="col-4 col-lg-4">
              <a class="block block-rounded block-link-shadow text-center" href="products.php">
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
              <h3 class="block-title">Add or Update Info</h3>
            </div>
            <div class="block-content">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                  <form method="post">
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-name">Book Title</label>
                      <input type="text" class="form-control" id="one-ecom-product-name" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">Author</label>
                      <input type="text" class="form-control" id="one-ecom-product-id" name="author" value="<?php echo htmlspecialchars($author); ?>" required>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">ISBN</label>
                      <input type="text" class="form-control" id="one-ecom-product-id" name="isbn" value="<?php echo htmlspecialchars($isbn); ?>" required>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-description-short">Short Description</label>
                      <textarea class="form-control" id="one-ecom-product-description-short" name="description" value="<?php echo $description; ?>" rows="4"></textarea>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <label class="form-label" for="one-ecom-product-price">Subject</label>
                        <input type="text" class="form-control" id="one-ecom-product-price" name="subject" value="<?php echo htmlspecialchars($subject); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="one-ecom-product-stock">Category</label>
                        <input type="text" class="form-control" id="one-ecom-product-stock" name="category" value="<?php echo htmlspecialchars($category); ?>" required>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <label class="form-label" for="one-ecom-product-price">Price in USD ($)</label>
                        <input type="text" class="form-control" id="one-ecom-product-price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="one-ecom-product-stock">Stock</label>
                        <input type="text" class="form-control" id="one-ecom-product-stock" name="stock" value="<?php echo htmlspecialchars($stock); ?>" required>
                      </div>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="one-ecom-product-id">Cover Image (update path to book_cover folder)</label>
                      <input type="text" class="form-control" id="one-ecom-product-id" name="image" value="<?php echo htmlspecialchars($image); ?>" required>
                    </div>
                </div>
                <div style="text-align: center" class="mb-4">
                  <button type="submit" name="update" class="btn btn-alt-primary">Update</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- END Info -->
              
        <!-- Media -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Cover</h3>
          </div>
          <div class="block-content block-content-full">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-8">
                <form class="dropzone"></form>
              </div>
            </div>
          </div>
        </div>
        <!-- END Media -->
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
    <script>
      One.helpersOnLoad(['jq-select2', 'jq-maxlength', 'js-ckeditor']);
    </script>
  </body>

</html>