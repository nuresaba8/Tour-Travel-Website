<?php
require_once('../model/userModel.php');
require_once('validations.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_REQUEST['user'];

    if (!empty($user)) {
        $data = json_decode($user);


        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON error: " . json_last_error_msg();
        } else {
            $username = $data->username;
            $name = $data->name;
            $email = $data->email;
            $password = "Demo@123";
            $dob = "01-01-2000";
            $gender = "Male";
            $message = "";
        }
    } else {
        echo "No JSON data received";
    }





    if ($name == "" || $email == "" || $username == "") {
        echo "Please fill-up all fields!";
    } elseif (!ctype_alpha(substr($username, 0, 1))) {
        echo "First character must be a letter";
    } elseif (str_word_count($name) < 2) {
        echo "Name must contains at least two words";
    } elseif (hasDigit($name)) {
        echo "Name can only contain letter";
    } elseif (!containsAt($email)) {
        echo "Invalid email address";
    } elseif (checkEmail($email)) {
        echo "Email is already registerd";
    } elseif (checkUsername($username)) {
        echo "Username is not available";
    } else {

        $user = ['username' => $username, 'name' => $name, 'email' => $email, 'gender' => $gender, 'dob' => $dob, 'password' => $password, 'role' => 'host'];
        $status = createUser($user);
        if ($status) {
            echo "Success";
        } else {
            echo "DB error! Please try again";
        }
    }
}
