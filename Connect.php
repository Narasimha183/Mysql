<?php
	$servername="localhost";
	$username="root";
	$password="";
	$conn = mysqli_connect($servername, $username, $password);
	if(!$conn)
	{
		die ("Connection failed" .mysqli_connect_error());
	}
	$sql = "Create database Digital";
	if(mysqli_query($conn,$sql))
	{
		echo "Creation of database is successfull";
	}
	else
	{
		echo "Creation of database is not possible" .mysqli_error($conn);
	}
	mysqli_close($conn);
	
?>