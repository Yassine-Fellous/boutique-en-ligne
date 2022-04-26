<!-- Page par Jul -->
<?php
// Fonction pour ajouter des produits.
function ajouterArticles($nom, $description, $prix, $image)
{
    if(require('../config.php'))
    {
        $request = $access->prepare("INSERT INTO `produit`(`id`, `nom`, `description`, `prix`, `bin`) VALUES ($nom, $description, $prix, $image)");
        $request->execute(array($nom, $description, $prix, $image));
        $request->closeCursor();
    }
}
// La fonction pour afficher les produits.
function afficherProduits()
{
    if(require('php/config.php'))
    {
        $request = $access->prepare("SELECT * FROM `produit` ORDER BY id DESC");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $request->closeCursor();
    }
}
// La fonction pour supprimer des articles
function supprimerArticles($id)
{
    if(require('../config.php'))
    {
        $request = $access->prepare("DELETE FROM `produit` WHERE id=?");
        $request->execute(array($id));
    }
}
?>