<?php
require_once "./setup/db.connect.php";

// check if logged in, set $user_id if true
$loggedIn = false;
$type = 0;
if (isset($_COOKIE["user_id"])) {
  $loggedIn = true;
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $type = $mysqli->query("SELECT type FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $type = $type->fetch_object()->type;
  $cartNumber = $mysqli->query("SELECT * FROM Cart WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $cartNumber = mysqli_num_rows($cartNumber);
  $name = $mysqli->query("SELECT name FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $name = $name->fetch_object()->name;
  $email = $mysqli->query("SELECT email FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $email = $email->fetch_object()->email;
  $address = $mysqli->query("SELECT address FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $address = $address->fetch_object()->address;
  $city = $mysqli->query("SELECT city FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $city = $city->fetch_object()->city;
  $state = $mysqli->query("SELECT state FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $state = $state->fetch_object()->state;
  $zip = $mysqli->query("SELECT zip FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $zip = $zip->fetch_object()->zip;
  $dob = $mysqli->query("SELECT dob FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $dob = $dob->fetch_object()->dob;
}
?>

<script>
  function processSearch() {
  var searchValue = document.getElementById('thesearch').value;
	window.location.href = "./browse/search.php?thesearch=" + searchValue;
}
</script>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="icon" href="favicon_io/favicon.ico">
  <link rel="stylesheet" href="style/index.css">
  <title>Luminary - Online Bookstore</title>
</head>

<body>
  <div class="topbar">
    <p class="offer">USE PROMO CODE 'TENOFF' TO SAVE $10</p>
  </div>

  <div class="header">
    <nav class="py-2 bg-light border-bottom">
      <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
          <li class="nav-item"><a href="#categories" class="nav-link link-dark px-2">Browse</a></li>
          <li class="nav-item"><a href="./info/about_us.php" class="nav-link link-dark px-2">About Us</a></li>
          <li class="nav-item"><a href="./faq.html" class="nav-link link-dark px-2">FAQ</a></li>

          <?php if ($loggedIn && $type == 0) : ?>
            <li class="nav-item"><a href="./admin/admin_dash.php" class="nav-link link-dark px-2">Admin Management</a></li>
          <?php elseif ($loggedIn && $type == 1) : ?>
            <li class="nav-item"><a href="./vendor/bookManagement/products.php" class="nav-link link-dark px-2">Vendor Management</a></li>
          <?php endif; ?>
        </ul>
        <ul class="nav">

          <?php if ($loggedIn) : ?>
            <li class="nav-item"><a href="./cart/shoppingbag.php" class="nav-link link-dark px-2"><?php echo $cartNumber .= ' in cart'?>&nbsp;&nbsp;&nbsp;<i class="bi bi-bag-heart"></i></a></li>&nbsp;&nbsp;&nbsp;
            <li class="nav-item"><a href="./info/profile.php" class="nav-link link-dark px-2" style="margin-top:5px;"><i class="bi bi-person-bounding-box"></i></a></li>&nbsp;
            <li class="nav-item"><a href="login/logout.php" class="nav-link link-dark px-2 toplink">Logout</a></li>
          <?php elseif (!$loggedIn) : ?>
            <li class="nav-item"><a href="login/login.php" class="nav-link link-dark px-2 toplink">Login</a></li>
            <li class="nav-item"><a href="login/register.php" class="nav-link link-dark px-2 toplink">Sign up</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <header class="py-3 mb-4 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <a href="index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
          <img src="images\sun.png" alt="sunImg" class="sunimg">
          <span class="fs-4 navbar-brand">Luminary</span>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
          <div class="input-icons">
          <a onclick="processSearch()"><i class="bi bi-search-heart icon"></i><a>
            <input type="search" id="thesearch" name="thesearch" style="width: 120%" class="form-control input-field" placeholder="Search Title, Author, or ISBN" aria-label="Search">
          </div>
        </form>
      </div>
    </header>
  </div>

  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="http://www.judynewmanatscholastic.com/content/judyblog/en/blog/2020/12/Zen-shorts-jon-j-muth/_jcr_content/par/heroimage.img.jpg/1606861699005.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images\lu-ad.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images\featured.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <a class="anchor" id="categories">
    <h1 style="padding-top: 50px; text-align: center">Browse Books by Category</h1>
    <div class="row py-5 text-center" style="margin-bottom:5rem;">
      <!-- <div class="row" style="margin-bottom: 20px; margin-top: 20px;"> -->
      <div class="col-lg-2 col-md-4">
        <img src="images\bookshelf.png" width="120" height="120" background="#777" color="#777">
        <p><a class="btn btn-secondary gen" href="./browse/all_books.php">All Books &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-2 col-md-4">
        <img src="images\biography.png" width="120" height="120" background="#777" color="#777">
        <p><a class="btn btn-secondary gen" href="./browse/fiction.php">Fiction &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-2 col-md-4">
        <img src="images\tragedy.png" width="120" height="120" background="#777" color="#777">
        <p><a class="btn btn-secondary gen" href="./browse/nonfiction.php">Nonfiction &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-2 col-md-4">
        <img src="images\book.png" width="120" height="120" background="#777" color="#777">
        <p><a class="btn btn-secondary gen" href="./browse/classics.php">Classics &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-2 col-md-4">
        <img src="images\bookstore.png" width="120" height="120" background="#777" color="#777">
        <p><a class="btn btn-secondary gen" href="./browse/new_releases.php">New Releases &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-2 col-md-4">
        <img src="images\quran.png" width="120" height="120" background="#777" color="#777">
        <p><a class="btn btn-secondary gen" href="./browse/bestsellers.php">Bestsellers &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div>

    <div class="poster">
      <img src="images\flyingbook.jpg" style="width: 100%; filter: brightness(80%) contrast(50%);">
      <div class="centered">
        <h4>OUR MISSION</h4>
        <p>Luminary's mission is to operate the best omni-channel specialty retail business in America, helping both our customers and booksellers reach their aspirations, while being a credit to the communities we serve.</p>
      </div>
    </div>

  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

<!-- <footer class="footer"> -->
<div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>SHOP BY CATEGORY</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="./browse/all_books.php" class="nav-link p-0 text-muted">All Books</a></li>
          <li class="nav-item mb-2"><a href="./browse/fiction.php" class="nav-link p-0 text-muted">Fiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/nonfiction.php" class="nav-link p-0 text-muted">Nonfiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/classics.php" class="nav-link p-0 text-muted">Classics</a></li>
          <li class="nav-item mb-2"><a href="./browse/new_releases.php" class="nav-link p-0 text-muted">New Releases</a></li>
          <li class="nav-item mb-2"><a href="./browse/bestsellers.php" class="nav-link p-0 text-muted">Bestsellers</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>QUICK HELP</h5>
        <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="./info/profile.php" class="nav-link p-0 text-muted">View Profile</a></li>
          <li class="nav-item mb-2"><a href="./info/about_us.php" class="nav-link p-0 text-muted">About Us</a></li>
          <li class="nav-item mb-2"><a href="./faq.html" class="nav-link p-0 text-muted">FAQs</a></li>
        </ul>
      </div>

      <div class="col-4 offset-1">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-light" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>&copy; 2022 Luminary, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#twitter" />
            </svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#instagram" />
            </svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
              <use xlink:href="#facebook" />
            </svg></a></li>
      </ul>
    </div>
  </footer>

</html>
