<?php
session_start();
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
	function retype($conn) {
		if(isset($_POST['newpassword'])){
		$password = $_POST['newpassword'];
		}
		$sql = 'update studentsinfo set password = "'.$password.'" where email = "'.$_SESSION["uname"].'" && password = "'.$_SESSION["password"].'"';
		if(mysqli_query($conn, $sql)) {
			echo "password is updated" .'<br>';
		} else {
		echo "password is updated" .$conn->error;
		}
		?>
	to login <a href = "login.php">login</a><?php echo "";
	}
}
$obj1 = new queries;
$conn = $obj1->dabase();
$obj1->retype($conn);
?>