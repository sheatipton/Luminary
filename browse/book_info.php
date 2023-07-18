<?php
require_once "../setup/db.connect.php";

// Check if logged in, retrieve data if true
$loggedIn = false;
if (isset($_COOKIE["user_id"])) {
  $loggedIn = true;
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $bagNumber = $mysqli->query("SELECT * FROM Bag WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $bagNumber = mysqli_num_rows($bagNumber);
  $book_id = $_GET['book_id'];
}
?>

<!-- Search Bar Function -->
<script>
  function processSearch() {
    var searchValue = document.getElementById('thesearch').value;
    window.location.href = "./search.php?thesearch=" + searchValue;
  }
</script>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/browse.css">
  <title>Info</title>
</head>

<body>
  <!-- Top Bar - Promo Code -->
  <div class="topbar" style="height: 35px">
    <p class="offer" style="font-size: 16px"> USE PROMO CODE 'TENOFF' TO SAVE $10 on your first order!</p>
  </div>

  <!-- Navigation Bar -->
  <div class="header">
    <nav class="py-2 bg-light border-bottom" style="height: 60px">
      <div class="container d-flex flex-wrap" style="font-size: 20px">
        <ul class="nav me-auto">
          <li class="nav-item"><a href="../info/about_us.php" class="nav-link link-dark px-2">About</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


          <?php if ($loggedIn && $type == 0) : ?>
            <li class="nav-item"><a href="./admin/admin_dash.php" class="nav-link link-dark px-2">Dashboard</a></li>
          <?php elseif ($loggedIn && $type == 1) : ?>
            <li class="nav-item"><a href="./author/bookManagement/products.php" class="nav-link link-dark px-2">Dashboard</a></li>
          <?php endif; ?>
        </ul>

        <!-- Logo -->
        <a href="index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <ul class="nav">
            <i class="bi bi-moon-stars" style="font-size: 20px; padding-top: 10px; padding-left: 1rem"></i>
            <p style="font-size: 22px; padding-top: 5px; padding-left: 1rem; padding-right: 1rem">Luminary</p>
            <i class="bi bi-stars" style="font-size: 15px; padding-top: 12px; padding-right: 1rem"></i>
          </ul>
        </a>
        <ul class="nav">

          <?php if ($loggedIn) : ?>
            <li class="nav-item"><a href="../bag/shoppingbag.php" class="nav-link link-dark px-2"><?php echo $bagNumber .= ' in bag' ?>&nbsp;&nbsp;&nbsp;<i class="bi bi-bag-heart"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item"><a href="../login/profile.php" class="nav-link link-dark px-2 toplink">Account&nbsp;&nbsp;&nbsp;<i class="bi bi-person-square"></i></a></li>&nbsp;&nbsp;&nbsp;
          <?php elseif (!$loggedIn) : ?>
            <li class="nav-item"><a href="../login/login.php" class="nav-link link-dark px-2 toplink">Login</a></li>
            <li class="nav-item"><a href="../login/register.php" class="nav-link link-dark px-2 toplink">Sign up</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <!-- Search Bar -->
    <header class="py-2 mb-2 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
          <div class="input-icons">
            <a onclick="processSearch()"><i class="bi bi-search-heart icon" style="font-size: 22px; padding-top: 10px;"></i><a>
                <input type="search" id="thesearch" name="thesearch" style="font-size: 20px; width: 500px; height: 40px; padding-left: 60px" class="form-control input-field" placeholder="Search by Title, Author, or Keyword" aria-label="Search">
          </div>
        </form>
      </div>
    </header>

    <!-- Categories Navigation Bar -->
    <header class="border-bottom">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px" href="./bestsellers.php">Bestsellers</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="./new.php">New In</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <a class="nav-link" style="color:black; font-size:22px;" href="./collections.php">Collections</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="./fiction.php">Fiction</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="./nonfiction.php">Nonfiction</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="./classics.php">Classics</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <a class="nav-link" style="color:black; font-size:22px;" href="./all_books.php">Browse All</a>
        </li>
      </ul>
    </header>
  </div>
  <br>

  <!-- Back Navigation -->
  <div class="container" style="padding-left: 5rem">
    <a class="btn btn-outline-secondary" href="javascript:history.back()" style="text-decoration: none;">
      <i class="bi bi-arrow-left"></i>&nbsp;Back To Selection</a></div>
  <br>

  <!-- Action for Add to Bag -->
  <?php
  if (isset($_POST["submit"])) {
    if ($loggedIn == true) {
      $addTobagSql = "INSERT INTO bag (user_id, book_id, quantity) VALUES ('" . $user_id . "', '" . $book_id . "', 1)";
      $mysqli->query($addTobagSql);
      echo ("<meta http-equiv='refresh' content='0'>");
    } else {
      echo "<script>window.location.href='../login/login.php';</script>";
    }
  }

  // Pull from DB
  $book_id = $_GET['book_id'];
  $title = $mysqli->query("SELECT title FROM Books WHERE book_id = " . $book_id . "");
  $title = $title->fetch_object()->title;
  $author = $mysqli->query("SELECT author FROM Books WHERE book_id = " . $book_id . "");
  $author = $author->fetch_object()->author;
  $year = $mysqli->query("SELECT year FROM Books WHERE book_id = " . $book_id . "");
  $year = $year->fetch_object()->year;
  $price = $mysqli->query("SELECT price FROM Books WHERE book_id = " . $book_id . "");
  $price = $price->fetch_object()->price;
  $imageSql = $mysqli->query("SELECT cover FROM Books WHERE book_id = " . $book_id . "");
  $cover = "../";
  $cover .= $imageSql->fetch_object()->cover;
  $stock = $mysqli->query("SELECT stock FROM Books WHERE book_id = " . $book_id . "");
  $stock = $stock->fetch_object()->stock;
  $description = $mysqli->query("SELECT description FROM Books WHERE book_id = " . $book_id . "");
  $description = $description->fetch_object()->description;

  // Display Information
  echo "
    <div class='container' style='width: 60rem'>
    <div style='display:flex; font-size: 22px'>
      <img src=" . $cover . " height=400'>
      <div style='padding-top:50px; padding-left: 80px'>
        <strong>" . $title . " <br>by " . $author . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>" . $year . "</small></strong>
        <hr>
        <form method='post'><big>" . $price . "</big>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style='color: #F9F8EB; background-color: #5C8D89; height: 2.5rem; width: 9rem' class='btn btn-light' type='submit' name='submit'>
            <i class='bi bi-bag-plus' style='font-size: 22px'></i>&nbsp;
            <span style='font-size: 18px'>Add to Bag</span>
          </button></form>
        <hr><br>
        <p style='font-size: 18px'>" . $description . "</p><br>
        <hr>
      </div>
    </div><br><br><br>"
  ?>

  <!-- Resources -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

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
          <li class="nav-item mb-2"><a href="../login/profile.php" class="nav-link p-0 text-muted">Account</a></li>
          <li class="nav-item mb-2"><a href="../info/about_us.php" class="nav-link p-0 text-muted">About</a></li>
          <li class="nav-item mb-2"><a href="../info/about_dashboard.php" class="nav-link p-0 text-muted">Dashboard</a></li>

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

  å

</html>