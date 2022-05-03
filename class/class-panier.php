<!-- Page par Jul -->
<?php
class panier
{
    private $db;
    public function __construct($db)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier'] = array();
        }
        $this->db = $db;
        if(isset($_GET['supprimer-produit']))
        {
            $this->supprimerProduitDuPanier($_GET['supprimer-produit']);
        }
        if(isset($_POST['panier']['quantity']))
        {
            $this->quantity();
        }
    }
    public function quantity()
    {
        foreach($_SESSION['panier'] as $idProduit => $quantity)
        {
            if(isset($_POST['panier']['quantity'][$idProduit]))
            {
                $_SESSION['panier'][$idProduit] = $_POST['panier']['quantity'][$idProduit];
            }
        }
    }
    public function prixTotal()
    {
        $prixTotal = 0;
        $idProduits = array_keys($_SESSION['panier']);
        if(empty($idProduits))
        {
            $produits = array();
        }
        else
        {
            $produits = $this->db->query('SELECT * FROM `produit` WHERE id IN ('.implode(',',$idProduits).')');
        }
        foreach($produits as $produit)
        {
            $prixTotal += $produit->prix * $_SESSION['panier'][$produit->id];
        }
        return $prixTotal;
    }
    public function ajouterProduitAuPanier($idProduit)
    {
        if(isset($_SESSION['panier'][$idProduit]))
        {
            $_SESSION['panier'][$idProduit]++;
        }
        else
        {
            $_SESSION['panier'][$idProduit] = 1;
        }
    }
    public function supprimerProduitDuPanier($idProduit)
    {
        unset($_SESSION['panier'][$idProduit]);
    }
}