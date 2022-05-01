<?php
class panier
{
    function __construct()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier'] = array();
        }
    }
    public function ajouterProduitAuPanier($idProduit)
    {
        $_SESSION['panier'][$idProduit] = 1;
    }
}