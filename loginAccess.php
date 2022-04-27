<?php
   include("config.php");
   session_start();
   $username = mysqli_real_escape_string($db,$_POST['username']);
   $name = mysqli_real_escape_string($db,$_POST['name']);
   $surname = mysqli_real_escape_string($db,$_POST['surname']);
   $email = mysqli_real_escape_string($db,$_POST['email']);     
   $password = mysqli_real_escape_string($db,$_POST['password']);
         if(isset($_POST['login'])) {
                                  // username and password sent from form 
                                       //query to collect info required
            $stmt = $db->prepare("SELECT * FROM user WHERE username=? AND password=? LIMIT 1");
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();
            $stmt->bind_result($username, $password);
            $stmt->store_result();
            if($stmt->num_rows > 0)  //To check if the row exists
               {
               $_SESSION['login_user'] = $username;?>
               <script>window.location.replace("welcome.php");</script><?php
                exit();
               }
            else {
               $error = "Your Login Name or Password is invalid";
               }
          $stmt->close();
      $db->close();
      }

      if(isset($_POST['register'])) {
                                 // username and password sent from form 
      
  
         $sql = "INSERT INTO `user` (`username`, `name`, `surname`, `email`, `password`) VALUES (?,?,?,?,?)";
         $stmt = $db->prepare($sql);
         $stmt->bind_param('sssss', $username, $name, $surname, $email, $password);
         $stmt->execute();
         $stmt->close();
         $db->close();
      }
      

   ?>