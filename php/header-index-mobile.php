<!-- Page par Jul -->
<!-- Header dynamique -->
<!-- ?php if(isset($_SESSION['id'])) : ?> Lorsque la personne est connectée, il verra ces sections dans le header. -->
    <img class="logo-header" src="images/logo.png">
    <div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
      <li><a class="menu__item" href="#">Panier</a></li>
      <li><a class="menu__item" href="#">Produits</a></li>
      <li><a class="menu__item" href="#">Connexion</a></li>
      <li><a class="menu__item" href="#">Contact</a></li>
    </ul>
  </div>
<!-- ?php endif; ?>
 ?php else : ?> Lorsque la personne est déconnectée, il verra ces 2 sections dans le header.
    <img src="images/logo.png">
    <ul>
        <li><a href="#">Shop</a></li>
        <li><a href="connexion.php">Connexion</a></li>
    </ul>
 ?php endif; ?> -->
        