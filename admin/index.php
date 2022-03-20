<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../style/global.css">
   <link rel="stylesheet" href="../style/auth.css">
   <title>Conexion admin Neptune</title>
</head>
<body>
   <img class="banner" src="../assets/authbanner.svg">
   
   <form action="connexion.php" method="post">
      <h1 style="text-align: center;margin-top: 0" class="text-center">Admin</h1>
      <input type="email" name="email" required="required" placeholder="Email">
      <input type="password" name="password" required="required" placeholder="Mot de passe" autocomplete="off">
      <button type="submit" class="buttonSubmit">Connexion</button>
      <a style="text-align: center;text-decoration: none;color: var(--font-color);" href="./clients.php">Passer l'étape</a>
   </form>
</body>
</html>