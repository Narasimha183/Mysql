<?php
class Connection {
private $servername;
private $username;
private $password;
private $dabase;
protected function Dbase() {
	$this->servername="localhost";
	$this->username="root";
	$this->password="";
	$this->dabase="registrationform";
	$conn = new mysqli($this->servername,$this->username,$this->password,$this->dabase);
	return $conn;
}
}
?>