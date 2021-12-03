<?php
include_once 'header.php';
?>

    <div class="login-container">
        <div class="top">
            <h1>Signup</h1>
        </div>

        <form action="php/register.php" method="post" autocomplete="off">
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
            <div class="text-input">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <input class="input" name="password" type="password" required>
                    <label>Re-enter Password</label>
                </div>
            </div>

            <div class="text-input">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="div">
                    <input class="input" name="email" type="text">
                    <label>E-Mail (optional)</label>
                </div>
            </div>

            <input type="submit" value="Signup">
        </form>
    </div>
</body>

</html>