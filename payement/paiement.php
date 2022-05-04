<?php
require_once('config.php'); // On appelle la base de données.
include('class/class-panier.php');
$db = new bdd(); // On appelle la class bdd.
$panier = new panier($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Antique+B1&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/boutique.css" />
    <link rel="stylesheet" type="text/css" href="../css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Document</title>
</head>
<body>
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
                <form class="mt-4" method="$_POST" action="tpaiement.php">
                    <div class="form-outline form-white mb-4">
                        <input type="text" name="nomcarte" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Elon Musk" />
                        <label class="form-label" for="typeName">Nom sur la carte</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input type="text" name="numcarte" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">Numéro de carte bancaire</label>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-outline form-white">
                                <input type="text" id="typeExp" name="exp" class="form-control form-control-lg" placeholder="MM/AA" size="7" id="exp" minlength="7" maxlength="7" />
                                <label class="form-label" for="typeExp">Expiration</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline form-white">
                                <input type="password" id="typeText" name="cvv" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                <label class="form-label" for="typeText">CVV</label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between mb-4">
                        <p class="mb-2">Total</p>
                        <p class="mb-2"><?= number_format($panier->prixTotal(), 2, ',', ' '); ?> €</p>
                    </div>
                    <button type="button" class="btn btn-info btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                            <input type="button" value="Payer" class="fas fa-long-arrow-alt-right" name="submit">
                </form>
            </div>
            </button>
        </div>
    </div>
    </div>
</body>

</html>