<?php
//session_start();
$host="localhost";
$user="root";
$password="";
$db_name="blog2";
$port="3308";
$con=mysqli_connect($host,$user,$password,$db_name,$port);

//$con=mysqli_connect($host,$user,$password,$db_name);

//var_dump($con);
if(!$con ){
    $_SESSION['error'] =  "connection error".mysqli_connect_error();
}
//var_dump($con);

?>