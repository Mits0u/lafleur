<?php
require 'connex.php';

//on affiche les erreurs
ini_set('display_errors',1);
ini_set('log_errors',1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaFleur</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
</head>
    <body>
        <?php
            $table = $connection->query("SELECT * FROM `articles`;");
        ?>
    
        <form method="get" action="affichage.php">
            <select name = "menu" >
                <?php
                while ($ligne = $table->fetch()) {    
                    echo '<option value="'.$ligne['reference'].'">'.$ligne['designation']
                    .'</option>';   
                }
                ?>
        </select>
        
        <input type="submit" value="produits"/>

        </form> 


    </body>
</html>