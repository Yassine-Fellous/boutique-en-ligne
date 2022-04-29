<!-- Page par Jul -->
<?php
class panier // La classe pour le panier
{
    public function __construct() // La fonction qui va permettre de vérifier si une session existe, elle va permettre se faire fonctionner le panier, de retenir le produit ajouté par la session actuelle.
    {
        if(!isset($_SESSION));
        {
            session_start();
        }
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier'] = array(); // Permet de créer un panier vide.
        }
    }
}