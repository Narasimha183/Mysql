<!DOCTYPE html>
<html>
	<head>
	<h><center><b>RESET PASSWORD</b></center></h>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="ValidationsjQ1.js"></script>
	<form method = "POST" action = "resetpassword.php" >
		<b>new password :</b><input id = "newpassword" type = "password" name = "newpassword" required><br><br>
		<b>retype new password :</b><input id = "renewpassword" type = "password" name = "renewpassword" required><br><br>
		<button type="Submit">Submit</button>
		<button type="Reset" value = "Reset">Reset</button>
	<form>
</html>