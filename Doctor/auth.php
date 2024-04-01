<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: doctor_login.php");
exit(); }
?>

