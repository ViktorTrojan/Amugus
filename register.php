<?php
session_start();
require_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
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
    <link rel="stylesheet" type="text/css" href="css/register.css">
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
                            <h1>Signup</h1>
                        </div>
                        <form action="?register=1" method="POST" autocomplete="off" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-auto">
      <label for="validationCustom01">Username</label>
      <input type="text" class="form-control" name="username" id="validationCustom01" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Username not valid or already exists!
      </div>
    </div>
    <div class="col-auto">
      <label for="validationCustom02">Password</label>
      <input type="password" class="form-control" name="pw1" id="validationCustom02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        Please enter a password!
      </div>
    </div>
    <div class="col-auto">
      <label for="validationCustom03">Re-enter Password</label>
      <input type="password" class="form-control" name="pw2" id="validationCustom03" required>
      <div class="invalid-feedback">
        Please re-enter the same password!
      </div>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-auto">
      <label for="validationCustom02">E-Mail</label>
      <input type="email" class="form-control" name="email" id="validationCustom02" required>
      <div class="valid-feedback">
        Looks good!
      </div>
      <div class="invalid-feedback">
        E-Mail format not valid!
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center" style="margin-top: 10px;">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="submit" value="Sign Up">Sign Up</button>
  </div>
  <div class="login-link">
      <span class="abt">Already have an account? 
          <p><a href="index.php">Sign In</a></p>
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
if (isset($_GET["register"])) {
    $username = $_POST["username"];
    $pw1 = $_POST["pw1"];
    $pw2 = $_POST["pw2"];
    $email = $_POST["email"];

    $query = "SELECT username FROM accounts";
    $response = mysqli_query($dbc, $query);
    $data = array();
    $exists = false;

    if (mysqli_num_rows($response) >= 0) {
        while ($row = mysqli_fetch_assoc($response)) {
            $data[] = implode("", $row);
        }
        foreach ($data as $test) {
            if ($test == $username) {
                $exists = true;
            }
        }
        if ($exists) {
            function_alert("Username already exists, use another!");
        } else {
            //function_alert("Username does NOT exists.");
            if ($pw1 != $pw2) {
                function_alert("Your passwords do not match!");
            } else {
                $query = "SELECT MAX(id) FROM accounts";
                $response = mysqli_query($dbc, $query);
                $row = mysqli_fetch_assoc($response);
                $id = implode("", $row);
                $id++;

                $query = "SELECT id FROM accounts";
                $response = mysqli_query($dbc, $query) or die(mysqli_error());
                for($i = 0; $array[$i] = mysqli_fetch_assoc($response); $i++) ;


                
                $query = "SELECT MAX(row) FROM accounts";
                $response = mysqli_query($dbc, $query);
                $row = mysqli_fetch_assoc($response);
                $entries = implode("", $row);
                $entries++;

                $pw1 = password_hash($pw1, PASSWORD_DEFAULT);

                $randPP = rand(1, 7);



                $query = "INSERT INTO accounts VALUES ('$entries', '$id', '$username', '$pw1', '$email', '$randPP', now(), 0)";

                if (mysqli_query($dbc, $query)) {
                    ?><meta http-equiv="refresh" content="0;url=index.php"><?php
                } else {
                    function_alert("Error: " . $query . "<br>" . mysqli_error($dbc));
                    echo "Error: " . $query . "<br>" . mysqli_error($dbc);
                }
            }
        }
    }

}

?>




