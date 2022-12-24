<?php
require_once "../setup/db.connect.php";

// process form data
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
        $register_err = "Could not create user.";
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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="icon" href="../favicon_io/favicon.ico">
  <link rel="stylesheet" href="../style/signup.css">
  <title>Luminary - Sign Up</title>
</head>

<body style="text-align: center; font-family: 'Tenor Sans', sans-serif; color: #403F48;">
  <main class="form-signin">
    <a href="../index.php">
      <h1 class="h3 mb-3 fw-normal">Luminary</h1>
    </a>
    <img class="mb-4" src="../images\sun.png" alt="sunFlaticon" height=60px weight=60px>
    <hr><h4>Sign Up</h4><br>
    <form method="post">
      <div class="form-floating">
        <input type="text" name="name" class="form-control" placeholder="Name" required>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <input type="text" name="address" class="form-control" placeholder="Address" required>
        <div style="display:inline-flex">
          <input type="text" name="city" class="form-control" placeholder="City" required>&nbsp;
          <select name="state" class="form-control" style="width: 85px; height: 37px;" required>
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
          <input type="text" name="zip" class="form-control" style="width: 75px;" placeholder="Zip" required>
        </div>
        <input type="text" name="dob" class="form-control" style="margin-bottom: 0.5rem;" placeholder="Date of Birth: mm/dd/yyyy" onfocus="(this.type='date')" required>
        <input type="password" name="password" class="form-control" placeholder="Password" title="Must contain at least one number, one uppercase and lowercase letter, and 8 characters." required>
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" minlength="5" required>
      </div>
      <?php
      if (!empty($register_err)) {
        echo '<div style="color:#AF0606;">' . $register_err . '</div><br>';
      }
      ?>
      <button class="w-100 btn btn-lg btn-light" type="submit">Create Account</button>
      <div class="otherOptions">
        <a href="./login.php">Already have an account? <strong>Login</strong></a><br>
      </div>
      <small>Are you a publisher? </small><a href="./publisher.php"><small><strong><u>Register here</u></strong></small></a><br>
      <br><hr><p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
