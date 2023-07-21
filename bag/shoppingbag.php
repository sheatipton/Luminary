<?php
require_once "../setup/db.connect.php";

// Check if logged in, retrieve data if true
$loggedIn = false;
if (isset($_COOKIE["user_id"])) {
  $bagNumber = $mysqli->query("SELECT * FROM Bag WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $bagNumber = mysqli_num_rows($bagNumber);
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
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
  $loggedIn = true;
} else {
  $loggedIn = false;
}

// Action for Remove Item from Bag
if (array_key_exists('remove', $_GET)) {
  $id = $_GET['remove'];
  $bag = "DELETE FROM Bag WHERE bag_item_id=$id;";
  $result = $mysqli->query($bag);
  echo "<script>window.location.href='./shoppingbag.php';</script>";
}

// Pull from DB
$bag = "SELECT * FROM bag INNER JOIN Books ON bag.book_id = Books.book_id WHERE bag.user_id = $user_id";
$result = $mysqli->query($bag);
$total = 0;

?>

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
  <title>Shopping Bag</title>
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
          <li class="nav-item"><a href="../info/about.php" class="nav-link link-dark px-2 toplink">About&nbsp;&nbsp;<i class="bi bi-card-text"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <li class="nav-item">

            <?php if ($loggedIn && $type == 0) : ?>
              <a href="../admin/admin_dash.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php elseif ($loggedIn && $type == 1) : ?>
              <a href="../author/author_dash.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php elseif ($loggedIn && $type == 2) : ?>
              <a href="../info/dashboard.php" class="nav-link link-dark px-2 toplink">
                Dashboard&nbsp;&nbsp;<i class="bi bi-bar-chart-line"></i>
              </a>
            <?php endif; ?>

          </li>
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
            <li class="nav-item"><a href="../bag/shoppingbag.php" class="nav-link link-dark px-2 toplink"><?php echo $bagNumber .= ' in bag' ?>&nbsp;&nbsp;&nbsp;<i class="bi bi-bag-heart"></i></a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item"><a href="../info/profile.php" class="nav-link link-dark px-2 toplink toplink">Account&nbsp;&nbsp;&nbsp;<i class="bi bi-person-square"></i></a></li>&nbsp;&nbsp;&nbsp;
          <?php elseif (!$loggedIn) : ?>
            <li class="nav-item"><a href="../login/login.php" class="nav-link link-dark px-2 toplink toplink">Login</a></li>
            <li class="nav-item"><a href="../login/register.php" class="nav-link link-dark px-2 toplink toplink">Sign up</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <!-- Search Bar -->
    <header class="py-2 mb-2 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0">
          <div class="input-icons">
            <a onclick="processSearch()"><i class="bi bi-search-heart icon" style="font-size: 22px; padding-top: 10px; color: teal"></i><a>
                <input type="search" id="thesearch" name="thesearch" style="font-size: 20px; width: 500px; height: 40px; padding-left: 60px" class="form-control input-field" placeholder="Search by Title, Author, or Keyword" aria-label="Search">
          </div>
        </form>
      </div>
    </header>

    <!-- Categories Navigation Bar -->
    <header class="border-bottom">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="../browse/bestsellers.php">Bestsellers</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <a class="nav-link" style="color:black; font-size:22px;" href="../browse/new.php">New In</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="../browse/collections.php">Collections</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="../browse/fiction.php">Fiction</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="../browse/nonfiction.php">Nonfiction</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <li class="nav-item">
          <a class="nav-link" style="color:black; font-size:22px;" href="../browse/classics.php">Classics</a>
        </li>
        <p style="font-size: 25px; opacity: 0.3">|</p>
        <a class="nav-link" style="color:black; font-size:22px;" href="../browse/all_books.php">Browse All</a>
        </li>
      </ul>
    </header>
    <br><br>
  </div>

  <!-- Title Banner -->
  <div class="container banner" style="position: relative; text-align: center; margin-bottom: 3rem;">
    <h2 style="font-size: 30px">Shopping Bag</h2>
  </div>

  <!-- Bag Information -->
  <div class="row justify-content-center">
    <div class="card" style="font-size: 26px; width: 60rem">
      <div class="logo p-2 d-flex justify-content-between text-left px-5">
        <span style="font-size: 30px;">Summary</span>
      </div>
      <div class="product border-bottom table-responsive px-5">
        <table class="table table-borderless">
          <tbody>
            <?php
            if (mysqli_num_rows($result) == 1) {
              $rows = mysqli_num_rows($result);
            }

            // Add Totals from Bag
            while ($row = mysqli_fetch_assoc($result)) {
              $total = $total + $row['price'];
            ?>
              <tr>
                <td width="15%">
                  <img class="cover" src="../<?= $row['cover'] ?>" width="100" style="padding-bottom: 25px">
                </td>

                <td width="60%" class="product-qty">
                  <span class="font-weight-bold"><?= $row['title'] ?></span><br>
                  <span>by <?= $row['author'] ?></span><br>
                </td>

                <td width="20%" class="product-qty">
                  <div class="text-right">
                    <span class="font-weight-bold">$<?= $row['price'] ?></span><br>
                    <span><a href="shoppingbag.php?remove=<?= $row['bag_item_id'] ?>" style="text-decoration: underline; text-decoration-thickness: 2px">Remove</a></span>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Subtotal and Proceed Buttons -->
      <div class="row d-flex justify-content-end px-5" style="font-size: 28px">
        <div class="col-md-5" style="padding-bottom: 1.5rem;">
          <div class="text-right">
            <form action="./checkout.php?subtotal='<? echo $total ?>'" method="get">
              <table class="table table-borderless">
                <tbody class="totals">
                  <tr class="border-top border-bottom ">
                    <td>
                      <div class="text-left">
                        <span class="font-weight-bold">Subtotal</span>
                      </div>
                    </td>
                    <td>
                      <div class="text-right">
                        <span class="font-weight-bold">$<?= $total ?></span>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button class="btn btn-outline-success" type="submit" style="width: 22rem; font-size: 28px">Proceed to Checkout</button>
            </form>
            <div style="padding-top: 10px">
              <a href="javascript:history.back(2)"><button class="btn btn-outline-secondary" type="submit" style="width: 22rem; font-size: 28px">Continue Shopping</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

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
          <li class="nav-item mb-2"><a href="./info/profile.php" class="nav-link p-0 text-muted">Account</a></li>
          <li class="nav-item mb-2"><a href="./info/about.php" class="nav-link p-0 text-muted">About</a></li>

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

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    function increment() {
      document.getElementById('demoInput').stepUp();
    }

    function decrement() {
      document.getElementById('demoInput').stepDown();
    }
  </script>

</html>