<!-- Page par Jul -->
<?php
// Fonction pour ajouter des produits.
function ajouterArticles($nom, $description, $prix, $image)
{
    if(require('../config.php')) // On appelle la base de données.
    {
        $request = $db->prepare("INSERT INTO `produit`(`id`, `nom`, `description`, `prix`, `bin`) VALUES ($nom, $description, $prix, $image)");
        $request->execute(array($nom, $description, $prix, $image));
        $request->closeCursor(); // On ferme le curseur.
    }
}
// La fonction pour afficher les produits.
function afficherProduits()
{
    if(require('php/config.php')) // On appelle la base de données.
    {
        $request = $db->prepare("SELECT * FROM `produit` ORDER BY id DESC");
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $request->closeCursor(); // On ferme le curseur.
    }
}
// La fonction pour supprimer des articles
function supprimerArticles($id)
{
    if(require('../config.php')) // On appelle la base de données.
    {
        $request = $db->prepare("DELETE FROM `produit` WHERE id=?");
        $request->execute(array($id));
        $request->closeCursor(); // On ferme le curseur.
    }
}
?>