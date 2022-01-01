<?php
session_start();
require_once 'includes/dbh.inc.php';
include_once 'includes/UMheader.inc.php';

$query = "SELECT * FROM accounts";
$response = mysqli_query($dbc, $query);
$row_amount = mysqli_num_rows($response);

/*
$headers .= "Organization: Amugus\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
 */
$result = $mysqli->query("SELECT * FROM accounts");

if ($_SESSION['loggedin']==false || $_SESSION['status'] == 0) {
    header("Location: index.php");
}
?>



<div class="login-container">
        <div class="top">
            <h1>Account List</h1>
        </div>
<div class="table">

<table class="table">
        <thead>
            <tr>
            <th></th>
                <th>ID</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Created on</th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        
        <?php
while ($row = $result->fetch_assoc()):?>
        <form action="?login=1" method="post">
            <tr>
                <td><img class="logo" src="img/user<?php echo $row['profilePicture'] ?>.png" width="32" height="32"></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['createDate']; ?></td>
                <td><?php if ($row['admin'] == 1) {
                        echo "admin";
                    } elseif ($row['admin'] == 0) {
                        echo "user";
                    }?></td>
                <td>
                    <a href="process.php?edit=<?php echo $row['id']; ?>"
                        
                    <?php
                    $id = $row['id'];
                    if ($row['admin']==1) {
                            $_SESSION['button_name'] = "Make User";
                            ?> class="btn btn-outline-secondary"> 
                            <?php echo $_SESSION['button_name']?><?php
                    }elseif ($row['admin']==0) {
                            $_SESSION['button_name'] = "Make Admin";
                            ?> class="btn btn-outline-primary"> 
                            <?php echo $_SESSION['button_name']?><?php
                    }
                    ?>
                    </a>
                </td>
                <td>
                    <a href="process.php?delete=<?php echo $row['id']; ?>"
                            class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile;?>
    </table>
    </form>
</div>

</body>

</html>
