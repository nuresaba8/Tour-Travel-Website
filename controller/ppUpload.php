<?php
$src = $_FILES['myfile']['tmp_name'];
$des = "C:/xampp/htdocs/Project/upload/" . $_FILES['myfile']['name'];

if (move_uploaded_file($src, $des)) {
    header('location: ../view/profilepicture.php');
} else {
    echo "Error";
}
?>