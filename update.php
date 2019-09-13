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
	function update($conn)
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email_id = $_POST['email_id'];
		$Phone_number = $_POST['Phone_number'];
		$department = $_POST['departments'];
		$age=$_POST['age'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$date_joining=$_POST['date_joining'];
		/*if($movefile)
		{
			echo "moved successfully";
		}
		else
		{
			echo "not moved";
		}*/
		$sql = "update studentsinfo set firstname = '".$first_name."', lastname = '".$last_name."' , email = '".$email_id ."' , phonenumber = '".$Phone_number."' , department = '".$department."' , age = '".$age."' , country= '".$country."' , state = '".$state."' , city = '".$city ."' , dateofjoining = '".$date_joining."' where id ='".$_SESSION['id']."' ";
		if(mysqli_query($conn, $sql)){ 
		header("location:admindisplay.php");
		} 
	}
}
$obj1 = new queries;
$conn = $obj1->dabase();
//$obj1->tabcre($conn);
$obj1->update($conn);
//$obj1->selection($conn);
?>