<?php
session_start();

require_once 'includes/dbh.inc.php';

if (isset($_GET['logout'])){
    $_SESSION['loggedin'] = false;
    header("Location: index.php");
}


if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $result = $mysqli->query("SELECT * FROM accounts WHERE id='$id'");
    while ($row = $result->fetch_assoc()){
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $createDate = $row['createDate'];
        $admin = $row['admin'];
    }

    $mysqli->query("DELETE FROM accounts WHERE id='$id'") or
        die($mysqli->error);

    mail($email, "Account deleted", "Your account on insy.bplaced.net just got deleted. Sad to see you go!");
    
    header("Location: usermanagement.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];

    $result = $mysqli->query("SELECT * FROM accounts WHERE id='$id'");
    while ($row = $result->fetch_assoc()){
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $createDate = $row['createDate'];
        $admin = $row['admin'];
    }

    $result = $mysqli->query("SELECT admin FROM accounts WHERE id='$id'");
    $row = $result->fetch_assoc();

    if ($row['admin']==1) {
        $mysqli->query("UPDATE accounts SET admin=0 WHERE id='$id'") or
            die($mysqli->error);
            $_SESSION['button_name'] = "Make Admin";
            mail($email, "Account change", "Your account on insy.bplaced.net just got set to the user status. Sad to see you go!");
    }elseif ($row['admin']==0) {
        $mysqli->query("UPDATE accounts SET admin=1 WHERE id='$id'") or
            die($mysqli->error);
            $_SESSION['button_name'] = "Make User";
            mail($email, "Account change", "Your account on insy.bplaced.net just got set to the admin status. Welcome to the team!");
    }


    header("Location: usermanagement.php");
}