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
require 'connex.php';

//on affiche les erreurs
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// request



$val = $_GET['menu'];
$table = $connection->prepare("SELECT * FROM `books` Where `isbn` = :isbn;");
$table->bindParam(':isbn', $val, PDO::PARAM_STR);
$sss = $table->execute();
$Ligne = $table->fetch();    



?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">

        <title>Formulaire</title>
    </head>
    <body>
        <h1>
            Voici les informations du produits sélectionné
        </h1>
            <li>ISBN :  
            <?php echo $val; ?>
            <input type="hidden" name="isbn" value="<?php echo $Ligne['reference']; ?>">
            </br>
            </br>
            <li>Titre :
            <?php echo $Ligne['designation']; ?>
            </li>
            </br>
            <li>
            Auteur :
            <?php echo $Ligne['photo']; ?>
            </li>
            </br>
            <li>
            Prix :
            <?php echo $Ligne['prix']; ?>
            </li>
            </br>
            <li>
            Quantité :
            <?php echo $Ligne['qte']; ?>
            </li>
            </br>

            <a href="base-1.php">Retour</a>

    </body>
</html>
