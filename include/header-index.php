<!-- Page par Jul -->
<?php
include('class/class-panier.php');
require_once('config.php'); // On appelle la BDD
$db = new bdd();
$panier = new panier($db);
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
    <title>Instagreen Shop</title>
</head>
<body>
<!-- Header dynamique -->
<?php if(isset($_SESSION['id'])) : ?> <!-- Lorsque la personne est connectée, il verra ces sections dans le header. -->
    <img class="logo-header" src="images/logo.png">
    <div class="barre-de-recherche">
        <input type="search" placeholder="Recherchez ...">
        <div class="search"></div>
    </div>
    <ul class="navigation">
        <li><a href="php/panier.php"><img class="logout" title="Panier" src="images/caddie.png" alt="logo"></img></a>
        <li><a href="php/deconnexion.php"><img class="logout" title="Se déconnecter" src="images/logout.png" alt="logo"></img></a>
        <?php if($_SESSION['id_droit'] == 1337) : ?> <!-- Seul l'admin verra cette section dans le header. 👮 -->
            <li><a href="php/admin.php"><img class="logout" title="Accèdez au panel d'administration" src="images/admin.png" alt="logo"></img></a>
            <?php endif; ?>
    </ul>
    <?php else: ?> <!-- Lorsque la personne est déconnectée, il verra ces 2 sections dans le header. -->
        <img class="logo-header" src="images/logo.png">
        <div class="barre-de-recherche">
            <input type="search" placeholder="Recherchez ...">
            <div class="search"></div>
        </div>
        <ul class="navigation">
            <li><a href="php/connexion.php"><img class="logout" title="Se connecter" src="images/user.png" alt="logo"></img></a>
        </ul>
        <?php endif; ?>