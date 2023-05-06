<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "time_control";			 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$val=$_POST["val"];
 $sql = "UPDATE control SET state='".$val."' WHERE sno=1";
if (mysqli_query($conn, $sql)) {   			
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
