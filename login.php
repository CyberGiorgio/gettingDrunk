<?php
   include("config.php");
   require_once("loginAccess.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <script src="js/js.js"></script> 
      <title>Login Page</title>
      <link rel="shortcut icon" href="#">
      <link rel="stylesheet" href="css/style.css">
   </head>
   
   <body bgcolor = "#FFFFFF" onload="sessionKiller()"> <!-- kill the session every time the page is loaded -->
      <div id="boxLogin" align="center">
         <div id="boxBorder">
            <div id="textLogin">
               <p>Login</p>
            </div>
            <div class="formContainer">
               <form method = "post">
                  <label class="text">Username  :</label><input type = "text" id ="email" name="username" class="box"  size="15" required="" /><br /><br />
                  <label class="text">Password  :</label><input type = "password" name = "password" class="box" size="15" required="" /><br/><br />
                  <input type="submit" name="login" onclick ="sessionStored();" value="Log in"/><br />
               </form>
               <div id="textError"><?php echo $error; ?></div>
         </div>
      </div>
   </body>
</html>