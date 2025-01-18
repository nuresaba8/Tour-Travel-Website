<?php
require_once('../model/db.php');
require_once('../model/usermodel.php');
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$con = dbConnection();
$sql = "select * from Login where username='{$username}' and password='{$password}' ";
$result = mysqli_query($con, $sql);
$count = login($username, $password);
$time = 1;
if (isset($_REQUEST['rememberme'])) {
    $time = 1000;
}
if ($count == 1) {
    setcookie('flag', 'true', time() + 3000 + $time, '/');
    setcookie('username', $username, time() + 3000 + $time, '/');
    session_start();
    echo "home";
} else if ($count == 2) {
    setcookie('flag', 'true', time() + 3000 + $time, '/');
    setcookie('username', $username, time() + 3000 + $time, '/');
    echo "admin";
} else if ($count == 3) {
    setcookie('flag', 'true', time() + 3000 + $time, '/');
    setcookie('username', $username, time() + 3000 + $time, '/');
    echo "host";
} else {
    echo "invalid User!";
}
?>