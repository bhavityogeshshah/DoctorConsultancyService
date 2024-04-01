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

		<title>patient_message</title>
	</head>
	<body>
	
	<div class="container">
			<div class="row main">
				<div class="main-login main-center">
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Subject</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="varchar" class="form-control" name="subject" placeholder="Enter subject" required>
								</div>
							</div>
						</div>
						
							
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Subject</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<textarea name="message" class="form-control" cols="18" rows="15" wrap="soft" placeholder="Enter your message......" required=""></textarea>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Subject</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="Date" class="form-control" name="date" placeholder="YY/MM/DD" required>
								</div>
							</div>
						</div>
						
						
						
								<div class="form-group ">
						<div align="center" naame="photo" class="upload">Upload a photo:&nbsp &nbsp<input type="file" name="med_certi required" /><br>	</div><br>
							<a href="" target="_blank" type="button" name="submit" id="button" class="btn btn-info btn-lg btn-block login-button">Send your message</a>
						</div>
						
					</form>
				</div>
			</div>
		</div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	

	
	<?php
 
 if (isset($_POST['submit'])){
 	$subject = stripcslashes($_POST['subject']);
 	$subject = mysqli_real_escape_string($con,$subject);
 	$message = stripcslashes($_POST['message']);
 	$message = mysqli_real_escape_string($con,$message);
 	$photo = stripcslashes($_POST['photo']);
 	$photo = mysqli_real_escape_string($con,$photo);
 	$date = stripcslashes($_POST['date']);
 	$date = mysqli_real_escape_string($con,$date);
 	
 	$query = "INSERT into message (subject,message,photo,date,patient_id,doctor_id) VALUES('".$subject."','".$message."','".$photo."','".$date."','".$patient_id."','".$d_id."')";
 	$result = mysqli_query($con,$query);
 	if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
  }
 	if($result){
 		echo "<br>";
 		echo "Your message has been sent";
 		echo "<br>";
 		echo '<a href="conversation.php?doctor_id='.$d_id.'& patient_id='.$patient_id.'">'.$conversation.'</a>';
 		
 	}
    else{
    	echo "<br>";
       echo "Cannot send message";

    }
 }
?> 
</div>
</body>
</html>