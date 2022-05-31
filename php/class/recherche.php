<!-- Page par Yassine et Jul -->
<?php
require_once('../config.php'); // On appelle la BDD
$db = new bdd();
class Recherche extends bdd
{
    public function Recherche($_recherche)
    {
        $produits = $db->query('SELECT `nom` FROM `produit` ORDER BY id DESC');
        if(isset($_recherche) && !empty($_recherche))
        {
            $recherche = htmlspecialchars($_recherche);
            $produits = $db->query('SELECT nom FROM produit LIKE "%'.$recherche.'%" ORDER BY id DESC');
            if($produits->rowCount() == 0)
            {
                $produits = $db->query('SELECT nom FROM produit WHERE CONCAT(nom, description) LIKE "%'.$recherche.'%" ORDER BY id DESC');
            }
        }
    }
}
?>