<?php
require_once "../../setup/db.connect.php";

$user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$user_id = $user_id->fetch_object()->user_id;
$sql = "SELECT * FROM Books WHERE user_id = '" . $user_id . "'";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);

$book_id = $_GET['book_id'];
$newBook = false;
if ($book_id == "new") {
  $newBook = true;
  $title = "";
  $author = "";
  $year = "";
  $price = "";
  $category = "New";
  $cover = "book_covers/image.jpg";
  $description = "";
  $stock = "20";
} else {

  $title = $mysqli->query("SELECT title FROM Books WHERE book_id = " . $book_id . "");
  $title = $title->fetch_object()->title;
  $author = $mysqli->query("SELECT author FROM Books WHERE book_id = " . $book_id . "");
  $author = $author->fetch_object()->author;
  $year = $mysqli->query("SELECT year FROM Books WHERE book_id = " . $book_id . "");
  $year = $year->fetch_object()->year;
  $price = $mysqli->query("SELECT price FROM Books WHERE book_id = " . $book_id . "");
  $price = $price->fetch_object()->price;
  $category = $mysqli->query("SELECT category FROM Books WHERE book_id = " . $book_id . "");
  $category = $category->fetch_object()->category;
  $cover = $mysqli->query("SELECT cover FROM Books WHERE book_id = " . $book_id . "");
  $cover = $cover->fetch_object()->cover;
  $stock = $mysqli->query("SELECT stock FROM Books WHERE book_id = " . $book_id . "");
  $stock = $stock->fetch_object()->stock;
  $description = $mysqli->query("SELECT description FROM Books WHERE book_id = " . $book_id . "");
  $description = $description->fetch_object()->description;
}

if (isset($_POST['update'])) {
  $title = addslashes(trim($_POST["title"]));
  $author = addslashes(trim($_POST["author"]));
  $year = addslashes(trim($_POST["year"]));
  $price = addslashes(trim($_POST["price"]));
  $category = addslashes(trim($_POST["category"]));
  $cover = addslashes(trim($_POST["cover"]));
  $description = addslashes(trim($_POST["description"]));
  $stock = addslashes(trim($_POST["stock"]));

  if ($newBook == false) {
    $mysqli->query("UPDATE Books SET title = '" . $title . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET author = '" . $author . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET year = '" . $year . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET price = '" . $price . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET category = '" . $category . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET cover = '" . $cover . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET description = '" . $description . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET stock = '" . $stock . "' WHERE book_id = '" . $book_id . "'");
    echo "<script>window.location.href='./products.php';</script>";
  } else if ($newBook == true) {
    if ($mysqli->query("INSERT INTO Books (user_id, title, author, year, price, category, cover, description, stock) VALUES ('" . $user_id . "','" . $title . "', '" . $author . "', '" . $year . "', '" . $price . "','" . $category . "','" . $cover . "', '" . $description . "', '" . $stock . "')")) {
      echo "<script>window.location.href='./products.php';</script>";
    }
  }
}

// Delete Selection
if ($_GET['delete'] == true) {
  $mysqli->query("DELETE FROM Books WHERE book_id = '" . $book_id . "'");
  echo "<script>window.location.href='./products.php';</script>";
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
              <a class="nav-main-link" href="./products.php" style=" color: #F9F8EB;">
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
          <span class="d-none d-sm-inline-block ms-2">Product Management</span>&nbsp;&nbsp;<i class="bi bi-book"></i>
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
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../login\logout.php">
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

    <!-- Main Container -->
    <main id="main-container">
      <div class="content">
        <div class="row">
          <div class="col-6 col-lg-4">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
              <div class="block-content block-content-full">
                <!-- Stock -->
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
            <a class="block block-rounded block-link-shadow text-center" href="productEdit.php?book_id=<?php echo $book_id ?>&delete=true">
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
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <label class="form-label" for="one-ecom-product-year">Year</label>
                      <input type="text" class="form-control" id="one-ecom-product-year" name="year" value="<?php echo htmlspecialchars($year); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="one-ecom-product-price">Price in USD ($)</label>
                      <input type="text" class="form-control" id="one-ecom-product-price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-ecom-product-stock">Category (Choose: Bestseller, New, Collections, Fiction, Nonfiction, Classic)</label>
                    <input type="text" class="form-control" id="one-ecom-product-stock" name="category" value="<?php echo htmlspecialchars($category); ?>" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-ecom-product-id">Cover Image</label>
                    <input type="text" class="form-control" id="one-ecom-product-id" name="cover" value="<?php echo htmlspecialchars($cover); ?>" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-ecom-product-id">Stock (At 5, Status = Low Stock)</label>
                    <input type="text" class="form-control" id="one-ecom-product-id" name="stock" value="<?php echo htmlspecialchars($stock); ?>" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-ecom-product-description">Description</label>
                    <input type="text" class="form-control" id="one-ecom-product-description" name="description" value="<?php echo htmlspecialchars($description); ?>" rows="4" required>
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