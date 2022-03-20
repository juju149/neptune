<?php
require_once '../functions.php';
session_start();
if(isset($_SESSION['user']))
{
   header('Location:index.php');
   die();
}
$pays = getPays($bdd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../style/global.css">
   <link rel="stylesheet" href="../style/auth.css">
   <title>Inscription Neptune</title>
</head>

<body style="height: 100%;">
<?php 
   if(isset($_GET['reg_err']))
   {
      $err = htmlspecialchars($_GET['reg_err']);

      switch($err)
      {
         case 'password':
            ?>
               <div class="alert alert-danger">
                  <strong>Erreur</strong> mot de passe différent
               </div>
            <?php
         break;

         case 'already':
            ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> compte deja existant
                </div>
            <?php
         break;
      }
   }
?>
      <img class="banner" src="../assets/authbanner.svg">

      <form class="formAuth" action="inscription_traitement.php" method="post">
         <h1 style="text-align: center;margin-top: 0" class="text-center">Inscription</h1>
         <div style="display: flex;">
            <select style="width: 70px;" type="text" name="civility" placeholder="Civility">
               <option value="Monsieur">Mr.</option>
               <option value="Madame">M.</option>
               <option value="Mademoiselle">Mme.</option>
            </select>
            <input style="margin: 0 10px;width: 100px" type="text" name="nom" placeholder="Nom" required autocomplete="off" maxlength="100">
            <input style="width: 100px;" type="text" name="prenom" placeholder="Prénom" required autocomplete="off" maxlength="70">
         </div>
         <input type="email" name="email" placeholder="Email" required autocomplete="off" maxlength="200">
         <div>
            <input style="width: 142px;" type="password" name="password" placeholder="Mot de passe" required autocomplete="off">
            <input style="width: 142px;" type="password" name="password_retype" placeholder="Re-tapez le mot de passe" required autocomplete="off">
         </div>
         <input type="text" name="adresse" placeholder="Adresse" required autocomplete="off">
         <div style="display: flex;">
            <select style="width: 100px;" type="text" name="pays_id" placeholder="Pays">
               <?php foreach ($pays as $p) : ?>
                  <option value="<?= $p['id']?>"><?=$p['nom']?></option>
               <?php endforeach; ?>
            </select>
            <input style="margin: 0 10px;width: 100px;" type="text" name="ville" placeholder="Ville" required autocomplete="off">
            <input style="width: 70px;" type="text" name="code_postal" placeholder="Code postal" required autocomplete="off">
         </div>
         <button type="submit" class="buttonSubmit">Inscription</button>
         <div style="font-size: 10px;text-align:center">Tu as déjà un compte ? <a href="./index.php" class="link">Conexion</a></div>  
      </form>  
      
</body>

</html>