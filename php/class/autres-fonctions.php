<?
require '../config.php';
class Pageproduit extends bdd
{
    private $db;
    public function ficheProduit($id)
{
    $db = $this->db;
    $request = $db->prepare("SELECT * FROM `produit` WHERE id='$id'");
    $request->execute();
    $resultat = $request->fetchall();
    foreach ($resultat as $key)
    {
        $description = $key['description'];
        $prix = number_format($key['prix'],2,',',' ');
        $nom = $key['nom'];
        $image = $key['img'];
        $id2= $key['id'];
            
        echo "<section class = 'case_produit_back'>
                <div class = 'img'>
                    <img class = 'image' src = 'images-boutique/$image'>
                </div>
                <div class = 'titre2'>
                    <h3 class = 'titre_product'>$nom</h3>
                    <div class = 'description'>
                        $description
                    </div>
                    <p class ='didi'>$prix €</p>
                    <a href='addpanier.php?id=$id2'>
                    <input type='submit' class ='add' value ='Ajouter au panier'>
                    </a>
                </div>
                </section>";
        }
    
    }
}
?>