<?php

/**
 * Connection à la base de données
 *
 * PHP Version 7
 *
 * @category Connection
 * @package  Connection
 * @author   Poltron Steven <stpoltron@stpbb.org>
 * @license  https://www.php.net/license/3_01.txt PHP License 3.01
 * @link     http://www.stpbb.org
 */

try {

    // le lien pour se connecter a la base de données mysql
    $dns = 'mysql:host=localhost;dbname=lafleuriste';
    // le  pour se connecter
    $mail = $_SESSION['mail'];
    // le mot de passe de l'utilisateur pour se connecter
    $password = $_SESSION['password'];
    // on se connecte à MySQL
    $connection = new PDO($dns, $mail, $password);
    // on définit l'encondage des caractères en utf8
    $connection->query("SET NAMES utf8");
} catch ( Exception $e ) { // en cas d'erreur
    // on affiche un message d'erreur
        echo "Connection à MySQL impossible : ", $e->getMessage();
    die(); // on arrête tout
}

?>
