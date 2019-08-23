<?php
include "Connection.php";
include "Quries.php";
$obj = new Quries;
$obj->tabcre();
$obj->insertion1();
//$obj->deletion(2);
//$obj->upd(1);
$obj->salary();
$obj->insertion2();
$obj->selection();
?>