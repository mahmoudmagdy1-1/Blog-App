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
    $delete_status =  remove_item($table_name, $newLike);
    return $delete_status;
}

function checkLike($newLike)
{
    global $table_name;
    $query = "SELECT * FROM $table_name WHERE post_id = " . $newLike['post_id'] . " AND user_id = " . $newLike['user_id'];
    $result = select_array($query);
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}
