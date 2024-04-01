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

	<title>Appointment</title>
</head>
<body>
	<div class="container">
			<div class="row main">
				<div class="main-login main-center">
					<form class="" method="post" action="#">
						
						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="submit" class="form-control" name="check" value="check"/>
								</div>
							</div>
						</div>

	<?php

	$i=1;
	$output=" ";
	$confirm ="Confirm";

		if(isset($_POST['check'])){
			$query = "SELECT * from book_appointment where doctor_id='$doctor_id'";
			$result= mysqli_query($con,$query);
			if (!$result) {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();
			}

    ?>
						<!--	<div class="form-group">
							<caption>APPOINTMENTS</caption>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
    	<tr><th>Sr No.<br><br></th><th>DATE<br><br></th><th>TIME<br><br></th><th>DESCRIPTION<br><br></th><th>PATIENT NAME<br><br></th><th>CONFIRM<br></th></tr>
								</div>
							</div>
						</div>-->


    <?php
			while($row = mysqli_fetch_assoc($result)){
				$date = $row['date'];
				$hour_start = $row['hour_start'];
				$minute_start = $row['minute_start'];
				$time_start = $row['time_start'];
				$hour_end = $row['hour_end'];
				$minute_end = $row['minute_end'];
				$time_end = $row['time_end'];
				$description = $row['description'];
				$patient_id = $row['patient_id'];
				$appointment_id = $row['appointment_id'];
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
							
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
			 <tr><td><th>SR no : </th><?php echo "$i" ?></td><br><td><th>Date : </th><?php echo $date?></td><br><td><th>Time : </th><?php echo $hour_start; echo ":"; echo $minute_start; echo " "; echo $time_start ?></td><br><td><th>Description : </th><?php echo $description ?></td><br><td><th>Patient Name : </th><?php echo $output ?></td><br><td><?php echo '<a href="confirm_appointment.php?patient_id='.$patient_id.'&appointment_id='.$appointment_id.'">'.$confirm.'</a>' ?></td></tr>
								</div>
							</div>
						</div>

        <?php
              $i++;
			}
		}
	    ?>
	</form>
	</div>
	</div>
	</div>
	<a href="logout.php">Log Out</a>
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
