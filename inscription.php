<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <form method="post" action="" class="form">
    <h1> Connexion </h1>
<?php 
    require_once 'sqlconnect.php'; // On inclu la connexion à la bdd

    // creation du formulaire
    echo '<form action="inscription.php" method="post">
        <p>
            <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" /><br />
            <label for="prenom">Prenom</label> : <input type="prenom" name="prenom" id="prenom" /><br />
            <label for="adresse">Adresse</label> : <input type="text" name="adresse" id="adresse" /><br />
            <label for="pass1">Mot de passe</label> : <input type="password" name="pass1" id="pass1" /><br />
            <label for="pass2">Confirmer le mot de passe</label> : <input type="password" name="pass2" id="pass2" /><br />
            <label for="mail">Email</label> : <input type="email" name="mail" id="mail" /><br />
            <label for="tel">Telephone</label> : <input type="text" name="tel" id="tel" /><br />
            <input type="submit" value="Inscription" />
        </p>
    </form>'
?>
    </form>
        <div class="side">
            <img src="assets/img/illu1" alt="illustration">
        </div>;
<?php
    // si le formulaire est envoyé

    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['mail']) && isset($_POST['tel'])) {
        // on vérifie que les deux mots de passe sont identiques
        if ($_POST['pass1'] == $_POST['pass2']) {
            // on vérifie que le mail n'est pas déjà utilisé
            $sql = "SELECT * FROM utilisateurs WHERE mail = :mail";
            $results = $connection->prepare($sql);
            $results->bindParam(':mail', $_POST['mail']);
            $results->execute();
            $array = $results->fetchAll();
            if (count($array) == 0) {
                // on ajoute l'utilisateur à la base de données
                $sql = "INSERT INTO utilisateurs (mail, nom, prenom, adresse, tel, password) VALUES (:mail, :nom, :prenom, :adresse, :tel, :password)";
                $sql = $connection->prepare($sql);
                $sql->bindParam(':mail', $_POST['mail']);
                $sql->bindParam(':nom', $_POST['nom']);
                $sql->bindParam(':prenom', $_POST['prenom']);
                $sql->bindParam(':adresse', $_POST['adresse']);
                $sql->bindParam(':tel', $_POST['tel']);
                $sql->bindParam(':password', $_POST['pass1']);
                $sql->execute();
                echo '<h1>' . 'Inscription réussie' . '</h1>';
            } else {
                echo "Erreur d'inscription";
            }
        } else {
            echo "Erreur d'inscription";
        }
    }
?>

</body>
</html>
