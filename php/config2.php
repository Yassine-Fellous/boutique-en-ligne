<?php
// Page par Sami et Jul
try
{
$db = new PDO('mysql:host=localhost;dbname=boutique_en_ligne;charset=utf8', 'root' , ''); 
$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $messageErreur)
{
    echo "ERREUR :" . " ". $messageErreur->getMessage();
}
?>