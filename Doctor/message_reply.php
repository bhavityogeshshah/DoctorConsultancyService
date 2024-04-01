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
$patient_id = $_GET['patient_id'];
$message_id = $_GET['message_id'];
$subject= $_GET['subject'];
$message = $_GET['message'];
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
  <title>REPLY</title>
  
</head>
<body>
 <div class="container">
      <div class="row main">
        <div class="main-login main-center">
          <form class="" method="post" action="" >
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Subject</label>
              <div class="cols-sm-10">
              <!--  <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  
         <?php echo $subject ?>
                <!--</div>-->
              </div>
            </div>
      
      
      
      
       <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Message</label>
              <div class="cols-sm-10">
               <!-- <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                 
         <?php echo $message ?>
                <!--</div>-->
              </div>
            </div>
      
          <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Date</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
                  <input type="Date" class="form-control" name="date" />
                </div>
              </div>
            </div>
            
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your Message</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <textarea name="your_message" class="form-control" cols="18" rows="15" wrap="soft" placeholder="Enter your message......" required=""></textarea>
                </div>
              </div>
            </div>
          
      
      
      <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Message</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>-->
                  <input type="submit" name="reply" value="Reply">
                </div>
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
      
<?php
$conversation = "Entire conversation";
   if(isset($_POST['reply'])){
    $your_message = $_POST['your_message'];
    $date = $_POST['date'];
    $query = "INSERT into message (subject,message,date,patient_id,doctor_id) VALUES('".$subject."','".$your_message."','".$date."','".$patient_id."','".$doctor_id."')";
  $result = mysqli_query($con,$query);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
    }
  if($result){
    echo "<br>";
    echo "Your message has been sent";
    echo "<br>";
    echo '<a href="conversation.php?doctor_id='.$doctor_id.'& patient_id='.$patient_id.'">'.$conversation.'</a>';
  }
    else{
      echo "<br>";
       echo "Cannot send message";

    }
 }
?>
</body>
</html>
