<!-- Page par Jul -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="images/favicon.ico">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/boutique.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Instagreen Shop</title>
</head>

<body>
    <!-- Message de prévention -->
    <?php
    $avertissement = "<script>alert('Ce site est créé dans le cadre un projet d\'école, il ne s\'agit pas de la boutique officielle et le système de paiement est une démo!');</script>";
    echo $avertissement;
    ?>
    <!-- Des headers en dépend du type d'appareil -->
    <header class="header-pc">
        <?php
        include("include/header-index.php");
        ?>
    </header>
    <header class="header-mobile">
        <?php
        include("include/header-index-mobile.php");
        ?>
    </header>
    <main>
        <article>
            <div class="diapo-zone">
                <img class="diapo" src="images/diapo.gif">
            </div>
            <div class="mascotte-zone">
                <img class="mascotte" src="images/mascotte.png">
                <p2 class="mascotte-titre"><strong>La marque qui prend de la graine</strong></p2>
            </div>
            <div class="produits">
                <div class="produits-text-zone">
                    <p1 class="produits-text">Nos produits</p1>
                </div>
                <?php
                include("view/produit.php");
                ?>
            </div>
        </article>
    </main>
    <footer>
        <div class="footer-links-zone">
            <a class="footer-links" href="php/produit.php">
                <p5 class="footer-text">Produits</p5>
            </a>
            <a class="footer-links" href="php/profil.php">
                <p5 class="footer-text">Compte</p5>
            </a>
            <a class="footer-links" href="php/inscription.php">
                <p5 class="footer-text">Inscription</p5>
            </a>
            <a class="footer-links" href="https://github.com/Yassine-Fellous/boutique-en-ligne">
                <p5 class="footer-text">Code source</p5>
            </a>
            <a class="footer-links" href="#">
                <p5 class="footer-text">Contact</p5>
            </a>
        </div>
        <div class="footer-logo-zone">
            <img class="footer-logo" src="images/mascotte.png" />
        </div>
    </footer>
</body>

</html>