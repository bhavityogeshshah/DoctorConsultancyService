<?php
error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include ("db.php");
  include("auth.php");
  echo "Hi ";
  echo $_SESSION['username'];
  echo "!";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Message Confirmation</title>
</head>
<body>
<?php
        if(isset($_POST['submit'])){
        	$subject = $_POST['subject']);
			$message = $_POST['message']);
			$date = $_POST['date']);
			$photo = $_POST['photo']);
			$query = "INSERT into message (subject,message,photo,date) values ('" . $subject . "','" . $message . "','" . $date . "','" . $photo . "')";
			$result = mysqli_query($con,$query);
			if($result){
				echo "Message Sent";
			}
			else{
				die('Error: ' . mysqli_error());
			}
        }	
?>
</body>
</html>