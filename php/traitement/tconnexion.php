<!-- Page par Yassine -->
<?php
require '../class/moduleco.php';
if(isset($_POST['submit']))
{    
    $objet = new Modulco;
    $objet->connect($_POST['email'], $_POST['password']);
}
?>