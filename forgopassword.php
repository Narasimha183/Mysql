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
	function checktoken($conn) {
		$token = $_POST['token'];
		$sql = 'select * from studentsinfo where email = "'.$_SESSION['email'].'"';
		if($res=mysqli_query($conn, $sql)) {
			if($res->num_rows > 0) {
				while($row = $res->fetch_array())
				{
					if($row['token']==$token){
						header('location:resetpoword.php');
					}
					else {
						echo "give correct token";
					}
				}
				
			}
			else {
				echo "no results found";
			}
		}
		else {
			echo "sql query is wrong";
		}
	}
}
$obj1 = new queries;
$conn = $obj1->dabase();
$obj1->checktoken($conn);
?>