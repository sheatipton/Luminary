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

<!-- Search Function -->
<script>
  function processSearch() {
    var searchValue = document.getElementById('thesearch').value;
    window.location.href = "../browse/search.php?category=search&thesearch=" + searchValue;
  }
</script>

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
  <title>Payment</title>
</head>

<body>
  <!-- Navigation Bar -->
  <?php include "../components/navigation.php" ?>

    <!-- Search Bar -->
    <?php include "../components/searchbar.html" ?>

    <!-- Categories Navigation Bar -->
    <?php include "../components/categories.html" ?>
    <br><br>
  </div>

  <!-- Title Banner -->
  <div class="container banner" style="position: relative; text-align: center; margin-bottom: 3rem;">
    <h2 style="font-size: 30px">Payment</h2>
  </div>

  <!-- Payment Form -->
  <div class="container" style="font-size: 22px; width: 70rem">
    <div class="row">
      <div class="col-lg-9">
        <div class="accordion" id="accordionPayment">
          <div class="accordion-item mb-3 border" style="padding: 0.6rem;">
            <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
            </h2>
            <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment" style="">
              <div class="accordion-body">
                <div class="mb-3">
                  <label class="form-label">Card Number</label>
                  <input type="text" class="form-control" placeholder="#### #### #### ####">
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Cardholder's Name</label>
                      <input type="text" class="form-control" value="<?= $name ?>" placeholder="Full Name">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="mb-3">
                      <label class="form-label">Expiration Date</label>
                      <input type="text" maxlength="5" class="form-control" placeholder="MM/YY">
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="number">
                      <label class="form-label">CVV Code</label>
                      <input type="password" class="form-control" placeholder="###">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Back to Checkout -->
        <div class="col-md-2" style="padding: 20px 0px 70px">
          <a href="./checkout.php"><button class="btn btn-outline-secondary" style="width: 250px; font-size: 26px" type="submit">Back to Checkout</button></a>
        </div>
      </div>

      <!-- Order Summary and Place Order -->
      <div class="col-lg-3">
        <div class="card position-sticky top-0">
          <div class="p-3 bg-light bg-opacity-10">
            <?php include 'ordersummary.php'; ?>
            <a href="./orderSuccess.php?shipping=<?= $_GET['shipping'] ?>&promo=<?= $_GET['promo'] ?>"><button class="btnstandard" style="width: 14rem; font-size: 30px" type="submit">Place Order</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

<!-- Footer -->
<?php include "../components/footer.html" ?>

</html>