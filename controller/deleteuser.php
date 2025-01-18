<?php
echo "delete page";
require('../model/userModel.php');
if (isset($_GET['deleteusername'])) {
    $username = $_GET['deleteusername'];
    $status = deleteUser($username);
    if ($status) {
        header('location: ../view/usermanagement.php');
    } else {
        echo "error in delete option";
    }
}
