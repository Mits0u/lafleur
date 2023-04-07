<?php
/**
 * Connexion à la base de données
 * php version 7.4.26
 * 
 * @category Components
 * @package  Wordpress
 * @author   Jean-Michel <jen-michel@exmple.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link     http://www.php.net/manual/fr/book.pdo.php
 */

//on affiche les erreurs
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Connection au serveur
try {
    $dns = 'mysql:host=localhost;dbname=livres';
    $utilisateur = 'root';
    $motDePasse = '';
    $connection = new PDO($dns, $utilisateur, $motDePasse);
    $connection->query("SET NAMES utf8");
} catch ( Exception $e ) {
    echo "Connexion à MySQL impossible : ", $e->getMessage();
    die();
}


?>