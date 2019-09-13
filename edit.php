<?php
	session_start();
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
	$query = "select * from country";
	$res = mysqli_query($conn,$query);
	$options1 = "";
	while($row = $res->fetch_array())
		{
			$countryname = $row['country_name'];
			$cid = $row['cid'];
			$options1=$options1.'<option value="'.$cid.'">'.$countryname.'</option>';
		}		
?>
<!DOCTYPE html>
<html>
	<head>
	<h><center><b>update your details</b></center></h>
	</head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="ValidationsjQ.js"></script>
	<body>
		<form id = "form" method = "POST" onsubmit="return validate();" action = "update.php" enctype="multipart/form-data">
		<?php
			$row_no=$_POST['row_id'];
			$_SESSION['id']=$row_no;
			$sql = "select * from studentsinfo where id = '".$row_no."'";
			if($res=mysqli_query($conn, $sql))  {
			if($res->num_rows > 0) {
				while($row = $res->fetch_array()) {
		?>
			<b>firstname:</b><input id = "firstname" name = "first_name" placeholder = "firstname" type = "text" required value ="<?php echo $row['firstname'];?>"><br><br>
			<b>lastname:</b><input id = "lastname" name = "last_name" placeholder = "lastname" type = "text" value ="<?php echo $row['lastname'];?>"><br><br>
			<b>email id:</b><input id = "emailid" name = "email_id" placeholder = "email id" type = "text" required value ="<?php echo $row['email'];?>"><br><br>
			<b>phone number:</b><input id = "phonenumber" name = "Phone_number" placeholder = "phone number" type = "text" required value ="<?php echo $row['phonenumber'];?>"><br><br>
			<b>country:</b>
			<select name = "country" onchange = "myfun(this.value)" value ="<?php echo $row['country'];?>" required>
							<option>select any one</option>
			<?php
				echo $options1;
			?>
			</select><br><br>
			<b>state:</b><select id = "dataget" name = "state" onchange = "myfunc(this.value)" required>
				<option>choose any one</option>
			 </select><br><br>
			<b>city:</b><select name = "city" id = "dataget1" required>
				<option>choose any one</option>
			 </select><br><br>
			<b>Department:</b>
			<select name = "departments" required>
			<option>select any one</option>
			<?php
				echo $options;
			?>
			</select><br><br>
			<b>age :</b><input name = "age" placeholder = "age" type = "number" min = "20" max = "45"required value ="<?php echo $row['age'];?>"><br><br>
			<b>date of joining :</b><input id = "dateofjoining" name = "date_joining" placeholder="YYYY-DD-MM" required value ="<?php echo $row['dateofjoining'];?>"><br><br>
			<button type="Submit" id = "btn">Submit</button> <?php 
				}
			}
		}
			?>
			<script>
	function myfun(datavalue) {
	$.ajax({
		url : 'state.php',
		type : 'POST',
		data:{datapost : datavalue},
		success : function(result){
			$('#dataget').html(result);
		}
	});
	}
	</script>
	<script>
	function myfunc(datavalue) {
	$.ajax({
		url : 'city.php',
		type : 'POST',
		data:{datapost : datavalue},
		success : function(result){
			$('#dataget1').html(result);
		}
	});
	}
	</script>
		</form><br><br>
	</body>
</html>