<!--sa c'est mon formulaire-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Instagreen Shop</title>
</head>
<body>
    <main>
        <h1>inscription</h1>
            <form method="POST" action="Tconnexion.php">
                <input type="text" name="login" placeholder="Email" maxlength="255" value="<?php if (isset($_SESSION['email'])) {echo $_SESSION['email']; } ?>"></br>
                <input type="password" name="password" placeholder="Mot de passe" maxlength="255"></br>
                <input class="submit" type="submit" name="submit" value="S'inscrire"></br>
                <?php if (isset($_SESSION['fail'])) { echo "$_SESSION[fail]" . "<br>"; } ?>
                <!--Affiche la varibale qui contient l'erreur-->
            </form>
    </main>
</body>
</html>