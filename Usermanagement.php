<?php
session_start();
if ($_SESSION['loggedin']==false || $_SESSION['status'] == 0 || !isset($_SESSION['status']) || !isset($_SESSION['loggedin'])) {
    header("Location: index.php");
}else{

require_once 'includes/dbh.inc.php';
include_once 'includes/UMheader.inc.php';

$query = "SELECT * FROM accounts";
$response = mysqli_query($dbc, $query);
$row_amount = mysqli_num_rows($response);


$result = $mysqli->query("SELECT * FROM accounts");
?>
<div class="table-responsive" >

<table class="table" style="margin-top: 50px">
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
    </div>
    </form>


</body>

</html>
<?php
}
?>
