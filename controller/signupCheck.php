<?php
require_once('../model/userModel.php');
require_once('validations.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r($_REQUEST);
    $user = $_REQUEST['user'];

    if (!empty($user)) {
        $data = json_decode($user);
        //print_r($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON error: " . json_last_error_msg();
        } else {
            $username = $data->username;
            $name = $data->name;
            $password = $data->password;
            $cpassword = $data->cpassword;
            $dob_day = $data->dob_day;
            $dob_month = $data->dob_month;
            $dob_year = $data->dob_year;
            $gender = $data->gender;
            $email = $data->email;

            //print_r($data);
        }
    } else {
        echo "No JSON data received";
    }


    /*$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$name = $_REQUEST['name'];
$password = $_REQUEST['password'];
$dob = $_REQUEST['dob'];
$cpassword= $_REQUEST['cpassword'];
if (isset($_REQUEST["gender"])) {
    $gender = $_POST["gender"];
}
*/
    $message = "";




    //if (isset($_POST['submit'])) {
    if ($name == "" || $email == "" || $username == "" || $gender == "" || $password == "" || $dob_year == "" || $dob_month == "" || $dob_day == "") {
        echo "Please fill-up all fields!";
    } elseif (!ctype_alpha(substr($username, 0, 1))) {
        echo "First character must be a letter";
    } elseif (str_word_count($name) < 2) {
        echo "Name must contains at least two words";
    } elseif (strlen($password) < 8) {
        echo "Password must contains at least 8 characters";
    } elseif (!hasDigit($password)) {
        echo "Password must contains at least one digit";
    } elseif (!hasSpecialChar($password)) {
        echo "Password must contains at least one special character";
    } elseif (hasDigit($name)) {
        echo "Name can only contain letter";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
    } elseif (checkEmail($email)) {
        echo "Email is already registerd";
    } elseif (checkUsername($username)) {
        echo "Username is not available";
    } elseif ($password != $cpassword) {
        echo "Confirm password doesn't match";
    } else {
        $dob = $dob_year . '-' . $dob_month . '-' . $dob_day;
        $user = ['username' => $username, 'name' => $name, 'email' => $email, 'gender' => $gender, 'dob' => $dob, 'password' => $password, 'role' => 'user'];
        $status = createUser($user);
        if ($status) {
            echo "Success";
        } else {
            echo "DB error! Please try again";
        }
    }
}

?>




