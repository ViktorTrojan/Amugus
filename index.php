<?php
session_start();
include_once 'includes/functions.inc.php';
require_once 'includes/dbh.inc.php';

$query = "SELECT * FROM accounts";
$response = mysqli_query($dbc, $query);
$row_amount = mysqli_num_rows($response);

for ($i = $row_amount; $i > 0; $i--) {
    $query = "UPDATE accounts SET row = '$i' LIMIT $i";
    $response = mysqli_query($dbc, $query);
}
$_SESSION['loggedin']=false;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Amugus</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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



<!--<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">-->
<link rel="stylesheet" type="text/css" href="css/index.css">

<div class="login-container">
        <div class="top">
            <h1>Login</h1>
        </div>

        <form action = "?login=1" method="post" autocomplete="off">
            <div class="text-input">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <input class="input" type="text" name="username" required>
                    <label>Username</label>
                </div>
            </div>

            <div class="text-input">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input class="input" type="password" name="pw" required>
                    <label>Password</label>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="submit" value="Login">Login</button>
            </div>
                

            <div class="signup-link">
                Not a member? <a href="register.php">Sign-Up</a>
            </div>
            <?php
if (isset($_GET["login"])) {
    $username = $_POST["username"];
    $pw1 = $_POST["pw"];
    $query = "SELECT username FROM accounts";
    $response = mysqli_query($dbc, $query);
    $data = array();
    $exists = false;

    if (mysqli_num_rows($response) > 0) {
        while ($row = mysqli_fetch_assoc($response)) {
            $data[] = implode("", $row);
        }
        foreach ($data as $test) {
            if ($test == $username) {
                $exists = true;
            }
        }
    }

    if ($exists) {
        $query = "SELECT password FROM accounts WHERE username = '$username'";
        $response = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($response);
        $pw2 = implode($row);

        $query = "SELECT admin FROM accounts WHERE username = '$username'";
        $response = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($response);
        $status = implode($row);

        if (password_verify("$pw1", "$pw2")) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $pw2;
            $_SESSION['status'] = $status;
            ?><meta http-equiv="refresh" content="0;url=profile.php"><?php
        } else {
            function_alert("NO");
            function_alert($pw1 . $pw2);
        }
    }

}
?>
        </form>

    </div>
    </body>

</html>