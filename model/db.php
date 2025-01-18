<?php

$host = "localhost";
$dbname = "web_tech";
$dbuser = "root";
$dbpass = "";

function dbConnection()
{
    global $host;
    global $dbuser;

    $con = mysqli_connect($host, $dbuser, $GLOBALS['dbpass'], $GLOBALS['dbname']);
    return $con;
}
?>