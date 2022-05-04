<?php 
require '../config.php';
session_start();
class Pay extends bdd {
    
    private $db;

    public function __construct()
    {
        try {

            $db = new PDO("mysql:host = localhost ;dbname=boutique_en_ligne", 'root', '');

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $message) {
            echo "ERREUR :" . " " . $message->getMessage();
        }

        $this->bdd = $db;
    }

    public function paiement($_nomcarte, $_numcarte, $_exp, $_cvv){

        $db = $this->bdd;

            if(!empty($_nomcarte) && !empty($_numcarte) && !empty($_exp) && !empty($_cvv)){
            
                $commande = $db->prepare("INSERT id_user, id_produit, prix INTO COMMANDE VALUE(?,?,?)");
                $commande->execute(array($_SESSION['id'], $_SESSION['pannier'], $_SESSION['prix']));
                header('Location:rpay.php');

            }
    
    }
}

    

?>