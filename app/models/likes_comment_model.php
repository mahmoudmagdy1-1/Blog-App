<?php

require_once('../app/handelers/database_handeler.php');
$table_name = 'likes_comment';


function removeLike($newLike)
{
    $table_name='likes_comment';
    $delete_status =  remove_item($table_name, $newLike);
    return $delete_status;
}

function insertLike_comment($newLike)
{
    $table_name='likes_comment';
    $insert_statues = insert_item($table_name, $newLike);
    return  $insert_statues; //"Like Created Sucessfully"
}

function checkLike_comment($newLike)
{
    $table_name='likes_comment';
    $query = "SELECT * FROM $table_name WHERE comment_id = " . $newLike['comment_id'] . " AND user_id = " . $newLike['user_id'];
    $result = select_array($query);
    if (empty($result)) {
        if(isset($_SESSION['error'])){unset($_SESSION['error']);}
        return false;
    } else {
        return true;
    }
}
