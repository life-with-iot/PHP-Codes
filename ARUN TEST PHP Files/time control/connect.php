<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname="time_control";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
