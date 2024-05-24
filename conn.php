<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = "dio";

$mysqli = new mysqli('localhost', $username, $password, $db_name);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>