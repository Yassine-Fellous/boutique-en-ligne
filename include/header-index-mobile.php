<!-- Page par Jul -->
<!-- Header dynamique -->
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
    <title>Instagreen Shop</title>
</head>
<body>
    <img class="logo-header" src="images/logo.png">
    <div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>
    <ul class="menu__box">
      <li><a class="menu__item" href="#">Panier</a></li>
      <?php if(isset($_SESSION['id'])) : ?> <!-- Lorsque la personne est connectée, il verra ces sections dans le header. -->
        <li><a class="menu__item" href="php/deconnexion.php">Déconnexion</a></li>
        <?php if($_SESSION['id_droit'] == 1337) : ?> <!-- Seul l'admin verra cette section dans le header. 👮 -->
          <li><a class="menu__item" href="php/admin.php">Panel d'administration</a></li>
          <?php endif; ?>
          <?php else: ?> <!-- Lorsque la personne est déconnectée, il verra ces 2 sections dans le header. -->
            <li><a class="menu__item" href="php/connexion.php">Connexion</a></li>
            <?php endif; ?>
      <li><a class="menu__item" href="#">Contact</a></li>
      <li><a class="menu__item" href="https://github.com/Yassine-Fellous/boutique-en-ligne">Code source</a></li>
    </ul>
  </div>