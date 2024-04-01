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

		<title>Patient_login</title>
	</head>
	<body>
	<?php
require('db.php');
error_reporting(E_ALL ^ E_NOTICE);
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
	$username = stripslashes($_POST['uname']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_POST['pwd']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `Patients` WHERE uname='$username' and password='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='patient_login.php'>Login</a></div>";
	}
    }else{
?>
	<div class="container">
			<div class="row main">
				<div class="main-login main-center">
					<form class="" method="post" name="login" action="">
						
		<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>-->
									<input type="text" class="form-control" name="uname" id="username"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
									<input type="password" class="form-control" name="pwd" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						
					
						<div class="form-group ">
							<input name="submit" type="submit"  value="Login" />

						</div>
						</form>
						</div>
						</div>
						</div>
						
						<p>Not registered yet? <a href='register_patient.php'>Register Here</a></p>
						</div>
		
	 <?php } ?>
	</body>
	</html>