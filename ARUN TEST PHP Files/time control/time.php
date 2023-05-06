<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "time_control";	
$i=$_GET["i"];		 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$res= mysqli_query($conn,"SELECT state FROM control where sno='".$i."'" );
$row = mysqli_fetch_assoc($res);
$st1=$row['state'];
echo $st1;
mysqli_close($conn);
?>
