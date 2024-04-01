<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include "db.php";
  include("auth.php");
  echo "Hi ";
  echo $_SESSION['username'];
  echo "!";
  echo "<br>";
  $doctor_id= $_GET['doctor_id'];

  $patient_id= $_GET['patient_id'];
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
    <title>Conversation</title>
  </head>
  <body>
  <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form class="" method="post" action="#">
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">All Conversation</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <table border="1px">
                  <tr><th>SUBJECT<br></th><th>MESSAGE<br></th><th>DATE<br></th></tr>
                </div>
              </div>
            </div>
  
  <?php
  $query = mysqli_query($con, "SELECT * from message where patient_id='$patient_id' and doctor_id='$doctor_id'");
  while ($row = mysqli_fetch_array($query)) {
  ?>
    <div class="form-group">
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                   <tr> <td><?php echo $row['subject'];?></td>
                      <td><?php echo $row['message'];?></td>
                       <td><?php echo $row['date'];?></td></tr> 
                </div>
              </div>
            </div>

  <?php
  }
  ?>
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