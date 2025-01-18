<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = $_REQUEST['feedback'];

    if (!empty($feedback)) {
        $data = json_decode($feedback);


        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "JSON error: " . json_last_error_msg();
        } else {
            $username = $data->username;
            $name = $data->sname;
            $review = $data->review;
            $type = $data->type;
        }
    } else {
        echo "No JSON data received";
    }

    $message = "";
    if ($name == "" || $review == "" || $type == "") {
        $message = "Please provide all the information!";
    } elseif ($message) {
        echo "<script>alert('$message');</script>";
    } else {
        echo "Success";
    }
}
