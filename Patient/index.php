<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include "db.php";
  include("auth.php");
  $output = '';
  $output1 = '';
  $output2 = '';
  $username = $_SESSION['username'];
  $query1= "SELECT ID from Patients where uname like '%$username%'";
  $result1= mysqli_query($con,$query1);
  $row = mysqli_fetch_assoc($result1);
  $patient_id = $row['ID'];
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
  <title>INDEX</title>
</head>
<body>
<div class="container">
      <div class="row main">
        <div class="main-login main-center">
  <p>Welcome <?php echo $_SESSION['username']; ?>!</p>

          <form  method="post" action="">
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Search Doctor By Field</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span id="field">Search doctor by field</span>-->
              <select name="search_field" class="form-control" >
                <option disabled selected>Search Field </option>
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
                          <input type="submit" value="Search"/>
                            </div>
                          </div>
                        </div>
                
  
 <?php
/* SEARCH ACCORDING TO FIELD*/
  if(isset($_POST['search_field'])) {
    $search = $_POST['search_field'];
    $search = preg_replace("#[^0-9a-z]i#","", $search);

    $query = mysqli_query($con, "SELECT * FROM `doctors` WHERE field like '%$search%'") or die (mysqli_error($con));
    $count = mysqli_num_rows($query);
    
    if($count == 0){
      $output2 = "There are no doctors available for $search!";
      echo "$output2";
    }else{
      $output1 .= '<div>'. "Doctor/s available for $search is/are:" .'</div>';
      echo "$output1";
      while ($row = mysqli_fetch_array($query)) {
         $fname = $row ['fname'];
         $lname = $row ['lname'];
         $ID = $row ['ID'];
         $output .= '<div>'. $fname. ' '.$lname.'</div>';
         echo '<a href="doctor_profile.php?id='.$ID.'">'. $output.'</a>';
      }
    }
  }
 ?>
  <hr>

 
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Search Doctor By City</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                  <!--  <span id="city">Search doctor by city</span>-->
                      <select name="search_city" class="form-control" >
                      <option value="Search City" disabled selected >Search City</option>
                      <option value="Mumbai">Mumbai</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Pune">Pune</option>
                      <option value="Kolkata">Kolkata</option>
                      <option value="Chennai">Chennai</option>
                      </select>
                      <input type="submit" value="Search"/>
                      </div>
                </div>
            </div>
          
  <?php
/* SEARCH ACCORDING TO city*/
  if(isset($_POST['search_city'])) {
    $search = $_POST['search_city'];
    $search = preg_replace("#[^0-9a-z]i#","", $search);

    $query = mysqli_query($con, "SELECT * FROM `doctors` WHERE city like '%$search%'") or die (mysqli_error($con));
    $count = mysqli_num_rows($query);
    
    if($count == 0){
      $output2 = "There are no doctors available in $search!";
      echo "$output2";
    }else{
      $output1 .= '<div>'. "Doctor/s available in $search is/are:" .'</div>';
      echo "$output1";
      while ($row = mysqli_fetch_array($query)) {
         $fname = $row ['fname'];
         $lname = $row ['lname'];
         $ID = $row ['ID'];
         $output .= '<div>'. $fname. ' '.$lname.'</div>';
         echo '<a href="doctor_profile.php?id='.$ID.'">'. $output.'</a>';
      }
    }
  }
?>
<hr>

          <div class="form-group">
              <!--<label for="name" class="cols-sm-2 control-label">Search Doctor By City</label>-->
                <div class="cols-sm-10">
            LIST OF DOCTORS ADDED BY YOU<br>
            <input type="submit" name="list" value="List">
                    </div>
          </div>
    </form>
        </div>
      </div>
    </div>    
<?php
    $message = "Message";
    $book_appointment = "Book Appointment";
    $delete = "Delete";
    $i= 1;
  if(isset($_POST['list']))
  {
    $query3 = "SELECT doctor_id from doc_pat_relation where patient_id='$patient_id'";
    $result3 = mysqli_query($con,$query3);
    if (!$result3) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
      }
      while ($row = mysqli_fetch_array($result3)){
        $doctor_id = $row ['doctor_id'];
        $query5 = "SELECT * from doctors where ID='$doctor_id'";
        $result5 = mysqli_query($con,$query5);
        if (!$result5) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
        }
          $row = mysqli_fetch_array($result5);
          $fname = $row ['fname'];
          $field = $row ['field'];
          ?>
          <table align="center" border="2px">
          <tr><td>Doctor <?php echo $i ?></td>
        <td> <?php echo $fname; ?></td>
        <td><?php echo '<a href="message.php?d_id='.$doctor_id.'">'.$message.'</a>'; ?></td>
        <td><?php echo '<a href="book_appointment.php?doctor_id='.$doctor_id.'">'.$book_appointment.'</a>'; ?></td>
        <td><?php
        echo '<a href="delete.php?doctor_id='.$doctor_id.'">'.$delete.'</a>';?></td></tr>
        </table> 
        <?php
        $i=$i+1 ;
      }
  }
?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>