<?php
require_once('../app/models/likes_comment_model.php');

function addLike_comment($newLike,$POST_id)
{
    $insert_statues = insertLike_comment($newLike);
    header("location:show_post&id=$POST_id");
    die;
    
}

function deleteLike_comment($newLike,$POST_id)
{
    $insert_statues = removeLike($newLike);
    header("location:show_post&id=$POST_id");
    die;
    
}

function likeIndex_comment()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!isset($_SESSION['auth'])) {
            header("location:login");
            die;
        }
        $newLike = [
            'user_id' => $_SESSION['auth']["id"],
            'comment_id' => $_POST['comment_id']
        ];

        
        if (checkLike_comment($newLike)) {
            deleteLike_comment($newLike,$_POST['post_id']);
        } else {
            addLike_comment($newLike,$_POST['post_id']);
        }
    }
}
