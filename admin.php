<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<h><center><b>admin login</b></center></h>
	</head>
	<body>
		<form method = "POST" action = "admindisplay.php" >
		<b>username :</b><input type = "text" name = "username" required><br><br>
		<b>password :</b><input type = "password" name = "pssword" required><br><br>
		<button type="Submit">Submit</button>
		<button type="Reset" value = "Reset">Reset</button>
		</form><br><br>
		To register click <a href = "RegstrationForm.php"> registration form </a>  here <br><br>
	</body>
</html>
