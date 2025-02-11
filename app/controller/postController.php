<?php
require_once('../app/models/post_model.php');

function post_index()
{
    $posts = list_Posts();

    $post_All = $posts[0];
    for ($i = 0; $i < count($posts[0]); $i++) {

        for ($j = 0; $j < count($posts[1]); $j++) {
            if ($posts[0][$i]['id'] == $posts[1][$j]['id']) {
                $post_All[$i]['likes_count'] = $posts[1][$j]['likes_count'];
                break;
            }
        }
        for ($j = 0; $j < count($posts[2]); $j++) {
            if ($posts[0][$i]['id'] == $posts[2][$j]['id']) {
                $post_All[$i]['comments_count'] = $posts[2][$j]['comments_count'];
                break;
            }
        }
    }

    $_SESSION['post_All'] = $post_All;
    header("location:posts_all");
    die;
}

$errors = [];
function store_post()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  title,user_id ,content , image

        //  validation of title => required, min 3, max 50
        if (empty($title)) {
            $errors[] = "title is required";
        } elseif (strlen($title) < 3) {
            $errors[] = "title must be greater than 3 chars";
        } elseif (strlen($title) > 50) {
            $errors[] =  "title must be less than 50 chars";
        }

        //  validation of content => required, min 3, max 500
        if (empty($content)) {
            $errors[] = "content is required";
        } elseif (strlen($content) < 3) {
            $errors[] = "content must be greater than 3 chars";
        } elseif (strlen($content) > 500) {
            $errors[] =  "content must be less than 500 chars";
        }



        //  validation image Exit if file uploaded
        if (isset($_FILES["image"]['tmp_name'])) {

            $image_file = $_FILES["image"]; // Get reference to uploaded image

            // Exit if image file is zero bytes
            if (filesize($image_file["tmp_name"]) <= 0) {
                $path = null;
            } else {
                // Exit if is not a valid image file
                $image_type = exif_imagetype($image_file["tmp_name"]);
                if (!$image_type) {
                    $errors[] = 'Uploaded file is not an image.';
                } else {
                    // Get file extension based on file type, to prepend a dot we pass true as the second parameter
                    $image_extension = image_type_to_extension($image_type, true);

                    // Create a unique image name
                    $image_name = bin2hex(random_bytes(16)) . $image_extension;

                    $path = '../app/storage/' . $image_name;
                    // Move the temp image file to the images directory
                    // (Temp image location , New image location
                    $result = move_uploaded_file($image_file["tmp_name"], $path);

                    if (!$result) {
                        $errors[] = 'failed to upload image';
                    }
                }
            }
        } else {
            $path = null;
        }


        if (empty($errors)) { //  title,user_id ,content , image
            $data = [
                "title" => $title,
                "content" => $content,
                "user_id" => $_SESSION['auth']['id'],
                "image" => $path
            ];
            $insert_statues = addPost($data);
            if (!$insert_statues) {
                $_SESSION['errors'] = $errors;
                header("location:add_post");
                die;
            }
            $_SESSION['Success'] = "Post Added Sucessfully";
            header("location:posts");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            header("location:add_post");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:add_post");
        die;
    }
}
