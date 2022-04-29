<?php
session_start();
require_once('config.php');
require_once('./controller/admin-profil.php');
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
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <title>Modifier le profil - Instagreen Shop</title>
    </head>
    <body>
        <main>
            <div class="logo-zone">
                <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
            </div>
            <div class="connexion-titre-zone">
                <p1 class="connexion-titre">Modifiez le profil</p1>
            </div>
            <div class="flex">
                <div class="module-co-zone">
                    <div class="formulaire">
                        <form method="POST" action=<?php "admin-profil.php?id=$grabID=$_GET[id]" ?>>
                            <label>
                                <input type="text" name="nom" placeholder="Nom ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="text" name="prenom" placeholder="Prénom ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="text" name="email" placeholder="Mail ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="text" name="adresse" placeholder="Adresse ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="password" name="password" placeholder="Mot de passe ..." required><br /></input>
                            </label>
                            <label>
                                <select name="id_droit" class="deroulant-choix-catego">
                                    <option value="">--Droit à attribuer--</option>
                                    <option value="1">Utilisateur</option>
                                    <option value="42">Modérateur</option>
                                    <option value="1337">Administrateur</option>
                                </select><br />
                            </label>
                            <div class="flex-button">
                                <input class="connexion" type="submit" value="Modifier" name="submit"></input>
                            </div><br />
                        </form>
                    </div>
                </div>
            </div>
            <div class="margin-vide"></div>
        </main>
        <footer>
            <div class="footer-links-zone">
                <a class="footer-links" href="php/produit.php"><p5 class="footer-text">Produits</p5></a>
                <a class="footer-links" href="php/profil.php"><p5 class="footer-text">Compte</p5></a>
                <a class="footer-links" href="php/inscription.php"><p5 class="footer-text">Inscription</p5></a>
                <a class="footer-links" href="https://github.com/Yassine-Fellous/boutique-en-ligne"><p5 class="footer-text">Code source</p5></a>
                <a class="footer-links" href="#"><p5 class="footer-text">Contact</p5></a>
            </div>
            <div class="footer-logo-zone">
                <img class="footer-logo" src="../images/mascotte.png"/>
            </div>
        </footer>
    </body>
</html>