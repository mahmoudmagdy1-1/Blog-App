<?php
require_once('../app/models/user_model.php');
//require_once( '../models/user_model.php');

$errors = [];
function store_user()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  first_name,last_name ,age , email, password ,user_image

        //validation of first_name => required, min 3, max 30
        if (empty($first_name)) {
            $errors[] = "first name is required";
        } elseif (strlen($first_name) < 3) {
            $errors[] = "first name must be greater than 3 chars";
        } elseif (strlen($first_name) > 30) {
            $errors[] =  "first name must be less than 30 chars";
        }

        //validation of last_name => required, min 3, max 30
        if (empty($last_name)) {
            $errors[] = "last name is required";
        } elseif (strlen($last_name) < 3) {
            $errors[] = "last name must be greater than 3 chars";
        } elseif (strlen($last_name) > 30) {
            $errors[] =  "last name must be less than 30 chars";
        }

        // validation e-mail => required, email , not-exist
        if (empty($email)) {
            $errors[] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "please type a vaild email";
        } elseif (!notExistEmail($email)) {
            $errors[] = "please type other email , this email already exist";
        }

        // validation age => required, number 
        if (empty($age)) {
            $errors[] = "Age is required";
        } elseif (!is_numeric($age)) {
            $errors[] = "Age must be number";
        }

        // validation password => required, min: 6,max:100 
        if (empty($password)) {
            $errors[] = "password is required";
        } elseif (strlen($password) < 6) {
            $errors[] = "password must be greater than 6 chars";
        } elseif (strlen($password) > 100) {
            $errors[] =  "password must be less than 25 chars";
        }


        //validation image Exit if file uploaded
        if (isset($_FILES["image"]['tmp_name'])) {

            $image_file = $_FILES["image"]; // Get reference to uploaded image

            // Exit if image file is zero bytes
            if (filesize($image_file["tmp_name"]) <= 0) {
                $path = null;
                //$errors[]='Uploaded file has no contents.';
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


        if (empty($errors)) { //  first_name,last_name ,age , email, password ,user_image
            $data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "password" => sha1($password),
                "age" => $age,
                "user_image" => $path
            ];
            $insert_statues = addUser($data);
            if (!$insert_statues) {
                $_SESSION['errors'] = $errors;
                header("location:SignUp");
                die;
            }
            $_SESSION['auth'] = get_User($_SESSION['auth_id']);
            $_SESSION['Success'] = "Account Created Sucessfully";
            header("location:home");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            header("location:SignUp");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:SignUp");
        die;
    }
}

function check_login_user()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  first_name,last_name ,age , email, password ,user_image


        // validation e-mail => required, email , not-exist
        if (empty($email)) {
            $errors[] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "please type a vaild email";
        }


        // validation password => required, min: 6,max:100 
        if (empty($password)) {
            $errors[] = "password is required";
        }



        if (empty($errors)) { //  first_name,last_name ,age , email, password ,user_image

            $user = LoginCheck($email, sha1($password));
            if (!$user) {
                $_SESSION['error'] =  "wrong email or password!";
                header("location:login");
                die;
            }
            $_SESSION['auth'] = get_User($user);
            //var_dump($_SESSION['auth']);
            header("location:home");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            header("location:login");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:login");
        die;
    }
}

function update_user_data()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $data = [];
        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  id,first_name,last_name ,age , email ,user_image

        // validation id => required, num 
        if (empty($id)) {
            $_SESSION['error'] = "id is required";
            header("location:edit_user");
            die;
        } elseif (!is_numeric($id)) {
            $_SESSION['error'] = "id must be number";
            header("location:edit_user");
            die;
        }


        //validation of first_name => required, min 3, max 30
        if (empty($first_name)) {
            $errors[] = "first name is required";
        } elseif (strlen($first_name) < 3) {
            $errors[] = "first name must be greater than 3 chars";
        } elseif (strlen($first_name) > 30) {
            $errors[] =  "first name must be less than 30 chars";
        } elseif ($first_name != $_SESSION['auth']['first_name']) {
            $data['first_name'] = $first_name;
        }

        //validation of last_name => required, min 3, max 30
        if (empty($last_name)) {
            $errors[] = "last name is required";
        } elseif (strlen($last_name) < 3) {
            $errors[] = "last name must be greater than 3 chars";
        } elseif (strlen($last_name) > 30) {
            $errors[] =  "last name must be less than 30 chars";
        } elseif ($last_name != $_SESSION['auth']['last_name']) {
            $data['last_name'] = $last_name;
        }

        // validation e-mail => required, email , not-exist
        if (empty($email)) {
            $errors[] = "email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "please type a vaild email";
        } elseif ($email != $_SESSION['auth']['email']) {
            if (!notExistEmail($email)) {
                $errors[] = "please type other email , this email already exist";
            } else {
                $data['email'] = $email;
            }
        }

        // validation age => required, number 
        if (empty($age)) {
            $errors[] = "Age is required";
        } elseif (!is_numeric($age)) {
            $errors[] = "Age must be number";
        } elseif ($age != $_SESSION['auth']['age']) {
            $data['age'] = $age;
        }

        // var_dump($_FILES["image"]['tmp_name']);

        if (empty($remove_image)) {
            //validation image Exit if file uploaded
            if (isset($_FILES["image"]['tmp_name'])) {

                $image_file = $_FILES["image"]; // Get reference to uploaded image

                // Exit if image file is zero bytes
                if (filesize($image_file["tmp_name"]) <= 0) {
                    $path = null;
                    //$data ['user_image']= $_SESSION['auth']['user_image'];
                    //$errors[]='Uploaded file has no contents.';
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
                            //$data []= ['user_image'=>null];
                        } else {
                            $data['user_image'] = $path;
                        }
                    }
                }
            } else {
                $path = null;
                //$data ['user_image']= $_SESSION['auth']['user_image'];          
            }
        } else {
            $data['user_image'] = null;
        }


        if (empty($errors) && isset($data)) { //  first_name,last_name ,age , email, password ,user_image

            $update_statues = update_User($id, $data);
            if (!$update_statues) {
                $_SESSION['errors'] = $errors;
                header("location:edit_user");
                die;
            }
            $_SESSION['auth'] = get_User($id);
            $_SESSION['Success'] = "Account updated Sucessfully";
            header("location:user-profille");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            header("location:edit_user");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:edit_user");
        die;
    }
}


function update_user_password()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  id,password , password_confirm

        // validation id => required, num 
        if (empty($id)) {
            $_SESSION['error'] = "id is required";
            header("location:edit_user");
            die;
        } elseif (!is_numeric($id)) {
            $_SESSION['error'] = "id must be number";
            header("location:edit_user");
            die;
        }


        // validation password => required, min: 6,max:100 
        if (empty($password)) {
            $errors[] = "password is required";
        } elseif (strlen($password) < 6) {
            $errors[] = "password must be greater than 6 chars";
        } elseif (strlen($password) > 100) {
            $errors[] =  "password must be less than 25 chars";
        }

        // validation password => required, equality, old password 
        if (empty($password_confirm)) {
            $errors[] = "password is required";
        } elseif ($password_confirm != $password) {
            $errors[] = "password not match confirm password";
        } elseif (sha1($password) == $_SESSION['auth']['password']) {
            $errors[] = "old password can't be new password";
        }


        if (empty($errors)) { //  password
            $data['password'] = sha1($password);
            $update_statues = update_User($id, $data);
            if (!$update_statues) {
                $_SESSION['errors'] = $errors;
                header("location:edit_user_password");
                die;
            }
            $_SESSION['auth'] = get_User($id);
            $_SESSION['Success'] = "Password updated Sucessfully";
            header("location:user-profille");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            header("location:edit_user_password");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        header("location:edit_user_password");
        die;
    }
}


/*
function get_user_data(){
    if($_SERVER['REQUEST_METHOD']=="get"){
    
        $id=trim(htmlspecialchars(htmlentities($_GET['id'])));           
        
         // validation id => required, num 
        if(empty($id)){
            $_SESSION['error']="id is required";
            header("location:home");
            die;
        }elseif(!is_numeric($id)){
            $_SESSION['error']="Age must be number";
            header("location:home");
            die;
        } 
            $user=get_User($id);
            header("location:home");
            die;
        
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        header("location:home");
        die;
    }


}*/
