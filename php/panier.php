<!-- Page par Jul -->
<?php
require_once('config.php'); // On appelle la base de données.
$db = new bdd(); // On appelle la class bdd.
session_start();
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
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
            <?php
            $idProduits = array_keys($_SESSION['panier']);
            $produits = $db->query('SELECT * FROM `produit` WHERE id IN ('.implode(',',$idProduits).')');
            foreach($produits as $produit):
            ?>
            <div class="container py-5 h-100">
               <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col">
                     <div class="card">
                        <div class="card-body p-4">
                           <div class="row">
                              <div class="col-lg-7">
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
                                             <div style="width: 50px;">
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
                           <div class="card mb-3">
                              <div class="card-body">
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                       <div>
                          <img
                            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img2.webp"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <?php endforeach; ?>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                    </div>

                    <p class="small mb-2">Card type</p>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-visa fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i
                        class="fab fa-cc-amex fa-2x me-2"></i></a>
                    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                    <form class="mt-4">
                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Cardholder's Name" />
                        <label class="form-label" for="typeName">Cardholder's Name</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">Card Number</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Expiration</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">Cvv</label>
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
                        <span>$4818.00</span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
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