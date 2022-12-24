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

if (array_key_exists('remove', $_GET)) {
  $id = $_GET['remove'];
  $cart = "DELETE FROM Cart WHERE cart_item_id=$id;";
  $result = $mysqli->query($cart);
  header("location: shoppingbag.php");
}

/*
if (array_key_exists('update', $_GET)) {
  $id = $_GET['update'];
  $total = $total * $quantity;
  $cart = "UPDATE quantity SET quantity = ? WHERE cart_item_id = $id;";
  $result = $mysqli->query($cart);
  header("location: shoppingbag.php");
}
*/

$cart = "SELECT * FROM Cart INNER JOIN Books ON Cart.isbn = Books.isbn WHERE Cart.user_id = $user_id";
$result = $mysqli->query($cart);
$total = 0;

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
  <!-- <link rel="stylesheet" href="style/index.css"> -->
  <link rel="stylesheet" href="../style/orderSuccess.css">
  <link rel="stylesheet" href="../style/shoppingbag.css">
  <title>Luminary - Shopping Bag</title>
</head>

<body>
  <div class="container">
    <div class="py-5 text-center">
      <div class="topcontainer" style=" margin-top: 2rem;">
        <a href="../index.php">
          <h1 class="h3 mb-3 fw-normal" style="text-decoration: none; color: #403F48; font-family: 'Tenor Sans', sans-serif;">Luminary</h1>
        </a>
        <img class="mb-4" src="../images\sun.png" alt="sunFlaticon" height=60px weight=60px>
      </div>
    </div>

    <!-- Cart Information -->
    <div class="card">
      <div class="logo p-2 d-flex justify-content-between text-left px-5">
        <span style="font-size: 20px;">Cart Summary</span>
      </div>
      <div class="product border-bottom table-responsive px-5">
        <table class="table table-borderless">
          <tbody>
            <?php
            if ($result == false) {
              echo "false";
            }

            if (mysqli_num_rows($result) == 1) {
              $rows = mysqli_num_rows($result);
            }

            while ($row = mysqli_fetch_assoc($result)) {
              $total = $total + ($row['quantity'] * $row['price']);
            ?>
            <tr>
              <td width="10%">
                <img class="cover" src="../<?= $row['image'] ?>" width="70">
              </td>
              <td width="60%" class="product-qty">
                <span class="font-weight-bold"><?= $row['title'] ?></span>
                <div class="product-qty">
                  <span class="d-block">Author: <?= $row['author'] ?></span>
                  <span>ISBN: <?= $row['isbn'] ?></span>
                </div>
              </td>
              <!--
              <td>
                <label for="quantity" class="form-label" type="quantity" name="quantity">Quantity</label><br>
                <input id=demoInput type=number min=1 max=20>
              </td>
              -->
              <td width="20%" class="product-qty">
                <div class="text-right">
                  <span class="font-weight-bold">$<?= $row['price'] ?></span><br>
                  <!-- <span type="update" name="update"><a href="shoppingbag.php?update=<?=$row['cart_item_id'] ?>">Update</a></span><br> -->
                  <span><a href="shoppingbag.php?remove=<?=$row['cart_item_id'] ?>">Remove</a></span>
                </div>
              </td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="row d-flex justify-content-end px-5">
        <div class="col-md-5" style="padding-bottom: 1.5rem;">
          <div class="text-right">
            <form action="./checkout.php?subtotal='<? echo $total?>'" method="get">
              <table class="table table-borderless">
                <tbody class="totals">
                  <tr class="border-top border-bottom ">
                    <td>
                      <div class="text-left">
                        <span class="font-weight-bold">Subtotal</span>
                      </div>
                    </td>
                    <td>
                      <div class="text-right">
                        <span class="font-weight-bold">$<?= $total?></span>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <button class="btn btn-light checkout" type="submit" style="width: 15rem;">Proceed to Checkout</button>
            </form>
            <div>
              <a href="../index.php"><button class="btn btn-light checkout" type="submit"  style="width: 15rem;">Continue Shopping</button></a>
            </div>
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

</html>
