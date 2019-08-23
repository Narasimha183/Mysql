<?php
class Quries extends Connection
{
	public function tabcre()
	{
		$sql = "create table Emdetails
		( id int not null primary key auto_increment,
		  firstname varchar(50),
		  lastname varchar(50),
		  sex enum('male','female') not null,
		  email varchar(30),
		  dateofjoining date,
		  company varchar(50)
		)";
		if(mysqli_query($this->Dbase(), $sql)) {
			echo "table is created";
		} else {
		echo "table is not created" .$this->Dbase()->error;
		}
	}
	public function insertion1()
	{
		$sql = "insert into Emdetails (firstname,lastname,sex,email,dateofjoining,company) values ('fghfg','fgfdgan','male','gunaseelan@gmail.com','2012-12-04','CTS')";
		if(mysqli_query($this->Dbase(),$sql)) {
			echo "deatails are inserted";
		} else {
		echo "deatails are not inserted" .$this->Dbase()->error;
		}
	}
	/*function deletion($num)
	{
		$sql = "delete from Edeatails where id=$num";
		if(mysqli_query($this->Dbase(), $sql)) {
			echo "item was deleted";
		} else {
			echo "selected item was not deleted" .$this->Dbase()->error;
		}
	}
	function upd($num)
	{
		$conn = new mysqli("localhost","root","","digitalteam");
		$sql = "update Edeatails set lastname = 'rajan' where id=$num";
		if(mysqli_query($conn, $sql)) {
			echo "deatails are updated";
		} else {
		echo "deatails are not updated" .$conn->error;
		}
	}*/
    public function salary()

	{
		$sql = "create table salary_table
		(
		id int,
		foreign key (id) references Emdetails(id),
		salary varchar(10),
		experience int,
		technology varchar(10)
		)";
		if(mysqli_query($this->Dbase(), $sql)) {
			echo "table is created";
		} else {
		echo "table is not created" .$this->Dbase()->error;
		}
	}	
	public function insertion2()
	{
		$sql = "insert into salary_table(id,salary,experience,technology) values (1,'10000',7,'php')";
		if(mysqli_query($this->Dbase(),$sql)) {
			echo "deatails are inserted";
		} else {
		echo "deatails are not inserted" .$this->Dbase()->error;
		}
	}
	public function selection()
	{
		$sql = "select firstname,lastname,email,company,salary from Emdetails join salary_table on salary_table.id=Emdetails.id";
		if($res=mysqli_query($this->Dbase(), $sql)) {
			if($res->num_rows > 0) {
				echo "<table>";
			    echo "<tr>";
				echo "<th>firstname</th>";
				echo "<th>lastnamename</th>";
				echo "<th>email</th>";
				echo "<th>company</th>";
				echo "<th>salary</th>";
				echo "</tr>";
				while($row = $res->fetch_array())
				{
					echo "<tr>";
					echo "<td>".$row['firstname']."</td>";
					echo "<td>".$row['lastname']."</td>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['company']."</td>";
					echo "<td>".$row['salary']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				$res->free();
			}
			else {
				echo "records are not found" .$this->Dbase()->error;
			}
		}
		else {
			echo "execution is not done" .$this->Dbase()->error;
		}
	}
}
?>