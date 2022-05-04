<!-- Page par Jul -->
<?php // Ouverture du PHP
require_once('config.php'); // On lie la page config qui contient la class pour se connecter à la base de données.
require 'class/class-panier.php'; // On lie une page PHP qui contient la class Panier pour son fonctionnement.
$db = new bdd(); // On appelle la class bdd.
$panier = new panier($db); // On appelle la classe panier.
if(isset($_GET['id']))
{
    $produits = $db->query('SELECT `id` FROM `produit` WHERE id=:id', array('id' => $_GET['id']));
    if(empty($produits))
    {
        die("Le produit choisi n'existe pas !"); // Ce message s'affiche si le produit choisi n'existe pas dans la base de données, qui contient également une norme de sécurité (voir + haut)
    }
    $panier->ajouterProduitAuPanier($produits[0]->id);
    die('Le produit sélectionné a bien été ajouté au panier. <a href="javascript:history.back()">Retour en arrière.</a>'); // Message s'affichant quand le produit choisi a bien été ajouté au panier. Nous avons également ajouté un léger code Javascript, en lien pour pouvoir revenir en arrière, via l'historique du navigateur.
}
else
{
    die("Aucun produit n'a été choisi !"); // Message s'affichant si aucun produit n'a été sélectionné.
}