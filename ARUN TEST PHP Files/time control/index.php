<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Login</title>
<style>
html {
    height: 100vh; 
    min-height: 100%; 
}
body{
background-image:url('img1.png');
heigit: 100%;
background-repeat:no-repeat;
background-size:cover;
background-attachment: fixed;
background-position:center;
font-family:verdana;
}

input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #cc3300;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  top:0;
  border-radius: 5px;
  cursor: pointer;
}
#b1{
	
  background-color: #80aaff;
  border-radius:5px;
  color: white;
  border:none;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  margin-top:20px;
  cursor: pointer;
	}

input[type=submit]:hover {
  background-color: #ff944d;
}
#log {
  width: 50%;
  border-radius: 10px;
  padding: 50px 0;
  text-align: center;
  margin-left: 50px;
  padding-top: 5px;
  background-color: rgba(255, 255, 255, 0.4);
  margin-top: 20px;
}
@media only screen and (max-width: 400px) {
  #log{
	  width:100%;
  }
}
</style>
</head>
<body>
<div class="bg"></div>
<center>
<div id="log">
  <button onclick="myFunction()"id="b1" style="margin-right:30px;margin-bottom:10px;" >Login</button>
  <button onclick="myFunction()"id="b1" >Signup</button>
<div id="logn">
 <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
	<input type="text" name="uname" placeholder="Username" required autofocus>
	<input type="password" name="pwd" placeholder="Password" required>
	<br>
	<input type="submit" value="LOGIN">
</form>
</div>
<div id="sign" style="display:none;">
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
	<input type="text" name="name" placeholder="Name" required autofocus>
	<input type="text" name="usrame" placeholder="User name" required autofocus>
	<input type="password" name="pwwd" placeholder="Password" required>
	<br>
	<input type="submit" value="SIGNUP">
	</form>
</div>

</div>


<script>
function myFunction() {
  var x = document.getElementById("logn");
  var y = document.getElementById("sign");
  if (x.style.display === "block") {
	x.style.display = "none";
    y.style.display = "block";
  } else {
    x.style.display = "block";
	y.style.display = "none";
  }
}
</script>


</center>
<h2 style="color: #e64d00; position: absolute; bottom: 3px; font-size: 18px; left:45%"> &#169; IoT Cell-BIT<h2> 
</body>
</html>
<?php
//if((isset($_POST['usrame']) and isset($_POST['pwwd']))){
//	include('connect.php');
//	$nammee=$_POST['usrame'];
//	$passs=$_POST['pwwd'];
//mysqli_query($conn,"INSERT INTO login(user,pass) VALUES('".$nammee."','".$passs."')");
//}
?>
<?php
if((isset($_POST['uname']) and isset($_POST['pwd']))){
	include('connect.php');
	$user=$_POST['uname'];
	$pass=$_POST['pwd'];
	
$ret = mysqli_query($conn,"SELECT * FROM login WHERE user ='$user' AND pass='$pass'");
$row = mysqli_fetch_assoc($ret);

	if(($row['user']==$user)||($row['user']==$pass)){
		$_SESSION['user']=$user;
		$_SESSION['succ'] = '1';
		echo "Accepted";
		header('Location:control.php');
		
	}
	else{
		echo "<script> alert('Wrong Username/Password Try Again !!!')</script>";
		//header("location:index.php");
			
	}
}
?>