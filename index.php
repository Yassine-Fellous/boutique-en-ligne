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
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="boutique.css">
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
        include ("php/header-index.php");
        ?>
    </header>
    <header class="header-mobile">
        <?php
        include ("php/header-index-mobile.php");
        ?>
    </header>
    <main>
        <article>
            <div class="livraison-text-zone-mobile">
                <p1 class="livraison-text"><strong>Livraison offerte dès 30€ d'achats !</strong></p1>
            </div>
            <div class="diapo-zone">
                <img class="diapo" src="images/diapo.gif">
            </div>
            <div class="mascotte-zone">
                <img class="mascotte" src="images/mascotte.png">
                <p2 class="mascotte-titre"><strong>La marque qui prend de la graine</strong></p2>
            </div>
        </article>
    </main>
</body>
</html>