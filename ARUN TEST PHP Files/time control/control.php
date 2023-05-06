<?php
session_start();
if(!isset($_SESSION["succ"])){
	header('Location:./');
	echo "Fail";
}
else
{
	echo "<script> alert('Login Successful') </script>";
	
}
?>
<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "time_control";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["submit"])){
$ti1=
$sql = "UPDATE control SET time1='".$_POST["time1"]."',time2='".$_POST["time2"]."' WHERE sno='".$_POST["i"]."'";
if ($conn->query($sql) === TRUE) {header("Location:control.php");exit;}
else {echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";}
}

if(isset($_POST["reset"])){
$sql2 = "UPDATE control SET time1='',time2='' WHERE sno='".$_POST["i"]."'";
if ($conn->query($sql2) === TRUE) {
header("Location:control.php");
exit;
}
 else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql2 . "<br>" . $conn->error."');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Timer Switch</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>
body{
	color:white;
	font-family:verdana;
	background-image:url('img2.png');
	heigit: 100%;
	background-repeat:no-repeat;
	background-size:cover;
	background-attachment: fixed;
	background-position:center;
}

.submit {
  background-color:green;
  border: none;
  color:white;
  border-radius:5px;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  position: relative;
  font-size: 16px;
  margin: 7px 6px;
  cursor: pointer;
}
.reset {
  background-color:#e60000;
  border: none;
  color:white;
  border-radius:5px;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  position: relative;
  font-size: 16px;
  margin: 7px 6px;
  cursor: pointer;
}
.lgout{
  position:absolute;
  float:right;
  left:1200px;
  width: 90px;
  background-color: #cc0000;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  font-size:12px;
  border: none;
  top:5px;
  border-radius: 5px;
  cursor: pointer;
}

input[type=time] {
  width: 120px;
  padding: 5px 8px;
  margin: 2px 0;
  box-sizing: border-box;
  border: 2px solid #996600;
  border-radius: 4px;
}

.button {
  background-color:grey;
  border: none;
  color:white;00
  border-radius:5px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  position: relative;
  font-size: 16px;
  margin: 13px 12px;
  cursor: pointer;
}
.butn{
  color:#ff3300;
  border-color:#00cccc;
  border-style: solid;
  border-width: medium;
  width:200px;
  float:left;
  font-family:verdana;
  height:80px;
}

@media only screen and (max-width: 361px) {
  .butn{
  
  color:#cc7a00;
  border-color:#00cccc;
  border-style: solid;
  border-width: medium;
  width:220px;
  float:none;
  margin-top:10px;
  font-family:verdana;
  padding-left:10px;
  margin-left:15px;
  height:80px;
  }
  .lgout{
	  left:200px;
  }
}
@media (max-width:400px) and (min-width:300px) {
  .lgout{
	  left:280px;
  }
}

@media (max-width:550px) and (min-width:401px) {
  .lgout{
	  left:320px;
  }
}

@media (max-width:800px) and (min-width:551px) {
  .lgout{
	  left:500px;
  }
}

@media (max-width:1000px) and (min-width:801px) {
  .lgout{
	  left:700px;
  }
}

@media (max-width:1200px) and (min-width:1001px) {
  .lgout{
	  left:900px;
  }
}

</style>
</head>
<body>
<h1>Timer ON/OFF Switch</h1>
<br>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
	<input type="hidden" name="logout">
	<input type="submit" class="lgout"  value="LOGOUT">
</form>
<?php
if(isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header('location:./');
}

?>
<h3 id="result"></h3>
	<center>
	<div id="new" style="margin-bottom:20px;">
	<?php
	$res= mysqli_query($conn,'SELECT state FROM control where sno=1 ' );
	$row = mysqli_fetch_assoc($res);
	$st1=$row['state'];
	$st2="ON";
	if(strcmp($st1,$st2)==0){
		echo "<div class='butn'>";
		echo "MAIN";
		echo "<input type='button' id=1 class=button value='ON' style='background-color:green'></div>";
		
	
	}
	else{
		echo "<div class='butn'>";
		echo "MAIN";
		echo "<input type='button' id=1 class=button value='OFF' style='background-color:#a3a375'></div>";
		
	}
	
?>
</div>
</center>
<script type="text/javascript">
$(document).ready(function() {
	for(i=1;i<=1;i++){
	
		$("#1").on('click', function () {
		var click = $(this).val();
		//alert(click);
   		if(click=="OFF"){
                $(this).css('background-color', 'green');
				$(this).attr('value', 'ON');
                //click  = false;
				
            } else {
                $(this).css('background-color', '#a3a375');
				$(this).attr('value', 'OFF');
                //click  = true;
            }   
			 var ans = $(this).val();
			var ds=this.id;
                $.ajax({
                    url: "changestate.php",
                    method: "POST",
                    data: {
                        val: ans,
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
	 });
}
});
</script>

<?php
for($i=2;$i<=2;$i++){
$sql1= mysqli_query($conn,"SELECT * FROM control WHERE sno='".$i."';" );
$row = mysqli_fetch_assoc($sql1);
$t1=$row["time1"] ;
$t2=$row["time2"] ;
?>

<form action="" method="post" name="f1">
<br>
<br>
<br>
<br>
<br>
<br>
 <input type="time" name="time1" value="<?php echo $t1; ?>">
 <input type="time" name="time2" value="<?php echo $t2; ?>">
 <input type="hidden" name="i" value="<?php echo $i; ?>">
 <input type="submit" class="submit" value="Submit" name="submit" onclick="return msg()" />
 <input type="submit" class="reset" value="Reset" name="reset" onclick="return res()" />
</form>
<br>
<?php
}
?>
<script type="text/javascript">
function msg()
{
	alert("Record Saved");
	return true;
}
function res()
{
	alert("Reset Successful");
	return true;
}
</script>
<h2 style="color: #e64d00; position: absolute; bottom: 3px; font-size: 18px; left:45%"> &#169; IoT Cell-BIT<h2> 
</body>
</html>
<?php

$conn->close();
?>
