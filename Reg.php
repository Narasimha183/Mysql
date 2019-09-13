<?php
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
	function tabcre($conn)
	{
		$sql = "create table studentsinfo                                                                                                                                  
		( id int not null primary key auto_increment,                                                                                                                                 
		  firstname varchar(50),                                                                                                                                                                        
		  lastname varchar(50),                                                                                                                                               
		  email varchar(30),                                                                                                                                               
		  phonenumber varchar(10),                                                                                                                                          
		  age int,                                                                                                                                                   
		  dateofjoining date                                                                                                                                               
		)";
		if(mysqli_query($conn, $sql)) {
			echo "table is created" .'<br>';
		} else {
		//echo "table is not created" .$conn->error;
		}
	}
	function insertion($conn)
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
		if(isset($_POST['pword'])){
		$password = $_POST['pword'];
		}
		$file = $_FILES['image'];
		$fileName = $_FILES['image']['name'];
		//print_r($file);
		$fileTmpName = $_FILES['image']['tmp_name'];
		$fileDestination = 'Uploads/';
		$movefile = move_uploaded_file($fileTmpName,$fileDestination.$fileName);
		/*if($movefile)
		{
			echo "moved successfully";
		}
		else
		{
			echo "not moved";
		}*/
		$sql = "insert into studentsinfo (firstname,lastname,email,phonenumber,age,dateofjoining,department,image,password,country,state,city,status) values ('$first_name','$last_name','$email_id','$Phone_number','$age','$date_joining','$department','$fileName','$password','$country','$state','$city','active')";
		if(mysqli_query($conn, $sql)){ 
		echo "successfully registred";?>
				<a href = "login.php">login</a><?php echo "";
		} else {
		//echo "details are not inserted" .$conn->error;
		}
	}
	/*function selection($conn)
	{
		$sql = "select firstname,lastname,email,phonenumber,age,dateofjoining,departmentname,image from studentsinfo join department_table on studentsinfo.department = department_table.idno";
		if($res=mysqli_query($conn, $sql)) {
			if($res->num_rows > 0)
			{
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
				$res->free();
			}
			else {
				echo "records are not found" .$conn->error;
			}
		} else {
			echo "execution is not done" .$conn->error;
		}
	}*/
	
}
$obj1 = new queries;
$conn = $obj1->dabase();
$obj1->tabcre($conn);
$obj1->insertion($conn);
//$obj1->selection($conn);
?>