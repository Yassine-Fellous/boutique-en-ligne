<!-- Page par Jul -->
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
            <img class="logo-co" src="../images/logo.png">
        </div>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Connectez-vous</p1>
        </div>
        <div class="flex">
          <div class="module-co-zone">
            <div class="formulaire">
              <form method="POST" action="connexion.php">
                <label>
                  <input type="text" name="login" placeholder="Adresse mail ..." required><br /></input>
                </label>
                <label>
                  <input type="password" name="password" placeholder="Mot de passe ..." required><br /></input>
                </label>
                <input class="connexion" type="submit" value="Connexion" name="Connexion"></input>
                <input class="connexion" type="submit" value="S'inscrire"></input><br />
                <p5 class="recuperation"> Mot de passe perdu ?<br />
                 Vous pouvez tenter une <a href="recuperation.php">récupération.</p5></a>
              </form>
            </div>
          </div>
        </div>