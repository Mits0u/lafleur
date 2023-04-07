<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <form method="post" action="" class="form">
    <h1> Connexion </h1>
        <label for="email">Adresse e-mail:</label>
        <input type="email" name="email" class="box" required placeholder="Indiquer votre adresse mail">
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" class="box" required placeholder="Indiquer votre mot de passe">
        <input type="submit" value="Se connecter" id="submit"></input>
        <a href="#">Vous n'avez pas de compte ?</a>
    </form>
    <div class="side">
        <img src="assets/img/illu1" alt="illustration">
    </div>
</div>

<?php
require 'sqlconnect.php'; // on inclut le fichier de connexion à la base de données

// Vérifier si les champs sont remplis
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM utilisateurs WHERE mail = :email AND password = :password";
    $results = $connection->prepare($sql);
    $results->bindParam(':email', $email);
    $results->bindParam(':password', $password);
    $results->execute();

    $array = $results->fetchAll();
    if (count($array) == 1){
        $_SESSION['email'] = $email;
        echo '<h1>' . 'Authentification réussie' . '</h1>';
    } else {
        echo "Erreur d'authentification";
    }
}
?>
    
</body>
</html>