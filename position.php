<?php
$conn = new mysqli("localhost","root","","ajax");
	if ($conn->connect_error) {
		die ("Connection failed" .$conn->connect_error);
		} else {
		//echo "connection done successfully";
		}
		$nameid = $_POST['datapost'];
		$sql = "select * from positon where cid = '".$nameid."'";
		$result = mysqli_query($conn,$sql);
		//echo "$sql";
		//exit();
		while($rows = $result->fetch_array())
		{ ?>
	<option><?php echo $rows['name'];?></option>
	<?php
		}		
?>