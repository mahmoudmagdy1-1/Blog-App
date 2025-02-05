<?php
require_once('connection.php');



function select_all($table_name){
    global $con;
    $query="SELECT * FROM `$table_name`";
    $res=mysqli_query($con,$query);
    $data=mysqli_fetch_all($res,MYSQLI_ASSOC);
    /*echo "<pre>";
    var_dump($data);
    echo "</pre>";*/
    return $data;


}







?>