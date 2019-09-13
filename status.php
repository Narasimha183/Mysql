<?php
$conn = new mysqli("localhost","root","","registrationform");
	if ($conn->connect_error) {
		die ("Connection failed" .$conn->connect_error);
		} else {
		//echo "connection done successfully";
		} 
		$row_no=$_POST['row_id'];
		$status = $_POST['status'];
		echo $sql1 = "update studentsinfo set status = '".$status."' where id = '".$row_no."'";
		if(mysqli_query($conn, $sql1)) {
			//echo "Affected rows: " . mysqli_affected_rows($conn);
			//echo("gsdfgsdfg");
			$sql = 'select id,firstname,lastname,email,phonenumber,age,dateofjoining,departmentname,image,status from studentsinfo join department_table on studentsinfo.department = department_table.idno';
					if($res=mysqli_query($conn, $sql))  {
			if($res->num_rows > 0)
			{	
				while($row = $res->fetch_array())
				{
					//echo "<tr id='table_student_".$row['id']."'>";
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
					//echo '</tr>';
				}
				$res->free();
			}
		} else {
			echo "execution is not done" .$conn->error;
		}
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