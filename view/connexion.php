<!-- Page par Jul et Yassine -->
<?php
session_start(); // On ouvre une session.
require_once('Bdd.php'); // On appelle la base de données.
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="../images/favicon.ico">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Antique+B1&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/boutique.css"/>
    <title>Connexion - Instagreen Shop</title>
</head>
<body>
    <main>
        <div class="logo-zone">
          <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
        </div>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Connectez-vous</p1>
        </div>
        <div class="flex">
          <div class="module-co-zone">
            <div class="formulaire">
              <form method="POST" action="traitement/tconnexion.php">
                <label>
                  <input type="text" name="email" placeholder="Adresse mail ..." maxlength="255" required value="<?php if (isset($_SESSION['email'])) {echo $_SESSION['email']; } ?>"><br /></input>
                </label>
                <label>
                  <input type="password" name="password" placeholder="Mot de passe ..." required><br /></input>
                </label>
                <div class="flex-button">
                  <input class="connexion" type="submit" value="Connexion" name="submit"></input>
                </div><br />
                <?php
                if(isset($_SESSION['fail']))
                {
                  echo "$_SESSION[fail]" . "<br>";
                }
                ?> <!--Affiche la varibale qui contient l'erreur-->
                <p5 class="recuperation">Pas encore membre ?<br />
                Vous pouvez vous <a href="inscription.php">inscrire.</p5></a>
              </form>
            </div>
          </div>
        </div>