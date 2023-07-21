<?php
require_once "../setup/db.connect.php";

// Check if logged in, retrieve data if true
$loggedIn = false;
if (isset($_COOKIE["user_id"])) {
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $name = $mysqli->query("SELECT name FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $name = $name->fetch_object()->name;
  $email = $mysqli->query("SELECT email FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $email = $email->fetch_object()->email;
  $loggedIn = true;
}

// Process Data
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["message"])) {
  $to = "sheaelaine07@gmail.com";
  $subject = "Luminary Contact Form";
  $success = mail($to, $subject, $_POST["message"], $_POST["email"]);
  if (!$success) {
    $errorMessage = error_get_last()['message'];
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" id="css-main" href="../assets/css/oneui.min.css">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="shortcut icon" href="../style/index.css">
  <title>Contact</title>

</head>
<body>

  <!-- Navigation Bar -->
  <div class="bg-flat-dark">
    <div style="padding:30px" class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
      <a href="javascript:history.back()" style="font-size: 22px; color: white; padding-top: 20px" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <i class="bi bi-arrow-left"></i>&nbsp; Back</a>
      <div class="flex-grow-1">
        <div style="text-align:center">
          <span class="h2 text-success-light mb-2" style="padding-right: 125px">
            <br>Contact Me
          </span>

        </div>
        <div style="text-align:center">
          <span class="h6 fw-normal text-white-75" style="padding-right: 125px">
            Business and personal inquiries<br>
          </span>
        </div><br>
      </div>
    </div>
  </div>

  <!-- Form -->
  <div class="bg-body-extra-light">
    <div class="content" style="background-color: #F9F8EB">
      <div class="row items-push justify-content-center" style="height: 100rem">
        <div class="col-md-10 col-xl-5">
          <form method="post">
            
          <div class="row">
              <div class="col-md-6">
                <div class="mb-4">
                  <label class="form-label" for="frontend-contact-firstname">Full Name</label>
                  <input type="text" class="form-control" id="frontend-contact-firstname" name="name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-4">
                  <label class="form-label" for="frontend-contact-email">Email</label>
                  <input type="email" class="form-control" id="frontend-contact-email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label" for="frontend-contact-msg">Message</label>
                <textarea class="form-control" id="frontend-contact-msg" name="message" rows="7"></textarea>
              </div>

              <div class="row justify-content-md-center">
                <button type="submit" class="btn rounded-pill btn-alt-success" style="width: 125px">
                  Send&nbsp;<i class="bi bi-send-fill"></i>
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>