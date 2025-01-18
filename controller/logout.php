<?php
require '../model/config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../view/login.php");



?>