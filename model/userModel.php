<?php
require_once('../model/db.php');
$role = "user";

function login($username, $password)
{
    global $role;
    $con = dbConnection();
    $sql = "select * from login where username='{$username}' and password='{$password}' and role='{$role}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return 1;
    }
    $role = "admin";
    $sql = "select * from login where username='{$username}' and password='{$password}' and role='{$role}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return 2;
    }
    $role = "host";
    $sql = "select * from login where username='{$username}' and password='{$password}' and role='{$role}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return 3;
    } else {
        return 0;
    }
}

function getByEmail($email)
{
    $con = dbConnection();
    $sql = "select * from user where email='{$email}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return true;
    } else {
        return false;
    }
}
function getByUser($username)
{
    $con = dbConnection();
    $sql = "select * from user where username ='{$username}'";
    $result = mysqli_query($con, $sql);
    $users = mysqli_fetch_assoc($result);
    return $users;
}

function updateUserPass($newpassword, $email)
{
    $con = dbConnection();
    $sql = "UPDATE login SET password = '{$newpassword}' WHERE username = (SELECT username FROM user WHERE email = '{$email}')";
    $result = mysqli_query($con, $sql);
    //$count = mysqli_num_rows($result);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function createUser($user)
{
    global $role;
    $con = dbConnection();
    $sql = "insert into user values('{$user['username']}','{$user['name']}','{$user['email']}', '{$user['gender']}', '{$user['dob']}')";
    $sql1 = "insert into login values('{$user['username']}','{$user['password']}','{$user['role']}')";
    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        return true;
    } else {
        return false;
    }
}
function checkEmail($email)
{
    $con = dbConnection();
    $sql = "select * from user where email ='{$email}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return 1;
    } else {
        return 0;
    }
}
function getRole($username)
{
    $con = dbConnection();
    $sql = "select * from login where username ='{$username}'";
    $result = mysqli_query($con, $sql);
    $users = mysqli_fetch_assoc($result);
    if (isset($users['role'])) {
        return $users['role'];
    } else {
        return 0;
    }
}
function deleteUser($username)
{
    $con = dbConnection();
    $sql = "DELETE FROM user WHERE username='{$username}'";
    $sql1 = "DELETE FROM login WHERE username='{$username}'";
    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        return true;
    } else {
        return false;
    }
}
function getUser($role)
{
    $con = dbConnection();
    $sql = "SELECT user.*
            FROM user
            JOIN login ON user.username = login.username
            WHERE login.role = '{$role}'";
    $result = mysqli_query($con, $sql);
    //$users = mysqli_fetch_assoc($result);
    $users = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($users, $row);
    }

    return $users;

}
function checkUsername($username)
{
    $con = dbConnection();
    $sql = "select * from user where username ='{$username}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return 1;
    } else {
        return 0;
    }
}
function updateUser($user)
{
    $con = dbConnection();
    $sql = "UPDATE user SET name='{$user['name']}', email='{$user['email']}',  gender='{$user['gender']}' WHERE username='{$user['username']}'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function getpaymentid()
{
    $con = dbConnection();
    $query = "SELECT MAX(payment_id) AS last_payment_id FROM Payment";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $last_payment_id = $row['last_payment_id'];
        return $last_payment_id;
    } else {
        return 99919;
    }
}
/*function login($email, $password)
{
    session_start();
    $role = "user";
    $con = dbConnection();
    $sql = "select * from user where email='{$email}' and password='{$password}' and position='{$role}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $sql9 = "select username from user where email='{$email}' and password='{$password}' and position='{$role}'";
    $result9 = mysqli_query($con, $sql9);
    $row = mysqli_fetch_assoc($result9);
    if (isset($row['username'])) {
        $_SESSION['username'] = $row['username'];
    }

    if ($count == 1) {
        return 1;
    }

    $role = "admin";
    $sql1 = "select * from user where email='{$email}' and password='{$password}' and position='{$role}'";
    $result1 = mysqli_query($con, $sql1);
    $count1 = mysqli_num_rows($result1);
    $sql = "select username from user where email='{$email}' and password='{$password}' and position='{$role}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if (isset($row['username'])) {
        $_SESSION['username'] = $row['username'];
    }

    if ($count1 == 1) {
        return 1;
    }
    $role = "host";
    $sql1 = "select * from user where email='{$email}' and password='{$password}' and position='{$role}'";
    $result1 = mysqli_query($con, $sql1);
    $count1 = mysqli_num_rows($result1);
    $sql = "select username from user where email='{$email}' and password='{$password}' and position='{$role}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if (isset($row['username'])) {
        $_SESSION['username'] = $row['username'];
    }

    if ($count1 == 1) {
        return 1;
    } else {
        return 0;
    }
}*/
function getPosition($username)
{
    $con = dbConnection();
    $sql = "select position from user where username='{$username}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if (isset($row['position'])) {
        return $row['position'];
    }
}
/*function createUser($username, $password, $email)
{
    $role = "user";
    $con = dbConnection();
    $sql = "insert into user values('{$username}', '{$password}', '{$email}', '{$role}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
*/

function alterUser($password, $email)
{
    $con = dbConnection();
    $sql = "update user set password='{$password}' where email='{$email}'";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function email($email)
{
    $con = dbConnection();
    $sql = "select * from user where email='{$email}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return true;
    } else {
        return false;
    }
}

function getAllUser()
{
    $con = dbConnection();
    $sql = "select username,email,position from user where position!='admin'";
    $result = mysqli_query($con, $sql);
    $users = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($users, $row);
    }

    return $users;
}


/*
function deleteUser($name)
{
    $con = dbConnection();
    $sql = "DELETE FROM user WHERE username='{$name}'";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}*/

function addUser($name, $role, $email)
{
    $con = dbConnection();
    $sql = "insert into user values('{$name}', '12345678', '{$email}', '{$role}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
