<?php
session_start();
if(!isset($_SESSION['uname'])||!isset($_SESSION['pssword']))
{
	header('location:admin.php');
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
		$_SESSION["uname"] = $username;
		}
		if(isset($_POST['pssword'])){
		$pssword = $_POST['pssword'];
		$_SESSION["pssword"] = $pssword;
		}
	//	$_SESSION["uname"] = $username;
	//	$_SESSION["pssword"] = $pssword;
		$sql = "select * from admin where username = '".$_SESSION["uname"] ."'  && password = '".$_SESSION["pssword"]."'";
		//echo "$sql";
		//exit();
		if($res=mysqli_query($conn, $sql))  {
			if($res->num_rows > 0) {
		$sql = 'select id,firstname,lastname,email,phonenumber,age,dateofjoining,departmentname,image,status from studentsinfo join department_table on studentsinfo.department = department_table.idno';
		//echo "$sql";
		//exit();
		if($res=mysqli_query($conn, $sql))  {
			if($res->num_rows > 0)
			{
				//echo "login successfully done and your details are <br><br><br>".$_SESSION["uname"]."<br><br>";
				echo "<table style=width:100%>";
				echo "<tr>";
				echo "<th>id</th>";
				echo "<th>firstname</th>";
				echo "<th>lastname</th>";
				echo "<th>email</th>";
				echo "<th>phonenumber</th>";
				echo "<th>age</th>";
				echo "<th>dateofjoining</th>";
				echo "<th>departmentname</th>";
				echo "<th>image</th>";
				echo "<th>delete</th>";
				echo "<th>status</th>";
				echo "<th>edit</th>";
				echo "</tr>";
				while($row = $res->fetch_array())
				{
					echo "<tr id='table_student_".$row['id']."'>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['firstname']."</td>";
					echo "<td>".$row['lastname']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['phonenumber']."</td>";
					echo "<td>".$row['age']."</td>";
					echo "<td>".$row['dateofjoining']."</td>";
					echo "<td>".$row['departmentname']."</td>";
					echo "<td>";?><img src = "Uploads\<?php echo $row['image'];?>" height = "100" width = "100"><?php echo"</td>";
					echo '<td>';?><button  onclick = "delete_row(<?php echo $row['id'];?>)"> delete </button><?php echo '</td>';
					echo '<td>';?><input type = "button"  onclick = "status(<?php echo $row['id'];?>)" id = "status_<?php echo $row['id'];?>" value = "<?php echo $row['status'];?>"></button><?php echo '</td>';
					echo '<td>';?><button  onclick = "edit_row(<?php echo $row['id'];?>)"> edit </button><?php echo '</td>';
					echo '</tr>';
				}
				echo "</table>";
				$res->free();?>  
				<a href = "logout1.php">logout</a><?php echo "";
			}
		} else {
			echo "execution is not done" .$conn->error;
		}
			} else {
				echo "give correct username and password ";
			}
		} else {
			echo "execution1 is not done";
		}
		//unset($_SESSION["uname"]);
		//unset($_SESSION["password"]);
	}
}
$obj1 = new queries;
$conn = $obj1->dabase();
$obj1->login($conn);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
function delete_row(id) 
{
 $.ajax
 ({
  url:'modification.php',
  type:'POST',
  data:{
   row_id:id
  },
  success : function(result){
			$('#table_student_'+id).html(result);
		}
 });
}
function status(id) 
{
 var x = document.getElementById("status_"+id);
 if (x.value === "active") {
    x.value = "inactive";
  } else {
    x.value = "active";
	}
	$.ajax({
		url : 'status.php',
		type : 'POST',
		data : {
		row_id:id,	
		status : x.value },
		success : function(result){
			
			$('#table_student_'+id).html(result);
		}
	});
	
}
function edit_row(id)
{
 $.ajax
 ({
  url:'edit.php',
  type:'POST',
  data:{
   row_id:id
  },
  success : function(result){
			$('#table_student_'+id).html(result);
		}
 });
}
</script>
