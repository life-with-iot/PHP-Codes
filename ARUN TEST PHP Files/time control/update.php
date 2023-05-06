<html>
<head>
</head>
<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "time_control";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
for($i=2;$i<=2;$i++){
$sql1= mysqli_query($conn,"SELECT * FROM control WHERE sno='".$i."';" );
$row = mysqli_fetch_assoc($sql1);
$t1=$row["time1"] ;
$t2=$row["time2"] ;
$ct=date("H:i");
if(($ct>=$t1)&&($ct<=$t2)){
	$sql2= "UPDATE control SET state='OFF' WHERE sno='".$i."';";
	if (mysqli_query($conn, $sql2)) {
    			//After Inertation
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
}
else{
	$sql3= "UPDATE control SET state='ON' WHERE sno='".$i."';";

	if (mysqli_query($conn, $sql3)) {
    			//After Inertation
} else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}
}}
mysqli_close($conn);
?>

</html>