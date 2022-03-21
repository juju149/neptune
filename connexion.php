<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../style/global.css">
   <link rel="stylesheet" href="../style/auth.css">
   <title>Conexion Neptune</title>
</head>
<body>
<?php 
   if(isset($_GET['login_err']))
   {
      $err = htmlspecialchars($_GET['login_err']);

      switch($err)
      {
         case 'password':
            ?>
               <div class="alert alert-danger">
                  Mot de passe ou mail incorrecte
               </div>
            <?php
         break;

         case 'email':
            ?>
               <div class="alert alert-danger">
                  Email invalide
               </div>
            <?php
         break;

         case 'notregistered':
            ?>
                <div class="alert alert-danger">
                    Le compte n'existe pas
                </div>
            <?php
         break;
      }
   }
?>
   <img class="banner" src="../assets/authbanner.svg">
   
   <form action="connexion_traitement.php" method="post">
      <h1 style="text-align: center;margin-top: 0" class="text-center">Conexion</h1>
      <input type="email" name="email" required="required" placeholder="Email">
      <input type="password" name="password" required="required" placeholder="Mot de passe" autocomplete="off">
      <button type="submit" class="buttonSubmit">Connexion</button>
      <div style="font-size: 10px;text-align:center">Tu n'as pas de compte ? <a href="./inscription.php" class="link">Inscription</a></div>
   </form>
</body>
</html>