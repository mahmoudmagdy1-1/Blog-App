<?php
require_once('../app/handelers/database_handeler.php');
/*
$table_name = 'comments';
$table_likes_comment='likes_comment';
*/
//add Comment
function addComment($newUser)
{
    $table_name='comments';
    $insert_statues = insert_item($table_name, $newUser);
    return  $insert_statues; //"comment Created Sucessfully"
}

// list Comments
function listComments()
{
    $table_name='comments';
    $Users =  select_all($table_name);
    return $Users;
}

/** select Comment using id */
function getComment($id)
{
    $table_name='comments';
    $data = select_item($table_name, $id);
    if (!empty($data)) {
        return $data;
    }

    return false;
}

//delete Comment
function deleteComment($id)
{
    $table_name='comments';
    $table_likes_comment='likes_comment';
    $data=["comment_id"=>$id];
    remove_item($table_likes_comment, $data);// delete likes of comment before delete comments
    if(isset($_SESSION['error'])){unset($_SESSION['error']);}// if no likes didn't make session of error
    $delete_status =  delete_item($table_name, $id);// delete comment
    return $delete_status;
}

// update Comment data
function updateComment($id, $data)
{
    $table_name='comments';
    $update_status =  update_item($table_name, $data, $id);
    return $update_status;
}
