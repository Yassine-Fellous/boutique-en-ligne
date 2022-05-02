<?php
require 'Recherche';

if(isset($_GET['submit'])){
$objet = new Recherche;
$objet->Recherche($_GET['r']);
}
?>