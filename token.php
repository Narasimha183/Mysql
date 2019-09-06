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
	function checkdatabase($conn) {
		$email = $_POST['email'];
		$_SESSION['email'] = $email;
		$sql = 'select email from studentsinfo where email = "'.$email.'"';
		if($res=mysqli_query($conn, $sql)) {
			if($res->num_rows > 0) {
					$token = bin2hex(random_bytes(5));
					$sql = 'update  studentsinfo set token ="'.$token.'" where email ="'.$_SESSION["email"].'"';
		//echo "$sql";
		//exit;
					if(mysqli_query($conn, $sql)) { 
						echo "";
						header('location:forgopword.php');
						} else {
						echo "execution1 is not done";
						}
					} else {
						echo "records not found give exact details";
						}
				} else {
					echo "execution is not done";
				}
		}
}
$obj1 = new queries;
$conn = $obj1->dabase();
$obj1->checkdatabase($conn);
?>