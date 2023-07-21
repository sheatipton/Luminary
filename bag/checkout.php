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
  <title>Checkout</title>
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
    <h2 style="font-size: 30px">Secure Checkout</h2>
  </div>
  <?php if (!$loggedIn) : ?>
    <h6> Are you a returing customer? <a href="../login/login.php"><u>Sign In</u></a></h6>
  <?php endif; ?>
  </div>

  <!-- Information Form -->
  <div class="container" style="width: 70rem">
    <div class="row g-5" style="font-size: 26px;">
      <div class="col-md-7 col-lg-8">
        <h3>Billing Information</h3>
        <form action="checkout.php" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" value="<?= $name ?>" name="firstname" placeholder="First Name" required>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="yourname@example.com" value="<?= $email ?>" required>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="<?= $address ?>" required>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or Suite" required>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Phone Number <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="phone" placeholder="###-###-####" required>
            </div>

            <div class="col-6">
              <label for="country" class="form-label">Country</label><br>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
            </div>
            <div class="col-6">
              <label for="state" class="form-label">State</label><br>
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
              </select>
            </div>

            <div class="col-6">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" placeholder="Athens" required>
            </div>

            <div class="col-6">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="30606" required>
            </div>
          </div>
        </form>
      </div>

      <!-- Shipping Options -->
      <div class="col-md-5 col-lg-4 order-md-last">
        <div class="card position-sticky top-0">
          <form action="checkout.php">
            <div class="p-3 bg-light bg-opacity-10" style="font-size: 22px">
              <h3 class="card-title mb-3">Shipping Options</h3>

              <!-- Shipping Options, removed for now -->
              <!--<div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="shipping" name="shipping" class="custom-control-input" value="1">
                <label class="custom-control-label" for="shipping" name="submit">Overnight: 1 Day ($15)</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="shipping" class="custom-control-input" value="2">
                <label class="custom-control-label" for="customRadioInline2">Express: 2-3 Days ($10)</label>
              </div>-->

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="shipping" class="custom-control-input" value="3" checked="checked">
                <label class="custom-control-label" for="customRadioInline3">Standard: 5-7 Days ($5)</label>
              </div>
              <p></p>
              <input type="text" class="form-control" name="promo" placeholder="Promo Code">
              <p></p>
              <button class="btn btn-light" style="background-color: #74B49B; color: white; width: 5rem; font-size: 18px;" type="submit">Submit</button>
            </div>
          </form>

          <!-- Action Buttons -->
          <div style="padding-bottom: 25px;">
            <?php include 'ordersummary.php'; ?>
            &nbsp;&nbsp;<a href="./payment.php?shipping=<?= $_GET['shipping'] ?>&promo=<?= $_GET['promo'] ?>"><button class="btn btn-light" style="background-color: #74B49B; color: white; width: 15rem; font-size: 26px">Checkout</button></a>
            <p></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2" style="padding: 20px 0px 70px">
      <a href="./shoppingbag.php"><button class="btn btn-outline-secondary" style="width: 250px; font-size: 26px" type="submit">Back to Summary</button></a>
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
            <li class="nav-item mb-2"><a href="../browse/bestsellers.php" class="nav-link p-0 text-muted">Bestsellers</a></li>
            <li class="nav-item mb-2"><a href="../browse/new.php" class="nav-link p-0 text-muted">New In</a></li>
            <li class="nav-item mb-2"><a href="../browse/fiction.php" class="nav-link p-0 text-muted">Fiction</a></li>
            <li class="nav-item mb-2"><a href="../browse/nonfiction.php" class="nav-link p-0 text-muted">Nonfiction</a></li>
            <li class="nav-item mb-2"><a href="../browse/classics.php" class="nav-link p-0 text-muted">Classics</a></li>
            <li class="nav-item mb-2"><a href="../browse/all_books.php" class="nav-link p-0 text-muted">Browse All</a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>QUICK HELP</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="../info/profile.php" class="nav-link p-0 text-muted">Account</a></li>
            <li class="nav-item mb-2"><a href="../info/about.php" class="nav-link p-0 text-muted">About</a></li>

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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>