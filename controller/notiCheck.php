<?php



if (isset($_POST['submit'])) {
    setcookie('reservation_message', '', time()-3600, '/');
    header('location: ../view/home1.php');
}


?>