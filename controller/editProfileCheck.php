<?php
session_start();
require_once('../model/userModel.php');
require_once('validations.php');

$username = $_COOKIE['username'];
$email = $_REQUEST['email'];
$name = $_REQUEST['name'];

if (isset($_REQUEST["gender"])) {
    $gender = $_POST["gender"];
}
$message = "";




if (isset($_POST['submit'])) {
    if ($name == "" || $email == "" || $gender == "" ) {
        echo "Please fill-up all fields!";
    }  elseif (str_word_count($name) < 2) {
        echo "Name must contains at least two words";
    } elseif (hasDigit($name)) {
        echo "Name can only contain letter";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
    }  else {
        $user = ['username' => $username, 'name' => $name, 'email' => $email, 'gender' => $gender];
        $status = updateUser($user);
        if ($status) {
            header('location: ../view/viewprofile.php');
        } else {
            echo "DB error! Please try again";
        }
    }
}
