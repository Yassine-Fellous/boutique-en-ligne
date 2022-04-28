<!-- Page par Jul -->
<?php // PHP
session_start(); // Ouverture de session.
require_once('config.php'); // On appelle la page de fonctions de commandes.
$edit = $db->query('SELECT * FROM `user` WHERE id'); // Je sélectionne les membres.
if(!isset($_SESSION['id_droit']) AND $_SESSION['id_droit'] !== "1337") // Seul l'admin peut accéder à cette page. ⛔👮
{
    header('Location: ../index.php'); // Redirection vers l'index si ce n'est pas l'admin ou si aucune session est active.
    die();
}
$grabID=$_GET['id']; // Il va récupérer l'utilisateur sélectionné.
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty ($_POST['email']) AND !empty ($_POST['adresse']) AND !empty ($_POST['password']) AND !empty ($_POST['id_droit']))
        {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $password = hash('sha512', $_POST['password']);
            $droits = htmlspecialchars($_POST['id_droit']);
            $insertData = $db->prepare('UPDATE `user` SET `nom`= ? ,`prenom`= ? ,`email`= ? ,`adresse`= ? ,`password`= ? ,`id_droit`= ? WHERE id=?'); // La commande utilisée qui va modifier l'user dans la BDD.
            $insertData->execute(array($nom,$prenom,$email,$adresse,$password,$droits,$grabID)); // Il va exécuter la commande.
            echo '<div class="notification">Les informations ont bien étés mises à jour !'; // Message que la modification à bien été prise en compte.
        }
        else
        {
            echo '<div class="notification">Tu dois remplir tous les champs !'; // Le message des champs oubliés.
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image" href="../images/favicon.ico">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Shippori+Antique+B1&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/boutique.css"/>
        <title>Modifier le profil - Instagreen Shop</title>
    </head>
    <body>
        <main>
            <div class="logo-zone">
                <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
            </div>
            <div class="connexion-titre-zone">
                <p1 class="connexion-titre">Modifiez le profil</p1>
            </div>
            <div class="flex">
                <div class="module-co-zone">
                    <div class="formulaire">
                        <form method="POST" action=<?php "admin-profil.php?id=$grabID=$_GET[id]" ?>>
                            <label>
                                <input type="text" name="nom" placeholder="Nom ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="text" name="prenom" placeholder="Prénom ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="text" name="email" placeholder="Mail ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="text" name="adresse" placeholder="Adresse ..." maxlength="255" required><br /></input>
                            </label>
                            <label>
                                <input type="password" name="password" placeholder="Mot de passe ..." required><br /></input>
                            </label>
                            <label>
                                <select name="id_droit" class="deroulant-choix-catego">
                                    <option value="">--Droit à attribuer--</option>
                                    <option value="1">Utilisateur</option>
                                    <option value="42">Modérateur</option>
                                    <option value="1337">Administrateur</option>
                                </select><br />
                            </label>
                            <div class="flex-button">
                                <input class="connexion" type="submit" value="Modifier" name="submit"></input>
                            </div><br />
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
