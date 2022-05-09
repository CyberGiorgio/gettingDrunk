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
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&amp;subset=latin,latin-ext'>
      <link rel="stylesheet" href="css/loginStyle.css">
      <link rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   </head>
   
   <body bgcolor = "#FFFFFF" onload="sessionKiller()"> <!-- kill the session every time the page is loaded -->
      <div class="header whiteBackground ">
         <div class="textStyledHome spaceLeft">
             <p class="g">G</p>
         </div>
      </div>

      <div class="materialContainer">
         <div class="box" id="boxLogin"  align="center">
            <div class="title">
               <p>Login</p>
            </div>
            <div class="formContainer">
               <form method = "post">
                 <div class="input">
                      <label class="labelLogin">Username</label>
                      <input for="name" type = "text" id="name" name="username" size="15" required="" >
                      <span class="spin"></span>
                 </div>
                  <div class="input">
                      <label for="pass" class="labelLogin">Password</label>
                      <input type = "password" id="pass" name="password" size="15" required="" />
                         <span class="spin"></span>
                  </div>
                  <div>
                     <div class="button login" >
                        <button align="center" type="submit" name="login" onclick ="sessionStored();" value="Log in"> Log in </button>
                           <!-- store session every time the button is clicked if user is verified -->
                     </div>
                     <div class="button login">
                           <button type="button" value="Register"  onclick="hide('boxLogin'), show('boxRegister');"> Register</button>
                     </div>
                  </div>
               </form>
               <div class="textError"><?php echo $error; ?></div>   <!-- error message -->
            </div>
         </div>
   
         <div class="box" id="boxRegister"  align="center" style="display: none;">
            <div class="title">
               <p>Register</p>
            </div>
            <div class="formContainer">
               <form method = "post" action="login.php">
                  <div class="input">
                     <label class="labelLogin">Username</label><input class="regist" type = "text" name="username" class="box"  size="15" required="" /><span class="spin"></span>
                  </div>
                  <div class="input">
                     <label class="labelLogin">Name</label><input class="regist" type = "text" name = "name" class="box" size="15" required="" /><span class="spin"></span>
                  </div>
                  <div class="input">
                     <label class="labelLogin">Surname</label><input class="regist" type = "text" name = "surname" class="box" size="15" required="" /><span class="spin"></span>
                  </div>
                  <div class="input">
                     <label class="labelLogin">Password</label><input class="regist" type = "password" name = "password" class="box" size="15" required="" /><span class="spin"></span>
                  </div>
                  <div class="input">
                     <label class="labelLogin">Email</label><input class="regist" type = "email" name = "email" class="box" size="15" required="" /><span class="spin"></span>
                  </div>
                  <div>
                     <div class="button login" >
                        <button type="submit" name="register" value="Register">Register</button>  <!-- hide the other container -->
                     </div>
                     <div class="button login" >
                        <button type="button"  onclick="hide('boxRegister'), show('boxLogin');"> Back to Log in </button>
                     </div>
                   </div>
               </form>
               <div class="textError"><?php echo $error; ?></div>    <!-- error message -->
            </div>
         </div>
      </div><br>
   </div>
      <div class="header whiteBackground footer">
         <div class="textStyledHome spaceRight"> 
            <p class="g">&copy; ginux Co.</p>     
         </div>
      </div>
   </body>
</html>