<!-- Page par Jul -->
<?php
require_once('config.php'); // On appelle la base de données.
require 'class/class-panier.php'; // On appelle la class Panier.
$db = new bdd();
$panier = new panier();
if(isset($_GET['id']))
{
    $produits = $db->query('SELECT `id` FROM `produit` WHERE id=:id', array('id' => $_GET['id']));
    if(empty($produits))
    {
        die("Le produit choisi n'existe pas !");
    }
    $panier->ajouterProduitAuPanier($produits[0]->id);
    die('Le produit sélectionné a bien été ajouté au panier. <a href="javascript:history.back()">Retour en arrière.</a>');
}
else
{
    die("Aucun produit n'a été choisi !");
}