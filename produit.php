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
    $libelle=$_GET[''];
    require 'sqlconnect.php';
    $produit='SELECT * FROM categorie WHERE libelle="'.$libelle.'"';
    $table=$connection->query($produit);
    $ligne=$table->fetch();
    //besoin d'une liste de catégorie
?>
