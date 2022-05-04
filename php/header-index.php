<!-- Page par Jul -->
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Dosis:wght@200&display=swap" rel="stylesheet">
<?php
require_once('config.php'); // On appelle la BDD
$db = new bdd();
include('class/class-panier.php');
$panier = new panier($db);
?>
<!-- Header dynamique -->
<?php if (isset($_SESSION['id'])) : ?>
    <!-- Lorsque la personne est connectée -->
    <nav class="navbar navbar-expand-lg navbar" style="background-color: #81a978;padding: 2.5rem 1rem;">
        <a class=" navbar-brand" style="color: white;" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="margin-left: 73%;" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" style="color: white;" href="produits.php">Produit</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" style="color: white;" href="panier.php">Panier</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" style="color: white;" href="deconnexion.php">Déconnexion</a>
                </li>
            </ul>
        </div>
        <?php if ($_SESSION['id_droit'] == 1337) : ?>
            <!-- Seul l'admin verra cette section dans le header. 👮 -->
            <li><a href="admin.php"><img class="logout" title="Accèdez au panel d'administration" src="images/admin.png" alt="logo"></img></a>
            <?php endif; ?>
            </ul>
        <?php else : ?>
            <!-- Lorsque la personne est déconnectée -->
            <nav class="navbar navbar-expand-lg navbar" style="background-color: #81a978;padding: 2.5rem 1rem;">
                <a class="navbar-brand" style="color: white;" href="index.php">Accueil</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="margin-left: 73%;" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" style="color: white;" href="produits.php">Produit</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" style="color: white;" href="panier.php">Panier</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" style="color: white;" href="connexion.php">Connexion</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" style="color: white;" href="inscription.php">Inscription</a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>