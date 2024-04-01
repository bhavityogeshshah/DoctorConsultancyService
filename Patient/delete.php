<!DOCTYPE html>
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
</head>
<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include "db.php";
  include("auth.php");
  echo "Hi ";
  echo $_SESSION['username'];
  echo "!";
  $username = $_SESSION['username'];
  $query1= "SELECT ID from Patients where uname like '%$username%'";
  $result1= mysqli_query($con,$query1);
  $row = mysqli_fetch_assoc($result1);
  $patient_id = $row['ID'];
  
?> 

<body>
<?php
    $fname ='';
  $doctor_id = isset($_GET['id']) ? $_GET['id'] : '';
  $query = mysqli_query($con, "SELECT * FROM `doctors` WHERE ID like '%$doctor_id%'") or die (mysqli_error($con));
    $row = mysqli_fetch_array($query);
    $fname = $row ['fname'];
    $lname = $row ['lname'];
    $address1 = $row ['address1'];
    $phone_no = $row ['phone_no'];
    $email = $row ['email'];
    $field = $row['field'];
 ?>
<div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form action="" method="post">
          
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Doctor Profile<br><br></label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <tr><td>Name : </td><td> <?php echo "Dr" ;echo " ";echo $fname; echo " "; echo $lname; ?><br><br></td></tr>
                  <tr><td>Address : </td><td><?php echo $address1?><br><br></td></tr>
                  <tr><td>Contact : </td><td><?php echo $phone_no?><br><br></td></tr>
                  <tr><td>Email : </td><td><?php echo $email ?><br><br></td></tr>
                  <input type="submit" name="delete" class="form-control" value="Delete">
                </div>
              </div>
            </div>

              
          </form>
        </div>
      </div>
  </div>
 <?php
 if(isset($_POST['delete'])) {
  $query ="DELETE from doc_pat_relation where patient_id='$patient_id' and doctor_id='$doctor_id'";
  $result = mysqli_query($con,$query);
  if (!$result) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
    }
    $query ="DELETE from message where patient_id='$patient_id' and doctor_id='$doctor_id'";
  $result1 = mysqli_query($con,$query);
  if (!$result1) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
    }
    echo "You have deleted doctor successfully";
}
?>

  
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
  
  
  </body>
  </html>