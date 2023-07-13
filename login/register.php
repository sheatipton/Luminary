<?php
require_once "../setup/db.connect.php";

// Process Data
$register_err = "";
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["zip"]) && isset($_POST["dob"])) {
  $type = 2;
  $name = addslashes(trim($_POST["name"]));
  $email = addslashes(trim($_POST["email"]));
  $address = addslashes(trim($_POST["address"]));
  $city = addslashes(trim($_POST["city"]));
  $state = addslashes(trim($_POST["state"]));
  $zip = addslashes(trim($_POST["zip"]));
  $dob = addslashes(trim($_POST["dob"]));

  $passHash = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
  $insertSql = "INSERT INTO Users (type, name, email, address, city, state, zip, dob, password) VALUES ('" . $type . "','" . $name . "', '" . $email . "', '" . $address . "', '" . $city . "','" . $state . "','" . $zip . "', '" . $dob . "', '" . $passHash . "')";

  if ($_POST["password"] == $_POST["confirm_password"] && $_POST["password"] != "") {
    if ($mysqli->query($insertSql) == TRUE) {
      $sql = "SELECT email FROM Users WHERE email = '" . $email . "'";
      $result = $mysqli->query($sql);

      if (mysqli_num_rows($result) == 1) {
        $user_id = $result->fetch_object()->user_id;
        setcookie("user_id", $user_id, 0, '/');
        header("Location: ./login.php");
      }
    } else {
      if ($mysqli->errno == 1062) {
        $register_err = "That email has already been used.";
      } else {
        //$register_err = "Could not create user.";
        $register_err = $mysqli_error($mysqli);
      }
    }
  } else {
    $register_err = "Passwords do not match.";
  }
}

// not working, there is a problem with xampp configuration
function getActivationCode(): string {
  return bin2hex(random_bytes(4));
}

function send_activation_email(string $email, string $activation_code): void
{
    $subject = 'Your Luminary Activation Code';
    $message = "Hi,\nhere is your code:\n" . $activation_code;
    $header = "no-reply@email.com";

    echo "about to send: ";

    if (!mail("sheaelaine07@gmail.com", $subject, $message, $header)) {
      echo " notsent";
    } else {
      echo " sent";
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
  <title>Sign Up</title>
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
  <br><br><br><h2 style="font-size: 45px">Sign Up</h2>
  </div>

  <body>
  <main class="form-signin" style="text-align: center">

    <!-- Data Form -->
    <form method="post"  style="display: inline-block">
      <div class="form-floating"  style="width: 30rem;">
        <input style="height: 60px; font-size: 26px" type="text" name="name" class="form-control" placeholder="Full Name" required><br>
        <input style="height: 60px; font-size: 26px" type="email" name="email" class="form-control" placeholder="Email" required><br>
        <input style="height: 60px; font-size: 26px" type="text" name="address" class="form-control" placeholder="Address" required><br>
        <div style="display:inline-flex">
          <input style="height: 60px; font-size: 26px" type="text" name="city" class="form-control" placeholder="City" required>&nbsp;
          <select style="height: 60px; font-size: 26px" name="state" class="form-control" required>
            <option value="---">State</option>
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AR">AR</option>
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>
            <option value="WV">WV</option>
            <option value="WY">WY</option>
          </select>&nbsp;
          <input style="height: 60px; font-size: 26px" type="text" name="zip" class="form-control" placeholder="Zip" required>
        </div><br><br>
        <input style="height: 60px; font-size: 26px" type="text" name="dob" class="form-control" style="margin-bottom: 0.5rem;" placeholder="Date of Birth: mm/dd/yyyy" onfocus="(this.type='date')" required><br>
        <input style="height: 60px; font-size: 26px" type="password" name="password" class="form-control" placeholder="Password" title="Must contain at least one number, one uppercase and lowercase letter, and 8 characters." required><br>
        <input style="height: 60px; font-size: 26px" type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" minlength="5" required>
      </div><br>
      <?php
      if (!empty($register_err)) {
        echo '<div style="color:#AF0606;">' . $register_err . '</div><br>';
      }
      ?>
      <button class="btn btn-light"  style="background-color: #74B49B; color: white; width: 275px; font-size: 30px" type="submit">Create Account</button>
      <div style="font-size: 24px"><br>
        <a href="./login.php">Already have an account? <u>Login</u></a><br>
      </div>
      <div style="font-size: 22px">
      Are you an Author? <a href="./author.php"><u>Register here</u></a>
      <br><br><br><hr>
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
