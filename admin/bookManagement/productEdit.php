<?php
require_once "../../setup/db.connect.php";
error_reporting(0);

// Retrieve Data
$user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
$user_id = $user_id->fetch_object()->user_id;
$sql = "SELECT * FROM Books";
$result = $mysqli->query($sql);
$rows = mysqli_num_rows($result);
$book_id = $_GET['book_id'];
$newBook = false;
if ($book_id == "new") {
  $newBook = true;
  $book_id = "";
  $title = "";
  $author = "";
  $category = "";
  $price = "";
  $image = "book_covers/image.ext";
  $description = "";
  $stock = "";
} else {

  $title = $mysqli->query("SELECT title FROM Books WHERE book_id = " . $book_id . "");
  $title = $title->fetch_object()->title;
  $author = $mysqli->query("SELECT author FROM Books WHERE book_id = " . $book_id . "");
  $author = $author->fetch_object()->author;
  $category = $mysqli->query("SELECT category FROM Books WHERE book_id = " . $book_id . "");
  $category = $category->fetch_object()->category;
  $price = $mysqli->query("SELECT price FROM Books WHERE book_id = " . $book_id . "");
  $price = $price->fetch_object()->price;
  $imageSql = $mysqli->query("SELECT image FROM Books WHERE book_id = " . $book_id . "");
  $image = $imageSql->fetch_object()->image;
  $description = $mysqli->query("SELECT description FROM Books WHERE book_id = " . $book_id . "");
  $description = $description->fetch_object()->description;
  $stock = $mysqli->query("SELECT stock FROM Books WHERE book_id = " . $book_id . "");
  $stock = $stock->fetch_object()->stock;
}

if (isset($_POST['update'])) {
  $book_id = addslashes(trim($_POST["book_id"]));
  $title = addslashes(trim($_POST["title"]));
  $author = addslashes(trim($_POST["author"]));
  $category = addslashes(trim($_POST["category"]));
  $price = addslashes(trim($_POST["price"]));
  $image = addslashes(trim($_POST["image"]));
  $description = addslashes(trim($_POST["description"]));
  $stock = addslashes(trim($_POST["stock"]));

  if ($newBook == false) {
    echo 'here';
    $mysqli->query("UPDATE Books SET book_id = '" . $book_id . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET title = '" . $title . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET author = '" . $author . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET category = '" . $category . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET price = '" . $price . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET image = '" . $image . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET description = '" . $description . "' WHERE book_id = '" . $book_id . "'");
    $mysqli->query("UPDATE Books SET stock = '" . $stock . "' WHERE book_id = '" . $book_id . "'");
    header("location: ./products.php");
  } else if ($newBook == true) {
    if ($mysqli->query("INSERT INTO Books (user_id, book_id, title, author, year, price, category, cover, description, stock) VALUES ('" . $user_id . "', '" . $book_id . "','" . $title . "', '" . $author . "', '" . $year . "', '" . $price . "','" . $category . "','" . $cover . "', '" . $description . "', '" . $stock . "')")) {
      header("location: ./products.php");
    }
  }
}

if ($_GET['delete'] == true) {
  $mysqli->query("DELETE FROM Books WHERE book_id = '" . $book_id . "'");
  header("location: ./products.php");
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
              <a class="nav-main-link" href="products.php" style=" color: #F9F8EB;">
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
          <span class="d-none d-sm-inline-block ms-2">Edit a Product</span>
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
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../login/profile.php">
                  <span class="fs-sm fw-medium">Profile</span>
                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../../login/logout.php">
                  <span class="fs-sm fw-medium">Log Out</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Action Buttons -->
    <main id="main-container">
      <div class="content">
        <div class="row">
          <div class="col-6 col-lg-4">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
              <div class="block-content block-content-full">
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
            <a class="block block-rounded block-link-shadow text-center" href="productEdit.php?book_id=<? echo $book_id ?>&delete=true">
              <div class="block-content block-content-full" style="height:5.3rem;">
                <div class="fs-2 fw-semibold text-danger py-2">
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
              <div class="block-content block-content-full" style="height:5.3rem;">
                <div class="fs-2 fw-semibold text-dark py-2">
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

        <!-- Add or Update Info -->
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
                    <label class="form-label" for="one-ecom-product-id">book_id</label>
                    <input type="text" class="form-control" id="one-ecom-product-id" name="book_id" value="<?php echo htmlspecialchars($book_id); ?>" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="one-ecom-product-description-short">Short Description</label>
                    <textarea class="form-control" id="one-ecom-product-description-short" name="description" value="<?php echo $description; ?>" rows="4"></textarea>
                  </div>
                  <div class="row mb-4">
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
  <script src="../../assets/js/oneui.app.min.js"></script>
  <script src="../../assets/js/lib/jquery.min.js"></script>
  <script src="../../assets/js/plugins/select2.full.min.js"></script>
  <script src="../../assets/js/plugins/bootstrap-maxlength.min.js"></script>
  <script src="../../assets/js/plugins/ckeditor.js"></script>
  <script src="../../assets/js/plugins/dropzone.min.js"></script>

</body>

</html>