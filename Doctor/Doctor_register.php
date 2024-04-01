<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Website CSS style -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Website Font style -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
	<title>Register</title>
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
    var d = document.forms["myForm"]["bdate"].value;
    if (d == "") {
        alert("Enter birth date");
        return false;
    }
    var e = document.forms["myForm"]["Email"].value;
    if (e == "") {
        alert("Enter email id");
        return false;
    }
    var f = document.forms["myForm"]["Username"].value;
    if (f == "") {
        alert("Enter Username");
        return false;
    }
    var pwd= document.forms["myForm"]["Password"].value;
    if (pwd == "") {
        alert("Enter password");
        return false;
    }
    var add= document.forms["myForm"]["address"].value;
    if (add == "") {
        alert("Enter work address");
        return false;
    }
    var lno= document.forms["myForm"]["lno"].value;
    if (lno == "") {
        alert("Enter License no.");
        return false;
    }
    var file= document.forms["myForm"]["file"].value;
    if (file == "") {
        alert("Upload medical certificate");
        return false;
    }
  }
</script>
</head>
<body>
<?php
require('db.php');
error_reporting(E_ALL ^ E_NOTICE);
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
  $fname = stripslashes($_REQUEST['fname']);
  $fname = mysqli_real_escape_string($con,$fname);
  $lname = stripslashes($_REQUEST['lname']);
  $lname = mysqli_real_escape_string($con,$lname);
  $date = stripslashes($_REQUEST['bdate']);
  $date = mysqli_real_escape_string($con,$date);
  $gender = stripslashes($_REQUEST['gender']);
  $gender = mysqli_real_escape_string($con,$gender);
  $city = stripslashes($_REQUEST['city']);
  $city = mysqli_real_escape_string($con,$city);
  $address1 = stripslashes($_REQUEST['address1']);
  $address1 = mysqli_real_escape_string($con,$address1);
  $address2 = stripslashes($_REQUEST['address2']);
  $address2 = mysqli_real_escape_string($con,$address2);
  $phone_no = stripslashes($_REQUEST['pno']);
  $phone_no = mysqli_real_escape_string($con,$phone_no);
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($con,$email);
  $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
  $username = mysqli_real_escape_string($con,$username); 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con,$password);
  $website = stripslashes($_REQUEST['Website']);
  $website = mysqli_real_escape_string($con,$website);
  $licenseno = stripslashes($_REQUEST['lno']);
  $licenseno = mysqli_real_escape_string($con,$licenseno);
  $field = stripslashes($_REQUEST['field']);
  $field = mysqli_real_escape_string($con,$field);
  $med_certi = stripslashes($_REQUEST['med_certi']);
  $med_certi = mysqli_real_escape_string($con,$med_certi);
  
        $query   = "INSERT into doctors (fname,mname,lname,bdate,gender,city,address1,address2,phone_no,email,username,password,website,licenseno,field,med_certi) VALUES('" . $fname . "','" . $mname . "','" . $lname . "','" . $date . "','" . $gender . "','" . $city . "','" . $address1 . "','" . $address2 . "','" . $phone_no . "','" . $email . "','" . $username . "','" . $password . "','" . $website . "','" . $licenseno . "','" . $field . "','" . $med_certi . "')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='doctor_login.php'>Login</a></div>";
        }
    }else{
?>
 <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form class="" method="" action="" onsubmit="return ValidateForm();">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your FirstName</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <input type="text" class="form-control" name="fname" id="name"  placeholder="Enter your Name"/>
                </div>
              </div>
            </div>


            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your last Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <input type="text" class="form-control" name="lname" id="name"  placeholder="Enter your Name"/>
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
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>

          <!--  <div class="form-group">
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
                  <input type="date" class="form-control" name="bdate"  placeholder="Enter birth date"/>
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
                  <address><input type="address" class="form-control" name="address1" placeholder="Enter professional Address"  required></address>
                  </div>
              </div>
            </div>
            
            
            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Contact Details</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
                  <input type="tel" class="form-control" name="pno" placeholder="Enter work number" required >
                  </div>
              </div>
            </div>
            
            
            
            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Website</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
                  <input type="url" class="form-control" name="Website" placeholder="Enter Website if any">
                  </div>
              </div>
            </div>
            
            
            
            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">License Number</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
                  <input type="text" class="form-control" name="lno" placeholder="Enter you license number"  required>
                  </div>
              </div>
            </div>
            
            
            <div class="form-group">
              <label for="confirm" class="cols-sm-2 control-label">Field</label>
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
           
  	<div align="center" class="upload">Upload your medical certificate:&nbsp &nbsp<input type="file" name="med_certi " /><br>	</div>
  	<div align="center"><button type="reset" value="Reset">Reset</button>&nbsp &nbsp
  	<button type="submit" value="Submit">Submit</button>	
    </div>
    </div>
   </form>
   </div>
      </div>
   </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
   <?php } ?>
</body>
</html>


