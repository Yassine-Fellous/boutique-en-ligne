<?php
class Recherche extends Database {
        
    public function Recherche($_Recherche){
        $articles = $bdd->query('SELECT titre FROM articles ORDER BY id DESC');

        if(isset($_Recherche) && !empty($_Recherche)) {
            $r = htmlspecialchars($_Recherche);
        
            $articles = $bdd->query('SELECT nom FROM produit WHERE titre LIKE "%'.$r.'%" ORDER BY id DESC');

        if($articles->rowCount() == 0) {

            $articles = $bdd->query('SELECT nom FROM produit WHERE CONCAT(nom, description) LIKE "%'.$r.'%" ORDER BY id DESC');
        }

}

?>