<?php
$host = "localhost";
$user = "root"; // default in XAMPP
$pass = "";     // default is empty
$db   = "user_auth";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
?>