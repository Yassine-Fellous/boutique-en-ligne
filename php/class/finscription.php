<!-- Page par Yassine -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>inscription</h1>
            <form method="POST" action="Tinscription.php">
                <input type="text" name="nom" placeholder="Nom" maxlength="255" value="<?php if(isset($_SESSION['nom'])) { echo $_SESSION['nom']; }?>"></br>
                <input type="text" name="prenom" placeholder="Prenom" maxlength="255" value="<?php if(isset($_SESSION['prenom'])) { echo $_SESSION['prenom']; }?>"></br>
                <input type="text" name="email" placeholder="Email" maxlength="255" value="<?php if (isset($_SESSION['email'])) {echo $_SESSION['email']; } ?>"></br>
                <input type="text" name="adresse" placeholder="adresse" maxlength="255" value="<?php if (isset($_SESSION['adresse'])) {echo $_SESSION['adresse']; } ?>"></br>
                <input type="password" name="password" placeholder="Mot de passe" maxlength="255"></br>
                <input type="password" name="passwordconf" placeholder="Confirmer le mot de passe" maxlength="255">
                <input class="submit" type="submit" name="submit" value="S'inscrire"></br>
                <?php
                if
                (isset($_SESSION['fail']))
                {
                    echo "$_SESSION[fail]" . "<br>";
                }
                ?>
                <!--Affiche la varibale qui contient l'erreur-->
            </form>
    </main>
</body>
</html>