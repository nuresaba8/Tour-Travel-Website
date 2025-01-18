<?php
require_once('../model/userModel.php');
require_once('validations.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //print_r($_REQUEST);
    $payment = $_REQUEST['payment'];

    if (!empty($payment)) {
        $data = json_decode($payment);
        //print_r($data);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON error: " . json_last_error_msg();
        } else {
            $cvvnumber = $data->CVV_number;
            $month = $data->month;
            $username = $data->username;
            $payment = $data->paymentid;
            $cnumber = $data->cardNumber;
            $year = $data->year;
            $date = $data->date;
            $amount = $data->amount;

            //print_r($data);
        }
    } else {
        echo "No JSON data received";
    }
    $message = "";

    if ($payment == "" || $cnumber == "" || $cvvnumber == "" || $amount == "" || $year == "" || $month == "") {
        $message = "Please fill-up all fields!";
    } elseif (!isset($_POST['payment'])) {
        $message = "Please select a payment option!";
    } elseif (strlen($cnumber) != 16) {
        $message = "Card number must be exactly 16 digits long";
    } elseif ($cnumber < 0) {
        $message = "Card number must be a positive number";
    } elseif (strlen($cvvnumber) != 3) {
        $message = "CVV number must be exactly 3 digits long";
    } elseif ($cvvnumber < 0) {
        $message = "CVV number must be a positive number";
    } elseif ($year < 0) {
        $message = "Year cannot be negative";
    } elseif ($month < 1 || $month > 12) {
        $message = "Month must be between 1 and 12";
    }

    if ($message) {
        echo $message;
    } else {
        /*$payment = ['username' => $username, 'name' => $name, 'email' => $email, 'gender' => $gender, 'dob' => $dob, 'password' => $password, 'role' => 'user'];
        $status = createUser($payment);
        if ($status) {
            echo "Success";
        } else {
            echo "DB error! Please try again";
        }*/
        echo 'success';
    }
}
