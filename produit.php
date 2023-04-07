<h1>Lafleur<h1>
<?php
/**
 * Desc
 * php version 8.0.26
 * 
 * @category Produit
 * @package  Lafleur
 * @author   Beaurieux Marie <beaurieux.marie@gmail.com>
 * @license  GNU General Public License
 * @link     http://aaa.com
 */
    $categorie=$_GET[''];
    require 'connect.php';
    $produit='SELECT * FROM lafleuriste WHERE categorie="'.$categorie.'"';
    $table=$connection->query($produit);
    $ligne=$table->fetch();
    
?>