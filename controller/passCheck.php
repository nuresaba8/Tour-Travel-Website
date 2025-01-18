<?php
session_start();
require_once('../model/userModel.php');
require_once('validations.php');
$email = $_SESSION['email'];
$password = $_REQUEST['newpassword'];

$message = "";
$status = updateUserPass($password, $email);
if (isset($_POST['Submit'])) {
    if ($password=="") {
        $message = "Please provide password";
    } elseif (strlen($password) < 8) {
        $message = "Password must be at least 8 characters long";
    } elseif (!hasDigit($password)) {
        echo "Password must contains at least one digit";
    } elseif (!hasSpecialChar($password)) {
        echo "Password must contains at least one special character";
    } elseif ($status==1) {
        header("location: ../view/login.php");    
    }
}

if ($message) {
    echo "<script>alert('$message');</script>";
} else {
    
}
?>