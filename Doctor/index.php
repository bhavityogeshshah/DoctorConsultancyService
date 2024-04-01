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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form class="" method="post" action="check_message.php">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Check Message</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <input type="submit" class="form-control" name="message" value="Check message">
                  <br>
                </div>
              </div>
            </div>
            </form>
            
            <form method="post" action="check_appointment.php">
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Check Appointment</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <input type="submit" class="form-control" name="appointment" value="Check Appointment">
                  <br>
                </div>
              </div>
            </div>
            </form>
            
            <form method="post" action="">
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">List Patients</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <input type="submit" class="form-control" name="patient" value="List Patients">
                  <br>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            </form>
            
            <?php
$i=1;
    if(isset($_POST['patient'])){
        $query1 = "SELECT * from doc_pat_relation where doctor_id='$doctor_id'";
        $result1 = mysqli_query($con,$query1);
        if (!$result1) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
        }
        while($row = mysqli_fetch_assoc($result1)){
            $patient_id = $row['patient_id'];   
            $query2 = "SELECT * from Patients where ID='$patient_id'";
            $result2 = mysqli_query($con,$query2);
            if (!$result2) {
                printf("Error: %s\n", mysqli_error($con));
                exit();
            }
            $row = mysqli_fetch_assoc($result2);
            $fname = $row['fname'];
?>
           <div class="form-group">
             <!-- <label for="name" class="cols-sm-2 control-label">List Patients</label>-->
              <div class="cols-sm-10">
                <div class="input-group">
                <table align="center" border="2px" cell>
                <div class="patientlist">
          <tr><td><?php
            echo "$i";?></td>
            <td><?php echo $fname; ?></td>
            <?php $i++; 
            ?>
            
            </tr>
            </div>
            </div>
            </div>
            </div>
            <?php
        }
        
    }
?>
<a href="logout.php">Logout</a>
</body>
</html>