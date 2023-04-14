<?php

require_once 'sqlconnect.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST["modifier"])) {
  // Récupérer les valeurs du formulaire
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $mail = $_POST["mail"];
  $password = $_POST["password"];
  $adresse = $_POST["adresse"];
  $tel = $_POST["tel"];

  $sql = $connection->prepare ("UPDATE utilisateurs SET nom='$nom', prenom='$prenom', mail='$mail',adresse='$adresse',tel='$tel', WHERE id=1");


  $nom = $_REQUEST['nom'];
  $prenom = $_REQUEST['prenom'];
  $adresse = $_REQUEST['adresse'];
  $tel = $_REQUEST['tel'];
  $mail = $_REQUEST['mail'];
  $password = $_REQUEST['password'];

  $sql->bindParam(':nom',$nom,PDO::PARAM_STR);
  $sql->bindParam(':prenom',$prenom,PDO::PARAM_STR);
  $sql->bindParam(':mail',$mail,PDO::PARAM_STR);
  $sql->bindParam(':tel',$tel,PDO::PARAM_STR);
  $sql->bindParam(':adresse',$adresse,PDO::PARAM_STR);
  $sql->bindParam(':password',$password,PDO::PARAM_STR);

  $cox = $sql->execute();

  // Afficher un message de confirmation
  echo "Vos informations ont été mises à jour.";
  echo '</br>';
  echo $nom;
  echo '</br>';
  echo $prenom;
  echo '</br>';
  echo $mail;
  echo '</br>';
  echo $password;
  echo '</br>';
  echo $adresse;
  echo '</br>';
  echo $tel;
}
else 
  echo "vos informatiosn n'ont pas été mise a jour"
?>