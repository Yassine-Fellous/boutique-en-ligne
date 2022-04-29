<!-- Page par Yassine -->
<?php
require '../class/moduleco.php';
if(isset($_POST['submit']))
{    
    $objet = new Modulco;
    $objet->register($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['adresse'], $_POST['password'], $_POST['passwordconf']);
}
?>