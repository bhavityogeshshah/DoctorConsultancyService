<?php
 
require 'connection_patient.php';
$conn    = Connect();
$fname    = $conn->real_escape_string($_POST['fname']);
$mname    = $conn->real_escape_string($_POST['mname']);
$lname    = $conn->real_escape_string($_POST['lname']);
$phone_no    = $conn->real_escape_string($_POST['pno']);
$date   = $conn->real_escape_string($_POST['bday']);
$email    = $conn->real_escape_string($_POST['email']);
$uname = $conn->real_escape_string($_POST['uname']);
$password    = $conn->real_escape_string($_POST['pwd']);
$gender    = $conn->real_escape_string($_POST['gender']);
$medical_issue    = $conn->real_escape_string($_POST['medical_issues']);
$query   = "INSERT into Patients (fname,mname,lname,phone_no,date,email,uname,password,gender,medical_issue) VALUES('" . $fname . "','" . $mname . "','" . $lname . "','" . $phone_no . "','" . $date . "','" . $email . "','" . $uname . "','" . $password . "','" . $gender . "','" . $medical_issue . "')";
$success = $conn->query($query);
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}
 
echo "Thank You For Contacting Us <br>";
 
$conn->close();
 
?>


