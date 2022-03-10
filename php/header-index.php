<!-- Page par Jul -->
<?php
session_start();
?>
<!-- Header dynamique -->
<!-- ?php if(isset($_SESSION['id'])) : ?> Lorsque la personne est connectée, il verra ces sections dans le header. -->
    <img class="logo-header" src="images/logo.png">
    <div class="livraison-text-zone">
        <p1 class="livraison-text"><strong>Livraison offerte dès 30€ d'achats !</strong></p1>
    </div>
    <ul class="navigation">
        <li><a href="#">Shop</a></li>
        <li><a href="PHP/deconnexion.php">Déconnexion</a></li>
    </ul>
<!-- ?php endif; ?>
 ?php else : ?> Lorsque la personne est déconnectée, il verra ces 2 sections dans le header.
    <img src="images/logo.png">
    <ul>
        <li><a href="#">Shop</a></li>
        <li><a href="connexion.php">Connexion</a></li>
    </ul>
 ?php endif; ?> -->
        