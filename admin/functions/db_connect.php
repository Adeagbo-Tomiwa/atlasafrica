<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'atlas_africa';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
?>
