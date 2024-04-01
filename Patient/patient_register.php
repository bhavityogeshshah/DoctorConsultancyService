<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		  <script type="text/javascript">
    function ValidateForm(){
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("First Name must be filled out");
        return false;
    }
    var a = document.forms["myForm"]["mname"].value;
    if (a == "") {
        alert("Middle Name must be filled out");
        return false;
    }
    var b = document.forms["myForm"]["lname"].value;
    if (b == "") {
        alert("Last Name must be filled out");
        return false;
    }
    var c = document.forms["myForm"]["pno"].value;
    if (c == "") {
        alert("Enter your phone number");
        return false;
    }
    var d = document.forms["myForm"]["bday"].value;
    if (d == "") {
        alert("Enter birth date");
        return false;
    }
    var e = document.forms["myForm"]["email"].value;
    if (e == "") {
        alert("Enter email id");
        return false;
    }
    var f = document.forms["myForm"]["uname"].value;
    if (f == "") {
        alert("Enter Username");
        return false;
    }
    var pwd= document.forms["myForm"]["pwd"].value;
    if (pwd == "") {
        alert("Enter password");
        return false;
    }
}
</script>


		<title>Patient_register</title>
	</head>
	<body>
	<?php
require('db.php');
error_reporting(E_ALL ^ E_NOTICE);
// If form submitted, insert values into the database.
if (isset($_REQUEST['uname'])){
        // removes backslashes
  $fname = stripslashes($_REQUEST['fname']);
  $fname = mysqli_real_escape_string($con,$fname);
  $mname = stripslashes($_REQUEST['mname']);
  $mname = mysqli_real_escape_string($con,$mname);
  $lname = stripslashes($_REQUEST['lname']);
  $lname = mysqli_real_escape_string($con,$lname);
  $phone_no = stripslashes($_REQUEST['pno']);
  $phone_no = mysqli_real_escape_string($con,$phone_no);
  $date = stripslashes($_REQUEST['bday']);
  $date = mysqli_real_escape_string($con,$date);
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($con,$email);
  $username = stripslashes($_REQUEST['uname']);
        //escapes special characters in a string
  $username = mysqli_real_escape_string($con,$username); 
  $password = stripslashes($_REQUEST['pwd']);
  $password = mysqli_real_escape_string($con,$password);
  $gender = stripslashes($_REQUEST['gender']);
  $gender = mysqli_real_escape_string($con,$gender);
  $medical_issues = stripslashes($_REQUEST['medical_issues']);
  $medical_issue = mysqli_real_escape_string($con,$medical_issues);
       $query   = "INSERT into Patients (fname,mname,lname,phone_no,date,email,uname,password,gender,medical_issue) VALUES('" . $fname . "','" . $mname . "','" . $lname . "','" . $phone_no . "','" . $date . "','" . $email . "','" . $username . "','" . $password . "','" . $gender . "','" . $medical_issue . "')";
        $result = mysqli_query($con,$query);
        if (!$result) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
      }
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='patient_login.php'>Login</a></div>";
        }
    }else{
?>

		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
					<form  class="" method="" action="" onsubmit=" return ValidateForm();">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="text" class="form-control" name="fname" id="name"  placeholder="Enter your First Name"/>
								</div>
							</div>
						</div>

						
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
									<input type="text" class="form-control" name="lname" id="name"  placeholder="Enter your Last Name"/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

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

						<!--<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>-->
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Date of birth</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
									<input type="date" class="form-control" name="bday"  placeholder="Enter birth date"/>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Gender</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
									 <input type="radio" class="form-control"  name="gender" value="male" checked> Male<br>
									 <input type="radio" class="form-control" name="gender" value="female"> Female<br>
									 <input type="radio" class="form-control" name="gender" value="other"> Other <br>
								</div>
							</div>
						</div>
						
					
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Select a City</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
									<select class="form-control" name="city" required>
									<option value="Select City" >Select City</option>
									<option value="Mumbai">Mumbai</option>
									<option value="Delhi">Delhi</option>
									<option value="Pune">Pune</option>
									<option value="Kolkata">Kolkata</option>
									<option value="Chennai">Chennai</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Address</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
									<address><input type="address" class="form-control" name="address1" placeholder="Enter your Address"  required></address>
									</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Contact Details</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
									<input type="tel" class="form-control" name="pno" placeholder="Enter your number" required >
									</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Medical Issue</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
											<select name="field" class="form-control" required>
											<option disabled selected>Select</option>
											<option value="Allergies">Allergies</option>
											<option value="Alzheimer's">Alzheimer's</option>
											<option value="Arthritis">Arthritis</option>
											<option value="Asthma">Asthma</option>
											<option value="Blood Pressure">Blood Pressure</option>
											<option value="Cancer">Cancer</option>
											<option value="Cholesterol">Cholesterol</option>
											<option value="Chronic Pain">Chronic Pain</option>
											<option value="Cold & Flu">Cold & Flu</option>
											<option value="Depression">Depression</option>
											<option value="Diabetes">Diabetes</option>
											<option value="Dictionary">Dictionary</option>
											<option value="Digestion">Digestion</option>
											<option value="Eyesight">Eyesight</option>
											<option value="Health & Living">Health & Living</option>
											<option value="Healthy Kids">Healthy Kids</option>
											<option value="Hearing & Ear">Hearing & Ear</option>
											<option value="Heart">Heart</option>
											<option value="HIV/AIDS">HIV/AIDS</option>
											<option value="Infectious Disease">Infectious Disease</option>
											<option value="Lung Conditions">Lung Conditions </option>
											<option value="Medications">Medications</option>
											<option value="Menopause">Menopause</option>
											<option value="Men's Health">Men's Health</option>
											<option value="Mental Health">Mental Health</option>
											<option value="Migraine">Migraine</option>
											<option value="Neurology">Neurology</option>
											<option value="Oral Health">Oral Health</option>
											<option value="Pregnancy">Pregnancy</option>
											<option value="Senior Health">Senior Health</option>
											<option value=" Sexual Health">Sexual Health</option>
											<option value="Skin">Skin</option>
											<option value="Sleep">Sleep</option>
											<option value="Thyroid">Thyroid</option>
											<option value="Travel World">Travel World</option>
											<option value="Women's Health">Women's Health</option>
											</select>
									</div>
							</div>
						</div>
						
	
						<div class="form-group ">
							<div align="center"><button type="reset" value="Reset">Reset</button>&nbsp &nbsp
  	<button type="submit" value="Submit">Submit</button>	
						</div>
						</div>
					</form>
					</div>
					</div>
					</div>
					<?php
				}
?>
		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>