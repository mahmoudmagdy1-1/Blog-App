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

// list Users
function listPosts()  {
    global $table_name;
    $Users =  select_all($table_name);
    return $Users;
    
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

/** check if user exist with this email and password or not*/
function LoginCheck( $email , $password){
    global $table_name;
    $query="SELECT * FROM `$table_name` WHERE `email`='$email' and `password` = '$password'";
    $User = select_array($query);
    if(!empty($User)){
        return $User[0]['id'];
    }
    
    return false;
}

//delete User
function delete_User($id){
    global $table_name;
    $delete_status =  delete_item($table_name,$id);
    return $delete_status;
}

// update user data
function update_User($id,$data){
    global $table_name;
    $update_status =  update_item($table_name,$data,$id);
    return $update_status;
}







?>