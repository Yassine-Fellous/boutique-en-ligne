<!-- Page par Sofiane et Jul -->

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image" href="images/favicon.ico">
   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Dosis:wght@200&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="../css/boutique.css" />
   <link rel="stylesheet" type="text/css" href="../css/responsive.css" />
   <link rel="stylesheet" type="text/css" href="../css/style.css" />
   <title>Instagreen Shop</title>
</head>
<header class="header-pc">
   <?php
   include("header-index.php");
   ?>
</header>
<header class="header-mobile">
   <?php
   // include("header-index-mobile.php");
   ?>
</header>
<?php
$produits = $db->query('SELECT * FROM `produit` ORDER BY id DESC');
?>
<section class="product_section layout_padding2-top layout_padding-bottom">
   <div class="container">
      <div class="row">
         <?php foreach ($produits as $produit) : ?>
            <!-- Une boucle qui permet d'afficher les produits dans la BDD. -->
            <div class="col-sm-6 col-lg-4">
               <div class="box">
                  <div class="img-box">
                     <img src="../<?= $produit->img ?>" />
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
                     <h5 href=""><?= substr($produit->description, 0, 50); ?>...</a>
                        <div class="price_box">
                           <h6 class="price_heading"><strong><?= number_format($produit->prix, 2, ',', ' '); ?> €</h6></strong>
                        </div>
                        <div class="flex-button">
                           <a href="ajouter-au-panier.php?id=<?= $produit->id; ?>"><button type="button" class="btn btn-secondary" style="margin-top: 30%;">Panier</button></a>
                        </div><br />
                        <div class="flex-button">
                           <a href="fiche-produit.php?id=<?= $produit->id; ?>"><button type="button" class="btn btn-secondary">Voir le produit</button></a>
                        </div><br />
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>