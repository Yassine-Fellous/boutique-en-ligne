<?php
require 'class/Pay';
if($_POST['submit']){
 $objet = new pay;
 $objet->paiement($_POST['nomcarte'], $_POST['numcarte'], $_POST['exp'], $_POST['cvv']);
 
}

?>