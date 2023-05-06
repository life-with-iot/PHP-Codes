<?php
$servername = "localhost";
$username = "test";
$password = "1234";
$dbname = "time_control";			 

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!doctype html>
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
	font-family:verdana;
}
.button {
  background-color:grey;
  border: none;
  color:white;
  
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
  color:#cc7a00;
  border-color:#660033;
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
  border-color:#660033;
  border-style: solid;
  border-width: medium;
  width:220px;
  float:none;
  margin-top:25px;
  font-family:verdana;
  padding-left:10px;
  margin-left:80px;
  height:80px;
  }
}

</style>


</head>
 <body>
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
</body>
 <?php
mysqli_close($conn);
?>
</html>