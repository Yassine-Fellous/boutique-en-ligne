<!-- Page par Jul et Yassine -->
<?php
session_start(); // On ouvre une session.
require_once('config.php'); // On appelle la base de données.
?>
    <main>
        <div class="logo-zone">
          <a href="../index.php"><img class="logo-co" src="../images/logo.png"/></a>
        </div>
        <div class="connexion-titre-zone">
            <p1 class="connexion-titre">Connectez-vous</p1>
        </div>
        <div class="flex">
          <div class="module-co-zone">
            <div class="formulaire">
              <form method="POST" action="traitement/tconnexion.php">
                <label>
                  <input type="text" name="email" placeholder="Adresse mail ..." maxlength="255" required value="<?php if (isset($_SESSION['email'])) {echo $_SESSION['email']; } ?>"><br /></input>
                </label>
                <label>
                  <input type="password" name="password" placeholder="Mot de passe ..." required><br /></input>
                </label>
                <div class="flex-button">
                  <input class="connexion" type="submit" value="Connexion" name="submit"></input>
                </div><br />
                <?php
                if(isset($_SESSION['fail']))
                {
                  echo "$_SESSION[fail]" . "<br>";
                }
                ?> <!--Affiche la varibale qui contient l'erreur-->
                <p5 class="recuperation">Pas encore membre ?<br />
                Vous pouvez vous <a href="inscription.php">inscrire.</p5></a>
              </form>
            </div>
          </div>
        </div>
    </main>
  </body>
</html>