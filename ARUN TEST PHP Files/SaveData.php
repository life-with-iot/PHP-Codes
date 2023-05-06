<?php
$servername = "localhost";   //servername
$username = "root";			 //username
$password = "Arun@172000";   //Password for Database
$dbname = "report";			 //Database name

// Create connection
$tem=$hum="";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$ran=$_POST["ran"];
$sql = "INSERT INTO rand(ran) VALUES('".$ran."')";      //Main Command to Insert Data into Database

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";				//After Inertation
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
