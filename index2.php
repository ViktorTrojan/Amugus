<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div>
    <h1>Login</h1>
    <form action = "?login1" method="POST">
        <div class="txt_field">
            <input type="text" name = "usr" required>
            <label>Username</label>
        </div>
        <div class="txt_field">
            <input type="password" name = "pw" required>
            <label>Password</label>
        </div>
    </form>
    <button type = "submit" name = "submit" value = "submit">Login</button>
    
    <?php
    if(isset($_POST["usr"]))[{
    ?><h1><?php echo $_POST["usr"] ?> </h1><?php
    }
    
    ?>
</div>

    
</body>
</html> 