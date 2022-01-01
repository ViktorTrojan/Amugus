<?php
session_start();
require_once 'includes/dbh.inc.php';
include_once 'includes/header.inc.php';
$username = DB("username");
$password = DB("password");
$email = DB("email");
$date = DB("createDate");
$ProPic = DB("profilePicture");


if(DB("admin")==1){
  $status = "admin";
} elseif (DB("admin")==0) {
  $status = "user";
}

?>


<link rel="stylesheet" type="text/css" href="css/profile.css">

<div class="login-container">
        <div class="top">
            
            <h1><img class="logo" src="img/user<?php echo $ProPic?>.png" alt="ProfilePicture" width="50" height="50">Profile</h1>
        </div>
<div>
  <table class="table">
    <tr>
      <th>Username:</th>
      <td><?php echo $username?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo "*****"?></td>
    </tr>
    <tr>
      <th>E-Mail:</th>
      <td><?php echo $email?></td>
    </tr>
    <tr>
      <th>Created on:</th>
      <td><?php echo $date?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $status?></td>
    </tr>
  </table>
</div>

</body>

</html>