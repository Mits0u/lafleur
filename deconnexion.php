<?php 

// deconnexion.php
session_start();
session_destroy();
header('Location: home-page/home.html');
exit();

?>