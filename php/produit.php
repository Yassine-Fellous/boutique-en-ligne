<!-- Page par Sofiane et Jul -->
<?php
require_once('class/commande-fonction.php'); // On appelle la page de fonctions de commandes.
$produits=afficherProduits(); // On appelle la classe pour afficher les produits.
?>
<section class="product_section layout_padding2-top layout_padding-bottom">
   <div class="container">
      <div class="row">
         <?php foreach($produits as $produit) : ?> <!-- Une boucle qui permet d'afficher les produits dans la BDD. -->
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
                     <h5 href=""><?= substr($produit->description, 0, 50); ?>...</a>
                     <div class="price_box">
                        <h6 class="price_heading"><strong><?= number_format($produit->prix,2,',',' '); ?> €</h6></strong>
                     </div>
                     <div class="flex-button">
                        <a href="ajouter-au-panier.php?id=<?= $produit->id; ?>"><input class="connexion" type="submit" value="Ajouter au panier" name="submit"></input></a>
                     </div><br />
                     <div class="flex-button">
                        <input class="connexion" type="submit" value="Voir le produit" name="submit"></input>
                     </div><br />
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>