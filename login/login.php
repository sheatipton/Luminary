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
          echo "<script>window.location.href='../index.php';</script>";
        }
      }
      echo "<script>window.location.href='../index.php';</script>";
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
  <link rel="icon" href="../images/favicon.ico">
  <link rel="stylesheet" href="../style/index.css">
  <title>Login</title>
</head>

<!-- Top Bar - Promo Code -->
<div class="topbar" style="height: 35px">
    <p class="offer" style="font-size: 16px"> USE PROMO CODE 'TENOFF' TO SAVE $10 on your first order!</p>
  </div>

<!-- Luminary Logo -->
<header class="py-3 mb-4 border-bottom">
  <div class="container d-flex flex-wrap justify-content-center">
    <a href="../index.php" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
          <ul class="nav">
          <i class="bi bi-moon-stars" style="font-size: 30px; padding-top: 10px; padding-left: 1rem"></i>
          <p style="font-size: 32px; padding-top: 5px; padding-left: 1rem; padding-right: 1rem">Luminary - Online Bookstore</p>
          <i class="bi bi-stars" style="font-size: 25px; padding-top: 12px; padding-right: 1rem"></i>
          </ul>
        </a>
  </div>
</header>

<!-- Title Banner -->
<div class="container banner" style="position: relative; text-align: center; margin-bottom: 3rem;">
  <br>
  <h2 style="font-size: 30px">Login</h2>
</div>

<body>
  <main class="form-signin" style="text-align: center">

    <!-- Data Form -->
    <div>
      <form method="post" style="display: inline-block">
        <div class="form-floating" style="width: 25rem;">
          <input style="height: 40px; font-size: 20px" type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address">
        </div><br>
        <div class="form-floating" style="width: 25rem;">
          <input style="height: 40px; font-size: 20px" type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        </div><br>
        <?php
        if (!empty($login_err)) {
          echo '<div style="color:#AF0606;">' . $login_err . '</div><br>';
        }
        ?>

        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-light" style="background-color: #74B49B; color: white; width: 200px; font-size: 20px" type="submit">Sign in</button>
        <div style="font-size: 18px"><br><br>
          Don't have an account?<br>Register <a href="./register.php" style="text-decoration: underline">here</a>
          <br><br><br>
          <hr>
        </div>
    </div>
    </form>
  </main><br>

  <!-- Resources -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- Footer -->
<?php include "../components/footer.html" ?>

</html>