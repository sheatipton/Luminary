<?php
    require_once "../setup/db.connect.php";

  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $name = $mysqli->query("SELECT name FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $name = $name->fetch_object()->name;
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
  <link rel="stylesheet" href="../style/index.css">
  <link rel="stylesheet" href="../style/payment.css">
  <title>Luminary - Payment</title>
</head>

<body>
  <div class="py-5 text-center">
    <div class="topcontainer" style="font-family: 'Tenor Sans', sans-serif; color: #403F48; margin-top: 2rem;">
      <a href="../index.php">
        <h1 class="h3 mb-3 fw-normal">Luminary</h1>
      </a>
      <img class="mb-4" src="../images\sun.png" alt="sunFlaticon" height=60px weight=60px>
    </div>
    <hr>
  </div>

  <div class="container">
    <h1 class="h3 mb-5">Payment</h1>
    <div class="row">
      <!-- Left -->
      <div class="col-lg-9">
        <div class="accordion" id="accordionPayment">
          <!-- Credit card -->
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
                  <label class="form-label" >Name on Card</label>
                  <input type="text" class="form-control" value="<?= $name ?>" placeholder="Full Name">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label class="form-label">Expiration Date</label>
                  <input type="text" class="form-control" placeholder="MM/YY">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="mb-3">
                  <label class="form-label" >CVV Code</label>
                  <input type="password" class="form-control" placeholder="###">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="accordion-item mb-3 border">
        <div id="collapsePP" class="accordion-collapse collapse" data-bs-parent="#accordionPayment" style="">
          <div class="accordion-body">
            <div class="px-2 col-lg-6 mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control">
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-2">
      <a href="./checkout.php"><button class="btn btn-light w-100 mt-2 order"><i class="bi bi-arrow-left-circle"></i>Back</button></a>
    </div>
  </div>

  <!-- Right -->
  <div class="col-lg-3">
    <div class="card position-sticky top-0">
      <div class="p-3 bg-light bg-opacity-10">
        <?php include 'ordersummary.php'; ?>
      </div>
    </div>
    <a href="./orderSuccess.php?shipping=<?= $_GET['shipping']?>&promo=<?= $_GET['promo'] ?>"><button class="btn btn-light w-100 mt-2 order">Place Order</button></a>
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
