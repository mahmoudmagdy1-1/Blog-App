<?php
//require_once('../../database/connection.php');
require_once('../database/connection.php');

/* select all items with desc order by id need table name*/
function select_all($table_name)
{
    global $con;
    $query = "SELECT * FROM `$table_name` ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result)) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($data)) {
                $_SESSION['error'] =  "No Data Exist in $table_name";
                return [];
            }
            return $data;
        } else {
            $_SESSION['error'] =  "No Data Exist in $table_name";
            return [];
        }
    } else {
        $_SESSION['error'] =  "select data error" . mysqli_connect_error();
        return [];
    }
}

/* select all items of specific column with desc order by id need table name*/
function select_all_column($table_name, $column_name)
{
    global $con;
    $query = "SELECT `id` , `$column_name` FROM `$table_name` ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result)) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($data)) {
                $_SESSION['error'] =  "No Data Exist in $table_name";
                return [];
            }
            return $data;
        } else {
            $_SESSION['error'] =  "No Data Exist in $table_name";
            return [];
        }
    } else {
        $_SESSION['error'] =  "select data error" . mysqli_connect_error();
        return [];
    }
}

/* run query to get array*/
function select_array($query)
{
    global $con;
    //$query="SELECT `id` , `$column_name` FROM `$table_name` ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result)) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (empty($data)) {
                $_SESSION['error'] =  "No Data Exist in ";
                return [];
            }
            return $data;
        } else {
            $_SESSION['error'] =  "No Data Exist in";
            return [];
        }
    } else {
        $_SESSION['error'] =  "select data error" . mysqli_connect_error();
        return [];
    }
}

/*$table_nam='likes';
$userss=select_all($table_nam);
echo "<pre>";
print_r($userss);
echo "</pre>";*/

/* to select specific row in table need table name and row id*/
function select_item($table_name, $id)
{
    global $con;
    $query = "SELECT * FROM `$table_name` WHERE id= '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result)) {
            $data = mysqli_fetch_assoc($result);
            if (empty($data)) {
                $_SESSION['error'] =  "No Data Exist with this id $id in this table $table_name";
                return [];
            }
            return $data;
        } else {
            $_SESSION['error'] =  "No Data Exist with this id $id in this table $table_name";
            return [];
        }
    } else {
        $_SESSION['error'] =  "select data error" . mysqli_connect_error();
        return [];
    }
}
/*
$table_nam='users';
$user=select_item($table_nam,30);
echo "<pre>";
print_r($user);
echo "</pre>";*/


/* to delete specific row in table need table name and row id*/
function delete_item($table_name, $id)
{
    global $con;
    $query = "DELETE FROM `$table_name` WHERE id= '$id'";
    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 1) {
        $_SESSION['success'] = "data deleted successfully";
        // header("location:../index.php");
        //die;
        return "data deleted successfully";
    } else {
        $_SESSION['error'] = "deleted error";
        //header("location:../index.php");
        //die;
        return "deleted error";
    }
}


function remove_item($table_name, $data)
{
    global $con;
    $data_keys_arr = array_keys($data);
    $data_values_arr = array_values($data);
    $data_keys = "`" . implode("`,`", $data_keys_arr) . "`";
    $data_values = "'" . implode("','", $data_values_arr) . "'";

    $query = "DELETE FROM `$table_name` WHERE ($data_keys) = ($data_values)";
    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 1) {
        $_SESSION['success'] = "data deleted successfully";
        return "data deleted successfully";
    } else {
        $_SESSION['error'] = "deleted error";
        return "deleted error";
    }
}

/*$table_nam='users';
$statues_deleted=delete_item($table_nam,21);
echo $statues_deleted;*/

/** insert row to table need table name and data(as associative array) */
function insert_item($table_name, $data)
{
    global $con;
    $data_keys_arr = array_keys($data);
    $data_values_arr = array_values($data);
    $data_keys = "`" . implode("`,`", $data_keys_arr) . "`";
    $data_values = "'" . implode("','", $data_values_arr) . "'";

    $query = "INSERT INTO `$table_name`($data_keys) VALUES ($data_values)";
    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 1) {
        $_SESSION['success'] = "data inserted successfully";
        $_SESSION['auth_id'] = mysqli_insert_id($con);
        return true;
    } else {
        $_SESSION['error'] = "insert error" . mysqli_error($con);
        return false;
    }
}


/*
$table_nam='users';
$data=[
    "first_name"=>"elham",
    "last_name" =>"samir",
    "age"       => 20,
    "email"=>"email@email.com",
    "password"=>"123456"
];
$statues_insert=insert_item($table_nam,$data);
echo $statues_insert;*/


/** update row to table need table name and data(as associative array) and row id
 * send needed changed items in row only
 */
function update_item($table_name, $data, $id)
{
    global $con;
    $data_keys_value = ""; //`id`='[value-1]',`first_name`='[value-2]',`last_name`='[value-3]',`age`='[value-4]',`email`='[value-5]',`password`='[value-6]',`user_image`='[value-7]'
    foreach ($data as $key => $value) {
        $data_keys_value .= "`$key`" . '=' . "'$value' ,";
    }
    $data_keys_value = substr($data_keys_value, 0, -1); //remove last ,
    $query = "UPDATE `$table_name` SET $data_keys_value WHERE id=$id";
    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) == 1) {
        $_SESSION['success'] = "data updated successfully";
        return true;
    } else {
        $_SESSION['error'] = "update error" . mysqli_error($con);
        return false;
    }
}

/*
$table_nam='users';
$data=[
    "first_name"=>"elham11",
    "last_name" =>"samir11",
    "age"       => 20,
    "email"=>"email11184@email.com",
    "password"=>"123456"
];
$statues_update=update_item($table_nam,$data,3);
echo $statues_update;*/
