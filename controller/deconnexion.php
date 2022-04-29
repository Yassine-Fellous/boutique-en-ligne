<?php
// Page par Jul.
session_start();
session_destroy();
header('location: ../index.php'); // On redirige la personne à l'acceuil si l'utilisateur s'est déconnecté.
exit;
?>