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

    <link rel="shortcut icon" href="img/Logo-256px.ico" type="image/x-icon">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>
  <body>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



<div class="container">
    <div class="row justify-content-center">
            <div class="col-auto">
                <div class="gallery d-flex">
                    <div>
                        <div class="top">
                            <h1>Sign In</h1>
                        </div>
                        <form action="?login=1" method="POST" autocomplete="off" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-auto">
      <label for="validationCustom01">Username</label>
      <input type="text" class="form-control" name="username" id="validationCustom01" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Username not valid or doesn't exists!
      </div>
    </div>
    <div class="col-auto">
      <label for="validationCustom02">Password</label>
      <input type="password" class="form-control" name="pw" id="validationCustom02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Password not valid or doesn't match!
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center" style="margin-top: 10px;">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="submit" value="Sign In">Sign In</button>
  </div>
  <div class="login-link">
      <span class="abt">Not a member yet? 
          <p><a href="register.php">Sign Up</a></p>
      </span>
  </div>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
                    </div>
                </div>
            </div>
    </div>
</div>


</body>

</html>
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
            function_alert("Your password do not match!");
            ?><meta http-equiv="refresh" content="0;url=index.php"><?php
        }
    }else{
      function_alert("Username doesn't exist!");
      ?><meta http-equiv="refresh" content="0;url=index.php"><?php
    }

}
?>