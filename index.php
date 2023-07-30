<?php
require_once "./setup/db.connect.php";

// Check if logged in, retrieve data if true
$loggedIn = false;
$type = 0;
if (isset($_COOKIE["user_id"])) {
  $loggedIn = true;
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $type = $mysqli->query("SELECT type FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $type = $type->fetch_object()->type;
  $bagNumber = $mysqli->query("SELECT * FROM Bag WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $bagNumber = mysqli_num_rows($bagNumber);
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

<!-- Search Function -->
<script>
  function processSearch() {
    var searchValue = document.getElementById('thesearch').value;
    window.location.href = "./browse/search.php?thesearch=" + searchValue;
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
  <link rel="icon" href="./images/favicon.ico">
  <link rel="stylesheet" href="./style/index.css">
  <title>Home</title>
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
          <li class="nav-item"><a href="./info/about.php" class="nav-link link-dark px-2 toplink">About&nbsp;&nbsp;<i class="bi bi-card-text"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">

            <?php if ($loggedIn && $type == 0) : ?>
              <a href="./admin/admin_dash.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php elseif ($loggedIn && $type == 1) : ?>
              <a href="./author/author_dash.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php elseif ($loggedIn && $type == 2) : ?>
              <a href="./info/dashboard.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
              <?php elseif (!$loggedIn) : ?>
              <a href="./info/dashboard.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php endif; ?>

          </li>
        </ul>

        <!-- Logo -->
        <a href="./index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <ul class="nav">
            <i class="bi bi-moon-stars" style="font-size: 20px; padding-top: 10px; padding-left: 1rem"></i>
            <p style="font-size: 22px; padding-top: 5px; padding-left: 1rem; padding-right: 1rem">Luminary</p>
            <i class="bi bi-stars" style="font-size: 15px; padding-top: 12px; padding-right: 1rem"></i>
          </ul>
        </a>

        <ul class="nav">

          <?php if ($loggedIn) : ?>
            <li class="nav-item"><a href="./bag/shoppingbag.php" class="nav-link link-dark px-2 toplink toplink"><?php echo $bagNumber .= ' in bag' ?>&nbsp;&nbsp;&nbsp;<i class="bi bi-bag-heart"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item"><a href="./info/profile.php" class="nav-link link-dark px-2 toplink toplink">Account&nbsp;&nbsp;&nbsp;<i class="bi bi-person-square"></i></a></li>&nbsp;&nbsp;&nbsp;
          <?php elseif (!$loggedIn) : ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item"><a href="login/login.php" class="nav-link link-dark px-2 toplink toplink">Login</a></li>
            <li class="nav-item"><a href="login/register.php" class="nav-link link-dark px-2 toplink toplink">Sign up</a></li>
          <?php endif; ?>

        </ul>
      </div>
    </nav>

    <!-- Search Bar -->
    <header class="py-2 mb-2 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-2 mb-lg-0">
          <div class="input-icons">
            <a onclick="processSearch()"><i class="bi bi-search-heart icon" style="font-size: 22px; padding-top: 10px; color: teal"></i><a>
                <input type="search" id="thesearch" name="thesearch" style="font-size: 20px; width: 700px; height: 40px; padding-left: 60px" class="form-control input-field" placeholder="Search by Title, Author, or Keyword" aria-label="Search">
          </div>
        </form>
      </div>
    </header>

    <!-- Categories Navigation Bar -->
    <header class="border-bottom">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link underlinelink" style="color:black; font-size:22px;" href="./browse/browse.php?category=bestseller">Bestsellers</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <a class="nav-link underlinelink" style="color:black; font-size:22px;" href="./browse/browse.php?category=new">New In</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <a class="nav-link underlinelink" style="color:black; font-size:22px;" href="./browse/browse.php?category=collections">Collections</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link underlinelink" style="color:black; font-size:22px;" href="./browse/browse.php?category=fiction">Fiction</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link underlinelink" style="color:black; font-size:22px;" href="./browse/browse.php?category=nonfiction">Nonfiction</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link underlinelink" style="color:black; font-size:22px;" href="./browse/browse.php?category=classic">Classics</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <a class="nav-link underlinelink" style="color:black; font-size:22px;" href="./browse/browse.php?category=all">Browse All</a>
        </li>
      </ul>
    </header>
    <br><br>
  </div>

  <!--  Poster Carousel -->
  <div class="container">
    <div class="row">
      <div class="col-5">
        <div class="container" style="padding-left: 8rem;">
          <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carousel2" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner" style="width: 20rem; height: 30rem">
              <div class="carousel-item active">
                <img src="images/harrypotter_poster.jpg" style="width: 20rem; height: 30rem">
              </div>
              <div class="carousel-item">
                <img src="images/moon_poster.jpg" style="width: 20rem; height: 30rem">
              </div>
              <div class="carousel-item">
                <img src="images/gameofthrones_poster.jpg" style="width: 20rem; height: 30rem">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <?php
      // Featured Books
      $sql = $mysqli->query("SELECT book_id FROM Books WHERE title = 'normal people'");
      $normal = $sql->fetch_object()->book_id;
      $sql = $mysqli->query("SELECT book_id FROM Books WHERE title = 'daisy jones & the six'");
      $daisy = $sql->fetch_object()->book_id;
      $sql = $mysqli->query("SELECT book_id FROM Books WHERE title = 'the summer i turned pretty'");
      $pretty = $sql->fetch_object()->book_id;
      $sql = $mysqli->query("SELECT book_id FROM Books WHERE title = 'the spanish love deception'");
      $spanish = $sql->fetch_object()->book_id;
      $sql = $mysqli->query("SELECT book_id FROM Books WHERE title = 'emma'");
      $emma = $sql->fetch_object()->book_id;
      $sql = $mysqli->query("SELECT book_id FROM Books WHERE title = 'a little life'");
      $littlelife = $sql->fetch_object()->book_id;
      $sql = $mysqli->query("SELECT book_id FROM Books WHERE title = 'it starts with us'");
      $itstarts = $sql->fetch_object()->book_id;
      ?>

      <!-- Promo Materials -->
      <div class="col-7">
        <h3 class="text-center">Our Picks This Month<i class="bi bi-balloon-heart" style="color:palevioletred"></i></h3><br>
        <div style="padding-left: 3rem">
        <a href='./browse/book_info.php?book_id=<?php echo $normal ?>'><img src="./book_covers/normalpeople.jpg" width='125' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='./browse/book_info.php?book_id=<?php echo $daisy ?>'><img src="./book_covers/daisyjonesandthesix.jpg" width='125' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='./browse/book_info.php?book_id=<?php echo $pretty ?>'><img src="./book_covers/thesummeriturnedpretty.jpg" width='125' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='./browse/book_info.php?book_id=<?php echo $spanish ?>'><img src="./book_covers/thespanishlovedeception.jpg" width='125' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='./browse/book_info.php?book_id=<?php echo $emma ?>'><img src="./book_covers/emma.jpg" width='125' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='./browse/book_info.php?book_id=<?php echo $littlelife ?>'><img src="./book_covers/alittlelife.jpg" width='125' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href='./browse/book_info.php?book_id=<?php echo $itstarts ?>'><img src="./book_covers/itstartswithus.jpg" width='125' height='200'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div></div><br>
    </div>

    <br><br><br>
    <div class="container">
      <!-- Mission Statement -->
      <div class="poster">
        <img src="images/flyingbook_mission.jpg" style="width: 50rem; filter: brightness(80%) contrast(50%);">
        <div class="centered" style="font-size: 24px; width: 550px">
          <h4>OUR MISSION</h4>
          <p>At Luminary, we aim to provide an enchanting shopping experience for book lovers everywhere.<br>We believe that books are meant to be loved.</p>
        </div>
      </div>
    </div>
    <br><br><br>

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
          <li class="nav-item mb-2"><a href="./browse/browse.php?category=bestseller" class="nav-link p-0 text-muted">Bestsellers</a></li>
          <li class="nav-item mb-2"><a href="./browse/browse.php?category=new" class="nav-link p-0 text-muted">New In</a></li>
          <li class="nav-item mb-2"><a href="./browse/browse.php?category=fiction" class="nav-link p-0 text-muted">Fiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/browse.php?category=nonfiction" class="nav-link p-0 text-muted">Nonfiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/browse.php?category=classic" class="nav-link p-0 text-muted">Classics</a></li>
          <li class="nav-item mb-2"><a href="./browse/browse.php?category=all" class="nav-link p-0 text-muted">Browse All</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>QUICK HELP</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="./info/profile.php" class="nav-link p-0 text-muted">Account</a></li>
          <li class="nav-item mb-2"><a href="./info/about.php" class="nav-link p-0 text-muted">About</a></li>
          <li class="nav-item mb-2"><a href="./info/dashboard.php" class="nav-link p-0 text-muted">Dashboard</a></li>
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

</html>