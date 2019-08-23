<?php
class queries{
	public $conn;
	public function dabase()
	{
		$conn = new mysqli("localhost","root","","digitalteam");
		if ($conn->connect_error) {
		die ("Connection failed" .$conn->connect_error);
		} else {
		echo "connection done successfully" .'<br>';
		}
		return $conn; 
	}
	
	function tabcre($conn)
	{
		$sql = "create table Edeatails
		( id int not null,
		  firstname varchar(50),
		  lastname varchar(50),
		  email varchar(30),
		  dateofjoining date,
		  company varchar(50)
		)";
		if(mysqli_query($conn, $sql)) {
			echo "table is created";
		} else {
		echo "table is not created" .$conn->error;
		}
	}
	function insertion($conn)
	{
		$sql = "insert into Edeatails (id,firstname,lastname,email,dateofjoining,company) values (6,'fghfg','fgfdgan','gunaseelan@gmail.com','2012-12-04','CTS')";
		if(mysqli_query($conn, $sql)){ 
			echo "details are inserted";
		} else {
		echo "details are not inserted" .$conn->error;
		}
	}
	function deletion($conn,$num)
	{
		$sql = "delete from Edeatails where id=$num";
		if(mysqli_query($conn, $sql)) {
			echo "item was deleted";
		} else {
			echo "selected item was not deleted" .$conn->error;
		}
	}
	function upd($conn,$num)
	{
		$conn = new mysqli("localhost","root","","digitalteam");
		$sql = "update Edeatails set lastname = 'rajan' where id=$num";
		if(mysqli_query($conn, $sql)) {
			echo "deatails are updated";
		} else {
		echo "deatails are not updated" .$conn->error;
		}
	}
}
	$obj1 = new queries;
	$conn = $obj1->dabase();
	$obj1->tabcre($conn);
	$obj1->insertion($conn);
	$obj1->deletion($conn,2);
	$obj1->upd($conn,4);
?>