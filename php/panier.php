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
  header('Location:connexion.php');
  die(); // Inaccesibilité en cas de session absente ou fausse. Redirection vers la page de connexion. ❌
}
require_once('config.php'); // On appelle la base de données.
include('class/class-panier.php');
$db = new bdd(); // On appelle la class bdd.
$panier = new panier($db);
$produits = $db->query('SELECT * FROM `produit` ORDER BY id DESC');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/boutique.css"/>
    <link rel="stylesheet" type="text/css" href="../css/responsive.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <title>Votre panier - Instagreen Shop</title>
  </head>
  <body>
    <main>
      <div class="logo-zone">
        <a href="../index.php"><img class="logo-co" alt="Logo Instagreen" src="../images/logo.png"/></a>
      </div>
      <div class="connexion-titre-zone">
        <p1 class="connexion-titre">Votre panier</p1>
      </div>
      <section>
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card">
                <div class="card-body p-4">
                  <div class="row">
                    <div class="col-lg-7">
                      <?php
                      $idProduits = array_keys($_SESSION['panier']);
                      // Pour accéder au panier vide sans erreur.
                      if(empty($idProduits))
                      {
                        $produits = array();
                      }
                      else // Sinon ça fonctionne normalement
                      {
                        $produits = $db->query('SELECT * FROM `produit` WHERE id IN ('.implode(',',$idProduits).')');
                      }
                      foreach($produits as $produit): // Une boucle est crée pour afficher le nom, image, description et prix des produits via la base de données (mais surtout choisi dans le panier)
                      ?>
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <!-- Image du produit -->
                              <div>
                                <img src="../<?= $produit->img ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;"/>
                              </div>
                              <div class="ms-3">
                                <!-- Nom du produit -->
                                <h5><?= $produit->nom ?></h5>
                                <!-- Description -->
                                <p class="small mb-0"><?= substr($produit->description, 0, 40); ?>...</p>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <a href="panier.php?supprimer-produit=<?= $produit->id; ?>"><img class="poubelle-panier" src="../images/trash.png"/></a>
                              <div style="width: 50px;">
                              <!-- Quantité -->
                              <span><input type="text" name="panier[quantity][<?= $produit->id; ?>]" value="<?= $_SESSION['panier'][$produit->id]; ?>"></span>
                            </div>
                            <div style="width: 80px;">
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input class="connexion" type="submit" alt="Ajout de la quantité du produit" value="Ajouter la quantité">
                  <?php endforeach; ?> <!-- Fin de la boucle -->
                  <hr class="my-4">
                  <div class="d-flex justify-content-between mb-4">
                    <p class="mb-2">Total</p>
                    <form method="POST" action="traitement/paiement.php">
                      <p class="mb-2" type="text" name="prix" id="prix" alt="Prix indiqué"><?= number_format($panier->prixTotal(),2,',',' '); ?> €</p>
                    </div>
                    <button class="btn btn-info btn-block btn-lg">Payer</button>
                  </form>
                    <div class="d-flex justify-content-between">
                      <a href="traitement/paiement.php"><button alt="Boutton pour payer">Procéder au paiement<i class="fas fa-long-arrow-alt-right"></i></button></a>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>