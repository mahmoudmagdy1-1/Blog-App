<?php
require_once( '../app/models/post_model.php');

function post_index(){
    $posts=list_Posts();
    
    /*echo "<pre>";
    print_r($posts[2]);
    echo "</pre><br>**************************<br>";*/
    $post_All=$posts[0];
    for($i=0;$i<count($posts[0]);$i++){

        for($j=0;$j<count($posts[1]);$j++){
            if($posts[0][$i]['id']==$posts[1][$j]['id']){
                //echo "id= ".$posts[1][$j]['id'].", likes_count =".$posts[1][$j]['likes_count']."<br>";
                $post_All[$i]['likes_count']=$posts[1][$j]['likes_count'];
                break;
            }

        }
        for($j=0;$j<count($posts[2]);$j++){
            if($posts[0][$i]['id']==$posts[2][$j]['id']){
                //echo "id= ".$posts[2][$j]['id'].", comments_count =".$posts[2][$j]['comments_count']."<br>";
                $post_All[$i]['comments_count']=$posts[2][$j]['comments_count'];
                break;
            }

        }

    }

    /*echo "<pre>";
    print_r($post_All);
    echo "</pre><br>**************************<br>";*/

    
    $_SESSION['post_All']=array_reverse($post_All);
    header("location:?url=posts_all");
    die;


}

$errors= [];
function store_post()
{
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
    
        foreach($_POST as $key => $value){
            $$key=trim(htmlspecialchars(htmlentities($value)));           
        }//  title,user_id ,content , image

        //validation of title => required, min 3, max 50
        if(empty($title)){
            $errors[]= "title is required";
        }elseif(strlen($title)< 3){
            $errors[]= "title must be greater than 3 chars";
        }elseif(strlen($title)> 50){
            $errors[]=  "title must be less than 50 chars";

        }

        //validation of content => required, min 3, max 500
        if(empty($content)){
            $errors[]= "content is required";
        }elseif(strlen($content)< 3){
            $errors[]= "content must be greater than 3 chars";
        }elseif(strlen($content)> 500){
            $errors[]=  "content must be less than 500 chars";

        }



         //validation image Exit if file uploaded
        if (isset($_FILES["image"]['tmp_name'])) {

            $image_file = $_FILES["image"];// Get reference to uploaded image

            // Exit if image file is zero bytes
            if (filesize($image_file["tmp_name"]) <= 0) {
                $path =null;
                //$errors[]='Uploaded file has no contents.';
            }else{
                // Exit if is not a valid image file
                $image_type = exif_imagetype($image_file["tmp_name"]);
                if (!$image_type) {
                    $errors[]='Uploaded file is not an image.';
                }else{
                    // Get file extension based on file type, to prepend a dot we pass true as the second parameter
                    $image_extension = image_type_to_extension($image_type, true);

                    // Create a unique image name
                    $image_name = bin2hex(random_bytes(16)) . $image_extension;

                    $path = '../app/storage/'.$image_name;
                    // Move the temp image file to the images directory
                    // (Temp image location , New image location
                    $result= move_uploaded_file( $image_file["tmp_name"],$path);

                    if (!$result) {
                        $errors[]= 'failed to upload image';
                    }
                } 
            }
        }else{
            $path =null;
        }


    if(empty($errors)){//  title,user_id ,content , image
        $data = [
            "title" => $title,
            "content" => $content,
            "user_id" =>$_SESSION['auth']['id'],
            "image" => $path ];
            $insert_statues=addPost($data);
            if(!$insert_statues){
                $_SESSION['errors']=$errors;
                header("location:?url=add_post");
                die;
            }
            $_SESSION['Success']="Post Added Sucessfully";
            header("location:?url=posts");
            die;
    }else{
        $_SESSION['errors']=$errors;
        header("location:?url=add_post");
        die;
    }

       
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        header("location:?url=add_post");
        die;
    }
}

function edit_post(){

    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            header("location:?url=posts");
            die;
        }
        $id=$_GET['id'];
        
        $post=get_post($id);
        if(isset($post)){
            $_SESSION['Post']=(object)$post;
            header("location:?url=update_post");
            die;
        }else{
            //$_SESSION['Products']=listProducts($file);
            $_SESSION['error'] =  "can't get profile data";
            header("location:?url=posts");
            die;
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        header("location:?url=posts");
        die;
    }

    
}

function updatePost(){

    if($_SERVER['REQUEST_METHOD']=="POST"){
    
        foreach($_POST as $key => $value){
            $$key=trim(htmlspecialchars(htmlentities($value)));           
        }//  title,user_id ,content , image

        //validation of title => required, min 3, max 50
        if(empty($title)){
            $errors[]= "title is required";
        }elseif(strlen($title)< 3){
            $errors[]= "title must be greater than 3 chars";
        }elseif(strlen($title)> 50){
            $errors[]=  "title must be less than 50 chars";

        }elseif($title !=$_SESSION['Post']->title){
            $data['title']=  $title;

        }

        //validation of content => required, min 3, max 500
        if(empty($content)){
            $errors[]= "content is required";
        }elseif(strlen($content)< 3){
            $errors[]= "content must be greater than 3 chars";
        }elseif(strlen($content)> 500){
            $errors[]=  "content must be less than 500 chars";

        }elseif($content!=$_SESSION['Post']->content){
            $data['content']=  $content;
        }



        // var_dump($_FILES["image"]['tmp_name']);

        if(empty($remove_image)){
            //validation image Exit if file uploaded
            if (isset($_FILES["image"]['tmp_name'])) {

                $image_file = $_FILES["image"];// Get reference to uploaded image

                // Exit if image file is zero bytes
                if (filesize($image_file["tmp_name"]) <= 0) {
                    $path =null;
                    //$data ['user_image']= $_SESSION['auth']['user_image'];
                    //$errors[]='Uploaded file has no contents.';
                }else{
                    // Exit if is not a valid image file
                    $image_type = exif_imagetype($image_file["tmp_name"]);
                    if (!$image_type) {
                        $errors[]='Uploaded file is not an image.';
                    }else{
                        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
                        $image_extension = image_type_to_extension($image_type, true);

                        // Create a unique image name
                        $image_name = bin2hex(random_bytes(16)) . $image_extension;

                        $path = '../app/storage/'.$image_name;
                        // Move the temp image file to the images directory
                        // (Temp image location , New image location
                        $result= move_uploaded_file( $image_file["tmp_name"],$path);

                        if (!$result) {
                            $errors[]= 'failed to upload image';
                            //$data []= ['user_image'=>null];
                        }else{
                            $data ['image']=$path;
                        }
                    } 
                }
            }else{
                $path =null;
                //$data ['user_image']= $_SESSION['auth']['user_image'];          
            }
        }else{
            $data ['image']= null;
        }

        
    if(empty($errors) && isset( $data)){
            $update_statues=update_post($id,$data);
            if(!$update_statues){
                $_SESSION['errors']=$errors;
                header("location:?url=update_post");
                die;
            }
            
            $_SESSION['Success']="Post updated Sucessfully";
            header("location:?url=posts");
            die;
        }else{
        $_SESSION['errors']=$errors;
        header("location:?url=update_post");
        die;
    }

       
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        header("location:?url=update_post");
        die;
    }
}

function deletePost(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            header("location:?url=posts");
            die;
        }
        $id=$_GET['id'];
        
        $delete_statues=delete_Post($id);  
        header("location:?url=posts");
        die;
       
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        header("location:?url=posts");
        die;
    }

    
}

?>