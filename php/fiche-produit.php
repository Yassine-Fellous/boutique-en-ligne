<!-- Page par Jul -->
<?php
session_start();
require_once('config.php'); // On appelle la base de données.
$db = new bdd();
$idProduit = $_GET['id']; // Il va récupérer l'ID du produit sélectionné.
$idProduit = $db->query("SELECT * FROM `produit` WHERE id = '$idProduit'"); // J'affiche tous les produits, mais seulement celui qu'on a choisi, donc par l'ID.
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
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/boutique.css"/>
    <title>Fiche du produit - Instagreen Shop</title>
</head>
<body>
    <header class="header-pc">
        <?php
        include ("header-index2.php");
        ?>
    </header>
    <header class="header-mobile">
        <?php
        include ("header-index-mobile2.php");
        ?>
    </header>
    <main>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Fiche produit</p1>
        </div>
            <div class="fiche-produit-zone">
                <div class="fiche-produit">
                    <?php foreach($idProduit as $produit) : ?> <!-- Une boucle qui permet d'afficher les produits dans la BDD. -->
                        <h2 class="nom-fiche-produit"><?= $produit->nom ?></a><br /> <!-- Via cet argument, il va afficher la liste des noms des produits présents dans la BDD. -->
                        <img class="image-produit" src="../<?= $produit->img ?>"/>
                        <h4 class="description-produit"><?= $produit->description ?>...</h4><br /> <!-- Via cet argument, il va afficher la liste des descriptions des produits présents dans la BDD. -->
                        <h6 class="prix-fiche-produit"><strong><?= number_format($produit->prix,2,',',' '); ?> €</h6></strong>
                        <div class="flex-button">
                            <a href="ajouter-au-panier.php?id=<?= $produit->id; ?>"><input class="connexion" type="submit" value="Ajouter au panier" name="panier"></input></a>
                        </div><br />
                    <?php endforeach; ?> <!-- Fin de la boucle -->
                </div>
            </div>
            <div class="margin-vide"></div>
        </main>
        <footer>
            <div class="footer-links-zone">
                <a class="footer-links" href="produit.php"><p5 class="footer-text">Produits</p5></a>
                <a class="footer-links" href="profil.php"><p5 class="footer-text">Compte</p5></a>
                <a class="footer-links" href="inscription.php"><p5 class="footer-text">Inscription</p5></a>
                <a class="footer-links" href="https://github.com/Yassine-Fellous/boutique-en-ligne"><p5 class="footer-text">Code source</p5></a>
                <a class="footer-links" href="#"><p5 class="footer-text">Contact</p5></a>
            </div>
            <div class="footer-logo-zone">
                <img class="footer-logo" src="../images/mascotte.png"/>
            </div>
        </footer>