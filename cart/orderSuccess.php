<?php
require_once "../setup/db.connect.php";
error_reporting(0);

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
  header("location:../index.php");
}

$cart = "SELECT * FROM Cart INNER JOIN Books ON Cart.isbn = Books.isbn WHERE Cart.user_id = $user_id";
$result = $mysqli->query($cart);
$total = 0;
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $total += $row['quantity'] * $row['price'];
  array_push($data, $row);
}

$confirm_number = time();
$subtotal = $total + $shipping - $promo;
$order = "INSERT INTO Orders(user_id, confirmation_number, order_date, subtotal) VALUES ('" . $user_id . "','" . $confirm_number . "', '2022-05-02', '" . $subtotal . "')";
$result = $mysqli->query($order);

$getId = $mysqli->query("SELECT order_id From Orders WHERE confirmation_number = $confirm_number");
while ($row = $getId->fetch_assoc()) {
  $order_id = $row["order_id"];
}

$ordered_items = "INSERT INTO Ordered_Items(order_id, isbn, quantity) VALUES ";
$cart = "SELECT * FROM Cart INNER JOIN Books on Cart.isbn=Books.isbn WHERE Cart.user_id = $user_id";
$result = $mysqli->query($cart);


while ($row = mysqli_fetch_assoc($result)) {
  $isbn = $row['isbn'];
  $quantity = $row['quantity'];
  $ordered_items .= "($order_id, $isbn, $quantity),";
}

$ordered_items = substr($ordered_items, 0, -1);
$ordered_items .= ';';

$result = $mysqli->query($ordered_items);
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
  <link rel="stylesheet" href="../style/orderSuccess.css">
  <title>Luminary - Confirmation</title>
</head>

<body>
  <div class="py-5 text-center">
    <div class="topcontainer" style=" margin-top: 2rem;">
      <a href="../index.php">
        <h1 class="h3 mb-3 fw-normal" style="text-decoration: none; color: #403F48; font-family: 'Tenor Sans', sans-serif;">Luminary</h1>
      </a>
      <img class="mb-4" src="../images\sun.png" alt="sunFlaticon" height=60px weight=60px>
    </div>
    <hr>
  </div>

  <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="logo p-2 d-flex justify-content-between text-left px-5">
            <span style="font-size: 20px;">Order Confirmation</span>
            <input type="hidden" value=".$row['id'].">
          </div>
          <div class="invoice p-5">
            <h5>Your order is Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello, <?= $name ?></span><span>A confirmation with detailed information has been sent to your email.</span><br>
            <p></p>
            <span>NOTE FOR STORE PICKUP: Books can be reserved up to 5 days to be purchased and picked up at the bookstore.</span>
            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>
                      <div class="py-2"> <span class="d-block text-muted">Order Date</span><span><?= date("Y-m-d") ?></span> </div>
                    </td>
                    <td>
                      <div class="py-2"> <span class="d-block text-muted">Order Number</span> <span><?= $order_id ?></span> </div>
                    </td>
                    <td>
                      <div class="py-2"> <span class="d-block text-muted">Shipping Address</span> <span><?= $address ?></span> </div>
                    </td>
                    <td>
                      <div class="py-2"> <span class="d-block text-muted">Confirmation Number</span><span><?= $confirm_number ?></span> </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="product border-bottom table-responsive">
              <table class="table table-borderless">
                <tbody>
                  <?php foreach ($data as $row) { ?>
                    <tr>
                      <td width="20%"> <img class="cover" src="../<?= $row['image'] ?>" width="70"> </td>
                      <td width="60%"> <span class="font-weight-bold"><?= $row['title'] ?></span>
                        <div class="product-qty"> <span class="d-block">Author: <?= $row['author'] ?></span> <span>ISBN: <?= $row['isbn'] ?></span> </div>
                      </td>
                      <td width="20%">
                        <div class="text-right">
                          <span class="font-weight-bold">$<?= $row['price'] ?></span><br>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>

            <div class="p-3 bg-light bg-opacity-10">
              <?php

              include 'ordersummary.php';

              $result = $mysqli->query($ordered_items);
              $result = $data;
              $mysqli->query("SET foreign_key_checks = 0");
              $mysqli->query("DELETE FROM Cart WHERE Cart.user_id = $user_id");
              $mysqli->query("SET foreign_key_checks = 1");
              ?>
            </div>
            <a href="../index.php"><button class="btn btn-secondary w-100 mt-2 order" style="color: #F9F8EB; background-color: #5C8D89;">Purchase More Books</button></a>
            <p></p>
            <p class="font-weight-bold mb-0" align="center">Thanks for shopping with us!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; 2022 Luminary</p>
  <ul class="list-inline">
    <li class="list-inline-item"><a href="#">Privacy</a></li>
    <li class="list-inline-item"><a href="#">Terms</a></li>
    <li class="list-inline-item"><a href="#">Support</a></li>
  </ul>
</footer>

</html>