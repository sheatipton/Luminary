<?php
require_once "../setup/db.connect.php";

// Check if logged in, retrieve data if true
$loggedIn = false;
if (isset($_COOKIE["user_id"])) {
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $type = $mysqli->query("SELECT type FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $type = $type->fetch_object()->type;
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
  echo "<script>window.location.href='../login/login.php';</script>";
}

// Button action for "Save All" Account Settings
if (isset($_POST['editAccount'])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $mysqli->query("UPDATE Users SET name = '" . $name . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET email = '" . $email . "' WHERE user_id = '" . $user_id . "'");
  echo ("<meta http-equiv='refresh' content='0'>");
}

// Button action for "Save All" Update Shipping Address
if (isset($_POST['editAddresses'])) {
  $address = $_POST["address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $zip = $_POST["zip"];
  $mysqli->query("UPDATE Users SET address = '" . $address . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET city = '" . $city . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET state = '" . $state . "' WHERE user_id = '" . $user_id . "'");
  $mysqli->query("UPDATE Users SET zip = '" . $zip . "' WHERE user_id = '" . $user_id . "'");
  echo ("<meta http-equiv='refresh' content='0'>");
}

// Button action for "Delete Account"
if (isset($_POST['proceed'])) {
  $mysqli->query("DELETE from Users WHERE user_id = '" . $user_id . "'");
  header('location: <div class=""></div>/login/logout.php');
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
  <link rel="stylesheet" href="../style/profile.css">
  <title>My Account</title>
</head>

<body>

  <!-- Side Navigation -->
  <main>
    <div class="b-example-divider"></div>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar" style="width: 15rem; font-size: 22px;">
      <a href="javascript:history.back()" style="padding-top: 22px" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <i class="bi bi-arrow-left"></i>&nbsp; Back</a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="../info/about.php" class="nav-link" aria-current="page">
            <i class="bi bi-file-person"></i>&nbsp;
            About
          </a>
        </li>
        <li class="nav-item">

          <?php if ($loggedIn && $type == 0) : ?>
            <a href="../admin/admin_dash.php" class="nav-link" aria-current="page">
              <i class="bi bi-bar-chart-line"></i>&nbsp;
              Dashboard
            </a>
          <?php elseif ($loggedIn && $type == 1) : ?>
            <a href="../author/author_dash.php" class="nav-link" aria-current="page">
              <i class="bi bi-bar-chart-line"></i>&nbsp;
              Dashboard
            </a>
          <?php elseif ($loggedIn && $type == 2) : ?>
            <a href="../info/dashboard.php" class="nav-link" aria-current="page">
              <i class="bi bi-bar-chart-line"></i>&nbsp;
              Dashboard
            </a>
          <?php endif; ?>

        </li>

        <li class="nav-item">
          <a href="../login/logout.php" class="nav-link" aria-current="page">
            <i class="bi bi-door-closed"></i>&nbsp;
            Logout
          </a>
        </li>
      </ul>
      <hr>
    </div>

    <!-- Welcome Bar -->
    <div class="container" style="margin-bottom: 5rem;">
      <div class="row">
        <p style="font-size: 42px; color: #89A3B2; padding-top: 30px; padding-left: 40px">Welcome, <?php echo $name; ?></p>
        <i class="bi bi-balloon-heart" style="font-size: 40px; color: #89A3B2; padding-top: 30px; padding-left: 15px"></i>
      </div>

      <?php
      // Confirm Delete Account Box
      if (isset($_POST['deleteAccount'])) {
        echo "<form method='post'<br><br><div id='confirmDeleteAccount' style='text-align:center'><b>Are you sure you want to proceed?<b>&nbsp;&nbsp;";
        echo "<button type='submit' name='proceed' onClick='deleteAccount' class='btnstandard'>Delete My Account</button></div>";
      }
      ?>

      <!-- Account Settings -->
      <div class="container" style="font-size: 20px">
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="font-size: 22px"><i class="bi bi-gear-wide-connected" style="padding-right: 10px;"></i>Account Settings</h5>
              <form method="post">
                <br>Name: <input type="text" style="margin-bottom: 0.5rem; width: 210px" name="name" value="<?php echo htmlspecialchars($name); ?>">&nbsp;&nbsp;&nbsp;
                Email:&nbsp;<input type="text" style="margin-bottom: 0.5rem; width: 210px" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <br><br>
                <button type="submit" name="editAccount" class="btn btn-light" style="font-size: 22px">Save Changes</button>
                <button type="button" name="editAccount" class="btn btn-outline-danger" style="font-size: 22px" data-toggle="modal" data-target="#exampleModal">
                  Delete Account
                </button>
            </div>
          </div>
        </div>

        <!-- Confirm Delete Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="font-size: 30px">
                Are you sure you want to delete your account?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" style="font-size: 22px" data-dismiss="modal">No, go back.</button>
                <button type="submit" name="proceed" class="btn btn-danger" style="font-size: 22px">Yes, I'm sure.</button>
              </div>
            </div>
          </div>
        </div>
        <form>

          <!-- Update Shipping Address -->
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size: 22px"><i class="bi bi-truck" style="padding-right: 10px;"></i>Shipping Address</h5>
                <form method="post" style="text-align: center">
                  <br><input type="text" style="margin-bottom: 0.5rem; width: 250px;" name="address" value="<?php echo htmlspecialchars($address); ?>">
                  <input type="text" style="margin-bottom: 0.5rem; width: 250px;" name="city" value="<?php echo htmlspecialchars($city); ?>">
                  <div style="display:flex">
                    <input type="text" style="margin-bottom: 0.5rem; width: 75px;" name="state" value="<?php echo htmlspecialchars($state); ?>">&nbsp;
                    <input type="text" style="margin-bottom: 0.5rem; width: 75px;" name="zip" value="<?php echo htmlspecialchars($zip); ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" name="editAddresses" class="btn btn-light" style="font-size: 20px">Save Changes</button>
                  </div>
                  <form>
              </div>
            </div>
          </div>
      </div>
  </main>

  <!-- Footer -->
<?php include "../components/footer.html" ?>

    <!-- Sources -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>