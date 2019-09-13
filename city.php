<?php
$conn = new mysqli("localhost","root","","registrationform");
	if ($conn->connect_error) {
		die ("Connection failed" .$conn->connect_error);
		} else {
		//echo "connection done successfully";
		}
		$cityid = $_POST['datapost'];
		$sql = "select * from city where sid = '".$cityid."'";
		$result = mysqli_query($conn,$sql);
		//echo "$sql";
		//exit();
		while($rows = $result->fetch_array())
		{ ?>
	<option  value = <?php echo $rows['ciid']?>><?php echo $rows['city__name'];?></option>
	<?php
		}		
?>