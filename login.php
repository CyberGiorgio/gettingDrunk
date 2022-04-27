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
      <div class="boxLogin" id="boxLogin" align="center">
         <div id="boxBorderLogin">
            <div class="textLogin">
               <p>Login</p>
            </div>
            <div class="formContainer">
               <form method = "post">
                  <label class="text">Username  :</label><input type = "text" id ="user" name="username" class="box"  size="15" required="" /><br />
                  <label class="text">Password  :</label><input type = "password" name = "password" class="box" size="15" required="" /><br/>
                  <input type="submit" name="login" onclick ="sessionStored();" value="Log in"/><br /> <!-- store session every time the button is clicked if user is verified -->
                  <button type="button" onclick="hide('boxLogin'), show('boxRegister');"> Register </button>
               </form>
            <div class="textError"><?php echo $error; ?></div>   <!-- error message -->
         </div>
      </div>
   </div>
     
      <div class="boxRegister" id="boxRegister" align="center" style="display: none;">
         <div id="boxBorderRegister">
            <div class="textLogin">
               <p>Register</p>
            </div>
            <div class="formContainer">
               <form method = "post" action="login.php">
                  <label class="text">Username  :</label><input type = "text" name="username" class="box"  size="15" required="" /><br />
                   <label class="text">Name  :</label><br><input type = "text" name = "name" class="box" size="15" required="" /><br/>
                  <label class="text">Surname  :</label><br><input type = "text" name = "surname" class="box" size="15" required="" /><br/>
                  <label class="text">Password  :</label><input type = "password" name = "password" class="box" size="15" required="" /><br/>
                  <label class="text">Email  :</label><br><input type = "email" name = "email" class="box" size="15" required="" /><br/>
                  <input type="submit" name="register" value="Register"/><br />  <!-- hide the other container -->
                  <button type="button" onclick="hide('boxRegister'), show('boxLogin'), hideError('textError');"> Back to Log in </button>
               </form>
               <div class="textError"><?php echo $error; ?></div>    <!-- error message -->
            </div>
         </div>
      </div>
   </body>
</html>