<?php
session_start();
require_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
?>
<link rel="stylesheet" type="text/css" href="css/register.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <div class="login-container">
        <div class="top">
            <h1>Signup</h1>
        </div>

        <form action="?register=1" method="POST" autocomplete="off">
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
                    <input class="input" type="password" name="pw1" required>
                    <label>Password</label>
                </div>
            </div>
            <div class="text-input">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input class="input" type="password" name="pw2" required>
                    <label>Re-enter Password</label>
                </div>
            </div>

            <div class="text-input">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="div">
                    <input class="input" type="email" name="email" required>
                    <label>Enter your E-Mail</label>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="submit" value="Sign Up">Sign Up</button>
            </div>
            <div class="login-link">
                <span class="abt">Already have an account? <a href="index.php">Sign In</a></span>
            </div>
        </form>
    </div>

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



    </body>

</html>
