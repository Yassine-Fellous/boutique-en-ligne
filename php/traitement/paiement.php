<?php
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
if(isset($_POST['prix']) && !empty($_POST['prix']))
{
    require_once('../../vendor/autoload.php');
    $prix = (float)$_POST['prix'];
    // Instance Stripe
    \Stripe\Stripe::setApiKey('sk_test_51KUAgRJcdqGu57WBKfKR5bC4PWbrSqCdFhOz82WDlBSpBaQedtbOcipbzIMunm122C0gwuX1psXLIF9TiFa1PQYP00vRA06fQA'); // Clé secrète
    $intention = \Stripe\PaymentIntent::create(['amount' => $prix*100, 'currency' => 'eur']);
}
else
{
    header('location: ../../index.php');
}
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
            <p class="small mb-2">Type de cartes acceptés :</p>
            <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
            <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
            <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
            <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>
            <form class="mt-4">
              <div class="form-outline form-white mb-4">
                <form action="traitement/paiement.php" method="POST" id="formulaire_paiement">
                  <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Elon Musk" required/>
                  <label class="form-label" for="typeName">Nom sur la carte</label>
                </div>
                <div class="form-outline form-white mb-4">
                  <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" data-stripe="number" required/>
                  <label class="form-label" for="typeText">Numéro de carte bancaire</label>
                </div>
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="form-outline form-white">
                      <input type="text" id="typeYear" class="form-control form-control-lg" placeholder="MM" size="7" id="exp" minlength="2" maxlength="2" data-stripe="exp_month" required/>
                      <label class="form-label" for="typeExp">Mois d'expiration</label>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <div class="form-outline form-white">
                        <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="202x" size="7" id="exp" minlength="4" maxlength="4" data-stripe="exp_year" required/>
                        <label class="form-label" for="typeExp">Année d'expiration</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-outline form-white">
                        <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" data-stripe="cvc" required/>
                        <label class="form-label" for="typeText">CVV</label>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <div class="d-flex justify-content-between mb-4">
                    <p class="mb-2">Total</p>
                    <p class="mb-2"><?= number_format($panier->prixTotal(),2,',',' '); ?> €</p>
                  </div>
                  <button name="prix" id="prix" class="btn btn-info btn-block btn-lg">
                    <div class="d-flex justify-content-between">
                      <span>Payer<i class="fas fa-long-arrow-alt-right"></i></span>
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