<?php
 $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
 $user_id = $user_id->fetch_object()->user_id;
 
$discount = 0;
$shipping = 0;
if (array_key_exists('promo', $_GET)) {
  if($_GET['promo'] == 'TENOFF') {
    $discount = 10;
  }
}
else {
  $_GET['promo'] = 0;
}

if (array_key_exists('shipping', $_GET)) {
  if($_GET['shipping'] == '1') {
    $shipping = 20;
  }
  else if($_GET['shipping'] == '2') {
    $shipping = 15;
  }
  else if($_GET['shipping'] == '3') {
    $shipping = 5;
  }
}

/*
if (array_key_exists('update', $_GET)) {
  if ($_GET['quantity'] == '1') {
    $total += $row['quantity'] * $row['price'];
  }
  if ($_GET['quantity'] == '2') {
    $quantity = $quantity + 1;
    $total += $row['quantity'] * $row['price'];
  }
}
*/

$cart = "SELECT * FROM Cart INNER JOIN Books ON Cart.isbn = Books.isbn WHERE Cart.user_id = $user_id";
$result = $mysqli->query($cart);

$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
  $total += $row['quantity'] * $row['price'];
}

?>

<div class="p-3 bg-light bg-opacity-10">
  <h6 class="card-title mb-3">Order Summary</h6>
  <div class="d-flex justify-content-between mb-1 small">
    <span>Subtotal</span> <span>$<?= $total ?></span>
  </div>
  <div class="d-flex justify-content-between mb-1 small">
    <span>Shipping</span> <span>$<?= $shipping ?></span>
  </div>
  <div class="d-flex justify-content-between mb-1 small">
    <span>Promo Applied</span> <span class="text-danger">-$<?= $discount ?></span>
  </div>
  <hr>
  <div class="d-flex justify-content-between mb-4 small">
    <span>TOTAL</span> <strong class="text-dark">$<?= $total + $shipping - $discount ?></strong>
  </div>
</div>
