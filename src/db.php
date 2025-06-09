<?php
$servername = "localhost";
$username = "eva";
$password = "eva12345";
$dbname = "evangelion_sqli";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>