<?php
require_once "../setup/db.connect.php";

$loggedIn = false;
if (isset($_COOKIE["user_id"])) {
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
}
else {
  $loggedIn = false;
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"s>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@300&family=Tenor+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="icon" href="../favicon_io/favicon.ico">
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/checkout.css">
  <title>Luminary - Checkout</title>
</head>

<body>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <div class="topcontainer" style="font-family: 'Tenor Sans', sans-serif; color: #403F48; margin-top: 2rem;">
          <a href="../index.php"><h1 class="h3 mb-3 fw-normal">Luminary</h1></a>
          <img class="mb-4" src="../images\sun.png" alt="sunFlaticon" height=60px weight=60px>
        </div>
        <hr>
        <h5><strong>Secure Checkout</strong></h5>
        <?php if (!$loggedIn): ?>
          <h6> Are you a returing customer? <a href="../login/login.php"><u>Sign In</u></a></h6>
        <?php endif; ?>
      </div>

      <div class="row g-5">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3"><strong>Billing Information</strong></h4>
          <form action="checkout.php" method="POST">
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" value="<?= $name ?>" name="firstname" placeholder="First Name" required>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name" required>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="yourname@example.com" value="<?= $email ?>" required>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="<?= $address ?>" required>
              </div>

              <div class="col-12">
                <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or Suite" required>
              </div>

              <div class="col-12">
                <label for="phone" class="form-label">Phone Number <span class="text-muted"></span></label>
                <input type="text" class="form-control" id="phone" placeholder="###-###-####" required>
              </div>

              <div class="col-6">
                <label for="country" class="form-label">Country</label><br>
                <select class="form-select" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-6">
                <label for="state" class="form-label">State</label><br>
                <select class="form-select" id="state" required>
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
                  <option value="AS">American Samoa</option>
                  <option value="GU">Guam</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="VI">Virgin Islands</option>
                </select>
              </div>

              <div class="col-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" placeholder="Athens" required>
              </div>

              <div class="col-6">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="30606" required>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-5 col-lg-4 order-md-last">
          <div class="card position-sticky top-0">
            <form action="checkout.php">
              <div class="p-3 bg-light bg-opacity-10">
                <h6 class="card-title mb-3">Shipping Options</h6>

                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="shipping" name="shipping" class="custom-control-input" value="1">
                  <label class="custom-control-label" for="shipping" name="submit">Overnight: 1 Day ($20)</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline2" name="shipping" class="custom-control-input" value="2">
                  <label class="custom-control-label" for="customRadioInline2">Express: 2-3 Days ($15)</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline3" name="shipping" class="custom-control-input" value="3">
                  <label class="custom-control-label" for="customRadioInline3">Standard: 5-7 Days ($5)</label>
                </div>
                <p></p>
                <input type="text" class="form-control" name="promo" placeholder="Promo Code">
                <p></p>
                <button class="btn btn-light w-10 mt-2 confirm" type="submit">Submit</button>
              </div>
            </form>
            <?php include 'ordersummary.php'; ?>
            <a href="./payment.php?shipping=<?= $_GET['shipping']?>&promo=<?= $_GET['promo'] ?>"><button class="btn btn-light w-100 mt-2 confirm">Checkout</button></a>
            <a href="./orderSuccess.php?promo=<?= $_GET['promo']?>"><button class="btn btn-light w-100 mt-2 confirm">Pickup In Store (Cash)</button></a>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <a href="./shoppingbag.php"><button class="btn btn-light w-100 mt-4 confirm"><i class="bi bi-arrow-left-circle"></i> Back</button></a>
      </div>
    </div>
  </main>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 Luminary</p>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
