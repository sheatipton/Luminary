<?php
 $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
 $user_id = $user_id->fetch_object()->user_id;
 
$discount = 0;
$shipping = 5;
if (array_key_exists('promo', $_GET)) {
  if($_GET['promo'] == 'TENOFF') {
    $discount = 10;
  }
}
else {
  $_GET['promo'] = 0;
}

// Different Shipping Options, removed for now
/*if (array_key_exists('shipping', $_GET)) {
  if($_GET['shipping'] == '1') {
    $shipping = 20;
  }
  else if($_GET['shipping'] == '2') {
    $shipping = 15;
  }
  else if($_GET['shipping'] == '3') {
    $shipping = 5;
  }
}*/

$bag = "SELECT * FROM bag INNER JOIN Books ON bag.book_id = Books.book_id WHERE bag.user_id = $user_id";
$result = $mysqli->query($bag);

$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
  $total += $row['price'];
}

?>
<div class="p-3 bg-light bg-opacity-10" style="font-size: 22px">
  <h3 class="card-title mb-3">Order Summary</h3>
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
