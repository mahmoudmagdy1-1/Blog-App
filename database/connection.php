<?php

$host="localhost";
$user="root";
$password="";
$db_name="pms3";
$port="3308";

$con=mysqli_connect($host,$user,$password,$db_name,$port);

//$con=mysqli_connect($host,$user,$password,$db_name);


var_dump($con);

?>