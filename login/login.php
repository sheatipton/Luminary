<?php
require_once "../setup/db.connect.php";

// Process Data
if (isset($_POST["email"]) && isset($_POST["password"])) {
  $email = addslashes(trim($_POST["email"]));
  $sql = "SELECT email, password FROM Users WHERE email = '" . $email . "'";

  $result = $mysqli->query($sql);
  if (mysqli_num_rows($result) == 1) {
    $name = $result->fetch_object();
    $hash = $name->password;

    // process password hash
    if (password_verify(trim($_POST["password"]), $hash)) {
      if ($email == "admin@email.com") {
        // if admin logs in
        $user_id = "0";
        setcookie("user_id", $user_id, 0, '/');
      } else {
        // if customer or author logs in
        $sql = "SELECT user_id FROM Users WHERE email = '" . $_POST["email"] . "'";
        $result = $mysqli->query($sql);
        if (mysqli_num_rows($result) == 1) {
          $user_id = $result->fetch_object()->user_id;
          setcookie("user_id", $user_id, '0', '/');
        }
      }
      header("Location: ../index.php");
    } else {
      $login_err = "Email or Password were incorrect.";
    }
  } else {
    $login_err = "Email or Password were incorrect.";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="icon" href="../favicon_io/favicon.ico">
  <link rel="stylesheet" href="../style/index.css">
  <title>Login</title>
</head>

    <!--  Luminary Logo -->
    <header class="py-3 mb-4 border-bottom">
      <div class="container d-flex flex-wrap justify-content-center">
        <a href="../index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="10" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
          <i class="bi bi-stars" style="font-size: 20px"></i>
          <img src="../images\moon.png" style="height: 70px" alt="moonImg" class="moonimg">
          <p style="font-size: 40px; padding-top: 15px; padding-left: 35px; padding-right: 35px">Luminary - Online Bookstore</p>
          <img src="../images\sun.png" style="height: 80px; width: 80px" alt="sunImg" class="sunimg">
        </a>
      </div>
    </header>

    <!--  Title Banner -->
    <div class="container banner" style="position: relative; text-align: center; margin-bottom: 3rem;">
      <br><br><br>
      <h2 style="font-size: 45px">Login</h2>
    </div>

    <body>
  <main class="form-signin" style="text-align: center">

    <!-- Data Form -->
    <div>
      <form method="post" style="display: inline-block">
        <div class="form-floating" style="width: 30rem;">
          <input style="height: 60px; font-size: 26px" type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address">
        </div><br>
        <div class="form-floating" style="width: 30rem;">
          <input style="height: 60px; font-size: 26px" type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        </div><br>
        <?php
        if (!empty($login_err)) {
          echo '<div style="color:#AF0606;">' . $login_err . '</div><br>';
        }
        ?>

        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-light" style="background-color: #74B49B; color: white; width: 275px; font-size: 26px" type="submit">Sign in</button>
        <div style="font-size: 22px"><br><br>
          Don't have an account?<br>Register <a href="./register.php" style="text-decoration: underline">here</a>
          <br><br><br><hr>
        </div>
    </div>
    </form>
  </main><br><br><br>

  <!-- Resources -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- Footer -->
<div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>BROWSE CATEGORIES</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="./browse/bestsellers.php" class="nav-link p-0 text-muted">Bestsellers</a></li>
          <li class="nav-item mb-2"><a href="./browse/new_releases.php" class="nav-link p-0 text-muted">New In</a></li>
          <li class="nav-item mb-2"><a href="./browse/fiction.php" class="nav-link p-0 text-muted">Fiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/nonfiction.php" class="nav-link p-0 text-muted">Nonfiction</a></li>
          <li class="nav-item mb-2"><a href="./browse/classics.php" class="nav-link p-0 text-muted">Classics</a></li>
          <li class="nav-item mb-2"><a href="./browse/all_books.php" class="nav-link p-0 text-muted">Browse All</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>QUICK HELP</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="./login/profile.php" class="nav-link p-0 text-muted">Account</a></li>
          <li class="nav-item mb-2"><a href="../info/about_us.php" class="nav-link p-0 text-muted">About</a></li>
          <li class="nav-item mb-2"><a href="../info/faq.php" class="nav-link p-0 text-muted">FAQ</a></li>
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

</html>