<?php
$host = 'localhost';
$db   = 'electrotrack';
$user = 'root';
$pass = 'CP476';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 