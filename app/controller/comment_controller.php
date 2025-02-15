<?php
require_once('../app/models/Comment_model.php');
//require_once( '../models/user_model.php');


function store_comment()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $errors = [];
        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  content

        
        //validation of content => required, min 3, max 500
        if (empty($content)) {
            $errors[] = "content is required";
        } elseif (strlen($content) < 3) {
            $errors[] = "content must be greater than 3 chars";
        } elseif (strlen($content) > 500) {
            $errors[] =  "content must be less than 500 chars";
        }



        if (empty($errors)) { //  content
            $data = [
                "content" => $content,
                "post_id" => $post_id,
                "user_id" => $_SESSION['auth']['id']
            ];
            $insert_statues = addComment($data);
            if (!$insert_statues) {
                $_SESSION['errors'] = $errors;
                header("location:show_post&id=$post_id");
                die;
            }
            
            $_SESSION['Success'] = "Comment Added Sucessfully";
            header("location:show_post&id=$post_id");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            header("location:show_post&id=$post_id");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:posts");
        die;
    }
}


function edit_comment()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $errors = [];
        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  content

        
        //validation of content => required, min 3, max 500
        if (empty($content)) {
            $errors[] = "content is required";
        } elseif (strlen($content) < 3) {
            $errors[] = "content must be greater than 3 chars";
        } elseif (strlen($content) > 500) {
            $errors[] =  "content must be less than 500 chars";
        }

        if (empty($errors)) { 

            $data = [
                "content" => $content,
                "post_id" => $post_id,
                "user_id" => $_SESSION['auth']['id']
            ];
            $update_statues = updateComment($id,$data);
            if (!$update_statues) {
                $_SESSION['errors'] = $errors;
                header("location:show_post&id=$post_id");
                die;
            }
            
            $_SESSION['Success'] = "Comment updated Sucessfully";
            header("location:show_post&id=$post_id");
            die;

            
        } else {
            $_SESSION['errors'] = $errors;
            header("location:show_post&id=$post_id");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:posts");
        die;
    }
}

function delete_comment(){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } 
        
    
        
        if (isset($post_id) && isset($id)) { 
            
            $delete_statues = deleteComment($id);
            if (!$delete_statues) {
                $_SESSION['error'] = "delete comment error";
                header("location:show_post&id=$post_id");
                die;
            }
            
            $_SESSION['Success'] = "Comment deleted Sucessfully";
            header("location:show_post&id=$post_id");
            die;
        } else {
            $_SESSION['error'] = "required comment id and post id";
            header("location:show_post&id=$post_id");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:posts");
        die;
    }
}
