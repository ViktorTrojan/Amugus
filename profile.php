<?php
require_once 'includes/dbh.inc.php';
include_once 'header.php';
session_start();

//$username = getDB("uname");
?>


<link rel="stylesheet" type="text/css" href="css/profile.css">

<div class="login-container">
        <div class="top">
            <h1>Profile</h1>
        </div>
<div class="table">
<table>
  <tr>
    <th>Username</th>
    <th>Password</th>
    <th>E-Mail</th>
    <th>Account created on</th>
    <th>Status</th>
  </tr>
  <tr>
    <td><?php echo $_SESSION['username']?></td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td>Germany</td>
    <td>Unknown</td>
  </tr>
</table>



</div>

</body>

</html>