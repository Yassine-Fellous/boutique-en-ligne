<!-- Page par Yassine -->
<?php
require 'recherche.php';
if(isset($_GET['submit']))
{
    $objet = new Recherche;
    $objet->Recherche($_GET['recherche']);
}
?>