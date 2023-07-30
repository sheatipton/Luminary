<?php
require_once "../setup/db.connect.php";

// Check if logged in, retrieve data if true
$loggedIn = false;
$type = 0;
if (isset($_COOKIE["user_id"])) {
  $loggedIn = true;
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $type = $mysqli->query("SELECT type FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $type = $type->fetch_object()->type;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" id="css-main" href="../assets/css/oneui.min.css">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="stylesheet" href="../style/about.css">
  <link rel="stylesheet" href="../style/index.css">
  <title>Dashboard</title>

</head>

<body>

  <!-- Navigation Bar -->
  <div class="bg-flat-dark">
    <div style="padding:30px" class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
    <a href="javascript:history.back()" style="font-size: 22px; color: white; padding-top: 20px" class="underlinelink">
        <i class="bi bi-arrow-left" style="padding-right: 10px"></i>Back</a>
      <div class="flex-grow-1">
        <div style="text-align:center">
          <span class="h2 text-success-light mb-2" style="padding-right: 125px">
            <br>About Dashboard
          </span>

        </div>
        <div style="text-align:center">
          <span class="h6 fw-normal text-white-75" style="padding-right: 125px">
            Real time statistics<br>
          </span>
        </div><br>
      </div>
    </div>
  </div>
  <br>

  <!-- Navigation Card -->
  <div class="card mx-auto" style="font-size: 22px; width: 75rem; height: 65px">
    <div class="card-body">

      <?php if ($loggedIn && $type == 0) : ?>
        <p>You are currently logged in as an <b>administrator</b>. Click
          <a href="../admin/admin_dash.php" class="link-dark"><u>
              here</u></a>  to manage Admin Dashboard.
        </p>
      <?php elseif ($loggedIn && $type == 1) : ?>
        <p>You are currently logged in as an <b>author</b>. Login
          <a href="../author/author_dash.php" class="link-dark"><u>
              here</u></a>  to manage Author Dashboard.
        </p>
      <?php elseif ($loggedIn && $type == 2) : ?>
        <p>You are currently logged in as a <b>customer</b>. Login
          <a href="../login/login.php" class="link-dark"><u>
              here</u></a> using author or admin credentials to experience Dashboard.
        </p>
      <?php endif; ?>

    </div>
  </div>
  <br>

  <!-- Dashboard Cards -->
  <div class="card-deck mx-auto" style="font-size: 22px; height: 60%; width: 80rem;">
    <!-- Author Dashboard -->
    <div class="card">
      <div class="card-block" style="padding: 30px 30px 30px 30px">
        <h4 class="card-title">Author Accounts&nbsp;&nbsp;<i class="bi bi-book"></i></h4>
        <p class="card-text">
          As an author, you can access additional features:<br>
          &nbsp;add, edit, or delete products<br>&nbsp;view order statistics and low inventory notices
          <br><br><b>To access the site as an author:</b>
          <br>&nbsp;Email: jkrowling@email.com
          <br>&nbsp;Password: author
          <br><br>To access the site as a brand new author, create a free <a href="../login/author.php" style="color: #334155;"><u>author account</u></a>.
        </p>
      </div>
    </div>

    <!-- Admin Dashboard -->
    <div class="card" style="align-items: center">
      <div class="card-block" style="padding: 30px 30px 30px 30px">
        <h4 class="card-title">Admin Accounts&nbsp;&nbsp;<i class="bi bi-shield-lock"></i></h4>
        <p class="card-text">
          As an admin, you have access to FULL permissions:<br>
          &nbsp;add, edit, or delete products, orders, or users<br>
          &nbsp;view revenue statistics and low inventory notices
          <br><br><b>To access the site as an admin:</b>
          <br>&nbsp;Email: admin@email.com
          <br>&nbsp;Password: admin
          <br><br>Disclamer: Some admin actions can cause destructive effects when not used properly.
        </p>
      </div>
    </div>
  </div>
  <br><br><br>

  <?php include "../components/footer.html" ?>

  <!-- Resources -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>