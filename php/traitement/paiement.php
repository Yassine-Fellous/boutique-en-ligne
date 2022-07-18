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
  header('Location:../connexion.php');
  die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers la page de connexion. ❌
}
require_once('../config.php'); // On appelle la base de données.
include('../class/class-panier.php');
$db = new bdd(); // On appelle la class bdd.
$panier = new panier($db);
$produits = $db->query('SELECT * FROM `produit` ORDER BY id DESC');
// Pour Stripe
require_once('../../vendor/autoload.php');
$prix = $panier->prixTotal();
if($prix <=0)
{
  header("../erreur-paiement.php");
}
// Instance Stripe
\Stripe\Stripe::setApiKey('sk_test_51KUAgRJcdqGu57WBKfKR5bC4PWbrSqCdFhOz82WDlBSpBaQedtbOcipbzIMunm122C0gwuX1psXLIF9TiFa1PQYP00vRA06fQA'); // Clé secrète
$intention = \Stripe\PaymentIntent::create(['amount' => $prix*100, 'currency' => 'eur']);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Procéder au paiement de vos articles</title>
  </head>
  <body>
    <section>
      <!-- Paiement -->
      <div class="col-lg-5">
        <div class="card bg-primary text-white rounded-3">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h5 class="mb-0">Détails de la carte</h5>
            </div>
            <form method="POST" class="mt-4">
              <div class="form-outline form-white mb-4">
                <form action="traitement/paiement.php" method="POST">
                  <input type="text" id="cardholder-name" class="form-control form-control-lg" placeholder="Elon Musk" required/>
                  <label class="form-label" for="cardholder-name">Titulaire de la carte</label>
                </div>
                <div id="card-elements"></div> <!-- Formulaire des infos de la carte -->
                <div id="card-errors" role="alert"></div> <!-- Erreurs liés à la carte -->
                  <hr class="my-4">
                  <div class="d-flex justify-content-between mb-4">
                    <p class="mb-2">Total</p>
                    <p class="mb-2"><?= number_format($panier->prixTotal(),2,',',' '); ?> €</p>
                  </div>
                  <button name="prix" id="prix" class="btn btn-info btn-block btn-lg">
                    <div class="d-flex justify-content-between">
                      <button id="card-button" type="button" data-secret="<?= $intention['client_secret'] ?>">Payez</button><span>Payer<i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                  </button>
                </form>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Script JavaScript et Stripe -->
      <script src="https://js.stripe.com/v3/"></script>
      <script src="../../js/boutique.js"></script>
  </body>
</html>