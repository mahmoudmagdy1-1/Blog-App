<?php
require_once('../app/models/like_model.php');

function addLike($newLike)
{
    $insert_statues = insertLike($newLike);
    if ($insert_statues) {
        header("location:store_like");
        die;
    } else {
        header("location:.");
        die;
    }
}

function deleteLike($newLike)
{
    $insert_statues = removeLike($newLike);
    if ($insert_statues) {
        header("location:store_like");
        die;
    } else {
        header("location:.");
        die;
    }
}

function likeIndex()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!isset($_SESSION['auth'])) {
            header("location:login");
            die;
        }
        $newLike = [
            'user_id' => $_SESSION['auth']["id"],
            'post_id' => $_POST['post_id']
        ];
        if ($_SESSION['post_All']['post_id']['like_id']) {
            deleteLike($newLike);
        } else  addLike($newLike);
    }
}
