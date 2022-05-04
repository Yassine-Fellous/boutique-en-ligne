<!-- Page par Jul et Yassine -->
<?php
require '../class/moduleco.php';
if(isset($_POST['submit']))
{    
    $objet = new Modulco;
    $objet->updatenom($_POST['nom']);
    $objet->updateprenom($_POST['prenom']);
    $objet->updateemail($_POST['email']);
    $objet->updateadresse($_POST['adresse']);
    $objet->updatepassword($_POST['password']);
}
?>