<?php
require '../model/Bdd.php';
session_start();
class Admin extends Database
{

    public $db;

    public function admin()
    {
        if (!isset($_SESSION['id_droit']) and $_SESSION['id_droit'] !== "1337") // Seul l'admin peut accéder à cette page. ⛔👮
        {
            header('Location: ../index.php');
            die();
        }
        // Pour supprimer un utilisateur.
        if (isset($_GET['delete-user']) and !empty($_GET['delete-user'])) {
            $delete = (int) $_GET['delete-user'];
            $requete = $db->prepare('DELETE FROM `user` WHERE id = ?');
            $requete->execute(array($delete));
        }
        $users = $db->query('SELECT * FROM `user` ORDER BY id DESC'); // Je sélectionne les utilisateurs et je classe au + récent.
    }

    public function updateUser()
    {
        $edit = $db->query('SELECT * FROM `user` WHERE id'); // Je sélectionne les membres.
        if (!isset($_SESSION['id_droit']) and $_SESSION['id_droit'] !== "1337") // Seul l'admin peut accéder à cette page. ⛔👮
        {
            header('Location: ../index.php'); // Redirection vers l'index si ce n'est pas l'admin ou si aucune session est active.
            die();
        }
        $grabID = $_GET['id']; // Il va récupérer l'utilisateur sélectionné.
        if (isset($_POST['submit'])) {
            if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['adresse']) and !empty($_POST['password']) and !empty($_POST['id_droit'])) {
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $adresse = htmlspecialchars($_POST['adresse']);
                $password = hash('sha512', $_POST['password']);
                $droits = htmlspecialchars($_POST['id_droit']);
                $insertData = $db->prepare('UPDATE `user` SET `nom`= ? ,`prenom`= ? ,`email`= ? ,`adresse`= ? ,`password`= ? ,`id_droit`= ? WHERE id=?'); // La commande utilisée qui va modifier l'user dans la BDD.
                $insertData->execute(array($nom, $prenom, $email, $adresse, $password, $droits, $grabID)); // Il va exécuter la commande.
                echo '<div class="notification">Les informations ont bien étés mises à jour !'; // Message que la modification à bien été prise en compte.
            } else {
                echo '<div class="notification">Tu dois remplir tous les champs !'; // Le message des champs oubliés.
            }
        }
    }

    public function addProduit()
    {
        if (!isset($_SESSION['id_droit']) and $_SESSION['id_droit'] !== "1337") // Seul l'admin peut accéder à cette page. ⛔👮
        {
            header('Location: ../index.php'); // Redirection vers l'index si ce n'est pas l'admin ou si aucune session est active.
            die();
        }
        if (isset($_POST['submit'])) {
            if (!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['image'])) {
                $nom = htmlspecialchars(strip_tags($_POST['nom']));
                $description = htmlspecialchars(strip_tags($_POST['description']));
                $prix = htmlspecialchars(strip_tags($_POST['prix']));
                $image = htmlspecialchars(strip_tags($_POST['image']));
                try {
                    ajouterArticles($nom, $description, $prix, $image);
                } catch (Exception $message) {
                    $message->getMessage();
                }
            }
        }
    }

    public function deleteProduit()
    {
        if (!isset($_SESSION['id_droit']) and $_SESSION['id_droit'] !== "1337") // Seul l'admin peut accéder à cette page. ⛔👮
        {
            header('Location: ../index.php'); // Redirection vers l'index si ce n'est pas l'admin ou si aucune session est active.
            die();
        }
        $produits = afficherProduits2(); // On appelle la classe pour afficher les produits.
        if (isset($_POST['submit'])) {
            if (!empty($_POST['id_produit']) and is_numeric($_POST['id_produit'])) {
                $idProduit = htmlspecialchars(strip_tags($_POST['id_produit']));
                try {
                    supprimerArticles($idProduit);
                } catch (Exception $message) {
                    $message->getMessage();
                }
            }
        }
    }
}
