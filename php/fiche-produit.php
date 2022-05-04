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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/boutique.css" />
    <title>Fiche du produit - Instagreen Shop</title>
</head>

<body>
    <header class="header-pc">
        <?php
        include("header-index.php");
        ?>
    </header>
    <header class="header-mobile">
        <?php
        // include("header-index-mobile.php");
        ?>
    </header>
    <main>
        <div class="fiche-produit-zone" style="padding-top: 5%;">
            <div class="fiche-produit">
                <?php foreach ($idProduit as $produit) : ?>
                    <!-- Une boucle qui permet d'afficher les produits dans la BDD. -->
                    <div class="card mb-3">
                        <img class="card-img-top" src="../<?= $produit->img ?>" alt="Card image cap">
                        <div class="card-img-overlay" style="padding: 5rem;">
                            <h5 class="card-title" style="margin-bottom: 0.5rem;font-size: 68px;"><?= $produit->nom ?></h5><br /> <!-- Via cet argument, il va afficher la liste des noms des produits présents dans la BDD. -->
                            <p class="card-text" style="margin-right: 70%;font-size: 24px;"><?= $produit->description ?>...
                            <p><br /> <!-- Via cet argument, il va afficher la liste des descriptions des produits présents dans la BDD. -->
                            <p class="card-text" style="font-size: 21px;"><?= number_format($produit->prix, 2, ',', ' '); ?> €</hp>

                                <a href="ajouter-au-panier.php?id=<?= $produit->id; ?>"><button type="button" class="btn btn-secondary">Ajouter au panier</button></a>

                            <?php endforeach; ?>
                            <!-- Fin de la boucle -->
                        </div>
                    </div>
    </main>
    <footer>
        <div class="footer-links-zone">
            <a class="footer-links" href="produit.php">
                <p5 class="footer-text">Produits</p5>
            </a>
            <a class="footer-links" href="profil.php">
                <p5 class="footer-text">Compte</p5>
            </a>
            <a class="footer-links" href="inscription.php">
                <p5 class="footer-text">Inscription</p5>
            </a>
            <a class="footer-links" href="https://github.com/Yassine-Fellous/boutique-en-ligne">
                <p5 class="footer-text">Code source</p5>
            </a>
            <a class="footer-links" href="#">
                <p5 class="footer-text">Contact</p5>
            </a>
        </div>
        <div class="footer-logo-zone">
            <img class="footer-logo" src="../images/mascotte.png" />
        </div>
    </footer>