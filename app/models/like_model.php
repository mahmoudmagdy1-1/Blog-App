<?php

require_once('../app/handelers/database_handeler.php');
$table_name = 'likes';
function insertLike($newLike)
{
    global $table_name;
    $insert_statues = insert_item($table_name, $newLike);
    return  $insert_statues; //"Like Created Sucessfully"
}

function removeLike($newLike)
{
    global $table_name;
    $delete_status =  delete_item($table_name, $newLike);
    return $delete_status;
}
