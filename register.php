<?php
require_once 'includes/dbh.inc.php';
include_once 'header.php';
?>
<link rel="stylesheet" type="text/css" href="css/register.css">
    <div class="login-container">
        <div class="top">
            <h1>Signup</h1>
        </div>

        <form action="register.php" method="POST" autocomplete="off">
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
                    <input class="input" name="email" type="email" required">
                    <label>Enter your email</label>
                </div>
            </div>
            <input type="submit" name="submit" value="Sign Up"></input>
        </form>
    </div>

    <?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pw1 = $_POST["pw1"];
    $pw2 = $_POST["pw2"];
    $email = $_POST["email"];

    if ($pw1 != $pw2) {
        function_alert("Your passwords do not match!");
    } else {
        $query = "SELECT MAX(uid) FROM accounts";
        $response = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($response);
        $uid = implode("", $row);
        $uid++;

        $pw1 = password_hash($pw1, PASSWORD_DEFAULT);

        $randPP = rand(1, 7);

        $query = "INSERT INTO accounts VALUES ('$uid', '$username', '$pw1', '$email', '$randPP', now(), '0')";

        if (mysqli_query($dbc, $query)) {
            echo "New record created successfully";
        } else {
            function_alert("Error: " . $query . "<br>" . mysqli_error($dbc));
            echo "Error: " . $query . "<br>" . mysqli_error($dbc);
        }
    } 
}

?>



    </body>

</html>
