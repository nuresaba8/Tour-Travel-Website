<?php
require_once('validations.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $rtrn = $_REQUEST['rtrn'];

    if (!empty($user)) {
        $data = json_decode($rtrn);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON error: " . json_last_error_msg();
        } else {
            $username = $data->username;
            $name = $data->name;
            $refund = $data->refund;
            $cnumber = $data->cnumber;
            $rdetails = $data->rdetails;
            $rCancellation = $data->rCancellation;
            $email = $data->email;

            
        }
    } else {
        echo "No JSON data received";
    }

    $message = "";
    if ($name == "" || $email == "" || $cnumber == "" || $rdetails == "" || $rCancellation == "" || $refund == "") {
        $message = "Please fill-up all fields!";
    } elseif (hasDigit($name)) {
        $message = "Only letters and white space allowed in name";
    } elseif (strlen($cnumber) != 11 || $cnumber < 0) {
        $message = "Contact number must be exactly 11 digits and positive";
    } elseif (!containsAt($email)) {
        $message = "Invalid email address";
    } elseif (str_word_count($name) < 2) {
        $message = "Name must consist of two words";
    } elseif ($message) {
        echo "<script>alert('$message');</script>";
    } else {
        echo "Success";
    }
}
