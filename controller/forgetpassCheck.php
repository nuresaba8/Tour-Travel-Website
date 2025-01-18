<?php
session_start();
require_once('../model/userModel.php');
$email = $_REQUEST['email'];

$otp = rand(100000, 999999);
$subject = "OTP Verification from SAN TOUR";
$emailMessage = "Your OTP for verification is: " . $otp; 
$headers = "From: nurealamnadim8@gmail.com";

$_SESSION['email'] = $email;
$_SESSION['otp'] = $otp;

$message = "";
$status = getByEmail($email);
if (isset($_POST['submit'])) {
    if ($email=="") {
        $message = "Please provide email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address";
    } elseif ($status != 1) {
        $message = "Email has no account";
    }
}

if ($message) {
    echo "<script>alert('$message');</script>";
} elseif (mail($email, $subject, $emailMessage, $headers)) { 
    header("Location: ../view/otpVerification.php");
} else {
    echo "Failed to send OTP. Please try again later.";
}
?>