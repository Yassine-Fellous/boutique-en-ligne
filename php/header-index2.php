<!-- Page par Jul -->
<!-- Header dynamique -->
<?php if(isset($_SESSION['id'])) : ?> <!-- Lorsque la personne est connectée, il verra ces sections dans le header. -->
    <a href="../index.php"><img class="logo-header" src="../images/logo.png"/></a>
    <div class="barre-de-recherche">
        <input type="search" placeholder="Recherchez ...">
        <div class="search"></div>
    </div>
    <ul class="navigation">
        <li><a href="panier.php"><img class="logout" title="Panier" src="../images/caddie.png" alt="logo"></img></a>
        <li><a href="deconnexion.php"><img class="logout" title="Se déconnecter" src="../images/logout.png" alt="logo"></img></a>
        <li><a href="profil.php"><img class="logout" title="Votre compte" src="../images/user.png" alt="logo"></img></a>
        <?php if($_SESSION['id_droit'] == 1337) : ?> <!-- Seul l'admin verra cette section dans le header. 👮 -->
            <li><a href="admin.php"><img class="logout" title="Accèdez au panel d'administration" src="../images/admin.png" alt="logo"></img></a>
            <?php endif; ?>
    </ul>
    <?php else: ?> <!-- Lorsque la personne est déconnectée, il verra ces 2 sections dans le header. -->
        <img class="logo-header" src="../images/logo.png">
        <div class="barre-de-recherche">
            <input type="search" placeholder="Recherchez ...">
            <div class="search"></div>
        </div>
        <ul class="navigation">
            <li><a href="connexion.php"><img class="logout" title="Se connecter" src="../images/user.png" alt="logo"></img></a>
        </ul>
        <?php endif; ?>