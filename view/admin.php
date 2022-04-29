<?php
session_start();
require_once('config.php');
require_once('./controller/admin.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/boutique.css" />
    <title>Panel admin - Instagreen Shop</title>
</head>

<body>
    <main>
        <div class="logo-zone">
            <a href="../index.php"><img class="logo-co" src="../images/logo.png" /></a>
        </div>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Panel admin</p1>
        </div>
        <article class="panel-admin">
            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>e-mails</th>
                            <th>Droits</th>
                            <th>Adresse</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = $users->fetch()) {
                            echo "<tr>
                            <td>" . $data['email'] . "<a href=\"admin.php?delete-user=$data[id]\">Supprimer</a> <a href=\"admin-profil.php?id=$data[id]\">Modifier</a></td>";
                            echo "<td>" . $data['id_droit'] . "</td>";
                            echo "<td>" . $data['adresse'] . "</td>";
                            echo "<td>" . $data['nom'] . "</td>";
                            echo "<td>" . $data['prenom'] . "</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </article>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Faites en d'avantages</p1>
        </div>
        <div class="flex-button">
            <a href="add-produits.php"><input class="connexion" value="Ajouter un produit"></input>
        </div><br />
        <div class="flex-button">
            <a href="delete-produits.php"><input class="connexion" value="Supprimer un produit"></input></a>
        </div><br />