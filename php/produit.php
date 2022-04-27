<!-- Page par Sofiane et Jul -->
<?php
require_once('class/commande-fonction.php'); // On appelle la page de fonctions de commandes.
$produits=afficherProduits(); // On appelle la classe pour afficher les produits.
?>
<?php foreach($produits as $produit) : ?> <!-- Une boucle qui permet d'afficher les produits dans la BDD. -->
<section class="product_section layout_padding2-top layout_padding-bottom">
 <div class="container">
  <div class="row">
   <div class="col-sm-6 col-lg-4">
    <div class="box">
     <div class="img-box">
      <img src="<?= $produit->img ?>"/>
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
      <h5 href=""><?= $produit->description ?></a>
      <div class="price_box">
       <h6 class="price_heading"><strong><?= $produit->prix ?> €</h6></strong>
      </div>
     </div>
    </div>
   </div>
</section>
<?php endforeach; ?>