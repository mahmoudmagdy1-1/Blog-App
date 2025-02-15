<?php
require_once('../app/handelers/database_handeler.php');
require_once('../app/models/Comment_model.php');
/*
$table_name = 'posts';
$table_users = 'users';
$table_likes = 'likes';
$table_comments = 'comments';*/

//add Post
function addPost($newPost)
{
    $table_name='posts';
    $insert_statues = insert_item($table_name, $newPost);
    return  $insert_statues; //"Post Created Sucessfully"
}

/** list all posts with it's number of likes and number of comments and user creator */
function list_Posts()
{
    $user_id = $_SESSION['auth']['id'] ?? 1;

    $query = "
        SELECT 
            posts.*, 
            users.first_name, 
            users.last_name, 
            users.user_image,
            likes_count.likes_count AS likes_count,
            comments_count.comments_count AS comments_count,
            user_likes.like_id
        FROM posts
        JOIN users ON posts.user_id = users.id
        LEFT JOIN (
            SELECT post_id, COUNT(id) AS likes_count
            FROM likes
            GROUP BY post_id
        ) AS likes_count ON posts.id = likes_count.post_id
        LEFT JOIN (
            SELECT post_id, COUNT(id) AS comments_count
            FROM comments
            GROUP BY post_id
        ) AS comments_count ON posts.id = comments_count.post_id
        LEFT JOIN (
            SELECT post_id, id AS like_id
            FROM likes
            WHERE user_id = $user_id
        ) AS user_likes ON posts.id = user_likes.post_id
    ";

    $posts = select_array($query);
    if (empty($posts)) {
        $posts = [];
    }

    return $posts;
}

/** list post by id with it's number of likes and number of comments and user creator */
function list_Posts_data($id)
{
    $user_id = $_SESSION['auth']['id'] ?? 1;

    $query = "
        SELECT 
            posts.*, 
            users.first_name, 
            users.last_name, 
            users.user_image,
            likes_count.likes_count AS likes_count,
            comments_count.comments_count AS comments_count,
            user_likes.like_id
        FROM posts
        JOIN users ON posts.user_id = users.id
        LEFT JOIN (
            SELECT post_id, COUNT(id) AS likes_count
            FROM likes
            GROUP BY post_id
        ) AS likes_count ON posts.id = likes_count.post_id
        LEFT JOIN (
            SELECT post_id, COUNT(id) AS comments_count
            FROM comments
            GROUP BY post_id
        ) AS comments_count ON posts.id = comments_count.post_id
        LEFT JOIN (
            SELECT post_id, id AS like_id
            FROM likes
            WHERE user_id = $user_id
        ) AS user_likes ON posts.id = user_likes.post_id
         having posts.id=$id
    ";

    $posts = select_array($query);
    if (empty($posts)) {
        $posts = [];
    }

    return $posts[0];
}

/* get  all comment of specific post id*/
function get_post_all_comments($id){
    $user_id = $_SESSION['auth']['id'] ?? 1;
    $query="SELECt posts.id as post_id,comments.id as comment_id,
        comments.created_at,comments.content,users.id as user_id,
        users.first_name, users.last_name, users.user_image,likes_comment_count,like_id 
        FROM `posts` 
         left JOIN comments on comments.post_id=posts.id 
          JOIN users on comments.user_id=users.id 
         left JOIN ( 
            SELECT likes_comment.comment_id, COUNT(id) AS likes_comment_count 
            FROM likes_comment
            GROUP BY comment_id 
            ) AS likes_comment_count ON comments.id = likes_comment_count.comment_id 
         left JOIN ( 
            SELECT likes_comment.comment_id, id AS like_id 
            FROM likes_comment 
            WHERE user_id = $user_id 
            ) AS user_comment_likes ON comments.id = user_comment_likes.comment_id 
        HAVING posts.id=$id;";
        $post = select_array($query);
        if (empty($post)) {
            $post = [];
            if(isset($_SESSION['error'])){unset($_SESSION['error']);}
        }
    
        return $post;
}
/** select post using id */
function get_post( $id){
    $table_name='posts';
    $query="SELECT $table_name.*, users.first_name,users.last_name,users.user_image 
        FROM `posts` 
        LEFT JOIN users on users.id=posts.user_id
        HAVING posts.id=$id";
    $post = select_array($query);
    if(!empty($post)){
        return $post[0];
    }
    
    return false;
}


//delete Post with all it's related data in other tables
function delete_Post($id){
    $table_name='posts';
    $table_likes='likes';
    $data=["post_id"=>$id];
    remove_item($table_likes, $data);// delete all likes related to this post
    //remove_item($table_comments, $data);

    $query="SELECT comments.id as comment_id  ,posts.id 
            from posts 
            JOIN comments on comments.post_id=posts.id
            HAVING posts.id=$id";//get all comments related to this post
            
    $comments = select_array($query);
    
    if (!empty($comments)){
        foreach($comments as $key=>$comment){
            deleteComment($comment['comment_id']);//delete comments and in this function will delete comment likes also
        
        }
    }
    
    if(isset($_SESSION['error'])){unset($_SESSION['error']);}//don't make session error is post has no comments or likes
    
    $delete_status =  delete_item($table_name,$id);
    
    return $delete_status;
}

// update post data
function update_Post($id,$data){
   
    $table_name='posts';
    $update_status =  update_item($table_name,$data,$id);
    return $update_status;
}

?>