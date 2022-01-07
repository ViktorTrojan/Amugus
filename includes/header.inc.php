<?php
if ($_SESSION['loggedin'] == false) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_URI'] == "http://localhost/Amugus/usermanagement.php" && $_SESSION['status'] == 0){
  header("location:javascript://history.go(-1)");
}

include_once 'functions.inc.php';

$query = "SELECT * FROM accounts";
$response = mysqli_query($dbc, $query);
$row_amount = mysqli_num_rows($response);

for ($i = $row_amount; $i > 0; $i--) {
    $query = "UPDATE accounts SET row = '$i' LIMIT $i";
    $response = mysqli_query($dbc, $query);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Amugus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/Logo-256px.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light"  id="navbar-example2">
  <div class="container-fluid">
    <a class="navbar-brand" href="profile.php"><img src="img/Logo-32px.png" alt="logo"> Amugus<span class="sr-only">(current)</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link"href="gamerules.php">Game Rules</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="maps.php">Maps</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="memes.php">Memes</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <?php
      if($_SESSION['status']==1){
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="usermanagement.php">Usermanagement</a>
      </li>
      <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a class="btn btn-outline-danger my-2 my-sm-0" href="process.php?logout=<?php echo $_SESSION['loggedin']?>"
        >Log Out</a>
    </form>
  </div>
  </div>
</nav>


