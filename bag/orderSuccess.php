<?php
require_once "../setup/db.connect.php";
error_reporting(0);

// Check if logged in, retrieve data if true
$loggedIn = false;
if (isset($_COOKIE) && array_key_exists('user_id', $_COOKIE)) {
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
  echo "<script>window.location.href='../index.php';</script>";
}

// Pull from DB
$bag = "SELECT * FROM bag INNER JOIN Books ON bag.book_id = Books.book_id WHERE bag.user_id = $user_id";
$result = $mysqli->query($bag);
$total = 0;
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $total += $row['price'];
  array_push($data, $row);
}

// Create New Order
$confirm_number = time();
$subtotal = $total + $shipping - $promo;
$order = "INSERT INTO Orders(user_id, confirmation_number, order_date, subtotal) VALUES ('" . $user_id . "','" . $confirm_number . "', '2022-05-02', '" . $subtotal . "')";
$result = $mysqli->query($order);

$getId = $mysqli->query("SELECT order_id From Orders WHERE confirmation_number = $confirm_number");
while ($row = $getId->fetch_assoc()) {
  $order_id = $row["order_id"];
}

// Pull Items from Bag
$bag = "SELECT * FROM bag INNER JOIN Books on bag.book_id=Books.book_id WHERE bag.user_id = $user_id";
$result = $mysqli->query($bag);

// Add Items into Order
$ordered_items = "INSERT INTO Ordered_Items(order_id, book_id, price) VALUES ";
while ($row = mysqli_fetch_assoc($result)) {
  $book_id = $row['book_id'];
  $price = $row['price'];
  $ordered_items .= "($order_id, $book_id, $price),";
}

$ordered_items = substr($ordered_items, 0, -1);
$ordered_items .= ';';
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
  <link rel="stylesheet" href="../style/orderSuccess.css">
  <link rel="stylesheet" href="../style/index.css">
  <title>Confirmation</title>
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
    <h2 style="font-size: 30px">Order Success!</h2>
  </div>

  <!-- Order Receipt -->
  <div class="container" style="width: 80rem">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card" style="font-size: 22px">
          <div class="logo p-2 d-flex justify-content-between text-left px-5">
            <span style="font-size: 26px;">Order Confirmation</span>
          </div>
          <div class="invoice p-5">
            <h4>Thank you, <?= $name ?>. Your order has been completed!</h4>
            <br>
            <div>
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>
                      <div class="py-2"> <span class="text-muted">Order Date<br></span><span><?= date("Y-m-d") ?></span></div>
                    </td>
                    <td>
                      <div class="py-2"> <span class="text-muted">Order Number<br></span> <span><?= $order_id ?></span> </div>
                    </td>
                    <td>
                      <div class="py-2"> <span class="text-muted">Shipping Address<br></span> <span><?= $address ?></span> </div>
                    </td>
                    <td>
                      <div class="py-2"> <span class="text-muted">Confirmation Number<br></span><span><?= $confirm_number ?></span> </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Display Ordered Items -->
            <div>
              <table class="table table-borderless">
                <tbody>
                  <?php foreach ($data as $row) { ?>
                    <tr>
                      <td width="20%"> <img class="cover" src="../<?= $row['cover'] ?>" width="70"> </td>
                      <td width="60%">
                        <p class="font-weight-bold"><?= $row['title'] ?></p>
                        <div class="product-qty">
                          <p>Author: <?= $row['author'] ?></p>
                        </div>
                      </td>
                      <td width="20%">
                        <div class="text-right">
                          <p class="font-weight-bold">$<?= $row['price'] ?></p><br>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <br>
            <hr><br>

            <div class="p-3 bg-light bg-opacity-10">
              <?php
              include 'ordersummary.php';

              // Clear Bag
              $result = $mysqli->query($ordered_items);
              $result = $data;
              $mysqli->query("SET foreign_key_checks = 0");
              $mysqli->query("DELETE FROM Bag WHERE bag.user_id = $user_id");
              $mysqli->query("SET foreign_key_checks = 1");
              ?>
            </div>
            <div class="text-center">
              <a href="../index.php"><button class="btnstandard" style="width: 28rem; font-size: 30px">Continue Shopping</button></a>
            </div>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<!-- Footer -->
<?php include "../components/footer.html" ?>

</html>