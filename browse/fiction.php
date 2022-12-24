<?php
require_once "../setup/db.connect.php";

// check if logged in, set $user_id if true
$loggedIn = false;
if (isset($_COOKIE["user_id"])) {
  $loggedIn = true;
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $cartNumber = $mysqli->query("SELECT * FROM Cart WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $cartNumber = mysqli_num_rows($cartNumber);
}
?>

<script>
  function processSearch() {
  var searchValue = document.getElementById('thesearch').value;
	window.location.href = "./search.php?thesearch=" + searchValue;
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
  <link rel="icon" href="../favicon_io/favicon.ico">
  <link rel="stylesheet" href="../style/browse.css">
  <title>Luminary - Fiction</title>
</head>

<body>

  <div class="header">
    <nav class="py-2 bg-light border-bottom">
      <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
          <li class="nav-item"><a href="../index.php" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>&nbsp;&nbsp;&nbsp;
          <li class="nav-item"><a href="../index.php#categories" class="nav-link link-dark px-2">Back to Browse</a></li>&nbsp;&nbsp;&nbsp;
        </ul>

        <ul class="nav">
          <?php if ($loggedIn) : ?>
            <li class="nav-item"><a href="../cart/shoppingbag.php" class="nav-link link-dark px-2 toplink"><i class="bi bi-bag-heart">
              <span class="cartbadge"><?php echo $cartNumber .= ' in bag'?></span></i></a>
            </li>&nbsp;&nbsp;
            <li class="nav-item"><a href="../info/profile.php" class="nav-link link-dark px-2" style="margin-top:5px;"><i class="bi bi-person-bounding-box"></i></a></li>&nbsp;
            <li class="nav-item"><a href="../login/logout.php" class="nav-link link-dark px-2 toplink">Logout</a></li>
          <?php elseif (!$loggedIn) : ?>
            <li class="nav-item"><a href="../login/login.php" class="nav-link link-dark px-2 toplink">Login</a></li>
            <li class="nav-item"><a href="../login/register.php" class="nav-link link-dark px-2 toplink">Sign up</a></li>
          <?php endif; ?>
        </ul>
      </div>

    </nav>
    <header class="py-3 mb-4 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <a href="../index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
          <img src="../images\sun.png" alt="sunImg" class="sunimg">
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

  <div class="container banner" style="position: relative; text-align: center; margin-bottom: 3rem;">
    <img src="https://www.onlygfx.com/wp-content/uploads/2019/03/7-light-green-watercolor-brush-stroke-6.png" alt="banner" style="width:30%; filter: opacity(50%) saturate(70%);">
    <div class="centered"><h2>Fiction</h2></div>
  </div>

  <div class="container">

    <!-- adding to Cart -->
    <?php
    if (isset($_POST["submit"])) {
      if ($loggedIn == true) {
        $isbn = $_POST['get_id'];
        $addToCartSql = "INSERT INTO Cart (user_id, isbn, quantity) VALUES ('" . $user_id . "', '" . $isbn . "', 1)";
        $mysqli->query($addToCartSql);
        echo ("<meta http-equiv='refresh' content='0'>");
      } else {
        header("Location: ../login/login.php");
      }
    }

    // display books
    $sql = "SELECT * FROM Books WHERE subject = 'Fiction'";
    $result = $mysqli->query($sql);
    $rows = mysqli_num_rows($result);

    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      $isbn[$i] = $row['isbn'];
      $image[$i] = "../";
      $image[$i] .= $row['image'];
      $title[$i] = $row['title'];
      $price[$i] = $row['price'];
      $i++;
    }
    $newrow = 1;

    for ($i = 1; $i <= count($title); $i++) {
      echo
      "<div class='book' style='display: table-cell; text-align: center; padding-left: 55px; padding-bottom: 20px;'>
      <img style='padding-bottom: 20px;' src=" . $image[$i] . " width='185' height='260'>
            <form method='post'>
            <button style='color: #F9F8EB; background-color: #5C8D89; height: 2.5rem;' class='btn btn-light' type='submit' name='submit'>
              <i class='bi bi-bag-plus'></i>
            </button>
              <a href='./book_info.php?isbn=" . $isbn[$i] . "' style='color: #F9F8EB; background-color: #5C8D89; height: 2.5rem;' class='btn btn-light'>View</button>
            </a>
            <input type='hidden' value=" . $isbn[$i] . " name='get_id'/>
            </form>
            </div>";

      if ($newrow == 5) {
        $newrow = 0;
        echo "<br><br>";
      }
      $newrow++;
    }
    ?>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<!-- footer -->
<div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>SHOP BY CATEGORY</h5>
        <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="./all_books.php" class="nav-link p-0 text-muted">All Books</a></li>
          <li class="nav-item mb-2"><a href="./fiction.php" class="nav-link p-0 text-muted">Fiction</a></li>
          <li class="nav-item mb-2"><a href="./nonfiction.php" class="nav-link p-0 text-muted">Nonfiction</a></li>
          <li class="nav-item mb-2"><a href="./classics.php" class="nav-link p-0 text-muted">Classics</a></li>
          <li class="nav-item mb-2"><a href="./new_releases.php" class="nav-link p-0 text-muted">New Releases</a></li>
          <li class="nav-item mb-2"><a href="./bestsellers.php" class="nav-link p-0 text-muted">Bestsellers</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>QUICK HELP</h5>
        <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="../info/profile.php" class="nav-link p-0 text-muted">View Profile</a></li>
          <li class="nav-item mb-2"><a href="../info/about_us.php" class="nav-link p-0 text-muted">About Us</a></li>
          <li class="nav-item mb-2"><a href="../faq.html" class="nav-link p-0 text-muted">FAQs</a></li>
        </ul>
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
