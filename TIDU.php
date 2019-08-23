<?php
    $servername="localhost";
	$username="root";
	$password="";
	$database="digital";
	$conn = mysqli_connect($servername, $username, $password,$database);
	if(!$conn)
	{
		die ("Connection failed" .mysqli_connect_error());
	}
	$sql = "create table Employees_table
	(id int,
	 firstname varchar(50),
	 lastname varchar(50),
	 email varchar(50),
	 dateofjoing date
	)";
	if(mysqli_query($conn,$sql))
	{
		echo "creation of table isdone" .mysqli_error($conn);
	}
	else
	{
		echo "creation of table is not possible" .mysqli_error($conn);
	}
	mysqli_close($conn);
?>