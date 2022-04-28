<!-- Page par Jul  -->
<?php
require_once('class/commande-fonction.php'); // On appelle la page de fonctions de commandes.
if(isset($_POST['submit']))
{//echo'ok';
  if(isset($_POST['nom']) AND isset($_POST['description']) AND isset($_POST['prix']) AND isset($_POST['image']))
  {//echo'ok';
    if(!empty($_POST['nom']) AND !empty($_POST['description']) AND !empty($_POST['prix']) AND !empty($_POST['image']))
    {//echo'ok';
      $nom = htmlspecialchars(strip_tags($_POST['nom']));
      //echo'ok';
      $description = htmlspecialchars(strip_tags($_POST['description']));
      //echo'ok';
      $prix = htmlspecialchars(strip_tags($_POST['prix']));
      //echo'ok';
      $image = htmlspecialchars(strip_tags($_POST['image']));
      //echo'ok';
      try
      {
        ajouterArticles($nom, $description, $prix, $image);
        //echo'ok';
      }
      catch(Exception $message)
      {
        $message->getMessage();
      }
    }
  }
}
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
    <title>Ajouter un article - Instagreen Shop</title>
</head>
<body>
    <main>
        <div class="logo-zone">
          <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
        </div>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Ajoutez un article sur le shop</p1>
        </div>
        <div class="flex">
          <div class="module-co-zone">
            <div class="formulaire">
              <form method="POST">
                <label>
                  <input type="text" name="nom" placeholder="Nom de l'article ..." maxlength="100" required><br /></input>
                </label>
                <label>
                  <input type="text" name="description" placeholder="Description ..." required><br /></input>
                </label>
                <label>
                  <input type="text" name="prix" placeholder="Le prix ..." maxlength="3" required><br /></input>
                </label>
                <label>
                  <input type="text" name="image" placeholder="Lien de l'image ..." required><br /></input>
                </label>
                <div class="flex-button">
                  <input class="connexion" type="submit" value="Ajouter" name="submit"></input>
                </div><br />
              </form>
            </div>
          </div>
        </div>
    </main>
  </body>
</html>