<?php
session_start();
if(!isset($_SESSION['uname']))
{
	header('location:login.php');
}
class queries{
	public $conn;
	public function dabase()
	{
		$conn = new mysqli("localhost","root","","registrationform");
		if ($conn->connect_error) {
		die ("Connection failed" .$conn->connect_error);
		} else {
		//echo "connection done successfully";
		}
		return $conn; 
	}
	function login($conn) {
		if(isset($_POST['username'])){
		$username = $_POST['username'];
		}
		if(isset($_POST['pssword'])){
		$pssword = $_POST['pssword'];
		}
		$_SESSION["uname"] = $username;
		$sql = 'select firstname,lastname,email,phonenumber,age,dateofjoining,departmentname,image from studentsinfo join department_table on studentsinfo.department = department_table.idno where email ="'.$username.'" && password = "'.$pssword.'"';
		if($res=mysqli_query($conn, $sql))  {
			if($res->num_rows > 0)
			{
				echo "login successfully done and your details are <br><br><br>".$_SESSION["uname"]."<br><br>";
				echo "<table style=width:100%>";
				echo "<tr>";
				echo "<th>firstname</th>";
				echo "<th>lastname</th>";
				echo "<th>email</th>";
				echo "<th>phonenumber</th>";
				echo "<th>age</th>";
				echo "<th>dateofjoining</th>";
				echo "<th>departmentname</th>";
				echo "<th>image</th>";
				echo "</tr>";
				while($row = $res->fetch_array())
				{
					echo "<tr>";
					echo "<td>".$row['firstname']."</td>";
					echo "<td>".$row['lastname']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['phonenumber']."</td>";
					echo "<td>".$row['age']."</td>";
					echo "<td>".$row['dateofjoining']."</td>";
					echo "<td>".$row['departmentname']."</td>";
					echo "<td>";?><img src = "Uploads\<?php echo $row['image'];?>" height = "100" width = "100"><?php echo"</td>";
				}
				echo "</table>";
				$res->free();?>
				To reset password <a href = "resetpword.php"> resetpassword </a>  here
				<a href = "logout.php">logout</a><?php echo "";
			}
			else {
				echo "give correct email and password" .$conn->error;
			//	header('location:login.php');
			}
		} else {
			echo "execution is not done" .$conn->error;
		}
		//unset($_SESSION["uname"]);
		//unset($_SESSION["password"]);
	}
}
$obj1 = new queries;
$conn = $obj1->dabase();
$obj1->login($conn);
?>
