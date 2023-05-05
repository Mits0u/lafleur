<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>
<body>

    <h1>Mon compte</h1>
    <a href="#">Mes commandes</a>
    <a href="#">Mes carnets d'adresses</a>
    <a href="#">Mes informations personnelles</a>

    <span class="deconnexion"><a href="deconnexion.php">Déconnexion</a></span>


<?php 
    require 'sqlconnect.php';
    session_start();
    if (isset($_SESSION['prenom'])) {
        echo '<h1>' . 'Bonjour ' . $_SESSION['prenom'] . '</h1>';
    } else {
        echo '<h1>' . 'Vous n\'êtes pas connecté' . '</h1>';
    }
?>
    
</body>
</html>