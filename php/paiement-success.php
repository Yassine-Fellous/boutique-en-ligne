<!-- Page par Jul -->
<?php
session_start();
// Section pour les erreurs (logs)
error_reporting(-1); // Montre tous les erreurs
ini_set("display_errors", "1");
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log"); // Fichier du log
// Fin de section
if(!isset($_SESSION['id']))
{
  header('Location:../index.php');
  die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers la page de connexion. ❌
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=../index.php" />
    <link rel="icon" type="image" href="../images/favicon.ico">
    <link rel="stylesheet" href="../css/boutique.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@600&display=swap" rel="stylesheet">
    <title>Paiement réalisé avec succès !</title>
  </head>
  <body>
    <main>
      <div class="logo-zone">
        <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
      </div>
      <div class="connexion-titre-zone">
        <p1 class="connexion-titre">Félicitations, votre paiement à été accepté et enregistré ! Vous allez être redirigé vers l'acceuil dans quelques secondes...</p1>
      </div>
    </main>