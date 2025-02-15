<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "blog2";
$port = "3308";
$con = mysqli_connect($host, $user, $password, $db_name, $port);

if (!$con) {
    $_SESSION['error'] =  "connection error" . mysqli_connect_error();
}
