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
    window.location.href = "../browse/search.php?thesearch=" + searchValue;
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
  <title>Checkout</title>
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
    <h2 style="font-size: 30px">Secure Checkout</h2>
  </div>
  <?php if (!$loggedIn) : ?>
    <h6> Are you a returing customer? <a href="../login/login.php"><u>Sign In</u></a></h6>
  <?php endif; ?>
  </div>

  <!-- Information Form -->
  <div class="container" style="width: 65rem">
    <div class="row g-5" style="font-size: 22px;">
      <div class="col-md-7 col-lg-8">
        <h3>Billing Information</h3>
        <form action="checkout.php" method="POST">
          <div class="row g-3">
            <div class="col-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" value="<?= $name ?>" required>
            </div>

            <div class="col-6">
              <label for="firstName" class="form-label">Last Name</label>
              <input type="text" class="form-control" placeholder="Last Name (Optional)" required>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" value="<?= $email ?>" required>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address Line 1</label>
              <input type="text" class="form-control" id="address" value="<?= $address ?>" required>
            </div>

            <div class="col-12">
              <label for="city" class="form-label">Address Line 2</label>
              <input type="text" class="form-control" id="city" placeholder="Building, Apartment, Floor, Unit (Optional)" required>
            </div>

            <div class="col-4">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" value="<?= $city ?>" required>
            </div>
      
            <div class="col-4">
              <label for="state" class="form-label">State</label><br>
              <select class="form-select" id="state" required>
                <option value=""><?php echo $state; ?></option>
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
              </select>
            </div>

            <div class="col-4">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" value="<?= $zip ?>" required>
            </div>
          </div>
        </form>
      </div>

      <!-- Shipping Options -->
      <div class="col-md-5 col-lg-4 order-md-last">
        <div class="card position-sticky top-0">
          <form action="checkout.php">
            <div class="p-3 bg-light bg-opacity-10" style="font-size: 22px">
              <h3 class="card-title mb-3">Shipping Options</h3>

              <!-- Shipping Options, removed for now -->
              <!--<div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="shipping" name="shipping" class="custom-control-input" value="1">
                <label class="custom-control-label" for="shipping" name="submit">Overnight: 1 Day ($15)</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="shipping" class="custom-control-input" value="2">
                <label class="custom-control-label" for="customRadioInline2">Express: 2-3 Days ($10)</label>
              </div>-->

              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline3" name="shipping" class="custom-control-input" value="3" checked="checked">
                <label class="custom-control-label" for="customRadioInline3">Standard: 5-7 Days ($5)</label>
              </div>
              <p></p>

              <div class="row">
                <div class="col-sm">
                  <input type="text" class="form-control" name="promo" placeholder="Promo Code" style="width: 10rem">
                  <p></p>
                </div>
                <div class="col-sm">
                  <button class="btnstandard" style="width: 5rem; font-size: 18px;" type="submit">Submit</button>
                </div>
              </div>
            </div>
          </form>

          <!-- Action Buttons -->
          <div style="padding-bottom: 25px;">
            <?php include 'ordersummary.php'; ?>
            &nbsp;&nbsp;
            <div class="text-center">
              <a href="./payment.php?shipping=<?= $_GET['shipping'] ?>&promo=<?= $_GET['promo'] ?>">
                <button class="btnstandard" style="width: 15rem; font-size: 26px">Checkout</button></a>
            </div>
            <p></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2" style="padding: 20px 0px 70px">
      <a href="./shoppingbag.php"><button class="btn btn-outline-secondary" style="width: 250px; font-size: 26px" type="submit">Back to Summary</button></a>
    </div>
  </div>
  </div>
  </main>
  </div>

  <!-- Resources -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<!-- Footer -->
<?php include "../components/footer.html" ?>

</html>