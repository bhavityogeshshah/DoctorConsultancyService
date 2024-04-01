<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: doctor_login.php");
   }
?>

