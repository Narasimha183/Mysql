<?php
$conn = new mysqli("localhost","root","","registrationform");
	if ($conn->connect_error) {
		die ("Connection failed" .$conn->connect_error);
		} else {
		//echo "connection done successfully";
		}
		$nameid = $_POST['datapost'];
		$sql = "select * from state where cid = '".$nameid."'";
		$result = mysqli_query($conn,$sql);
		//echo "$sql";
		//exit();
		while($rows = $result->fetch_array())
		{ ?>
	<option value = <?php echo $rows['sid']?>><?php echo $rows['state_name'];?></option>
	<?php
		}		
?>