<?php
   include('config.php');
   $username = mysqli_real_escape_string($db,$_POST['username']);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Welcome </title>
      <link rel="shortcut icon" href="#">   
      <style type="text/css" src="css/style.css"></style> 
   </head>
   <body>
      <?php 
         $usernameSession = $_SESSION['email'];
         $query = "SELECT username FROM user WHERE username = '$usernameSession'";
         $result = mysqli_query($db, $query);
           if(mysqli_num_rows($result) == 1){
           echo "<h1>Welcome $usernameSession </h1>" ;
         
        };?>
        
   </body>
</html>