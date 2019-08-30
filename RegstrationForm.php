<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dabase = "registrationform";
	$conn = new mysqli($servername ,$username,$password,$dabase);
	$query = "select * from department_table";
	$res = mysqli_query($conn,$query);
	$options = "";
	while($row = $res->fetch_array())
		{
			$department = $row['departmentname'];
			$idno = $row['idno'];
			$options=$options.'<option value="'.$idno.'">'.$department.'</option>';
		}
?>
<!DOCTYPE html>
<html>
	<head>
	<h><center><b>Student regstration form</b></center></h>
	</head>
	<body>
		<form method = "POST" onsubmit="return validate();" action = "Reg.php" enctype="multipart/form-data">
		<script src="Validations.js"></script>
			<b>firstname:</b><input id = "firstname" name = "first_name" placeholder = "firstname" type = "text" required><br><br>
			<b>lastname:</b><input id = "lastname" name = "last_name" placeholder = "lastname" type = "text" ><br><br>
			<b>email id:</b><input id = "emailid" name = "email_id" placeholder = "email id" type = "text" required><br><br>
			<b>phone number:</b><input id = "phonenumber" name = "Phone_number" placeholder = "phone number" type = "text" required><br><br>
			<b>Department:</b>
			<select name = "departments">
			<?php
				echo $options;
			?>
			</select><br><br>
			<b>age :</b><input name = "age" placeholder = "age" type = "number" min = "20" max = "45"required><br><br>
			<b>date of joining :</b><input id = "dateofjoining" name = "date_joining" placeholder="YYYY-DD-MM" required><br><br>
			<b>photo:<input type = "file" name = "image"></b><br><br>
			<button type="Submit">Submit</button>
			<button type="Reset" value = "Reset">Reset</button>
		</form>
	</body>
</html>