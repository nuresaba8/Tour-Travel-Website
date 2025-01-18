<?php

$name = $_REQUEST['name'];
$age = $_REQUEST['age'];
$contact_number = $_REQUEST['contact_number'];
$email = $_REQUEST['email'];
$check_in_date = $_REQUEST['check_in_date'];
$hotel_name = $_REQUEST['hotel_name'];
$room_type = $_REQUEST['room_type'];
$number_of_people = $_REQUEST['number_of_people'];

if (isset($_POST['cancel'])) {
    setcookie('flag', 'true', time()+3000, '/');
    header('location: home.php');
}

if(isset($_FILES['myfile'])) {
    $src = $_FILES['myfile']['tmp_name'];
    $des = "E:/xampp/htdocs/Project/upload/".$_FILES['myfile']['name'];
    if(!move_uploaded_file($src, $des)){
        echo "upload error";
    } 
}

if (isset($_POST['submit'])) {
    if (empty($name) || empty($age) || empty($contact_number) || empty($email) || empty($check_in_date) || empty($hotel_name) || empty($room_type) || empty($number_of_people)) {
        echo "Please fill-up all fields!";
    } elseif (!preg_match("/^[A-Z ]*$/i", $name)) {
        echo "Only letters and white space allowed in name";
    } elseif (!is_numeric($age) || $age < 18 || $age > 90 || !ctype_digit($age)) {
        echo "Age must be a valid number between 18 and 90.";
    } elseif (!preg_match("/^\d{11}$/", $contact_number)) {
        echo "Contact number must be in XXXXXXXXXXX format";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
    } elseif (strtotime($check_in_date) === false) {
        echo "Invalid check-in date format";
    } elseif (!is_numeric($number_of_people) || $number_of_people < 1 || $number_of_people > 50 || !ctype_digit($number_of_people)) {
        echo "Number of people must be a valid number between 1 and 50";
    } else {
            setcookie('reservation_message', "Thank you for your reservation! Your booking has been successfully submitted.", time()+300, '/');
            header('Location: ../view/notification.php');
    }
    
}

?>