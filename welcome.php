<?php
   include('session.php');
   include('logicWelcome.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Welcome</title>
      <link rel="shortcut icon" href="#">
      <link rel="stylesheet" href="css/style.css">
      <script type="text/javascript" src="js/js.js"></script> 
      <script type="text/javascript">
         function hide(id){
             document.getElementById(id).style.display = 'none';
         }
         function show(id){
             document.getElementById(id).style.display = 'block';
         }
      </script>
   </head>
   <body>
      <?php 
         $usernameSession = $_SESSION['login_user'];
         $query = "SELECT username FROM user WHERE username = '$usernameSession'";
         $result = mysqli_query($db, $query);
         if(mysqli_num_rows($result) == 1){ 
            echo "<div id='welcome'>
                     <p>Welcome $usernameSession </p>
                  </div>" ;?>
         <div align="center">
            <div>
               <button onclick="hide('recordsTable'), show('drinksTables');">Home</button> <button onclick="show('recordsTable'), hide('drinksTables');">Records</button> 
            </div>
         </div>
         <div id="drinksTables">            
            <table class="container" align="center" >
                <?php
                    $query = "SELECT * FROM drinks WHERE date=CURRENT_DATE AND username = '$usernameSession'";
                    $result = mysqli_query($db, $query);
                     if (mysqli_num_rows($result) == 0) 
                        {
                           $query="INSERT INTO `drinks` (`idDrinks`, `cocktail`, `shot`, `beer`, `wine`, `date`, `username`, `points`) VALUES (NULL, '0', '0', '0', '0', CURRENT_DATE, '$usernameSession', '0')";
                           $result = mysqli_query($db, $query);
                        } else{
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                     ?>
               <form method="post">
                  <div>
                     <tr>
                        <div class="item" ><td><p>Cocktails</p></td><td><p id="textCocktail"><?php echo $row['cocktail'] ?> </p></td><td><input type="submit" name="addCocktail" class="item" value="+1"></input></div></td> <td><input type="submit" value="-1" name="removeCocktail" class="item"></input></div></td>
                     </tr>
                     <tr>
                        <div class="item" ><td><p>Shots</p></td><td><p id="textShot" ><?php echo $row['shot'] ?></p></td><td><input type="submit" class="item" name="addShot" value="+1"></input></div></td> <td><input type="submit" value="-1"  name="removeShot"class="item"></input></div></td>
                     </tr>
                     <tr>
                        <div class="item" ><td><p>Beers</p></td><td><p id="textBeer"> <?php echo $row['beer'] ?></p></td><td><input type="submit" class="item" name="addBeer" value="+1"></input></div></td> <td><input type="submit" name="removeBeer" value="-1" class="item"></input></div></td>
                     </tr>
                     <tr>
                        <div class="item" ><td><p>Wine</p></td><td><p id="textWine"> <?php echo $row['wine'] ?></p></td><td><input type="submit" class="item" name="addWine" value="+1"></input></div></td> <td><input type="submit" name="removeWine" value="-1" class="item"></input></div></td>
                     </tr>
                  </div>
               </form>
            </table >
             <div class="item">
               <p align="center">Points left :</p><p id="pointsLeft" align="center"><?php echo  $pointsLeft ?></p>
            </div>
            <div class="item">
               <p id="erorr" align="center"><?php echo $error; ?></p>
            </div>
  
            <table class="container" align="center">
               <form method="post">
                  <div >
                     <tr>
                        <td>
                           <div class="item" ><p>Set Maximum points: <?php echo $row['points'] ?></p>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="inputButtonContainer">
                               <input class="item" type="number" min="0" name="inputPoints" size="15" placeholder="Insert max points">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="item"><input class="item" type="submit" name="buttonPoints" value="Go!"/>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="item"><input class="item" type="submit" name="endSession" value="End Session"/>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div class="item right">
                              <a class="item right" href="login.php" value="Log out">
                                Log out
                             </a>
                          </div>
                        </td>
                     </tr>
                  </div>
               </form>
             <?php 
            }
         } 
      ?>
            </table>
         </div>
     
     <div id="recordsTable"  align="center"  style="display: none;"> 
     <table width="40%" class="container" >
         <tr>
           <th><label>Date</label></th>
           <th><label>Cocktails</label></th>
           <th><label>Shots</label></th>
           <th><label>Beers</label></th>
           <th><label>Wine</label> </th>
           <th><label>Points</label> </th>
        </tr>
         <?php
          $query = "SELECT * FROM drinks";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) > 0) 
             {
               while($row = mysqli_fetch_assoc($result)) 
             {
         ?>
         <form method="post">
          <tr>
            <td class="item" ><p id="textDate"><?php echo $row['date'] ?> </p></td>
            <td class="item" ><p id="textCocktail"><?php echo $row['cocktail'] ?> </p></td>
            <td class="item" ><p id="textShot"><?php echo $row['shot'] ?> </p></td>
            <td class="item" ><p id="textBeer"><?php echo $row['beer'] ?> </p></td>
            <td class="item" ><p id="textWine"><?php echo $row['wine'] ?> </p></td>
            <td class="item" ><p id="textPoints"><?php echo $row['points'] ?> </p></td>
            <td class="item">
               <input type="hidden" name="idDrinks" value="<?php echo $row['idDrinks'] ?>" >
               <input name="removeRecord" type="submit" value="Remove" >
            </td>
         </tr>
      </form>
  
            <?php 
            }
         } else {
            echo "No records yet, start drinking!";
         }
      };?>
          </table >
      </div>      
   </body>
</html>