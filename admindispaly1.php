<?php
$conn = new mysqli("localhost","root","","registrationform");
$sql = 'select id,firstname,lastname,email,phonenumber,age,dateofjoining,departmentname,image from studentsinfo join department_table on studentsinfo.department = department_table.idno';
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
					echo "<tr id='table_student'>";
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
					echo '<td>';?><input type = "button"  onclick = "status()" id = "status" value = "active"></button><?php echo '</td>';
					echo '<td>';?><button  onclick = "edit_row(<?php echo $row['id'];?>)"> edit </button><?php echo '</td>';
					echo '</tr>';
				}
				echo "</table>";
				$res->free();?>  
				<a href = "admin.php">logout</a><?php echo "";
			}
		} else {
			echo "execution is not done" .$conn->error;
		}
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
			$('#table_student').html(result);
		}
 });
}
function status()
{
 var x = document.getElementById("status");
 if (x.value == "active") {
    x.value = "inactive";
  } else {
    x.value = "active";
	}
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
			$('#table_student').html(result);
		}
 });
}
</script>