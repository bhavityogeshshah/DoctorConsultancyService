<?php
session_start();
if(!isset($_SESSION["username"])){
	echo $_SESSION['username'];
header("Location: patient_login.php");
exit(); }
?>


