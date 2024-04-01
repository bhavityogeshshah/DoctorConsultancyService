<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include "db.php";
  include("auth.php");
  echo "Hi ";
  echo $_SESSION['username'];
  echo "!";
?> 
<html>
<body>
<?php
    $fname ='';
	$id= $_GET['id'];
