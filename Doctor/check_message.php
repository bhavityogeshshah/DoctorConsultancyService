<?php
//include auth.php file on all secure pages
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
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<title>MESSAGE</title>
</head>
<body>
<div class="container">
			<div class="row main">
				<div class="main-login main-center">
					<form  method="post" action="#">
						
						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="submit" class="form-control" name="check" value="check" />
								</div>
							</div>
						</div>
	<?php
	$i=1;
	$output=" ";
	$reply = "Reply";
		if(isset($_POST['check'])){
			$query = "SELECT * from message where doctor_id='$doctor_id'";
			$result= mysqli_query($con,$query);
			if (!$result) {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();
			}
    ?>
						
					<!--	<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">MESSAGES</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<tr><th>Sr No.<br><br></th><th>Sent By<br><br></th><th>Date<br><br></th><th>Subject<br><br></th><th>Message<br><br></th><th>Reply<br><br></th></tr>
								</div>
							</div>
						</div>-->

    <?php
			while($row = mysqli_fetch_assoc($result)){
				$message = $row['message'];
				$subject = $row['subject'];
				$photo = $row['photo'];
				$date = $row['date'];
				$patient_id = $row['patient_id'];
				$message_id = $row['message_id'];
				$query1 = "SELECT * from Patients where ID='$patient_id'";
				$result1= mysqli_query($con,$query1);
				if (!$result1) {
    				printf("Error: %s\n", mysqli_error($con));
    				exit();
				}
				$row1 = mysqli_fetch_assoc($result1);
				$fname = $row1['fname'];
				$lname = $row1['lname'];
			    $output .= '<div>'. $fname. ' '.$lname.'</div>'; 
    ?>
				<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">MESSAGES</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
							<tr><td><?php echo "$i" ?></td><td><?php echo $output ?></td><td><?php echo $date?></td><td><?php echo $subject ?></td><td><?php echo $message ?></td><td><?php echo '<a href="message_reply.php?patient_id='.$patient_id.'&message_id='.$message_id.'&subject='.$subject.'&message='.$message.'">'.$reply.'</a>' ?></td></tr>
								</div>
							</div>
						</div>
		
        <?php
              $i++;
			}
		}
	    ?>
	</table>
	<a href="logout.php">Log Out</a>
	</form>
	</div>
	</div>
	</div>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

