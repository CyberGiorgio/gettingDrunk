<?php $username = mysqli_real_escape_string($db,$_POST['username']);
   $cocktail = mysqli_real_escape_string($db,$_POST['cocktail']);
   $shot = mysqli_real_escape_string($db,$_POST['shot']);
   $beer = mysqli_real_escape_string($db,$_POST['beer']);
   $wine = mysqli_real_escape_string($db,$_POST['wine']);
   $idUser = mysqli_real_escape_string($db,$_POST['idUser']);
   $idDrinks = mysqli_real_escape_string($db,$_POST['idDrinks']);
   $points = mysqli_real_escape_string($db,$_POST['points']);
   $date = mysqli_real_escape_string($db,$_POST['date']);
   $usernameSession = $_SESSION['login_user'];

   $query = "SELECT * FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
   $result = mysqli_query($db, $query);
   if (mysqli_num_rows($result) > 0) 
      {
      while($row = mysqli_fetch_assoc($result)) 
      {
      $pointsLeft = $row['points'] - ($row['cocktail'] + $row['shot'] + $row['beer'] +$row['wine']);
      }
   }

   if(isset($_POST['addCocktail'])){      
      $query = "SELECT cocktail FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
       $pointsLeft = $row['points'] - ($row['cocktail'] + $row['shot'] + $row['beer'] +$row['wine']);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($pointsLeft > 0){
               $pointsLeft --;
               $cocktail = $row['cocktail'] + 1; 
               $sql = "UPDATE `drinks` SET `cocktail` = '$cocktail' WHERE date=CURRENT_DATE AND username='$usernameSession'"; 
               $result = mysqli_query($db,$sql);
            }
            else{
               $error = "Stop Drinking!";
            }
         }
      }
   }
   if(isset($_POST['removeCocktail'])){      
      $query = "SELECT cocktail FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($row['cocktail'] > 0){
               $pointsLeft ++;
               $cocktail = $row['cocktail'] - 1;     
               $sql = "UPDATE `drinks` SET `cocktail` = '$cocktail' WHERE date=CURRENT_DATE AND username='$usernameSession'";  
               $result = mysqli_query($db,$sql);
            }
         }
      }
   }
   if(isset($_POST['addShot'])){      
      $query = "SELECT shot FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($pointsLeft > 0){
            $pointsLeft --;
            $shot = $row['shot'] + 1;     
            $sql = "UPDATE `drinks` SET `shot` = '$shot' WHERE username = '$usernameSession' AND date=CURRENT_DATE ";  
            $result = mysqli_query($db,$sql);
            }
            else{
                $error = "Stop Drinking!";
            }
         }
      }
   }
   if(isset($_POST['removeShot'])){      
      $query = "SELECT shot FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($row['shot'] > 0){
               $pointsLeft ++;
               $shot = $row['shot'] - 1;     
               $sql = "UPDATE `drinks` SET `shot` = '$shot' WHERE username = '$usernameSession' AND date=CURRENT_DATE ";  
               $result = mysqli_query($db,$sql);
            }
         }
      }
   }
   if(isset($_POST['addBeer'])){      
      $query = "SELECT beer FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($pointsLeft > 0){
            $pointsLeft --;
            $beer = $row['beer'] + 1;     
            $sql = "UPDATE `drinks` SET `beer` = '$beer' WHERE username = '$usernameSession' AND date=CURRENT_DATE ";  
            $result = mysqli_query($db,$sql);
            }
            else{
               $error = "Stop Drinking!";
            }
         }
      }
   }
   if(isset($_POST['removeBeer'])){      
      $query = "SELECT beer FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($row['beer'] > 0){
               $pointsLeft ++;
               $beer = $row['beer'] - 1;     
               $sql = "UPDATE `drinks` SET `beer` = '$beer' WHERE username = '$usernameSession' AND date=CURRENT_DATE ";  
               $result = mysqli_query($db,$sql);
            }
         }
      }
   }
   if(isset($_POST['addWine'])){      
      $query = "SELECT wine FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($pointsLeft > 0){
            $pointsLeft --;
            $wine = $row['wine'] + 1;     
            $sql = "UPDATE `drinks` SET `wine` = '$wine' WHERE username = '$usernameSession' AND date=CURRENT_DATE ";  
            $result = mysqli_query($db,$sql);
            }
            else{
               $error = "Stop Drinking!";
            }
         }
      }
   }
   if(isset($_POST['removeWine'])){      
      $query = "SELECT wine FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            if($row['wine'] > 0){
               $pointsLeft ++;
               $wine = $row['wine'] - 1;     
               $sql = "UPDATE `drinks` SET `wine` = '$wine' WHERE username = '$usernameSession' AND date=CURRENT_DATE ";  
               $result = mysqli_query($db,$sql);
            }
         }
      }
   }
   if(isset($_POST['buttonPoints'])){
      $query = "SELECT points FROM drinks WHERE username = '$usernameSession' AND date=CURRENT_DATE ";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
         while($row = mysqli_fetch_assoc($result)) 
         {
            $points = $_POST['inputPoints'];    
            $sql = "UPDATE `drinks` SET `points` = '$points' WHERE username = '$usernameSession' AND date=CURRENT_DATE ";  
            $pointsLeft = $row['points'] - ($row['cocktail'] + $row['shot'] + $row['beer'] +$row['wine']);
            $result = mysqli_query($db,$sql);
         }
      }
   }
   if(isset($_POST['removeRecord'])){      
      $query = "DELETE FROM `drinks` WHERE `idDrinks` = '$idDrinks'";
      $result = mysqli_query($db, $query);
   }
?>