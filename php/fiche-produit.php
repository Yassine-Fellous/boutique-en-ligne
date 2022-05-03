<?php
session_start();
require_once('config.php'); // On appelle la base de données.
include('class/autres-fonctions.php');
$db = new bdd();
$id = $_SESSION['id-produit'];
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
           <div class="container">
              <div class="row">
              <?php 
              $user = new Pageproduit;
              $user->ficheProduit($id); 
              ?>
            