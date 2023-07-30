<?php
require_once "../setup/db.connect.php";

// Check if logged in, retrieve data if true
$loggedIn = false;
if (isset($_COOKIE["user_id"])) {
  $loggedIn = true;
  $user_id = $mysqli->query("SELECT user_id FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $user_id = $user_id->fetch_object()->user_id;
  $bagNumber = $mysqli->query("SELECT * FROM Bag WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $bagNumber = mysqli_num_rows($bagNumber);
  $type = $mysqli->query("SELECT type FROM Users WHERE user_id = '" . $_COOKIE["user_id"] . "'");
  $type = $type->fetch_object()->type;
  $book_id = $_GET['book_id'];
}
?>

<!-- Search Bar Function -->
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
  <link rel="stylesheet" href="../style/browse.css">
  <title>Book Info</title>
</head>

<body>
  <!-- Navigation Bar -->
  <?php include "../components/navigation.php" ?>

  <!-- Search Bar -->
  <?php include "../components/searchbar.html" ?>

  <!-- Categories Navigation Bar -->
  <?php include "../components/categories.html" ?>
  </div>
  <br>

  <!-- Back Navigation -->
  <div class="container" style="padding-left: 5rem">
    <a class="btn btn-outline-secondary" href="javascript:history.back()" style="text-decoration: none;">
      <i class="bi bi-arrow-left"></i>&nbsp;Back</a>
  </div>
  <br>

  <!-- Action for Add to Bag -->
  <?php
  if (isset($_POST["submit"])) {
    if ($loggedIn == true) {
      $addTobagSql = "INSERT INTO bag (user_id, book_id) VALUES ('" . $user_id . "', '" . $book_id . "')";
      $mysqli->query($addTobagSql);
      echo ("<meta http-equiv='refresh' content='0'>");
    } else {
      echo "<script>window.location.href='../login/login.php';</script>";
    }
  }

  // Pull from DB
  $book_id = $_GET['book_id'];
  $title = $mysqli->query("SELECT title FROM Books WHERE book_id = " . $book_id . "");
  $title = $title->fetch_object()->title;
  $author = $mysqli->query("SELECT author FROM Books WHERE book_id = " . $book_id . "");
  $author = $author->fetch_object()->author;
  $year = $mysqli->query("SELECT year FROM Books WHERE book_id = " . $book_id . "");
  $year = $year->fetch_object()->year;
  $price = $mysqli->query("SELECT price FROM Books WHERE book_id = " . $book_id . "");
  $price = $price->fetch_object()->price;
  $imageSql = $mysqli->query("SELECT cover FROM Books WHERE book_id = " . $book_id . "");
  $cover = "../";
  $cover .= $imageSql->fetch_object()->cover;
  $stock = $mysqli->query("SELECT stock FROM Books WHERE book_id = " . $book_id . "");
  $stock = $stock->fetch_object()->stock;
  $description = $mysqli->query("SELECT description FROM Books WHERE book_id = " . $book_id . "");
  $description = $description->fetch_object()->description;

  // Display Information
  echo "
    <div class='container' style='width: 60rem'>
    <div style='display:flex; font-size: 22px'>
      <img src=" . $cover . " height=400'>
      <div style='padding-top:50px; padding-left: 80px'>
        <strong>" . $title . " <br>by " . $author . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>" . $year . "</small></strong>
        <hr>
        <form method='post'><big>" . $price . "</big>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class='btnstandard' style='height: 2.5rem; width: 9rem' type='submit' name='submit'>
            <i class='bi bi-bag-plus' style='font-size: 22px'></i>&nbsp;
            <span style='font-size: 18px;'>Add to Bag</span>
          </button>";

  // Low Stock Message
  if ($stock < 6) {
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color: red'>Only a few left!</span>";
  }

  echo "</form>
        <hr><br>
        <p style='font-size: 18px'>" . $description . "</p><br>
        <hr>
      </div>
    </div><br><br><br>"
  ?>

  <!-- Resources -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<!-- Footer -->
<?php include "../components/footer.html" ?>

</html>