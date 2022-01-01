<?php
@session_start();
require_once 'includes/dbh.inc.php';

function DB($value)
{
    $query = "SELECT $value FROM accounts WHERE username = '{$_SESSION['username']}'";
    $response = mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME), $query);
    while ($row = $response->fetch_assoc()){
        return $row[$value];
    }
    /*
    if ($_SESSION['loggedin'] == true) {
        $query = "SELECT '$value' FROM accounts WHERE username = '{$_SESSION['username']}'";
        $response = mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME), $query);
        $row = mysqli_fetch_assoc($response);
        return implode($row);
    }
    */
}

function DB_Values($value, $row)
{
    $query = "SELECT $value FROM accounts WHERE row = '$row'";
    $response = mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME), $query);
    $row = mysqli_fetch_assoc($response);
    return implode($row);
}
function function_alert($message)
{
    echo "<script>alert('$message');</script>";
}
/*
function cookie($cookie_name, $cookie_value, $days)
{
setcookie($cookie_name, $cookie_value, time() + (86400 * $days), "/");
$_SESSION[$cookie_name] = $cookie_value;
if (!isset($_SESSION[$cookie_name])) {
session_destroy();
}
}
 */

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

function delete_user($row)
{
    $query = "DELETE FROM accounts WHERE row = '$row'";
    $response = mysqli_query(mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME), $query);
}
