<?php // PHP
session_start(); // Ouverture de session.
require_once('config.php'); // Connexion DB avec PDO.
$edit = $db->query('SELECT * FROM `user` WHERE id'); // Je sélectionne les membres.
if (!isset($_SESSION['prenom']) and $_SESSION['prenom'] !== "admin") // Seul l'admin peut accéder à cette page. ⛔👮
{
    header('Location: ../index.php'); // Redirection vers l'index si ce n'est pas l'admin ou si aucune session est active.
    die();
}
$grabID = $_GET['id']; // Il va récupérer l'utilisateur sélectionné.
if (isset($_POST['Modifier'])) {
    if (!empty($_POST['prenom']) and !empty($_POST['password']) and !empty($_POST['email']) and !empty($_POST['droits'])) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']); // 'htmlspecialchars' une petite sécurité pour éviter d'écrire du HTML sur les champs.
        $droits = ($_POST['droits']);
        $password = sha1($_POST['password']);
        $insertData = $db->prepare('UPDATE `user` SET `prenom`= ? ,`email`= ? ,`droits`= ? ,`password`= ? WHERE id=?'); // La commande utilisée qui va modifier l'user dans la BDD.
        $insertData->execute(array($prenom, $email, $droits, $password, $grabID)); // Il va exécuter la commande.
        echo '<div class="notification">Les informations ont bien étés mises à jour !'; // Message que la modification à bien été prise en compte.
    } else {
        echo '<div class="notification">Tu dois remplir tous les champs !'; // Le message des champs oubliés.
    }
}
?>
<!-- Début du HTML. -->
<meta charset="utf-8" />
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier son profil (Admin) </title>
</head>

<body>
    <header>
        <div class="container-fluid gray">

        </div>
    </header>
    <main class="footer-auto-bottom">
        <div class="background">
            <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
        </div>
        <div class="titre-index-zone">
            <p1 class="titre-index">Modifier le profil</p1><br />
        </div>
        <div class="zone">
            <div class="formulaire-update-profile-admin">
                <form method="POST" action=<?php "admin-profil.php?id=$grabID=$_GET[id]" ?>>
                    <input class="form-admin-edit-profile" type="text" name="prenom" placeholder="Nouveau pseudo..."><br /></input>
                    <input class="form-admin-edit-profile" type="text" name="email" placeholder="Nouvelle adresse e-m@il..."><br /></input>
                    <input class="form-admin-edit-profile" type="password" name="password" placeholder="Nouveau mot de passe..."><br /></input>
                    <select name="droits" class="deroulant-choix-catego">
                        <option value="">--Droit à attribuer--</option>
                        <option value="1">Utilisateur</option>
                        <option value="42">Modérateur</option>
                        <option value="1337">Administrateur</option>
                    </select><br />
                    <input class="edit" type="submit" value="Modifier" name="Modifier"></input>
                </form>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>