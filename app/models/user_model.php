<?php
require_once('../app/handelers/database_handeler.php');
/*
$table_name = 'users';
*/
//add User
function addUser($newUser)
{
    $table_name='users';
    $insert_statues = insert_item($table_name, $newUser);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list Users
function listUsers()
{
    $table_name='users';
    $Users =  select_all($table_name);
    return $Users;
}

/** to check if email exist already in users before or not*/
function notExistEmail($email)
{
    $table_name='users';
    $col_name = "email";
    $Users = select_all_column($table_name, $col_name);
    foreach ($Users as $user) {
        //echo " email = $email , user['email'] = ". $user->email."<br>";
        if ($email == $user['email']) {
            return false;
        }
    }

    return true;
}

/** check if user exist with this email and password or not*/
function LoginCheck($email, $password)
{
    $table_name='users';
    $query = "SELECT * FROM `$table_name` WHERE `email`='$email' and `password` = '$password'";
    $User = select_array($query);
    if (!empty($User)) {
        return $User[0]['id'];
    }

    return false;
}

/** select user using id */
function get_User($id)
{
    $table_name='users';
    $User = select_item($table_name, $id);
    if (!empty($User)) {
        return $User;
    }

    return false;
}

//delete User
function delete_User($id)
{
    $table_name='users';
    $delete_status =  delete_item($table_name, $id);
    return $delete_status;
}

// update user data
function update_User($id, $data)
{
    $table_name='users';
    $update_status =  update_item($table_name, $data, $id);
    return $update_status;
}
