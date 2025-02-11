<?php
require_once( '../app/handelers/database_handeler.php');

$table_name='posts';
$table_users='users';
$table_likes='likes';
$table_comments='comments';

//add Post
function addPost( $newPost){
    global $table_name;
    $insert_statues = insert_item($table_name, $newPost);
    return  $insert_statues;//"Post Created Sucessfully"
}

/** list posts with it's number of likes and number of comments and user creator */
function list_Posts( ){
    //global $table_name;
    $query="SELECT posts.*  , users.first_name,users.last_name,users.user_image from posts JOIN users on posts.user_id=users.id";
    $post_user = select_array($query);
    if(empty($post_user)){
        $post_user=[];
    }
    $query="SELECT posts.id  , count(likes.id) as likes_count from posts JOIN likes on posts.id=likes.post_id GROUP by likes.post_id";
    $post_likes = select_array($query);
    if(empty($post_likes)){
        $post_likes=[];
    }
    $query="SELECT posts.id  , count(comments.id) as comments_count from posts JOIN comments on posts.id=comments.post_id GROUP by comments.post_id";
    $post_comments = select_array($query);
    if(empty($post_comments)){
        $post_comments=[];
    }
    $posts=[$post_user,$post_likes,$post_comments];
    return $posts;
    
}

/** select post using id */
function get_post( $id){
    global $table_name;
    $post = select_item($table_name,$id);
    if(!empty($post)){
        return $post;
    }
    
    return false;
}

//delete Post
function delete_Post($id){
    global $table_name;
    $delete_status =  delete_item($table_name,$id);
    return $delete_status;
}

// update post data
function update_Post($id,$data){
    global $table_name;
    $update_status =  update_item($table_name,$data,$id);
    return $update_status;
}







?>