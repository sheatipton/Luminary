<?php
require_once "../setup/db.connect.php";

// process form data on submit
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
        // if customer or publisher logs in
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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="icon" href="../favicon_io/favicon.ico">
  <link rel="stylesheet" href="../style/login.css">
  <title>Luminary - Login</title>
</head>

<body style="text-align: center; font-family: 'Tenor Sans', sans-serif; color: #403F48;">
  <main class="form-signin">
    <a href="../index.php">
      <h1 class="h3 mb-3 fw-normal">Luminary</h1>
    </a>
    <img class="mb-4" src="../images\sun.png" alt="sunFlaticon" height=60px weight=60px>
    <hr>
    <h4>Login</h4><br>

    <!-- login form -->
    <form method="post">
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address">
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      </div>
      <?php
      if (!empty($login_err)) {
        echo '<div style="color:#AF0606;">' . $login_err . '</div><br>';
      }
      ?>

      <div class="checkbox mb-3">
      </div>
      <button class="w-100 btn btn-lg btn-light" type="submit">Sign in</button>
      <div class="otherOptions">
        <a href="./register.php">Don't have an account? <strong>Register</strong></a><br>
        <p>Forgot password? Too bad</p>
      </div>

      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>