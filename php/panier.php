<!-- Page par Jul -->
<?php
require_once('config.php'); // On appelle la base de données.
include('class/class-panier.php');
$db = new bdd(); // On appelle la class bdd.
$panier = new panier();
$produits = $db->query('SELECT * FROM `produit` ORDER BY id DESC');
// Pour supprimer un produit du panier
if(isset($_GET['supprimer-produit']))
{
  $panier->supprimerProduitDuPanier($_GET['supprimer-produit']);
}
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
          <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
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
                                             <h5 class="fw-normal mb-0">2</h5>
                                          </div>
                                          <div style="width: 80px;">
                                          <!-- Prix -->
                                          <h5 class="mb-0"><?= number_format($produit->prix,2,',',' '); ?> €</h5>
                                       </div>
                                       <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
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
                                  <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Elon Musk" />
                                  <label class="form-label" for="typeName">Nom sur la carte</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                  <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                  placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                  <label class="form-label" for="typeText">Numéro de carte bancaire</label>
                                </div>
                                <div class="row mb-4">
                                  <div class="col-md-6">
                                    <div class="form-outline form-white">
                                      <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/AA" size="7" id="exp" minlength="7" maxlength="7" />
                                      <label class="form-label" for="typeExp">Expiration</label>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-outline form-white">
                                      <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                      <label class="form-label" for="typeText">CVV</label>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <hr class="my-4">
                              <div class="d-flex justify-content-between">
                                <p class="mb-2">Subtotal</p>
                                <p class="mb-2">$4798.00</p>
                              </div>
                              <div class="d-flex justify-content-between">
                                <p class="mb-2">Shipping</p>
                                <p class="mb-2">$20.00</p>
                              </div>
                              <div class="d-flex justify-content-between mb-4">
                                <p class="mb-2">Total</p>
                                <p class="mb-2">$4818.00</p>
                              </div>
                              <button type="button" class="btn btn-info btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                  <span>Payer <i class="fas fa-long-arrow-alt-right"></i></span>
                                </div>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>