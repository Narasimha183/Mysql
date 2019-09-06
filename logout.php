<?php
session_start();
//echo "your successfully logout ".$_SESSION["uname"];
session_destroy();
//unset($_SESSION["uname"]);
header('location:login.php');
?>