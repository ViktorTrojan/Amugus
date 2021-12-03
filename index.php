<?php
include_once 'header.php';

?>

    <div class="login-container">
        <div class="top">
            <h1>Login</h1>
        </div>

        <form action="php/index.php" method="post" autocomplete="off">
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
                    <input class="input" name="password" type="password" required>
                    <label>Password</label>
                </div>
            </div>
            <div class="pass">Forgot Password?</div>
            
            <form action="register.php" method="post">
                <input type="submit" value="Login">
            </form>
            

            <div class="signup-link">
                Not a member? <a href="register.php">Sign-Up</a>
            </div>
        </form>
    </div>
</body>

</html>