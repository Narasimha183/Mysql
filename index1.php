<?php
$conn = new mysqli("localhost","root","","ajax");
	if ($conn->connect_error) {
		die ("Connection failed" .$conn->connect_error);
		} else {
		//echo "connection done successfully";
		} 
		$sql = "select * from company";
		$result = mysqli_query($conn,$sql);
		$options = "";
		while($rows = $result->fetch_array())
		{
			$company = $rows['company_name'];
			$idno = $rows['cid'];
			$options=$options.'<option value="'.$idno.'">'.$company.'</option>';
		}
?>
<!DOCTYPE html>
<html>
	<head>
	<h><center><b>select data from database using ajax</b></center></h>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	company :<select onchange = "myfun(this.value)">
				<option>select any one</option>
				<?php
				echo $options;
				?>
			 </select><br><br>
	positon :<select id = "dataget" onchange = "myfunction()">
				<option>choose any one</option>
			 </select>
	<script>
	function myfun(datavalue) {
	$.ajax({
		url : 'position.php',
		type : 'POST',
		data:{datapost : datavalue},
		success : function(result){
			$('#dataget').html(result);
		}
	});
	}
	</script>
</html>