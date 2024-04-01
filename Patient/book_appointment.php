<!DOCTYPE html>
<html lang="en">
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
						<caption>Schedule</caption>
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Date</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="Date" class="form-control" name="date"   placeholder="Enter your Appointment Date"/>
								</div>
							</div>
						</div>
	
	
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Time to start</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="number" size="5" class="form-control" name="hour_start" max_length="4"  size="4"  placeholder="Enter Time to Start(hour)">
									<input type="number"  class="form-control" name="minute_start"   placeholder="Enter Time to Start(minutes)">
									<input type="text" name="t_start" class="form-control" placeholder="Enter am/pm">
								</div>
							</div>
						</div>
							
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Time to End</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="number" size="5" class="form-control" name="hour_end" max_length="4"  size="4"  placeholder="Enter Time to Start(hour)">
									<input type="number"  class="form-control" name="minute_end"   placeholder="Enter Time to Start(minutes)">
									<input type="text" name="t_end" class="form-control" placeholder="Enter am/pm">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Description</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<textarea name="description" class="form-control" cols="18" rows="10"></textarea>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<!--<label for="name" class="cols-sm-2 control-label">Description</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<textarea name="description" class="form-control" cols="18" rows="10"></textarea>
								</div>-->
								<div align="center">
									<input type="button" class="form-control" name="submit" value="Book appointment">
							</div>
						</div>
						
						<div class="form-group">
							<!--<label for="name" class="cols-sm-2 control-label">Description</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<textarea name="description" class="form-control" cols="18" rows="10"></textarea>
								</div>-->
								<div align="center">
									<input type="button" class="form-control" name="check" value="Check appointment">
							</div>
						</div>
						
						<div class="form-group">
							<div class="terms">
								NOTE : Click <a href="terms.html" type="button" class="form-control">here</a> to check on terms and conditions.
							</div>
						</div>
	
	</form>
	</form>
	
	
	
	<?php
 if(isset($_POST['submit'])){
 	$date = stripcslashes($_POST['date']);
 	$date = mysqli_real_escape_string($con,$date);
 	$hour_start = stripcslashes($_POST['hour_start']);
 	$hour_start = mysqli_real_escape_string($con,$hour_start);
 	$minute_start = stripcslashes($_POST['minute_start']);
 	$minute_start = mysqli_real_escape_string($con,$minute_start);
 	$t_start = stripcslashes($_POST['t_start']);
 	$time_start = mysqli_real_escape_string($con,$t_start);
 	$hour_end = stripcslashes($_POST['hour_end']);
 	$hour_end = mysqli_real_escape_string($con,$hour_end);
 	$minute_end = stripcslashes($_POST['minute_end']);
 	$minute_end = mysqli_real_escape_string($con,$minute_end);
 	$t_end = stripcslashes($_POST['t_end']);
 	$time_end = mysqli_real_escape_string($con,$t_end);
 	$description = stripcslashes($_POST['description']);
 	$description = mysqli_real_escape_string($con,$description);
 	$query = "INSERT into book_appointment (date,hour_start,minute_start,time_start,hour_end,minute_end,time_end,description,patient_id,doctor_id) VALUES ('".$date."','".$hour_start."','".$minute_start."','".$time_start."','".$hour_end."','".$minute_end."','".$time_end."','".$description."','".$patient_id."','".$doctor_id."')";
 	$result = mysqli_query($con,$query);
 	if (!$result) {
 		echo "<br>";
    	echo "Cannot confirm booking";
    	printf("Error: %s\n", mysqli_error($con));
    	exit();
    }
 	else{
 		echo "<br>";
 		echo "Your booking is confirmed";
 		echo "<br>";
    }   
 }
?>

<?php
 $i=1;
	if(isset($_POST['check'])){
		$query10 = "SELECT * from book_appointment where doctor_id='$doctor_id'";
		$result10 = mysqli_query($con,$query10);
		if (!$result10) {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();
    	}
    	while ($row = mysqli_fetch_array($result10)){
    		$hour_start = $row ['hour_start'];
    		$minute_start = $row ['minute_start'];
    		$time_start = $row ['time_start'];
    		$hour_end = $row ['hour_end'];
    		$minute_end = $row ['minute_end'];
    		$time_end = $row ['time_end'];
       	}
	}
?>
</body>
</html>