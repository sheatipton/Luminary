<?php
require_once "../setup/db.connect.php";

// Process Data
$register_err = "";
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zip"])) {
  $type = 1;
  $name = addslashes(trim($_POST["name"]));
  $email = addslashes(trim($_POST["email"]));
  $address = addslashes(trim($_POST["address"]));
  $city = addslashes(trim($_POST["city"]));
  $state = addslashes(trim($_POST["state"]));
  $zip = addslashes(trim($_POST["zip"]));
  $passHash = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
  $insertSql = "INSERT INTO Users (type, name, email, address, city, state, zip, dob, password) VALUES ('" . $type . "','" . $name . "', '" . $email . "', '" . $address . "', '" . $city . "','" . $state . "','" . $zip . "', '2022', '" . $passHash . "')";

  if ($_POST["password"] == $_POST["confirm_password"] && $_POST["password"] != "") {
    if ($mysqli->query($insertSql) == TRUE) {
      $sql = "SELECT email FROM Users WHERE email = '" . $email . "'";
      $result = $mysqli->query($sql);

      if (mysqli_num_rows($result) == 1) {
        $user_id = $result->fetch_object()->user_id;
        setcookie("user_id", $user_id, 0, '/');
      }
    } else {
      if ($mysqli->errno == 1062) {
        $register_err = "That email has already been used.";
      } else {
        $register_err = "Could not create user.";
      }
    }
  } else {
    $register_err = "Passwords do not match.";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="stylesheet" href="../style/index.css">
  <title>Sign Up</title>
</head>

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
  <h2 style="font-size: 30px">Sign Up</h2>
  <h5>for a FREE Author Account</h5>
</div>

<body>
  <main class="form-signin" style="text-align: center">

    <!-- Data Form -->
    <form method="post" style="display: inline-block">
      <div class="form-floating" style="width: 30rem;">
        <input style="height: 40px; font-size: 20px" type="text" name="name" class="form-control" placeholder="Full Name" required><br>
        <input style="height: 40px; font-size: 20px" type="email" name="email" class="form-control" placeholder="Email" required><br>
        <input style="height: 40px; font-size: 20px" type="text" name="address" class="form-control" placeholder="Address" required><br>
        <div style="display:inline-flex">
          <input style="height: 40px; font-size: 20px" type="text" name="city" class="form-control" placeholder="City" required>&nbsp;
          <select style="height: 40px; font-size: 20px" name="state" class="form-control" style="width: 85px; height: 37px;" required>
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
          </select>&nbsp;
          <input style="height: 40px; font-size: 20px" type="text" name="zip" class="form-control" placeholder="Zip" required><br>
        </div><br><br>
        <input style="height: 40px; font-size: 20px" type="password" name="password" class="form-control" placeholder="Password" minLength=6 required><br>
        <input style="height: 40px; font-size: 20px" type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" minlength="6" required><br>

      </div>
      <?php
      if (!empty($register_err)) {
        echo '<div style="color:#AF0606;">' . $register_err . '</div><br>';
      }
      ?>
      <button class="btn btn-light" style="background-color: #74B49B; color: white; width: 200px; font-size: 20px" type="submit">Create Account</button>
      <div style="font-size: 18px"><br><br>
        Already have an account? <a href="./login.php"><u>Login here</u></a><br>

        Are you a customer? <a href="./register.php"><u>Sign up here</u></a>
        <br><br><br>
        <hr>
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
          <li class="nav-item mb-2"><a href="./browse/new.php" class="nav-link p-0 text-muted">New In</a></li>
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