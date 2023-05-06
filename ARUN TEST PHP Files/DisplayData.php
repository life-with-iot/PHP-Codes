<!DOCTYPE html>
<html>
<body>
<head>
<style>
table {
  font-family: arial, sans-serif;		
  border-collapse: collapse;
  text-align:center;
  width: 50%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>  
</head>
<table align="center" style="margin-top: 50px">
<tr>
	<th>ID</th>
	<th>Randome</th>
	<th>TimeStamp</th>
</tr>
	
<?php
$servername = "localhost";
$username = "root";
$password = "Arun@172000";
$dbname = "report";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, ran, curtime FROM rand";			//Select ID,RandomNumber and Time from Table
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row["id"]. "</td><td>" . $row["ran"] . "</td><td>" . $row["curtime"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 
</table>
</body>
</html>