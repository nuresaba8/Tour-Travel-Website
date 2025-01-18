<?php
session_start();
require_once('../model/userModel.php');
$rOtp = $_REQUEST['otp'];
$email=$_SESSION['email'] ;
$otp =123; //$_SESSION['otp'];

//echo "<script>alert('$rOtp');</script>";
$message = ""; 

if (isset($_POST['submit'])) {
    if ($rOtp=='') {
        $message = "Please provide otp";
    } elseif ($otp==$rOtp) {
        $message = "Didn't match";
    }
}

if ($message) {
    echo "<script>alert('$message');</script>";
} else {
    header("location: ../view/passChange.php");
}
?>
