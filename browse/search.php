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
  $category = $_GET['category'];
}
?>

<!-- Search Function -->
<script>
  function processSearch() {
    var searchValue = document.getElementById('thesearch').value;
    window.location.href = "../browse/search.php?category=search&thesearch=" + searchValue;
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
  <title>Luminary - Search</title>
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
  <div class="container banner" style="position: relative; text-align: center; margin-bottom: 0.5rem;">
    <h2 style="font-size: 30px">Search Result</h2>
  </div>
  <div class="container-fluid" style="padding-left: 10rem">

    <!-- Action for Add to Bag -->
    <?php
    if (isset($_POST["submit"])) {
      if ($loggedIn == true) {
        $book_id = $_POST['get_id'];
        $addTobagSql = "INSERT INTO bag (user_id, book_id) VALUES ('" . $user_id . "', '" . $book_id . "')";
        $mysqli->query($addTobagSql);
        echo ("<meta http-equiv='refresh' content='0'>");
      } else {
        echo "<script>window.location.href='../login/login.php';</script>";
      }
    }

    // Pull from DB
    $search = $_GET['thesearch'];
    $sql = "SELECT * FROM Books WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%' OR year LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%'";
    $result = $mysqli->query($sql);
    $rows = mysqli_num_rows($result);

    echo "<div style='text-align:center; font-size:large; padding-right: 10rem'>" . $rows . "";
    echo " results for: <u>" . $search . "</u>";
    if ($rows == 0) {
      echo ". Try another search.<br>(Hint: Search by title keywords or first and last names!)";
    }
    echo "</div><br>";

    if ($rows > 0) {
      $i = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        $book_id[$i] = $row['book_id'];
        $cover[$i] = "../";
        $cover[$i] .= $row['cover'];
        $title[$i] = $row['title'];
        $price[$i] = $row['price'];
        $i++;
      }
      $newrow = 1;

      // Loop through query results and display information
      for ($i = 1; $i <= count($title); $i++) {
        echo
        "<div style='display: table-cell; text-align: center; padding-bottom: 20px; padding-right: 50px'>
      <img style='padding-bottom: 24px;' src=" . $cover[$i] . " width='175'>
      <h4 style='width: 250px'>" . $title[$i] . "</h4><br>      
      <form method='post'>
            <button style='color: #F9F8EB; background-color: #5C8D89; height: 50px; width: 50px;' class='btn btn-light' type='submit' name='submit'>
            <i class='bi bi-bag-plus' style='font-size: 28px'></i>
            </button>&nbsp;&nbsp;&nbsp;
              <a href='./book_info.php?category=" . $category . "&book_id=" . $book_id[$i] . "' style='color: #F9F8EB; background-color: #5C8D89; height: 50px; width: 50px' class='btn btn-light'>
              <i class='bi bi-info-circle' style='padding-left: 0.1px; font-size: 28px'></i></button>
            </a>
            <input type='hidden' value=" . $book_id[$i] . " name='get_id'/>
            </form>
            </div>";

        if ($newrow == 4) {
          $newrow = 0;
          echo "<br>";
        }
        $newrow++;
      }
    } else {
      echo "<div style='text-align: center;'><br><img src='../images/noresult.png' width='400'";
    }
    ?>
  </div><br><br><br><br><br><br>

  <!-- Resources -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

<!-- Footer -->
<?php include "../components/footer.html" ?>

</html>