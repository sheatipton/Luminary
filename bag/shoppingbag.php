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

// Action for Remove Item from Bag
if (array_key_exists('remove', $_GET)) {
  $id = $_GET['remove'];
  $bag = "DELETE FROM Bag WHERE bag_item_id=$id;";
  $result = $mysqli->query($bag);
  echo "<script>window.location.href='./shoppingbag.php';</script>";
}

// Pull from DB
$bag = "SELECT * FROM bag INNER JOIN Books ON bag.book_id = Books.book_id WHERE bag.user_id = $user_id";
$result = $mysqli->query($bag);
$total = 0;

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
  <title>Shopping Bag</title>
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
    <h2 style="font-size: 30px">Shopping Bag</h2>
  </div>

  <!-- Bag Information -->
  <div class="row justify-content-center">
    <div class="card" style="font-size: 26px; width: 60rem">
      <div class="logo p-2 d-flex justify-content-between text-left px-5">
        <span style="font-size: 30px;">Summary</span>
      </div>
      <div class="product border-bottom table-responsive px-5">
        <table class="table table-borderless" style="font-size: 22px">
          <tbody>
            <?php
            if (mysqli_num_rows($result) == 1) {
              $rows = mysqli_num_rows($result);
            }

            // Add Totals from Bag
            while ($row = mysqli_fetch_assoc($result)) {
              $total = $total + $row['price'];
            ?>
              <tr>
                <td width="15%">
                  <img class="cover" src="../<?= $row['cover'] ?>" width="100" style="padding-bottom: 25px">
                </td>

                <td width="60%" class="product-qty">
                  <span class="font-weight-bold"><?= $row['title'] ?></span><br>
                  <span>by <?= $row['author'] ?></span><br>
                </td>

                <td width="20%" class="product-qty">
                  <div class="text-right">
                    <span class="font-weight-bold">$<?= $row['price'] ?></span><br>
                    <span><a href="shoppingbag.php?remove=<?= $row['bag_item_id'] ?>" style="text-decoration: underline; text-decoration-thickness: 2px">Remove</a></span>
                  </div>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Subtotal and Proceed Buttons -->
      <div class="row d-flex justify-content-end px-5">
        <div class="col-md-5" style="padding-bottom: 1.5rem;">
          <div class="text-right">
            <form action="./checkout.php?subtotal='<? echo $total ?>'" method="get">
              <table class="table table-borderless">
                <tbody class="totals" style="font-size: 26px">
                  <tr class="border-top border-bottom ">
                    <td>
                      <div class="text-left">
                        <span class="font-weight-bold">Subtotal</span>
                      </div>
                    </td>
                    <td>
                      <div class="text-right">
                        <span class="font-weight-bold">$<?= $total ?></span>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button class="btnstandard" type="submit" style="width: 22rem; font-size: 28px">Proceed to Checkout</button><p></p>
              <a href="javascript:history.back(2)"><button class="btn btn-outline-secondary" type="submit" style="width: 22rem; font-size: 28px">Continue Shopping</button></a>
            </form>  
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Resources -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    function increment() {
      document.getElementById('demoInput').stepUp();
    }

    function decrement() {
      document.getElementById('demoInput').stepDown();
    }
  </script>

  <!-- Footer -->
<?php include "../components/footer.html" ?>

</html>