<?php

DEFINE ('DB_USER', 'insy_admin');
DEFINE ('DB_PASSWORD', 'admin2021');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'insy');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to Mysql ' .
        mysqli_connect_error());

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(mysqli_error($mysqli));