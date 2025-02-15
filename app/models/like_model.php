<?php

require_once('../app/handelers/database_handeler.php');
/*$table_name = 'likes';*/
function insertLike($newLike)
{
    $table_name='likes';
    $insert_statues = insert_item($table_name, $newLike);
    return  $insert_statues; //"Like Created Sucessfully"
}

function removeLike($newLike)
{
    $table_name='likes';
    $delete_status =  remove_item($table_name, $newLike);
    return $delete_status;
}

function checkLike($newLike)
{
    $table_name='likes';
    $query = "SELECT * FROM $table_name WHERE post_id = " . $newLike['post_id'] . " AND user_id = " . $newLike['user_id'];
    $result = select_array($query);
    if (empty($result)) {
        if(isset($_SESSION['error'])){unset($_SESSION['error']);}
        return false;
    } else {
        return true;
    }
}

