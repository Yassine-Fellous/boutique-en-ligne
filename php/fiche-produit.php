<?php
session_start();
require_once('config.php'); // On appelle la base de données.
$db = new bdd();
$idProduit=$_GET['id']; // Il va récupérer l'utilisateur sélectionné.
$idProduit = $db->query("SELECT * FROM `produit` WHERE id = '$idProduit'"); // Je sélectionne les membres.
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
    <title>Fiche du produit - Instagreen Shop</title>
</head>
<body>
    <main>
        <div class="logo-zone">
          <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
        </div>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Fiche produit</p1>
        </div>
        <section>
        <?php foreach($idProduit as $produit) : ?> <!-- Une boucle qui permet d'afficher les produits dans la BDD. -->
           <div class="container">
           <div class="col-sm-6 col-lg-4">
               <div class="box">
                  <div class="img-box">
                     <img src="<?= $produit->img ?>"/>
                  </div>
                  <div class="detail-box">
                     <span class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                     </span>
                     <a href=""><?= $produit->nom ?></a><br /> <!-- Via cet argument, il va afficher la liste des noms des produits présents dans la BDD. -->
                     <h5 href=""><?= substr($produit->description, 0, 50); ?>...</a> <!-- Via cet argument, il va afficher la liste des descriptions des produits présents dans la BDD. La limite de caractère est appliquée à 50 caractères. -->
                     <div class="price_box">
                        <h6 class="price_heading"><strong><?= number_format($produit->prix,2,',',' '); ?> €</h6></strong>
                     </div>
                     <div class="flex-button">
                        <a href="php/ajouter-au-panier.php?id=<?= $produit->id; ?>"><input class="connexion" type="submit" value="Ajouter au panier" name="panier"></input></a>
                     </div><br />
                     <div class="flex-button">
                        <a href="php/fiche-produit.php?id=<?= $produit->id; ?>"><input class="connexion" type="submit" value="Voir le produit" name="submit"></input></a>
                     </div><br />
                  </div>
               </div>
            </div>
         <?php endforeach; ?> <!-- Fin de la boucle -->
      </div>
   </div>
</section>