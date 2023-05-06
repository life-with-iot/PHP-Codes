<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "time_control";			  
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
switch($_GET["i"]){
	case 1:
		$res= mysqli_query($conn,"SELECT time1 FROM control ORDER BY sno DESC LIMIT 0,1" );
		$row = mysqli_fetch_assoc($res);
		$st=$row['time1'];
		$find = ":";
		$replace = "";
		$arr = $st;
		echo (str_replace($find,$replace,$arr));
	break;
	case 2:
		$res= mysqli_query($conn,"SELECT time2 FROM control ORDER BY sno DESC LIMIT 0,1" );
		$row = mysqli_fetch_assoc($res);
		$st=$row['time2'];
		$find = ":";
		$replace = "";
		$arr = $st;
		echo (str_replace($find,$replace,$arr));
	break;		
}
mysqli_close($conn);
?>