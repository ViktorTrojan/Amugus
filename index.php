<?php
require_once 'includes/dbh.inc.php';
include_once 'header.php';
session_start();
?>

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
                    <input class="input" name="username" type="text" required>
                    <label>Username</label>
                </div>
            </div>

            <div class="text-input">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input class="input" name="pw" type="password" required>
                    <label>Password</label>
                </div>
            </div>
            <div class="pass">Forgot Password?</div>

                <button type="submit" name="submit" value="Login">YOOO</button>

            <div class="signup-link">
                Not a member? <a href="register.php">Sign-Up</a>
            </div>
            <?php
if (isset($_GET["login"])) {
    $username = $_POST["username"];
    $pw1 = $_POST["pw"];
    $query = "SELECT uname FROM accounts";
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
        if ($exists) {
            function_alert("Usernames do match");
        } else {
            function_alert("Usernames do NOT match");

        }
    }

    if ($exists) {
        $query = "SELECT password FROM accounts WHERE uname = '$username'";
        $response = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($response);
        $pw2 = implode($row);
        if (password_verify("$pw1", "$pw2")) {
            function_alert("YES");
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            cookie("username", $username, 30);
            $_SESSION['username'] = $username;
            cookie("password", $pw2, 30);
            $_SESSION['password'] = $pw2;
            header("Location: profile.php");
        } else {
            function_alert("NO");
        }
    }

}
?>
        </form>

    </div>





    </body>

</html>