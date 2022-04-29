<?php
session_start();
require_once('config.php');
require_once('./controller/delete-produit.php');
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
    <link rel="stylesheet" type="text/css" href="../css/boutique.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Supprimer un produit - Instagreen Shop</title>
</head>

<body>
    <main>
        <div class="logo-zone">
            <a href="../index.php"><img class="logo-co" src="../images/logo.png" /></a>
        </div>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Supprimer un article sur le shop</p1>
        </div>
        <div class="flex">
            <div class="module-co-zone">
                <div class="formulaire">
                    <form method="POST">
                        <label>
                            <input type="text" name="id_produit" placeholder="ID du produit ..." maxlength="2" required><br /></input>
                        </label>
                        <div class="flex-button">
                            <input class="connexion" type="submit" value="Supprimer" name="submit"></input>
                        </div><br />
                    </form>
                </div>
            </div>
        </div>
        <section class="product_section layout_padding2-top layout_padding-bottom">
            <div class="container">
                <div class="row">
                    <?php foreach ($produits as $produit) : ?>
                        <!-- Une boucle qui permet d'afficher les produits dans la BDD. -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div class="img-box">
                                    <img src="<?= $produit->img ?>" />
                                </div>
                                <div class="detail-box">
                                    <span class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                    </span>
                                    <a href=""><?= $produit->nom ?></a><br />
                                    <div class="price_box">
                                        <h6 class="price_heading"><strong>ID : <?= $produit->id ?></h6></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</body>

</html>