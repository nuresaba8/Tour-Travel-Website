
<?php
     $name = $_POST['fname'];
     $email = $_POST['email'];
     $start = $_POST['sname'];
     $num = $_POST['pnumber'];

     if (isset($_POST['submit'])) {
        if (empty($name) || empty($email) || empty($start) || empty($num)) {
            $message = "Please fill-up all fields!";
        } elseif (!preg_match("/^[A-Z ]*$/i", $name)) {
            $message = "Only letters and white space allowed in name";
        } elseif ($num < 0) {
            $message = "Number of People Must be positive";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "Invalid email address";
        } elseif (!preg_match("/^[A-Za-z]+\s[A-Za-z]+$/", $name)) {
            $message = "Name must consist of two words";
        }
    }
    
    if ($message) {
        echo "<script>alert('$message');</script>";
    } else {
        header('Location: ../view/login.php');
    }
    
?>