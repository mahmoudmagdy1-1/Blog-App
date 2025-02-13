<?php
require_once('../app/handelers/database_handeler.php');

$table_name = 'posts';
$table_users = 'users';
$table_likes = 'likes';
$table_comments = 'comments';

//add Post
function addPost($newPost)
{
    global $table_name;
    $insert_statues = insert_item($table_name, $newPost);
    return  $insert_statues; //"Post Created Sucessfully"
}

/** list posts with it's number of likes and number of comments and user creator */
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

//delete User
function delete_Post($id)
{
    global $table_name;
    $delete_status =  delete_item($table_name, $id);
    return $delete_status;
}

// update user data
function update_Post($id, $data)
{
    global $table_name;
    $update_status =  update_item($table_name, $data, $id);
    return $update_status;
}
