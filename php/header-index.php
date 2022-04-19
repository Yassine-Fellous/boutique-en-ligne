<!-- Page par Jul -->
<?php
session_start();
?>
<!-- Header dynamique -->
<!-- ?php if(isset($_SESSION['id'])) : ?> Lorsque la personne est connectée, il verra ces sections dans le header. -->
    <img class="logo-header" src="images/logo.png">
    <from method="GET">
        <div class="barre-de-recherche">
            <input type="text" placeholder="Recherchez un produit...">
            <div class="search"></div>
        </div>
    </from>
    <ul class="navigation">
        <li><a href="#" title="Le shop, parcourez notre large gamme de produits">Shop</a></li>
        <li><a href="deconnexion.php"><img class="logout" title="Se déconnecter" src="images/logout.png" alt="logo"></img></a>
    </ul>
<!-- ?php endif; ?>
 ?php else : ?> Lorsque la personne est déconnectée, il verra ces 2 sections dans le header.
    <img src="images/logo.png">
    <ul>
        <li><a href="#">Shop</a></li>
        <li><a href="connexion.php">Connexion</a></li>
    </ul>
 ?php endif; ?> -->
        