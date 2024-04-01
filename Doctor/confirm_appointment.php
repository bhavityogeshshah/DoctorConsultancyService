<?php
include("auth.php");
include("db.php");
$username = $_SESSION['username'];
$query = "SELECT ID from doctors where username='$username'";
$result = mysqli_query($con,$query);
if (!$result) {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();
}
$row = mysqli_fetch_assoc($result);
$doctor_id = $row['ID'];
echo "Hi";
echo " ";
echo $username;
echo "!";
echo "<br>";
$patient_id = $_GET['patient_id'];
$appointment_id = $_GET['appointment_id'];
$query = "UPDATE book_appointment SET confirmed=1 where doctor_id=$doctor_id and patient_id=$patient_id and appointment_id=$appointment_id";


$result= mysqli_query($con,$query);
	if (!$result) {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();
			}
	else{
		echo "Appointment confirmed";
	}
?>
