<?php

require 'Moduleco.php';
if(isset($_POST['submit'])){
    
    $objet = new Modulco;

    $objet->connect($_POST['login'], $_POST['password']);

}

?>